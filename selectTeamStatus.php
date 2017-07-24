<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";
$sql = "SELECT m.team, m.name, a.status, a.remarks 
        FROM Members m 
        JOIN Attendance a ON a.member_id = m._id
        WHERE team = '$data->team'
        AND value_date = '$data->value_date'";
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