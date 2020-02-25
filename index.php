<?php

class Post {
   public $title;
   public $published;

   public function __construct($title, $published){
      $this->title = $title;
      $this->published = $published;
   }
}

$postsArray = [
   [ "title" => "My first post", "published" => true ],
   [ "title" => "My second post", "published" => true ],
   [ "title" => "My third post", "published" => true ],
   [ "title" => "My fourth post", "published" => false ]
];

$postsClassArray = [
   new Post("My First Post", true),
   new Post("My Second Post", true),
   new Post("My Third Post", true),
   new Post("My Fourth Post", false)
];

// array_filter takes in the array first and then the callback
// returns an item if the result is true
$unpublishedPosts = array_filter($postsClassArray, function($post){
   return !$post->published;
});

// array_map takes in the callback first and then the array
// returns the array items as modified by the callback
$publishedPosts = array_map( function($post){
   if(!$post->published){
      $post->published = "Frank";
   }
   return $post;
}, $postsClassArray);

// another way of doing the same thing
$arrayColumn = array_column($postsClassArray,"title");

var_dump($arrayColumn);

require "index.view.php";