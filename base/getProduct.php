<?php
// Подключение к базе данных и проверка соединения (замените на ваши данные)
$conn = mysqli_connect("localhost", "root", "", "bd");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}

// Получение ID товара из запроса
$productId = $_GET['id'];

// Запрос к базе данных для получения данных о товаре
$sql = "SELECT * FROM product WHERE id = $productId";

if ($result = mysqli_query($conn, $sql)) {
    // Получение данных о товаре
    $productData = mysqli_fetch_assoc($result);

    // Отправляем данные о товаре в формате JSON
    header('Content-Type: application/json');
    echo json_encode($productData);
} else {
    echo "Ошибка: " . mysqli_error($conn);
}

// Закрываем соединение с базой данных
mysqli_close($conn);
?>