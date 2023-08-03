<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasLomba;

class KelasLombaController extends Controller
{
    function index() {
        $kelasLomba = KelasLomba::get();
        return response()->json($kelasLomba);
    }
}
