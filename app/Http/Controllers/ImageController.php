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
        // STORAGE en LIGNE URL
        // récupération du fichier
        $content = file_get_contents($request->img2);

        // rename le fichier, on coupe et recupere ce qu'il y a après le '/'
        $name = substr($request->img2, strrpos($request->img2, '/') +1);

        // DD qui montre chaque étape pour bien comprendre
        // dd($request->img2, $content, substr($request->img2, strrpos($request->img2, '/') +1), substr($request->img2, strrpos($request->img2, '/')), strrpos($request->img2, '/'));

        // Partie STORAGE (1er parametre, on donne le chemin + on donne le nom du fichier. 2eme par c'est le CONTENU du fichier)
        Storage::put('public/img/'.$name , $content);
        // Partie DB
        $image = new Image();
        $image->src = $name;
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
