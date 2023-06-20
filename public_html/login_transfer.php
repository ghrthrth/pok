<?php
//session_start();
// require_once ('ando/bsqldate/dbconsql.php');
// require_once ('ando/functions/game.functions.php');
// //require ('ando/tpl/transfer.php');
// header('Content-Type: text/html; charset=utf-8');

// $time = time();

// if (array_key_exists('uName',$_POST) && array_key_exists('pass',$_POST) && array_key_exists('newLog',$_POST) ){
//     $name = escapeMe($_POST['uName']);
//     $pass = escapeMe($_POST['pass']);
//     $newname = escapeMe($_POST['newLog']);
//     if(strlen($pass) < 4) {
//         echo "<script>window.location.href='..';</script>";
//         exit;
//     }
//     $pass  = md5($pass);
//     $row = $mysqli->query("SELECT * FROM `users_old` WHERE `login` = '".$name."' AND `password` = '".$pass."'");
//     $newlog = $mysqli->query("SELECT * FROM `users` WHERE `login` = '".$newname."'");
//     if(isset($row->num_rows) && $row->num_rows > 0){
//         $row = $row->fetch_assoc();
//         $mysqli->query("UPDATE `users_old` SET `online` = '1', `device` = '1', `online_time` = '{$time}' WHERE `id` = '{$row['id']}'");
//         $mysqli->query("UPDATE `users` SET `old_user_id` = '".$row['id']."' WHERE `login` = '".$newname."'");
//         $_SESSION['user_id'] = $row['id'];
//         //setcookie('login',$row['login']);
//         echo "<script>window.location.href='game.php?fun=pokemons';</script>";
//     }
//     else{
//         echo "<script>alert('Вы ввели неверные данные, повторите попытку!')</script>";
//         echo "<script>window.location.href='game.php?fun=transfer';</script>";
//         exit;
//     }
// }
// else{
//     echo "<script>alert('Вы ввели не всю информацию, пожалуйста, заполните все необходимые поля!')</script>";
//     echo "<script>window.location.href='game.php?fun=transfer';</script>";
//     exit;
// }
?>