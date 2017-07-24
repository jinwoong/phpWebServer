<?php
include "db.php";
$sql = "SELECT * FROM Members ORDER BY _id DESC";
$result = $conn->query($sql);
echo "It works until result\r\n";
if ($result->num_rows > 0) {
    // output data of each row
    $data = array();
    echo "The result count in bigger than 0\r\n";
    while($row = $result->fetch_assoc()) {
        echo $row;
        $data[] = $row;
    }
    echo $data;
    echo json_encode($data);
} else {
    echo "0";
}
$conn->close();
?>