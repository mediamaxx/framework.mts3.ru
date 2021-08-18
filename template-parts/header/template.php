<?php
/*

Default call:

get_template_part('framework/template-parts/header/template');

*/


?>

<?php

// Массив данных шапки сайта

$arResult = [
    'logo' => [
        'first' => [
            'link' => wp_get_attachment_image_url(carbon_get_theme_option( 'header_logo_first' ), 'full'),
            'alt' => get_post_meta(carbon_get_theme_option( 'header_logo_first' ), '_wp_attachment_image_alt', TRUE),
        ],
        'second' => [
            'link' => wp_get_attachment_image_url(carbon_get_theme_option( 'header_logo_second' ), 'full'),
            'alt' => get_post_meta(carbon_get_theme_option( 'header_logo_second' ), '_wp_attachment_image_alt', TRUE),
        ],
    ],
    'desc' => carbon_get_theme_option( 'header_description' ),
    'phones' => carbon_get_theme_option( 'header_phones' ),
    'mobile' => carbon_get_theme_option( 'header_mobile_phone'  ),
    'mails' => carbon_get_theme_option( 'header_mails' ),
    'social' => carbon_get_theme_option( 'header_list_social' ),
    'button' => [
        'link' => carbon_get_theme_option( 'header_link' ),
        'text' => carbon_get_theme_option( 'header_link_text' ),
    ],
    'address' => carbon_get_theme_option( 'header_address' ),
    'address_red' => carbon_get_theme_option( 'header_address_red' ),
    'hours' => carbon_get_theme_option( 'header_hours' ),
    'catalog_list' => carbon_get_theme_option( 'catalog_list' ),
    'menu_list' => carbon_get_theme_option( 'menu_list' ),
];

?>


