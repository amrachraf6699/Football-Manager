@extends('dashboard.layouts.app')
@section('title', 'قائمة الصفحات')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center py-3 mb-4">
            <h1 class="fw-bold text-start flex-grow-1">قائمة الصفحات</h1>
            <a href="{{ route('dashboard.pages.create') }}" class="btn btn-primary">إضافة صفحة</a>
        </div>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>الغلاف</th>
                            <th>العنوان</th>
                            <th>عدد الزيارات</th>
                            <th>فعال؟</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($pages as $page)
                            <tr>
                                <td>
                                    <img src="{{ asset($page->image_url) }}" alt="Image" class="w-16 h-16 rounded-md">
                                </td>
                                <td><strong>{{ $page->title }}</strong></td>
                                <td> <span class="badge badge-center rounded-pill bg-{{ $page->views > 0 ? 'success' : 'danger' }}">{{ $page->views }}</span> </td>
                                <td>
                                    @if($page->is_active)
                                        <span class="text-green-600 font-semibold">✅</span>
                                    @else
                                        <span class="text-red-600 font-semibold">❌</span>
                                    @endif
                                </td>                                
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('dashboard.pages.edit', $page->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> تعديل
                                            </a>
                                            <a class="dropdown-item" href="{{ route('page', $page->slug) }}" target="_blank">
                                                <i class="bx bx-show me-1"></i> عرض في الموقع
                                            </a>
                                            <button class="dropdown-item text-danger" onclick="confirmDelete({{ $page->id }})">
                                                <i class="bx bx-trash me-1"></i> حذف
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- إضافة الترقيم -->
        <div class="d-flex justify-content-center mt-3">
            {{ $pages->links() }}
        </div>
    </div>
</div>

<!-- Modal الحذف -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">تأكيد الحذف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                هل أنت متأكد أنك تريد حذف هذه الصفحة ؟ لا يمكن التراجع عن هذا الإجراء.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function confirmDelete(positionId) {
        let form = document.getElementById('deleteForm');
        form.action = `/dashboard/pages/${positionId}`; 
        let deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }
</script>
@endpush
@endsection
