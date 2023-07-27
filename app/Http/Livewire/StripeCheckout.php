<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Services\SmsService;
use Twilio\Rest\Client;
use App\Http\Livewire\StripeCheckout;


class StripeCheckout extends Component
{
    // public function dfghjk()
    // {
    //     Stripe::setApiKey(env('STRIPE_SECRET'));

    //     $checkout_session = Session::create([
    //         'payment_method_types' => ['card'],
    //         'line_items' => [[
    //             'price_data' => [
    //                 'currency' => 'inr',
    //                 'unit_amount' => 2000,
    //                 'product_data' => [
    //                     'name' => 'Stubborn Attachments',
    //                     'images' => ["https://i.imgur.com/EHyR2nP.png"],
    //                 ],
    //             ],
    //             'quantity' => 1,
    //         ]],
    //         'mode' => 'payment',
    //         'success_url' => route('success'),
    //         'cancel_url' => route('cancel'),
    //     ]);
    //     // dd($checkout_session->url);
    //     return redirect()->to($checkout_session->url);
    // }

    // public function handleStripePaymentSuccess()
    // {
    //     // Perform the Stripe payment processing here
    //     // If payment is successful, trigger the SMS sending process
    //     $this->sendPaymentSuccessMessage();
    // }

    // public function create()
    // {
    //     $smsService = new SmsService();
    //     $phoneNumber = '6369349596'; // Replace with the actual recipient's phone number
    //     $message = 'Your payment was successful! Thank you for your purchase.';

    //     // Send the message
    //     $smsService->sendSms($phoneNumber, $message);
    // }

    // app/Http/Livewire/YourComponentName.php


// public $accountSid;
// public  $authToken;
// public $twilioNumber;
// public $recipientNumber;
// public $message;



public function paymentResult()
{
    $accountSid ='AC6f63ff2fb7b473824f701f3e16d94c84';
    $authToken ='a502772df3177e43caa368da9e4ed325';
    $twilioNumber = "+14155238886"; // Must be a Twilio phone number with WhatsApp capabilities

    $recipientNumber = "+916369349596"; // The recipient's phone number with WhatsApp capabilities

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
    } catch (\Exception $e) {
        // Display an error message if something goes wrong
        session()->flash('error', 'Failed to send WhatsApp message: ' . $e->getMessage());
    }
}


    public function render()
    {
        return view('livewire.stripe-checkout');
    }
}
