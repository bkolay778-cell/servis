<?php
/**
 * Page Template
 *
 * @package SivasTeknikServis
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$contact = sts_get_contact_info();
?>

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <nav class="breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
            <span>/</span>
            <span><?php the_title(); ?></span>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="page-content" style="max-width: 900px; margin: 0 auto;">
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <div class="entry-content" style="line-height: 1.8; color: var(--gray-700);">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; endif; ?>
            
            <!-- Disclaimer -->
            <div class="disclaimer-box" style="margin-top: 3rem;">
                <p>
                    <strong>Önemli:</strong> Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. 
                    Herhangi bir markanın yetkili servisi değiliz.
                </p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
