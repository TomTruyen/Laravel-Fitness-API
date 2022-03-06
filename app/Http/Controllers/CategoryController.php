<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return Category::all();
    }

    public function show(int $id) {
        return Category::find($id);
    }

    public function search(Request $request) {
        $search = strip_tags($request->input('name'));

        return Category::where('name', 'like', '%'.$search.'%')->get();
    }
}
