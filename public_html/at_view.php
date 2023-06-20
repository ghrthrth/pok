<?
require_once ('ando/bsqldate/dbconsql.php');
require_once ('ando/functions/game.functions.php');
require_once ('ando/functions/tip.functions.php');
header('Content-Type: text/html; charset=utf-8');
$id = array_key_exists('AttackID',$_GET)?obr_chis($_GET['AttackID']):'';
$atc = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$id)->fetch_assoc();
if($atc['atac_categori'] == 1) $type = 'Физический';
elseif($atc['atac_categori'] == 2) $type = 'Специальный';
elseif($atc['atac_categori'] == 4) $type = 'Физический';
else $type = 'Неизвестный';

if($atc['atac_power'] == 0 OR  $atc['atac_power'] == 4){ $power = '-';}
else {$power = $atc['atac_power'];}

if($atc['atac_accuracy'] == 0 OR  $atc['atac_power'] == 4){ $accuracy = '-';}
else { $accuracy = $atc['atac_accuracy'].'%';} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <TITLE>Информация по атаке</TITLE>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; Charset=Windows-1251">
    <LINK REL="Stylesheet" HREF="style.css" TYPE="text/css">
</HEAD>
<BODY>
<H1><?=$atc['attac_name_eng'];?></H1>
<TABLE width='100%'>
<TR><TD width='100'><b>PP:</b></TD><TD><?=$atc['atac_pp'];?></TD></TR>
<TR><TD><b>Тип:</b></TD><TD><?=atktip($atc['atac_tip']);?> (<?=$type;?>)</TD></TR>
<TR><TD><b>Мощность:</b></TD><TD><?=$power;?></TD></TR>
<TR><TD><b>Точность:</b></TD><TD><?=$accuracy;?></TD></TR>
<? if($atc['priorety'] != 0){ ?>
<TR><TD><b>Приоритет:</b></TD><TD><?=$atc['priorety'];?></TD></TR>
<?}?>
<!--<TR><TD><b>Цель:</b></TD><TD>РџСЂРѕС‚РёРІРЅРёРє</TD></TR>-->
<TR><TD valign='top'><b>Описание:</b></TD><TD><?=$atc['tittle_effect'];?></TD></TR>
</TABLE>
<body>
          <table width="100%">
           <td align="right"><font color="#7dafc9"><br>ID Attack: <?=$id;?></font></td>
           </table>
         </body>