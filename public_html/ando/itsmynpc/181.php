<?php 
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Касса Арены';
/*if($npc == 4000 && empty($answer)){
    $textNPC = 'Спасибо за помощь юный тренер!Ах сколько чудесных букетов!За твою помощь я бы хотел наградить тебя наградой,выбери что-нибудь подходящее для себя...';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=4000&answ_id=1&map=1">А что у вас есть?! ...</a></li>';
}else*/if($npc == 181 && empty($answer)){
   // $textNPC = 'Покемоны будут не доступны для разведения после вылупления!.';
    $info1 = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '1'")->fetch_assoc();
function price_item($itm){
        if($itm == 1) { $prc = 1500000; }else
        if($itm == 2) { $prc = 2000000; }else
        if($itm == 3) { $prc = 1000000; }else
        if($itm == 4) { $prc = 1000000; }else
        if($itm == 5) { $prc = 1200000; }else
        if($itm == 6) { $prc = 1500000; }else
        if($itm == 7) { $prc = 1500000; }else
        if($itm == 8) { $prc = 1200000; }else
    if($itm == 9) { $prc = 800000; }else
    if($itm == 10) { $prc = 3000000; }else
    if($itm == 11) { $prc = 3000000; }else
    if($itm == 12) { $prc = 3000000; }else
    if($itm == 13) { $prc = 3000000; }else
    if($itm == 14) { $prc = 3000000; }else
        if($itm == 15) { $prc = 5000000; }

        else{return false;}
        return $prc;
    }
function inf_egg($itm){
    if($itm == 1) { $prc = 561; }else
    if($itm == 2) { $prc = 185; }else
    if($itm == 3) { $prc = 102; }else
    if($itm == 4) { $prc = 241; }else
    if($itm == 5) { $prc = 336; }else
    if($itm == 6) { $prc = 442; }else
    if($itm == 7) { $prc = 517; }else
    if($itm == 8) { $prc = 527; }else
    if($itm == 9) { $prc = 546; }else
    if($itm == 10) { $prc = 548; }else
    if($itm == 11) { $prc = 539; }else
    if($itm == 12) { $prc = 615; }else
    if($itm == 13) { $prc = 631; }else
    if($itm == 14) { $prc = 632; }else
    if($itm == 15) { $prc = 701; }

        else{return false;}
        return $prc;
    }
    if(array_key_exists('sellID',$_POST) and $_POST['sellID'] > 0){
        $sell = (int)obTxt($_POST['sellID']);
        if(array_key_exists('kr',$_POST)){
          $sl = price_item($sell);
          if($sl <= $info1['count']){
            $eg = inf_egg($sell);
            $reborn = time() + (3600*24)*rand(6,9);
            $mysqli->query("INSERT INTO `user_items` (`user_id`, `item_id` ,`egg`,`pok`,`shiny`,`breed`,`hp`,`atk`,`def`,`speed`,`satk`,`sdef`,`reborn`, `count`) VALUES ('".$_SESSION['user_id']."','999','1','".$eg."','0','1','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".rand(24,30)."','".$reborn."','1') ");
            minus_item($sl,1,$user_id);
            echo "Яйцо успешно преобретено!";
            return;
          }else{
            echo "Не достаточно кредитов!";
            return;
          }
        }
    }
?>






<?php 
$close = 0;
if ($close == 1) {
    die('<center><br /><b>Магазин временно закрыт!</b></center>');
}
$power = 1;

if (isset($_GET) && !empty($_GET) && $power == 1) {
    $file = date('d.m.y').'_get_arena_store.log';
    $path = dirname(__FILE__).'/secretlogchat/';
    //print_r($path);
    $string = '';
    // buffer
    $string .= '['.date('d.m.Y | H:i:s').']';
    // full date
    $string .= print_r($_GET,1);
    file_put_contents($path.$file,$string,FILE_APPEND);
}

if (isset($_POST) && !empty($_POST) && $power == 1) {
    $file = date('d.m.y').'_post_arena_store.log';
    $path = dirname(__FILE__).'/secretlogchat/';
    //print_r($path);
    $string = '';
    // buffer
    $string .= '['.date('d.m.Y | H:i:s').']';
    // full date
    $string .= print_r($_POST,1);
    file_put_contents($path.$file,$string,FILE_APPEND);
}
if (isset($_GET['id'])) {

    $id = escapeMe((int)obr_chis($_GET['id']));
    $sell = $mysqli->query('SELECT * FROM arena_store WHERE item_id = '.$id)->fetch_assoc();
    if ($sell['count'] < 1) {
        die('Данного товара нет в продаже');
    }
    if (($user['jeton'] >= $sell['price']) AND ($user['jeton'] != 0)) {
        if($user['jeton'] < 0){
            die('У вас нет жетонов!');
        }
        $cn_ = 1;
        if ($id == 309) {
            $cn_ = 3;
        }
        if($id == 1055){
            if($user['arena_vitbox'] < 2){
                $mysqli->query("UPDATE users SET arena_vitbox = arena_vitbox + 1 WHERE id = ".$_SESSION['user_id']);
                $cn_ = 3;
            }else{
                die('Вы купили уже сверх нормы данных предметов. Ждите следующий сезон.');
            }
        }
        if($id == 1){
            $cn_ = 100000;
        }
        if ($id == 72){
            if($user['arena_darkball'] < 10){
                $mysqli->query("UPDATE users SET arena_darkball = arena_darkball + 1 WHERE id = ".$_SESSION['user_id']);
            }else{
                die('Вы купили уже сверх нормы данных предметов. Ждите следующий сезон.');
            }
        }
        if ($id == 1132){
            if($user['arena_oblig'] < 1){
                $mysqli->query("UPDATE users SET arena_oblig = arena_oblig + 1 WHERE id = ".$_SESSION['user_id']);
            }else{
                die('Вы купили уже сверх нормы данных предметов. Ждите следующий сезон.');
            }
        }
        /*if($id == 231 or $id == 241){
            $timedel = time() + (3600*720);
        }*/
        plus_item($cn_,$id,$user_id);
        //minus_item($sell['price'],500,$user_id);
        $mysqli->query("UPDATE `users` SET `jeton` = `jeton`-'".$sell['price']."' WHERE `id` = '".$user_id."'");
        if ($sell['count'] < 999) {
            $mysqli->query("UPDATE `arena_store` SET `count` = `count`-'1' WHERE `id` = '".$sell['id']."'");
        }
        die('Предмет успешно куплен!');
    } else {
        die('Недостаточно жетонов!');
    }
    /*if (item_isset(500,$sell['price'])) {
        $cn_ = 1;
        if ($id == 72) {
            $cn_ = 2;
        }
        plus_item($cn_,$id);
        minus_item($sell['price'],500,$user_id);
        if ($sell['count'] < 999) {
            $mysqli->query("UPDATE `arena_store` SET `count` = `count`-'1' WHERE `id` = '".$sell['id']."'");
        }
        die('Предмет успешно куплен!');
    } else {
        die('Недостаточно жемчуга!');
    }*/
}
$arena_store = $mysqli->query("SELECT * FROM `user_items` WHERE `item_id` = '500' and `user_id` = '".$user_id."' ")->fetch_assoc();
$sell = $mysqli->query('SELECT * FROM arena_store');
?>


  <style>
   .textT { 
    font-family: Tahoma;
    font-size: 13px;
}
   }
  </style>


