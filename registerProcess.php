<?php
    include_once("connection.php");
    include_once("sharedFunction.php");
    //user input
    $name = $_POST['name'];
    $pswd = $_POST['pswd'];
    $id = $_POST['id'];
    $dept = $_POST['course'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $output = array();
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

    
    $dbID = $id;
    $stmt->execute();

    $result = $stmt->get_result();  
    if($result->num_rows > 0) {
        $output['error'] = array("user already registered");
        //$output['error'][] = "this user has registered";
    }
    else{

        //insert into database
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
        $stmt1->execute();
        
        $loginData = userLogin($id,$pswd);
        if(isset($loginData['error'])){
            $loginData['error'][] = "login failed";
        }
       
        $output = $loginData;
        
    }

    $stmt->close();
    $conn->close();
    
    //give to user
    echo json_encode($output);

    //
?>