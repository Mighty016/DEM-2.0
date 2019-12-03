<?php
include './connection.php';
if(isset($_POST['id'])) {
  $feedID = $_POST['id'];


  $sql = "DELETE FROM feed WHERE feedID = " . $feedID;
  $qry = mysqli_query($conn, $sql);

  if($qry)
  {
    echo "<script language = 'javascript'>
    alert('Remove success!');
    window.location='index.php'</script>";
  }
  else {
    echo "<script language = 'javascript'>
    alert('Fail!');
    window.location='index.php'</script>";
  }

}


 ?>
