<?php
//session_start();
if(!array_key_exists('last',$_SESSION)){
    $_SESSION['last'] = 0;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8' />
 <link rel="Stylesheet" href="/style.css" type="text/css">
</head>
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
<body id="chat" style="
            color: #000000;
             background-color: #bbd6f1;
             border: groove 0px #295858;
             width: 99%;
             height: 100%;
             text-align:left;
             padding:2 2 2 2;
             color: #245151;
             font-size: 12px;
             font-family: Tahoma;
             overflow: auto;
             word-wrap: break-word">

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
function scroll() {
    var doc = $(document);
    if(doc.scrollTop() >= 20){
        doc.scrollTop(doc.height());
    }
}
function addMess() {
    $.ajax({
        url: "game.php?fun=chat_log",
        type: "GET",
        data: "newmess=1",
        dataType: 'json',
        cache: false,
        async: false,
        success: function (data) {
            var uSes = "<?=$user['login'];?>";
            var uCL = "<?=$user['clan_id'];?>";
            if(data.type == 'usermsg') {
                if(uSes == data.uname || uSes == data.tol ) {
                    var oneB = "<b>";
                    var twoB = "</b>";
                }
                else{
                    var oneB = "";
                    var twoB = "";
                }
                if(data.uidp == 2) {
                    data.bold = 'font-weight:900;';
                    data.unamec = 'black;';
                }
                else {
                    data.bold = '';
                }
                if(data.tol == null){
                    if(data.usexp == 'male'){
                    $('#message_box').append("<font color='green'>["+data.udate+"]</font><a href='game.php?fun=treninf&to_id="+data.uidp+"'target='_blank'><img src='img/question.gif'></a>"+oneB+"<a href='javascript:parent.priv_m(\""+data.uname+"\");' style='color:"+data.unamec+data.bold+"'>"+data.uname+"</a>:"+twoB+" <font style='color:#"+data.ucolor+";'>"+data.umsg+"</font><br>");
                }else{
                    $('#message_box').append("<font color='green'>["+data.udate+"]</font><a href='game.php?fun=treninf&to_id="+data.uidp+"'target='_blank'><img src='img/question_fem.gif'></a>"+oneB+"<a href='javascript:parent.priv_m(\""+data.uname+"\");' style='color:"+data.unamec+data.bold+"'>"+data.uname+"</a>:"+twoB+" <font style='color:#"+data.ucolor+";'>"+data.umsg+"</font><br>");
                }
                }
                else{
                    if(data.usexp == 'male'){
                    $('#message_box').append("<font color='green'>["+data.udate+"]</font><a href='game.php?fun=treninf&to_id="+data.uidp+"'target='_blank'><img src='img/question.gif'></a>"+oneB+"<a href='javascript:parent.priv_m(\""+data.uname+"\");' style='color:"+data.unamec+"'>"+data.uname+"</a> to <a href='game.php?fun=treninf&to_id="+data.uidpt+"'target='_blank'><img src='img/question.gif'><a href='javascript:parent.priv_m(\""+data.tol+"\");' style='color:"+data.toc+"'>"+data.tol+"</a>:"+twoB+" <font style='color:#"+data.ucolor+";'>"+data.umsg+"</font><br>");
                }else{
                    $('#message_box').append("<font color='green'>["+data.udate+"]</font><a href='game.php?fun=treninf&to_id="+data.uidp+"'target='_blank'><img src='img/question_fem.gif'></a>"+oneB+"<a href='javascript:parent.priv_m(\""+data.uname+"\");' style='color:"+data.unamec+"'>"+data.uname+"</a> to <a href='game.php?fun=treninf&to_id="+data.uidpt+"'target='_blank'><img src='img/question.gif'><a href='javascript:parent.priv_m(\""+data.tol+"\");' style='color:"+data.toc+"'>"+data.tol+"</a>:"+twoB+" <font style='color:#"+data.ucolor+";'>"+data.umsg+"</font><br>");
                }
                }
            }
            if(data.type == 'private') {
                if(uSes == data.uname || uSes == data.tol) {
                    $('#message_box').append("<font color='green'>["+data.udate+"]</font><b>[<a href='javascript:parent.priv_m(\""+data.uname+"\");' style='color:"+data.unamec+"'>"+data.uname+"</a> to <a href='javascript:parent.priv_m(\""+data.tol+"\");' style='color:"+data.toc+"'>"+data.tol+"</a>]:</b> <font style='color:#"+data.ucolor+";'>"+data.umsg+"</font><br>");
                }
            }
            if(data.type == 'clan') {
                if(uCL == data.uclan ) {
                    $('#message_box').append("<font color='green'>["+data.udate+"]</font><b>КЛАН - <a href='javascript:parent.priv_m(\""+data.uname+"\");' style='color:"+data.unamec+"'>"+data.uname+"</a>:</b> <font style='color:#"+data.ucolor+";'>"+data.umsg+"</font><br>");
                }
            }
            scroll();
        }
    });
}
$(document).ready(function(){
    setInterval(addMess,4000);
});
</script>
<div id="serv">
</div>
<div class="chat_wrapper">
<div class="chat_box">
<div class="message_box" id="message_box"></div>

</div>
</div>

</body>
</html>
