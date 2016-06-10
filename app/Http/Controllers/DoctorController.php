<?php

namespace App\Http\Controllers;

use App\Jobs\DoctorIndexData;
use App\Http\Requests;
use App\Post;
use App\Services\RssFeed;
use App\Services\SiteMap;
use App\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctor = $request->get('doctor');
        $data = $this->dispatch(new DoctorIndexData($doctor));
        $layout = $doctor ? Doctor::layout($doctor) : 'doctor.layouts.ifndex';

        return view($layout, $data);
    }

    public function showPost($slug, Request $request)
    {
        $post = Post::with('doctors')->whereSlug($slug)->firstOrFail();
        $doctor = $request->get('doctor');
        if ($doctor) {
            $doctor = Doctor::whereDoctor($doctor)->firstOrFail();
        }

        return view($post->layout, compact('post', 'doctor'));
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
