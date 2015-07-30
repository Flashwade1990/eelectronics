<?php

use Illuminate\Database\Seeder;
use App\Category;
use Entrust\Role;

class CategoryTableSeeder extends Seeder
{

  public function run()
  {

     Category::create([
        'name' => 'Мобильные телефоны',
    ]);
    
    Category::create([
        'name' => 'Телевизоры',       
    ]);

    Category::create([
        'name' => 'Ноутбуки',
    ]);

    Category::create([
        'name' => 'Планшеты',
    ]);

    Category::create([
        'name' => 'Фотоаппараты',
    ]);

    Category::create([
        'name' => 'Электронные книги',
    ]);

  }

}
