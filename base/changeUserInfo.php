<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $file_path = "d:\\OSPanel\\domains\\localhost\\logs\\error.log";
    file_put_contents($file_path, "");
    error_log("--------------=CHANGE=---------------- \n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");

    $input = file_get_contents('php://input');
    $data = json_decode($input);
    if ($data) {
        $id = $data->id;
        $name = $data->name;
        $password = $data->password;
        $adress = $data->adress;
        $tel = $data->tel;
        error_log("input: $id $name $password $adress $tel\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
    } else {
        error_log("Failed to decode JSON input.\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
    }

    $conn = mysqli_connect("localhost", "root", "", "bd");
    if (!$conn) {
        die("Ошибка: " . mysqli_connect_error());
    }
    
    $err = true;

    $sql = "UPDATE users SET ";
    if ($name) {
        $sql .= " name = '$name', ";
    } 
    if($password) {
        $sql .= " password = '$password', ";
    }
    if($adress) {
        $sql .= " adress = '$adress', ";
    }
    $err = false;
    if (is_numeric($tel) && strlen($tel) == 11 ) {
        $sql .= " tel = '$tel' ";
        $err = false;
    }
    
    $sql = rtrim($sql, ", ");
    $sql .= " WHERE id = $id";
    error_log("SQL:: $sql\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");

    if ($result = mysqli_query($conn, $sql)) {

        error_log("res: change and $err\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
        header('Content-Type: application/json');
        echo json_encode(["tel" => $err]);

    } else {
        error_log("res: not change\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
    }
    mysqli_close($conn);
    error_log("-----------------------------------\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
}
?>