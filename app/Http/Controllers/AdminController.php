<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Hash;
use App\Models\OrderItem;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    protected $guard = 'admin';


    public function Index(){

      
        return view('admin.admin_login');
        
    }

    public function users()
    {

        $users = User::latest()->get();
        return view('admin.admin_users', compact('users'));
    }

    public function Dashboard(){
        
        return view('admin.admin_master');
    }


    public function profile(){
        
        return view('admin.admin_profile');
    }


    public function Login(Request $request){

        // dd($request->all());

   

        
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return redirect('/admin/login')->with('error', 'Something went wrong.');
        }

        if (Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect('/admin/dashboard');
        }

        return redirect($this->loginPath)
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => 'Incorrect email address or password']);


        }

    public function AdminLogout(){

        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error','Admin Logout Successfully');

    } //end method

    
    public function checkoutView(){

        
        $product = Product::get();
		$orderItem = OrderItem::where('product_id')->get();
        $order = Orders::where('user_id',Auth::id())->get();
		$cartTotal = Cart::total();
	    $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
       

       $table=DB::table('orders')
                 ->select('orders.name','order_items.id','orders.email','orders.telephone',
        'orders.post_code','orders.district_id','orders.division_id','orders.notes',
        'orders.state_name','order_items.product_id','products.product_name_en','products.product_small',
        'order_items.quantity',
        'order_items.price')
                ->join('order_items','orders.id','=','order_items.order_id')
                ->join('products','order_items.product_id','=','products.id');

        $table = $table->get();
        
        return view('admin.checkout_user', compact('product','orderItem','order','cartTotal','carts','cartQty','cartTotal','table'));
    }

}


