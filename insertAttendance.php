<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";
$sql = "INSERT INTO Attendance (member_id, value_date, status, remarks) 
        VALUES ('$data->member_id', '$data->value_date', '$data->status', '$data->remarks') 
        ON DUPLICATE KEY UPDATE status='$data->status', remarks='$data->remarks'";
if($data->member_id){
	$qry = $conn->query($sql);
}
$conn->close();
?>