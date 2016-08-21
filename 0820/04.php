<?php


/*
 * 用文件操作函數
 * 來批量處裡客戶名單
 *
 * */

$file = './custom.txt';

/*第一種方法，簡便快捷暴力的方法
file_get_contents獲取內容
再用\r\n切成數組
注意:各操作系統下，換行符並不一致
win: \r\n
unix: \n
mac: \r
//*/
//$cont = file_get_contents($file);
////下面這個用\n區分通用性並不好
//print_r(explode("\n",$cont));

/*第二種，打開，一點點的讀，每次讀一行
 * fgets();每次讀一行
 *
 * */

//模式裡面可以加b，表示已2進制來處理，不受編碼的干擾
//$fh = fopen($file,'rb');
/*
 *echo fgets($fh)."</br>";
 * echo fgets($fh)."</br>";
 *  echo fgets($fh)."</br>";
 * */

//$fh = fopen($file,'rb');
////因為文件的指針一直在往後移動
////feof ,end of file 的意思
////專門用來判斷指針是否已經走到結尾
//while (!feof($fh)){
//    echo fgets($fh)."</br>";
//}

/*第三種，也是比較暴力的辦法
 * file()函數，直接讀取文件內容，並且按行拆成數組，返回該數組
 *
 * 和file_get_contents的相同之處:一次性讀入大量文件，慎用
 * */

$arr = file($file);
print_r($arr);