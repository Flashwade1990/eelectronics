<?php

namespace App\Http\Controllers;
use App\Product;
use Entrust\Role;
use \Request;
use App\Category;
use \Input;
use \Image;
use Validator;
class ProductsController extends Controller
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
   public function index()
  {
    return view('products.index', array('products' => Product::paginate(20)));
  }
  
  public function edit($id = null)
  {
    $product = $id ? Product::find($id) : new Product();
    if ($product) {
      return $this->showLayout($product);
    } else {
      abort(404);
    }
  }
    
  public function store()
  {
    $id = Request::input('id');
    $product = $id ? Product::find($id) : new Product();
    if ($product) {
      try {
        $product->store(Request::all());
        return \Redirect::to('products/edit/' . $product->id . '?success=1');
      } catch(\Exception $e) {
        return $this->showLayout($product, $product->validation_errors);
      }
    } else {
      abort(404);
    }
  }
  
  public function destroy()
  {
    $id = Request::input('id');
    $product = Product::find($id)->delete();

    File::delete('local/media/images/products/' . $product->image);
    if ($product) {
      $product->delete();
    }
  }
  
  protected function showLayout(Product $product, $errors = array())
  {
    $roles = Role::lists('name', 'id');
    $view = view('products.edit', array('product' => $product, 'roles' => $roles, 'success' => Request::input('success', 0)));
    if (count($errors)) {
      $view->with('errors', $errors);
    }
    return $view;
  }

}
