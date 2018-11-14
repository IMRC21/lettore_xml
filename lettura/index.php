<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Un lettore di file xml</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <!-- <script src="main.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
</head>
<body>
    <?php
        if($_POST){
            $percorso = $_POST["file"];
            $file = file_get_contents("./".$percorso);
            $data = explode("<persona>",$file);
            for($i=1;$i<count($data);$i++){
                preg_match('#<\s*?nome\b[^>]*>(.*?)</nome\b[^>]*>#s', $data[$i], $oggetto[$i]['nome']);
                preg_match('#<\s*?cognome\b[^>]*>(.*?)</cognome\b[^>]*>#s', $data[$i], $oggetto[$i]['cognome']);
                preg_match('#<\s*?cf\b[^>]*>(.*?)</cf\b[^>]*>#s', $data[$i], $oggetto[$i]['cf']);
                preg_match('#<\s*?data\b[^>]*>(.*?)</data\b[^>]*>#s', $data[$i], $oggetto[$i]['data']);
            }

            for($i=1;$i<count($oggetto)+1;$i++){
                echo $oggetto[$i]['nome'][1]." ";
                echo $oggetto[$i]['cognome'][1]." ";
                echo $oggetto[$i]['cf'][1]." ";
                echo $oggetto[$i]['data'][1]." ";
                echo "<br>";
            }
        }else{
            echo "<form action='index.php' method='POST'>";
            echo "<input type='file' name='file'>";
            echo "<input type='submit'>";
            echo "</form>";
        }
    ?>
    
</body>
</html>