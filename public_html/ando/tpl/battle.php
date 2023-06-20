<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
require ('ando/functions/btl.function.php');
error_reporting(0);
$battle = $mysqli->query("SELECT * FROM battle WHERE `user1` = '".$user_id."' OR `user2` = '".$user_id."' LIMIT 1")->fetch_assoc();
$kom = $mysqli->query("SELECT * FROM team_btl WHERE `user` = '".$user_id."' LIMIT 1")->fetch_assoc();
//$checkcapt = $mysqli->query("SELECT * FROM battle WHERE `id` = '".$battle['id']."'")->fetch_assoc();
if(empty($battle)) {
    if(empty($kom)) {
        echo "<script>parent._location.location='game.php?fun=m_location&map=1';</script>";
        return;
    }
}
if(isset($kom) and empty($battle)) {
    $kMy = $mysqli->query("SELECT kom,team FROM team_btl WHERE `kom` = '".$kom['kom']."' and `user` = '".$user_id."'")->fetch_assoc();
    include("ando/tpl/com.php");
    return;
}

if($battle['user1'] == $user_id) {
    $ind = 1;
    $indv = 2;
    
    $mID = $battle['user1'];
    $vID = $battle['user2'];
    $pMY = $battle['pok1'];
    $pVS = $battle['pok2'];
    $aMY = $battle['atk1'];
    $aVS = $battle['atk2'];
    $zMY = $battle['zm1'];
    $zVS = $battle['zm2'];
    $iMY = $battle['item1'];
    $iVS = $battle['item2'];
    $time1 = $battle['time1'];
    $time2 = $battle['time2'];
    $rldMY = $battle['rload1'];
    $spikesM = $battle['spikes1'];
    $spikesV = $battle['spikes2'];
    $tspikesM = $battle['tspikes1'];
    $tspikesV = $battle['tspikes2'];
    $spideM = $battle['spide1'];
    $spideV = $battle['spide2'];
    $rockM = $battle['rock1'];
    $rockV = $battle['rock2'];
    $lightsM = $battle['lig1'];
    $lightsV = $battle['lig2'];
    $inM = $battle['inv1'];
    $inV = $battle['inv2'];
    //$inP = $battle['inv3'];
}
else {
    $ind = 2;
    $indv = 1;
    $mID = $battle['user2'];
    $vID = $battle['user1'];
    $pMY = $battle['pok2'];
    $pVS = $battle['pok1'];
    $aMY = $battle['atk2'];
    $aVS = $battle['atk1'];
    $zMY = $battle['zm2'];
    $zVS = $battle['zm1'];
    $iMY = $battle['item2'];
    $iVS = $battle['item1'];
    $time1 = $battle['time2'];
    $time2 = $battle['time1'];
    $rldMY = $battle['rload2'];
    $spikesM = $battle['spikes2'];
    $spikesV = $battle['spikes1'];
    $tspikesM = $battle['tspikes2'];
    $tspikesV = $battle['tspikes1'];
    $spideM = $battle['spide2'];
    $spideV = $battle['spide1'];
    $rockM = $battle['rock2'];
    $rockV = $battle['rock1'];
    $lightsM = $battle['lig2'];
    $lightsV = $battle['lig1'];
    $inM = $battle['inv2'];
    $inV = $battle['inv1'];
    //$inP = $battle['inv'];
}

if($battle['kom'] > 0) {
    $kMy = $mysqli->query("SELECT kom,team FROM team_btl WHERE `kom` = '".$battle['kom']."' and `user` = '".$mID."'")->fetch_assoc();
    $kVs = $mysqli->query("SELECT kom,team FROM team_btl WHERE `kom` = '".$battle['kom']."' and `user` = '".$vID."'")->fetch_assoc();
}

if(isset($_POST['keystring'])) {
    // Проверка того, что есть данные из капчи
if (!$_POST["g-recaptcha-response"]) {
    // Если данных нет, то программа останавливается и выводит ошибку
    echo "<script>location.href='game.php?fun=fight';</script>";
    return;
} else { // Иначе создаём запрос для проверки капчи
    // URL куда отправлять запрос для проверки
    $url = "https://www.google.com/recaptcha/api/siteverify";
    // Ключ для сервера
    $key = "6Le0mmYmAAAAAA2hNdSSVOakSdN8NyeSiiGuAarb";
    // Данные для запроса
    $query = array(
        "secret" => $key, // Ключ для сервера
        "response" => $_POST["g-recaptcha-response"], // Данные от капчи
        "remoteip" => $_SERVER['REMOTE_ADDR'] // Адрес сервера
    );
 
    // Создаём запрос для отправки
    $ch = curl_init();
    // Настраиваем запрос 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_POST, true); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query); 
    // отправляет и возвращает данные
    $data = json_decode(curl_exec($ch), $assoc=true); 
    // Закрытие соединения
    curl_close($ch);
 
    // Если нет success то
    if (!$data['success']) {
        // Останавливает программу и выводит "ВЫ РОБОТ"
        exit("ВЫ РОБОТ");
    } else {
        // Иначе выводим логин и Email
        $mysqli->query("UPDATE battle SET kaptcha = '0' WHERE `id` = '".$battle['id']."'");
        echo "<script>location.href='game.php?fun=fight';</script>";
        return;
    }
}
    // if($_SESSION['captcha_keystring'] == $_POST['keystring']/* and $checkcapt['kaptcha_timer'] < time()*/){
    //     $mysqli->query("UPDATE battle SET kaptcha = '0' WHERE `id` = '".$battle['id']."'");
    //     echo "<script>location.href='game.php?fun=fight';</script>"; 
    //     return;
    // }
    // else {
    //     $updatetimecap = time() + 5;
    //     $mysqli->query("UPDATE battle SET kaptcha_timer = '".$updatetimecap."' WHERE `id` = '".$battle['id']."'");
    //     echo "<script>alert('Возможно вы ошиблись. Попробуйте ввести капчу внимательнее!');</script>"; 
    //     echo "<script>location.href='game.php?fun=fight';</script>"; 
    //     return;
    // }
}

$Me = $mysqli->query("SELECT population,karma,groups,login,rarena FROM users WHERE `id` = '".$user_id."'")->fetch_assoc();
if($pMY > 0 and $pVS > 0) {
    $PokM = $mysqli->query("SELECT * FROM user_pokemons WHERE `id` = '".$pMY."' and `user_id` = '".$user_id."'")->fetch_assoc();
}

if($battle['tip'] == 1) {
    $gendercathpok = $mysqli->query("SELECT gender FROM pokem_vs WHERE `id` = '".$pVS."'")->fetch_assoc();
    $catchcathpok = $mysqli->query("SELECT catch FROM pokem_vs WHERE `id` = '".$pVS."'")->fetch_assoc();
    $item2pok = $mysqli->query("SELECT item FROM pokem_vs WHERE `id` = '".$pVS."'")->fetch_assoc();
    $Vs = array("login"=>"Дикий покемон <img src='img/sex/".$gendercathpok['gender'].".gif'> <img src='img/dic/".$catchcathpok['catch'].".png'> "); 
    $PokV = $mysqli->query("SELECT * FROM pokem_vs WHERE `id` = '".$pVS."'")->fetch_assoc();
}

else {
    $Vs = $mysqli->query("SELECT * FROM users WHERE `id` = '".$vID."'")->fetch_assoc();
    if($pMY > 0 and $pVS > 0) {
        $PokV = $mysqli->query("SELECT * FROM user_pokemons WHERE `id` = '".$pVS."' and `user_id` = '".$vID."'")->fetch_assoc();
    }
}
if(isset($PokM['type']) && $PokM['type'] == 'normal') {      $type1 = 'poketitle';       $img1 = 'normal'; $name1 = false;}
elseif(isset($PokM['type']) && $PokM['type'] == 'shine') {   $type1 = 'poketitleshine';  $img1 = 'shine';  $name1 = 'Шайни';}
elseif(isset($PokM['type']) && $PokM['type'] == 'shadow') {  $type1 = 'poketitleshadow'; $img1 = 'shine';  $name1 = 'shadow';}
elseif(isset($PokM['type']) && $PokM['type'] == 'snowy') {   $type1 = 'poketitleshowy';  $img1 = 'shine';  $name1 = 'snowy';}
elseif(isset($PokM['type']) && $PokM['type'] == 'fighter') { $type1 = 'poketitleshine';  $img1 = 'shine';  $name1 = 'fighter';}
elseif(isset($PokM['type']) && $PokM['type'] == 'contest') { $type1 = 'poketitleshine';  $img1 = 'shine';  $name1 = 'contest';}
elseif(isset($PokM['type']) && $PokM['type'] == 'gym') {     $type1 = 'poketitleshine';  $img1 = 'shine';  $name1 = 'gym';}
elseif(isset($PokM['type']) && $PokM['type'] == 'Coordinator') {  $type1 = 'poketitleshine';  $img1 = 'shine';  $name1 = 'Coordinator';}
elseif(isset($PokM['type']) && $PokM['type'] == 'champion') {$type1 = 'poketitlechampion';  $img1 = 'champion';  $name1 = 'champion';}
elseif(isset($PokM['type']) && $PokM['type'] == 'magistra') {$type1 = 'poketitleshine';  $img1 = 'shine';  $name1 = 'magistra';}
elseif(isset($PokM['type']) && $PokM['type'] == 'zombie') {$type1 = 'poketitlezombie';  $img1 = 'zombie';  $name1 = 'zombie';}
elseif(isset($PokM['type']) && $PokM['type'] == 'nord')    {$type1 = 'poketitlenord';  $img1 = 'nord';  $name1 = 'Nord';}
elseif(isset($PokM['type']) && $PokM['type'] == 'arena') {     $type1 = 'poketitle';  $img1 = 'normal';  $name1 = 'arena';}
elseif(isset($PokM['type']) && $PokM['type'] == 'brilliant') {     $type1 = 'poketitleshine';  $img1 = 'shine';  $name1 = 'Brilliant';}
elseif(isset($PokM['type']) && $PokM['type'] == 'coloring') {     $type1 = 'poketitleshine';  $img1 = 'shine';  $name1 = 'coloring';}
elseif(isset($PokM['type']) && $PokM['type'] == 'legacy') {     $type1 = 'poketitleshine';  $img1 = 'shine';  $name1 = 'Legacy';}

if(isset($PokV['type']) && $PokV['type'] == 'normal') {      $type2 = 'poketitle';       $img2 = 'normal'; $name2 = false;}
elseif(isset($PokV['type']) && $PokV['type'] == 'shine') {   $type2 = 'poketitleshine';  $img2 = 'shine';  $name2 = 'shine';}
elseif(isset($PokV['type']) && $PokV['type'] == 'shadow') {  $type2 = 'poketitleshadow'; $img2 = 'shine';  $name2 = 'shadow';}
elseif(isset($PokV['type']) && $PokV['type'] == 'snowy') {   $type2 = 'poketitleshowy';  $img2 = 'shine';  $name2 = 'snowy';}
elseif(isset($PokV['type']) && $PokV['type'] == 'fighter') { $type2 = 'poketitleshine';  $img2 = 'shine';  $name2 = 'fighter';}
elseif(isset($PokV['type']) && $PokV['type'] == 'contest') { $type2 = 'poketitleshine';  $img2 = 'shine';  $name2 = 'contest';}
elseif(isset($PokV['type']) && $PokV['type'] == 'gym') {     $type2 = 'poketitleshine';  $img2 = 'shine';  $name2 = 'gym';}
elseif(isset($PokV['type']) && $PokV['type'] == 'Coordinator') {     $type2 = 'poketitleshine';  $img2 = 'shine';  $name2 = 'Coordinator';}
elseif(isset($PokV['type']) && $PokV['type'] == 'champion') {$type2 = 'poketitlechampion';  $img2 = 'champion';  $name2 = 'champion';}
elseif(isset($PokV['type']) && $PokV['type'] == 'magistra') {$type2 = 'poketitleshine';  $img2 = 'shine';  $name2 = 'magistra';}
elseif(isset($PokV['type']) && $PokV['type'] == 'zombie') {$type2 = 'poketitlezombie';  $img2 = 'zombie';  $name2 = 'zombie';}
elseif(isset($PokV['type']) && $PokV['type'] == 'nord')   {$type2 = 'poketitlenord';  $img2 = 'nord';  $name2 = 'Nord';}
elseif(isset($PokV['type']) && $PokV['type'] == 'arena') {     $type2 = 'poketitle';  $img2 = 'normal';  $name2 = 'arena';}
elseif(isset($PokV['type']) && $PokV['type'] == 'brilliant') {     $type2 = 'poketitleshine';  $img2 = 'shine';  $name2 = 'Brilliant';}
elseif(isset($PokV['type']) && $PokV['type'] == 'coloring') {     $type2 = 'poketitleshine';  $img2 = 'shine';  $name2 = 'coloring';}
elseif(isset($PokV['type']) && $PokV['type'] == 'legacy') {     $type2 = 'poketitleshine';  $img2 = 'shine';  $name2 = 'Legacy';}

// count pokemon user and count pokemon enemy
$cMPK =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$mID."' and `active`='1'");
$cmpk_ = $cMPK->num_rows;
$nBl = 6-$cmpk_;
if($battle['tip'] == 1) {
    $cmpk_2 = 1;
}
else {
    $cMPK2 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$vID."' and `active`='1'");
    $cmpk_2 = $cMPK2->num_rows;
    $nBl2 = 6-$cmpk_2;
}

if($ind == 1){
    $PokM['ind'] = 1;
    $PokV['ind'] = 2;
}
else{
    $PokM['ind'] = 2;
    $PokV['ind'] = 1;
}

$cntMYpk =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$mID."' and `active`='1' and `hp` > '0' and `id` != '".$pMY."'");
$cmp_ = $cntMYpk->num_rows;

