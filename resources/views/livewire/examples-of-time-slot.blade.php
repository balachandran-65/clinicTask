<div>
    {{-- Stop trying to control. --}}

    <h1>Select Date and Time:</h1>
    @foreach ($dates as $date)
        <h2>{{ $date }}</h2>
        @for ($i = 1; $i <= 3; $i++)
            <div class="time-slot">
                <!-- Add your time slot selection elements here -->
                <!-- For demonstration purposes, we'll just display three static time slots -->
               <p>{{$emitmessage}}</p>
            </div>
        @endfor
    @endforeach
</div>
