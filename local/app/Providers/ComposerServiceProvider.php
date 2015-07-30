<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\SiteComposer;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {

       
    }

    /**
     * Register
     *
     * @return void
     */
    public function register()
    {
         View::composers(['App\Http\ViewComposers\SiteComposer' => '*',
            'App\ViewComposers\MenuComposer' => '*',
            'App\ViewComposers\CurrencyComposer' => '*']);
    }

}