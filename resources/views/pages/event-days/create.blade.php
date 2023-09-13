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


@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#date').change(function () {
                var date_id = $(this).val();
                $url = '{{route('freeShowTimeForSelectedDate', ':date_id')}}';
                $.ajax({
                    url: $url.replace(':date_id', date_id),
                    method: 'GET',
                    data: {
                        date_id: date_id
                    },
                    success: function (data) {
                        $('#show_time_id').empty();
                        $.each(data, function (index, showtime) {
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
