<?php
/**
 * Template Part: Service Card
 *
 * @package SivasTeknikServis
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$icon = $args['icon'] ?? 'plug';
$link = $args['link'] ?? '#';
?>

<div class="service-card">
    <div class="service-icon">
        <?php echo sts_get_icon($icon); ?>
    </div>
    <h3><?php echo esc_html($title); ?></h3>
    <p><?php echo esc_html($description); ?></p>
    <a href="<?php echo esc_url($link); ?>" class="btn btn-primary btn-sm">
        Arıza Kaydı Oluştur
    </a>
</div>
