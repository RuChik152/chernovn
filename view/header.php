<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- как то по другому стили не работают -->
    <style type="text/css"><?php include("css/style.css"); ?></style>
    <style type="text/css"><?php include("css/mobile_style.css"); ?></style>
</head>
<body>
    <div class="navbar-menu">
        <div class="navbar-menu-logo">
            <a href="/">Главная</a>
        </div>
        <div class="navbar-menu-logo_item">
        <?php   if (!empty($_SESSION)) {
                echo " <a href=\"/lk\">{$_SESSION['user']['users_name']}</a> <a href=\"/logout\">Выход</a> ";
                if ($_SESSION['user']['group_id'] == 1) {
                    echo " <a href=\"/admin\">Админка</a> ";
                }
            } else {
                echo "<a href=\"/auth\">ВХОД</a>";
            }
        ?>

        </div>
    </div>
<div class="content">