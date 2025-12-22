import { useState, useEffect } from "react";
import "@/App.css";

// Contact Information
const CONTACT = {
  phone: "444 9 462",
  phoneLink: "tel:4449462",
  landline: "0346 221 03 74",
  landlineLink: "tel:+903462210374",
  whatsapp: "0542 401 09 58",
  whatsappLink: "https://wa.me/905424010958",
  email: "info@serviskayithizmetleri.com.tr",
  address: "Mehmet Paşa Mah. 14-19 Sokak No:2/A Sivas Merkez",
  hoursWeekday: "Pazartesi – Cumartesi: 08:30 – 20:00",
  hoursWeekend: "Pazar: Acil arıza kayıt hattı açık",
  businessName: "Sivas Teknik Servis Arıza Kayıt Merkezi",
};

// Services Data
const SERVICES = [
  {
    title: "Beyaz Eşya Arıza Kayıt",
    description: "Buzdolabı, çamaşır makinesi, bulaşık makinesi, kurutma makinesi arıza kayıt hizmeti.",
    icon: "🧊",
    slug: "beyaz-esya"
  },
  {
    title: "Kombi & Isıtma Sistemleri",
    description: "Kombi, kalorifer, kat kaloriferi ve tüm ısıtma sistemleri için arıza kayıt.",
    icon: "🔥",
    slug: "kombi-isitma"
  },
  {
    title: "Klima & Soğutma Sistemleri",
    description: "Split klima, salon tipi klima, VRF sistemler için arıza kayıt ve destek.",
    icon: "❄️",
    slug: "klima-sogutma"
  },
  {
    title: "Küçük Ev Aletleri",
    description: "Elektrikli süpürge, ütü, mikser, kahve makinesi ve diğer küçük ev aletleri.",
    icon: "🔌",
    slug: "kucuk-ev-aletleri"
  },
  {
    title: "Endüstriyel Cihazlar",
    description: "Endüstriyel mutfak ekipmanları, soğuk hava depoları, profesyonel cihazlar.",
    icon: "🏭",
    slug: "endustriyel"
  },
  {
    title: "Televizyon & Elektronik",
    description: "LED TV, Smart TV ve diğer elektronik cihazlar için arıza kayıt hizmeti.",
    icon: "📺",
    slug: "tv-elektronik"
  }
];

// Steps Data
const STEPS = [
  { number: "1", title: "Arıza Kaydı Alınır", description: "Telefon, WhatsApp veya web formumuz üzerinden arıza bilgilerinizi kayıt altına alıyoruz." },
  { number: "2", title: "Teknik İhtiyaç Değerlendirilir", description: "Arıza türü ve cihaz bilgilerine göre teknik ihtiyaç analizi yapılır." },
  { number: "3", title: "Uygun Servis Yönlendirilir", description: "Bölgenize ve arıza türüne uygun teknik servis ile koordinasyon sağlanır." },
  { number: "4", title: "Destek Süreci Başlatılır", description: "Teknik destek süreci başlatılır ve süreç boyunca bilgilendirilirsiniz." }
];

// FAQ Data
const FAQS = [
  { question: "Yetkili servis misiniz?", answer: "Hayır. Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. Herhangi bir markanın yetkili servisi değiliz." },
  { question: "Hangi markalara bakıyorsunuz?", answer: "Marka bağımsız arıza kayıt ve yönlendirme hizmeti sunulmaktadır. Tüm beyaz eşya, kombi, klima ve ev aletleri için kayıt oluşturabilirsiniz." },
  { question: "Servis hizmetini siz mi veriyorsunuz?", answer: "Teknik destek süreci uygun servislerle organize edilmektedir. Biz arıza kaydı alıyor ve uygun servislere yönlendirme yapıyoruz." },
  { question: "Arıza kaydı nasıl oluştururum?", answer: "Web sitemiz üzerinden, telefon veya WhatsApp hattımız aracılığıyla arıza kaydı oluşturabilirsiniz. Kayıt sonrası teknik destek süreciniz başlatılır." },
  { question: "Hangi bölgelere hizmet veriyorsunuz?", answer: "Sivas ili ve tüm ilçelerinde arıza kayıt hizmeti vermekteyiz. Merkez, Şarkışla, Suşehri, Zara ve diğer ilçelerde hizmetinizdeyiz." },
  { question: "Servis ücreti ne kadar?", answer: "Arıza kayıt hizmetimiz ücretsizdir. Servis ücretleri, yönlendirilen teknik servis tarafından arıza türüne göre belirlenir." }
];

