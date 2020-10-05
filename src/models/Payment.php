<?php 
namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

/**
 * Payment
 */
class Payment extends DataLayer
{     
     /**
      * __construct
      *
      * @return void
      */
     function __construct() {
        parent::__construct("posts", [
            "tipo",
            "id_transaction"
        ], 'id_payment', true);
    }
}