/**
 * WP Travel Engine - Personal Voucher System
 * Admin JavaScript - FIXED VERSION
 */

(function($) {
    'use strict';
    
    $(document).ready(function() {
        
        // Initialize Select2 dengan konfigurasi yang diperbaiki
        if ($('#wte-pv-user-select').length) {
            $('#wte-pv-user-select').select2({
                placeholder: 'Ketik minimal 2 huruf untuk mencari user...',
                allowClear: true,
                ajax: {
                    url: wtePvAdmin.ajaxUrl,
                    dataType: 'json',
                    delay: 300, // Delay 300ms setelah user berhenti mengetik
                    data: function(params) {
                        return {
                            action: 'wte_pv_search_users',
                            nonce: wtePvAdmin.nonce,
                            search: params.term || '' // Kirim empty string jika tidak ada term
                        };
                    },
                    processResults: function(data) {
                        if (data.success && Array.isArray(data.data)) {
                            return {
                                results: data.data
                            };
                        }
                        return { results: [] };
                    },
                    cache: false // PENTING: Disable cache agar hasil selalu fresh
                },
                minimumInputLength: 2, // Minimal 2 karakter
                language: {
                    inputTooShort: function() {
                        return 'Ketik minimal 2 karakter';
                    },
                    searching: function() {
                        return wtePvAdmin.strings.searching || 'Mencari...';
                    },
                    noResults: function() {
                        return wtePvAdmin.strings.noResults || 'Tidak ada hasil';
                    },
                    errorLoading: function() {
                        return 'Error loading results';
                    }
                }
            });
        }
        
        // Send voucher to selected users
        $('#wte-pv-send-voucher').on('click', function(e) {
            e.preventDefault();
            
            var $btn = $(this);
            var selectedUsers = $('#wte-pv-user-select').val();
            var couponId = $('input[name="post_ID"]').val();
            
            if (!selectedUsers || selectedUsers.length === 0) {
                showResult('error', wtePvAdmin.strings.selectUser || 'Pilih minimal satu user');
                return;
            }
            
            // Disable button
            $btn.prop('disabled', true).html('<span class="spinner is-active" style="float:none;margin:0 5px 0 0;"></span>' + wtePvAdmin.strings.sending);
            
            $.ajax({
                url: wtePvAdmin.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'wte_pv_send_voucher',
                    nonce: wtePvAdmin.nonce,
                    coupon_id: couponId,
                    user_ids: selectedUsers
                },
                success: function(response) {
                    if (response.success) {
                        showResult('success', response.data.message);
                        
                        // Clear selection
                        $('#wte-pv-user-select').val(null).trigger('change');
                        
                        // Reload page after 2 seconds to update stats
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else {
                        showResult('error', response.data.message || wtePvAdmin.strings.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    showResult('error', wtePvAdmin.strings.error);
                },
                complete: function() {
                    $btn.prop('disabled', false).html('📨 Kirim ke User Terpilih');
                }
            });
        });
        
        // Broadcast voucher
        $('#wte-pv-broadcast-voucher').on('click', function(e) {
            e.preventDefault();
            
            if (!confirm(wtePvAdmin.strings.confirmBroadcast)) {
                return;
            }
            
            var $btn = $(this);
            var couponId = $(this).data('coupon-id');
            
            // Disable button
            $btn.prop('disabled', true).html('<span class="spinner is-active" style="float:none;margin:0 5px 0 0;"></span>' + wtePvAdmin.strings.sending);
            
            $.ajax({
                url: wtePvAdmin.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'wte_pv_broadcast_voucher',
                    nonce: wtePvAdmin.nonce,
                    coupon_id: couponId
                },
                success: function(response) {
                    if (response.success) {
                        showResult('success', response.data.message);
                        
                        // Reload page after 2 seconds
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else {
                        showResult('error', response.data.message || wtePvAdmin.strings.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    showResult('error', wtePvAdmin.strings.error);
                },
                complete: function() {
                    $btn.prop('disabled', false).html('📣 Broadcast Sekarang');
                }
            });
        });
        
        // Helper function untuk show result messages
        function showResult(type, message) {
            var $resultDiv = $('#wte-pv-result');
            
            $resultDiv
                .removeClass('success error')
                .addClass(type)
                .html(message)
                .slideDown();
            
            // Auto hide success messages after 5 seconds
            if (type === 'success') {
                setTimeout(function() {
                    $resultDiv.slideUp();
                }, 5000);
            }
        }
        
        // Handle checkbox "Voucher Personal" - show info
        $('input[name="wte_pv_is_personal"]').on('change', function() {
            var $notice = $('#wte-pv-personal-notice');
            
            if ($(this).is(':checked')) {
                if (!$notice.length) {
                    $(this).closest('p').after(
                        '<div id="wte-pv-personal-notice" style="margin:10px 0;padding:8px;background:#e7f3ff;border-left:4px solid #0073aa;font-size:12px;">' +
                        '<strong>ℹ️ Info:</strong> Voucher personal tidak bisa digunakan dengan memasukkan kode manual. User hanya bisa menggunakan voucher yang sudah dikirim ke akun mereka.' +
                        '</div>'
                    );
                }
            } else {
                $notice.remove();
            }
        });
        
        // Trigger on page load
        if ($('input[name="wte_pv_is_personal"]').is(':checked')) {
            $('input[name="wte_pv_is_personal"]').trigger('change');
        }
        
        // Handle checkbox "Izinkan kirim ulang" - show info
        $('input[name="wte_pv_allow_duplicate"]').on('change', function() {
            var $notice = $('#wte-pv-duplicate-notice');
            
            if ($(this).is(':checked')) {
                if (!$notice.length) {
                    $(this).closest('p').after(
                        '<div id="wte-pv-duplicate-notice" style="margin:10px 0;padding:8px;background:#fff3cd;border-left:4px solid #ffb900;font-size:12px;">' +
                        '<strong>⚠️ Perhatian:</strong> User bisa menerima voucher yang sama berkali-kali. Pastikan ini sesuai dengan kebijakan Anda.' +
                        '</div>'
                    );
                }
            } else {
                $notice.remove();
            }
        });
        
        // Trigger on page load
        if ($('input[name="wte_pv_allow_duplicate"]').is(':checked')) {
            $('input[name="wte_pv_allow_duplicate"]').trigger('change');
        }
    });
    
})(jQuery);
