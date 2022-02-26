<?php

class CheckWithDraw{
    public $user_balance;

    function set_balance($balance){
        $this->user_balance=$balance;
    }
    function check($withdraw_money){
        if(!$withdraw_money){
            echo "金額を入力してください".PHP_EOL;
            return false;
        }
        if(!is_numeric($withdraw_money)){
        echo "数字で入力してください".PHP_EOL;
        return false;
        }
        return true;
    }


}






 ?>
