@extends('layouts.index')

@section('content')
    <div class="text-center mt-4">
        <h1>ADMIN</h1>
        <hr>
        @foreach ($images as $image)
            <img width="30%" src={{asset('storage/img/' . $image->src)}} alt="">
            <p>{{$image->src}}</p>
        @endforeach
        <a href={{route('admin.image.create')}}>
            <button class="btn btn-warning">Ajouter un fichier</button>
        </a>
    </div>
@endsection