@extends('layouts.index')

@section('content')
    <div class="text-center mt-4">
        <h1>IMAGES STORAGE</h1>
        <hr>
        <form action={{route('admin.image.store')}} enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mt-4">
                <label for="image">Votre image</label>
                <input type="file" name="image">
                {{-- <input type="file" name="image" id="image"> --}}
            </div>
            <button class="btn btn-primary mt-4" type="submit">Envoyer</button>
        </form>
    </div>
@endsection