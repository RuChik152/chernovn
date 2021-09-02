<?php
namespace Nikita;

include "pattern.php";


class Users {

    protected $login;
    protected $password;
    protected $name;
    protected $user_group_id;
    protected $email;
    private $long = 10;
    protected $val;

    static public function create()
    {
        return new Users;
    }

    function set_login($login)
    {
        $this->login = $login;
        return $this;
    }

    function set_password($password)
    {
        $this->password = $password;
        return $this;
    }

    function set_email($email)
    {
        $this->email = $email;
        return $this;
    }

    function chek_user($value, $pattern)
    {
        $check = str_replace($pattern, '', $value);
        return $check;
    }

    function count_user($login, $mysqli)
    {   
        $query = $mysqli->query("SELECT * FROM `users` WHERE `login` = '{$login}'");
        $row = $query -> num_rows;
        return $row;
    }

    function auth_user($login, $password, $pattern, $mysqli)
    {
        $this->login = $login;
        $this->password = $password;

        $check_login = str_replace($pattern, '', $this->login);
        $check_password = str_replace($pattern, '', $this->password);

        if (!empty($check_login) && !empty($check_password)) {
            $query = $mysqli->query("SELECT users.id, users.login, users.password, users.name as users_name, group_sec.id as group_id FROM `users` INNER JOIN `user_group_sec` ON `users`.`id`=`user_group_sec`.`user_id` INNER JOIN `group_sec` ON `group_sec`.`id`=`user_group_sec`.`group_sec_id` WHERE `users`.`login`='{$check_login}' AND `users`.`password`= MD5('{$check_password}')");
            if ($row = $query->num_rows > 0 ) {
                $row = $query->fetch_assoc();
                $_SESSION['user'] = $row;
                header('Location:main');
            } else {
                echo "<p style=\"color: red;\">Такого пользователя нет</p>";
            }
        }
    }

    function create_user($login, $password, $name, $pattern, $mysqli, $user_group_id = 2, $requ = 'main')
    {
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->user_group_id = $user_group_id;


        if (preg_match('/[$@=:\/!"№;%\':?*()<>]/', $this->login)) {
            echo "<p style=\"color: red;\">Логин сдрержин недопустимы спец. символы символы</p>";
        }elseif(mb_strlen($this->login) < $this->long){
            echo "<p style=\"color: red;\">Логин слишком короткий, должен быть не менее 10 символов</p>";
        }elseif(Users::create()->count_user($this->login, $mysqli) > 0){
            echo "<p style=\"color: red;\">ТАКОЙ ЛОГИН УЖЕ ЕСТЬ</p>";
        }else{
            $check_login = str_replace($pattern, '', $this->login);
        }

        if (!preg_match('/[$@=:\/!Э"№;%\':?*()<>]/', $this->password)) {
            echo "<p style=\"color: red;\">Парроль должен содержать: спец. символы</p>";
        }elseif(mb_strlen($this->password) < $this->long){
            echo "<p style=\"color: red;\">Пароль слишком короткий, должен быть не менее 10 символов</p>";
        }else{
            $check_password = str_replace($pattern, '', $this->password);
        }
        
        if (preg_match('/[$@=:\/!"№;%:?\'*()<>]/', $this->name)) {
            echo "<p style=\"color: red;\">Имя сдрержин недопустимы символы</p>";
        }else{
            $check_name = str_replace($pattern, '', $this->name);
        }
        

        

        if (!empty($check_login) && !empty($check_password) && !empty($check_name)) {
            $query = $mysqli->query("INSERT INTO `users` (`id`, `login`, `password`, `name`, `date`) VALUES (NULL, '{$check_login}', MD5('{$check_password}'), '{$check_name}', current_timestamp())");
            $query = $mysqli->query("SELECT * FROM `users` WHERE `login` = '{$check_login}'");
            $row = $query->fetch_assoc();
            $user_id = $row['id'];
            $query = $mysqli->query("INSERT INTO `user_group_sec` (`user_id`, `group_sec_id`) VALUES ('{$user_id}', '{$this->user_group_id}')");
            $query = $mysqli->query("INSERT INTO `users_info` (`id`) VALUES ('{$user_id}')");
            header("Location:$requ");
        } else {
            echo "<p style=\"color: brown;\";>Не заполнены поля</p>";
        }



    }

