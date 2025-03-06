@extends('dashboard.layouts.app')
@section('title', 'إضافة لاعب جديد')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="fw-bold py-3 mb-4 text-center">إضافة لاعب جديد</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.players.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم اللاعب</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="phone" class="form-label">رقم الهاتف</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">صورة اللاعب</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="dob" class="form-label">تاريخ الميلاد</label>
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}">
                        @error('dob')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="parent_id" class="form-label">ولي الأمر</label>
                        <select class="form-select @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id">
                            <option value="">اختر ولي الأمر</option>
                            @foreach($parents as $parent)
                                <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="height" class="form-label">الطول (سم)</label>
                        <input type="number" class="form-control @error('height') is-invalid @enderror" id="height" name="height" value="{{ old('height') }}">
                        @error('height')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="weight" class="form-label">الوزن (كجم)</label>
                        <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}">
                        @error('weight')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">المراكز</label>
                        <div id="positions-container"></div>
                        @error('positions')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <button type="button" class="btn btn-success mt-2" id="add-position">إضافة مركز</button>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-text text-center border p-2">
                            كلمة المرور الافتراضية هي "password". <br>يمكنك تغييرها لاحقًا.
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        <a href="{{ route('dashboard.players.index') }}" class="btn btn-secondary">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('add-position').addEventListener('click', function() {
        const container = document.getElementById('positions-container');
        const index = container.children.length;

        const positionDiv = document.createElement('div');
        positionDiv.classList.add('mb-3', 'position-entry');
        positionDiv.innerHTML = `
            <div class="input-group mb-2">
                <select class="form-select" name="positions[${index}][id]" required>
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                    @endforeach
                </select>
                <input type="number" step="0.1" min="0" max="5" class="form-control" name="positions[${index}][rating]" placeholder="التقييم">
                <input type="text" class="form-control" name="positions[${index}][notes]" placeholder="ملاحظات">
                <button type="button" class="btn btn-danger remove-position">×</button>
            </div>
        `;
        container.appendChild(positionDiv);
    });
    
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-position')) {
            event.target.closest('.position-entry').remove();
        }
    });
</script>

@endsection