// Regions Data
const REGIONS = [
  { name: "Sivas Merkez", slug: "sivas-merkez" },
  { name: "Şarkışla", slug: "sarkisla" },
  { name: "Suşehri", slug: "susehri" },
  { name: "Zara", slug: "zara" },
  { name: "Gemerek", slug: "gemerek" },
  { name: "Kangal", slug: "kangal" },
  { name: "Divriği", slug: "divrigi" },
  { name: "Yıldızeli", slug: "yildizeli" }
];

// Icons Components
const PhoneIcon = () => (
  <svg width="20" height="20" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24">
    <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
  </svg>
);

const WhatsAppIcon = () => (
  <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
  </svg>
);

const CheckIcon = () => (
  <svg width="16" height="16" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24">
    <path strokeLinecap="round" strokeLinejoin="round" d="M5 13l4 4L19 7"/>
  </svg>
);

const ChevronDownIcon = () => (
  <svg width="20" height="20" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24">
    <path strokeLinecap="round" strokeLinejoin="round" d="M19 9l-7 7-7-7"/>
  </svg>
);

const LocationIcon = () => (
  <svg width="20" height="20" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24">
    <path strokeLinecap="round" strokeLinejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
    <path strokeLinecap="round" strokeLinejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
  </svg>
);

const ClockIcon = () => (
  <svg width="20" height="20" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24">
    <path strokeLinecap="round" strokeLinejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
  </svg>
);

const EmailIcon = () => (
  <svg width="20" height="20" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24">
    <path strokeLinecap="round" strokeLinejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
  </svg>
);

// Header Component
const Header = () => {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  
  return (
    <header className="sticky top-0 z-50 bg-white shadow-md">
      {/* Top Bar */}
      <div className="bg-blue-800 text-white py-2 text-sm">
        <div className="container mx-auto px-4 flex justify-between items-center flex-wrap gap-2">
          <div className="flex items-center gap-4">
            <a href={CONTACT.phoneLink} className="flex items-center gap-1 hover:opacity-80">
              <PhoneIcon />
              <span>{CONTACT.phone}</span>
            </a>
            <a href={`mailto:${CONTACT.email}`} className="hidden md:flex items-center gap-1 hover:opacity-80">
              <EmailIcon />
              <span>{CONTACT.email}</span>
            </a>
          </div>
          <div className="hidden md:flex items-center gap-1">
            <ClockIcon />
            <span>{CONTACT.hoursWeekday}</span>
          </div>
        </div>
      </div>
      
      {/* Main Header */}
      <div className="py-4">
        <div className="container mx-auto px-4 flex justify-between items-center">
          {/* Logo */}
          <a href="/" className="flex items-center gap-3">
            <div className="w-12 h-12 bg-blue-800 rounded-lg flex items-center justify-center">
              <span className="text-white text-xl">🔧</span>
            </div>
            <div>
              <div className="font-bold text-blue-800 text-lg">Sivas Teknik Servis</div>
              <div className="text-xs text-gray-500">Arıza Kayıt Merkezi</div>
            </div>
          </a>
          
          {/* Desktop Nav */}
          <nav className="hidden lg:flex items-center gap-6">
            <a href="#anasayfa" className="font-medium text-gray-700 hover:text-blue-800">Ana Sayfa</a>
            <a href="#hizmetler" className="font-medium text-gray-700 hover:text-blue-800">Hizmetler</a>
            <a href="#bolgeler" className="font-medium text-gray-700 hover:text-blue-800">Hizmet Bölgeleri</a>
            <a href="#sss" className="font-medium text-gray-700 hover:text-blue-800">SSS</a>
            <a href="#iletisim" className="font-medium text-gray-700 hover:text-blue-800">İletişim</a>
          </nav>
          
          {/* CTA Buttons */}
          <div className="flex items-center gap-2">
            <a href={CONTACT.phoneLink} className="hidden lg:flex items-center gap-2 bg-blue-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-900 transition">
              <PhoneIcon />
              Hemen Ara
            </a>
            <a href={CONTACT.whatsappLink} target="_blank" rel="noopener noreferrer" className="flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-700 transition">
              <WhatsAppIcon />
              <span className="hidden sm:inline">WhatsApp</span>
            </a>
            
            {/* Mobile Menu Toggle */}
            <button 
              onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
              className="lg:hidden flex flex-col gap-1 p-2"
              aria-label="Menüyü Aç"
            >
              <span className={`w-6 h-0.5 bg-gray-700 transition-transform ${mobileMenuOpen ? 'rotate-45 translate-y-1.5' : ''}`}></span>
              <span className={`w-6 h-0.5 bg-gray-700 transition-opacity ${mobileMenuOpen ? 'opacity-0' : ''}`}></span>
              <span className={`w-6 h-0.5 bg-gray-700 transition-transform ${mobileMenuOpen ? '-rotate-45 -translate-y-1.5' : ''}`}></span>
            </button>
          </div>
        </div>
        
        {/* Mobile Menu */}
        {mobileMenuOpen && (
          <nav className="lg:hidden border-t mt-4 py-4">
            <div className="container mx-auto px-4 flex flex-col gap-3">
              <a href="#anasayfa" className="py-2 border-b text-gray-700">Ana Sayfa</a>
              <a href="#hizmetler" className="py-2 border-b text-gray-700">Hizmetler</a>
              <a href="#bolgeler" className="py-2 border-b text-gray-700">Hizmet Bölgeleri</a>
              <a href="#sss" className="py-2 border-b text-gray-700">SSS</a>
              <a href="#iletisim" className="py-2 text-gray-700">İletişim</a>
            </div>
          </nav>
        )}
      </div>
    </header>
  );
};

