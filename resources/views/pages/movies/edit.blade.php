@extends('inc.master')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Update Movie</h1>
        </div>
    </div>

    @include('partials.flash_messages')

    <form action="{{route('movies.update', $movie->id)}}" method="post">
        @CSRF
        @method('put')
        <div class="form-group">
            <label for="movie_id"> Movie Name</label>
            <input type="text" class="form-control" id="movie_id" name="name" value="{{old('movie', $movie->name)}}">
            <label for="Description"> Description</label>
            <textarea class="form-control" id="Description" name="description">{{old('Description', $movie->description)}}</textarea>
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </div>
    </form>

@endsection
