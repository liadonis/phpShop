<?php


/* 文件內容的讀取與寫入  */

//要求：把a.txt的內容讀出來，賦給一個$str變量



/* file_get_contents() 可以獲取一個文件的內容或一個網路資源的內容
file_get_contents() 是讀文件/讀網路比較快捷的一個函數
幫我們封裝了打開/關閉等操作

但是--小心 這個函數一次性把文件的內容全部讀出來，放在內存中
因此，工作中，處裡上百M的大文件，慎用此函數
 */


/*註: file_get_contents 要獲取的文件如果不存在，會報warning*/
$file = './a.txt';
$str =  file_get_contents($file);
//exit;
/*
//此函數可以讀網路資源
$url = 'http://www.appledaily.com.tw/appledaily/article/headline/20160821/37354840/%E5%BB%BA%E4%B8%AD%E6%98%8E%E5%B9%B4%E6%8B%9B%E5%A5%B3%E7%94%9F';
echo file_get_contents($url);
*/

/*讀出來的內容，能否寫到另一個文件裡去呢?
//
file_put_contents(); 這個函數用來把內容寫入到文件
也是一個快捷函數，幫我們封裝打開寫入關閉的細節
註:如果指定的文件不存在，則會自動創建
*/
file_put_contents('./b.txt',$str);

/*
 * 最簡單的小偷程序
 *
 *
 * */

$url = 'http://www.appledaily.com.tw/actionnews/appledaily/new/20160706/901565/';

$html = file_get_contents($url);
if (file_put_contents('163news.html',$html)){
    echo '偷來了';
}else{
    echo '被抓了';
}





