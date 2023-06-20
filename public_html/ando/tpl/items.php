<?php 
if(isset($_POST['itemID'])){
	$id = obr_chis($_POST['itemID']);
	$info = $mysqli->query('SELECT * FROM user_items WHERE id = '.$id)->fetch_assoc();
	if($info['user_id'] != $_SESSION['user_id']){
		die("<script>window.location.href=...;</script>");
	}
	$base = $mysqli->query('SELECT * FROM base_items WHERE id = '.$info['item_id'])->fetch_assoc();
	if($info['egg'] == 1){
		$egg = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '".$info['pok']."' LIMIT 1")->fetch_assoc();
		$reb = round(($info['reborn']-time())/86400);
		$reb = " [До вылупления ".$reb." дн. Генокод: H".$info['hp']."A".$info['atk']."D".$info['def']."S".$info['speed']."SA".$info['satk']."SD".$info['sdef']."]";
	}
	$base = $mysqli->query('SELECT * FROM base_items WHERE id = '.$info['item_id'])->fetch_assoc();
	/*if($info['item_id'] == 231){
		$itmdl = round(($info['itemdel']-time())/86400);
		$itmdl = "[До окончания срока годности ".$itmdl." дн.]";
	}
	if($info['item_id'] == 241){
		$itmdl = round(($info['itemdel']-time())/86400);
		$itmdl = "[До окончания срока годности ".$itmdl." дн.]";
	}*/

	      
	$return = array(
	'name'=>$base['name']." ".$egg['name'],
	'about'=>$base['about'].$reb,$itmdl,
	'categories'=>$base['categories'],
	'count'=>price($info['count']),
	'weight'=>$base['weight'],
	'id'=>$base['id'],
	'use'=>$base['use'],
	'dress'=>$base['dress']
	);
	die(json_encode($return));
}
$items = $mysqli->query('SELECT * FROM user_items WHERE user_id = '.$_SESSION['user_id']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
 <TITLE>Инвентарь</TITLE>
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; Charset=Windows-1251">
 <link rel="Stylesheet" HREF="style.css" TYPE="text/css">
 <script src="js/jquery.min.js"></script>
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
 invType=0;

 function tip(event, ID) {
   if (event) {
     document.getElementById('divTip').style.left=defPosition(event).x+15;
     document.getElementById('divTip').style.top=defPosition(event).y+10;
     document.getElementById('divTip').innerHTML=i[ID][15];
     document.getElementById('divTip').style.visibility='visible';
   } else { document.getElementById('divTip').style.visibility='hidden';
 }
}

 function pic(ID,sitID,am,uw,dr,idd) {
   for (s=0;s<document.images.length;s++)
   document.images[s].style.border='1px solid #aecff1';
   document.getElementById("pic"+ID).style.border='1px solid black';
   document.getElementById('formit')['itID'].value=sitID;
   document.getElementById('formit')['amount'].value=am;
   document.getElementById('formit')['but1'].style.display=(uw?'inline':'none');
   document.getElementById('formit')['but2'].style.display=(dr?'inline':'none');
   document.getElementById('formit')['but3'].style.display=(dr?'inline':'none');
   if(idd == 298){
   document.getElementById('formit')['eggs'].style.display=(uw||dr?'block':'none');
    document.getElementById('formit')['pokes'].style.display='none';
   }else{
   document.getElementById('formit')['pokes'].style.display=(uw||dr?'block':'none');
   }
   eval("CURpic.src=pic"+ID+".src");
   CURname.innerHTML=document.getElementById('divTip').innerHTML;
 }
 function formatnum(str) {
 	str = str + '';
	var retstr = '';
	var now = 0;
	for (j = str.length-1; j>=0; j--) {
		if (now < 3)	{
			now++;
			retstr = str.charAt(j) + retstr;
		} else {
			now = 1;
			retstr = str.charAt(j) + '.' + retstr;
		}
	}
	return retstr;
 }

<?php
$cMyItm =  $mysqli->query("SELECT * FROM `user_items` WHERE `user_id`='".$user_id."'");
$ami = $cMyItm->num_rows;
?>
itemsamount = <?=$ami;?>;
i = new Array(<?=$ami;?>);
<?php 
$i = -1;

$allMyIT = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id`='".$user_id."'");
     while($allM = $allMyIT->fetch_assoc()){ 
     $i = $i+1;
	$base = $mysqli->query('SELECT * FROM base_items WHERE id = '.$allM['item_id'])->fetch_assoc();
	if($allM['egg'] == 1){
	$egg = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '".$allM['pok']."' LIMIT 1")->fetch_assoc();
	$base["name"] = $egg["name"];
	$reb = round(($allM['reborn']-time())/86400);
	$reb = " Внутри что - то шевелится... [До вылупления ".$reb." дн. Генокод: H".$allM['hp']."A".$allM['atk']."D".$allM['def']."S".$allM['speed']."SA".$allM['satk']."SD".$allM['sdef']."]";
	$base['about'] = $reb;
	}
	/*if($allM['item_id'] == 231){
         $oldbell = $mysqli->query("SELECT * FROM base_items WHERE `id` = '".$allM['item_id']."' LIMIT 1")->fetch_assoc();
         $base["id"] = $oldbell["id"];
         $itmdl = round(($allM['timedel']-time())/86400);
         $itmdl = "Находясь у вас в инвентаре колокольчик издаёт звук, который привлекает особых покемонов, таким образом шанс встретить шайни увеличивается в 3 раза. [До поломки ".$itmdl." дн.]";
         $base['about'] = $itmdl;
	}
	if($allM['item_id'] == 241){
         $oldbell = $mysqli->query("SELECT * FROM base_items WHERE `id` = '".$allM['item_id']."' LIMIT 1")->fetch_assoc();
         $base["id"] = $oldbell["id"];
         $itmdl = round(($allM['timedel']-time())/86400);
         $itmdl = "Ваш шанс встретить очень редких покемонов увеличивается в 2 раза. [До поломки ".$itmdl." дн.]";
         $base['about'] = $itmdl;
	}*/
     	?>
     	<?php       $kach = $mysqli->query('SELECT kachestvo FROM user_box WHERE user_id = '. $_SESSION['user_id'] . ' AND item = 27')->fetch_assoc();
      $z = $kach['kachestvo'];
	  //$m = $z['kachetvo'];    

	     //echo "<script>var s = '$z'; console.log(s);</script>";?>
i[<?=$i;?>] = new Array(<?=$allM['id'];?>,<?=$allM['item_id'];?>,<?=$allM['count'];?>,1,'<?=$base["name"];?>', <?=$base['dress'];?>,'Вес: <?=$base["weight"];?><br><?=$base['about'];?><br><p>Качество: <?if($allM['item_id'] != 27){ }else {echo $z;};?><?if($base['poknbr'] > 0){?> Прописан покемон с номером #<?=$base['poknbr'];}else{ }?>.',<?=$base['use'];?>,0);
<?php } ?>

 function fillupinv() {
	  p=page*40;
	  content="";
	  prints=1;
	  while (prints<=40 && i[p]) {
	    if (invType==0 || i[p][8]==invType) {
		    picF=i[p][1]+'.gif';
		    i[p][15]= i[p][4] + ' <b><small>x</small>'+formatnum(i[p][2])+'</b>';
		    if (i[p][6]) i[p][15]+='<br><span class=itemdescr>'+i[p][6]+'</span>';
		    content+="<div class=item><img class='item' ID=\"pic"+p+"\" src=\"/img/items/"+picF+"\" onClick=\"pic("+p+","+i[p][0]+","+i[p][2]+","+i[p][3]+","+i[p][5]+","+i[p][1]+","+i[p][8]+")\" onMouseMove=\"tip(event,"+p+");\" onMouseOut=\"tip(0); \"></div>";
	    	prints++;
	    }
	    p++;
	  }
	  for (k=prints; k<=40; k++) content+="<div class=item><img src='/img/items/blank.gif'></div>";
	  document.getElementById('inv').innerHTML=content;
	  if (page>0) {document.getElementById('divprev').innerHTML="<a href='javascript:' onclick='page--;fillupinv();'><<</a>";} else {document.getElementById('divprev').innerHTML="<span style='color:#92b1dd'>&lt;&lt;</span>";}
	  if (itemsamount>p) {document.getElementById('divnext').innerHTML="<a href='javascript:' onclick='page++;fillupinv();'>>></a>";} else {document.getElementById('divnext').innerHTML="<span style='color:#92b1dd'>&gt;&gt;</span>";}
 }

function use_item(tip){
	$('#add').val(tip);
	$('#formit').submit();
}
</script>
 <style>
    IMG {width:32; height:32; visibility:visible; border:1px solid #aecff1; margin:3px}
    IMG.item{CURSOR:POINTER;}
    BODY {margin:5 5 5 5;}

	div.item {
		background-color:#aecff1;
		margin:1px;
		float:left;
		width: 40px;
		height: 40px; 
	}
 </style>
</HEAD>
<BODY style="width:600; height:350;" onload="fillupinv();">
<H1>Инвентарь</H1>
<div id="divTip"></div>

<TABLE align="left" width="600"><TR><TD width="345" valign='top'>
<div id="inv">

</div>
<!--
<p style="margin-top: 100px;"><b>Вес: <?=$base['weight'];?>0/10000</b></p>
-->
<TABLE width="335" style="font-weight:bold; font-size:12px;">
  <TD align='left'><DIV id="divprev">

  </DIV></TD><TD align='center'>
    <small><a href="javascript:history.go(0)">- обновить -</a></small>
  </TD><TD align='right'><DIV id="divnext">

  </DIV></TD>
</TABLE>

</TD><TD valign='top'>
<DIV id="CURname">&nbsp;</DIV>
<br>
<img ID="CURpic" src="/img/items/blank.gif" width="32" height="32" border="0" style="CURSOR:DEFAULT"><br>
<form action="game.php?fun=use_item" method="POST" id="formit">
  <input name="amount" id="drop_count" type="text" value="" SIZE=10><BR>
  <input name="but0" type="button" value="Выкинуть" onclick="if (confirm('Вы уверены что хотите выбросить предмет?')) use_item('dr_item');"><P>&nbsp;<P>
  <select size="1" name="eggs" style='display:none'>
  <?php  
  $egg_user=$mysqli->query("SELECT * FROM user_items WHERE egg = 1 AND user_id =".$_SESSION['user_id']);
  while($egg = $egg_user->fetch_assoc()){
  	$bp = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '".$egg['pok']."' LIMIT 1")->fetch_assoc();
	  $name=$bp['name'];
	  ?>
  <option value="<?=$egg['id'];?>"><?=$name;?></option> 
  <?php }?></select><P>
  <select size="1" name="pokes" style='display:none'>
  <?php  
  $pok_user=$mysqli->query("SELECT * FROM user_pokemons WHERE active = 1 AND user_id =".$_SESSION['user_id']);
  while($pok = $pok_user->fetch_assoc()){
	  if(empty($pok['name_new']))$name=$pok['name'];
	  else $name = $pok['name_new'];
	  ?>
  <option value="<?=$pok['id'];?>"><?=$name;?></option> 
  <?php }?></select><P>
  <input name="but1" style='display:none' type="button" value="Использовать" onclick="use_item('use');" OR "use_item('dress');" >
  <input name="but2" style='display:none' type="button" value="Надеть" onclick="use_item('dress');">
<input name="but3" style='display:none' type="button" value="Крафт" onclick="use_item('kachestvo');">
  <input name="itID" type="hidden" value="">
  <input name="add" id="add" type="hidden" value="">
</form>
</TD></TR><TR><TD>
</TD></TR></TABLE>

</body>
</html>