if($battle['tip'] == 1) {
    if($PokV['hp'] == 0) {
        $cvp_ = 0;
    }
    else {
        $cvp_ = 1;
    }
}
else {
    $cntVSpk =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$vID."' and `active`='1' and `hp` > '0' ");
    $cvp_ = $cntVSpk->num_rows;
}

if($aMY > 0 and $aVS > 0) {
    if($battle['last_xod'] == $mID OR $battle['tip'] == 1) {
        startRound($battle);
    }
    echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>";
    return;
}

if(isset($_POST['i_id']) and $aMY == 0 and $_POST['i_id'] > 0) {
    $iid = obr_chis($_POST['i_id']);
    $ctg = $mysqli->query("SELECT categories FROM base_items WHERE `id` = '".$iid."'")->fetch_assoc();
    $PokM = $mysqli->query("SELECT * FROM user_pokemons WHERE `id` = '".$pMY."' and `user_id` = '".$user_id."'")->fetch_assoc();
    $selectinvpok_use = $mysqli->query("SELECT itemsused FROM user_pokemons WHERE id = '".$pMY."'")->fetch_assoc();
    if( ($ctg['categories'] == 2 OR $ctg['categories'] == 4 OR $ctg['categories'] == 5 OR $ctg['categories'] == 21)  and   $selectinvpok_use['itemsused'] < 2 and $Me['rarena'] != 1) { // use Item
        if($battle['kaptcha'] == 1){
        echo "<script>alert('Нельзя использовать инвентарь не вводя капчу!');</script>"; 
        echo "<script>location.href='game.php?fun=fight';</script>"; 
        return;
    }
        $mysqli->query("UPDATE battle SET atk$ind = '888', item$ind = '".$iid."', inv$ind = inv$ind + '1'   WHERE `id` = '".$battle['id']."' AND '".$pMY."'");
        $mysqli->query("UPDATE user_pokemons SET itemsused = itemsused + 1 WHERE `id` = '".$pMY."' AND `user_id` = '".$mID."' AND `active` = 1");
        if($aVS == 0) {
            $mysqli->query("UPDATE battle SET last_xod = '$vID' WHERE `id` = '".$battle['id']."'");
        }
        if($battle['tip'] == 1) {
            if($PokV["atk1"] > 0 and $PokV["atk2"] > 0 and $PokV["atk3"] > 0 and $PokV["atk4"] > 0) {
                $dRand = 4;
            }
            elseif($PokV["atk1"] > 0 and $PokV["atk2"] > 0 and $PokV["atk3"] > 0 and $PokV["atk4"] == 0) {
                $dRand = 3;
            }
            elseif($PokV["atk1"] > 0 and $PokV["atk2"] > 0 and $PokV["atk3"] == 0 and $PokV["atk4"] == 0) {
                $dRand = 2;
            }
            elseif($PokV["atk1"] > 0 and $PokV["atk2"] == 0 and $PokV["atk3"] == 0 and $PokV["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1,$dRand);
            $whr = "atk".$nRnd; $atkDK = $PokV[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '".$atkDK."' WHERE `id` = '".$battle['id']."'");
        }
        echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>";
        return;
    }
    elseif($ctg['categories'] == 3 and $battle['tip'] == 1 and $PokV['hp'] > 0 and $PokV['catch'] == 0){
    if($battle['kaptcha'] == 1){
        echo "<script>alert('Нельзя использовать инвентарь не вводя капчу!');</script>"; 
        echo "<script>location.href='game.php?fun=fight';</script>"; 
        return;
    } // ball
        $mysqli->query("UPDATE battle SET atk$ind = '888', item$ind = '".$iid."' WHERE `id` = '".$battle['id']."'");
        $mysqli->query("UPDATE user_pokemons SET itemsused = itemsused + 1 WHERE `id` = '".$pMY."' AND `user_id` = '".$mID."' AND `active` = 1");
        if($aVS == 0) {
            $mysqli->query("UPDATE battle SET last_xod = '$vID' WHERE `id` = '".$battle['id']."'");
        }
        if($battle['tip'] == 1) {
            if($PokV["atk1"] > 0 and $PokV["atk2"] > 0 and $PokV["atk3"] > 0 and $PokV["atk4"] > 0) {
                $dRand = 4;
            }
            elseif($PokV["atk1"] > 0 and $PokV["atk2"] > 0 and $PokV["atk3"] > 0 and $PokV["atk4"] == 0) {
                $dRand = 3;
            }
            elseif($PokV["atk1"] > 0 and $PokV["atk2"] > 0 and $PokV["atk3"] == 0 and $PokV["atk4"] == 0) {
                $dRand = 2;
            }
            elseif($PokV["atk1"] > 0 and $PokV["atk2"] == 0 and $PokV["atk3"] == 0 and $PokV["atk4"] == 0) {
                $dRand = 1;
            }
            $nRnd = rand(1,$dRand);
            $whr = "atk".$nRnd; $atkDK = $PokV[$whr];
            $mysqli->query("UPDATE battle SET atk2 = '".$atkDK."' WHERE `id` = '".$battle['id']."'");
        }
        echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>";
        return;
    }
}

if(isset($_POST['pid']) and $aMY == 0 and $_POST['pid'] > 0) {
    $pid = obr_chis($_POST['pid']);
    $tPid = $mysqli->query("SELECT nn,basenum,name,name_new FROM user_pokemons WHERE `id` = '".$pid."' and `id` != '".$pMY."' and `user_id` = '".$mID."' and `hp` > '0' and `active` = '1' ")->fetch_assoc();
    if($tPid) {
        if($PokM['hp'] > 0) {
            if($battle['kaptcha'] == 1){
        echo "<script>alert('Нельзя менять покемона не вводя капчу!');</script>"; 
        echo "<script>location.href='game.php?fun=fight';</script>"; 
        return;
    }
            $mysqli->query("UPDATE battle SET atk$ind = '999', zm$ind = '".$pid."' WHERE `id` = '".$battle['id']."'");
            if($battle['tip'] == 1) {
                if($PokV["atk1"] > 0 and $PokV["atk2"] > 0 and $PokV["atk3"] > 0 and $PokV["atk4"] > 0) {
                    $dRand = 4;
                }
                elseif($PokV["atk1"] > 0 and $PokV["atk2"] > 0 and $PokV["atk3"] > 0 and $PokV["atk4"] == 0) {
                    $dRand = 3;
                }
                elseif($PokV["atk1"] > 0 and $PokV["atk2"] > 0 and $PokV["atk3"] == 0 and $PokV["atk4"] == 0) {
                    $dRand = 2;
                }
                elseif($PokV["atk1"] > 0 and $PokV["atk2"] == 0 and $PokV["atk3"] == 0 and $PokV["atk4"] == 0) {
                    $dRand = 1;
                }
                $nRnd = rand(1,$dRand);
                $whr = "atk".$nRnd; $atkDK = $PokV[$whr];
                $mysqli->query("UPDATE battle SET atk2 = '".$atkDK."' WHERE `id` = '".$battle['id']."'");
            }
        }
        else {
            if($pMY > 0 and $pVS > 0) {
                if($spikesM > 0) { // Шипы
                    $pbasnum = $mysqli->query("SELECT basenum,hp_max,hp FROM user_pokemons WHERE `id` = '".$pid."' ")->fetch_assoc();
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '".$pbasnum['basenum']."' ")->fetch_assoc();
                    if($pok_base1['type'] == "flying" OR $pok_base1['type_two'] == "flying") {
                        
                    }
                    else {
                        if($spikesM == 1){
                            $dl = 8;
                        }
                        if($spikesM == 2){
                            $dl = 6;
                        }
                        if($spikesM == 3){
                            $dl = 4;
                        }
                        $new_hp = $pbasnum['hp']-round($pbasnum['hp_max']/$dl);
                        if($pbasnum['hp'] < 0){
                            $pbasnum['hp'] = 0;
                        }
                        $dop_zm1 = "<i>Покемон терпит ранения от шипов.</i><br>";
                    }
                }
                if($tspikesM > 0){ // Отравленные шипы
                    $pbasnum = $mysqli->query("SELECT basenum,hp_max,hp FROM user_pokemons WHERE `id` = '".$pid."' ")->fetch_assoc();
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '".$pbasnum['basenum']."' ")->fetch_assoc();
                    if($pok_base1['type'] == "flying" or $pok_base1['type_two'] == "flying" or $pok_base1['type'] == "steel" or $pok_base1['type_two'] == "steel" or $pok_base1['type'] == "poison" or $pok_base1['type_two'] == "poison"){
                        
                    }
                    else {
                        $plus = plusStatus($battle['id'], $pid,1,9999);
                        if($plus == "fall") {
                            $dop_zm1 = $dop_zm1."";
                        }
                        else {
                            $mysqli->query($plus);
                            $dop_zm1 = $dop_zm1." <i>Покемон отравлен</i><br>";
                        }
                    }
                }
                if($spideM > 0){ // Паутина 
                    $pbasnum = $mysqli->query("SELECT basenum,hp_max,hp FROM user_pokemons WHERE `id` = '".$pid."' ")->fetch_assoc();
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '".$pbasnum['basenum']."' ")->fetch_assoc();
                    if($pok_base1['type'] == "flying" OR $pok_base1['type_two'] == "flying"){
                        
                    }
                    else {
                        $plus = plusChanges($battle['id'], $pid,2,1,"speed");
                        if($plus !== "fall") {
                            $mysqli->query($plus);
                            $dop_zm1 = $dop_zm1." <i>Скорость противника -1</i><br>";
                        }
                        else {
                            $dop_zm1 = $dop_zm1."";
                        }
                    }
                }
                if($lightsM > 0){ // Паутина
                    $pbasnum = $mysqli->query("SELECT basenum,hp_max,hp FROM user_pokemons WHERE `id` = '".$pid."' ")->fetch_assoc();
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '".$pbasnum['basenum']."' ")->fetch_assoc();
                    if($pok_base1['type'] == "flying" OR $pok_base1['type_two'] == "flying"){
                        
                    }
                    else {
                        $plus = plusChanges($battle['id'], $pid,2,1,"speed");
                        if($plus !== "fall") {
                            $mysqli->query($plus);
                            $dop_zm1 = $dop_zm1." <i>Скорость противника -1</i><br>";
                        }
                        else {
                            $dop_zm1 = $dop_zm1."";
                        }
                    }
                }
                if($rockM > 0) { // Каменная ловушка
                    $pbasnum = $mysqli->query("SELECT basenum,hp_max,hp FROM user_pokemons WHERE `id` = '".$pid."' ")->fetch_assoc();
                    $pok_base1 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '".$pbasnum['basenum']."' ")->fetch_assoc();
                    $tip_eff = tip("rock",$pok_base1['type'])*tip("rock",$pok_base1['type_two']);
                    if($tip_eff == 0.25) { $dl = 32; }
                    if($tip_eff == 0.5) {   $dl = 16; }
                    if($tip_eff == 1) {     $dl = 8; }
                    if($tip_eff == 2) {     $dl = 4; }
                    if($tip_eff == 4) {     $dl = 2; }
                    $new_hp = $pbasnum['hp']-round($pbasnum['hp_max']/$dl); if($pbasnum['hp'] < 0){ $pbasnum['hp'] = 0; }
                    $dop_zm1 = $dop_zm1."<i>Покемон терпит ранения от ловушки.</i><br>";
                }

                if(isset($new_hp) && $new_hp > 0) {
                    $mysqli->query("UPDATE user_pokemons SET hp = '".$new_hp."' WHERE `id` = '".$pid."'");
                }
                $mysqli->query("UPDATE battle SET pok$ind = '".$pid."' WHERE `id` = '".$battle['id']."'");
                $mysqli->query("UPDATE battle SET rload$indv ='1' WHERE id='".$battle['id']."'");
                $mysqli->query("UPDATE battle SET `atk1`='0',`atk2`='0' WHERE id='".$battle['id']."'");
                $mysqli->query("UPDATE battle SET `time1`='120',`time2`='120' WHERE id='".$battle['id']."'");
                $mysqli->query("UPDATE battle SET `turn`=`turn`+'1' WHERE id='".$battle['id']."'");
                $dop_zm1 = isset($dop_zm1)?$dop_zm1:''; // fix wterh
                if ($tPid['nn']=1) {
                    $log_ne = "<b>".infUsr($mID,"login").": <img src=/img/pkmna/".numbPok($tPid['basenum']).".gif border=0>".$tPid['name']."</b>, выбираю тебя!<br>".$dop_zm1;
                }
                else {
                    $log_ne = "<b>".infUsr($mID,"login").": <img src=/img/pkmna/".numbPok($tPid['basenum']).".gif border=0>".$tPid['name_new']."</b>, выбираю тебя!<br>".$dop_zm1;
                }
                $mysqli->query("INSERT INTO log (battle_id , raund , text) VALUES ('".$battle['id']."','".$battle['turn']."','".$log_ne."') ");
            }
            else {
                $mysqli->query("UPDATE battle SET atk$ind = '999', zm$ind = '".$pid."' WHERE `id` = '".$battle['id']."'");
            }
        }
        if($aVS == 0) {
            $mysqli->query("UPDATE battle SET last_xod = '$vID' WHERE `id` = '".$battle['id']."'");
        }
        echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>";
        return;
    }
    else {
        echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>";
        return;
    }
}
if(array_key_exists('type',$_GET) && $_GET['type'] == "atk" and $aMY == 0 and $PokM['hp'] > 0 and $PokV['hp'] > 0) {
    if($_GET['atnum'] == 1 or $_GET['atnum'] == 2 or $_GET['atnum'] == 3 or $_GET['atnum'] == 4) {
        if($battle['kaptcha'] == 1){
        echo "<script>alert('Нельзя атаковать не пройдя капчу!');</script>"; 
        echo "<script>location.href='game.php?fun=fight';</script>"; 
        return;
    }
        $anumb = obr_chis($_GET['atnum']);
        if($anumb == 1){     $wh = "atk1"; $wh2 = "pp1"; }
        elseif($anumb == 2){ $wh = "atk2"; $wh2 = "pp2"; }
        elseif($anumb == 3){ $wh = "atk3"; $wh2 = "pp3"; }
        elseif($anumb == 4){ $wh = "atk4"; $wh2 = "pp4"; }
        else{ echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>"; return; }
        
        $statusslct = $mysqli->query("SELECT status,disable FROM status WHERE pok = ".$PokM['id'])->fetch_assoc();
        for($number=0; $number<150; $number++) {
            ($number % 2) ;
        }
        {
            if($PokM['hp_gen']%2 < 1){$PokM['hp_gen'] = 0;}
            else{$PokM['hp_gen'] = 1;}
            
            if($PokM['atc_gen']%2 < 1){$PokM['atc_gen'] = 0;}
            else{$PokM['atc_gen'] = 1;}
            
            if($PokM['def_gen']%2 < 1){$PokM['def_gen'] = 0;}
            else{$PokM['def_gen'] = 1;}
            
            if($PokM['speed_gen']%2 < 1){$PokM['speed_gen'] = 0;}
            else{$PokM['speed_gen'] = 1;}
            
            if($PokM['spatc_gen']%2 < 1){$PokM['spatc_gen'] = 0;}
            else{$PokM['spatc_gen'] = 1;}
            
            if($PokM['spdef_gen']%2 < 1){$PokM['spdef_gen'] = 0;}
            else{$PokM['spdef_gen'] = 1;}
            
            if($PokM[$wh] > 0) {
                if($PokM[$wh2] > 0) {
                    if($statusslct['status'] == 21){
                      if($PokM[$wh] == $statusslct['disable']){
                        echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>";
                        return;
                      }
                    }
                    if($aVS == 0) {
                        $mysqli->query("UPDATE battle SET last_xod = '$vID' WHERE `id` = '".$battle['id']."'");
                    }
                    if($PokM[$wh] == 307){ $PokM[$wh] = 10000; }
                    elseif($PokM[$wh] == 91){ $PokM[$wh] = 10003; }
                    elseif($PokM[$wh] == 130){ $PokM[$wh] = 100039; }
                    elseif($PokM[$wh] == 143){ $PokM[$wh] = 10004; }
                    elseif($PokM[$wh] == 281){ $PokM[$wh] = 10006; }
                    $sta2 = $mysqli->query("SELECT * FROM status WHERE bid = '".$battle['id']."' and pok = '".$PokV['id']."'");
                    
                    if($PokM[$wh] == 1015 and $sta2 == 8){ $PokM[$wh] = 10006; }
                    if($PokM[$wh] == 174 and ($PokM['basenum'] == 92 or $PokM['basenum'] == 93 or $PokM['basenum'] == 94 or $PokM['basenum'] == 353 or $PokM['basenum'] == 354 or $PokM['basenum'] == 355 or $PokM['basenum'] == 356 or $PokM['basenum'] == 442 or $PokM['basenum'] == 477 or $PokM['basenum'] == 562 or $PokM['basenum'] == 563 or $PokM['basenum'] == 607 or $PokM['basenum'] == 608 or $PokM['basenum'] == 609 or $PokM['basenum'] == 708 or $PokM['basenum'] == 709)){ $PokM[$wh] = 100037; }
                    elseif($PokM[$wh] == 999){ $PokM[$wh] = 14; }
                    if($PokM[$wh] == 237 and  ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=13 and  (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<14)){ $PokM[$wh] = 100028; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=12 and (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<13)){ $PokM[$wh] = 100027; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=11 and  (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<12)){ $PokM[$wh] = 100026; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=10 and (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<11)){ $PokM[$wh] = 100025; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=9 and (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<10)){ $PokM[$wh] = 100024; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=7 and (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<8)){ $PokM[$wh] = 100023; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=6 and (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<7)){ $PokM[$wh] = 100022; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=5 and (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<6)){ $PokM[$wh] = 100021; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=4 and (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<5)){ $PokM[$wh] = 100020; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=3 and (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<4)){ $PokM[$wh] = 100019; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=2 and (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<3)){ $PokM[$wh] = 100018; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=15 and (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<16)){ $PokM[$wh] = 100030; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=14 and (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<15)){ $PokM[$wh] = 100029; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=1 and (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<2)){ $PokM[$wh] = 100017; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=0 and (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<1)){ $PokM[$wh] = 100016; }
                    elseif($PokM[$wh] == 237 and ((((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)>=8 and (((($PokM['hp_gen']%2)+(2*($PokM['atc_gen']%2))+(4*($PokM['def_gen']%2))+(8*($PokM['speed_gen']%2))+(16*($PokM['spatc_gen']%2))+(32*($PokM['spdef_gen']%2)))*15)/63)<9)){ $PokM[$wh] = 100015; }
                    $weather = $mysqli->query('SELECT `weather` FROM `base_region` WHERE `id` = '.$base_region['weather'])->fetch_assoc();
                    if (($PokM[$wh] == 87 and ($base_region['weather']  == 2)) ){ $PokM[$wh] = 100032; }
                    elseif (($PokM[$wh] == 87 and ($base_region['weather']  == 3)) ){ $PokM[$wh] = 100033; }
                    elseif (($PokM[$wh] == 542 and ($base_region['weather']  == 2)) ){ $PokM[$wh] = 100034; }
                    elseif (($PokM[$wh] == 59 and ($base_region['weather']  == 5)) ){ $PokM[$wh] = 100035; }
                    elseif (($PokM[$wh] == 76 and ($base_region['weather']  == 1 or $base_region['weather']  == 2 or $base_region['weather']  == 4 or $base_region['weather']  == 5)) ){ $PokM[$wh] = 10005; }
                    if (($PokM[$wh] == 498 and ($base_region['weather']  == 2)) ){ $power = $power*10000; }
                    //if($PokM[$wh] == 484 and ($PokM['Weight'] > 100)){ $PokM[$wh] = 100037; }
                    //от намбера который выше IF(PokM[$wh]>0)
                    $mysqli->query("UPDATE battle SET atk$ind = '".$PokM[$wh]."' WHERE `id` = '".$battle['id']."'");
                    $mysqli->query("UPDATE user_pokemons SET $wh2 = $wh2-1 WHERE `id` = '".$PokM['id']."'");
                    $weather = $mysqli->query('SELECT `weather` FROM `base_region` WHERE `id` = '.$base_region['weather'])->fetch_assoc();
                    $base_region['weather'] =$weather;
                    if($battle['tip'] == 1) {
                        if($PokV["atk1"] > 0 and $PokV["atk2"] > 0 and $PokV["atk3"] > 0 and $PokV["atk4"] > 0) {
                            $dRand = 4;
                        }
                        elseif($PokV["atk1"] > 0 and $PokV["atk2"] > 0 and $PokV["atk3"] > 0 and $PokV["atk4"] == 0) {
                            $dRand = 3;
                        }
                        elseif($PokV["atk1"] > 0 and $PokV["atk2"] > 0 and $PokV["atk3"] == 0 and $PokV["atk4"] == 0) {
                            $dRand = 2;
                        }
                        elseif($PokV["atk1"] > 0 and $PokV["atk2"] == 0 and $PokV["atk3"] == 0 and $PokV["atk4"] == 0) {
                            $dRand = 1;
                        }
                        $nRnd = rand(1,$dRand);
                        $whr = "atk".$nRnd; $atkDK = $PokV[$whr];
                        $mysqli->query("UPDATE battle SET atk2 = '".$atkDK."' WHERE `id` = '".$battle['id']."'");
                    }
                    echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>";
                    return;
                }
                else {
                    echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>";
                    return;
                }
            }
            else {
                echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>";
                return;
            }
        }
    }
    else{
        echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>";
        return;
    }
} 

if(isset($_GET['iwin'])) {
    if($PokV['hp'] == 0 and $cvp_ == 0 ){
        if($battle['tip'] == 1){
            if($Me['population'] < 200){
            $mysqli->query("UPDATE users SET `population` = population+1, `reputation` = reputation+1  WHERE `id` = '".$mID."'");
            }
            plus_item($PokV['money'],'1',$mID);
            if($PokV['item'] > 0) {
                plus_item(1,$PokV['item'],$mID);
                $today = date("F j, Y, g:i a");
                $itmI = $mysqli->query("SELECT name FROM base_items WHERE `id` = '".$PokV['item']."' ")->fetch_assoc();
                $mysqli->query("INSERT INTO `user_drop` (`user`,`item`,`data`) VALUES ('".$mID."','".$itmI['name']."','".$today."') ");
            }
            $mysqli->query("DELETE FROM `pokem_vs` WHERE `id` = '".$PokV['id']."'");
            $rpk = time()+rand(5,16);
            //$nakazanie = time()+rand(60,120);
            $mysqli->query("UPDATE users SET status = 'free', timepok = '$rpk' WHERE `id` = '".$mID."'");
            $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$mID."' AND `active` = 1 AND `itemsused` > 0");
            //$checkmega = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$_SESSION['user_id']."'")->fetch_assoc();
            //$checkpastev = $mysqli->query("SELECT numbpu FROM user_pokemons WHERE `basenum` > '3000' and `active` = '1' and user_id = '".$_SESSION['user_id']."'")->fetch_assoc();
/*if($checkmega['megause'] == 1){
	$mysqli->query("UPDATE user_pokemons SET `basenum` = '".$checkpastev['numbpu']."' WHERE `basenum` > '3000' and `user_id` = '".$mID."'");
	$mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$mID."'");
}else{
    $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$mID."'");
}*/
        }else{
            if($battle['kom'] == 0) {
                $text_win = "<b>Бой окончен! Вы одержали победу!</b>";
                $text_los = "<b>Бой окончен! Вы потерпели поражение!</b>";
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$vID."','info','Информация','".$text_los."','false') ");
                $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$mID."','info','Информация','".$text_win."','false') ");
                if($battle['type'] == 1) {
                    $fet = time()+5*60;
                    $mysqli->query("UPDATE users SET fetig = '$fet' WHERE `id` = '".$vID."'");
                }
                if($battle['type'] == 2) {
                    $Meclan = $mysqli->query("SELECT * FROM users WHERE `id` = '".$user_id."'")->fetch_assoc();
                    $infoclanmID = $mysqli->query("SELECT `clan_id` FROM `users` WHERE `id` = ".$mID." AND `clan_id` > '0'")->fetch_assoc();
                    $mysqli->query("UPDATE base_location SET conquer = '".$infoclanmID['clan_id']."' WHERE id = '".$Meclan['location']."'");
                    $mysqli->query("UPDATE users SET time_conguerloc = '0' WHERE id = '".$mID."'");
                    $mysqli->query("UPDATE users SET time_conguerloc = '0' WHERE id = '".$vID."'");
                }
                if($battle['type'] == 5) {
                    $date_battle = date("d.m.Y");
                    $mysqli->query("UPDATE users SET date_gym_battle = '".$date_battle."' WHERE `id` = '".$battle['user2']."'");
                    $mysqli->query("UPDATE users SET gym_win_count = gym_win_count+'1' WHERE `id` = '".$battle['user1']."'");
                }
                if($battle['type'] == 1 and $mID == $battle['user1']) {
                    if($Vs['karma'] >= -10) {
                        $mysqli->query("UPDATE users SET karma = karma-'1' WHERE `id` = '".$mID."'");
                    }else{
                        $mysqli->query("UPDATE users SET karma = karma+'1' WHERE `id` = '".$mID."'");
                    }
                }
                if($baseloc['rang'] == 0) {
                    $mysqli->query("UPDATE users SET btl_count = btl_count+1 ,win = win+1, population = population+3, reputation = reputation+3  WHERE `id` = '".$mID."'");
                    $mysqli->query("UPDATE users SET btl_count = btl_count+1 , population = population+2  WHERE `id` = '".$vID."'");
                }
                if($battle['arena'] == 1) {
                    $mysqli->query("UPDATE `users` SET `jeton` = `jeton`+'2' WHERE `id` = '".$mID."'");
                    $mysqli->query("UPDATE `users` SET `jeton` = `jeton`-'0' WHERE `id` = '".$vID."'");
                    
                    $mysqli->query("UPDATE `users` SET `jet_week` = `jet_week`+'1' WHERE `id` = '".$mID."'");
                    $mysqli->query("UPDATE `users` SET `jet_week` = `jet_week`+'1' WHERE `id` = '".$vID."'");
                    
                    $mysqli->query("UPDATE `users` SET `rarena` = '0',`reroll` = '0' WHERE `id` = '".$vID."'");
                    $mysqli->query("UPDATE `users` SET `rarena` = '0',`reroll` = '0' WHERE `id` = '".$mID."'");
                }
                $mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '".$vID."'");
                $mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '".$mID."'");
                $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$vID."' AND `active` = 1 AND `itemsused` > 0");
                $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$mID."' AND `active` = 1 AND `itemsused` > 0");
                $checkmega = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$_SESSION['user_id']."'")->fetch_assoc();
                $checkmegavid = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$vID."'")->fetch_assoc();
                $checkmegamid = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$mID."'")->fetch_assoc();
if($checkmega['megause'] == 1 or $checkmegamid['megause'] == 1 or $checkmegavid['megause'] == 1){
                $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$mID."'");
                $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$vID."'");
/*$mysqli->query("UPDATE user_pokemons SET `basenum` = '".$checkpastev1['numbpu']."' WHERE `basenum` > '3000' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET `basenum` = '".$checkpastev2['numbpu']."' WHERE `basenum` > '3000' and `user_id` = '".$vID."'");*/
/*$mysqli->query("UPDATE user_pokemons SET basenum = '6' WHERE `basenum` = '3006' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '3' WHERE `basenum` = '3003' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '9' WHERE `basenum` = '3009' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '15' WHERE `basenum` = '3015' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '18' WHERE `basenum` = '3018' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '65' WHERE `basenum` = '3065' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '80' WHERE `basenum` = '3080' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '94' WHERE `basenum` = '3094' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '115' WHERE `basenum` = '3115' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '127' WHERE `basenum` = '3127' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '130' WHERE `basenum` = '3130' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '142' WHERE `basenum` = '3142' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '208' WHERE `basenum` = '3208' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '212' WHERE `basenum` = '3212' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '214' WHERE `basenum` = '3214' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '229' WHERE `basenum` = '3229' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '248' WHERE `basenum` = '3248' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '254' WHERE `basenum` = '3254' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '257' WHERE `basenum` = '3257' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '260' WHERE `basenum` = '3260' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '282' WHERE `basenum` = '3282' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '302' WHERE `basenum` = '3302' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '303' WHERE `basenum` = '3303' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '306' WHERE `basenum` = '3306' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '308' WHERE `basenum` = '3308' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '310' WHERE `basenum` = '3310' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '323' WHERE `basenum` = '3323' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '334' WHERE `basenum` = '3334' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '354' WHERE `basenum` = '3354' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '359' WHERE `basenum` = '3359' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '362' WHERE `basenum` = '3362' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '373' WHERE `basenum` = '3373' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '376' WHERE `basenum` = '3376' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '380' WHERE `basenum` = '3380' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '381' WHERE `basenum` = '3381' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '384' WHERE `basenum` = '3384' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '428' WHERE `basenum` = '3428' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '445' WHERE `basenum` = '3445' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '448' WHERE `basenum` = '3448' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '460' WHERE `basenum` = '3460' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '475' WHERE `basenum` = '3475' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '531' WHERE `basenum` = '3531' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '719' WHERE `basenum` = '3719' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '181' WHERE `basenum` = '3181' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '319' WHERE `basenum` = '3319' and `user_id` = '".$vID."'"); 

$mysqli->query("UPDATE user_pokemons SET basenum = '6' WHERE `basenum` = '3006' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '3' WHERE `basenum` = '3003' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '9' WHERE `basenum` = '3009' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '15' WHERE `basenum` = '3015' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '18' WHERE `basenum` = '3018' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '65' WHERE `basenum` = '3065' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '80' WHERE `basenum` = '3080' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '94' WHERE `basenum` = '3094' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '115' WHERE `basenum` = '3115' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '127' WHERE `basenum` = '3127' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '130' WHERE `basenum` = '3130' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '142' WHERE `basenum` = '3142' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '208' WHERE `basenum` = '3208' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '212' WHERE `basenum` = '3212' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '214' WHERE `basenum` = '3214' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '229' WHERE `basenum` = '3229' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '248' WHERE `basenum` = '3248' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '254' WHERE `basenum` = '3254' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '257' WHERE `basenum` = '3257' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '260' WHERE `basenum` = '3260' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '282' WHERE `basenum` = '3282' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '302' WHERE `basenum` = '3302' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '303' WHERE `basenum` = '3303' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '306' WHERE `basenum` = '3306' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '308' WHERE `basenum` = '3308' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '310' WHERE `basenum` = '3310' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '323' WHERE `basenum` = '3323' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '334' WHERE `basenum` = '3334' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '354' WHERE `basenum` = '3354' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '359' WHERE `basenum` = '3359' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '362' WHERE `basenum` = '3362' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '373' WHERE `basenum` = '3373' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '376' WHERE `basenum` = '3376' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '380' WHERE `basenum` = '3380' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '381' WHERE `basenum` = '3381' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '384' WHERE `basenum` = '3384' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '428' WHERE `basenum` = '3428' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '445' WHERE `basenum` = '3445' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '448' WHERE `basenum` = '3448' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '460' WHERE `basenum` = '3460' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '475' WHERE `basenum` = '3475' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '531' WHERE `basenum` = '3531' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '719' WHERE `basenum` = '3719' and `user_id` = '".$mID."'"); 
$mysqli->query("UPDATE user_pokemons SET basenum = '181' WHERE `basenum` = '3181' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '319' WHERE `basenum` = '3319' and `user_id` = '".$mID."'");*/
}
            }
            else {
                $mysqli->query("UPDATE `team_btl` SET `status` = '1', `win`=`win`+'1' WHERE `user` = '".$mID."'");
                $mysqli->query("UPDATE `team_btl` SET `status` = '0' WHERE `user` = '".$vID."'");
            }
            $infClan1 = $mysqli->query("SELECT `clan_id` FROM `users` WHERE `id` = ".$mID." AND `clan_id` > '0'")->fetch_assoc();
            $infClan2 = $mysqli->query("SELECT `clan_id` FROM `users` WHERE `id` = ".$vID." AND `clan_id` > '0'")->fetch_assoc();
            if($infClan1 and $infClan2) {
                if($infClan1['clan_id'] !== $infClan2['clan_id']) {
                    if($baseloc['rang'] == 0) {
                        $mysqli->query("UPDATE base_clans SET rating = rating+2  WHERE `id` = '".$infClan1['clan_id']."'");
                        $mysqli->query("UPDATE base_clans SET rating = rating-1  WHERE `id` = '".$infClan2['clan_id']."'");
                        $mysqli->query("UPDATE users SET clan_rating = clan_rating+2  WHERE `id` = '".$mID."'");
                        $mysqli->query("UPDATE users SET clan_rating = clan_rating-1  WHERE `id` = '".$vID."'");
                    }
                }
            }
        }
        $mysqli->query("DELETE FROM `log` WHERE `battle_id` = '".$battle['id']."'");
        $mysqli->query("DELETE FROM `changes` WHERE `bid` = '".$battle['id']."'");
        $mysqli->query("DELETE FROM `status` WHERE `bid` = '".$battle['id']."'");
        
        $mysqli->query("DELETE FROM `battle` WHERE user$ind = '".$_SESSION['user_id']."'");
        echo "<SCRIPT>location.href='game.php?fun=m_location';</SCRIPT>"; return;
    }
    else {
        echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>"; return;
    }
}
if(isset($_GET['iloss'])){
    if($PokM['hp'] == 0 and $cmp_ == 0){

        if($battle['tip'] == 1){
            if($Me['population'] < 200){
            $mysqli->query("UPDATE users SET population = population+1  WHERE `id` = '".$mID."'");
            }
            $mysqli->query("DELETE FROM `pokem_vs` WHERE `id` = '".$PokV['id']."'");
            $rpk = time()+rand(5,16);
            $nakazanie = time()+rand(60,120);
            if($_SESSION['user_id'] == 709){
            $mysqli->query("UPDATE users SET status = 'free', timepok = '$nakazanie' WHERE `id` = '".$mID."'");
            $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$mID."' AND `active` = 1 AND `itemsused` > 0");
        }else{
            $mysqli->query("UPDATE users SET status = 'free', timepok = '$rpk' WHERE `id` = '".$mID."'");
            $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$mID."' AND `active` = 1 AND `itemsused` > 0");
        }
      $checkmega = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$_SESSION['user_id']."'")->fetch_assoc();
      $checkpastev = $mysqli->query("SELECT numbpu FROM user_pokemons WHERE `basenum` > '3000' and `active` = '1' and user_id = '".$_SESSION['user_id']."'")->fetch_assoc();
