<?php 
namespace Source\Models;
use Source\Models\User;

/**
 * Partner
 */
class Partner extends User
{     
     /**
      * __construct
      *
      * @return void
      */
     function __construct() {
        parent::__construct("partner", [
            "creator",
            "capable"
        ], 'id_partner', true);
    }
}