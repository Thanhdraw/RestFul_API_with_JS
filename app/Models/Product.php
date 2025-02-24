<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'products';
    use SoftDeletes;
    use HasFactory;

    public $fillable = ['name', 'slug', 'price', 'description', 'image', 'category_id'];
    protected $attributes = [
        'image' => 'default.jpg',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