if($checkmega['megause'] == 1){
      $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$mID."'");      
$mysqli->query("UPDATE user_pokemons SET `basenum` = '".$checkpastev['numbpu']."' WHERE `basenum` > '3000' and `user_id` = '".$mID."'");
}else{
    $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$mID."'");
}
        }else{
        if($battle['kom'] == 0){
          $text_win = "<b>Бой окончен! Вы одержали победу!</b>";
          $text_los = "<b>Бой окончен! Вы потерпели поражение!</b>";
$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$vID."','info','Информация','".$text_win."','false') ");
$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$mID."','info','Информация','".$text_los."','false') ");
if($battle['type'] == 1){
        $fet = time()+5*60;
$mysqli->query("UPDATE users SET fetig = '$fet' WHERE `id` = '".$mID."'");
                     }
        if($battle['type'] == 5) {
            $date_battle = date("d.m.Y");
                    $mysqli->query("UPDATE users SET date_gym_battle = '".$date_battle."' WHERE `id` = '".$battle['user2']."'");
                    $mysqli->query("UPDATE users SET gym_win_count = gym_win_count-'1' WHERE `id` = '".$battle['user1']."'");
                }
        if($battle['type'] == 2){
            $Vsclan = $mysqli->query("SELECT * FROM users WHERE `id` = '".$vID."'")->fetch_assoc();
        $infoclanvID = $mysqli->query("SELECT `clan_id` FROM `users` WHERE `id` = ".$vID." AND `clan_id` > '0'")->fetch_assoc();
        $mysqli->query("UPDATE base_location SET conquer = '".$infoclanvID['clan_id']."' WHERE id = '".$Vsclan['location']."'");
        $mysqli->query("UPDATE users SET time_conguerloc = '0' WHERE id = '".$mID."'");
                    $mysqli->query("UPDATE users SET time_conguerloc = '0' WHERE id = '".$vID."'");
                     }  
            if($battle['type'] == 1 and $vID == $battle['user1']) {
              if($Me['karma'] >= -10){
                $mysqli->query("UPDATE users SET karma = karma-'1' WHERE `id` = '".$vID."'");
              }else{
                $mysqli->query("UPDATE users SET karma = karma+'1' WHERE `id` = '".$vID."'");
              }
            }
