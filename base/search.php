<?php
$conn = mysqli_connect("localhost", "root", "", "bd");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}

$which_ = $_GET['which'];

for ($i = 0; $i < count($which_); $i++) {
    if ($which_[$i] == '$') {
        $count = ""; // Reset $count
        $i++; // Move to the next element after '$'
        while ($i < count($which_) && $which_[$i] != '$') {
            $count .= $which_[$i];
            $i++;
        }
        $which[$j] = ($count === '') ? 0 : $count; // Store the extracted value in $which array, converting empty string to 0
        $j++;
    } elseif ($which_[$i] != ",") {
        $which[$j] = $which_[$i];
        $j++;
    }
}

$type = "";
$rating = "";
$word = "";
$price = "";

$file_path = "d:\\OSPanel\\domains\\localhost\\logs\\error.log";
file_put_contents($file_path, "");
error_log("--------------=SORT/SERCH=---------------- \n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");

$sql = "SELECT * FROM product";

for ($i = 1; $i < count($which); $i++) {
    if ($which[$i] != 0 || $i == 10)
        switch ($i) {
            case 1:
                if ($which[2] != 0)
                    $type .= " type = '1' OR ";
                else
                    $type .= " type = '1' ";
                break;
            case 2:
                    $type .= " type = '2' ";
                break;
            case 3:
                $rating .= " (rating >= '1' AND rating < '2') OR ";
                break;
            case 4:
                $rating .= " (rating >= '2' AND rating < '3') OR ";
                break;
            case 5:
                $rating .= " (rating >= '3' AND rating < '4') OR ";
                break;
            case 6:
                $rating .= " (rating >= '4' AND rating < '5') OR ";
                break;
            case 7:
                $rating .= " rating = '5' OR ";
                break;
            case 8:

                break;
            case 9:

                break;
            case 10:
                $rating = rtrim($rating, " OR ");
                for ($j = 10; $j < count($which); $j++) {
                        error_log("буква - $which[$j] - ".gettype($which[$j])." \n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
                        $word .= $which[$j];
                    }
                error_log("слово - $word \n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
                if ($word != "")
                        $word = " name LIKE '%$word%'";
                break;
        }
    error_log(" - skip $i - which = $which[$i]\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
}

error_log("type = $type rating = $rating word = $word\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");

if($type != "" || $rating!="" || $word != "")
    $sql .= " WHERE ";

if($type != "")
    $sql .= " ( " . $type . " ) AND ";

if($rating != "")
    $sql .= " ( " . $rating . " ) AND ";

if($word != "")
    $sql .= $word . " AND ";

    $sql = rtrim($sql, " AND ");

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

error_log("SQL:: $sql \n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
error_log("--------------------------------------\n", 3, "d:\\OSPanel\\domains\\localhost\\logs\\error.log");
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