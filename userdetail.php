<?php
include './connection.php';
if(isset($_GET['id'])) {
  $userID = $_GET['id'];

    $sql = "SELECT * FROM userinfo WHERE userID = " . $userID;
    $qry = mysqli_query($conn, $sql);

}
?>