if($baseloc['rang'] == 0){
            $mysqli->query("UPDATE users SET btl_count = btl_count+1 ,win = win+1, population = population+3, reputation = reputation+3  WHERE `id` = '".$vID."'");
            $mysqli->query("UPDATE users SET btl_count = btl_count+1 , population = population+2  WHERE `id` = '".$mID."'");
}
if($battle['arena'] == 1){
  $mysqli->query("UPDATE `users` SET `jeton` = `jeton`+'2' WHERE `id` = '".$vID."'");
  $mysqli->query("UPDATE `users` SET `jeton` = `jeton`-'0' WHERE `id` = '".$mID."'");
  
  $mysqli->query("UPDATE `users` SET `jet_week` = `jet_week`+'1' WHERE `id` = '".$vID."'");
  $mysqli->query("UPDATE `users` SET `jet_week` = `jet_week`+'1' WHERE `id` = '".$mID."'");

  $mysqli->query("UPDATE `users` SET `rarena` = '0',`reroll` = '0' WHERE `id` = '".$vID."'");
  $mysqli->query("UPDATE `users` SET `rarena` = '0',`reroll` = '0' WHERE `id` = '".$mID."'");
}
            $mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '".$vID."'");
            $mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '".$mID."'");
            $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$vID."' AND `active` = 1 AND `itemsused` > 0");
            $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$mID."' AND `active` = 1 AND `itemsused` > 0");
            $checkmega = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$_SESSION['user_id']."'")->fetch_assoc();
            /*$checkpastev = $mysqli->query("SELECT numbpu FROM user_pokemons WHERE `basenum` > '3000' and `active` = '1' and user_id = '".$_SESSION['user_id']."'")->fetch_assoc();*/
            $checkmegavid = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$vID."'")->fetch_assoc();
            $checkmegamid = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$mID."'")->fetch_assoc();
if($checkmega['megause'] == 1 or $checkmegamid['megause'] == 1 or $checkmegavid['megause'] == 1){
            $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$vID."'");
            $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$mID."'");
