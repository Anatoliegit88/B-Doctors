<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use App\Models\User;
use Braintree\Gateway;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('Admin.Sponsors.index', compact('sponsors'));
    }

    public function show(Sponsor $sponsor)
    {
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);

        $token = $gateway->clientToken()->generate();
        return view('Admin.Sponsors.show', compact('sponsor', 'token'));
    }

    public function store(Request $sponsor)
    {

        $user = auth()->user();


        if ($sponsor->id == 1) {
            $date = Carbon::now()->addHours(24);
        }
        if ($sponsor->id == 2) {
            $date = Carbon::now()->addHours(72);
        }

        if ($sponsor->id == 3) {
            $date = Carbon::now()->addHours(144);

        }

        $user->sponsors()->attach(

            $sponsor->id,
            ['expiration_date' => $date]

        );


        return redirect()->route('admin.profiles.show', auth()->user()->id)->with('message', 'sponsor bought !!');

    }



}