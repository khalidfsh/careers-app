<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        // if (config('app.env') === 'production') {
        //     \URL::forceScheme('https');
        // }
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }
        
        // Custom Blade directive for joining arrays with a specified delimiter
        Blade::directive('joinArray', function ($expression) {
            list($array, $delimiter) = explode(',', $expression);
            return "<?php echo implode($delimiter, $array); ?>";
        });

        // Gates and Roles; Owner = 9, Admin = 8, viewer = 5, User = 1
        Gate::define('manage_roles', function ($user) {
            return $user->role_id == 9;
        });

        Gate::define('manage_jobs', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('view_resumes', function ($user) {
            return $user->isViewer();
        });

        Gate::define('manage_users', function ($user) {
            return $user->isAdmin();
        });
        
    }
}