<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";
$sql = "UPDATE Members SET
name ='$data->name', position ='$data->position',
team ='$data->team', phone ='$data->phone', 
birthday='$data->birthday', email='$data->email'
WHERE _id = $data->_id ";
$qry = $conn->query($sql);
if($data->name){
}
$conn->close();
?>