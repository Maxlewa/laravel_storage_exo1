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
    // public function store(Request $request) {
    //     Storage::put('public/img/', $request->file('image'));
    //     $image = new Image();
    //     $image->src = $request->file('image')->hashName();
    //     $image->save();
    //     return redirect()->route('adminHome');
    // }
    public function store(Request $request) {
        Storage::put('public/img/', $request->file('image'));
        $image = new Image();
        $image->src = $request->file('image')->hashName();
        $image->save();
        return redirect()->route('adminHome');
    }
    public function destroy(Image $id) {
        Storage::delete(['public/img/' . $id->image]);
        $id->delete();
        return redirect()->route('adminHome');
    }
    public function edit(Image $id) {
        $image = $id;
        return view('admin.form-img.image-edit', compact('image'));
    }
    public function update(Image $id, Request $request) {
        $image = $id;
        // storage
        if ($request->file('image') != null) {
            Storage::delete('public/img/' . $image->src);
            Storage::put('public/img/', $request->file('image'));

            // DB
            $image->src = $request->file('image')->hashName();
            $image->save();
        }
        return redirect()->route('adminHome');
    }
}
