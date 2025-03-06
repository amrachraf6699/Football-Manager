<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //Mutator for password
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    //Accerssor for image
    public function getImageUrlAttribute()
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return Storage::url($this->image); // يُرجع رابط الصورة من التخزين
        }
    
        // صورة افتراضية من UI Avatars
        $name = urlencode($this->name);
        return "https://ui-avatars.com/api/?name={$name}&background=FFD700&color=fff&size=256";
    }
    

    //Scopes
    public function scopeParent($query)
    {
        return $query->where('role', 'parent');
    }

    public function scopeCoach($query)
    {
        return $query->where('role', 'coach');
    }

    public function scopeIsPlayer($query)
    {
        return $query->where('role', 'player');
    }


    //====Start of relationships====//

    //Player Relationship
    public function player(): HasOne
    {
        return $this->hasOne(Player::class);
    }

    //Children For Parent Relationship
    public function children(): HasMany
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    //Blogs Relationship
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    //====End of relationships====//
}
