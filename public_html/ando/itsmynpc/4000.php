<?php 
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Тимми';
/*if($npc == 4000 && empty($answer)){
    $textNPC = 'Спасибо за помощь юный тренер!Ах сколько чудесных букетов!За твою помощь я бы хотел наградить тебя наградой,выбери что-нибудь подходящее для себя...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=4000&answ_id=1&map=1">А что у вас есть?! ...</a></li>';
}else*/if($npc == 4000 && empty($answer)){
	$textNPC = 'Вот.';
	$info1 = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '1029'")->fetch_assoc();
function price_item($itm){
		if($itm == 1) { $prc = 20; }else
		if($itm == 2) { $prc = 30; }else
		if($itm == 3) { $prc = 40; }else
		if($itm == 4) { $prc = 40; }else
		if($itm == 5) { $prc = 50; }else
		if($itm == 6) { $prc = 50; }else
		if($itm == 7) { $prc = 60; }else
		if($itm == 8) { $prc = 80; }else
		if($itm == 9) { $prc = 80; }

		else{return false;}
		return $prc;
	}
function inf_egg($itm){
		if($itm == 1) { $prc = 37; }else
		if($itm == 2) { $prc = 92; }else
		if($itm == 3) { $prc = 102; }else
		if($itm == 4) { $prc = 296; }else
		if($itm == 5) { $prc = 333; }else
		if($itm == 6) { $prc = 403; }else
		if($itm == 7) { $prc = 524; }else
		if($itm == 8) { $prc = 349; }else
		if($itm == 9) { $prc = 343; }

		else{return false;}
		return $prc;
	}
	if(array_key_exists('sellID',$_POST) and $_POST['sellID'] > 0){
		$sell = (int)obTxt($_POST['sellID']);
		if(array_key_exists('kr',$_POST)){
          $sl = price_item($sell);
          if($sl <= $info1['count']){
          	$eg = inf_egg($sell);
          	$reborn = time() + (3600*24)*rand(6,9);
          	$mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id` ,`egg`,`pok`,`shiny`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`, `count`) VALUES ('".$_SESSION['user_id']."','999','1','".$eg."','0','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."','1') ");
          	minus_item($sl,1029,$user_id);
          	echo "Яйцо успешно преобретено!";
          	return;
          }else{
          	echo "Не достаточно шаров!";
          	return;
          }
		}
	}
?>

<script type="text/javascript">
	function SUBMIT_BUY() {
			 FormBuy.submit;
		   }
</script>
<h1>Тест</h1>
<table border="0">
<tbody>
<tr valign="top">
<td width="300">

  <div id="sell_list">
  <table border="0" cellspacing="1" cellpadding="1">
  <tbody>
  <tr>
  <td width="35"></td>
  <td width="35"></td>
  <td width="200">
  </td><td>
  </td></tr>
  
  <tr>
  <td>1.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='1'; itname.innerHTML='Яйцо Vulpix'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Vulpix</td><td align="right" width="150" class="bottom_dot">20 Шаров</td>
  </tr>

  <tr>
  <td>2.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='2'; itname.innerHTML='Яйцо Gastly'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Gastly</td><td align="right" width="150" class="bottom_dot">30 Шаров</td>
  </tr>

  <tr>
  <td>3.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='3'; itname.innerHTML='Яйцо Exeggcute'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Exeggcute</td><td align="right" width="150" class="bottom_dot">40 Шаров</td>
  </tr>

   <tr>
  <td>4.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='4'; itname.innerHTML='Яйцо  Makuhita'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Makuhita</td><td align="right" width="150" class="bottom_dot">40 Шаров</td>
  </tr>

  <tr>
  <td>5.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='5'; itname.innerHTML='Яйцо Swablu'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Swablu</td><td align="right" width="150" class="bottom_dot">50 Шаров</td>
  </tr>

  <tr>
  <td>6.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='6'; itname.innerHTML='Яйцо Shinx'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Shinx</td><td align="right" width="150" class="bottom_dot">50 Шаров</td>
  </tr>

  <tr>
  <td>7.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='7'; itname.innerHTML='Яйцо Roggenrola'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Roggenrola</td><td align="right" width="150" class="bottom_dot">60 Шаров</td>
  </tr>

  <tr>
  <td>8.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='8'; itname.innerHTML='Яйцо Feebas'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Feebas</td><td align="right" width="150" class="bottom_dot">80 Шаров</td>
  </tr>

  <tr>
  <td>9.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='9'; itname.innerHTML='Яйцо Baltoy'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Baltoy</td><td align="right" width="150" class="bottom_dot">80 Шаров</td>
  </tr>

  </tbody>
  </table>
  </div>

</td>
<td align="center" width="200">
<form name='FormBuy' action='game.php?fun=m_npc&npc_id=4000' method='post'>
<input name="sellID" type="hidden" value="0">
<img src="/img/items/blank.gif" width="32" height="32" border="0" name="pic" id="pic">
<div id="itname">&nbsp;</div>
<br>
<input type="submit" value="Обменять" style="width:70" name="kr"><br>
</form>
</td>
</tr>
</tbody>
</table>
<?php 
return ;
}