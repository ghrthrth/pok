<?php
$trade = $mysqli->query("SELECT * FROM trade WHERE `user1` = '{$user_id}' OR `user2` = '{$user_id}' LIMIT 1")->fetch_assoc();
if(empty($trade)) {
    echo "<script>parent._location.location='game.php?fun=m_location&map=1';</script>";
    return;
}
if($trade['user1'] == $user_id) {
    $ind  = 1;
    $indv = 2;
    $mID  = $trade['user1'];
    $vID  = $trade['user2'];
    $ok1  = $trade['ok1'];
    $ok2  = $trade['ok2'];
    $c1   = $trade['c1'];
    $c2   = $trade['c2'];
}
else {
    $ind  = 2;
    $indv = 1;
    $mID  = $trade['user2'];
    $vID  = $trade['user1'];
    $ok1  = $trade['ok2'];
    $ok2  = $trade['ok1'];
    $c1   = $trade['c2'];
    $c2   = $trade['c1'];
}

if(isset($_GET['back'])) {
    $back = obr_chis($_GET['back']);
    $bk = $mysqli->query("SELECT * FROM trade_log WHERE trade = '{$trade['id']}' and id = '{$back}' and user = '{$mID}'")->fetch_assoc();
    if($bk) {
        if($bk['pok'] > 0) {
            $mysqli->query("UPDATE trade SET ok1 = '0', ok2 = '0' WHERE `id` = '".$trade['id']."' ");
            $mysqli->query("UPDATE user_pokemons SET user_id = '$mID' WHERE `id` = '".$bk['pok']."' ");
            $mysqli->query("DELETE FROM `trade_log` WHERE `id` = '".$bk['id']."'");
            $mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '".$vID."'");
            echo "<script>location.href='game.php?fun=m_trade_work';</script>";
            return;
        }
        elseif($bk['egg'] > 0) {
            $mysqli->query("UPDATE trade SET ok1 = '0', ok2 = '0' WHERE `id` = '".$trade['id']."' ");
            $mysqli->query("UPDATE user_items SET user_id = '$mID' WHERE `id` = '".$bk['egg']."' ");
            $mysqli->query("DELETE FROM `trade_log` WHERE `id` = '".$bk['id']."'");
            $mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '".$vID."'");
            echo "<script>location.href='game.php?fun=m_trade_work';</script>";
            return;
        }
        else {
            plus_item($bk['count'],$bk['item'],$mID);
            $mysqli->query("UPDATE trade SET ok1 = '0', ok2 = '0' WHERE `id` = '".$trade['id']."' ");
            $mysqli->query("DELETE FROM `trade_log` WHERE `id` = '".$bk['id']."'");
            $mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '".$vID."'");
            echo "<script>location.href='game.php?fun=m_trade_work';</script>";
            return;
        }
    }
}

if(isset($_GET['p_id'])) {
    $pid = obr_chis($_GET['p_id']);
    $gtr = $mysqli->query("SELECT * FROM user_pokemons WHERE user_id = '{$mID}' and active = 1 and starts = 0 and trade = 0 and id = '{$pid}'")->fetch_assoc();
    if($gtr){
        if($gtr['master'] == $mID OR $gtr['master'] == $vID) {
            if($c1 < 2) {
                echo "<script>location.href='game.php?fun=m_trade_work';</script>";
                return;
            }
            if($c2 >= 6) {
                echo "<script>location.href='game.php?fun=m_trade_work';</script>";
                return;
            }
            if(isset($_GET['master']) OR $gtr['master'] == $vID) {
                $mst = 1;
            }
            else {
                $mst = 0;
            }
            $mysqli->query("UPDATE user_pokemons SET user_id = '2' WHERE `id` = '".$gtr['id']."' ");
            $mysqli->query("UPDATE trade SET ok1 = '0', ok2 = '0' WHERE `id` = '".$trade['id']."' ");
            $mysqli->query("INSERT INTO trade_log (trade , type , user, user_to, pok) VALUES ('".$trade['id']."','".$mst."','".$mID."','".$vID."','".$gtr['id']."') ");
            $mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '".$vID."'");
            echo "<script>location.href='game.php?fun=m_trade_work';</script>";
            return;
        }
        else {
            echo "<script>location.href='game.php?fun=m_trade_work';</script>";
            return;
        }
    }
    else {
        echo "<script>location.href='game.php?fun=m_trade_work';</script>";
        return;
    }
}

