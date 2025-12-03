<?php 
    $ip = "1.1.1.1";

    if (filter_var($ip, "FILTER_VALIDATE_IP")){
        echo "yea";
    }
    else echo "no";
?>