@extends('dashboard.layouts.app')
@section('title', 'قائمة التمارين')
@section('content')
<div class="card">
    <h5 class="card-header">إضافة تمرين جديد</h5>
    <div class="card-body">
        <form action="{{ route('dashboard.trainings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">عنوان التمرين</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">الوصف</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">صورة التمرين</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">إضافة</button>
        </form>
    </div>
</div>
@endsection
