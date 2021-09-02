<?php include "header.php";?>

<div class="auth">
    <ul> 
        <input type="radio" name="radio" id="logon" checked>
        <label for="logon" class="label_logon">Войти</label>
        <input type="radio" name="radio" id="isert">
        <label for="isert" class="label_isert">Регистрация</label>
        <li class="auth_logon">
            <form action="" method="POST" >
                <input type="hidden" name="url" value="auth">
                <input type="hidden" name="query" value="logon">
                <input type="login" name="login" placeholder="Ваш логин">
                <input type="password" name="password" placeholder="Ваш пароль">
                <input type="submit" value="Войти">
            </form>            
        </li>
        <li class="auth_reg">
            <form action="" method="POST">
                <input type="hidden" name="url" value="auth">
                <input type="hidden" name="query" value="insert">
                <input type="text" name="login" placeholder="login">
                <input type="text" name="password" placeholder="password">
                <input type="text" name="name" placeholder="name">
                <input type="submit" value="Отправить">
            </form>
        </li>
    </ul>
    
</div>

<?php include "footer.php";?>