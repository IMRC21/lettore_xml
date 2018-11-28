<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Un lettore e scrittore di file xml</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<a href="../../index.html"><button class="btn"><i class="fa fa-home"></i></button></a>
    <div class="container">
    <?php
        if($_POST){
            $nome = array($_POST["nome"]);
            $cognome = array($_POST["cognome"]);
            $cf = array($_POST["cf"]);
            $nomeFile = $_POST["esp"] . ".xml";
            $personeInserite = $_POST["nrPersone"];
            if($personeInserite > 1){
                //Carica più persone
                Echo "Si, ci sono più persone".PHP_EOL;
                for($ct = 2; $ct <= $personeInserite; $ct ++){
                    array_push($nome,$_POST["nome" . $ct]); 
                    array_push($cognome,$_POST["cognome". $ct]);
                    array_push($cf, $_POST["cf" . $ct]);
                }
                // De-commentare per stampare gli array
                // print_r($nome);
                // echo "<br>";
                // print_r($cognome);
                // echo "<br>";
                // print_r($cf);
            }
            //Una base di partenza per il file XML in caso non esista già
            $xmlBase = "<?xml version='1.0' encoding='UTF-8'?>".PHP_EOL."<persone>".PHP_EOL."</persone>";
            //se il file esiste e non è vuoto allora gli elementi si andranno ad aggiungere in coda
            if(file_exists($nomeFile)){
                $contatore = 0;
                $filePreEsistente = file_get_contents($nomeFile);
                if($filePreEsistente != ""){
                    $xmlObj = new SimpleXMLElement($filePreEsistente);
                    echo "Il file esiste e non è vuoto";
                    //Bisogna solo aggiungere 
                    foreach($nome as $n){
                        $persona = $xmlObj->addChild("persona");
                        $persona->addChild("nome", $n);
                        $persona->addChild("cognome", $cognome[$contatore]);
                        $persona->addChild("cf", $cf[$contatore]);
                        $contatore++;
                    }//Fine foreach
                }else{
                    //Il file esiste ma è vuoto
                    echo "Il file esiste ma è vuoto";
                    $xmlObj = new SimpleXMLElement($xmlBase);
                    foreach($nome as $n){
                        $persona = $xmlObj->addChild("persona");
                        $persona->addChild("nome", $n);
                        $persona->addChild("cognome", $cognome[$contatore]);
                        $persona->addChild("cf", $cf[$contatore]);
                        $contatore++;
                    }
                }//Chiuso IF FILE NOT NULL
                $contatore = 0;
            }else{
                //Il file non esiste
                echo("Il file non esiste");
                foreach($nome as $n){
                    $persona = $xmlObj->addChild("persona");
                    $persona->addChild("nome", $n);
                    $persona->addChild("cognome", $cognome[$contatore]);
                    $persona->addChild("cf", $cf[$contatore]);
                    $contatore++;
                }
            }//Chiuso IF FILE EXISTS
            $file = file_put_contents($nomeFile,$xmlObj->asXML());
            header("Location: ../../assets/end.html");
        }else{
            echo "<div id='form'><form class='iForm' id='il-form' action='index.php' method='POST'>";
            echo "<label class='testo'>Inserisci il tuo nome</label>";
            echo "<input type='text' name='nome'>";
            echo "<label class='testo'>Inserisci il tuo cognome</label>";
            echo "<input type='text' name='cognome'>";
            echo "<label class='testo'>Inserisci il tuo codice fiscale</label>";
            echo "<input type='text' name='cf'>";
            //da levare
            echo "<center>";
            echo "<label class='fuori-form' class='testo'>Inserisci il nome di questa esportazione</label>";
            echo "<input class='fuori-form' type='text' name='esp' value='default'>";       
            //da levare
            echo "</center>";
            echo "<label class='testo'>Numero di persone inserite: </label>";
            echo "<input id='aggiungi-elementi' type='text' name='nrPersone' value='1' >";
            echo "<input type='submit'>";
            echo "</form></div>";
            echo "<div id='posto-nuovo'></div>";
            echo "<button onClick='laFunzione()' id='aggiungi'>AGGIUNGI UN ELEMENTO</button>";
        }
    ?>
    </div>
</body>
</html>