<?php

$arResult = [
    'subtitle' => $args['subtitle'], 
    'title' => [
        'state' => $args['title_state'],
        'text' => $args['title_text'],
    ],
    'terms' => $args['terms']
];

?>


<div class="section sections">
    <div class="container">
        <?php if($arResult['subtitle']): ?>
        <div class="section-suptitle"><?= $arResult['subtitle'] ?></div>
        <?php endif; ?>

            <<?= $arResult['title']['state']; ?> class="section-title" style="display: block;">
                <?= $arResult['title']['text']; ?>
            </<?= $arResult['title']['state']; ?>>

        
        <div class="sections-row">
            <?php foreach($arResult['terms'] as $item): 
             $full = wp_get_attachment_url($item['image'], 'full');
                
               ?>
            <a href="<?= get_term_link( (int)$item['links'][0]['id'], 'product_cat' ) ?>" class="sections__item">
                <img src="<?= $full; ?>" alt="Alt">
                <span class="sections__title"><?= $item['text'] ?></span>
            </a>
            <?php endforeach; ?>						
        </div>					
    </div>
</div>