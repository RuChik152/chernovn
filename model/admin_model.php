<?php 
namespace Nikita;

$group_sec = $mysqli->query("SELECT * FROM `group_sec`");

if (!empty($_POST['query']) && $_POST['query'] == 'insert-users') {

    Users::create()->create_user($_POST['login'], $_POST['password'], $_POST['name'], $pattern_check_user, $mysqli, $_POST['group_id'], $_POST['url']);
}

if (!empty($_POST['query']) && $_POST['query'] == 'insert-group') {
    $group_name = $_POST['group_name'];

    if (!empty($_POST['group_name'])) {
        $query = $mysqli->query("INSERT INTO `group_sec` (`id`, `name`) VALUES (NULL, '$group_name')");
        header('Location:admin');
    }else{
        echo "<p style=\"color: brown;\";>Не заполнены поля</p>";
    }
}

if (!empty($_POST['query']) && !empty($_POST['title']) && !empty($_POST['text'])){
    $title = $_POST['title'];
    $text = $_POST['text'];
    if ($_POST['query'] == 'insert-my_info') {
        $query = $mysqli->query("INSERT INTO `my_info` (`id`, `title`, `text`, `date`) VALUES (NULL, '$title', '$text', current_timestamp())");
        header('Location:admin');
    }

    if ($_POST['query'] == 'update-my_info') {
        $query = $mysqli->query("UPDATE `my_info` SET `title` = '$title', `text` = '$text' WHERE `my_info`.`id` = 1");
        header('Location:admin');
    }
}


?>