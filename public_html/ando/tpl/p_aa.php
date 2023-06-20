<?
if(!empty($_GET['TP_id']) && !empty($_GET['fun'])){
    $pok_id = obr_chis($_GET['TP_id']);
    $type = obTxt($_GET['fun']);
    $poks = $mysqli->query("SELECT * FROM user_pokemons WHERE id = '".$pok_id."' AND user_id = '".$_SESSION['user_id']."' AND active = 1")->fetch_assoc();
    if(!$poks){
        echo "<script>alert('Ошибка!'); window.location.href='game.php?fun=start';</script>";
        return;
    }

    if($poks['atk1']){
        $one = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$poks['atk1'])->fetch_assoc();
    }
    else{
        $one = array('atac_id' => 0,'attac_name_eng'=>'-','atac_pp'=>0);
    }

    if($poks['atk2']){
        $two = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$poks['atk2'])->fetch_assoc();
    }
    else{
        $two = array('atac_id' => 0, 'attac_name_eng'=>'-','atac_pp'=>0);
    }

    if($poks['atk3']){
        $three = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$poks['atk3'])->fetch_assoc();
    }
    else{
        $three = array('atac_id' => 0,'attac_name_eng'=>'-','atac_pp'=>0);
    }

    if($poks['atk4']){
        $four = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$poks['atk4'])->fetch_assoc();
    }
    else{
        $four = array('atac_id' => 0,'attac_name_eng'=>'-','atac_pp'=>0);
    }

    if(isset($_POST['a_teach']) and isset($_POST['a_forgot'])){
        if($user['id'] != $poks['master'])
        {
            echo "<script>alert('Ошибка! Покемон Вам не принадлежит!'); window.location.href='game.php?fun=p_aa&TP_id=".$pok_id."';</script>";
            return;
        }
        
        if($user['status'] == "free"){
        $teach =  obr_chis($_POST['a_teach']);
        $forgot = obr_chis($_POST['a_forgot']);
        $iAtk = $mysqli->query('SELECT * FROM mypok_learn WHERE atk = '.$teach.' and pok='.$pok_id)->fetch_assoc();
            if($iAtk){
                $ai = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$teach)->fetch_assoc();
                if($forgot == 1){
                    $mysqli->query("UPDATE user_pokemons SET atk1 = ".$teach.", pp1 = ".$ai['atac_pp']." WHERE id = ".$pok_id."");
                    $mysqli->query('DELETE FROM mypok_learn WHERE id = '.$iAtk['id']);
                    echo "<script>alert('Атака успешно изучена!'); window.location.href='game.php?fun=p_aa&TP_id=".$pok_id."';</script>";
                    return;
                }
                elseif($forgot == 2){
                    $mysqli->query("UPDATE user_pokemons SET atk2 = ".$teach.", pp2 = ".$ai['atac_pp']." WHERE id = ".$pok_id."");
                    $mysqli->query('DELETE FROM mypok_learn WHERE id = '.$iAtk['id']);
                    echo "<script>alert('Атака успешно изучена!'); window.location.href='game.php?fun=p_aa&TP_id=".$pok_id."';</script>";
                    return;
                }
                elseif($forgot == 3){
                    $mysqli->query("UPDATE user_pokemons SET atk3 = ".$teach.", pp3 = ".$ai['atac_pp']." WHERE id = ".$pok_id."");
                    $mysqli->query('DELETE FROM mypok_learn WHERE id = '.$iAtk['id']);
                    echo "<script>alert('Атака успешно изучена!'); window.location.href='game.php?fun=p_aa&TP_id=".$pok_id."';</script>";
                    return;
                }
                elseif($forgot == 4){
                    $mysqli->query("UPDATE user_pokemons SET atk4 = ".$teach.", pp4 = ".$ai['atac_pp']." WHERE id = ".$pok_id."");
                    $mysqli->query('DELETE FROM mypok_learn WHERE id = '.$iAtk['id']);
                    echo "<script>alert('Атака успешно изучена!'); window.location.href='game.php?fun=p_aa&TP_id=".$pok_id."';</script>";
                    return;
                }
                else{
                    echo "<script>alert('ошибка!'); window.location.href='game.php?fun=p_aa&TP_id=".$pok_id."';</script>";
                    return;
                }
            }
            else{
                echo "<script>alert('2!'); window.location.href='game.php?fun=p_aa&TP_id=".$pok_id."';</script>";
                return;
            }
        }
        else{
            echo "<script>alert('Ошибка! Вы заняты!'); window.location.href='game.php?fun=p_aa&TP_id=".$pok_id."';</script>";
            return;
        }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title>тренировка покемона</title>
    <meta http-equiv="content-type" content="text/html; charset=windows-1251">
    <meta name="author" content="serg">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h1>Тренировка: <u><?=$poks['name'];?></u></h1>
<table>
    <tr>
        <td>
            <p id='txt'><b>Здесь вы можете натренировать своего покемона новым атакам. Ваш покемон может знать не более четырех атак.</b>
                <form name='aa' action='game.php?fun=p_aa&TP_id=<?=$pok_id;?>' method='POST'>
                <TABLE width='100%'>
                    <TR valign='top'>
                        <TD ID='txt'>
                            <b>Выберите атаки, которым<br>хотите научить своего покемона:</b><br><font color='green'>
<?php 
$imove = $mysqli->query('SELECT * FROM mypok_learn WHERE pok = '.$pok_id);
while($im = $imove->fetch_assoc()){
    $aiM = $mysqli->query('SELECT * FROM base_attacks WHERE atac_id = '.$im['atk'])->fetch_assoc();
?>
                            <input name='a_teach' type='checkbox' class='checkbox' value='<?=$im['atk'];?>'> <a href=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$im['atk'];?>','at','width=500,height=230');><img src=img/question.gif alt=Инфо border=0></a> <?=$aiM['attac_name_eng'];?><br>
<?php } ?>
                        </td>
                        <td id='txt'>
                            <b>Выберите атаки, которые<br>покемон забудет после тренировки:<br>
                            <input name='a_forgot' value="1" type='checkbox' class='checkbox'> <a href=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$one['atac_id'];?>','at','width=500,height=230');><img src=img/question.gif alt=Инфо border=0></a> <?=$one['attac_name_eng'];?><br>
                            <input name='a_forgot' value="2" type='checkbox' class='checkbox'> <a href=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$two['atac_id'];?>','at','width=500,height=230');><img src=img/question.gif alt=Инфо border=0></a> <?=$two['attac_name_eng'];?><br>
                            <input name='a_forgot' value="3" type='checkbox' class='checkbox'> <a href=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$three['atac_id'];?>','at','width=500,height=230');><img src=img/question.gif alt=Инфо border=0></a> <?=$three['attac_name_eng'];?><br>
                            <input name='a_forgot' value="4" type='checkbox' class='checkbox'> <a href=javascript: onClick=win1=window.open('at_view.php?AttackID=<?=$four['atac_id'];?>','at','width=500,height=230');><img src=img/question.gif alt=Инфо border=0></a> <?=$four['attac_name_eng'];?><br>
                            <p><input type=submit value='Начать обучение!'></p>
                            <input name='fun' type='hidden' value='p_base'>
                            <input name='type' type='hidden' value='aa_teach'>
                            <input name='TP_id' type='hidden' value='<?=$pok_id;?>'>
                        </td>
                    </tr>
                </table>
                </form>
            </p>
        </td>
    </tr>
</table>
<?
}
?>