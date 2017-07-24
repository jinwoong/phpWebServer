<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";
$sql = "SELECT m.name, m.team, a.status, a.remarks 
        FROM Attendance a
        JOIN Members m ON m._id = a.member_id 
        WHERE status = '$data->status' AND value_date = '$data->value_date'";
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