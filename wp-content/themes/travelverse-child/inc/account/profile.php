<?php
/**
 * Profile Settings Page
 * Path: wp-content/themes/travelverse-child/inc/account/profile.php
 */

if ( ! is_user_logged_in() ) {
    echo '<p>Silakan login untuk mengakses pengaturan.</p>';
    return;
}

$user       = wp_get_current_user();
$user_id    = $user->ID;
$first_name = get_user_meta( $user_id, 'first_name', true );
$last_name  = get_user_meta( $user_id, 'last_name', true );
$phone      = get_user_meta( $user_id, 'phone', true );
$email      = $user->user_email;
$avatar_url = get_user_meta( $user_id, 'profile_picture', true );
$initial    = mb_strtoupper( mb_substr( $first_name ?: $user->display_name, 0, 1 ) );

// Handle form submit
$success_message = '';
$error_message   = '';

if ( isset( $_POST['bth_profile_nonce'] ) && wp_verify_nonce( $_POST['bth_profile_nonce'], 'bth_update_profile' ) ) {

    $new_first_name = sanitize_text_field( $_POST['first_name'] ?? '' );
    $new_last_name  = sanitize_text_field( $_POST['last_name'] ?? '' );
    $new_phone      = sanitize_text_field( $_POST['phone'] ?? '' );
    $old_password   = $_POST['old_password'] ?? '';
    $new_password   = $_POST['new_password'] ?? '';
    $confirm_pass   = $_POST['confirm_password'] ?? '';

    $errors = [];

    // Update nama & telepon
    wp_update_user( [
        'ID'           => $user_id,
        'first_name'   => $new_first_name,
        'last_name'    => $new_last_name,
        'display_name' => trim( $new_first_name . ' ' . $new_last_name ),
    ] );
    update_user_meta( $user_id, 'first_name', $new_first_name );
    update_user_meta( $user_id, 'last_name', $new_last_name );
    update_user_meta( $user_id, 'phone', $new_phone );

    // Update password jika diisi
    if ( ! empty( $old_password ) || ! empty( $new_password ) ) {
        if ( empty( $old_password ) ) {
            $errors[] = 'Masukkan password lama untuk mengubah password.';
        } elseif ( ! wp_check_password( $old_password, $user->user_pass, $user_id ) ) {
            $errors[] = 'Password lama tidak sesuai.';
        } elseif ( strlen( $new_password ) < 8 ) {
            $errors[] = 'Password baru minimal 8 karakter.';
        } elseif ( $new_password !== $confirm_pass ) {
            $errors[] = 'Konfirmasi password tidak cocok.';
        } else {
            wp_set_password( $new_password, $user_id );
            wp_set_auth_cookie( $user_id );
        }
    }

    if ( empty( $errors ) ) {
        $success_message = 'Profil berhasil diperbarui.';
        $user       = get_userdata( $user_id );
        $first_name = get_user_meta( $user_id, 'first_name', true );
        $last_name  = get_user_meta( $user_id, 'last_name', true );
        $phone      = get_user_meta( $user_id, 'phone', true );
        $initial    = mb_strtoupper( mb_substr( $first_name ?: $user->display_name, 0, 1 ) );
    } else {
        $error_message = implode( ' ', $errors );
    }
}
?>

