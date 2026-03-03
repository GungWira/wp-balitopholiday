<?php
/**
 * User Type Selector untuk WP Travel Engine
 * File ini menangani pemilihan tipe user (Personal/Corporate) dan menyimpannya dalam cookie
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Tampilkan modal pemilihan user type
 */
function wte_display_user_type_modal() {
    // Cek apakah cookie sudah ada
    if (!isset($_COOKIE['wte_user_type'])) {
        ?>
        <div id="wte-user-type-overlay" class="wte-modal-overlay">
            <div class="wte-modal-container">
                <div class="wte-modal-content">
                    <div class="wte-modal-header">
                        <h2>Selamat Datang!</h2>
                        <p>Silakan pilih kategori perjalanan Anda</p>
                    </div>
                    
                    <div class="wte-modal-body">
                        <div class="wte-user-type-options">
                            <button class="wte-type-button" data-type="personal">
                                <div class="wte-type-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <h3>Personal</h3>
                                <p>Untuk perjalanan pribadi atau keluarga</p>
                            </button>
                            
                            <button class="wte-type-button" data-type="corporate">
                                <div class="wte-type-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                    </svg>
                                </div>
                                <h3>Perusahaan</h3>
                                <p>Untuk perjalanan bisnis atau corporate</p>
                            </button>
                        </div>
                    </div>
                    
                    <div class="wte-modal-footer">
                        <p class="wte-modal-note">Anda dapat mengubah pilihan ini kapan saja</p>
                    </div>
                </div>
                
                <div class="wte-loading-spinner" style="display: none;">
                    <div class="spinner"></div>
                    <p>Memuat...</p>
                </div>
            </div>
        </div>
        <?php
    }
}
add_action('wp_footer', 'wte_display_user_type_modal');

/**
 * Enqueue CSS dan JavaScript untuk modal
 */
function wte_enqueue_user_type_assets() {
    // Hanya load jika belum ada cookie
    if (!isset($_COOKIE['wte_user_type'])) {
        ?>
        <style>
            /* Modal Overlay */
            .wte-modal-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.8);
                backdrop-filter: blur(5px);
                z-index: 999999;
                display: flex;
                align-items: center;
                justify-content: center;
                animation: fadeIn 0.3s ease-in-out;
            }
            
            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }
            
            /* Modal Container */
            .wte-modal-container {
                position: relative;
                max-width: 600px;
                width: 90%;
                margin: 20px;
            }
            
            /* Modal Content */
            .wte-modal-content {
                background: white;
                border-radius: 16px;
                padding: 40px 30px;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                animation: slideUp 0.4s ease-out;
            }
            
            @keyframes slideUp {
                from {
                    transform: translateY(50px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
            
            /* Modal Header */
            .wte-modal-header {
                text-align: center;
                margin-bottom: 30px;
            }
            
            .wte-modal-header h2 {
                font-size: 28px;
                font-weight: 700;
                color: #1a1a1a;
                margin: 0 0 10px 0;
            }
            
            .wte-modal-header p {
                font-size: 16px;
                color: #666;
                margin: 0;
            }
            
            /* User Type Options */
            .wte-user-type-options {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
                margin-bottom: 20px;
            }
            
            @media (max-width: 600px) {
                .wte-user-type-options {
                    grid-template-columns: 1fr;
                }
            }
            
            /* Type Button */
            .wte-type-button {
                background: #f8f9fa;
                border: 2px solid #e0e0e0;
                border-radius: 12px;
                padding: 30px 20px;
                cursor: pointer;
                transition: all 0.3s ease;
                text-align: center;
                position: relative;
                overflow: hidden;
            }
            
            .wte-type-button:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                border-color: #2196F3;
                background: #fff;
            }
            
            .wte-type-button:active {
                transform: translateY(-2px);
            }
            
            .wte-type-button::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            
            .wte-type-button:hover::before {
                opacity: 0.05;
            }
            
            /* Type Icon */
            .wte-type-icon {
                margin-bottom: 15px;
                color: #2196F3;
            }
            
            .wte-type-button:hover .wte-type-icon {
                color: #1976D2;
                transform: scale(1.1);
                transition: all 0.3s ease;
            }
            
            .wte-type-button h3 {
                font-size: 20px;
                font-weight: 600;
                color: #1a1a1a;
                margin: 0 0 8px 0;
            }
            
            .wte-type-button p {
                font-size: 14px;
                color: #666;
                margin: 0;
                line-height: 1.5;
            }
            
            /* Modal Footer */
            .wte-modal-footer {
                text-align: center;
                padding-top: 20px;
                border-top: 1px solid #e0e0e0;
            }
            
            .wte-modal-note {
                font-size: 13px;
                color: #999;
                margin: 0;
            }
            
            /* Loading Spinner */
            .wte-loading-spinner {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                background: white;
                padding: 30px;
                border-radius: 12px;
            }
            
            .spinner {
                border: 4px solid #f3f3f3;
                border-top: 4px solid #2196F3;
                border-radius: 50%;
                width: 50px;
                height: 50px;
                animation: spin 1s linear infinite;
                margin: 0 auto 15px;
            }
            
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            
            .wte-loading-spinner p {
                color: #666;
                font-size: 14px;
                margin: 0;
            }
        </style>
        
        <script>
        jQuery(document).ready(function($) {
            // Handle button click
            $('.wte-type-button').on('click', function() {
                var userType = $(this).data('type');
                var $button = $(this);
                
                // Disable buttons
                $('.wte-type-button').prop('disabled', true).css('opacity', '0.5');
                
                // Show loading
                $('.wte-modal-content').fadeOut(200, function() {
                    $('.wte-loading-spinner').fadeIn(200);
                });
                
                // Send AJAX request to set cookie
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'POST',
                    data: {
                        action: 'set_wte_user_type',
                        user_type: userType,
                        nonce: '<?php echo wp_create_nonce('wte_user_type_nonce'); ?>'
                    },
                    success: function(response) {
                        if (response.success) {
                            $('.wte-modal-overlay').fadeOut(300, function() {
                                $(this).remove();
                            });
                            location.reload();

                        } else {
                            alert('Terjadi kesalahan. Silakan coba lagi.');
                            location.reload();
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan koneksi. Silakan coba lagi.');
                        location.reload();
                    }
                });
            });
            
            // Prevent closing modal by clicking overlay
            $('.wte-modal-overlay').on('click', function(e) {
                if (e.target === this) {
                    // Optional: Allow closing or keep it required
                    // $(this).fadeOut(300);
                }
            });
        });
        </script>
        <?php
    }
}
add_action('wp_head', 'wte_enqueue_user_type_assets');