if(isset($_POST['amount'])) {
    if($_POST['ItemID'] > 0 ) {
        if($_POST['egg'] > 0) {
            $egid = obr_chis($_POST['egg']);
            $ifitm = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '999' and `id` = '".$egid."'")->fetch_assoc();
            if($ifitm){
                $mysqli->query("UPDATE trade SET ok1 = '0', ok2 = '0' WHERE `id` = '".$trade['id']."' ");
                $mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '".$vID."'");
                $mysqli->query("UPDATE user_items SET user_id = '2' WHERE `id` = '".$egid."'");
                $mysqli->query("INSERT INTO trade_log (trade , egg , user, user_to, count) VALUES ('".$trade['id']."','".$egid."','".$mID."','".$vID."','1') ");
                echo "<script>location.href='game.php?fun=m_trade_work';</script>";
                return;
            }
        }
        $count = round(obr_chis($_POST['amount']));
        $ii = obr_chis($_POST['ItemID']);
        if($count > 0) {
            $ifitm = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '".$ii."' and `count` >= '".$count."'")->fetch_assoc();
            if($ifitm) {
                $isetBAs = $mysqli->query("SELECT * FROM base_items WHERE `id` = '".$ii."' and `trade` = '1' ")->fetch_assoc();
                if($isetBAs) {
                    echo "<script>location.href='game.php?fun=m_trade_work';</script>";
                    return;
                }
                $it_log = $mysqli->query("SELECT * FROM trade_log WHERE `user` = '".$user_id."' and `item` = '".$ii."' and `count` > '0'")->fetch_assoc();
                if($it_log) {
                    $mysqli->query("UPDATE trade_log SET count = count+'".$count."' WHERE `id` = '".$it_log['id']."' ");
                }
                else {
                    $mysqli->query("INSERT INTO trade_log (trade , item , user, user_to, count) VALUES ('".$trade['id']."','".$ii."','".$mID."','".$vID."','".$count."') ");
                }
                $mysqli->query("UPDATE trade SET ok1 = '0', ok2 = '0' WHERE `id` = '".$trade['id']."' ");
                $mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '".$vID."'");
                
                minus_item($count,$ii,$mID);
                
                echo "<script>location.href='game.php?fun=m_trade_work';</script>";
                return;
            }
            else {
                echo "<script>location.href='game.php?fun=m_trade_work';</script>";
                return;
            }
        }
        else {
            echo "<script>location.href='game.php?fun=m_trade_work';</script>";
            return;
        }
    }
    else {
        echo "<script>location.href='game.php?fun=m_trade_work';</script>";
        return;
    }
}

if(isset($_GET['acc'])) {
    if($ok1 == 1) {
        $mysqli->query("UPDATE trade SET ok$ind = '0' WHERE `id` = '".$trade['id']."' ");
    }
    else{
        $mysqli->query("UPDATE trade SET ok$ind = '1' WHERE `id` = '".$trade['id']."' ");
    }
    echo "<script>location.href='game.php?fun=m_trade_work';</script>";
    return;
}

if($ok1 == 1 and $ok2 == 1){
    $trdlg = $mysqli->query("SELECT * FROM trade_log WHERE trade = '{$trade['id']}'");
    while($lg = $trdlg->fetch_assoc()) {
        if($lg['pok'] > 0) {
            if($lg['type'] == 1) {
                $mysqli->query("UPDATE user_pokemons SET user_id = '".$lg['user_to']."', master = '".$lg['user_to']."' WHERE `id` = '".$lg['pok']."' ");
            }
            else {
                $mysqli->query("UPDATE user_pokemons SET user_id = '".$lg['user_to']."' WHERE `id` = '".$lg['pok']."' ");
            }
        }
        elseif($lg['egg'] > 0) {
            $mysqli->query("UPDATE user_items SET user_id = '".$lg['user_to']."' WHERE `id` = '".$lg['egg']."' ");
        }
        else {
            plus_item($lg['count'],$lg['item'],$lg['user_to']);
        }
    }
    $mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '".$mID."'");
    $mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '".$vID."'");
    $mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '".$vID."'");
    //$mysqli->query("DELETE FROM `trade_log` WHERE `trade` = '".$trade['id']."'");
    $mysqli->query("DELETE FROM `trade` WHERE `id` = '".$trade['id']."'");
    echo "<script>location.href='game.php?fun=m_location';</script>";
    return;
}

