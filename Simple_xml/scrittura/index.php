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
</head>
<body>
    <?php
        if($_POST){
            /*
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];
            echo $cognome;
            $cf = $_POST["cf"];
            $nomeFile = $_POST["esp"] . ".xml";
            $stdRiga = "<?xml version='1.0' encoding='UTF-8'?>".PHP_EOL; 
            $root = "<persone>".PHP_EOL;
            $closeRoot ="</persona>".PHP_EOL;
            $apriTagPersona = "<persona>".PHP_EOL;
            $chiudiTagPersona = "</persona>".PHP_EOL;
            $nomeStampa = "<nome>" . $nome . "</nome>".PHP_EOL;
            $cognomeStampa = "<cognome>" . $cognome . "</cognome>".PHP_EOL;
            $cfStampa = "<cf>" . $cf . "</cf>".PHP_EOL;
            $stdRiga = $stdRiga . $root . $apriTagPersona . $nomeStampa .$cognomeStampa . $cfStampa . $chiudiTagPersona . $closeRoot;
            $file = file_put_contents($nomeFile,$stdRiga);
            */
            $xmlBase = "<?xml version='1.0' encoding='UTF-8'?>
<persone>
</persone>
            ";
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];
            echo $cognome;
            $cf = $_POST["cf"];
            $nomeFile = $_POST["esp"] . ".xml";
            $xmlObj = new SimpleXMLElement($xmlBase);
            
            $xmlObj->addChild("persona");
            $xmlObj->persona->addChild("nome", $nome);
            $xmlObj->persona->addChild("cognome", $cognome);
            $xmlObj->persona->addChild("cf", $cf);

            $file = file_put_contents($nomeFile,$xmlObj->asXML());
        }else{
            echo "<form id='ilForm' action='index.php' method='POST'>";
            echo "<label class='testo'>Inserisci il tuo nome</label>";
            echo "<input type='text' name='nome'>";
            echo "<label class='testo'>Inserisci il tuo cognome</label>";
            echo "<input type='text' name='cognome'>";
            echo "<label class='testo'>Inserisci il tuo codice fiscale</label>";
            echo "<input type='text' name='cf'>";
            echo "<label class='testo'>Inserisci il nome di questa esportazione</label>";
            echo "<input type='text' name='esp' value='default'>";
            echo "<input class='testo' type='button' onclick='aggiungi()' value='Aggiungi un campo'>";
            echo "<input type='submit'>";
            echo "</form>";
            echo "<div id='aggiungi-elemento'></div>";
        }
    ?>
    
</body>
</html>