<?php
/*
require_once ('ando/bsqldate/dbconsql.php');
 for ($i = 1; $i <= 649; $i++) {
$text = file_get_contents("http://old.league17.ru/pokedex.php?sp_id=".$i);
$text = iconv("CP1251", "UTF-8", $text);
preg_match( "/<td colspan='2'>(.*?)<\\/td>/is" , $text , $title );
$nt = explode(':',$title[1]);
$nts = $nt[1];
$nts = htmlspecialchars($nts, ENT_QUOTES);
$nts = str_replace("&#039;", "", $nts);
echo $nts;
$mysqli->query("UPDATE `base_pokemon` SET `evolve`='".$nts."' WHERE `id`='".$i."'");
}



$text = file_get_contents("http://www.free-kassa.ru/api.php?merchant_id=493061&s=1223de7281e3676ab097270ad378385e0&action=check_order_status&order_id=368");

preg_match( "/<status>(.*?)<\\/status>/is" , $text , $title );
$nt = $title[1];
echo $nt;
*/

?>

