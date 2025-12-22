# Sivas Teknik Servis Arıza Kayıt Merkezi - WordPress Teması

## Tema Bilgileri

- **Tema Adı:** Sivas Teknik Servis Arıza Kayıt Merkezi
- **Versiyon:** 1.0.0
- **Uyumluluk:** WordPress 6.0+
- **PHP Gereksinimi:** 7.4+

## Özellikler

### SEO Optimize
- Schema.org (LocalBusiness, Service, FAQPage) entegrasyonu
- Semantik HTML5 yapısı
- Meta tag optimizasyonu
- RankMath / Yoast uyumlu

### Performans
- 2 saniye altı yüklenme hedefi
- Core Web Vitals optimize
- LSCache / WP Rocket uyumlu
- Lazy loading
- Minimize CSS/JS

### Tasarım
- Mobile-first responsive tasarım
- Modern UI/UX
- Profesyonel ve güven veren görünüm
- Sabit telefon ve WhatsApp butonları

### Google Ads & Maps Uyumu
- Yetkili servis iddiası içermiyor
- Zorunlu disclaimer blokları
- Google Business Profile uyumlu
- Ads politikalarına %100 uyumlu

## Kurulum

1. `sivas-teknik-servis` klasörünü `/wp-content/themes/` dizinine yükleyin
2. WordPress Yönetim Paneli > Görünüm > Temalar bölümünden temayı etkinleştirin
3. Gerekli sayfaları oluşturun ve uygun şablonları atayın

## Sayfa Şablonları

| Şablon | Dosya | Açıklama |
|--------|-------|----------|
| Ana Sayfa | front-page.php | Homepage |
| Arıza Kaydı | page-ariza-kaydi.php | Kayıt formu |
| Hizmet Bölgeleri | page-hizmet-bolgeleri.php | Bölge listesi |
| İletişim | page-iletisim.php | İletişim bilgileri |
| Markalar | page-markalar.php | Marka bilgileri |
| İlçe Sayfası | page-ilce.php | Lokal SEO sayfaları |
| Marka Bilgi | page-marka-bilgi.php | Marka detay sayfaları |
| KVKK | page-kvkk.php | KVKK metni |
| Gizlilik | page-gizlilik-politikasi.php | Gizlilik politikası |

## İletişim Bilgilerini Güncelleme

`functions.php` dosyasındaki `sts_get_contact_info()` fonksiyonunu düzenleyin:

```php
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
        // ...
    );
    // ...
}
```

## SEO Sayfaları Oluşturma

### İlçe Sayfaları
Yeni bir sayfa oluşturun ve "İlçe Sayfası" şablonunu seçin.

Sayfa URL örnekleri:
- /hizmet-bolgeleri/sivas-merkez-teknik-servis/
- /hizmet-bolgeleri/sarkisla-teknik-servis/

### Marka Bilgi Sayfaları
Yeni bir sayfa oluşturun ve "Marka Bilgi Sayfası" şablonunu seçin.

Sayfa URL örnekleri:
- /marka-bilgileri/arcelik-buzdolabi-ariza/
- /marka-bilgileri/bosch-camasir-makinesi-teknik-destek/

## Önemli Notlar

⚠️ **YASAK KELİMELER:**
- "Yetkili Servis"
- "Resmi Servis"
- Marka sahibi gibi ifadeler

✅ **ZORUNLU İFADELER:**
- "Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur."
- Her sayfada disclaimer bölümü bulunmalıdır.

## Lisans

GNU General Public License v2 or later

## Destek

Sorularınız için: info@serviskayithizmetleri.com.tr