// Hero Section
const Hero = () => (
  <section id="anasayfa" className="relative bg-gradient-to-br from-blue-800 to-blue-900 text-white py-16 lg:py-24 overflow-hidden">
    {/* Background Pattern */}
    <div className="absolute inset-0 opacity-10">
      <div className="absolute top-10 left-10 w-32 h-32 border border-white rounded-full"></div>
      <div className="absolute bottom-20 right-20 w-48 h-48 border border-white rounded-full"></div>
      <div className="absolute top-1/2 left-1/3 w-24 h-24 border border-white rounded-full"></div>
    </div>
    
    <div className="container mx-auto px-4 relative z-10">
      <div className="grid lg:grid-cols-2 gap-12 items-center">
        {/* Content */}
        <div className="text-center lg:text-left">
          <div className="inline-flex items-center gap-2 bg-white/15 px-4 py-2 rounded-full text-sm mb-6">
            <CheckIcon />
            <span>7/24 Arıza Kayıt Hizmeti</span>
          </div>
          
          <h1 className="text-3xl lg:text-5xl font-bold mb-6 leading-tight">
            Teknik Servis Arıza Kayıt ve Destek Merkezi
          </h1>
          
          <p className="text-lg opacity-90 mb-8 max-w-xl mx-auto lg:mx-0">
            Arıza kaydı oluşturun, teknik destek sürecinizi hızlıca başlatalım. 
            Beyaz eşya, kombi, klima ve tüm ev aletleriniz için profesyonel arıza kayıt hizmeti.
          </p>
          
          <div className="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
            <a href="#kayit" className="inline-flex items-center justify-center gap-2 bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition shadow-lg">
              Arıza Kaydı Oluştur
            </a>
            <a href={CONTACT.phoneLink} className="inline-flex items-center justify-center gap-2 bg-white/10 border border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white/20 transition">
              <PhoneIcon />
              Hemen Ara: {CONTACT.phone}
            </a>
          </div>
          
          {/* Stats */}
          <div className="grid grid-cols-3 gap-6 mt-12 pt-8 border-t border-white/20">
            <div className="text-center lg:text-left">
              <div className="text-2xl lg:text-3xl font-bold">15+</div>
              <div className="text-sm opacity-80">Yıllık Deneyim</div>
            </div>
            <div className="text-center lg:text-left">
              <div className="text-2xl lg:text-3xl font-bold">10K+</div>
              <div className="text-sm opacity-80">Arıza Kaydı</div>
            </div>
            <div className="text-center lg:text-left">
              <div className="text-2xl lg:text-3xl font-bold">%98</div>
              <div className="text-sm opacity-80">Memnuniyet</div>
            </div>
          </div>
        </div>
        
        {/* Image */}
        <div className="hidden lg:block">
          <img 
            src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=800&h=600&fit=crop&q=80" 
            alt="Profesyonel teknik servis ekibi"
            className="rounded-xl shadow-2xl animate-float"
            width="800"
            height="600"
          />
        </div>
      </div>
    </div>
  </section>
);

