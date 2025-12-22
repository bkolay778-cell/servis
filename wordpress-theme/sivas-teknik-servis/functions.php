<?php
/**
 * Sivas Teknik Servis Arıza Kayıt Merkezi - Functions
 *
 * @package SivasTeknikServis
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme Constants
define('STS_VERSION', '1.0.0');
define('STS_THEME_DIR', get_template_directory());
define('STS_THEME_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function sts_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary'   => __('Ana Menü', 'sivas-teknik-servis'),
        'footer'    => __('Footer Menü', 'sivas-teknik-servis'),
    ));
    
    // Image sizes
    add_image_size('service-thumb', 600, 400, true);
    add_image_size('hero-image', 800, 600, true);
}
add_action('after_setup_theme', 'sts_theme_setup');

/**
 * Enqueue Scripts and Styles
 */
function sts_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'sts-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700&display=swap',
        array(),
        null
    );
    
    // Main Stylesheet
    wp_enqueue_style(
        'sts-style',
        get_stylesheet_uri(),
        array(),
        STS_VERSION
    );
    
    // Custom CSS
    wp_enqueue_style(
        'sts-custom',
        STS_THEME_URI . '/assets/css/custom.css',
        array('sts-style'),
        STS_VERSION
    );
    
    // Main JavaScript
    wp_enqueue_script(
        'sts-main',
        STS_THEME_URI . '/assets/js/main.js',
        array(),
        STS_VERSION,
        true
    );
    
    // Localize script
    wp_localize_script('sts-main', 'stsData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('sts_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'sts_enqueue_assets');

/**
 * Contact Information
 */
function sts_get_contact_info($key = '') {
    $contact = array(
        'phone'      => '444 9 462',
        'phone_link' => 'tel:4449462',
        'landline'   => '0346 221 03 74',
        'landline_link' => 'tel:+903462210374',
        'whatsapp'   => '0542 401 09 58',
        'whatsapp_link' => 'https://wa.me/905424010958',
        'email'      => 'info@serviskayithizmetleri.com.tr',
        'address'    => 'Mehmet Paşa Mah. 14-19 Sokak No:2/A Sivas Merkez',
        'hours_weekday' => 'Pazartesi – Cumartesi: 08:30 – 20:00',
        'hours_weekend' => 'Pazar: Acil arıza kayıt hattı açık',
        'business_name' => 'Sivas Teknik Servis Arıza Kayıt Merkezi',
    );
    
    if ($key && isset($contact[$key])) {
        return $contact[$key];
    }
    
    return $contact;
}

/**
 * Schema.org JSON-LD Output
 */
function sts_schema_output() {
    $contact = sts_get_contact_info();
    
    // LocalBusiness Schema
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => $contact['business_name'],
        'description' => 'Arıza kayıt alma ve teknik destek organizasyon merkezi. Beyaz eşya, kombi, klima ve tüm ev aletleri için arıza kayıt hizmeti.',
        'url' => home_url(),
        'telephone' => $contact['phone'],
        'email' => $contact['email'],
        'address' => array(
            '@type' => 'PostalAddress',
            'streetAddress' => 'Mehmet Paşa Mah. 14-19 Sokak No:2/A',
            'addressLocality' => 'Sivas',
            'addressRegion' => 'Sivas',
            'postalCode' => '58000',
            'addressCountry' => 'TR'
        ),
        'geo' => array(
            '@type' => 'GeoCoordinates',
            'latitude' => '39.7477',
            'longitude' => '37.0179'
        ),
        'openingHoursSpecification' => array(
            array(
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
                'opens' => '08:30',
                'closes' => '20:00'
            ),
            array(
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => 'Sunday',
                'opens' => '00:00',
                'closes' => '23:59',
                'description' => 'Acil arıza kayıt hattı'
            )
        ),
        'priceRange' => '₺₺',
        'image' => STS_THEME_URI . '/assets/images/logo.png',
        'sameAs' => array(
            'https://wa.me/905424010958'
        )
    );
    
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
    
    // Service Schema
    $service_schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => 'Arıza Kayıt ve Teknik Destek Organizasyonu',
        'description' => 'Beyaz eşya, kombi, klima ve ev aletleri için arıza kayıt alma ve teknik destek yönlendirme hizmeti.',
        'provider' => array(
            '@type' => 'LocalBusiness',
            'name' => $contact['business_name']
        ),
        'areaServed' => array(
            '@type' => 'City',
            'name' => 'Sivas'
        ),
        'serviceType' => 'Arıza Kayıt ve Teknik Destek Organizasyonu'
    );
    
    echo '<script type="application/ld+json">' . wp_json_encode($service_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
}
add_action('wp_head', 'sts_schema_output');

