<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'thumbnail', 'status'];

    public static function boot()
    {
        parent::boot();

        // When creating a new category, generate a slug before saving
        static::creating(function ($category) {
            $category->slug = Str::slug($category->title);
        });

        // If you want to update the slug when the category name changes, you can use the updating event
        static::updating(function ($category) {
            $category->slug = Str::slug($category->title);
        });
    }

     public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }


}