<script type="text/javascript">
    function SUBMIT_BUY() {
             FormBuy.submit;
           }
</script>
<H1>Магазин &laquo;Арены&raquo;</H1>


     <table class="openk" width="100%">
     
    <tr>
        <td>
            <p id="txt">
                 <big><b>В вашем рюкзаке: <?=$user['jeton']?> жетонов.</b>
                        </div>
                    </div>
                    <div style='clear:both; margin-top:11px;'>
                        <br>&nbsp;
                    </div>
                    <table cellspacing='0'>
                        <?php
                        while ($sells = $sell->fetch_assoc()) {
                            if (!$sells['id']) {
                                die('<center>Магазин пуст</center>');
                            }
                            $item_name = $mysqli->query('SELECT * FROM base_items WHERE id = '.$sells['item_id'])->fetch_assoc();
                            
                            ?>
                            <tr onmouseover='this.style.backgroundColor="#C2DDF7";' onmouseout='this.style.backgroundColor="transparent";'>
                                <td width='40'><img src='img/items/<?=$sells['item_id']?>.gif' border='0' width='32' height='32'></td>
                                <td width='400'>
                                    <span class='textT'><?=$item_name['name']?>
                                    <?php if ($sells['item_id'] == 309) {
                                            echo "x3";
                                        }
                                        ?> 
                                      <?php if ($sells['item_id'] == 1055) {
                                            echo "x3";
                                        }
                                        ?> 
                                      <?php if ($sells['item_id'] == 1) {
                                            echo "x100000";
                                        }
                                        ?>
                                        <?php if ($sells['count'] == 999) {} else {
                                            echo "(осталось ".$sells['count']."шт.)";
                                        }
                                        ?></span>
                                    <br><?=$item_name['about']?> <?if($item_name['poknbr'] > 0){?>В облигации указан номер #<?=$item_name['poknbr'];}else{}?>
                                </td>
                                <td width='100' class='textT'><?=$sells['price']?> жет.</td>
                                <td width='100' class='textT'><a target = '_blank' href='game.php?fun=m_npc&npc_id=181&map=1&id=<?=$sells['item_id']?>'>Приобрести!</a></td>
                            </tr>
                            <?php 
                        }
                        ?>
                    </table>
                </div>

<?php 
return ;
}