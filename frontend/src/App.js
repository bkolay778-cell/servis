import { useState, useEffect, useCallback } from "react";
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

// Images
const IMAGES = {
  hero1: "https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=1920&h=800&fit=crop&q=80",
  hero2: "https://images.unsplash.com/photo-1581092160562-40aa08e78837?w=1920&h=800&fit=crop&q=80",
  hero3: "https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1920&h=800&fit=crop&q=80",
  hero4: "https://images.unsplash.com/photo-1585771724684-38269d6639fd?w=1920&h=800&fit=crop&q=80",
  technician1: "https://images.unsplash.com/photo-1621905252507-b35492cc74b4?w=600&h=400&fit=crop&q=80",
  technician2: "https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop&q=80",
  washingMachine: "https://images.unsplash.com/photo-1626806787461-102c1bfaaea1?w=600&h=400&fit=crop&q=80",
  refrigerator: "https://images.unsplash.com/photo-1584568694244-14fbdf83bd30?w=600&h=400&fit=crop&q=80",
  airConditioner: "https://images.unsplash.com/photo-1631545806609-12b5cb25d52b?w=600&h=400&fit=crop&q=80",
  boiler: "https://images.unsplash.com/photo-1585771724684-38269d6639fd?w=600&h=400&fit=crop&q=80",
  smallAppliances: "https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&h=400&fit=crop&q=80",
  tv: "https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=600&h=400&fit=crop&q=80",
  industrial: "https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=600&h=400&fit=crop&q=80",
  customerService: "https://images.unsplash.com/photo-1556745757-8d76bdb6984b?w=600&h=400&fit=crop&q=80",
  teamWork: "https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=600&h=400&fit=crop&q=80",
  tools: "https://images.unsplash.com/photo-1581092162384-8987c1d64718?w=600&h=400&fit=crop&q=80",
  support: "https://images.unsplash.com/photo-1521791136064-7986c2920216?w=600&h=400&fit=crop&q=80",
  sivas: "https://images.unsplash.com/photo-1589308078059-be1415eab4c3?w=800&h=400&fit=crop&q=80",
};

// Slider Data
const SLIDES = [
  {
    image: IMAGES.hero1,
    title: "Teknik Servis Arıza Kayıt Merkezi",
    subtitle: "Beyaz eşya, kombi, klima ve tüm ev aletleriniz için profesyonel arıza kayıt hizmeti",
    badge: "7/24 Arıza Kayıt Hizmeti"
  },
  {
    image: IMAGES.hero2,
    title: "Beyaz Eşya Arıza Kayıt",
    subtitle: "Buzdolabı, çamaşır makinesi, bulaşık makinesi arızalarınız için hızlı kayıt",
    badge: "Hızlı Kayıt Sistemi"
  },
  {
    image: IMAGES.hero3,
    title: "Kombi & Klima Arıza Kayıt",
    subtitle: "Isıtma ve soğutma sistemleriniz için teknik destek organizasyonu",
    badge: "Uzman Yönlendirme"
  },
  {
    image: IMAGES.hero4,
    title: "Sivas Genelinde Hizmet",
    subtitle: "Tüm ilçe ve mahallelerde arıza kayıt ve teknik destek koordinasyonu",
    badge: "Geniş Hizmet Ağı"
  }
];

// Services Data with Images
const SERVICES = [
  {
    title: "Beyaz Eşya Arıza Kayıt",
    description: "Buzdolabı, çamaşır makinesi, bulaşık makinesi, kurutma makinesi arıza kayıt hizmeti.",
    icon: "🧊",
    slug: "beyaz-esya",
    image: IMAGES.washingMachine
  },
  {
    title: "Kombi & Isıtma Sistemleri",
    description: "Kombi, kalorifer, kat kaloriferi ve tüm ısıtma sistemleri için arıza kayıt.",
    icon: "🔥",
    slug: "kombi-isitma",
    image: IMAGES.boiler
  },
  {
    title: "Klima & Soğutma Sistemleri",
    description: "Split klima, salon tipi klima, VRF sistemler için arıza kayıt ve destek.",
    icon: "❄️",
    slug: "klima-sogutma",
    image: IMAGES.airConditioner
  },
  {
    title: "Küçük Ev Aletleri",
    description: "Elektrikli süpürge, ütü, mikser, kahve makinesi ve diğer küçük ev aletleri.",
    icon: "🔌",
    slug: "kucuk-ev-aletleri",
    image: IMAGES.smallAppliances
  },
  {
    title: "Endüstriyel Cihazlar",
    description: "Endüstriyel mutfak ekipmanları, soğuk hava depoları, profesyonel cihazlar.",
    icon: "🏭",
    slug: "endustriyel",
    image: IMAGES.industrial
  },
  {
    title: "Televizyon & Elektronik",
    description: "LED TV, Smart TV ve diğer elektronik cihazlar için arıza kayıt hizmeti.",
    icon: "📺",
    slug: "tv-elektronik",
    image: IMAGES.tv
  }
];

