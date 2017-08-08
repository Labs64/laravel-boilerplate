<?php

namespace App\Providers;

use App\Helpers\Meta\Meta;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class MetaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('meta', function () {
            return new Meta();
        });

        /**
         * Set Meta Defaults
         */
        $this->setDefaultMeta();

        /*
        * The block of code inside this directive indicates
        * the chosen javascript variables.
        */
        Blade::directive('meta', function ($argument = null) {
            return '<?php print app(\'meta\')->render(' . $argument . '); ?>';
        });
    }

    /**
     *
     * Set default meta
     *
     */
    protected function setDefaultMeta()
    {
        /** @var  $meta Meta */
        $meta = app('meta');

        //Title
        $meta->title()->set(config('meta.defaults.title'));

        //Tags
        $meta->tag('description', config('meta.defaults.description'));
        $meta->tag('keywords', config('meta.defaults.keywords'));
        $meta->tag('author', config('meta.defaults.author'));
        $meta->tag('copyright', config('meta.defaults.copyright'));
        $meta->tag('robots', config('meta.defaults.robots'));

        //OG
        $meta->property('og:title', config('meta.defaults.og.title'));
        $meta->property('og:image', config('meta.defaults.og.image'));
        $meta->property('og:description', config('meta.defaults.og.description'));
        $meta->property('og:type', config('meta.defaults.og.type'));
        $meta->property('og:site_name', config('meta.defaults.og.site_name'));

        //Twitter
        $meta->tag('twitter:title', config('meta.defaults.twitter.title'));
        $meta->tag('twitter:image', config('meta.defaults.twitter.image'));
        $meta->tag('twitter:description', config('meta.defaults.twitter.description'));
        $meta->tag('twitter:card', config('meta.defaults.twitter.card'));
        $meta->tag('twitter:site', config('meta.defaults.twitter.site'));
        $meta->tag('twitter:creator', config('meta.defaults.twitter.creator'));

        //DC
        $meta->tag('DC.Title', config('meta.defaults.dc.title'));
        $meta->tag('DC.Description', config('meta.defaults.dc.description'));
        $meta->tag('DC.Subject', config('meta.defaults.dc.subject'));
        $meta->tag('DC.Identifier', config('meta.defaults.dc.identifier'));
        $meta->tag('DC.Creator', config('meta.defaults.dc.creator'));
        $meta->tag('DC.Publisher', config('meta.defaults.dc.publisher'));
        $meta->tag('DC.RightsHolder', config('meta.defaults.dc.rights_holder'));
        $meta->tag('DC.Type', config('meta.defaults.dc.type'));
        $meta->tag('DC.Format', config('meta.defaults.dc.format'));
        $meta->tag('DC.Language', config('meta.defaults.dc.language'));
        $meta->tag('DC.Rights', config('meta.defaults.dc.rights'));
        $meta->tag('DC.Audience', config('meta.defaults.dc.audience'));
    }
}
