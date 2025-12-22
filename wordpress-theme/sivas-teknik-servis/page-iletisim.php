<?php
/**
 * Template Name: İletişim
 * 
 * İletişim Sayfası
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
        <h1>İletişim</h1>
        <nav class="breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
            <span>/</span>
            <span>İletişim</span>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h2>Bize Ulaşın</h2>
            <p>Arıza kaydı oluşturmak veya bilgi almak için bizimle iletişime geçebilirsiniz.</p>
        </div>
        
        <!-- Contact Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; max-width: 1000px; margin: 0 auto 3rem;">
            <!-- Phone Card -->
            <div style="background: var(--primary-lighter); padding: 2rem; border-radius: var(--radius-lg); text-align: center;">
                <div style="width: 70px; height: 70px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                    <svg width="32" height="32" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <h3 style="margin-bottom: 0.5rem;">Arıza Hattı</h3>
                <p style="color: var(--gray-600); margin-bottom: 1rem;">7/24 arıza kayıt hattımız</p>
                <a href="<?php echo esc_url($contact['phone_link']); ?>" class="btn btn-primary btn-lg" style="width: 100%;">
                    <?php echo esc_html($contact['phone']); ?>
                </a>
            </div>
            
            <!-- WhatsApp Card -->
            <div style="background: #dcfce7; padding: 2rem; border-radius: var(--radius-lg); text-align: center;">
                <div style="width: 70px; height: 70px; background: var(--cta-green); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                    <?php echo sts_get_icon('whatsapp', 'btn-icon'); ?>
                </div>
                <h3 style="margin-bottom: 0.5rem;">WhatsApp</h3>
                <p style="color: var(--gray-600); margin-bottom: 1rem;">Mesaj ve fotoğraf gönderin</p>
                <a href="<?php echo esc_url($contact['whatsapp_link']); ?>" class="btn btn-whatsapp btn-lg" style="width: 100%;" target="_blank" rel="noopener">
                    <?php echo esc_html($contact['whatsapp']); ?>
                </a>
            </div>
            
            <!-- Landline Card -->
            <div style="background: var(--gray-100); padding: 2rem; border-radius: var(--radius-lg); text-align: center;">
                <div style="width: 70px; height: 70px; background: var(--gray-600); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                    <svg width="32" height="32" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <h3 style="margin-bottom: 0.5rem;">Sabit Hat</h3>
                <p style="color: var(--gray-600); margin-bottom: 1rem;">Ofis telefon numaramız</p>
                <a href="<?php echo esc_url($contact['landline_link']); ?>" class="btn btn-secondary btn-lg" style="width: 100%;">
                    <?php echo esc_html($contact['landline']); ?>
                </a>
            </div>
        </div>
        
        <!-- Contact Info & Map -->
        <div class="contact-grid" style="max-width: 1000px; margin: 0 auto;">
            <div>
                <h3 style="margin-bottom: 1.5rem;">İletişim Bilgileri</h3>
                
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <?php echo sts_get_icon('location'); ?>
                        </div>
                        <div class="contact-info-content">
                            <h4>Adres</h4>
                            <p><?php echo esc_html($contact['address']); ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <?php echo sts_get_icon('email'); ?>
                        </div>
                        <div class="contact-info-content">
                            <h4>E-posta</h4>
                            <p><a href="mailto:<?php echo esc_attr($contact['email']); ?>"><?php echo esc_html($contact['email']); ?></a></p>
                        </div>
                    </div>
                    
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <?php echo sts_get_icon('clock'); ?>
                        </div>
                        <div class="contact-info-content">
                            <h4>Çalışma Saatleri</h4>
                            <p>
                                <?php echo esc_html($contact['hours_weekday']); ?><br>
                                <?php echo esc_html($contact['hours_weekend']); ?>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Disclaimer -->
                <div class="disclaimer-box" style="margin-top: 2rem;">
                    <p>
                        <strong>Önemli:</strong> Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. 
                        Herhangi bir markanın yetkili servisi değiliz.
                    </p>
                </div>
            </div>
            
            <!-- Map -->
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3073.8654892838447!2d37.01525!3d39.74775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sMehmet%20Pa%C5%9Fa%20Mah.%2014-19%20Sokak%20No%3A2%2FA%20Sivas!5e0!3m2!1str!2str!4v1234567890" 
                    width="100%" 
                    height="400" 
                    style="border:0; border-radius: var(--radius-lg);" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Sivas Teknik Servis Arıza Kayıt Merkezi Konum">
                </iframe>
            </div>
        </div>
    </div>
</section>

<!-- Quick CTA -->
<section class="section section-gray">
    <div class="container">
        <div style="text-align: center; max-width: 600px; margin: 0 auto;">
            <h2 style="margin-bottom: 1rem;">Arıza Kaydı Oluşturmak mı İstiyorsunuz?</h2>
            <p style="color: var(--gray-600); margin-bottom: 2rem;">
                Online formumuz üzerinden hızlıca arıza kaydınızı oluşturabilirsiniz.
            </p>
            <a href="<?php echo esc_url(home_url('/ariza-kaydi/')); ?>" class="btn btn-primary btn-lg">
                Arıza Kaydı Oluştur
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
