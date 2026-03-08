<?php
/**
 * Custom Navbar Block - Server Side Render
 * File: blocks/custom-navbar/render.php
 */

// Ambil custom logo WordPress
$custom_logo_id  = get_theme_mod( 'custom_logo' );
$logo_html       = '';

if ( $custom_logo_id ) {
    $logo_img  = wp_get_attachment_image(
        $custom_logo_id,
        'full',
        false,
        [ 'class' => 'custom-navbar__logo-img', 'alt' => get_bloginfo( 'name' ) ]
    );
    $logo_html = '<a href="' . esc_url( home_url( '/' ) ) . '" class="custom-navbar__logo-link">' . $logo_img . '</a>';
} else {
    // Fallback: site title jika tidak ada logo
    $logo_html = '<a href="' . esc_url( home_url( '/' ) ) . '" class="custom-navbar__site-title">'
        . esc_html( get_bloginfo( 'name' ) )
        . '</a>';
}

// Nav links — bisa dikembangkan pakai wp_nav_menu nantinya
$nav_links = [
    [ 'label' => 'Paket Wisata',        'url' => "/trip" ],
    [ 'label' => 'Promo Spesial',        'url' => "#" ],
    [ 'label' => 'Tentang Kami',        'url' => "/tentang-kami" ],
    [ 'label' => 'Galeri',        'url' => "#" ],
];

$whatsapp_number = '081234567890';
$whatsapp_intl   = '62' . ltrim( $whatsapp_number, '0' );
$whatsapp_url    = 'https://wa.me/' . $whatsapp_intl . '?text=' . rawurlencode( 'Halo, saya ingin bertanya tentang paket wisata.' );
?>

<nav class="custom-navbar" id="custom-navbar" role="navigation" aria-label="Main Navigation">

  <!-- PROMOTION -->
   <div class="promotion__outer">
    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
      <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
    </svg>
    <p>PAKAI KODE VOUCHER : <span>HOLIDAYWITHBTH</span> DAN DAPATKAN DISCOUNT SPESIAL!</p>
   </div>
  <!-- ===== DESKTOP & MOBILE: TOP BAR ===== -->
  <div class="custom-navbar__inner">

    <!-- Logo -->
    <div class="custom-navbar__brand">
      <?php echo $logo_html; ?>
    </div>

    <!-- Desktop Navigation Links -->
    <ul class="custom-navbar__menu" role="list">
      <?php foreach ( $nav_links as $link ) : ?>
        <li class="custom-navbar__menu-item">
          <a href="<?php echo esc_url( $link['url'] ); ?>" class="custom-navbar__menu-link">
            <?php echo esc_html( $link['label'] ); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <!-- Desktop: User Auth Block Area -->
    <div class="custom-navbar__actions">
      <?php
        // Render user-auth block jika tersedia
        if ( function_exists( 'render_block' ) ) {
            echo do_blocks( '<!-- wp:travelverse-child/user-auth /-->' );
        }
      ?>
    </div>

    <!-- Hamburger Button (mobile only) -->
    <button
      class="custom-navbar__hamburger"
      id="navbar-hamburger"
      aria-label="Buka menu navigasi"
      aria-expanded="false"
      aria-controls="navbar-drawer"
    >
      <span class="custom-navbar__hamburger-bar"></span>
      <span class="custom-navbar__hamburger-bar"></span>
      <span class="custom-navbar__hamburger-bar"></span>
    </button>

  </div><!-- /.custom-navbar__inner -->

  <!-- ===== MOBILE: OVERLAY ===== -->
  <div class="custom-navbar__overlay" id="navbar-overlay" aria-hidden="true"></div>

  <!-- ===== MOBILE: DRAWER (slide dari kiri) ===== -->
  <div
    class="custom-navbar__drawer"
    id="navbar-drawer"
    role="dialog"
    aria-label="Menu Navigasi"
    aria-hidden="true"
  >

    <!-- Drawer Header -->
    <div class="custom-navbar__drawer-header">
      <?php echo $logo_html; ?>
      <button
        class="custom-navbar__drawer-close"
        id="navbar-drawer-close"
        aria-label="Tutup menu"
      >
        &times;
      </button>
    </div>

    <!-- Drawer Nav Links -->
    <ul class="custom-navbar__drawer-menu" role="list">
      <?php foreach ( $nav_links as $link ) : ?>
        <li class="custom-navbar__drawer-item">
          <a href="<?php echo esc_url( $link['url'] ); ?>" class="custom-navbar__drawer-link">
            <?php echo esc_html( $link['label'] ); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <!-- Drawer Footer: WhatsApp -->
    <div class="custom-navbar__drawer-footer">
      <a
        href="/login"
        class="custom-navbar__whatsapp-btn"
        rel="noopener noreferrer"
        aria-label="Login Sekarang"
      >
        Masuk ke Akun
      </a>
    </div>

  </div><!-- /.custom-navbar__drawer -->

</nav><!-- /.custom-navbar -->