// Steps Data
const STEPS = [
  { number: "1", title: "Arıza Kaydı Alınır", description: "Telefon, WhatsApp veya web formumuz üzerinden arıza bilgilerinizi kayıt altına alıyoruz.", image: IMAGES.customerService },
  { number: "2", title: "Teknik İhtiyaç Değerlendirilir", description: "Arıza türü ve cihaz bilgilerine göre teknik ihtiyaç analizi yapılır.", image: IMAGES.tools },
  { number: "3", title: "Uygun Servis Yönlendirilir", description: "Bölgenize ve arıza türüne uygun teknik servis ile koordinasyon sağlanır.", image: IMAGES.teamWork },
  { number: "4", title: "Destek Süreci Başlatılır", description: "Teknik destek süreci başlatılır ve süreç boyunca bilgilendirilirsiniz.", image: IMAGES.support }
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

// All Sivas Districts - Complete List
const REGIONS = [
  { name: "Sivas Merkez", slug: "sivas-merkez", population: "350.000+", neighborhoods: ["Mehmet Paşa", "Alibaba", "Karşıyaka", "Yenişehir", "Kadıburhanettin", "Pulur", "Ferhatbostan", "Esenyurt"] },
  { name: "Şarkışla", slug: "sarkisla", population: "35.000+", neighborhoods: ["Cumhuriyet", "Yeni Mahalle", "Bahçelievler"] },
  { name: "Suşehri", slug: "susehri", population: "25.000+", neighborhoods: ["Fatih", "Cumhuriyet", "Yeni Mahalle"] },
  { name: "Zara", slug: "zara", population: "20.000+", neighborhoods: ["Cumhuriyet", "Yeni Mahalle", "Bahçelievler"] },
  { name: "Gemerek", slug: "gemerek", population: "18.000+", neighborhoods: ["Merkez", "Yeni Mahalle"] },
  { name: "Kangal", slug: "kangal", population: "15.000+", neighborhoods: ["Merkez", "Cumhuriyet"] },
  { name: "Divriği", slug: "divrigi", population: "15.000+", neighborhoods: ["Merkez", "Fatih", "Cumhuriyet"] },
  { name: "Yıldızeli", slug: "yildizeli", population: "12.000+", neighborhoods: ["Merkez", "Yeni Mahalle"] },
  { name: "Gürün", slug: "gurun", population: "12.000+", neighborhoods: ["Merkez", "Cumhuriyet"] },
  { name: "Hafik", slug: "hafik", population: "8.000+", neighborhoods: ["Merkez"] },
  { name: "Altınyayla", slug: "altinyayla", population: "7.000+", neighborhoods: ["Merkez"] },
  { name: "Akıncılar", slug: "akincilar", population: "6.000+", neighborhoods: ["Merkez"] },
  { name: "Koyulhisar", slug: "koyulhisar", population: "6.000+", neighborhoods: ["Merkez"] },
  { name: "İmranlı", slug: "imranli", population: "5.000+", neighborhoods: ["Merkez"] },
  { name: "Ulaş", slug: "ulas", population: "5.000+", neighborhoods: ["Merkez"] },
  { name: "Doğanşar", slug: "dogansar", population: "4.000+", neighborhoods: ["Merkez"] },
  { name: "Gölova", slug: "golova", population: "3.000+", neighborhoods: ["Merkez"] }
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

const ChevronLeftIcon = () => (
  <svg width="24" height="24" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24">
    <path strokeLinecap="round" strokeLinejoin="round" d="M15 19l-7-7 7-7"/>
  </svg>
);

const ChevronRightIcon = () => (
  <svg width="24" height="24" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24">
    <path strokeLinecap="round" strokeLinejoin="round" d="M9 5l7 7-7 7"/>
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

const ArrowBackIcon = () => (
  <svg width="20" height="20" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24">
    <path strokeLinecap="round" strokeLinejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
  </svg>
);

// Header Component
const Header = ({ currentPage, setCurrentPage }) => {
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
          <button onClick={() => setCurrentPage({ type: 'home' })} className="flex items-center gap-3 cursor-pointer">
            <div className="w-12 h-12 bg-blue-800 rounded-lg flex items-center justify-center">
              <span className="text-white text-xl">🔧</span>
            </div>
            <div className="text-left">
              <div className="font-bold text-blue-800 text-lg">Sivas Teknik Servis</div>
              <div className="text-xs text-gray-500">Arıza Kayıt Merkezi</div>
            </div>
          </button>
          
          {/* Desktop Nav */}
          <nav className="hidden lg:flex items-center gap-6">
            <button onClick={() => setCurrentPage({ type: 'home' })} className="font-medium text-gray-700 hover:text-blue-800">Ana Sayfa</button>
            <button onClick={() => setCurrentPage({ type: 'home' })} className="font-medium text-gray-700 hover:text-blue-800">Hizmetler</button>
            <button onClick={() => setCurrentPage({ type: 'regions' })} className="font-medium text-gray-700 hover:text-blue-800">Hizmet Bölgeleri</button>
            <button onClick={() => setCurrentPage({ type: 'home' })} className="font-medium text-gray-700 hover:text-blue-800">SSS</button>
            <button onClick={() => setCurrentPage({ type: 'home' })} className="font-medium text-gray-700 hover:text-blue-800">İletişim</button>
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
              <button onClick={() => { setCurrentPage({ type: 'home' }); setMobileMenuOpen(false); }} className="py-2 border-b text-gray-700 text-left">Ana Sayfa</button>
              <button onClick={() => { setCurrentPage({ type: 'regions' }); setMobileMenuOpen(false); }} className="py-2 border-b text-gray-700 text-left">Hizmet Bölgeleri</button>
              <button onClick={() => { setCurrentPage({ type: 'home' }); setMobileMenuOpen(false); }} className="py-2 text-gray-700 text-left">İletişim</button>
            </div>
          </nav>
        )}
      </div>
    </header>
  );
};

