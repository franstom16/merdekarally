<?php

namespace App\Http\Controllers;

use App\Models\Race\RaceClass;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raceClass = RaceClass::get();
        return view('dashboard.content', ['raceClass' => $raceClass]);
    }

    public function ranking()
    {
        return view('dashboard.ranking');
    }
}