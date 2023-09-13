@extends('inc.master')


@section('content')


    <div class="row">

        <div class="col-md-12">
            <h1>Update Resister</h1>
        </div>


        <div class="col-md-12">
            <form action="{{ route('resister.update', $attendee->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $attendee->name) }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ old('email',$attendee->email)  }}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $attendee->phone) }}">
                </div>
                <div class="form-group">
                    <label for="address">Event:</label>
                    <select class="form-control" name="event_day_id" id="event_id">
                        <option value="">Select Event</option>
                        @foreach($event_days as $event)
                            <option value="{{ $event->id }}"
                                {{ old('event_id', $attendee->event_day_id) == $event->id ? 'selected' : ''}}>
                                {{ $event->movie->name }}  / {{ $event->date->date }} / {{$event->date->getDay()}}
                                {{ $event->showtime->start_time }} - {{ $event->showtime->end_time }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary mt-2" type="submit">Submit</button>
            </form>
        </div>


    </div>
@endsection


