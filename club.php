<?php
include './connection.php';


    $sql = "SELECT * FROM club";
    $qry = mysqli_query($conn, $sql);
    $output = array();
    while ($row = mysqli_fetch_assoc($qry)) {
      $output[] = $row;
    }
    echo json_encode($output);


?>
