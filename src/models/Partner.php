<?php 
namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;

/**
 * Partner
 */
class Partner extends Datalayer
{     
     /**
      * __construct
      *
      * @return void
      */
     function __construct() {
        parent::__construct("partner", [
            "imei",
            "capable"
        ], 'id_partner', true);
    }
}