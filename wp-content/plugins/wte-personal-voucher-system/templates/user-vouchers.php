<?php
/**
 * Template: User Vouchers Dashboard
 * 
 * Menampilkan daftar voucher yang dimiliki user
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

?>

<div class="wte-pv-user-vouchers-wrapper">
    <h2><?php _e('Voucher Saya', 'wte-personal-voucher'); ?></h2>
    
    <div class="wte-pv-vouchers-list">
        <?php 
        $active_vouchers = array_filter($vouchers, function($v) { return $v->status === 'active'; });
        $used_vouchers = array_filter($vouchers, function($v) { return $v->status === 'used'; });
        ?>
        
        <!-- Active Vouchers -->
        <?php if (!empty($active_vouchers)): ?>
            <div class="wte-pv-section wte-pv-active-vouchers">
                <h3><?php _e('Voucher Aktif', 'wte-personal-voucher'); ?></h3>
                <div class="wte-pv-vouchers-grid">
                    <?php foreach ($active_vouchers as $voucher): 
                        $coupon = get_post($voucher->coupon_id);
                        $discount_type = get_post_meta($voucher->coupon_id, 'wp_travel_engine_coupon_value_type', true);
                        $discount_value = get_post_meta($voucher->coupon_id, 'wp_travel_engine_coupon_value', true);
                        $expiry_date = get_post_meta($voucher->coupon_id, 'wp_travel_engine_coupon_expiry_date', true);
                        
                        // Check if expired
                        $is_expired = false;
                        if (!empty($expiry_date)) {
                            $expiry_timestamp = strtotime($expiry_date);
                            $is_expired = $expiry_timestamp < time();
                        }
                    ?>
                        <div class="wte-pv-voucher-card <?php echo $is_expired ? 'expired' : ''; ?>">
                            <div class="wte-pv-voucher-header">
                                <h4><?php echo esc_html($coupon->post_title); ?></h4>
                                <?php if ($is_expired): ?>
                                    <span class="wte-pv-badge expired"><?php _e('Kadaluarsa', 'wte-personal-voucher'); ?></span>
                                <?php else: ?>
                                    <span class="wte-pv-badge active"><?php _e('Aktif', 'wte-personal-voucher'); ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="wte-pv-voucher-body">
                                <div class="wte-pv-discount">
                                    <span class="wte-pv-discount-label"><?php _e('Diskon:', 'wte-personal-voucher'); ?></span>
                                    <span class="wte-pv-discount-value">
                                        <?php 
                                        if ($discount_type === 'percentage') {
                                            echo esc_html($discount_value) . '%';
                                        } else {
                                            echo 'Rp ' . number_format($discount_value, 0, ',', '.');
                                        }
                                        ?>
                                    </span>
                                </div>
                                
                                <div class="wte-pv-code">
                                    <span class="wte-pv-code-label"><?php _e('Kode:', 'wte-personal-voucher'); ?></span>
                                    <code class="wte-pv-code-value"><?php echo esc_html($voucher->coupon_code); ?></code>
                                    <button class="wte-pv-copy-btn" data-code="<?php echo esc_attr($voucher->coupon_code); ?>" title="<?php _e('Salin kode', 'wte-personal-voucher'); ?>">
                                        <span class="dashicons dashicons-clipboard"></span>
                                    </button>
                                </div>
                                
                                <?php if (!empty($expiry_date) && !$is_expired): ?>
                                    <div class="wte-pv-expiry">
                                        <span class="dashicons dashicons-calendar-alt"></span>
                                        <?php 
                                        printf(
                                            __('Berlaku hingga: %s', 'wte-personal-voucher'),
                                            date_i18n(get_option('date_format'), strtotime($expiry_date))
                                        );
                                        ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($coupon->post_content)): ?>
                                    <div class="wte-pv-description">
                                        <?php echo wp_kses_post($coupon->post_content); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="wte-pv-received">
                                    <small>
                                        <?php 
                                        printf(
                                            __('Diterima: %s', 'wte-personal-voucher'),
                                            date_i18n(get_option('date_format'), strtotime($voucher->assigned_date))
                                        );
                                        ?>
                                    </small>
                                </div>
                            </div>
                            
                            <?php if (!$is_expired): ?>
                                <div class="wte-pv-voucher-footer">
                                    <a href="<?php echo esc_url(home_url('/trips')); ?>" class="wte-pv-use-btn">
                                        <?php _e('Gunakan Voucher', 'wte-personal-voucher'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="wte-pv-no-vouchers">
                <p><?php _e('Anda belum memiliki voucher aktif.', 'wte-personal-voucher'); ?></p>
            </div>
        <?php endif; ?>
        
        <!-- Used Vouchers -->
        <?php if (!empty($used_vouchers)): ?>
            <div class="wte-pv-section wte-pv-used-vouchers" style="margin-top: 30px;">
                <h3><?php _e('Riwayat Penggunaan', 'wte-personal-voucher'); ?></h3>
                <div class="wte-pv-history-table">
                    <table class="wte-table">
                        <thead>
                            <tr>
                                <th><?php _e('Voucher', 'wte-personal-voucher'); ?></th>
                                <th><?php _e('Kode', 'wte-personal-voucher'); ?></th>
                                <th><?php _e('Tanggal Digunakan', 'wte-personal-voucher'); ?></th>
                                <th><?php _e('Booking ID', 'wte-personal-voucher'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($used_vouchers as $voucher): 
                                $coupon = get_post($voucher->coupon_id);
                            ?>
                                <tr>
                                    <td><?php echo esc_html($coupon->post_title); ?></td>
                                    <td><code><?php echo esc_html($voucher->coupon_code); ?></code></td>
                                    <td><?php echo date_i18n(get_option('date_format'), strtotime($voucher->used_date)); ?></td>
                                    <td>
                                        <?php if ($voucher->booking_id): ?>
                                            <a href="<?php echo esc_url(admin_url('post.php?post=' . $voucher->booking_id . '&action=edit')); ?>">
                                                #<?php echo $voucher->booking_id; ?>
                                            </a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
.wte-pv-user-vouchers-wrapper {
    padding: 20px 0;
}

.wte-pv-section {
    margin-bottom: 30px;
}

.wte-pv-section h3 {
    font-size: 18px;
    margin-bottom: 15px;
    color: #333;
}

.wte-pv-vouchers-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.wte-pv-voucher-card {
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    padding: 20px;
    background: #fff;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.wte-pv-voucher-card:hover {
    border-color: #0073aa;
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    transform: translateY(-2px);
}

.wte-pv-voucher-card.expired {
    opacity: 0.6;
    border-color: #dc3232;
}

.wte-pv-voucher-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 1px solid #e0e0e0;
}

.wte-pv-voucher-header h4 {
    margin: 0;
    font-size: 16px;
    color: #333;
}

.wte-pv-badge {
    padding: 4px 12px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
}

.wte-pv-badge.active {
    background: #d4edda;
    color: #155724;
}

.wte-pv-badge.expired {
    background: #f8d7da;
    color: #721c24;
}

.wte-pv-voucher-body {
    margin-bottom: 15px;
}

.wte-pv-discount {
    margin-bottom: 12px;
    font-size: 14px;
}

.wte-pv-discount-label {
    color: #666;
}

.wte-pv-discount-value {
    font-size: 24px;
    font-weight: 700;
    color: #0073aa;
    margin-left: 8px;
}

.wte-pv-code {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
    padding: 10px;
    background: #f5f5f5;
    border-radius: 4px;
}

.wte-pv-code-label {
    color: #666;
    margin-right: 8px;
}

.wte-pv-code-value {
    flex: 1;
    font-size: 16px;
    font-weight: 600;
    color: #333;
    background: transparent;
    border: none;
    padding: 0;
}

.wte-pv-copy-btn {
    background: #0073aa;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
    transition: background 0.2s;
}

.wte-pv-copy-btn:hover {
    background: #005a87;
}

.wte-pv-copy-btn .dashicons {
    width: 18px;
    height: 18px;
    font-size: 18px;
}

.wte-pv-expiry,
.wte-pv-description,
.wte-pv-received {
    font-size: 13px;
    color: #666;
    margin-top: 10px;
}

.wte-pv-expiry .dashicons {
    width: 16px;
    height: 16px;
    font-size: 16px;
    vertical-align: middle;
    margin-right: 4px;
}

.wte-pv-voucher-footer {
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid #e0e0e0;
}

.wte-pv-use-btn {
    display: block;
    width: 100%;
    padding: 10px;
    background: #0073aa;
    color: #fff;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    font-weight: 600;
    transition: background 0.2s;
}

.wte-pv-use-btn:hover {
    background: #005a87;
    color: #fff;
}

.wte-pv-no-vouchers {
    text-align: center;
    padding: 40px;
    background: #f5f5f5;
    border-radius: 8px;
}

.wte-pv-history-table {
    overflow-x: auto;
}

.wte-pv-history-table table {
    width: 100%;
    border-collapse: collapse;
}

.wte-pv-history-table th,
.wte-pv-history-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
}

.wte-pv-history-table th {
    background: #f5f5f5;
    font-weight: 600;
}

.wte-pv-history-table code {
    background: #f5f5f5;
    padding: 2px 6px;
    border-radius: 3px;
}

@media (max-width: 768px) {
    .wte-pv-vouchers-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
jQuery(document).ready(function($) {
    // Copy voucher code to clipboard
    $('.wte-pv-copy-btn').on('click', function(e) {
        e.preventDefault();
        var code = $(this).data('code');
        var $btn = $(this);
        
        // Create temporary input
        var $temp = $('<input>');
        $('body').append($temp);
        $temp.val(code).select();
        document.execCommand('copy');
        $temp.remove();
        
        // Show feedback
        var originalHtml = $btn.html();
        $btn.html('<span class="dashicons dashicons-yes"></span>');
        
        setTimeout(function() {
            $btn.html(originalHtml);
        }, 2000);
    });
});
</script>
