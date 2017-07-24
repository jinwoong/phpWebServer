<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";
$sql = "DELETE FROM Members WHERE _id = $data->id ";
$result = $conn->query($sql);
$conn->close();
?>