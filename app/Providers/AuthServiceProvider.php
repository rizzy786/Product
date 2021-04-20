<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //makes parameter optional
        Gate::define('select-product', function (?User $user){
            return true; //user has to be logged in
        });
        
        Gate::define('purchase-product', function (User $user, Product $product){
            
            if($product->outOfStock()) return false;
            
            return !$user->is_admin; //returns true if not admin
        });
        
        Gate::define('edit-product', function (User $user){
            return $user->is_admin; //returns true if admin
        });

        Gate::define('delete-product', function (User $user){
            return $user->is_admin; //returns true if admin
        });
        
          Gate::define('add-product', function (User $user){
            return $user->is_admin; //returns true if admin
        });
        
        Gate::define('view-cart', function (User $user){
            return !$user->is_admin; //returns true if admin
        });   
    }
}
