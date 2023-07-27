<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\doctors;
use App\Models\consultations;
use App\Models\slotTimes;
use App\Models\slots;

class Appointment extends Component
{
    // range of date show
    public $weeksDate=['1','2','3','4','5','6','7'];
     
   
    // store doctor_id and date and time Etc
    public $selectDoctor='';
    public $doctor_name='';
    public $doctor_fee='';
    public $selectDate='';
    public $selectTime='';

    // get details of date time 
    public $currentMonth;
    public $currentDate;
    public $currentDate_copy;
    public $currentTime;

    
    // slot and that times
    public $morningSlots;
    public $afternoonSlots;
    public $eveningSlots;

    // 
    // public $table_booked_id=[];
    public $table_booked=[];
    public $doctors;
    public function mount(){
        $this->doctors=doctors::all();
        $this->currentDate= now()->format('Y-m-d');
        $this->currentDate_copy= now()->format('l, F j, Y ');
        $this->currentMonth=now()->format('F');
        $this->availableSlotTimes();
        $this->updateTime();
        $this->bookedSlotsTable();

    }
    public function bookedSlotsTable(){
        $this->table_booked=consultations::pluck('doctor_id','consultation_date_time')->toArray();
      
    }
   // available slots

    public $eve;
    public function availableSlotTimes(){
        // static define
        $this->morningSlots=['10:30 AM','11:00 AM','11:30 AM'];
        $this->afternoonSlots=['12:00 PM','1:00 PM','2:30 PM','3:00 PM'];
        $this->eveningSlots=['04:00 PM','5:00 PM'];

        // below two lines code get only Slottimes in Slot_times table

        // $records =slotTimes::where('slot_id',$this->selectDoctor)->get();
        // $this->eveningSlots=$records->pluck('time')->toArray();

        //below this code refrence for get repective doctors date and times get

        

        // $re =slots::where('date',$this->selectDate)->get();
        // $this->eve=$re->pluck('id')->toarray();

        // $recor =slotTimes::where('slot_id',$this->eve)->get();
        // $this->eveningSlots=$recor->pluck('time')->toArray();

    }
    // get currentTime
    public function updateTime()
    {
          $this->currentTime = now()->format('h:i:s A');
    }

    // store doctor id and date and time
    public function selectDoctor($select_doctor_id,$doctor_name,$doctor_fee){
        // dd('doctor_id');
        $this->selectDoctor=$select_doctor_id;
        $this->doctor_name=$doctor_name;
        $this->doctor_fee=$doctor_fee;
        // $records =slots::where('doctor_id',$select_doctor_id)->get();
        // $this->eveningSlots=$records->pluck('time')->toArray();
  
        $this->availableSlotTimes();
   
    }
    
    // select Date function
    public function selectDate($date)
    { 
        // dd(date('Y-m-d',strtotime($date)));
        $this->selectDate=date('Y-m-d',strtotime($date));
        $this->availableSlotTimes();
   
    }
    
    public function selectTime($slotTime){
        $this->selectTime=$slotTime;

    }
    

      
    // go to next page and create session values 
    public $book_date;

    public function goToNextPage($doctor_id,$date,$slotTime,){
        
        if (!empty($doctor_id) && !empty($date) && !empty($slotTime)  ) {
            
            $this->book_date=substr($date,-9,-7)." ".$slotTime;
                           //   store session values for doctors and time and date
            session(['doctor_id' =>$doctor_id]);
            session(['doctor_name' =>$this->doctor_name]);
            session(['doctor_fee' =>$this->doctor_fee]);
            session(['slot_date' => date('y-m-d', strtotime($date))]);
            session(['slot_time' => date('h:i:s A', strtotime($slotTime))]);
            redirect()->to('informationPageRoot');
                            //   in here code paste in notes html 
        } else {
            dd('please check all are select or not');
            redirect()->to('appointment');  
        }

    }
    
   


    public function render()
    {
        
        return view('livewire.appointment');
    }
}


