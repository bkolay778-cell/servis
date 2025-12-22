<?php
/**
 * Single Post Template
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
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">Blog</a>
            <span>/</span>
            <span><?php the_title(); ?></span>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr; gap: 3rem; max-width: 900px; margin: 0 auto;">
            <article class="single-post">
                <?php if (has_post_thumbnail()): ?>
                <div class="post-featured-image" style="margin-bottom: 2rem;">
                    <?php the_post_thumbnail('large', array('style' => 'border-radius: var(--radius-lg); width: 100%;')); ?>
                </div>
                <?php endif; ?>
                
                <div class="post-meta" style="display: flex; gap: 1.5rem; margin-bottom: 1.5rem; color: var(--gray-500); font-size: 0.875rem;">
                    <span>
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="display: inline; vertical-align: middle; margin-right: 0.25rem;">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        <?php echo get_the_date(); ?>
                    </span>
                    <span>
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="display: inline; vertical-align: middle; margin-right: 0.25rem;">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        <?php the_author(); ?>
                    </span>
                    <?php if (has_category()): ?>
                    <span>
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="display: inline; vertical-align: middle; margin-right: 0.25rem;">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                        </svg>
                        <?php the_category(', '); ?>
                    </span>
                    <?php endif; ?>
                </div>
                
                <div class="post-content" style="line-height: 1.8; color: var(--gray-700);">
                    <?php the_content(); ?>
                </div>
                
                <?php if (has_tag()): ?>
                <div class="post-tags" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--gray-200);">
                    <strong>Etiketler:</strong>
                    <?php the_tags('', ', ', ''); ?>
                </div>
                <?php endif; ?>
                
                <!-- Disclaimer -->
                <div class="disclaimer-box" style="margin-top: 2rem;">
                    <p>
                        <strong>Önemli:</strong> Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. 
                        Herhangi bir markanın yetkili servisi değiliz.
                    </p>
                </div>
            </article>
            
            <!-- CTA Box -->
            <div style="background: var(--primary-lighter); padding: 2rem; border-radius: var(--radius-lg); text-align: center;">
                <h3 style="margin-bottom: 1rem;">Yardıma mı İhtiyacınız Var?</h3>
                <p style="color: var(--gray-600); margin-bottom: 1.5rem;">
                    Cihazınızda arıza mı yaşıyorsunuz? Hemen arıza kaydı oluşturun.
                </p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/ariza-kaydi/')); ?>" class="btn btn-primary">
                        Arıza Kaydı Oluştur
                    </a>
                    <a href="<?php echo esc_url($contact['phone_link']); ?>" class="btn btn-secondary">
                        <?php echo sts_get_icon('phone', 'btn-icon'); ?>
                        <?php echo esc_html($contact['phone']); ?>
                    </a>
                </div>
            </div>
            
            <!-- Post Navigation -->
            <div style="display: flex; justify-content: space-between; gap: 1rem; flex-wrap: wrap;">
                <?php
                $prev_post = get_previous_post();
                $next_post = get_next_post();
                ?>
                
                <?php if ($prev_post): ?>
                <a href="<?php echo get_permalink($prev_post); ?>" style="flex: 1; min-width: 200px; padding: 1rem; background: var(--gray-100); border-radius: var(--radius-md); text-decoration: none;">
                    <span style="font-size: 0.875rem; color: var(--gray-500);">← Önceki Yazı</span>
                    <span style="display: block; color: var(--gray-800); font-weight: 500; margin-top: 0.25rem;"><?php echo get_the_title($prev_post); ?></span>
                </a>
                <?php endif; ?>
                
                <?php if ($next_post): ?>
                <a href="<?php echo get_permalink($next_post); ?>" style="flex: 1; min-width: 200px; padding: 1rem; background: var(--gray-100); border-radius: var(--radius-md); text-decoration: none; text-align: right;">
                    <span style="font-size: 0.875rem; color: var(--gray-500);">Sonraki Yazı →</span>
                    <span style="display: block; color: var(--gray-800); font-weight: 500; margin-top: 0.25rem;"><?php echo get_the_title($next_post); ?></span>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