// Disclaimer Box
const DisclaimerBox = ({ text, className = "" }) => (
  <div className={`bg-gray-100 border-l-4 border-blue-800 p-4 rounded-r-lg ${className}`}>
    <p className="text-gray-700 text-sm">
      <strong className="text-blue-800">Önemli:</strong> {text || "Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. Herhangi bir markanın yetkili servisi değiliz."}
    </p>
  </div>
);

// Services Section
const Services = () => (
  <section id="hizmetler" className="py-16 bg-gray-50">
    <div className="container mx-auto px-4">
      <div className="text-center mb-12">
        <h2 className="text-3xl font-bold text-gray-900 mb-4">Arıza Kayıt Hizmetlerimiz</h2>
        <p className="text-gray-600 max-w-2xl mx-auto">Tüm ev aletleriniz için hızlı ve güvenilir arıza kayıt hizmeti</p>
      </div>
      
      <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        {SERVICES.map((service, index) => (
          <div key={index} className="bg-white rounded-xl p-6 shadow-md border border-gray-200 hover:shadow-lg hover:border-blue-300 transition group">
            <div className="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center text-3xl mb-4 group-hover:bg-blue-800 group-hover:scale-110 transition">
              <span className="group-hover:grayscale group-hover:brightness-200">{service.icon}</span>
            </div>
            <h3 className="text-xl font-semibold text-gray-900 mb-2">{service.title}</h3>
            <p className="text-gray-600 mb-4">{service.description}</p>
            <a href={`#kayit?hizmet=${service.slug}`} className="inline-block w-full text-center bg-blue-800 text-white py-2 px-4 rounded-lg font-semibold hover:bg-blue-900 transition">
              Arıza Kaydı Oluştur
            </a>
          </div>
        ))}
      </div>
    </div>
  </section>
);

// Features Section
const Features = () => (
  <section className="py-16">
    <div className="container mx-auto px-4">
      <div className="text-center mb-12">
        <h2 className="text-3xl font-bold text-gray-900 mb-4">Neden Bizi Tercih Etmelisiniz?</h2>
        <p className="text-gray-600">Sivas ve çevresinde güvenilir arıza kayıt hizmeti</p>
      </div>
      
      <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
        {[
          { icon: "⏰", title: "7/24 Arıza Hattı", desc: "Haftanın her günü arıza kaydınızı oluşturabilirsiniz." },
          { icon: "✅", title: "Hızlı Geri Dönüş", desc: "Kayıt sonrası en kısa sürede sizinle iletişime geçiyoruz." },
          { icon: "📍", title: "Sivas Geneli Hizmet", desc: "Tüm ilçe ve mahallelerde arıza kayıt hizmeti sunuyoruz." },
          { icon: "🔒", title: "Güvenilir Hizmet", desc: "Yılların deneyimiyle güvenilir arıza kayıt organizasyonu." }
        ].map((feature, index) => (
          <div key={index} className="text-center p-6">
            <div className="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center text-4xl mx-auto mb-4">
              {feature.icon}
            </div>
            <h3 className="font-semibold text-gray-900 mb-2">{feature.title}</h3>
            <p className="text-gray-600 text-sm">{feature.desc}</p>
          </div>
        ))}
      </div>
    </div>
  </section>
);

