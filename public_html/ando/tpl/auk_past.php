<?php
$pok_bd = $mysqli->query('SELECT `id`,`basenum`,`name`,`lvl`,`nn`,`name_new` FROM `user_pokemons` WHERE `user_id` = '.$_SESSION['user_id'].' AND `active` = 1 AND `start_pok` = 0 AND `trade` = 0 AND `master` = '.$_SESSION['user_id']);
$item_bd = $mysqli->query('SELECT `ui`.`item_id`,`ui`.`count`,`bi`.`trade`,`ui`.`user_id`,`bi`.`name`  FROM `user_items`  AS `ui` INNER JOIN `base_items` AS `bi`
										ON
											`bi`.`id` = `ui`.`item_id` WHERE `ui`.`user_id` = '.$_SESSION['user_id'].' AND `bi`.`trade` = 0 ');
if(!empty($_POST['submit_p'])){
  $u_pok_count = $mysqli->query('SELECT * FROM `user_pokemons` WHERE `user_id` = '.$_SESSION['user_id'].' AND `active` = 1 ');
  $n_stav = obr_chis($_POST['n_price_p']);
  $v_stav = obr_chis($_POST['v_price_p']);
  $hod = obr_chis($_POST['hod_p']);
  $day = obr_chis($_POST['day_p']);
  $pok = obr_chis($_POST['pokid']);
    if(!item_isset(1,10000)){die("<script>alert('У вас недостаточно кредитов!'); location.href='game.php?fun=auk';</script>");}
     minus_item(10000,1);
    if($n_stav < 30000){die("<script>alert('Начальная цена не должна быть ниже 30.000 кредитов!'); location.href='game.php?fun=auk';</script>");}
    if(($v_stav < ($n_stav+$hod)) and ($v_stav != 0)){die("<script>alert('Выкуп не может быть меньше суммы начальной ставки и хода!'); location.href='game.php?fun=auk';</script>");}
    if($day < 3){die("<script>alert('Количество дней не должно быть меньше 3!'); location.href='game.php?fun=auk';</script>");}
    if($day > 30){die("<script>alert('Количество дней не должно быть больше 30!'); location.href='game.php?fun=auk';</script>");}
    if($u_pok_count->num_rows == 1){die("<script>alert('У вас в команде должен остаться хотя бы 1 покемон!'); location.href='game.php?fun=auk';</script>");}
    if(empty($n_stav) || empty($hod) || empty($day) || empty($pok)){die("<script>alert('Ошибка!'); location.href='game.php?fun=auk';</script>");}
    $pok_add = $mysqli->query('SELECT * FROM `user_pokemons` WHERE `id` = '.$pok.' AND `user_id` = '.$_SESSION['user_id'].' AND `active` = 1 AND `start_pok` = 0 AND `trade` = 0 AND `master` = '.$_SESSION['user_id'])->fetch_assoc();
    if($pok_add){
      $timer = time()+3600*24*$day;
      if($pok_add['nn'] == 1){
        $name = '<a href=javascript: title=Информация onclick=window.open("game.php?fun=pokeinf&p_id='.$pok.'","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");><img src="https://claimbe.ru/img/pkmna/'.numbPok($pok_add['basenum']).'.gif"> #'.numbPok($pok_add['basenum']).' '.$pok_add['name_new'].' '.$pok_add['lvl'].'-lvl</a>';
      }else{
        $name = '<a href=javascript: title=Информация onclick=window.open("game.php?fun=pokeinf&p_id='.$pok.'","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");><img src="https://claimbe.ru/img/pkmna/'.numbPok($pok_add['basenum']).'.gif"> #'.numbPok($pok_add['basenum']).' '.$pok_add['name'].' '.$pok_add['lvl'].'-lvl</a>';
      }
			$mysqli->query("UPDATE `user_pokemons` SET `user_id` = '2' , `tipe_otc` = '1' , `master`= '2' WHERE `id` = ".$pok);
      $mysqli->query("INSERT INTO `auk` (`time`,`tipe`,`user`,`user_last`,`name`,`id_lot`,`count`,`n_stav`,`v_stav`,`last_stav`,`hod`) VALUES ('".$timer."',1,'".$_SESSION['user_id']."',0,'".$name."','".$pok."',1,'".$n_stav."','".$v_stav."',0,'".$hod."') ");
    }else{
      die("<script>alert('Ошибка!'); location.href='game.php?fun=auk';</script>");
    }
		die("<script>location.href='game.php?fun=auk';</script>");
}
if(!empty($_GET['stavka'])){
  $auk = $mysqli->query('SELECT * FROM `auk` WHERE `id` = '.$_GET['stavka'])->fetch_assoc();
  if($auk['last_stav'] == 0){
    $nst = $auk['n_stav'];
  }else{
    $nst = $auk['last_stav']+$auk['hod'];
  }
  if($auk){
    if($auk['user'] != $_SESSION['user_id']){
      if(item_isset(1,$nst)){
        if($auk['user_last'] != $_SESSION['user_id']){
          if($auk['last_stav'] != 0){
            plus_item($auk['last_stav'],1,$auk['user_last']);
          }
          $mysqli->query("UPDATE `auk` SET `last_stav` = '.$nst.' , `user_last` = '".$_SESSION['user_id']."' WHERE `id` = ".$auk['id']);
						minus_item($nst,1);
					if($nst >= $auk['v_stav']){
						$mysqli->query("UPDATE `auk` SET `v_stav` = '0'  WHERE `id` = ".$auk['id']);
					}
          $text = "Вашу ставку на лот №".$auk['id']." ".$auk['name']." перебили.";
         $date = get_last_online(time());
 	    		$mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('2','".$auk['user_last']."','".$text."','Аукцион','".$date."')");
					$mysqli->query("INSERT INTO `toast` (`user`, `type`, `head`,`text`) VALUES ('".$auk['user_last']."','info','Аукцион','Ваша ставка перебита!')");
        }else{
          die("<script>alert('Нельзя перебить свою же ставку!'); location.href='game.php?fun=auk';</script>");
        }
      }else{
        die("<script>alert('У вас недостаточно кредитов!'); location.href='game.php?fun=auk';</script>");
      }
    }else{
      die("<script>alert('Нельзя сделать ставку на свой лот!'); location.href='game.php?fun=auk';</script>");
    }
  }else{
    die("<script>alert('Ошибка!'); location.href='game.php?fun=auk';</script>");
  }
	die("<script>location.href='game.php?fun=auk';</script>");
}
if(!empty($_GET['vikup'])){
  $auk = $mysqli->query('SELECT * FROM `auk` WHERE `id` = '.$_GET['vikup'])->fetch_assoc();
	if($auk){
		if($auk['v_stav']){
	    if($auk['user'] != $_SESSION['user_id']){
	      if(item_isset(1,$auk['v_stav'])){
	        $mysqli->query("UPDATE `user_pokemons` SET `user_id` = '".$_SESSION['user_id']."' , `tipe_otc` = '0' , `master`= '".$_SESSION['user_id']."' , `active` = '0' WHERE `id` = ".$auk['id_lot']);
					minus_item($auk['v_stav'],1,$_SESSION['user_id']);
          if($auk['last_stav'] > 0){
          plus_item($auk['last_stav'],1,$auk['user_last']);
          } 
          plus_item($auk['v_stav'],1,$auk['user']);
					$mysqli->query("DELETE FROM `auk` WHERE `id` = '".$auk['id']."'");
				}else{
					die("<script>alert('У вас недостаточно кредитов!'); location.href='game.php?fun=auk';</script>");
				}
			}else{
				die("<script>alert('Нельзя выкупить свой лот!'); location.href='game.php?fun=auk';</script>");
			}
		}else{
			die("<script>alert('Этот лот нельзя выкупить!'); location.href='game.php?fun=auk';</script>");
		}
	}else{
		die("<script>alert('Ошибка!'); location.href='game.php?fun=auk';</script>");
	}
	die("<script>location.href='game.php?fun=auk';</script>");
}
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script language="JavaScript">
    function n_stav(id) {
        q=confirm('Вы уверены что хотите сделать ставку?');
        if (q) window.location='game.php?fun=auk&stavka='+id+'';
    }
    function v_stav(id) {
        q=confirm('Вы уверены что хотите выкупить лот?');
        if (q) window.location='game.php?fun=auk&vikup='+id+'';
    }
 </script>
<style>
table#lot_list {width: 100%; border-collapse: collapse;}
table#lot_list  td {padding: 8px;}
table#lot_list thead tr {font-weight: bold; border-top: 1px solid #e8e9eb;}
table#lot_list tr {border-bottom: 1px solid #e8e9eb;}
</style>
<center>
  <table width="700px">
    <tr>
      <td width="50%">
        <h2>Выставить на аукцион покемона</h2>
        <form action='' method='POST'>
        <label>Начальная цена</label><br>
        <input placeholder="Начальная цена" name='n_price_p' type='text'><br>
        <label>Цена за выкуп(0 если не надо)</label><br>
        <input placeholder="Цена за выкуп" name='v_price_p' type='text'><br>
        <label>Ход</label><br>
        <input placeholder="Ход" name='hod_p' type='text'><br>
        <label>Количество дней</label><br>
        <input placeholder="Количество дней" name='day_p' type='text'><br>
        <label>Выберите покемона</label><br>
        <select name='pokid'>
          <? while($pok = $pok_bd->fetch_assoc()){
              if($pok['nn'] == 1){
                echo "<option value='".$pok['id']."'>#".numbPok($pok['basenum'])." ".$pok['name_new']." ".$pok['lvl']."-lvl</option>";
              }else{
                echo "<option value='".$pok['id']."'>#".numbPok($pok['basenum'])." ".$pok['name']." ".$pok['lvl']."-lvl</option>";
              }
          } ?>
        </select><br><br>
        <input type='submit' name='submit_p' value='Выставить'>
      </form>
      </td>
      <td width="50%"><h2>Выставить на аукцион предмет</h2>
        <form action='' method='POST'>
        <label>Начальная цена</label><br>
        <input placeholder="Начальная цена"  name='n_price_i' type='text'><br>
        <label>Цена за выкуп(0 если не надо)</label><br>
        <input placeholder="Цена за выкуп"  name='v_price_i' type='text'><br>
        <label>Ход</label><br>
        <input placeholder="Ход"  name='hod_i' type='text'><br>
        <label>Количество дней</label><br>
        <input placeholder="Количество дней"  name='day_i' type='text'><br>
        <label>Выберите предмет</label><br>
        <select name='itid'>
          <? while($it = $item_bd->fetch_assoc()){
                echo "<option value='".$it['count']."'>".$it['name']."</option>";
          } ?>
        </select><br><br>
        <input type='submit' name='submit_i' value='Выставить'>
      </form>
      </td>
    </tr>
  </table>
  <h1>Список лотов</h1>
<?
$lot_bd = $mysqli->query('SELECT * FROM `auk` ORDER BY  `id` ASC');
?>
  <table id="lot_list">
    <thead>
    <tr>
      <td>№</td>
      <td>Название</td>
      <td>Продавец</td>
      <td>Ставка</td>
      <td>Ход</td>
      <td>Время</td>
      <td>Поставить</td>
      <td>Выкупить</td>
    </tr>
  </thead>
  <tbody>
  <? while($lot = $lot_bd->fetch_assoc()){
    $us = $mysqli->query('SELECT * FROM `users` WHERE `id` = '.$lot['user']);
    if($lot['v_stav'] == 0){
      $vik = 'Выкуп недоступен';
    }else{
      $vik = "<button  onclick='v_stav(".$lot['id'].")'>Выкупить за ".$lot['v_stav']."</button>";
    }
    if($lot['last_stav'] == 0){
      $nst = $lot['n_stav'];
      $stav = $lot['n_stav'];
      $u = "";
    }else{
      $nst = $lot['last_stav'];
      $stav = $lot['last_stav']+$lot['hod'];
      $u = "от <a href='/game.php?fun=treninf&to_id=".$lot['user_last']."' onclick=\"window.open('/game.php?fun=treninf&to_id=".$lot['user_last']."', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;\"><IMG SRC='img/question.gif' border=0></a> <font color='".colorsUsers(infUsr($lot['user_last'],'groups'))."'>".infUsr($lot["user_last"],'login')."</font>";
    }
        ?>
<tr>
  <td>№<?=$lot['id'];?></td>
  <td><?=$lot['name'];?></td>
  <td>от <a href='/game.php?fun=treninf&to_id=<?=$lot['user'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$lot['user'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='img/question.gif' border=0></a> <font color='<?=colorsUsers(infUsr($lot["user"],"groups"));?>'><?=infUsr($lot["user"],"login");?></font></td>
  <td><?=$nst;?> <?=$u;?></td>
  <td><?=$lot['hod'];?></td>
  <td>Лот активен до <?=Date("H:i d.m", $lot['time']);?></td>
  <td><button onclick="n_stav(<?=$lot['id'];?>)">Сделать ставку <?=$stav;?></button></td>
  <td><?=$vik;?></td>
</tr>
        <?

  } ?>
</tbody>
  </table>
  <br><br>

</center>
  <h2>Правила Аукциона</h2>
  <ol>
    <li>Количество дней должно быть от 3 до 30!</li>
    <li>Выставление лота платное и стоит 10.000 кредитов.</li>
    <li>Выкуп не может быть меньше суммы начальной ставки и хода!</li>
    <li>Начальная цена не должна быть ниже 30.000 кредитов!</li>
  </ol>
