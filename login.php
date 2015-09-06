<?php
$pw = "adminlogin" ;
    if ($_POST["loginPW"] == $pw){
        header('Location: adminHome.html');
    }else{
         echo "password incorrect";
    }
?>