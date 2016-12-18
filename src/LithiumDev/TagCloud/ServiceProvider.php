<?php
namespace LithiumDev\TagCloud;


use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider {
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('TagCloud', function ()
        {
            return $this->app->make('LithiumDev\TagCloud\TagCloud');
        });

        // Shortcut so developers don't need to add an Alias in app/config/app.php
        $this->app->booting(function ()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('TagCloud', 'LithiumDev\TagCloud\Facade\TagCloud');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['TagCloud'];
    }
}