// Hero Slider Component
const HeroSlider = () => {
  const [currentSlide, setCurrentSlide] = useState(0);
  const [isAutoPlaying, setIsAutoPlaying] = useState(true);
  
  const nextSlide = useCallback(() => {
    setCurrentSlide((prev) => (prev + 1) % SLIDES.length);
  }, []);
  
  const prevSlide = () => {
    setCurrentSlide((prev) => (prev - 1 + SLIDES.length) % SLIDES.length);
  };
  
  useEffect(() => {
    if (!isAutoPlaying) return;
    const interval = setInterval(nextSlide, 5000);
    return () => clearInterval(interval);
  }, [isAutoPlaying, nextSlide]);
  
  return (
    <section className="relative h-[600px] lg:h-[700px] overflow-hidden">
      {/* Slides */}
      {SLIDES.map((slide, index) => (
        <div
          key={index}
          className={`absolute inset-0 transition-opacity duration-1000 ${index === currentSlide ? 'opacity-100 z-10' : 'opacity-0 z-0'}`}
        >
          {/* Background Image */}
          <div className="absolute inset-0">
            <img 
              src={slide.image}
              alt={slide.title}
              className="w-full h-full object-cover"
            />
            <div className="absolute inset-0 bg-gradient-to-r from-blue-900/90 via-blue-900/70 to-blue-800/50"></div>
          </div>
          
          {/* Content */}
          <div className="relative z-10 h-full flex items-center">
            <div className="container mx-auto px-4">
              <div className="max-w-2xl text-white">
                <div className={`inline-flex items-center gap-2 bg-white/15 px-4 py-2 rounded-full text-sm mb-6 transition-all duration-700 ${index === currentSlide ? 'translate-y-0 opacity-100' : 'translate-y-4 opacity-0'}`}>
                  <CheckIcon />
                  <span>{slide.badge}</span>
                </div>
                
                <h1 className={`text-3xl lg:text-5xl font-bold mb-6 leading-tight transition-all duration-700 delay-100 ${index === currentSlide ? 'translate-y-0 opacity-100' : 'translate-y-4 opacity-0'}`}>
                  {slide.title}
                </h1>
                
                <p className={`text-lg lg:text-xl opacity-90 mb-8 transition-all duration-700 delay-200 ${index === currentSlide ? 'translate-y-0 opacity-100' : 'translate-y-4 opacity-0'}`}>
                  {slide.subtitle}
                </p>
                
                <div className={`flex flex-col sm:flex-row gap-4 transition-all duration-700 delay-300 ${index === currentSlide ? 'translate-y-0 opacity-100' : 'translate-y-4 opacity-0'}`}>
                  <a href="#kayit" className="inline-flex items-center justify-center gap-2 bg-green-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-green-700 transition shadow-lg text-lg">
                    Arıza Kaydı Oluştur
                  </a>
                  <a href={CONTACT.phoneLink} className="inline-flex items-center justify-center gap-2 bg-white/10 border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white/20 transition text-lg">
                    <PhoneIcon />
                    {CONTACT.phone}
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      ))}
      
      {/* Navigation Arrows */}
      <button 
        onClick={() => { prevSlide(); setIsAutoPlaying(false); }}
        className="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center text-white transition"
        aria-label="Önceki"
      >
        <ChevronLeftIcon />
      </button>
      <button 
        onClick={() => { nextSlide(); setIsAutoPlaying(false); }}
        className="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center text-white transition"
        aria-label="Sonraki"
      >
        <ChevronRightIcon />
      </button>
      
      {/* Dots */}
      <div className="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-3">
        {SLIDES.map((_, index) => (
          <button
            key={index}
            onClick={() => { setCurrentSlide(index); setIsAutoPlaying(false); }}
            className={`w-3 h-3 rounded-full transition-all ${index === currentSlide ? 'bg-white w-8' : 'bg-white/50 hover:bg-white/70'}`}
            aria-label={`Slide ${index + 1}`}
          />
        ))}
      </div>
      
      {/* Stats Bar */}
      <div className="absolute bottom-0 left-0 right-0 z-20 bg-blue-900/80 backdrop-blur-sm">
        <div className="container mx-auto px-4 py-4">
          <div className="grid grid-cols-3 gap-4 text-white text-center">
            <div>
              <div className="text-2xl lg:text-3xl font-bold">15+</div>
              <div className="text-xs lg:text-sm opacity-80">Yıllık Deneyim</div>
            </div>
            <div>
              <div className="text-2xl lg:text-3xl font-bold">10K+</div>
              <div className="text-xs lg:text-sm opacity-80">Arıza Kaydı</div>
            </div>
            <div>
              <div className="text-2xl lg:text-3xl font-bold">%98</div>
              <div className="text-xs lg:text-sm opacity-80">Memnuniyet</div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

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
      
      <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        {SERVICES.map((service, index) => (
          <div key={index} className="bg-white rounded-xl overflow-hidden shadow-lg border border-gray-200 hover:shadow-xl hover:border-blue-300 transition group">
            <div className="relative h-48 overflow-hidden">
              <img 
                src={service.image} 
                alt={service.title}
                className="w-full h-full object-cover group-hover:scale-110 transition duration-500"
              />
              <div className="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
              <div className="absolute bottom-4 left-4">
                <span className="text-4xl">{service.icon}</span>
              </div>
            </div>
            
            <div className="p-6">
              <h3 className="text-xl font-semibold text-gray-900 mb-2">{service.title}</h3>
              <p className="text-gray-600 mb-4">{service.description}</p>
              <a href="#kayit" className="inline-block w-full text-center bg-blue-800 text-white py-3 px-4 rounded-lg font-semibold hover:bg-blue-900 transition">
                Arıza Kaydı Oluştur
              </a>
            </div>
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
      <div className="grid lg:grid-cols-2 gap-12 items-center">
        <div className="relative">
          <img 
            src={IMAGES.technician2}
            alt="Profesyonel teknik destek"
            className="rounded-2xl shadow-xl w-full h-[400px] object-cover"
          />
          <div className="absolute -bottom-6 -right-6 bg-green-600 text-white p-6 rounded-xl shadow-xl hidden md:block">
            <div className="text-3xl font-bold">%98</div>
            <div className="text-sm">Müşteri Memnuniyeti</div>
          </div>
        </div>
        
        <div>
          <h2 className="text-3xl font-bold text-gray-900 mb-6">Neden Bizi Tercih Etmelisiniz?</h2>
          <p className="text-gray-600 mb-8">
            Sivas ve çevresinde yılların deneyimiyle güvenilir arıza kayıt hizmeti sunuyoruz.
          </p>
          
          <div className="space-y-6">
            {[
              { icon: "⏰", title: "7/24 Arıza Hattı", desc: "Haftanın her günü arıza kaydınızı oluşturabilirsiniz." },
              { icon: "✅", title: "Hızlı Geri Dönüş", desc: "Kayıt sonrası en kısa sürede sizinle iletişime geçiyoruz." },
              { icon: "📍", title: "Sivas Geneli Hizmet", desc: "Tüm ilçe ve mahallelerde arıza kayıt hizmeti sunuyoruz." },
              { icon: "🔒", title: "Güvenilir Hizmet", desc: "Yılların deneyimiyle güvenilir arıza kayıt organizasyonu." }
            ].map((feature, index) => (
              <div key={index} className="flex items-start gap-4">
                <div className="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">
                  {feature.icon}
                </div>
                <div>
                  <h3 className="font-semibold text-gray-900 mb-1">{feature.title}</h3>
                  <p className="text-gray-600 text-sm">{feature.desc}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </div>
  </section>
);

// How It Works
const HowItWorks = () => (
  <section className="py-16 bg-blue-50">
    <div className="container mx-auto px-4">
      <div className="text-center mb-12">
        <h2 className="text-3xl font-bold text-gray-900 mb-4">Nasıl Çalışır?</h2>
        <p className="text-gray-600">4 basit adımda arıza kayıt sürecinizi başlatın</p>
      </div>
      
      <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
        {STEPS.map((step, index) => (
          <div key={index} className="text-center relative group">
            <div className="relative w-32 h-32 mx-auto mb-6 rounded-full overflow-hidden shadow-lg border-4 border-white">
              <img 
                src={step.image}
                alt={step.title}
                className="w-full h-full object-cover group-hover:scale-110 transition duration-500"
              />
            </div>
            
            <div className="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-2 w-10 h-10 bg-blue-800 text-white rounded-full flex items-center justify-center text-lg font-bold shadow-lg">
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
  <section className="relative py-20">
    <div className="absolute inset-0">
      <img 
        src={IMAGES.tools}
        alt="Teknik servis araçları"
        className="w-full h-full object-cover"
      />
      <div className="absolute inset-0 bg-gradient-to-r from-blue-900/95 to-blue-800/90"></div>
    </div>
    
    <div className="container mx-auto px-4 relative z-10 text-center text-white">
      <h2 className="text-3xl lg:text-4xl font-bold mb-4">Arıza Kaydınızı Hemen Oluşturun</h2>
      <p className="opacity-90 mb-8 max-w-2xl mx-auto text-lg">
        Cihazınızda bir arıza mı var? Hemen arıza kaydı oluşturun, teknik destek sürecinizi başlatalım.
      </p>
      <div className="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="#kayit" className="inline-flex items-center justify-center gap-2 bg-green-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-green-700 transition text-lg shadow-xl">
          Arıza Kaydı Oluştur
        </a>
        <a href={CONTACT.whatsappLink} target="_blank" rel="noopener noreferrer" className="inline-flex items-center justify-center gap-2 bg-white text-blue-800 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition text-lg shadow-xl">
          <WhatsAppIcon />
          WhatsApp ile Ulaşın
        </a>
      </div>
    </div>
  </section>
);

// Regions Section with All Districts
const RegionsSection = ({ setCurrentPage }) => (
  <section id="bolgeler" className="py-16 bg-gray-50">
    <div className="container mx-auto px-4">
      <div className="text-center mb-12">
        <h2 className="text-3xl font-bold text-gray-900 mb-4">Sivas ve Tüm İlçelerinde Hizmet</h2>
        <p className="text-gray-600">17 ilçede arıza kayıt ve teknik destek organizasyonu</p>
      </div>
      
      {/* Sivas Banner */}
      <div className="relative rounded-2xl overflow-hidden mb-8 h-48">
        <img 
          src={IMAGES.sivas}
          alt="Sivas"
          className="w-full h-full object-cover"
        />
        <div className="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-800/60 flex items-center justify-center">
          <div className="text-center text-white">
            <h3 className="text-2xl lg:text-3xl font-bold mb-2">Sivas İli ve 17 İlçesinde</h3>
            <p className="opacity-90">Profesyonel Arıza Kayıt Hizmeti</p>
          </div>
        </div>
      </div>
      
      <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        {REGIONS.map((region, index) => (
          <button 
            key={index} 
            onClick={() => setCurrentPage({ type: 'district', district: region })}
            className="bg-white p-4 rounded-xl shadow-md border border-gray-200 hover:shadow-lg hover:border-blue-300 transition flex items-center gap-3 group text-left w-full"
          >
            <div className="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-800 group-hover:bg-blue-800 group-hover:text-white transition">
              <LocationIcon />
            </div>
            <div>
              <h3 className="font-semibold text-gray-900">{region.name}</h3>
              <p className="text-xs text-gray-500">Teknik Servis Arıza Kayıt</p>
            </div>
          </button>
        ))}
      </div>
      
      <DisclaimerBox 
        text="Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. Herhangi bir markanın yetkili servisi değiliz."
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
        <div className="grid lg:grid-cols-2 gap-12 items-start">
          <div className="hidden lg:block sticky top-32">
            <img 
              src={IMAGES.customerService}
              alt="Müşteri hizmetleri"
              className="rounded-2xl shadow-xl w-full h-[400px] object-cover"
            />
            <div className="bg-blue-800 text-white p-6 rounded-xl mt-6">
              <h3 className="font-bold text-xl mb-2">Sorularınız mı var?</h3>
              <p className="opacity-90 mb-4">Hemen bizi arayın, size yardımcı olalım.</p>
              <a href={CONTACT.phoneLink} className="inline-flex items-center gap-2 bg-white text-blue-800 px-4 py-2 rounded-lg font-semibold">
                <PhoneIcon />
                {CONTACT.phone}
              </a>
            </div>
          </div>
          
          <div>
            <h2 className="text-3xl font-bold text-gray-900 mb-4">Sıkça Sorulan Sorular</h2>
            <p className="text-gray-600 mb-8">Merak ettiğiniz soruların cevapları</p>
            
            <div className="space-y-4">
              {FAQS.map((faq, index) => (
                <div key={index} className={`bg-white border rounded-xl overflow-hidden ${activeIndex === index ? 'border-blue-300 shadow-lg' : 'border-gray-200'}`}>
                  <button 
                    onClick={() => setActiveIndex(activeIndex === index ? -1 : index)}
                    className={`w-full flex justify-between items-center p-5 text-left font-semibold transition ${activeIndex === index ? 'bg-blue-50 text-blue-800' : 'text-gray-800 hover:bg-gray-50'}`}
                  >
                    <span>{faq.question}</span>
                    <span className={`transform transition ${activeIndex === index ? 'rotate-180' : ''}`}>
                      <ChevronDownIcon />
                    </span>
                  </button>
                  {activeIndex === index && (
                    <div className="p-5 pt-0 text-gray-600 border-t">
                      {faq.answer}
                    </div>
                  )}
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

// Contact Section
const ContactSection = () => (
  <section id="iletisim" className="py-16 bg-gray-50">
    <div className="container mx-auto px-4">
      <div className="text-center mb-12">
        <h2 className="text-3xl font-bold text-gray-900 mb-4">Bize Ulaşın</h2>
        <p className="text-gray-600">Arıza kaydı oluşturmak veya bilgi almak için bizimle iletişime geçebilirsiniz.</p>
      </div>
      
      <div className="grid lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
        <div>
          <div className="relative rounded-2xl overflow-hidden mb-6 h-64">
            <img 
              src={IMAGES.support}
              alt="Destek ekibi"
              className="w-full h-full object-cover"
            />
            <div className="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent flex items-end">
              <div className="p-6 text-white">
                <h3 className="text-xl font-bold mb-1">Profesyonel Destek Ekibi</h3>
                <p className="opacity-90 text-sm">Size yardımcı olmak için buradayız</p>
              </div>
            </div>
          </div>
          
          <div className="space-y-4">
            {[
              { icon: <PhoneIcon />, title: "Arıza Hattı", value: CONTACT.phone, link: CONTACT.phoneLink, bg: "bg-blue-100" },
              { icon: <WhatsAppIcon />, title: "WhatsApp", value: CONTACT.whatsapp, link: CONTACT.whatsappLink, external: true, bg: "bg-green-100" },
              { icon: <ClockIcon />, title: "Çalışma Saatleri", value: CONTACT.hoursWeekday, bg: "bg-gray-100" }
            ].map((item, index) => (
              <div key={index} className="bg-white p-4 rounded-xl shadow-md flex items-center gap-4">
                <div className={`w-12 h-12 ${item.bg} rounded-xl flex items-center justify-center text-blue-800`}>
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
          </div>
          
          <DisclaimerBox className="mt-6" />
        </div>
        
        <div className="bg-white rounded-xl shadow-lg overflow-hidden">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3073.8654892838447!2d37.01525!3d39.74775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sMehmet%20Pa%C5%9Fa%20Mah.%2014-19%20Sokak%20No%3A2%2FA%20Sivas!5e0!3m2!1str!2str!4v1234567890"
            width="100%"
            height="450"
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

// District Detail Page - SEO Optimized
const DistrictPage = ({ district, setCurrentPage }) => {
  // Generate SEO-friendly content
  const pageTitle = `${district.name} Teknik Servis Arıza Kayıt Merkezi`;
  const metaDescription = `${district.name} bölgesinde beyaz eşya, kombi, klima arıza kayıt hizmeti. ${CONTACT.phone} numaralı hattan 7/24 arıza kaydı oluşturabilirsiniz.`;
  
  return (
    <div>
      {/* Breadcrumb */}
      <div className="bg-gray-100 py-4">
        <div className="container mx-auto px-4">
          <div className="flex items-center gap-2 text-sm">
            <button onClick={() => setCurrentPage({ type: 'home' })} className="text-blue-800 hover:underline">Ana Sayfa</button>
            <span className="text-gray-400">/</span>
            <button onClick={() => setCurrentPage({ type: 'regions' })} className="text-blue-800 hover:underline">Hizmet Bölgeleri</button>
            <span className="text-gray-400">/</span>
            <span className="text-gray-600">{district.name}</span>
          </div>
        </div>
      </div>
      
      {/* Page Header */}
      <div className="relative py-16 lg:py-24">
        <div className="absolute inset-0">
          <img 
            src={IMAGES.sivas}
            alt={district.name}
            className="w-full h-full object-cover"
          />
          <div className="absolute inset-0 bg-gradient-to-r from-blue-900/95 to-blue-800/80"></div>
        </div>
        
        <div className="container mx-auto px-4 relative z-10">
          <div className="max-w-3xl text-white">
            <div className="inline-flex items-center gap-2 bg-white/15 px-4 py-2 rounded-full text-sm mb-6">
              <LocationIcon />
              <span>Sivas / {district.name}</span>
            </div>
            
            <h1 className="text-3xl lg:text-5xl font-bold mb-6">{pageTitle}</h1>
            
            <p className="text-lg opacity-90 mb-8">
              {district.name} ve çevresinde beyaz eşya, kombi, klima ve tüm ev aletleri için 
              arıza kayıt ve teknik destek organizasyonu hizmeti sunuyoruz.
            </p>
            
            <div className="flex flex-col sm:flex-row gap-4">
              <a href={CONTACT.phoneLink} className="inline-flex items-center justify-center gap-2 bg-green-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-green-700 transition text-lg">
                <PhoneIcon />
                Hemen Ara: {CONTACT.phone}
              </a>
              <a href={CONTACT.whatsappLink} target="_blank" rel="noopener noreferrer" className="inline-flex items-center justify-center gap-2 bg-white text-blue-800 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition text-lg">
                <WhatsAppIcon />
                WhatsApp
              </a>
            </div>
          </div>
        </div>
      </div>
      
      {/* Critical Disclaimer - Google Ads Compliant */}
      <div className="container mx-auto px-4 -mt-6 relative z-20">
        <div className="bg-amber-50 border-l-4 border-amber-500 p-4 rounded-r-lg shadow-lg">
          <p className="text-amber-800">
            <strong>Önemli Bilgilendirme:</strong> Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. 
            <strong> Herhangi bir markanın yetkili servisi veya resmi temsilcisi değiliz.</strong> 
            {district.name} bölgesinde marka bağımsız arıza kayıt hizmeti sunulmaktadır.
          </p>
        </div>
      </div>
      
      {/* Main Content - SEO Optimized */}
      <section className="py-16">
        <div className="container mx-auto px-4">
          <div className="grid lg:grid-cols-3 gap-12">
            {/* Main Content */}
            <div className="lg:col-span-2">
              <article className="prose max-w-none">
                <h2 className="text-2xl font-bold text-gray-900 mb-4">
                  {district.name} Arıza Kayıt Hizmeti
                </h2>
                
                <p className="text-gray-600 mb-6">
                  {district.name} ilçesinde ikamet eden değerli müşterilerimize profesyonel arıza kayıt hizmeti sunuyoruz. 
                  Beyaz eşya, kombi, klima ve diğer ev aletlerinizde yaşadığınız arızaları kayıt altına alıyor ve 
                  teknik destek sürecinizi başlatıyoruz. Nüfusu {district.population} olan {district.name} ilçesinin 
                  tüm mahallelerinde hizmet vermekteyiz.
                </p>
                
                <h3 className="text-xl font-bold text-gray-900 mb-4">
                  {district.name}'da Sunulan Arıza Kayıt Hizmetleri
                </h3>
                
                <div className="grid md:grid-cols-2 gap-4 mb-8">
                  {SERVICES.map((service, index) => (
                    <div key={index} className="bg-gray-50 p-4 rounded-lg">
                      <div className="flex items-center gap-3 mb-2">
                        <span className="text-2xl">{service.icon}</span>
                        <h4 className="font-semibold text-gray-900">{service.title}</h4>
                      </div>
                      <p className="text-sm text-gray-600">{service.description}</p>
                    </div>
                  ))}
                </div>
                
                <h3 className="text-xl font-bold text-gray-900 mb-4">
                  {district.name} Mahallelerinde Hizmet
                </h3>
                
                <p className="text-gray-600 mb-4">
                  {district.name} ilçesinin aşağıdaki mahallelerinde arıza kayıt hizmeti sunulmaktadır:
                </p>
                
                <div className="flex flex-wrap gap-2 mb-8">
                  {district.neighborhoods.map((neighborhood, index) => (
                    <span key={index} className="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                      {neighborhood}
                    </span>
                  ))}
                  <span className="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">
                    ve diğer tüm mahalleler
                  </span>
                </div>
                
                <h3 className="text-xl font-bold text-gray-900 mb-4">
                  Arıza Kayıt Süreci Nasıl İşler?
                </h3>
                
                <ol className="space-y-4 mb-8">
                  {STEPS.map((step, index) => (
                    <li key={index} className="flex items-start gap-4">
                      <div className="w-8 h-8 bg-blue-800 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">
                        {step.number}
                      </div>
                      <div>
                        <h4 className="font-semibold text-gray-900">{step.title}</h4>
                        <p className="text-gray-600 text-sm">{step.description}</p>
                      </div>
                    </li>
                  ))}
                </ol>
                
                {/* Second Disclaimer */}
                <DisclaimerBox 
                  text={`${district.name} bölgesinde sunulan hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. Yetkili servis değiliz, marka temsilcisi değiliz.`}
                  className="mb-8"
                />
                
                {/* FAQ Schema - SEO */}
                <h3 className="text-xl font-bold text-gray-900 mb-4">
                  {district.name} Teknik Servis Sıkça Sorulan Sorular
                </h3>
                
                <div className="space-y-4">
                  <div className="border rounded-lg p-4">
                    <h4 className="font-semibold text-gray-900 mb-2">
                      {district.name}'da yetkili servis misiniz?
                    </h4>
                    <p className="text-gray-600 text-sm">
                      Hayır. {district.name} bölgesinde sunduğumuz hizmet arıza kayıt alma ve teknik destek 
                      organizasyonudur. Herhangi bir markanın yetkili servisi değiliz.
                    </p>
                  </div>
                  
                  <div className="border rounded-lg p-4">
                    <h4 className="font-semibold text-gray-900 mb-2">
                      {district.name}'da hangi cihazlar için arıza kaydı oluşturabiliyorum?
                    </h4>
                    <p className="text-gray-600 text-sm">
                      Beyaz eşya (buzdolabı, çamaşır makinesi, bulaşık makinesi), kombi, klima, 
                      küçük ev aletleri ve elektronik cihazlar için arıza kaydı oluşturabilirsiniz.
                    </p>
                  </div>
                  
                  <div className="border rounded-lg p-4">
                    <h4 className="font-semibold text-gray-900 mb-2">
                      {district.name}'da arıza kaydı ücreti ne kadar?
                    </h4>
                    <p className="text-gray-600 text-sm">
                      Arıza kayıt hizmetimiz ücretsizdir. Servis ücretleri, yönlendirilen teknik servis 
                      tarafından arıza türüne göre belirlenir.
                    </p>
                  </div>
                </div>
              </article>
            </div>
            
            {/* Sidebar */}
            <div className="lg:col-span-1">
              <div className="sticky top-32 space-y-6">
                {/* CTA Box */}
                <div className="bg-blue-800 text-white p-6 rounded-xl">
                  <h3 className="font-bold text-xl mb-4">
                    {district.name}'da Arıza mı Var?
                  </h3>
                  <p className="opacity-90 mb-6">
                    Hemen arıza kaydı oluşturun, teknik destek sürecinizi başlatalım.
                  </p>
                  <a href={CONTACT.phoneLink} className="block w-full bg-white text-blue-800 py-3 px-4 rounded-lg font-semibold text-center mb-3 hover:bg-gray-100 transition">
                    <PhoneIcon /> {CONTACT.phone}
                  </a>
                  <a href={CONTACT.whatsappLink} target="_blank" rel="noopener noreferrer" className="block w-full bg-green-600 text-white py-3 px-4 rounded-lg font-semibold text-center hover:bg-green-700 transition">
                    <WhatsAppIcon /> WhatsApp
                  </a>
                </div>
                
                {/* Working Hours */}
                <div className="bg-gray-100 p-6 rounded-xl">
                  <h3 className="font-bold text-gray-900 mb-4">Çalışma Saatleri</h3>
                  <div className="space-y-2 text-sm">
                    <div className="flex justify-between">
                      <span className="text-gray-600">Pazartesi - Cumartesi</span>
                      <span className="font-semibold">08:30 - 20:00</span>
                    </div>
                    <div className="flex justify-between">
                      <span className="text-gray-600">Pazar</span>
                      <span className="font-semibold text-green-600">Acil Hat Açık</span>
                    </div>
                  </div>
                </div>
                
                {/* Other Districts */}
                <div className="bg-white border rounded-xl p-6">
                  <h3 className="font-bold text-gray-900 mb-4">Diğer Bölgeler</h3>
                  <div className="space-y-2">
                    {REGIONS.filter(r => r.slug !== district.slug).slice(0, 6).map((region, index) => (
                      <button 
                        key={index}
                        onClick={() => setCurrentPage({ type: 'district', district: region })}
                        className="block w-full text-left text-blue-800 hover:underline text-sm py-1"
                      >
                        {region.name} Teknik Servis
                      </button>
                    ))}
                    <button 
                      onClick={() => setCurrentPage({ type: 'regions' })}
                      className="block w-full text-left text-gray-600 hover:text-blue-800 text-sm py-1 font-semibold"
                    >
                      Tüm bölgeleri gör →
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      {/* CTA Section */}
      <CTASection />
    </div>
  );
};

// All Regions Page
const AllRegionsPage = ({ setCurrentPage }) => (
  <div>
    {/* Breadcrumb */}
    <div className="bg-gray-100 py-4">
      <div className="container mx-auto px-4">
        <div className="flex items-center gap-2 text-sm">
          <button onClick={() => setCurrentPage({ type: 'home' })} className="text-blue-800 hover:underline">Ana Sayfa</button>
          <span className="text-gray-400">/</span>
          <span className="text-gray-600">Hizmet Bölgeleri</span>
        </div>
      </div>
    </div>
    
    {/* Page Header */}
    <div className="relative py-16">
      <div className="absolute inset-0">
        <img 
          src={IMAGES.sivas}
          alt="Sivas"
          className="w-full h-full object-cover"
        />
        <div className="absolute inset-0 bg-gradient-to-r from-blue-900/95 to-blue-800/80"></div>
      </div>
      
      <div className="container mx-auto px-4 relative z-10 text-center text-white">
        <h1 className="text-3xl lg:text-5xl font-bold mb-6">Sivas Teknik Servis Hizmet Bölgeleri</h1>
        <p className="text-lg opacity-90 max-w-2xl mx-auto">
          Sivas ili ve 17 ilçesinde arıza kayıt ve teknik destek organizasyonu hizmeti sunuyoruz.
        </p>
      </div>
    </div>
    
    {/* Disclaimer */}
    <div className="container mx-auto px-4 -mt-6 relative z-20">
      <div className="bg-amber-50 border-l-4 border-amber-500 p-4 rounded-r-lg shadow-lg">
        <p className="text-amber-800">
          <strong>Önemli:</strong> Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. 
          Herhangi bir markanın yetkili servisi değiliz.
        </p>
      </div>
    </div>
    
    {/* All Regions */}
    <section className="py-16">
      <div className="container mx-auto px-4">
        <div className="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
          {REGIONS.map((region, index) => (
            <button 
              key={index}
              onClick={() => setCurrentPage({ type: 'district', district: region })}
              className="bg-white p-6 rounded-xl shadow-md border border-gray-200 hover:shadow-xl hover:border-blue-300 transition text-left group"
            >
              <div className="flex items-start gap-4">
                <div className="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center text-blue-800 group-hover:bg-blue-800 group-hover:text-white transition">
                  <LocationIcon />
                </div>
                <div>
                  <h3 className="font-bold text-gray-900 mb-1">{region.name}</h3>
                  <p className="text-sm text-gray-500 mb-2">Nüfus: {region.population}</p>
                  <p className="text-xs text-blue-800">Teknik Servis Arıza Kayıt →</p>
                </div>
              </div>
            </button>
          ))}
        </div>
      </div>
    </section>
    
    <CTASection />
  </div>
);

// Footer Component
const Footer = ({ setCurrentPage }) => (
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
            Arıza kayıt alma ve teknik destek organizasyon merkezi. 7/24 arıza kayıt hizmeti.
          </p>
        </div>
        
        {/* Quick Links */}
        <div>
          <h4 className="text-white font-semibold mb-4">Hızlı Linkler</h4>
          <ul className="space-y-2 text-sm">
            <li><button onClick={() => setCurrentPage({ type: 'home' })} className="hover:text-white transition">Ana Sayfa</button></li>
            <li><button onClick={() => setCurrentPage({ type: 'regions' })} className="hover:text-white transition">Hizmet Bölgeleri</button></li>
          </ul>
        </div>
        
        {/* Regions */}
        <div>
          <h4 className="text-white font-semibold mb-4">İlçeler</h4>
          <ul className="space-y-2 text-sm">
            {REGIONS.slice(0, 5).map((region, index) => (
              <li key={index}>
                <button onClick={() => setCurrentPage({ type: 'district', district: region })} className="hover:text-white transition">
                  {region.name}
                </button>
              </li>
            ))}
            <li>
              <button onClick={() => setCurrentPage({ type: 'regions' })} className="text-blue-400 hover:text-blue-300 transition">
                Tümünü gör →
              </button>
            </li>
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
            <div className="flex items-start gap-2">
              <LocationIcon />
              <span>{CONTACT.address}</span>
            </div>
          </div>
        </div>
      </div>
      
      {/* Disclaimer */}
      <div className="bg-gray-800 rounded-xl p-4 mt-8 text-sm text-center">
        <p>
          <strong>Önemli:</strong> Hizmetimiz arıza kayıt alma ve teknik destek organizasyonudur. 
          Herhangi bir markanın yetkili servisi veya resmi temsilcisi değiliz.
        </p>
      </div>
    </div>
    
    <div className="border-t border-gray-800 py-4">
      <div className="container mx-auto px-4 text-center text-sm">
        <p>© {new Date().getFullYear()} {CONTACT.businessName}. Tüm hakları saklıdır.</p>
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

// Home Page Component
const HomePage = ({ setCurrentPage }) => (
  <>
    <HeroSlider />
    <div className="container mx-auto px-4 py-6">
      <DisclaimerBox />
    </div>
    <Services />
    <Features />
    <HowItWorks />
    <CTASection />
    <RegionsSection setCurrentPage={setCurrentPage} />
    <FAQ />
    <ContactSection />
  </>
);

// Main App with Routing
function App() {
  const [currentPage, setCurrentPage] = useState({ type: 'home' });
  
  // Scroll to top when page changes
  useEffect(() => {
    window.scrollTo(0, 0);
  }, [currentPage]);
  
  const renderPage = () => {
    switch (currentPage.type) {
      case 'district':
        return <DistrictPage district={currentPage.district} setCurrentPage={setCurrentPage} />;
      case 'regions':
        return <AllRegionsPage setCurrentPage={setCurrentPage} />;
      default:
        return <HomePage setCurrentPage={setCurrentPage} />;
    }
  };
  
  return (
    <div className="min-h-screen bg-white">
      <Header currentPage={currentPage} setCurrentPage={setCurrentPage} />
      <main>
        {renderPage()}
      </main>
      <Footer setCurrentPage={setCurrentPage} />
      <FixedMobileButtons />
      <div className="h-16 lg:hidden"></div>
    </div>
  );
}

export default App;
