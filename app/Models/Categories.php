<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function books()
    {
        return $this->belongsToMany(
            Categories::class,
            'book_categories',
            'book_id',
            'category_id',
        )->withTimestamps();
    }
}
