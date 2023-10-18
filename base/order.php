<?php

$file_path = "..\\logs\\error.log";
file_put_contents($file_path, "");
error_log("--------------=ORD=---------------- \n", 3, "..\\logs\\error.log");

$input = file_get_contents('php://input');
$data = json_decode($input);
$key = "";
if ($data) {
    $key = $data->key;
    $userID = $data->userID;
    $productID = $data->productID;
    error_log("input: $key(" . gettype($key) . ") $userID $productID\n", 3, "..\\logs\\error.log");
} else {
    error_log("Failed to decode JSON input.\n", 3, "..\\logs\\error.log");
}

$conn = mysqli_connect("localhost", "root", "", "bd");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}

switch ($key) {
    case "get":
        $sql = "SELECT p.*, uf.count FROM user_order AS uf JOIN product AS p ON uf.product_id = p.id WHERE uf.user_id = $userID";

        error_log("SQL:: $sql\n", 3, "..\\logs\\error.log");

        if ($result = mysqli_query($conn, $sql)) {
            $Data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $Data[] = $row;
            }
            error_log("get-res: yes\n", 3, "..\\logs\\error.log");
            header('Content-Type: application/json');
            echo json_encode(["success" => true, "order" => $Data]);
        } else {
            echo "Ошибка: " . mysqli_error($conn);
            error_log("get-res: no\n", 3, "..\\logs\\error.log");
            echo json_encode(["success" => false]);
        }
        break;
    case "add":
        $sql = "SELECT * FROM user_order WHERE user_id = '$userID' AND product_id = $productID";
        error_log("SQL:: $sql\n", 3, "..\\logs\\error.log");

        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) === 0) {
            $sql = "INSERT INTO user_order (user_id, product_id, count) VALUES ('$userID', $productID, 1)";
            error_log("SQL:: $sql\n", 3, "..\\logs\\error.log");

            if ($result = mysqli_query($conn, $sql)) {
                error_log("add-res: yes\n", 3, "..\\logs\\error.log");
                header('Content-Type: application/json');
                echo json_encode(["success" => true]);
            }
        } else {
            $sql = "UPDATE user_order SET count = count + 1 WHERE user_id = '$userID' AND product_id = $productID";
            error_log("SQL:: $sql\n", 3, "..\\logs\\error.log");

            if ($result = mysqli_query($conn, $sql)) {
                error_log("add-res: count+1\n", 3, "..\\logs\\error.log");
                header('Content-Type: application/json');
                echo json_encode(["success" => true]);
            }
        }
        break;
    case "delete":
        $sql = "SELECT * FROM user_order WHERE user_id = '$userID' AND product_id = $productID";
        error_log("SQL:: $sql\n", 3, "..\\logs\\error.log");

        $res = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($res);
        if ($row['count'] > 1) {
            $sql = "UPDATE user_order SET count = count - 1 WHERE user_id = '$userID' AND product_id = $productID";
            error_log("SQL:: $sql\n", 3, "..\\logs\\error.log");

            if ($result = mysqli_query($conn, $sql)) {
                error_log("del-res: count-1\n", 3, "..\\logs\\error.log");
                header('Content-Type: application/json');
                echo json_encode(["success" => true]);
            } else {
                echo "Ошибка: " . mysqli_error($conn);
                error_log("del-res: no\n", 3, "..\\logs\\error.log");
                echo json_encode(["success" => false]);
            }
        } else {
            $sql = "DELETE FROM user_order WHERE user_id = '$userID' AND product_id = $productID";
            error_log("SQL:: $sql\n", 3, "..\\logs\\error.log");

            if ($result = mysqli_query($conn, $sql)) {
                error_log("del-res: yes\n", 3, "..\\logs\\error.log");
                header('Content-Type: application/json');
                echo json_encode(["success" => true]);
            } else {
                echo "Ошибка: " . mysqli_error($conn);
                error_log("del-res: no\n", 3, "..\\logs\\error.log");
                echo json_encode(["success" => false]);
            }
        }
        break;
}

mysqli_close($conn);
?>