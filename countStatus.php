<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";
$sql = "SELECT COUNT(status) as count, status 
        FROM Attendance 
        WHERE value_date='$data->value_date'
        GROUP BY status";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
     $data = array() ;
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo "0";
}
$conn->close();
?>