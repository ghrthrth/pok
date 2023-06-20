<?php 
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Мидас';
/*if($npc == 4000 && empty($answer)){
    $textNPC = 'Спасибо за помощь юный тренер!Ах сколько чудесных букетов!За твою помощь я бы хотел наградить тебя наградой,выбери что-нибудь подходящее для себя...';
  $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=4000&answ_id=1&map=1">А что у вас есть?! ...</a></li>';
}else*/if($npc == 153 && empty($answer)){
  $textNPC = 'Покемоны будут не доступны для разведения после вылупления!.';
  $info1 = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '500'")->fetch_assoc();
function price_item($itm){
    if($itm == 1) { $prc = 20; }else
    if($itm == 2) { $prc = 20; }else
    if($itm == 3) { $prc = 30; }else
    if($itm == 4) { $prc = 200; }else
    if($itm == 5) { $prc = 50; }else
    if($itm == 6) { $prc = 50; }else
    if($itm == 7) { $prc = 100; }else
    if($itm == 8) { $prc = 400; }else
    if($itm == 9) { $prc = 200; }else
    if($itm == 10) { $prc = 200; }else
    if($itm == 11) { $prc = 800; }

    else{return false;}
    return $prc;
  }
function inf_egg($itm){
    if($itm == 1) { $prc = 741; }else
    if($itm == 2) { $prc = 529; }else
    if($itm == 3) { $prc = 610; }else
    if($itm == 4) { $prc = 767; }else
    if($itm == 5) { $prc = 669; }else
    if($itm == 6) { $prc = 769; }else
    if($itm == 7) { $prc = 446; }else
    if($itm == 8) { $prc = 803; }else
    if($itm == 9) { $prc = 566; }else
    if($itm == 10) { $prc = 808; }else
    if($itm == 11) { $prc = 791; }

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
            minus_item($sl,500,$user_id);
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
<h1>Pearljam</h1>
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
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='1'; itname.innerHTML='Яйцо Oricorio'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Oricorio</td><td align="right" width="150" class="bottom_dot">20 жем.</td>
  </tr>

  <tr>
  <td>2.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='2'; itname.innerHTML='Яйцо Drilbur'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Drilbur</td><td align="right" width="150" class="bottom_dot">20 жем.</td>
  </tr>

  <tr>
  <td>3.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='3'; itname.innerHTML='Яйцо Axew'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Axew</td><td align="right" width="150" class="bottom_dot">30 жем.</td>
  </tr>

   <tr>
  <td>4.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='4'; itname.innerHTML='Яйцо  Wimpod'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Wimpod</td><td align="right" width="150" class="bottom_dot">200 жем.</td>
  </tr>

  <tr>
  <td>5.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='5'; itname.innerHTML='Яйцо Flabebe'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Flabebe</td><td align="right" width="150" class="bottom_dot">50 жем.</td>
  </tr>

  <tr>
  <td>6.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='6'; itname.innerHTML='Яйцо Sandygast'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Sandygast</td><td align="right" width="150" class="bottom_dot">50 жем.</td>
  </tr>

  <tr>
  <td>7.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='7'; itname.innerHTML='Яйцо Munchlax'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Munchlax</td><td align="right" width="150" class="bottom_dot">100 жем.</td>
  </tr>

  <tr>
  <td>8.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='8'; itname.innerHTML='Яйцо Poipole'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Poipole</td><td align="right" width="150" class="bottom_dot">400 жем.</td>
  </tr>

  <tr>
  <td>9.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='9'; itname.innerHTML='Яйцо Archen'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Archen</td><td align="right" width="150" class="bottom_dot">200 жем.</td>
  </tr>

    <tr>
  <td>10.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='10'; itname.innerHTML='Яйцо Meltan'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Meltan</td><td align="right" width="150" class="bottom_dot">200 жем.</td>
  </tr>

    <tr>
  <td>11.</td>
  <td class="bottom_dot">
  <img onclick="pic.src=this.src; document.FormBuy.sellID.value='11'; itname.innerHTML='Яйцо Solgaleo'" style="CURSOR:POINTER" width="32" height="32" border="0" src="http://oldpokemon.ru/img/items/999.gif">
  </td>
  <td class="bottom_dot">Яйцо Solgaleo</td><td align="right" width="150" class="bottom_dot">800 жем.</td>
  </tr>


  </tbody>
  </table>
  </div>

</td>
<td align="center" width="200">
<form name='FormBuy' action='game.php?fun=m_npc&npc_id=153' method='post'>
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