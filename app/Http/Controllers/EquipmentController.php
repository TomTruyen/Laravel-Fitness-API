<?php

namespace App\Http\Controllers;

use App\Models\Equipment;

class EquipmentController extends Controller
{

    public function index()
    {
        return Equipment::all();
    }

    public function show(int $id) {
        return Equipment::find($id);
    }
}
