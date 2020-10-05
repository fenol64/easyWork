<?php 
namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Posts
 */
class Posts extends DataLayer
{     
     /**
      * __construct
      *
      * @return void
      */
     function __construct() {
        parent::__construct("posts", [
            "post_head",
            "post_body",
            "categories",
            "professional"
        ], 'id_post', true);
    }
}