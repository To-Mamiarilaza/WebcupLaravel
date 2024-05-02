<?php

namespace App\Http\Controllers;

use App\Models\Vegetable;
use Illuminate\Http\Request;

class VegetableApiController extends Controller
{
    //
    public function vegetableList() {
        $vegetables = Vegetable::all();

        return response()->json([
            'vegetables' => $vegetables
        ]);
    }
}
