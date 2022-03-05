<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        return Category::all();
    }

    public function show(int $id) {
        return Category::find($id);
    }
}
