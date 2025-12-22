<?php
/**
 * Template Name: İlçe Sayfası
 * 
 * Bölge/İlçe Detay Sayfası - SEO Local Pages
 *
 * @package SivasTeknikServis
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$contact = sts_get_contact_info();
$services = sts_get_services();

// Get region data from page title or custom field
$region_name = get_the_title();
$region_slug = sanitize_title($region_name);

// Default to Sivas Merkez if not specified
if (empty($region_name)) {
    $region_name = 'Sivas Merkez';
}

// Generate dynamic SEO title
$page_title = $region_name . ' Teknik Servis Arıza Kayıt';
?>

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1><?php echo esc_html($page_title); ?></h1>
        <nav class="breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
            <span>/</span>
            <a href="<?php echo esc_url(home_url('/hizmet-bolgeleri/')); ?>">Hizmet Bölgeleri</a>
            <span>/</span>
            <span><?php echo esc_html($region_name); ?></span>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="brand-content">
            <!-- Region Info Box -->
            <div class="brand-info-box">
                <p>
                    <strong><?php echo esc_html($region_name); ?></strong> ve çevresinde beyaz eşya, kombi, klima ve tüm ev aletleri için 
                    <strong>arıza kayıt ve teknik destek organizasyonu</strong> hizmeti sunuyoruz.
                </p>
            </div>
            
            <!-- Main Content -->
            <div style="line-height: 1.8; color: var(--gray-700);">
                <h2><?php echo esc_html($region_name); ?> Arıza Kayıt Hizmeti</h2>
                <p>
                    <?php echo esc_html($region_name); ?> bölgesinde ikamet eden müşterilerimize profesyonel arıza kayıt hizmeti sunuyoruz. 
                    Beyaz eşya, kombi, klima ve diğer ev aletlerinizde yaşadığınız arızaları kayıt altına alıyor ve 
                    teknik destek sürecinizi başlatıyoruz.
                </p>
                
                <h3><?php echo esc_html($region_name); ?>'de Sunulan Arıza Kayıt Hizmetleri</h3>
                <ul style="margin-bottom: 1.5rem;">
                    <?php foreach ($services as $service): ?>
                    <li style="margin-bottom: 0.5rem;">
                        <strong><?php echo esc_html($service['title']); ?>:</strong> 
                        <?php echo esc_html($service['description']); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                
                <h3>Arıza Kayıt Süreci Nasıl İşler?</h3>
                <ol style="margin-bottom: 1.5rem;">
                    <li style="margin-bottom: 0.5rem;">Telefon, WhatsApp veya web formumuz üzerinden arıza bilgilerinizi bize iletirsiniz.</li>
                    <li style="margin-bottom: 0.5rem;">Arıza türü ve cihaz bilgilerine göre teknik ihtiyaç analizi yapılır.</li>
                    <li style="margin-bottom: 0.5rem;"><?php echo esc_html($region_name); ?> bölgesine uygun servis ile koordinasyon sağlanır.</li>
                    <li style="margin-bottom: 0.5rem;">Teknik destek süreci başlatılır ve süreç boyunca bilgilendirilirsiniz.</li>
                </ol>
                
                <!-- Disclaimer -->
                <div class="disclaimer-box">
                    <p>
                        <strong>Önemli Bilgilendirme:</strong> Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. 
                        Herhangi bir markanın yetkili servisi değiliz. <?php echo esc_html($region_name); ?> bölgesinde 
                        marka bağımsız arıza kayıt hizmeti sunulmaktadır.
                    </p>
                </div>
            </div>
            
            <!-- CTA Box -->
            <div style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%); color: white; padding: 2rem; border-radius: var(--radius-lg); margin-top: 2rem; text-align: center;">
                <h3 style="color: white; margin-bottom: 1rem;"><?php echo esc_html($region_name); ?>'de Arıza mı Yaşıyorsunuz?</h3>
                <p style="opacity: 0.9; margin-bottom: 1.5rem;">
                    Hemen arıza kaydı oluşturun, teknik destek sürecinizi başlatalım.
                </p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/ariza-kaydi/')); ?>" class="btn btn-lg btn-cta">
                        Arıza Kaydı Oluştur
                    </a>
                    <a href="<?php echo esc_url($contact['phone_link']); ?>" class="btn btn-lg" style="background: white; color: var(--primary-color);">
                        <?php echo sts_get_icon('phone', 'btn-icon'); ?>
                        <?php echo esc_html($contact['phone']); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Other Regions -->
<section class="section section-gray">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 2rem;">Diğer Hizmet Bölgelerimiz</h2>
        <div class="region-grid">
            <?php 
            $regions = sts_get_regions();
            foreach ($regions as $region): 
            ?>
            <a href="<?php echo esc_url(home_url('/hizmet-bolgeleri/' . $region['slug'] . '-teknik-servis/')); ?>" class="region-card">
                <h3><?php echo esc_html($region['name']); ?></h3>
                <p>Teknik Servis Arıza Kayıt</p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
get_footer();
