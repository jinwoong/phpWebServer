<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";
$sql = "INSERT INTO Members (name, position, team, phone, birthday, email)
VALUES ('$data->name', '$data->position', '$data->team', '$data->phone', '$data->birthday', '$data->email')";
if($data->name){
	$qry = $conn->query($sql);
}
$conn->close();
?>