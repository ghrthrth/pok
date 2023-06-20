<?php
if(isset($_GET['p_id'])){
  $pid = obr_chis($_GET['p_id']);
  $inf = $mysqli->query('SELECT * FROM user_pokemons WHERE id = '.$pid)->fetch_assoc();
  if($inf){
  	  $trd = $mysqli->query('SELECT * FROM trade_log WHERE pok = '.$pid.' and user_to = '.$user_id)->fetch_assoc();
      $auk_pok = $mysqli->query('SELECT * FROM auk WHERE id_lot = '.$pid)->fetch_assoc();
  	  if(isset($trd) OR isset($auk_pok) OR $inf['user_id'] == $user_id){
    include('ando/functions/tip.functions.php');
	if($inf['type'] == 'normal') {$type = 'poketitle'; $img = 'normal'; $name = false;}
	elseif($inf['type'] == 'shine') {$type = 'poketitleshine'; $img = 'shine'; $name = 'shine';}
	elseif($inf['type'] == 'shadow') {$type = 'poketitleshadow'; $img = 'shine'; $name = 'shadow';}
	elseif($inf['type'] == 'snowy') {$type = 'poketitleshowy'; $img = 'shine';$name = 'snowy';}
	elseif($inf['type'] == 'fighter') {$type = 'poketitleshine'; $img = 'shine'; $name = 'fighter';}
	elseif($inf['type'] == 'contest') {$type = 'poketitleshine'; $img = 'shine'; $name = 'contest';}
	elseif($inf['type'] == 'champion') {$type = 'poketitleshine'; $img = 'shine'; $name = 'champion';}
    elseif($inf['type'] == 'zombie') {$type = 'poketitlezombie'; $img = 'zombie'; $name = 'zombie';}
    elseif($inf['type'] == 'nord') {$type = 'poketitlenord'; $img = 'nord'; $name = 'Nord';}
	elseif($inf['type'] == 'gym') {$type = 'poketitleshine'; $img = 'shine'; $name = 'gym';}
    elseif($inf['type'] == 'Coordinator') {$type = 'poketitleshine'; $img = 'shine'; $name = 'Coordinator';}
	elseif($inf['type'] == 'magistra') {$type = 'poketitleshine'; $img = 'shine'; $name = 'magistra';}
    elseif($inf['type'] == 'coloring') {$type = 'poketitleshine'; $img = 'shine'; $name = 'coloring';}
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
	</script>
	</HEAD>
	<BODY>
       <div style="height:240; overflow:hidden">
       <table border="0" class="nonBorder" cellpadding="3" cellspacing="1" width="500">
       <tbody><tr><td class="title" align="center">
         <span class="<?=$type;?>"><a href="javascript:" onclick="win1=window.open(&quot;pokedex.php?sp_id=<?=numbPok($inf['basenum']);?>&quot;,&quot;dex&quot;,&quot;width=600,height=600,scrollbars=yes&quot;);"><img src="img/pokedex.gif" alt="Покедекс" title="Покедекс" border="0"></a>#<? print numbPok($inf['basenum']).' '.$inf['name'].' '.$inf['lvl'].'-lvl'.' '.$inf['type'];?> <?php if($inf['trn'] > 0){ ?><img src='./img/trn/Tren_ar<?=$inf["trn"];?>.png'><?php } ?> </span>
         </td></tr><tr><td>
       <table width="100%" border="0"><tbody><tr><td width="250" valign="top"><img src="https://claimbe.ru/img/pkmn/<?=$img;?>/<?=numbPok($inf['basenum']);?>.jpg" width="250" height="190" border="1"><br>
	       <table border="0" cellspacing="0" width="252" height="10" class="nonBorder">
	         <tbody><tr><td style="padding:0">
			 <?	$hp_bar = round($inf['hp']/$inf['hp_max'] * 100); ?>
			 <div style="width:<?=$hp_bar;?>%;background:<?=colorHPbar($hp_bar);?>;height:12;font-size:9;"><?=$inf['hp'];?></div></td></tr>
	         <tr><td style="padding:0"><div style="width:<?=($inf['exp']/$inf['exp_max'])*100;?>%;background:blue;height:5;font-size:0;"></div></td></tr>
	       </tbody></table>
	         <div class="item"><img src="img/items/blank.gif" width="32" height="32" border="0"></div>
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
	          <tbody><tr><td>НР:</td><td width="30"><?=$inf['hp_max'];?></td><td width="30"><?=$inf['hp_ev'];?></td></tr>
	          <tr><td>Атака:</td><td><?=$inf['attack'];?></td><td><?=$inf['atc_ev'];?></td> 
	          <?php if($inf['trn_stat'] == 1){ ?><td>  <img src='./img/trn/Tren_ar<?=$inf["trn"];?>.png'> </td><?php } ?></tr>
	          <tr><td>Защита:</td><td><?=$inf['def'];?></td><td><?=$inf['def_ev'];?></td>
	           <?php if($inf['trn_stat'] == 2){ ?><td>  <img src='./img/trn/Tren_ar<?=$inf["trn"];?>.png'> </td><?php } ?></tr>
	          <tr><td>Скорость:</td><td><?=$inf['speed'];?></td><td><?=$inf['speed_ev'];?></td>
	           <?php if($inf['trn_stat'] == 3){ ?><td>  <img src='./img/trn/Tren_ar<?=$inf["trn"];?>.png'> </td><?php } ?></tr>
	          <tr><td>Спец.Атака:</td><td><?=$inf['sp_attack'];?></td><td><?=$inf['spatc_ev'];?></td>
	           <?php if($inf['trn_stat'] == 4){ ?><td>  <img src='./img/trn/Tren_ar<?=$inf["trn"];?>.png'> </td><?php } ?></tr>
	          <tr><td>Спец.Защита: </td><td><?=$inf['sp_def'];?></td><td><?=$inf['spdef_ev'];?></td>
	           <?php if($inf['trn_stat'] == 5){ ?><td>  <img src='./img/trn/Tren_ar<?=$inf["trn"];?>.png'> </td><?php } ?></tr>
	          <tr><td><b>&nbsp;Очки EV: <?=$inf['ev'];?></b></td><td> </td><td> </td></tr>
	         </tbody></table>
	      </div>
			<?
				if($inf['gender'] == 'male') $sex = '0';
				elseif($inf['gender'] == 'female') $sex = '1';
				else  $sex = '3';
				$pok_base = $mysqli->query('SELECT * FROM base_pokemon WHERE name = "'.$inf['name'].'"')->fetch_assoc();
			?>
	      <div id="info0" class="poke" style="top:-200;">
	         <center><b id="txt">Инфо</b></center>
	         <font id="txt">
	         <b><img src="img/sex_<?=$sex;?>.gif" width="7" height="13" border="0"> <?=$inf['name'];?></b><br>
	         <b>Тип:</b> <?=atktip($pok_base['type']);?> <?=atktip($pok_base['type_two']);?><br>
	         <b>Пойман:</b> <?=get_last_online($inf['date_get']);?><br>
	         <b>Характер:</b> <?=haracter_pokes($inf['character']);?><br>
	         
	        <?php if($inf['spark'] == 1){ echo "<b>Доступно разведение</b>"; }
				         if($inf['simpaty'] == 1 and $inf['spark'] == 1){ echo "<b> (A)</b>"; }elseif($inf['simpaty'] == 2 and $inf['spark'] == 1){ echo "<b> (T)</b>"; }elseif($inf['simpaty'] == 3 and $inf['spark'] == 1){ echo "<b> (G)</b>"; }else{echo "<b></b>"; }?>
			 
	         <p>&nbsp;</p><p></p><div align="right" style="color:#82b1e2">ID: <?=$inf['id'];?></div>
	      </font></div><font id="txt">
<?	
						if($inf['atk1']){
						$one = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$inf['atk1'])->fetch_assoc();
				         	}else{
				        $one = array('attac_name_eng'=>'-','atac_pp'=>0); 		
				         	}
							if($inf['atk2']){
						$two = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$inf['atk2'])->fetch_assoc();
				         	}else{
				        $two = array('attac_name_eng'=>'-','atac_pp'=>0); 		
				         	}
							if($inf['atk3']){
						$three = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$inf['atk3'])->fetch_assoc();
				         	}else{
				        $three = array('attac_name_eng'=>'-','atac_pp'=>0); 		
				         	}
							if($inf['atk4']){
						$four = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$inf['atk4'])->fetch_assoc();
				         	}else{
				        $four = array('attac_name_eng'=>'-','atac_pp'=>0); 		
				         	}	
						?>
	      <div ID='moves0' class='poke' style="top:-400px;">
				         <center><b id='txt'>Атаки</b></center><P>
				         <TABLE ID='txt' border='0' cellspacing='0' width='100%'>
				          <tr><td width='50%'><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$one['atac_id'];?>','at','width=500,height=230');><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$one['attac_name_eng'];?><br><span class='atPP'>PP <?=$inf['pp1'];?>/<?=$one['atac_pp'];?></span></td>
				              <td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$two['atac_id'];?>','at','width=500,height=230');><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$two['attac_name_eng'];?><br><span class='atPP'>PP <?=$inf['pp2'];?>/<?=$two['atac_pp'];?></span></td></tr>
				          <tr><td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$three['atac_id'];?>','at','width=500,height=230');><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$three['attac_name_eng'];?><br><span class='atPP'>PP <?=$inf['pp3'];?>/<?=$three['atac_pp'];?></span></td>
				              <td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$four['atac_id'];?>','at','width=500,height=230');><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$four['attac_name_eng'];?><br><span class='atPP'>PP <?=$inf['pp4'];?>/<?=$four['atac_pp'];?></span></td></tr>
				         </table><P>
				      </div>
					<?	$owner = $mysqli->query('SELECT * FROM users WHERE id = '.$inf['owner'])->fetch_assoc();
						$user_data = $mysqli->query('SELECT * FROM users WHERE id = '.$inf['user_id'])->fetch_assoc(); ?>
	      <div id="status0" class="poke" style="top:-600;" valign="top">
				<center><b id="txt">Состояние</b></center>
				<br><b>Витамины:</b> <?=$inf['vitamines'];?>/100
				<br><b>Генокод:</b> H<?=$inf['hp_gen'];?>A<?=$inf['atc_gen'];?>D<?=$inf['def_gen'];?>S<?=$inf['speed_gen'];?>SA<?=$inf['spatc_gen'];?>SD<?=$inf['spdef_gen'];?>
				 <BR><B>Пойман тренером:</B> <a href='/game.php?fun=treninf&to_id=<?=$inf['owner'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$inf['owner'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='img/question.gif' border=0></a> <font color='<?=colorsUsers($owner['groups']);?>'><?=$owner['login'];?></font>
						 <BR><B>Хозяин:</B> <a href='/game.php?fun=treninf&to_id=<?=$inf['master'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$inf['master'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='img/question.gif' border=0></a> <font color='<?=colorsUsers(infUsr($inf["master"],"groups"));?>'><?=infUsr($inf["master"],"login");?></font>
				         <BR><B>Состояние:</B> OK
				         <BR><B>Приручен:</B> <?php if($inf['trade'] == 0){ echo "Нет"; }elseif($inf['trade'] == 1){ echo "Да"; }?>
			             <BR><B>Смена характера:</B> <?php if($inf['change_har'] == 0){ echo "Нет"; }elseif($inf['change_har'] == 1){ echo "Да"; }?>
			             <BR><B>Повышение генокода:</B> <?php if($inf['change_gen'] == 0){ echo "Нет"; }elseif($inf['change_gen'] == 1){ echo "Да"; }?><P>   	             
	      </p>
	      </div>
	      </font></div></td></tr></tbody></table></td></tr></tbody></table></div></BODY></HTML>
    <?php
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}
// else {
//     return false;
// }

