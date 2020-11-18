<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        img{
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="" method="post">
        <p>ระบุคำค้นหา</p>
        <input type="text" name="input">
        <input type="submit" name="submit" value="ค้นหา" class="btn btn-primary"/>
    </form>
</div>

<?php
    $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
    $response = file_get_contents($url);
    $result = json_decode($response);
    $html = "<div class='container'>";

    echo $html;
    echo "<div class='row' id='all'>";
    foreach ($result->tracks->items as $m) {  
        
        echo "<div class='col-3' style='border: 1px solid; margin-right: 20px; margin-bottom: 20px;'>";
        echo "<div class='row'>";
        echo "<div class='col'>";
        echo "<img src=".$m->album->images[1]->url.">";
        echo "<div class='row'>";
        echo "<div class='col'>";
        echo "<br><h4>".$m->album->name."</h4>";
        echo "<p> Artist: ".$m->artists[0]->name."</p>";
        echo "<p> Release date: ".$m->album->release_date."</p>";
        echo "<p> Avaliable: ".count($m->album->available_markets) ." countries</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
                  
    }
    echo "</div>";
    echo "</div>";
    
?>

<?php
    if(isset($_POST['submit'])){
        $input_val = $_POST['input'];
        echo "<div class='container'>";
        
        if($input_val != ""){

            $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
            $response = file_get_contents($url);
            $result = json_decode($response);
            echo "<div class='row'>";
            foreach ($result->tracks->items as $m) {  
                if(strpos($m->album->artists[0]->name, $input_val) !== false || $m->name == $input_val){
                   
                    
                    echo "<div class='col-4'>";
                    echo "<div class='row'>";
                    echo "<div class='col'>";
                    
                    echo "<img src=".$m->album->images[1]->url.">";
                    echo "<div class='row'>";
                    echo "<div class='col'>";
                    echo "<h4>".$m->album->name."</h4>";
                    echo "<p> Artist: ".$m->artists[0]->name."</p>";
                    echo "<p> Release date: ".$m->album->release_date."</p>";
                    echo "<p> Avaliable: ".count($m->album->available_markets) ." countries</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                }
            }
            echo  "</div>";
        }
        else{
            echo "error!!!!";
        }
    }

    
    
?>
</body>
</html>