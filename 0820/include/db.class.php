<?php


/* file db.class.php 數據庫class   */

abstract class db{

    /*連接資料庫
    parms $h hostname 伺服器名稱
    parms $u username 用戶名稱
    parms $p password 密碼
    return bool
    */
    public abstract function connect($h,$u,$s);

    /*發送查詢
    parms $sql 發送SQL語法
    return mixed bool/resource
    */
    public abstract function query($sql);

    /*查詢多行數據
    parms $sql select型語句
    return array/bool
    */
    public abstract function getAll();

    /*查詢單行數據
    parms $sql select型語句
    return array/bool
    */
    public abstract function getRow();

    /*查詢單個數據
    parms $sql select型語句
    return array/bool
    */
    public abstract function getOne();

    /*自動執行insert/update語句
    parms $sql select型語句
    return array/bool

    $thi->autoExecute('user',array('username'=>'小明','email'=>'smallming@gmail.com'),'insert');
    將自動形成 insert into user (username,email) values ('小明','smallming@gmail.com');

    */
    public abstract function autoExecute($table,$data,$act='insert',$where);






}