<?php
/**
 * Auto-fill WTE Billing Fields dari data user yang login
 * Menggunakan AJAX agar data selalu fresh, tidak hardcode saat render PHP
 * 
 * Path: wp-content/themes/travelverse-child/inc/checkout/autofill-billing.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * AJAX endpoint — kembalikan data user yang sedang login
 */
add_action( 'wp_ajax_bth_get_billing_data', function () {
    if ( ! is_user_logged_in() ) {
        wp_send_json_error( [ 'message' => 'Not logged in' ], 401 );
    }

    $user    = wp_get_current_user();
    $fname   = $user->first_name ?: $user->display_name;
    $lname   = $user->last_name ?: '';
    $email   = $user->user_email;
    $phone   = get_user_meta( $user->ID, 'phone', true ) ?: '';
    $address = get_user_meta( $user->ID, 'billing_address', true ) ?: '-';
    $city    = get_user_meta( $user->ID, 'billing_city', true ) ?: '-';
    $country = get_user_meta( $user->ID, 'billing_country', true ) ?: 'ID';

    wp_send_json_success( [
        'billing[fname]'   => $fname,
        'billing[lname]'   => $lname,
        'billing[email]'   => $email,
        'billing[phone]'   => $phone,
        'billing[address]' => $address,
        'billing[city]'    => $city,
        'billing[country]' => $country,
    ] );
} );

/**
 * Inject script di footer halaman checkout
 */
add_action( 'wp_footer', function () {
    if ( ! is_user_logged_in() ) return;

    global $post;
    if ( ! $post ) return;
    if ( ! has_shortcode( $post->post_content, 'WP_TRAVEL_ENGINE_PLACE_ORDER' )
        && ! has_block( 'wp-travel-engine/checkout', $post ) ) {
        return;
    }

    ?>
    <script>
    (function() {

        function bthAutofillBilling( fields ) {
            Object.keys( fields ).forEach( function( name ) {
                var val = fields[ name ];
                if ( ! val ) return;

                var els = document.querySelectorAll( '[name="' + name + '"]' );
                els.forEach( function( el ) {
                    el.value = val;
                    el.dispatchEvent( new Event( 'input',  { bubbles: true } ) );
                    el.dispatchEvent( new Event( 'change', { bubbles: true } ) );
                } );
            } );

            // Country dropdown khusus
            var country = fields['billing[country]'];
            if ( country ) {
                var countryEls = document.querySelectorAll(
                    '[name="billing[country]"], [name="billing[country_code]"]'
                );
                countryEls.forEach( function( el ) {
                    el.value = country;
                    el.dispatchEvent( new Event( 'input',  { bubbles: true } ) );
                    el.dispatchEvent( new Event( 'change', { bubbles: true } ) );
                } );
            }
        }

        function bthFetchAndFill() {
            fetch( '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>', {
                method  : 'POST',
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' },
                body    : 'action=bth_get_billing_data&_ajax_nonce=<?php echo wp_create_nonce( 'bth_billing_nonce' ); ?>',
                credentials: 'same-origin',
            } )
            .then( function( r ) { return r.json(); } )
            .then( function( data ) {
                if ( data.success ) {
                    bthAutofillBilling( data.data );
                }
            } )
            .catch( function( e ) {
                console.warn( '[BTH] Gagal fetch billing data:', e );
            } );
        }

        // Jalankan saat DOM ready
        if ( document.readyState === 'loading' ) {
            document.addEventListener( 'DOMContentLoaded', function() {
                bthFetchAndFill();
                setTimeout( bthFetchAndFill, 1000 );
                setTimeout( bthFetchAndFill, 2500 );
            } );
        } else {
            bthFetchAndFill();
            setTimeout( bthFetchAndFill, 1000 );
            setTimeout( bthFetchAndFill, 2500 );
        }

        // Observer untuk form yang render async
        document.addEventListener( 'DOMContentLoaded', function() {
            var target = document.querySelector(
                '.wpte-checkout__page-layout, .bth-original-form, #wpte-checkout-form'
            );
            if ( ! target ) return;

            var observer = new MutationObserver( function( mutations ) {
                mutations.forEach( function( m ) {
                    if ( m.addedNodes.length > 0 ) bthFetchAndFill();
                } );
            } );
            observer.observe( target, { childList: true, subtree: true } );
        } );

    })();
    </script>
    <?php

}, 20 );