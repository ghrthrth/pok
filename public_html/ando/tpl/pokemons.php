<?php
include('ando/functions/tip.functions.php');
$eggrb = $mysqli->query("SELECT * FROM user_items WHERE egg = '1' and reborn <= '".time()."' ");
while($eggr = $eggrb->fetch_assoc()){
    EggBorn($eggr);
    $mysqli->query("DELETE FROM `user_items` WHERE `id` = '".$eggr['id']."'");
}
/*
$oldbell = $mysqli->query("SELECT * FROM user_items WHERE item_id = '231' and timedel <= '".time()."' ");
while($itemdel = $oldbell->fetch_assoc()){
    $mysqli->query("DELETE FROM `user_items` WHERE `item_id` = '231' ");
}
$graphbell = $mysqli->query("SELECT * FROM user_items WHERE item_id = '241' and timedel <= '".time()."' ");
while($itemdel = $graphbell->fetch_assoc()){
    $mysqli->query("DELETE FROM `user_items` WHERE `item_id` = '241' ");
}
*/
//$pok_my = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1 ORDER BY start_pok DESC limit 6');
$pokemon_on = dbSelect('*','user_pokemons','WHERE user_id = '.$_SESSION['user_id'].' AND active = 1 ORDER BY start_pok DESC limit 6', 1);
// AddMessage2Log('покемон он');
// AddMessage2Log($pokemon_on);
$stat_upd = $mysqli->query('SELECT id FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1');
$stat_upds = dbSelect('id', 'user_pokemons', 'WHERE user_id = '.$_SESSION['user_id'].' AND active = 1', 1);
while($stat_update = $stat_upds->fetch_assoc()){
    stat_updates($stat_update['id']);
}
if(isset($_GET['item'])){
    $item = obr_chis($_GET['item']);
    $pok = obr_chis($_GET['pok']);
    //$data = $mysqli->query('SELECT * FROM user_pokemons WHERE item_id = '.$item.' AND id = '.$pok.' AND user_id = '.$_SESSION['user_id'])->fetch_assoc();
	$data = dbSelect('*', 'user_pokemons', 'WHERE item_id = '.$item.' AND id = '.$pok.' AND user_id = '.$_SESSION['user_id'].'');
    if($data['item_id']){
        //$mysqli->query('UPDATE user_pokemons SET item_id = NULL WHERE id = '.$pok);
		dbUpdate('user_pokemons', 'item_id = NULL', 'id = '.$pok.'');
        if($item == 42 or $item == 1043){ }else{
            plus_item(1,$item);
        }
        die("<script>window.location.href='".$_SERVER['HTTP_REFERER']."';</script>");
    }
    else{
        die("<script>window.location.href='".$_SERVER['HTTP_REFERER']."';</script>");
    }
}
?> 
<script language="JavaScript">
    function vis(id, num) {
        eval("document.all.info" + num + ".style.visibility = \"hidden\";");
        eval("document.all.stats" + num + ".style.visibility = \"hidden\";");
        eval("document.all.moves" + num + ".style.visibility = \"hidden\";");
        eval("document.all.status" + num + ".style.visibility = \"hidden\";");
        eval("document.all." + id + ".style.visibility = \"visible\"");
    }
    function del_poke(id) {
        q=confirm('Вы уверены что хотите отпустить покемона?');
        if (q) window.location='game.php?fun=p_base&TP_id='+id+'&type=del';
    }
 </script>
 <style type="text/css">
    div.poke {position:relative; left:0; top:0; width:215px; height:200px; margin: 0 0 0 0; z-index:10; visibility:hidden;}
    div.item {position:relative;top:-53px;left:218px; visibility:visible;z-index:100;}
  </style>
