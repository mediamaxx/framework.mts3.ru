<?php

$arResult = [
    'title_state' => $args['title_state'],
    'title_text' => $args['title_text'],
    'title_content' => apply_filters('the_content', $args['title_content']),
    'title_video' =>  $args['title_video'],
    'title_advantages' =>  $args['title_advantages'],
    'title_slides' => $args['slides'],
];

?>



<div class="hero">

    <div class="hero__bg"  style="background-image: url('<?= _assets(); ?>/img/hero-bg.jpg');"></div>
    
        <div class="hero-block">	

            <div class="hero__info-block">
                <?php if($arResult['title_video']): ?>
                <a href="<?= $arResult['title_video']; ?>" data-fancybox class="hero__play"><img src="<?= _assets(); ?>/img/play-icon.svg" alt="Alt" class="svg"></a>
                <?php endif; ?>
                <div class="hero__info">
                    <<?= $arResult['title_state'] ?> class="hero__title"><?= $arResult['title_text'] ?></<?= $arResult['title_state'] ?>>
                    <div class="hero__text format-text">
                        <?= $arResult['title_content'] ?>
                    </div>
                    <div class="tizers">
                        <?php foreach ($arResult['title_advantages'] as $item): ?>
                        <div class="tizer">
                            <div class="tizer__icon">
                                <img src="<?= _assets(); ?>/img/guarantee.svg" alt="Alt">
                            </div>
                            <div class="tizer__title"><strong> <?= $item['title'] ?> <br></strong><?= $item['text'] ?></div>
                        </div>
                       <?php endforeach; ?>
                    </div>								
                </div>
            </div>

            <div class="hero-slider-block">
                <div class="hero-slider">
                    <?php foreach ($arResult['title_slides'] as $item): ?>
                    
                    <div class="hero-slide">
                        <div class="container">
                            <img src="<?= wp_get_attachment_url($item['image'], 'full') ?>" alt="Alt">
                            <div class="hero-slide__title"><?= $item['title_bold'] ?><small><?= $item['title'] ?></small></div>
                            <div class="hero-slide__price"><?= $item['price'] ?></div>
                            <a href="<?= $item['btn_link'] ?>" class="btn hero-slide__btn"><?= $item['btn_text'] ?></a>
                        </div>
                    </div>	

                    <?php endforeach; ?>

                </div>
            </div>
    </div>					
</div>

