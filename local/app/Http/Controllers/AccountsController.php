<?php

namespace App\Http\Controllers;
use App;
use App\Product;
use App\Wishlist;
use Redirect;
use DB;
use App\Category;
use Input;
class AccountsController extends Controller
{
   public function __construct()
  {
    $this->middleware('auth');
  }
 public function index(){
 	$product = Product::all();
 	return view('templates.account', compact('product'));
 }
 public function wishlist(){
 	$product = Product::all();
 	$products = Wishlist::all();

 	return view('templates.wishlist', compact('product', 'products'));
 }


  public function add($id){
 	$product = Product::all();
 	$prod = Product::findOrFail($id);
 	$q = Wishlist::where('product_id', '=', $prod->id);
 	if(!$q->count()){
 	$wishlist = new Wishlist();
 	$wishlist->product_id = $prod->id;
 	$wishlist->save();
 }
 	return redirect::back()->with('message', 'Продукт был добавлен в "Избранное"');

 }


 	 public function delete($id){
 	 	$product = Product::all();
 	 	$prod = Product::findOrFail($id);

        $wishlist = Wishlist::where('product_id', '=', $prod->id)->delete();
    
    return redirect::to('/account/wishlist');
  }



}
