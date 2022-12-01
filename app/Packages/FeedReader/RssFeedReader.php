<?php

namespace App\Packages\FeedReader;

use Illuminate\Contracts\Container\Container;

class RssFeedReader
{
    private $app;

    private $rss;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }


    public function read($url)
    {
        $rss = simplexml_load_file($url);
        $this->rss = $rss;

        return $this;
    }

    public function channel()
    {
        return $this->rss->channel;
    }

    public function items()
    {
        return $this->channel()->item;
    }
}
