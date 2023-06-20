<?php 
if(isset($_POST['rcom'])){
$mTM = $mysqli->query("SELECT * FROM team_btl WHERE `kom` = '".$kMy['kom']."' and `team` = '".$kMy['team']."' and (`status` = '1' or `status` = '2')")->fetch_assoc();
$vTM = $mysqli->query("SELECT * FROM team_btl WHERE `kom` = '".$kMy['kom']."' and `team` != '".$kMy['team']."' and (`status` = '1' or `status` = '2')")->fetch_assoc();
$infTVS = $mysqli->query("SELECT user FROM team_btl WHERE `leader` = '1' and `kom` = '".$kMy['kom']."' and `team` = '".$kMy['team']."' ")->fetch_assoc();
$infTMY = $mysqli->query("SELECT user FROM team_btl WHERE `leader` = '1' and `kom` = '".$kMy['kom']."' and `team` != '".$kMy['team']."'")->fetch_assoc();
  if(!$mTM) {
   $text_win = "<b>Бой окончен! Ваша команда одержала победу!</b>";
   $text_los = "<b>Бой окончен! Ваша команда потерпела поражение!</b>";
          $date = date("H:i");
    $allMTM = $mysqli->query("SELECT * FROM `team_btl` WHERE `kom`='".$kMy['kom']."' and `team`='".$kMy['team']."'");
     while($aMT = $allMTM->fetch_assoc()){
      if($aMT['type'] == 1){
        $fet = time()+5*60;
         $checkmegaamt = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$_aMT['user']."'")->fetch_assoc();
         $checkmegaavt = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$_aVT['user']."'")->fetch_assoc();
$mysqli->query("UPDATE users SET fetig = '$fet' WHERE `id` = '".$aMT['user']."'");
      }  
$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$aMT['user']."','info','Информация','".$text_los."','false') ");
$bc = $aMT['win']; if($aMT['win'] == 0) { $bc = 1; }
$pop = $aMT['win']*3; if($aMT['win'] == 0) { $pop = 2; }
$rep = $aMT['win']*3;



$mysqli->query("UPDATE users SET btl_count = btl_count+'$bc', win = win+'".$aMT['win']."', population = population+'$pop', reputation = reputation+'$rep'  WHERE `id` = '".$aMT['user']."'");
$mysqli->query("UPDATE users SET status = 'free',reload = '1' WHERE `id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$aMT['user']."' AND `active` = 1 AND `itemsused` > 0");
     /*if($checkmegaamt == 1 or $checkmegaavt == 1){
     $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$aMT['user']."'");
     $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '6' WHERE `basenum` = '3006' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '3' WHERE `basenum` = '3003' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '9' WHERE `basenum` = '3009' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '15' WHERE `basenum` = '3015' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '18' WHERE `basenum` = '3018' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '65' WHERE `basenum` = '3065' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '80' WHERE `basenum` = '3080' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '94' WHERE `basenum` = '3094' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '115' WHERE `basenum` = '3115' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '127' WHERE `basenum` = '3127' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '130' WHERE `basenum` = '3130' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '142' WHERE `basenum` = '3142' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '208' WHERE `basenum` = '3208' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '212' WHERE `basenum` = '3212' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '214' WHERE `basenum` = '3214' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '229' WHERE `basenum` = '3229' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '248' WHERE `basenum` = '3248' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '254' WHERE `basenum` = '3254' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '257' WHERE `basenum` = '3257' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '260' WHERE `basenum` = '3260' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '282' WHERE `basenum` = '3282' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '302' WHERE `basenum` = '3302' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '303' WHERE `basenum` = '3303' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '306' WHERE `basenum` = '3306' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '308' WHERE `basenum` = '3308' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '310' WHERE `basenum` = '3310' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '323' WHERE `basenum` = '3323' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '334' WHERE `basenum` = '3334' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '354' WHERE `basenum` = '3354' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '359' WHERE `basenum` = '3359' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '362' WHERE `basenum` = '3362' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '373' WHERE `basenum` = '3373' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '376' WHERE `basenum` = '3376' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '380' WHERE `basenum` = '3380' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '381' WHERE `basenum` = '3381' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '384' WHERE `basenum` = '3384' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '428' WHERE `basenum` = '3428' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '445' WHERE `basenum` = '3445' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '448' WHERE `basenum` = '3448' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '460' WHERE `basenum` = '3460' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '475' WHERE `basenum` = '3475' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '531' WHERE `basenum` = '3531' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '719' WHERE `basenum` = '3719' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '181' WHERE `basenum` = '3181' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '319' WHERE `basenum` = '3319' and `user_id` = '".$aMT['user']."'");
}*/
     }
    $allVTM = $mysqli->query("SELECT * FROM `team_btl` WHERE `kom`='".$kMy['kom']."' and `team` != '".$kMy['team']."'");
     while($aVT = $allVTM->fetch_assoc()){
$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$aVT['user']."','info','Информация','".$text_win."','false') ");

