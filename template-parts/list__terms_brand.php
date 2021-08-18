<?php

$arResult = [
    
    'title' => [
        'state' => $args['title_state'],
        'text' => $args['title_text'],
    ],
    'terms' => $args['terms']
];

?>

<div class="section brands">
    <div class="container">
             <<?= $arResult['title']['state']; ?> class="section-title" style="display: block;">
                <?= $arResult['title']['text']; ?>
            </<?= $arResult['title']['state']; ?>>

        <div class="brands-block">

            <div class="brands-slider">
                <?php   foreach($arResult['terms'] as $item):         
                $full = wp_get_attachment_url(carbon_get_term_meta($item['id'],  'brand_image' ), 'full');
                $allow = carbon_get_term_meta($item['id'], 'brand_click');
                // carbon_get_term_meta( $term_id, 'banner_image' ),  
                ?>

                <div class="brand">
                    <?php if($allow): ?>
                    <a href="<?= get_term_link( (int)$item['id'], 'product_tag' ) ?>">
                        <img src="<?= $full; ?>" alt="Alt">
                    </a>
                    <?php else: ?>
                    <span>
                        <img src="<?= $full; ?>" alt="Alt">
                    </span>
                    <?php endif; ?>
                </div>

                <?php endforeach; ?>		
               
            </div>

            <div class="slider-arrows brands__slider-arrows">						
                <button class="prev"><img src="<?= _assets(); ?>/img/next.svg" alt="Alt" class="svg"></button>
                <button class="forward"><img src="<?= _assets(); ?>/img/next.svg" alt="Alt" class="svg"></button>						
            </div>

        </div>

    </div>
</div>			