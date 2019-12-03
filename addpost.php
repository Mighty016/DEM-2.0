<?php
session_start();

  if(isset($_POST['submit']))
  {
    include './connection.php';
    
    $clubID = mysqli_real_escape_string($conn, $_POST['clubID']);
    $post = mysqli_real_escape_string($conn, $_POST['post']);
    //$img = mysqli_real_escape_string($conn, $_POST['img']);

      $sqlInsert = "INSERT INTO feed (feedDesc, clubID) VALUES ('".$post."', '".$clubID."')";
      $qryInsert = mysqli_query($conn, $sqlInsert);
      //echo $sqlInsertStudent;
      if(!$qryInsert){
        mysqli_error($conn);

          echo "Failed!";

      }
      else
      {
        echo "File detail has been added to the system!";
      }
}
