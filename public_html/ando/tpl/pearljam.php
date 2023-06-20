<?php 
$close = 0;
if ($close == 1) {
    die('<center><br /><b>Магазин временно закрыт!</b></center>');
}
$power = 1;

if (isset($_GET) && !empty($_GET) && $power == 1) {
    $file = date('d.m.y').'_get_pearljam.log';
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
    $file = date('d.m.y').'_post_pearljam.log';
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
    $sell = $mysqli->query('SELECT * FROM pearljam WHERE item_id = '.$id)->fetch_assoc();
    if ($sell['count'] < 1) {
        die('Данного товара нет в продаже');
    }
    if (item_isset(500,$sell['prise'])) {
        $cn_ = 1;
        if ($id == 309) {
            $cn_ = 3;
        }
        if($id == 72){
            $cn_ = 2;
        }
        /*if($id == 231 or $id == 241){
            $timedel = time() + (3600*720);
        }*/
        plus_item($cn_,$id,$user_id);
        minus_item($sell['prise'],500,$user_id);
        if ($sell['count'] < 999) {
            $mysqli->query("UPDATE `pearljam` SET `count` = `count`-'1' WHERE `id` = '".$sell['id']."'");
        }
        die('Предмет успешно куплен!');
    } else {
        die('Недостаточно жемчуга!');
    }
    /*if (item_isset(500,$sell['prise'])) {
        $cn_ = 1;
        if ($id == 72) {
            $cn_ = 2;
        }
        plus_item($cn_,$id);
        minus_item($sell['prise'],500,$user_id);
        if ($sell['count'] < 999) {
            $mysqli->query("UPDATE `pearljam` SET `count` = `count`-'1' WHERE `id` = '".$sell['id']."'");
        }
        die('Предмет успешно куплен!');
    } else {
        die('Недостаточно жемчуга!');
    }*/
}
$pearljam = $mysqli->query("SELECT * FROM `user_items` WHERE `item_id` = '500' and `user_id` = '".$user_id."' ")->fetch_assoc();
$sell = $mysqli->query('SELECT * FROM pearljam');
?>
<H1>Магазин &laquo;Pearljam&raquo;</H1>

<table width="100%">
    <tr>
        <td>
            <p id="txt">
                Рады приветствовать вас в нашем необычном магазине. Здесь вы можете обменять <a href="game.php?fun=buy">жемчуг</a> на уникальные игровые предметы.
                <br>
                <img src='img/pearl.png' alt='' border='0' style='float:left;'>
                <div style='float:left; border: 3px solid #C2DDF7; margin-left: 50px; width:450px; padding:7px;'>
                    <big><b>В вашем рюкзаке:</b><br>&nbsp;&nbsp;&nbsp;<?php if ($pearljam['count'] > 0) {
                        echo $pearljam['count']." жем.";
                    } else {
                        echo "нет жемчуга";
                    }
                        ?>
                        <br>&nbsp;<br><div align='right'>
                           <b><a href='game.php?fun=buy'>приобрести жемчуг >></a></b>
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
                                    <span class='bigfont'><?=$item_name['name']?>
                                    <?php if ($sells['item_id'] == 309) {
                                            echo "x3";
                                        }
                                        ?> 
                                      <?php if ($sells['item_id'] == 72) {
                                            echo "x2";
                                        }
                                        ?>
                                        <?php if ($sells['count'] == 999) {} else {
                                            echo "(осталось ".$sells['count']."шт.)";
                                        }
                                        ?></span>
                                    <br><?=$item_name['about']?>
                                </td>
                                <td width='100' class='bigfont'><?=$sells['prise']?> жем.</td>
                                <td width='100' class='bigfont'><a href='game.php?fun=pearljam&id=<?=$sells['item_id']?>'>Приобрести!</a></td>
                            </tr>
                            <?php 
                        }
                        ?>
                    </table>
                    <HR>
                        <table width="100%">
                            <tr>
                                <td align="right" width=200>
                                    <b><?=$_SERVER['HTTP_HOST']?> || admin@<?=$_SERVER['HTTP_HOST']?></b><br>
                                    © 2009-<?=date('Y') ?>
                                </td>
                                <tr>
                                </table>