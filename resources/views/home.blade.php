@extends('layouts.index')

@section('content')
    <div class="text-center mt-5">
        <h1>ACCUEIL</h1>
        <hr>
        <a href={{route('adminHome')}}>
            <button class="btn btn-dark">ADMIN</button>
        </a>
    </div>
@endsection