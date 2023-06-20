<?php 
$check_active_pok = $mysqli->query("SELECT * FROM user_pokemons WHERE `user_id` = '".$_SESSION['user_id']."' AND `active` = 1")->fetch_assoc();
 $check_active_start_pok = $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id` = '".$_SESSION['user_id']."' AND `start_pok` = 1")->fetch_assoc();
function Evolution($pok , $population){
	global $mysqli;
  $user = $mysqli->query('SELECT * FROM users WHERE id = '.$_SESSION['user_id'])->fetch_assoc();

	
if($pok['basenum'] == 13 and $pok['lvl'] >= 7){
$n_nom = 14;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
if($pok['basenum'] == 14 and $pok['lvl'] >= 10){
$n_nom = 15;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//бульбазавр
if($pok['basenum'] == 1 and $pok['lvl'] >= 16){
$n_nom = 2;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//ивизавр
if($pok['basenum'] == 2 and $pok['lvl'] >= 32){
$n_nom = 3;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Чармандер
if($pok['basenum'] == 4 and $pok['lvl'] >= 16){
$n_nom = 5;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Чармелеон
if($pok['basenum'] == 5 and $pok['lvl'] >= 36){
$n_nom = 6;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Сквиртл
if($pok['basenum'] == 7 and $pok['lvl'] >= 16){
$n_nom = 8;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Вортотл
if($pok['basenum'] == 8 and $pok['lvl'] >= 36){
$n_nom = 9;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Чикорита
if($pok['basenum'] == 152 and $pok['lvl'] >= 16){
$n_nom = 153;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Бейлиф
if($pok['basenum'] == 153 and $pok['lvl'] >= 32){
$n_nom = 154;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Синдаквил
if($pok['basenum'] == 155 and $pok['lvl'] >= 14){
$n_nom = 156;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Квилава
if($pok['basenum'] == 156 and $pok['lvl'] >= 36){
$n_nom = 157;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Тотодайл
if($pok['basenum'] == 158 and $pok['lvl'] >= 18){
$n_nom = 159;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Кроконав
if($pok['basenum'] == 159 and $pok['lvl'] >= 30){
$n_nom = 160;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Трико
if($pok['basenum'] == 252 and $pok['lvl'] >= 16){
$n_nom = 253;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Гровайл
if($pok['basenum'] == 253 and $pok['lvl'] >= 36){
$n_nom = 254;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Торчик
if($pok['basenum'] == 255 and $pok['lvl'] >= 16){
$n_nom = 256;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Комбаскет
if($pok['basenum'] == 256 and $pok['lvl'] >= 36){
$n_nom = 257;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Мадкип
if($pok['basenum'] == 258 and $pok['lvl'] >= 16){
$n_nom = 259;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Маштомп
if($pok['basenum'] == 259 and $pok['lvl'] >= 36){
$n_nom = 260;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Туртвиг
if($pok['basenum'] == 387 and $pok['lvl'] >= 18){
$n_nom = 388;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Гротл
if($pok['basenum'] == 388 and $pok['lvl'] >= 32){
$n_nom = 389;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Чимчар
if($pok['basenum'] == 390 and $pok['lvl'] >= 14){
$n_nom = 391;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Монферно
if($pok['basenum'] == 391 and $pok['lvl'] >= 36){
$n_nom = 392;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Пиплап
if($pok['basenum'] == 393 and $pok['lvl'] >= 16){
$n_nom = 394;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Принплап
if($pok['basenum'] == 394 and $pok['lvl'] >= 36){
$n_nom = 395;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Снайви
if($pok['basenum'] == 495 and $pok['lvl'] >= 17){
$n_nom = 496;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Сервайн
if($pok['basenum'] == 496 and $pok['lvl'] >= 36){
$n_nom = 497;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Тепиг
if($pok['basenum'] == 498 and $pok['lvl'] >= 17){
$n_nom = 499;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Пигнайт
if($pok['basenum'] == 499 and $pok['lvl'] >= 36){
$n_nom = 500;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Ошавот
if($pok['basenum'] == 501 and $pok['lvl'] >= 17){
$n_nom = 502;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
//Дьювотт
if($pok['basenum'] == 502 and $pok['lvl'] >= 36){
$n_nom = 503;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
if($pok['basenum'] == 10 and $pok['lvl'] >= 7){
$n_nom = 11;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
if($pok['basenum'] == 11 and $pok['lvl'] >= 10){
$n_nom = 12;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
if($pok['basenum'] == 13 and $pok['lvl'] >= 7){
$n_nom = 14;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 14 and $pok['lvl'] >= 10){
$n_nom = 15;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
if($pok['basenum'] == 16 and $pok['lvl'] >= 18){
$n_nom = 17;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
if($pok['basenum'] == 17 and $pok['lvl'] >= 36){
$n_nom = 18;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
if($pok['basenum'] == 19 and $pok['lvl'] >= 20){
$n_nom = 20;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
if($pok['basenum'] == 21 and $pok['lvl'] >= 20){
$n_nom = 22;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
if($pok['basenum'] == 23 and $pok['lvl'] >= 22){
$n_nom = 24;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 27 and $pok['lvl'] >= 22){
$n_nom = 28;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 29 and $pok['lvl'] >= 16){
$n_nom = 30;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 32 and $pok['lvl'] >= 16){
$n_nom = 33;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 41 and $pok['lvl'] >= 22){
$n_nom = 42;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
  return;
}  

if($pok['basenum'] == 42 and $item == 143){
$n_nom = 169;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 43 and $pok['lvl'] >= 21){
$n_nom = 44;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 46 and $pok['lvl'] >= 24){
$n_nom = 47;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 48 and $pok['lvl'] >= 31){
$n_nom = 49;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 50 and $pok['lvl'] >= 26){
$n_nom = 51;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 52 and $pok['lvl'] >= 28){
$n_nom = 53;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 54 and $pok['lvl'] >= 33){
$n_nom = 55;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 56 and $pok['lvl'] >= 28){
$n_nom = 57;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 60 and $pok['lvl'] >= 25){
$n_nom = 61;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 63 and $pok['lvl'] >= 16){
$n_nom = 64;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 64 and $pok['spark'] == 0){
$n_nom = 65;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 66 and $pok['lvl'] >= 28){
$n_nom = 67;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 67 and $pok['spark'] == 0){
$n_nom = 68;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 69 and $pok['lvl'] >= 21){
$n_nom = 70;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 72 and $pok['lvl'] >= 30){
$n_nom = 73;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 74 and $pok['lvl'] >= 25){
$n_nom = 75;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 75 and $pok['spark'] == 0){
$n_nom = 76;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 77 and $pok['lvl'] >= 40){
$n_nom = 78;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 79 and $pok['lvl'] >= 37){
$n_nom = 80;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 81 and $pok['lvl'] >= 30){
$n_nom = 82;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 82 and $user['location'] == 131){
$n_nom = 462;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
include("ando/bsqldate/dbconsql.php");
}if($pok['basenum'] == 84 and $pok['lvl'] >= 31){
$n_nom = 85;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 133 and $user['location'] == 224){
$n_nom = 471;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 133 and $user['location'] == 12){
$n_nom = 470;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 86 and $pok['lvl'] >= 34){
$n_nom = 87;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 88 and $pok['lvl'] >= 38){
$n_nom = 89;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 92 and $pok['lvl'] >= 25){
$n_nom = 93;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 93 and $pok['spark'] == 0){
$n_nom = 94;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 96 and $pok['lvl'] >= 26){
$n_nom = 97;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 98 and $pok['lvl'] >= 28){
$n_nom = 99;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 100 and $pok['lvl'] >= 30){
$n_nom = 101;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
if($pok['basenum'] == 104 and $pok['lvl'] >= 28){
$n_nom = 105;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 109 and $pok['lvl'] >= 35){
$n_nom = 110;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 111 and $pok['lvl'] >= 42){
$n_nom = 112;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 116 and $pok['lvl'] >= 32){
$n_nom = 117;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 118 and $pok['lvl'] >= 33){
$n_nom = 119;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 238 and $pok['lvl'] >= 30){
$n_nom = 124;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 239 and $pok['lvl'] >= 30){
$n_nom = 125;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 240 and $pok['lvl'] >= 30){
$n_nom = 126;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 129 and $pok['lvl'] >= 20){
$n_nom = 130;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 138 and $pok['lvl'] >= 40){
$n_nom = 139;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 140 and $pok['lvl'] >= 40){
$n_nom = 141;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 147 and $pok['lvl'] >= 30){
$n_nom = 148;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 148 and $pok['lvl'] >= 55){
$n_nom = 149;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 161 and $pok['lvl'] >= 15){
$n_nom = 162;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 163 and $pok['lvl'] >= 20){
$n_nom = 164;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 165 and $pok['lvl'] >= 18){
$n_nom = 166;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 167 and $pok['lvl'] >= 22){
$n_nom = 168;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 170 and $pok['lvl'] >= 27){
$n_nom = 171;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 177 and $pok['lvl'] >= 25){
$n_nom = 178;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 179 and $pok['lvl'] >= 15){
$n_nom = 180;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 180 and $pok['lvl'] >= 30){
$n_nom = 181;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
     return;
}if($pok['basenum'] == 298 and $item == 143){
$n_nom = 183;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 183 and $pok['lvl'] >= 18){
$n_nom = 184;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 187 and $pok['lvl'] >= 18){
$n_nom = 188;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 188 and $pok['lvl'] >= 27){
$n_nom = 189;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 194 and $pok['lvl'] >= 20){
$n_nom = 195;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 360 and $pok['lvl'] >= 15){
$n_nom = 202;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 204 and $pok['lvl'] >= 31){
$n_nom = 205;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 209 and $pok['lvl'] >= 23){
$n_nom = 210;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 216 and $pok['lvl'] >= 30){
$n_nom = 217;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 218 and $pok['lvl'] >= 38){
$n_nom = 219;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 220 and $pok['lvl'] >= 33){
$n_nom = 221;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 223 and $pok['lvl'] >= 25){
$n_nom = 224;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 228 and $pok['lvl'] >= 24){
$n_nom = 229;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 231 and $pok['lvl'] >= 25){
$n_nom = 232;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 246 and $pok['lvl'] >= 30){
$n_nom = 247;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 247 and $pok['lvl'] >= 55){
$n_nom = 248;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 261 and $pok['lvl'] >= 18){
$n_nom = 262;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 263 and $pok['lvl'] >= 20){
$n_nom = 264;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 265 and $pok['lvl'] >= 7 and $pok['gender'] == male){
$n_nom = 268;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 265 and $pok['lvl'] >= 7 and $pok['gender'] == female){
$n_nom = 266;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 266 and $pok['lvl'] >= 10){
$n_nom = 267;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 268 and $pok['lvl'] >= 10){
$n_nom = 269;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 270 and $pok['lvl'] >= 14){
$n_nom = 271;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 273 and $pok['lvl'] >= 14){
$n_nom = 274;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 276 and $pok['lvl'] >= 22){
$n_nom = 277;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 278 and $pok['lvl'] >= 25){
$n_nom = 279;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 280 and $pok['lvl'] >= 20){
$n_nom = 281;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 281 and $pok['lvl'] >= 30){
$n_nom = 282;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 283 and $pok['lvl'] >= 22){
$n_nom = 284;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 285 and $pok['lvl'] >= 23){
$n_nom = 286;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 287 and $pok['lvl'] >= 18){
$n_nom = 288;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 288 and $pok['lvl'] >= 36){
$n_nom = 289;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 290 and $pok['lvl'] >= 20){
$n_nom = 291;
$shedinja = 292;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
   newPokemon($shedinja,$_SESSION['user_id']);
return;
}if($pok['basenum'] == 293 and $pok['lvl'] >= 20){
$n_nom = 294;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 294 and $pok['lvl'] >= 40){
$n_nom = 295;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 296 and $pok['lvl'] >= 24){
$n_nom = 297;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 304 and $pok['lvl'] >= 32){
$n_nom = 305;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 305 and $pok['lvl'] >= 42){
$n_nom = 306;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 307 and $pok['lvl'] >= 37){
$n_nom = 308;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 309 and $pok['lvl'] >= 26){
$n_nom = 310;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 316 and $pok['lvl'] >= 26){
$n_nom = 317;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 318 and $pok['lvl'] >= 30){
$n_nom = 319;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 320 and $pok['lvl'] >= 40){
$n_nom = 321;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 322 and $pok['lvl'] >= 33){
$n_nom = 323;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 325 and $pok['lvl'] >= 32){
$n_nom = 326;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 328 and $pok['lvl'] >= 35){
$n_nom = 329;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 236 and $pok['lvl'] >= 20 and $pok['atc_ev'] > $pok['def_ev']){
$n_nom = 106;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 236 and $pok['lvl'] >= 20 and $pok['atc_ev'] < $pok['def_ev']){
$n_nom = 107;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 236 and $pok['lvl'] >= 20 and $pok['atc_ev'] == $pok['def_ev']){
$n_nom = 237;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 329 and $pok['lvl'] >= 45){
$n_nom = 330;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 331 and $pok['lvl'] >= 32){
$n_nom = 332;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 333 and $pok['lvl'] >= 35){
$n_nom = 334;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 339 and $pok['lvl'] >= 30){
$n_nom = 340;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 341 and $pok['lvl'] >= 30){
$n_nom = 342;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 343 and $pok['lvl'] >= 36){
$n_nom = 344;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 345 and $pok['lvl'] >= 40){
$n_nom = 346;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 347 and $pok['lvl'] >= 40){
$n_nom = 348;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 353 and $pok['lvl'] >= 37){
$n_nom = 354;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 355 and $pok['lvl'] >= 37){
$n_nom = 356;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 361 and $pok['lvl'] >= 42){
$n_nom = 362;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 363 and $pok['lvl'] >= 32){
$n_nom = 364;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 364 and $pok['lvl'] >= 44){
$n_nom = 365;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 371 and $pok['lvl'] >= 30){
$n_nom = 372;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 372 and $pok['lvl'] >= 50){
$n_nom = 373;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 374 and $pok['lvl'] >= 20){
$n_nom = 375;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 375 and $pok['lvl'] >= 45){
$n_nom = 376;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 396 and $pok['lvl'] >= 14){
$n_nom = 397;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 397 and $pok['lvl'] >= 33){
$n_nom = 398;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 399 and $pok['lvl'] >= 15){
$n_nom = 400;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 401 and $pok['lvl'] >= 10){
$n_nom = 402;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 403 and $pok['lvl'] >= 15){
$n_nom = 404;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 404 and $pok['lvl'] >= 30){
$n_nom = 405;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 408 and $pok['lvl'] >= 30){
$n_nom = 409;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 410 and $pok['lvl'] >= 30){
$n_nom = 411;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 415 and $pok['lvl'] >= 21 and $pok['gender'] == female){
$n_nom = 416;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 418 and $pok['lvl'] >= 26){
$n_nom = 419;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 420 and $pok['lvl'] >= 25){
$n_nom = 421;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 422 and $pok['lvl'] >= 30){
$n_nom = 423;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 425 and $pok['lvl'] >= 28){
$n_nom = 426;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 431 and $pok['lvl'] >= 38){
$n_nom = 432;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;     
}if($pok['basenum'] == 434 and $pok['lvl'] >= 34){
$n_nom = 435;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 436 and $pok['lvl'] >= 33){
$n_nom = 437;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 443 and $pok['lvl'] >= 24){
$n_nom = 444;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 444 and $pok['lvl'] >= 48){
$n_nom = 445;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 449 and $pok['lvl'] >= 34){
$n_nom = 450;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 451 and $pok['lvl'] >= 40){
$n_nom = 452;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 453 and $pok['lvl'] >= 37){
$n_nom = 454;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 456 and $pok['lvl'] >= 31){
$n_nom = 457;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 459 and $pok['lvl'] >= 40){
$n_nom = 460;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 504 and $pok['lvl'] >= 20){
$n_nom = 505;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 506 and $pok['lvl'] >= 16){
$n_nom = 507;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 507 and $pok['lvl'] >= 32){
$n_nom = 508;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 509 and $pok['lvl'] >= 20){
$n_nom = 510;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 519 and $pok['lvl'] >= 21){
$n_nom = 520;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 520 and $pok['lvl'] >= 32){
$n_nom = 521;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 522 and $pok['lvl'] >= 27){
$n_nom = 523;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 524 and $pok['lvl'] >= 25){
$n_nom = 525;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 525 and $pok['spark'] == 0){
$n_nom = 526;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 529 and $pok['lvl'] >= 31){
$n_nom = 530;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 532 and $pok['lvl'] >= 25){
$n_nom = 533;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 533 and $pok['spark'] == 0){
$n_nom = 534;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 535 and $pok['lvl'] >= 25){
$n_nom = 536;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 536 and $pok['lvl'] >= 36){
$n_nom = 537;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 540 and $pok['lvl'] >= 20){
$n_nom = 541;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
     return;
}if($pok['basenum'] == 541 and $item == 143 ){
$n_nom = 542;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
     return;
}if(($pok['basenum'] == 447) and ($item == 143) ){
$n_nom = 448;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
    return;
}if($pok['basenum'] == 433 and $item == 143 ){
$n_nom = 358;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
    return;
}if($pok['basenum'] == 427 and $item == 143 ){
$n_nom = 428;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
    return;
}if($pok['basenum'] == 446 and $item == 143  ){
$n_nom = 143;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
    return;
}if($pok['basenum'] == 406 and $item == 143){
$n_nom = 315;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
    return;
}if($pok['basenum'] == 446 and $item == 143 ){
$n_nom = 448;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
     return;
}if($pok['basenum'] == 527 and $item == 143 ){
$n_nom = 528;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 543 and $pok['lvl'] >= 22){
$n_nom = 544;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 544 and $pok['lvl'] >= 30){
$n_nom = 545;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 551 and $pok['lvl'] >= 29){
$n_nom = 552;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 552 and $pok['lvl'] >= 40){
$n_nom = 553;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 554 and $pok['lvl'] >= 35){
$n_nom = 555;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 557 and $pok['lvl'] >= 34){
$n_nom = 558;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 559 and $pok['lvl'] >= 39){
$n_nom = 560;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 562 and $pok['lvl'] >= 34){
$n_nom = 563;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 564 and $pok['lvl'] >= 37){
$n_nom = 565;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 566 and $pok['lvl'] >= 37){
$n_nom = 567;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 568 and $pok['lvl'] >= 36){
$n_nom = 569;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 570 and $pok['lvl'] >= 30){
$n_nom = 571;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 574 and $pok['lvl'] >= 32){
$n_nom = 575;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 575 and $pok['lvl'] >= 41){
$n_nom = 576;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 577 and $pok['lvl'] >= 32){
$n_nom = 578;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 578 and $pok['lvl'] >= 41){
$n_nom = 579;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 580 and $pok['lvl'] >= 35){
$n_nom = 581;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 582 and $pok['lvl'] >= 35){
$n_nom = 583;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 583 and $pok['lvl'] >= 47){
$n_nom = 584;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 585 and $pok['lvl'] >= 34){
$n_nom = 586;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 590 and $pok['lvl'] >= 39){
$n_nom = 591;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 592 and $pok['lvl'] >= 40){
$n_nom = 593;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 595 and $pok['lvl'] >= 36){
$n_nom = 596;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 597 and $pok['lvl'] >= 40){
$n_nom = 598;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 599 and $pok['lvl'] >= 38){
$n_nom = 600;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 600 and $pok['lvl'] >= 49){
$n_nom = 601;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 602 and $pok['lvl'] >= 39){
$n_nom = 603;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 605 and $pok['lvl'] >= 42){
$n_nom = 606;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 607 and $pok['lvl'] >= 41){
$n_nom = 608;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 610 and $pok['lvl'] >= 38){
$n_nom = 611;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 611 and $pok['lvl'] >= 48){
$n_nom = 612;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 613 and $pok['lvl'] >= 37){
$n_nom = 614;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 619 and $pok['lvl'] >= 50){
$n_nom = 620;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 622 and $pok['lvl'] >= 43){
$n_nom = 623;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 624 and $pok['lvl'] >= 52){
$n_nom = 625;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 627 and $pok['lvl'] >= 54){
$n_nom = 628;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 629 and $pok['lvl'] >= 54){
$n_nom = 630;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 63 and $pok['lvl'] >= 50){
$n_nom = 634;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 633 and $pok['lvl'] >= 50){
$n_nom = 634;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 634 and $pok['lvl'] >= 64){
$n_nom = 635;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 636 and $pok['lvl'] >= 59){
$n_nom = 637;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}
if($pok['basenum'] == 37 and $item == 100){
$n_nom = 38;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}
if($pok['basenum'] == 58 and $item == 100){
$n_nom = 59;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 133 and $item == 100){
$n_nom = 136;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 37 and $item == 100){
$n_nom = 38;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 513 and $item == 100){
$n_nom = 514;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 30 and $item == 101){
$n_nom = 31;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 32 and $item == 101){
$n_nom = 33;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 35 and $item == 101){
$n_nom = 36;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 39 and $item == 101){
$n_nom = 40;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 300 and $item == 101){
$n_nom = 301;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 517 and $item == 101){
$n_nom = 518;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 25 and $item == 102 ){
$n_nom = 26;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 133 and $item == 102){
$n_nom = 135;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 603 and $item == 102){
$n_nom = 604;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 61 and $item == 103){
$n_nom = 62;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 90 and $item == 103){
$n_nom = 91;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 120 and $item == 103){
$n_nom = 121;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 133 and $item == 103){
$n_nom = 135;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 271 and $item == 132){
$n_nom = 272;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 515 and $item == 132){
$n_nom = 516;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 44 and $item == 104){
$n_nom = 45;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 70 and $item == 104){
$n_nom = 71;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 102 and $item == 104){
$n_nom = 103;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 274 and $item == 104){
$n_nom = 275;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 299 and $user['location'] == 131){
$n_nom = 476;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 511 and $item == 104){
$n_nom = 512;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
}if($pok['basenum'] == 0 and $item == 0){
$n_nom = 0;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 126 and $item == 105){
$n_nom = 467;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 125 and $item == 106){
$n_nom = 466;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 176 and $item == 107){
$n_nom = 468;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 315 and $item == 107){
$n_nom = 407;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 572 and $item == 107){
$n_nom = 473;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 670 and $item == 107){
$n_nom = 671;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 198 and $item == 108){
$n_nom = 430;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 200 and $item == 108){
$n_nom = 429;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 608 and $item == 108){
$n_nom = 609;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 281 and $item == 109){
$n_nom = 475;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 361 and $item == 109){
$n_nom = 478;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 112 and $item == 110){
$n_nom = 464;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 95 and $item == 111){
$n_nom = 208;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 123 and $item == 111){
$n_nom = 212;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 117 and $item == 112){
$n_nom = 230;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 137 and $item == 113){
$n_nom = 233;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 44 and $item == 114 ){
$n_nom = 45;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 191 and $item == 114){
$n_nom = 192;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 546 and $item == 114){
$n_nom = 547;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 207 and $item == 115){
$n_nom = 472;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 366 and $item == 116){
$n_nom = 368;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 366 and $item == 117){
$n_nom = 367;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 233 and $item == 118){
$n_nom = 474;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 61 and $item == 119){
$n_nom = 186;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 79 and $item == 119){
$n_nom = 199;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 349 and $item == 120){
$n_nom = 350;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 356 and $item == 121){
$n_nom = 477;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 440 and $item == 251){
$n_nom = 242;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
$mysqli->query("UPDATE user_pokemons SET `items`= '0' WHERE id='".$pok['id']."'");
return;
}if($pok['basenum'] == 653 and $pok['lvl'] >= 16){
$n_nom = 654;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 654 and $pok['lvl'] >= 36){
$n_nom = 655;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 650 and $pok['lvl'] >= 16){
$n_nom = 651;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 651 and $pok['lvl'] >= 36){
$n_nom = 652;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 656 and $pok['lvl'] >= 16){
$n_nom = 657;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 657 and $pok['lvl'] >= 36){
$n_nom = 658;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
}
if($pok['basenum'] == 672 and $pok['lvl'] >= 32){
$n_nom = 673;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 412 and $pok['lvl'] >= 20 and $pok['gender'] >= male){
$n_nom = 414;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 412 and $pok['lvl'] >= 20 and $pok['gender'] >= female){
$n_nom = 413;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 616 and $pok['spark'] == 0){
$n_nom = 617;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 659 and $pok['lvl'] >= 20){
$n_nom = 660;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 661 and $pok['lvl'] >= 17){
$n_nom = 662;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 662 and $pok['lvl'] >= 35){
$n_nom = 663;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 664 and $pok['lvl'] >= 9){
$n_nom = 665;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 665 and $pok['lvl'] >= 12){
$n_nom = 666;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 667 and $pok['lvl'] >= 35){
$n_nom = 668;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 669 and $pok['lvl'] >= 19){
$n_nom = 670;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 674 and $pok['lvl'] >= 34){
$n_nom = 675;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 677 and $pok['lvl'] >= 25){
$n_nom = 678;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 674 and $pok['lvl'] >= 34){
$n_nom = 675;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 679 and $pok['lvl'] >= 35){
$n_nom = 680;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 688 and $pok['lvl'] >= 39){
$n_nom = 689;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 690 and $pok['lvl'] >= 48){
$n_nom = 691;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 692 and $pok['lvl'] >= 37){
$n_nom = 693;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 696 and $pok['lvl'] >= 39){
$n_nom = 697;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 698 and $pok['lvl'] >= 39){
$n_nom = 699;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 704 and $pok['lvl'] >= 40){
$n_nom = 705;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 705 and $pok['lvl'] >= 50){
$n_nom = 706;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 712 and $pok['lvl'] >= 37){
$n_nom = 713;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 714 and $pok['lvl'] >= 48){
$n_nom = 715;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 708 and $pok['spark'] == 0){
$n_nom = 709;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;   
}if($pok['basenum'] == 710 and $pok['spark'] == 0){
$n_nom = 711;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return; 
}if($pok['basenum'] == 747 and $pok['lvl'] >= 38){
$n_nom = 748;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return; 
}if($pok['basenum'] == 755 and $pok['lvl'] >= 24){
$n_nom = 756;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return; 
}if($pok['basenum'] == 722 and $pok['lvl'] >= 17){
$n_nom = 723;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return; 
}if($pok['basenum'] == 723 and $pok['lvl'] >= 34){
$n_nom = 724;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return; 
}if($pok['basenum'] == 725 and $pok['lvl'] >= 17){
$n_nom = 726;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return; 
}if($pok['basenum'] == 726 and $pok['lvl'] >= 34){
$n_nom = 727;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return; 
}if($pok['basenum'] == 728 and $pok['lvl'] >= 17){
$n_nom = 729;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return; 
}if($pok['basenum'] == 729 and $pok['lvl'] >= 34){
$n_nom = 730;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 759 and $pok['lvl'] >= 27){
$n_nom = 760;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 749 and $pok['lvl'] >= 30){
$n_nom = 750;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 757 and $pok['lvl'] >= 33 and $pok['gender'] == female){
$n_nom = 758;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return;
}if($pok['basenum'] == 769 and $pok['lvl'] >= 42){
$n_nom = 770;
$pdex = $mysqli->query("SELECT name FROM `base_pokemon` WHERE `id` = '$n_nom'")->fetch_assoc();
$mysqli->query("UPDATE user_pokemons SET `basenum` = '$n_nom',`numbpu` = '$n_nom',`name`='".$pdex['name']."' WHERE id='".$pok['id']."'");
stat_updates($pok['id']);
$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='".$n_nom."' and atc_lvl='".$pok['lvl']."'");
   while($an = $newAtc->fetch_assoc()){
     $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('".$an['atac_id']."','".$pok['id']."') ");
   }
return; 
}
}
?>