<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\doctors;

class Home extends Component
{
    public $home;
    public $second_page='2';

   
    // click book  to navigate
    public function bookClick(){

        session(['my_session_variabl' => 'balachandr']);

        redirect()->to('appointment');
       
    }
    
   

// 
    public function paricularDoctorBook($val){
   
        session(['doctor_id' => $val]);
        redirect()->to('appointment');

       
    }






















    // public function ret($val){
    //     session(['variable_name' => $val]);
    //     session(['variable_name' => '']);


// Using request() method
    //   request()->session()->put('variable_name', $val);
      
    // }

    // end of click book





    public function render()
    {

        return view('livewire.home');
    }
}
