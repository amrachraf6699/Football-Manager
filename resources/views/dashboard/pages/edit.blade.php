@extends('dashboard.layouts.app')

@section('title', 'تعديل الصفحة')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="fw-bold py-3 mb-4 text-center">تعديل الصفحة</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- حقل العنوان -->
                    <div class="mb-3">
                        <label for="title" class="form-label">عنوان الصفحة</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $page->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- حقل الصورة مع المعاينة -->
                    <div class="mb-3">
                        <label for="cover" class="form-label">صورة الصفحة</label>
                        <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover" accept="image/*" onchange="previewImage(event)">
                        <div class="mt-3">
                            <img id="preview" src="{{ $page->image_url }}" alt="معاينة الصورة" class="img-thumbnail {{ $page->image_url ? '' : 'd-none' }}" width="100">
                        </div>
                        @error('cover')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- محرر نصي للمحتوى باستخدام Summernote -->
                    <div class="mb-3">
                        <label for="content" class="form-label">محتوى الصفحة</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content', $page->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- حالة التفعيل -->
                    <div class="mb-3">
                        <label class="form-label">حالة الصفحة</label>
                        <select class="form-control @error('is_active') is-invalid @enderror" name="is_active" required>
                            <option value="1" {{ old('is_active', $page->is_active) == '1' ? 'selected' : '' }}>مفعلة</option>
                            <option value="0" {{ old('is_active', $page->is_active) == '0' ? 'selected' : '' }}>غير مفعلة</option>
                        </select>
                        @error('is_active')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- أزرار الحفظ والإلغاء -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                        <a href="{{ route('dashboard.pages.index') }}" class="btn btn-secondary">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- إضافة مكتبة Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    // تهيئة المحرر Summernote
    $(document).ready(function() {
        $('#content').summernote();
    });

    function previewImage(event) {
        var preview = document.getElementById('preview');
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function() {
            preview.src = reader.result;
            preview.classList.remove('d-none');
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
