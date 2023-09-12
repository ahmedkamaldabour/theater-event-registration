@extends('inc.master')



@section('content')


    <div class="row">
        <div class="col-md-12">
            <h1>Add New Event Day</h1>
        </div>
    </div>

    @include('partials.flash_messages')

    <form action="{{route('event-days.store')}}" method="post">
        @include('pages.event-days.inc._form', ['button' => 'Add New Event Day'])
    </form>

@endsection
