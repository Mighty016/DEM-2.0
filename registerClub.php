<?php
    include_once("connection.php");
    include_once("sharedFunction.php");

    //user input
    // $clubID = base64_decode(random_bytes(10));
    $name = $conn->real_escape_string($_POST['clubName']);
    $pswd = $conn->real_escape_string($_POST['clubPswd']);
    $email = $conn->real_escape_string($_POST['clubEmail']);
 

    $result = getClub($name);
    if(count($result) >0) {
        echo "user already registered <br />";
        //$output['error'][] = "this user has registered";
    }else{
        $stmt = $conn->prepare("INSERT INTO club (clubID,clubName,clubPwd,clubEmail,clubStatus) VALUES (?,?,?,?,?)");
        $stmt->bind_param("isssi",$clubID,$clubName,$clubPswd,$clubEmail,$clubStatus);
        $clubID = random_int(0,10000);
        $clubName = $name;
        $clubPswd = hash_hmac('md5',$pswd,$clubName);
        $clubEmail = $email;
        $clubStatus = 1;

        $stmt->execute();
        
        echo "true";
    }
?>