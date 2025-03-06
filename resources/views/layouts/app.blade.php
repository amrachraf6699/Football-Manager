@php
$setting = \App\Models\Setting::first();
@endphp
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $setting->site_name }} | @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <style>
        * { font-family: "IBM Plex Sans Arabic", sans-serif; }
    </style>
</head>
<body class="bg-[#0D1B2A] text-white">
    <nav class="bg-[#1B263B] shadow-lg px-6 py-4 flex justify-between items-center relative">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-[#FFD700]">
            <img src="{{ asset($setting->logo) }}" alt="{{ $setting->site_name }}" class="w-12">
        </a>
        
        <div class="relative flex-1 flex justify-center hidden md:flex">
            <div class="relative bg-[#34495E] px-6 py-3 rounded-lg skew-x-[-10deg] shadow-lg">
                <div class="flex space-x-6 rtl:space-x-reverse skew-x-[10deg] text-white">
                    <a href="{{ route('home') }}" class="hover:text-[#FFD700] transition">الرئيسية</a>
                    <a href="#coaches" class="hover:text-[#FFD700] transition">المدربين</a>
                    <a href="#trainings" class="hover:text-[#FFD700] transition">التدريبات</a>
                    <a href="#" id="openModal" class="hover:text-[#FFD700] transition">تواصل معنا</a>
                    <a href="{{ route('blogs') }}" class="hover:text-[#FFD700] transition">المقالات</a>
                    <div class="relative">
                        <button id="more-btn" class="hover:text-[#FFD700] transition flex items-center">
                            تعرف أكثر <i class='bx bx-chevron-down ml-1'></i>
                        </button>
                        <div id="more-menu" class="hidden absolute bg-[#34495E] text-white mt-2 rounded-lg shadow-lg w-48 z-999999">
                            @foreach (App\Models\Page::query()->active()->get() as $page)
                                <a href="{{ route('page', $page->slug) }}" class="block px-4 py-2 hover:bg-[#FFD700] hover:text-black transition">
                                    {{ $page->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="hidden md:flex space-x-4 rtl:space-x-reverse">
            <a href="{{ route('login') }}" class="border border-[#FFD700] py-2 px-4 rounded-lg hover:bg-[#FFD700] hover:text-black transition">تسجيل الدخول</a>
        </div>
        
        <button id="menu-btn" class="md:hidden text-white text-3xl block">☰</button>
        
    </nav>

    <div id="mobile-menu" class="fixed inset-0 bg-[#1B263B] bg-opacity-95 text-white z-50 hidden flex flex-col items-center justify-center space-y-6">
        <button id="close-menu" class="absolute top-5 right-5 text-3xl">✖</button>

        <a href="#" class="text-xl hover:text-[#FFD700] transition">الرئيسية</a>
        <a href="#coaches" class="text-xl hover:text-[#FFD700] transition">المدربين</a>
        <a href="#trainings" class="text-xl hover:text-[#FFD700] transition">التدريبات</a>
        <a href="#" id="openModalM" class="text-xl hover:text-[#FFD700] transition">تواصل معنا</a>
        <a href="{{ route('blogs') }}" class="text-xl hover:text-[#FFD700] transition">المقالات</a>
        <a href="{{ route('login') }}" class="border border-[#FFD700] py-2 px-4 rounded-lg hover:bg-[#FFD700] hover:text-black transition">تسجيل الدخول</a>

        <div class="relative text-center">
            <button id="more-btn-mobile" class="text-xl hover:text-[#FFD700] transition flex items-center">
                تعرف أكثر <i class='bx bx-chevron-down ml-1'></i>
            </button>
            <div id="more-menu-mobile" class="absolute hidden bg-[#1B263B] text-white rounded-lg shadow-lg w-48 mt-2 left-1/2 transform -translate-x-1/2">
                @foreach (App\Models\Page::query()->active()->get() as $page)
                    <a href="{{ route('page', $page->slug) }}" class="block px-4 py-2 hover:bg-[#FFD700] hover:text-black transition">
                        {{ $page->title }}
                    </a>
                @endforeach
            </div>
        </div>

    </div>


    <main>
        @yield('content')
    </main>


    <footer id="footer" class="bg-[#1B263B] text-white py-12 mt-16">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">

            <div class="flex flex-col items-start">
                <img src="{{ asset($setting->logo) }}" alt="{{ $setting->site_name }}">
                <p class="text-gray-300 leading-relaxed">
                    {{ $setting->site_name }} هي أكاديمية تدريبية تهدف إلى تطوير المهارات الرياضية للشباب والأطفال
                </p>
            </div>

            <div>
                <h3 class="text-[#FFD700] text-lg font-bold mb-4">🚀 روابط سريعة</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="hover:text-[#FFD700] transition duration-300 flex items-center">🏠 الرئيسية</a></li>
                    <li><a href="#coaches" class="hover:text-[#FFD700] transition duration-300 flex items-center">👨‍🏫 المدربين</a></li>
                    <li><a href="#trainings" class="hover:text-[#FFD700] transition duration-300 flex items-center">⚽ التدريبات</a></li>
                    <li><a href="#"  id="openModalF" class="hover:text-[#FFD700] transition duration-300 flex items-center">📞 تواصل معنا</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-[#FFD700] text-lg font-bold mb-4">📍 تواصل معنا</h3>
                <p class="text-gray-300 flex items-center"><i class='bx bx-map text-[#FFD700] mr-2'></i> {{ $setting->address }}</p>
                <p class="text-gray-300 flex items-center"><i class='bx bx-envelope text-[#FFD700] mr-2'></i> <a class="underline" href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></p>
                <p class="text-gray-300 flex items-center"><i class='bx bx-phone text-[#FFD700] mr-2'></i><a class="underline" href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a></p>
            </div>

            <div>
                <h3 class="text-[#FFD700] text-lg font-bold mb-4">📲 تابعنا على</h3>
                <div class="flex space-x-4 rtl:space-x-reverse">
                    <a target="_blank" href="{{ $setting->facebook }}" class="text-[#FFD700] text-3xl hover:text-white transition duration-300"><i class='bx bxl-facebook'></i></a>
                    <a target="_blank" href="{{ $setting->twitter }}" class="text-[#FFD700] text-3xl hover:text-white transition duration-300"><i class='bx bxl-twitter'></i></a>
                    <a target="_blank" href="{{ $setting->instagram }}" class="text-[#FFD700] text-3xl hover:text-white transition duration-300"><i class='bx bxl-instagram'></i></a>
                    <a target="_blank" href="{{ $setting->youtube }}" class="text-[#FFD700] text-3xl hover:text-white transition duration-300"><i class='bx bxl-youtube'></i></a>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center border-t border-gray-700 pt-4">
            <p class="text-gray-400 text-sm">جميع الحقوق محفوظة © 2025 - {{ $setting->site_name }}</p>
        </div>
    </footer>

    <div id="contactModal" class="fixed inset-0 flex text-center items-center justify-center bg-black bg-opacity-50 invisible opacity-0 transition-opacity duration-300 z-50">
        <div class="relative bg-white shadow-2xl p-8 w-[90%] max-w-lg transform scale-90 transition-transform duration-300">            
            <button id="closeModal" class="absolute top-4 right-4 text-gray-600 hover:text-gray-800 text-2xl transition">
                ✖
            </button>
            
            <h2 class="text-3xl text-center font-bold text-gray-900 mb-6 opacity-0 translate-y-2 transition-all duration-500 delay-200">
                تواصل معنا
            </h2>
            
            <div class="space-y-4">
                <p class="text-gray-700 flex items-center justify-center opacity-0 translate-y-2 transition-all duration-500 delay-300">
                    <span class="ml-2">{{ $setting->address }}</span>
                </p>
                <p class="text-gray-700 flex items-center justify-center opacity-0 translate-y-2 transition-all duration-500 delay-400">
                    <span class="ml-2"><a href="mailto:{{ $setting->email }}" class="underline">{{ $setting->email }}</a> | <a href="tel:{{ $setting->phone }}" class="underline">{{ $setting->phone }}</a></span>
                </p>
            </div>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Swiper('.mySwiper', {
                slidesPerView: "auto",
                spaceBetween: 20,
                centeredSlides: true,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    320: { slidesPerView: 1 },
                    640: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuBtn = document.getElementById("menu-btn");
            const mobileMenu = document.getElementById("mobile-menu");
            const closeMenu = document.getElementById("close-menu");

            const moreBtn = document.getElementById("more-btn");
            const moreMenu = document.getElementById("more-menu");

            const moreBtnMobile = document.getElementById("more-btn-mobile");
            const moreMenuMobile = document.getElementById("more-menu-mobile");

            menuBtn.addEventListener("click", () => mobileMenu.classList.remove("hidden"));
            closeMenu.addEventListener("click", () => mobileMenu.classList.add("hidden"));

            moreBtn.addEventListener("click", (event) => {
                event.stopPropagation();
                moreMenu.classList.toggle("hidden");
            });

            moreBtnMobile.addEventListener("click", (event) => {
                event.stopPropagation();
                moreMenuMobile.classList.toggle("hidden");
            });

            document.addEventListener("click", (event) => {
                if (!moreBtn.contains(event.target) && !moreMenu.contains(event.target)) {
                    moreMenu.classList.add("hidden");
                }

                if (!moreBtnMobile.contains(event.target) && !moreMenuMobile.contains(event.target)) {
                    moreMenuMobile.classList.add("hidden");
                }
            });
        });
    </script>
    <script>
        const modal = document.getElementById("contactModal");
        const openModalBtn = document.getElementById("openModal");
        const openModalBtnMobile = document.getElementById("openModalM"); 
        const openModalBtnHome = document.getElementById("openModalH"); 
        const openModalBtnFooter = document.getElementById("openModalF"); 
        const closeModalBtn = document.getElementById("closeModal");
        const mobileMenu = document.getElementById("mobile-menu");
    
        openModalBtn.addEventListener("click", () => {
            modal.classList.remove("invisible", "opacity-0");
            modal.firstElementChild.classList.remove("scale-90");

            mobileMenu.classList.add("hidden");
            setTimeout(() => {
                modal.querySelectorAll("h2, p").forEach(el => {
                    el.classList.remove("opacity-0", "translate-y-2");
                });
            }, 100);
        });

        openModalBtnFooter.addEventListener("click", () => {
            modal.classList.remove("invisible", "opacity-0");
            modal.firstElementChild.classList.remove("scale-90");

            mobileMenu.classList.add("hidden");
            setTimeout(() => {
                modal.querySelectorAll("h2, p").forEach(el => {
                    el.classList.remove("opacity-0", "translate-y-2");
                });
            }, 100);
        });

        openModalBtnHome.addEventListener("click", () => {
            modal.classList.remove("invisible", "opacity-0");
            modal.firstElementChild.classList.remove("scale-90");

            mobileMenu.classList.add("hidden");
            setTimeout(() => {
                modal.querySelectorAll("h2, p").forEach(el => {
                    el.classList.remove("opacity-0", "translate-y-2");
                });
            }, 100);
        });

        openModalBtnMobile.addEventListener("click", () => {
            console.log("OPOE");
            modal.classList.remove("invisible", "opacity-0");
            modal.firstElementChild.classList.remove("scale-90");

            mobileMenu.classList.add("hidden");

            setTimeout(() => {
                modal.querySelectorAll("h2, p").forEach(el => {
                    el.classList.remove("opacity-0", "translate-y-2");
                });
            }, 100);
        });

    
        closeModalBtn.addEventListener("click", () => {
            modal.classList.add("opacity-0");
            modal.firstElementChild.classList.add("scale-90");
    
            setTimeout(() => {
                modal.classList.add("invisible");
            }, 300);
        });
    
        modal.addEventListener("click", (e) => {
            if (e.target === modal) closeModalBtn.click();
        });
    </script>

</body>
</html>
