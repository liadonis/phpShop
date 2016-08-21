<?php

/*文件操作之
 * fopen
 * fread
 * fwrite
 * fclose
 * */

/*
 * fopen() 打開一個文件，返回一個資源
 * 第二個參數是"模式"，如只讀模式，讀寫模式，追加模式
 * 返回值：資源
 *
 *
 */
echo '<pre>';

$file = '163news.html';
$fh = fopen($file,'r');  //r只讀模式

//沿著上面返回的$fh這個資源通道來讀文件
echo  fread($fh,10);

//返回int(0)說明沒有成功寫入
//因為fopen()第二個參數選的是r
var_dump(fwrite($fh,'Hello'));

//關閉資源
fclose($fh);

$fh = fopen($file,'r+');//讀寫方式並把指針指向文件頭

//寫入成功 但要注意：從文件頭寫入時，是直接覆蓋相等字節的
echo fwrite($fh,'Hello');
fclose($fh);

echo '<hr>';

$fh = fopen('./modeW.txt','w'); //以寫入模式打開 fread讀不了，並把文件大小截為0(文件清空) 指針停於開頭處
fclose($fh);
echo '<hr>';

/*
 * a:追加模式打開，能寫，並且將指針停在文件最後
 *
 * */

$fh = fopen('./modeA.txt','a');
echo fwrite($fh,'Hello');
fclose($fh);


