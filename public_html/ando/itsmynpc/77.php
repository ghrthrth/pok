<?php 
if(empty($answer)){
	$info1 = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '1033'")->fetch_assoc();
function price_item($itm){
		if($itm == 1) { $prc = 30; }else
		if($itm == 2) { $prc = 30; }else
		if($itm == 3) { $prc = 50; }else
		if($itm == 4) { $prc = 50; }else
		if($itm == 5) { $prc = 80; }else
		if($itm == 6) { $prc = 80; }else
		if($itm == 7) { $prc = 100; }else
		if($itm == 8) { $prc = 100; }else
		if($itm == 9) { $prc = 150; }

		else{return false;}
		return $prc;
	}
function inf_egg($itm){
		if($itm == 1) { $prc = 434; }else
		if($itm == 2) { $prc = 200; }else
		if($itm == 3) { $prc = 629; }else
		if($itm == 4) { $prc = 425; }else
		if($itm == 5) { $prc = 239; }else
		if($itm == 6) { $prc = 240; }else
		if($itm == 7) { $prc = 228; }else
		if($itm == 8) { $prc = 679; }else
		if($itm == 9) { $prc = 472; }

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
          	minus_item($sl,1033,$user_id);
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
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='1'; itname.innerHTML='Яйцо Stunky'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Stunky</td><td align="right" width="150" class="bottom_dot">30 тыкв</td>
  </tr>

  <tr>
  <td>2.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='2'; itname.innerHTML='Яйцо Misdreavus'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Misdreavus</td><td align="right" width="150" class="bottom_dot">30 тыкв</td>
  </tr>

  <tr>
  <td>3.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='3'; itname.innerHTML='Яйцо Vullaby'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Vullaby</td><td align="right" width="150" class="bottom_dot">50 тыкв</td>
  </tr>

   <tr>
  <td>4.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='4'; itname.innerHTML='Яйцо  Drifloon'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Drifloon</td><td align="right" width="150" class="bottom_dot">50 тыкв</td>
  </tr>

  <tr>
  <td>5.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='5'; itname.innerHTML='Яйцо Elekid'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Elekid</td><td align="right" width="150" class="bottom_dot">80 тыкв</td>
  </tr>

  <tr>
  <td>6.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='6'; itname.innerHTML='Яйцо Magby'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Magby</td><td align="right" width="150" class="bottom_dot">80 тыкв</td>
  </tr>

  <tr>
  <td>7.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='7'; itname.innerHTML='Яйцо Houndour'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Houndour</td><td align="right" width="150" class="bottom_dot">100 тыкв</td>
  </tr>

  <tr>
  <td>8.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='8'; itname.innerHTML='Яйцо Honedge'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Honedge</td><td align="right" width="150" class="bottom_dot">100 тыкв</td>
  </tr>

  <tr>
  <td>9.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='9'; itname.innerHTML='Яйцо Gliscor'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Gliscor</td><td align="right" width="150" class="bottom_dot">150 тыкв</td>
  </tr>

  </tbody>
  </table>
  </div>

</td>
<td align="center" width="200">
<form name='FormBuy' action='game.php?fun=m_npc&npc_id=77' method='post'>
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
return;
}