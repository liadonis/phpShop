<?php


/*判斷文件是否存在
 * 獲取文件的創建時間/修改時間
 * */

$file = 'custom.txt';
if (file_exists($file)){
    echo $file.'存在</br>';
    echo '上次修改時間是:'.date('Y-m-d H:i:s',filemtime($file));
}else{
    echo $file.'不存在</br>';

}