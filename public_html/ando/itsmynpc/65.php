<?php 
if(empty($answer)){
	$info1 = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '1'")->fetch_assoc();
	$info2 = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '500'")->fetch_assoc();
function price_item($itm){
		if($itm == 1) { $prc = 800000; }else
		if($itm == 2) { $prc = 1000000; }else
		if($itm == 3) { $prc = 1000000; }else
		if($itm == 4) { $prc = 1200000; }else
		if($itm == 5) { $prc = 1500000; }else
		if($itm == 6) { $prc = 1500000; }else
		if($itm == 7) { $prc = 1500000; }else
		if($itm == 8) { $prc = 2500000; }else
		if($itm == 9) { $prc = 2500000; }else
		if($itm == 10) { $prc = 5000000; }else
		if($itm == 11) { $prc = 6000000; }else
		if($itm == 12) { $prc = 7000000; }else
		if($itm == 13) { $prc = 8000000; }else
		if($itm == 14) { $prc = 10000000; }else
		if($itm == 15) { $prc = 14000000; }else
		if($itm == 16) { $prc = 20000000; }

		else{return false;}
		return $prc;
	}
function inf_egg($itm){
		if($itm == 1) { $prc = 290; }else
		if($itm == 2) { $prc = 439; }else
		if($itm == 3) { $prc = 531; }else
		if($itm == 4) { $prc = 556; }else
		if($itm == 5) { $prc = 538; }else
		if($itm == 6) { $prc = 120; }else
		if($itm == 7) { $prc = 580; }else
		if($itm == 8) { $prc = 546; }else
		if($itm == 9) { $prc = 131; }else
		if($itm == 10) { $prc = 238; }else
		if($itm == 11) { $prc = 574; }else
		if($itm == 12) { $prc = 214; }else
		if($itm == 13) { $prc = 529; }else
		if($itm == 14) { $prc = 377; }else
		if($itm == 15) { $prc = 621; }else
		if($itm == 16) { $prc = 636; }

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
          	$mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id` ,`count`,`egg`,`pok`,`shiny`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$_SESSION['user_id']."','999','1','1','".$eg."','0','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."') ");
          	minus_item($sl,1,$user_id);
          	echo "Яйцо успешно преобретено!";
          	return;
          }else{
          	echo "Не достаточно средств!";
          	return;
          }
		}elseif(array_key_exists('jem',$_POST)){
           $sl = price_item($sell)/100000;
          if($sl <= $info2['count']){
          	$eg = inf_egg($sell);
          	$reborn = time() + (3600*24)*rand(6,9);
          	$mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id` ,`count`,`egg`,`pok`,`shiny`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$_SESSION['user_id']."','999','1','1','".$eg."','0','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."') ");
          	minus_item($sl,500,$user_id);
          	echo "Яйцо успешно преобретено!";
          	return;
          }else{
          	echo "Не достаточно средств!";
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
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='1'; itname.innerHTML='Яйцо Nincada'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Nincada</td><td align="right" width="150" class="bottom_dot">800 000 кр.<br>или 8 жем.</td>
  </tr>

  <tr>
  <td>2.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='2'; itname.innerHTML='Яйцо Mime Jr.'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Mime Jr.</td><td align="right" width="150" class="bottom_dot">1 000 000 кр.<br>или 10 жем.</td>
  </tr>

  <tr>
  <td>3.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='3'; itname.innerHTML='Яйцо Audino'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Audino</td><td align="right" width="150" class="bottom_dot">1 000 000 кр.<br>или 10 жем.</td>
  </tr>

   <tr>
  <td>4.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='4'; itname.innerHTML='Яйцо  Maractus'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо  Maractus</td><td align="right" width="150" class="bottom_dot">1 200 000 кр.<br>или 12 жем.</td>
  </tr>

   <tr>
  <td>5.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='5'; itname.innerHTML='Яйцо Throh'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Throh</td><td align="right" width="150" class="bottom_dot">1 500 000 кр.<br>или 15 жем.</td>
  </tr>

  <tr>
  <td>6.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='6'; itname.innerHTML='Яйцо Staryu'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Staryu</td><td align="right" width="150" class="bottom_dot">1 500 000 кр.<br>или 15 жем.</td>
  </tr>

  <tr>
  <td>7.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='7'; itname.innerHTML='Яйцо Ducklett'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Ducklett</td><td align="right" width="150" class="bottom_dot">1 500 000 кр.<br>или 15 жем.</td>
  </tr>

  <tr>
  <td>8.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='8'; itname.innerHTML='Яйцо Cottonee'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Cottonee</td><td align="right" width="150" class="bottom_dot">2 500 000 кр.<br>или 25 жем.</td>
  </tr>

  <tr>
  <td>9.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='9'; itname.innerHTML='Яйцо Lapras'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Lapras</td><td align="right" width="150" class="bottom_dot">2 500 000 кр.<br>или 25 жем.</td>
  </tr>

  <tr>
  <td>10.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='10'; itname.innerHTML='Яйцо Smoochum'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Smoochum</td><td align="right" width="150" class="bottom_dot">5 000 000 кр.<br>или 50 жем.</td>
  </tr>

  <tr>
  <td>11.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='11'; itname.innerHTML='Яйцо Gothita'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Gothita</td><td align="right" width="150" class="bottom_dot">6 000 000 кр.<br>или 60 жем.</td>
  </tr>

  <tr>
  <td>12.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='12'; itname.innerHTML='Яйцо Heracross'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Heracross</td><td align="right" width="150" class="bottom_dot">7 000 000 кр.<br>или 70 жем.</td>
  </tr>

   <tr>
  <td>13.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='13'; itname.innerHTML='Яйцо Drilbur'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Drilbur</td><td align="right" width="150" class="bottom_dot">8 000 000 кр.<br>или 80 жем.</td>
  </tr>

  <tr>
  <td>14.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='14'; itname.innerHTML='Яйцо Regirock'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Regirock</td><td align="right" width="150" class="bottom_dot">10 000 000 кр.<br>или 100 жем.</td>
  </tr>

  <tr>
  <td>15.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='15'; itname.innerHTML='Яйцо Druddigon'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Druddigon</td><td align="right" width="150" class="bottom_dot">14 000 000 кр.<br>или 140 жем.</td>
  </tr>

  <tr>
  <td>16.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='16'; itname.innerHTML='Яйцо Larvesta'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://l-17.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Larvesta</td><td align="right" width="150" class="bottom_dot">20 000 000 кр.<br>или 200 жем.</td>
  </tr>

  </tbody>
  </table>
  </div>

</td>
<td align="center" width="200">
<form name='FormBuy' action='game.php?fun=m_npc&npc_id=65' method='post'>
<input name="sellID" type="hidden" value="0">
<img src="/img/items/blank.gif" width="32" height="32" border="0" name="pic" id="pic">
<div id="itname">&nbsp;</div>
<br>
<input type="submit" value="За кр." style="width:70" name="kr"><br>
<input type="submit" value="За жем." style="width:70" name="jem">
</form>
</td>
</tr>
</tbody>
</table>
<?php 
return;
}