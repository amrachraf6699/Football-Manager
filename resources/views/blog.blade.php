@extends('layouts.app')

@section('title', $blog->title)

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Page Header with Background Image -->
    <div class="relative w-full h-64 flex items-center justify-center text-center text-white rounded-2xl overflow-hidden shadow-xl">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-b from-black/100 via-black/400 to-transparent"></div>
            <img src="{{ $blog->image_url }}" 
                 alt="{{ $blog->title }}" 
                 class="w-full h-full object-cover brightness-85">
        </div>

        <!-- Text Content -->
        <div class="relative z-10">
            <h1 class="text-4xl font-extrabold drop-shadow-lg">{{ $blog->title }}</h1>
            <p class="text-lg mt-2 flex items-center justify-center drop-shadow-md">
                <i class='bx bx-user text-xl mr-1'></i> {{ $blog->creator->name }} | {{ $blog->created_at->diffForHumans() }}
            </p>
        </div>
    </div>

    <!-- Page Content -->
    <div class="flex justify-center mt-10">
        <div class="bg-white shadow-lg rounded-2xl w-full md:w-4/5 p-8 text-center">
            <div class="prose prose-lg mx-auto text-gray-700 leading-relaxed">
                {!! $blog->content !!}
            </div>
        </div>
    </div>
</div>
@endsection
