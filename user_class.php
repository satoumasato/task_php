<?php
class User {
    static $user_list = array(
        1 => array(
            "id" => "1",
            "password" => "1234",
            "name" => "tanaka",
            "balance" => "500000"
        ),
        2 => array(
            "id" => "2",
            "password" => "3456",
            "name" => "suzuki",
            "balance" => "1000000"
        )
    );

    static function is_exist($my_id){
        if(!$my_id){
            echo "未入力です".PHP_EOL;
            return false;
        }
        if(!is_numeric($my_id)){
            echo "数字で入力してください".PHP_EOL;
            return false;
        }
        for($i = 1; $i <= count(self::$user_list); $i++){
            if($my_id === self::$user_list[$i]["id"]){
                /*返り値をtrueに変更*/
                return true;
            }
        }
        return false;
    }
    /*関数を追加*/
    static function get_user_data($my_id){
        for($i = 1; $i <= count(self::$user_list); $i++){
            if($my_id === self::$user_list[$i]["id"]){
                return self::$user_list[$i];
            }
        }
    }

    
}



 ?>
