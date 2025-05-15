<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    }
    

public static function redirectTo()
{
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return '/dashboard'; // or '/admin/dashboard'
        } elseif ($user->role === 'customer') {
            return '/profile'; // or wherever you want regular users to land
        }
    }

    return '/'; // fallback
}

}
