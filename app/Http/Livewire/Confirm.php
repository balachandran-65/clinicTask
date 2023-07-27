<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\consultations;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Twilio\Rest\Client;

class Confirm extends Component
{   
    public $doctors_fee;

    public function confirmPay($d_id,$pa_id,$slot_date,$slot_time,$health_concern,$doctor_fee){
       
    //   dd($doctor_fee);
       $DoctDateTime=$slot_date." ".date('H:i',strtotime($slot_time));
        consultations::create([
            'doctor_id' => $d_id,
            'patient_id' => $pa_id,
            'consultation_date_time'=>$DoctDateTime,
            'health_concerns' =>$health_concern,
            'is_paid'=>1
        ]);
        $this->doctors_fee=intval(substr($doctor_fee,1,4));
        $this->create();
        // dd($this->doctors_fee);
        // dd('successfully added and pay');
       
    }


    // payment Result send customer
    public function paymentResult()
{
    $accountSid ='AC6f63ff2fb7b473824f701f3e16d94c84';
    $authToken ='a502772df3177e43caa368da9e4ed325';
    $twilioNumber = "+14155238886"; 

    $recipientNumber = "+916369349596"; 

    // Message to be sent
    $message ='Your payment was success';

    try {
        // Initialize the Twilio client
        $client = new Client($accountSid, $authToken);

        // Send the WhatsApp message
        $client->messages->create("whatsapp:$recipientNumber", [
            'from' => "whatsapp:$twilioNumber",
            'body' => $message,
           
        ]);
        // Display a success message
        session()->flash('success', 'WhatsApp message sent successfully!');
        return redirect()->to('detailsPage');
       
    } catch (\Exception $e) {
        // Display an error message if something goes wrong
        session()->flash('error', 'Failed to send WhatsApp message: ' . $e->getMessage());
    }

}

// payment section

    public function create()
    {
        // dd($this->doctors_fee);
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $checkout_session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'inr',
                    'unit_amount' => $this->doctors_fee * 100,
                    'product_data' => [
                        'name' => 'Stubborn Attachments',
                        'images' => ["https://i.imgur.com/EHyR2nP.png"],
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);
        // dd($checkout_session->url);
        return redirect()->to($checkout_session->url);
    }

    

    public function render()
    {
        return view('livewire.confirm');
    }
}
