<?php 
	$clans = $mysqli->query('SELECT * FROM base_clans ORDER BY rating DESC');
	$clan_position = 0;
?>
<P><h1>Кланы тренеров</h1>
<table cellspacing='0' cellpadding='2' width='70%' align='center'>
	<tr class='title'>
	<td colspan=2 class='title'>&nbsp;</td><td class='title'>Название клана</td><td align='center' class='title'>Рейтинг</td><td align='center' class='title'>&nbsp;</td></tr><!--<tr><td colspan='4'><b>1 дивизион</b></td></tr>-->
         <?php  while($clan = $clans->fetch_assoc()){ $i=1;
		 if($i < 4) $color = '#88810c';
		 else $color = '#A6CAF0';
		 $clan_position++;
		 ?>
		 <tr style='cursor:pointer' onmouseover='this.bgColor="#88B1F0"' onmouseout='this.bgColor="#A6CAF0"' onclick="window.open('game.php?fun=claninf&clan_id=<?=$clan['id'];?>', 'claninf', 'fullscreen=no,scrollbars=yes,width=400,height=550'); return false;">
            <td style='color:<?=$color;?>;' width='20'><?=$clan_position;?></td>
            <td width='37'><img src="http://claimbe.ru/img/clans/<?=$clan['id'];?>.gif" width='32' height='32'></td>
            <td style='color:<?=$color;?>;'><?=$clan['name'];?></td>
            <td align='center' style='color:<?=$color;?>;'><?=$clan['rating'];?></td>
            <td align='center' style='color:<?=$color;?>;'></td>
          </tr>
		 <?php $i++;}?>
        </table>
<p id='txt'>
<br>&nbsp;<br>
Бонусы лидирующим кланам <b>первого</b> дивизиона:
<br>&nbsp;&nbsp;  <b>1 место:</b> +30% к опыту покемонов членов клана;
<br>&nbsp;&nbsp;  <b>2 место:</b> +20% к опыту покемонов членов клана;
<br>&nbsp;&nbsp;  <b>3 место:</b> +10% к опыту покемонов членов клана.
<br>
<p id='txt' style='color:gray'>* обновление позиций в рейтинге происходит раз в час.
<HR>
<table width="100%">
<tr>
<td align="right" width=200>
<b><?=$_SERVER['HTTP_HOST']?>|| admin@<?=$_SERVER['HTTP_HOST']?></b><br>
© 2009-<?=date('Y')?>
</td>
<tr>
</table>