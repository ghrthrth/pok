<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Ювелир';
$baseloc['name'] = false;
if($npc == 139 && empty($answer)){
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
items[1][1]=1053;
items[1][2]='Случайная карта';
items[1][3]=5;
items[1][4]=-1;
items[1][5] = new Image(32,32);
items[1][5].src='img/items/1053.gif';
items[2] = new Array(5);
items[2][0]=2;
items[2][1]=1046;
items[2][2]='Камень Мега-Эволюции';
items[2][3]=10;
items[2][4]=-1;
items[2][5] = new Image(32,32);
items[2][5].src='img/items/1046.gif';
items[3] = new Array(5);
items[3][0]=5;
items[3][1]=27;
items[3][2]='Скоба';
items[3][3]=100;
items[3][4]=-1;
items[3][5] = new Image(32,32);
items[3][5].src='img/items/27.gif';
items[4] = new Array(5);
items[4][0]=6;
items[4][1]=330;
items[4][2]='Набор Тренировки';
items[4][3]=5;
items[4][4]=-1;
items[4][5] = new Image(32,32);
items[4][5].src='img/items/330.gif';
items[5] = new Array(5);
items[5][0]=7;
items[5][1]=72;
items[5][2]='Даркболл';
items[5][3]=2;
items[5][4]=-1;
items[5][5] = new Image(32,32);
items[5][5].src='img/items/72.gif';
items[6] = new Array(5);
items[6][0]=8;
items[6][1]=62;
items[6][2]='Мастерболл';
items[6][3]=3;
items[6][4]=-1;
items[6][5] = new Image(32,32);
items[6][5].src='img/items/62.gif';




sell_items_amount=6;currency_txt=' самоц.';   buys = new Array(sell_items_amount);
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
  <form name=FormBuy action=game.php?fun=m_npc&npc_id=139&answ_id=1 method=post>
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
    function price_item($itm) {
             if ($itm == 1053) { $prc = 5; }
        else if ($itm == 1046) { $prc = 10; }
        else if ($itm == 27) { $prc = 100; }
        else if ($itm == 330) { $prc = 5; }
        else if ($itm == 72)  { $prc = 2; }
        else if ($itm == 62)  { $prc = 3; }
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
            echo "Не хватает самоцветов!";
          } 
}
?>