<?php
return [
    'name' => "WDC",
    'title' => "Welcome to WDC",
    'subtitle' => 'Find resources close to you',
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

