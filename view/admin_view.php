<?php include "header.php"; ?>

<div class="admin_panel">
    <div class="admin_panel-insert">
        <h5>Добавить пользователя</h5>
        <form action="" method="POST">
            <input type="hidden" name="url" value="admin">
            <input type="hidden" name="query" value="insert-users">
            <?php
                foreach($group_sec as $key => $value){
                    echo "
                    <input type=\"radio\" name=\"group_id\" id=\"group_id_{$value['id']}\" value=\"{$value['id']}\">
                    <label for=\"group_id_{$value['id']}\">{$value['name']}</label>";
                }
            ?>
            <input type="text" name="login" placeholder="login">
            <input type="text" name="password" placeholder="password">
            <input type="text" name="name" placeholder="name">
            <input type="submit" value="Отправить">
        </form>
        <h5>Добавить группу</h5>
        <form action="" method="POST">
            <input type="hidden" name="url" value="admin">
            <input type="hidden" name="query" value="insert-group">
            <input type="text" name="group_name" placeholder="Название группы">
            <input type="submit" value="Отправить">
        </form>
        <h5>Добавить информацию в блог</h5>
        <form action="" method="POST">
            <input type="hidden" name="url" value="admin">
            <input type="radio" name="query" value="insert-my_info" id="insert-my_info">
            <label for="insert-my_info">Добавить</label>
            <input type="radio" name="query" value="update-my_info" id="update-my_info">
            <label for="update-my_info">Обновить</label>
            <input type="text" name="title" placeholder="Заголовок">
            <textarea name="text" cols="30" rows="10" placeholder="Текст"></textarea>
            <input type="submit" value="Отправить">
        </form>
    </div>
</div>


<?php include "footer.php"; ?>