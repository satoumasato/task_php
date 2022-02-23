<?php

class CheckWithDraw{
    static  $user_balance;

    public function check($withdraw_money){
        ATM::set_user_balance();
        echo "残金は".$balance."です".PHP_EOL;

    }


}
 ?>
