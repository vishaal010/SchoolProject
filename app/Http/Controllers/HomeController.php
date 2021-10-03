<?php

namespace App\Http\Controllers;

use App\Models\photography;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Select * FROM photographies
        $photography = photography::all();

        return view('index', [
            'photography' => $photography
        ]);
    }
}
