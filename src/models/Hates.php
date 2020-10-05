<?php 
namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Hates
 */
class Hates extends DataLayer
{     
     /**
      * __construct
      *
      * @return void
      */
     function __construct() {
        parent::__construct("hates", [
            "id_post",
            "id_user_giving",
            "id_user_receiving",
            "hate_value"
        ], 'id_hate', true);
    }
}