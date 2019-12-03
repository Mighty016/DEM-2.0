<?php
session_start();

  if(isset($_POST['submit']))
  {
    include './connection.php';

    $clubID = mysqli_real_escape_string($conn, $_POST['clubID']);
    $actID = mysqli_real_escape_string($conn, $_POST['actID']);
    $actName = mysqli_real_escape_string($conn, $_POST['actName']);
    $actVenue = mysqli_real_escape_string($conn, $_POST['actVenue']);
    $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
    $startTime = mysqli_real_escape_string($conn, $_POST['startTime']);
    $endDate = mysqli_real_escape_string($conn, $_POST['endDate']);
    $endTime = mysqli_real_escape_string($conn, $_POST['endTime']);

      $sqlInsert = "INSERT INTO activity a (actId, actName, actVenue, startDate, startTime, endDate, endTime, clubID) VALUES ('".$actID."', '".$actName."', '".$actVenue."', '".$startDate."', '".$startTime."', '".$endDate."', '".$endTime."', '".$clubID."')";
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
