<?php

namespace App\Http\Controllers;
use App\Product;
use \Input;
use Cookie;
use App;
use App\Cart;
use Redirect;
use Request;

class CartController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
   */

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    
  }

  /**
   * Show the application dashboard to the user.
   *
   * @return Response
   */
 
  public function show(){
            $products = Product::All();
      return view('templates.cart', compact('products'));
  }

  public function index()
  {
        $products = Product::All();
$cook = App::make('\App\Libs\Cookies')->get();     
$cook = unserialize($cook);
    $shipping = 1;
  return view('templates.cart', compact('products', 'cook', 'shipping'));
  }

  public function add(){
  $id = (int)$_POST['id'];
  $cook = App::make('\App\Libs\Cookies')->get();
  $items = Cart::All();
  $quantity = (int)$_POST['quantity'];
  $prods = Product::findOrFail($id);
  $cook = unserialize($cook);
  $products = Product::All();
return Redirect::to('cart')->withCookie(cookie($id, $quantity, 3500));
  }

  public function count(){ 
    $shipping = 1;
        $items = Cart::All();
        $cook = App::make('\App\Libs\Cookies')->get();
      if(Request::input('phone')){
    $cart = new Cart();
    $cart->order = $cook;
    $cart->status = 'New';
    $cart->phone = Request::input('phone');
    $cart->email = Request::input('email');
    $cart->save();
     }
         $products = Product::All();
       $cook = unserialize($cook);
 foreach($_COOKIE as $key => $value){
         $key = (int)$key;
         if($key > 0){
         $tempCookie = Cookie::forget($key);
         return Redirect::to('cart/count')->withCookie($tempCookie);
         }
      }
    return response()->view('templates.count', compact('products', 'cook', 'items', 'shipping', 'cart'));
  }

  public function currency($id){
    return Redirect::back()->withCookie(cookie('currency', $id, 3500));
  }

  public function prep(){
    return redirect::to('cart');
  }

  public function delete($id){
    $cookie = Cookie::forget($id);
     return redirect::to('cart')->withCookie($cookie);
  }
}