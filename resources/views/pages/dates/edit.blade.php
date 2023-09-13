@extends('inc.master')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Update Date</h1>
        </div>
    </div>

    @include('partials.flash_messages')

    <form action="{{route('dates.update', $date->id)}}" method="post">
        @CSRF
        @method('Put')
        <div class="form-group col-3">
            <label for="date_id"> Change Date</label>
            <input type="date" class="form-control" id="date_id" name="date" value="{{old('date',$date->date)}}">
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </div>
    </form>

@endsection
