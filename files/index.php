<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Un lettore e scrittore di file xml</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <?php
        if($_POST){

        }else{
            echo "<form action='index.php' method='POST'>";
            echo "<label class='testo'>Inserisci il tuo nome</label>";
            echo "<input type='text' name='nome'>";
            echo "<label class='testo'>Inserisci il tuo cognome</label>";
            echo "<input type='text' name='cognome'>";
            echo "<label class='testo'>Inserisci il tuo codice fiscale</label>";
            echo "<input type='text' name='cf'>";
        }
    ?>
    
</body>
</html>