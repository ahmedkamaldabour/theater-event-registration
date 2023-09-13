@extends('inc.master')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Add New Date</h1>
        </div>
    </div>

    @include('partials.flash_messages')

    <form action="{{route('dates.store')}}" method="post">
        @CSRF
        <div class="form-group col-3">
            <label for="date_id"> Chose Date</label>
            <input type="date" class="form-control" id="date_id" name="date" value="{{old('date')}}">
            <button type="submit" class="btn btn-primary mt-2">ADD</button>
        </div>
    </form>

@endsection
