<?php
$user = wp_get_current_user();
$user_id = get_current_user_id();

$active_tab = $_GET['tab'] ?? 'bookings';
?>

<div class="tv-account-content">
<?php
switch ($active_tab) {
    case 'points':
        require __DIR__ . '/points.php';
        break;
        
    case 'profile':
        require __DIR__ . '/profile.php';
        break;

    case 'favorites':
        require __DIR__ . '/favorites.php';
        break;
        
    default:
        require __DIR__ . '/bookings.php';
}
?>
</div>
