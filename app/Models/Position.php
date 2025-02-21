<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Position extends Model
{
    use HasFactory;

    protected $guarded = [];

    //====Start of relationships====//

    //Players Relationship
    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'player_positions')->withPivot('rating')->withTimestamps();
    }
    //====End of relationships====//
}
