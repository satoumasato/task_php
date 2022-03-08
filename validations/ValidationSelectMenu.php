<?php
class ValidationSelectMenu extends BaseValidation{

     function check($select){

        if($select === ATM::BALANCE){
            return true;
        }
        if($select === ATM::WITHDRAW){
            return true;
        }
        if($select === ATM::PEYMENT){
            return true;
        }
        if(!$select){
            echo "メニューを入力してください".PHP_EOL;
            return false;
        }
        if(!is_numeric($select)){
            echo "数字で入力してください".PHP_EOL;
            return false;
        }
        return false;
    }
}

 ?>
