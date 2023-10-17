<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $file_path = "d:\\OSPanel\\domains\\localhost\\logs\\error.log";
    file_put_contents($file_path, "");
    error_log("--------------=AUTH=---------------- \n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");

    $input = file_get_contents('php://input');
    $data = json_decode($input);
    if ($data) {
        $email = $data->email;
        $password = $data->password;
        error_log("input: $email $password\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
    } else {
        error_log("Failed to decode JSON input.\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
    }

    $conn = mysqli_connect("localhost", "root", "", "bd");
    if (!$conn) {
        die("Ошибка: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    error_log("SQL:: $sql\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");

    if (mysqli_num_rows($result = mysqli_query($conn, $sql))>0) {

        $userData = mysqli_fetch_assoc($result);

        header('Content-Type: application/json');

        echo json_encode(["success" => true, "userData" => $userData]);
    } else {
        error_log("res: new\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
        echo json_encode(["success" => false]);
    }
    mysqli_close($conn);
    error_log("-----------------------------------\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
}
?>