// How It Works Section
const HowItWorks = () => (
  <section className="py-16 bg-blue-50">
    <div className="container mx-auto px-4">
      <div className="text-center mb-12">
        <h2 className="text-3xl font-bold text-gray-900 mb-4">Nasıl Çalışır?</h2>
        <p className="text-gray-600">4 basit adımda arıza kayıt sürecinizi başlatın</p>
      </div>
      
      <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
        {STEPS.map((step, index) => (
          <div key={index} className="text-center relative">
            <div className="w-16 h-16 bg-blue-800 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
              {step.number}
            </div>
            <h3 className="font-semibold text-gray-900 mb-2">{step.title}</h3>
            <p className="text-gray-600 text-sm">{step.description}</p>
          </div>
        ))}
      </div>
    </div>
  </section>
);

// CTA Section
const CTASection = () => (
  <section className="py-16 bg-gradient-to-r from-blue-800 to-blue-900 text-white">
    <div className="container mx-auto px-4 text-center">
      <h2 className="text-3xl font-bold mb-4">Arıza Kaydınızı Hemen Oluşturun</h2>
      <p className="opacity-90 mb-8 max-w-2xl mx-auto">
        Cihazınızda bir arıza mı var? Hemen arıza kaydı oluşturun, teknik destek sürecinizi başlatalım.
      </p>
      <div className="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="#kayit" className="inline-flex items-center justify-center gap-2 bg-green-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-green-700 transition text-lg">
          Arıza Kaydı Oluştur
        </a>
        <a href={CONTACT.whatsappLink} target="_blank" rel="noopener noreferrer" className="inline-flex items-center justify-center gap-2 bg-white text-blue-800 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition text-lg">
          <WhatsAppIcon />
          WhatsApp ile Ulaşın
        </a>
      </div>
    </div>
  </section>
);

// Regions Section
const Regions = () => (
  <section id="bolgeler" className="py-16 bg-gray-50">
    <div className="container mx-auto px-4">
      <div className="text-center mb-12">
        <h2 className="text-3xl font-bold text-gray-900 mb-4">Hizmet Bölgelerimiz</h2>
        <p className="text-gray-600">Sivas ili ve tüm ilçelerinde arıza kayıt hizmeti</p>
      </div>
      
      <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
        {REGIONS.map((region, index) => (
          <a key={index} href={`#bolge-${region.slug}`} className="bg-white p-4 rounded-lg shadow-sm border border-gray-200 hover:shadow-md hover:border-blue-300 transition flex items-center gap-3">
            <div className="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-800">
              <LocationIcon />
            </div>
            <div>
              <h3 className="font-semibold text-gray-900">{region.name}</h3>
              <p className="text-xs text-gray-500">Teknik Servis</p>
            </div>
          </a>
        ))}
      </div>
      
      <DisclaimerBox 
        text="Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. Herhangi bir markanın yetkili servisi değiliz. Tüm bölgelerde marka bağımsız arıza kayıt hizmeti sunulmaktadır."
        className="max-w-3xl mx-auto mt-8"
      />
    </div>
  </section>
);

