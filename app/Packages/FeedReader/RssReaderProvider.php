<?php

namespace App\Packages\FeedReader;

use Illuminate\Support\ServiceProvider;

class RssReaderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('rss-reader', function ($app) {
            return new RssFeedReader($app);
        });
    }

}