$bc = $aVT['win']; if($aVT['win'] == 0) { $bc = 1; }
$pop = $aVT['win']*3; if($aVT['win'] == 0) { $pop = 2; }
$rep = $aVT['win']*3;
if($aVT['type'] == 1){
  if($aVT['napal'] == $infTMY['user']){
    if(infUsr($infTVS['user'],"karma") > -10){
      $mysqli->query("UPDATE users SET karma = karma-'1' WHERE `id` = '".$aVT['user']."'");
    }else{
      $mysqli->query("UPDATE users SET karma = karma+'1' WHERE `id` = '".$aVT['user']."'");
    }
  }
}
$mysqli->query("UPDATE users SET btl_count = btl_count+'$bc', win = win+'".$aVT['win']."', population = population+'$pop', reputation = reputation+'$rep'  WHERE `id` = '".$aVT['user']."'");
$mysqli->query("UPDATE users SET status = 'free',reload = '1' WHERE `id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$aVT['user']."' AND `active` = 1 AND `itemsused` > 0");

 /*if($checkmegaamt == 1 or $checkmegaavt == 1){
  $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$aMT['user']."'");
     $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '6' WHERE `basenum` = '3006' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '3' WHERE `basenum` = '3003' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '9' WHERE `basenum` = '3009' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '15' WHERE `basenum` = '3015' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '18' WHERE `basenum` = '3018' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '65' WHERE `basenum` = '3065' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '80' WHERE `basenum` = '3080' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '94' WHERE `basenum` = '3094' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '115' WHERE `basenum` = '3115' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '127' WHERE `basenum` = '3127' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '130' WHERE `basenum` = '3130' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '142' WHERE `basenum` = '3142' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '208' WHERE `basenum` = '3208' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '212' WHERE `basenum` = '3212' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '214' WHERE `basenum` = '3214' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '229' WHERE `basenum` = '3229' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '248' WHERE `basenum` = '3248' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '254' WHERE `basenum` = '3254' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '257' WHERE `basenum` = '3257' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '260' WHERE `basenum` = '3260' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '282' WHERE `basenum` = '3282' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '302' WHERE `basenum` = '3302' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '303' WHERE `basenum` = '3303' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '306' WHERE `basenum` = '3306' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '308' WHERE `basenum` = '3308' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '310' WHERE `basenum` = '3310' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '323' WHERE `basenum` = '3323' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '334' WHERE `basenum` = '3334' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '354' WHERE `basenum` = '3354' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '359' WHERE `basenum` = '3359' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '362' WHERE `basenum` = '3362' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '373' WHERE `basenum` = '3373' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '376' WHERE `basenum` = '3376' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '380' WHERE `basenum` = '3380' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '381' WHERE `basenum` = '3381' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '384' WHERE `basenum` = '3384' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '428' WHERE `basenum` = '3428' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '445' WHERE `basenum` = '3445' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '448' WHERE `basenum` = '3448' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '460' WHERE `basenum` = '3460' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '475' WHERE `basenum` = '3475' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '531' WHERE `basenum` = '3531' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '719' WHERE `basenum` = '3719' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '181' WHERE `basenum` = '3181' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '319' WHERE `basenum` = '3319' and `user_id` = '".$aVT['user']."'");
}*/
     }
      $mysqli->query("DELETE FROM `team_btl` WHERE `kom` = '".$kMy['kom']."'");
     return;
  }
    if(!$vTM) {
   $text_win = "<b>Бой окончен! Ваша команда одержала победу!</b>";
   $text_los = "<b>Бой окончен! Ваша команда потерпела поражение!</b>";
          $date = date("H:i");
    $allMTM = $mysqli->query("SELECT * FROM `team_btl` WHERE `kom`='".$kMy['kom']."' and `team` != '".$kMy['team']."'");
     while($aMT = $allMTM->fetch_assoc()){
      if($aMT['type'] == 1){
        $fet = time()+5*60;
$mysqli->query("UPDATE users SET fetig = '$fet' WHERE `id` = '".$aMT['user']."'");
      }  
$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$aMT['user']."','info','Информация','".$text_los."','false') ");

$bc = $aMT['win']; if($aMT['win'] == 0) { $bc = 1; }
$pop = $aMT['win']*3; if($aMT['win'] == 0) { $pop = 2; }
$rep = $aMT['win']*3;
$mysqli->query("UPDATE users SET btl_count = btl_count+'$bc', win = win+'".$aMT['win']."', population = population+'$pop', reputation = reputation+'$rep'  WHERE `id` = '".$aMT['user']."'");
$mysqli->query("UPDATE users SET status = 'free',reload = '1' WHERE `id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$aMT['user']."' AND `active` = 1 AND `itemsused` > 0");

      /*if($checkmegaamt == 1 or $checkmegaavt == 1){
        $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$aMT['user']."'");
     $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '6' WHERE `basenum` = '3006' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '3' WHERE `basenum` = '3003' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '9' WHERE `basenum` = '3009' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '15' WHERE `basenum` = '3015' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '18' WHERE `basenum` = '3018' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '65' WHERE `basenum` = '3065' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '80' WHERE `basenum` = '3080' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '94' WHERE `basenum` = '3094' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '115' WHERE `basenum` = '3115' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '127' WHERE `basenum` = '3127' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '130' WHERE `basenum` = '3130' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '142' WHERE `basenum` = '3142' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '208' WHERE `basenum` = '3208' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '212' WHERE `basenum` = '3212' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '214' WHERE `basenum` = '3214' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '229' WHERE `basenum` = '3229' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '248' WHERE `basenum` = '3248' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '254' WHERE `basenum` = '3254' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '257' WHERE `basenum` = '3257' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '260' WHERE `basenum` = '3260' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '282' WHERE `basenum` = '3282' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '302' WHERE `basenum` = '3302' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '303' WHERE `basenum` = '3303' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '306' WHERE `basenum` = '3306' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '308' WHERE `basenum` = '3308' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '310' WHERE `basenum` = '3310' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '323' WHERE `basenum` = '3323' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '334' WHERE `basenum` = '3334' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '354' WHERE `basenum` = '3354' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '359' WHERE `basenum` = '3359' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '362' WHERE `basenum` = '3362' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '373' WHERE `basenum` = '3373' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '376' WHERE `basenum` = '3376' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '380' WHERE `basenum` = '3380' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '381' WHERE `basenum` = '3381' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '384' WHERE `basenum` = '3384' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '428' WHERE `basenum` = '3428' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '445' WHERE `basenum` = '3445' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '448' WHERE `basenum` = '3448' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '460' WHERE `basenum` = '3460' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '475' WHERE `basenum` = '3475' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '531' WHERE `basenum` = '3531' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '719' WHERE `basenum` = '3719' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '181' WHERE `basenum` = '3181' and `user_id` = '".$aMT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '319' WHERE `basenum` = '3319' and `user_id` = '".$aMT['user']."'");
}*/
     }
    $allVTM = $mysqli->query("SELECT * FROM `team_btl` WHERE `kom`='".$kMy['kom']."' and `team` = '".$kMy['team']."'");
     while($aVT = $allVTM->fetch_assoc()){

$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$aVT['user']."','info','Информация','".$text_win."','false') ");

$bc = $aVT['win']; if($aVT['win'] == 0) { $bc = 1; }
$pop = $aVT['win']*3; if($aVT['win'] == 0) { $pop = 2; }
$rep = $aVT['win']*3;
if($aVT['type'] == 1){
  if($aVT['napal'] == $infTVS['user']){
    if(infUsr($infTMY['user'],"karma") > -10){
      $mysqli->query("UPDATE users SET karma = karma-'1' WHERE `id` = '".$aVT['user']."'");
    }else{
      $mysqli->query("UPDATE users SET karma = karma+'1' WHERE `id` = '".$aVT['user']."'");
    }
  }
}
$mysqli->query("UPDATE users SET btl_count = btl_count+'$bc', win = win+'".$aVT['win']."', population = population+'$pop', reputation = reputation+'$rep'  WHERE `id` = '".$aVT['user']."'");
$mysqli->query("UPDATE users SET status = 'free',reload = '1' WHERE `id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$aVT['user']."' AND `active` = 1 AND `itemsused` > 0");

      /*if($checkmegaamt == 1 or $checkmegaavt == 1){
        $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$aMT['user']."'");
     $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$aVT['user']."'");

$mysqli->query("UPDATE user_pokemons SET basenum = '6' WHERE `basenum` = '3006' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '3' WHERE `basenum` = '3003' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '9' WHERE `basenum` = '3009' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '15' WHERE `basenum` = '3015' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '18' WHERE `basenum` = '3018' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '65' WHERE `basenum` = '3065' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '80' WHERE `basenum` = '3080' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '94' WHERE `basenum` = '3094' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '115' WHERE `basenum` = '3115' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '127' WHERE `basenum` = '3127' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '130' WHERE `basenum` = '3130' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '142' WHERE `basenum` = '3142' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '208' WHERE `basenum` = '3208' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '212' WHERE `basenum` = '3212' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '214' WHERE `basenum` = '3214' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '229' WHERE `basenum` = '3229' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '248' WHERE `basenum` = '3248' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '254' WHERE `basenum` = '3254' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '257' WHERE `basenum` = '3257' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '260' WHERE `basenum` = '3260' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '282' WHERE `basenum` = '3282' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '302' WHERE `basenum` = '3302' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '303' WHERE `basenum` = '3303' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '306' WHERE `basenum` = '3306' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '308' WHERE `basenum` = '3308' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '310' WHERE `basenum` = '3310' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '323' WHERE `basenum` = '3323' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '334' WHERE `basenum` = '3334' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '354' WHERE `basenum` = '3354' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '359' WHERE `basenum` = '3359' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '362' WHERE `basenum` = '3362' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '373' WHERE `basenum` = '3373' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '376' WHERE `basenum` = '3376' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '380' WHERE `basenum` = '3380' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '381' WHERE `basenum` = '3381' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '384' WHERE `basenum` = '3384' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '428' WHERE `basenum` = '3428' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '445' WHERE `basenum` = '3445' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '448' WHERE `basenum` = '3448' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '460' WHERE `basenum` = '3460' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '475' WHERE `basenum` = '3475' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '531' WHERE `basenum` = '3531' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '719' WHERE `basenum` = '3719' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '181' WHERE `basenum` = '3181' and `user_id` = '".$aVT['user']."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '319' WHERE `basenum` = '3319' and `user_id` = '".$aVT['user']."'");
}*/
     }
     $mysqli->query("DELETE FROM `team_btl` WHERE `kom` = '".$kMy['kom']."'");
     return;
  }

