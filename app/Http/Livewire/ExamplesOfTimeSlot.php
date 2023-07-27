<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class ExamplesOfTimeSlot extends Component
{
    public $dates = [];

    public function mount()
    {
        // Get current date
        $currentDate = now();

        // Generate dates for the next three days
        for ($i = 0; $i < 4; $i++) {
            $this->dates[] = $currentDate->addDays($i)->toDateString();
        }
    }

    public $emitmessage = 'Hello, World!';

    public function sendToReceiver()
    {
        $this->emitall('messageSent', $this->emitmessage);
    }


//     public function generateTimeSlots()
// {
//     $timeSlots = [];
//     $startTime = strtotime('8:00 AM');
//     $endTime = strtotime('1:00 PM');

//     while ($startTime <= $endTime) {
//         $timeSlots[] = date('H:i A', $startTime);
//         $startTime = strtotime('+30 minutes', $startTime);
//     }

//     return $timeSlots;
// $timeSlots = $this->generateTimeSlots();
// ,[
//     'timeSlots' => $timeSlots,
// ]
// }







    public function render()
    {
        
        return view('livewire.examples-of-time-slot');
    }
}