<div align='center'><table border='0' width='980' align='center'><tr>
<?php
$i=0;
while($pok = $pokemon_on->fetch_assoc()){ 
    $pok_base = $mysqli->query('SELECT name,type,type_two FROM base_pokemon WHERE id = "'.$pok['basenum'].'"')->fetch_assoc();
	switch($pok['type']){
    case 'normal': $type = 'poketitle'; $img = 'normal'; $name = false; break;
    case 'shine': $type = 'poketitleshine'; $img = 'shine';  $name = 'shine'; break;
    case 'adminion': $type = 'poketitlesadminion'; $img = 'shine';  $name = 'shine'; break;
    case 'shadow': $type = 'poketitleshadow'; $img = 'shine'; $name = 'shadow'; break;
    case 'snowy': $type = 'poketitleshowy'; $img = 'shine'; $name = 'snowy'; break;
    case 'fighter': $type = 'poketitleshine'; $img = 'shine';  $name = 'fighter'; break;
    case 'contest': $type = 'poketitleshine'; $img = 'shine';  $name = 'contest'; break;
    case 'champion': $type = 'poketitlechampion'; $img = 'champion';  $name = 'champion'; break;
    case 'zombie': $type = 'poketitlezombie'; $img = 'zombie';  $name = 'zombie'; break;
    case 'nord': $type = 'poketitlenord'; $img = 'nord';  $name = 'Nord'; break;
    case 'gym': $type = 'poketitleshine'; $img = 'shine';  $name = 'gym'; break;
    case 'arena': $type = 'poketitle'; $img = 'normal';  $name = 'arena'; break;
    case 'Coordinator': $type = 'poketitleshine'; $img = 'shine';  $name = 'Coordinator'; break;
    case 'magistra': $type = 'poketitleshine'; $img = 'shine';  $name = 'magistra'; break;
    case 'brilliant': $type = 'poketitleshine'; $img = 'shine';  $name = 'Brilliant'; break;
    case 'coloring': $type = 'poketitleshine'; $img = 'shine';  $name = 'coloring'; break;
	case 'legacy': $type = 'poketitleshine'; $img = 'shine';  $name = 'Legacy'; break;
	}

    if(!empty($pok['name_new'])) $pokname = $pok['name_new'];
    else $pokname = $pok['name'];
    $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '".$pok['character']."' ")->fetch_assoc();
?>
       <td valign='top'>
       <div style='height:300; overflow:hidden'>
       <table border='0' class='nonBorder' cellpadding='3' cellspacing='1' width='485px'>
         <tr>
           <td class='title' align='center' <?php if($pok['start_pok'] == 1){ print 'style="background-color:#5194E6;"';} ?>>
             <span class='<?=$type;?>'><a href=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?=numbPok($pok['basenum']);?><?if($img=='shine'){print "&shine";}?>","dex","width=600,height=600,scrollbars=yes");><img src='img/pokedex.gif' alt='Покедекс' title='Покедекс' border='0'></a>#<?php print numbPok($pok['numbpu']).' '.$pokname.' '.$pok['lvl'].'-lvl'.' '.$name;?>    <?php if($pok['trn'] > 0){ ?><img src='./img/trn/Tren_ar<?=$pok["trn"];?>.png'><?php } ?></span>
           </td>
         </tr>
         <tr>
           <td>
             <table width='100%' border='0'>
               <tr>
                 <td width='250px' valign='top' style='height:50px; overflow:hidden;'>
                   <img src='img/pkmn/<?=$img;?>/<?=numbPok($pok['basenum']);?>.jpg' width='250px' height='190px' border='1px'>
                   <table border='0' cellspacing='0' width='252pxp' height='10px' style="margin-top: -2px;"class='nonBorder'>
                     <tr>
                       <td style='padding:0'>
					   <?php
					   $pok['hp_max'] = isset($pok['hp_max']) ? $pok['hp_max'] : 1;
					   $hp_bar = round($pok['hp']/$pok['hp_max'] * 100);
					   ?>
                         <div style="width:<?=$hp_bar;?>%;background: <?=colorHPbar($hp_bar);?>;height:12px;font-size:9px;"><?=$pok['hp'];?></div>
                       </td>
                     </tr>
                     <tr>
                       <td style='padding:0'>
                         <div style="width:<?=($pok['exp']/$pok['exp_max'])*100;?>%;background: blue;height:5px;font-size:0;"></div>
                       </td>
                     </tr>
                   </table>
				   <?php if($pok['item_id']){?>
					<div class='item'><a href="/game.php?fun=pokemons&item=<?=$pok['item_id'];?>&pok=<?=$pok['id'];?>"><img src='img/items/<?=$pok['item_id'];?>.gif' width='32' height='32' border='0'></a></div>
				   <?php }else{?>
				   <div class='item'><img src='img/items/blank.gif' width='32' height='32' border='0'></div>
                   <?php }?>
                 </td>
                 <td style='height: 150px; overflow: hidden;'>
			       <div style="text-align:center; font:11px Tahoma; color: #1D4141;">
			        <a href=javascript: onclick="vis('info<?=$i;?>',<?=$i;?>)" ID='link1_<?=$i;?>'>инфо</a> -
			        <a href=javascript: onclick="vis('stats<?=$i;?>',<?=$i;?>)" ID='link2_<?=$i;?>'>статы</a> -
			        <a href=javascript: onclick="vis('moves<?=$i;?>',<?=$i;?>)" ID='link3_<?=$i;?>'>атаки</a> -
			        <a href=javascript: onclick="vis('status<?=$i;?>',<?=$i;?>)" ID='link4_<?=$i;?>' > состояние</a>
			       </div>
				   <?php
				   if($pok['ev'] > 0){$ev = 1;}

				   if($pok['ev'] >= 10){$ev10 = 10;}
				   
				   ?>
	  			   <div style="height:250px; Overflow:hidden;margin: 0 0 0 0;">
				       <div ID='stats<?=$i;?>' class='poke' style="visibility:visible;top:0;">
				         <center><b id='txt'>Статы</b></center>
                        <table id='txt' cellspacing='1' width='85%'>
                            <tr><td>НР:</td><td width='30'><?=$pok['hp_max'];?></td><td width='30'><?=$pok['hp_ev'];?><?if($pok['ev'] == 0){ print '';}elseif($ev){?><a href='game.php?fun=p_base&TP_id=<?=$pok['id'];?>&type=ADS&add=hp'>+1</a><?} if($pok['ev'] == 0){ print '';}elseif($ev10){?>&nbsp;<a href='game.php?fun=p_base&TP_id=<?=$pok['id'];?>&type=ADS&add=hp&amount=10'>+10</a><?}?></td></tr>
</td></tr>
				          <tr><td><font color=<?php if(isset($har['atk']) && $har['atk'] == '1.1'){ echo "green"; }elseif(isset($har['atk']) && $har['atk'] == '0.9'){ echo "red"; } ?>>Атака:</font></td><td><?=$pok['attack'];?></td><td><?=$pok['atc_ev'];?><?php if(isset($pok['ev']) && $pok['ev'] == 0){ print '';}elseif(isset($ev) && $ev){?><a href='game.php?fun=p_base&TP_id=<?=$pok['id'];?>&type=ADS&add=atc'>+1</a><?php } if(isset($pok['ev']) && $pok['ev'] == 0){ print '';}elseif(isset($ev10) && $ev10){?>&nbsp;<a href='game.php?fun=p_base&TP_id=<?=$pok['id'];?>&type=ADS&add=atc&amount=10'>+10</a><?php }?></td>
                <?php if($pok['trn_stat'] == 1){ ?><td>  <img src='./img/trn/Tren_ar<?=$pok["trn"];?>.png'> </td><?php } ?></tr>
				          <tr><td><font color=<?php if(isset($har['def']) && $har['def'] == '1.1'){ echo "green"; }elseif(isset($har['def']) && $har['def'] == '0.9'){ echo "red"; } ?>>Защита:</font></td><td><?=$pok['def'];?></td><td><?=$pok['def_ev'];?><?php  if(isset($pok['ev']) && $pok['ev'] == 0){ print '';}elseif(isset($ev) && $ev){?><a href='game.php?fun=p_base&TP_id=<?=$pok['id'];?>&type=ADS&add=def'>+1</a><?php } if(isset($pok['ev']) && $pok['ev'] == 0){ print '';}elseif(isset($ev10) && $ev10){?>&nbsp;<a href='game.php?fun=p_base&TP_id=<?=$pok['id'];?>&type=ADS&add=def&amount=10'>+10</a><?php }?></td>
                <?php if($pok['trn_stat'] == 2){ ?><td>  <img src='./img/trn/Tren_ar<?=$pok["trn"];?>.png'> </td><?php } ?>
				          </tr>
				          <tr><td><font color=<?php if(isset($har['speed']) && $har['speed'] == '1.1'){ echo "green"; }elseif( isset($har['speed']) && $har['speed'] == '0.9'){ echo "red"; } ?>>Скорость:</font></td><td><?=$pok['speed'];?></td><td><?=$pok['speed_ev'];?><?php  if(isset($pok['ev']) && $pok['ev'] == 0){ print '';}elseif(isset($ev) && $ev){?><a href='game.php?fun=p_base&TP_id=<?=$pok['id'];?>&type=ADS&add=speed'>+1</a><?php } if(isset($pok['ev']) && $pok['ev'] == 0){ print '';}elseif(isset($ev10) && $ev10){?>&nbsp;<a href='game.php?fun=p_base&TP_id=<?=$pok['id'];?>&type=ADS&add=speed&amount=10'>+10</a><?php }?></td>
                <?php if($pok['trn_stat'] == 3){ ?><td>  <img src='./img/trn/Tren_ar<?=$pok["trn"];?>.png'> </td><?php } ?></tr>
				          <tr><td><font color=<?php if(isset($har['satk']) && $har['satk'] == '1.1'){ echo "green"; }elseif(isset($har['satk']) && $har['satk'] == '0.9'){ echo "red"; } ?>>Спец.Атака:</font></td><td><?=$pok['sp_attack'];?></td><td><?=$pok['spatc_ev'];?><?php  if(isset($pok['ev']) && $pok['ev'] == 0){ print '';}elseif(isset($ev) && $ev){?><a href='game.php?fun=p_base&TP_id=<?=$pok['id'];?>&type=ADS&add=spatc'>+1</a><?php } if(isset($pok['ev']) && $pok['ev'] == 0){ print '';}elseif(isset($ev10) && $ev10){?>&nbsp;<a href='game.php?fun=p_base&TP_id=<?=$pok['id'];?>&type=ADS&add=spatc&amount=10'>+10</a><?php }?></td>
                <?php if($pok['trn_stat'] == 4){ ?><td>  <img src='./img/trn/Tren_ar<?=$pok["trn"];?>.png'> </td><?php } ?></tr>
				          <tr><td><font color=<?php if(isset($har['sdef']) && $har['sdef'] == '1.1'){ echo "green"; }elseif(isset($har['sdef']) && $har['sdef'] == '0.9'){ echo "red"; } ?>>Спец.Защита:</font></td><td><?=$pok['sp_def'];?></td><td><?=$pok['spdef_ev'];?><?php  if(isset($pok['ev']) && $pok['ev'] == 0){ print '';}elseif(isset($ev) && $ev){?><a href='game.php?fun=p_base&TP_id=<?=$pok['id'];?>&type=ADS&add=spdef'>+1</a><?php }if(isset($pok['ev']) && $pok['ev'] == 0){ print '';}elseif(isset($ev10) && $ev10){?>&nbsp;<a href='game.php?fun=p_base&TP_id=<?=$pok['id'];?>&type=ADS&add=spdef&amount=10'>+10</a><?php }?></td>
                <?php if($pok['trn_stat'] == 5){ ?><td>  <img src='./img/trn/Tren_ar<?=$pok["trn"];?>.png'> </td><?php } ?></tr>

				          <tr><td><b>&nbsp;Очки EV: <?=$pok['ev'];?></b></td><td> </td><td> </td></tr>
				         </table>
				       </div>

				       <div ID='info<?=$i;?>' class='poke' style="top: -200px;">
				         <center><b id='txt'>Инфо</b></center>
				         <FONT id='txt'>
						 <?php 
						if($pok['gender'] == 'male') $sex = '0';
						elseif($pok['gender'] == 'female') $sex = '1';
						else  $sex = '3';
						 ?>
				         <b><img src='img/sex_<?=$sex;?>.gif' width=7 height=13 border=0> <?=$pok_base['name'];?></b><BR>
				         <b>Тип:</b> <?=atktip($pok_base['type']);?> <?=atktip($pok_base['type_two']);?><BR>
				         <b>Пойман:</b> <?=get_last_online($pok['date_get']);?><BR>
				         <b>Характер:</b> <?=haracter_pokes($pok['character']);?><BR>

				         <?php if($pok['spark'] == 1){ echo "<b>Доступно разведение</b>"; }
				         if($pok['simpaty'] == 1 and $pok['spark'] == 1){ echo "<b> (A)</b>"; }elseif($pok['simpaty'] == 2 and $pok['spark'] == 1){ echo "<b> (T)</b>"; }elseif($pok['simpaty'] == 3 and $pok['spark'] == 1){ echo "<b> (G)</b>"; }else{echo "<b></b>"; }?>
				         
				         <P>
						 <?php  if($pok['start_pok'] != 1){ ?>
				         <a href='game.php?fun=p_base&type=start&TP_id=<?=$pok['id'];?>'>Сделать стартовым</a><BR>
						 <?php  } ?>
				         <?php 
						 if($pok['nn'] == 0){ ?>
						 <form name='ren' action='game.php?fun=p_base&TP_id=<?=$pok['id'];?>&type=rename' method='post'><b>Дать имя:</a></b><BR><input name='pname' type='text' maxlength='15' size='10' required > <input type='submit' value='OK'></form><BR>
						 <?php  } ?>
						<P align='right' style='color:#82b1e2'>ID:<?=$pok['id'];?></P>
				       </div>
						<?php 	
						if($pok['atk1']){
						$one = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$pok['atk1'])->fetch_assoc();
				         	}else{
				        $one = array('atac_id' => 0, 'attac_name_eng'=>'-','atac_pp'=>0);
				         	}
							if($pok['atk2']){
						$two = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$pok['atk2'])->fetch_assoc();
				         	}else{
				        $two = array('atac_id' => 0, 'attac_name_eng'=>'-','atac_pp'=>0);
				         	}
							if($pok['atk3']){
						$three = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$pok['atk3'])->fetch_assoc();
				         	}else{
				        $three = array('atac_id' => 0, 'attac_name_eng'=>'-','atac_pp'=>0);
				         	}
							if($pok['atk4']){
						$four = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$pok['atk4'])->fetch_assoc();
				         	}else{
				        $four = array('atac_id' => 0, 'attac_name_eng'=>'-','atac_pp'=>0);
				         	}	
						$cntA_ = $mysqli->query("SELECT id FROM `mypok_learn` WHERE pok = ".$pok['id']);
						$cntA = $cntA_->num_rows;
						?>
				      <div ID='moves<?=$i;?>' class='poke' style="top:-400px;">
				         <center><b id='txt'>Атаки</b></center><P>
				         <TABLE ID='txt' border='0' cellspacing='0' width='100%'>
				          <tr><td width='50%'><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$one['atac_id'];?>','at','width=500,height=230');><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$one['attac_name_eng'];?><br><span class='atPP'>PP <?=$pok['pp1'];?>/<?=$one['atac_pp'];?></span></td>
				              <td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$two['atac_id'];?>','at','width=500,height=230');><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$two['attac_name_eng'];?><br><span class='atPP'>PP <?=$pok['pp2'];?>/<?=$two['atac_pp'];?></span></td></tr>
				          <tr><td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$three['atac_id'];?>','at','width=500,height=230');><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$three['attac_name_eng'];?><br><span class='atPP'>PP <?=$pok['pp3'];?>/<?=$three['atac_pp'];?></span></td>
				              <td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$four['atac_id'];?>','at','width=500,height=230');><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$four['attac_name_eng'];?><br><span class='atPP'>PP <?=$pok['pp4'];?>/<?=$four['atac_pp'];?></span></td></tr>
				         </table><P>
				        <?php   if($pok['master'] == $_SESSION['user_id']){ ?>
				         <center><b><a href=javascript: onClick=win1=window.open('game.php?fun=p_aa&TP_id=<?=$pok['id'];?>','aa','width=500,height=300,scrollbars=yes');return true;><Изучение атак(<?=$cntA;?>)></a></b></center>
				         <?php  }?>
				         &nbsp;<br><b></b>
				      </div>
						<?php 
						$owner = $mysqli->query('SELECT login FROM users WHERE id = '.$pok['owner'])->fetch_assoc();
						
						?>
				      <div ID='status<?=$i;?>' class='poke' style="top:-600px;">
				         <center><b id='txt'>Состояние</b></center>
				         <BR><B>Витамины:</B> <?=$pok['vitamines'];?>/100
						 <BR><B>Генокод:</B> H<?=$pok['hp_gen'];?>A<?=$pok['atc_gen'];?>D<?=$pok['def_gen'];?>S<?=$pok['speed_gen'];?>SA<?=$pok['spatc_gen'];?>SD<?=$pok['spdef_gen'];?>
				         <BR><B>Пойман тренером:</B> <a href='/game.php?fun=treninf&to_id=<?=$pok['owner'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$pok['owner'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='img/question.gif' border=0></a> <font color='<?=colorsUsers($owner['groups']);?>'><?=$owner['login'];?></font>
						 <BR><B>Хозяин:</B> <a href='/game.php?fun=treninf&to_id=<?=$pok['master'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$pok['master'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='img/question.gif' border=0></a> <font color='<?=colorsUsers(infUsr($pok["master"],"groups"));?>'><?=infUsr($pok["master"],"login");?></font>
				         <BR><B>Состояние:</B> OK
				         <BR><B>Приручен:</B> <?php if($pok['trade'] == 0){ echo "Нет"; }elseif($pok['trade'] == 1){ echo "Да"; }?>
			             <BR><B>Смена характера:</B> <?php if($pok['change_har'] == 0){ echo "Нет"; }elseif($pok['change_har'] == 1){ echo "Да"; }?>
			             <BR><B>Повышение генокода:</B> <?php if($pok['change_gen'] == 0){ echo "Нет"; }elseif($pok['change_gen'] == 1){ echo "Да"; }?> 
						 <? if($pok['egg_attack_id'] > 0){?><BR><B>Яйцевая атака:</B> <?=$pok['egg_attack'];?><?}?><P>
						 <?php   if($pok['master'] == $_SESSION['user_id']){ ?>
							<center><b><a href="javascript:del_poke(<?=$pok['id'];?>)">&lt;Отпустить покемона&gt;</a></b></center> 
						<?php  }?>
				      </div>
				   </div>
                 </td>
               </tr>
             </table>
 	       </td>
 	     </tr>
 	   </table>
	   </div>
	   </td>
	  <?php 
	  if($i == 1 || $i == 3){
		  print '</tr><tr>';
	  }
	  
	  $i++; } ?><tr></tr><tr></tr><tr></tr></table></div>
<HR>
<table width="100%">
<tr>
<td align="right" width=200>
<b><?=$_SERVER['HTTP_HOST']?> || admin@<?=$_SERVER['HTTP_HOST']?></b><br>
© 2009-<?=date('Y')?>
</td>
<tr>
</table>