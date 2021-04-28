<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home() {
        $images = Image::all();
        return view('home', compact('images'));
    }
}
