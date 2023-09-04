<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Videogame;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $videogames = Videogame::all();
        return view('guest.home', compact('videogames'));
    }
}
