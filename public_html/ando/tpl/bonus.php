<?php
if(isset($_GET['pick'])) { 
if(item_isset(1032,3)) {
		if(rand(1,22) <= 1){
		$itm = 1; $count = rand(20000,2000000); $ttl = "Кредит ";
	}elseif(rand(1,22) <= 2){
		$itm = 72; $count = rand(2,7); $ttl = "Даркбол ";
	}elseif(rand(1,22) <= 3){
		$itm = 72; $count = rand(2,7); $ttl = "Даркбол ";	
	}elseif(rand(1,22) <= 4){
		$itm = 330; $count = rand(1,3); $ttl = "Набор Тренировки ";
	}elseif(rand(1,22) == 5){
		$itm = 247; $count = rand(1,1); $ttl = "Камень сумарка ";
	}elseif(rand(1,22) == 6){
		$itm = 251; $count = rand(1,1); $ttl = "Овальный камень ";
	}elseif(rand(1,22) <= 7){
		$itm = 29; $count = rand(10,20); $ttl = "Стимпак ";
	}elseif(rand(1,22) <= 8){
		$itm = 29; $count = rand(10,20); $ttl = "Стимпак ";	
	}elseif(rand(1,22) <= 9){
		$itm = 309; $count = rand(5,12) ; $ttl = "Ванильная конфета ";
	}elseif(rand(1,22) == 10){
		$itm = 1011; $count = rand(1,1) ; $ttl = "ТМ 6 Тохic ";	
	}elseif(rand(1,22) <= 11){
		$itm = 1012; $count = rand(1,1) ; $ttl = "ТМ 12 Taunt ";	
	}elseif(rand(1,22) <= 12){
		$itm = 1004; $count = rand(1,1) ; $ttl = "TM 14 Thunder ";		
	}elseif(rand(1,22) <= 13){{
		$itm = 999; $count = 1; $ttl = "Яйцо Meditite ";
          	$reborn = time() + (3600*24)*rand(6,9);
          	$mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id`,`count`,`egg`,`pok`,`shiny`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$_SESSION['user_id']."','999','1','1','307','0','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."') ");
	    return;}
	}elseif(rand(1,22) <= 14){{
		$itm = 999; $count = 1; $ttl = "Яйцо Skitty ";
          	$reborn = time() + (3600*24)*rand(6,9);
          	$mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id`,`count`,`egg`,`pok`,`shiny`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$_SESSION['user_id']."','999','1','1','300','0','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."') ");
	    return;}
	}elseif(rand(1,22) <= 15){{
		$itm = 999; $count = 1; $ttl = "Яйцо Chatot ";
          	$reborn = time() + (3600*24)*rand(6,9);
          	$mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id`,`count`,`egg`,`pok`,`shiny`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$_SESSION['user_id']."','999','1','1','441','0','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."') ");
	    return;}
	}elseif(rand(1,22) <= 16){{
		$itm = 999; $count = 1; $ttl = "Яйцо Heracross ";
          	$reborn = time() + (3600*24)*rand(6,9);
          	$mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id`,`count`,`egg`,`pok`,`shiny`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$_SESSION['user_id']."','999','1','1','214','0','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."') ");
	    return;}
	}elseif(rand(1,22) <= 17){{
		$itm = 999; $count = 1; $ttl = "Яйцо Hippopotas ";
          	$reborn = time() + (3600*24)*rand(6,9);
          	$mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id`,`count`,`egg`,`pok`,`shiny`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$_SESSION['user_id']."','999','1','1','449','0','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."') ");
	    return;}
	}elseif(rand(1,22) <= 18){{
		$itm = 999; $count = 1; $ttl = "Яйцо Probopass ";
          	$reborn = time() + (3600*24)*rand(6,9);
          	$mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id`,`count`,`egg`,`pok`,`shiny`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$_SESSION['user_id']."','999','1','1','476','0','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."') ");
	    return;}
	}elseif(rand(1,22) <= 19){{
		$itm = 999; $count = 1; $ttl = "Яйцо Eevee ";
          	$reborn = time() + (3600*24)*rand(6,9);
          	$mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id`,`count`,`egg`,`pok`,`shiny`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$_SESSION['user_id']."','999','1','1','133','0','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."') ");
	    return;}
	}elseif(rand(1,22) <= 20){{
		$itm = 999; $count = 1; $ttl = "Яйцо Mudkip ";
          	$reborn = time() + (3600*24)*rand(6,9);
          	$mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id`,`count`,`egg`,`pok`,`shiny`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$_SESSION['user_id']."','999','1','1','258','0','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."') ");
	    return;}
	}elseif(rand(1,22) == 21){{
		$itm = 999; $count = 1; $ttl = "Яйцо Goomy ";
          	$reborn = time() + (3600*24)*rand(6,9);
          	$mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id`,`count`,`egg`,`pok`,`shiny`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$_SESSION['user_id']."','999','1','1','704','0','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."') ");
	    return;}
	}elseif(rand(1,22) == 22){{
		$itm = 999; $count = 1; $ttl = "Яйцо Jirachi ";
          	$reborn = time() + (3600*24)*rand(6,9);
          	$mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id`,`count`,`egg`,`pok`,`shiny`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$_SESSION['user_id']."','999','1','1','133','0','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."') ");
	    return;}    
	}

	plus_item($count,$itm,$user_id);
	minus_item(3,1032);
	$tm = time() + 0*0;
	$mysqli->query("UPDATE users SET prize = '$tm' WHERE `id` = '".$user_id."'");
	if($itm == 999){
	    echo "<center><b>Вы получили: яйцо.</b></center><br><a href='/game.php?fun=bonus'>Назад</a>";
	}else{
	echo "<center><b>Вы получили: ".$ttl."x".price($count)."</b></center><br><a href='/game.php?fun=bonus'>Назад</a>";}
	return;
}else{
	echo "<SCRIPT>location.href='/game.php?fun=bonus';</SCRIPT>"; return;
}
}
?>
<H1>Техно-Лото</H1><br>
<center><b> Вы видите перед собой нереальный мир технологий, но что полезного он может для Вас дать? 3 транзистора <img src="https://league17reborn.ru/img/items/1032.gif"> - и будущее уже перед Вами...</b> </center> 
<table width="100%">
<tr>
<td>
<tr>
<td>
<tr>
<td>



<div style="float: left; margin-left: 100px; margin-top: 250px;">
<img src="https://i.pinimg.com/originals/ce/4c/9d/ce4c9d67fb6174aa268bf7e71c12b8ff.gif?auto=format&fit=max&h=1000&w=1000" width="200px" height="200px">
<br><br>
</b></center><br><a href='/game.php?fun=bonus&pick'><b>Открыть за 3 транзистора</b></a> 
</div>
<div style="float: left;"><img src="https://i.pinimg.com/originals/74/c2/f0/74c2f0be552806e0b686e1396751f4a9.gif" width="500px" height="500px"></div>
       
</table><HR>
	   <table width="100%">
		<tr><td></td><td align="right" width=200>
<b><a href="http://claimbe.ru">league17reborn.ru</a></b>&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;<br>© 2017</P>
