<?php
/**
 * Template Name: Hizmet Bölgeleri
 * 
 * Hizmet Bölgeleri Sayfası
 *
 * @package SivasTeknikServis
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$regions = sts_get_regions();
$contact = sts_get_contact_info();
?>

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1>Sivas Teknik Servis Hizmet Bölgeleri</h1>
        <nav class="breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
            <span>/</span>
            <span>Hizmet Bölgeleri</span>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h2>Sivas ve İlçelerinde Arıza Kayıt Hizmeti</h2>
            <p>Sivas ili ve tüm ilçelerinde teknik servis arıza kayıt ve destek organizasyonu hizmeti sunuyoruz.</p>
        </div>
        
        <!-- Main Regions Grid -->
        <div class="region-grid" style="margin-bottom: 3rem;">
            <?php foreach ($regions as $key => $region): ?>
            <a href="<?php echo esc_url(home_url('/hizmet-bolgeleri/' . $region['slug'] . '-teknik-servis/')); ?>" class="region-card" style="text-decoration: none;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 50px; height: 50px; background: var(--primary-lighter); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <?php echo sts_get_icon('location'); ?>
                    </div>
                    <div>
                        <h3 style="margin: 0;"><?php echo esc_html($region['name']); ?></h3>
                        <p style="margin: 0; font-size: 0.875rem;">Teknik Servis Arıza Kayıt</p>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        
        <!-- Disclaimer -->
        <div class="disclaimer-box" style="max-width: 800px; margin: 0 auto 3rem;">
            <p>
                <strong>Önemli Bilgilendirme:</strong> Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. 
                Herhangi bir markanın yetkili servisi değiliz. Tüm bölgelerde marka bağımsız arıza kayıt hizmeti sunulmaktadır.
            </p>
        </div>
        
        <!-- Info Section -->
        <div style="background: var(--gray-100); padding: 3rem; border-radius: var(--radius-lg); max-width: 900px; margin: 0 auto;">
            <h2 style="text-align: center; margin-bottom: 2rem;">Sivas Arıza Kayıt Hizmetleri</h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                <div>
                    <h3 style="font-size: 1.125rem; margin-bottom: 1rem;">Beyaz Eşya Arıza Kayıt</h3>
                    <ul style="color: var(--gray-600); line-height: 1.8;">
                        <li>• Buzdolabı arıza kayıt</li>
                        <li>• Çamaşır makinesi arıza kayıt</li>
                        <li>• Bulaşık makinesi arıza kayıt</li>
                        <li>• Kurutma makinesi arıza kayıt</li>
                        <li>• Fırın arıza kayıt</li>
                    </ul>
                </div>
                
                <div>
                    <h3 style="font-size: 1.125rem; margin-bottom: 1rem;">Isıtma & Soğutma</h3>
                    <ul style="color: var(--gray-600); line-height: 1.8;">
                        <li>• Kombi arıza kayıt</li>
                        <li>• Klima arıza kayıt</li>
                        <li>• Kalorifer arıza kayıt</li>
                        <li>• Şofben arıza kayıt</li>
                        <li>• Termosifon arıza kayıt</li>
                    </ul>
                </div>
                
                <div>
                    <h3 style="font-size: 1.125rem; margin-bottom: 1rem;">Diğer Cihazlar</h3>
                    <ul style="color: var(--gray-600); line-height: 1.8;">
                        <li>• Televizyon arıza kayıt</li>
                        <li>• Elektrik süpürgesi arıza kayıt</li>
                        <li>• Küçük ev aletleri</li>
                        <li>• Endüstriyel cihazlar</li>
                        <li>• Diğer tüm cihazlar</li>
                    </ul>
                </div>
            </div>
            
            <div style="text-align: center; margin-top: 2rem;">
                <a href="<?php echo esc_url(home_url('/ariza-kaydi/')); ?>" class="btn btn-primary btn-lg">
                    Arıza Kaydı Oluştur
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%); color: white;">
    <div class="container">
        <div style="text-align: center; max-width: 700px; margin: 0 auto;">
            <h2 style="color: white; margin-bottom: 1rem;">Bölgenizde Arıza mı Var?</h2>
            <p style="opacity: 0.9; margin-bottom: 2rem;">
                Sivas'ta yaşıyorsunuz ve cihazınızda arıza mı var? 
                Hemen arıza kaydı oluşturun, teknik destek sürecinizi başlatalım.
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url($contact['phone_link']); ?>" class="btn btn-lg" style="background: white; color: var(--primary-color);">
                    <?php echo sts_get_icon('phone', 'btn-icon'); ?>
                    <?php echo esc_html($contact['phone']); ?>
                </a>
                <a href="<?php echo esc_url($contact['whatsapp_link']); ?>" class="btn btn-lg btn-cta" target="_blank" rel="noopener">
                    <?php echo sts_get_icon('whatsapp', 'btn-icon'); ?>
                    WhatsApp ile Yazın
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
