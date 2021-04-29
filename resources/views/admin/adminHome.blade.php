@extends('layouts.index')

@section('content')
    <div class="text-center mt-4">
        <h1>ADMIN</h1>
        <hr>
        @foreach ($images as $image)
            <img width="30%" src={{asset('storage/img/' . $image->src)}} alt="">
            <p>{{$image->src}}</p>
            <div class="d-flex justify-content-center">
                <a href={{route('admin.image.edit', $image->id)}}>
                    <button class="btn btn-primary mr-2">Edit</button>
                </a>
                <a href={{route('admin.image.download', $image->id)}}>
                    <button class="btn btn-success">Download</button>
                </a>
                <form method="post" action={{route('admin.image.destroy', $image->id)}}>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mb-4 ml-2" type="submit">Delete</button>
                </form>
            </div>
        @endforeach
        <a href={{route('admin.image.create')}}>
            <button class="btn btn-warning mb-4">Ajouter un fichier</button>
        </a>
    </div>
@endsection