if (isset($_GET['police_id']) && isset($_GET['groups']) && $_GET['groups'] == $user['groups']) {
    $pid = obr_chis($_GET['police_id']);
    $inf = $mysqli->query("SELECT * FROM user_pokemons WHERE id = '{$pid}'")->fetch_assoc();
    if ($inf) {
        $trd = $mysqli->query("SELECT * FROM police_trade WHERE pok = '{$pid}'")->fetch_assoc();
        if (isset($trd)) {// OR $inf['user_id'] == $user_id) {
            include('ando/functions/tip.functions.php');
            if ($inf['type'] == 'normal') {
                $type = 'poketitle';
                $img = 'normal';
                $name = false;
            } elseif ($inf['type'] == 'shine') {
                $type = 'poketitleshine';
                $img = 'shine';
                $name = 'shine';
            } elseif ($inf['type'] == 'shadow') {
                $type = 'poketitleshadow';
                $img = 'shine';
                $name = 'shadow';
            } elseif ($inf['type'] == 'showy') {
                $type = 'poketitleshowy';
                $img = 'shine';
                $name = 'snowy';
            } elseif ($inf['type'] == 'fighter') {
                $type = 'poketitleshine';
                $img = 'shine';
                $name = 'fighter';
            } elseif ($inf['type'] == 'contest') {
                $type = 'poketitleshine';
                $img = 'shine';
                $name = 'contest';
            } elseif ($inf['type'] == 'champion') {
                $type = 'poketitleshine';
                $img = 'shine';
                $name = 'champion';
            } elseif ($inf['type'] == 'zombie') {
                $type = 'poketitlezombie';
                $img = 'zombie';
                $name = 'zombie';
            } elseif ($inf['type'] == 'gym') {
                $type = 'poketitleshine';
                $img = 'shine';
                $name = 'gym';
            } elseif ($inf['type'] == 'Coordinator') {
                $type = 'poketitleshine';
                $img = 'shine';
                $name = 'Coordinator';
            } elseif ($inf['type'] == 'magistra') {
                $type = 'poketitleshine';
                $img = 'shine';
                $name = 'magistra';
            }
            if($inf['item_id'] > 0){
                $item = '<div class="item"><img src="img/items/'.$inf['item_id'].'.gif" width="32" height="32" border="0"></div>';
            }
            else {
                $item = '';
            }
            ?>
            <html>
            <head>
                <meta http-equiv='content-type' content='text/html';
                charset='windows-1251'>
                <link rel='stylesheet' href='style.css' type='text/css' />
                <style>
                    div.poke {
                        position:relative;
                        left:0;
                        top:0;
                        width:215;
                        height:200;
                        margin: 0 0 0 0;
                        z-index:10;
                        visibility:hidden;
                    }
                    div.item {
                        position:relative;
                        top:-51;
                        left:218;
                    }
                </style>
                <script>
                    function vis(id, num) {
                        eval("document.all.info" + num + ".style.visibility = \"hidden\";");
                        eval("document.all.stats" + num + ".style.visibility = \"hidden\";");
                        eval("document.all.moves" + num + ".style.visibility = \"hidden\";");
                        eval("document.all.status" + num + ".style.visibility = \"hidden\";");
                        eval("document.all." + id + ".style.visibility = \"visible\"");
                    }
                </script>
            </head>
            <body>
                <div style="height:240; overflow:hidden">
                    <table border="0" class="nonBorder" cellpadding="3" cellspacing="1" width="500">
                        <tbody>
                            <tr>
                                <td class="title" align="center">
                                    <span class="<?=$type?>">
                                        <a href="javascript:" onclick="win1=window.open(&quot;pokedex.php?sp_id=<?=numbPok($inf['basenum'])?>&quot;,&quot;dex&quot;,&quot;width=600,height=600,scrollbars=yes&quot;);"><img src="img/pokedex.gif" alt="Покедекс" title="Покедекс" border="0"></a>#<? print numbPok($inf['basenum']).' '.$inf['name'].' '.$inf['lvl'].'-lvl'.' '.$inf['type']?><?php if ($inf['trn'] > 0) {?><img src='./img/trn/Tren_ar<?=$inf["trn"]?>.png'><?php } ?> </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0">
                                        <tbody>
                                            <tr>
                                                <td width="250" valign="top">
                                                    <img src="https://claimbe.ru/img/pkmn/<?=$img?>/<?=numbPok($inf['basenum'])?>.jpg" width="250" height="190" border="1"><br>
                                                    <table border="0" cellspacing="0" width="252" height="10" class="nonBorder">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding:0">
                                                                    <? $hp_bar = round($inf['hp']/$inf['hp_max'] * 100); ?>
                                                                    <div style="width:<?=$hp_bar?>%;background:<?=colorHPbar($hp_bar)?>;height:12;font-size:9;">
                                                                        <?=$inf['hp']?>
                                                                    </div>
                                                                </td></tr>
                                                            <tr>
                                                                <td style="padding:0">
                                                                    <div style="width:<?=($inf['exp']/$inf['exp_max'])*100?>%;background:blue;height:5;font-size:0;"></div>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <?=$item?>
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
                                                                <tbody>
                                                                    <tr><td>НР:</td><td width="30"><?=$inf['hp_max']?></td><td width="30"><?=$inf['hp_ev']?></td></tr>
                                                                    <tr><td>Атака:</td><td><?=$inf['attack']?></td><td><?=$inf['atc_ev']?></td>
                                                                        <?php if ($inf['trn_stat'] == 1) { ?><td><img src='./img/trn/Tren_ar<?=$inf["trn"]?>.png'> </td><?php } ?></tr>
                                                                    <tr><td>Защита:</td><td><?=$inf['def']?></td><td><?=$inf['def_ev']?></td>
                                                                        <?php if ($inf['trn_stat'] == 2) { ?><td><img src='./img/trn/Tren_ar<?=$inf["trn"]?>.png'> </td><?php } ?></tr>
                                                                    <tr><td>Скорость:</td><td><?=$inf['speed']?></td><td><?=$inf['speed_ev']?></td>
                                                                        <?php if ($inf['trn_stat'] == 3) { ?><td><img src='./img/trn/Tren_ar<?=$inf["trn"]?>.png'> </td><?php } ?></tr>
                                                                    <tr><td>Спец.Атака:</td><td><?=$inf['sp_attack']?></td><td><?=$inf['spatc_ev']?></td>
                                                                        <?php if ($inf['trn_stat'] == 4) { ?><td><img src='./img/trn/Tren_ar<?=$inf["trn"]?>.png'> </td><?php } ?></tr>
                                                                    <tr><td>Спец.Защита: </td><td><?=$inf['sp_def']?></td><td><?=$inf['spdef_ev']?></td>
                                                                        <?php if ($inf['trn_stat'] == 5) { ?><td><img src='./img/trn/Tren_ar<?=$inf["trn"]?>.png'> </td><?php } ?></tr>
                                                                    <tr><td><b>&nbsp;Очки EV: <?=$inf['ev']?></b></td><td> </td><td> </td></tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <?
                                                        if ($inf['gender'] == 'male') $sex = '0';
                                                        elseif ($inf['gender'] == 'female') $sex = '1';
                                                        else $sex = '3';
                                                        $pok_base = $mysqli->query('SELECT * FROM base_pokemon WHERE name = "'.$inf['name'].'"')->fetch_assoc();
                                                        ?>
                                                        <div id="info0" class="poke" style="top:-200;">
                                                            <center><b id="txt">Инфо</b></center>
                                                            <font id="txt">
                                                                <b><img src="img/sex_<?=$sex?>.gif" width="7" height="13" border="0"> <?=$inf['name']?></b><br>
                                                                <b>Тип:</b> <?=atktip($pok_base['type'])?> <?=atktip($pok_base['type_two'])?><br>
                                                                <b>Пойман:</b> <?=get_last_online($inf['date_get'])?><br>
                                                                <b>Характер:</b> <?=haracter_pokes($inf['character'])?><br>
                                                                
                                                                
				         <?php if($pok['spark'] == 1){ echo "<b>Доступно разведение</b>"; }
				         if($pok['simpaty'] == 1 and $pok['spark'] == 1){ echo "<b> (A)</b>"; }elseif($pok['simpaty'] == 2 and $pok['spark'] == 1){ echo "<b> (T)</b>"; }elseif($pok['simpaty'] == 3 and $pok['spark'] == 1){ echo "<b> (G)</b>"; }else{echo "<b></b>"; }?>
				         
                                                                <p>&nbsp;</p>
                                                                <p></p>
                                                                <div align="right" style="color:#82b1e2">
                                                                    ID: <?=$inf['id']?>
                                                                </div>
                                                            </font>
                                                        </div>
                                                        <font id="txt">
                                                            <?
                                                            if ($inf['atk1']) {
                                                                $one = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$inf['atk1'])->fetch_assoc();
                                                            } else {
                                                                $one = array('attac_name_eng' => '-','atac_pp' => 0);
                                                            }
                                                            if ($inf['atk2']) {
                                                                $two = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$inf['atk2'])->fetch_assoc();
                                                            } else {
                                                                $two = array('attac_name_eng' => '-','atac_pp' => 0);
                                                            }
                                                            if ($inf['atk3']) {
                                                                $three = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$inf['atk3'])->fetch_assoc();
                                                            } else {
                                                                $three = array('attac_name_eng' => '-','atac_pp' => 0);
                                                            }
                                                            if ($inf['atk4']) {
                                                                $four = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$inf['atk4'])->fetch_assoc();
                                                            } else {
                                                                $four = array('attac_name_eng' => '-','atac_pp' => 0);
                                                            }
                                                            ?>
                                                            <div ID='moves0' class='poke' style="top:-400px;">
                                                                <center><b id='txt'>Атаки</b></center><P>
                                                                    <TABLE ID='txt' border='0' cellspacing='0' width='100%'>
                                                                        <tr><td width='50%'><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$one['atac_id']?>','at','width=500,height=230');
                                                                            ><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$one['attac_name_eng']?><br><span class='atPP'>PP <?=$inf['pp1'];
                                                                                ?>/<?=$one['atac_pp']?></span></td>
                                                                            <td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$two['atac_id']?>','at','width=500,height=230');
                                                                                ><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$two['attac_name_eng']?><br><span class='atPP'>PP <?=$inf['pp2']?>/<?=$two['atac_pp']?></span></td></tr>
                                                                        <tr><td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$three['atac_id']?>','at','width=500,height=230');
                                                                            ><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$three['attac_name_eng']?><br><span class='atPP'>PP <?=$inf['pp3'];
                                                                                ?>/<?=$three['atac_pp']?></span></td>
                                                                            <td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$four['atac_id']?>','at','width=500,height=230');
                                                                                ><img src='img/question.gif' alt='Инфо' border='0'></a> <?=$four['attac_name_eng']?><br><span class='atPP'>PP <?=$inf['pp4']?>/<?=$four['atac_pp']?></span></td></tr>
                                                                    </table>
                                                                    <P>
                                                                    </div>
                                                                    <?
                                                                    $owner = $mysqli->query('SELECT * FROM users WHERE id = '.$inf['owner'])->fetch_assoc();
                                                                    $user_data = $mysqli->query('SELECT * FROM users WHERE id = '.$inf['user_id'])->fetch_assoc();
                                                                    ?>
                                                                    <div id="status0" class="poke" style="top:-600;" valign="top">
                                                                        <center><b id="txt">Состояние</b></center>
                                                                        <br><b>Витамины:</b> <?=$inf['vitamines']?>/100
                                                                        <br><b>Генокод:</b> H<?=$inf['hp_gen']?>A<?=$inf['atc_gen']?>D<?=$inf['def_gen']?>S<?=$inf['speed_gen']?>SA<?=$inf['spatc_gen']?>SD<?=$inf['spdef_gen']?>
                                                                        <BR><B>Пойман тренером:</B> <a href='/game.php?fun=treninf&to_id=<?=$inf['owner']?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$inf['owner']?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='img/question.gif' border=0></a> <font color='<?=colorsUsers($owner['groups'])?>'><?=$owner['login']?></font>
                                                                            <BR><B>Хозяин:</B> <a href='/game.php?fun=treninf&to_id=<?=$inf['master']?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$inf['master']?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='img/question.gif' border=0></a> <font color='<?=colorsUsers(infUsr($inf["master"],"groups"))?>'><?=infUsr($inf["master"],"login")?></font>
                                                                                <BR><B>Состояние:</B> OK
                                                                                <BR><B>Приручен:</B> <?php if($pok['trade'] == 0){ echo "Нет"; }elseif($pok['trade'] == 1){ echo "Да"; }?>
			             <BR><B>Смена характера:</B> <?php if($pok['change_har'] == 0){ echo "Нет"; }elseif($pok['change_har'] == 1){ echo "Да"; }?>
			             <BR><B>Повышение генокода:</B> <?php if($pok['change_gen'] == 0){ echo "Нет"; }elseif($pok['change_gen'] == 1){ echo "Да"; }?><P>   
                                                                                </p>
                                                                                </div>
                                                        </font>
                                                    </div>
                                                </td></tr>
                                        </tbody>
                                    </table>
                                </td></tr>
                        </tbody>
                    </table>
                </div>
            </BODY></HTML>
<?php
        }
    }
}