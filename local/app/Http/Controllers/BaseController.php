<?php

namespace App\Http\Controllers;
use App\Product;
use \Input;
use DB;
use App;
use App\Feature;
use App\Category;
use \Mail;
use Request;
use App\Email;
class BaseController extends Controller
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
  public function index()
  {
    $products = Product::all();
    $reviews = Feature::all();
    return view('templates.index', compact('products', 'reviews'));
  }

    public function onecat($id2){
     $category = Category::findorFail($id2);
    $prods = Product::where('category_id', '=', $id2)->paginate(16);
    return view('templates.onecat', compact('category', 'prods'));
  }

  public function single($id, $id2)
  {
    $products = Product::findorFail($id2);
    $prods = Product::All();
      $category = Category::findorFail($id)->id;
      $cat_name = Category::findorFail($id)->name;
    return view('templates.single', compact('products', 'prods', 'th', 'category', 'cat_name'));
  }

  public function cart()
  {
    $products = Product::All();
    return view('templates.cart', compact('products'));
  }

  public function contacts()
  {
    $product = Product::all();   

    return view('templates.contacts', compact('product'));
  }

  public function getSearch(){
    $keyword = Input::get('keyword');
    $product = Product::all();
    $search = Product::where('title', 'LIKE', '%' . $keyword . '%')->paginate(16);
    return view('templates.search')->with('products', Product::where('title', 'LIKE', '%' . $keyword . '%')->paginate(16))
          ->with('keyword', $keyword)->with('product', $product)->with('search', $search);
  }

  public function review($product_id, $product_id2){
    if(Request::input('name')){
          $feature = new Feature();
      $feature->product_id = $product_id2;
     $feature->name = Request::input('name');
    $feature->email = Request::input('email');
    $feature->rate = Request::input('rate');
    $feature->review = Request::input('review');
    $feature->save();
   
    return redirect('catalog/'.$product_id.'/'.$product_id2.'/review');
  }
  $prods = Product::all();
  $products = Product::findOrFail($product_id2);
  $reviews = Feature::where('product_id', '=', $product_id2)->orderBy('created_at', 'DESC')->get();
  $product = Product::all();
  $category = Category::findorFail($product_id)->id;
  $cat_name = Category::findorFail($product_id)->name;
return view('templates.review', compact('prods', 'products', 'reviews', 'product', 'category', 'cat_name'));
  }

  public function mail(){
        $to = Request::input('email');
    Mail::send('emails.subscribe', array('key' => 'value'), function($message)
{

    $message->to(Request::input('email'), 'eElectronics')->subject('Подписка');
});
    $email = new Email;
    $email->email = $to;
    $email->save();
    return redirect('/')->with('message', 'Подписка активирована');
  }
}
