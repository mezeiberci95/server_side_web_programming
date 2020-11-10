@extends('layouts.app')

@section('title', 'Új bejegyzés')


@section('content')
    <div class="container">
        <form action="{{route('store.new.post')}}" method="POST" enctype="multipart/form-data">
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
                    <textarea id="text" name='text' class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}" rows="5" value="{{ old('text') }}"></textarea>
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

            <h6> Tagek </h6>
            @forelse ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag{{ $loop->iteration }}" name="tags[]">
                    <label class="form-check-label" for="tag{{ $loop->iteration }}">
                        {{ $tag->text }}
                    </label>
                </div>
            @empty
                <p> Nincsenek tag-ek </p>
            @endforelse


            <div class="row my-2">
                <label for="image" class="col-sm-2"> Kép</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                        @error('image')
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('image') }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-center my-3">
                <button type="submit" class="btn btn-primary"> Hozzáadás </button>
            </div>

        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('input[type=file]').on('change', (e) => {
            let target = $(e.currentTarget)
            let fileName = target.val()
            target.next('.custom-file-label').html(fileName)
        })
    </script>
@endsection
