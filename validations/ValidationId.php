<?php
require_once('user_class.php');

class ValidationId{
    static function check($my_id){
        User::is_exist($my_id);
    }
}


 ?>
