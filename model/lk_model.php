<?php

use Nikita\Users;

$arr = Users::create()->lk_indef($_SESSION['user']['id'], $mysqli);

Users::create()->update_user($_POST, $mysqli);


?>