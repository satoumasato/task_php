<?php
class ValidationAgain{
    static function check($again_select){
        if(!is_numeric($again_select)){
            echo "数字で入力してください".PHP_EOL;
            return false;
        }
        if($again_select === ATM::AGAIN){
            return true;
        }
        if($again_select === ATM::NO_AGAIN){
            return true;
        }
        echo "０か９で入力してください".PHP_EOL;
        return false;
    }

    }

 ?>
