@extends('inc.master')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Event Days</h1>
        </div>
    </div>

    @include('partials.flash_messages')

    <div class="row">
        <div class="col-md-12">
            <a href="{{route('event-days.create')}}" class="btn btn-primary">Add New Event Day</a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col"> Date</th>
                <th scope="col"> Start at : End at</th>
                <th scope="col"> Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($event_days as $name => $day)
                <tr>
                    <th scope="row">{{$day->id}}</th>
                    <td>{{$day->movie->name}}</td>
                    <td>{{$day->date->date}}
                        <br>
                        <badge class="badge badge-info">{{$day->date->getDay()}}</badge></td>
                    <td>{{$day->showtime->start_time}} -
                        {{$day->showtime->end_time}}</td>
                    <td>
                        <a href="{{route('event-days.edit', $day->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('event-days.destroy', $day->id)}}" method="post" class="d-inline-block">
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
