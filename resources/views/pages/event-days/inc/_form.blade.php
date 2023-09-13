@csrf
<div class="form-group">
    <label for="movie_id">Movie</label>
    <select name="movie_id" id="movie_id" class="form-control">
        <option value="">Select Movie</option>
        @foreach($movies as $movie)
            <option
                value="{{$movie->id}}"
                {{ old('movie_id', isset($event_day)?$event_day->movie_id:'') == $movie->id ? 'selected' : '' }}>
                {{$movie->name}}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="date_id">Date</label>
    <select name="date_id" id="date" class="form-control">
        <option value="">Select Date</option>
        @foreach($dates as $date)
            <option
                value="{{$date->id}}"
                {{ old('date_id', isset($event_day)?$event_day->date_id:'') == $date->id ? 'selected' : '' }}>
                {{$date->date}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="showtime_id">Showtime</label>
    <select name="show_time_id" id="show_time_id" class="form-control">
        <option value="">Select Showtime</option>
        @foreach($showtimes as $showtime)
            <option
                value="{{$showtime->id}}"
                {{ old('show_time_id', isset($event_day)?$event_day->show_time_id:'') == $showtime->id ? 'selected' : '' }}>
                {{$showtime->start_time}} - {{$showtime->end_time}}</option>
        @endforeach
    </select>
</div>
<button type="submit" class="btn btn-primary mt-2">{{$button}}</button>



