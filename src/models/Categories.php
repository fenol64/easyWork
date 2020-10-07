<?php 
namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Categories
 */
class Categories extends DataLayer
{     
     /**
      * __construct
      *
      * @return void
      */
      
     function __construct() {
        parent::__construct("categories", ["name_category"], 'id_category', true);
    }
}