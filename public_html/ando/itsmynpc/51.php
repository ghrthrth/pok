<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Агент Команды R';
if($npc == 51){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
$info = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '1'")->fetch_assoc();
if(isset($_POST['subm'])){
	
		function price_item($itm){
		if($itm == 312) { $prc = 20000; }else
		if($itm == 313) { $prc = 40000; }

		else{return 0;}
		return $prc;
	}
	    $cnt = substr_count($_POST['buy_list'], '|');
		$inf = explode("|",$_POST['buy_list']);
		$sell = 0;
		for ($x = 0; $x < $cnt; $x++) {

        $inf_id = explode(",",$inf[$x]);

        $sell_id    = $inf_id[0]; 
        $sell_count = $inf_id[1];

        $sell = $sell+$sell_count*price_item($sell_id);
          }
          if($info['count'] >= $sell and $sell !== 0){
        for ($i = 0; $i < $cnt; $i++) {
        $inf_id = explode(",",$inf[$i]);
        $sell_id =    $inf_id[0]; 
        $sell_count = $inf_id[1];
        plus_item($sell_count,$sell_id,$user_id);
       }
            minus_item($sell,1,$user_id);
			$textNPC = 'Удачной охоты!';
        }else{
			$textNPC = 'Недостаточно денег!';
        }
}else
if(empty($answer)){
$textNPC = 'Кто ко мне пожаловал?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Привет, я тренер покемонов, а что вы тут делаете?</a></li><br>';
}else
if($answer == 1){
$textNPC = 'Хм...тренер говоришь, а скажи мне, ты когда-нибудь хотел напасть на зарвавшегося покемастера и как следует проучить его? Без всяких соплей и отказов от боя!';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Возможно вы и правы</a></li>';	
}else
if($answer == 2){
$textNPC = 'Конечно я прав! Ты ещё и сомневаешься! Так вот, я могу представить тебе такую возможность! За небольшую сумму я даю тебе возможность напасть на любого тренера. Приобрети специальный Ордер Команды Р и покажи всем из чего ты сделан! Один Ордер предоставляет возможность нападения на одного тренера. Ордер 1 уровня позволяет нападать на тренеров с рангом выше Начинающего и репутацией не ниже 30% от твоей. Ордер 2 уровня позволит нападать на тренеров без внимания к их репутации. Однако, учти, что в городах нападения недопустимы, т.к. привлекут внимание местных стражей порядка. Не забывай, что если ты будешь совершать много нападений, то тебя объявят преступником и любой тренер сможет совершить нападение на тебя в безопасных локациях. Ты должен обладать превосходной командой, чтобы отражать нападения.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Сколько стоит?</a></li>';	
}else
if($answer == 3){
$baseloc['name'] = false;
$nameNPC = false;
?>
<html>
	<head>
		<link rel='Stylesheet' type='text/css' href='style.css' />
		<script>
		   items = new Array();
		 my_money=<?=$info['count'];?>;
items[1] = new Array(5);
items[1][0]=1;
items[1][1]=312;
items[1][2]='Ордер Команды Р, 1 уровень';
items[1][3]=20000;
items[1][4]=-1;
items[1][5] = new Image(32,32);
items[1][5].src='img/items/312.gif';
items[2] = new Array(5);
items[2][0]=1;
items[2][1]=313;
items[2][2]='Ордер Команды Р, 2 уровень';
items[2][3]=40000;
items[2][4]=-1;
items[2][5] = new Image(32,32);
items[2][5].src='img/items/313.gif';

		sell_items_amount=2;currency_txt=' кр.';   buys = new Array(sell_items_amount);
		   for (i=1; i<=sell_items_amount; i++) buys[i]=0;

		   function load_sell_list() {
			 tmp='<TABLE border=0 cellspacing=1 cellpadding=1><TR><TD width="35"></TD><TD width="35"></TD><TD width="200"></TD><TD></TD></TR>';
			 for (i=1; i<=sell_items_amount; i++) {
			   tmp=tmp+'<TR><TD>'+i+'.</TD><TD class=bottom_dot><img onclick="pic.src=this.src; document.buy.sellID.value=\''+i+'\'; itname.innerHTML=\''+items[i][2]+'\'" style="CURSOR:POINTER" width=32 height=32 border=0></TD><TD class=bottom_dot>'+items[i][2]+'</TD><TD align=right width=150 class=bottom_dot>'+formatnum(items[i][3])+currency_txt+'</TD></TR>';
			 }
			 tmp=tmp+'</TABLE>';
			 sell_list.innerHTML=tmp;
			 for (i=0; i<sell_items_amount; i++) {
			   document.images[i].src = items[i+1][5].src;
			 }
		   }

		   function load_buy_list() {
			 tmp='<TABLE width=100% border=0 cellspacing=0 cellpadding=1><TR><TD></TD><TD width=150></TD><TD></TD></TR>';
			 total_cost=0;
			 for (i=1; i<=sell_items_amount; i++) {
			   if (buys[i]>0 && items[i][4]!=-1 && buys[i]>items[i][4]) buys[i]=items[i][4];
			   if (buys[i]>0) {
				 cost=buys[i]*items[i][3];
				 total_cost=total_cost+cost;
				 tmp=tmp+'<TR><TD class=bottom_dot><img onclick="buys['+i+']=0; load_buy_list();" style="CURSOR:POINTER" width=32 height=32 border=0></TD><TD class=bottom_dot>'+items[i][2]+' x'+buys[i]+'</TD><TD align=right width=150 class=bottom_dot>'+formatnum(cost)+currency_txt+'</TD></TR>';
			   }
			 }
			 tmp=tmp+'<TR><TD COLSPAN=3 align=right><HR><b>'+formatnum(total_cost)+currency_txt+'</b></TD></TR></TABLE>';
			 buy_list.innerHTML=tmp;
			 t=0;
			 for (i=1; i<=sell_items_amount; i++) {
			   if (buys[i]>0) {
				 t++;
				 document.images[sell_items_amount+t].src = items[i][5].src;
			   }
			 }
			 if (total_cost>my_money) FormBuy.subm.disabled=true; else FormBuy.subm.disabled=false;
		   }

		   function SUBMIT_BUY() {
			 FormBuy.buy_list.value="";
			 for (i=1; i<=sell_items_amount; i++) {
			   if (buys[i]>0) FormBuy.buy_list.value=FormBuy.buy_list.value+items[i][1]+","+buys[i]+"|";
			 }
			 FormBuy.submit;
		   }

		 function formatnum(str) {
			str = str + '';
			var retstr = '';
			var now = 0;
			for (j = str.length-1; j>=0; j--) {
				if (now < 3)	{
					now++;
					retstr = str.charAt(j) + retstr;
				} else {
					now = 1;
					retstr = str.charAt(j) + '.' + retstr;
				}
			}
			return retstr;
		 }
		</script>
	</head>
	<body id='tab' onload="load_sell_list();">
<span id='txt'>
<h1>Клан-мастер</h1>
<div><big><b>Ваш баланс: <?=price($info['count']);?> кр.</b></big></div><TABLE border='0'><TR valign='top'><TD width='300'>
  <div id='sell_list'>&nbsp;</div>
</TD><TD align='center' width='200'>
<form name="buy" action="#" method="post" target="_work">
<input name="sellID" type="hidden" value="0">
<img src="/img/items/blank.gif" width="32" height="32" border=0 name="pic" ID="pic">
<div id="itname">&nbsp;</div>
<BR><input name="amount" type="text" value="1" maxlength="7" onClick="this.select()" style="width:70; text-align:center"><BR>
<input type="button" value=">>" style="width:70" onclick="buys[document.buy.sellID.value]=buys[document.buy.sellID.value]*1+Math.round(document.buy.amount.value*1); load_buy_list();">
</form>
</TD><TD width='300'>
  <div ID='buy_list'>

  </div>
  <P>
  <div align="right">
  <form name='FormBuy' action='game.php?fun=m_npc&npc_id=51&answ_id=1' method='post'>
  <input name="buy_list" type="hidden" value="">
  <input type='submit' value='КУПИТЬ' onclick="SUBMIT_BUY();" name="subm"> 
  <input type='button' value='ОТМЕНА' onclick="window.location='game.php?fun=m_location&map=1';">
  </form>
  </div>
</TD>
</TR>
</TABLE>
</body>
</html>
<?php
}