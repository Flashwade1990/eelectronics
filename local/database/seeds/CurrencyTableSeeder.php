<?php

use Illuminate\Database\Seeder;
use App\Currency;
use Entrust\Role;

class CurrencyTableSeeder extends Seeder
{

  public function run()
  {

     Currency::create([
        'currency' => 'byr',
        'coeff' => 14400,
        'sign' => 'BYR',
    ]);

     Currency::create([
        'currency' => 'eur',
        'coeff' => 1.1,
        'sign' => '€',
    ]);
    
  }

}
