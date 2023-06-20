<?php
if(isset($_GET['pick'])) { 
if($user['prize'] < time()) {
	$randomdaily = rand(1,8);
	if($randomdaily == 1){
		$itm = 1; $count = rand(100000,250000); $ttl = "Кредит ";
	}elseif($randomdaily == 2){
		$itm = 185; $count = rand(1,1); $ttl = "Самодельный сканер ";
	}elseif($randomdaily == 3){
		$itm = 1055; $count = rand(1,1); $ttl = "Набор витаминов ";
	}elseif($randomdaily == 4){
		$itm = 1053; $count = rand(2,3); $ttl = "Случайная карта ";
	}elseif($randomdaily == 5){
		$itm = 330; $count = rand(1,5); $ttl = "Набор тренировки ";
	}elseif($randomdaily == 7){
		$itm = 309; $count = rand(7,15); $ttl = "Ванильная конфета ";			
    }else{
        $itm = 1; $count = rand(100000,250000); $ttl = "Кредит ";
    } 
    plus_item($count,$itm,$user_id);
    $tm = time() + 3600*24;
	$mysqli->query("UPDATE users SET prize = '$tm' WHERE `id` = '".$user_id."'");
	echo "<center><b>Вы получили: ".$ttl."x".price($count)."</b></center><br><a href='/game.php?fun=daily'>Назад</a>";
	return;
}else{
	$tmneed = $user['prize'] - time();
	$hours = $tmneed/3600;
	echo "<center><b>Сутки еще не прошли. Забрать следующую награду можно будет после ".date("H:i:s", $user['prize'])." по серверному времени. </b></center><br><a href='/game.php?fun=daily'>Назад</a>";
	return;
}

}
?>
<H1>Ежедневный бонус <span style=font-size:10px> beta </span> </H1><br>
<center><b>Всегда приятно получить подарок от Псидака.</b> </center> 
<table width="100%">
<tr>
<td>
<br><br>
</b></center><br><span style=font-size:25px> <b><a href='/game.php?fun=daily&pick'>Получить!</a></b> </span>
</div>
<div style="float: left;"><img src="https://i.gifer.com/YlWG.gif" width="150px" height="150px"></div>
       
</table><HR>
	   <table width="100%">
		<tr><td></td><td align="right" width=200>
<b><a href="http://claimbe.ru">claimbe.ru</a></b>&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;<br>© 2019-2020</P>