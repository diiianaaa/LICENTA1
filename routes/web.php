<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\ReservationController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\IndexController;
use App\Models\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* -----------------Admin Route-------------------*/

Route::get('users', [WelcomeController::class, 'index'])->name('users.index');

Route::post('users-send-email', [WelcomeController::class, 'sendEmail'])->name('ajax.send.email');


Route::get('users1', [WelcomeController::class, 'index1'])->name('users.index1');

Route::post('users-send-email1', [WelcomeController::class, 'sendEmail1'])->name('ajax.send.email1');






Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'Index'])->name('login_form');

    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');

   

    Route::get('/logout', [AdminController::class, 'AdminLogout'])->middleware(['admin'])->name('admin.logout');
});


Route::prefix('category')->group(function () {

    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);

    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');

    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');

    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');

    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');

    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

   
});


Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');

Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');

Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');

Route::post('sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');

Route::get('sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');




Route::prefix('product')->group(function () {

    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');

    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');

    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');

    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');

    Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');

    Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');

    Route::get('/tag/{tag}', [IndexController::class, 'TagWiseProduct']);
});




// Product View Modal with Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);



Route::get('/', [IndexController::class, 'index']);

// Route::get('/user/reservation',[ReservationController::class, 'Reservation'])->name('user.reservation');

Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');

Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');

Route::get('/product/low-price', [IndexController::class, 'index_low'])->name('low-price');

Route::get('/product/high-price', [IndexController::class, 'index_high'])->name('high-price');

Route::get('/product/all', [IndexController::class, 'index_all'])->name('index-all');

Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');

// Route::post('/user/book',[IndexController::class, 'UserBooking'])->name('user.book.table');

Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');

Route::post('/user/upate/password', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');


// Product View Modal with Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);



//Blog

Route::get('/blog/view', [BlogController::class, 'InfoView'])->name('blog.view');

// Route::post('/blog/store', [BlogController::class, 'InfoStore'])->name('blog.store');





/// Frontend Product Review Routes

Route::post('/review/store', [ReviewController::class, 'ReviewStore'])->name('review.store');


// Admin Manage Review Routes 
Route::prefix('review')->group(function(){

Route::get('/pending', [ReviewController::class, 'PendingReview'])->name('pending.review');

Route::get('/admin/approve/{id}', [ReviewController::class, 'ReviewApprove'])->name('review.approve');

Route::get('/publish', [ReviewController::class, 'PublishReview'])->name('publish.review');

Route::get('/delete/{id}', [ReviewController::class, 'DeleteReview'])->name('delete.review');
 
});





// MultiLanguage


Route::get('/language/german', [LanguageController::class, 'German'])->name('german.language');

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');


//Product Details Page

Route::get('product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);;

Route::get('subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);



//Add to cart

Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);



//WishList

Route::get('wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');

Route::get('user/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);

Route::get('user/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

// Add to Wishlist
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);


//Cart


Route::get('/mycart', [CartPageController::class, 'ViewWishList'])->name('mycart');

Route::get('user/get-cart-product', [CartPageController::class, 'GetCartProduct']);

Route::get('user/get-cart-product1', [CartPageController::class, 'GetCartProduct']);

Route::get('user/cart-remove/{id}', [CartPageController::class, 'RemoveCartProduct']);


Route::get('user/cart-remove1/{id}', [CartPageController::class, 'RemoveCartProduct']);


Route::get('user/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);


Route::get('user/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);


Route::get('user/cart-increment1/{rowId}', [CartPageController::class, 'CartIncrement']);


Route::get('user/cart-decrement1/{rowId}', [CartPageController::class, 'CartDecrement']);



Route::get('/search', [ProductController::class, 'search'])->name('search');


//Checkout

Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');



Route::get('district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);


Route::get('state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);


Route::get('user/get-checkout', [CheckoutController::class, 'CheckoutUserView'])->name('user.checkout');



Route::post('/checkout/store', [CashController::class, 'AddToCash2'])->name('checkout.store');

Route::post('/checkout/confirm', [CashController::class, 'Confirmation'])->name('checkout.confirmation');


Route::get('/checkout/delete/{id}', [CashController::class, 'CheckoutDelete'])->name('checkout.delete');

Route::get('/checkout/confirm/sendMail', [CashController::class, 'sendEmail'])->name('send.mail');

Route::get('user/order_details/{order_id}', [CashController::class, 'OrderDetails']);

Route::get('user/invoice_download/{order_id}', [CashController::class, 'InvoiceDownload']);

Route::get('/googlemap', [MapController::class, 'map']);

Route::get('googlemap/direction', 'MapController@direction');




Route::prefix('shipping')->group(function () {

    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');

    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');

    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');

    Route::post('/division/update', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');

    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');




    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');

    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');

    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');

    Route::post('/district/update', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');

    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');





    Route::get('/country/view', [ShippingAreaController::class, 'CountryView'])->name('manage-country');

    Route::post('/country/store', [ShippingAreaController::class, 'CountryStore'])->name('country.store');

    Route::get('/country/edit/{id}', [ShippingAreaController::class, 'CountryEdit'])->name('country.edit');

    Route::post('/country/update', [ShippingAreaController::class, 'CountryUpdate'])->name('country.update');

    Route::get('/country/delete/{id}', [ShippingAreaController::class, 'CountryDelete'])->name('country.delete');
});



Route::post('/user/cash/order', [CashController::class, 'CashOrder'])->middleware(['auth'])->name('cash.order');



Route::post('/user/stripe/order', [StripeController::class, 'StripeOrder'])->middleware(['auth'])->name('stripe.order');





Route::get('/reservTable', [ReservationController::class, 'index'])->name('reservation1');

Route::post('/reservTable/store', [ReservationController::class, 'ReservationStore'])->name('reservation.store');

Route::get('/reservations/view', [ReservationController::class, 'indexView'])->name('reserv.view');


Route::get('/reservations/delete/{id}', [ReservationController::class, 'ReservationDelete'])->name('reserv.delete');




Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');

Route::get('admin/checkout/view', [AdminController::class, 'checkoutView'])->name('checkout.users');


Route::get('create-pdf-file', [PDFController::class, 'indexPdf'])->name('user.create.pdf');



// MultiLanguage



Route::get('/language/german', [LanguageController::class, 'German'])->name('german.language');

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');





Route::get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->middleware(['auth'])->name('dashboard');



Route::get('admin/dashboard', function () {
    // $id = Auth::admin()->id;
    // $user = Admin::find($id);
    return view('admin.admin_master');
})->middleware(['admin'])->name('admin.dashboard');



require __DIR__ . '/auth.php';
