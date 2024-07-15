<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['productname', 'category_id', 'price', 'image', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Các phương thức và quan hệ khác có thể được định nghĩa ở đây
}