/*$mysqli->query("UPDATE user_pokemons SET `basenum` = '".$checkpastev['numbpu']."' WHERE `basenum` > '3000' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET `basenum` = '".$checkpastev['numbpu']."' WHERE `basenum` > '3000' and `user_id` = '".$vID."'");*/
            /*$mysqli->query("UPDATE user_pokemons SET basenum = '6' WHERE `basenum` = '3006' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '3' WHERE `basenum` = '3003' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '9' WHERE `basenum` = '3009' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '15' WHERE `basenum` = '3015' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '18' WHERE `basenum` = '3018' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '65' WHERE `basenum` = '3065' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '80' WHERE `basenum` = '3080' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '94' WHERE `basenum` = '3094' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '115' WHERE `basenum` = '3115' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '127' WHERE `basenum` = '3127' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '130' WHERE `basenum` = '3130' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '142' WHERE `basenum` = '3142' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '208' WHERE `basenum` = '3208' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '212' WHERE `basenum` = '3212' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '214' WHERE `basenum` = '3214' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '229' WHERE `basenum` = '3229' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '248' WHERE `basenum` = '3248' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '254' WHERE `basenum` = '3254' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '257' WHERE `basenum` = '3257' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '260' WHERE `basenum` = '3260' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '282' WHERE `basenum` = '3282' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '302' WHERE `basenum` = '3302' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '303' WHERE `basenum` = '3303' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '306' WHERE `basenum` = '3306' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '308' WHERE `basenum` = '3308' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '310' WHERE `basenum` = '3310' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '323' WHERE `basenum` = '3323' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '334' WHERE `basenum` = '3334' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '354' WHERE `basenum` = '3354' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '359' WHERE `basenum` = '3359' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '362' WHERE `basenum` = '3362' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '373' WHERE `basenum` = '3373' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '376' WHERE `basenum` = '3376' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '380' WHERE `basenum` = '3380' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '381' WHERE `basenum` = '3381' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '384' WHERE `basenum` = '3384' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '428' WHERE `basenum` = '3428' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '445' WHERE `basenum` = '3445' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '448' WHERE `basenum` = '3448' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '460' WHERE `basenum` = '3460' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '475' WHERE `basenum` = '3475' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '531' WHERE `basenum` = '3531' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '719' WHERE `basenum` = '3719' and `user_id` = '".$mID."'"); 
$mysqli->query("UPDATE user_pokemons SET basenum = '181' WHERE `basenum` = '3181' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '319' WHERE `basenum` = '3319' and `user_id` = '".$mID."'"); 

$mysqli->query("UPDATE user_pokemons SET basenum = '6' WHERE `basenum` = '3006' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '3' WHERE `basenum` = '3003' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '9' WHERE `basenum` = '3009' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '15' WHERE `basenum` = '3015' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '18' WHERE `basenum` = '3018' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '65' WHERE `basenum` = '3065' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '80' WHERE `basenum` = '3080' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '94' WHERE `basenum` = '3094' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '115' WHERE `basenum` = '3115' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '127' WHERE `basenum` = '3127' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '130' WHERE `basenum` = '3130' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '142' WHERE `basenum` = '3142' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '208' WHERE `basenum` = '3208' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '212' WHERE `basenum` = '3212' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '214' WHERE `basenum` = '3214' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '229' WHERE `basenum` = '3229' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '248' WHERE `basenum` = '3248' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '254' WHERE `basenum` = '3254' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '257' WHERE `basenum` = '3257' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '260' WHERE `basenum` = '3260' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '282' WHERE `basenum` = '3282' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '302' WHERE `basenum` = '3302' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '303' WHERE `basenum` = '3303' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '306' WHERE `basenum` = '3306' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '308' WHERE `basenum` = '3308' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '310' WHERE `basenum` = '3310' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '323' WHERE `basenum` = '3323' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '334' WHERE `basenum` = '3334' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '354' WHERE `basenum` = '3354' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '359' WHERE `basenum` = '3359' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '362' WHERE `basenum` = '3362' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '373' WHERE `basenum` = '3373' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '376' WHERE `basenum` = '3376' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '380' WHERE `basenum` = '3380' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '381' WHERE `basenum` = '3381' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '384' WHERE `basenum` = '3384' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '428' WHERE `basenum` = '3428' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '445' WHERE `basenum` = '3445' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '448' WHERE `basenum` = '3448' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '460' WHERE `basenum` = '3460' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '475' WHERE `basenum` = '3475' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '531' WHERE `basenum` = '3531' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '719' WHERE `basenum` = '3719' and `user_id` = '".$vID."'"); 
$mysqli->query("UPDATE user_pokemons SET basenum = '181' WHERE `basenum` = '3181' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '319' WHERE `basenum` = '3319' and `user_id` = '".$vID."'"); */
}else{
   // $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$mID."'");
   // $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$vID."'");
}
        }else{
          $mysqli->query("UPDATE `team_btl` SET `status` = '1', `win`=`win`+'1' WHERE `user` = '".$vID."'");
          $mysqli->query("UPDATE `team_btl` SET `status` = '0' WHERE `user` = '".$mID."'");
        }
              $infClan1 = $mysqli->query("SELECT `clan_id` FROM `users` WHERE `id` = ".$mID." AND `clan_id` > '0'")->fetch_assoc();
    $infClan2 = $mysqli->query("SELECT `clan_id` FROM `users` WHERE `id` = ".$vID." AND `clan_id` > '0'")->fetch_assoc();
    if($infClan1 and $infClan2){
   if($infClan1['clan_id'] !== $infClan2['clan_id']){
if($baseloc['rang'] == 0){
    $mysqli->query("UPDATE base_clans SET rating = rating+2  WHERE `id` = '".$infClan2['clan_id']."'");
    $mysqli->query("UPDATE base_clans SET rating = rating-1  WHERE `id` = '".$infClan1['clan_id']."'");

    $mysqli->query("UPDATE users SET clan_rating = clan_rating+2  WHERE `id` = '".$vID."'");
    $mysqli->query("UPDATE users SET clan_rating = clan_rating-1  WHERE `id` = '".$mID."'");
  }
   }
    }
      }
        $mysqli->query("DELETE FROM `log` WHERE `battle_id` = '".$battle['id']."'");
    $mysqli->query("DELETE FROM `changes` WHERE `bid` = '".$battle['id']."'");
    $mysqli->query("DELETE FROM `status` WHERE `bid` = '".$battle['id']."'");
        $mysqli->query("DELETE FROM `battle` WHERE `id` = '".$battle['id']."'");
        
        echo "<SCRIPT>location.href='game.php?fun=m_location';</SCRIPT>"; return;
    }else{
        echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>"; return;
    }
}
if(isset($_GET['leave'])){
    if($battle['kaptcha'] == 1){
        echo "<script>alert('Нельзя сдаваться не вводя капчу!');</script>"; 
        echo "<script>location.href='game.php?fun=fight';</script>"; 
        return;
    }
        
        if($battle['tip'] == 1){
            $mysqli->query("DELETE FROM `pokem_vs` WHERE `id` = '".$PokV['id']."'");
            $rpk = time()+rand(5,16);
            $nakazanie = time()+rand(60,120);
            if($_SESSION['user_id'] == 709){
            $mysqli->query("UPDATE users SET status = 'free', timepok = '$nakazanie' WHERE `id` = '".$mID."'");
            $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$mID."' AND `active` = 1 AND `itemsused` > 0");
        }else{
            $mysqli->query("UPDATE users SET status = 'free', timepok = '$rpk' WHERE `id` = '".$mID."'");
            $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$mID."' AND `active` = 1 AND `itemsused` > 0");
        }
      $checkmega = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$_SESSION['user_id']."'")->fetch_assoc();
      $checkpastev = $mysqli->query("SELECT numbpu FROM user_pokemons WHERE `basenum` > '3000' and `active` = '1' and user_id = '".$_SESSION['user_id']."'")->fetch_assoc();
if($checkmega['megause'] == 1){
      $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$mID."'");
      $mysqli->query("UPDATE user_pokemons SET `basenum` = '".$checkpastev['numbpu']."' WHERE `basenum` > '3000' and `user_id` = '".$mID."'");
      /*$mysqli->query("UPDATE user_pokemons SET basenum = '6' WHERE `basenum` = '3006' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '3' WHERE `basenum` = '3003' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '9' WHERE `basenum` = '3009' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '15' WHERE `basenum` = '3015' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '18' WHERE `basenum` = '3018' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '65' WHERE `basenum` = '3065' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '80' WHERE `basenum` = '3080' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '94' WHERE `basenum` = '3094' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '115' WHERE `basenum` = '3115' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '127' WHERE `basenum` = '3127' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '130' WHERE `basenum` = '3130' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '142' WHERE `basenum` = '3142' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '208' WHERE `basenum` = '3208' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '212' WHERE `basenum` = '3212' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '214' WHERE `basenum` = '3214' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '229' WHERE `basenum` = '3229' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '248' WHERE `basenum` = '3248' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '254' WHERE `basenum` = '3254' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '257' WHERE `basenum` = '3257' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '260' WHERE `basenum` = '3260' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '282' WHERE `basenum` = '3282' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '302' WHERE `basenum` = '3302' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '303' WHERE `basenum` = '3303' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '306' WHERE `basenum` = '3306' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '308' WHERE `basenum` = '3308' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '310' WHERE `basenum` = '3310' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '323' WHERE `basenum` = '3323' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '334' WHERE `basenum` = '3334' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '354' WHERE `basenum` = '3354' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '359' WHERE `basenum` = '3359' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '362' WHERE `basenum` = '3362' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '373' WHERE `basenum` = '3373' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '376' WHERE `basenum` = '3376' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '380' WHERE `basenum` = '3380' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '381' WHERE `basenum` = '3381' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '384' WHERE `basenum` = '3384' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '428' WHERE `basenum` = '3428' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '445' WHERE `basenum` = '3445' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '448' WHERE `basenum` = '3448' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '460' WHERE `basenum` = '3460' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '475' WHERE `basenum` = '3475' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '531' WHERE `basenum` = '3531' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '719' WHERE `basenum` = '3719' and `user_id` = '".$mID."'"); 
$mysqli->query("UPDATE user_pokemons SET basenum = '181' WHERE `basenum` = '3181' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '319' WHERE `basenum` = '3319' and `user_id` = '".$mID."'"); */
}else{
    //$mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$mID."'");
}
        }else{
        if($battle['kom'] == 0){
          $text_win = "<b>Бой окончен! Вы одержали победу!</b>";
          $text_los = "<b>Бой окончен! Вы потерпели поражение!</b>";
$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$vID."','info','Информация','".$text_win."','false') ");
$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$mID."','info','Информация','".$text_los."','false') ");
if($battle['type'] == 1){
        $fet = time()+5*60;
$mysqli->query("UPDATE users SET fetig = '$fet' WHERE `id` = '".$mID."'");
                     }  
        if($battle['type'] == 5) {
            $date_battle = date("d.m.Y");
                    $mysqli->query("UPDATE users SET date_gym_battle = '".$date_battle."' WHERE `id` = '".$battle['user2']."'");
                    $mysqli->query("UPDATE users SET gym_win_count = gym_win_count+'1' WHERE `id` = '".$battle['user1']."'");
                }
    if($battle['type'] == 2){
        $Vsclan = $mysqli->query("SELECT * FROM users WHERE `id` = '".$vID."'")->fetch_assoc();
        $infoclanvID = $mysqli->query("SELECT `clan_id` FROM `users` WHERE `id` = ".$vID." AND `clan_id` > '0'")->fetch_assoc();
        $mysqli->query("UPDATE base_location SET conquer = '".$infoclanvID['clan_id']."' WHERE id = '".$Vsclan['location']."'");
        $mysqli->query("UPDATE users SET time_conguerloc = '0' WHERE id = '".$mID."'");
                    $mysqli->query("UPDATE users SET time_conguerloc = '0' WHERE id = '".$vID."'");

                     }  
            if($battle['type'] == 1 and $vID == $battle['user1']) {
              if($Me['karma'] >= -10){
                $mysqli->query("UPDATE users SET karma = karma-'1' WHERE `id` = '".$vID."'");
              }else{
                $mysqli->query("UPDATE users SET karma = karma+'1' WHERE `id` = '".$vID."'");
              }
            }
           if($baseloc['rang'] == 0){
            $mysqli->query("UPDATE users SET btl_count = btl_count+1 ,win = win+1, population = population+3, reputation = reputation+3  WHERE `id` = '".$vID."'");
            $mysqli->query("UPDATE users SET btl_count = btl_count+1 , population = population+2  WHERE `id` = '".$mID."'");
          }
if($battle['arena'] == 1){
  $mysqli->query("UPDATE `users` SET `jeton` = `jeton`+'2' WHERE `id` = '".$vID."'");
  $mysqli->query("UPDATE `users` SET `jeton` = `jeton`-'0' WHERE `id` = '".$mID."'");
  
  $mysqli->query("UPDATE `users` SET `jet_week` = `jet_week`+'1' WHERE `id` = '".$vID."'");
  $mysqli->query("UPDATE `users` SET `jet_week` = `jet_week`+'1' WHERE `id` = '".$mID."'");

  $mysqli->query("UPDATE `users` SET `rarena` = '0',`reroll` = '0' WHERE `id` = '".$vID."'");
  $mysqli->query("UPDATE `users` SET `rarena` = '0',`reroll` = '0' WHERE `id` = '".$mID."'");
}
            $mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '".$vID."'");
            $mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '".$mID."'");
            $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$vID."' AND `active` = 1 AND `itemsused` > 0");
            $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$mID."' AND `active` = 1 AND `itemsused` > 0");
            $checkmega = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$_SESSION['user_id']."'")->fetch_assoc();
            $checkpastev = $mysqli->query("SELECT numbpu FROM user_pokemons WHERE `basenum` > '3000' and `active` = '1' and user_id = '".$_SESSION['user_id']."'")->fetch_assoc();
            $checkmegavid = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$vID."'")->fetch_assoc();
            $checkmegamid = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$mID."'")->fetch_assoc();
if($checkmega['megause'] == 1 or $checkmegamid['megause'] == 1 or $checkmegavid['megause'] == 1){
            $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$vID."'");
            $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$mID."'");
