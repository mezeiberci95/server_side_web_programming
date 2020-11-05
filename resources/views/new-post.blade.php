@extends('layouts.app')

@section('title', 'Új bejegyzés')


@section('content')
    <div class="container">
        <form action="{{route('store.new.post')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="title">Cím</label>
                        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" name='title' placeholder="Cím" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </div>
                        @endif

                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <label for="text">Bejegyzés szövege</label>
                    <textarea id="text" name='text' class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}" " rows="5" value="{{ old('text') }}"></textarea>
                    <!--@ error('text')
                        .
                        .
                        .
                        @ enderror  között is lehetne a div
                    -->
                    @if ($errors->has('text'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('text') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <div class="text-center my-3">
                <button type="submit" class="btn btn-primary"> Hozzáadás </button>
            </div>

        </form>
    </div>
@endsection
