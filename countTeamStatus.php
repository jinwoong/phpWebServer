<?php
$data = json_decode(file_get_contents("php://input"));
include "db.php";
$sql = "SELECT m.team, a.status, COUNT(a.status) AS count
        FROM Members m
        JOIN Attendance a ON a.member_id = m._id
        WHERE a.value_date = '$data->value_date'
        GROUP BY m.team, a.status
        ORDER BY m.team";
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