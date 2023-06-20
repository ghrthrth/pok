<?php  // Софи
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Сумасшедший ученый';
if($npc == 116) { }else{ die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }

if(empty($answer)){
	$textNPC = 'Здравствуйте! Недавно мы изобрели методику, которая открыла нам возможность пробираться в генокод покемона и изменять данные клеток. Я могу с легкостью повысить генокод твоего покемона!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Вы это серьезно?</a></li>';
}elseif($answer == 1) {
	$textNPC = 'Без лишних сомнений! Цена в 200.000 кр., тебя устроит? Но учти что эта процедура одноразовая и после нее покемон потеряет способность к разведению.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Да</a></li>
	<br>        <li id="txt"><a href="game.php?fun=m_location&map=1">Нет</a></li>';
}elseif($answer == 2) {
 $textNPC = "Выбери покемона:<br>";
 	$mypok = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1 AND change_gen = 0');
	while ($active = $mypok->fetch_assoc()){ 
 $textNPC = $textNPC."<br><a href='game.php?fun=m_npc&answ_id=3&npc_id=".$npc."&pok=".$active['id']."'>#".numbPok($active['basenum'])." ".$active['name']."</a>";
	}
}elseif($answer == 3){
	if($_GET['pok'] > 0){
	$pok = obTxt($_GET['pok']);
	$pk = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1 and id = '.$pok)->fetch_assoc();
	if($pk) {
		if(item_isset(1,200000)){
    $gen = mt_rand(39,45); 
		 if(rand(1,100) < 90){   
        $mysqli->query("UPDATE `user_pokemons` SET `hp_gen` = '".$gen."' WHERE `id` = '".$pk['id']."'");
        $mysqli->query("UPDATE `user_pokemons` SET `change_gen` = '1' WHERE `id` = '".$pk['id']."'");
        $mysqli->query("UPDATE `user_pokemons` SET `spark` = '0' WHERE `id` = '".$pk['id']."'");
    $textNPC = 'Готово! У твоего покемона повысились гены.'; 
    minus_item(200000,1);
        }elseif(rand(1,100) < 2){   
        $mysqli->query("UPDATE `user_pokemons` SET `atc_gen` = '".$gen."' WHERE `id` = '".$pk['id']."'");
        $mysqli->query("UPDATE `user_pokemons` SET `change_gen` = '1' WHERE `id` = '".$pk['id']."'");
        $mysqli->query("UPDATE `user_pokemons` SET `spark` = '0' WHERE `id` = '".$pk['id']."'");
    $textNPC = 'Готово! У твоего покемона повысились гены.'; 
    minus_item(200000,1);
        }elseif(rand(1,100) < 2){   
        $mysqli->query("UPDATE `user_pokemons` SET `def_gen` = '".$gen."' WHERE `id` = '".$pk['id']."'");
        $mysqli->query("UPDATE `user_pokemons` SET `change_gen` = '1' WHERE `id` = '".$pk['id']."'");
        $mysqli->query("UPDATE `user_pokemons` SET `spark` = '0' WHERE `id` = '".$pk['id']."'");
    $textNPC = 'Готово! У твоего покемона повысились гены.'; 
    	minus_item(200000,1);
        }elseif(rand(1,100) < 2){   
        $mysqli->query("UPDATE `user_pokemons` SET `speed_gen` = '".$gen."' WHERE `id` = '".$pk['id']."'");
        $mysqli->query("UPDATE `user_pokemons` SET `change_gen` = '1' WHERE `id` = '".$pk['id']."'");
        $mysqli->query("UPDATE `user_pokemons` SET `spark` = '0' WHERE `id` = '".$pk['id']."'");  
    $textNPC = 'Готово! У твоего покемона повысились гены.'; 
    	minus_item(200000,1);
        }elseif(rand(1,100) < 2){   
        $mysqli->query("UPDATE `user_pokemons` SET `spatc_gen` = '".$gen."' WHERE `id` = '".$pk['id']."'");
        $mysqli->query("UPDATE `user_pokemons` SET `change_gen` = '1' WHERE `id` = '".$pk['id']."'");
        $mysqli->query("UPDATE `user_pokemons` SET `spark` = '0' WHERE `id` = '".$pk['id']."'"); 
     $textNPC = 'Готово! У твоего покемона повысились гены.';
     minus_item(200000,1);
		 }else{
        $mysqli->query("UPDATE `user_pokemons` SET `spdef_gen` = '".$gen."' WHERE `id` = '".$pk['id']."'");
        $mysqli->query("UPDATE `user_pokemons` SET `change_gen` = '1' WHERE `id` = '".$pk['id']."'");
        $mysqli->query("UPDATE `user_pokemons` SET `spark` = '0' WHERE `id` = '".$pk['id']."'");        
	$textNPC = 'Готово! У твоего покемона повысились гены.'; 
	minus_item(200000,1);
		}
		}else{ $textNPC = 'Извини, но у тебя не хватает денег.'; }
	}
}else{ die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
}
else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 