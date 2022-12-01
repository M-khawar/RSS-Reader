<?php

namespace App\Packages\FeedReader;

use Illuminate\Support\Facades\Facade;

/**
 * @method static RssFeedReader read($url)
 * @method static RssFeedReader channel()
 * @method static RssFeedReader items()
 */

class RssReader extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'rss-reader';
    }
}
