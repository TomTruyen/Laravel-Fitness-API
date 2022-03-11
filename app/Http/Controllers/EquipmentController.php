<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipmentController extends Controller
{

    public function index(Request $request) {
        $name = $request->input('name');

        $query = DB::table('equipment')->orderBy('name');

        if($name) {
            $query->where('name', 'like', '%'.$name.'%');
        }

        $equipment = $query->get();

        return response()->json([
            'equipment' => $equipment,
            'count' => count($equipment),
        ]);
    }

    public function show(int $id) {
        $equipment = Equipment::find($id);

        if($equipment == null) {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        return $equipment;
    }
}
