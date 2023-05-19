<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<h3>Calendar</h3>
<title>
    Calendar
</title>
<a href="{{ route('clientindex') }}" class="btn btn-primary ">Go Back!</a>
<div id='calendar'></div>
<style>
    .fc-widget-content {
        /* min-height: 9em !important; */
        height: 130px !important;
    }

    .fc-day-grid-container {
        height: auto !important;
    }

    body {
        padding-top: 30px;
        width: 1140px;
        margin: 0 auto;
    }

    .fc-today {
        background-color: #c2bcbc !important;
    }

    .fc-event {

        border: none;
    }

    body {
        position: relative !important;
    }



    .index {
        position: absolute;
        top: 30px;
        right: 50%;
    }
</style>



<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({


            header: {
                left: 'Calendar',
                center: '',
                right: 'today prev,next'
            },
            // put your options and callbacks here
            events: [
                @foreach ($movies as $movie)
                    {
                        id: '{{ $movie->id }}',
                        title: '{{ $movie->name }}',
                        start: '{{ $movie->released_date }}',
                        editable: '{{ $movie->status }}',


                            @if($movie->status == 'ongoing')
                                backgroundColor: 'blue',
                            @elseif($movie->status == 'upcoming')
                                backgroundColor: 'red',
                            @else
                                backgroundColor: '#2c511f',
                            @endif



                        // url: '{{ route('showmovie', $movie->id) }}',

                    },
                @endforeach
            ],

            selectable: true,
            selectHelper: true,


            eventClick: function(info) {
                $(`#${info.id}`).modal('toggle');
                console.table(info.editable);
            }

        })
    });
</script>
<div class="index">

    @foreach ($statuses as $status)
        @if ($status->status == 'ongoing')
            <p><span><i class="fa-solid fa-circle" style="color: blue;"></i></span>: Ongoing</p>
        @elseif ($status->status == 'upcoming')
            <p><span><i class="fa-solid fa-circle" style="color: red;"></i></span>: Upcoming</p>
        @else
            <p><span><i class="fa-solid fa-circle" style="color: #2c511f;"></i></span>: Out of Theatres</p>
        @endif
        {{-- <p>{{ucwords($status->status)}}</p> --}}
    @endforeach



</div>

@include('added_components.calendar_modal')
