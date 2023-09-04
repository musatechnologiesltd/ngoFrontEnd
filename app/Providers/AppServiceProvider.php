<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\NgoTypeAndLanguage;
use Auth;
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
        if(\Illuminate\Support\Facades\Schema::hasTable('ngo_type_and_languages')){



             //compose all the views....
    view()->composer('*', function ($view)
    {
        $localNgoTypem = NgoTypeAndLanguage::where('user_id',Auth::user()->id)
            ->where('ngo_type','দেশিও')->value('ngo_type_new_old');


            $foreignNgoType = NgoTypeAndLanguage::where('user_id',Auth::user()->id)
            ->where('ngo_type','Foreign')->value('ngo_type_new_old');



        $view->with('localNgoTypem', $localNgoTypem );
        $view->with('foreignNgoType', $foreignNgoType );
    });







        }else{

            $localNgoTypem = 0;


            $foreignNgoType = 0;

            view()->share('localNgoTypem', $localNgoTypem);
            view()->share('foreignNgoType',  $foreignNgoType);

        }

        //dd($foreignNgoType);


    }
}
