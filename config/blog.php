<?php
return [
    'name' => "WDC",
    'title' => "Welcome to WDC",
    'subtitle' => 'A clean site written in Laravel 5.1',
    'description' => 'This is my meta description',
    'author' => 'WDC',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 10,
    'rss_size' => 25,
    'contact_email' => env('MAIL_FROM'),
    'uploads' => [
        'storage' => 'local',
        'webpath' => '/uploads/',
    ],
];

