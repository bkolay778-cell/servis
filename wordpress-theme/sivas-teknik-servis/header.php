<?php
/**
 * Header Template
 *
 * @package SivasTeknikServis
 */

if (!defined('ABSPATH')) {
    exit;
}

$contact = sts_get_contact_info();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" role="banner">
    <!-- Top Bar -->
    <div class="header-top">
        <div class="container">
            <div class="header-top-inner">
                <div class="header-contact-info">
                    <a href="<?php echo esc_url($contact['phone_link']); ?>" class="header-contact-item">
                        <?php echo sts_get_icon('phone'); ?>
                        <span><?php echo esc_html($contact['phone']); ?></span>
                    </a>
                    <a href="mailto:<?php echo esc_attr($contact['email']); ?>" class="header-contact-item hidden md:flex">
                        <?php echo sts_get_icon('email'); ?>
                        <span><?php echo esc_html($contact['email']); ?></span>
                    </a>
                </div>
                <div class="header-hours hidden md:flex">
                    <?php echo sts_get_icon('clock'); ?>
                    <span><?php echo esc_html($contact['hours_weekday']); ?></span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Header -->
    <div class="header-main">
        <div class="container">
            <div class="header-main-inner">
                <!-- Logo -->
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" aria-label="Ana Sayfa">
                    <?php if (has_custom_logo()): ?>
                        <?php the_custom_logo(); ?>
                    <?php else: ?>
                        <div class="site-logo-icon">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="50" height="50" rx="10" fill="#1e40af"/>
                                <path d="M15 35V20L25 15L35 20V35" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20 35V25H30V35" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="25" cy="22" r="3" stroke="white" stroke-width="2"/>
                            </svg>
                        </div>
                    <?php endif; ?>
                    <div class="site-logo-text">
                        Sivas Teknik Servis
                        <span>Arıza Kayıt Merkezi</span>
                    </div>
                </a>
                
                <!-- Desktop Navigation -->
                <nav class="main-navigation" role="navigation" aria-label="Ana Menü">
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>" <?php echo is_front_page() ? 'class="active"' : ''; ?>>Ana Sayfa</a></li>
                        <li><a href="<?php echo esc_url(home_url('/ariza-kaydi/')); ?>">Arıza Kaydı Oluştur</a></li>
                        <li><a href="<?php echo esc_url(home_url('/hizmet-bolgeleri/')); ?>">Hizmet Bölgeleri</a></li>
                        <li><a href="<?php echo esc_url(home_url('/markalar/')); ?>">Markalar</a></li>
                        <li><a href="<?php echo esc_url(home_url('/iletisim/')); ?>">İletişim</a></li>
                    </ul>
                </nav>
                
                <!-- Header CTA -->
                <div class="header-cta">
                    <a href="<?php echo esc_url($contact['phone_link']); ?>" class="btn btn-primary btn-sm hidden lg:inline-flex">
                        <?php echo sts_get_icon('phone', 'btn-icon'); ?>
                        Hemen Ara
                    </a>
                    <a href="<?php echo esc_url($contact['whatsapp_link']); ?>" class="btn btn-whatsapp btn-sm" target="_blank" rel="noopener">
                        <?php echo sts_get_icon('whatsapp', 'btn-icon'); ?>
                        <span class="hidden sm:inline">WhatsApp</span>
                    </a>
                    
                    <!-- Mobile Menu Toggle -->
                    <button class="mobile-menu-toggle" aria-label="Menüyü Aç" aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mobile Navigation -->
    <nav class="mobile-navigation" role="navigation" aria-label="Mobil Menü" style="display: none;">
        <div class="container">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a></li>
                <li><a href="<?php echo esc_url(home_url('/ariza-kaydi/')); ?>">Arıza Kaydı Oluştur</a></li>
                <li><a href="<?php echo esc_url(home_url('/hizmet-bolgeleri/')); ?>">Hizmet Bölgeleri</a></li>
                <li><a href="<?php echo esc_url(home_url('/markalar/')); ?>">Markalar</a></li>
                <li><a href="<?php echo esc_url(home_url('/iletisim/')); ?>">İletişim</a></li>
            </ul>
        </div>
    </nav>
</header>

<main id="main-content" role="main">
