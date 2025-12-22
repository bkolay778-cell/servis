<?php
/**
 * Template Name: KVKK
 * 
 * KVKK Aydınlatma Metni Sayfası
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
        <h1>KVKK Aydınlatma Metni</h1>
        <nav class="breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
            <span>/</span>
            <span>KVKK</span>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="page-content" style="max-width: 900px; margin: 0 auto;">
            <div style="line-height: 1.8; color: var(--gray-700);">
                <p>
                    <strong><?php echo esc_html($contact['business_name']); ?></strong> olarak kişisel verilerinizin güvenliği konusunda azami hassasiyet göstermekteyiz. 
                    Bu aydınlatma metni, 6698 sayılı Kişisel Verilerin Korunması Kanunu ("KVKK") uyarınca hazırlanmıştır.
                </p>
                
                <h2>1. Veri Sorumlusu</h2>
                <p>
                    Veri sorumlusu sıfatıyla, aşağıda belirtilen amaçlarla, hukuka ve dürüstlük kurallarına uygun, doğru ve gerektiğinde güncel olarak, 
                    belirli, açık ve meşru amaçlar için, işlendikleri amaçla bağlantılı, sınırlı ve ölçülü olarak ve ilgili mevzuatta öngörülen veya 
                    işlendikleri amaç için gerekli olan süre kadar muhafaza edilmek üzere kişisel veriler işlenecektir.
                </p>
                
                <h2>2. Kişisel Verilerin İşlenme Amacı</h2>
                <p>Toplanan kişisel verileriniz aşağıdaki amaçlarla KVKK'nın 5. ve 6. maddelerinde belirtilen kişisel veri işleme şartlarına uygun olarak işlenecektir:</p>
                <ul style="margin-bottom: 1.5rem;">
                    <li>• Arıza kayıt hizmetinin sunulması</li>
                    <li>• Müşteri iletişiminin sağlanması</li>
                    <li>• Teknik destek organizasyonunun yapılması</li>
                    <li>• Hizmet kalitesinin artırılması</li>
                    <li>• Yasal yükümlülüklerin yerine getirilmesi</li>
                </ul>
                
                <h2>3. İşlenen Kişisel Veriler</h2>
                <p>Hizmetlerimiz kapsamında aşağıdaki kişisel veriler işlenmektedir:</p>
                <ul style="margin-bottom: 1.5rem;">
                    <li>• Kimlik bilgileri (Ad, Soyad)</li>
                    <li>• İletişim bilgileri (Telefon, E-posta, Adres)</li>
                    <li>• Arıza ve cihaz bilgileri</li>
                    <li>• Hizmet geçmişi</li>
                </ul>
                
                <h2>4. Kişisel Verilerin Aktarılması</h2>
                <p>
                    Toplanan kişisel verileriniz, hizmetlerimizin sunulması amacıyla sınırlı olmak üzere 
                    koordinasyon sağlanan teknik servis firmaları ile paylaşılabilmektedir.
                </p>
                
                <h2>5. Kişisel Veri Toplama Yöntemi</h2>
                <p>Kişisel verileriniz aşağıdaki yöntemlerle toplanmaktadır:</p>
                <ul style="margin-bottom: 1.5rem;">
                    <li>• Web sitesi iletişim formları</li>
                    <li>• Telefon görüşmeleri</li>
                    <li>• WhatsApp iletişimi</li>
                    <li>• E-posta yazışmaları</li>
                </ul>
                
                <h2>6. Kişisel Veri Sahibinin Hakları</h2>
                <p>KVKK'nın 11. maddesi uyarınca aşağıdaki haklara sahipsiniz:</p>
                <ul style="margin-bottom: 1.5rem;">
                    <li>• Kişisel verilerinizin işlenip işlenmediğini öğrenme</li>
                    <li>• Kişisel verileriniz işlenmişse buna ilişkin bilgi talep etme</li>
                    <li>• Kişisel verilerinizin işlenme amacını ve bunların amacına uygun kullanılıp kullanılmadığını öğrenme</li>
                    <li>• Yurt içinde veya yurt dışında kişisel verilerinizin aktarıldığı üçüncü kişileri bilme</li>
                    <li>• Kişisel verilerinizin eksik veya yanlış işlenmiş olması hâlinde bunların düzeltilmesini isteme</li>
                    <li>• KVKK'nın 7. maddesinde öngörülen şartlar çerçevesinde kişisel verilerinizin silinmesini veya yok edilmesini isteme</li>
                    <li>• İşlenen verilerinizin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi suretiyle aleyhinize bir sonucun ortaya çıkmasına itiraz etme</li>
                    <li>• Kişisel verilerinizin kanuna aykırı olarak işlenmesi sebebiyle zarara uğramanız hâlinde zararın giderilmesini talep etme</li>
                </ul>
                
                <h2>7. İletişim</h2>
                <p>KVKK kapsamındaki talepleriniz için aşağıdaki kanallardan bize ulaşabilirsiniz:</p>
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
