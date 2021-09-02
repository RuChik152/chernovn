<?php 

$query = $mysqli->query("SELECT my_info.text FROM `my_info`");
while ($row = $query->fetch_assoc()) {
    $res[] = $row;
}


?>