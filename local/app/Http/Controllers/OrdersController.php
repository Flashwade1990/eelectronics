<?php

namespace App\Http\Controllers;
use App\Product;
use Entrust\Role;
use \Request;
use App\Category;
use \Input;
use \Image;
use Validator;
use App\Cart;
class OrdersController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard to the user.
   *
   * @return Response
   */
  public function getIndex(){
    $products = Product::all();
    $orders = Cart::where('status', '=', 'New')->get();
    return view('orders.index', compact('products', 'orders'));
  }

  public function postIndex(){
    $carts = Cart::all();
    return redirect('/adminka/orders');
  }

  public function postCreate(){
       $data = Input::all();
      $rules = array('title' => 'required',
        'description' => 'required',
        'price' => 'required',
        );
      $validator = Validator::make($data, $rules);
      if($validator->fails()){
        $errors = $validator->messages();
        return redirect('adminka/products')
        ->withErrors($validator);
      } else{
      $product = new Product;
      $product->category_id = Input::get('category_id');
      $product->title = Input::get('title');
      $product->description = Input::get('description');
      $product->price = Input::get('price');

      $image = Input::file('image');
      $filename = date('Y-m-d') . "-" . $image->getClientOriginalName();
      $path = asset('/media/images/products/' . $filename);
      Image::make($image->getRealPath())->resize(430, 550)->save($_SERVER['DOCUMENT_ROOT'] . '/media/images/products/' . $filename);
      $product->image = $filename;
      $product->save();
      return redirect('adminka/products')
      ->with('message', 'Product Created')->with('path');
    }
   
  }

  public function destroy(){
    $order = Cart::find(Input::get('id'))->delete();
    return redirect('adminka/sdfsdfproducts')
    ->with('message', 'Product Deleted');
  }

  public function view(){
    $products = Product::all();
    $orders = Cart::where('status', '!=', 'New')->get();
    return view('orders.old', compact('products', 'orders'));
  }
  public function changeMethod($id = null){
     if(Cart::find($id)->status == 'New'){
     $prod = Cart::find($id);
     $prod->status = 'Old';
     $prod->save();
    return redirect('adminka/orders/old');
  } else {
    $prod = Cart::find($id);
     $prod->status = 'New';
     $prod->save();
    return redirect('adminka/orders');
  }
}
}
