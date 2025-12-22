<?php
/**
 * Template Name: Arıza Kaydı Oluştur
 * 
 * Arıza Kayıt Formu Sayfası
 *
 * @package SivasTeknikServis
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$contact = sts_get_contact_info();
$services = sts_get_services();
$regions = sts_get_regions();

// Pre-selected service from URL
$selected_service = isset($_GET['hizmet']) ? sanitize_text_field($_GET['hizmet']) : '';
?>

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1>Arıza Kaydı Oluştur</h1>
        <nav class="breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
            <span>/</span>
            <span>Arıza Kaydı Oluştur</span>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <!-- Info Box -->
        <div class="disclaimer-box" style="max-width: 800px; margin: 0 auto 2rem;">
            <p>
                <strong>Bilgilendirme:</strong> Aşağıdaki formu doldurarak arıza kaydınızı oluşturabilirsiniz. 
                Kayıt sonrası en kısa sürede sizinle iletişime geçeceğiz. 
                Acil durumlar için <a href="<?php echo esc_url($contact['phone_link']); ?>"><?php echo esc_html($contact['phone']); ?></a> 
                numarasını arayabilirsiniz.
            </p>
        </div>
        
        <div class="contact-grid" style="max-width: 1000px; margin: 0 auto;">
            <!-- Contact Form -->
            <div>
                <div class="contact-form">
                    <h2 style="margin-bottom: 1.5rem;">Arıza Bilgilerinizi Girin</h2>
                    
                    <form id="ariza-kayit-form" method="post">
                        <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="form-group">
                                <label for="name">Ad Soyad *</label>
                                <input type="text" id="name" name="name" required placeholder="Adınız ve Soyadınız">
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Telefon *</label>
                                <input type="tel" id="phone" name="phone" required placeholder="05XX XXX XX XX">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">E-posta (Opsiyonel)</label>
                            <input type="email" id="email" name="email" placeholder="ornek@email.com">
                        </div>
                        
                        <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="form-group">
                                <label for="service">Hizmet Türü *</label>
                                <select id="service" name="service" required>
                                    <option value="">Seçiniz...</option>
                                    <?php foreach ($services as $service): ?>
                                    <option value="<?php echo esc_attr($service['slug']); ?>" <?php selected($selected_service, $service['slug']); ?>>
                                        <?php echo esc_html($service['title']); ?>
                                    </option>
                                    <?php endforeach; ?>
                                    <option value="diger">Diğer</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="region">Bölge / İlçe *</label>
                                <select id="region" name="region" required>
                                    <option value="">Seçiniz...</option>
                                    <?php foreach ($regions as $region): ?>
                                    <option value="<?php echo esc_attr($region['slug']); ?>">
                                        <?php echo esc_html($region['name']); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="device">Cihaz Bilgisi</label>
                            <input type="text" id="device" name="device" placeholder="Örn: Arçelik Buzdolabı, Bosch Çamaşır Makinesi">
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Adres *</label>
                            <textarea id="address" name="address" required placeholder="Açık adresinizi yazınız..."></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Arıza Açıklaması *</label>
                            <textarea id="message" name="message" required placeholder="Cihazınızdaki arızayı kısaca açıklayınız..."></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label style="display: flex; align-items: flex-start; gap: 0.5rem; cursor: pointer;">
                                <input type="checkbox" name="kvkk" required style="margin-top: 4px;">
                                <span style="font-size: 0.875rem; color: var(--gray-600);">
                                    <a href="<?php echo esc_url(home_url('/kvkk/')); ?>" target="_blank">KVKK Aydınlatma Metni</a>'ni okudum ve kabul ediyorum. *
                                </span>
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                            Arıza Kaydı Oluştur
                        </button>
                        
                        <div id="form-message" style="margin-top: 1rem; display: none;"></div>
                    </form>
                </div>
            </div>
            
            <!-- Contact Info Sidebar -->
            <div>
                <div style="background: var(--primary-lighter); padding: 2rem; border-radius: var(--radius-lg); margin-bottom: 1.5rem;">
                    <h3 style="margin-bottom: 1rem;">Telefonla Ulaşın</h3>
                    <p style="color: var(--gray-600); margin-bottom: 1rem;">Hızlı arıza kaydı için bizi arayın.</p>
                    <a href="<?php echo esc_url($contact['phone_link']); ?>" class="btn btn-primary btn-lg" style="width: 100%;">
                        <?php echo sts_get_icon('phone', 'btn-icon'); ?>
                        <?php echo esc_html($contact['phone']); ?>
                    </a>
                </div>
                
                <div style="background: #dcfce7; padding: 2rem; border-radius: var(--radius-lg); margin-bottom: 1.5rem;">
                    <h3 style="margin-bottom: 1rem;">WhatsApp ile Yazın</h3>
                    <p style="color: var(--gray-600); margin-bottom: 1rem;">Arıza fotoğrafı göndermek için WhatsApp'tan ulaşın.</p>
                    <a href="<?php echo esc_url($contact['whatsapp_link']); ?>" class="btn btn-whatsapp btn-lg" style="width: 100%;" target="_blank" rel="noopener">
                        <?php echo sts_get_icon('whatsapp', 'btn-icon'); ?>
                        <?php echo esc_html($contact['whatsapp']); ?>
                    </a>
                </div>
                
                <div style="background: var(--gray-100); padding: 2rem; border-radius: var(--radius-lg);">
                    <h3 style="margin-bottom: 1rem;">Çalışma Saatleri</h3>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <div style="display: flex; justify-content: space-between;">
                            <span>Pazartesi - Cumartesi</span>
                            <strong>08:30 - 20:00</strong>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span>Pazar</span>
                            <strong>Acil Hat Açık</strong>
                        </div>
                    </div>
                </div>
                
                <!-- Disclaimer -->
                <div class="disclaimer-box" style="margin-top: 1.5rem;">
                    <p>
                        <strong>Önemli:</strong> Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. 
                        Yetkili servis değiliz.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('ariza-kayit-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const formMessage = document.getElementById('form-message');
    const submitBtn = form.querySelector('button[type="submit"]');
    
    submitBtn.disabled = true;
    submitBtn.textContent = 'Gönderiliyor...';
    
    const formData = new FormData(form);
    formData.append('action', 'sts_contact_form');
    formData.append('nonce', stsData.nonce);
    
    fetch(stsData.ajaxUrl, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        formMessage.style.display = 'block';
        
        if (data.success) {
            formMessage.innerHTML = '<div style="background: #dcfce7; color: #166534; padding: 1rem; border-radius: 0.5rem;">' + data.data.message + '</div>';
            form.reset();
        } else {
            formMessage.innerHTML = '<div style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 0.5rem;">' + data.data.message + '</div>';
        }
        
        submitBtn.disabled = false;
        submitBtn.textContent = 'Arıza Kaydı Oluştur';
    })
    .catch(error => {
        formMessage.style.display = 'block';
        formMessage.innerHTML = '<div style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 0.5rem;">Bir hata oluştu. Lütfen telefon ile iletişime geçin.</div>';
        
        submitBtn.disabled = false;
        submitBtn.textContent = 'Arıza Kaydı Oluştur';
    });
});
</script>

<?php
get_footer();