/**
 * FAQ Schema Output
 */
function sts_faq_schema() {
    $faqs = sts_get_faqs();
    
    $faq_schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array()
    );
    
    foreach ($faqs as $faq) {
        $faq_schema['mainEntity'][] = array(
            '@type' => 'Question',
            'name' => $faq['question'],
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => $faq['answer']
            )
        );
    }
    
    echo '<script type="application/ld+json">' . wp_json_encode($faq_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
}

/**
 * Get FAQs
 */
function sts_get_faqs() {
    return array(
        array(
            'question' => 'Yetkili servis misiniz?',
            'answer' => 'Hayır. Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. Herhangi bir markanın yetkili servisi değiliz.'
        ),
        array(
            'question' => 'Hangi markalara bakıyorsunuz?',
            'answer' => 'Marka bağımsız arıza kayıt ve yönlendirme hizmeti sunulmaktadır. Tüm beyaz eşya, kombi, klima ve ev aletleri için kayıt oluşturabilirsiniz.'
        ),
        array(
            'question' => 'Servis hizmetini siz mi veriyorsunuz?',
            'answer' => 'Teknik destek süreci uygun servislerle organize edilmektedir. Biz arıza kaydı alıyor ve uygun servislere yönlendirme yapıyoruz.'
        ),
        array(
            'question' => 'Arıza kaydı nasıl oluştururum?',
            'answer' => 'Web sitemiz üzerinden, telefon veya WhatsApp hattımız aracılığıyla arıza kaydı oluşturabilirsiniz. Kayıt sonrası teknik destek süreciniz başlatılır.'
        ),
        array(
            'question' => 'Hangi bölgelere hizmet veriyorsunuz?',
            'answer' => 'Sivas ili ve tüm ilçelerinde arıza kayıt hizmeti vermekteyiz. Merkez, Şarkışla, Suşehri, Zara ve diğer ilçelerde hizmetinizdeyiz.'
        ),
        array(
            'question' => 'Servis ücreti ne kadar?',
            'answer' => 'Arıza kayıt hizmetimiz ücretsizdir. Servis ücretleri, yönlendirilen teknik servis tarafından arıza türüne göre belirlenir.'
        )
    );
}

/**
 * Get Services
 */
function sts_get_services() {
    return array(
        array(
            'title' => 'Beyaz Eşya Arıza Kayıt',
            'description' => 'Buzdolabı, çamaşır makinesi, bulaşık makinesi, kurutma makinesi arıza kayıt hizmeti.',
            'icon' => 'washing-machine',
            'slug' => 'beyaz-esya'
        ),
        array(
            'title' => 'Kombi & Isıtma Sistemleri',
            'description' => 'Kombi, kalorifer, kat kaloriferi ve tüm ısıtma sistemleri için arıza kayıt.',
            'icon' => 'flame',
            'slug' => 'kombi-isitma'
        ),
        array(
            'title' => 'Klima & Soğutma Sistemleri',
            'description' => 'Split klima, salon tipi klima, VRF sistemler için arıza kayıt ve destek.',
            'icon' => 'snowflake',
            'slug' => 'klima-sogutma'
        ),
        array(
            'title' => 'Küçük Ev Aletleri',
            'description' => 'Elektrikli süpürge, ütü, mikser, kahve makinesi ve diğer küçük ev aletleri.',
            'icon' => 'plug',
            'slug' => 'kucuk-ev-aletleri'
        ),
        array(
            'title' => 'Endüstriyel Cihazlar',
            'description' => 'Endüstriyel mutfak ekipmanları, soğuk hava depoları, profesyonel cihazlar.',
            'icon' => 'factory',
            'slug' => 'endustriyel'
        ),
        array(
            'title' => 'Televizyon & Elektronik',
            'description' => 'LED TV, Smart TV ve diğer elektronik cihazlar için arıza kayıt hizmeti.',
            'icon' => 'tv',
            'slug' => 'tv-elektronik'
        )
    );
}

/**
 * Get How It Works Steps
 */
