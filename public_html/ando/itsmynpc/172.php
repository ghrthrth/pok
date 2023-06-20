<?php 
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Хейдес';
/*if($npc == 4000 && empty($answer)){
    $textNPC = 'Спасибо за помощь юный тренер!Ах сколько чудесных букетов!За твою помощь я бы хотел наградить тебя наградой,выбери что-нибудь подходящее для себя...';
  $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=4000&answ_id=1&map=1">А что у вас есть?! ...</a></li>';
}else*/if($npc == 172 && empty($answer)){
  $textNPC = 'Покемоны будут не доступны для разведения после вылупления!.';
  $info1 = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '1'")->fetch_assoc();
function price_item($itm){
    if($itm == 1) { $prc = 1000000; }else
    if($itm == 2) { $prc = 1000000; }else
    if($itm == 3) { $prc = 1000000; }else
    if($itm == 4) { $prc = 1000000; }else
    if($itm == 5) { $prc = 1000000; }else
    if($itm == 6) { $prc = 3000000; }else
    if($itm == 7) { $prc = 5000000; }else
    if($itm == 8) { $prc = 6000000; }else
    if($itm == 9) { $prc = 6000000; }else
    if($itm == 10) { $prc = 8000000; }else
    if($itm == 11) { $prc = 10000000; }else
    if($itm == 12) { $prc = 12000000; }else
    if($itm == 13) { $prc = 13000000; }else
    if($itm == 14) { $prc = 15000000; }else
    if($itm == 15) { $prc = 50000000; }

    else{return false;}
    return $prc;
  }
function inf_egg($itm){
    if($itm == 1) { $prc = 559; }else
    if($itm == 2) { $prc = 442; }else
    if($itm == 3) { $prc = 431; }else
    if($itm == 4) { $prc = 415; }else
    if($itm == 5) { $prc = 343; }else
    if($itm == 6) { $prc = 597; }else
    if($itm == 7) { $prc = 280; }else
    if($itm == 8) { $prc = 214; }else
    if($itm == 9) { $prc = 328; }else
    if($itm == 10) { $prc = 610; }else
    if($itm == 11) { $prc = 669; }else
    if($itm == 12) { $prc = 704; }else
    if($itm == 13) { $prc = 371; }else
    if($itm == 14) { $prc = 374; }else
    if($itm == 15) { $prc = 483; }

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
            $mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id` ,`egg`,`pok`,`shiny`,`breed`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`, `count`) VALUES ('".$_SESSION['user_id']."','999','1','".$eg."','1','1','".rand(27,31)."','".rand(27,31)."','".rand(27,31)."','".rand(27,31)."','".rand(27,31)."','".rand(27,31)."','".$reborn."','1') ");
            minus_item($sl,1,$user_id);
            echo "Яйцо успешно преобретено!";
            return;
          }else{
            echo "Не достаточно жемчуга!";
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
<h1>Яйца Покемонов</h1>
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
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='1'; itname.innerHTML='Яйцо Scraggy'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Scraggy</td><td align="right" width="150" class="bottom_dot">1.000.000 кр.</td>
  </tr>

  <tr>
  <td>2.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='2'; itname.innerHTML='Яйцо Spiritomb'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Spiritomb</td><td align="right" width="150" class="bottom_dot">1.000.000 кр.</td>
  </tr>

  <tr>
  <td>3.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='3'; itname.innerHTML='Яйцо Glameow'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Glameow</td><td align="right" width="150" class="bottom_dot">1.000.000 кр.</td>
  </tr>

   <tr>
  <td>4.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='4'; itname.innerHTML='Яйцо  Combee'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Combee</td><td align="right" width="150" class="bottom_dot">1.000.000 кр.</td>
  </tr>

  <tr>
  <td>5.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='5'; itname.innerHTML='Яйцо Baltoy'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Baltoy</td><td align="right" width="150" class="bottom_dot">1.000.000 кр.</td>
  </tr>

  <tr>
  <td>6.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='6'; itname.innerHTML='Яйцо Ferroseed'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Ferroseed</td><td align="right" width="150" class="bottom_dot">3.000.000 кр.</td>
  </tr>

  <tr>
  <td>7.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='7'; itname.innerHTML='Яйцо Ralts'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Ralts</td><td align="right" width="150" class="bottom_dot">5.000.000 кр.</td>
  </tr>

  <tr>
  <td>8.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='8'; itname.innerHTML='Яйцо Heracross'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Heracross</td><td align="right" width="150" class="bottom_dot">6.000.000 кр.</td>
  </tr>

  <tr>
  <td>9.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='9'; itname.innerHTML='Яйцо Trapinch'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Trapinch</td><td align="right" width="150" class="bottom_dot">6.000.000 кр.</td>
  </tr>

    <tr>
  <td>10.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='10'; itname.innerHTML='Яйцо Axew'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Axew</td><td align="right" width="150" class="bottom_dot">8.000.000 кр.</td>
  </tr>

    <tr>
  <td>11.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='11'; itname.innerHTML='Яйцо Flabebe'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Flabebe</td><td align="right" width="150" class="bottom_dot">10.000.000 кр.</td>
  </tr>

    <tr>
  <td>12.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='12'; itname.innerHTML='Яйцо Goomy'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Goomy</td><td align="right" width="150" class="bottom_dot">12.000.000 кр.</td>
  </tr>

    <tr>
  <td>13.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='13'; itname.innerHTML='Яйцо Bagon'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Bagon</td><td align="right" width="150" class="bottom_dot">13.000.000 кр.</td>
  </tr>

    <tr>
  <td>14.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='14'; itname.innerHTML='Яйцо Beldum'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Beldum</td><td align="right" width="150" class="bottom_dot">15.000.000 кр.</td>
  </tr>

    <tr>
  <td>15.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='15'; itname.innerHTML='Яйцо Dialga'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Dialga</td><td align="right" width="150" class="bottom_dot">50.000.000 кр.</td>
  </tr>

  </tbody>
  </table>
  </div>

</td>
<td align="center" width="200">
<form name='FormBuy' action='game.php?fun=m_npc&npc_id=172' method='post'>
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