<script>
var check_check = '0';
		function sel_all(name_of_form){
		   if( !document.getElementById(name_of_form).cheks ) return;
		   if( !document.getElementById(name_of_form).cheks.length )
		      document.getElementById(name_of_form).cheks.checked = document.getElementById(name_of_form).cheks.checked ? false : true;
		   else {
		      for(var i=0;i<document.getElementById(name_of_form).cheks.length;i++) {
		         if (check_check=='0')
		            document.getElementById(name_of_form).cheks[i].checked = true;
		         else
		            document.getElementById(name_of_form).cheks[i].checked = false;
		      }
		      if (check_check=='0') check_check = '1';
		      else check_check = '0';
		   }
		}
</script>
<a href='game.php?fun=messages' ><img src='img/refresh.png' border='0' > <b>Проверить почту</b></a>
     <table width='100%' cellspacing='5'>
       <tr>
	   <?php 
	   if(isset($_GET['out'])){?>
         <td width='50%' class='biglink' align='center'><a href='game.php?fun=messages' >Полученные</td>
         <td width='50%' class='biglink' align='center' style='background-color:#88B1F0'>Отправленные</a></td>
	   <?php }else{?>
		<td width='50%' class='biglink' align='center' style='background-color:#88B1F0'>Полученные</td>
        <td width='50%' class='biglink' align='center'><a href='game.php?fun=messages&out' >Отправленные</a></td>
	   <?php }?>
       </tr>
     </table>
	  <?php  if(isset($_GET['id'])){
			$id = obr_chis($_GET['id']);
			$message = $mysqli->query("SELECT * FROM sends WHERE `id` = '".$id."' and (`user_to` = '".$user_id."' OR `user_id` = '".$user_id."')")->fetch_assoc();
			$mysqli->query("UPDATE `sends` SET `view` = '1' WHERE `id` = '".$id."' and `user_to` = '".$user_id."'");
		  if(isset($_GET['out'])){
		  ?>
		  <table bgcolor=#B8D5F1 align='center' width=70%>
            <tr><td width=60><b>От:</b></td><td style='color:<?=colorsUsers(infUsr($message['user_id'],"groups"));?>;'><a href='/game.php?fun=treninf&to_id=<?=$message['user_id'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$message['user_id'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='img/question.gif' border=0></a> <?=infUsr($message['user_id'],"login");?></td><td align='right' style='color:green;'><tt>[<?=$message['date'];?>]</tt></td></tr>
            <tr><td><b>Кому:</b></td><td colspan='2' style='color:<?=colorsUsers(infUsr($message['user_to'],"groups"));?>;'><a href='/game.php?fun=treninf&to_id=<?=$message['user_to'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$message['user_to'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='img/question.gif' border=0></a>  <?=infUsr($message['user_to'],"login");?></td></tr>
            <tr><td><b>Тема:</b></td><td colspan='2'><?=$message['subject'];?></td></tr>
            <tr><td colspan=3 style='border:3px solid #B8D5F1; background-color:#AFD0F1; padding:10px; color:black;'><?=$message['text'];?></td></tr></table>
		  <?php }else{?>
		  <table bgcolor='#B8D5F1' align='center' width='70%'>
            <tr><td width=60><b>От:</b></td><td style='color:<?=colorsUsers(infUsr($message['user_id'],"groups"));?>;'><a href='/game.php?fun=treninf&to_id=<?=$message['user_id'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$message['user_id'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='img/question.gif' border='0'></a> <?=infUsr($message['user_id'],"login");?></td><td align='right' style='color:green;'><tt>[<?=$message['date'];?>]</tt></td></tr>
            <tr><td><b>Кому:</b></td><td colspan='2' style='color:<?=colorsUsers(infUsr($message['user_to'],"groups"));?>;'><a href='/game.php?fun=treninf&to_id=<?=$message['user_to'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$message['user_to'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='img/question.gif' border='0'></a> <?=infUsr($message['user_to'],"login");?></td></tr>
            <tr><td><b>Тема:</b></td><td colspan='2'><?=$message['subject'];?></td></tr>
            <tr><td colspan=3 style='border:3px solid #B8D5F1; background-color:#AFD0F1; padding:10px; color:black;'><?=$message['text'];?></td></tr></table>
		  <?php }?>
		 
	  <?php } ?>
	<?php 
	if(isset($_GET['out'])){
		$x = 'Кому';
	}else{
		$x = 'От кого';
	}
     ?>
     <br>&nbsp;<br>
     <form id='fMess'>
      <table width='100%' cellspacing='0' bgcolor='#AFD0F1'>
       <tr class='title'>
         <td class='title' width='200'>Дата</td>
         <td class='title' width='200'><?=$x;?></td>
         <td class='title'>Тема</td>
       </tr>
	   <?php  
	   if(isset($_GET['out'])){
		   $sends = $mysqli->query('SELECT * FROM sends WHERE user_id = '.$_SESSION['user_id'].' ORDER BY id DESC');
			if(isset($sends->num_rows) && $sends->num_rows > 0) {
		   while($send = $sends->fetch_assoc()){
		   ?>
			<tr class='message <?php if($send["view"] == 0){ echo "un";} ?>read '>
			 <td style='color:green;'><input name='cheks' type='checkbox' value=4059193>&nbsp;<tt>[<?=$send['date'];?>]</tt></td>
			 <td style='color:<?=colorsUsers(infUsr($send['user_to'],"groups"));?>;'><a href='/game.php?fun=treninf&to_id=<?=$send['user_to'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$send['user_to'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='img/question.gif' border=0></a> <?=infUsr($send['user_to'],"login");?></td>
			 <td><a href='game.php?fun=messages&p=0&out&id=<?=$send['id'];?>'><?=$send['subject'];?></a></td>
			<tr>
		<?php }
			}
	   } else {
			$sends = $mysqli->query('SELECT * FROM sends WHERE user_to = '.$_SESSION['user_id'].' ORDER BY id DESC');
			if(isset($sends->num_rows) && $sends->num_rows > 0) {
			while($send = $sends->fetch_assoc()){
		   ?>
			<tr class='message <?php if($send["view"] == 0){ echo "un";} ?>read '>
			 <td style='color:green;'><input name='cheks' type='checkbox' value=4059193>&nbsp;<tt>[<?=$send['date'];?>]</tt></td>
			 <td style='color:<?=colorsUsers(infUsr($send['user_id'],"groups"));?>;'><a href='/game.php?fun=treninf&to_id=<?=$send['user_id'];?>' onclick="window.open('/game.php?fun=treninf&to_id=<?=$send['user_id'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='img/question.gif' border=0></a> <?=infUsr($send['user_id'],"login");?></td>
			 <td><a href='game.php?fun=messages&p=0&id=<?=$send['id'];?>'><?=$send['subject'];?></a></td>
			<tr>
	   <?php }
			}
	   }?>
      <!--  <tr><td colspan=2><a href=javascript: onclick='sel_all("fMess");'>выделить/снять выделение</a></td><td align=right><input type=button value=Удалить onclick='del("fMess");'></td></tr>-->
     </table>
     </form>

     <table width='100%' cellspacing=5>
       <tr>
         <td width='50%' class='biglink'>&nbsp;</td>
         <td width='50%' class='biglink' align='right' >&nbsp;</td>
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