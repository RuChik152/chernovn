<?php include "header.php";?>

<div class="lk">
    <div class="lk_main-info">
        <img src="<?php echo $arr['img']; ?>" alt="Фото профиля">
        <div class="lk_main-info_data">
            <form action="" method="POST">
                    <input type="hidden" name="url" value="lk">
                    <input type="hidden" name="user_id" value="<?php echo $arr['id']; ?>">
                    <hr>
                    <div class="lk_main-info_data-fio">
                        <input type="checkbox" id="chk" name="chk">
                        <label for="chk" class="chk_lb">Изменить</label>
                        <h2><?php if (!empty($arr['last_name'])) {echo $arr['last_name'];}else {echo "Фамилия";}?></h2>
                        <input type="text" name="last_name" id="last_name" placeholder="Фаимилия" class="last_name">
                        <h2><?php if (!empty($arr['ferst_name'])) {echo $arr['ferst_name'];}else {echo "Имя";}?></h2>
                        <input type="text" name="ferst_name" id="ferst_name" placeholder="Имя">
                        <h2><?php if (!empty($arr['second_name'])) {echo $arr['second_name'];}else {echo "Отчество";}?></h2>
                        <input type="text" name="second_name" id="second_name" placeholder="Отчество">
                    </div>
                    <hr>
                    <div class="lk_main-info_data-birth">
                        <input type="checkbox" id="chk_date" name="chk">
                        <label for="chk_date" class="chk_lb">Изменить</label>
                        <p><?php echo $arr['date']; ?></p>
                        <input type="date" id="date" name="date">
                    </div>
                    <hr>
                    <div class="lk_main-info_date-info">
                        <input type="checkbox" id="chk_info" name="chk">
                        <label for="chk_info" class="chk_lb">Изменить</label>
                        <p><?php if (!empty($arr['info'])) {echo $arr['info'];}else {echo "Расскажите нам о себе";}?></p>
                        <input type="text" id="info" name="info">
                    </div>               
                <input type="submit" value="Сохранить">
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>