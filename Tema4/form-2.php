<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo "<ol>";
        for($i = 0; $i < $_POST["veces"]; $i++){
            echo "<li>".$_POST["name"]."</li>";
        }
        echo "</ol>";

    }

?>