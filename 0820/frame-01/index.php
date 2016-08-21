<?php
/*所有由用戶直接訪問到的這些頁面，都要先加載 init.php */
require('./include/init.php');


$conf = conf::getIns();
//讀取選項
echo $conf->host.'</br>';
echo $conf->user.'</br>';
echo $conf->pwd.'</br>';
var_dump($conf->template_dir);
//動態追加選項
$conf->template_dir = 'C:\xampp\htdocs\phpShop\www\smarty';
echo $conf->template_dir;