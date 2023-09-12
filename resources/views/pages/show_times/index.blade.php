@extends('inc.master')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>ALL Times</h1>
        </div>
    </div>

    @include('partials.flash_messages')

    <div class="row">
        <div class="col-md-12">
            <a href="{{route('showTimes.create')}}" class="btn btn-primary">Add New Show Time</a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Show Time</th>
                <th scope="col">End Time</th>
                <th scope="col"> Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($show_times as $time)
                <tr>
                    <th scope="row">{{$time->id}}</th>
                    <td>{{$time->start_time}}</td>
                    <td>{{$time->end_time}}</td>
                    <td>
                        <a href="{{route('showTimes.edit', $time->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('showTimes.destroy', $time->id)}}" method="post" class="d-inline-block">
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
