<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Интендант';
$baseloc['name'] = false;
if($npc == 151 && empty($answer)){
$info = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '437'")->fetch_assoc();
?>
<html>
	<head>
		<link rel='Stylesheet' type='text/css' href='style.css' />
 <script>
   items = new Array();
 my_money=9720731;
items[1] = new Array(5);
items[1][0]=1;
items[1][1]=1024;
items[1][2]='TM 34 - Shock Wave';
items[1][3]=200;
items[1][4]=-1;
items[1][5] = new Image(32,32);
items[1][5].src='img/items/1019.gif';
items[2] = new Array(5);
items[2][0]=2;
items[2][1]=1011;
items[2][2]='TM 06 - Toxic';
items[2][3]=300;
items[2][4]=-1;
items[2][5] = new Image(32,32);
items[2][5].src='img/items/1011.gif';
items[3] = new Array(5);
items[3][0]=5;
items[3][1]=1012;
items[3][2]='TM 12 - Taunt';
items[3][3]=125;
items[3][4]=-1;
items[3][5] = new Image(32,32);
items[3][5].src='img/items/1012.gif';
items[4] = new Array(5);
items[4][0]=6;
items[4][1]=1005;
items[4][2]='TM 14 - Blizzard';
items[4][3]=150;
items[4][4]=-1;
items[4][5] = new Image(32,32);
items[4][5].src='img/items/1005.gif';
items[5] = new Array(5);
items[5][0]=7;
items[5][1]=1037;
items[5][2]='TM 38 - Fire Blast';
items[5][3]=200;
items[5][4]=-1;
items[5][5] = new Image(32,32);
items[5][5].src='img/items/1037.gif';
items[6] = new Array(5);
items[6][0]=8;
items[6][1]=1004;
items[6][2]='TM 25 - Thunder';
items[6][3]=200;
items[6][4]=-1;
items[6][5] = new Image(32,32);
items[6][5].src='img/items/1004.gif';
items[7] = new Array(5);
items[7][0]=9;
items[7][1]=1019;
items[7][2]='TM 26 - Earthquake';
items[7][3]=300;
items[7][4]=-1;
items[7][5] = new Image(32,32);
items[7][5].src='img/items/1019.gif';
items[8] = new Array(5);
items[8][0]=10;
items[8][1]=1015;
items[8][2]='TM 31 - Brick Break';
items[8][3]=150;
items[8][4]=-1;
items[8][5] = new Image(32,32);
items[8][5].src='img/items/1015.gif';
items[9] = new Array(5);
items[9][0]=11;
items[9][1]=1036;
items[9][2]='TM 13 - Ice Beam';
items[9][3]=250;
items[9][4]=-1;
items[9][5] = new Image(32,32);
items[9][5].src='img/items/1003.gif';
items[10] = new Array(5);
items[10][0]=12;
items[10][1]=1000;
items[10][2]='TM 15 - Hyper Beam';
items[10][3]=100;
items[10][4]=-1;
items[10][5] = new Image(32,32);
items[10][5].src='img/items/1003.gif';
items[11] = new Array(5);
items[11][0]=13;
items[11][1]=1001;
items[11][2]='TM 39 - Rock Tomb';
items[11][3]=30;
items[11][4]=-1;
items[11][5] = new Image(32,32);
items[11][5].src='img/items/1011.gif';
items[12] = new Array(5);
items[12][0]=14;
items[12][1]=1002;
items[12][2]='TM 30 - Shadow Ball';
items[12][3]=150;
items[12][4]=-1;
items[12][5] = new Image(32,32);
items[12][5].src='img/items/1012.gif';
items[13] = new Array(5);
items[13][0]=15;
items[13][1]=1006;
items[13][2]='TM 35 - Flamethrower';
items[13][3]=300;
items[13][4]=-1;
items[13][5] = new Image(32,32);
items[13][5].src='img/items/1005.gif';
items[14] = new Array(5);
items[14][0]=16;
items[14][1]=1007;
items[14][2]='TM 36 - Sludge Bomb';
items[14][3]=150;
items[14][4]=-1;
items[14][5] = new Image(32,32);
items[14][5].src='img/items/1025.gif';
items[15] = new Array(5);
items[15][0]=17;
items[15][1]=1008;
items[15][2]='TM 23 - Iron Tail';
items[15][3]=150;
items[15][4]=-1;
items[15][5] = new Image(32,32);
items[15][5].src='img/items/1004.gif';
items[16] = new Array(5);
items[16][0]=18;
items[16][1]=1025;
items[16][2]='TM 19 - Giga Drain';
items[16][3]=150;
items[16][4]=-1;
items[16][5] = new Image(32,32);
items[16][5].src='img/items/1015.gif';
items[17] = new Array(5);
items[17][0]=19;
items[17][1]=1050;
items[17][2]='TM 24 - Thunderbolt';
items[17][3]=250;
items[17][4]=-1;
items[17][5] = new Image(32,32);
items[17][5].src='img/items/1003.gif';
items[18] = new Array(5);
items[18][0]=20;
items[18][1]=1038;
items[18][2]='TM 55 - Scald';
items[18][3]=350;
items[18][4]=-1;
items[18][5] = new Image(32,32);
items[18][5].src='img/items/1003.gif';
items[19] = new Array(5);
items[19][0]=21;
items[19][1]=1028;
items[19][2]='TM 62  - Acrobatics';
items[19][3]=200;
items[19][4]=-1;
items[19][5] = new Image(32,32);
items[19][5].src='img/items/1003.gif';
items[20] = new Array(5);
items[20][0]=22;
items[20][1]=1018;
items[20][2]='TM 17 - Protect';
items[20][3]=50;
items[20][4]=-1;
items[20][5] = new Image(32,32);
items[20][5].src='img/items/1011.gif';
items[21] = new Array(5);
items[21][0]=23;
items[21][1]=1016;
items[21][2]='TM 43 - Secret Power';
items[21][3]=150;
items[21][4]=-1;
items[21][5] = new Image(32,32);
items[21][5].src='img/items/1012.gif';
items[22] = new Array(5);
items[22][0]=24;
items[22][1]=1020;
items[22][2]='TM 29 - Psychic';
items[22][3]=250;
items[22][4]=-1;
items[22][5] = new Image(32,32);
items[22][5].src='img/items/1005.gif';
items[23] = new Array(5);
items[23][0]=25;
items[23][1]=1022;
items[23][2]='TM 47 - Steel Wing';
items[23][3]=125;
items[23][4]=-1;
items[23][5] = new Image(32,32);
items[23][5].src='img/items/1025.gif';
items[24] = new Array(5);
items[24][0]=26;
items[24][1]=1023;
items[24][2]='TM 40 - Aerial Ace';
items[24][3]=150;
items[24][4]=-1;
items[24][5] = new Image(32,32);
items[24][5].src='img/items/1004.gif';
items[25] = new Array(5);
items[25][0]=27;
items[25][1]=330;
items[25][2]='Набор тренировки';
items[25][3]=7;
items[25][4]=-1;
items[25][5] = new Image(32,32);
items[25][5].src='img/items/330.gif';
items[26] = new Array(5);
items[26][0]=28;
items[26][1]=1026;
items[26][2]='Набор ослабления';
items[26][3]=7;
items[26][4]=-1;
items[26][5] = new Image(32,32);
items[26][5].src='img/items/1026.gif';
items[27] = new Array(5);
items[27][0]=29;
items[27][1]=179;
items[27][2]='Сладкая ягода';
items[27][3]=7;
items[27][4]=-1;
items[27][5] = new Image(32,32);
items[27][5].src='img/items/179.gif';
items[28] = new Array(5);
items[28][0]=30;
items[28][1]=1053;
items[28][2]='Случайная карта';
items[28][3]=2;
items[28][4]=-1;
items[28][5] = new Image(32,32);
items[28][5].src='img/items/1053.gif';




sell_items_amount=27;currency_txt=' сц.';   buys = new Array(sell_items_amount);
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
</HEAD><BODY ID=tab onload="load_sell_list();">
<span id=txt>
<h1>Покемаркет</h1>
<div><big><b>Ваш баланс: <?=price($info['count']);?> Самоцветов</b></big></div><TABLE border=0><TR valign=top><TD width=300>
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
  <form name=FormBuy action=game.php?fun=m_npc&npc_id=151&answ_id=1 method=post>
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
<HTML>
<head>
<meta HTTP-EQUIV='Content-Type' CONTENT='text/html;Charset=Windows-1251'>
<link REL='Stylesheet' HREF="/style.css" TYPE='text/css'>
  <script language=JavaScript>
document.oncontextmenu=new Function("return false;")
</script>
</head>
<body ID='tab'>
<span id='txt'>
<h1></h1><SPAN ID='txt'>
</html>
<?php    }else{
  $info = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '437'")->fetch_assoc();
 /*
items[1][3]=200;
items[2][3]=300;
items[3][3]=200;
items[4][3]=200;
items[5][3]=200;
items[6][3]=250;
items[7][3]=250;
items[8][3]=200;
items[9][3]=250;
items[10][3]=150;
items[11][3]=200;
items[12][3]=200;
items[13][3]=250;
items[14][3]=200;
items[15][3]=200;
items[16][3]=300;
items[17][3]=400;
items[18][3]=300;
items[19][3]=200;
items[20][3]=200;
items[21][3]=200;
items[22][3]=250;
items[23][3]=200;
items[24][3]=200;
items[25][3]=200;
items[26][3]=200;
items[27][3]=250;*/
    function price_item($itm) { //цены
             if ($itm == 1024) { $prc = 150; }  //1
        else if ($itm == 1011) { $prc = 300; }  //2
        else if ($itm == 1012) { $prc = 125; }  //3
        else if ($itm == 1005) { $prc = 150; }  //4
        else if ($itm == 1025) { $prc = 150; }  //5
        else if ($itm == 1004) { $prc = 200; }  //6
        else if ($itm == 1019) { $prc = 300; }  //7
        else if ($itm == 1015) { $prc = 150; }  //8
        else if ($itm == 1036) { $prc = 250; }  //9
        else if ($itm == 1000) { $prc = 100; }  //10
        else if ($itm == 1001) { $prc = 30; }  //11
        else if ($itm == 1002) { $prc = 150; }  //12
        else if ($itm == 1006) { $prc = 300; }  //13
        else if ($itm == 1007) { $prc = 150; }  //14
        else if ($itm == 1008) { $prc = 150; }  //15
        else if ($itm == 1025) { $prc = 150; }  //16
        else if ($itm == 1050) { $prc = 250; }  //17
        else if ($itm == 1038) { $prc = 350; }  //18
        else if ($itm == 1028) { $prc = 150; }  //19
        else if ($itm == 1018) { $prc = 30; }  //20
        else if ($itm == 1016) { $prc = 150; }  //21
        else if ($itm == 1020) { $prc = 250; }  //22
        else if ($itm == 1022) { $prc = 125; }  //23
        else if ($itm == 1023) { $prc = 150; }  //24
        else if ($itm == 330) { $prc = 7; }  //25
        else if ($itm == 1026) { $prc = 7; }  //26
        else if ($itm == 179) { $prc = 7; }  //27
        else if ($itm == 1053) { $prc = 2; }  //28
        else { return 0; }
    return $prc;
  }
      $cnt = substr_count($_POST['buy_list'], '|');
    $inf = explode("|",$_POST['buy_list']);
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
         minus_item($sell,437,$user_id);
         echo "Предметы успешно куплены!";
          }else{
            echo "Не хватает денег!";
          } 
}
?>