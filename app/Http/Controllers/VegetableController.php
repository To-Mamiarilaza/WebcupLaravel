<?php

namespace App\Http\Controllers;

use App\Models\Vegetable;
use Illuminate\Http\Request;

class VegetableController extends Controller
{
    public function vegetableList() {
        $vegetables = Vegetable::all();

        return view('vegetable', [
            'vegetables' => $vegetables
        ]);
    }
}
