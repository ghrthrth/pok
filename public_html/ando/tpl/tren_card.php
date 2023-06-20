<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      font-size: 16px;
      font-weight: 400;
      line-height: 1.5;
      color: #212529;
      text-align: left;
      background-color: #fff;
    }

    .tabs {
    	
      font-size: 0;
      max-width: 350px;
      margin-left: 0;
      margin-right: 0;
    }

    .tabs>input[type="radio"] {
      display: none;
    }

    .tabs>div {
      /* скрыть контент по умолчанию */
    display: none;
   
    padding: 0px 5px;
    font-size: 11px;
    }

    /* отобразить контент, связанный с вабранной радиокнопкой (input type="radio") */
    #tab-btn-1:checked~#content-1,
    #tab-btn-2:checked~#content-2,
    #tab-btn-3:checked~#content-3 {
      display: block;
    }

    .tabs>label {
display: inline-block;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    background-color: #b8d5f1;
    border: 1px solid #8ab3dc;
    padding: 2px 8px;
    font-size: 10px;
    line-height: 1.5;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out;
    cursor: pointer;
    position: relative;
    top: 1px;
    }

    .tabs>label:not(:first-of-type) {
      border-left: none;
    }

    .tabs>input[type="radio"]:checked+label {
    background-color: #acc8e2;
      border-bottom: 1px solid #8ab3dc;
    }
  </style>

