<?php

namespace App\Models;


class Post 
{
    private static $blog_post = [
    [
        "title" => "Judul post pertama",
        "author" => "Muhamad anhar",
        "slug" => "post-pertama",
        "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus eius assumenda debitis 
        autem odio. Accusantium doloremque dolore iure ea molestiae facere aliquid illum fugiat ipsa! At 
        accusamus natus blanditiis sapiente, cumque voluptas quidem impedit iste dignissimos, doloribus aut 
        deleniti suscipit eaque pariatur quaerat dicta officia culpa ex quibusdam assumenda sint obcaecati 
        est necessitatibus odit? Dolorum debitis corrupti fugiat iure? Facilis ad reprehenderit facere omnis, 
        fuga qui porro nihil aspernatur consectetur perspiciatis accusantium nisi impedit! Sunt earum vel 
        harum rerum fugiat."
    ],
    [
        "title" => "Judul post anhar",
        "author" => "budi",
        "slug" => "post-kedua",
        "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus eius assumenda debitis 
        autem odio. Accusantium doloremque dolore iure ea molestiae facere aliquid illum fugiat ipsa! At 
        accusamus natus blanditiis sapiente."
    ],
];

public static function all(){
    return collect(self::$blog_post);
}

public static function find($slug)
{
    $post = static::all();

    return $post->firstWhere('slug', $slug);
}
}
