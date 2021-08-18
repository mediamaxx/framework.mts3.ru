<?php

$arResult = [
    'subtitle' => $args['subtitle'], 
    'title' => [
        'state' => $args['title_state'],
        'text' => $args['title_text'],
    ],
    'content' => applY_filters('the_content', $args['content']),
    'terms' => $args['terms']
];

?>


<div class="section categories">
    <div class="container">
        <?php if($arResult['subtitle']): ?>
        <div class="section-suptitle"><?= $arResult['subtitle'] ?></div>
        <?php endif; ?>
            <<?= $arResult['title']['state']; ?> class="section-title" style="display: block;">
                <?= $arResult['title']['text']; ?>
            </<?= $arResult['title']['state']; ?>>
            <?php if($arResult['content']): ?>
            <div class="section-info format-text">
                 <?= $arResult['content'] ?>
            </div>
            <?php endif; ?>
    
        <div class="categories-block">
        <?php foreach($arResult['terms'] as $item): 
             $full = wp_get_attachment_url($item['image'], 'full');


                if( $item['links'][0]['type'] == 'term' ) {
                 
                    $link = get_term_link( (int)$item['links'][0]['id'], 'product_cat' );
                } else {
                    $link = get_the_permalink( (int)$item['links'][0]['id'] );
                }
               ?>

            <a href="<?= $link ?>" class="category">
                <span class="category__icon">
                    <img src="<?= $full; ?>" alt="Alt">
                </span>
                <span class="category__title"><?= $item['text'] ?></span>
            </a>
            <?php endforeach; ?>		
            
            <span class="category category--more"><a href="/shop/">Перейти к каталогу товаров</a></span>
        </div>
    </div>
</div>

