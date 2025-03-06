@extends('layouts.app')

@section('title', 'المقالات')

@section('content')

<section class="relative bg-cover bg-center h-[400px] flex items-center justify-center text-white text-center"
    style="background-image: url('{{ asset('stadium.webp') }}');">
    <div class="bg-black/70 w-full h-full absolute top-0 left-0"></div>
    <div class="relative">
        <h1 class="text-5xl font-bold text-[#FFD700] drop-shadow-md">📰 أحدث المقالات</h1>
        <p class="mt-4 text-xl text-[#A8DADC]">اكتشف أهم المقالات والنصائح من خبرائنا</p>
    </div>
</section>

<section class="py-12 bg-[#1B263B] text-center">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-6">
        @foreach ($blogs as $blog)
        <div class="bg-gray-800 rounded-lg shadow-lg text-white p-4">
            <img src="{{ asset($blog->image_url) }}" class="w-full h-56 object-cover rounded-lg">
            <h4 class="text-xl font-bold mt-4">{{ $blog->title }}</h4>
            <a href="{{ route('blog', $blog->slug) }}"
                class="mt-4 inline-block bg-[#FFD700] text-black py-2 px-4 rounded-full text-sm font-semibold shadow-md hover:bg-[#E6C300] transition">اقرأ المزيد</a>
        </div>
        @endforeach
    </div>
</section>

<div class="mt-8 flex justify-center">{{ $blogs->links() }}</div>

@endsection
