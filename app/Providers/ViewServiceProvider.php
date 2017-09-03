<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Return specified value if argument is true
         *
         * @param  mixed $if          value to check
         * @param  mixed $returnTrue  value to return when $if is true
         * @param  mixed $returnFalse value to return when $if is false
         * @return mixed 
         */
        View::share('return_if', function($if, $returnTrue, $returnFalse = null){
            return $if ? $returnTrue : $returnFalse;
        });

        /**
         * Return specified value if arguments are equals, when first is equal second
         *
         * @param  mixed $value1      first value to compare
         * @param  mixed $value2      second value to compare
         * @param  mixed $returnTrue  value to return when above equals
         * @param  mixed $returnFalse value to return when otherwise
         * @return mixed 
         */
        View::share('return_if_equals', function($value1, $value2, $returnTrue, $returnFalse = null){
            return $value1 == $value2 ? $returnTrue : $returnFalse;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
