<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DetailPage extends Component
{
    public function backTOHome(){
        
        redirect()->to('/');
       
    }
    public function render()
    {
        return view('livewire.detail-page');
    }
}
