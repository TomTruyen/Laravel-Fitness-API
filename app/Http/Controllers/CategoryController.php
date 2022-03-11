<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index(Request $request) {
        $name = $request->input('name');

        $query = DB::table('categories')->orderBy('name');

        if($name) {
            $query->where('name', 'like', '%'.$name.'%');
        }

        $categories = $query->get();

        return response()->json([
            'categories' => $categories,
            'count' => count($categories),
        ]);
    }

    public function show(int $id) {
        return Category::find($id);
    }
}
