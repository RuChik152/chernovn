<?php 
include "header.php";


if(!$routers->set_route(2)){
    echo "<div class=\"feedback_menu\">";
    foreach($src as $key ){
        echo "<a href=\"{$routers->set_route(1)}/{$key['name']}\">{$key['title']}</a>";
    }
    echo "</div>";
}else{
    echo "<div class=\"back\"><a href=\"/{$routers->set_route(1)}\">Назад</a></div>";
}

if ($routers->set_route(2)) {
    $child_view = $routers->set_route(1)."/".$routers->set_route(2)."_view.php";
    include $child_view;
}

// if (empty($route[2])) {
//     echo "<div class=\"feedback_menu\">";
//     foreach($src as $key ){
//         echo "<a href=\"{$route[1]}/{$key['name']}\">{$key['title']}</a>";
//     }
//     echo "</div>";
// }else {
//     echo "<div class=\"back\"><a href=\"/{$route[1]}\">Назад</a></div>";
// }

// if (!empty($route[2])) {
//     $child_view = $route[1]."/".$route[2]."_view.php";
//     include $child_view;
// }



include "footer.php";
?>
