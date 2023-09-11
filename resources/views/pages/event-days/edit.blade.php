@extends('inc.master')



@section('content')

    @if(session()->has('error'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">{{session()->get('error')}}</div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <h1>Update Event Day</h1>
        </div>
    </div>


    @if($errors->any())
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <form action="{{route('event-days.update', $event_day->id)}}" method="post">
        @method('PUT')
        @include('pages.event-days.inc._form', ['button' => 'Update Event Day'])
    </form>

@endsection
