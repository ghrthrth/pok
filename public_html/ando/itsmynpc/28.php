<?php #Аукционист
$info = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '1'")->fetch_assoc();
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Аукционист';
if($npc == 28 && empty($answer)){
	$textNPC = 'На данный момент мы закрыты, но вы можете пройти посмотреть как выглядит аукционный зал. 
<br /><b>
<br /></b>';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Просмотр лотов</a></li>';
}elseif($npc == 28 && $answer == 1){
	$baseloc['name'] = false;
	$nameNPC = false;
?>
<html>
	<head>
	<META HTTP-EQUIV=Content-Type CONTENT=text/html;Charset=Windows-1251>
	<link rel="Stylesheet" href="style.css" type="text/css" >
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

	 function tip(event, txt) {
	   if (txt) {
		 document.getElementById('divTip').style.left=defPosition(event).x+15;
		 document.getElementById('divTip').style.top=defPosition(event).y+10;
		 document.getElementById('divTip').innerHTML=txt;
		 document.getElementById('divTip').style.visibility='visible';
	   } else document.getElementById('divTip').style.visibility='hidden';
	 }

	 function sel_item(id, itemname, amount, ispoke) {
	   document.getElementById('ID=').value=id;
	   document.getElementById('ispoke').value=ispoke;
	   document.getElementById('itemname').innerHTML=itemname;
	   document.getElementById('itemamount').innerHTML='<b><small>x</small>'+formatnum(amount)+'</b>';
	   document.getElementById('tbLot').style.display='block';
	   if (ispoke) {
		  document.getElementById('txtamount').value=1;
		  document.getElementById('txtamount').disabled=1;
		  document.getElementById('itemamount').style.display='none';
		  pic.src='/img/pkmna/'+ispoke+'.gif';
	   } else {
		  document.getElementById('txtamount').value=amount;
		  document.getElementById('txtamount').disabled=0;
		  document.getElementById('itemamount').style.display='inline-block';
	   }
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
	</script>
</head>
<body id="tab">
<div id="divTip"></div>
<span id='txt'>
<h1>Аукцион</h1>
<a href="game.php?fun=m_npc&npc_id=28&map=1"><< назад</a><table width=980>
      <tr>
        <td colspan='5'><big><b>Ваш баланс: <?=$info['count'];?> кр.</b></big></td>
        <td align='right'><a href="game.php?fun=m_npc&npc_id=28&map=1"><img src='img/refresh.png' border='0'> <b>обновить</b></a></td>
      </tr>
	  <tr class='title'>
		<td colspan='3'>Лот</td><td>Текущая цена</td><td>Ваша ставка</td><td>Завершение</td>
	  </tr>
	  <tr>
		<td colspan='7' align='center' bgcolor='#AFD0F1'>
			<b><big>- нет лотов -</big></b>
		</td></tr>
		</table>
		<p><a href="game.php?fun=m_npc&npc_id=28&map=1"><< назад</a>	

<?php }else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 