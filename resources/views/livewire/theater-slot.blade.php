 <div>
    {{-- Do your work, then step back. --}}

{{-- 
    <h1>Select Date:</h1>{{$receivedMessage}}
    <input type="date" wire:model="selectedDate">

    <h1>Select your seats:</h1>
    <div class="seat-map">
        @foreach ($rows as $row)
            <div class="row">
                @foreach ($seats as $seat)
                    @php
                        $seatNumber = ($row - 1) * count($seats) + $seat;
                    @endphp
                    @if (!in_array($seatNumber, $bookedSeats[$selectedDate] ?? []))
                        <div wire:click="selectSeat({{ $seatNumber }})" class="seat @if(in_array($seatNumber, $selectedSeats)) selected @endif"
                        >
                            {{ $seatNumber }}
                        </div>
                    @else
                        <div class="seat booked">Booked</div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>

    <h2>Selected Seats:</h2>
    <ul>
        @foreach ($selectedSeats as $seat)
            <li>Seat {{ $seat }}</li>
        @endforeach
    </ul> --}}




    <p>{{$currentDateTime}}</p>:::<p>{{substr($currentDateTime,0,7)}}</p>
    <div class="m-4 p-4 flex justify-center gap-8">
   @foreach($doctors as $doctor)
     <div><p wire:click="selectDoctor('{{substr($doctor,0,1)}}')"  >{{$doctor}}</p></div>
   @endforeach
  </div>



  <h2>Available Dates:</h2>
  <ul class="flex justify-center gap-8">
      @foreach ($dates as $date)
      
           
          <li wire:click="selectDate('{{ $currentDate }}')" style="cursor: pointer" class=" bg-blue-300 gap-4 ">
              {{ $currentDate }}
          </li>
          <?php 
          $nextDate = date('l, F j, Y ', strtotime($currentDate .' +1 day'));
          
          ?>
      
          <?php 
          // $nextDate = date('l, F j, Y ', strtotime($currentDate .' +1 day'));
          $currentDate = $nextDate;
          ?>
          
      @endforeach
  </ul>
 
    {{-- date('H:i', strtotime($currentTime))<date('H:i', strtotime($slot)) --}}
  {{-- in_array($selectDoctor.substr($selectedDate,-9,-7)." ".$slot,$bookedSlots) &&  --}}

  <h2>Available Time Slots for {{$selectDoctor}}:{{ $selectedDate }}:{{$selectedTime}}</h2>
  <ul class="flex justify-center gap-4 ">
      @foreach ($availableSlots as $slot)
       {{-- <p>{{$currentDateTime}}////{{$selectedDate}}</p> --}}
       @if($currentDateTime===$selectedDate)
            {{-- <p>hjjasdjhbas</p> --}}
        @if(date('H:i', strtotime($currentTime))>date('H:i', strtotime($slot)))
                    <li class="bg-gray-300" >booked</li>
          @else
                    @if(in_array($selectDoctor.substr($selectedDate,-9,-7)." ".$slot,$bookedSlots))
                      <li class="bg-gray-300" >booked</li>
                    @else
                      <li wire:click="book_date_time('{{ $slot}}')"  class="m-4 bg-black p-5 text-white">{{$slot}}</li>
                    @endif
            @endif  
             
       @else 
             @if(in_array($selectDoctor.substr($selectedDate,-9,-7)." ".$slot,$bookedSlots))
                      <li class="bg-gray-300" >booked</li>
             @else
            <li wire:click="book_date_time('{{ $slot}}')"  class="m-4 bg-black p-5 text-white">{{$slot}}</li>
             @endif
       @endif
      @endforeach
  </ul>
  {{-- {{$selectDoctor}}.{{substr($selectedDate,-9,-7)}}.{{$slot}} --}}
  
  <div><button wire:click="bookSlot('{{$selectDoctor}}','{{$selectedDate}}','{{ $selectedTime}}')" class=" bg-red-400 p-3 m-3 ">BooK</button></div>
    @foreach($bookedSlots as $booked)
   <p>{{$booked}}</p>
   @endforeach

   <p>{{date('H:i', strtotime($currentTime))}}:::{{substr($currentDateTime,0,7)}}</P>
</div> 
