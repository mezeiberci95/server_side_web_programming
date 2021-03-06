@extends('layouts.app')

@section('title', 'Minden bejegyzes')

@section('content')
    Minden bejegyzes
    <div class="container">

        @if (session()->has('post_added'))
            @if (session()->get('post_added') == true)
                <div class="alert alert-success mb-3" role="alert">
                    Sikeresen hozzáadtál egy bejegyzéést!
                </div>
            @endif
        @endif

        @if (session()->has('post_deleted'))
            <div class="alert alert-success mb-3" role="alert">
                Sikeresen törölted ezt a bejegyzéést: {{ session()->get('post_deleted') }}
            </div>
        @endif


        <div class="row">
            @forelse ($posts as $post)
        <div class="col-12 col-lg-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{$post->title}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Szerző: {{$post->user->name}}</h6>
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
    </div>
@endsection
