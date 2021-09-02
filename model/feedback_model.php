<?php
use Nikita\Comunication;

$arr = Comunication::create()->chat_first_select($mysqli);
$query = $mysqli->query("SELECT * FROM `menu` INNER JOIN `main_menu` ON `main_menu`.`id`= `menu`.`parent_id` INNER JOIN `child_menu` ON `child_menu`.`id`=`menu`.`child_id` WHERE `main_menu`.`url`='{$routers->set_route(1)}'");
while($row = $query->fetch_assoc()){
     $src[] = $row;
}

if (!empty($_POST['query']) && $_POST['query'] == 'mail') {
    Comunication::create()->mail($_POST['massege'], $_POST['email']);
}

if (!empty($_POST['query']) && $_POST['query'] == 'chat') {
   $arr = Comunication::create()->chat($_SESSION['user']['id'], $_POST['text'], $mysqli);
}




?>