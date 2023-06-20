<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Кондитер Марта';

if($npc == 206 && empty($answer) && item_isset(445, 1)){
		$textNPC = 'Здравстуйте, я надеюсь вы здесь затем чтобы отдать ваши вкусные Кусочки Тортика?</b>';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Конечно!</a></li>';
	}elseif($answer == 1 && item_isset(445, 1)){
        $all_count = 0;
		$snow = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = '445'")->fetch_assoc();
		if($snow){
		$all_count = $all_count + $snow['count'];
		if($all_count <= 19){ // так же не уверен что строчки 63-67 в нужном месте 
				$randomaward = rand(1,1);// в этой части правильно?
				$money = $all_count * 20000;
				if($randomaward == 1){
				$textNPC = 'За вклад внесенный в выбивание Кусочков Тортика вы получаете: '.$money.' Кр. , Ванильные конфеты х10 и Даркболл х5.'; //допишу как будет нпс работать
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">До свидания!</a></li>';
		    minus_item($all_count,445); // 
			plus_item($money,1); //Кредиты
			plus_item(10,309);// Ванильные конфеты
			plus_item(5,72); // Дарки
				}
		}else{ 
				$textNPC = 'Тебе не хватает Кусочков Тортика!';
			}	
		}
			
	 }else{
     $textNPC = '  '.$img.'  Тебе не хватает Кусочков Тортика!';		
	 }
?> 