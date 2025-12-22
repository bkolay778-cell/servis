<?php
/**
 * Template Part: FAQ Item
 *
 * @package SivasTeknikServis
 */

if (!defined('ABSPATH')) {
    exit;
}

$question = $args['question'] ?? '';
$answer = $args['answer'] ?? '';
$is_active = $args['active'] ?? false;
?>

<div class="faq-item <?php echo $is_active ? 'active' : ''; ?>">
    <button class="faq-question" aria-expanded="<?php echo $is_active ? 'true' : 'false'; ?>">
        <span><?php echo esc_html($question); ?></span>
        <?php echo sts_get_icon('chevron-down'); ?>
    </button>
    <div class="faq-answer">
        <p><?php echo esc_html($answer); ?></p>
    </div>
</div>
