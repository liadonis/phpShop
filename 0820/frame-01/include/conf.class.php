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

/* =====大多數使用 array_key_exists 的地方，我們都可以用 isset 取代=============*/
    /*在 PHP 如果我們要判斷 array 裡面的 key 存不存在，直覺想到使用的函式是 array_key_exists。像下面這樣，判斷 $arr 裡面有沒有名叫 k 的 key 存在︰

    array_key_exists('k', $arr)

    而大多數使用 array_key_exists 的地方，我們都可以用 isset 取代。也就是將下面第一行更改為第二行︰

    array_key_exists('k', $arr)

    isset($arr['k'])

    按照 40 Tips for optimizing your php code 的說法， isset 是一種語言結構，不是 function ，會跑得比 function 快。所以 isset 的效能會比 array_key_exists 好。

    但需注意 isset 和 array_key_exists 還是不一樣的東西。在 array 裡的值為 null 的情況， isset 會回傳 false ，但 array_key_exists 會回傳 true ︰

    $arr['k'] = null;
    var_dump(array_key_exists('k', $arr)); // bool(true)
    var_dump(isset($arr['k'])); // bool(false)
    有時我們也會在自己不知覺的情況，塞了 null 值到 array 裡面。例如下面這樣，在第一行 PHP 發現 $arr['k'] 不存在，就去建立 $arr['k'] 並且設定初始值為 null ︰

    $ref =& $arr['k'];
    var_dump(array_key_exists('k', $arr)); // bool(true)
    var_dump(isset($arr['k'])); // bool(false)
    所以你可以自己判斷 array 裡的值為 null 的情況對你來說有沒有影響，沒有影響的話建議把 array_key_exists 改成 isset 吧！

    /*=================================================*/
/* =====大多數使用 array_key_exists 的地方，我們都可以用 isset 取代=============*/



    //用魔術方法，讀取(protected)data內的訊息
    public function __get($key){
        //判斷陣列內是否有此值
//        if(array_key_exists($key,$this->data)){
//            return $this->data[$key];
//        }else{
//            return null;
//        }
        if(isset($this->data[$key])){
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


















