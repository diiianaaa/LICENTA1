<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Hash;
use App\Models\OrderItem;
use App\Models\Orders;
use Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller
{
    public function indexPdf()
    { $product = Product::get();
		$orderItem = OrderItem::where('product_id')->get();
        $order = Orders::where('user_id',Auth::id())->get();
		$cartTotal = Cart::total();
	    $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        	
	$order = Orders::where('user_id',Auth::id())->get();
       

       $table=DB::table('orders')
                 ->select('orders.name','order_items.id','orders.email','orders.telephone',
        'orders.post_code','orders.district_id','orders.division_id','orders.notes',
        'orders.state_name','order_items.product_id','products.product_name_en','products.product_small',
        'order_items.quantity',
        'order_items.price')
                ->join('order_items','orders.id','=','order_items.order_id')
                ->join('products','order_items.product_id','=','products.id');

        $table = $table->get();

        $data = [
            'title' => 'Thank you for your order!',
            'date' => date('m/d/Y'),
            'product' => 'products.product_name_en'
        ];
           


        $pdf = PDF::loadView('testPDF', $data);
     
        return $pdf->download('order.pdf',compact('table','order'));
    }
}