<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$account_url = site_url('/my-account');
$logout_url = wp_logout_url( site_url('/my-account') );

if ( is_user_logged_in() ) {
    $user = wp_get_current_user();
    ?>
    <a href="/my-account" class="tv-user-auth logged-in">
        <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" class="tv-avatar" />
        <span class="tv-username"><?php echo esc_html( $user->display_name ); ?></span>
    </a>
    <?php
} else {
    ?>
    <div class="tv-user-auth logged-out">
        <a href="/login" class="tv-login">Login</a>
        <a href="/register" class="tv-register">Register</a>
    </div>
    <?php
}