<div class="bth-acc-container">

    <?php require __DIR__ . '/parts/sidebar.php'; ?>

    <main class="bth-acc-main">
        <h1 class="bth-acc-title">Pengaturan Profil</h1>

        <div class="bth-profile-wrapper">

            <!-- Avatar Section -->
            <div class="bth-profile-avatar-section">
                <div class="bth-profile-avatar-wrap">
                    <?php if ( $avatar_url ) : ?>
                        <img src="<?php echo esc_url( $avatar_url ); ?>" alt="Foto Profil" class="bth-profile-avatar-img">
                    <?php else : ?>
                        <div class="bth-profile-avatar-initial">
                            <?php echo esc_html( $initial ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="bth-profile-avatar-info">
                    <p class="bth-profile-avatar-name"><?php echo esc_html( trim( $first_name . ' ' . $last_name ) ?: $user->display_name ); ?></p>
                    <p class="bth-profile-avatar-email"><?php echo esc_html( $email ); ?></p>
                </div>
            </div>

            <?php if ( $success_message ) : ?>
                <div class="bth-profile-alert bth-profile-alert--success">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                    <?php echo esc_html( $success_message ); ?>
                </div>
            <?php endif; ?>

            <?php if ( $error_message ) : ?>
                <div class="bth-profile-alert bth-profile-alert--error">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12" y2="16"/></svg>
                    <?php echo esc_html( $error_message ); ?>
                </div>
            <?php endif; ?>

            <form method="post" class="bth-profile-form">
                <?php wp_nonce_field( 'bth_update_profile', 'bth_profile_nonce' ); ?>

                <!-- Informasi Pribadi -->
                <div class="bth-profile-card">
                    <div class="bth-profile-card__header">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                        Informasi Pribadi
                    </div>
                    <div class="bth-profile-card__body">
                        <div class="bth-profile-row">
                            <div class="bth-profile-field">
                                <label for="first_name">Nama Depan</label>
                                <input type="text" id="first_name" name="first_name"
                                    value="<?php echo esc_attr( $first_name ); ?>"
                                    placeholder="Nama depan" required>
                            </div>
                            <div class="bth-profile-field">
                                <label for="last_name">Nama Belakang</label>
                                <input type="text" id="last_name" name="last_name"
                                    value="<?php echo esc_attr( $last_name ); ?>"
                                    placeholder="Nama belakang">
                            </div>
                        </div>
                        <div class="bth-profile-field">
                            <label for="email">Email</label>
                            <div class="bth-profile-input-locked">
                                <input type="email" id="email" value="<?php echo esc_attr( $email ); ?>" disabled>
                                <span class="bth-profile-locked-badge">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                    Tidak dapat diubah
                                </span>
                            </div>
                        </div>
                        <div class="bth-profile-field" style="margin-bottom:0">
                            <label for="phone">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone"
                                value="<?php echo esc_attr( $phone ); ?>"
                                placeholder="08xxxxxxxxxx">
                        </div>
                    </div>
                </div>

                <!-- Ubah Password -->
                <div class="bth-profile-card">
                    <div class="bth-profile-card__header">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
                        Ubah Password
                        <span class="bth-profile-card__optional">Opsional</span>
                    </div>
                    <div class="bth-profile-card__body">
                        <p class="bth-profile-card__hint">Kosongkan jika tidak ingin mengubah password.</p>
                        <div class="bth-profile-field">
                            <label for="old_password">Password Lama</label>
                            <div class="bth-profile-input-eye">
                                <input type="password" id="old_password" name="old_password"
                                    placeholder="Masukkan password saat ini">
                                <button type="button" class="bth-eye-toggle" data-target="old_password" tabindex="-1">
                                    <svg class="eye-open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    <svg class="eye-closed" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                                </button>
                            </div>
                        </div>
                        <div class="bth-profile-row">
                            <div class="bth-profile-field" style="margin-bottom:0">
                                <label for="new_password">Password Baru</label>
                                <div class="bth-profile-input-eye">
                                    <input type="password" id="new_password" name="new_password"
                                        placeholder="Minimal 8 karakter">
                                    <button type="button" class="bth-eye-toggle" data-target="new_password" tabindex="-1">
                                        <svg class="eye-open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                        <svg class="eye-closed" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="bth-profile-field" style="margin-bottom:0">
                                <label for="confirm_password">Konfirmasi Password</label>
                                <div class="bth-profile-input-eye">
                                    <input type="password" id="confirm_password" name="confirm_password"
                                        placeholder="Ulangi password baru">
                                    <button type="button" class="bth-eye-toggle" data-target="confirm_password" tabindex="-1">
                                        <svg class="eye-open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                        <svg class="eye-closed" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="bth-password-strength" id="password-strength" style="display:none">
                            <div class="bth-password-strength__bar">
                                <div class="bth-password-strength__fill" id="strength-fill"></div>
                            </div>
                            <span class="bth-password-strength__label" id="strength-label"></span>
                        </div>
                    </div>
                </div>

                <div class="bth-profile-actions">
                    <button type="submit" class="bth-profile-save-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </main>
</div>

<style>
.bth-profile-wrapper {
    display: flex;
    flex-direction: column;
    gap: 20px;
}
.bth-profile-avatar-section {
    display: flex;
    align-items: center;
    gap: 20px;
    background: #fff;
    border: 1px solid #e8eaed;
    border-radius: 16px;
    padding: 24px;
}
.bth-profile-avatar-wrap { flex-shrink: 0; }
.bth-profile-avatar-img {
    width: 72px; height: 72px;
    border-radius: 50%; object-fit: cover;
    border: 3px solid #e8f5e9;
}
.bth-profile-avatar-initial {
    width: 72px; height: 72px;
    border-radius: 50%;
    background: linear-gradient(135deg, #075d37, #054c2c);
    color: #fff; font-size: 28px; font-weight: 700;
    display: flex; align-items: center; justify-content: center;
    border: 3px solid #e8f5e9;
}
.bth-profile-avatar-name { font-size: 17px; font-weight: 600; color: #202124; margin: 0 0 4px; }
.bth-profile-avatar-email { font-size: 13px; color: #5f6368; margin: 0; }
.bth-profile-alert {
    display: flex; align-items: center; gap: 10px;
    padding: 14px 18px; border-radius: 10px;
    font-size: 14px; font-weight: 500;
}
.bth-profile-alert svg { width: 18px; height: 18px; flex-shrink: 0; }
.bth-profile-alert--success { background: #e8f5e9; color: #075d37; border: 1px solid #a5d6a7; }
.bth-profile-alert--error { background: #fff0f0; color: #c62828; border: 1px solid #ffcdd2; }
.bth-profile-card { background: #fff; border: 1px solid #e8eaed; border-radius: 16px; overflow: hidden; margin-top: 32px; margin-bottom: 32px; }
.bth-profile-card__header {
    display: flex; align-items: center; gap: 10px;
    padding: 18px 24px; font-size: 13px; font-weight: 700;
    color: #202124; text-transform: uppercase; letter-spacing: 0.5px;
    background: #f8f9fa; border-bottom: 1px solid #e8eaed;
}
.bth-profile-card__header svg { width: 18px; height: 18px; color: #075d37; flex-shrink: 0; }
.bth-profile-card__optional {
    margin-left: auto; font-size: 11px; font-weight: 500;
    color: #9aa0a6; text-transform: none; letter-spacing: 0;
    background: #f1f3f4; padding: 3px 8px; border-radius: 20px;
}
.bth-profile-card__hint { font-size: 13px; color: #9aa0a6; margin: 0 0 20px; }
.bth-profile-card__body { padding: 24px; }
.bth-profile-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.bth-profile-field { display: flex; flex-direction: column; gap: 8px; margin-bottom: 20px; }
.bth-profile-field label { font-size: 14px; font-weight: 500; color: #3c4043; }
.bth-profile-field input[type="text"],
.bth-profile-field input[type="email"],
.bth-profile-field input[type="password"],
.bth-profile-field input[type="tel"] {
    padding: 12px 16px; font-size: 14px;
    border: 1.5px solid #e8eaed; border-radius: 10px;
    transition: all 0.2s; background: #fff; color: #202124;
    width: 100%; box-sizing: border-box; font-family: inherit;
}
.bth-profile-field input:focus {
    outline: none; border-color: #075d37;
    box-shadow: 0 0 0 3px rgba(7, 93, 55, 0.08);
}
.bth-profile-field input:disabled { background: #f8f9fa; color: #9aa0a6; cursor: not-allowed; }
.bth-profile-input-locked { position: relative; }
.bth-profile-input-locked input { padding-right: 160px !important; }
.bth-profile-locked-badge {
    position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
    display: flex; align-items: center; gap: 4px;
    font-size: 11px; font-weight: 500; color: #9aa0a6;
    background: #f1f3f4; padding: 4px 8px; border-radius: 20px; white-space: nowrap;
}
.bth-profile-locked-badge svg { width: 12px; height: 12px; }
.bth-profile-input-eye { position: relative; }
.bth-profile-input-eye input { padding-right: 48px !important; }
.bth-eye-toggle {
    position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
    background: none; border: none; cursor: pointer; padding: 0;
    color: #9aa0a6; display: flex; align-items: center; transition: color 0.2s;
}
.bth-eye-toggle:hover { color: #075d37; }
.bth-eye-toggle svg { width: 18px; height: 18px; }
.bth-password-strength { display: flex; align-items: center; gap: 12px; margin-top: 12px; }
.bth-password-strength__bar { flex: 1; height: 4px; background: #e8eaed; border-radius: 2px; overflow: hidden; }
.bth-password-strength__fill { height: 100%; border-radius: 2px; transition: width 0.3s, background-color 0.3s; width: 0%; }
.bth-password-strength__label { font-size: 12px; font-weight: 600; white-space: nowrap; }
.bth-profile-actions { display: flex; justify-content: flex-end; }
.bth-profile-save-btn {
    display: flex; align-items: center; gap: 8px;
    padding: 14px 32px; background: #075d37; color: #fff;
    border: none; border-radius: 10px; font-size: 15px; font-weight: 600;
    cursor: pointer; transition: background 0.2s, transform 0.1s, box-shadow 0.2s;
    box-shadow: 0 2px 8px rgba(7, 93, 55, 0.25); font-family: inherit;
}
.bth-profile-save-btn svg { width: 18px; height: 18px; }
.bth-profile-save-btn:hover { background: #054c2c; transform: translateY(-1px); box-shadow: 0 4px 16px rgba(7, 93, 55, 0.35); }
.bth-profile-save-btn:active { transform: translateY(0); }
@media (max-width: 600px) {
    .bth-profile-row { grid-template-columns: 1fr; }
    .bth-profile-avatar-section { flex-direction: column; text-align: center; }
    .bth-profile-actions { justify-content: stretch; }
    .bth-profile-save-btn { width: 100%; justify-content: center; }
    .bth-profile-input-locked input { padding-right: 16px !important; }
    .bth-profile-locked-badge { display: none; }
}
</style>

<script>
(function () {
    document.querySelectorAll('.bth-eye-toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var input    = document.getElementById( this.getAttribute('data-target') );
            var eyeOpen  = this.querySelector('.eye-open');
            var eyeClosed = this.querySelector('.eye-closed');
            if (input.type === 'password') {
                input.type = 'text';
                eyeOpen.style.display = 'none';
                eyeClosed.style.display = '';
            } else {
                input.type = 'password';
                eyeOpen.style.display = '';
                eyeClosed.style.display = 'none';
            }
        });
    });

    var newPassInput  = document.getElementById('new_password');
    var strengthWrap  = document.getElementById('password-strength');
    var strengthFill  = document.getElementById('strength-fill');
    var strengthLabel = document.getElementById('strength-label');

    if (newPassInput) {
        newPassInput.addEventListener('input', function () {
            var val = this.value;
            if (!val) { strengthWrap.style.display = 'none'; return; }
            strengthWrap.style.display = 'flex';
            var score = 0;
            if (val.length >= 8)  score++;
            if (val.length >= 12) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;
            var levels = [
                { label: 'Sangat Lemah', color: '#e53935', width: '20%' },
                { label: 'Lemah',        color: '#fb8c00', width: '40%' },
                { label: 'Cukup',        color: '#fdd835', width: '60%' },
                { label: 'Kuat',         color: '#43a047', width: '80%' },
                { label: 'Sangat Kuat',  color: '#075d37', width: '100%' },
            ];
            var level = levels[Math.min(score, 4)];
            strengthFill.style.width           = level.width;
            strengthFill.style.backgroundColor = level.color;
            strengthLabel.textContent          = level.label;
            strengthLabel.style.color          = level.color;
        });
    }
})();
</script>