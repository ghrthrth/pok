<?php 
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Интендант Ваббашар';
if($npc == 178 && empty($answer)){
  $textNPC = 'Вот.';
  $info1 = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '1088'")->fetch_assoc();
function price_item($itm){
    if($itm == 1) { $prc = 30; }else
    if($itm == 2) { $prc = 30; }else
    if($itm == 3) { $prc = 50; }else
    if($itm == 4) { $prc = 50; }else
    if($itm == 5) { $prc = 75; }else
    if($itm == 6) { $prc = 75; }else
    if($itm == 7) { $prc = 100; }else
    if($itm == 8) { $prc = 100; }else
    if($itm == 9) { $prc = 150; }else
    if($itm == 10) { $prc = 200; }else
    if($itm == 11) { $prc = 250; }else
    if($itm == 12) { $prc = 300; }else
    if($itm == 13) { $prc = 300; }

    else{return false;}
    return $prc;
  }
function inf_egg($itm){
    if($itm == 1) { $prc = 456; }else
    if($itm == 2) { $prc = 449; }else
    if($itm == 3) { $prc = 451; }else
    if($itm == 4) { $prc = 519; }else
    if($itm == 5) { $prc = 538; }else
    if($itm == 6) { $prc = 539; }else
    if($itm == 7) { $prc = 570; }else
    if($itm == 8) { $prc = 562; }else
    if($itm == 9) { $prc = 551; }else
    if($itm == 10) { $prc = 566; }else
    if($itm == 11) { $prc = 446; }else
    if($itm == 12) { $prc = 251; }else
    if($itm == 13) { $prc = 385; }

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
            minus_item($sl,1088,$user_id);
            echo "Яйцо успешно преобретено!";
            return;
          }else{
            echo "Не достаточно Ваббашаров!";
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
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='1'; itname.innerHTML='Яйцо Finneon'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Finneon</td><td align="right" width="150" class="bottom_dot">30 Ваббашаров</td>
  </tr>

  <tr>
  <td>2.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='2'; itname.innerHTML='Яйцо Hippopotas'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Hippopotas</td><td align="right" width="150" class="bottom_dot">30 Ваббашаров</td>
  </tr>

  <tr>
  <td>3.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='3'; itname.innerHTML='Яйцо Skorupi'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Skorupi</td><td align="right" width="150" class="bottom_dot">50 Ваббашаров</td>
  </tr>

   <tr>
  <td>4.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='4'; itname.innerHTML='Яйцо  Pidove'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Pidove</td><td align="right" width="150" class="bottom_dot">50 Ваббашаров</td>
  </tr>

  <tr>
  <td>5.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='5'; itname.innerHTML='Яйцо Throh'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Throh</td><td align="right" width="150" class="bottom_dot">75 Ваббашаров</td>
  </tr>

  <tr>
  <td>6.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='6'; itname.innerHTML='Яйцо Sawk'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Sawk</td><td align="right" width="150" class="bottom_dot">75 Ваббашаров</td>
  </tr>

  <tr>
  <td>7.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='7'; itname.innerHTML='Яйцо Zorua'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Zorua</td><td align="right" width="150" class="bottom_dot">100 Ваббашаров</td>
  </tr>

  <tr>
  <td>8.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='8'; itname.innerHTML='Яйцо Yamask'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Yamask</td><td align="right" width="150" class="bottom_dot">100 Ваббашаров</td>
  </tr>

  <tr>
  <td>9.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='9'; itname.innerHTML='Яйцо Sandile'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Sandile</td><td align="right" width="150" class="bottom_dot">150 Ваббашаров</td>
  </tr>

  <tr>
  <td>9.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='10'; itname.innerHTML='Яйцо Archen'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Archen</td><td align="right" width="150" class="bottom_dot">200 Ваббашаров</td>
  </tr>

  <tr>
  <td>9.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='11'; itname.innerHTML='Яйцо Munchlax'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Munchlax</td><td align="right" width="150" class="bottom_dot">250 Ваббашаров</td>
  </tr>

  <tr>
  <td>9.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='12'; itname.innerHTML='Яйцо Celebi'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Celebi</td><td align="right" width="150" class="bottom_dot">300 Ваббашаров</td>
  </tr>

  <tr>
  <td>9.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='13'; itname.innerHTML='Яйцо Jirachi'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Jirachi</td><td align="right" width="150" class="bottom_dot">300 Ваббашаров</td>
  </tr>

  </tbody>
  </table>
  </div>

</td>
<td align="center" width="200">
<form name='FormBuy' action='game.php?fun=m_npc&npc_id=178' method='post'>
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