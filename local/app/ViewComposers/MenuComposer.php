<?php

namespace App\ViewComposers;
use App\Category;
use App;
use Illuminate\Contracts\View\View;

class MenuComposer
{

  /**
   * Compose the view with the following variables bound to it
   * @param  View $view The View
   * @return null
   */
  public function compose(View $view)
  {

    $categories = Category::all();
    $cook = App::make('\App\Libs\Cookies')->get();
    $cook = unserialize($cook);
    $view->with('categories', $categories)->with('cook', $cook);
  }

}
