@extends('layouts.index')

@section('content')
    <div class="text-center mt-4">
        <h1>ADMIN</h1>
        <hr>
        @foreach ($images as $image)
            <img width="30%" src={{asset('storage/img/' . $image->src)}} alt="">
            <p>{{$image->src}}</p>
            <form method="post" action={{route('admin.image.destroy', $image->id)}}>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mb-4" type="submit">Delete</button>
            </form>
        @endforeach
        <a href={{route('admin.image.create')}}>
            <button class="btn btn-warning mb-4">Ajouter un fichier</button>
        </a>
    </div>
@endsection