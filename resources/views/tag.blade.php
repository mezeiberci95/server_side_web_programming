@extends('layouts.app')

@section('title', 'Minden bejegyzes')

@section('content')
    <div class="container">
        @if (!isset($tag))
            <div class="alert alert-danger" role="alert">
                Nem létezik ilyen tag!
            </div>
        @else
            <h1 class="text-center"> {{ $tag->text }}</h1>
            <div class="row">
                @forelse ($posts as $post)
            <div class="col-12 col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Szerző: {{$post->author}}</h6>
                    <p class="card-text">{{ $post->text }}</p>
                    <a href="{{ route('post', ['id' => $post->id]) }}" class="card-link">Bejegyzés megtekintése</a>
                    </div>
                </div>
            </div>
            @empty
                <p> Még nincsenek bejegyzések! </p>
            @endforelse
            </div>
            <div class="text-center my-3">
                <a href="{{route('new.post')}}" role="button" class="btn btn-primary"> Új Bejegyzés </a>
            </div>
        @endif
    </div>
@endsection
