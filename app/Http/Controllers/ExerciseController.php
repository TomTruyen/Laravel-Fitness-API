<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{

    public function index()
    {
        return Exercise::all();
    }

    public function show(int $id) {
        return Exercise::find($id);
    }

    public function search(Request $request) {
        $search = strip_tags($request->input('name'));

        return Exercise::where('name', 'like', '%'.$search.'%')->get();
    }
}
