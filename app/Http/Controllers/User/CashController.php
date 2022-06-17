<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Orders;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\CheckoutMail;
use App\Mail\OrderMail;
use App\Models\Confirmation;
use Illuminate\Support\Facades\DB;
use PDF;

class CashController extends Controller
{
	public function CashOrder(Request $request)
	{


		if (Session::has('coupon')) {
			$total_amount = Session::get('coupon')['total_amount'];
		} else {
			$total_amount = round(Cart::total());
		}



		// dd($charge);

		$order_id = Order::insertGetId([
			'user_id' => Auth::id(),
			'division_id' => $request->division_id,
			'district_id' => $request->district_id,
			'state_id' => $request->state_id,
			'name' => $request->name,
			'email' => $request->email,
			'phone' => $request->phone,
			'post_code' => $request->post_code,
			'notes' => $request->notes,

			'payment_type' => 'Cash On Delivery',
			'payment_method' => 'Cash On Delivery',

			'currency' =>  'Usd',
			'amount' => $total_amount,


			'invoice_no' => 'EOS' . mt_rand(10000000, 99999999),
			'order_date' => Carbon::now()->format('d F Y'),
			'order_month' => Carbon::now()->format('F'),
			'order_year' => Carbon::now()->format('Y'),
			'status' => 'pending',
			'created_at' => Carbon::now(),

		]);

		// Start Send Email 
		$invoice = Order::find($order_id);
		$data = [
			'invoice_no' => $invoice->invoice_no,
			'amount' => $total_amount,
			'name' => $invoice->name,
			'email' => $invoice->email,

		];

		Mail::to($request->email)->send(new OrderMail($data));
	

		// End Send Email 


		$carts = Cart::content();
		foreach ($carts as $cart) {
			OrderItem::insert([
				'order_id' => $order_id,
				'product_id' => $cart->id,
				'color' => $cart->options->color,
				'size' => $cart->options->size,
				'qty' => $cart->qty,
				'price' => $cart->price,
				'created_at' => Carbon::now(),

			]);
		}


		if (Session::has('coupon')) {
			Session::forget('coupon');
		}

		Cart::destroy();

		$notification = array(
			'message' => 'Your Order Place Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('dashboard')->with($notification);
	} // end method 



	public function AddToCash2(Request $request)
	{

		$cartTotal = Cart::total();
		$carts = Cart::content();
		$cartQty = Cart::count();
		$cartTotal = Cart::total();
		$total_amount = round(Cart::total());
		$order = Orders::where('user_id', Auth::id())->get();
		$order_id = Orders::insertGetId([

			'user_id' =>  Auth::id(),
			'division_id' => $request->division_id,
			'district_id' => $request->district_id,
			'state_name' => $request->state_name,
			'name' => Auth::user()->name,
			'email' => Auth::user()->email,
			'telephone' => $request->telephone,
			'post_code' => $request->post_code,
			'notes' => $request->notes,
			'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
			'payment_method' => 'cash',
			'amount' =>  $total_amount,
			'created_at' => Carbon::now()

		]);


		foreach ($carts as $cart) {
			OrderItem::insert([
				'order_id' => $order_id,
				'product_id' => $cart->id,
				'quantity' => $cart->qty,
				'price' => $cart->price,
				'created_at' => Carbon::now(),

			]);
		}

		if ($request->payment_method == 'cash') {
			return view('frontend.payment.cash', compact('cartTotal', 'order', 'carts', 'cartQty'));
		}
	}




	public function CheckoutDelete($id)
	{



		DB::table('order_items')

			->join('orders', 'orders.id', '=', 'order_items.order_id')
			->where('orders.user_id', '=', Auth::id())
			->delete();

		$notification = array(
			'message' => ' Deleted Successfully',
			'alert-type' => 'info'
		);


		return redirect()->route('dashboard')->with($notification);
	}



	public function Confirmation()
	{

		Confirmation::insert([
			'user_id' => Auth::id()

		]);


		return redirect()->route('dashboard');
	}

	
    public function OrderDetails($order_id){

    	$order = Order::with('division','district','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('frontend.order_details',compact('order','orderItem'));

    } // end mehtod 


	public function InvoiceDownload($order_id){
		$order = Order::with('division','district','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
		 $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
		
		 $pdf = PDF::loadView('frontend.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
				
		 ]);
		 return $pdf->download('invoice.pdf');
 
 
 
	 } // end mehtod 
 

	 public function sendEmail()

	 {

		$orders = Orders::where('user_id', Auth::id())->get();


		 Mail::to($orders)->send(new OrderMail($orders));

		
		 $notification = array(
			'message' => ' Mail Sent Successfully',
			'alert-type' => 'info'
		);


		return redirect()->route('dashboard')->with($notification);
	 
	 }
	 


}
