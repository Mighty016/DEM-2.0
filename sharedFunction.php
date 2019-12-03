<?php
function userLogin ( &$userID, &$userPwd) {
    include("connection.php");

    $userPwd = $conn->real_escape_string($userPwd);
    $userID = $conn->real_escape_string($userID);
    $userPwd = hash_hmac('md5',$userPwd,$userID);
    $outputs = array();

    $stmt = $conn->prepare("SELECT * FROM USERINFO u JOIN department d ON d.departmentID = u.deptID WHERE u.userID = ? AND u.userPwd = ?");
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
        session_start();
        $_SESSION['userData'] = $outputs;
        $_SESSION['timestamp'] = time();
    }
    else $outputs="login failed - id or password is incorrect";
    return $outputs;
}
function uploadImage($target_dir,$name,$maxsize=100000000,$replace=1){

    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $target_name = $target_dir . $name . '.'. strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_name) && !$replace) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["file"]["size"] > $maxsize) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_name)) {
            echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

function getClub($clubNameInput = ""){
    include("connection.php");
    $stmt = $conn->prepare("SELECT * FROM club WHERE clubName = ?");
    $stmt->bind_param("s",$clubName);
    //bind parameter
    $clubName = $conn->real_escape_string($clubNameInput);
    $stmt->execute();

    $result = $stmt->get_result();
    $outputs = array();
    if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            $outputs[] = $row;
        }
    }
    return $outputs;
}
?>
