<?php

    namespace App\Providers;

    use Illuminate\Cache\RateLimiting\Limit;
    use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\RateLimiter;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Config;

    class RouteServiceProvider extends ServiceProvider
    {
        /**
         * This namespace is applied to your controller routes.
         *
         * In addition, it is set as the URL generator's root namespace.
         *
         * @var string
         */
        protected $namespace = 'App\Http\Controllers';

        /**
         * The path to the "home" route for your application.
         *
         * Typically, users are redirected here after authentication.
         *
         * @var string
         */
        public const HOME = '/home';

        /**
         * Define your route model bindings, pattern filters, and other route configuration.
         *
         * @return void
         */
        public function boot()
        {
            $this->configureRateLimiting();

            $request = Request::capture();

            $locale = $request->segment(1);
            $df_locale = Config::get('app.default_language');
            $languages =  Config::get('app.languages', []);
            unset($languages[$df_locale]);
            $locale = array_key_exists($locale, $languages) ? $locale : null;


            $this->routes(function () use ($locale) {
                Route::middleware('api')
                    ->prefix('api')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/api.php'));

                Route::middleware('web')
                    ->prefix($locale)
                    ->namespace($this->namespace)
                    ->group(base_path('routes/web.php'));
            });
        }

        /**
         * Configure the rate limiters for the application.
         *
         * @return void
         */
        protected function configureRateLimiting()
        {
            RateLimiter::for('api', function (Request $request) {
                return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
            });
        }
    }
