<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request){
 
        
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;
    
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => 'Tony',
                'lastName' => 'Stark',
                'email' => 'tony@avengers.com',
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
    
        if ($result->success) {
            $transaction = $result->transaction;
           
            
        $user = auth()->user();


        if ($request->id == 1) {
            $date = Carbon::now()->addHours(24);
        }
        if ($request->id == 2) {
            $date = Carbon::now()->addHours(72);
        }

        if ($request->id == 3) {
            $date = Carbon::now()->addHours(144);

        }

        $user->sponsors()->attach(

            $request->id,
            ['expiration_date' => $date]

        );
    
            return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
        } else {
            $errorString = "";
    
            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
    
            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return back()->withErrors('An error occurred with the message: '.$result->message);
        }

    }
}
