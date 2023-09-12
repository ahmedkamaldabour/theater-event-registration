@extends('inc.master')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Add New Movie</h1>
        </div>
    </div>

    @include('partials.flash_messages')

    <form action="{{route('movies.store')}}" method="post">
        @CSRF
        <div class="form-group">
            <label for="movie_id"> Movie Name</label>
            <input type="text" class="form-control" id="movie_id" name="name" value="{{old('movie')}}">
            <label for="Description"> Description</label>
            <textarea class="form-control" id="Description" name="description">{{old('Description')}}</textarea>
            <button type="submit" class="btn btn-primary mt-2">ADD</button>
        </div>
    </form>

@endsection
