<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    public function index()
    {
        return view('bookCategory.index');
    }
}
