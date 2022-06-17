<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon; 

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class StripeController extends Controller
{
    public function StripeOrder(Request $request){


    		$total_amount = round(Cart::total());
    	
 
	\Stripe\Stripe::setApiKey('sk_test_51IUTWzALc6pn5BvMjaRW9STAvY4pLiq1dNViHoh5KtqJc9Bx7d4WKlCcEdHOJdg3gCcC2F19cDxUmCBJekGSZXte00RN2Fc4vm');

	 
	
	$charge = \Stripe\Charge::create([
	  'amount' => $total_amount*100,
	  'currency' => 'usd',
	  'description' => 'Easy Online Store',
	  
	  'metadata' => ['order_id' => uniqid()],
	]);

	   dd($charge);

    //  $order_id = Order::insertGetId([
    //  	'user_id' => Auth::id(),
    //  	'division_id' => $request->division_id,
    //  	'district_id' => $request->district_id,
    //  	'state_id' => $request->state_id,
    //  	'name' => $request->name,
    //  	'email' => $request->email,
    //  	'phone' => $request->phone,
    //  	'post_code' => $request->post_code,
    //  	'notes' => $request->notes,

    //  	'payment_type' => 'Stripe',
    //  	'payment_method' => 'Stripe',
    //  	'payment_type' => $charge->payment_method,
    //  	'transaction_id' => $charge->balance_transaction,
    //  	'currency' => $charge->currency,
    //  	'amount' => $total_amount,
    //  	'order_number' => $charge->metadata->order_id,

    //  	'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
    //  	'order_date' => Carbon::now()->format('d F Y'),
    //  	'order_month' => Carbon::now()->format('F'),
    //  	'order_year' => Carbon::now()->format('Y'),
    //  	'status' => 'pending',
    //  	'created_at' => Carbon::now(),	 

    //  ]);

  
     }



}
 