<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    public function categories()
    {
        return $this->belongsToMany(
            Categories::class,
            'book_categories',
            'book_id',
            'category_id'
        )->withTimestamps();
    }
}
