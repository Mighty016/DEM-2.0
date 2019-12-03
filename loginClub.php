<?php
include("connection.php");
    
$clubPwd = $conn->real_escape_string($_POST['clubPswd']);
$clubName = $conn->real_escape_string($_POST['clubName']);
$clubPwd = hash_hmac('md5',$clubPwd,$clubName);
$outputs = array(); 

$stmt = $conn->prepare("SELECT * FROM club WHERE clubName = ? AND clubPwd = ?");
$stmt->bind_param("is",$dbName,$dbpswd);

// set parameters and execute
$dbName = $clubName;
$dbpswd = $clubPwd;
$stmt->execute();

$result = $stmt->get_result();
$check=$result->num_rows;
if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
        $outputs[] = $row;
    }
    session_start();
    $_SESSION['clubData'] = $outputs;
    $_SESSION['timestamp'] = time();
} 
else $outputs="login failed - id or password is incorrect ".$clubName." <br/>";
echo json_encode($outputs);
?>