$ifT1 = $mysqli->query("SELECT * FROM team_btl WHERE `kom` = '".$kMy['kom']."' and `team` = '".$kMy['team']."' and `status` = '1' LIMIT 1")->fetch_assoc();
$ifT2 = $mysqli->query("SELECT * FROM team_btl WHERE `kom` = '".$kMy['kom']."' and `team` != '".$kMy['team']."' and `status` = '1' LIMIT 1")->fetch_assoc();
if(isset($ifT1) and isset($ifT2)){
  $tdata = date("Y-m-d H:i:s");
  $loc = infUsr($ifT1['user'],'location');
  $mysqli->query("INSERT INTO battle (user1 , user2, data,loc,kom) VALUES ('".$ifT1['user']."','".$ifT2['user']."', '".$tdata."','".$loc."','".$kMy['kom']."') ");
  $bid = $mysqli->insert_id;
  $mysqli->query("UPDATE team_btl SET status = '2',btl='$bid' WHERE `user` = '".$ifT1['user']."'");
  $mysqli->query("UPDATE team_btl SET status = '2',btl='$bid' WHERE `user` = '".$ifT2['user']."'");
  $mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '".$ifT1['user']."'");
  $mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '".$ifT2['user']."'");
  $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$ifT1['user']."' AND `active` = 1 AND `itemsused` > 0");
  $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$ifT2['user']."' AND `active` = 1 AND `itemsused` > 0");

  echo json_encode(array('good'=>1));
  return;
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
 <TITLE>POKEZONE FIGHT!</TITLE>
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; Charset=Windows-1251">
 <META NAME="Author" CONTENT="Serg">
 <LINK REL="Stylesheet" HREF="style.css" TYPE="text/css">
