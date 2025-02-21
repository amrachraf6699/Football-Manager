@extends('dashboard.layouts.app')
@section('title', 'قائمة المراكز')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h1 class="fw-bold py-3 mb-4 text-center">قائمة المراكز</h1>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>الوصف</th>
                            <th>الكود</th>
                            <th>عدد اللاعبين</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($positions as $position)
                            <tr>
                                <td><strong>{{ $position->name }}</strong></td>
                                <td>{{ Str::limit($position->description, 50) }}</td>
                                <td>{{ $position->code ?? '-' }}</td>
                                <td><span class="badge bg-label-primary me-1">{{ $position->players->count() }}</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('dashboard.positions.edit', $position->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> تعديل
                                            </a>
                                            <button class="dropdown-item text-danger" onclick="confirmDelete({{ $position->id }})">
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
            {{ $positions->links() }}
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
                هل أنت متأكد أنك تريد حذف هذا المركز؟ لا يمكن التراجع عن هذا الإجراء.
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
        form.action = `/dashboard/positions/${positionId}`; // تعديل الرابط الديناميكي
        let deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }
</script>
@endpush
@endsection
