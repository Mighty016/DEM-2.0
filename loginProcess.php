<?php

include_once("connection.php");
include_once("sharedFunction.php");
//user input

$pswd = $_POST['pswd'];
$id = $_POST['id'];

echo json_encode(userLogin($id,$pswd));
?>