</HEAD>
<STYLE>
  DIV.x {
    position:relative;
    top:-250;left:5;width:250;height:190;
    padding: 1 1 1 2;
    COLOR: #1E3955; FONT-SIZE: 11px;FONT-FAMILY: Tahoma;
    text-align:left;
  }
  DIV.item {
    position:relative;
    top:-290;left:105;
    visibility:visible;
    width:32; height:32;
  }

  table.log {
    border-bottom: 1px dotted #97BDE5;
    width:100%;
  }
  td.log {
    font-size:21px;
    color:#97BDE5;
    font-weight:bold;
    width:40px;
  }

</STYLE>
<script src="js/jquery.min.js"></script>

 <script language="JavaScript">
   function lay(ID, Type) {
     eval("document.all." + ID + ".style.visibility = \"" + Type + "\"");
   }

   function switchLogDivs() {
     d1=document.getElementById("divLog");
     d2=document.getElementById("divTeam");
     if (d1.style.display!="none") {
      d1.style.display="none";;
      d2.style.display="block";
     } else {
      d2.style.display="none";;
      d1.style.display="block";
     }
   }
    function timer(){
    $.ajax({
                url: "game.php?fun=fight",
                type: "POST",
                data: "rcom=1",
                dataType: "json",
                error: function (){
                  
                },
                success: function (data) {
                  if(data.good == 1) {
                    location.href='game.php?fun=fight';
                  }
        }
        });
 }

       $(document).ready(function(){
    setInterval(timer, 3000);
        } );
    </script>
