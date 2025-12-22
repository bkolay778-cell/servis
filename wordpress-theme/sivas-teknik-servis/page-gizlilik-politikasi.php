<?php
/**
 * Template Name: Gizlilik Politikası
 * 
 * Gizlilik Politikası Sayfası
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
        <h1>Gizlilik Politikası</h1>
        <nav class="breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
            <span>/</span>
            <span>Gizlilik Politikası</span>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="page-content" style="max-width: 900px; margin: 0 auto;">
            <div style="line-height: 1.8; color: var(--gray-700);">
                <p>
                    <strong><?php echo esc_html($contact['business_name']); ?></strong> olarak gizliliğinize saygı duyuyor ve kişisel bilgilerinizi korumayı taahhüt ediyoruz. 
                    Bu gizlilik politikası, web sitemizi kullanırken topladığımız bilgileri ve bunları nasıl kullandığımızı açıklar.
                </p>
                
                <h2>1. Toplanan Bilgiler</h2>
                <p>Web sitemizi ziyaret ettiğinizde veya hizmetlerimizi kullandığınızda aşağıdaki bilgileri toplayabiliriz:</p>
                <ul style="margin-bottom: 1.5rem;">
                    <li>• Ad ve soyad</li>
                    <li>• Telefon numarası</li>
                    <li>• E-posta adresi</li>
                    <li>• Fiziksel adres</li>
                    <li>• Cihaz ve arıza bilgileri</li>
                    <li>• IP adresi ve tarayıcı bilgileri</li>
                </ul>
                
                <h2>2. Bilgilerin Kullanımı</h2>
                <p>Topladığımız bilgileri aşağıdaki amaçlarla kullanıyoruz:</p>
                <ul style="margin-bottom: 1.5rem;">
                    <li>• Arıza kayıt hizmetinin sunulması</li>
                    <li>• Sizinle iletişim kurulması</li>
                    <li>• Teknik destek koordinasyonunun sağlanması</li>
                    <li>• Hizmet kalitesinin iyileştirilmesi</li>
                    <li>• Yasal yükümlülüklerin yerine getirilmesi</li>
                </ul>
                
                <h2>3. Bilgi Paylaşımı</h2>
                <p>
                    Kişisel bilgilerinizi, hizmetlerimizin sunulması amacıyla gerekli olduğu ölçüde 
                    koordinasyon sağladığımız teknik servis firmaları ile paylaşabiliriz. 
                    Bilgilerinizi yasal zorunluluk olmadıkça üçüncü taraflarla paylaşmayız veya satmayız.
                </p>
                
                <h2>4. Çerezler (Cookies)</h2>
                <p>
                    Web sitemiz, kullanıcı deneyimini iyileştirmek için çerezler kullanabilir. 
                    Çerezler, tarayıcınız aracılığıyla cihazınıza yerleştirilen küçük metin dosyalarıdır. 
                    Tarayıcı ayarlarınızı değiştirerek çerezleri devre dışı bırakabilirsiniz.
                </p>
                
                <h2>5. Güvenlik</h2>
                <p>
                    Kişisel bilgilerinizin güvenliği bizim için önemlidir. 
                    Bilgilerinizi korumak için uygun teknik ve organizasyonel önlemler alıyoruz. 
                    Ancak, internet üzerinden hiçbir veri iletim yönteminin %100 güvenli olmadığını hatırlatırız.
                </p>
                
                <h2>6. Üçüncü Taraf Bağlantıları</h2>
                <p>
                    Web sitemiz üçüncü taraf web sitelerine bağlantılar içerebilir. 
                    Bu sitelerin gizlilik uygulamaları üzerinde kontrolümüz yoktur ve bu sitelerden sorumlu değiliz.
                </p>
                
                <h2>7. Değişiklikler</h2>
                <p>
                    Bu gizlilik politikasını zaman zaman güncelleyebiliriz. 
                    Değişiklikler bu sayfada yayınlanacaktır. 
                    Gizlilik politikamızı düzenli olarak gözden geçirmenizi öneririz.
                </p>
                
                <h2>8. İletişim</h2>
                <p>Gizlilik politikamız hakkında sorularınız için bizimle iletişime geçebilirsiniz:</p>
                <ul style="margin-bottom: 1.5rem;">
                    <li>• E-posta: <?php echo esc_html($contact['email']); ?></li>
                    <li>• Telefon: <?php echo esc_html($contact['phone']); ?></li>
                    <li>• Adres: <?php echo esc_html($contact['address']); ?></li>
                </ul>
                
                <p style="margin-top: 2rem; color: var(--gray-500); font-size: 0.875rem;">
                    Son güncelleme: <?php echo date('d.m.Y'); ?>
                </p>
            </div>
            
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
