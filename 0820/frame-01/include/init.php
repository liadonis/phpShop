<?php

/* file init.php 作用:框架初始化 */


/*===============初始化當前的絕對路徑=================*/
//切掉右邊8個字符
//echo substr(str_replace('\\','/',__FILE__),0,-8);

//dirname()直接算出文件目錄的路徑
//'\' 反斜線換成 '/' 正斜線是因為 win跟linux都支援 '/' 正斜線，而linux不支援反斜線
define('ROOT',str_replace('\\','/',dirname(dirname(__FILE__))).'/') ;
echo ROOT;
define('DEBUG',true);

require (ROOT.'include/db.class.php');
require (ROOT.'include/conf.class.php');

//====================================================



/*=========過濾參數，用遞迴(Recursion) 的方式過濾$_GET,$_POST,$_COOKIE==========*/


//=============/*設置報錯級別*/=====================

//設定是否為debug模式
//define('DEBUG',true);

//判斷是否為debug模式並且做出相對應的動作
if (defined('DEGUG')){
    error_reporting(E_ALL);
}else{
    error_reporting(0);
}

//日記記錄功能


