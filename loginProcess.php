<?php

include("connection.php");

//user input

$pswd = $_POST['pswd'];
$id = $_POST['id'];
//clean input


$pswd = $conn->real_escape_string($pswd);
$id = $conn->real_escape_string($id);


//check if already exist

$pswd = hash_hmac('md5',$pswd,$id);

$stmt = $conn->prepare("SELECT * FROM USERINFO WHERE userID = ? AND userPwd = ?");
$stmt->bind_param("is",$dbID,$dbpswd);

// set parameters and execute
$dbID = $id;
$dbpswd = $pswd;
$stmt->execute();

$result = $stmt->get_result();   // <--- add this instead
if($result->num_rows > 0) {
    echo "true";
}
?>