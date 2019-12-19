<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use App\Service\BookService;



class RepositoryServiceProvider extends ServiceProvider
{
    
    public $bindings = [
        
        
    ];
    
    public $singletons = [
        //BookService::class => BookService::class,
        
    ];
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
