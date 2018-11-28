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
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];
            echo $cognome;
            $cf = $_POST["cf"];
            $nomeFile = $_POST["esp"] . ".xml";
            $stdRiga = "<?xml version='1.0' encoding='UTF-8'?>".PHP_EOL; 
            $apriTagPersona = "<persona>".PHP_EOL;
            $chiudiTagPersona = "</persona>".PHP_EOL;
            $nomeStampa = "<nome>" . $nome . "</nome>".PHP_EOL;
            $cognomeStampa = "<cognome>" . $cognome . "</cognome>".PHP_EOL;
            $cfStampa = "<cf>" . $cf . "</cf>".PHP_EOL;
            $stdRiga = $stdRiga . $apriTagPersona . $nomeStampa .$cognomeStampa . $cfStampa . $chiudiTagPersona;
            $file = file_put_contents($nomeFile,$stdRiga);
        }else{
        }
    ?>
    
</body>
</html>