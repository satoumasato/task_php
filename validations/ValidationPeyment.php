<?php
class ValidationPeyment extends BaseValidation{
     function check($peyment_money){
        if(!$peyment_money){
            echo "金額を入力してください".PHP_EOL;
            return false;
        }
        if(!is_numeric($peyment_money)){
            echo "数値を入力してください".PHP_EOL;
            return false;
        }
        return true;
    }
}

 ?>
