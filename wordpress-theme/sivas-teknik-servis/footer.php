<?php
/**
 * Footer Template
 *
 * @package SivasTeknikServis
 */

if (!defined('ABSPATH')) {
    exit;
}

$contact = sts_get_contact_info();
?>
</main><!-- #main-content -->

<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="footer-grid">
            <!-- Brand & Description -->
            <div class="footer-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo">
                    <div class="footer-logo-icon">
                        <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="50" height="50" rx="10" fill="#3b82f6"/>
                            <path d="M15 35V20L25 15L35 20V35" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20 35V25H30V35" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="25" cy="22" r="3" stroke="white" stroke-width="2"/>
                        </svg>
                    </div>
                    <span class="footer-logo-text">Sivas Teknik Servis</span>
                </a>
                <p class="footer-description">
                    Arıza kayıt alma ve teknik destek organizasyon merkezi. Beyaz eşya, kombi, klima ve tüm ev aletleriniz için 7/24 arıza kayıt hizmeti.
                </p>
                
                <!-- Social Links -->
                <div class="footer-social">
                    <a href="<?php echo esc_url($contact['whatsapp_link']); ?>" target="_blank" rel="noopener" aria-label="WhatsApp">
                        <?php echo sts_get_icon('whatsapp'); ?>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="footer-menu">
                <h4>Hızlı Linkler</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a></li>
                    <li><a href="<?php echo esc_url(home_url('/ariza-kaydi/')); ?>">Arıza Kaydı Oluştur</a></li>
                    <li><a href="<?php echo esc_url(home_url('/hizmet-bolgeleri/')); ?>">Hizmet Bölgeleri</a></li>
                    <li><a href="<?php echo esc_url(home_url('/markalar/')); ?>">Markalar</a></li>
                    <li><a href="<?php echo esc_url(home_url('/iletisim/')); ?>">İletişim</a></li>
                </ul>
            </div>
            
            <!-- Services -->
            <div class="footer-menu">
                <h4>Hizmetlerimiz</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/hizmetler/beyaz-esya/')); ?>">Beyaz Eşya Arıza Kayıt</a></li>
                    <li><a href="<?php echo esc_url(home_url('/hizmetler/kombi-isitma/')); ?>">Kombi & Isıtma Sistemleri</a></li>
                    <li><a href="<?php echo esc_url(home_url('/hizmetler/klima-sogutma/')); ?>">Klima & Soğutma</a></li>
                    <li><a href="<?php echo esc_url(home_url('/hizmetler/kucuk-ev-aletleri/')); ?>">Küçük Ev Aletleri</a></li>
                    <li><a href="<?php echo esc_url(home_url('/hizmetler/endustriyel/')); ?>">Endüstriyel Cihazlar</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="footer-menu footer-contact">
                <h4>İletişim</h4>
                <div class="footer-contact-list">
                    <div class="footer-contact-item">
                        <?php echo sts_get_icon('phone'); ?>
                        <div>
                            <strong>Arıza Hattı:</strong><br>
                            <a href="<?php echo esc_url($contact['phone_link']); ?>"><?php echo esc_html($contact['phone']); ?></a>
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <?php echo sts_get_icon('phone'); ?>
                        <div>
                            <strong>Sabit Hat:</strong><br>
                            <a href="<?php echo esc_url($contact['landline_link']); ?>"><?php echo esc_html($contact['landline']); ?></a>
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <?php echo sts_get_icon('whatsapp'); ?>
                        <div>
                            <strong>WhatsApp:</strong><br>
                            <a href="<?php echo esc_url($contact['whatsapp_link']); ?>" target="_blank" rel="noopener"><?php echo esc_html($contact['whatsapp']); ?></a>
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <?php echo sts_get_icon('email'); ?>
                        <div>
                            <strong>E-posta:</strong><br>
                            <a href="mailto:<?php echo esc_attr($contact['email']); ?>"><?php echo esc_html($contact['email']); ?></a>
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <?php echo sts_get_icon('location'); ?>
                        <div>
                            <strong>Adres:</strong><br>
                            <?php echo esc_html($contact['address']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Disclaimer -->
        <div class="footer-disclaimer">
            <p>
                <strong>Önemli Bilgilendirme:</strong> Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. 
                Herhangi bir markanın yetkili servisi veya resmi temsilcisi değiliz. 
                Marka isimleri yalnızca bilgilendirme amaçlı kullanılmaktadır.
            </p>
        </div>
    </div>
    
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <p>
                &copy; <?php echo date('Y'); ?> <?php echo esc_html($contact['business_name']); ?>. Tüm hakları saklıdır.
                <span class="footer-links">
                    | <a href="<?php echo esc_url(home_url('/gizlilik-politikasi/')); ?>">Gizlilik Politikası</a>
                    | <a href="<?php echo esc_url(home_url('/kvkk/')); ?>">KVKK</a>
                    | <a href="<?php echo esc_url(home_url('/kullanim-kosullari/')); ?>">Kullanım Koşulları</a>
                </span>
            </p>
        </div>
    </div>
</footer>

<!-- Fixed Mobile Buttons -->
<div class="fixed-buttons">
    <a href="<?php echo esc_url($contact['phone_link']); ?>" class="fixed-btn fixed-btn-phone">
        <?php echo sts_get_icon('phone'); ?>
        <span>Hemen Ara</span>
    </a>
    <a href="<?php echo esc_url($contact['whatsapp_link']); ?>" class="fixed-btn fixed-btn-whatsapp" target="_blank" rel="noopener">
        <?php echo sts_get_icon('whatsapp'); ?>
        <span>WhatsApp</span>
    </a>
</div>

<?php wp_footer(); ?>
</body>
</html>
