<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Un lettore di file xml</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<a href="../../index.html"><button class="btn"><i class="fa fa-home"></i></button></a>
<div class="container">
    <?php
        if($_POST){
            $percorso = $_POST["file"];
            $xml=simplexml_load_file("./".$percorso);
            $index = 0;
            echo "<table>";
                for($i = 0; $i<count($xml->children()[0]);$i++){
                    echo "<th>".$xml->children()->children()[$i]->getName()."</th>";
                }
            foreach ($xml->children() as $persona) {
                echo "<tr>";
                for($i = 0; $i<count($persona);$i++){
                    echo "<td>".$persona->children()[$i]."</td>";
                }
                echo "</tr>";
             }
             echo "</table>";
        }else{
            echo "<div id='form'><form action='index.php' method='POST'>";
            echo "<input type='file' name='file'>";
            echo "<input type='submit'>";
            echo "</form></div>";
        }
    ?>
    </div>
</body>
</html>