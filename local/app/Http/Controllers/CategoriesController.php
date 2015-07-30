<?php

namespace App\Http\Controllers;
use App\Category;
use Entrust\Role;
use \Request;
use App\Http\Controllers\Controller;
use \Input;
use Validator;


class CategoriesController extends Controller
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
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard to the user.
   *
   * @return Response
   */

  public function index()
  {
    return view('categories.index', array('categories' => Category::paginate(20)));
  }
  
  public function edit($id = null)
  {
    $category = $id ? Category::find($id) : new Category();
    if ($category) {
      return $this->showLayout($category);
    } else {
      abort(404);
    }
  }
    
  public function store()
  {
    $id = Request::input('id');
    $category = $id ? Category::find($id) : new Category();
    if ($category) {
      try {
        $category->store(Request::all());
        return \Redirect::to('categories/edit/' . $category->id . '?success=1');
      } catch(\Exception $e) {
        return $this->showLayout($category, $category->validation_errors);
      }
    } else {
      abort(404);
    }
  }
  
  public function destroy()
  {
    $id = Request::input('id');
    $category = Category::find($id);
    if ($category) {
      $category->delete();
    }
  }
  
  protected function showLayout(Category $category, $errors = array())
  {
    $roles = Role::lists('name', 'id');
    $view = view('categories.edit', array('category' => $category, 'roles' => $roles, 'success' => Request::input('success', 0)));
    if (count($errors)) {
      $view->with('errors', $errors);
    }
    return $view;
  }
}