// FAQ Section
const FAQ = () => {
  const [activeIndex, setActiveIndex] = useState(0);
  
  return (
    <section id="sss" className="py-16">
      <div className="container mx-auto px-4">
        <div className="text-center mb-12">
          <h2 className="text-3xl font-bold text-gray-900 mb-4">Sıkça Sorulan Sorular</h2>
          <p className="text-gray-600">Merak ettiğiniz soruların cevapları</p>
        </div>
        
        <div className="max-w-3xl mx-auto space-y-4">
          {FAQS.map((faq, index) => (
            <div key={index} className={`bg-white border rounded-lg overflow-hidden ${activeIndex === index ? 'border-blue-300 shadow-md' : 'border-gray-200'}`}>
              <button 
                onClick={() => setActiveIndex(activeIndex === index ? -1 : index)}
                className={`w-full flex justify-between items-center p-4 text-left font-semibold transition ${activeIndex === index ? 'bg-blue-50 text-blue-800' : 'text-gray-800 hover:bg-gray-50'}`}
              >
                <span>{faq.question}</span>
                <span className={`transform transition ${activeIndex === index ? 'rotate-180' : ''}`}>
                  <ChevronDownIcon />
                </span>
              </button>
              {activeIndex === index && (
                <div className="p-4 text-gray-600 border-t">
                  {faq.answer}
                </div>
              )}
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

// Contact Section
const Contact = () => (
  <section id="iletisim" className="py-16 bg-gray-50">
    <div className="container mx-auto px-4">
      <div className="text-center mb-12">
        <h2 className="text-3xl font-bold text-gray-900 mb-4">Bize Ulaşın</h2>
        <p className="text-gray-600">Arıza kaydı oluşturmak veya bilgi almak için bizimle iletişime geçebilirsiniz.</p>
      </div>
      
      <div className="grid lg:grid-cols-2 gap-12 max-w-5xl mx-auto">
        {/* Contact Info */}
        <div className="space-y-4">
          {[
            { icon: <PhoneIcon />, title: "Arıza Hattı", value: CONTACT.phone, link: CONTACT.phoneLink },
            { icon: <PhoneIcon />, title: "Sabit Hat", value: CONTACT.landline, link: CONTACT.landlineLink },
            { icon: <WhatsAppIcon />, title: "WhatsApp", value: CONTACT.whatsapp, link: CONTACT.whatsappLink, external: true },
            { icon: <EmailIcon />, title: "E-posta", value: CONTACT.email, link: `mailto:${CONTACT.email}` },
            { icon: <ClockIcon />, title: "Çalışma Saatleri", value: CONTACT.hoursWeekday }
          ].map((item, index) => (
            <div key={index} className="bg-white p-4 rounded-lg shadow-sm flex items-center gap-4">
              <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-800">
                {item.icon}
              </div>
              <div>
                <div className="text-sm text-gray-500">{item.title}</div>
                {item.link ? (
                  <a href={item.link} target={item.external ? "_blank" : undefined} rel={item.external ? "noopener noreferrer" : undefined} className="font-semibold text-blue-800 hover:underline">
                    {item.value}
                  </a>
                ) : (
                  <div className="font-semibold text-gray-900">{item.value}</div>
                )}
              </div>
            </div>
          ))}
          
          <div className="bg-white p-4 rounded-lg shadow-sm">
            <div className="flex items-start gap-4">
              <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-800">
                <LocationIcon />
              </div>
              <div>
                <div className="text-sm text-gray-500">Adres</div>
                <div className="font-semibold text-gray-900">{CONTACT.address}</div>
              </div>
            </div>
          </div>
          
          <DisclaimerBox className="mt-6" />
        </div>
        
        {/* Map */}
        <div className="bg-white rounded-lg shadow-md overflow-hidden">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3073.8654892838447!2d37.01525!3d39.74775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sMehmet%20Pa%C5%9Fa%20Mah.%2014-19%20Sokak%20No%3A2%2FA%20Sivas!5e0!3m2!1str!2str!4v1234567890"
            width="100%"
            height="400"
            style={{ border: 0 }}
            allowFullScreen=""
            loading="lazy"
            referrerPolicy="no-referrer-when-downgrade"
            title="Sivas Teknik Servis Arıza Kayıt Merkezi Konum"
          />
        </div>
      </div>
    </div>
  </section>
);

// Footer Component
const Footer = () => (
  <footer className="bg-gray-900 text-gray-300">
    <div className="container mx-auto px-4 py-12">
      <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
        {/* Brand */}
        <div>
          <div className="flex items-center gap-3 mb-4">
            <div className="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
              <span className="text-white">🔧</span>
            </div>
            <span className="font-bold text-white text-lg">Sivas Teknik Servis</span>
          </div>
          <p className="text-sm mb-4">
            Arıza kayıt alma ve teknik destek organizasyon merkezi. Beyaz eşya, kombi, klima ve tüm ev aletleriniz için 7/24 arıza kayıt hizmeti.
          </p>
        </div>
        
        {/* Quick Links */}
        <div>
          <h4 className="text-white font-semibold mb-4">Hızlı Linkler</h4>
          <ul className="space-y-2 text-sm">
            <li><a href="#anasayfa" className="hover:text-white transition">Ana Sayfa</a></li>
            <li><a href="#hizmetler" className="hover:text-white transition">Hizmetler</a></li>
            <li><a href="#bolgeler" className="hover:text-white transition">Hizmet Bölgeleri</a></li>
            <li><a href="#sss" className="hover:text-white transition">SSS</a></li>
            <li><a href="#iletisim" className="hover:text-white transition">İletişim</a></li>
          </ul>
        </div>
        
        {/* Services */}
        <div>
          <h4 className="text-white font-semibold mb-4">Hizmetlerimiz</h4>
          <ul className="space-y-2 text-sm">
            <li><a href="#" className="hover:text-white transition">Beyaz Eşya Arıza Kayıt</a></li>
            <li><a href="#" className="hover:text-white transition">Kombi & Isıtma Sistemleri</a></li>
            <li><a href="#" className="hover:text-white transition">Klima & Soğutma</a></li>
            <li><a href="#" className="hover:text-white transition">Küçük Ev Aletleri</a></li>
            <li><a href="#" className="hover:text-white transition">Endüstriyel Cihazlar</a></li>
          </ul>
        </div>
        
        {/* Contact */}
        <div>
          <h4 className="text-white font-semibold mb-4">İletişim</h4>
          <div className="space-y-3 text-sm">
            <div className="flex items-center gap-2">
              <PhoneIcon />
              <a href={CONTACT.phoneLink} className="hover:text-white">{CONTACT.phone}</a>
            </div>
            <div className="flex items-center gap-2">
              <WhatsAppIcon />
              <a href={CONTACT.whatsappLink} target="_blank" rel="noopener noreferrer" className="hover:text-white">{CONTACT.whatsapp}</a>
            </div>
            <div className="flex items-center gap-2">
              <EmailIcon />
              <a href={`mailto:${CONTACT.email}`} className="hover:text-white">{CONTACT.email}</a>
            </div>
            <div className="flex items-start gap-2">
              <LocationIcon />
              <span>{CONTACT.address}</span>
            </div>
          </div>
        </div>
      </div>
      
      {/* Disclaimer */}
      <div className="bg-gray-800 rounded-lg p-4 mt-8 text-sm text-center">
        <p>
          <strong>Önemli Bilgilendirme:</strong> Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. 
          Herhangi bir markanın yetkili servisi veya resmi temsilcisi değiliz. 
          Marka isimleri yalnızca bilgilendirme amaçlı kullanılmaktadır.
        </p>
      </div>
    </div>
    
    {/* Bottom */}
    <div className="border-t border-gray-800 py-4">
      <div className="container mx-auto px-4 text-center text-sm">
        <p>© {new Date().getFullYear()} {CONTACT.businessName}. Tüm hakları saklıdır.</p>
        <p className="mt-1">
          <a href="#" className="hover:text-white">Gizlilik Politikası</a>
          {" | "}
          <a href="#" className="hover:text-white">KVKK</a>
          {" | "}
          <a href="#" className="hover:text-white">Kullanım Koşulları</a>
        </p>
      </div>
    </div>
  </footer>
);

// Fixed Mobile Buttons
const FixedMobileButtons = () => (
  <div className="fixed bottom-0 left-0 right-0 flex lg:hidden z-50 shadow-lg">
    <a href={CONTACT.phoneLink} className="flex-1 flex items-center justify-center gap-2 bg-blue-800 text-white py-4 font-semibold">
      <PhoneIcon />
      <span>Hemen Ara</span>
    </a>
    <a href={CONTACT.whatsappLink} target="_blank" rel="noopener noreferrer" className="flex-1 flex items-center justify-center gap-2 bg-green-600 text-white py-4 font-semibold">
      <WhatsAppIcon />
      <span>WhatsApp</span>
    </a>
  </div>
);

// Main App
function App() {
  return (
    <div className="min-h-screen bg-white">
      <Header />
      <main>
        <Hero />
        <div className="container mx-auto px-4 -mt-6 relative z-10">
          <DisclaimerBox />
        </div>
        <Services />
        <Features />
        <HowItWorks />
        <CTASection />
        <Regions />
        <FAQ />
        <Contact />
      </main>
      <Footer />
      <FixedMobileButtons />
      {/* Spacer for fixed bottom buttons on mobile */}
      <div className="h-16 lg:hidden"></div>
    </div>
  );
}

export default App;
