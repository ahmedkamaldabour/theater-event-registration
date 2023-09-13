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


    @include('partials.flash_messages')

    <form action="{{route('event-days.update', $event_day->id)}}" method="post">
        @method('PUT')
        @include('pages.event-days.inc._form', ['button' => 'Update Event Day'])
    </form>

@endsection



@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#date').change(function () {
                var date_id = $(this).val();
                $url = '{{route('showTimeForSelectedData', ':date_id')}}';
                $.ajax({
                    url: $url.replace(':date_id', date_id),
                    method: 'GET',
                    data: {
                        date_id: date_id
                    },
                    success: function (data) {
                        // Clear the current options
                        $('#show_time_id').empty();

                        // Append The new data to $showtimes variable in the view page (inc._form.blade.php)
                        $.each(data, function (index, showtime) {
                            console.log(showtime);
                            $('#show_time_id')
                                .append('<option' +
                                    ' value="' + showtime.id + '">' + showtime.start_time + ' - ' + showtime.end_time +
                                    '</option>');
                        });
                    }
                });

            });
        });
    </script>
@endpush
