<?php
function userLogin ( &$userID, &$userPwd) {
    include("connection.php");
    
    $userPwd = $conn->real_escape_string($userPwd);
    $userID = $conn->real_escape_string($userID);
    $userPwd = hash_hmac('md5',$userPwd,$userID);
    $outputs = array(); 

    $stmt = $conn->prepare("SELECT * FROM USERINFO WHERE userID = ? AND userPwd = ?");
    $stmt->bind_param("is",$dbID,$dbpswd);
    
    // set parameters and execute
    $dbID = $userID;
    $dbpswd = $userPwd;
    $stmt->execute();
    
    $result = $stmt->get_result();
   
    if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            $outputs[] = $row;
        }
        $_SESSION['userData'] = $outputs;
        $_SESSION['timestamp'] = time();
    } 
    else $outputs="login failed - id or password is incorrect <br/>";
    return $outputs;
}
?>