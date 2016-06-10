<?php

namespace App\Http\Controllers;

use App\Jobs\RetailerIndexData;
use App\Http\Requests;
use App\Post;
use App\Services\RssFeed;
use App\Services\SiteMap;
use App\Retailer;
use Illuminate\Http\Request;

class RetailerController extends Controller
{
    public function index(Request $request)
    {
        $retailer = $request->get('retailer');
        $data = $this->dispatch(new RetailerIndexData($retailer));
        $layout = $retailer ? Retailer::layout($retailer) : 'retailer.layouts.index';

        return view($layout, $data);
    }

    public function showPost($slug, Request $request)
    {
        $post = Post::with('retailers')->whereSlug($slug)->firstOrFail();
        $retailer = $request->get('retailer');
        if ($retailer) {
            $retailer = Retailer::whereRetailer($retailer)->firstOrFail();
        }

        return view($post->layout, compact('post', 'retailer'));
    }

    public function rss(RssFeed $feed)
    {
        $rss = $feed->getRSS();

        return response($rss)
            ->header('Content-type', 'application/rss+xml');
    }

    public function siteMap(SiteMap $siteMap)
    {
        $map = $siteMap->getSiteMap();

        return response($map)
            ->header('Content-type', 'text/xml');
    }
}
