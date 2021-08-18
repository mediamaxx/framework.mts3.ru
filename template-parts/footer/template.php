<?php

$arResult = [
    'logo' => [
        'first' => [
            'link' => wp_get_attachment_image_url(carbon_get_theme_option( 'footer_logo_first' ), 'full'),
            'alt' => get_post_meta(carbon_get_theme_option( 'footer_logo_first' ), '_wp_attachment_image_alt', TRUE),
        ],
    ],  
    'phones' => carbon_get_theme_option( 'footer_phones' ), 
    'social' => carbon_get_theme_option( 'footer_list_social' ),
    'address' => carbon_get_theme_option( 'footer_address' ),   
    'hours' => carbon_get_theme_option( 'footer_hours' ),
    'copy' => carbon_get_theme_option( 'copy' ),
];

?>

<footer class="footer">
    <div class="footer-top">

        <div class="container">
            <div class="footer-top-block">

                <div class="footer-head">

                <?php if(!is_front_page()): ?>

                <a href="/" class="logo footer__logo">
                    <img src="<?= $arResult['logo']['first']['link']; ?>" alt="<?= $arResult['logo']['first']['alt']; ?>">
                </a>

                <?php else: ?>

                <span class="logo footer__logo">
                    <img src="<?= $arResult['logo']['first']['link']; ?>" alt="<?= $arResult['logo']['first']['alt']; ?>">
                </span>

                <?php endif; ?>															
                <?php if($arResult['social']): ?>
                        <div class="social footer__social">	
                        <?php foreach ($arResult['social'] as $item):
                $image = wp_get_attachment_image_url($item['footer_icon_social'], 'full');
                $alt = get_post_meta($item['footer_icon_social'], '_wp_attachment_image_alt', TRUE);
                $link = $item['footer_link_social'];
                ?>

                <a href="<?= $link ?>" target="_blank" class="social__link" rel="nofollow">
                    <img src="<?= $image ?>" alt="<?= $alt ?>" class="svg">
                </a>	
                <?php endforeach; ?>		
                        </div>											
                <?php endif; ?>
                </div>

                <div class="footer-menu-block">		

                    <div class="footer-menu-top">								
                        <?php
                        wp_nav_menu( array(
                            'theme_location'  => 'footer_menu_top',
                            'container'       => false,
                            'menu_class'      => 'footer-menu__list',
                            'depth'           => 1,
                            'walker'          => new walker_bem_footer_menu_top('footer-menu'),
                        ) );
                        ?>		
                    </div>	

                    <div class="footer-menu-bot">							
                        <?php
                        wp_nav_menu( array(
                            'theme_location'  => 'footer_menu_bottom',
                            'container'       => false,
                            'menu_class'      => 'footer-menu__list',
                            'depth'           => 1,
                            'walker'          => new walker_bem_footer_menu_bottom('footer-menu'),
                        ) );
                        ?>
                    </div>	

                </div>

                <div class="footer-contacts">
                <?php if($arResult['phones']): ?>
                    <div class="phone__tels">
                        <?php
                        foreach ($arResult['phones'] as $item):
                            
                            $link = preg_replace( array( '/\s/', '/\(/', '/\)/', '/-/' ), '', $item['phone'] );
                            $text = $item['phone'];
                            $text = explode(')', $text );
                            
                             if( $link[0] != '+' ) {
                                $link[0] = '7';
                                $link = '+'.$link;
                            }


                        ?>
                        <a href="tel:<?= $link ?>"><?= $text[0].')' ?> <strong><?= $text[1] ?></strong></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <?php if($arResult['address']): ?>
                    <div class="address footer__address">
                        <div class="address__location">
                            <?= $arResult['address']; ?>
                        </div>
                        <div class="address__time">
                        <?= $arResult['hours']; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>					

            </div>
        </div>
    </div>
    <div class="footer-bot">
        <div class="container">
            <div class="footer-bot-block">
                <div class="copy">
                    <?= $arResult['copy'] ?>
                </div>							
                <a href="https://mtsite.ru" target="_blank" rel="nofollow" class="developer">							
                    <span class="developer__logo"><img src="<?= _assets(); ?>/img/multisite.svg" alt="multi site"></span>
                    <span class="developer__title">Сделано в веб-студии "Мультисайт"<br>Разработка и продвижение сайтов.</span>
                </a>						
            </div>
        </div>
        <div class="container">				
            <div class="recapcha-copy copy">
                        Этот сайт защищен reCAPTCHA и применяются <a target="_blank" rel="nofollow" href="https://policies.google.com/privacy">Политика конфиденциальности</a> и <a target="_blank" rel="nofollow" href="https://policies.google.com/terms">Условия использования</a> Google.
            </div>
            <br>
        </div>
    </div>
</footer>	

<button class="up"><img src="<?= _assets(); ?>/img/up.svg" alt="Alt" class="svg"></button>	

<div class="hidden">

    <div class="popup" id="callback">		

        <button class="popup__close"><img src="<?= _assets(); ?>/img/close.svg" alt="Alt" class="svg"></button>	

        <div class="popup__title">Оставьте заявку</div>			
        <div class="popup__subtitle">Наш менеджер свяжется с вами для <br>уточнения информации</div>

        <?= do_shortcode('[contact-form-7 id="27" title="Всплывающая ФОС" html_class="form"]') ?>
        <script>                            
            document.querySelector('.popup  .check-wrapper .wpcf7-list-item > label').classList.add('custom-checkbox');
            document.querySelector('.popup  .check-wrapper .custom-checkbox').insertBefore(document.createElement('span'), document.querySelector('.popup .check-wrapper .wpcf7-list-item .custom-checkbox .wpcf7-list-item-label'));
            document.querySelector('.popup  .check-wrapper .wpcf7-list-item > label > input').classList.add('input-check');
        </script>
        </div>			

    <a href="#thanks" data-fancybox></a>					

    <div class="popup popup--is-thanks" id="thanks">		
        <button class="popup__close"><img src="<?= _assets(); ?>/img/close.svg" alt="Alt" class="svg"></button>	
        <div class="popup__title">Спасибо!</div>
        <div class="popup__subtitle">Ваша заявка принята, в ближайшее время <br>с Вами свяжется наш специалист</div>	
    </div>					
    
</div>			

