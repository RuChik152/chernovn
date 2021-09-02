<div class="portfolio">
<div class="portfolio_item">
    <img src="<?php echo "/img/no_image_presentation.png"; ?>" alt="ФОТО">
    <div class="portfolio_item-text">
        <h2><?php echo "{$key['title']}"; ?></h2>
        <p><?php echo mb_substr($key['text'], 0, 150)."....."; ?></p>
        <?php echo "<a href=\"{$routers->set_route(1)}/{$key['id']}\">Подробнее</a>";?>       
    </div>
</div>
</div>