<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($page) {
            $page->slug = \Str::slug($page->title);
        });
    }
    
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getImageUrlAttribute()
    {
        if ($this->cover) {
            return asset('storage/' . $this->cover);
        }

        return "https://ui-avatars.com/api/?name=$this->title&color=7F9CF5&background=EBF4FF";
    }
}
