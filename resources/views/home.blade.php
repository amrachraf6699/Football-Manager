@extends('layouts.app')

@section('title', 'الرئيسية')

@section('content')

<!-- ✅ هيرو احترافي -->
<section class="relative bg-cover bg-center h-[700px] flex items-center justify-center text-white text-center"
    style="background-image: url('{{ asset('images/stadium-bg.jpg') }}');">
    <div class="bg-black/70 w-full h-full absolute top-0 left-0"></div>

    <div class="relative">
        <h1 class="text-6xl font-bold text-[#FFD700] drop-shadow-md animate-fade-in">🏆 طريقك للاحتراف يبدأ من هنا</h1>
        <p class="mt-4 text-2xl text-[#A8DADC]">نحن نقدم لك أفضل المدربين وأكثر البرامج الاحترافية</p>
        <a href="#" class="mt-6 inline-block bg-[#FFD700] text-black py-3 px-6 rounded-full text-lg font-semibold shadow-md hover:bg-[#E6C300] transition">انضم إلينا الآن</a>
    </div>
</section>

<section id="coaches" class="py-12 bg-[#1B263B] text-center">
    <h2 class="text-4xl font-bold text-[#FFD700] mb-6">نخبة المدربين</h2>
    <div class="mt-6 overflow-hidden relative w-full">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($coaches as $coach)
                <div class="swiper-slide w-72 h-96 bg-gray-800 rounded-lg shadow-lg text-white text-center p-4">
                    <img src="{{ $coach->image_url }}" class="w-full h-56 object-cover rounded-lg">
                    <h4 class="text-xl font-bold mt-4">{{ $coach->name }}</h4>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


<!-- ✅ سلايدر التدريبات -->
<section id="trainings" class="py-12 bg-[#1B263B]">
    <h2 class="text-4xl text-center font-bold text-[#FFD700]">أفضل التدريبات</h2>
    <div class="mt-6 overflow-hidden relative w-full">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($trainings as $training)
                <div class="swiper-slide w-64 h-72 bg-gray-800 rounded-lg shadow-lg text-white text-center p-4">
                    <img src="{{ asset($training->image) }}" class="w-full h-44 object-cover rounded-lg">
                    <h4 class="text-lg font-bold mt-3">{{ $training->title }}</h4>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
