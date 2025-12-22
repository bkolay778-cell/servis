<?php
/**
 * Template Name: Markalar
 * 
 * Marka Bilgileri Sayfası
 *
 * @package SivasTeknikServis
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$contact = sts_get_contact_info();

// Brand list (informational only)
$brands = array(
    'beyaz-esya' => array(
        'title' => 'Beyaz Eşya Markaları',
        'items' => array('Arçelik', 'Beko', 'Bosch', 'Siemens', 'Vestel', 'Profilo', 'Samsung', 'LG', 'Electrolux', 'Altus', 'Grundig', 'Regal')
    ),
    'kombi' => array(
        'title' => 'Kombi Markaları',
        'items' => array('Baymak', 'Demirdoküm', 'Vaillant', 'Buderus', 'Viessmann', 'Alarko', 'ECA', 'Protherm', 'Bosch', 'Ferroli')
    ),
    'klima' => array(
        'title' => 'Klima Markaları',
        'items' => array('Daikin', 'Mitsubishi', 'Samsung', 'LG', 'Vestel', 'Arçelik', 'Bosch', 'Toshiba', 'Panasonic', 'Carrier')
    ),
    'kucuk-ev-aletleri' => array(
        'title' => 'Küçük Ev Aletleri',
        'items' => array('Philips', 'Tefal', 'Bosch', 'Braun', 'Moulinex', 'Fakir', 'Arzum', 'Sinbo', 'Karaca', 'Korkmaz')
    )
);
?>

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1>Marka Bilgileri</h1>
        <nav class="breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
            <span>/</span>
            <span>Markalar</span>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <!-- Important Disclaimer -->
        <div class="disclaimer-box" style="max-width: 900px; margin: 0 auto 3rem; background: #fef3c7; border-left-color: #f59e0b;">
            <p style="margin: 0;">
                <strong>Çok Önemli Bilgilendirme:</strong> Aşağıda listelenen markalar yalnızca bilgilendirme amaçlıdır. 
                <strong>Herhangi bir markanın yetkili servisi veya resmi temsilcisi değiliz.</strong> 
                Hizmetimiz marka bağımsız arıza kayıt alma ve teknik destek organizasyonudur.
            </p>
        </div>
        
        <div class="section-header">
            <h2>Arıza Kayıt Hizmeti Verilen Cihaz Türleri</h2>
            <p>Tüm marka ve model cihazlarınız için arıza kayıt hizmeti sunuyoruz.</p>
        </div>
        
        <!-- Brand Categories -->
        <div style="display: grid; gap: 2rem; max-width: 1000px; margin: 0 auto;">
            <?php foreach ($brands as $key => $category): ?>
            <div style="background: var(--gray-100); padding: 2rem; border-radius: var(--radius-lg);">
                <h3 style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem;">
                    <span style="width: 40px; height: 40px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <svg width="20" height="20" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </span>
                    <?php echo esc_html($category['title']); ?>
                </h3>
                
                <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
                    <?php foreach ($category['items'] as $brand): ?>
                    <span style="background: white; padding: 0.5rem 1rem; border-radius: var(--radius-md); font-size: 0.9375rem; color: var(--gray-700); border: 1px solid var(--gray-200);">
                        <?php echo esc_html($brand); ?>
                    </span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Info Box -->
        <div style="background: var(--primary-lighter); padding: 2rem; border-radius: var(--radius-lg); max-width: 900px; margin: 3rem auto 0; text-align: center;">
            <h3 style="margin-bottom: 1rem;">Markanız Listede Yok mu?</h3>
            <p style="color: var(--gray-600); margin-bottom: 1.5rem;">
                Yukarıda belirtilmeyen tüm marka ve model cihazlar için de arıza kayıt hizmeti sunulmaktadır. 
                Cihazınızın markası ne olursa olsun bizimle iletişime geçebilirsiniz.
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
    </div>
</section>

<!-- Second Disclaimer -->
<section class="section section-gray">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto; text-align: center;">
            <h2 style="margin-bottom: 1rem;">Hizmet Anlayışımız</h2>
            <p style="color: var(--gray-600); line-height: 1.8;">
                Sivas Teknik Servis Arıza Kayıt Merkezi olarak, tüm marka ve model cihazlar için 
                <strong>arıza kayıt alma ve teknik destek organizasyonu</strong> hizmeti sunuyoruz. 
                Herhangi bir markanın yetkili servisi değiliz. Müşterilerimizin arıza kayıtlarını alıyor 
                ve uygun teknik servislerle koordinasyonu sağlıyoruz.
            </p>
            
            <div class="disclaimer-box" style="margin-top: 2rem; text-align: left;">
                <p>
                    <strong>Yasal Uyarı:</strong> Bu sayfada yer alan marka isimleri yalnızca bilgilendirme amaçlıdır. 
                    Tüm markalar kendi sahiplerinin tescilli ticari markalarıdır. 
                    Herhangi bir marka ile resmi bir bağlantımız veya ortaklığımız bulunmamaktadır.
                </p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
