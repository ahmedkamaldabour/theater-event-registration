@extends('inc.master')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Add New Show Time</h1>
        </div>
    </div>
    @include('partials.flash_messages')
    <form action="{{route('showTimes.store')}}" method="post">
        @include('pages.show_times.inc._form')
    </form>
@endsection

@push('js')
@endpush
