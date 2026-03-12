<?php
if ( ! is_user_logged_in() ) {
    echo '<p>Silakan login untuk melihat favorit.</p>';
    return;
}

$user_id        = get_current_user_id();
$wishlist_ids   = get_user_meta( $user_id, 'wptravelengine_wishlists', true );
$wishlist_ids   = is_array( $wishlist_ids ) ? array_filter( array_map( 'intval', $wishlist_ids ) ) : array();
?>

<div class="bth-acc-container">

    <!-- SIDEBAR -->
    <?php require __DIR__ . '/parts/sidebar.php'; ?>

    <!-- MAIN -->
    <main class="bth-acc-main">
        <h1 class="bth-acc-title">Favorit</h1>

        <section class="bth-acc-section">
            <h2 class="bth-acc-section-title">Wisata yang kamu simpan</h2>

            <?php if ( empty( $wishlist_ids ) ) : ?>

                <div class="bth-empty-state">
                    <svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="bth-empty-svg">
                        <circle cx="60" cy="60" r="48" fill="#f0faf5"/>
                        <path d="M60 85s-28-16.5-28-35c0-9.4 7.6-17 17-17 5.2 0 9.8 2.4 13 6.1C65.2 35.4 69.8 33 75 33c9.4 0 17 7.6 17 17 0 18.5-32 35-32 35z" fill="#d1f0e0" stroke="#075d37" stroke-width="2.5" stroke-linejoin="round"/>
                        <circle cx="82" cy="42" r="8" fill="#fff" stroke="#075d37" stroke-width="2"/>
                        <path d="M79 42h6M82 39v6" stroke="#075d37" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <p class="bth-empty-title">Belum ada wisata favorit</p>
                    <p class="bth-empty-desc">Klik ikon ❤ di kartu wisata untuk menyimpannya di sini</p>
                    <a href="<?php echo esc_url( home_url( '/trip' ) ); ?>" class="bth-empty-cta">
                        Jelajahi Wisata
                    </a>
                </div>

            <?php else : ?>

                <?php
                if ( class_exists( '\WPTravelEngine\Modules\TripSearch' ) ) {
                    \WPTravelEngine\Modules\TripSearch::enqueue_assets();
                }
                wp_enqueue_style( 'trip-wishlist' );
                wp_enqueue_script( 'trip-wishlist' );
                $query = new WP_Query( array(
                    'post_type'   => 'trip',
                    'post_status' => 'publish',
                    'post__in'    => $wishlist_ids,
                    'orderby'     => 'post__in',
                    'posts_per_page' => -1,
                ) );

                if ( $query->have_posts() ) :
                    echo '<div class="bth-favorites-grid">';
                    while ( $query->have_posts() ) :
                        $query->the_post();
                        $details                   = wte_get_trip_details( get_the_ID() );
                        $details['user_wishlists'] = $wishlist_ids;
                        wptravelengine_get_template( 'content-grid.php', $details );
                    endwhile;
                    echo '</div>';
                    wp_reset_postdata();
                endif;
                ?>

            <?php endif; ?>

        </section>
    </main>

</div>

<style>
.bth-favorites-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 24px;
}

.bth-empty-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 60px 24px;
    text-align: center;
}

.bth-empty-svg {
    width: 120px;
    height: 120px;
    margin-bottom: 20px;
}

.bth-empty-title {
    font-size: 18px;
    font-weight: 600;
    color: #202124;
    margin: 0 0 8px;
}

.bth-empty-desc {
    font-size: 14px;
    color: #5f6368;
    margin: 0 0 24px;
}

.bth-empty-cta {
    display: inline-block;
    background-color: #075d37;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    padding: 12px 28px;
    border-radius: 8px;
    text-decoration: none;
    transition: background-color 0.2s, transform 0.1s;
}

.bth-empty-cta:hover {
    background-color: #054c2c;
    transform: translateY(-1px);
    color: #fff;
}
.category-trips-single.wpte_new-layout .category-trips-single-inner-wrap .category-trip-dates{
    display: none !important;
}
.category-trips-single.wpte_new-layout .category-trips-single-inner-wrap .wpte-button-group a{
    background-color: #054c2c;
}
.category-trips-single.wpte_new-layout .category-trips-single-inner-wrap .wpte-details-toggler-button{
    display: none !important;
}
.category-trips-single.wpte_new-layout .category-trips-single-inner-wrap .category-trip-prc-wrap{
    display: none !important;
}
.category-trips-single{
    padding: unset !important;
}
</style>