if(isset($_GET['cancel'])) {
    $trdlg = $mysqli->query("SELECT * FROM trade_log WHERE trade = '{$trade['id']}'");
    while($lg = $trdlg->fetch_assoc()) {
        if($lg['pok'] > 0) {
            $mysqli->query("UPDATE user_pokemons SET `user_id` = '".$lg['user']."' WHERE `id` = '".$lg['pok']."' ");
        }
        elseif($lg['egg'] > 0) {
            $mysqli->query("UPDATE user_items SET `user_id` = '".$lg['user']."' WHERE `id` = '".$lg['egg']."' ");
        }
        else {
            plus_item($lg['count'],$lg['item'],$lg['user']);
        }
    }
    $mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '".$vID."'");
    $mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '".$mID."'");
    $mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '".$vID."'");
    $mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '".$vID."'");
    $mysqli->query("DELETE FROM `trade_log` WHERE `trade` = '".$trade['id']."'");
    $mysqli->query("DELETE FROM `trade` WHERE `id` = '".$trade['id']."'");
    
    echo "<script>location.href='game.php?fun=m_location';</script>";
    return;
}
?>
<link rel=stylesheet href=style.css type=text/css>
<body id='tab'>
<div id="divTip"></div>
<span id='txt'>

<table>
	<tr>
		<td>
			<div id='itemscontainer'><DIV id='tip'></div><DIV id='realitemscontainer'><TABLE border=0><TR style='BACKGROUND-COLOR:#aecff1; height:36;'>
		<?php 
    $itmUser = $mysqli->query("SELECT * FROM user_items WHERE user_id = '{$user_id}'");
while($itmUsers = $itmUser->fetch_assoc()){
	$egg_id = 0;
	$itm = $mysqli->query("SELECT * FROM base_items WHERE  `id` = '".$itmUsers['item_id']."' and `trade` = '0'")->fetch_assoc();
		if($itmUsers['egg'] == 1){
	    $egg = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '".$itmUsers['pok']."' LIMIT 1")->fetch_assoc();
	    $itm['name'] = $itm['name']." ".$egg['name'];
	    $egg_id = $itmUsers["id"];
	 }
	?>
		<TD width=34>
                <img border='0' src='img/items/<?=$itmUsers['item_id'];?>.gif'
                onMouseOut='tip(event,0);this.border=0;'
                onMouseMove='tip(event,"<?=$itm['name'];?>&nbsp;<b><small>x</small><?=price($itmUsers['count']);?></b>");this.border=1;'
                onClick="pic.src=this.src;document.getElementById('itemamount').innerHTML='<b><small>x</small><?=price($itmUsers['count']);?></b>';document.getElementById('itemname').innerHTML='<?=$itm['name'];?>';document.Sell.ItemID.value='<?=$itm["id"];?>';document.Sell.egg.value='<?=$egg_id;?>'"
                style='CURSOR:POINTER' width='32' height='32' id='itemimg<?=$itmUsers["id"];?>'>
        </TD>
        <?php } ?>
        
        </TR></TABLE></DIV></div>		</TD>
		<TD valign=top>
			<TABLE>
				<TR>
					<TD width="200">
						<form name="Sell" id="sellform" action="game.php?fun=m_trade_work" method="post">
							<input name="ItemID" type="hidden" value="1">
							<input name="egg" type="hidden" value="0">
							<img src="/img/items/blank.gif" width="32" height="32" alt="" border=0 name="pic" ID="pic">
							<DIV id="itemname" style='display:inline;'>&nbsp;</DIV>
							&nbsp;<DIV id="itemamount" style='display:inline;'>&nbsp;</DIV><br>
							<input name="amount" type="text" value="1" style='width:70px' onClick="this.select()" maxlength="15" onkeyup="test_amount();">
							<input type="submit" value=">>" id="btnadd"><BR>
						</form>
					</TD>
				</TR>
				<TR>
					<TD>
						&nbsp;<P>
					<?php if($ok1 == 0){ ?>
					<input type=button id='b_acc' value=ПОДТВ style="width:100;" onclick="window.location='game.php?fun=m_trade_work&acc=1';"><BR>
					<?php }else{ ?>
					<input type=button id='b_deacc' value=ОТКАЗ style="width:100;" onclick="window.location='game.php?fun=m_trade_work&acc=1';">
                    <?php } ?>
					<P>
						<input type="button" value="ВЫЙТИ" style="width:100" onclick="window.location='game.php?fun=m_trade_work&cancel=1';"><BR>
					</TD>
				</TR>
			</TABLE>
		</TD>
		<TD valign=top style="background: #BBD6F1; width:300px; padding: 10px; height:285px; overflow: auto;">
			<CENTER><font color='<?=colorsUsers(infUsr($mID,"groups"));?>'><b><?=infUsr($mID,"login");?></b></font></center>
			<?php if($ok1 == 1){ ?><DIV ID="my_ac" style="height:15; color:green; font-weight:bold;" class=a>ГОТОВ</DIV><?php } ?>
			<DIV ID="my" class=a>
