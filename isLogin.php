<?php
    session_start();
    $output = array();
    if(time() - $_SESSION['timestamp'] < 60*30){
        $output['userData'] = $_SESSION['userData']
        $output['clubData'] = $_SESSION['clubData']);
        $output['status'] = "true";
    }else{
        include("logout.php");
        $output['status'] = "false";
    }
    echo "ho"

?>
