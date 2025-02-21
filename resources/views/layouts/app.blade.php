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

        <div class="hidden md:flex space-x-6 rtl:space-x-reverse">
            <a href="{{ route('home') }}" class="hover:text-yellow-400 transition">الرئيسية</a>
            <a href="#coaches" class="hover:text-yellow-400 transition">المدربين</a>
            <a href="#trainings" class="hover:text-yellow-400 transition">التدريبات</a>
            <a href="#footer" class="hover:text-yellow-400 transition">تواصل معنا</a>

            <div class="relative">
                <button id="more-btn" class="hover:text-yellow-400 transition flex items-center">
                    تعرف أكثر <i class='bx bx-chevron-down ml-1'></i>
                </button>
                <div id="more-menu" class="hidden absolute bg-[#1B263B] text-white mt-2 rounded-lg shadow-lg w-48 z-20">
                    @foreach (App\Models\Page::query()->active()->get() as $page)
                        <a href="{{ route('page', $page->slug) }}" class="block px-4 py-2 hover:bg-[#FFD700] hover:text-black transition">
                            {{ $page->title }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="hidden md:flex space-x-4 rtl:space-x-reverse">
            <a href="{{ route('login') }}" class="border border-[#FFD700] py-2 px-4 rounded-lg hover:bg-[#FFD700] hover:text-black transition">تسجيل الدخول</a>
        </div>

        <button id="menu-btn" class="md:hidden text-white text-3xl">☰</button>
    </nav>

    <div id="mobile-menu" class="fixed inset-0 bg-[#1B263B] bg-opacity-95 text-white z-50 hidden flex flex-col items-center justify-center space-y-6">
        <button id="close-menu" class="absolute top-5 right-5 text-3xl">✖</button>

        <a href="#" class="text-xl hover:text-[#FFD700] transition">🏠 الرئيسية</a>
        <a href="#coaches" class="text-xl hover:text-[#FFD700] transition">👨‍🏫 المدربين</a>
        <a href="#trainings" class="text-xl hover:text-[#FFD700] transition">⚽ التدريبات</a>
        <a href="#" class="text-xl hover:text-[#FFD700] transition">📞 تواصل معنا</a>
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


    <main class="mt-10">
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
                    <li><a href="#" class="hover:text-[#FFD700] transition duration-300 flex items-center">📞 تواصل معنا</a></li>
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

</body>
</html>
