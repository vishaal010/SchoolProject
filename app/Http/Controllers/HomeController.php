<?php

namespace App\Http\Controllers;

use App\Models\photo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Select * FROM photographies
        $photography = photo::all();

        return view('index', [
            'photo' => $photography
        ]);
    }
}