/*$mysqli->query("UPDATE user_pokemons SET `basenum` = '".$checkpastev['numbpu']."' WHERE `basenum` > '3000' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET `basenum` = '".$checkpastev['numbpu']."' WHERE `basenum` > '3000' and `user_id` = '".$vID."'");*/
            /*$mysqli->query("UPDATE user_pokemons SET basenum = '6' WHERE `basenum` = '3006' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '3' WHERE `basenum` = '3003' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '9' WHERE `basenum` = '3009' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '15' WHERE `basenum` = '3015' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '18' WHERE `basenum` = '3018' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '65' WHERE `basenum` = '3065' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '80' WHERE `basenum` = '3080' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '94' WHERE `basenum` = '3094' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '115' WHERE `basenum` = '3115' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '127' WHERE `basenum` = '3127' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '130' WHERE `basenum` = '3130' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '142' WHERE `basenum` = '3142' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '208' WHERE `basenum` = '3208' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '212' WHERE `basenum` = '3212' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '214' WHERE `basenum` = '3214' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '229' WHERE `basenum` = '3229' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '248' WHERE `basenum` = '3248' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '254' WHERE `basenum` = '3254' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '257' WHERE `basenum` = '3257' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '260' WHERE `basenum` = '3260' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '282' WHERE `basenum` = '3282' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '302' WHERE `basenum` = '3302' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '303' WHERE `basenum` = '3303' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '306' WHERE `basenum` = '3306' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '308' WHERE `basenum` = '3308' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '310' WHERE `basenum` = '3310' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '323' WHERE `basenum` = '3323' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '334' WHERE `basenum` = '3334' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '354' WHERE `basenum` = '3354' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '359' WHERE `basenum` = '3359' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '362' WHERE `basenum` = '3362' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '373' WHERE `basenum` = '3373' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '376' WHERE `basenum` = '3376' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '380' WHERE `basenum` = '3380' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '381' WHERE `basenum` = '3381' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '384' WHERE `basenum` = '3384' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '428' WHERE `basenum` = '3428' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '445' WHERE `basenum` = '3445' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '448' WHERE `basenum` = '3448' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '460' WHERE `basenum` = '3460' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '475' WHERE `basenum` = '3475' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '531' WHERE `basenum` = '3531' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '719' WHERE `basenum` = '3719' and `user_id` = '".$mID."'"); 
$mysqli->query("UPDATE user_pokemons SET basenum = '181' WHERE `basenum` = '3181' and `user_id` = '".$mID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '319' WHERE `basenum` = '3319' and `user_id` = '".$mID."'"); 

$mysqli->query("UPDATE user_pokemons SET basenum = '6' WHERE `basenum` = '3006' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '3' WHERE `basenum` = '3003' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '9' WHERE `basenum` = '3009' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '15' WHERE `basenum` = '3015' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '18' WHERE `basenum` = '3018' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '65' WHERE `basenum` = '3065' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '80' WHERE `basenum` = '3080' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '94' WHERE `basenum` = '3094' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '115' WHERE `basenum` = '3115' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '127' WHERE `basenum` = '3127' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '130' WHERE `basenum` = '3130' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '142' WHERE `basenum` = '3142' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '208' WHERE `basenum` = '3208' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '212' WHERE `basenum` = '3212' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '214' WHERE `basenum` = '3214' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '229' WHERE `basenum` = '3229' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '248' WHERE `basenum` = '3248' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '254' WHERE `basenum` = '3254' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '257' WHERE `basenum` = '3257' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '260' WHERE `basenum` = '3260' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '282' WHERE `basenum` = '3282' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '302' WHERE `basenum` = '3302' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '303' WHERE `basenum` = '3303' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '306' WHERE `basenum` = '3306' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '308' WHERE `basenum` = '3308' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '310' WHERE `basenum` = '3310' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '323' WHERE `basenum` = '3323' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '334' WHERE `basenum` = '3334' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '354' WHERE `basenum` = '3354' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '359' WHERE `basenum` = '3359' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '362' WHERE `basenum` = '3362' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '373' WHERE `basenum` = '3373' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '376' WHERE `basenum` = '3376' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '380' WHERE `basenum` = '3380' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '381' WHERE `basenum` = '3381' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '384' WHERE `basenum` = '3384' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '428' WHERE `basenum` = '3428' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '445' WHERE `basenum` = '3445' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '448' WHERE `basenum` = '3448' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '460' WHERE `basenum` = '3460' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '475' WHERE `basenum` = '3475' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '531' WHERE `basenum` = '3531' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '719' WHERE `basenum` = '3719' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '181' WHERE `basenum` = '3181' and `user_id` = '".$vID."'");
$mysqli->query("UPDATE user_pokemons SET basenum = '319' WHERE `basenum` = '3319' and `user_id` = '".$vID."'");*/
}else{
	/*$mysqli->query("UPDATE user_pokemons SET `basenum` = '".$checkpastev['numbpu']."' WHERE `basenum` > '3000' and `user_id` = '".$mID."'");
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '".$checkpastevVS['numbpu']."' WHERE `basenum` > '3000' and `user_id` = '".$vID."'");*/
    //$mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$mID."'");
    //$mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$vID."'");
}
        }else{
          $mysqli->query("UPDATE `team_btl` SET `status` = '1', `win`=`win`+'1' WHERE `user` = '".$vID."'");
          $mysqli->query("UPDATE `team_btl` SET `status` = '0' WHERE `user` = '".$mID."'");
        }
            $infClan1 = $mysqli->query("SELECT `clan_id` FROM `users` WHERE `id` = ".$mID." AND `clan_id` > '0'")->fetch_assoc();
    $infClan2 = $mysqli->query("SELECT `clan_id` FROM `users` WHERE `id` = ".$vID." AND `clan_id` > '0'")->fetch_assoc();
    if($infClan1 and $infClan2){
   if($infClan1['clan_id'] !== $infClan2['clan_id']){
if($baseloc['rang'] == 0){
    $mysqli->query("UPDATE base_clans SET rating = rating+2  WHERE `id` = '".$infClan2['clan_id']."'");
    $mysqli->query("UPDATE base_clans SET rating = rating-1  WHERE `id` = '".$infClan1['clan_id']."'");

    $mysqli->query("UPDATE users SET clan_rating = clan_rating+2  WHERE `id` = '".$vID."'");
    $mysqli->query("UPDATE users SET clan_rating = clan_rating-1  WHERE `id` = '".$mID."'");
  }
   }
    }
       }
    $allPkUS = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$mID."' and `active`='1'");
     while($apu = $allPkUS->fetch_assoc()){
       $mysqli->query("UPDATE user_pokemons SET hp = '0' WHERE `id` = '".$apu['id']."'");
     }
    $mysqli->query("DELETE FROM `log` WHERE `battle_id` = '".$battle['id']."'");
    $mysqli->query("DELETE FROM `changes` WHERE `bid` = '".$battle['id']."'");
    $mysqli->query("DELETE FROM `status` WHERE `bid` = '".$battle['id']."'");
    $mysqli->query("DELETE FROM `battle` WHERE `id` = '".$battle['id']."'");
        
        echo "<SCRIPT>location.href='game.php?fun=m_location';</SCRIPT>"; return;
}

if(isset($_GET['help'])){
  if($battle['tip'] == 0){
  if($user['reputation'] < 50 or $Vs['reputation'] < 50) {
    echo "<script>parent.mess('Вы или ваш противник не может участвовать в командных боях.');</script>";
  }elseif($battle['kom'] == 0){
     $mysqli->query("UPDATE battle SET kom = '".$battle['id']."' WHERE `id` = '".$battle['id']."'");
     if($battle['type'] == 1 or $battle['type'] == 2){
      if($mID == $battle['user1']) { $napal = $mID; }else{ $napal = $vID; }
     $mysqli->query("INSERT INTO `team_btl` (`user`,`kom`,`team`,`btl`,`status`,`leader`,`type`,`napal`) VALUES ('".$mID."','".$battle['id']."','".$ind."','".$battle['id']."','2','1','1','$napal') ");
     $mysqli->query("INSERT INTO `team_btl` (`user`,`kom`,`team`,`btl`,`status`,`leader`,`type`,`napal`) VALUES ('".$vID."','".$battle['id']."','".$indv."','".$battle['id']."','2','1','1','$napal') ");
     }else{
     $mysqli->query("INSERT INTO `team_btl` (`user`,`kom`,`team`,`btl`,`status`,`leader`) VALUES ('".$mID."','".$battle['id']."','".$ind."','".$battle['id']."','2','1') ");
     $mysqli->query("INSERT INTO `team_btl` (`user`,`kom`,`team`,`btl`,`status`,`leader`) VALUES ('".$vID."','".$battle['id']."','".$indv."','".$battle['id']."','2','1') ");
     }
     echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>"; return;
  }else{
    echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>"; return;
  }
}else{
  echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>"; return;
}
}
if(isset($_GET['newtmr'])){
    $mysqli->query("UPDATE battle SET time$ind = '120' WHERE `id` = '".$battle['id']."'");
     echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>"; return;
}
if(isset($_POST['timer'])) {
    if($aMY > 0 and $aVS == 0){
        if($time1 == 0 ){ $timNew = 0; }else{ $timNew = $time1 - 1; }
        $mysqli->query("UPDATE battle SET time$ind = '$timNew' WHERE `id` = '".$battle['id']."'");
        echo json_encode(array('time'=>$timNew));
        return;
    }elseif($cvp_ > 0 and $PokV['hp'] == 0 and $pMY > 0 and $pVS > 0){
        if($time1 == 0 ){ $timNew = 0; }else{ $timNew = $time1 - 1; }
        $mysqli->query("UPDATE battle SET time$ind = '$timNew' WHERE `id` = '".$battle['id']."'");
        echo json_encode(array('time'=>$timNew));
        return;
    }else{
        echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>"; return;
    }
}
if(isset($_GET['wintimer'])){
    if($time1 == 0 and $aVS == 0){
        $mysqli->query("UPDATE user_pokemons SET hp = '0' WHERE `user_id` = '".$vID."' and `active` = '1' ");
        echo "<SCRIPT>location.href='game.php?fun=fight&iwin=1';</SCRIPT>"; return;
    }else{
        echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>"; return;
    }
}
if($battle['tip'] == 0 and $battle['kom'] == 0 and $battle['arena'] != 1){
  $kom_txt = " | <a target='_work' href='game.php?fun=fight&help=1'>попросить помощи</a>";
}
if($battle['tip'] == 0 and $battle['kom'] == 0 and $battle['arena'] != 1){
  $kom_txt2 = " | <a target='_work' href='game.php?fun=fight&help=1'>комы</a>";
}


?>
<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
 <title>Pokezone FIGHT!</title>
 <meta http-equiv="content-type" content="text/html; charset=windows-1251">
 <meta name="author" content="serg">
 <link rel="stylesheet" href="style.css" type="text/css">
