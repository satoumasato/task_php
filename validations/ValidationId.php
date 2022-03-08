<?php
require_once('user_class.php');

class ValidationId extends BaseValidation{
    static function check($my_id){
        User::is_exist($my_id);
    }
}


 ?>
