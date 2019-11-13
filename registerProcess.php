<?php
    include("connection.php");

    //user input
    $name = $_POST['name'];
    $pswd = $_POST['pswd'];
    $id = $_POST['id'];
    $dept = $_POST['course'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    //clean input

    $name = $conn->real_escape_string($name);
    $pswd = $conn->real_escape_string($pswd);
    $id = $conn->real_escape_string($id);
    $dept = $conn->real_escape_string($dept);
    $email = $conn->real_escape_string($email);
    $type = $conn->real_escape_string($type);

    //check if already exist

    $stmt = $conn->prepare("SELECT * FROM USERINFO WHERE userID = ?");
    $stmt->bind_param("i",$dbID);

    // set parameters and execute
    $dbID = $id;
    $stmt->execute();

    $result = $stmt->get_result();   // <--- add this instead
    if($result->num_rows > 0) {
        echo "false";
    }
    else{
        $stmt1 = $conn->prepare("INSERT INTO userinfo (userID,userPwd,userName,email,deptID,userType,userStatus,userPicture) VALUES (?,?,?,?,?,?,?,?)");
         $stmt1->bind_param("issssiis",$userID,$userPwd,$userName,$DBemail,$deptID,$userType,$userStatus,$userPic);
         $userID = $id;
         $userPwd = hash_hmac('md5',$pswd,$id);
        $userName = $name;
        $DBemail = $email;
        $deptID = $dept;
        $userType = $type;
        $userStatus = 1;
        $userPic= "haha";
        echo $stmt1->execute();

        echo"true";
    }

    $stmt->close();
    $conn->close();
      
    

    //
?>