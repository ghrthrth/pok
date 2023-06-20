<?php
/* ~ Global Include ~ */
$patch_project = $_SERVER['DOCUMENT_ROOT'];
$patch_global = $patch_project.'/inc/conf/global.php';
if(!empty($patch_global)){
    if(!file_exists($patch_global)){
        die('The problem with the connection files.');
    }else{
		require_once($patch_global);
    }
}
if($_GET['route'] === 'exit'){
	unset($_SESSION['id']);
	unset($_SESSION['login']);
}
/* END ~ Global Include ~ */
if(isset($_SESSION['id'])){
	$autorize = true;
	$user = $mysqli->query("SELECT `login`,`user_group`,`rang` FROM `users` WHERE `id` = ".$_SESSION['id'])->fetch_assoc();
}else{
	$autorize = false;
}
$month = array(1=>'Январь',2=>'Февраль',3=>'Март',4=>'Апрель',5=>'Май',6=>'Июнь',7=>'Июль',8=>'Август',9=>'Сентябрь',10=>'Октябрь',11=>'Ноябрь',12=>'Декабрь');
$index = new Index($mysqli);
?>
<!DOCTYPE html>
<html>
    <head>
		<link rel="icon" type="image/png" href="/img/mainLogo.png">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="Keywords" content="<?=PAGE_KEY;?>">
        <meta name="Description" content="<?=PAGE_DESCRIPTION;?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<script src="/js/index.js?<?=microtime(true)?>" type="text/JavaScript"></script>
		<script src="/js/device.js" type="text/JavaScript"></script>
		<script>
			const DOMAIN = '<?=DOMAIN_HTTP;?>';
			init();
		</script>
		<script src="/js/jquery/jquery.js" type="text/JavaScript"></script>
		<script src="/js/jquery/notify.js?<?=microtime(true)?>" type="text/JavaScript"></script>
		<script>
		    
		</script>
		<link rel="stylesheet" href="/font-awesome/css/fontawesome-all.css?<?=microtime(true)?>">
		<link rel="stylesheet" href="/css/index.css?<?=microtime(true)?>">
		<title><?=PAGE_TITLE;?></title>
	</head>
	<body>
		<div class="header-gl">
			<!-- <div class="snow"></div> -->
			<div class="updates">
				<img src="/img/logo.png" style="width: 200px;"></img>
				<span>Charwild</span>
			</div>
			<div class="wrp">
				<span><?=$index->online;?> чел. онлайн</span>
				<div>
				<?if(!$autorize){?>
					<form onsubmit="sign();return false;" id="autorizeForm">
						<input type="text" id="uLogin" placeholder="Имя" required />
						<input type="password" id="uPass" placeholder="Пароль" required />
						<button>Войти</button>
				<?if(!$autorize){?><a href="?route=registration">Регистрация</a><?}?>
					</form>
				<?}else{?>
					<div id="divTrainer" class="trainer">
						<a id="aToGame" href="//<?=DOMAIN;?>/world">В игру</a>
						<a id="aToGame" href="//<?=DOMAIN;?>/?route=exit">Выход</a>
					</div>
				<?}?>
				</div>
			</div>
		</div>
		<div class="main-gl">
			<div class="newses">
				<div class="news"><div class="topcrystals"></div> <div class="topstars2"></div> <div class="toppot"></div>
					<?=$index->GetInfo();?>
					<div class="btn-news">
					<?
						$page = (isset($_GET['page']) ? ($_GET['page']) : 1);
						$nextPage = $page + 1;
						$prevPage = $page - 1;
					?>	
					<?php 
					if(!$_GET['route']){
					?>
						<a href="/?page=<?=$prevPage;?>" class="l">&lt;&lt; Ранее</a>
						<a href="/?page=<?=$nextPage;?>" class="r">Позднее &gt;&gt;</a>
					<?php } ?>
					</div>
				</div>
				<div class="sobit">
					<div class="name">Лучшие</div>
					<div class="tops">
						<div>
							<div class="name">PVP</div>
							<?=$index->userRatings['pvp'];?>
						</div>
						<div>
							<div class="name">Бестиарий</div>
							<?=$index->userRatings['pokedex'];?>
						</div>
						<div>
							<div class="name">Рейтинг</div>
							<?=$index->userRatings['shinedex'];?>
						</div>
					</div>
				</div>
				<div class="dop-block">

					<div class="tours">

						<div><b>События</b></div>
						<a href="https://vk.com/aquaworld_game" target="_blank" class="vk"><img src="/img/css/index/shop.png" style="width: 178px;"></a>
						
					</div>
					<div class="tours">

						<div><b><?=$month[12];?></b></div>
						
						<a target="_blank" href="">Альфа Тестирование</a>
					
					
					</div>
					
			
				</div>
			</div>
			<div class="footer">
				<div>
					<b>Charwild © 2018</b>
					<span>Все права на персонажей "Charwild" принадлежат <b>разработчикам</b>.</span>
				</div>
			</div>
		</div>
	</body>
</html>