<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Storage;

class Training extends Model
{
    use HasFactory;

    protected $guarded = [];

    //====Start of relationships====//

    //Players Relationship
    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'player_trainings')->withPivot('start_time', 'end_time', 'rating', 'notes')->withTimestamps();
    }

    //====End of relationships====//
}
