<?php
$pw = "brandon" ;
    if ($_POST["mainPW"] == $pw){
        header('Location: home.html');
    }else{
        echo "password incorrect";
    }
/**
 * Created by PhpStorm.
 * User: stevenstuu
 * Date: 8/29/2015
 * Time: 11:07 PM
 */
?>