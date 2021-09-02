<?php 

if ($routers->set_route(2)) {
    $query = $mysqli->query("SELECT * FROM `portfolio` WHERE `portfolio`.`id` = {$routers->set_route(2)}");
    $res = $query->fetch_assoc();
}else {
    $query = $mysqli->query("SELECT * FROM `portfolio`");
    while ($row = $query->fetch_assoc()) {
            $res[] = $row;
        }
}

?>