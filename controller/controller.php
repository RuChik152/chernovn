<?php

use Nikita\Routing;

$routers = new Routing($_SERVER['REQUEST_URI']);
$routers->route();


$name_model = "model/".$routers->set_route(1)."_model.php";
$name_view = "view/".$routers->set_route(1)."_view.php";

if (file_exists($name_model) && file_exists($name_view)) {
    include $name_model;
    include $name_view;
} else {
    header("Location:404");
}

?>