<BODY>
<span id=its_fight_frame></span>
<DIV style="height:390;overflow:hidden;">
<TABLE width=100% border=0>
<TR>
<TD width=25% valign="top" align="center">
                <TABLE class=nonBorder cellpadding=3 cellspacing=1 width=210><TR><TD class=title align=center><span class=''>
                  </TD>
         </TR>
         <TR><TD width=250>
         <img src=http://claimbe.ru/img/pkmn/00.jpg width=250 height=190 border=1><BR>
         <TABLE border=0 cellspacing=0 width=252 height=10 class=nonBorder>
           <TR><TD style='padding:0'><DIV style="width:0%;background:red;height:12;font-size:9;"></DIV></TD></TR>
           <TR><TD style='padding:0'><DIV style="width:0%;background:blue;height:5;font-size:0;"></DIV></TD></TR>
         </TABLE>
 
         </TD></TR></TABLE><CENTER id=txt_c><b><big><a href='game.php?fun=treninf&to_id=<?=$user_id;?>' onclick="window.open('game.php?fun=treninf&to_id=<?=$user_id;?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><IMG SRC='http://claimbe.ru/iquesmg/tion.gif' border=0></a> <font color='<?=colorsUsers($user["groups"]);?>'><?=$user["login"];?></font></big>
         </b><BR>
         <?php 
          $cMPK =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$user_id."' and `active`='1'");
 $cmpk_ = $cMPK->num_rows;
 $nBl = 6-$cmpk_;
        $blPOK = $mysqli->query('SELECT hp FROM user_pokemons WHERE user_id = '.$user_id.' and active = 1');
                 while($blPOK_ = $blPOK->fetch_assoc()){
         ?>
         <img src=http://claimbe.ru/img/cond/slot<?php if($blPOK_['hp'] == 0){ echo "_i"; } ?>.png   class=slot>
         <?php } 
         for ($x=0; $x<$nBl; $x++){
         ?>
         <img src=http://claimbe.ru/img/cond/slot_n.png class=slot>
         <?php } ?>
         </CENTER>
         <DIV ID=iV class=x>
                  </DIV>
                             <div class='item'><img src='http://claimbe.ru/img/items/blank.gif' width='32' height='32' border='0'></div>
                              </TD>
