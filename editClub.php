<?php

if(isset($_POST['submit']))
{include './connection.php';

$clubID = mysqli_real_escape_string($conn,$_POST['clubID']);
$clubEmail = mysqli_real_escape_string($conn,$_POST['clubEmail']);
$clubDesc = mysqli_real_escape_string($conn,$_POST['clubDesc']);
// $img = mysqli_real_escape_string($conn,$_POST['img']);

    $sql = "UPDATE club SET clubDesc='".$clubDesc."', clubEmail = '".$clubEmail."' WHERE clubID = ".$clubID;
    $qry = mysqli_query($conn, $sql);

      mysqli_error($conn);
      echo "Student information has been updated!";


}
 ?>
