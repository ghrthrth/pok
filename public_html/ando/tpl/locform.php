<?php 
if($user_id == 3 OR $user_id == 1){


if(isset($_GET['new'])){
$mysqli->query("INSERT INTO `base_location` (`name`,`description`,`region`) VALUES ('".$_POST['locname']."','".$_POST['descrloc']."','2') ");
 echo "<SCRIPT>location.href='game.php?fun=locform';</SCRIPT>"; return;
}
?>
<form action="game.php?fun=locform&new=1" method="POST">
<input name="locname" type="text" placeholder='Название локации' required />
<input name="descrloc" type="text" placeholder='Описание локации' required />

<input type="submit" value="ОК">
</form>
<?php 

} else{ 
	 echo "<SCRIPT>location.href='http://claimbe.ru';</SCRIPT>"; return;
	 }

?>