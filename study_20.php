<?php
require_once('user_class.php');
require_once('/Users/masatosato/desktop/PHP/validations/BaseValidation.php');
require_once('/Users/masatosato/desktop/PHP/validations/ValidationAgain.php');
require_once('/Users/masatosato/desktop/PHP/validations/ValidationId.php');
require_once('/Users/masatosato/desktop/PHP/validations/ValidationWithDraw.php');
require_once('/Users/masatosato/desktop/PHP/validations/ValidationSelectMenu.php');
require_once('/Users/masatosato/desktop/PHP/validations/ValidationPeyment.php');

class ATM {

    const BALANCE = "1";
    const WITHDRAW = "2";
    const PEYMENT = "3";
    const AGAIN = "0";
    const NO_AGAIN = "9";

    public $user;
    public function  __construct(){
        $this->login();
    }

    public function login(){
        echo "idを入力してください".PHP_EOL;
        $my_id = trim(fgets(STDIN));
        $checked_user = ValidationId::check($my_id);

    if($checked_user === false){
        return $this->login();
    }
    /*userの情報を取得する関数を追加*/
    $user = User::get_user_data($my_id);

    echo "passwordを入力してください";
    $my_password = trim(fgets(STDIN));
    if($my_password === $user["password"]){
        $this->user=$user;
        return;
    }
    return $this->login();
    }

    public function main(){
        $this->select_menu();
        $this->again();
    }
    /*swith文で*/
    private function select_menu(){

        echo "こんにちは,残高照会(1),引き出し(2),入金(3)から選択してください".PHP_EOL;
        $select = trim(fgets(STDIN));
        $check_select = new ValidationSelectMenu();
        if($check_select->check($select) === false){
            echo $check_select->get_error_messages();
            return $this->select_menu();

        }
        switch($select){
            case self::BALANCE:
            $this->balance_menu();
            break;
            case self::WITHDRAW:
            $this->withdraw_menu();
            break;
            case self::PEYMENT:
            $this->peyment_menu();
            break;
        }
    }



    private function balance_menu(){
        echo "現在の残高は".$this->user["balance"]."円です".PHP_EOL;
    }

    private function withdraw_menu(){
        /*if文の修正,インデント修正*/
        if($this->user["balance"] === 0){
            echo "残高が０なので選択できません".PHP_EOL;
            return;
        }

        echo "いくら引き出しますか？".PHP_EOL;
        $withdraw_money = trim(fgets(STDIN));
        /*バリデーションのインスタンスを生成*/
        $check_withdraw = new ValidationWithDraw();
        $check_withdraw->set_balance($this->user["balance"]);

        if($check_withdraw->check($withdraw_money) === false){
            echo $check_withdraw->get_error_messages();
            return $this->withdraw_menu();
        }

        $this->user["balance"] -= $withdraw_money;
        echo $withdraw_money."円引き出します".PHP_EOL;
    }


    private function peyment_menu(){
        echo "入金額を入力してください".PHP_EOL;
        $peyment_money = trim(fgets(STDIN));
        $check_peyment = new ValidationPeyment();
        if($check_peyment->check($peyment_money) === false){
            echo $check_peyment->get_error_messages();
            return $this->peyment_menu();
            /*else修正*/
        }
        $this->user["balance"] += $peyment_money;
        echo $peyment_money."円入金しました";
    }


    private function again(){
        echo "操作を続けますか？続けるなら０、終了するなら９を入力してください".PHP_EOL;
        $again_select = trim(fgets(STDIN));
        $check_again = new ValidationAgain();
        if($check_again->check($again_select) === false){
            echo $check_again->get_error_messages();
            return $this->again();
        }
        if($check_again->check($again_select) === true){
            echo "操作を続けます".PHP_EOL;
            return $this->main();
        }
            if($again_select === self::NO_AGAIN){
                echo "操作を終了します".PHP_EOL;
                return;
            }
        }
    }



$atm = new ATM();
$atm->main();



?>
