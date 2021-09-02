<?php 
include "header.php"; 



if ($routers->set_route(2)) {
    include "{$routers->set_route(1)}/perfomance_view.php";
}else{
    foreach ($res as $key){
        include "{$routers->set_route(1)}/perfomance_main_view.php";    
    }
}





include "footer.php"; ?>