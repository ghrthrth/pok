<?php 
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Норман';
/*if($npc == 4000 && empty($answer)){
    $textNPC = 'Спасибо за помощь юный тренер!Ах сколько чудесных букетов!За твою помощь я бы хотел наградить тебя наградой,выбери что-нибудь подходящее для себя...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=4000&answ_id=1&map=1">А что у вас есть?! ...</a></li>';
}else*/if($npc == 149 && empty($answer)){
	$textNPC = 'Покемоны будут не доступны для разведения после вылупления!.';
	$info1 = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '1'")->fetch_assoc();
function price_item($itm){
		if($itm == 1) { $prc = 1500000; }else
		if($itm == 2) { $prc = 2000000; }else
		if($itm == 3) { $prc = 1000000; }else
		if($itm == 4) { $prc = 1000000; }else
		if($itm == 5) { $prc = 1200000; }else
		if($itm == 6) { $prc = 1500000; }else
		if($itm == 7) { $prc = 1500000; }else
		if($itm == 8) { $prc = 1200000; }else
    if($itm == 9) { $prc = 800000; }else
    if($itm == 10) { $prc = 3000000; }else
    if($itm == 11) { $prc = 3000000; }else
    if($itm == 12) { $prc = 3000000; }else
    if($itm == 13) { $prc = 3000000; }else
    if($itm == 14) { $prc = 3000000; }else
		if($itm == 15) { $prc = 5000000; }

		else{return false;}
		return $prc;
	}
function inf_egg($itm){
    if($itm == 1) { $prc = 561; }else
    if($itm == 2) { $prc = 185; }else
    if($itm == 3) { $prc = 102; }else
    if($itm == 4) { $prc = 241; }else
    if($itm == 5) { $prc = 336; }else
    if($itm == 6) { $prc = 442; }else
    if($itm == 7) { $prc = 517; }else
    if($itm == 8) { $prc = 527; }else
    if($itm == 9) { $prc = 546; }else
    if($itm == 10) { $prc = 548; }else
    if($itm == 11) { $prc = 539; }else
    if($itm == 12) { $prc = 615; }else
    if($itm == 13) { $prc = 631; }else
    if($itm == 14) { $prc = 632; }else
    if($itm == 15) { $prc = 701; }

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
          	$mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id` ,`egg`,`pok`,`shiny`,`breed`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`, `count`) VALUES ('".$_SESSION['user_id']."','999','1','".$eg."','0','1','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."','1') ");
          	minus_item($sl,1,$user_id);
          	echo "Яйцо успешно преобретено!";
          	return;
          }else{
          	echo "Не достаточно кредитов!";
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
<h1>Магазин</h1>
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
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='1'; itname.innerHTML='Яйцо Sigilyph'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Sigilyph</td><td align="right" width="150" class="bottom_dot">1500000 кр.</td>
  </tr>

  <tr>
  <td>2.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='2'; itname.innerHTML='Яйцо Sudowoodo'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Sudowoodo</td><td align="right" width="150" class="bottom_dot">2000000 кр.</td>
  </tr>

  <tr>
  <td>3.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='3'; itname.innerHTML='Яйцо Exeggcute'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Exeggcute</td><td align="right" width="150" class="bottom_dot">1000000 кр.</td>
  </tr>

   <tr>
  <td>4.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='4'; itname.innerHTML='Яйцо  Miltank'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Miltank</td><td align="right" width="150" class="bottom_dot">1000000 кр.</td>
  </tr>

  <tr>
  <td>5.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='5'; itname.innerHTML='Яйцо Seviper'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Seviper</td><td align="right" width="150" class="bottom_dot">1200000 кр.</td>
  </tr>

  <tr>
  <td>6.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='6'; itname.innerHTML='Яйцо Spiritomb'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Spiritomb</td><td align="right" width="150" class="bottom_dot">1500000 кр.</td>
  </tr>

  <tr>
  <td>7.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='7'; itname.innerHTML='Яйцо Munna'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Munna</td><td align="right" width="150" class="bottom_dot">1500000 кр.</td>
  </tr>

  <tr>
  <td>8.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='8'; itname.innerHTML='Яйцо Woobat'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Woobat</td><td align="right" width="150" class="bottom_dot">1200000 кр.</td>
  </tr>

  <tr>
  <td>9.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='9'; itname.innerHTML='Яйцо Cottonee'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Cottonee</td><td align="right" width="150" class="bottom_dot">800000 кр.</td>
  </tr>

    <tr>
  <td>10.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='10'; itname.innerHTML='Яйцо Petilil'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Petilil</td><td align="right" width="150" class="bottom_dot">3000000 кр.</td>
  </tr>

    <tr>
  <td>11.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='11'; itname.innerHTML='Яйцо Sawk'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Sawk</td><td align="right" width="150" class="bottom_dot">3000000 кр.</td>
  </tr>

    <tr>
  <td>12.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='12'; itname.innerHTML='Яйцо Cryogonal'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Cryogonal</td><td align="right" width="150" class="bottom_dot">3000000 кр.</td>
  </tr>

    <tr>
  <td>13.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='13'; itname.innerHTML='Яйцо Heatmor'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Heatmor</td><td align="right" width="150" class="bottom_dot">3000000 кр.</td>
  </tr>

    <tr>
  <td>14.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='14'; itname.innerHTML='Яйцо Durant'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Durant</td><td align="right" width="150" class="bottom_dot">3000000 кр.</td>
  </tr>

    <tr>
  <td>15.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='15'; itname.innerHTML='Яйцо Hawlucha'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Hawlucha</td><td align="right" width="150" class="bottom_dot">5000000 кр.</td>
  </tr>

  </tbody>
  </table>
  </div>

</td>
<td align="center" width="200">
<form name='FormBuy' action='game.php?fun=m_npc&npc_id=149' method='post'>
<input name="sellID" type="hidden" value="0">
<img src="/img/items/blank.gif" width="32" height="32" border="0" name="pic" id="pic">
<div id="itname">&nbsp;</div>
<br>
<input type="submit" value="Купить" style="width:70" name="kr"><br>
</form>
</td>
</tr>
</tbody>
</table>
<?php 
return ;
}