<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'author_name',
        'price',
        'quantity',
        'description',
        'book_img',
        'author_img',
        'category_id',

    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
