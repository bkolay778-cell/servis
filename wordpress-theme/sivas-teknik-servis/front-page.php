<?php
/**
 * Homepage Template (Front Page)
 *
 * @package SivasTeknikServis
 * Template Name: Ana Sayfa
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$contact = sts_get_contact_info();
$services = sts_get_services();
$steps = sts_get_steps();
$faqs = sts_get_faqs();

// Output FAQ Schema
sts_faq_schema();
?>

<!-- Hero Section -->
<section class="hero" style="position: relative; overflow: hidden;">
    <!-- Background Image -->
    <div style="position: absolute; inset: 0; z-index: 0;">
        <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=1920&h=1080&fit=crop&q=80" 
             alt="Profesyonel teknik servis"
             style="width: 100%; height: 100%; object-fit: cover; opacity: 0.2;">
        <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(30,58,138,0.9), rgba(30,64,175,0.7));"></div>
    </div>
    
    <div class="container" style="position: relative; z-index: 1;">
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-badge">
                    <?php echo sts_get_icon('check'); ?>
                    <span>7/24 Arıza Kayıt Hizmeti</span>
                </div>
                
                <h1>Teknik Servis Arıza Kayıt ve Destek Merkezi</h1>
                
                <p class="hero-subtitle">
                    Arıza kaydı oluşturun, teknik destek sürecinizi hızlıca başlatalım. 
                    Beyaz eşya, kombi, klima ve tüm ev aletleriniz için profesyonel arıza kayıt hizmeti.
                </p>
                
                <div class="hero-cta">
                    <a href="<?php echo esc_url(home_url('/ariza-kaydi/')); ?>" class="btn btn-lg btn-cta">
                        Arıza Kaydı Oluştur
                    </a>
                    <a href="<?php echo esc_url($contact['phone_link']); ?>" class="btn btn-lg btn-outline" style="border-color: white; color: white;">
                        <?php echo sts_get_icon('phone', 'btn-icon'); ?>
                        Hemen Ara: <?php echo esc_html($contact['phone']); ?>
                    </a>
                </div>
                
                <div class="hero-stats">
                    <div class="hero-stat">
                        <span class="hero-stat-number">15+</span>
                        <span class="hero-stat-label">Yıllık Deneyim</span>
                    </div>
                    <div class="hero-stat">
                        <span class="hero-stat-number">10K+</span>
                        <span class="hero-stat-label">Arıza Kaydı</span>
                    </div>
                    <div class="hero-stat">
                        <span class="hero-stat-number">%98</span>
                        <span class="hero-stat-label">Müşteri Memnuniyeti</span>
                    </div>
                </div>
            </div>
            
            <div class="hero-image">
                <div style="position: relative;">
                    <img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?w=800&h=500&fit=crop&q=80" 
                         alt="Profesyonel teknik servis ekibi" 
                         width="800" 
                         height="500"
                         loading="eager"
                         style="border-radius: 1rem; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25);">
                    <!-- Floating Card -->
                    <div style="position: absolute; bottom: -1.5rem; left: -1.5rem; background: white; padding: 1rem; border-radius: 0.75rem; box-shadow: 0 10px 40px -10px rgba(0,0,0,0.3);">
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <div style="width: 3rem; height: 3rem; background: #dcfce7; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">✓</div>
                            <div>
                                <div style="font-weight: bold; color: #1e293b;">Hızlı Kayıt</div>
                                <div style="font-size: 0.875rem; color: #64748b;">Anında destek başlasın</div>
                            </div>
                        </div>
                    </div>
                    <!-- Second Card -->
                    <div style="position: absolute; top: -1rem; right: -1rem; background: #1e40af; color: white; padding: 1rem; border-radius: 0.75rem; box-shadow: 0 10px 40px -10px rgba(0,0,0,0.3); text-align: center;">
                        <div style="font-size: 1.5rem; font-weight: bold;">7/24</div>
                        <div style="font-size: 0.75rem; opacity: 0.8;">Arıza Hattı</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Disclaimer Box -->
<div class="container">
    <div class="disclaimer-box">
        <p>
            <strong>Önemli:</strong> Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. 
            Herhangi bir markanın yetkili servisi değiliz.
        </p>
    </div>
</div>

<!-- Services Section -->
<section class="section section-gray" id="hizmetler">
    <div class="container">
        <div class="section-header">
            <h2>Arıza Kayıt Hizmetlerimiz</h2>
            <p>Tüm ev aletleriniz için hızlı ve güvenilir arıza kayıt hizmeti</p>
        </div>
        
        <div class="services-grid">
            <?php 
            $service_images = array(
                'beyaz-esya' => 'https://images.unsplash.com/photo-1626806787461-102c1bfaaea1?w=600&h=400&fit=crop&q=80',
                'kombi-isitma' => 'https://images.unsplash.com/photo-1585771724684-38269d6639fd?w=600&h=400&fit=crop&q=80',
                'klima-sogutma' => 'https://images.unsplash.com/photo-1631545806609-12b5cb25d52b?w=600&h=400&fit=crop&q=80',
                'kucuk-ev-aletleri' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&h=400&fit=crop&q=80',
                'endustriyel' => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=600&h=400&fit=crop&q=80',
                'tv-elektronik' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=600&h=400&fit=crop&q=80'
            );
            foreach ($services as $service): 
            $image_url = isset($service_images[$service['slug']]) ? $service_images[$service['slug']] : '';
            ?>
            <div class="service-card" style="overflow: hidden;">
                <?php if ($image_url): ?>
                <div style="position: relative; height: 180px; overflow: hidden; margin: -1.5rem -1.5rem 1rem -1.5rem;">
                    <img src="<?php echo esc_url($image_url); ?>" 
                         alt="<?php echo esc_attr($service['title']); ?>"
                         style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s;">
                    <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.5), transparent);"></div>
                </div>
                <?php endif; ?>
                <div class="service-icon">
                    <?php echo sts_get_icon($service['icon']); ?>
                </div>
                <h3><?php echo esc_html($service['title']); ?></h3>
                <p><?php echo esc_html($service['description']); ?></p>
                <a href="<?php echo esc_url(home_url('/ariza-kaydi/?hizmet=' . $service['slug'])); ?>" class="btn btn-primary btn-sm">
                    Arıza Kaydı Oluştur
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: center;">
            <?php /* Desktop: 2 columns */ ?>
            <style>
                @media (min-width: 1024px) {
                    .features-layout { grid-template-columns: 1fr 1fr !important; }
                }
            </style>
            <div class="features-layout" style="display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: center;">
                <!-- Image Side -->
                <div style="position: relative;">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop&q=80" 
                         alt="Profesyonel teknik destek"
                         style="border-radius: 1rem; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.15); width: 100%; height: 400px; object-fit: cover;">
                    <div style="position: absolute; bottom: -1.5rem; right: -1.5rem; background: #16a34a; color: white; padding: 1.5rem; border-radius: 0.75rem; box-shadow: 0 10px 40px -10px rgba(0,0,0,0.3); display: none;" class="feature-stat-box">
                        <div style="font-size: 2rem; font-weight: bold;">%98</div>
                        <div style="font-size: 0.875rem;">Müşteri Memnuniyeti</div>
                    </div>
                    <style>
                        @media (min-width: 768px) {
                            .feature-stat-box { display: block !important; }
                        }
                    </style>
                </div>
                
                <!-- Content Side -->
                <div>
                    <h2 style="margin-bottom: 1.5rem;">Neden Bizi Tercih Etmelisiniz?</h2>
                    <p style="color: var(--gray-600); margin-bottom: 2rem;">
                        Sivas ve çevresinde yılların deneyimiyle güvenilir arıza kayıt hizmeti sunuyoruz. 
                        Profesyonel ekibimiz ve geniş servis ağımızla her zaman yanınızdayız.
                    </p>
                    
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <?php
                        $features = array(
                            array('icon' => '⏰', 'title' => '7/24 Arıza Hattı', 'desc' => 'Haftanın her günü arıza kaydınızı oluşturabilirsiniz.'),
                            array('icon' => '✅', 'title' => 'Hızlı Geri Dönüş', 'desc' => 'Kayıt sonrası en kısa sürede sizinle iletişime geçiyoruz.'),
                            array('icon' => '📍', 'title' => 'Sivas Geneli Hizmet', 'desc' => 'Tüm ilçe ve mahallelerde arıza kayıt hizmeti sunuyoruz.'),
                            array('icon' => '🔒', 'title' => 'Güvenilir Hizmet', 'desc' => 'Yılların deneyimiyle güvenilir arıza kayıt organizasyonu.')
                        );
                        foreach ($features as $feature):
                        ?>
                        <div style="display: flex; align-items: flex-start; gap: 1rem;">
                            <div style="width: 3.5rem; height: 3.5rem; background: var(--primary-lighter); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0;">
                                <?php echo $feature['icon']; ?>
                            </div>
                            <div>
                                <h3 style="font-size: 1.125rem; margin-bottom: 0.25rem;"><?php echo esc_html($feature['title']); ?></h3>
                                <p style="color: var(--gray-600); font-size: 0.9375rem; margin: 0;"><?php echo esc_html($feature['desc']); ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="section section-blue" id="nasil-calisir">
    <div class="container">
        <div class="section-header">
            <h2>Nasıl Çalışır?</h2>
            <p>4 basit adımda arıza kayıt sürecinizi başlatın</p>
        </div>
        
        <div class="steps-grid">
            <?php 
            $step_images = array(
                1 => 'https://images.unsplash.com/photo-1556745757-8d76bdb6984b?w=300&h=300&fit=crop&q=80',
                2 => 'https://images.unsplash.com/photo-1581092162384-8987c1d64718?w=300&h=300&fit=crop&q=80',
                3 => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=300&h=300&fit=crop&q=80',
                4 => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?w=300&h=300&fit=crop&q=80'
            );
            foreach ($steps as $index => $step): 
            $step_num = intval($step['number']);
            ?>
            <div class="step-card" style="position: relative;">
                <!-- Step Image -->
                <div style="position: relative; width: 8rem; height: 8rem; margin: 0 auto 1rem; border-radius: 50%; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1); border: 4px solid white;">
                    <img src="<?php echo esc_url($step_images[$step_num]); ?>" 
                         alt="<?php echo esc_attr($step['title']); ?>"
                         style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; inset: 0; background: rgba(30,64,175,0.2);"></div>
                </div>
                
                <!-- Step Number -->
                <div style="position: absolute; top: 0; left: 50%; transform: translateX(-50%) translateY(-0.5rem); width: 2.5rem; height: 2.5rem; background: var(--primary-color); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.125rem; font-weight: bold; box-shadow: 0 4px 15px rgba(30,64,175,0.3);">
                    <?php echo esc_html($step['number']); ?>
                </div>
                
                <h3><?php echo esc_html($step['title']); ?></h3>
                <p><?php echo esc_html($step['description']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="position: relative; padding: 5rem 0;">
    <!-- Background Image -->
    <div style="position: absolute; inset: 0;">
        <img src="https://images.unsplash.com/photo-1581092162384-8987c1d64718?w=1920&h=600&fit=crop&q=80" 
             alt="Teknik servis araçları"
             style="width: 100%; height: 100%; object-fit: cover;">
        <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(30,58,138,0.95), rgba(30,64,175,0.9));"></div>
    </div>
    
    <div class="container" style="position: relative; z-index: 1;">
        <div style="text-align: center; max-width: 700px; margin: 0 auto; color: white;">
            <h2 style="color: white; margin-bottom: 1rem; font-size: 2rem;">Arıza Kaydınızı Hemen Oluşturun</h2>
            <p style="opacity: 0.9; margin-bottom: 2rem; font-size: 1.125rem;">
                Cihazınızda bir arıza mı var? Hemen arıza kaydı oluşturun, 
                teknik destek sürecinizi başlatalım.
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url(home_url('/ariza-kaydi/')); ?>" class="btn btn-lg btn-cta" style="box-shadow: 0 10px 25px -5px rgba(22,163,74,0.4);">
                    Arıza Kaydı Oluştur
                </a>
                <a href="<?php echo esc_url($contact['whatsapp_link']); ?>" class="btn btn-lg" style="background: white; color: var(--primary-color); box-shadow: 0 10px 25px -5px rgba(0,0,0,0.2);" target="_blank" rel="noopener">
                    <?php echo sts_get_icon('whatsapp', 'btn-icon'); ?>
                    WhatsApp ile Ulaşın
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Service Areas Preview -->
<section class="section section-gray">
    <div class="container">
        <div class="section-header">
            <h2>Hizmet Bölgelerimiz</h2>
            <p>Sivas ili ve tüm ilçelerinde arıza kayıt hizmeti</p>
        </div>
        
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
        
        <div style="text-align: center; margin-top: 2rem;">
            <a href="<?php echo esc_url(home_url('/hizmet-bolgeleri/')); ?>" class="btn btn-primary">
                Tüm Bölgeleri Görüntüle
            </a>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section" id="sss">
    <div class="container">
        <div class="section-header">
            <h2>Sıkça Sorulan Sorular</h2>
            <p>Merak ettiğiniz soruların cevapları</p>
        </div>
        
        <div class="faq-list">
            <?php foreach ($faqs as $index => $faq): ?>
            <div class="faq-item <?php echo $index === 0 ? 'active' : ''; ?>">
                <button class="faq-question" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                    <span><?php echo esc_html($faq['question']); ?></span>
                    <?php echo sts_get_icon('chevron-down'); ?>
                </button>
                <div class="faq-answer">
                    <p><?php echo esc_html($faq['answer']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact Preview -->
<section class="section section-gray">
    <div class="container">
        <div class="contact-grid">
            <div>
                <h2>Bize Ulaşın</h2>
                <p style="color: var(--gray-600); margin-bottom: 2rem;">
                    Arıza kaydı oluşturmak veya bilgi almak için bizimle iletişime geçebilirsiniz.
                </p>
                
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <?php echo sts_get_icon('phone'); ?>
                        </div>
                        <div class="contact-info-content">
                            <h4>Arıza Hattı</h4>
                            <p><a href="<?php echo esc_url($contact['phone_link']); ?>"><?php echo esc_html($contact['phone']); ?></a></p>
                        </div>
                    </div>
                    
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <?php echo sts_get_icon('whatsapp'); ?>
                        </div>
                        <div class="contact-info-content">
                            <h4>WhatsApp</h4>
                            <p><a href="<?php echo esc_url($contact['whatsapp_link']); ?>" target="_blank" rel="noopener"><?php echo esc_html($contact['whatsapp']); ?></a></p>
                        </div>
                    </div>
                    
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <?php echo sts_get_icon('clock'); ?>
                        </div>
                        <div class="contact-info-content">
                            <h4>Çalışma Saatleri</h4>
                            <p><?php echo esc_html($contact['hours_weekday']); ?><br><?php echo esc_html($contact['hours_weekend']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3073.8654892838447!2d37.01525!3d39.74775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sMehmet%20Pa%C5%9Fa%20Mah.%2014-19%20Sokak%20No%3A2%2FA%20Sivas!5e0!3m2!1str!2str!4v1234567890" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Sivas Teknik Servis Arıza Kayıt Merkezi Konum">
                </iframe>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
