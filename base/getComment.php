<?php
// Подключение к базе данных и проверка соединения (замените на ваши данные)
$conn = mysqli_connect("localhost", "root", "", "bd");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}

// Получение ID товара из запроса
$productId = $_GET['id'];

// Запрос к базе данных для получения данных о товаре
$sql = "SELECT c.*, u.name AS user_name FROM comments c
INNER JOIN users u ON c.user_id = u.id
WHERE c.product_id = $productId";

if ($result = mysqli_query($conn, $sql)) {
    // Получение данных о товаре
    $commentsData = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $commentsData[] = $row;
    }
    // Отправляем данные о товаре в формате JSON
    header('Content-Type: application/json');
    echo json_encode($commentsData);
} else {
    echo "Ошибка: " . mysqli_error($conn);
}

// Закрываем соединение с базой данных
mysqli_close($conn);
?>