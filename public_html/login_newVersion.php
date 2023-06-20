<?php
session_start();
require_once ('ando/bsqldate/dbconsql.php');
header('Content-Type: text/html; charset=utf-8');

$time = time();

if (array_key_exists('name',$_POST) && array_key_exists('password',$_POST) ){
    $name = escapeMe($_POST['name']);
    $pass = escapeMe($_POST['password']);
    if(strlen($pass) < 4) {
        echo "<script>window.location.href='..';</script>";
        exit;
    }
    $pass  = md5($pass);
    $row = $mysqli->query("SELECT * FROM `users` WHERE `login` = '".$name."' AND `password` = '".$pass."'");
    if(isset($row->num_rows) && $row->num_rows > 0){
        $row = $row->fetch_assoc();
        $mysqli->query("UPDATE `users` SET `online` = '1', `device` = '1', `online_time` = '{$time}' WHERE `id` = '{$row['id']}'");
        $_SESSION['user_id'] = $row['id'];
        //setcookie('login',$row['login']);
        echo "<script>window.location.href='game.php?fun=pokemons';</script>";
    }
    else{
        echo "<script>alert('Вы ввели неверные данные, повторите попытку!')</script>";
        echo "<script>window.location.href='..';</script>";
        exit;
    }
}
else{
    echo "<script>alert('Вы ввели не всю информацию, пожалуйста, заполните все необходимые поля!')</script>";
    echo "<script>window.location.href='..';</script>";
    exit;
}
?>