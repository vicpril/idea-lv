<?php

namespace Idea\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;
use DB;
use Idea\Http\ViewComposers\HeaderComposer;

use Idea\Models\Article;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Article::observe(\Idea\Observers\ArticleObserver::class);

        //for watching SQL-query
        DB::listen(function($query) {
            // dump($query->sql) ;
            // dump(request()->session());
            // dump(app()->getLocale());
        });

        // create custom directive for blade: @set($i,10)
        Blade::directive('set', function($exp) {
            list($name, $val) = explode(',', $exp);
            return "<?php $name = $val; ?>";
        });

        view()->composer('back/layout', HeaderComposer::class);

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
