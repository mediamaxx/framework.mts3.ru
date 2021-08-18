<?php
// content btn shortcode register
function popupbtn_add_mce_button() {
    // проверяем права пользователя - может ли он редактировать посты и страницы
    if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
        return; // если не может, то и кнопка ему не понадобится, в этом случае выходим из функции
    }
    // проверяем, включен ли визуальный редактор у пользователя в настройках (если нет, то и кнопку подключать незачем)
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( 'mce_external_plugins', 'popupbtn_add_tinymce_script' );
        add_filter( 'mce_buttons', 'popupbtn_register_mce_button' );
    }
}

// В этом функции указываем ссылку на JavaScript-файл кнопки
function popupbtn_add_tinymce_script( $plugin_array ) {
    $plugin_array['popupbtn_mce_button'] = _assets() . '/js/popup_btn_mce.js'; // popupbtn_mce_button - идентификатор кнопки

    return $plugin_array;
}

// Регистрируем кнопку в редакторе
function popupbtn_register_mce_button( $buttons ) {
    array_push( $buttons, 'popupbtn_mce_button' ); // popupbtn_mce_button - идентификатор кнопки

    return $buttons;
}
