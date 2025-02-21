@extends('dashboard.layouts.app')
@section('title' , 'الصفحة الرئيسية')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="fw-bold py-3 mb-4 text-center">لوحة التحكم</h1>
    </div>

    <!-- KPIs -->
    <div class="row g-3">
        <!-- اللاعبين -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card text-center border-0 shadow-sm p-3">
                <div class="card-body">
                    <i class='bx bxs-user bx-lg text-primary'></i>
                    <h5 class="card-title mt-2">عدد اللاعبين</h5>
                    <h2 class="fw-bold">{{ $players_count }}</h2>
                </div>
            </div>
        </div>

        <!-- المدربين -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card text-center border-0 shadow-sm p-3">
                <div class="card-body">
                    <i class='bx bxs-user-voice bx-lg text-success'></i>
                    <h5 class="card-title mt-2">عدد المدربين</h5>
                    <h2 class="fw-bold">{{ $coaches_count }}</h2>
                </div>
            </div>
        </div>

        <!-- أولياء الأمور -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card text-center border-0 shadow-sm p-3">
                <div class="card-body">
                    <i class='bx bxs-group bx-lg text-warning'></i>
                    <h5 class="card-title mt-2">عدد أولياء الأمور</h5>
                    <h2 class="fw-bold">{{ $parents_count }}</h2>
                </div>
            </div>
        </div>

        <!-- التدريبات -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card text-center border-0 shadow-sm p-3">
                <div class="card-body">
                    <i class='bx bx-layer bx-lg text-danger'></i>
                    <h5 class="card-title mt-2">عدد التمارين</h5>
                    <h2 class="fw-bold">{{ $trainings_count }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
