<?php
include("connection.php");
$sql = "SELECT * FROM department";
$qry = $conn->query($sql);

$result = array();
while($row = $qry->fetch_assoc()){
    $result[] = $row;
}

echo json_encode($result);

?>