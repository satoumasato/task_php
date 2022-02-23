<?php
require_once('user_class.php');

class CheckId{
    static function check($my_id){
        if(!$my_id){
            echo "未入力です".PHP_EOL;
            return false;
        }
        if(!is_numeric($my_id)){
            echo "数字で入力してください".PHP_EOL;
            return false;
        }
        for($i = 1; $i <= count(User::$user_list); $i++){
            if($my_id === User::$user_list[$i]["id"]){

                return true;
            }
        }
        return false;
    }
}
 ?>
