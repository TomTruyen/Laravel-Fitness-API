<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{

    public function index()
    {
        return Equipment::all();
    }

    public function show(int $id) {
        return Equipment::find($id);
    }

    public function search(Request $request) {
        $search = strip_tags($request->input('name'));

        return Equipment::where('name', 'like', '%'.$search.'%')->get();
    }
}
