@extends('inc.master')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>ALL dates</h1>
        </div>
    </div>

    @include('partials.flash_messages')

    <div class="row">
        <div class="col-md-12">
            <a href="{{route('dates.create')}}" class="btn btn-primary">Add New date</a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Date For Events</th>
                <th scope="col"> Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dates as $date)
                <tr>
                    <th scope="row">{{$date->id}}</th>
                    <td>{{$date->date}}</td>
                    <td>{{$date->description}}</td>
                    <td>
                        <a href="{{route('dates.edit', $date->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('dates.destroy', $date->id)}}" method="post" class="d-inline-block">
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
