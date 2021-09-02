<div class="feedback_block">
    <div class="feedback_chat">
            <hr>
            <div class="feedback_chat-pole">
                <?php 
                if (!empty($arr)) {
                    foreach($arr as $key){
                        echo "<p>[{$key['name']}] [{$key['date']}]: {$key['text']}</p>";
                    }
                }
                ?>
            </div>
            <hr>
            <?php 
            
            if (!empty($_SESSION)) {
                echo " 
                <form action=\"\" method=\"POST\">
                    <input type=\"hidden\" name=\"query\" value=\"chat\">
                    <input type=\"text\" name=\"text\">
                    <input type=\"submit\" value=\"Отправить\">
                </form>
                ";
            }else{
                echo "<p>Что бы появилась возможность писать пройдите авторизацию</p>";
            }
           ?>


    </div>
</div>