function sts_get_steps() {
    return array(
        array(
            'number' => '1',
            'title' => 'Arıza Kaydı Alınır',
            'description' => 'Telefon, WhatsApp veya web formumuz üzerinden arıza bilgilerinizi kayıt altına alıyoruz.'
        ),
        array(
            'number' => '2',
            'title' => 'Teknik İhtiyaç Değerlendirilir',
            'description' => 'Arıza türü ve cihaz bilgilerine göre teknik ihtiyaç analizi yapılır.'
        ),
        array(
            'number' => '3',
            'title' => 'Uygun Servis Yönlendirilir',
            'description' => 'Bölgenize ve arıza türüne uygun teknik servis ile koordinasyon sağlanır.'
        ),
        array(
            'number' => '4',
            'title' => 'Destek Süreci Başlatılır',
            'description' => 'Teknik destek süreci başlatılır ve süreç boyunca bilgilendirilirsiniz.'
        )
    );
}

/**
 * Get Regions (Sivas Districts)
 */
function sts_get_regions() {
    return array(
        'merkez' => array(
            'name' => 'Sivas Merkez',
            'slug' => 'sivas-merkez',
            'neighborhoods' => array('Mehmet Paşa', 'Alibaba', 'Karşıyaka', 'Yenişehir', 'Kadıburhanettin')
        ),
        'sarkisla' => array(
            'name' => 'Şarkışla',
            'slug' => 'sarkisla',
            'neighborhoods' => array()
        ),
        'susehri' => array(
            'name' => 'Suşehri',
            'slug' => 'susehri',
            'neighborhoods' => array()
        ),
        'zara' => array(
            'name' => 'Zara',
            'slug' => 'zara',
            'neighborhoods' => array()
        ),
        'gemerek' => array(
            'name' => 'Gemerek',
            'slug' => 'gemerek',
            'neighborhoods' => array()
        ),
        'kangal' => array(
            'name' => 'Kangal',
            'slug' => 'kangal',
            'neighborhoods' => array()
        ),
        'divrigi' => array(
            'name' => 'Divriği',
            'slug' => 'divrigi',
            'neighborhoods' => array()
        ),
        'yildizeli' => array(
            'name' => 'Yıldızeli',
            'slug' => 'yildizeli',
            'neighborhoods' => array()
        )
    );
}

/**
 * Custom Post Type: Hizmet Bölgeleri
 */
