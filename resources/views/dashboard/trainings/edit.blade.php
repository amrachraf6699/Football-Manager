@extends('dashboard.layouts.app')

@section('title', 'تعديل التمرين')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="fw-bold py-3 mb-4 text-center">تعديل التمرين</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.trainings.update', $training->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">عنوان التمرين</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                               id="title" name="title" value="{{ old('title', $training->title) }}" required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">وصف التمرين</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="4" required>{{ old('description', $training->description) }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">صورة التمرين</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        @if($training->image)
                            <div class="mt-2">
                                <img src="{{ asset($training->image) }}" alt="صورة التمرين" class="img-thumbnail" width="150">
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('dashboard.trainings.index') }}" class="btn btn-secondary">إلغاء</a>
                        <button type="submit" class="btn btn-primary">تحديث التمرين</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
