<?php 
// 9.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
if($npc == 8 && $answer == 3){ 
	if(array_key_exists('p_id',$_GET)){
		$pok_id = obr_chis($_GET['p_id']);
		if(!item_isset(1, 250000)){
			echo "<SCRIPT>location.href='game.php?fun=m_npc&npc_id=8&answ_id=3&map=1';</SCRIPT>"; return;
		}else{
$poks = $mysqli->query('SELECT item_id FROM user_pokemons WHERE user_id != '.$_SESSION['user_id'].' AND master = '.$_SESSION['user_id'].' and id = '.$pok_id)->fetch_assoc();
if($poks['item_id'] > 0) { if($poks['item_id'] == 42 ){ }else{ plus_item(1,$poks['item_id']); }  }
			$mysqli->query("UPDATE user_pokemons SET active = '0', item_id = '0', user_id = ".$_SESSION['user_id']." WHERE `id` = ".$pok_id." AND `master` = ".$_SESSION['user_id']);
			minus_item(250000,1);
			echo "<SCRIPT>location.href='game.php?fun=m_npc&npc_id=8&answ_id=3&map=1';</SCRIPT>"; return;
		}
	}
?>
<html>
	<head>
		<link rel='Stylesheet' href='style.css' type='text/css' >
	</head>
	<body id='tab'>
<span id='txt'>
<h1>Покецентр</h1>
<h2>Услуга возврата покемонов</h2>
<a href="game.php?fun=m_location&map=1"><< уйти</a><P>

   	<table bgcolor=#AFD0F1>
   	 <tr class='title'>
   	  <td colspan='3'>Стоимость возврата: <span class='rednote'>250.000 кр.<br>
	  <?php 
	  if(!item_isset(1, 250000)){
	  ?>
	  У вас недостаточно средств для возвратов.<?php }?></span></td>
   	 </tr>
   	 <tr class='title'>
   	  <td>Покемон</td>
   	  <td>Тренер</td>
   	  <td>&nbsp;</td>
   	 </tr>
   	<?php
   	$row['pok'] = isset($row['pok']) ? '<u><a href=\'javascript:\' title=\'Информация\' onclick=\'window.open("game.php?fun=pokeinf&p_id='.$row['pok'].'&master='.$user['master'].'","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");\'>'.$row['pok'].'</a></u>' : '';
		$poks_back = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id != '.$_SESSION['user_id'].' AND master = '.$_SESSION['user_id']);
		while($pok = $poks_back->fetch_assoc()){
			
			if(!empty($pok['name_new'])) $pokname = $pok['name_new'];
			else $pokname = $pok['name'];
	?>
    	 <tr class='bottom_dot'>
    	  <td width='300'><a HREF=javascript: onClick=win1=window.open("game.php?fun=pokeinf&p_id=<?=$row['pok']?>&master=<?=$user['master']?>","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");><img src='img/pkmna/<?=numbPok($pok['basenum']);?>.gif' border='0' alt='Покедекс' title='Покедекс'></a><a href=javascript: title='Покекарта' onclick=window.open("game.php?fun=pokeinf&p_id=<?=$pok["id"];?>&master=1","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");>#<?php  print numbPok($pok['basenum']).' '.$pokname.' '.$pok['lvl'].'-lvl';?> </a></td>
    	  <td width='150'><a href='/game.php?fun=treninf&to_id=<?=$pok['user_id'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$pok['user_id'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='/img/question.gif' border=0></a> <font color='<?=colorsUsers(infUsr($pok["user_id"],"groups"));?>'><?=infUsr($pok["user_id"],"login");?></font></td>
    	  <td><a href='game.php?fun=m_npc&npc_id=8&answ_id=3&map=1&p_id=<?=$pok['id'];?>'>Вернуть >></a></td>
    	 </tr>
		 <?php 
		}?>
    	</table>	

<?php }?>