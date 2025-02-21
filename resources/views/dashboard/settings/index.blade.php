@extends('dashboard.layouts.app')
@section('title' , 'إعدادات الموقع')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="fw-bold py-3 mb-4 text-center">إعدادات الموقع</h1>
        <div class="card mb-4">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- اسم الموقع -->
                    <div class="form-floating mb-3 text-end">
                        <input type="text" name="site_name" class="form-control @error('site_name') is-invalid @enderror" id="site_name" placeholder="اسم الموقع" value="{{ old('site_name', $settings->site_name ?? '') }}" dir="rtl">
                        <label for="site_name">اسم الموقع</label>
                        @error('site_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- الشعار -->
                    <div class="mb-3 text-end">
                        <label for="logo" class="form-label">شعار الموقع</label>
                        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="logo">
                        @if(isset($settings->logo))
                            <img src="{{ asset($settings->logo) }}" alt="Logo" class="mt-2" width="100">
                        @endif
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- العنوان -->
                    <div class="form-floating mb-3 text-end">
                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="العنوان" dir="rtl">{{ old('address', $settings->address ?? '') }}</textarea>
                        <label for="address">العنوان</label>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- الهاتف -->
                    <div class="form-floating mb-3 text-end">
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="رقم الهاتف" value="{{ old('phone', $settings->phone ?? '') }}" dir="rtl">
                        <label for="phone">رقم الهاتف</label>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- البريد الإلكتروني -->
                    <div class="form-floating mb-3 text-end">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="البريد الإلكتروني" value="{{ old('email', $settings->email ?? '') }}" dir="rtl">
                        <label for="email">البريد الإلكتروني</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>
                    <!-- روابط السوشيال ميديا -->
                    <div class="text-center">
                        <label class="text-center form-label fw-bold mt-3">روابط السوشيال ميديا</label>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class='bx bxl-facebook'></i></span>
                        <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="رابط الفيسبوك" value="{{ old('facebook', $settings->facebook ?? '') }}" dir="rtl">
                        @error('facebook')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class='bx bxl-twitter'></i></span>
                        <input type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" placeholder="رابط تويتر" value="{{ old('twitter', $settings->twitter ?? '') }}" dir="rtl">
                        @error('twitter')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class='bx bxl-instagram'></i></span>
                        <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" placeholder="رابط إنستجرام" value="{{ old('instagram', $settings->instagram ?? '') }}" dir="rtl">
                        @error('instagram')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class='bx bxl-youtube'></i></span>
                        <input type="text" name="youtube" class="form-control @error('youtube') is-invalid @enderror" placeholder="رابط يوتيوب" value="{{ old('youtube', $settings->youtube ?? '') }}" dir="rtl">
                        @error('youtube')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- زر الحفظ -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