function sts_register_post_types() {
    // Bölge Post Type
    register_post_type('sts_region', array(
        'labels' => array(
            'name' => 'Hizmet Bölgeleri',
            'singular_name' => 'Bölge',
            'add_new' => 'Yeni Bölge Ekle',
            'add_new_item' => 'Yeni Bölge Ekle',
            'edit_item' => 'Bölge Düzenle',
            'view_item' => 'Bölgeyi Görüntüle',
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'hizmet-bolgeleri'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-location',
        'show_in_rest' => true,
    ));
    
    // Marka Bilgi Post Type
    register_post_type('sts_brand', array(
        'labels' => array(
            'name' => 'Marka Bilgileri',
            'singular_name' => 'Marka',
            'add_new' => 'Yeni Marka Ekle',
            'add_new_item' => 'Yeni Marka Bilgisi Ekle',
            'edit_item' => 'Marka Düzenle',
            'view_item' => 'Markayı Görüntüle',
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'marka-bilgileri'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-tag',
        'show_in_rest' => true,
    ));
}
add_action('init', 'sts_register_post_types');

/**
 * Disable WordPress Admin Bar for non-admins
 */
if (!current_user_can('administrator')) {
    add_filter('show_admin_bar', '__return_false');
}

/**
 * Add SEO Meta Tags
 */
function sts_add_meta_tags() {
    $contact = sts_get_contact_info();
    
    // Default meta description
    $description = 'Sivas Teknik Servis Arıza Kayıt Merkezi - Beyaz eşya, kombi, klima ve tüm ev aletleri için arıza kayıt ve teknik destek organizasyonu hizmeti. ' . $contact['phone'];
    
    if (is_front_page()) {
        $description = 'Sivas Teknik Servis Arıza Kayıt Merkezi - Arıza kaydı oluşturun, teknik destek sürecinizi hızlıca başlatalım. 7/24 Arıza Hattı: ' . $contact['phone'];
    }
    
    echo '<meta name="description" content="' . esc_attr($description) . '">';
    echo '<meta name="robots" content="index, follow">';
    echo '<meta name="geo.region" content="TR-58">';
    echo '<meta name="geo.placename" content="Sivas">';
    
    // Open Graph
    echo '<meta property="og:type" content="website">';
    echo '<meta property="og:title" content="' . esc_attr(get_bloginfo('name')) . '">';
    echo '<meta property="og:description" content="' . esc_attr($description) . '">';
    echo '<meta property="og:url" content="' . esc_url(home_url()) . '">';
    echo '<meta property="og:locale" content="tr_TR">';
}
add_action('wp_head', 'sts_add_meta_tags', 1);

/**
 * Performance Optimizations
 */
function sts_performance_tweaks() {
    // Remove emoji scripts
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    
    // Remove RSD link
    remove_action('wp_head', 'rsd_link');
    
    // Remove wlwmanifest link
    remove_action('wp_head', 'wlwmanifest_link');
    
    // Remove shortlink
    remove_action('wp_head', 'wp_shortlink_wp_head');
    
    // Remove REST API link
    remove_action('wp_head', 'rest_output_link_wp_head');
    
    // Remove oEmbed
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    
    // Remove generator
    remove_action('wp_head', 'wp_generator');
}
add_action('after_setup_theme', 'sts_performance_tweaks');

/**
 * Add Preconnect for Performance
 */
function sts_resource_hints($hints, $relation_type) {
    if ('preconnect' === $relation_type) {
        $hints[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin' => 'anonymous'
        );
        $hints[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous'
        );
    }
    return $hints;
}
add_filter('wp_resource_hints', 'sts_resource_hints', 10, 2);

/**
 * Widget Areas
 */
function sts_widgets_init() {
    register_sidebar(array(
        'name'          => 'Footer Widget 1',
        'id'            => 'footer-1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => 'Footer Widget 2',
        'id'            => 'footer-2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'sts_widgets_init');

/**
 * AJAX Form Handler
 */
function sts_handle_contact_form() {
    check_ajax_referer('sts_nonce', 'nonce');
    
    $name = sanitize_text_field($_POST['name'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $service = sanitize_text_field($_POST['service'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');
    
    if (empty($name) || empty($phone)) {
        wp_send_json_error(array('message' => 'Lütfen gerekli alanları doldurun.'));
    }
    
    // Save to database or send email
    $contact = sts_get_contact_info();
    $to = $contact['email'];
    $subject = 'Yeni Arıza Kaydı: ' . $service;
    $body = "Ad Soyad: $name\nTelefon: $phone\nHizmet: $service\nMesaj: $message";
    
    $sent = wp_mail($to, $subject, $body);
    
    if ($sent) {
        wp_send_json_success(array('message' => 'Arıza kaydınız alınmıştır. En kısa sürede sizinle iletişime geçeceğiz.'));
    } else {
        wp_send_json_error(array('message' => 'Bir hata oluştu. Lütfen telefon ile iletişime geçin.'));
    }
}
add_action('wp_ajax_sts_contact_form', 'sts_handle_contact_form');
add_action('wp_ajax_nopriv_sts_contact_form', 'sts_handle_contact_form');

/**
 * Custom Excerpt Length
 */
function sts_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'sts_excerpt_length');

/**
 * Include template parts helper
 */
function sts_get_template_part($slug, $name = null, $args = array()) {
    get_template_part($slug, $name, $args);
}

/**
 * Get SVG Icon
 */
function sts_get_icon($name, $class = '') {
    $icons = array(
        'phone' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="' . esc_attr($class) . '"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>',
        'whatsapp' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="' . esc_attr($class) . '"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>',
        'email' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="' . esc_attr($class) . '"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>',
        'location' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="' . esc_attr($class) . '"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
        'clock' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="' . esc_attr($class) . '"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
        'chevron-down' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="' . esc_attr($class) . '"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>',
        'check' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="' . esc_attr($class) . '"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>',
        'washing-machine' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="' . esc_attr($class) . '"><rect x="3" y="2" width="18" height="20" rx="2" stroke-width="2"/><circle cx="12" cy="13" r="5" stroke-width="2"/><circle cx="12" cy="13" r="2" stroke-width="2"/><circle cx="7" cy="6" r="1" fill="currentColor"/><circle cx="11" cy="6" r="1" fill="currentColor"/></svg>',
        'flame' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="' . esc_attr($class) . '"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/></svg>',
        'snowflake' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="' . esc_attr($class) . '"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v20M2 12h20M5.636 5.636l12.728 12.728M18.364 5.636L5.636 18.364"/></svg>',
        'plug' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="' . esc_attr($class) . '"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>',
        'factory' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="' . esc_attr($class) . '"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>',
        'tv' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="' . esc_attr($class) . '"><rect x="2" y="7" width="20" height="15" rx="2" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 2l-5 5-5-5"/></svg>',
    );
    
    return isset($icons[$name]) ? $icons[$name] : '';
}
