@extends('layouts.app')

@section('title', 'Minden bejegyzes')

@section('content')
    Minden bejegyzes
    <div class="container">
        <div class="row">
            @forelse ($posts as $post)
        <div class="col-12 col-lg-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{$post['title']}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Szerző: {{$post['author']}}</h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="{{ route('post', ['id' => $post['id']]) }}" class="card-link">Bejegyzés megtekintése</a>
                </div>
            </div>
        </div>
        @empty
            <p> Még nincsenek bejegyzések! </p>
        @endforelse
        </div>
    </div>
@endsection
