@extends('layouts.index')

@section('content')
<div class="text-center mt-5">
    <h1>EDIT IMAGE</h1>
    <hr>

    <div class="divContenu mt-5">
        <form action="{{route('admin.image.update', $image->id)}}" enctype="multipart/form-data" method="POST" class="formBlogEdit w-50 mx-auto">
            @csrf
            @method('PUT')
            <div class="text-center">
                <div class="mb-4">
                    <label for="image">Votre image - Input</label>
                    <input type="file" name="image">
                </div>
                <div>
                    <label for="image">Votre image - URL</label>
                    <input type="text" name="image">
                </div>
            </div>
            <button class="btn btn-success mt-4" type="submit">Actualiser</button>
        </form>
    </div> 
</div>
@endsection