</head>
<style>
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

  DIV.itemd {
    position:relative;
    top:-315;left:105;
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

</style>
<script src="js/jquery.min.js"></script>

 <script language="JavaScript">
 function timer(){
    $.ajax({
                url: "game.php?fun=fight",
                type: "POST",
                data: "timer=1",
                dataType: "json",
                cache: true,
                error: function (){
                    location.href='game.php?fun=fight';
                },
                success: function (data) {
                  if(data.time > 0) {
                    $("#timer").html(data.time);
                  }else if(data.time == 0){
 $("#timer").html("<h3>Время вышло!<br> Вы можете <a href='game.php?fun=fight&wintimer=1'>признать победу</a> или <a href='game.php?fun=fight&newtmr=1'>продолжить ожидание</a></h3>");
                  }

        }
        });
 }
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
   <?php if($aMY > 0 and $aVS == 0){ ?> 
    $(document).ready(function(){
    setInterval(timer, 1000);
});
   <?php }elseif($cvp_ > 0 and $PokV['hp'] == 0 and $pMY > 0 and $pVS > 0){ ?>
    $(document).ready(function(){
    setInterval(timer, 1000);
});
   <?php } ?>
 </script>
<body>
<span id=its_fight_frame></span>
<div style="height:390;overflow:hidden;">
<table width=100% border=0>
<tr>
<td width=25% valign="top" align="center">
<?php 
    if(isset($PokM['name_new']) && $PokM['name_new'] != ''){
      $poke_name = $PokM['name_new'];
    }
    elseif(isset($PokM['name'])){
      $poke_name = $PokM['name'];
    }
    else {
        $poke_name = 'Покемон без имени';
    }
?>
         <table class=nonborder cellpadding=3 cellspacing=1 width=210><tr><td class=title align=center><span class='<?=$type1; ?>'>
         <?php   if($PokM['name']){ ?><a HREF=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?=$PokM['numbpu'];?>","dex","width=600,height=600,scrollbars=yes");>
         <img src=/img/pokedex.gif alt=Покедекс title=Покедекс border=0>
         </a>#<?=numbPok($PokM['numbpu']);?> <?=$poke_name;?> <?=$PokM['lvl'];?>-lvl <?=$name1;?>  <?php if($PokM['trn'] > 0){ ?><img src='/img/trn/Tren_ar<?=$PokM["trn"];?>.png'><?php } ?></span><?php } ?>
         </td>
         </tr>
         <tr><td width=250>
         <img src=/img/pkmn/<?php if($PokM['type']){ echo $img1."/"; }?><?=numbPok($PokM['basenum']);?>.jpg width=250 height=190 border=1><br>
         <table border=0 cellspacing=0 width=252 height=10 class=nonborder>
           <tr><td style='padding:0'><div style="width:<?=round(($PokM['hp']/$PokM['hp_max'])*100);?>%;background:<?=colorHPbar(($PokM['hp']/$PokM['hp_max'])*100);?>;height:12;font-size:9;"><?=$PokM['hp'];?></div></td></tr>
           <tr><td style='padding:0'><div style="width:<?=($PokM['exp']/$PokM['exp_max'])*100;?>%;background:blue;height:5;font-size:0;"></div></td></tr>
         </table>
 
         </td></tr></table><center id=txt_c><b><big><a href='game.php?fun=treninf&to_id=<?=$user_id;?>' onclick="window.open('game.php?fun=treninf&to_id=<?=$user_id;?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src='/img/question.gif' border=0></a> <font color='<?=colorsUsers($Me["groups"]);?>'><?=$Me["login"];?></font></big>
         </b><br>
         <?php 
        $blPOK = $mysqli->query('SELECT hp FROM user_pokemons WHERE user_id = '.$user_id.' and active = 1');
                 while($blPOK_ = $blPOK->fetch_assoc()){
         ?>
         <img src=/img/cond/slot<?php if($blPOK_['hp'] == 0){ echo "_i"; } ?>.png   class=slot>
         <?php } 
         for ($x=0; $x<$nBl; $x++){
         ?>
         <img src=/img/cond/slot_n.png class=slot>
         <?php } ?>
         </center>
         <div id="iv" class="x">
         <?php 
         $selectinvpok = $mysqli->query("SELECT itemsused FROM user_pokemons WHERE id = '".$pMY."'")->fetch_assoc();
         if($selectinvpok['itemsused'] > 0 ){
          echo "Инвентарь ".$selectinvpok['itemsused']."/2<br>";
         }
        $chg = $mysqli->query("SELECT * FROM changes WHERE bid = '".$battle['id']."' and pok = '".$PokM['id']."'");
        if($chg->num_rows > 0) {
            while($ch = $chg->fetch_assoc()){
                if($ch['atk'] > 0) { echo "Атака";  if($ch['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch['atk']."<br>"; }
                if($ch['def'] > 0) { echo "Защита";  if($ch['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch['def']."<br>"; }
                if($ch['speed'] > 0) { echo "Скорость";  if($ch['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch['speed']."<br>"; }
                if($ch['satk'] > 0) { echo "Сп.Атака";  if($ch['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch['satk']."<br>"; }
                if($ch['sdef'] > 0) { echo "Сп.Защита";  if($ch['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch['sdef']."<br>"; }
                if($ch['accuracy'] > 0) { echo "Точность";  if($ch['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch['accuracy']."<br>"; }
                if($ch['agillity'] > 0) { echo "Ловкость";  if($ch['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch['agillity']."<br>"; }
            }
        }
        if($spikesM > 0) { echo "Шипы x".$spikesM."<br>"; }
        if($tspikesM > 0) { echo "Отравленные шипы x".$tspikesM."<br>"; }
        if($spideM > 0) { echo "Поле в паутине<br>"; }
        if($rockM > 0) { echo "Каменная ловушка<br>"; }
        if($lsM > 0) { echo "Экран света<br>"; }
        $sta = $mysqli->query("SELECT * FROM status WHERE bid = '".$battle['id']."' and pok = '".$PokM['id']."'");
        if($sta->num_rows > 0) {
            while($st = $sta->fetch_assoc()){
                switch($st['status']){
                case 7: echo "Проклят"."<br>"; break;
                case 1: echo "Отравлен"."<br>"; break;
                case 2: echo "Усыплен"."<br>"; break;
                case 3: echo "Подожжен"."<br>"; break;
                case 4: echo "Парализован"."<br>"; break;
                case 5: echo "Заморожен"."<br>"; break;
                case 6: echo "Спутан"."<br>"; break;
                case 8: echo "Toxic"."<br>"; break;
                case 9: echo "Семена-пиявки"."<br>"; break;
                case 10: echo "Насмешка"."<br>"; break;
                case 11: echo "Защитный экран"."<br>"; break;
                case 12: echo "Экран света"."<br>"; break;
                case 13: echo "Напуган"."<br>"; break;
                case 14: echo "Сильное отравление"."<br>"; break;
                case 15: echo "Ускорен ветром"."<br>"; break;
                case 16: echo "Свито гнездо"."<br>"; break;
                case 17: echo "Кольцо воды"."<br>"; break;
                case 18: echo "Кошмары"."<br>"; break;
                case 19: echo "Бодрящее кофе"."<br>"; break;
                case 20: echo "Связан"."<br>"; break;
                case 21: echo "Блок атаки"."<br>"; break;
                }


            }
        }
?>
         </div>
                  <?php  if($PokM['item_id']){?>
          <div class='item'><img src='/img/items/<?=$PokM['item_id'];?>.gif' width='32' height='32' border='0'></div>
           <?php }else{?>
           <div class='item'><img src='/img/items/blank.gif' width='32' height='32' border='0'></div>
                   <?php }?>
           </td>
<td width=50%><div style="position:relative; top:-70; overflow:hidden;">
<?php

if($battle['pok1'] > 0 and $battle['pok2'] > 0 and $PokM['hp'] == 0 and $PokV['hp'] == 0 and $cvp_ > 0 and $cmp_ > 0) {
    $mysqli->query("UPDATE `battle` SET `pok1` = '0',`pok2` = '0' WHERE `id` = '".$battle['id']."'");
    echo "<SCRIPT>location.href='game.php?fun=fight';</SCRIPT>"; return;
}
elseif($cvp_ > 0 and $PokV['hp'] == 0 and $pMY > 0 and $pVS > 0) {
    echo "<h2>Ожидайте хода соперника!<br><div id='timer'>".$time1."</div></h2><br><a href='game.php?fun=fight&leave=1'>сдаться</a>".$kom_txt;
}
elseif($aMY > 0 and $aVS == 0) {
    echo "<h2>Ожидайте хода соперника!<br><div id='timer'>".$time1."</div></h2><br><a href='game.php?fun=fight&leave=1'>сдаться</a>".$kom_txt;
}
elseif($PokV['hp'] == 0 and $cvp_ == 0) {
    if($battle['tip'] == 1) {
        if($PokV['item'] > 0) {
            $infitm = $mysqli->query("SELECT `name` FROM `base_items` WHERE `id` = '".$PokV['item']."' ")->fetch_assoc();
            $dlg = ", ".$infitm['name']." x1";
        }
        else {
            $dlg = '';
        }
        plus_item($PokV['money'],'1',$mID);
            if($PokV['item'] > 0) {
                plus_item(1,$PokV['item'],$mID);
                $today = date("F j, Y, g:i a");
                $itmI = $mysqli->query("SELECT name FROM base_items WHERE `id` = '".$PokV['item']."' ")->fetch_assoc();
                $mysqli->query("INSERT INTO `user_drop` (`user`,`item`,`data`) VALUES ('".$mID."','".$itmI['name']."','".$today."') ");
            }
            $mysqli->query("DELETE FROM `pokem_vs` WHERE `id` = '".$PokV['id']."'");
            $rpk = time()+rand(5,16);
            $nakazanie = time()+rand(60,120);
            if($_SESSION['user_id'] == 709){
            $mysqli->query("UPDATE users SET status = 'free', timepok = '$nakazanie' WHERE `id` = '".$mID."'");
            $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$mID."' AND `active` = 1 AND `itemsused` > 0");
        }else{
            $mysqli->query("UPDATE users SET status = 'free', timepok = '$rpk' WHERE `id` = '".$mID."'");
            $mysqli->query("UPDATE user_pokemons SET itemsused = 0 WHERE `user_id` = '".$mID."' AND `active` = 1 AND `itemsused` > 0");
        }
            $checkmega = $mysqli->query("SELECT megause FROM users WHERE `id` = '".$_SESSION['user_id']."'")->fetch_assoc();
            $checkpastev = $mysqli->query("SELECT numbpu FROM user_pokemons WHERE `basenum` > '3000' and `active` = '1' and user_id = '".$_SESSION['user_id']."'")->fetch_assoc();
if($checkmega['megause'] == 1){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '".$checkpastev['numbpu']."' WHERE `basenum` > '3000' and `user_id` = '".$mID."'");
    $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$mID."'");
}else{
    $mysqli->query("UPDATE users SET megause = '0' WHERE `id` = '".$mID."'");
}
        $mysqli->query("DELETE FROM `changes` WHERE `bid` = '".$battle['id']."'");
        $mysqli->query("DELETE FROM `status` WHERE `bid` = '".$battle['id']."'");
        
        $mysqli->query("DELETE FROM `battle` WHERE user$ind = '".$_SESSION['user_id']."'");
        $tp1 = "<b>Вы получили:</b> Кредит x".$PokV['money'].$dlg."<br>"; }
        echo "<h2>Бой окончен! Победил ".infUsr($mID,"login")."!</h2><br>".$tp1."<a href='game.php?fun=fight&iwin=1'><< уйти</a>";
}

elseif($PokM['hp'] == 0 and $cmp_ > 0){
?>
<form action="game.php?fun=fight" method="POST">
<?php if($cmp_ > 0){ ?>
    <span id=txt>Смена покемона:
        <select size=1 name=pid>
            <option value=0>Выберите покемона</option>
            <?php 
            $PkUserZM = $mysqli->query('SELECT id,name_new,name FROM user_pokemons WHERE user_id = '.$user_id.' and active = 1  and hp > 0 and id !='.$pMY);
            while($pzm = $PkUserZM->fetch_assoc()) {
            ?>
            <option value=<?=$pzm['id'];?>><?=$pzm['name_new'];?> (<?=$pzm['name'];?>)</option>
            <?php } ?>
        </select>
        <input type='submit' value='OK' name='but'></span> 
<?php } $kom_txt = isset($kom_txt)?$kom_txt:''; ?> | <a href='game.php?fun=fight&leave=1'>сдаться</a><?=$kom_txt; ?></form>

    <hr>
<?php
}elseif($PokM['hp'] == 0 and $cmp_ == 0){
    echo "<h2>Бой окончен! Победил ".$Vs["login"]."!</h2><br><a href='game.php?fun=fight&iloss=1'><< уйти</a>";
}else{
  
              if($PokM['atk1']){
            $one = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$PokM['atk1'])->fetch_assoc();
                  }else{
                $one = array('attac_name_eng'=>'-','atac_pp'=>0);     
                  }
              if($PokM['atk2']){
            $two = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$PokM['atk2'])->fetch_assoc();
                  }else{
                $two = array('attac_name_eng'=>'-','atac_pp'=>0);     
                  }
              if($PokM['atk3']){
            $three = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$PokM['atk3'])->fetch_assoc();
                  }else{
                $three = array('attac_name_eng'=>'-','atac_pp'=>0);     
                  }
              if($PokM['atk4']){
            $four = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$PokM['atk4'])->fetch_assoc();
                  }else{
                $four = array('attac_name_eng'=>'-','atac_pp'=>0);    
                  } 
                  ?>
                  <?php
                   if($battle['kaptcha'] == 1){
                       // Проверка того, что есть данные из капчи
                   //header('refresh: 5'); // captcha
 //echo "<center><form name='captcha' action='' method='post'><img src='/kp.php'></p> <input type='text' name='keystring'><input type='submit' value='Отправить'></form> </center>";
               ?><center>
                   <form action="" name='captcha' method="POST">
                   <div class="g-recaptcha" data-sitekey="6Le0mmYmAAAAAMI58OvxuVapKztBPucHxgBJkgav"></div>
                   <input name='keystring' type="submit" value="Отправить">
                   </form>
                   </center>
                <?
           }else{
?>
  <style>
   del {
    color: #b9a3a3;; /* Цвет текста pp = 0 */
   }
  </style>
  <form action="game.php?fun=fight" method="POST">
    <table width=100%>
    <tr>
    <td width=50%>
    <?php if($PokM['atk1'] == 0){ echo "<b><big>Нет атаки</big></b>"; }else{ ?>
    <a href=game.php?fun=fight&type=atk&atnum=1><b><big><?php if($PokM['pp1'] == 0){ echo "<del>"; } ?> <?=$one['attac_name_eng'];?> <?php if($PokM['pp1'] == 0){ echo "</del>"; } ?></big></b></A>
    <a href=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$one["atac_id"];?>','at','width=500,height=230');><img src=/img/question.gif alt=Инфо border=0></a> 
    <br>
    <sup>&nbsp;&nbsp;&nbsp;<?=$PokM['pp1'];?>/<?=$one['atac_pp'];?>&nbsp;&nbsp;&nbsp;<?=atktip($one['atac_tip']);?></sup>
     <?php } ?>
    <td width=50%>
    <?php if($PokM['atk2'] == 0){ echo "<b><big>Нет атаки</big></b>"; }else{ ?>
    <a href=game.php?fun=fight&type=atk&atnum=2><b><big><?php if($PokM['pp2'] == 0){ echo "<del>"; } ?> <?=$two['attac_name_eng'];?> <?php if($PokM['pp2'] == 0){ echo "</del>"; } ?></big></b></A>
    <a href=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$two["atac_id"];?>','at','width=500,height=230');><img src=/img/question.gif alt=Инфо border=0></a> 
    <br>
    <sup>&nbsp;&nbsp;&nbsp;<?=$PokM['pp2'];?>/<?=$two['atac_pp'];?>&nbsp;&nbsp;&nbsp;<?=atktip($two['atac_tip']);?></sup>
     <?php } ?>
    </td>
    </tr>
    <tr>
    <td width=50%>
    <?php if($PokM['atk3'] == 0){ echo "<b><big>Нет атаки</big></b>"; }else{ ?>
    <a href=game.php?fun=fight&type=atk&atnum=3><b><big><?php if($PokM['pp3'] == 0){ echo "<del>"; } ?> <?=$three['attac_name_eng'];?> <?php if($PokM['pp3'] == 0){ echo "</del>"; } ?></big></b></A>
    <a href=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$three["atac_id"];?>','at','width=500,height=230');><img src=/img/question.gif alt=Инфо border=0></a> 
    <br>
    <sup>&nbsp;&nbsp;&nbsp;<?=$PokM['pp3'];?>/<?=$three['atac_pp'];?>&nbsp;&nbsp;&nbsp;<?=atktip($three['atac_tip']);?></sup>
     <?php } ?>
    </td>
    <td width=50%>
    <?php if($PokM['atk4'] == 0){ echo "<b><big>Нет атаки</big></b>"; }else{ ?>
    <a href=game.php?fun=fight&type=atk&atnum=4><b><big><?php if($PokM['pp4'] == 0){ echo "<del>"; } ?> <?=$four['attac_name_eng'];?> <?php if($PokM['pp4'] == 0){ echo "</del>"; } ?></big></b></A>
    <a href=javascript: onclick=win1=window.open('at_view.php?AttackID=<?=$four["atac_id"];?>','at','width=500,height=230');><img src=/img/question.gif alt=Инфо border=0></a> 
    <br>
    <sup>&nbsp;&nbsp;&nbsp;<?=$PokM['pp4'];?>/<?=$four['atac_pp'];?>&nbsp;&nbsp;&nbsp;<?=atktip($four['atac_tip']);?></sup>
     <?php } ?>
    </td>
    </td>
    </tr>
    </table>
<?php if($cmp_ > 0){ ?>
<span ID=txt>Смена покемона:
    <select size=1 name=pid>
    <option value=0>Выберите покемона</option>
    <?php 
    $PkUserZM = $mysqli->query('SELECT id,name_new,name FROM user_pokemons WHERE user_id = '.$user_id.' and active = 1 and hp > 0 and id !='.$pMY);
while($pzm = $PkUserZM->fetch_assoc()){
  ?>
    <option value=<?=$pzm['id'];?>><?=$pzm['name_new'];?> ( <?=$pzm['name'];?>)</option>
    <?php } ?>
    </select>
    <input type='submit' value='OK' name='but'></span> |
<?php } ?>
    <span ID=txt>Инвентарь:

    <select size=1 name=i_id>
    <option value=0>Выберите предмет</option>
    <?php 
    $itmUser = $mysqli->query("SELECT * FROM user_items WHERE user_id = '".$user_id."'");
while($itmUsers = $itmUser->fetch_assoc()){
  $itm = $mysqli->query("SELECT * FROM base_items WHERE  `id` = '".$itmUsers['item_id']."' AND (`categories` = 2 OR `categories` = 3 OR `categories` = 4 OR `categories` = 5 OR `categories` = 21)")->fetch_assoc();
    if($itm['use'] == 1){
  ?>
    <option value=<?=$itmUsers['item_id'];?>> <?=$itm['name'];?> x<?=$itmUsers['count'];?></option>
    <?php } } ?>
    </select>
    <input type='submit' value='Use' name='but'></span> | <a href='game.php?fun=fight&leave=1'>сдаться</a><?=(isset($kom_txt)?$kom_txt:'');?></form>
    <?php } ?>
      
      <?php } ?>

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
             <?php if(isset($kMy['kom']) && $kMy['kom'] > 0) { ?>
<div id='divTeam' style="display:none">
  <b><a href=javascript: onclick='switchLogDivs();'><< К БОЮ</a></b>
  <br><br>
    <div style='float: left; margin-left: 10px;'>
 <?php 
        $mTeam = $mysqli->query("SELECT * FROM `team_btl` WHERE `kom` = '".$kMy['kom']."' and `team` = '".$kMy['team']."'");
                 while($mT = $mTeam->fetch_assoc()){
         ?>    
  <b><big><a href="game.php?fun=treninf&amp;to_id=<?=$mT['user'];?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$mT['user'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src="/img/question.gif" border="0" alt="Тренеркарта" title="Тренеркарта"></a> <font style="color:<?=colorsUsers(infUsr($mT['user'],'groups')); ?>;"><?=infUsr($mT['user'],"login");?></font><?php if($mT['leader'] == 1){ echo "<font color='red'>*</font>"; } ?></big>
         </b><br>
          <?php 
        $blPOK = $mysqli->query('SELECT hp FROM user_pokemons WHERE user_id = '.$mT['user'].' and active = 1');
                 while($blPOK_ = $blPOK->fetch_assoc()){
         ?>
         <img src=/img/cond/slot<?php if($blPOK_['hp'] == 0){ echo "_i"; } ?>.png   class=slot>
         <?php } 
          $cMPKi =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$mT['user']."' and `active`='1'");
          $cmpk_i = $cMPKi->num_rows;
          $nBli = 6-$cmpk_i;
         for ($x1=0; $x1<$nBli; $x1++){
         ?>
         <img src=/img/cond/slot_n.png class=slot>
         <?php } ?>
         <br>
         <?php } ?>
         </div>

           <div style='float: right; margin-right: 10px;'>
         <?php 
        $vTeam = $mysqli->query("SELECT * FROM `team_btl` WHERE `kom` = '".$kMy['kom']."' and `team` != '".$kMy['team']."'");
                 while($vT = $vTeam->fetch_assoc()){
         ?>    
  <b><big><a href="game.php?fun=treninf&amp;to_id=<?=$vT['user'];?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$vT['user'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src="/img/question.gif" border="0" alt="Тренеркарта" title="Тренеркарта"></a> <font style="color:<?=colorsUsers(infUsr($vT['user'],'groups')); ?>;"><?=infUsr($vT['user'],"login");?></font><?php if($vT['leader'] == 1){ echo "<font color='red'>*</font>"; } ?></big>
         </b><br>
          <?php 
        $blPOK2 = $mysqli->query('SELECT hp FROM user_pokemons WHERE user_id = '.$vT['user'].' and active = 1');
                 while($blPOK_2 = $blPOK2->fetch_assoc()){
         ?>
         <img src=/img/cond/slot<?php if($blPOK_2['hp'] == 0){ echo "_i"; } ?>.png   class=slot>
         <?php } 
          $cMPKi2 =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='".$vT['user']."' and `active`='1'");
          $cmpk_i2 = $cMPKi2->num_rows;
          $nBli2 = 6-$cmpk_i2;
         for ($x2=0; $x2<$nBli2; $x2++){
         ?>
         <img src=/img/cond/slot_n.png class=slot>
         <?php } ?> 
         <br>
         <?php } ?>
         </div>
<div style="margin-left: 35%;">
<?php 
 $bKom = $mysqli->query('SELECT * FROM battle WHERE kom = '.$kMy['kom']);
                 while($bk = $bKom->fetch_assoc()){
?>
<p id="txt"><a href="game.php?fun=treninf&amp;to_id=<?=$bk['user1'];?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$bk['user1'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src="/img/question.gif" border="0" alt="Тренеркарта" title="Тренеркарта"></a> <a style="color:<?=colorsUsers(infUsr($bk['user1'],"groups"));?>;" href="javascript:parent.priv_m('<?=infUsr($bk['user1'],"login");?>',<?=$bk['user1'];?>);"><?=infUsr($bk['user1'],"login");?></a> 
VS 
<a href="game.php?fun=treninf&amp;to_id=<?=$bk['user2'];?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$bk['user2'];?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src="/img/question.gif" border="0" alt="Тренеркарта" title="Тренеркарта"></a> <a style="color:<?=colorsUsers(infUsr($bk['user2'],"groups"));?>;" href="javascript:parent.priv_m('<?=infUsr($bk['user2'],"login");?>',<?=$bk['user2'];?>);"><?=infUsr($bk['user2'],"login");?></a> <a target="_location" href="game.php?fun=view_fight&btl=<?=$bk['id'];?>"> <font color="red">>>></font> </a></p>
<?php } ?>
  </div>

  </div>
  <?php } ?>
<div id=divLog>
 <?php if(isset($kMy['kom']) && $kMy['kom'] > 0) { ?>
 <b><a href=javascript: onclick='switchLogDivs();'>КОМАНДА</a></b>
 <?php } ?>
<?php 
$weather = $mysqli->query('SELECT * FROM weather WHERE id = '.$base_region['weather'])->fetch_assoc();
?>
<center><b><sup>Раунд: <?=$battle['turn'];?> - Погода: <?=$weather['name']; ?> <?php if($battle['type'] == 1){ echo "<b><font color=red>НАПАДЕНИЕ</font></b>"; } if($battle['type'] == 2){  echo "<b><font color=blue>ЗАХВАТ</font></b>"; } if($battle['type'] == 5){  echo "<b><font color=yellow>GYM - BATTLE</font></b>"; }?></sup></b></center>
<br />
<!-- Лог боя-->
<?
  $battle_log = $mysqli->query('SELECT * FROM log WHERE battle_id = '.$battle['id'].' ORDER BY id DESC');
  $log = '';
  while($logs = $battle_log->fetch_assoc()){
      $log .= "<table class='log'><td class='log'>".$logs['raund']."&nbsp;</td>";
      $log .= "<td id='txt'>".$logs['text']."<br><p></td></table>";
  }
?>
<?=(isset($log)?$log:'');?>

Начало боя: <?=$battle['data'];?>
</div>
</div></div></div>
</td>


<td width=25% valign="top" align="center">
       
         <table class=nonborder cellpadding=3 cellspacing=1 width=210><tr><td class=title align=center><span class='<?=$type2;?>'>
          <?php if($PokV['name']){ ?><a  HREF=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?=$PokV['numbpu'];?>","dex","width=600,height=600,scrollbars=yes");><img src=img/pokedex.gif alt=Покедекс title=Покедекс border=0></a>
         #<?=numbPok($PokV['numbpu']);?> <?=$PokV['name'];?> <?=$PokV['lvl'];?>-lvl <?=$name2;?>  <?php if(array_key_exists('trn',$PokV) && $PokV['trn'] > 0){ ?><img src='img/trn/Tren_ar<?=$PokV["trn"];?>.png'><?php } ?></span><?php } ?>
         </td></tr>
         <tr><td width=250><img src=img/pkmn/<?php if($PokV['type']){ echo $img2."/"; }?><?=numbPok($PokV['basenum']);?>.jpg width=250 height=190 border=1><br>
         <table border=0 cellspacing=0 width=252 height=10 class=nonborder>
           <tr><td style='padding:0'><div style="width:<?=round(($PokV['hp']/$PokV['hp_max'])*100);?>%;background:<?=colorHPbar(($PokV['hp']/$PokV['hp_max'])*100);?>;height:12;font-size:9;"><?=$PokV['hp'];?></div></td></tr>
           <tr><td style='padding:0'><div style="width:<?=($PokV['exp']/$PokV['exp_max'])*100;?>%;background:blue;height:5;font-size:0;"></div></td></tr>
         </table>
         </td></tr></table><center id=txt_c><?php if($battle['tip'] == 1){ ?><b><big><?=$Vs["login"];?></big></b><?php }else{ ?>
        <b><big><a href='game.php?fun=treninf&to_id=<?=$vID;?>' onclick="window.open('game.php?fun=treninf&to_id=<?=$vID;?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=500,height=430'); return false;"><img src='img/question.gif' border=0></a> <font color='<?=colorsUsers($Vs["groups"]);?>'><?=$Vs["login"];?></font></big><?php } ?>
         </b>
         <br>
        <?php 
        if($battle['tip'] == 0){
        $blPOK2 = $mysqli->query('SELECT hp FROM user_pokemons WHERE user_id = '.$vID.' and active = 1');
                 while($blPOK_2 = $blPOK2->fetch_assoc()){
         ?>
         <img src=/img/cond/slot<?php if($blPOK_2['hp'] == 0){ echo "_i"; } ?>.png   class=slot>
         <?php } 
         for ($x2=0; $x2<$nBl2; $x2++){
         ?>
         <img src=/img/cond/slot_n.png class=slot>
         <?php }
          }else{ ?>
         <img src=/img/cond/slot.png class=slot>
        <?php } ?>
         </center>
         <div id=hv class=x>
           <?php 
           if($inV > 0){
          echo "Инвентарь ".$inV."/6<br>";
         }
                 $chg2 = $mysqli->query("SELECT * FROM changes WHERE bid = '".$battle['id']."' and pok = '".$PokV['id']."'");
                 while($ch2 = $chg2->fetch_assoc()){ ?>
          <?php if($ch2['atk'] > 0) { echo "Атака";  if($ch2['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch2['atk']."<br>"; } ?>
          <?php if($ch2['def'] > 0) { echo "Защита";  if($ch2['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch2['def']."<br>"; } ?>
          <?php if($ch2['speed'] > 0) { echo "Скорость";  if($ch2['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch2['speed']."<br>"; } ?>
          <?php if($ch2['satk'] > 0) { echo "Сп.Атака";  if($ch2['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch2['satk']."<br>"; } ?>
          <?php if($ch2['sdef'] > 0) { echo "Сп.Защита";  if($ch2['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch2['sdef']."<br>"; } ?>
          <?php if($ch2['accuracy'] > 0) { echo "Точность";  if($ch2['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch2['accuracy']."<br>"; } ?>
          <?php if($ch2['agillity'] > 0) { echo "Ловкость";  if($ch2['type'] == 1){ echo " +"; }else{ echo " -"; } echo $ch2['agillity']."<br>"; } ?>
                 <?php } 
                 if($spikesV > 0) { echo "Шипы x".$spikesV."<br>"; }
                 if($tspikesV > 0) { echo "Отравленные шипы x".$tspikesV."<br>"; }
                 if($spideV > 0) { echo "Поле в паутине<br>"; }
                 if($rockV > 0) { echo "Каменная ловушка<br>"; }
                 if($lsV > 0) { echo "Экран света<br>"; }
          $sta2 = $mysqli->query("SELECT * FROM status WHERE bid = '".$battle['id']."' and pok = '".$PokV['id']."'");
                 while($st2 = $sta2->fetch_assoc()){ ?>
          <?php switch($st2['status']){
                case 7: echo "Проклят"."<br>"; break;
                case 1: echo "Отравлен"."<br>"; break;
                case 2: echo "Усыплен"."<br>"; break;
                case 3: echo "Подожжен"."<br>"; break;
                case 4: echo "Парализован"."<br>"; break;
                case 5: echo "Заморожен"."<br>"; break;
                case 6: echo "Спутан"."<br>"; break;
                case 8: echo "Toxic"."<br>"; break;
                case 9: echo "Семена-пиявки"."<br>"; break; 
                case 10: echo "Насмешка"."<br>"; break;
                case 11: echo "Защитный экран"."<br>"; break; 
                case 12: echo "Экран света"."<br>"; break;
                case 13: echo "Напуган"."<br>"; break;
                case 14: echo "Сильное отравление"."<br>"; break;
                case 15: echo "Ускорен ветром"."<br>"; break;
                case 18: echo "Кошмары"."<br>"; break;
                case 19: echo "Бодрящее кофе"."<br>"; break;
                case 20: echo "Связан"."<br>"; break;
                case 21: echo "Блок атаки"."<br>"; break;
                 }

                ?>

          <?php }  ?>

         </div>
         <?php  if($PokV['item_id'] and $battle['tip'] == 0){?>
          <div class='item'><img src='/img/items/<?=$PokV['item_id'];?>.gif' width='32' height='32' border='0'></div>
           <div class='itemd'><img src='/img/items/<?=$item2pok['item'];?>.gif' width='32' height='32' border='0'></div>
           <?php }else{?>
           <div class='item'><img src='/img/items/blank.gif' width='32' height='32' border='0'></div>
                   <?php }?>
          <?php  if($item2pok['item']){?>
          <div class='itemd'><img src='/img/items/<?=$item2pok['item'];?>.gif' width='32' height='32' border='0'></div>
           <?php }else{?>
           <div class='itemd'><img src='/img/items/blank.gif' width='32' height='32' border='0'></div>
                   <?php }?>
         

         </td>
</tr>
</table>
</body>
</html>