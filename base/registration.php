<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $file_path = "e:\\OSPanel\\domains\\localhost\\logs\\error.log";
    file_put_contents($file_path, "");
    error_log("--------------=REG=---------------- \n", 3, "e:\\OSPanel\\domains\\localhost\\logs\\error.log");

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    error_log("input: $username $email $password\n", 3, "e:\\OSPanel\\domains\\localhost\\logs\\error.log");

    $conn = mysqli_connect("localhost", "root", "", "bd");
    if (!$conn) {
        die("Ошибка: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE name = '$username' OR email = '$email'";
    error_log("SQL:: $sql\n", 3, "e:\\OSPanel\\domains\\localhost\\logs\\error.log");

    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) === 0) {
        $sql = "INSERT INTO users (name, password, email) VALUES ('$username','$password','$email')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $newUserId = mysqli_insert_id($conn);

            $response = ["success" => true, "result" => ["id" => $newUserId]];
            error_log("response = $response[0] $response[1]\n " . mysqli_error($conn), 3, "e:\\OSPanel\\domains\\localhost\\logs\\error.log");

            echo json_encode($response);
        } else {
            error_log("Error inserting user: " . mysqli_error($conn), 3, "e:\\OSPanel\\domains\\localhost\\logs\\error.log");

            echo json_encode(["success" => false, "why" => "insert-error"]);
        }
    } else {
        error_log("res: not_new\n", 3, "e:\\OSPanel\\domains\\localhost\\logs\\error.log");
        echo json_encode(["success" => false, "why" => "not-new"]);
    }
    mysqli_close($conn);
    error_log("-----------------------------------\n", 3, "e:\\OSPanel\\domains\\localhost\\logs\\error.log");
}
?>