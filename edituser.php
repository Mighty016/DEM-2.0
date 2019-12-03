<?php

if(isset($_POST['submit']))
{include './connection.php';

$userID = mysqli_real_escape_string($conn,$_POST['userID']);
$userName = mysqli_real_escape_string($conn,$_POST['userName']);
$email = mysqli_real_escape_string($conn,$_POST['email']);

    $sql = "UPDATE userinfo SET userName='".$userName"', email='".$email"' WHERE userID = " .$userID;
    $qry = mysqli_query($conn, $sql);

      mysqli_error($conn);
      echo "<script language = 'javascript'>
      alert('Student information has been updated!');
      window.location='index.php'</script>";


}
 ?>
