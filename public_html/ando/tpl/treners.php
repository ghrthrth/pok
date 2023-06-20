<?php 
if(isset($_GET['online'])){
    $pg = 0;
    if($_GET['page'] > 0){
        $pg = (obTxt($_GET['page'])-1)*30;
    }
    $users = $mysqli->query("SELECT * FROM `users` WHERE `online` = '1' and `groups` != '99' and `groups` != '7' ORDER BY `groups`,`id` LIMIT $pg,30");
    $fun = "<a href='game.php?fun=tren'>Показать всех</a>";
}
else{
    $pg = 0;
    if(isset($_GET['page']) && $_GET['page'] > 0){
        $pg = (obTxt($_GET['page'])-1)*30;
    }
    $users = $mysqli->query("SELECT * FROM `users` WHERE `groups` != '99' and `groups` != '7' ORDER BY `groups`,`id` LIMIT $pg,30");
    $fun = "<a href='game.php?fun=tren&page=1&online=1&isort=0'>Показать только онлайн</a>";
}
if(isset($_POST['to_name'])) {
    $sr = obTxt($_POST['to_name']); 
    $users = $mysqli->query("SELECT * FROM users WHERE  `groups` != '99' and `groups` != '7' and login LIKE '%{$sr}%'");
}
?>
<form name='find' action='game.php?fun=tren' method='post'>
    <input name='to_name' type='text'>
    <input type='submit' value='НАЙТИ'>
</form>
</p>
<table cellspacing='0' cellpadding='2' width='100%'>
    <tr><td class='title'><big><b>Имя тренера</b></big></td><td width=300 class='title'><big><b>Ранг</b></big></td></tr>
<?php 

	



while($treners = $users->fetch_assoc()){ ?>
    <tr style='cursor:pointer' onmouseover='this.bgColor="#88B1F0"' onmouseout='this.bgColor="#A6CAF0"' onclick="window.open('game.php?fun=treninf&to_id=<?=$treners['id'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;">
        <td><b><span style='color:<?=colorsUsers($treners['groups']);?>'  ><?=$treners['login'];?></span></b></td>
        <td><?=textGroup($treners['groups']);?></td>
    </tr>
    <tr style='cursor:pointer' onmouseover='this.bgColor="#88B1F0"' onmouseout='this.bgColor="#A6CAF0"' onclick="window.open('game.php?fun=treninf&to_id=0', 'treninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;">
<?php }?>
</table>
<p id='txt'>
    <?=$fun;?><br><br>
<?php
if(isset($_GET['online'])){
    $count = $mysqli->query("SELECT * FROM `users` WHERE `online`='1' and `groups` != '99' and `groups` != '7'");
    $rows = $count->num_rows;
    $cl = ceil($rows/30);
    $x = 0;
    $x2 = $x*30;
    while ($x++<$cl){
?>
    <a href='game.php?fun=tren&online=1&page=<?=$x;?>'><?=$x;?></a>
<?php }
}
else{
    $count = $mysqli->query("SELECT * FROM `users` WHERE `id`>'0' and `groups` != '99' and `groups` != '7'");
    $rows = $count->num_rows;
    $cl = ceil($rows/30);
    $x = 0;
    $x2 = $x*30;
    while ($x++<$cl){
?>
    <a href='game.php?fun=tren&page=<?=$x;?>'><?=$x;?></a>
<?php }
} ?>
 <!-- <br>Сортировать по <b>Имени</b> | <a href='game.php?fun=tren&isort=2'>Рангу</a> | <a href='game.php?fun=tren&isort=1'>Покедексу</a>-->
<HR>
<table width="100%">
<tr>
<td align="right" width=200>
<b>claimbe.ru || admin@claimbe.ru</b><br>
© 2009-2020
</td>
<tr>
</table>