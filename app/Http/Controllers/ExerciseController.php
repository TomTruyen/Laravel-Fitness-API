<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExerciseController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->query("name");
        $category = $request->query("category");
        $equipment = $request->query("equipment");
        $skip = $request->query("skip", 0);
        $limit = $request->query("limit", 20);

        if($limit > 50) {
            $limit = 50;
        }

        $query = DB::table('exercises')->orderBy('name');

        if($name) {
            $query->where('name', 'like', '%'.$name.'%');
        }

        if($category) {
            $query->whereRaw('LOWER(category) = ?', [strtolower($category)]);
        }

        if($equipment) {
            $query->whereRaw('LOWER(equipment) = ?', [strtolower($equipment)]);
        }

        $exercises =  $query->take($limit)->skip($skip)->get();

        return response()->json([
            'exercises' => $exercises,
            'count' => count($exercises),
        ]);
    }

    public function show(int $id) {
        $exercise = Exercise::find($id);

        if($exercise == null) {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        return $exercise;
    }
}