<?php
$tlg = $mysqli->query("SELECT * FROM trade_log WHERE trade = '{$trade['id']}' and user = '{$mID}'");
while($tl = $tlg->fetch_assoc()) {
    if($tl['pok'] > 0) {
        $infTP = $mysqli->query("SELECT * FROM user_pokemons WHERE id = '{$tl['pok']}'")->fetch_assoc();
        ?>
<a href='game.php?fun=m_trade_work&back=<?=$tl['id'];?>'><img src=img/cancel.png border=0 alt='Вернуть' title='Вернуть'></a>
<a HREF=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?=$infTP['basenum'];?>","dex","width=600,height=600,scrollbars=yes");><img src=img/pkmna/<?=numbPok($infTP['basenum']);?>.gif border=0 alt=Покедекс title=Покедекс></a><a href=javascript: title=Информация onclick=window.open("game.php?fun=pokeinf&p_id=<?=$infTP['id'];?>","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");>#<?=numbPok($infTP['basenum'])." ".$infTP['name']." ".$infTP['lvl']."-lvl"." ".$infTP['type']; ?> </a> <?php if($tl['type'] == 0){ echo "<b><font color=red>ВРЕМЕННАЯ ПЕРЕДАЧА</font></b>"; } ?><br>
<?php
    }
    elseif($tl['egg'] > 0) {
        $itmUser = $mysqli->query("SELECT * FROM user_items WHERE id = '{$tl['egg']}'")->fetch_assoc();
        $negg = $mysqli->query("SELECT name FROM base_pokemon WHERE id = '{$itmUser['pok']}'")->fetch_assoc();
?>
<a href='game.php?fun=m_trade_work&back=<?=$tl['id'];?>'><img src=img/cancel.png border=0 alt='Вернуть' title='Вернуть'></a>
<img border='0' src='img/items/999.gif'> Яйцо <?=$negg['name']; ?> x1<br>
<?php
    }
    else {
        $infTI = $mysqli->query("SELECT * FROM base_items WHERE id = '{$tl['item']}'")->fetch_assoc();
?>
<a href='game.php?fun=m_trade_work&back=<?=$tl['id'];?>'><img src=img/cancel.png border=0 alt='Вернуть' title='Вернуть'></a>
<img border='0' src='img/items/<?=$infTI['id'];?>.gif'> <?=$infTI['name']; ?> x<?=price($tl['count']);?><br>
<?php
    }
}
?>
</div>
	</center>
	</td>
		</td>
		<td valign=top style="background: #BBD6F1; width:300px; padding: 10px; max-height:285px; overflow: auto;">
			<center><font color='<?=colorsUsers(infUsr($vID,"groups"));?>'><b><?=infUsr($vID,"login");?></b></font></center>
			<?php if($ok2 == 1){ ?><div id="his_ac" style="height:15; color:green; font-weight:bold;" class=a>ГОТОВ</div><?php } ?>
  			<div id="his" class="a">
