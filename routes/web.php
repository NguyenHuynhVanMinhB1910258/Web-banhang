<?php
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\SocialController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FirmController;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\firm;
use App\Models\products;

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
  
Route::prefix('admin')->middleware('isAdmin')->group(function(){
    Route::get('/', function () {
         return view('admin');
    });
    Route::get('/add_product',[FirmController::class,'add_product_index']);
    Route::post('/add_product_after',[ProductController::class,'add_product']);
    Route::get('/products-show',[ProductController::class,'show_product']);
    Route::post('/edit_product',[ProductController::class,'edit_product']);
    Route::get('/delete/{id}',[ProductController::class,'delete_product']);
    Route::get('/firms-show',[FirmController::class,'firm_table']);
    Route::post('/firms-show/add',[FirmController::class,'firm_add']);
    Route::post('/firms-show/edit',[FirmController::class,'firm_edit']);
});
Route::prefix('/')->middleware('Client')->group(function(){
    Route::get('showcart',[CartController::class,'showcart']);
    Route::get('removecart/r={id}',[CartController::class,'removecart']);
}); 
Route::get('addcart/c={id}',[CartController::class,'add']);

Route::get('/', function () {
    $firms=firm::all();
    return view('index',compact('firms'));
});
Route::get('/{price1}&{price2}', function ($price1,$price2) {
    $name = '$'.$price1.'-'.'$'.$price2;
    $firms=firm::all();
    $products=products::whereBetween('price',[$price1,$price2])->get();
    return view('search-product-price',compact('firms','products','name'));
});
Route::get('/firm-{name}', function ($name) {
    $firms=firm::all();
    $products=firm::where(['name'=>$name])->get();
    return view('search-product',compact('firms','products','name'));
});


Route::get('login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
Route::get('/forgot-password', function () {
    return view('forgot-password');
});


Route::get('/search/q={name}',[ProductController::class,'search']);
Route::get('/detail-{id}',[ProductController::class,'detail']);
Route::post('/login/user',[UserController::class, 'validate_login']);
Route::post('/registration/user',[UserController::class, 'validate_registration']);
Route::get('/logout',[UserController::class, 'logout']);