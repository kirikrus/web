<?php
$conn = mysqli_connect("localhost", "root", "", "bd");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
$which = $_GET['which'];

$file_path = "e:\\OSPanel\\domains\\localhost\\logs\\error.log";
file_put_contents($file_path, "");
error_log("This is an error message $which \n", 3, "e:\\OSPanel\\domains\\localhost\\logs\\error.log");

$sql = "SELECT * FROM product";

if ($which[1] != 0 || $which[2] != 0 || $which[3] != 0 || $which[4] != 0 || $which[5] != 0 || $which[6] != 0 || $which[7] != 0)
    $sql .= " WHERE ";

$count = 0;
for ($i = 1; $i < 9; $i++) {
    if ($which[$i] != 0 || $i == 8) {
        $count++;
        switch ($i) {
            case 1:
                if ($which[2] != 0)
                    $sql .= " (type = '1' OR ";
                else
                    $sql .= " type = '1' AND ";
                break;
            case 2:
                if ($which[1] != 0)
                    $sql .= " type = '2') AND ";
                else
                    $sql .= " type = '2' AND ";
                break;
            case 3:
                $sql .= " (rating >= '1' AND rating < '2') OR ";
                break;
            case 4:
                $sql .= " (rating >= '2' AND rating < '3') OR ";
                break;
            case 5:
                $sql .= " (rating >= '3' AND rating < '4') OR ";
                break;
            case 6:
                $sql .= " (rating >= '4' AND rating < '5') OR ";
                break;
            case 7:
                $sql .= " rating = '5' OR ";
                break;
            case 8:
                $sql = rtrim($sql, " OR ");
                $word = "";
                for ($j = 8; $which[$j] != ''; $j++) {
                    if ($which[$j] != "," && $which[$j] != 1 && $which[$j] != 0) {
                        error_log("буква - $which[$j] \n", 3, "e:\\OSPanel\\domains\\localhost\\logs\\error.log");
                        $word .= $which[$j];
                    }
                }
                error_log("слово - $word \n", 3, "e:\\OSPanel\\domains\\localhost\\logs\\error.log");
                if ($word != "") {
                    if ($count == 1) {
                        $sql .= " WHERE (name LIKE '%$word%'";
                    } else {
                        $sql .= " AND name LIKE '%$word%'";
                    }
                }
                break;
        }
    }

    error_log("skip $i - which = $which[$i]\n", 3, "e:\\OSPanel\\domains\\localhost\\logs\\error.log");
}

$sql = rtrim($sql, " OR ");
$sql = rtrim($sql, " AND ");

if ($count != 1 && $count != 2)
    switch ($which[0]) {
        case 0:
            $sql .= ") ORDER BY price ASC";
            break;
        case 1:
            $sql .= ") ORDER BY price DESC";
            break;
        case 2:
            $sql .= ") ORDER BY name ASC";
            break;
        case 3:
            $sql .= ") ORDER BY name DESC";
            break;
        case 4:
            $sql .= ") ORDER BY rating DESC";
            break;
    }
else
    switch ($which[0]) {
        case 0:
            $sql .= " ORDER BY price ASC";
            break;
        case 1:
            $sql .= " ORDER BY price DESC";
            break;
        case 2:
            $sql .= " ORDER BY name ASC";
            break;
        case 3:
            $sql .= " ORDER BY name DESC";
            break;
        case 4:
            $sql .= " ORDER BY rating DESC";
            break;
    }

error_log("This is an error message $sql \n", 3, "e:\\OSPanel\\domains\\localhost\\logs\\error.log");

if ($result = mysqli_query($conn, $sql)) {

    $productData = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $productData[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($productData);
} else {
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($conn);
?>