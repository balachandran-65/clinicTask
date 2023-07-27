<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class TheaterSlot extends Component
{

    // public $receivedMessage = '';
    // public function mount($message){


        // public function onMessageSent($message)
        // {
            // dd($message);
    //         $this->receivedMessage = $message;
    //     // }
    
    // }


    // protected $listeners = ['messageSent' => 'onMessageSent'];

  
    // public $selectedDate;
    // public $selectedSeats = [1,2,3,4,5];

    // Array to simulate booked seats for each date
    // public $bookedSeats = [];

    // public function selectSeat($seat)
    // {
    //     if (in_array($seat, $this->selectedSeats)) {
    //         // Unselect the seat if it's already selected
    //         $this->selectedSeats = array_diff($this->selectedSeats, [$seat]);
    //     } else {
    //         // Select the seat if it's not already selected and not booked for the selected date
    //         if (!in_array($seat, $this->bookedSeats[$this->selectedDate])) {
    //             $this->selectedSeats[] = $seat;
    //         }
    //     }
    // }

    // public function updatedSelectedDate($newDate)
    // {
    //     // Fetch booked seats for the selected date from the database or any other source
    //     // In this example, we're randomly simulating booked seats.
    //     $this->bookedSeats[$newDate] = [1,2];
    // }
    



    // 
    // 
    // 
    // 
    // 
    // 
    // public $currentDate;
    public $doctors=['1,emanuvel','2,sithra'];
    public $dates = ['21','22'];

    public $selectDoctor='';
    public $selectedDate='';
    public $selectedTime='';
    public $availableSlots;
    public $currentTime;

    public $currentDateTime;
    public $currentDate;

    public function mount()
    {
        // $this->currentDateTime = now()->format('l, F j, Y h:i:s A');
        // $selectedDate = Carbon::parse($this->selectedDate);

        // for ($i = 0; $i < 3; $i++) {
        //     $dates[] = $selectedDate->addDay()->toDateString();
        // }
        $this->currentDateTime= now()->format('l, F j, Y ');
        $this->currentDate= now()->format('l, F j, Y ');
        // $this->currentTime = date('j h:i:s');
        // $this->selectedDate = Carbon::now()->toDateString();
        $this->refreshSlots();
        $this->updateTime();
    }

    public function refreshSlots()
    {
        // Replace this logic with your own to generate the available time slots for the selected date.
        $this->availableSlots = [
            '10:00 AM',
            '11:00 AM',
            '12:00 PM',
            '03:00 PM',
            '04:00 PM',
            // Add more time slots as needed
        ];
    }
    public function updateTime()
    {
        $this->currentTime = now()->format('h:i:s A');
        // $this->currentTimeAMPM = now()->format('A');
    }


    public function selectDoctor($select_doctor_id){
        // dd('sdfghjk');
        $this->selectDoctor=$select_doctor_id;
       if($select_doctor_id==='1'){
        
        $this->id_1refreshSlots();

       }else{
        $this->refreshSlots();
       }
      
        // $this->currentDate= now()->format('l, F j, Y ');
       
    }
    public function id_1refreshSlots()
    {
        // Replace this logic with your own to generate the available time slots for the selected date.
        $this->availableSlots = [
            '12:00 PM',
            '01:00 pm',
            // Add more time slots as needed
        ];
    }

    public function selectDate($date)
    { 
        // dd($date);
        if($this->selectDoctor==='1'){
            $this->selectedDate = $date;

            $this->id_1refreshSlots();

        }else{
        $this->selectedDate = $date;

        $this->refreshSlots();
        }
    }
    
    public function book_date_time($slotTime){
        $this->selectedTime=$slotTime;

    }
    public $bookedSlots=[];
    public $book_date;
    

    public function bookSlot($doc_id,$date,$slotTime){

            

        if (!empty($doc_id) && !empty($date) && !empty($slotTime)  ) {
            
            $this->book_date=$doc_id."".substr($date,-9,-7)." ".$slotTime;
            // dd('yeah');
            if(in_array($this->book_date,$this->bookedSlots)){
              dd('this date alredy booked');
            }else{
           
            // dd($this->book_date);
          array_push($this->bookedSlots,$this->book_date);
            }
        } else {
            // 
            dd("The variable is empty.");
           
        }
        // dd(substr($date,13,16),$slotTime);

    }

    public function render()
    {
       
        return view('livewire.theater-slot');
    }

    

}
