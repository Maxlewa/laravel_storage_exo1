@extends('layouts.index')

@section('content')
    <div class="text-center mt-5">
        <h1>ACCUEIL</h1>
        <hr>

        @foreach ($images as $image)
            @if (Str::after($image->src, '.') == 'png' || Str::after($image->src, '.') == 'jpg')
                <img width="30%" src={{asset('storage/img/' . $image->src)}} alt="">
                <p>{{$image->src}}</p>
            @else
                <h3>Autre format que png ou jpg</h3>
                <p>{{$image->src}}</p>
            @endif
        @endforeach

        <a href={{route('adminHome')}}>
            <button class="btn btn-dark">ADMIN</button>
        </a>
    </div>
@endsection