<?php
$file_path = "..\\logs\\error.log";
file_put_contents($file_path, "");
error_log("--------------=DELETE=---------------- \n", 3, "..\\logs\\error.log");

$conn = mysqli_connect("localhost", "root", "", "bd");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}

$input = file_get_contents('php://input');
$data = json_decode($input);
if ($data) {
    $id = $data->id;
    error_log("input: $id\n", 3, "..\\logs\\error.log");
}

$sql = "DELETE FROM users WHERE id = $id";
error_log("SQL:: $sql\n", 3, "..\\logs\\error.log");

if ($result = mysqli_query($conn, $sql)) {
    error_log("res: true\n", 3, "..\\logs\\error.log");
    header('Content-Type: application/json');
    echo json_encode(["success" => true]);
} else {
    error_log("res: false\n", 3, "..\\logs\\error.log");
    echo json_encode(["success" => false]);
}
error_log("------------------------------------------\n", 3, "..\\logs\\error.log");
mysqli_close($conn);
?>