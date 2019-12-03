<?php

if(isset($_POST['submit']))
{include './connection.php';

$feedID = mysqli_real_escape_string($conn,$_POST['feedID']);
$post = mysqli_real_escape_string($conn,$_POST['post']);
// $img = mysqli_real_escape_string($conn,$_POST['img']);

    $sql = "UPDATE feed SET feedDesc='".$post."' WHERE feedID = ".$feedID;
    $qry = mysqli_query($conn, $sql);

      mysqli_error($conn);
      echo "Student information has been updated!";


}
 ?>