<header class="header" <?php if(is_user_logged_in()) echo 'style="margin-top:32px;"' ?>>

    <div class="overlay"></div>

    <div class="top-panel">
        <div class="container">
            <div class="top-panel-block">
                <?php if($arResult['social']): ?>
                <div class="navbar__social-block">
                    <div class="social__title">Мы в соцсетях:</div>
                    <div class="social navbar__social">
                        <?php foreach ($arResult['social'] as $item):
                        $image = wp_get_attachment_image_url($item['header_icon_social'], 'full');
                        $alt = get_post_meta($item['header_icon_social'], '_wp_attachment_image_alt', TRUE);
                        $link = $item['header_link_social'];
                        ?>

                        <a href="<?= $link ?>" target="_blank" class="social__link" rel="nofollow">
                            <img src="<?= $image ?>" alt="<?= $alt ?>" class="svg">
                        </a>

                        <?php endforeach; ?>

                    </div>
                </div>
                <?php endif; ?>
                <nav class="top-menu">
                    <ul class="menu__list"></ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="navbar">
        <div class="container">

            <div class="navbar-block">

                <?php if(!is_front_page()): ?>

                <a href="/" class="logo navbar__logo">
                    <img src="<?= $arResult['logo']['first']['link']; ?>" alt="<?= $arResult['logo']['first']['alt']; ?>">
                </a>

                <?php else: ?>

                <span class="logo navbar__logo">
                    <img src="<?= $arResult['logo']['first']['link']; ?>" alt="<?= $arResult['logo']['first']['alt']; ?>">
                </span>

                <?php endif; ?>

                <div class="menu__toggle">
                    <a href="javascript:void(0);" class="hamburger hamburger--slider">
                        <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                    </a>
                    <span class="menu__toggle-title">Меню</span>
                </div>
                <?php if($arResult['address']): ?>
                <div class="address-block navbar__address-block">
                    <span class="circle-icon"><img src="<?= _assets(); ?>/img/location-icon.svg" alt="Адрес:"></span>
                    <div class="address">
                        <div class="address__location">
                            <?= $arResult['address']; ?>
                        </div>
                        <?php if($arResult['address_red']): ?>
                        <div class="address__location" style="color:#9E1E21; ">
                            <strong><?= $arResult['address_red']; ?></strong>
                        </div>
                        <?php endif; ?>
                        <?php if($arResult['hours']): ?>
                        <div class="address__time">
                            <?= $arResult['hours']; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

                <div class="callback navbar__callback">
                    <?php if($arResult['phones']): ?>
                    <div class="phone__tels">
                        <?php if($arResult['phones'][0]['phone']):
                            $item = $arResult['phones'][0]['phone'];
                            $link = preg_replace( array( '/\s/', '/\(/', '/\)/', '/-/' ), '', $arResult['phones'][0]['phone'] );
                            $text = $item;
                            $text = explode(')', $text );
                            if( $link[0] != '+' ) {
                                $link[0] = '7';
                                $link = '+'.$link;
                            }
                           
                        ?>

                        <a href="tel:<?= $link ?>"><?= $text[0].')' ?><strong><?= $text[1] ?></strong></a>

                        <?php endif; ?>

                        <?php if(isset($arResult['phones'][1])): ?>
                        <div class="callback__popup">
                            <div class="callback__popup-title">
                                Консультации и заказ по телефонам:
                            </div>
                            <div class="phone__tels">
                                <?php
                                foreach ($arResult['phones'] as $item):
                                    $link = preg_replace( array( '/\s/', '/\(/', '/\)/', '/-/' ), '', $item['phone'] );
                                    $text = $item['phone'];
                                    
                                     if( $link[0] != '+' ) {
                                        $link[0] = '7';
                                        $link = '+'.$link;
                                    }


                                ?>
                                        <a href="tel:<?= $link; ?>"><?= $text; ?></a>

                                <?php    endforeach; ?>
                            </div>
                        </div>

                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if($arResult['button']['text']): ?>
                    <button data-href="<?= $arResult['button']['link']; ?>" class="btn btn--bdr callback__btn">
                        <?= $arResult['button']['text']; ?>
                    </button>
                    <?php endif; ?>
                </div>
                <?php if($arResult['mobile']):
                $link = preg_replace( array( '/\s/', '/\(/', '/\)/', '/-/' ), '', $arResult['mobile'] );
                 if( $link[0] != '+' ) {
                                $link[0] = '7';
                                $link = '+'.$link;
                            }
                ?>
                <a href="tel:<?= $link ?>" class="navbar__phone_mobile"><img src="<?= _assets(); ?>/img/phone.svg" alt="Телефон"
                        class="svg"></a>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <div class="menu-block">

        <?php if(!is_front_page()): ?>
        <a href="/" class="mobile-menu__logo">
            <img src="<?= $arResult['logo']['first']['link']; ?>" alt="<?= $arResult['logo']['first']['alt']; ?>">
        </a>
        <?php else: ?>
        <span class="mobile-menu__logo">
            <img src="<?= $arResult['logo']['first']['link']; ?>" alt="<?= $arResult['logo']['first']['alt']; ?>">
        </span>
        <?php endif; ?>

        <a href="javascript:void(0);" class="hamburger hamburger--slider is-active mobile-menu__hamburger">
            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
        </a>
        <div class="container">
            <nav class="menu">
                <ul class="menu__list">

                    <li class="menu__item menu__item--is-catalog hover"><a href="javascript:void(0);"
                            class="menu__link">Каталог товаров</a>
                        <?php
                            if($arResult['catalog_list']):
                        ?>
                        <ul class="submenu">
                            <?php
                            foreach($arResult['catalog_list'] as $item):
                            ?>
                            <li class="submenu__item <?php if(isset($item['catalog_sublist']) && !empty($item['catalog_sublist'])): ?> submenu__item--sub <?php endif; ?> <?php if(isset($item['catalog_image'])): ?> submenu__item--icon <?php endif; ?>">
                                <a <?php if($_SERVER['REQUEST_URI'] != $item['catalog_link']): ?>
                                        href="<?= $item['catalog_link'] ?>"
                                    <?php else: ?>
                                        href="javascript:void(0);"
                                    <?php endif; ?>
                                    class="submenu__link"
                                    <?php if(isset($item['catalog_image'])): ?>
                                    style="background-image: url(<?= wp_get_attachment_image_url($item['catalog_image'], 'full') ?>)"
                                    <?php endif; ?>
                                    >
                                    <?= $item['catalog_name'] ?>
                                </a>
                                <?php if(isset($item['catalog_sublist']) && !empty($item['catalog_sublist'])): ?>

                                <ul class="submenu-2">
                                    <?php
                                    //_vd($item['catalog_sublist']);
                                    foreach($item['catalog_sublist'] as $subitem):
                                    ?>
                                    <li class="submenu-2__item">
                                        <a <?php if($_SERVER['REQUEST_URI'] != $subitem['subcatalog_link']): ?>
                                            href="<?= $subitem['subcatalog_link'] ?>"
                                            <?php else: ?>
                                            href="javascript:void(0);"
                                            <?php endif; ?>
                                            class="submenu-2__link">
                                            <?= $subitem['subcatalog_name'] ?>
                                        </a>
                                        <?php if(isset($subitem['catalog_subsublist']) && !empty($subitem['catalog_subsublist'])): ?>

                                         <ul class="submenu-3">
                                             <?php
                                             foreach($subitem['catalog_subsublist'] as $subsubitem):
                                             ?>
                                            <li class="submenu-3__item">
                                                <a <?php if($_SERVER['REQUEST_URI'] != $subsubitem['subsubcatalog_link']): ?>
                                                    href="<?= $subsubitem['subsubcatalog_link'] ?>"
                                                    <?php else: ?>
                                                    href="javascript:void(0);"
                                                    <?php endif; ?>
                                                        class="submenu-3__link">
                                                    <?= $subsubitem['subsubcatalog_name'] ?>
                                                </a>
                                            </li>
                                             <?php endforeach; ?>
                                        </ul>
                                        <?php endif; ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                            </li>

                            <?php endforeach; ?>
                            <li><a href="javascript:void(0);" class="menu__back">Назад</a></li> 
                        </ul>

                        <?php
                            endif;
                        ?>

                    </li>
                    <?php
                    if($arResult['menu_list']):
                        foreach ($arResult['menu_list'] as $item):
                    ?>

                       <li class="menu__item">
                           <a

                           <?php if($_SERVER['REQUEST_URI'] != $item['menu_link']): ?>
                           href="<?= $item['menu_link'] ?>"
                           <?php else: ?>
                           href="javascript:void(0);"
                           <?php endif; ?>

                           class="menu__link
                           <?php if(isset($item['menu_sublist']) && !empty($item['menu_sublist'])): ?>
                           menu__link--sub
                            <?php endif; ?>
                           ">
                               <?= $item['menu_name'] ?>
                           </a>

                           <?php if(isset($item['menu_sublist']) && !empty($item['menu_sublist'])): ?>
                            <ul class="submenu">


                                <li>
                                <a
                                <?php if($_SERVER['REQUEST_URI'] != $item['menu_link']): ?>
                                    href="<?= $item['menu_link'] ?>"
                                <?php else: ?>
                                    href="javascript:void(0);"
                                <?php endif; ?>

                                class="menu__title">
                                <?= $item['menu_name'] ?>
                                </a>
                                </li>


                                <?php
                                foreach ($item['menu_sublist'] as $subitem):
                                ?>
                                <li class="submenu__item
                                <?php if(isset($subitem['menu_subsublist']) && !empty($subitem['menu_subsublist'])): ?>
                                submenu__item--sub
                                 <?php endif; ?>
                                 <?php if($subitem['submenu_image']): ?>
                                submenu__item--icon
                                <?php endif; ?>
                                ">

                                    <a
                                            <?php if($_SERVER['REQUEST_URI'] != $subitem['submenu_link']): ?>
                                            href="<?= $subitem['submenu_link'] ?>"
                                            <?php else: ?>
                                                href="javascript:void(0);"
                                            <?php endif; ?>

                                            class="submenu__link"

                                        <?php if(isset($subitem['submenu_image'])): ?>
                                            style="background-image: url(<?= wp_get_attachment_image_url($subitem['submenu_image'], 'full') ?>)"
                                        <?php endif; ?>
                                    ><?= $subitem['submenu_name'] ?></a>

                                    <?php if(isset($subitem['menu_subsublist']) && !empty($subitem['menu_subsublist'])): ?>
                                    <ul class="submenu-2">
                                        <?php
                                        foreach ($subitem['menu_subsublist'] as $subsubitem):
                                            ?>
                                        <li class="submenu-2__item">
                                            <a
                                                <?php if($_SERVER['REQUEST_URI'] != $subsubitem['subsubmenu_link']): ?>
                                                    href="<?= $subsubitem['subsubmenu_link'] ?>"
                                                <?php else: ?>
                                                    href="javascript:void(0);"
                                                <?php endif; ?>
                                                class="submenu-2__link">
                                                <?=  $subsubitem['subsubmenu_name'] ?>
                                            </a>

                                            <?php if(isset($subsubitem['menu_subsubsublist']) && !empty($subsubitem['menu_subsubsublist'])): ?>


                                                <ul class="submenu-3">
                                                <?php
                                                     foreach ($subsubitem['menu_subsubsublist'] as $subsubsubitem):
                                                ?>

                                                        <li class="submenu-3__item">                                                        
                                                        <a <?php if($_SERVER['REQUEST_URI'] != $subsubsubitem['subsubsubmenu_link']): ?>
                                                            href="<?= $subsubsubitem['subsubsubmenu_link'] ?>"
                                                        <?php else: ?>
                                                            href="javascript:void(0);"
                                                        <?php endif; ?>
                                                        
                                                         class="submenu-3__link  <?php if($_SERVER['REQUEST_URI'] == $subsubsubitem['subsubsubmenu_link']): ?> active <?php endif; ?>">
                                                         <?=  $subsubsubitem['subsubsubmenu_name'] ?>
                                                        
                                                        </a>
                                                        
                                                        </li>


                                                <?php endforeach; ?>
                                                
                                                </ul>


                                            <?php endif; ?>


                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php endif; ?>

                                </li>
                                <?php endforeach; ?>

                                <li><a href="javascript:void(0);" class="menu__back">Назад</a></li>
                            </ul>
                           <?php endif; ?>

                        </li>


                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>

                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'header_menu_top',
                    'container'       => false,
                    'menu_class'      => 'menu__list menu__list--top',
                    'depth'           => 1,
                    'walker'          => new walker_bem_header_menu_top('menu'),
                ) );
                ?>

            </nav>
            <?php if($arResult['social']): ?>
            <div class="navbar__social-block">
                <div class="social__title">Мы в соцсетях:</div>
                <div class="social navbar__social">
                    <?php foreach ($arResult['social'] as $item):
                    $image = wp_get_attachment_image_url($item['header_icon_social'], 'full');
                    $alt = get_post_meta($item['header_icon_social'], '_wp_attachment_image_alt', TRUE);
                    $link = $item['header_link_social'];
                    ?>

                    <a href="<?= $link ?>" target="_blank" class="social__link">
                        <img src="<?= $image ?>"
                            alt="<?= $alt ?>" class="svg">
                    </a>
                    <?php endforeach; ?>

                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="mobile-menu__bot">


            <?php if($arResult['phones']): ?>
            <div class="phone__tels">
                <?php foreach ($arResult['phones'] as $item):
                $link = preg_replace( array( '/\s/', '/\(/', '/\)/', '/-/' ), '', $item['phone'] );
                $text = $item['phone'];
                $text = explode(')', $text);
                 if( $link[0] != '+' ) {
                                $link[0] = '7';
                                $link = '+'.$link;
                            }
                ?>
                <a href="tel:<?= $link; ?>"> <?= $text[0].')' ?> <strong><?= $text[1] ?></strong></a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <?php if($arResult['address']): ?>
            <div class="address mobile-menu__address">
                <div class="address__location">
                    <?= $arResult['address']; ?>
                </div>
                <?php if($arResult['hours']): ?>
                <div class="address__time">
                    <?= $arResult['hours']; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if($arResult['mails']): ?>
            <div class="mobile-menu__email">

                Email: <?php foreach ($arResult['mails'] as $item):
                $text = $item['mail'];
                ?> <a href="mailto:<?= $text; ?>"><?= $text; ?></a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php if($arResult['button']['text']): ?>

            <button data-href="<?= $arResult['button']['link']; ?>" class="btn mobile-menu__btn"><?= $arResult['button']['text']; ?></button>

            <?php endif; ?>

            <?php if($arResult['social']): ?>
            <div class="social mobile-menu__social">
                <?php foreach ($arResult['social'] as $item):
                $image = wp_get_attachment_image_url($item['header_icon_social'], 'full');
                $alt = get_post_meta($item['header_icon_social'], '_wp_attachment_image_alt', TRUE);
                $link = $item['header_link_social'];
                ?>

                <a href="<?= $link ?>" target="_blank" class="social__link">
                    <img src="<?= $image ?>" alt="<?= $alt ?>" class="svg">
                </a>

                <?php endforeach; ?>

            </div>
            <?php endif; ?>
        </div>
    </div>

</header>