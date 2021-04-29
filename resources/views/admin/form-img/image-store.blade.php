@extends('layouts.index')

@section('content')
    <div class="text-center mt-4">
        <h1>IMAGES STORAGE</h1>
        <hr>
        <form action={{route('admin.image.store')}} enctype="multipart/form-data" method="POST" class="mt-4">
            @csrf
            <div class="text-center">
                <div class="mb-4">
                    <label for="image">Votre image - Input</label>
                    <input type="file" name="img" id="img">
                </div>
                <div>
                    <label for="image">Votre image - URL</label>
                    <input type="text" name="img2" id="img2">
                </div>
            </div>
            <button class="btn btn-primary mt-4" type="submit">Envoyer</button>
        </form>
    </div>
@endsection