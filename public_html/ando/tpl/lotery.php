<?php
if(isset($_GET['pick'])) { 
if(item_isset(1032,3)) {
	if(rand(1,2) == 1){
		$itm = 1; $count = rand(20000,2000000); $ttl = "Кредит ";
	}else{
		$itm = 60; $count = rand(2,6); $ttl = "Покебол ";
	}
	plus_item($count,$itm,$user_id);
	minus_item(3,1032);
	$tm = time() + 1*0;
	$mysqli->query("UPDATE users SET prize = '$tm' WHERE `id` = '".$user_id."'");
	echo "<center><b>Вы получили: ".$ttl."x".price($count)."</b></center><br><a href='/game.php?fun=bonus'>Назад</a>";
	return;
}else{
	echo "<SCRIPT>location.href='/game.php?fun=bonus';</SCRIPT>"; return;
}
}
?>
<H1>Зимняя Лотерея 2020</H1><br>
<center><b> Ваши билеты:</b> </center> 
<table width="100%">
<tr>
<td>
<tr>
<td>
<tr>
<td>



<br><br>
</b></center><br><a href='/game.php?fun=bonus&pick'><b>Открыть за 3 транзистора</b></a> 
</div>

       
</table><HR>
	   <table width="100%">
		<tr><td></td><td align="right" width=200>
<b><a href="http://claimbe.ru">claimbe.ru</a></b>&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;<br>© 2020</P>
