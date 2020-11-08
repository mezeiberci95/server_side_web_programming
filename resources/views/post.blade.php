@extends('layouts.app')

@section('title', 'Adott bejegyzes')

@section('content')
    <div class="container">
        @if ($post === null)
            <div class="alert alert-danger" role="alert">
                Nem található ilyen bejegyzés!
            </div>
        @else
            <h1>{{ $post->title }}</h1>
            <p>Szerző: {{ $post->author }}</p>
            <img src="{{  Storage::url('images/post_images/' . $post->image_url) }}">
            <p> {{ $post->text }}</p>

        @endif
    </div>
@endsection

