@CSRF
<div class="form-group">
    <label for="start_time">Start Time</label>
    <input type="time" class="form-control" name="start_time" id="start_time"
             value="{{old('start_time', isset($showTime) ? $showTime->getRawOriginal('start_time') : '')}}"
    >
</div>
<div class="form-group">
    <label for="end_time">End Time</label>
    <input type="time" class="form-control" name="end_time" id="end_time"
           value="{{old('end_time', isset($showTime) ? $showTime->getRawOriginal('end_time') : '')}}" >
</div>
<button type="submit" class="btn btn-primary mt-2">Save</button>
