@extends('layouts.app')

@section('title', 'Adott bejegyzes')

@section('content')
    <div class="container">
        @if ($post === null)
            <div class="alert alert-danger" role="alert">
                Nem található ilyen bejegyzés!
            </div>
        @else
            @if (session()->has('post_added'))
                @if (session()->get('post_added') == true)
                    <div class="alert alert-success mb-3" role="alert">
                        Sikeresen módosítottad a bejegyzéést!
                    </div>
                @endif
            @endif

            <h1>{{ $post->title }}</h1>
            <p class="mb-0">Szerző: {{ $post->user->name }}</p>
            <div class="mb-2">
                @foreach ($post->tags as $tag)
                    <span style="background-color: {{ $tag->color }}!important;" class="badge badge-dark"><a style="color: white !important;" href="{{ route('tag', ['id' => $tag->id]) }}"> {{$tag->text}} </a> </span>
                @endforeach
            </div>
            @if ($post->image_url !== null)
                <img class="img-fluid" src="{{  Storage::url('images/post_images/' . $post->image_url) }}">
            @endif

            <p> {{ $post->text }}</p>

            @auth
            @if (Auth::user()->can('update', $post))
                <a href="{{ route('post.edit', ['id' => $post->id]) }}" role="button" class="btn btn-primary"> Módosítás</a>
                    @csrf
            @endif
            @if (Auth::user()->can('delete', $post))
                <form action="{{ route('post.delete', ['id' => $post->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger"> Törlés </button>
                </form>
            @endif
            @endauth


        @endif
    </div>
@endsection

