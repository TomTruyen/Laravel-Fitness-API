<?php

namespace App\Http\Controllers;

use App\Models\Exercise;

class ExerciseController extends Controller
{

    public function index()
    {
        return Exercise::all();
    }

    public function show(int $id) {
        return Exercise::find($id);
    }
}