<TD width=50%><DIV style="position:relative; top:-70; overflow:hidden;">


    <HR>
    <HR>
    <DIV style="
             padding:5 5 5 5;
             color: #000000;
             background-color: #aecff1;
             border: groove 0px #295858;
             height: 250;
             text-align:justify;
             overflow: auto;
             COLOR: #1E3955; FONT-SIZE: 11px; FONT-FAMILY: Tahoma;">
             <P>
<div id='divTeam' style="display:block">
  <br><br>
    <div style='float: left; margin-left: 10px;'>
 <?php 
        $mTeam = $mysqli->query("SELECT * FROM `team_btl` WHERE `kom` = '".$kMy['kom']."' and `team` = '".$kMy['team']."'");
                 while($mT = $mTeam->fetch_assoc()){
         ?>    
  <b><big><a href="game.php?fun=treninf&amp;to_id=<?=$mT['user'];?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$mT['user'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src="http://claimbe.ru/img/question.gif" border="0" alt="Тренеркарта" title="Тренеркарта"></a> <font style="color:<?=colorsUsers(infUsr($mT['user'],'groups')); ?>;"><?=infUsr($mT['user'],"login");?></font><?php if($mT['leader'] == 1){ echo "<font color='red'>*</font>"; } ?></big>
         </b><br>
          <?php 
        $blPOK = $mysqli->query('SELECT hp FROM user_pokemons WHERE user_id = '.$mT['user'].' and active = 1');
                 while($blPOK_ = $blPOK->fetch_assoc()){
         ?>
         <img src=http://claimbe.ru/img/cond/slot<?php if($blPOK_['hp'] == 0){ echo "_i"; } ?>.png   class=slot>
         <?php } 
          $cMPKi =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$mT['user']."' and `active`='1'");
          $cmpk_i = $cMPKi->num_rows;
          $nBli = 6-$cmpk_i;
         for ($x1=0; $x1<$nBli; $x1++){
         ?>
         <img src=http://claimbe.ru/img/cond/slot_n.png class=slot>
         <?php } ?> 
         <br>
         <?php } ?>
         </div>

           <div style='float: right; margin-right: 10px;'>
 <?php 
        $vTeam = $mysqli->query("SELECT * FROM `team_btl` WHERE `kom` = '".$kMy['kom']."' and `team` != '".$kMy['team']."'");
                 while($vT = $vTeam->fetch_assoc()){
         ?>    
  <b><big><a href="game.php?fun=treninf&amp;to_id=<?=$vT['user'];?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$vT['user'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src="http://claimbe.ru/img/question.gif" border="0" alt="Тренеркарта" title="Тренеркарта"></a> <font style="color:<?=colorsUsers(infUsr($vT['user'],'groups')); ?>;"><?=infUsr($vT['user'],"login");?></font><?php if($vT['leader'] == 1){ echo "<font color='red'>*</font>"; } ?></big>
         </b><br>
          <?php 
        $blPOK2 = $mysqli->query('SELECT hp FROM user_pokemons WHERE user_id = '.$vT['user'].' and active = 1');
                 while($blPOK_2 = $blPOK2->fetch_assoc()){
         ?>
         <img src=http://claimbe.ru/img/cond/slot<?php if($blPOK_2['hp'] == 0){ echo "_i"; } ?>.png   class=slot>
         <?php } 
          $cMPKi2 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$vT['user']."' and `active`='1'");
          $cmpk_i2 = $cMPKi2->num_rows;
          $nBli2 = 6-$cmpk_i2;
         for ($x2=0; $x2<$nBli2; $x2++){
         ?>
         <img src=http://claimbe.ru/img/cond/slot_n.png class=slot>
         <?php } ?> 
         <br>
         <?php } ?>
         <br>

         </div>
