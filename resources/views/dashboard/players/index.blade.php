@extends('dashboard.layouts.app')
@section('title', 'قائمة اللاعبين')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">قائمة اللاعبين</h1>
        <a href="{{ route('dashboard.players.create') }}" class="btn btn-success">
            <i class="bx bx-plus"></i> إضافة لاعب جديد
        </a>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($players as $player)
            <div class="col">
                <div class="card border-0 shadow-sm rounded-lg position-relative player-card">
                    
                    <span class="badge border text-black position-absolute top-0 start-0 m-2">
                        <i class="bx bx-ruler"></i> {{ $player->player?->height ?? '--' }} سم
                    </span>
                    <span class="badge border text-black position-absolute top-0 end-0 m-2">
                        <i class="bx bx-dumbbell"></i> {{ $player->player?->weight ?? '--' }} كجم
                    </span>                    

                    <div class="card-body text-center p-4">
                        <div class="d-flex justify-content-center">
                            <img src="{{ $player->image_url }}" 
                                 alt="{{ $player->name }}" 
                                 class="rounded-circle mb-3 player-img">
                        </div>

                        <h5 class="fw-bold mb-1">{{ $player->name }}</h5>

                        <div class="loader"></div>

                        <div class="player-details">
                            @if($player->player?->positions->count())
                                @php
                                    $firstPosition = $player->player->positions->first();
                                    $rating = $firstPosition->pivot->rating ?? 0;
                                @endphp
                                <div>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="bx {{ $i <= $rating ? 'bxs-star text-warning' : 'bx-star text-muted' }}"></i>
                                    @endfor
                                </div>

                                <div class="mb-3">
                                    <span class="badge bg-primary rounded-pill me-1">{{ $firstPosition->name }}</span>
                                    @if($player->player->positions->count() > 1)
                                        <span class="badge bg-secondary rounded-pill">+{{ $player->player->positions->count() - 1 }}</span>
                                    @endif
                                </div>
                            @endif

                            <a href="{{ route('dashboard.players.show', $player->id) }}" class="btn btn-sm btn-primary me-1">
                                <i class="bx bx-show"></i> عرض التفاصيل
                            </a>
                            <a href="{{ route('dashboard.players.edit', $player->id) }}" class="btn btn-sm btn-warning">
                                <i class="bx bx-edit"></i> تعديل
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $players->links() }}
    </div>
</div>
@endsection

@push('styles')
<style>
.player-img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border: 3px solid #5E5E5E;
}

.player-details {
    display: none;
}

.loader {
    display: none;
    width: 25px;
    height: 25px;
    border: 3px solid #f3f3f3;
    border-top: 3px solid #3498db;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: auto;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const playerCards = document.querySelectorAll('.player-card');

    playerCards.forEach(card => {
        const details = card.querySelector('.player-details');
        const loader = card.querySelector('.loader');

        card.addEventListener('mouseenter', function() {
            loader.style.display = 'block'; 
            
            setTimeout(() => {
                loader.style.display = 'none';
                details.style.display = 'block';
                card.style.height = "auto";
            }, 500);
        });

        card.addEventListener('mouseleave', function() {
            details.style.display = 'none';
        });
    });
});
</script>
@endpush
