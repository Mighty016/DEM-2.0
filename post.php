<?php
include './connection.php';


    $sql = "SELECT * FROM feed f  LEFT JOIN activity a ON a.actID = f.actID JOIN club c ON c.clubID = f.clubID ";
    $qry = mysqli_query($conn, $sql);
    $output = array();
    while ($row = mysqli_fetch_assoc($qry)) {
      $output[] = $row;
    }
    echo json_encode($output);


?>
