<?php
/**
 * Main Template File
 *
 * @package SivasTeknikServis
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="page-content">
    <div class="container">
        <?php if (have_posts()): ?>
            <div class="posts-grid">
                <?php while (have_posts()): the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()): ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('service-thumb'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">Devamını Oku</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <?php the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => '&laquo; Önceki',
                'next_text' => 'Sonraki &raquo;',
            )); ?>
            
        <?php else: ?>
            <div class="no-posts">
                <h2>İçerik Bulunamadı</h2>
                <p>Aradığınız içerik bulunamadı.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Ana Sayfaya Dön</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
