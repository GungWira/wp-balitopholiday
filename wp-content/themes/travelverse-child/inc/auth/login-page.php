<?php
/**
 * Template form login custom
 * Path: wp-content/themes/travelverse-child/inc/auth/login-page.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Inject CSS ke wp_head
add_action( 'wp_head', function () { ?>
<style>
.auth-container {
  display: flex;
  min-height: 100vh;
  font-family: "Inter", sans-serif;
  margin: 0 !important;
  max-width: unset !important;
}
.auth-left {
  flex: 1;
  background-image: url("https://images.unsplash.com/photo-1555400038-63f5ba517a47?w=1200&h=1600&fit=crop");
  background-size: cover;
  background-position: center;
  position: relative;
  min-height: 400px;
}
.auth-left::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(0,80,40,0.3) 0%, rgba(0,0,0,0.2) 100%);
}
.auth-logo {
  position: absolute;
  top: 40px;
  left: 40px;
  z-index: 10;
  display: flex;
  align-items: center;
  gap: 12px;
}
.logo-text-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  gap: 0px;
}
.logo-text-container .logo-text-minor {
  color: white;
  font-size: 12px;
  font-weight: 400;
  letter-spacing: 0.4px;
  font-family: "Instrument Sans", sans-serif;
}
.auth-logo .logo-icon {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.auth-logo .logo-text {
  color: white;
  font-size: 18px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  font-family: "Instrument Sans", sans-serif;
}
.auth-right {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 60px 40px;
  background-color: white;
}
.auth-form {
  width: 100%;
  max-width: 480px;
}
.auth-form h1 {
  font-size: 42px;
  font-weight: 700;
  color: #1a1a1a;
  margin-bottom: 12px;
  letter-spacing: -0.5px;
}
.auth-register {
  font-size: 15px;
  color: #666;
  margin-bottom: 24px;
}
.auth-register a {
  color: #00703c;
  font-weight: 600;
  text-decoration: none;
}
.auth-error {
  background: #fff0f0;
  border: 1px solid #ffcccc;
  color: #cc0000;
  padding: 12px 16px;
  border-radius: 8px;
  font-size: 14px;
  margin-bottom: 20px;
}
.auth-form label {
  display: block;
  font-size: 15px;
  font-weight: 500;
  color: #333;
  margin-bottom: 8px;
}
.login-field {
  margin-bottom: 20px;
}
.auth-form input[type="text"],
.auth-form input[type="password"] {
  width: 100%;
  padding: 14px 16px;
  font-size: 15px;
  border: 1.5px solid #ddd;
  border-radius: 8px;
  transition: all 0.2s;
  font-family: inherit;
  background-color: white;
  box-sizing: border-box;
}
.auth-form input[type="text"]:focus,
.auth-form input[type="password"]:focus {
  outline: none;
  border-color: #00703c;
  box-shadow: 0 0 0 3px rgba(0,112,60,0.1);
}
.login-remember {
  margin-bottom: 20px;
  font-size: 14px;
  color: #333;
}
.auth-form button[type="submit"] {
  width: 100%;
  padding: 16px;
  background-color: #00703c;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.2s;
  margin-bottom: 24px;
}
.auth-form button[type="submit"]:hover {
  background-color: #005a30;
}
.social-login-seperator {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 12px;
  margin-bottom: 20px;
}
.social-login-seperator span {
  width: 100%;
  height: 1px;
  background-color: rgb(225,225,225);
}
.social-login-seperator p {
  font-size: 14px;
  color: #232323;
  opacity: 0.7;
  margin: 0;
}
.google-login {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  gap: 12px;
  padding: 12px 16px;
  border: 1px solid rgb(206,206,206);
  border-radius: 8px;
  background: white;
  cursor: pointer;
  text-decoration: none;
  width: 100%;
  box-sizing: border-box;
}
.google-login:hover { background-color: rgb(244,244,244); }
.google-login .google-logo { width: 36px; height: 36px; display: flex; align-items: center; }
.google-login .google-logo img { width: 100%; height: 100%; object-fit: cover; }
.google-login span { font-size: 16px; font-weight: 500; color: #232323; }
@media (max-width: 968px) {
  .auth-container { flex-direction: column; }
  .auth-left { min-height: 300px; max-height: 300px; }
  .auth-right { padding: 40px 24px; }
}
@media (max-width: 480px) {
  .auth-left { min-height: 250px; max-height: 250px; }
  .auth-right { padding: 32px 20px; }
  .auth-form h1 { font-size: 32px; }
  .google-login span .inner { display: none; }
}

.wp-block-spacer,
.wp-block-group.alignwide{
    display: none !important;
}

.entry-content,
.wp-block-group{
    margin-top: 0 !important;
}
</style>
<?php } );

$redirect_to = isset( $_GET['redirect_to'] )
    ? esc_url( $_GET['redirect_to'] )
    : home_url( '/my-account' );
?>

<div class="auth-container">

    <div class="auth-left">
        <a href="<?php echo home_url(); ?>" class="auth-logo">
            <div class="logo-icon">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-white.svg" alt="Logo">
            </div>
            <div class="logo-text-container">
                <div class="logo-text">Bali Top Holiday</div>
                <div class="logo-text-minor">Tour & Travel</div>
            </div>
        </a>
    </div>

    <div class="auth-right">
        <div class="auth-form">

            <h1>Login</h1>
            <p class="auth-register">
                Belum punya akun?
                <a href="/register">Register</a>
            </p>

            <?php if ( isset( $_GET['login'] ) && $_GET['login'] === 'failed' ) : ?>
                <div class="auth-error">
                    Email atau password salah. Silakan coba lagi.
                </div>
            <?php endif; ?>

            <form method="post" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>">
                <input type="hidden" name="redirect_to" value="<?php echo esc_attr( $redirect_to ); ?>">
                <input type="hidden" name="testcookie" value="1">

                <div class="login-field">
                    <label for="user_login">Email</label>
                    <input type="text" name="log" id="user_login" autocomplete="username" required>
                </div>

                <div class="login-field">
                    <label for="user_pass">Password</label>
                    <input type="password" name="pwd" id="user_pass" autocomplete="current-password" required>
                </div>

                <div class="login-remember">
                    <label>
                        <input type="checkbox" name="rememberme" value="forever"> Ingat saya
                    </label>
                </div>

                <?php wp_nonce_field( 'wplogin' ); ?>

                <button type="submit" name="wp-submit">Login</button>
            </form>

            <div class="social-login-seperator">
                <span></span>
                <p>Atau</p>
                <span></span>
            </div>

            <a href="<?php echo esc_url( home_url( '/wp-login.php?wte_login=google' ) ); ?>" class="google-login">
                <div class="google-logo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/google-logo.svg" alt="Google Logo">
                </div>
                <span><span class="inner">Masuk dengan</span> Google</span>
            </a>

        </div>
    </div>

</div>