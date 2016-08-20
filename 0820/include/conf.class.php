<?php


/* file conf.class.php  配置文件讀寫class  */

class conf {

    protected static $ins = null;
    protected $data = array();

    final protected function __construct() {

        //一次性把配置文件訊息，讀過來，賦給data屬性，這樣之後就不再管配置文件了
        //之後若要讀取配置的值，直接從data 屬性找
        include(ROOT.'include/config.inc.php');
        $this->data = $_CFG;
    }

    final protected function __clone() {

    }

    //單例的應用
    public static function getIns(){
        //判斷是否為自身的實例
        if (self::$ins instanceof self){
            return self::$ins;
        }else{
            self::$ins = new self();
            return self::$ins;
        }
    }

//判斷陣列內是否有此值範例
//$search_array = array('first' => 1, 'second' => 4);
//if (array_key_exists('first', $search_array)) {
//echo "The 'first' element is in the array";
//}

    //用魔術方法，讀取(protected)data內的訊息
    public function __get($key){
        //判斷陣列內是否有此值
        if(array_key_exists($key,$this->data)){
            return $this->data[$key];
        }else{
            return null;
        }

    }

    //用魔術方法，在程式運行的時候，動態增加或改變配置選項
    public function __set($key,$value){

        $this->data[$key] = $value;

    }


}

$conf = conf::getIns();

/****
//已經能把配置文件的訊息，讀取到自身的data 屬性中存儲起來
//var_dump($conf);
//print_r($conf);

//讀取選項
echo $conf->host.'</br>';
echo $conf->user.'</br>';
echo $conf->pwd.'</br>';
var_dump($conf->template_dir);
//動態追加選項
$conf->template_dir = 'C:\xampp\htdocs\phpShop\www\smarty';
echo $conf->template_dir;
****/


















