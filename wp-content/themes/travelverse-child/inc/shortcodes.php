<?php

function travelverse_account_shortcode() {

    if ( ! is_user_logged_in() ) {
        ob_start();
        require get_stylesheet_directory() . '/inc/account/login.php';
        return ob_get_clean();
    }

    ob_start();
    require get_stylesheet_directory() . '/inc/account/dashboard.php';
    return ob_get_clean();
}

add_shortcode('travelverse_account', 'travelverse_account_shortcode');
