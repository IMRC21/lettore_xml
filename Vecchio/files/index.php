<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Un lettore e scrittore di file xml</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <a href="../../index.html"><button class="btn"><i class="fa fa-home"></i></button></a>
    <div class="container">
    <?php
        if($_POST){
            $nomeFile = $_POST["esp"] . ".xml";
            $stdRiga = "<?xml version='1.0' encoding='UTF-8'?>".PHP_EOL;
            $root = "<persone>".PHP_EOL;
            $closeRoot ="</persone>".PHP_EOL;
            $apriTagPersona = "<persona>".PHP_EOL;
            $chiudiTagPersona = "</persona>".PHP_EOL;
            echo $_POST["persone"];
            if(intval($_POST["persone"])>1){
                $stdRiga = $root;
                for($i=1;$i<$_POST["persone"]+1;$i++){
                    $nome = $_POST["nome".$i];
                    $cognome = $_POST["cognome".$i];
                    $cf = $_POST["cf".$i];
                    $nomeStampa = "<nome>" . $nome . "</nome>".PHP_EOL;
                    $cognomeStampa = "<cognome>" . $cognome . "</cognome>".PHP_EOL;
                    $cfStampa = "<cf>" . $cf . "</cf>".PHP_EOL;
                    $stdRiga = $stdRiga . $apriTagPersona . $nomeStampa .$cognomeStampa . $cfStampa . $chiudiTagPersona;
                }
                $stdRiga = $stdRiga . $closeRoot;
            } else {
                $nome = $_POST["nome1"];
                $cognome = $_POST["cognome1"];
                $cf = $_POST["cf1"];
                $nomeStampa = "<nome>" . $nome . "</nome>".PHP_EOL;
                $cognomeStampa = "<cognome>" . $cognome . "</cognome>".PHP_EOL;
                $cfStampa = "<cf>" . $cf . "</cf>".PHP_EOL;
                $stdRiga = $stdRiga . $root . $apriTagPersona . $nomeStampa .$cognomeStampa . $cfStampa . $chiudiTagPersona . $closeRoot;
            }
            
            $file = file_put_contents($nomeFile,$stdRiga);
            header("Location: ../../assets/end.html");
        }else{
            
            echo "<div id='form'><form id='ilForm' action='index.php' method='POST'>";
            echo "<label class='testo'>Inserisci il tuo nome</label>";
            echo "<input type='text' name='nome1'>";
            echo "<label class='testo'>Inserisci il tuo cognome</label>";
            echo "<input type='text' name='cognome1'>";
            echo "<label class='testo'>Inserisci il tuo codice fiscale</label>";
            echo "<input type='text' name='cf1'>";
            echo "<label class='testo'>Inserisci il nome di questa esportazione</label>";
            echo "<input type='text' name='esp' value='default'>";
            echo "<input type='hidden' id='indice' name='persone' value='1'>";
            echo "<input type='submit'>";
            echo "</form></div>";
            echo "<input type='button' id='aggiungi' value='Aggiungi' onclick='aggiungi()'>";
        }
    ?>
    </div>
    <script src="main.js"></script>
</body>
</html>