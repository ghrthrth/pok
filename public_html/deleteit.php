<?
 /*if($_GET['sp_id'] < 1 OR $_GET['sp_id'] > 649){
	 echo "<script>window.location.href='pokedex.php?sp_id=1';</script>";
 }
 */
require_once ('ando/bsqldate/dbconsql.php');
require_once ('ando/functions/game.functions.php');
require_once ('ando/functions/tip.functions.php');
header('Content-Type: text/html; charset=utf-8');

if(isset($_GET['s'])){ 
if(is_numeric($_GET['s'])){ 
$search = obTxt(obr_chis($_GET['s'])); 
numbPok($search); 
die("<script>location.href='pokedex.php?sp_id=".$search."';</script>"); 
}elseif(is_string($_GET['s'])){ 
$search = obTxt($_GET['s']); 
/*$sql = "SELECT * FROM pok_town";*/
$sql = "SELECT a.pok AS pok, b.name AS townname, c.name AS pokname FROM pok_town a, base_location b, base_pokemon c WHERE (a.town = b.id) and (a.pok = c.name)";
$pok = $mysqli->query($sql);
 $mylocationtrue = obr_chis($_GET['location']);
	//$poklocation   = $mysqli->query('SELECT * FROM pok_town WHERE town = '.$mylocation)->fetch_assoc();
	$base_loc  = $mysqli->query('SELECT * FROM base_location WHERE id = '.$mylocation.'');
//$loca = $mysqli->query('SELECT * FROM base_location WHERE id = "'.$user_id['location'].'" ')->fetch_assoc();
//$pok = $mysqli->query($sql); 
if($pok->num_rows < 1){ ?>
<LINK REL="Stylesheet" HREF="style.css" TYPE="text/css"> 
<STYLE>
	#searchfield{
	    width:100%;
		font-size: 12px;
		border: 1px solid #99bfe7;
		padding: 3px 3px 3 24px;
		color: #99bfe7;
		background: #AFD0F1 url(http://claimbe.ru/img/search-icon.gif) 0 -23px no-repeat;
		margin: 0;
	}
	#searchfield:hover, #searchfield:hover,
	#searchfield:focus, #searchfield:focus {
		background: #B8D5F1 url(http://claimbe.ru/img/search-icon.gif) 0 -88px no-repeat;
		color: #1E3955;
	}

 </STYLE>

<!-- <form action="attackdex.php" method="GET" style="margin:0">
       <input type="text" name="s" id="searchfield" value="" placeholder="Введите ID или название атаки.">
     </form>
<center><h2>Атака не найдена.</h2></center> -->
<?php 
return;
}elseif($pok->num_rows == 1){ 
$user_id     = $_SESSION['user_id'];
$mylocation  = $mysqli->query("SELECT * FROM users WHERE '".$user_id."'")->fetch_assoc(); 

die("<script>location.href='pokedex.php?sp_id=".$pok['atac_id']."';</script>"); 
}else{?> 
<LINK REL="Stylesheet" HREF="style.css" TYPE="text/css"> 
<STYLE>
	#searchfield{
	    width:100%;
		font-size: 12px;
		border: 1px solid #99bfe7;
		padding: 3px 3px 3 24px;
		color: #99bfe7;
		background: #AFD0F1 url(http://claimbe.ru/img/search-icon.gif) 0 -23px no-repeat;
		margin: 0;
	}
	#searchfield:hover, #searchfield:hover,
	#searchfield:focus, #searchfield:focus {
		background: #B8D5F1 url(http://claimbe.ru/img/search-icon.gif) 0 -88px no-repeat;
		color: #1E3955;
	}

 </STYLE>

<!--<form action="poklocation.php" method="GET" style="margin:0">
       <input type="text" name="s" id="searchfield" value="" placeholder="Введите название или ID атаки">
     </form>-->
<p id=txt><b>&nbsp;&nbsp;Покемоны на локации $user['location']:</b><br>
<table>
<?
while($p = $pok->fetch_assoc()){
echo "<tr><td align=left> <a href='pokedex.php?sp_id=".$p['pok']."'><img src='img/pkmna/".numbPok($p['pok']).".gif' border=0></a>Локация - ".$p['pokname']."</td></tr>";
}
// echo "<tr><td><img src='img/pkmna/".numbPok($p['id']).".gif' border=0></td><td align=center><a href='pokedex.php?sp_id=".$p['id']."'>#".numbPok($p['id'])." ".$p['name']."</a></td></tr>";
echo "</table>";
exit(); 
} 

//die("<script>location.href='pokedex.php?sp_id=".$search."';</script>"); 
}else{ 
Header("Location: pokedex.php"); 
} 

}

$id = obr_chis($_GET['sp_id']);
$pok = $mysqli->query("SELECT * FROM base_pokemon WHERE id = '".$id."'")->fetch_assoc();
$de = $mysqli->query("SELECT * FROM dex_exp WHERE nom = '".$id."'")->fetch_assoc();


if(isset($_GET['shine']) && empty($_GET['shine'])){
	$img = 'shine';
}elseif(!empty($_GET['shine'])){
	Header("Location: ../");
}else{
	$img = 'normal';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
 <TITLE>Покедекс</TITLE>
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; Charset=Windows-1251">
 <LINK REL="Stylesheet" HREF="style.css" TYPE="text/css">
 <STYLE>
	#searchfield{
	    width:100%;
		font-size: 12px;
		border: 1px solid #99bfe7;
		padding: 3px 3px 3 24px;
		color: #99bfe7;
		background: #AFD0F1 url(http://claimbe.ru/img/search-icon.gif) 0 -23px no-repeat;
		margin: 0;
	}
	#searchfield:hover, #searchfield:hover,
	#searchfield:focus, #searchfield:focus {
		background: #B8D5F1 url(http://claimbe.ru/img/search-icon.gif) 0 -88px no-repeat;
		color: #1E3955;
	}

 </STYLE>
</HEAD>
