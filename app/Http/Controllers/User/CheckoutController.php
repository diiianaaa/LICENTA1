<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\Product;
use App\Models\ShipDivision;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
	public function DistrictGetAjax($division_id)
	{

		$ship = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
		return json_encode($ship);
	} // end method 





	public function StateGetAjax($district_id)
	{

		$ship = ShipState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
		return json_encode($ship);
	} // end method 

	public function CheckoutUserView(Request $request)
	{

		$product = Product::get();
		$orderItem = OrderItem::where('product_id')->get();
		$order = Orders::where('user_id', Auth::id())->get();
		$cartTotal = Cart::total();
		$carts = Cart::content();
		$cartQty = Cart::count();
		$cartTotal = Cart::total();


		$table = DB::table('orders')
			->select(
				'orders.name',
				'order_items.order_id',
				'orders.email',
				'orders.telephone',
				'orders.post_code',
				'orders.district_id',
				'orders.division_id',
				'orders.notes',
				'orders.state_name',
				'order_items.product_id',
				'products.product_name_en',
				'products.product_small',
				'order_items.quantity',
				'orders.created_at',
				'orders.payment_method',
				'orders.id',
				'order_items.price'
			)
			->join('order_items', 'orders.id', '=', 'order_items.order_id')
			->join('products', 'order_items.product_id', '=', 'products.id');

		$table = $table->get();



		$table2 = DB::table('orders')
			->select(
				'orders.name',
				'order_items.order_id',
				'orders.email',
				'orders.telephone',
				'orders.post_code',
				'orders.district_id',
				'orders.division_id',
				'orders.notes',
				'orders.state_name',
				'order_items.product_id',
				'products.product_name_en',
				'products.product_small',
				'order_items.quantity',
				'orders.created_at',
				'orders.payment_method',
				'orders.id',
				'order_items.price',
				'orders.invoice_no',
				 'orders.amount'
			)
			->join('order_items', 'orders.id', '=', 'order_items.order_id')
			->join('products', 'order_items.product_id', '=', 'products.id');

		$table2 = $table2->groupBy('orders.invoice_no')->get();


		return view('frontend.checkout.checkout_user', compact('table', 'order', 'table2','cartTotal'));
	} // end mehtod. 







}
