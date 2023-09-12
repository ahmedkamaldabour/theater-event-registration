<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RESISTER</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<body>
<div class="row">

    <div class="col-md-6 offset-md-3 pt-5">
        <h1>Resister</h1>
    </div>

    <div class="col-md-6 offset-md-3">
        @include('partials.flash_messages')
    </div>

    <div class="col-md-6 offset-md-3">
        <form action="{{ route('resister.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="address">Event:</label>
                <select class="form-control" name="event_day_id" id="event_id">
                    <option value="">Select Event</option>
                    @foreach($event_days as $event)
                        <option value="{{ $event->id }}"
                                {{ old('event_id') == $event->id ? 'selected' : ''}}>
                            {{ $event->movie->name }}  / {{ $event->date->date }} / {{$event->date->getDay()}}
                            {{ $event->showtime->start_time }} - {{ $event->showtime->end_time }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.js"></script>
</body>
</html>
