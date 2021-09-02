<?php include "header.php";?>




<?php

echo "<div class=\"content_main\">
<img class=\"main_logo\" src=\"/img/rectangle.svg\">
<div class=\"main_menu\">";
foreach($result as $key => $value){
    echo "<a href=\"{$value['url']}\">{$value['name']}</a>";
}
echo "</div></div>";

?>

<?php include "footer.php";?>