<?php
namespace Nikita;

if (!empty($_POST['query']) && $_POST['query'] == 'logon') {

    Users::create()->auth_user($_POST['login'], $_POST['password'], $pattern_check_user, $mysqli);
    
}


if (!empty($_POST['query']) && $_POST['query'] == 'insert') {

    Users::create()->create_user($_POST['login'], $_POST['password'], $_POST['name'], $pattern_check_user, $mysqli);

}



?>