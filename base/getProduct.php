<?php
$conn = mysqli_connect("localhost", "root", "", "bd");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
$productId = $_GET['id'];

$sql = "SELECT * FROM product WHERE id = $productId";

if ($result = mysqli_query($conn, $sql)) {

    $productData = mysqli_fetch_assoc($result);
    header('Content-Type: application/json');

    echo json_encode($productData);
} else {
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($conn);
?>