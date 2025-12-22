<?php
/**
 * Template Part: Disclaimer Box
 *
 * @package SivasTeknikServis
 */

if (!defined('ABSPATH')) {
    exit;
}

$text = $args['text'] ?? 'Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. Herhangi bir markanın yetkili servisi değiliz.';
$style = $args['style'] ?? '';
?>

<div class="disclaimer-box" <?php echo $style ? 'style="' . esc_attr($style) . '"' : ''; ?>>
    <p>
        <strong>Önemli:</strong> <?php echo esc_html($text); ?>
    </p>
</div>