<div style="margin-left: 35%;">
<?php 
 $bKom = $mysqli->query('SELECT * FROM battle WHERE kom = '.$kMy['kom']);
                 while($bk = $bKom->fetch_assoc()){
?>
<p id="txt"><a href="game.php?fun=treninf&amp;to_id=<?=$bk['user1'];?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$bk['user1'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src="http://claimbe.ru/img/question.gif" border="0" alt="Тренеркарта" title="Тренеркарта"></a> <a style="color:<?=colorsUsers(infUsr($bk['user1'],"groups"));?>;" href="javascript:parent.priv_m('<?=infUsr($bk['user1'],"login");?>',<?=$bk['user1'];?>);"><?=infUsr($bk['user1'],"login");?></a> 
VS 
<a href="game.php?fun=treninf&amp;to_id=<?=$bk['user2'];?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$bk['user2'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src="http://claimbe.ru/img/question.gif" border="0" alt="Тренеркарта" title="Тренеркарта"></a> <a style="color:<?=colorsUsers(infUsr($bk['user2'],"groups"));?>;" href="javascript:parent.priv_m('<?=infUsr($bk['user2'],"login");?>',<?=$bk['user2'];?>);"><?=infUsr($bk['user2'],"login");?></a> <a target="_location" href="game.php?fun=view_fight&btl=<?=$bk['id'];?>"> <font color="red">>>></font> </a></p>
<?php } ?>
  </div>

  </div>
</DIV></DIV></DIV>
</TD>


<TD width=25% valign="top" align="center">
       
         <TABLE class=nonBorder cellpadding=3 cellspacing=1 width=210><TR><TD class=title align=center><span class=''>
                   </TD></TR>
         <TR><TD width=250><img src=http://claimbe.ru/img/pkmn/00.jpg width=250 height=190 border=1><BR>
         <TABLE border=0 cellspacing=0 width=252 height=10 class=nonBorder>
           <TR><TD style='padding:0'><DIV style="width:0%;background:red;height:12;font-size:9;"></DIV></TD></TR>
           <TR><TD style='padding:0'><DIV style="width:0%;background:blue;height:5;font-size:0;"></DIV></TD></TR>
         </TABLE>
         </TD></TR></TABLE>
         <DIV ID=hV class=x>
         </DIV>
                    <div class='item'><img src='http://claimbe.ru/img/items/blank.gif' width='32' height='32' border='0'></div>
                            </TD>
</TR>
</TABLE>

</body>
</html>