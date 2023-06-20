<?php 
// 9.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'АлаБалаНица';
$poks_res = $mysqli->query('SELECT count(*) FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' and basenum=129');
$poks = mysqli_fetch_array($poks_res);

if($npc == 3000 && empty($answer)){
	$textNPC = 'Рад приветствовать вас в Восточном Джото! Я, Дональд Ричи, очень богатый и очень уважаемый человек! Разумеется, очень занятой… Но у меня есть для тебя несколько поручений. Подойди ко мне и возьми-ка этот список ...';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3000&answ_id=1&map=1">1.	Как я могу отказать такому уважаемому человеку  *вы забираете список у Ричи*</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3000&answ_id=2&map=1">2.	Простите, но у меня своих дел очень много. Найдите другого тренера, который сможет вам помочь.</a></li>';
}elseif($npc == 3000 && $answer == 1){
	$textNPC = 'А ты деловой парень!  Выполнишь - получишь вознаграждение. Но ждать вечность я тоже не собираюсь: у тебя максимум 24 часа, так что не теряй ни минуты! Время-это деньги
И да. Если для тебя эти задания сложные, ты скажи мне об этом сразу -2 часа тебе для определения будет достаточно, я так думаю. Мы оба заинтересованы в том, чтобы не тратить время друг друга.  Я жду тебя с хорошими вестями!
';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3000&answ_id=11&map=1">Поехали...</a></li>';
}elseif($npc == 3000 && $answer == 11){
	$textNPC = 'Поймай мне 6 мальчиков #129 Magikarp';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3000&answ_id=111&map=1">Я сделал все задания из списка </a></li>';
$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3000&answ_id=110&map=1">Ваши задания слишком сложные, я воспользуюсь вашим предложением и откажусь от них </a></li>';
}elseif($npc == 3000 && $answer == 2){
	$textNPC = 'Какая нынче молодёжь. Никому нельзя доверять. Лучше сделать все самому. Этим и займусь. А ты, пока не беспокой меня ближайшие 24 часа!';
}elseif($npc == 3000 && $answer == 110){
    $textNPC = 'ты уверен?';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3000&answ_id=1111&map=1">ДА </a></li>';
    $moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id=3000&answ_id=1110&map=1">НЕТ </a></li>';
}elseif($npc == 3000 && $answer == 1110){
    $textNPC = 'Не отвлекай меня по пустякам, займись делом.)';
}elseif($npc == 3000 && $answer == 1111){
    $textNPC = 'Ничего нового…Никому нельзя доверять. Лучше сделать все самому. Этим и займусь. А ты, пока не беспокой меня ближайшие 24 часа!';
    // Delete quest...
}elseif($npc == 3000 && $answer == 111){
    if ($poks[0] > 0)
    {
        $textNPC = 'Поздравляю...';
        $textNPC .= $poks[0];
        $mysqli->query('delete FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' and basenum=129');
    } else {
        $textNPC = 'Ты меня обманываеш...';
        $textNPC .= '++'.$poks[0].'++';
    }
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?>

