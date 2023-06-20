<?php 
  $mysqli->query("UPDATE users SET time_chat = ".time()." WHERE id = ".$user_id);
?>
<html>
<HEAD>
<TITLE>Pokezone</TITLE>

</HEAD>
<style>::-webkit-scrollbar {
    width: 7px;
    height: 7px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgb(100, 123, 148);
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background: #898c87;
    -webkit-box-shadow: inset 0 0 6px rgb(77, 162, 253);
}</style> 
<script>
  var t_id=new Array;
  var t_nm=new Array;
  var t_gr=new Array;
  var t_kr=new Array;
  var t_cl=new Array;
  var f=new Array;
  var myloc=0;
  var WEAK_TIME=300;
  var karma_txt=new Array;
      karma_txt[-1]=" <img src=img/karma_crim.gif border=0 alt=Преступник title=Преступник>";
      karma_txt[1]=" <img src=img/karma_guard.gif border=0 alt=Защитник title=Защитник>";
      karma_txt[0]="";

  function defPosition(event) { // координаты мыши
    var x = y = 0;
    if (_online.document.attachEvent != null) {
        x = _online.event.clientX + (_online.document.documentElement.scrollLeft ? _online.document.documentElement.scrollLeft : _online.document.body.scrollLeft);
        y = _online.event.clientY + (_online.document.documentElement.scrollTop ? _online.document.documentElement.scrollTop : _online.document.body.scrollTop);
    } else if (!_online.document.attachEvent && _online.document.addEventListener) {
        x = event.clientX + _online.scrollX;
        y = event.clientY + _online.scrollY;
    } else {
        // Do nothing
    }
    return {x:x, y:y};
  }
  
 function priv_m(uName,uID) {                                       // Адрессованное сообщение
  if(uName == "") { uName = null; }
  _input.document.getElementById('ToName').value = uName;
	_input.document.getElementById('message').focus();
  }
  
function call(numinlist,action,event) {                                         // Бросить вызов
				tmp=(action=='send'?'Бросить':'Принять')+' вызов <br>';
				tmp=tmp+'<form action=game.php?fun=m_location method=POST target=_work>';
				tmp=tmp+'<input name=fun type=hidden value=call>';
				tmp=tmp+'<input name=map type=hidden value=1>';
				tmp=tmp+'<input name=type type=hidden value='+action+'>';
				tmp=tmp+'<input name=ToID type=hidden value='+numinlist+'>';
				if (action=='send') {
				  tmp=tmp+'<p id=txt><input name="mode" type="radio" value="call" checked> Вызов';
				  tmp=tmp+'<br><input name="mode" type="radio" value="agro"> Нападение';
          tmp=tmp+'<br><input name="mode" type="radio" value="conquer"> Захват локации';
          tmp=tmp+'<br><input name="mode" type="radio" value="gymbattle"> Вызов ГИМа';
          tmp=tmp+'<br><input name="mode" type="radio" value="dominat"> Доминация';
				}
				tmp=tmp+'<br>&nbsp;<br><input type=submit value="ОК" onclick="parent._online.document.getElementById(\'call\').style.display=\'none\'">';
				tmp=tmp+'&nbsp;&nbsp;<input type=button value="Отмена" onclick="parent._online.document.getElementById(\'call\').style.display=\'none\'"></form>';
				_online.document.getElementById('pokes').innerHTML=tmp;
				_online.document.getElementById('call').style.left=defPosition(event).x;
				_online.document.getElementById('call').style.top=defPosition(event).y;
				_online.document.getElementById('call').style.display = "block";
			}
  function mess(txt) {
     if (!_location.document.getElementById('mess')) {
      var prnt = _location.document.getElementsByTagName('BODY')[0];
      var newD = _location.document.createElement('div');
      newD.id = 'mess';
      newD.onclick='parent.mess_hide()';
      prnt.appendChild(newD);
   }
     _location.document.getElementById('mess').innerHTML=txt;
     _location.document.getElementById('mess').style.display='block';
  }

  function mess_hide() {
  	_location.document.getElementById('mess').style.display='none';
  }

  function smile(code) {
  	_input.document.getElementById('message').value+=' '+code+' ';
    _online.document.getElementById('divSmiles').style.display='none';
  	_input.document.getElementById('message').focus();
  }

  function pokedex(sp_id) {
    window.open("/pokedex.php?sp_id="+sp_id,"dex","width=600,height=600,scrollbars=yes");
  }

  var ddate = new Date();
  reftime=ddate.getTime();
  
</script>
 <style>::-webkit-scrollbar {
    width: 7px;
    height: 7px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background: #898c87;
    -webkit-box-shadow: inset 0 0 6px rgb(71, 72, 72);
}</style>
<FRAMESET ROWS="50%,*, 60,0,0,0" FRAMEBORDER=0 FRAMESPACING=0 BORDERCOLOR=#000000>
   <FRAME SRC="game.php?fun=m_location&map=1" id="_location"  NAME="_location" SCROLLING="AUTO" FRAMEBORDER=0 style="BACKGROUND-COLOR: #A6CAF0;">
   <frameset cols="*,250" FRAMEBORDER=0 FRAMESPACING=0 BORDERCOLOR=#000000>
     <FRAME SRC="game.php?fun=chat" NAME="_chat" SCROLLING="YES" FRAMEBORDER=0>
     <FRAME SRC="game.php?fun=m_online" NAME="_online" SCROLLING="YES" FRAMEBORDER=0>
   </FRAMESET>
   <FRAME SRC="game.php?fun=m_input" NAME="_input" SCROLLING="NO" FRAMEBORDER=0 NORESIZE>
   <FRAME  NAME="_work" NORESIZE>
   <FRAME  NAME="_chat_work" NORESIZE>
   <FRAME  NAME="_chat_add" NORESIZE>
</FRAMESET>
<noframes><body bgcolor="#FFFFFF">
Ваш браузер не поддерживает фреймы
</body></noframes>
</html>