</head>
<?php
if(!isset($_GET['to_id']) || empty($_GET['to_id']) || $_GET['to_id'] < 1){
	die('<script>window.location.href=...;</script>');
//}elseif($_GET['to_id'] == 2){
//	die('<center><font color="red">Система</font></center>');
}else{
	$user_id = obr_chis($_GET['to_id']);
}
#Добавление в друзья
if(isset($_GET['friends']) && isset($_GET['addfriend'])){
	$friends = $mysqli->query('SELECT * FROM friends WHERE ( user_id = '.$_SESSION['user_id'].' AND user_to = '.$user_id.' AND status = 1 ) OR user_to = '.$_SESSION['user_id'].' AND user_id = '.$user_id.' AND status = 1')->fetch_assoc();
	$friends1 = $mysqli->query('SELECT * FROM friends WHERE user_id = '.$_SESSION['user_id'].' AND user_to = '.$user_id.'  AND status = 0')->fetch_assoc();
	$friends2 = $mysqli->query('SELECT * FROM friends WHERE user_to = '.$_SESSION['user_id'].' AND user_id = '.$user_id.'  AND status = 0')->fetch_assoc();
  $datesend = get_last_online(time());
	if($friends){
		echo "<script>alert('Данный тренер уже в друзьях!')</script>";
		die('<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
	}elseif($friends1){
		echo "<script>alert('Вы уже отправили заявку, дождитесь ответа!')</script>";
		die('<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
	}elseif($friends2){
       $mysqli->query("UPDATE friends SET `status` = '1' WHERE `id` = '".$friends2['id']."'");
       echo "<script>alert('Заявка принята!')</script>";
		die('<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
	}else{
		$insert = $mysqli->query("INSERT INTO `friends` (`user_id`, `user_to`, `status`) VALUES ('".$_SESSION['user_id']."','".$user_id."','0') ");
    $mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('".$_SESSION['user_id']."','".$user_id."','Данный тренер отправил вам заявку в друзья. Примите в ответ что-бы добавить тренера в список друзей, или проигнорируйте это сообщение.','Добавление в Друзья','".$datesend."')");
    $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$user_id."','info','Заявка в друзья','У вас новая заявка в друзья!','false') ");
		if($insert){
		echo "<script>alert('Заявка в друзья отправлена!')</script>";
		die('<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
		}
	}
}

if(isset($_GET['friends']) && isset($_GET['empfr'])){
  $friends = $mysqli->query('SELECT * FROM friends WHERE (user_id = '.$user_id.' AND user_to = '.$_SESSION['user_id'].' AND status = 1) OR user_to = '.$user_id.' AND user_id = '.$_SESSION['user_id'].' AND status = 1')->fetch_assoc();
  if($friends){
    $mysqli->query("DELETE FROM `friends` WHERE `id` = '".$friends['id']."'");
    echo "<script>alert('Тренер удален из друзей!')</script>";
    die('<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
  }else{
    die('<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'";</script>');
  }

}

#Отправка сообщения
if(isset($_POST['text'])){
            if ($user['location'] == 2 OR $user['location'] == 6 OR $user['location'] == 7){
            echo "<script>alert('Отсюда писать нельзя.');</script>"; 
            echo "<script>location.href='game.php?fun=treninf&to_id=$user_id';</script>"; 
            return;
            }
            if ($user['silent'] > time()) {
            $molc = ceil(($user['silent']-time())/60);
            echo "<script>alert('Вы не можете отправлять сообщения ещё $molc минут.');</script>"; 
            echo "<script>location.href='game.php?fun=treninf&to_id=$user_id';</script>"; 
            return;
        }
    if($_SESSION['captcha_keystring'] == $_POST['keystring']){  }else{
        echo "<script>alert('Вы не верно ввели код с картинки!');</script>"; 
    echo "<script>location.href='game.php?fun=treninf&to_id=$user_id';</script>"; 
    return;
  }
	$date = get_last_online(time());
	$text = obTxt($_POST['text']);
	$user_to = obr_chis($_POST['to_id']);
	if($_POST['subj'] !== "") $subject = obTxt($_POST['subj']);
	else $subject = '...';
	$mysqli->query("INSERT INTO `sends` (`user_id`, `user_to`, `text`,`subject`,`date`) VALUES ('".$_SESSION['user_id']."','".$user_id."','".$text."','".$subject."','".$date."')");
  $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$user_id."','info','Новое сообщение','Вам пришло новое личное сообщение!','false') ");
	echo "<h2>Сообщение отправлено.</h2><hr>";
}

?>
<HTML><HEAD>
<META HTTP-EQUIV='Content-Type' CONTENT='text/html';Charset='Windows-1251'>
 <TITLE>Pokezone > Тренеркарта <?=infUsr($user_id,"login");?></TITLE>
 <LINK REL='Stylesheet' HREF='style.css' TYPE='text/css'>
 <style>
   div.awards {
   	width: 330px;
   }
   
   div.awards img {
   	display: inline-block;
   }
 </style> 
 <script>
 function defPosition(event) { // координаты мыши
    var x = y = 0;
    if (document.attachEvent != null) {
        x = window.event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
        y = window.event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
    } else if (!document.attachEvent && document.addEventListener) {
        x = event.clientX + window.scrollX;
        y = event.clientY + window.scrollY;
    } else {
        // Do nothing
    }
    return {x:x, y:y};
 }

 page=0;

 function tip(event, txt) {
   if (txt) {
     document.getElementById('divTip').style.left=defPosition(event).x + (txt.length>60 ? -100:0);
     document.getElementById('divTip').style.top=defPosition(event).y+15;
     document.getElementById('divTip').innerHTML=txt;
     document.getElementById('divTip').style.visibility='visible';
   } else document.getElementById('divTip').style.visibility='hidden';
 }
 </script>
</HEAD><BODY style="margin: 5 5 5 5">
<div id="divTip"></div>
         <table width=100%>
         <tr>
         <td width=220 valign='top'>
                <img src='/img/avas/<?=infUsr($user_id,"avatars");?>.png' width='215' height='410' alt='' border='0' align='left'>
         </td>
         <td valign='top'>
		 <?php 
		 if(infUsr($user_id,"online") == 1) {$color = '#008000'; $online = 'онлайн';}
		 else {$color = '#A60000'; $online = 'оффлайн';}
		 
		 $loca = $mysqli->query('SELECT * FROM base_location WHERE id = '.infUsr($user_id,"location"))->fetch_assoc();
         $regions = $mysqli->query('SELECT * FROM base_region WHERE id = '.$loca['region'])->fetch_assoc();
if(infUsr($user_id,"online") == 1 ) {$color = '#008000'; $online = 'онлайн';
		 ?>	
                <span style='font-weight:bold; font-size:16px; color:<?=colorsUsers(infUsr($user_id,"groups"));?>'><?=infUsr($user_id,"login");?></span>
                <img src='/img/device/<?=infUsr($user_id,"device");?>.png' width='20' height='20' alt='' border='0'>
                <br><font color=<?=$color;?>><sup><?=$online;?> | <b><?=$regions['name'];?></b>, <b><?=$loca['name'];?></b></b></sup></font>
            

				<?php }else{		 ?>
                <span style='font-weight:bold; font-size:16px; color:<?=colorsUsers(infUsr($user_id,"groups"));?>'><?=infUsr($user_id,"login");?></span>
                <img src='/img/device/off/<?=infUsr($user_id,"device");?>.png' width='20' height='20' alt='' border='0'>
                <br><font color=<?=$color;?>><sup><?=$online;?> | <b><?=$regions['name'];?></b></b></sup></font>
				<?php }
					$poks = $mysqli->query('SELECT * FROM user_pokemons WHERE active = 1 AND user_id = '.$user_id);
					$count_pok = $poks->num_rows;
				?>
        <body>

 <div class="tabs">
    <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
    <label for="tab-btn-1">Инфо</label>
    <input type="radio" name="tab-btn" id="tab-btn-2" value="">
    <label for="tab-btn-2">Статы</label>

    <div id="content-1">
 <br>
				<?php  while($pok = $poks->fetch_assoc()){
					if($pok['hp'] > 0){$type = 'slot';}
					elseif($pok['hp'] == 0){$type = 'slot_i';}
					?>
						<img src='/img/cond/<?=$type;?>.png' class='slot'>
					<?php  }
					$count = 6 - $count_pok;
					for($i = 0;$i < $count;$i++){
					?>
					<img src='/img/cond/slot_n.png' class='slot'>
					<?php }?>
				<?php 
				$groups = infUsr($user_id,"groups");
				if($groups == 1){
					$rang = 'Администрация Pokezone';
				}elseif($groups == 6){
					if(infUsr($user_id,"btl_count") == 0){
						$prc = 0;
					}else{
						$prc = round((infUsr($user_id,"win")/infUsr($user_id,"btl_count"))*100);
					}
					$rang = population($prc,infUsr($user_id,"population")).' '.reputation($prc,infUsr($user_id,"reputation"));
				}else{
					if(infUsr($user_id,"btl_count") == 0){
						$prc = 0;
					}else{
						$prc = round((infUsr($user_id,"win")/infUsr($user_id,"btl_count"))*100);
					}
					$rang = '<b>'.textGroup(infUsr($user_id,"groups")).',</b> '.population($prc,infUsr($user_id,"population")).' '.reputation($prc,infUsr($user_id,"reputation"));
				}
				?>

				<br><b>Ранг: <font color="<?=colorsUsers(infUsr($user_id,"groups"));?>"> </b><?=$rang;?>  </font>
                <br><b>Карма:</b> <font color=<?php if(infUsr($user_id,"karma") <= -10){ echo "#FF0000"; } if(infUsr($user_id,"karma") >= 1000000){ echo "#f4c430"; } if((infUsr($user_id,"karma") >= 10) and (infUsr($user_id,"karma") < 1000000)){ echo "#0A57A7"; } ?>><span><?=infUsr($user_id,"karma"); if(infUsr($user_id,"karma") <= -10){ echo ", преступник"; }  if (infUsr($user_id,"karma") == 1000000){ echo ", Immortal"; } if((infUsr($user_id,"karma") >= 10) and (infUsr($user_id,"karma") < 1000000) ){ echo ", защитник"; } ?></font></span>
                <br><b>Покедекс:</b> <?=infUsr($user_id,"count_pok");?>/779
                <br><b>Шайнидекс:</b> <?=infUsr($user_id,"count_shine_pok");?>
                <br><b>Статус:</b> <? if(infUsr($user_id,"status") == 'free'){echo "Свободен";}?> <? if(infUsr($user_id,"status") == 'talking'){echo "Диалог с NPC";}?><? if(infUsr($user_id,"status") == 'battle'){echo "В бою";}?><? if(infUsr($user_id,"status") == 'spark'){echo "Спаривание покемонов";}?><? if(infUsr($user_id,"status") == 'arest'){echo "Заключенный";}?><? if(infUsr($user_id,"status") == 'trade'){echo "В обмене";}?>
                <?if(infUsr($user_id,"rarena") == 1){ echo "<br><b>Подана заявка на арену.</b>";}?>
                <br><b>В Лиге:</b> <?=infUsr($user_id,"date_reg");?>
                <br><b>Послед. вход:</b> <?=get_last_online(infUsr($user_id,"online_time"));?>
                <br><i><?=infUsr($user_id,"about");?></i>
          <br>&nbsp;<br>
    </div>
    <div id="content-2">
 <br><b>Уровень:</b> <i>В разработке</i>
        <br><b>Сила:</b> <i>В разработке</i>
        <br><b>Ловкость:</b> <i>В разработке</i>
        <br><b>Интуиция:</b> <i>В разработке</i>
        <br><b>Выносливость:</b> <i>В разработке</i>
        <br>
        <br>
    </div>
  </div>
  </body>
		  <?php 
      $friends = $mysqli->query('SELECT * FROM friends WHERE ( user_id = '.$user_id.' OR user_to = '.$user_id.' ) AND status = 1');
		  if($_SESSION['user_id'] == $user_id){
      $frzay = $mysqli->query("SELECT * FROM `friends` WHERE `user_to` = '".$user_id."' AND `status` = '0'");
		  $fCou = $frzay->num_rows;
      }
    
      $countFriends = $friends->num_rows;
      
      $waros = $mysqli->query('SELECT * FROM awards WHERE ( user = '.$user_id.' ) AND id >= 1');
       $countwaros = $waros->num_rows;
		  ?>
				
          <table width='100%'>
		   <?php  		   if(!isset($_GET['friends'])){?>
              <td align='left'><b>[Награды: <?=$countwaros;?>]</b></td>
              <td align='right'><a href='game.php?fun=treninf&to_id=<?=$user_id;?>&friends#content-1'>[друзья: <?=$countFriends;?>]</a></td>
		   <?php }else{?>
		     <td align='left'><a href='game.php?fun=treninf&to_id=<?=$user_id;?>#content-1'>[Награды: <?=$countwaros;?>]</a></td>
              <td align='right'><b>[друзья: <?=$countFriends;?>]</b></td>
		   <?php }?>
          </table>
				
                <table bgcolor='#afd0f1' width='100%'>
				<?php  if(!isset($_GET['friends'])){ ?>
                  <tr><td align='center' class='title'><b>Эмблема клана</b></td></tr>
                  <?php if(infUsr($user_id,"clan_id") > 0) { 
                  $infC = $mysqli->query("SELECT * FROM `base_clans` WHERE `id` = '".infUsr($user_id,'clan_id')."'")->fetch_assoc();
                  	?>
                  <tr>
                  <td align='center'>
                  <span class='rednote'><?php if(infUsr($user_id,'clan_admin') == 1){ echo "*"; } ?> 
                     <img src='/img/clans/<?=$infC['id']; ?>.gif' width=32 height=32 alt='<?=$infC["name"];?>'
                          onmousemove='tip(event,"<b><?=$infC['name'];?></b><br>
                            <?php 
                          if(infUsr($user_id,'clan_admin') == 1){ ?><span class=itemdescr>Лидер клана</span> 
                            <?php } ?>");'
                          onmouseout='tip(event,0);'
                          onclick="window.open('game.php?fun=claninf&clan_id=<?=$infC['id']; ?>', 'claninf', 'fullscreen=no,scrollbars=yes,width=600,height=550'); 
                          return false;"
                          style='cursor:pointer'
                     > 
                     <?php if(infUsr($user_id,'clan_admin') == 1){ echo "*"; } ?> </span><br>
                     <?=infUsr($user_id,"clan_status"); ?><br>
                     <span style='color:<?php if(infUsr($user_id,"clan_rating") < 0) { echo "red"; }else{ echo "green"; } ?>'><?=infUsr($user_id,"clan_rating");?></td>
                     </tr>
                  <?php } ?>
                  <tr><td align='center' class='title'><b>Награды</b></td></tr>
                  <tr><td align='center'>
                  <div class='awards'>
                  <?php 
                  $awrdd = 0;
                  $awrd = $mysqli->query("SELECT * FROM `awards` WHERE `user` = '".$user_id."' ORDER BY `img`");
                  while($awr = $awrd->fetch_assoc()){ $awrdd = 1; ?>
                    <img src="/img/items/<?=$awr['img'];?>.gif" onmousemove='tip(event,"<b><?=$awr['name'];?></b><br><span class=itemdescr><?=$awr['descript'];?></span>");'
                          onmouseout='tip(event,0);'>
                  <?php
                }
                if(infUsr($user_id,'jeton') > 0) { $awrdd = 1; ?>
                <img src="/img/items/287.gif" onmousemove='tip(event,"<b>Жетон арены x<?=infUsr($user_id,'jeton');?> </b><br><span class=itemdescr>Вручается за победу на боевой арене.</span>");'
                          onmouseout='tip(event,0);'>
                          <?php
                        }
                if($awrdd == 0){ echo "- отсутствуют -"; }
                  ?>
                  </div>

                  </td></tr>
                  <tr><td align='center' class='title'><b>&nbsp;</b></td></tr>
                  <tr><td align='center'><div class='awards'></div></td></tr>
				<?php }else{?>
					<tr><td align='center' class='title'><b>Друзья</b></td></tr>
				<?php 	$friends1 = $mysqli->query('SELECT * FROM friends WHERE ( user_id = '.$_SESSION['user_id'].' AND user_to = '.$user_id.' AND status = 1 ) OR user_to = '.$_SESSION['user_id'].' AND user_id = '.$user_id.' AND status = 1')->fetch_assoc();
					if(!$friends1 && $user_id != $_SESSION['user_id']){?>
						  <tr><td align='center'><a href='game.php?fun=treninf&to_id=<?=$user_id;?>&friends&addfriend'>[добавить в друзья]</a></td></tr>
					<?php  } 
                      if($friends1){?>
						  <tr><td align='center'><a href='game.php?fun=treninf&to_id=<?=$user_id;?>&friends&empfr'>[удалить из друзей]</a></td></tr>
					<?php  } ?>
                  <tr><td align='left'>
                                  <div style='width:100%; height:120; overflow: scroll;'>
                  <?php
									while($friend = $friends->fetch_assoc()){
										if($friend['user_id'] == $user_id){
											$friendID = $friend['user_to'];
										}else{
											$friendID = $friend['user_id'];
										}
									?>
                            <a href='/game.php?fun=treninf&to_id=<?=infUsr($friendID,"id");?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=infUsr($friendID,"id");?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=600,height=430'); return false;"><IMG SRC='/img/question.gif' border='0'></a> <span style='color: <?=colorsUsers(infUsr($friendID,"groups"));?>;'><?=infUsr($friendID,"login");?></span><br>
									<?php }?>
						  </div>
                  </td></tr>

				<?php }?>
            </table>
          
          <br>
          <a href='javascript:' onclick='this.style.display="none"; document.getElementById("divMess").style.display="block"'>Отправить личное сообщение >></a> 
          <div id='divMess' style='display:none'>
          
         <p><table class='nonBorder' cellspacing=10 width=100%>
         <tr><td class='title'>Отправить сообщение</td></tr>
     <tr><td>
             <form name='sendmes' action='' method='post'>
               <input name='redir' type='hidden' value='tren'>
               <input name='to_id' type='hidden' value='<?=$user_id;?>'>
               <b>Тема:</b> <input name='subj' type='text' maxlength=70 style="width:180px;" value=""><br>
               <textarea name='text' style="width:100%; height:100px;" wrap='on' required ></textarea><br>
               <img src="/kp.php"></p>
               <p><input type="text" name="keystring"></p>
               <input type='submit' value='Отправить'>
             </form>
     </td></tr>
     </table>
 
        </div>
         </td>
         </tr>
         </table>
         </body>
         <body>
          <table width="100%">
           <td align="right"><font color="#7dafc9"><br>ID: <?=$user_id;?></font></td>
           </table>
         </body>
</html>