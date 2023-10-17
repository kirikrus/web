<?php

$file_path = "d:\\OSPanel\\domains\\localhost\\logs\\error.log";
file_put_contents($file_path, "");
error_log("--------------=FAV=---------------- \n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");

$input = file_get_contents('php://input');
$data = json_decode($input);
if ($data) {
    $key = $data->key;
    $userID = $data->userID;
    $productID = $data->productID;
    error_log("input: $key $userID $productID\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
} else {
    error_log("Failed to decode JSON input.\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
}

$conn = mysqli_connect("localhost", "root", "", "bd");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}

switch ($key) {
    case 'get':
        $sql = "SELECT * FROM user_favorites WHERE user_id = $userId";

        if ($result = mysqli_query($conn, $sql)) {
            $Data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $Data[] = $row;
            }
            error_log("get-res: yes\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
            header('Content-Type: application/json');
            echo json_encode(["success" => true, "favorites" => $Data]);
        } else {
            echo "Ошибка: " . mysqli_error($conn);
            error_log("get-res: no\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
            echo json_encode(["success" => false]);
        }
        break;
    case 'add':
        $sql = "SELECT * FROM users WHERE user_id = '$userID' AND product_id = $productID";

        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) === 0) {
            $sql = "INSERT INTO user_favorites (user_id, product_id) VALUES ('$userID','$productID')";

            if ($result = mysqli_query($conn, $sql)) {
                error_log("add-res: yes\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
                header('Content-Type: application/json');
                echo json_encode(["success" => true]);
            } else {
                echo "Ошибка: " . mysqli_error($conn);
                error_log("add-res: no\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
                echo json_encode(["success" => false]);
            }
        }
        break;
    case 'delete':
        $sql = "DELETE FROM user_favorites WHERE (user_id = $userID AND product_id = $productID)";

        if ($result = mysqli_query($conn, $sql)) {
            error_log("del-res: yes\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
            header('Content-Type: application/json');
            echo json_encode(["success" => true]);
        } else {
            echo "Ошибка: " . mysqli_error($conn);
            error_log("del-res: no\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
            echo json_encode(["success" => false]);
        }
        break;
}

mysqli_close($conn);
?>