<?php
$conn = mysqli_connect("localhost", "root", "", "bd");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
$userId = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = $userId";

if ($result = mysqli_query($conn, $sql)) {

    $userData = mysqli_fetch_assoc($result);
    header('Content-Type: application/json');

    echo json_encode($userData);
} else {
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($conn);
?>