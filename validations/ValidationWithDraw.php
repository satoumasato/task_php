<?php

class ValidationWithDraw{
    public $user_balance;
    public $eroor;
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
        if($withdraw_money > $this->user_balance){
            echo "出金額が残高を超えているので出金できません".PHP_EOL;
            return false;
        }
        return true;
    }

}






 ?>
