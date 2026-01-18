<div class="auth-container">

    <!-- LEFT SIDE -->
    <div class="auth-left">
        <a href="<?php echo home_url(); ?>" class="auth-logo">
            <div class="logo-icon">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-white.svg" alt="Logo Icon">
            </div>
            <div class="logo-text-container">
                <div class="logo-text">Bali Top Holiday</div>
                <div class="logo-text-minor">Tour & Travel</div>
            </div>
        </a>
    </div>

    <!-- RIGHT SIDE -->
    <div class="auth-right">
        <div class="auth-form">

            <?php if ( ! is_user_logged_in() ) : ?>

                <h1>Login</h1>
                <p class="auth-register">
                    Belum punya akun?
                    <a href="<?php echo esc_url( wp_registration_url() ); ?>">
                        Register
                    </a>
                </p>

                <?php
                wp_login_form([
                    'redirect'       => site_url('/my-account'),
                    'label_username' => 'Email',
                    'label_password' => 'Password',
                    'label_log_in'   => 'Login',
                    'remember'       => true,
                ]);
                ?>

                <div class="social-login-seperator">
                    <span></span>
                    <p>Atau</p>
                    <span></span>
                </div>
                <a href="http://balitopholiday.test/wp-login.php?wte_login=google" class="google-login">
                    <div class="google-logo">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/google-logo.svg" alt="Google Logo">
                    </div>
                    <span>
                        <span class="inner">
                            Masuk dengan
                        </span> 
                        Google
                    </span>
                </a>
                

            <?php else : ?>

                <?php
                echo do_shortcode('[wp_travel_engine_dashboard]');
                ?>

            <?php endif; ?>

        </div>
    </div>

</div>