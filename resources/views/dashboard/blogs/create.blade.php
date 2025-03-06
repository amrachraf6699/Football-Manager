@extends('dashboard.layouts.app')

@section('title', 'إضافة مقال جديد')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="fw-bold py-3 mb-4 text-center">إضافة مقال جديد</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">عنوان المقال</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">صورة المقال</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                        <div class="mt-3">
                            <img id="preview" src="#" alt="معاينة الصورة" class="d-none img-thumbnail" width="100">
                        </div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">محتوى المقال</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">حالة النشر</label>
                        <select class="form-control @error('is_published') is-invalid @enderror" name="is_published" required>
                            <option value="1" {{ old('is_published') == '1' ? 'selected' : '' }}>منشور</option>
                            <option value="0" {{ old('is_published') == '0' ? 'selected' : '' }}>غير منشور</option>
                        </select>
                        @error('is_published')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        <a href="{{ route('dashboard.blogs.index') }}" class="btn btn-secondary">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('#content').summernote({
            height: 300,
            lang: 'ar-AR',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
                ['view', ['help']]
            ]
        });
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
