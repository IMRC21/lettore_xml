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
            preg_match_all('~<([^/][^>]*?)>~', $file, $tags);
            $tag = array_unique($tags[1]);
            for($i=1;$i<count($data);$i++){           
                for ($c=2; $c<count($tag); $c++) { 
                    preg_match('#<\s*?'.$tag[$c].'\b[^>]*>(.*?)</'.$tag[$c].'\b[^>]*>#s', $data[$i], $oggetto[$i][$tag[$c]]);
                    if($oggetto[$i][$tag[$c]] == null)
                    $oggetto[$i][$tag[$c]] = "";
                }
            }
            for($i=1;$i<count($oggetto)+1;$i++){
                for ($c=2; $c<count($tag); $c++) { 
                    echo htmlspecialchars("<".$tag[$c].">");
                    echo $oggetto[$i][$tag[$c]][1];
                    echo htmlspecialchars("</".$tag[$c].">")."<br>";
                }
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