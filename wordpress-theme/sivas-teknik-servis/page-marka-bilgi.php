<?php
/**
 * Template Name: Marka Bilgi Sayfası
 * 
 * Marka Detay Sayfası (Bilgilendirme Amaçlı)
 *
 * @package SivasTeknikServis
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$contact = sts_get_contact_info();
$services = sts_get_services();

// Get brand and product from page title or custom fields
$page_title = get_the_title();
// Example: "Arçelik Buzdolabı Arıza" or "Bosch Çamaşır Makinesi Teknik Destek"
?>

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1><?php echo esc_html($page_title); ?> Kayıt Hizmeti</h1>
        <nav class="breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
            <span>/</span>
            <a href="<?php echo esc_url(home_url('/markalar/')); ?>">Markalar</a>
            <span>/</span>
            <span><?php echo esc_html($page_title); ?></span>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="brand-content">
            <!-- Critical Disclaimer - MUST BE VISIBLE -->
            <div style="background: #fef3c7; border-left: 4px solid #f59e0b; padding: 1.5rem; border-radius: 0 var(--radius-md) var(--radius-md) 0; margin-bottom: 2rem;">
                <p style="margin: 0; font-weight: 500; color: #92400e;">
                    <strong>Çok Önemli:</strong> Bu sayfa yalnızca bilgilendirme amaçlıdır. 
                    <strong>Herhangi bir markanın yetkili servisi veya resmi temsilcisi değiliz.</strong> 
                    Hizmetimiz marka bağımsız arıza kayıt alma ve teknik destek organizasyonudur.
                </p>
            </div>
            
            <!-- Brand Info Box -->
            <div class="brand-info-box">
                <p>
                    <strong><?php echo esc_html($page_title); ?></strong> arızaları için arıza kayıt hizmeti sunuyoruz. 
                    Cihazınızdaki arızayı kaydetmemiz ve teknik destek sürecini başlatmamız için bizimle iletişime geçebilirsiniz.
                </p>
            </div>
            
            <!-- Main Content -->
            <div style="line-height: 1.8; color: var(--gray-700);">
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
                
                <?php if (empty(get_the_content())): ?>
                <h2><?php echo esc_html($page_title); ?> Arıza Kayıt Hizmeti</h2>
                <p>
                    Cihazınızda yaşadığınız arızalar için profesyonel arıza kayıt hizmeti sunuyoruz. 
                    Arıza kaydınızı oluşturduktan sonra uygun teknik servis ile koordinasyon sağlanır.
                </p>
                
                <h3>Sık Karşılaşılan Arıza Türleri</h3>
                <ul style="margin-bottom: 1.5rem;">
                    <li>• Cihaz çalışmıyor / açılmıyor</li>
                    <li>• Anormal ses geliyor</li>
                    <li>• Su kaçırıyor</li>
                    <li>• Soğutma/ısıtma yapmıyor</li>
                    <li>• Hata kodu veriyor</li>
                    <li>• Performans düşüklüğü</li>
                    <li>• Diğer arıza türleri</li>
                </ul>
                
                <h3>Arıza Kayıt Süreci</h3>
                <ol style="margin-bottom: 1.5rem;">
                    <li style="margin-bottom: 0.5rem;"><strong>Kayıt:</strong> Arıza bilgilerinizi telefon, WhatsApp veya form aracılığıyla bize iletirsiniz.</li>
                    <li style="margin-bottom: 0.5rem;"><strong>Değerlendirme:</strong> Arıza türü ve cihaz bilgilerine göre teknik ihtiyaç belirlenir.</li>
                    <li style="margin-bottom: 0.5rem;"><strong>Yönlendirme:</strong> Bölgenize ve arıza türüne uygun servis ile koordinasyon sağlanır.</li>
                    <li style="margin-bottom: 0.5rem;"><strong>Destek:</strong> Teknik destek süreci başlatılır ve takip edilir.</li>
                </ol>
                <?php endif; ?>
                
                <!-- Second Disclaimer -->
                <div class="disclaimer-box">
                    <p>
                        <strong>Yasal Uyarı:</strong> Bu sayfada geçen marka adı yalnızca bilgilendirme amaçlıdır. 
                        İlgili marka, kendi sahibinin tescilli ticari markasıdır. 
                        Firmamızın bu marka ile resmi bir bağlantısı veya yetkili servis anlaşması bulunmamaktadır. 
                        Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur.
                    </p>
                </div>
            </div>
            
            <!-- CTA Box -->
            <div style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%); color: white; padding: 2rem; border-radius: var(--radius-lg); margin-top: 2rem; text-align: center;">
                <h3 style="color: white; margin-bottom: 1rem;">Arıza Kaydı Oluşturmak İster misiniz?</h3>
                <p style="opacity: 0.9; margin-bottom: 1.5rem;">
                    Cihazınızdaki arızayı kaydetmemiz için hemen iletişime geçin.
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

<!-- FAQ Section -->
<section class="section section-gray">
    <div class="container">
        <div class="section-header">
            <h2>Sıkça Sorulan Sorular</h2>
        </div>
        
        <div class="faq-list">
            <div class="faq-item active">
                <button class="faq-question" aria-expanded="true">
                    <span>Yetkili servis misiniz?</span>
                    <?php echo sts_get_icon('chevron-down'); ?>
                </button>
                <div class="faq-answer">
                    <p>Hayır. Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. Herhangi bir markanın yetkili servisi değiliz.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>Servis hizmetini siz mi veriyorsunuz?</span>
                    <?php echo sts_get_icon('chevron-down'); ?>
                </button>
                <div class="faq-answer">
                    <p>Teknik destek süreci uygun servislerle organize edilmektedir. Biz arıza kaydı alıyor ve yönlendirme yapıyoruz.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>Arıza kaydı ücreti nedir?</span>
                    <?php echo sts_get_icon('chevron-down'); ?>
                </button>
                <div class="faq-answer">
                    <p>Arıza kayıt hizmetimiz ücretsizdir. Servis ücretleri, yönlendirilen teknik servis tarafından arıza türüne göre belirlenir.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