/**
 * AJAX Handler untuk set cookie
 */
function wte_set_user_type_cookie() {
    // Nonce validation removed (not required for simple cookie setting)
    
    // Sanitize input
    $user_type = isset($_POST['user_type']) ? sanitize_text_field($_POST['user_type']) : '';
    
    // Validate user type
    if (!in_array($user_type, array('personal', 'corporate'))) {
        wp_send_json_error(array('message' => 'Invalid user type'));
    }
    
    // Set cookie untuk 30 hari
    $expiry = time() + (30 * DAY_IN_SECONDS);
    setcookie('wte_user_type', $user_type, $expiry, COOKIEPATH, COOKIE_DOMAIN, is_ssl(), true);
    
    // Return success
    wp_send_json_success(array(
        'message' => 'User type set successfully',
        'user_type' => $user_type
    ));
}
add_action('wp_ajax_set_wte_user_type', 'wte_set_user_type_cookie');
add_action('wp_ajax_nopriv_set_wte_user_type', 'wte_set_user_type_cookie');

/**
 * Tambahkan tombol untuk reset user type (optional)
 * Tampilkan di header atau footer
 */
function wte_display_change_user_type_button() {
    if (isset($_COOKIE['wte_user_type'])) {
        $current_type = $_COOKIE['wte_user_type'];
        $display_type = ($current_type === 'personal') ? 'Personal' : 'Perusahaan';
        ?>
        <style>
            .wte-change-type-wrapper {
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 9999;
            }
            
            .wte-change-type-btn {
                background: #2196F3;
                color: white;
                border: none;
                border-radius: 50px;
                padding: 12px 24px;
                font-size: 14px;
                font-weight: 600;
                cursor: pointer;
                box-shadow: 0 4px 12px rgba(33, 150, 243, 0.3);
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                gap: 8px;
            }
            
            .wte-change-type-btn:hover {
                background: #1976D2;
                box-shadow: 0 6px 20px rgba(33, 150, 243, 0.4);
                transform: translateY(-2px);
            }
            
            .wte-change-type-btn svg {
                width: 16px;
                height: 16px;
            }
            
            @media (max-width: 768px) {
                .wte-change-type-wrapper {
                    bottom: 10px;
                    right: 10px;
                }
                
                .wte-change-type-btn {
                    padding: 10px 18px;
                    font-size: 12px;
                }
            }
        </style>
        
        <div class="wte-change-type-wrapper">
            <button class="wte-change-type-btn" id="wte-change-user-type">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="1 4 1 10 7 10"></polyline>
                    <polyline points="23 20 23 14 17 14"></polyline>
                    <path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path>
                </svg>
                <span><?php echo esc_html($display_type); ?></span>
            </button>
        </div>
        
<script>
jQuery(document).ready(function($) {
    $('#wte-change-user-type').on('click', function() {

        if (!confirm('Apakah Anda yakin ingin mengubah tipe perjalanan?')) {
            return;
        }

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'delete_wte_user_type'
            },
            success: function(response) {
                location.reload();
            },
            error: function() {
                alert('Gagal menghapus pilihan. Coba lagi.');
            }
        });

    });
});
</script>
        <?php
    }
}
add_action('wp_footer', 'wte_display_change_user_type_button', 100);

/**
 * Function helper untuk get user type
 */
function wte_get_user_type() {
    return isset($_COOKIE['wte_user_type']) ? sanitize_text_field($_COOKIE['wte_user_type']) : null;
}

/**
 * Shortcode untuk menampilkan user type (untuk testing)
 * Usage: [wte_user_type]
 */
function wte_user_type_shortcode() {
    $user_type = wte_get_user_type();
    if ($user_type) {
        $display = ($user_type === 'personal') ? 'Personal' : 'Perusahaan';
        return '<span class="wte-current-type">Tipe: <strong>' . esc_html($display) . '</strong></span>';
    }
    return '<span class="wte-current-type">Tipe belum dipilih</span>';
}
add_shortcode('wte_user_type', 'wte_user_type_shortcode');

/**
 * AJAX Handler untuk hapus cookie
 */
function wte_delete_user_type_cookie() {

    // Set expiry ke masa lalu dengan parameter yang sama persis
    setcookie(
        'wte_user_type',
        '',
        time() - 3600,
        COOKIEPATH,
        COOKIE_DOMAIN,
        is_ssl(),
        true
    );

    wp_send_json_success();
}
add_action('wp_ajax_delete_wte_user_type', 'wte_delete_user_type_cookie');
add_action('wp_ajax_nopriv_delete_wte_user_type', 'wte_delete_user_type_cookie');