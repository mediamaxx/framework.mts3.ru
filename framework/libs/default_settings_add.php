<?php

/* -------------------------------------------------------------------------- */
/*	. Устраняем баг с несуществующей пагинацией страниц
/* -------------------------------------------------------------------------- */

add_filter( 'pre_handle_404', function( $false, $wp_query ) {
    if ( is_singular() && get_query_var( 'page' ) ) {
        $wp_query->set_404();
        status_header( 404 );
        nocache_headers();

        return 'stop';
    }
    return $false;
} , 10, 2 );

// Добавляем поддержку миниатюр постов
add_theme_support( 'post-thumbnails' );

//Включение возможности перезаписи title
add_theme_support( 'title-tag' );


// Разрешение SVG формата
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');




// Перенаправление на основную запись
function template_redirect_attachment() {
    global $post;

    if ( is_attachment() ) {
        wp_redirect( get_permalink( $post->post_parent ), 301 );
    }
}

add_action( 'template_redirect', 'template_redirect_attachment' );




//ошибка микроразметки
function artabr_opengraph_fix_yandex($lang) {
    $lang_prefix = 'prefix="og: http://ogp.me/ns# article: http://ogp.me/ns/article#  profile: http://ogp.me/ns/profile# fb: http://ogp.me/ns/fb#"';
    $lang_fix = preg_replace('!prefix="(.*?)"!si', $lang_prefix, $lang);
    return $lang_fix;
}
add_filter( 'language_attributes', 'artabr_opengraph_fix_yandex',20,1);
