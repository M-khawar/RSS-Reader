<?php

namespace App\Http\Controllers;

use App\Models\NewsFeed;
use App\Packages\FeedReader\RssReader;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        $feeds = NewsFeed::latest()->paginate(15);

        if (count($feeds) <= 0){
            return $this->store();
        }

        return view('welcome', compact('feeds'));
    }

    public function store()
    {
        $f = RssReader::read('https://news.google.com/news/rss');

        $rssFeeds = array();
        foreach ($f->items() as $item) {
            $node = array(
                'title' => $item->title,
                'link' => $item->link,
                'pub_date' => $item->pubDate,
                'description' => implode(' ', array_slice(explode(' ', $item->description), 0, 40))
            );

            array_push($rssFeeds, $node);

            NewsFeed::create($node);
        }

        return redirect()->route('home');
    }
}
