<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\patients;

class Information extends Component
{
    public $userId;

    // getValues
    public $fullName='';
    public $email='';
    public $phoneNumber='';
    public $healthConcern='';

    public function mount(){
        // $this->onMessageSent();
    }


    protected $rules = [

        'fullName' => 'required|min:6',

        'email' => 'required|email',
        'phoneNumber'=>'required|max:10,min:10',
        'healthConcern'=>'required',
    ];

 

    // insertion patient details
    public function insertPatientData()
    {
        
        $this->validate();
        patients::create([
            'full_name' => $this->fullName,
            'email' => $this->email,
            'phone_number'=>$this->phoneNumber,
        ]);
        $patientId = patients::where('email', $this->email)->where('phone_number',$this->phoneNumber)->first();
        //session date of patients
        session(['patient_id' =>$patientId->id]);
        session(['patient_name' =>$this->fullName]);
        session(['patient_email' => $this->email]);
        session(['patient_number' =>$this->phoneNumber]); 
        session(['patient_health_concern' =>$this->healthConcern]);

        // if ($patientId) {
        //     $this->userId=$patientId ;
        //     session()->flash('patientId', $patientId->id);
        // } else {
        //     $this->userId="null";
        //     session()->flash('patientId', 'nothing');
        // }
       
        // Clear the form fields after insertion
        $this->fullName = '';
        $this->email = '';
        $this->phonneNumber = '';
        redirect()->to('confirmDetails');
    }
     public function patientCancel(){
        redirect()->to('appointment');
     }

    
  

    
    public function render()
    {
        return view('livewire.information');
    }
}
