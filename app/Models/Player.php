<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    use HasFactory;

    protected $guarded = [];

    //====Start of relationships====//

    //User Relationship
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //Positions Relationship
    public function positions(): BelongsToMany
    {
        return $this->belongsToMany(Position::class, 'player_positions')->withPivot('rating', 'notes')->withTimestamps();
    }

    //Trainings Relationship
    public function trainings(): BelongsToMany
    {
        return $this->belongsToMany(Training::class, 'player_trainings')->withPivot('start_time', 'end_time', 'rating', 'notes')->withTimestamps();
    }

    //====End of relationships====//
}
