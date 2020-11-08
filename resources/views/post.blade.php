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
            <p class="mb-0">Szerző: {{ $post->author }}</p>
            <div class="mb-2">
                @foreach ($post->tags as $tag)
                    <span class="badge badge-dark"><a href="{{ route('tag', ['id' => $tag->id]) }}"> {{$tag->text}} </a> </span>
                @endforeach
            </div>
            @if ($post->image_url !== null)
            <img src="{{  Storage::url('images/post_images/' . $post->image_url) }}">
            @endif

            <p> {{ $post->text }}</p>

        @endif
    </div>
@endsection

