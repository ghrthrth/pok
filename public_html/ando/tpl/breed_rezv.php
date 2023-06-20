<?php
ini_set("display_errors",0);
if(isset($_GET['good'])){
    $sp = $mysqli->query("SELECT * FROM spark WHERE `user1` = '".$user_id."' OR `user2` = '".$user_id."' LIMIT 1")->fetch_assoc();
    if(empty($sp)) { echo "<script>parent._location.location='game.php?fun=m_location&map=1';</script>"; return; }
    if($_GET['leave'] == 1){
        $txt = "Разведение было отклонено.";
        $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$sp['user1']."','info','Информация','".$txt."','false') ");
        $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$sp['user2']."','info','Информация','".$txt."','false') ");

        $mysqli->query("UPDATE users SET status = 'free', reload = '1' WHERE `id` = '".$sp['user1']."'");
        $mysqli->query("UPDATE users SET status = 'free', reload = '1' WHERE `id` = '".$sp['user2']."'");
        $mysqli->query("DELETE FROM `spark` WHERE `id` = '".$sp['id']."'");
        echo "<SCRIPT>location.href='game.php?fun=m_location';</SCRIPT>"; return;
    }
    
    if($_GET['pok'] > 0){
        $pok_ = obTxt($_GET['pok']);
        $vpk = $mysqli->query("SELECT * FROM user_pokemons WHERE `id` = '".$sp['pok1']."' LIMIT 1")->fetch_assoc();
    if($vpk['basenum'] == 29) { $vpk['basenum'] = 32; }
    elseif($vpk['basenum'] == 32) { $vpk['basenum'] = 29; }
    if($vpk['basenum'] == 30) { $vpk['basenum'] = 33; }
    elseif($vpk['basenum'] == 33) { $vpk['basenum'] = 30; }
    if($vpk['basenum'] == 31) { $vpk['basenum'] = 34; }
    elseif($vpk['basenum'] == 34) { $vpk['basenum'] = 31; }
    if($vpk['basenum'] == 128) { $vpk['basenum'] = 241; }
    elseif($vpk['basenum'] == 241) { $vpk['basenum'] = 128; }
    if($vpk['basenum'] == 124) { $vpk['basenum'] = 106; }
    elseif($vpk['basenum'] == 106) { $vpk['basenum'] = 124; }
    if($vpk['basenum'] == 124) { $vpk['basenum'] = 107; }
    elseif($vpk['basenum'] == 107) { $vpk['basenum'] = 124; }
    if($vpk['basenum'] == 238) { $vpk['basenum'] = 236; }
    elseif($vpk['basenum'] == 236) { $vpk['basenum'] = 238; }
    if($vpk['basenum'] == 238) { $vpk['basenum'] = 237; }
    elseif($vpk['basenum'] == 237) { $vpk['basenum'] = 238; }
    if($vpk['basenum'] == 266) { $vpk['basenum'] = 268; }
    elseif($vpk['basenum'] == 268) { $vpk['basenum'] = 266; }
    if($vpk['basenum'] == 267) { $vpk['basenum'] = 269; }
    elseif($vpk['basenum'] == 269) { $vpk['basenum'] = 267; }
    if($vpk['basenum'] == 313) { $vpk['basenum'] = 314; }
    elseif($vpk['basenum'] == 314) { $vpk['basenum'] = 313; }
    if($vpk['basenum'] == 413) { $vpk['basenum'] = 414; }
    elseif($vpk['basenum'] == 414) { $vpk['basenum'] = 413; }
    if($vpk['basenum'] == 627) { $vpk['basenum'] = 629; }
    elseif($vpk['basenum'] == 629) { $vpk['basenum'] = 627; }
    if($vpk['basenum'] == 628) { $vpk['basenum'] = 630; }
    elseif($vpk['basenum'] == 630) { $vpk['basenum'] = 628; }
        $npk = $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id` = '".$user_id."' and `active` = '1' and `spark` = '1' and `master` = '".$user_id."' and `basenum` = '".$vpk['basenum']."' and ((`gender` != '".$vpk['gender']."') or (`gender` = 'no')) " )->fetch_assoc();
        if($npk){
            if(($vpk['gender']=="no") || ($npk['gender']=="no")){
             if(($npk['item_id'] != 291) || ($vpk['item_id'] != 291)){
                $txt = "Разведение бесполых покемонов в обычных условиях невозможно.";
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$sp['user1']."','info','Информация','".$txt."','false') ");
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$sp['user2']."','info','Информация','".$txt."','false') ");
        
                $mysqli->query("UPDATE users SET status = 'free', reload = '1' WHERE `id` = '".$sp['user1']."'");
                $mysqli->query("UPDATE users SET status = 'free', reload = '1' WHERE `id` = '".$sp['user2']."'");
                $mysqli->query("DELETE FROM `spark` WHERE `id` = '".$sp['id']."'");
                echo "<SCRIPT>location.href='game.php?fun=m_location';</SCRIPT>"; return;
            }
            }
            if(($vpk['gender']=="no") || ($npk['gender']=="no")){
            $legendpokemon = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '".$npk['basenum']."'")->fetch_assoc();
              if($legendpokemon['legend'] == 1){
                $txt = "Нельзя спаривать легендарных покемонов!";
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$sp['user1']."','info','Информация','".$txt."','false') ");
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$sp['user2']."','info','Информация','".$txt."','false') ");
        
                $mysqli->query("UPDATE users SET status = 'free', reload = '1' WHERE `id` = '".$sp['user1']."'");
                $mysqli->query("UPDATE users SET status = 'free', reload = '1' WHERE `id` = '".$sp['user2']."'");
                $mysqli->query("DELETE FROM `spark` WHERE `id` = '".$sp['id']."'");
                echo "<SCRIPT>location.href='game.php?fun=m_location';</SCRIPT>"; return;
            }
            }
            
            if(($vpk['gender']=="no") || ($npk['gender']=="no")){
             if(($npk['id'] == $vpk['id']) || ($vpk['id'] == $npk['id'])){
                $txt = "Нельзя спаривать покемонов с самими собой.";
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$sp['user1']."','info','Информация','".$txt."','false') ");
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$sp['user2']."','info','Информация','".$txt."','false') ");
        
                $mysqli->query("UPDATE users SET status = 'free', reload = '1' WHERE `id` = '".$sp['user1']."'");
                $mysqli->query("UPDATE users SET status = 'free', reload = '1' WHERE `id` = '".$sp['user2']."'");
                $mysqli->query("DELETE FROM `spark` WHERE `id` = '".$sp['id']."'");
                echo "<SCRIPT>location.href='game.php?fun=m_location';</SCRIPT>"; return;
            }
            }
            if($npk['simpaty'] == $vpk['simpaty']){
                if(rand(1,2) == 1){ $potomok = $npk['basenum']; }else{ $potomok = $vpk['basenum']; }
                $dx = $mysqli->query("SELECT egg FROM pokedex WHERE `nom` = '".$potomok."' LIMIT 1")->fetch_assoc();
                $dex = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '".$dx['egg']."' LIMIT 1")->fetch_assoc();

                if(rand(1,2) == 1){ $dp = 1; }else{ $dp = 0; }
                if(rand(1,2) == 1){ $mp = 1; }else{ $mp = 0; }
                if($npk['hp_gen'] >= $vpk['hp_gen']){
                    if($npk['hp_gen'] > 45){
                        $hp = 45;
                    }
                    $hp = $npk['hp_gen']+($dp*rand(1,2))-($mp*rand(1,2)); 
                }else{ 
                    if($vpk['hp_gen'] > 45){
                        $hp = 45;
                    }
                    $hp = $vpk['hp_gen']+($dp*rand(1,2))-($mp*rand(1,2));  
                }
                if($npk['atc_gen'] >= $vpk['atc_gen']){
                    if($npk['atc_gen'] > 45){
                        $atk = 45;
                    }
                 $atk = $npk['atc_gen']+($dp*rand(1,2))-($mp*rand(1,2)); 
                }else{
                    if($vpk['atc_gen'] > 45){
                        $atk = 45;
                    }
                    $atk = $vpk['atc_gen']+($dp*rand(1,2))-($mp*rand(1,2));  
                }
                if($npk['def_gen'] >= $vpk['def_gen']){
                    if($npk['def_gen'] > 45){
                        $def = 45;
                    }
                 $def = $npk['def_gen']+($dp*rand(1,2))-($mp*rand(1,2)); 
             }else{
                if($vpk['def_gen'] > 45){
                 $def = 45;
                }
                 $def = $vpk['def_gen']+($dp*rand(1,2))-($mp*rand(1,2));  
             }
                if($npk['speed_gen'] >= $vpk['speed_gen']){
                    if($npk['speed_gen'] > 45){
                        $speed = 45;
                    }
                 $speed = $npk['speed_gen']+($dp*rand(1,2))-($mp*rand(1,2)); 
             }else{ 
                if($vpk['speed_gen'] > 45){
                    $speed = 45;
                }
                $speed = $vpk['speed_gen']+($dp*rand(1,2))-($mp*rand(1,2));  
            }
                if($npk['spatc_gen'] >= $vpk['spatc_gen']){
                    if($npk['spatc_gen'] > 45){
                        $satk = 45;
                    }
                 $satk = $npk['spatc_gen']+($dp*rand(1,2))-($mp*rand(1,2)); 
             }else{ 
                if($vpk['spatc_gen'] > 45){
                    $satk = 45;
                }
                $satk = $vpk['spatc_gen']+($dp*rand(1,2))-($mp*rand(1,2));  
            }
                if($npk['spdef_gen'] >= $vpk['spdef_gen']){
                    if($npk['spdef_gen'] > 45){
                        $sdef = 45;
                    }
                 $sdef = $npk['spdef_gen']+($dp*rand(1,2))-($mp*rand(1,2)); 
             }else{ 
                if($vpk['spdef_gen'] > 45){
                    $sdef = 45;
                }
                $sdef = $vpk['spdef_gen']+($dp*rand(1,2))-($mp*rand(1,2));  
            }
                $reborn = time() + (3600*24)*rand(6,9);
                if($npk['type'] == 'zombie' and $vpk['type'] == 'zombie'){
                    if(rand(1,3) == 1){ $zombie = 1; }else{ $zombie = 0; }
                }
                if(rand(1,100) == 1) { $shiny = 1; }else{ $shiny = 0; }
                if($vpk['gender'] == "female"){ $usr = $sp['user1']; }else{ $usr = $sp['user2']; }
                if($vpk['gender']=="no")
                {
                    if(rand(1,2) == 1){ $usr = $sp['user1']; }else{ $usr = $sp['user2']; }
                }
                if(rand(1,100) <= 5){
                $mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id` ,`count`,`egg`,`pok`,`shiny`,`zombie`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$usr."','999','1','1','".$dex['id']."','".$shiny."','".$zombie."','".$hp."','".$atk."','".$def."','".$speed."','".$satk."','".$sdef."','".$reborn."') ");                
                $mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id` ,`count`,`egg`,`pok`,`shiny`,`zombie`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$usr."','999','1','1','".$dex['id']."','".$shiny."','".$zombie."','".$hp."','".$atk."','".$def."','".$speed."','".$satk."','".$sdef."','".$reborn."') ");                
                $txt = "Разведение оказалось очень эффективным! Близнецы!";
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$sp['user1']."','info','Информация','".$txt."','false') ");
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$sp['user2']."','info','Информация','".$txt."','false') ");
            }else{
                $mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id` ,`count`,`egg`,`pok`,`shiny`,`zombie`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`) VALUES ('".$usr."','999','1','1','".$dex['id']."','".$shiny."','".$zombie."','".$hp."','".$atk."','".$def."','".$speed."','".$satk."','".$sdef."','".$reborn."') ");
            }
                if($vpk['gender']=="no")
                {
                    $txt = "Разведение прошло удачно, яйцо получает случайный хозяин.";
                    $mysqli->query("UPDATE user_pokemons SET item_id = '0' WHERE `id` = '".$npk['id']."'");
                    $mysqli->query("UPDATE user_pokemons SET item_id = '0' WHERE `id` = '".$vpk['id']."'");
                }
                else
                {
                    $txt = "Разведение прошло удачно, хозяин самки получает яйцо.";
                }
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$sp['user1']."','info','Информация','".$txt."','false') ");
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$sp['user2']."','info','Информация','".$txt."','false') ");

                $mysqli->query("UPDATE users SET status = 'free', reload = '1' WHERE `id` = '".$sp['user1']."'");
                $mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '".$sp['user2']."'");
                $mysqli->query("UPDATE user_pokemons SET spark = '0' WHERE `id` = '".$npk['id']."'");
                $mysqli->query("UPDATE user_pokemons SET spark = '0' WHERE `id` = '".$vpk['id']."'");
                $mysqli->query("DELETE FROM `spark` WHERE `id` = '".$sp['id']."'");
                $bnpk = $mysqli->query("SELECT * FROM `user_pokemons` WHERE `id` = '".$npk['id']."'")->fetch_assoc();
                $bvpk = $mysqli->query("SELECT * FROM `user_pokemons` WHERE `id` = '".$vpk['id']."'")->fetch_assoc();
                include('ando/functions/evolution.php');
                Evolution($bnpk);
                Evolution($bvpk);
                echo "<SCRIPT>location.href='game.php?fun=m_location';</SCRIPT>"; return;
            }else{
                $txt = "Разведение не удалось. Покемоны не нравятся друг другу.";
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$sp['user1']."','info','Информация','".$txt."','false') ");
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$sp['user2']."','info','Информация','".$txt."','false') ");

                $mysqli->query("UPDATE users SET status = 'free', reload = '1' WHERE `id` = '".$sp['user1']."'");
                $mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '".$sp['user2']."'");
                $mysqli->query("DELETE FROM `spark` WHERE `id` = '".$sp['id']."'");
                echo "<SCRIPT>location.href='game.php?fun=m_location';</SCRIPT>"; return;
            }
        }
        else{
            echo "<script>parent._location.location='game.php?fun=m_breed&good=1';</script>"; return;
        }
    }
?>
<HTML>
<HEAD>
<META https-EQUIV=Content-Type CONTENT=text/html;Charset=Windows-1251>
<META NAME=Author CONTENT=Serg>
 <LINK REL=Stylesheet HREF="/style.css" TYPE=text/css>
</HEAD><BODY style="margin:5 5 5 5;">
<H1>Разведение покемонов</H1><P ID=txt>
<?php if($sp['user3'] == $user_id){ ?>  <!-- та самая строчка -->
<BR>Ожидайте ответа тренера...<BR><br>
<P id=txt><a href=game.php?fun=m_breed&good=1&leave=1><< уйти</a></body>
<?php }
    else{ 
        $vpk = $mysqli->query("SELECT * FROM user_pokemons WHERE `id` = '".$sp['pok1']."' LIMIT 1")->fetch_assoc();
        if($vpk['gender'] == "male"){ $gnv = 0; }
        else{ $gnv = 1; } 

    if($vpk['simpaty'] == 1 and $vpk['spark'] == 1)
    {
        $bukva_vpk= "<b> (A)</b>";
    }
    elseif($vpk['simpaty'] == 2 and $vpk['spark'] == 1)
    {
        $bukva_vpk= "<b> (T)</b>";
    }elseif($vpk['simpaty'] == 3 and $vpk['spark'] == 1)
    {
        $bukva_vpk= "<b> (G)</b>";
    }
    else
    {
        $bukva_vpk= "<b></b>";
    }
?>

<BR>Вам предлагают разведение покемонона, <img src=https://claimbe.ru/img/pkmna/<?=numbPok($vpk['basenum']);?>.gif border=0> #<?=numbPok($vpk['basenum']);?> <?=$vpk['name'];?> <?=$vpk['lvl'];?>-lvl <img src=https://claimbe.ru/img/sex_<?=$gnv;?>.gif width=7 height=13 border=0> (H<?=$vpk['hp_gen'];?>A<?=$vpk['atc_gen'];?>D<?=$vpk['def_gen'];?>S<?=$vpk['speed_gen'];?>SA<?=$vpk['spatc_gen'];?>SD<?=$vpk['spdef_gen'];?>)<?=$bukva_vpk;?>, выберите покемона:<br><BR><br>
<?php 
    if($vpk['basenum'] == 29) { $vpk['basenum'] = 32; }
    elseif($vpk['basenum'] == 32) { $vpk['basenum'] = 29; }
    if($vpk['basenum'] == 30) { $vpk['basenum'] = 33; }
    elseif($vpk['basenum'] == 33) { $vpk['basenum'] = 30; }
    if($vpk['basenum'] == 31) { $vpk['basenum'] = 34; }
    elseif($vpk['basenum'] == 34) { $vpk['basenum'] = 31; }
    if($vpk['basenum'] == 128) { $vpk['basenum'] = 241; }
    elseif($vpk['basenum'] == 241) { $vpk['basenum'] = 128; }
    if($vpk['basenum'] == 124) { $vpk['basenum'] = 106; }
    elseif($vpk['basenum'] == 106) { $vpk['basenum'] = 124; }
    if($vpk['basenum'] == 124) { $vpk['basenum'] = 107; }
    elseif($vpk['basenum'] == 107) { $vpk['basenum'] = 124; }
    if($vpk['basenum'] == 238) { $vpk['basenum'] = 236; }
    elseif($vpk['basenum'] == 236) { $vpk['basenum'] = 238; }
    if($vpk['basenum'] == 238) { $vpk['basenum'] = 237; }
    elseif($vpk['basenum'] == 237) { $vpk['basenum'] = 238; }
    if($vpk['basenum'] == 266) { $vpk['basenum'] = 268; }
    elseif($vpk['basenum'] == 268) { $vpk['basenum'] = 266; }
    if($vpk['basenum'] == 267) { $vpk['basenum'] = 269; }
    elseif($vpk['basenum'] == 269) { $vpk['basenum'] = 267; }
    if($vpk['basenum'] == 313) { $vpk['basenum'] = 314; }
    elseif($vpk['basenum'] == 314) { $vpk['basenum'] = 313; }
    if($vpk['basenum'] == 380) { $vpk['basenum'] = 381; }
    elseif($vpk['basenum'] == 381) { $vpk['basenum'] = 380; }
    if($vpk['basenum'] == 413) { $vpk['basenum'] = 414; }
    elseif($vpk['basenum'] == 414) { $vpk['basenum'] = 413; }
    if($vpk['basenum'] == 627) { $vpk['basenum'] = 629; }
    elseif($vpk['basenum'] == 629) { $vpk['basenum'] = 627; }
    if($vpk['basenum'] == 628) { $vpk['basenum'] = 630; }
    elseif($vpk['basenum'] == 630) { $vpk['basenum'] = 628; }
    $mypk = $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id` = '".$user_id."' and `active` = '1' and `spark` = '1' and `master` = '".$user_id."' and `basenum` = '".$vpk['basenum']."' and ((`gender` != '".$vpk['gender']."') or (`gender` = 'no')) ");
    while ($mp = $mypk->fetch_assoc()) {
        if($mp['gender'] == "male"){ $gn = 0; }
        else{ $gn = 1; }
        
        if($mp['simpaty'] == 1 and $mp['spark'] == 1)
        {
            $bukva_mpk= "<b> (A)</b>";
        }
        elseif($mp['simpaty'] == 2 and $mp['spark'] == 1)
        {
            $bukva_mpk= "<b> (T)</b>";
        }elseif($mp['simpaty'] == 3 and $mp['spark'] == 1)
        {
            $bukva_mpk= "<b> (G)</b>";
        }
        else
        {
            $bukva_mpk= "<b></b>";
        }
?>
<a href=game.php?fun=m_breed&good=1&pok=<?=$mp['id'];?>>
<img src=https://claimbe.ru/img/trade_temp.png border=0 title='Выбрать' alt='Выбрать'></a>
<a HREF=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?=$mp['basenum'];?>","dex","width=600,height=600,scrollbars=yes");>
<img src=https://claimbe.ru/img/pkmna/<?=numbPok($mp['basenum']);?>.gif border=0 alt=Покедекс title=Покедекс></a>
<a href=javascript: title=Инфо onclick=window.open("game.php?fun=pokeinf&p_id=<?=$mp['id'];?>","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");>
#<?=numbPok($mp['basenum']);?> <?=$mp['name'];?> <?=$mp['lvl'];?>-lvl </a> 
<img src=https://claimbe.ru/img/sex_<?=$gn;?>.gif width=7 height=13 border=0> (H<?=$mp['hp_gen'];?>A<?=$mp['atc_gen'];?>D<?=$mp['def_gen'];?>S<?=$mp['speed_gen'];?>SA<?=$mp['spatc_gen'];?>SD<?=$mp['spdef_gen'];?>)<?=$bukva_mpk;?><br>
<?php } ?>
<P id=txt><a href=game.php?fun=m_breed&good=1&leave=1><< уйти</a></body>
<?php } ?>
</html>
<?php

}
elseif(isset($_GET['type']) && $_GET['type'] == "new"){
    $to = obTxt($_GET['to_id']);
    $pid = obTxt($_GET['p_id']);
    $p = $mysqli->query("SELECT * FROM `user_pokemons` WHERE `id` = '".$pid."' and `user_id` = '".$user_id."' and `active` = '1' and `spark` = '1' and `master` = '".$user_id."' ")->fetch_assoc();
    $vs = $mysqli->query("SELECT * FROM `users` WHERE `id` = '".$to."' ")->fetch_assoc();
    if($p['id'] > 0 and $vs['id'] > 0){
        /* if($vs['login'] == $user['login']){
            $rt = "Нельзя предлагать обмен себе!";
        }
        else*/if($vs['online'] == 0){
            $rt = "Тренер не в сети!";
        }
        elseif($vs['status'] !== "free"){
            $rt = "Тренер занят!";
        }
        elseif($user['status'] !== "free"){
            $rt = "Вы заняты!";
        }
        elseif($user['location'] !== $vs['location']){
            $rt = "Тренер далеко от вас!";
        }
        else{
            $rt = "<b>Предложение отправлено!</b>";
            $mysqli->query("INSERT INTO spark (user1 , user2, pok1) VALUES ('".$user_id."','".$vs['id']."','".$p['id']."') ");
            $mysqli->query("UPDATE users SET status = 'spark' WHERE `id` = '".$user_id."'");
            $mysqli->query("UPDATE users SET status = 'spark', reload = '1' WHERE `id` = '".$vs['id']."'");
            echo "<script>parent.mess('".$rt."');</script>";
            echo "<script>parent._location.location='game.php?fun=m_breed&good=1';</script>";
        }
    }
    else{
        echo "<script>document.location='game.php?fun=m_location';</script>"; return;
    }
}
else{
    if(!$_GET['to']){ echo "<script>document.location='game.php?fun=m_location';</script>"; return; }
    $to = obTxt($_GET['to']);
    $infUsr = $mysqli->query("SELECT id FROM `users` WHERE `login` = '".$to."' ")->fetch_assoc();
    if(!$infUsr){
        echo "<script>document.location='game.php?fun=m_location';</script>"; return;
    }
?>
<HTML>
<HEAD>
<META https-EQUIV=Content-Type CONTENT=text/html;Charset=Windows-1251>
 <LINK REL=Stylesheet HREF="/style.css" TYPE=text/css>
</HEAD><BODY style="margin:5 5 5 5;">
<H1>Разведение покемонов</H1><P ID=txt>
<BR>Вы предлагаете тренеру <b><?=$_GET['to'];?></b>, разводить покемонов:<BR><br>
<?php 
    $mypk = $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id` = '".$user_id."' and `active` = '1' and `spark` = '1' and `master` = '".$user_id."' ");
    while ($mp = $mypk->fetch_assoc()) { 
        if($mp['gender'] == "male"){ $gn = 0; }else{ $gn = 1; } 

        if($mp['simpaty'] == 1 and $mp['spark'] == 1)
        {
            $bukva_mpk= "<b> (A)</b>";
        }
        elseif($mp['simpaty'] == 2 and $mp['spark'] == 1)
        {
            $bukva_mpk= "<b> (T)</b>";
        }elseif($mp['simpaty'] == 3 and $mp['spark'] == 1)
        {
            $bukva_mpk= "<b> (G)</b>";
        }
        else
        {
            $bukva_mpk= "<b></b>";
        }


?>
<a href=game.php?fun=m_breed&type=new&to_id=<?=$infUsr['id'];?>&p_id=<?=$mp['id'];?>>
<img src=https://claimbe.ru/img/trade_temp.png border=0 title='Выбрать' alt='Выбрать'></a>
<a HREF=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?=$mp['basenum'];?>","dex","width=600,height=600,scrollbars=yes");>
<img src=https://claimbe.ru/img/pkmna/<?=numbPok($mp['basenum']);?>.gif border=0 alt=Покедекс title=Покедекс></a>
<a href=javascript: title=Инфо onclick=window.open("game.php?fun=pokeinf&p_id=<?=$mp['id'];?>","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");>
#<?=numbPok($mp['basenum']);?> <?=$mp['name'];?> <?=$mp['lvl'];?>-lvl </a> 
<img src=https://claimbe.ru/img/sex_<?=$gn;?>.gif width=7 height=13 border=0> (H<?=$mp['hp_gen'];?>A<?=$mp['atc_gen'];?>D<?=$mp['def_gen'];?>S<?=$mp['speed_gen'];?>SA<?=$mp['spatc_gen'];?>SD<?=$mp['spdef_gen'];?>)<?=$bukva_mpk;?><br>
<?php } ?>
<P id=txt><a href=game.php?fun=m_location&map=1><< уйти</a></body>
</html>
<?php } ?>