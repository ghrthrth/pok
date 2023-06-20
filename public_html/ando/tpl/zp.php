<?php

$zpI = $mysqli->query("SELECT * FROM `users` WHERE `groups`='1'");
     while($zp = $zpI->fetch_assoc()){
 plus_item(15,500,$zp['id']);
 $text = "Вам выдана Заработная плата - 15 жемчуга!";
 $date = get_last_online(time());
	$mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('2','".$zp['id']."','".$text."','ЗП','".$date."')");
  $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$zp['id']."','info','Новое сообщение','Вам пришло новое личное сообщение!','false') ");
     }
$zpI2 = $mysqli->query("SELECT * FROM `users` WHERE `groups`='3' AND `groups`='3.1'");
     while($zp2 = $zpI2->fetch_assoc()){
 plus_item(10,500,$zp2['id']);
  $text = "Вам выдана Заработная плата - 10 жемчуга!";
 $date = get_last_online(time());
	$mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('2','".$zp2['id']."','".$text."','ЗП','".$date."')");
  $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$zp2['id']."','info','Новое сообщение','Вам пришло новое личное сообщение!','false') ");
     }
$zpI3 = $mysqli->query("SELECT * FROM `users` WHERE `groups`='4'");
     while($zp3 = $zpI3->fetch_assoc()){
 plus_item(10,500,$zp3['id']);
  $text = "Вам выдана Заработная плата - 10 жемчуга!";
 $date = get_last_online(time());
	$mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('2','".$zp3['id']."','".$text."','ЗП','".$date."')");
  $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$zp3['id']."','info','Новое сообщение','Вам пришло новое личное сообщение!','false') ");
     }
    $zpI = $mysqli->query("SELECT * FROM `users` WHERE `groups`='5.1' AND `groups`='5.2' AND `groups`='5.3' AND `groups`='5.4' AND `groups`='5.5' AND `groups`='5.6'");
     while($zp = $zpI->fetch_assoc()){
 plus_item(10,500,$zp['id']);
 $text = "Вам выдана Заработная плата - 10 жемчуга!";
 $date = get_last_online(time());
	$mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('2','".$zp['id']."','".$text."','ЗП','".$date."')");
  $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$zp['id']."','info','Новое сообщение','Вам пришло новое личное сообщение!','false') ");
     } 
     
     echo "ok";

?>