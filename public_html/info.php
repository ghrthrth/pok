<?php 
session_start();
require_once ('ando/bsqldate/dbconsql.php');
require_once ('ando/functions/game.functions.php');
$titl = "Информация";
if (isset($_GET['go']) && ($_GET['go'] != false)){
  $go = $_GET['go'];
  if($go == 'rules'){
	  $titl = "Правила";
	  $includFiles = 'ando/tpl/rules.php';
  }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta name="yandex-verification" content="f269e59215b791ee" />
	<meta HTTP-EQUIV="Content-Type" content="text/html; Charset=Utf-8">
	<title>Pokezone > <?=$titl;?></title>
	<meta name="description" content=bvz "имя проекта - Браузерная онлайн игра по миру покемонов!" />
    <meta name="keywords" content="pokemon, pok, league17, l17, l-17, league-17, браузерная игра покемон, онлайн покемоны, онлайн, покемоны, играть, Лига 17" />
    <meta name="CatCutde0c9cc782" content="78A360E49BA5ACF49C97A6F5B3D7ED56Y6241" />
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="shortcut icon" href="favicon.ico" />
</head>

<body leftmargin="0" topmargin="0">
<table width="1024" border="0" cellspacing="0" class="logo" align="center">
	<tr>
		<td style="background: url('http://claimbe.ru/img/title.gif') #A6CAF0 no-repeat top center" class="logo">
			<table width="100%" height="140" border="0" cellspacing="0">
				<tr>
				    <td rowspan='2' width='250' alight='center'>
				        &nbsp;
				    </td>
					<td width="420" align="center">
					
					    <div style="width:100%; text-align:center;">
						<img src="img/items/blank.gif" width="1" height="105">
						</div>
					</td>
				    <td rowspan='2' width='250' alight='center'>
				        &nbsp;
				    </td>
				</tr>
				<tr>
        			<td>
			        	<table width="440" height="23" border="1" align="center" cellspacing="0" background="http://claimbe.ru/img/menu.jpg" style="border:1px solid #FFF;">
            				<tr>
					            <td><div align="center" style='font-size:11px;'>
					                  <a href="http://claimbe.ru/game.php?fun=start">Играть</a>
					                  | <a href="/..">Главная</a>
					                  | <a href="reg.php">Регистрация</a>
					                  | <a href="index.php?go=rules">Правила</a>
					                  | <a href="info.php">Новичкам</a>
					                  | <a href="info.php">О нас</a>
					                  | <a href="http://forum.claimbe.ru/">Форум</a></div>
					            </td>
              				</tr>
            			</table>
						<img src="http://claimbe.ru/img/items/blank.gif" width="1" height="120">
          			</td>
 				</tr>
 			</table>
 		</td>
 	</tr>
	<tr>
		<td id='n'>
    <table width="100%" border="0" cellspacing="0">
        <tr>
          <td valign="top">
 Pokezone - Браузерная онлайн игра по мотивам вселенной "Покемон". Наш маленький, виртуальный мир, предоставляет Вам возможность окунуться в мир сражений и дружбы этих удивительных монстров! В игре Вам доступно множество различных видов деятельности, даже покупка игровых предметов за реальные деньги. Сражайтесь, заводите новых друзей, развивайте своих покемонов и станьте лучшим тренером Pokezone!
          </td>
          <td width="1" valign="top">
		  <table width="250" cellspacing="0" align="center" style="margin-top: -40%;">
              <tr>
			  <td align="center">
                <img src="http://claimbe.ru/img/psidac.png" height="100px;"><br>
              	<br>&nbsp;
              </td>
              </tr>
              <tr>
                <td class="title" style="text-align:center;"><b>Вход</b></td>
              </tr>
			  <?php  if(!isset($_SESSION['user_id'])) { ?>
              <tr>
              <td>
                <P ID='txt'><b>Введите свой логин и пароль.</b>
<form name="а1" action="login.php" method="POST">
<TABLE border="0">
<TR><TD>Логин:</TD><TD>
<input name='uName' type='text' size='15' value=""><br></TD></TR>
<TR><TD>
Пароль:</TD><TD><input name="pass" type="password" size="15">
<a href="index.php?go=askpass"><img src="http://claimbe.ru/img/ask.gif" alt="Забыли Пароль?" border="0" width="9" height="10"></a><br></TT>
</TD></TR>
<TR><TD>&nbsp;</TD><TD align="center">
<input type=submit value="   Вход   "><br><a href="reg.php">[регистрация]</a>
</TD></TR>
</TABLE>
</form><br>                </td>
              </tr>
			  <?php  }else{ ?>
			  <tr>
			  <td>
			  Вы авторизованы.
			  <br /><a href="/game.php?fun=start">Играть >></a><br><br>
			  </td>
			  </tr>
			  <?php  } ?>
              <tr>
                <td class="title" style="text-align:center;"><b>Статистика</b></td>
              </tr>
              <tr>
			  <?php 
			  $online = $mysqli->query('SELECT COUNT(*) as counts FROM users WHERE online = 1')->fetch_assoc();
			  $dat = time()-3600*24;
			  $data = time()+3600*24;
			  $onlinetoday = $mysqli->query('SELECT COUNT(*) as counts FROM users WHERE online_time > '.$dat.' AND online_time < '.$data)->fetch_assoc();
			  
			  ?>
                <td>
                <P>Людей в игре:
                <?=$online['counts'];?>                <BR>
                Всего за день:
                <?=$onlinetoday['counts'];?>
                <P>
                </td>
              </tr>
              <tr>
                <td class="title" style="text-align:center;"><b>Информация</b></td>
              </tr>
              <tr>
                <td> 
					Pokezone - Браузерная онлайн-игра по мотивам покемонов.
					<p>
                </td>
              </tr>

              <tr>
                <td class="title" style="text-align:center;"><b>События</b></td>
              </tr>
              <tr>
                <td align='center'>
                    <b> <a href="http://forum.claimbe.ru/viewforum.php?f=16" target="_blank">Турнир на 100-lvl</a></b>
                    <br>&nbsp;<br>
                </td>
              </tr>


              <tr>
                <td class="title" style="text-align:center;"><b>Полезное</b></td>
              </tr>
              <tr>
                <td align='center'>
                <!--
                  <b>
                   <br>
                   <a href="http://wiki.claimbe.ru/" target="_blank">Лигапедия - энциклопедия тренера</a>
                   <br>&nbsp;<br>
                   <a href="http://forum.claimbe.ru//viewforum.php?f=23" target="_blank">Лига Чемпионов</a>
                   <br>&nbsp;<br>-->
                  <b> <a href="https://vk.com/claimbe.ru" target="_blank">Pokezone ВКонтакте</a></b>
                   <br>&nbsp;<br>
                  <!-- <a href="http://forum.claimbe.ru//viewforum.php?f=252" target="_blank">Вестник League-17</a>
                   <br>&nbsp;<br>
                   <a class=rednote href=http://forum.claimbe.ru//viewtopic.php?f=3&t=42876 target=_blank>Важное замечание по безопасности</a>
                   <br>&nbsp;<br>                   
                  </b>
                  -->
                </td>
              </tr>
              <tr>
                <td class="title" style="text-align:center;"><b>Рейтинги</b></td>
              </tr>
                
              <tr>
                <td>
                
					<p id='txt'>
					<b>ТОП 5 Тренеры - Ранг:</b>
					<table width='100%'>
					<?php 
					 $rang = $mysqli->query("SELECT * FROM users WHERE population > 0 AND groups != 1 AND groups != 7 AND groups != 99 ORDER BY population DESC limit 5");
					 while($rangs = $rang->fetch_assoc()){
					?>
					<tr><td width='10'>&nbsp;</td><td class='bottom_dot'>
					<a href='/game.php?fun=treninf&to_id=<?=$rangs['id'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$rangs['id'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='http://claimbe.ru/img/question.gif' border='0'></a> <font color="<?=colorsUsers($rangs['groups']);?>"><?=$rangs['login'];?></font></td><td align='right' class='bottom_dot'><?=$rangs['population'];?></td></tr><tr>
					<?php  } ?>
					</table>
					<p id='txt'>
					<b>ТОП 5 Тренеры - Покедекс:</b>
					<table width='100%'>
					<?php 
					 $topPoks = $mysqli->query("SELECT * FROM users WHERE count_pok > 0 AND groups != 1 AND groups != 7 AND groups != 99 ORDER BY count_pok DESC limit 5");
					 while($topPok = $topPoks->fetch_assoc()){
					?>
					<tr><td width='10'>&nbsp;</td><td class='bottom_dot'>
					<a href='/game.php?fun=treninf&to_id=<?=$topPok['id'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$topPok['id'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='http://claimbe.ru/img/question.gif' border='0'></a> <font color="<?=colorsUsers($topPok['groups']);?>"><?=$topPok['login'];?></font></td><td align='right' class='bottom_dot'><?=$topPok['count_pok'];?></td></tr><tr>
					<?php  } ?>
					</table>
					<p id='txt'>
                        <b>ТОП 5 Тренеры - Шайнидекс:</b>
                        <table width='100%'>
<?php
$topShinePoks = $mysqli->query("SELECT * FROM users WHERE count_shine_pok > 0 AND groups != 1 AND groups != 7 AND groups != 99 ORDER BY count_shine_pok DESC limit 5");
while($topShinePok = $topShinePoks->fetch_assoc()) {
?>
                                                <tr>
                                                    <td width='10'>&nbsp;</td>
                                                    <td class='bottom_dot'>
                                                        <a href='/game.php?fun=treninf&to_id=<?=$topShinePok['id'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$topShinePok['id'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='http://claimbe.ru/img/question.gif' border='0'></a>
                                                        <font color="<?=colorsUsers($topShinePok['groups']);?>"><?=$topShinePok['login'];?></font>
                                                    </td>
                                                    <td align='right' class='bottom_dot'><?=$topShinePok['count_shine_pok'];?></td>
                                                </tr>
<?php } ?>

                                            </table>
                                        </p>
					<p id=txt>
					<b>ТОП 5 Тренеры - Арена:</b>
					<table width=100%>
					 <?php $topArena = $mysqli->query("SELECT * FROM users WHERE jeton > 0 AND groups != 7 AND groups != 99 ORDER BY jeton DESC limit 5");
					 while($ta = $topArena->fetch_assoc()){ ?>
					<tr><td width='10'>&nbsp;</td><td class='bottom_dot'>
					<a href='/game.php?fun=treninf&to_id=<?=$ta['id'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$ta['id'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='http://claimbe.ru/img/question.gif' border='0'></a> <font color="<?=colorsUsers($ta['groups']);?>"><?=$ta['login'];?></font></td><td align='right' class='bottom_dot'><?=$ta['jeton'];?></td></tr><tr>				<?php } ?>	</table>


					<p id=txt>
					<b>ТОП 5 Кланы:</b>
					<table width=100%>
					<!--<tr><td width=10>&nbsp;</td><td class='bottom_dot'><img src=img/clans/90.gif width=32 height=32></td><td class='bottom_dot'>Pride of the Gods</td><td align=right class='bottom_dot'>4354</td></tr><tr><td width=10>&nbsp;</td><td class='bottom_dot'><img src=img/clans/4.gif width=32 height=32></td><td class='bottom_dot'>Pikachu Project</td><td align=right class='bottom_dot'>3671</td></tr><tr><td width=10>&nbsp;</td><td class='bottom_dot'><img src=img/clans/12.gif width=32 height=32></td><td class='bottom_dot'>King of pokemons</td><td align=right class='bottom_dot'>3188</td></tr><tr><td width=10>&nbsp;</td><td class='bottom_dot'><img src=img/clans/143.gif width=32 height=32></td><td class='bottom_dot'>Plan B: Public Enemies</td><td align=right class='bottom_dot'>2948</td></tr><tr><td width=10>&nbsp;</td><td class='bottom_dot'><img src=img/clans/157.gif width=32 height=32></td><td class='bottom_dot'>Land of Pokemons and them Trainers</td><td align=right class='bottom_dot'>1998</td></tr>					</table>-->
					<br>&nbsp;
                </td>
              </tr>
              <tr>
                <td class="title" style="text-align:center;"><b><a href="http://claimbe.ru/viewtopic.php?f=13&t=42" target="_blank">Антикварный дом</a></b></td>
              </tr>
              <tr>
                <td>
                    <b>Последние 20 выйгрышей:</b><br>
    <?php 
  $cls = $mysqli->query("SELECT * FROM `antikvar` ORDER BY id DESC LIMIT 20 ");
while($cl = $cls->fetch_assoc()){ 
$usr = $mysqli->query("SELECT login FROM `users` WHERE  `id` = '".$cl['user']."'")->fetch_assoc();
$nam = $mysqli->query("SELECT name FROM `base_pokemon` WHERE  `id` = '".$cl['pok']."'")->fetch_assoc();

	?>
&nbsp;
<tt><font color=green>[<?=$cl['data'];?>]</font></tt> <a href='game.php?fun=treninf&to_id=<?=$cl["user"];?>' onclick="window.open('game.php?fun=treninf&to_id=<?=$cl["user"];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='http://claimbe.ru/img/question.gif' border=0></a> <b><?=$usr['login'];?></b>: <a HREF=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?=$cl['pok'];?>","dex","width=600,height=600,scrollbars=yes");><img src=http://claimbe.ru/img/pokedex.gif alt=Покедекс title=Покедекс border=0></a>#<?=numbPok($cl['pok']);?> <?=$nam['name'];?><br>
<?php } ?>
              <tr>
                <td class="title" style="text-align:center;">Погода</b></td>
              </tr>
              <tr>
                <td>
					<table width='100%'>
					<?php 
						$weathers = $mysqli->query('SELECT * FROM base_region');
						while($weather = $weathers->fetch_assoc()){
							$weather_id = $mysqli->query('SELECT * FROM weather WHERE id = '.$weather['weather'])->fetch_assoc()
					?>
					<tr><td class='bottom_dot'><b><?=$weather['name'];?></b></td><td align='right' class='bottom_dot'><?=$weather_id['name'];?></td></tr>
						<?php }?></table>
					<br>&nbsp;
                </td>
              </tr>
					

            </table></td>
        </tr>
      </table>

<HR>
<table width="100%">
<tr>
<td align="right" width=200>
<b><?=$_SERVER['HTTP_HOST']?> || admin@<?=$_SERVER['HTTP_HOST']?></b><br>
© 2009-<?=date('Y')?>
</td>
<tr>
</table>

</body>
</html>