<?php 
ini_set("display_errors",0);
// 9.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
if($npc == 190 && $answer == 1){ 
    $userid = $mysqli->query("SELECT * FROM users WHERE id = ".$_SESSION['user_id'])->fetch_assoc();
$mypok = $mysqli->query('SELECT * FROM user_pokemons_old WHERE user_id = '.$userid['old_user_id'].' AND active = 1');
$mypokoff = $mysqli->query("SELECT `us`.* FROM `user_pokemons_old` AS `us` INNER JOIN `base_pokemon` AS `bp` ON `bp`.`id` = `us`.`basenum`
WHERE `bp`.`power_category_finalevol` <= 7 AND  `us`.`user_id` = '".$userid['old_user_id']."'");
include('ando/functions/tip.functions.php');
?>
<HTML>
	<HEAD>
	<meta http-equiv='Content-Type' CONTENT='text/html';Charset='Windows-1251'>
	<LINK REL='Stylesheet' HREF='style.css' TYPE='text/css' />
	<style>
		DIV.poke {position:relative; left:0; top:0; width:215; height:200; margin: 0 0 0 0; z-index:10; visibility:hidden;}
		DIV.item {position:relative;top:-51;left:218;}
	</style>
	<script language="JavaScript">
		function vis(ID, num) {
			eval("document.all.info" + num + ".style.visibility = \"hidden\";");
			eval("document.all.stats" + num + ".style.visibility = \"hidden\";");
			eval("document.all.moves" + num + ".style.visibility = \"hidden\";");
			eval("document.all.status" + num + ".style.visibility = \"hidden\";");
			eval("document.all." + ID + ".style.visibility = \"visible\"");
		}
		function del_poke(id) {
        q=confirm('Вы уверены что хотите отпустить покемона?');
        if (q) window.location='game.php?fun=p_base&TP_id='+id+'&type=del';
    }
	</script>
	</HEAD>
<BODY ID='tab'>
<span id='txt'>
<h1>Перенос покемонов</h1>
<h2>База данных прежней версии</h2>
<?if($userid['transfer_count'] > 0){?><h3>Вы перенесли уже: <?=$userid['transfer_count']?> покемонов.</h3><?}?>
<a href="game.php?fun=m_location&map=1"><< уйти</a>
<TABLE border='0'><TR valign='top'>
<TD width='600'><b>Деактивация:</b><BR><UL class='pokelist'>
<?php  while ($active = $mypok->fetch_assoc()){ 
if(!empty($active['name_new'])) $pokname = $active['name_new'];
else $pokname = $active['name'];


//if(isset($_POST['to_name'])) {
//    $sr = obTxt($_POST['to_name']); 
//    $mypokoff = $mysqli->query("SELECT * FROM user_pokemons WHERE user_id = '".$_SESSION['user_id']."' AND name LIKE '%{$sr}%'");}
//    elseif(isset($_POST['name_new'])){
//            $sr1 = obTxt($_POST['name_new']); 
//    $mypokoff = $mysqli->query("SELECT * FROM user_pokemons WHERE user_id = '".$_SESSION['user_id']."' AND name_new LIKE '%{$sr1}%'");
//}
if(isset($_POST['to_name']))
{
    $findstr="";
    if(isset($_POST['to_name']))
    {
        $sr = obTxt($_POST['to_name']);
        if($sr != "")
        {
            $findstr .= " AND name LIKE '%{$sr}%'";
        }
    }
    if(isset($_POST['name_new']))
    {
        $sr = obTxt($_POST['name_new']);
        if($sr != "")
        {
            $findstr .= " AND name_new LIKE '%{$sr}%'";
        }
    }
    if(isset($_POST['lvl_pok']))
    {
        $sr = obTxt($_POST['lvl_pok']);
        if($sr != "")
        {
            $findstr .= " AND lvl=$sr";
        }
    }
    if(isset($_POST['find_shine']))
    {
        $sr = obTxt($_POST['find_shine']);
        if($sr == "Yes")
        {
            $findstr .= " AND type='shine'";
        }
    }
    if(isset($_POST['find_spark']))
    {
        $sr = obTxt($_POST['find_spark']);
        if($sr == "Yes")
        {
            $findstr .= " AND spark='1'";
        }
    }
    if($findstr != "")
    {
        $mypokoff = $mysqli->query("SELECT * FROM user_pokemons_old WHERE user_id = '".$userid['old_user_id']."'".$findstr." AND active = 0 ORDER BY basenum ");
    }
}
?>
<li><a href="game.php?fun=p_base&map=1&TP_id=<?=$active['id'];?>&type=collapse"><?=$pokname;?></a><br />
<?php  } ?>
</ul>
<P><b>Активация:</b><BR><OL type='1'>
    
<!--<form name='find' action='game.php?fun=m_npc&npc_id=190&answ_id=2&map=1' method='post'>      
    <input name='to_name' type='text' placeholder="Изначальное имя">
    <input name='name_new' type='text' placeholder="Новое имя покемона">
    <input name='lvl_pok' type='text' placeholder="Уровень покемона">
    <input type="checkbox" name='find_shine' value="Yes"> Поиск шайни покемонов
    <br>
    <input type="checkbox" name='find_spark' value="Yes"> Не спаренные
    <br>
    <input type='submit' value='НАЙТИ'> 
</form>-->
    
<?php  while ($off = $mypokoff->fetch_assoc()){ 
if(!empty($off['name_new'])) $pokname = $off['name_new'];
else $pokname = $off['name']; 
?> 
<?php 
if($off['gender'] == 'male' ) $sex = '0' ;
elseif($off['gender'] == 'female' ) $sex = '1' ;
else $sex = '3' ;


$har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '".$off['character']."'")->fetch_assoc();

?>

<li><a href='game.php?fun=m_npc&npc_id=190&answ_id=1&map=1&TPI_id=<?=$off['id'];?>'>#<?php  print numbPok($off['basenum']).' '.$pokname.' '.$off['lvl'].'-lvl';?></a>&nbsp;&nbsp;&nbsp;<span style='color:red; font-size:11px'><?=$off['type'];?></span></b>, <span style='color:#1255d1; font-size:11px'><?=$off['sex'];?><b><img src='img/sex_<?=$sex;?>.gif' width=7 height=13 border=0> <?=$pok_base['sex'];?></span><span style='color:#1255d1; font-size:10px'>HP<?=$off['hp_gen'];?> </span><span style='color:#1255d1; font-size:10px'>|<font size="1" color="<?if($har['atk']==1.1){print "green";}elseif($har['atk']==0.9){print "red";}else{print "blue";};?>" face="Arial">A<?=$off['atc_gen'];?></font> </span><span style='color:#1255d1; font-size:10px'>|<font size="1" color="<?if($har['def']==1.1){print "green";}elseif($har['def']==0.9){print "red";}else{print "blue";};?>" face="Arial">D<?=$off['def_gen'];?></font> </span><span style='color:#1255d1; font-size:10px'>|<font size="1" color="<?if($har['speed']==1.1){print "green";}elseif($har['speed']==0.9){print "red";}else{print "blue";};?>" face="Arial">S<?=$off['speed_gen'];?></font> </span><span style='color:#1255d1; font-size:10px'>|<font size="1" color="<?if($har['satk']==1.1){print "green";}elseif($har['satk']==0.9){print "red";}else{print "blue";};?>" face="Arial">SA<?=$off['spatc_gen'];?></font> </span><span style='color:#1255d1; font-size:10px'>|<font size="1" color="<?if($har['sdef']==1.1){print "green";}elseif($har['sdef']==0.9){print "red";}else{print "blue";};?>" face="Arial">SD<?=$off['spdef_gen'];?></font></span><BR>
<?php 
if($off['spark'] == 1){ echo "<b>Доступно разведение</b>"; }

if($off['simpaty'] == 1 and $off['spark'] == 1){ echo "<b> (A)</b>"; }elseif($off['simpaty'] == 2 and $off['spark'] == 1){ echo "<b> (T)</b>"; }elseif($off['simpaty'] == 3 and $off['spark'] == 1){ echo "<b> (G)</b>"; }else{echo "<b></b>"; }?>
	 <br></br>

<?php  } ?>

</OL></TD>
<?php  if(!empty($_GET['TPI_id'])){ 
	$id = obr_chis($_GET['TPI_id']);
	$zapros = $mysqli->query("SELECT * FROM user_pokemons_old WHERE id = ".$id)->fetch_assoc();
	if($zapros['user_id'] != $userid['old_user_id']){ echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>";}
	if(!empty($zapros['name_new'])) $pokname = $zapros['name_new'];
	else $pokname = $zapros['name']; 
	if($zapros['type'] == 'normal') {$type = 'poketitle'; $img = 'normal'; $name = false;}
	elseif($zapros['type'] == 'shine') {$type = 'poketitleshine'; $img = 'shine'; $name = 'Шайни';}
	elseif($zapros['type'] == 'shadow') {$type = 'poketitleshadow'; $img = 'shine'; $name = 'shadow';}
	elseif($zapros['type'] == 'fighter') {$type = 'poketitleshine'; $img = 'shine'; $name = 'fighter';}
	elseif($zapros['type'] == 'contest') {$type = 'poketitleshine'; $img = 'shine'; $name = 'contest';}
	elseif($zapros['type'] == 'champion') {$type = 'poketitleshine'; $img = 'shine'; $name = 'champion';}
	elseif($zapros['type'] == 'gym') {$type = 'poketitleshine'; $img = 'shine'; $name = 'gym';}
	elseif($zapros['type'] == 'magistra') {$type = 'poketitleshine'; $img = 'shine'; $name = 'magistra';}
	elseif($zapros['type'] == 'zombie') {$type = 'poketitlezombie'; $img = 'zombie'; $name = 'zombie';}
	elseif($zapros['type'] == 'snowy') {$type = 'poketitleshowy'; $img = 'shine';$name = 'snowy';}?>

	<td align="center" width="500">
       <div style="height:240; overflow:hidden">
       <table border="0" class="nonBorder" cellpadding="3" cellspacing="1" width="500">
       <tbody><tr><td class="title" align="center">
         <span class="<?=$type;?>"><a href="javascript:" onclick="win1=window.open(&quot;pokedex.php?sp_id=<?=numbPok($zapros['basenum']);?>&quot;,&quot;dex&quot;,&quot;width=600,height=600,scrollbars=yes&quot;);"><img src="img/pokedex.gif" alt="Покедекс" title="Покедекс" border="0"></a>#<? print numbPok($zapros['basenum']).' '.$pokname.' '.$zapros['lvl'].'-lvl'.' '.$name;?> <?php if($zapros['trn'] > 0){ ?><img src='./img/trn/Tren_ar<?=$zapros["trn"];?>.png'><?php } ?></span>
         </td></tr><tr><td>
       <table width="100%" border="0"><tbody><tr><td width="250" valign="top"><img src="/img/pkmn/<?=$img;?>/<?=numbPok($zapros['basenum']);?>.jpg" width="250" height="190" border="1"><br>
	       <table border="0" cellspacing="0" width="252" height="10" class="nonBorder">
	         <tbody><tr><td style="padding:0">
			 <?php 	$hp_bar = round($zapros['hp']/$zapros['hp_max'] * 100); ?>
			 <div style="width:<?=$hp_bar;?>%;background:<?=colorHPbar($hp_bar);?>;height:12;font-size:9;"><?=$zapros['hp'];?></div></td></tr>
	         <tr><td style="padding:0"><div style="width:<?=lvl_polos($zapros['lvl'],$zapros['exp']);?>%;background:blue;height:5;font-size:0;"></div></td></tr>
	       </tbody></table>
	         <?php  if($zapros['item_id']){?>
					<div class='item'><img src='img/items/<?=$zapros['item_id'];?>.gif' width='32' height='32' border='0'></div>
				   <?php }else{?>
				   <div class='item'><img src='img/items/blank.gif' width='32' height='32' border='0'></div>
                   <?php }?>
	       </td>
	       <td valign="top">

	       <div style="text-align:center;font:11px Tahoma; color: #1D4141;">
	        <a href="javascript:" onclick="vis('info0',0)" id="link1_0">инфо</a> -
	        <a href="javascript:" onclick="vis('stats0',0)" id="link2_0">статы</a> -
	        <a href="javascript:" onclick="vis('moves0',0)" id="link3_0">атаки</a> -
	        <a href="javascript:" onclick="vis('status0',0)" id="link4_0">состояние</a>
	       </div>

		<div style="height:200; Overflow:hidden;margin: 0 0 0 0;">

	      <div id="stats0" class="poke" style="visibility:visible;top:0;">
	         <center><b id="txt">Статы</b></center>
	         <table id="txt" cellspacing="0" width="80%">
	          <tbody><tr><td>НР:</td><td width="30"><?=$zapros['hp_max'];?></td><td width="30"><?=$zapros['hp_ev'];?></td></tr>
	          <tr><td>Атака:</td><td><?=$zapros['attack'];?></td><td><?=$zapros['atc_ev'];?></td>
	           <?php if($zapros['trn_stat'] == 1){ ?><td>  <img src='./img/trn/Tren_ar<?=$zapros["trn"];?>.png'> </td><?php } ?></tr>
	          <tr><td>Защита:</td><td><?=$zapros['def'];?></td><td><?=$zapros['def_ev'];?></td>
	           <?php if($zapros['trn_stat'] == 2){ ?><td>  <img src='./img/trn/Tren_ar<?=$zapros["trn"];?>.png'> </td><?php } ?></tr>
	          <tr><td>Скорость:</td><td><?=$zapros['speed'];?></td><td><?=$zapros['speed_ev'];?></td>
	           <?php if($zapros['trn_stat'] == 3){ ?><td>  <img src='./img/trn/Tren_ar<?=$zapros["trn"];?>.png'> </td><?php } ?></tr>
	          <tr><td>Спец.Атака:</td><td><?=$zapros['sp_attack'];?></td><td><?=$zapros['spatc_ev'];?></td>
	           <?php if($zapros['trn_stat'] == 4){ ?><td>  <img src='./img/trn/Tren_ar<?=$zapros["trn"];?>.png'> </td><?php } ?></tr>
	          <tr><td>Спец.Защита: </td><td><?=$zapros['sp_def'];?></td><td><?=$zapros['spdef_ev'];?></td>
	           <?php if($zapros['trn_stat'] == 5){ ?><td>  <img src='./img/trn/Tren_ar<?=$zapros["trn"];?>.png'> </td><?php } ?></tr>
	          <tr><td><b>&nbsp;Очки EV: <?=$zapros['ev'];?></b></td><td> </td><td> </td></tr>
	         </tbody></table>
	      </div>
			<?php 
if($zapros['gender'] == 'male' ) $sex = '0' ;
elseif($zapros['gender'] == 'female' ) $sex = '1' ;
else $sex = '3' ;
				$pok_base = $mysqli->query('SELECT * FROM base_pokemon WHERE name = "'.$zapros['name'].'"')->fetch_assoc();
			?>
	      <div id="info0" class="poke" style="top:-200;">
	         <center><b id="txt">Инфо</b></center>
	         <font id="txt">
	         <b><img src="img/sex_<?=$sex;?>.gif" width="7" height="13" border="0"> <?=$zapros['name'];?></b><br>
	         <b>Тип:</b> <?=atktip($pok_base['type']);?> <?=atktip($pok_base['type_two']);?><br>
	         <b>Характер:</b> <?=haracter_pokes($zapros['character']);?><br>
	         <b>Пойман:</b> <?=get_last_online($zapros['date_get']);?><br>
	         <?php if($zapros['spark'] == 1){ echo "<b>Доступно разведение</b>"; } ?>
			 
	         <p>&nbsp;</p><p></p><div align="right" style="color:#82b1e2">ID: <?=$id;?></div>
	      </font></div><font id="txt">

	      	<?php 
						if($zapros['atk1']){
						$one = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$zapros['atk1'])->fetch_assoc();
				         	}else{
				        $one = array('attac_name_eng'=>'-','atac_pp'=>0); 		
				         	}
							if($zapros['atk2']){
						$two = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$zapros['atk2'])->fetch_assoc();
				         	}else{
				        $two = array('attac_name_eng'=>'-','atac_pp'=>0); 		
				         	}
							if($zapros['atk3']){
						$three = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$zapros['atk3'])->fetch_assoc();
				         	}else{
				        $three = array('attac_name_eng'=>'-','atac_pp'=>0); 		
				         	}
							if($zapros['atk4']){
						$four = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$zapros['atk4'])->fetch_assoc();
				         	}else{
				        $four = array('attac_name_eng'=>'-','atac_pp'=>0); 		
				         	}	
						?>
				      <div ID='moves0' class='poke' style="top:-400px;">
				           <center><b id='txt'>Атаки</b></center><P>
				         <TABLE ID='txt' border='0' cellspacing='0' width='100%'>
				          <tr><td width='50%'><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$one['atac_id'];?>','at','width=500,height=230');><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$one['attac_name_eng'];?><br><span class='atPP'>PP <?=$zapros['pp1'];?>/<?=$one['atac_pp'];?></span></td>
				              <td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$two['atac_id'];?>','at','width=500,height=230');><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$two['attac_name_eng'];?><br><span class='atPP'>PP <?=$zapros['pp2'];?>/<?=$two['atac_pp'];?></span></td></tr>
				          <tr><td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$three['atac_id'];?>','at','width=500,height=230');><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$three['attac_name_eng'];?><br><span class='atPP'>PP <?=$zapros['pp3'];?>/<?=$three['atac_pp'];?></span></td>
				              <td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$four['atac_id'];?>','at','width=500,height=230');><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$four['attac_name_eng'];?><br><span class='atPP'>PP <?=$zapros['pp4'];?>/<?=$four['atac_pp'];?></span></td></tr>
				         </table><P>
				         &nbsp;<br><b></b></div>
					<?php 	$owner = $mysqli->query('SELECT * FROM users_old WHERE id = '.$userid['old_user_id'])->fetch_assoc();
						$user_data = $mysqli->query('SELECT * FROM users_old WHERE id = '.$userid['old_user_id'])->fetch_assoc(); ?>
	      <div id="status0" class="poke" style="top:-600;" valign="top">
				<center><b id="txt">Состояние</b></center>
				<br><b>Витамины:</b> <?=$zapros['vitamines'];?>/100
				<br><b>Генокод:</b> H<?=$zapros['hp_gen'];?>A<?=$zapros['atc_gen'];?>D<?=$zapros['def_gen'];?>S<?=$zapros['speed_gen'];?>SA<?=$zapros['spatc_gen'];?>SD<?=$zapros['spdef_gen'];?>
				<br><b>Пойман тренером:</b> <a href="/game.php?fun=treninf&amp;to_id=<?=$zapros['owner'];?>" onclick="window.open('/game.php?fun=treninf&amp;to_id=<?=$zapros['owner'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src="img/question.gif" border="0"></a> <font color='<?=colorsUsers($owner['groups']);?>'><?=$owner['login'];?></font>
				<br><b>Хозяин:</b> <a href="/game.php?fun=treninf&amp;to_id=<?=$zapros['user_id'];?>" onclick="window.open('/game.php?fun=treninf&amp;to_id=<?=$zapros['user_id'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src="img/question.gif" border="0"></a> <font color='<?=colorsUsers($user_data['groups']);?>'><?=$user_data['login'];?></font>
		        <br><b>Состояние:</b> OK<p>
		        	<?php   if($zapros['master'] == 1){ ?>
							<center><b><a href="javascript:del_poke(<?=$zapros['id'];?>)">&lt;Отпустить покемона&gt;</a></b></center> 
						<?php  }?>
	      </p></div>

	</font></div><font id="txt">
	       </font></td></tr></tbody></table>
	  </td></tr></tbody></table></div>
	  <?//if($pok_base['power_category'] < 8){?>
	<b><a href="game.php?fun=p_base&amp;map=1&amp;type=extract_transfer&amp;TP_id=<?=$id;?>">&lt;Пренести покемона&gt;</a></b></td>
	<?//}else{}?>
<?php }?>
<?php  }else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 