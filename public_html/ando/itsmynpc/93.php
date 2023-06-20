<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Продавец';
$baseloc['name'] = false;
if($npc == 93 && empty($answer)){
$info = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '1'")->fetch_assoc();
?>
<html>
	<head>
		<link rel='Stylesheet' type='text/css' href='style.css' />
 <script>
   items = new Array();
 my_money=<?=$info['count'];?>;
items[1] = new Array(5);
items[1][0]=1;
items[1][1]=38;
items[1][2]='Стимулятор';
items[1][3]=150;
items[1][4]=-1;
items[1][5] = new Image(32,32);
items[1][5].src='img/items/38.gif';
items[2] = new Array(5);
items[2][0]=2;
items[2][1]=50;
items[2][2]='Улучшенный стимулятор';
items[2][3]=500;
items[2][4]=-1;
items[2][5] = new Image(32,32);
items[2][5].src='img/items/50.gif';
items[3] = new Array(5);
items[3][0]=5;
items[3][1]=51;
items[3][2]='Суперстимулятор';
items[3][3]=900;
items[3][4]=-1;
items[3][5] = new Image(32,32);
items[3][5].src='img/items/51.gif';
items[4] = new Array(5);
items[4][0]=6;
items[4][1]=29;
items[4][2]='Стимпак';
items[4][3]=4000;
items[4][4]=-1;
items[4][5] = new Image(32,32);
items[4][5].src='img/items/29.gif';
items[5] = new Array(5);
items[5][0]=7;
items[5][1]=3;
items[5][2]='Антидот';
items[5][3]=1000;
items[5][4]=-1;
items[5][5] = new Image(32,32);
items[5][5].src='img/items/3.gif';
items[6] = new Array(5);
items[6][0]=8;
items[6][1]=4;
items[6][2]='Энергетик';
items[6][3]=1000;
items[6][4]=-1;
items[6][5] = new Image(32,32);
items[6][5].src='img/items/4.gif';
items[7] = new Array(5);
items[7][0]=9;
items[7][1]=9;
items[7][2]='Огнетушитель';
items[7][3]=1000;
items[7][4]=-1;
items[7][5] = new Image(32,32);
items[7][5].src='img/items/9.gif';
items[8] = new Array(5);
items[8][0]=10;
items[8][1]=13;
items[8][2]='Анти-Спутин';
items[8][3]=1000;
items[8][4]=-1;
items[8][5] = new Image(32,32);
items[8][5].src='img/items/13.gif';
items[9] = new Array(5);
items[9][0]=11;
items[9][1]=36;
items[9][2]='Антипарализ';
items[9][3]=1000;
items[9][4]=-1;
items[9][5] = new Image(32,32);
items[9][5].src='img/items/36.gif';
items[10] = new Array(5);
items[10][0]=12;
items[10][1]=15;
items[10][2]='Слабый эликсир';
items[10][3]=400;
items[10][4]=-1;
items[10][5] = new Image(32,32);
items[10][5].src='img/items/15.gif';
items[11] = new Array(5);
items[11][0]=13;
items[11][1]=16;
items[11][2]='Эликсир';
items[11][3]=650;
items[11][4]=-1;
items[11][5] = new Image(32,32);
items[11][5].src='img/items/16.gif';
items[12] = new Array(5);
items[12][0]=14;
items[12][1]=17;
items[12][2]='Мощный эликсир';
items[12][3]=1500;
items[12][4]=-1;
items[12][5] = new Image(32,32);
items[12][5].src='img/items/17.gif';
items[13] = new Array(5);
items[13][0]=18;
items[13][1]=60;
items[13][2]='Покебол';
items[13][3]=50;
items[13][4]=-1;
items[13][5] = new Image(32,32);
items[13][5].src='img/items/60.gif';
items[14] = new Array(5);
items[14][0]=19;
items[14][1]=61;
items[14][2]='Гритбол';
items[14][3]=500;
items[14][4]=-1;
items[14][5] = new Image(32,32);
items[14][5].src='img/items/61.gif';
items[15] = new Array(5);
items[15][0]=20;
items[15][1]=63;
items[15][2]='Ультрабол';
items[15][3]=900;
items[15][4]=-1;
items[15][5] = new Image(32,32);
items[15][5].src='img/items/63.gif';
items[16] = new Array(5);
items[16][0]=21;
items[16][1]=64;
items[16][2]='Дайвбол';
items[16][3]=300;
items[16][4]=-1;
items[16][5] = new Image(32,32);
items[16][5].src='img/items/64.gif';
items[17] = new Array(5);
items[17][0]=22;
items[17][1]=65;
items[17][2]='Фастбол';
items[17][3]=400;
items[17][4]=-1;
items[17][5] = new Image(32,32);
items[17][5].src='img/items/65.gif';
items[18] = new Array(5);
items[18][0]=23;
items[18][1]=66;
items[18][2]='Френдбол';
items[18][3]=600;
items[18][4]=-1;
items[18][5] = new Image(32,32);
items[18][5].src='img/items/66.gif';
items[19] = new Array(5);
items[19][0]=24;
items[19][1]=67;
items[19][2]='Левелбол';
items[19][3]=150;
items[19][4]=-1;
items[19][5] = new Image(32,32);
items[19][5].src='img/items/67.gif';
items[20] = new Array(5);
items[20][0]=25;
items[20][1]=68;
items[20][2]='Лавбол';
items[20][3]=300;
items[20][4]=-1;
items[20][5] = new Image(32,32);
items[20][5].src='img/items/68.gif';
items[21] = new Array(5);
items[21][0]=26;
items[21][1]=69;
items[21][2]='Лурбол';
items[21][3]=250;
items[21][4]=-1;
items[21][5] = new Image(32,32);
items[21][5].src='img/items/69.gif';
items[22] = new Array(5);
items[22][0]=57;
items[22][1]=168;
items[22][2]='Канатная веревка';
items[22][3]=400000;
items[22][4]=-1;
items[22][5] = new Image(32,32);
items[22][5].src='img/items/168.gif';



sell_items_amount=22;currency_txt=' кр.';   buys = new Array(sell_items_amount);
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
     FormBuy.buy_list.value= "";
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
</HEAD><BODY ID=tab onload="load_sell_list();">
<span id=txt>
<h1>Покемаркет</h1>
<div><big><b>Ваш баланс: <?=price($info['count']);?> кр.</b></big></div><TABLE border=0><TR valign=top><TD width=300>
  <div ID=sell_list>&nbsp;</div>
</TD><TD align=center width=200>
<form name="buy" action="#" method="post" target="_work">
<input name="sellID" type="hidden" value="0">
<img src="/img/items/blank.gif" width="32" height="32" border=0 name="pic" ID="pic">
<div id="itname">&nbsp;</div>
<BR><input name="amount" type="text" value="1" maxlength="7" onClick="this.select()" style="width:70; text-align:center"><BR>
<input type="button" value=">>" style="width:70" onclick="buys[document.buy.sellID.value]=buys[document.buy.sellID.value]*1+Math.round(document.buy.amount.value*1); load_buy_list();">
</form>
</TD><TD width=300>
  <div ID=buy_list>

  </div>
  <P>
  <div align="right">
  <form name=FormBuy action=game.php?fun=m_npc&npc_id=93&answ_id=1 method=post>
  <input name="buy_list" type="hidden" value="">
  <input type=submit value=КУПИТЬ onclick="SUBMIT_BUY();" name="subm"> 
  <input type=button value=ОТМЕНА onclick="window.location='game.php?fun=m_location&map=1';">
  </form>
  </div>
</TD>
</TR>
</TABLE>
</body>
</html>
<?php 	}else{
	$info = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '1'")->fetch_assoc();
	function price_item($itm){
		if($itm == 38) { $prc = 150; }else
		if($itm == 50) { $prc = 500; }else
		if($itm == 51) { $prc = 900; }else
		if($itm == 29) { $prc = 4000; }else
		if($itm == 3) { $prc = 1000; }else
		if($itm == 4) { $prc = 1000; }else
		if($itm == 9) { $prc = 1000; }else
		if($itm == 13) { $prc = 1000; }else
		if($itm == 36) { $prc = 1000; }else
		if($itm == 15) { $prc = 400; }else
		if($itm == 16) { $prc = 650; }else
		if($itm == 17) { $prc = 1500; }else
		if($itm == 60) { $prc = 50; }else
		if($itm == 61) { $prc = 500; }else
		if($itm == 63) { $prc = 900; }else
		if($itm == 64) { $prc = 300; }else
		if($itm == 65) { $prc = 400; }else
		if($itm == 66) { $prc = 600; }else
		if($itm == 67) { $prc = 150; }else
		if($itm == 68) { $prc = 300; }else
        if($itm == 69) { $prc = 250; }else
		if($itm == 168) { $prc = 400000; }else{
        return 0;
		}
		return $prc;
	}
	
      $cnt = substr_count(escapeMe($_POST['buy_list']), '|');
    $inf = explode("|",escapeMe($_POST['buy_list']));
    $sell = 0;
    for ($x = 0; $x < $cnt; $x++) {

        $inf_id = explode(",",$inf[$x]);

        $sell_id =    $inf_id[0]; 
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
         echo "Предметы успешно куплены!";
          }else{
          	echo "Не хватает денег!";
          } 
}
?>