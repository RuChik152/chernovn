<?php include "header.php";?>

<div class="about">
    <?php
    $count = '';
    foreach ($res as $key) {
        $count++;
        if ($count % 2 == 1) {
            echo "  <div class=\"about-info_main\">
                        <img src=\"img/no_img.png\" alt=\"Фото\">
                        <div class=\"about-info_main-text\">
                            <p>{$key['text']}</p>
                        </div>
                    </div>";
        }else {
            echo "  <div class=\"about-info_main\">
                        <div class=\"about-info_main-text\">
                            <p>{$key['text']}</p>
                        </div>
                        <img src=\"img/no_img.png\" alt=\"Фото\">
                    </div>";
        }
        }?>

<?php include "footer.php";?>