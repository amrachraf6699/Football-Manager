<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($blog) {
            $originalSlug = \Str::slug($blog->title);
            $slug = $originalSlug;
            $count = 1;
    
            while (\DB::table('blogs')->where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
    
            $blog->slug = $slug;
        });
    }


    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
    
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        return "https://ui-avatars.com/api/?name=$this->title&color=7F9CF5&background=EBF4FF";
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
