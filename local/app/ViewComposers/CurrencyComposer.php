<?php

namespace App\ViewComposers;
use Illuminate\Contracts\View\View;
use Request;
use Cookie;
use App\Currency;
class CurrencyComposer
{

  /**
   * Compose the view with the following variables bound to it
   * @param  View $view The View
   * @return null
   */
  public function compose(View $view)
  {
    if(Request::cookie('currency')){
    $currency = Cookie::get('currency');
    $value = Request::cookie('currency');
    if($value == 'byr'){
      $a = Currency::where('currency', '=', 'byr')->first();
      $currency = (int)($a->coeff);
      $b = Currency::where('sign', '=', 'BYR')->first();
      $sign = $b->sign;
      $menu = 'BYR';
    } elseif($value == 'eur') {
    $a = Currency::where('currency', '=', 'eur')->first();
    $currency = (int)($a->coeff);
    $b = Currency::where('sign', '=', '€')->first();
    $sign = $b->sign;
    $menu = 'EUR';
  } else {
    Cookie::forget('currency');
    $currency = 1;
    $sign = '$';
    $menu = 'USD';
  }
}

  else {
    $currency = 1;
    $sign = '$';
    $menu = 'USD';
  }
    $view->with('currency', $currency)->with('sing', $sign)->with('menu', $menu);
  }
  }

