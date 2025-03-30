<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Services\RoleViewManagement; //role viewer importje

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('weather.*', function ($view) {
            $view->with('formatConditions', function ($conditions) {
                if (!$conditions) return 'None';

                $formatted = [];
                if (substr($conditions, 0, 1) === '1') $formatted[] = 'Frost';
                if (substr($conditions, 1, 1) === '1') $formatted[] = 'Rain';
                if (substr($conditions, 2, 1) === '1') $formatted[] = 'Snow';
                if (substr($conditions, 3, 1) === '1') $formatted[] = 'Hail';
                if (substr($conditions, 4, 1) === '1') $formatted[] = 'Thunder';
                if (substr($conditions, 5, 1) === '1') $formatted[] = 'Tornado';

                return count($formatted) > 0 ? implode(', ', $formatted) : 'None';
            });
        });

        View::composer('layouts.app', function ($view) {
            $userRole = Auth::check() ? Auth::user()->user_role : null;
            $navItems = RoleViewManagement::getNavItems($userRole);
            $view->with('navItems', $navItems);
        });
    }
}
