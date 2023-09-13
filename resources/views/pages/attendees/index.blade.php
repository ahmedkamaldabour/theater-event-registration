@extends('inc.master')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1> Reservation </h1>
        </div>
    </div>


    <div class="col-md-12">
        @include('partials.flash_messages')
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="{{route('resister.create')}}" class="btn btn-success mb-3">Create Reservation</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Movie</th>
                <th scope="col">Date</th>
                <th scope="col">Showtime</th>
                <th scope="col"> Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <th scope="row">{{$reservation->id}}</th>
                    <td>{{$reservation->name}}</td>
                    <td>{{$reservation->email}}</td>
                    <td>{{$reservation->phone}}</td>
                    <td>{{$reservation->eventDay->movie->name}}</td>
                    <td>{{$reservation->eventDay->date->date}}</td>
                    <td>
                        {{$reservation->eventDay->showtime->start_time}} -
                        {{$reservation->eventDay->showtime->end_time}}
                    </td>
                    <td>
                        <a href="{{route('resister.edit', $reservation->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('resister.destroy', $reservation->id)}}" method="post"
                              class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
