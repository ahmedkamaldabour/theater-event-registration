@extends('inc.master')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>ALL Movies</h1>
        </div>
    </div>

    @include('partials.flash_messages')

    <div class="row">
        <div class="col-md-12">
            <a href="{{route('movies.create')}}" class="btn btn-primary">Add New Movie</a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col"> Description</th>
                <th scope="col"> Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                    <th scope="row">{{$movie->id}}</th>
                    <td>{{$movie->name}}</td>
                    <td>{{$movie->description}}</td>
                    <td>
                        <a href="{{route('movies.edit', $movie->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('movies.destroy', $movie->id)}}" method="post" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