    function update_user($arr, $mysqli)
    {
        if (!empty($_POST['user_id'])) {

            $user_id = $arr['user_id'];
            unset($arr['user_id']);
            unset($arr['url']);
    
            $arr = array_diff($arr, array(''));
    
            $str = "UPDATE `users_info` SET";        
            foreach($arr as $key => $value){
                $str .= " `$key` = '$value',";
            }
    
            $str = substr($str, 0, -1);
            $str .= " WHERE users_info.id = $user_id";
            
            $query = $mysqli->query($str);
            
            header('Location:lk');
        }

    }

    function lk_indef($val, $mysqli)
    {   
            if (!empty($val)) {
                $id = $val;
                $query = $mysqli->query("SELECT * FROM `users_info` WHERE `users_info`.`id` = {$id}");
                $row = $query->fetch_assoc();
                return $row;
            }
 
        
    }

}

class Comunication {

    protected $massege;
    protected $email;
    protected $text;
    protected $user_id;

    static function create()
    {
        return new Comunication;
    }

    function mail($massege, $email)
    {
        $this->massege = $massege;
        $this->email = $email;

        if (!empty($this->massege) && !empty($this->email)) {
            if (mail($email, 'Hello, messedge from is my home', $massege)) {
                // сообщение об успешной отправке
            }else {
                // сообщение об не успешной отправке
            }
        }
    }

    function chat($user_id, $text, $mysqli)
    {
        $this->text = $text;
        $this->user_id = $user_id;

        $mysqli->query("INSERT INTO `chat` (`id`, `user_name_id`, `date`, `text`) VALUES (NULL, '{$this->user_id}', current_timestamp(), '{$_POST['text']}')");
        $query = $mysqli->query("SELECT users.name, chat.date, chat.text FROM `chat` LEFT JOIN `users` ON `users`.`id`= `chat`.`user_name_id`");
        while($row = $query->fetch_assoc()){
            $res[] = $row;
        }
        krsort($res);
        return $res;
        header('Location:contact');

    }

    function chat_first_select($mysqli)
    {
        $query = $mysqli->query("SELECT users.name, chat.date, chat.text FROM `chat` LEFT JOIN `users` ON `users`.`id`= `chat`.`user_name_id`");
        while($row = $query->fetch_assoc()){
            $res[] = $row;
        }
        if (!empty($res)) {
            krsort($res);
        }
        
        if (!empty($res)) {
            return $res;
        }
    }
}

class Navigator {

    protected $url = 'main';
    protected $route;
    protected $server_uri;

    public function __construct($server_uri)
    {
        $this->server_uri = $server_uri;
    }

    function route()
    {   
        $this->route = explode("/", $this->server_uri);
        
        if (!empty($this->route[1])) {
            $this->url = $this->route[1];
        }

        return $this->url;
    }

    function security()
    {
        if ($this->url == 'admin') {
            if (empty($_SESSION) or $_SESSION['user']['group_id'] !== '1') {
                $url = "main";
                header('Location:main');
            }
        }
        
        if ($this->url == 'lk') {
            if (empty($_SESSION)) {
                $url = "main";
                header('Location:main');
            }
        }
    }

    function set_route_end(){
        $str = end($this->route);
        return $str;
    }

    function set_route($key)
    {   
        $route_val = '';
        if (!empty($this->route[$key])) {
            $route_val = $this->route[$key];
        }
        return $route_val;
    }

    function link($name = 'Link', $id = '')
    {
        $str = "<a href=\"/{$this->route[1]}/{$this->route[2]}/{$id}\">{$name}</a>";
        return $str;
    }

}

class Routing {
    protected $url = 'main';
    protected $route = array();
    protected $URI;

    public function __construct($URI)
    {
        $this->URI = $URI;
    }

    public function route()
    {
        $this->route = explode("/", $this->URI);

        if (!empty($this->route[1])) {
            $this->url = $this->route[1];
        }

        return $this->url;
    }

    public function print_route()
    {
        return print_r($this->route);
    }

    public function set_route($key)
    {   

        if ($key == 1 && empty($this->route[$key])) {
            $this->route[$key] = 'main';
        }
        if ($key == 2 && empty($this->route[$key])) {
            return false;    
        }
        return $this->route[$key];
    }

}

?>