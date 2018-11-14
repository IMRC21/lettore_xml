<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Un lettore e scrittore di file xml</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <!-- <script src="main.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
</head>
<body>
    <?php
        if($_POST){
            $percorso = $_POST["file"];
            echo $percorso;
            $file = file_get_contents("./".$percorso);
            $oggetto = explode("<persona>",$file);
            print_r(explode("<cognome>",$oggetto[2]));
        }else{
            echo "<form action='index.php' method='POST'>";
            echo "<label class='testo'>Inserisci il tuo nome</label>";
            echo "<input type='file' name='file'>";
            echo "<input type='submit'>";
            echo "</form>";
        }
    ?>
    
</body>
</html>