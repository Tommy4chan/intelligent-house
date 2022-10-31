<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('routeactive', function($route){
            return "<?php echo Route::currentRouteNamed($route) ?  'choosed' : '' ?>";
        });

        Blade::directive('isPositive', function($value){
            return "<?php echo $value == 1 ?  'positive' : 'negative' ?>";
        });
    }
}
