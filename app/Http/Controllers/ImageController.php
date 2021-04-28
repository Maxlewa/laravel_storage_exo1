<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function admin() {
        $images = Image::all();
        return view('admin.adminHome', compact('images'));
    }
    public function create() {
        return view('admin.form-img.image-store');
    }
    public function store(Request $request) {
        Storage::put('public/img/', $request->file('image'));
        $image = new Image();
        $image->src = $request->file('image')->hashName();
        $image->save();
        return redirect()->route('adminHome');
    }
}