<?php 
$tlg2 = $mysqli->query("SELECT * FROM trade_log WHERE trade = '{$trade['id']}' and user = '{$vID}'");
while($tl2 = $tlg2->fetch_assoc()) {
    if($tl2['pok'] > 0) {
        $infTP2 = $mysqli->query("SELECT * FROM user_pokemons WHERE id = '{$tl2['pok']}'")->fetch_assoc();
?>
<a HREF=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?=$infTP2['basenum'];?>","dex","width=600,height=600,scrollbars=yes");> <?php if($tl2['type'] == 1){ ?><img src=img/trade_star.png border=0 alt='' title=''><?php } ?><img src=img/pkmna/<?=numbPok($infTP2['basenum']);?>.gif border=0 alt=Покедекс title=Покедекс></a><a href=javascript: title=Информация onclick=window.open("game.php?fun=pokeinf&p_id=<?=$infTP2['id'];?>","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");>#<?=numbPok($infTP2['basenum'])." ".$infTP2['name']." ".$infTP2['lvl']."-lvl"." ".$infTP2['type']; ?> </a> <?php if($tl2['type'] == 0){ echo "<b><font color=red>ВРЕМЕННАЯ ПЕРЕДАЧА</font></b>"; } ?><br>
<?php
    }
    elseif($tl2['egg'] > 0) {
        $itmUser = $mysqli->query("SELECT * FROM user_items WHERE id = '{$tl2['egg']}'")->fetch_assoc();
        $negg = $mysqli->query("SELECT name FROM base_pokemon WHERE id = '{$itmUser['pok']}'")->fetch_assoc();
?>
<img border='0' src='img/items/999.gif'> Яйцо <?=$negg['name']; ?> x1<br>
<?php
    }
    else {
        $infTI2 = $mysqli->query("SELECT * FROM base_items WHERE id = '{$tl2['item']}'")->fetch_assoc();
?>
<img border='0' src='img/items/<?=$infTI2['id'];?>.gif'> <?=$infTI2['name']; ?> x<?=price($tl2['count']);?><br>
<?php
    }
}
?>
  			</div>
		</td>
	</tr>
</table>

<b ID=txt>Покемоны:</b>
<?php 
$trdP = $mysqli->query("SELECT * FROM user_pokemons WHERE user_id = '{$mID}' and active = 1 and starts = 0 and trade = 0");
while($trp = $trdP->fetch_assoc()) {
    if($trp['master'] == $mID OR $trp['master'] == $vID) {
?>
	        <br>
	        <?php if($trp['master'] == $vID){ ?>
            <a href='game.php?fun=m_trade_work&master=1&p_id=<?=$trp['id'];?>' ><img src=img/trade_master.png border=0 alt='Передать новому Хозяину' title='Передать новому Хозяину'></a>
	        <?php }else{ ?>
	        <a href='game.php?fun=m_trade_work&master=1&p_id=<?=$trp['id'];?>'><img src=img/trade_master.png border=0 alt='Передать новому Хозяину' title='Передать новому Хозяину'></a>
	        <a href='game.php?fun=m_trade_work&p_id=<?=$trp['id'];?>' ><img src=img/trade_temp.png border=0 title='Передать временно' alt='Передать временно'></a>
	        <?php } ?>
	        <a HREF=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?=$trp['basenum'];?>","dex","width=600,height=600,scrollbars=yes");><img src=img/pkmna/<?=numbPok($trp['basenum']);?>.gif border=0 alt=Покедекс title=Покедекс></a><a href=javascript: title=Информация onclick=window.open("game.php?fun=pokeinf&p_id=<?=$trp['id'];?>","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");>#<?=numbPok($trp['basenum'])." ".$trp['name']." ".$trp['lvl']."-lvl"." ".$trp['type']; ?> </a>
<?php
    }
}
?>
</body>
