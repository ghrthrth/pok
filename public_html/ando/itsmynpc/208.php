<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Лавка Мику';
$baseloc['name'] = false;
if($npc == 208 && empty($answer)){
$info = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '446'")->fetch_assoc();
?>
<html>
  <head>
    <link rel='Stylesheet' type='text/css' href='style.css' />
 <script>
   items = new Array();
 my_money=9720731;
items[1] = new Array(5);                     //тут не трогаешь                
items[1][0]=1;                               // тут лучше по порядку ставить цифры
items[1][1]=1108;                             // ID предмета
items[1][2]='TM 96 - Psyshock';  //Название предмета. Совпадает ли оно с БД не важно, как здесь напишешь так и будет
items[1][3]=150;                   //Цена
items[1][4]=-1;                  // Доступное количество. -1 это бесконечные.
items[1][5] = new Image(32,32);  // Размер картинки
items[1][5].src='img/items/1108.gif';  //Здесь пиши ID предмета. Так будет показан его картинка.
items[2] = new Array(5);
items[2][0]=2;
items[2][1]=1105;
items[2][2]='TM 104 - Waterfall';
items[2][3]=150;
items[2][4]=-1;
items[2][5] = new Image(32,32);
items[2][5].src='img/items/1105.gif';
items[3] = new Array(5);
items[3][0]=5;
items[3][1]=1115;
items[3][2]='TM 108 - Rock Slide';
items[3][3]=150;
items[3][4]=-1;
items[3][5] = new Image(32,32);
items[3][5].src='img/items/1115.gif';
items[4] = new Array(5);
items[4][0]=6;
items[4][1]=1037;
items[4][2]='TM 38 - Fire Blast';
items[4][3]=150;
items[4][4]=-1;
items[4][5] = new Image(32,32);
items[4][5].src='img/items/1037.gif';
items[5] = new Array(5);
items[5][0]=7;
items[5][1]=1007;
items[5][2]='TM 36 - Sludge Bomb';
items[5][3]=150;
items[5][4]=-1;
items[5][5] = new Image(32,32);
items[5][5].src='img/items/1007.gif';
items[6] = new Array(5);
items[6][0]=8;
items[6][1]=251;
items[6][2]='Овальный камень';
items[6][3]=100;
items[6][4]=-1;
items[6][5] = new Image(32,32);
items[6][5].src='img/items/251.gif';
items[7] = new Array(5);
items[7][0]=9;
items[7][1]=253;
items[7][2]='Камень Рассвета';
items[7][3]=100;
items[7][4]=-1;
items[7][5] = new Image(32,32);
items[7][5].src='img/items/253.gif';
items[8] = new Array(5);
items[8][0]=10;
items[8][1]=246;
items[8][2]='Сияющий камень';
items[8][3]=100;
items[8][4]=-1;
items[8][5] = new Image(32,32);
items[8][5].src='img/items/246.gif';
items[9] = new Array(5);
items[9][0]=11;
items[9][1]=247;
items[9][2]='Камень сумрака';
items[9][3]=100;
items[9][4]=-1;
items[9][5] = new Image(32,32);
items[9][5].src='img/items/247.gif';
items[10] = new Array(5);
items[10][0]=12;
items[10][1]=232;
items[10][2]='Сфера Ярости';
items[10][3]=100;
items[10][4]=-1;
items[10][5] = new Image(32,32);
items[10][5].src='img/items/232.gif';
items[11] = new Array(5);
items[11][0]=13;
items[11][1]=43;
items[11][2]='Линзы';
items[11][3]=100;
items[11][4]=-1;
items[11][5] = new Image(32,32);
items[11][5].src='img/items/43.gif';
items[12] = new Array(5);
items[12][0]=14;
items[12][1]=26;
items[12][2]='Объедки';
items[12][3]=100;
items[12][4]=-1;
items[12][5] = new Image(32,32);
items[12][5].src='img/items/26.gif';
items[13] = new Array(5);
items[13][0]=15;
items[13][1]=45;
items[13][2]='Белый колокольчик';
items[13][3]=100;
items[13][4]=-1;
items[13][5] = new Image(32,32);
items[13][5].src='img/items/45.gif';
items[14] = new Array(5);
items[14][0]=16;
items[14][1]=330;
items[14][2]='Набор Тренировки';
items[14][3]=5;
items[14][4]=-1;
items[14][5] = new Image(32,32);
items[14][5].src='img/items/330.gif';
items[15] = new Array(5);
items[15][0]=17;
items[15][1]=72;
items[15][2]='Даркболл';
items[15][3]=5;
items[15][4]=-1;
items[15][5] = new Image(32,32);
items[15][5].src='img/items/72.gif';
items[16] = new Array(5);
items[16][0]=18;
items[16][1]=62;
items[16][2]='Мастербол';
items[16][3]=5;
items[16][4]=-1;
items[16][5] = new Image(32,32);
items[16][5].src='img/items/62.gif';
items[17] = new Array(5);
items[17][0]=19;
items[17][1]=309;
items[17][2]='Ванильная конфета';
items[17][3]=1;
items[17][4]=-1;
items[17][5] = new Image(32,32);
items[17][5].src='img/items/309.gif';
items[18] = new Array(5);
items[18][0]=20;
items[18][1]=448;
items[18][2]='Кулич';
items[18][3]=100;
items[18][4]=-1;
items[18][5] = new Image(32,32);
items[18][5].src='img/items/448.gif';




sell_items_amount=18;currency_txt=' пспш.';   buys = new Array(sell_items_amount);
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
    if (now < 3)  {
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
<h1>Интендант</h1>
<div><big><b>Ваш баланс: <?=price($info['count']);?> Пасхальных посыпушек</b></big></div><TABLE border=0><TR valign=top><TD width=300>
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
  <form name=FormBuy action=game.php?fun=m_npc&npc_id=208&answ_id=1 method=post>
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
  $info = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '".$user_id."' and `item_id` = '446'")->fetch_assoc();
    function price_item($itm) { //Тут писать ID предмета и его цену.
        //      if ($itm == 330) { $prc = 1; }
        // else if ($itm == 101) { $prc = 1; }
        // else if ($itm == 72) { $prc = 1; }
        // else if ($itm == 62) { $prc = 1; }
        // else if ($itm == 1055) { $prc = 5; }
        // else if ($itm == 1026) { $prc = 1; }
        // else if ($itm == 309) { $prc = 1; }
        // else if ($itm == 1053) { $prc = 1; }
        // else if ($itm == 42) { $prc = 5; }
        // else if ($itm == 179) { $prc = 3; }
        // else if ($itm == 384) { $prc = 10; }
        // else { return 0; }
          if($itm == 1108){ $prc = 150; }
         else if($itm == 1105){ $prc = 150; }
         else if($itm == 1115){ $prc = 150; }
         else if($itm == 1037){ $prc = 150; }
         else if($itm == 1007){ $prc = 150; }
         else if($itm == 251){  $prc = 100; }
         else if($itm == 253){ $prc = 100; }
         else if($itm == 246){ $prc = 100; }
         else if($itm == 247){ $prc = 100; }
         else if($itm == 232){ $prc = 100; }
         else if($itm == 43){  $prc = 100; }
         else if($itm == 26){  $prc = 100; }
         else if($itm == 45){  $prc = 100; }
         else if($itm == 330){ $prc = 5;   }
         else if($itm == 72){  $prc = 5;   }
         else if($itm == 62){  $prc = 5;   }
         else if($itm == 309){ $prc = 1;   }
         else if($itm == 448){ $prc = 100; }
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
         minus_item($sell,446,$user_id);
         echo "Предметы успешно куплены!";
          }else{
            echo "Не хватает денег!";
          } 
}
?>