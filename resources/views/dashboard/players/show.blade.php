@extends('dashboard.layouts.app')
@section('title', 'تفاصيل اللاعب')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border rounded p-4">
        <div class="row">
            <div class="col-md-4 text-center">
                <img class="img-fluid rounded-circle" src="{{ $player->image_url }}" alt="{{ $player->name }}" style="width: 150px; height: 150px; object-fit: cover;">
            </div>
            <div class="col-md-8">
                <h3 class="fw-bold">{{ $player->name }}</h3>
                <p><strong>رقم الهاتف:</strong> {{ $player->phone ?? 'غير متاح' }}</p>
                <p><strong>تاريخ الميلاد:</strong> {{ $player->player->dob ?? 'غير متاح' }}</p>
                <p><strong>الطول:</strong> {{ $player->player ? $player->player->height . ' سم' : 'غير متاح' }}</p>
                <p><strong>الوزن:</strong> {{ $player->player ? $player->player->weight . ' كجم' : 'غير متاح' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
