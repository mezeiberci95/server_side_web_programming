@extends('layouts.app')

@section('title', 'Kezdőlap')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Üdv a blogon!</h1>
            <p class="lead">Ezt a blogot a szerveroldali webprogramoás tárgy keretein belül fejlesztjük.</p>
            <hr class="my-4">
            <ul>
                <li>Bejegyzések: N/A</li>
                <li>Felhasználók: N/A</li>
            </ul>
            <a class="btn btn-primary btn-lg" href="{{route('posts')}}" role="button">Bejegyzések megtekintése</a>
            </p>
        </div>
    </div>
@endsection
