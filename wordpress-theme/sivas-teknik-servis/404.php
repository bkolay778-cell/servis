<?php
/**
 * 404 Page Template
 *
 * @package SivasTeknikServis
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$contact = sts_get_contact_info();
?>

<section class="section" style="min-height: 60vh; display: flex; align-items: center;">
    <div class="container">
        <div style="text-align: center; max-width: 600px; margin: 0 auto;">
            <div style="font-size: 8rem; font-weight: 700; color: var(--primary-lighter); line-height: 1;">
                404
            </div>
            <h1 style="font-size: 2rem; margin-bottom: 1rem;">Sayfa Bulunamadı</h1>
            <p style="color: var(--gray-600); margin-bottom: 2rem;">
                Aradığınız sayfa mevcut değil veya taşınmış olabilir. 
                Ana sayfaya dönerek devam edebilir veya arıza kaydı oluşturabilirsiniz.
            </p>
            
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg">
                    Ana Sayfaya Dön
                </a>
                <a href="<?php echo esc_url(home_url('/ariza-kaydi/')); ?>" class="btn btn-secondary btn-lg">
                    Arıza Kaydı Oluştur
                </a>
            </div>
            
            <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--gray-200);">
                <p style="color: var(--gray-600); margin-bottom: 1rem;">Veya bizi arayın:</p>
                <a href="<?php echo esc_url($contact['phone_link']); ?>" class="btn btn-phone">
                    <?php echo sts_get_icon('phone', 'btn-icon'); ?>
                    <?php echo esc_html($contact['phone']); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
