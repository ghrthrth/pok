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
}</style><?php 
$time = time();
$weather_update = $mysqli->query('SELECT id FROM base_region WHERE weather_time < '.$time)->fetch_assoc();
if ($weather_update['id']) {
    changeWeather($weather_update['id']);
}

if (isset($_GET['get_team'])) {
    $g_t = obTxt($_GET['get_team']);
    $itu = $mysqli->query("SELECT * FROM users WHERE id = ".$g_t)->fetch_assoc();
    if ($itu) {
        $kMy = $mysqli->query("SELECT * FROM team_btl WHERE `user` = '".$user_id."'")->fetch_assoc();
        $cM2 = $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$g_t."' and `active`='1' and `hp` > '0'");
        $cmp2 = $cM2->num_rows;
        $ckom = $mysqli->query("SELECT * FROM `team_btl` WHERE `kom`='".$kMy['kom']."' and `team`='".$kMy['team']."'");
        $ck = $ckom->num_rows;
        if ($itu['status'] !== "free") {
            $rt = "Ошибка! Тренер занят!";
        } else
            if ($itu['location'] !== $user['location']) {
            $rt = "Ошибка! Тренер далеко от боя!";
        } else
            if ($cmp2 == 0) {
            $rt = "Ошибка! Покемоны тренера не в состоянии сражаться!";
        } else
            if ($itu['reputation'] < 200) {
            $rt = "Ошибка! Ранг тренера не позволяет принимать участие!";
        } else
            if ($ck == 5) {
            $rt = "Ошибка! В команде нет мест!";
        } else {
            $rt = "Тренер принят!";
            $mysqli->query("INSERT INTO `team_btl` (`user`,`team`,`kom`,`status`,`type`,`napal`) VALUES ('".$g_t."','".$kMy['team']."','".$kMy['kom']."','1','".$kMy['type']."','".$kMy['napal']."') ");
            $mysqli->query("UPDATE users SET status = 'battle',reload = '1' WHERE `id` = '".$g_t."'");
            echo "<script>parent.frames._location.location.reload();</script>";
        }
        echo "<script>parent.mess('".$rt."');</script>";
    } else {
        echo "<SCRIPT>location.href='game.php?fun=m_location';</SCRIPT>";
        return;
    }
} 
$big_smiles = $mysqli->query('SELECT * FROM users WHERE big_smiles = 1 and id = '.$_SESSION['user_id'])->fetch_assoc();

if($big_smiles['big_smiles'] == 1){
?>
<HTML>
    <HEAD>
        <META HTTP-EQUIV=Content-Type CONTENT=text/html;Charset=Windows-1251>
            <LINK REL=Stylesheet HREF=style.css TYPE=text/css>
                <STYLE>
                    BODY {
                        margin:5 5 5 5;
                    }
                    #radio {
                        border-style:none;
                        background-color:#A6CAF0;
                    }
                    #call {
                        left:3;
                        top:0;
                        width:170;
                        height:200;
                        overflow: auto;
                        z-index:2;
                        padding:5 5 5 5;
                        position:absolute;
                        background-color:#CBE0F6;
                        border: solid 1px #295858;
                        COLOR: #1E3955;
                        FONT-SIZE: 11px;
                        FONT-FAMILY: Tahoma;
                        display:none;
                    }
                    #online_am {
                        display:inline;
                    }
                    img {
                        cursor:pointer;
                    }
                </STYLE>
                <script src="js/jquery.min.js"></script>
                <script>
                    function switch_loadfights() {
                        $("#fights").css("display", "block");
                        $("#aon").attr("onclick", "close_loadfights()");
                    }
                    function close_loadfights() {
                        $("#fights").css("display", "none");
                        $("#aon").attr("onclick", "switch_loadfights()");
                    }
                    function rld_online() {
                        $('#divRegion').load('game.php?fun=onl_log');
                        $('.countOnl').load('game.php?fun=m_online .countOnl');
                        $('#online').load('game.php?fun=m_online #online');
                        $('#fg').load('game.php?fun=m_online #fg');
                        $("#divWeakBox").load('game.php?fun=m_online #divWeakBox');
                    }
                    setInterval(rld_online, 6000);
                </script>
            </HEAD>
            <BODY>
                <div class="call" ID="call">
                    <P id='txt'>
                        <DIV id="pokes"></DIV>
                    </DIV>
                    <div style="width:100%; position:absolute; background-color: #bbd6f1; display:none;" id="divSmiles">
                        <img src="/img/smiles/smile.gif" alt=":)" onclick='parent.smile("[SMILE]")'>
                        <img src="/img/smiles/wink.gif" alt=";)" onclick='parent.smile("[WINK]")'>
                        <img src="/img/smiles/sad.gif" alt=":(" onclick='parent.smile("[SAD]")'>
                        <img src="/img/smiles/cray.gif" alt="Т_Т" onclick='parent.smile("[CRY]")'>
                        <img src="/img/smiles/blum.gif" alt=":-P" onclick='parent.smile("[BLUM]")'>
                        <img src="/img/smiles/shok.gif" alt="O_O" onclick='parent.smile("[SHOCK]")'>
                        <img src="/img/smiles/cool.gif" alt="8-)" onclick='parent.smile("[COOL]")'>
                        <img src="/img/smiles/blush.gif" alt=":-8" onclick='parent.smile("[BLUSH]")'>
                        <img src="/img/smiles/biggrin.gif" alt=":-D" onclick='parent.smile("[BIGGRIN]")'>
                        <img src="/img/smiles/kiss.gif" alt="[KISSING]" onclick='parent.smile("[KISSING]")'>
                        <img src="/img/smiles/rofl.gif" alt="[ROFL]" onclick='parent.smile("[ROFL]")'>
                        <img src="/img/smiles/kissed.gif" alt="[KISSED]" onclick='parent.smile("[KISSED]")'>
                        <img src="/img/smiles/kissyou.gif" alt=":-m" onclick='parent.smile("[KISSYOU]")'>
                        <img src="/img/smiles/hmm.gif" alt="[HMM]" onclick='parent.smile("[HMM]")'>
                        <img src="/img/smiles/bravo.gif" alt="[BRAVO]" onclick='parent.smile("[BRAVO]")'>
                        <img src="/img/smiles/crazy.gif" alt="[CRAZY]" onclick='parent.smile("[CRAZY]")'>
                        <img src="/img/smiles/wacko.gif" alt="%)" onclick='parent.smile("[WACKO]")'>
                        <img src="/img/smiles/bad.gif" alt=":-!" onclick='parent.smile("[BAD]")'>
                        <img src="/img/smiles/secret.gif" alt=":-X" onclick='parent.smile("[SECRET]")'>
                        <img src="/img/smiles/rose.gif" alt="@}--" onclick='parent.smile("[ROSE]")'>
                        <img src="/img/smiles/acute.gif" alt="[ACUTE]" onclick='parent.smile("[ACUTE]")'>
                        <img src="/img/smiles/mocking.gif" alt="[JOKINGLY]" onclick='parent.smile("[JOKINGLY]")'>
                        <img src="/img/smiles/ireful.gif" alt="[IREFUL]" onclick='parent.smile("[IREFUL]")'>
                        <img src="/img/smiles/kisscrazy.gif" alt="[IN_LOVE]" onclick='parent.smile("[IN_LOVE]")'>
                        <img src="/img/smiles/yes.gif" alt="[YES]" onclick='parent.smile("[YES]")'>
                        <img src="/img/smiles/nea.gif" alt="[NO]" onclick='parent.smile("[NO]")'>
                        <img src="/img/smiles/good.gif" alt="[THUMBS_UP]" onclick='parent.smile("[THUMBS_UP]")'>
                        <img src="/img/smiles/ok.gif" alt="[OK]" onclick='parent.smile("[OK]")'>
                        <img src="/img/smiles/scratch.gif" alt="[SCRATCH]" onclick='parent.smile("[SCRATCH]")'>
                        <img src="/img/smiles/drinks.gif" alt="[DRINK]" onclick='parent.smile("[DRINK]")'>
                        <img src="/img/smiles/congrat.gif" alt="[CONGRAT]" onclick='parent.smile("[CONGRAT]")'>
                        <img src="/img/smiles/dance.gif" alt="[DANCE]" onclick='parent.smile("[DANCE]")'>
                        <img src="/img/smiles/wall.gif" alt="[WALL]" onclick='parent.smile("[WALL]")'>
                        <img src="/img/smiles/flag.gif" alt="[FLAG]" onclick='parent.smile("[FLAG]")'>
                        <img src="/img/smiles/pball.gif" alt="[PBALL]" onclick='parent.smile("[PBALL]")'>
                        <img src="/img/smiles/facepalm.gif" alt="[FACEPALM]" onclick='parent.smile("[FACEPALM]")'>
                        <img src="/img/smiles/sos.gif" alt="[SOS]" onclick='parent.smile("[SOS]")'>
                        <img src="/img/smiles/heart.gif" alt="[HEART]" onclick='parent.smile("[HEART]")'>
                        <img src="/img/smiles/hi.gif" alt="[HI]" onclick='parent.smile("[HI]")'>

                        <img src='/img/smiles/christ_01.gif' alt="[CH01]" onclick='parent.smile("[CH01]")'>
                        <img src='/img/smiles/christ_02.gif' alt="[CH02]" onclick='parent.smile("[CH02]")'>
                        <img src='/img/smiles/christ_03.gif' alt="[CH03]" onclick='parent.smile("[CH03]")'>
                        <img src='/img/smiles/christ_04.gif' alt="[CH04]" onclick='parent.smile("[CH04]")'>
                        <img src='/img/smiles/christ_05.gif' alt="[CH05]" onclick='parent.smile("[CH05]")'>
                        <img src='/img/smiles/christ_06.gif' alt="[CH06]" onclick='parent.smile("[CH06]")'>
                        <img src='/img/smiles/christ_07.gif' alt="[CH07]" onclick='parent.smile("[CH07]")'>
                        <img src='/img/smiles/christ_08.gif' alt="[CH08]" onclick='parent.smile("[CH08]")'>
                        <img src='/img/smiles/christ_09.gif' alt="[CH09]" onclick='parent.smile("[CH09]")'>
                        
                        <img src="/img/smiles/gamer.gif" alt="[GAMERR]" onclick='parent.smile("[GAMERR]")'>
                        <img src="/img/smiles/aggh.gif" alt="[AGOGH]" onclick='parent.smile("[AGOGH]")'>
                        <img src="/img/smiles/aggress.gif" alt="[AGRRS]" onclick='parent.smile("[AGRRS]")'>
                         <img src="/img/smiles/ahgm.gif" alt="[AHGGM]" onclick='parent.smile("[AHGGM]")'>
                         <img src="/img/smiles/angel.gif" alt="[AANG]" onclick='parent.smile("[AANG]")'>
                         <img src="/img/smiles/bomb.gif" alt="[BOMMMMB]" onclick='parent.smile("[BOMMMMB]")'>
                         <img src="/img/smiles/boring.gif" alt="[BORDING]" onclick='parent.smile("[BORDING]")'>
                         <img src="/img/smiles/bully.gif" alt="[BOOLLY]" onclick='parent.smile("[BOOLLY]")'>
                         <img src="/img/smiles/bye.gif" alt="[BYESO]" onclick='parent.smile("[BYESO]")'>
                         <img src="/img/smiles/dancee.gif" alt="[DANCEDE]" onclick='parent.smile("[DANCEDE]")'>
                         <img src="/img/smiles/diablo.gif" alt="[DIABLIO]" onclick='parent.smile("[DIABLIO]")'>
                         <img src="/img/smiles/empathy.gif" alt="[EMPAYTHY]" onclick='parent.smile("[EMPAYTHY]")'>
                         <img src="/img/smiles/fool.gif" alt="[FODOL]" onclick='parent.smile("[FODOL]")'>
                         <img src="/img/smiles/haha.gif" alt="[HAHPlA]" onclick='parent.smile("[HAHPlA]")'>
                         <img src="/img/smiles/here.gif" alt="[HEBRE]" onclick='parent.smile("[HEBRE]")'>
                         <img src="/img/smiles/hide.gif" alt="[HIDTE]" onclick='parent.smile("[HIDTE]")'>
                         <img src="/img/smiles/iamso.gif" alt="[IAMSASO]" onclick='parent.smile("[IAMSASO]")'>
                         <img src="/img/smiles/lol.gif" alt="[LOIOL]" onclick='parent.smile("[LOIOL]")'>
                         <img src="/img/smiles/mad.gif" alt="[MADDD]" onclick='parent.smile("[MADDD]")'>
                         <img src="/img/smiles/mail.gif" alt="[MALFIL]" onclick='parent.smile("[MALFIL]")'>
                         <img src="/img/smiles/mamba.gif" alt="[MAKAMBA]" onclick='parent.smile("[MAKAMBA]")'>
                         <img src="/img/smiles/music.gif" alt="[MUISIC]" onclick='parent.smile("[MUISIC]")'>
                         <img src="/img/smiles/new_russ.gif" alt="[newrOg]" onclick='parent.smile("[newrOg]")'>
                         <img src="/img/smiles/nyam.gif" alt="[nyaMMm]" onclick='parent.smile("[nyaMMm]")'>
                         <img src="/img/smiles/pardon.gif" alt="[PARDORN]" onclick='parent.smile("[PARDORN]")'>
                         <img src="/img/smiles/roll.gif" alt="[ROILL]" onclick='parent.smile("[ROILL]")'>
                         <img src="/img/smiles/run.gif" alt="[RUNNN]" onclick='parent.smile("[RUNNN]")'>
                         <img src="/img/smiles/scare.gif" alt="[SCADRE]" onclick='parent.smile("[SCADRE]")'>
                         <img src="/img/smiles/search.gif" alt="[SEAVARCH]" onclick='parent.smile("[SEAVARCH]")'>
                         <img src="/img/smiles/shout.gif" alt="[SHOLIUT]" onclick='parent.smile("[SHOLIUT]")'>
                         <img src="/img/smiles/sorry.gif" alt="[SORRPRY]" onclick='parent.smile("[SORRPRY]")'>
                         <img src="/img/smiles/stop.gif" alt="[SSTOOEP]" onclick='parent.smile("[SSTOOEP]")'>
                         <img src="/img/smiles/tada.gif" alt="[TADAMA]" onclick='parent.smile("[TADAMA]")'>
                         <img src="/img/smiles/tap.gif" alt="[TRPAP]" onclick='parent.smile("[TRPAP]")'>
                         <img src="/img/smiles/twiddle.gif" alt="[TWIDDLWLE]" onclick='parent.smile("[TWIDDLWLE]")'>
                         <img src="/img/smiles/unknown.gif" alt="[UNKNWES]" onclick='parent.smile("[UNKNWES]")'>
                        <img src="/img/smiles/yahoo.gif" alt="[YAHOORSH]" onclick='parent.smile("[YAHOORSH]")'>

                         
                        <br>
                        <div align="center">
                            <a href="#" onclick="document.getElementById('divSmiles').style.display='none'; return false;">[закрыть]</a>
                        </div>
                    </div>

                    <div id="divRegion" style="text-align:center"></div>
                    <div id='txt' style="float:left;">
                        Усталость:
                    </div>
                    <div id="divWeakBox" style="float:right; width:155px; height:12px; background-color:#97BDE5; margin:1px;font-size:5px;"></div>
                    <?php
     $ft = 0;
                    if ($user['fetig'] > time()) {
                        $ft = round(time()/$user['fetig']*100);
                    }}else{?>
<HTML>
    <HEAD>
        <META HTTP-EQUIV=Content-Type CONTENT=text/html;Charset=Windows-1251>
            <LINK REL=Stylesheet HREF=style.css TYPE=text/css>
                <STYLE>
                    BODY {
                        margin:5 5 5 5;
                    }
                    #radio {
                        border-style:none;
                        background-color:#A6CAF0;
                    }
                    #call {
                        left:3;
                        top:0;
                        width:170;
                        height:200;
                        overflow: auto;
                        z-index:2;
                        padding:5 5 5 5;
                        position:absolute;
                        background-color:#CBE0F6;
                        border: solid 1px #295858;
                        COLOR: #1E3955;
                        FONT-SIZE: 11px;
                        FONT-FAMILY: Tahoma;
                        display:none;
                    }
                    #online_am {
                        display:inline;
                    }
                    img {
                        cursor:pointer;
                    }
                </STYLE>
                <script src="js/jquery.min.js"></script>
                <script>
                    function switch_loadfights() {
                        $("#fights").css("display", "block");
                        $("#aon").attr("onclick", "close_loadfights()");
                    }
                    function close_loadfights() {
                        $("#fights").css("display", "none");
                        $("#aon").attr("onclick", "switch_loadfights()");
                    }
                    function rld_online() {
                        $('#divRegion').load('game.php?fun=onl_log');
                        $('.countOnl').load('game.php?fun=m_online .countOnl');
                        $('#online').load('game.php?fun=m_online #online');
                        $('#fg').load('game.php?fun=m_online #fg');
                        $("#divWeakBox").load('game.php?fun=m_online #divWeakBox');
                    }
                    setInterval(rld_online, 6000);
                </script>
            </HEAD>
            <BODY>
                <div class="call" ID="call">
                    <P id='txt'>
                        <DIV id="pokes"></DIV>
                    </DIV>
                    <div style="width:100%; position:absolute; background-color: #bbd6f1; display:none;" id="divSmiles">
                        <img src="/img/smiles/smile.gif" alt=":)" onclick='parent.smile("[SMILE]")'>
                        <img src="/img/smiles/wink.gif" alt=";)" onclick='parent.smile("[WINK]")'>
                        <img src="/img/smiles/sad.gif" alt=":(" onclick='parent.smile("[SAD]")'>
                        <img src="/img/smiles/cray.gif" alt="Т_Т" onclick='parent.smile("[CRY]")'>
                        <img src="/img/smiles/blum.gif" alt=":-P" onclick='parent.smile("[BLUM]")'>
                        <img src="/img/smiles/shok.gif" alt="O_O" onclick='parent.smile("[SHOCK]")'>
                        <img src="/img/smiles/cool.gif" alt="8-)" onclick='parent.smile("[COOL]")'>
                        <img src="/img/smiles/blush.gif" alt=":-8" onclick='parent.smile("[BLUSH]")'>
                        <img src="/img/smiles/biggrin.gif" alt=":-D" onclick='parent.smile("[BIGGRIN]")'>
                        <img src="/img/smiles/kiss.gif" alt="[KISSING]" onclick='parent.smile("[KISSING]")'>
                        <img src="/img/smiles/rofl.gif" alt="[ROFL]" onclick='parent.smile("[ROFL]")'>
                        <img src="/img/smiles/kissed.gif" alt="[KISSED]" onclick='parent.smile("[KISSED]")'>
                        <img src="/img/smiles/kissyou.gif" alt=":-m" onclick='parent.smile("[KISSYOU]")'>
                        <img src="/img/smiles/hmm.gif" alt="[HMM]" onclick='parent.smile("[HMM]")'>
                        <img src="/img/smiles/bravo.gif" alt="[BRAVO]" onclick='parent.smile("[BRAVO]")'>
                        <img src="/img/smiles/crazy.gif" alt="[CRAZY]" onclick='parent.smile("[CRAZY]")'>
                        <img src="/img/smiles/wacko.gif" alt="%)" onclick='parent.smile("[WACKO]")'>
                        <img src="/img/smiles/bad.gif" alt=":-!" onclick='parent.smile("[BAD]")'>
                        <img src="/img/smiles/secret.gif" alt=":-X" onclick='parent.smile("[SECRET]")'>
                        <img src="/img/smiles/rose.gif" alt="@}--" onclick='parent.smile("[ROSE]")'>
                        <img src="/img/smiles/acute.gif" alt="[ACUTE]" onclick='parent.smile("[ACUTE]")'>
                        <img src="/img/smiles/mocking.gif" alt="[JOKINGLY]" onclick='parent.smile("[JOKINGLY]")'>
                        <img src="/img/smiles/ireful.gif" alt="[IREFUL]" onclick='parent.smile("[IREFUL]")'>
                        <img src="/img/smiles/kisscrazy.gif" alt="[IN_LOVE]" onclick='parent.smile("[IN_LOVE]")'>
                        <img src="/img/smiles/yes.gif" alt="[YES]" onclick='parent.smile("[YES]")'>
                        <img src="/img/smiles/nea.gif" alt="[NO]" onclick='parent.smile("[NO]")'>
                        <img src="/img/smiles/good.gif" alt="[THUMBS_UP]" onclick='parent.smile("[THUMBS_UP]")'>
                        <img src="/img/smiles/ok.gif" alt="[OK]" onclick='parent.smile("[OK]")'>
                        <img src="/img/smiles/scratch.gif" alt="[SCRATCH]" onclick='parent.smile("[SCRATCH]")'>
                        <img src="/img/smiles/drinks.gif" alt="[DRINK]" onclick='parent.smile("[DRINK]")'>
                        <img src="/img/smiles/congrat.gif" alt="[CONGRAT]" onclick='parent.smile("[CONGRAT]")'>
                        <img src="/img/smiles/dance.gif" alt="[DANCE]" onclick='parent.smile("[DANCE]")'>
                        <img src="/img/smiles/wall.gif" alt="[WALL]" onclick='parent.smile("[WALL]")'>
                        <img src="/img/smiles/flag.gif" alt="[FLAG]" onclick='parent.smile("[FLAG]")'>
                        <img src="/img/smiles/pball.gif" alt="[PBALL]" onclick='parent.smile("[PBALL]")'>
                        <img src="/img/smiles/facepalm.gif" alt="[FACEPALM]" onclick='parent.smile("[FACEPALM]")'>
                        <img src="/img/smiles/sos.gif" alt="[SOS]" onclick='parent.smile("[SOS]")'>
                        <img src="/img/smiles/heart.gif" alt="[HEART]" onclick='parent.smile("[HEART]")'>
                        <img src="/img/smiles/hi.gif"        alt="[HI]"   onclick='parent.smile("[HI]")'>

                        <img src='/img/smiles/christ_01.gif' alt="[CH01]" onclick='parent.smile("[CH01]")'>
                        <img src='/img/smiles/christ_02.gif' alt="[CH02]" onclick='parent.smile("[CH02]")'>
                        <img src='/img/smiles/christ_03.gif' alt="[CH03]" onclick='parent.smile("[CH03]")'>
                        <img src='/img/smiles/christ_04.gif' alt="[CH04]" onclick='parent.smile("[CH04]")'>
                        <img src='/img/smiles/christ_05.gif' alt="[CH05]" onclick='parent.smile("[CH05]")'>
                        <img src='/img/smiles/christ_06.gif' alt="[CH06]" onclick='parent.smile("[CH06]")'>
                        <img src='/img/smiles/christ_07.gif' alt="[CH07]" onclick='parent.smile("[CH07]")'>
                        <img src='/img/smiles/christ_08.gif' alt="[CH08]" onclick='parent.smile("[CH08]")'>
                        <img src='/img/smiles/christ_09.gif' alt="[CH09]" onclick='parent.smile("[CH09]")'>
                        
                        <br>
                        <div align="center">
                            <a href="#" onclick="document.getElementById('divSmiles').style.display='none'; return false;">[закрыть]</a>
                        </div>
                    </div>

                    <div id="divRegion" style="text-align:center"></div>
                    <div id='txt' style="float:left;">
                        Усталость:
                    </div>
                    <div id="divWeakBox" style="float:right; width:155px; height:12px; background-color:#97BDE5; margin:1px;font-size:5px;"></div>
                    <?php
     $ft = 0;
                    if ($user['fetig'] > time()) {
                        $ft = round(time()/$user['fetig']*100);
                    }}
                    ?>
                    
                    <div id="divWeak" style="width:<?=$ft?>%; height:10px; background-color:#d15365; margin:1px;"></div>
                </div>
                <hr style="clear:both;">
                <b id='txt'><a href="javascript:" onclick="switch_loadfights()" id="aon">Бои на локации</a></b>
                <div id='fights' style="display:none"><div id="fg">
                    <?php
                    $fg = 0;
                    $fight_ = $mysqli->query("SELECT * FROM `battle` WHERE `loc` = '".$user['location']."' and `tip` = '0'");
                    while ($fight = $fight_->fetch_assoc()) {
                        $fg = 1;
                        
                        if (infUsr($fight['user1'],"close_fight") == 0 and infUsr($fight['user2'],"close_fight") == 0) {
                            ?>
                            <p id="txt">
                                <a href="game.php?fun=treninf&amp;to_id=<?=$fight['user1']?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$fight['user1']?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;"><img src="img/question.gif" border="0" alt="Тренеркарта" title="Тренеркарта"></a> <a style="color:<?=colorsUsers(infUsr($fight['user1'],"groups"))?>;" href="javascript:parent.priv_m('<?=infUsr($fight['user1'],"login")?>',<?=$fight['user1']?>);"><?=infUsr($fight['user1'],"login")?></a>
                                VS
                                <a href="game.php?fun=treninf&amp;to_id=<?=$fight['user2']?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$fight['user2']?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;"><img src="img/question.gif" border="0" alt="Тренеркарта" title="Тренеркарта"></a> <a style="color:<?=colorsUsers(infUsr($fight['user2'],"groups"))?>;" href="javascript:parent.priv_m('<?=infUsr($fight['user2'],"login")?>',<?=$fight['user2']?>);"><?=infUsr($fight['user2'],"login")?></a> <a target="_location" href="game.php?fun=view_fight&btl=<?=$fight['id']?>"> <?php if($fight['loc'] == 521){
                                    if($_SESSION['user_id'] == 1){
                                        echo ">>>";
                                    }else{
                                    echo "";
                                 }
                                }elseif($fight['kom'] > 0) {
                                        echo "<font color='red'> >>> </font>";
                                    } else {
                                        echo ">>>";
                                    }
                                    ?> </a>
                            </p>
                            <?php
                        }
                    }
                    if ($fg == 0) {
                        echo "<p id='txt'>.......</p>";
                    }
                    ?>
                </div>
                </div>
                <br>

                <?php 
                $usernalocs = $mysqli->query('SELECT COUNT(*) as counts FROM users WHERE location = '.$user['location'].' AND online = 1');
                $usernalocation = $usernalocs->fetch_row();
                ?>

                <b id='txt' class="countOnl">Здесь находятся (<div id="online_am"><?=$usernalocation[0]?></div>)</b>
                <DIV ID='online'>
                    <?php
                    $app_ = $mysqli->query('SELECT * FROM app WHERE user_to = '.$user_id);
                    while ($app = $app_->fetch_assoc()) {
                        if($app['type'] == 1){
                        ?>
                        <p id="txt" style="height: 4px;">
                            <img src="img/call_1.gif" width="9" height="10" onclick="parent.call('<?=$app['user']?>','recieve',event)" style="cursor:pointer" alt="Принять вызов!" title="Принять вызов!"> <a style="color:<?=colorsUsers(infUsr($app['user'],"groups"))?>;"><?=infUsr($app['user'],"login")?></a>
                        </p>
                        <br>
                        <?php
                    }else{
                        ?>
                        <p id="txt" style="height: 4px;">
                            <img src="img/call_3.gif" width="9" height="10" onclick="parent.call('<?=$app['user']?>','recieve_gym',event)" style="cursor:pointer" alt="Принять ГИМ!" title="Принять ГИМ!"> <a style="color:<?=colorsUsers(infUsr($app['user'],"groups"))?>;"><?=infUsr($app['user'],"login")?></a>
                        </p>
                        <br>
                        <?php
                    }
                    }
                    $lifetimes = time()-300;
                    $usernaloca = $mysqli->query('SELECT * FROM users WHERE location = '.$user['location'].' AND online_time > '.$lifetimes);
                    while ($usersnaloc = $usernaloca->fetch_assoc()) {
                        //print_r($app);
                        if($usersnaloc['login'] == 'lumenion') {
                            echo '
                            <p id="txt" style="height:4px;">
                                <img src="img/call_1.gif" width="9" height="10" onclick="parent.call(\''.$usersnaloc['login'].'\',\'recieve\',event)" style="cursor:default" alt="Неуязвим" title="Неуязвим!">
                                <b style="color:white;">'.$usersnaloc['login'].'</b>
                            </p>';
                        }
                        else {
                        ?>

                        <p id="txt" style="height: 4.2px;">
                            <img src="img/call_2.gif" width="9" height="10" onclick="parent.call('<?=$usersnaloc['id']?>','send',event)" style="cursor:pointer" alt="Бросить вызов!" title="Бросить вызов!">
                            <a href="game.php?fun=treninf&amp;to_id=<?=$usersnaloc['id']?>" onclick="window.open('game.php?fun=treninf&amp;to_id=<?=$usersnaloc['id']?>', 'treninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;">
                                <?php if($usersnaloc['sex'] == 'male'){?> <img src="img/question.gif" width="9" height="10" border="0" alt="Тренеркарта" title="Тренеркарта"><?php }else{ ?> <img src="img/question_fem.gif" width="9" height="10" border="0" alt="Тренеркарта" title="Тренеркарта"><?}?>
                            </a>
                            <a style="color:<?=colorsUsers($usersnaloc['groups'])?>;" href="javascript:parent.priv_m('<?=$usersnaloc['login']?>',<?=$usersnaloc['id']?>);"><?=$usersnaloc['login']?></a><?php if ($usersnaloc['karma'] <= -10) {
                                echo " <img src='/img/karma_crim.gif' border='0' alt='Преступник' title='Преступник'>";
                            }
                            if (($usersnaloc['karma'] >= 10) and ($usersnaloc['karma'] < 1000000) ) {
                                echo " <img src='/img/karma_guard.gif' border='0' alt='Защитник' title='Защитник'>";
                            }
                            if ($usersnaloc['karma'] >= 1000000) {
                                echo " <img src='/img/karma_immortal.gif' border='0' alt='Immortal' title='Immortal'>";
                            }
                               if ($usersnaloc['clan_id'] == 0) {

?> 
                          <a><img src='/img/clans/0.gif' width=10 height=10 border='0'<span class='rednote'></a>
                                                     <font color="<?=colorsUsers($ta['groups']);?>"></font><br><br>
                            <?php
                            }                             
                            elseif ($usersnaloc['clan_id'] == 1) {

?>  
                          <span class='rednote'><?php  ?>  <a href='game.php?fun=claninf&clan_id=1' onclick="window.open('/game.php?fun=claninf&clan_id=1', 'claninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;"><img src='/img/clans/1.gif' width=10 height=11 border='0'<span class='rednote'></a>
                           <span class='rednote'><?php ?> <br><br>                             <font color="<?=colorsUsers($ta['groups']);?>"></font><br><br>
                            <?php
                            }elseif ($usersnaloc['clan_id'] == 2) {

?> 
                         <span class='rednote'><?php ?>  <a href='game.php?fun=claninf&clan_id=2' onclick="window.open('/game.php?fun=claninf&clan_id=2', 'claninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;"><img src='/img/clans/2.gif' width=10 height=11 border='0'></a>
                                <span class='rednote'><?php ?>   <br><br>                      <font color="<?=colorsUsers($ta['groups']);?>"></font><br><br>
                            <?php
                            }elseif ($usersnaloc['clan_id'] == 6) {

?> 
                         <span class='rednote'><?php ?>  <a href='game.php?fun=claninf&clan_id=6' onclick="window.open('/game.php?fun=claninf&clan_id=6', 'claninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;"><img src='/img/clans/6.gif' width=10 height=11 border='0'></a>
                                <span class='rednote'><?php ?>   <br><br>                      <font color="<?=colorsUsers($ta['groups']);?>"></font><br><br>
                            <?php
                            }elseif ($usersnaloc['clan_id'] == 9) {

?> 
                            <span class='rednote'><?php ?>  <a href='game.php?fun=claninf&clan_id=9' onclick="window.open('/game.php?fun=claninf&clan_id=9', 'claninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;"><img src='/img/clans/9.gif' width=10 height=11 border='0'></a>
                                <span class='rednote'><?php ?>   <br><br>                      <font color="<?=colorsUsers($ta['groups']);?>"></font><br><br>
                            <?php
                            }elseif ($usersnaloc['clan_id'] == 8) {

?> 
                         <span class='rednote'><?php ?>  <a href='game.php?fun=claninf&clan_id=8' onclick="window.open('/game.php?fun=claninf&clan_id=8', 'claninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;"><img src='/img/clans/8.gif' width=10 height=11 border='0'></a>
                                <span class='rednote'><?php ?>   <br><br>                      <font color="<?=colorsUsers($ta['groups']);?>"></font><br><br>
                            <?php
                            }elseif ($usersnaloc['clan_id'] == 10) {

?> 
                         <span class='rednote'><?php ?>  <a href='game.php?fun=claninf&clan_id=10' onclick="window.open('/game.php?fun=claninf&clan_id=10', 'claninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;"><img src='/img/clans/10.gif' width=10 height=11 border='0'></a>
                                <span class='rednote'><?php ?>   <br><br>                      <font color="<?=colorsUsers($ta['groups']);?>"></font><br><br>
                            
                            <?php
                            }elseif ($usersnaloc['clan_id'] == 11) {

?> 
                         <span class='rednote'><?php ?>  <a href='game.php?fun=claninf&clan_id=11' onclick="window.open('/game.php?fun=claninf&clan_id=11', 'claninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;"><img src='/img/clans/11.gif' width=10 height=11 border='0'></a>
                                <span class='rednote'><?php ?>   <br><br>                      <font color="<?=colorsUsers($ta['groups']);?>"></font><br><br>
                            
                            
                            <?php
                             }elseif ($usersnaloc['clan_id'] == 12) {

?> 
                         <span class='rednote'><?php ?>  <a href='game.php?fun=claninf&clan_id=12' onclick="window.open('/game.php?fun=claninf&clan_id=12', 'claninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;"><img src='/img/clans/12.gif' width=10 height=11 border='0'></a>
                                <span class='rednote'><?php ?>   <br><br>                      <font color="<?=colorsUsers($ta['groups']);?>"></font><br><br>
                            
                            
                            <?php
                            }elseif ($usersnaloc['clan_id'] == 3) {

?> 
                         <span class='rednote'><?php ?>  <a href='game.php?fun=claninf&clan_id=3' onclick="window.open('/game.php?fun=claninf&clan_id=3', 'claninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;"><img src='/img/clans/3.gif' width=10 height=11 border='0'></a>
                                <span class='rednote'><?php ?>   <br><br>                      <font color="<?=colorsUsers($ta['groups']);?>"></font><br><br>
                            <?php
                            }elseif ($usersnaloc['clan_id'] == 5) {

?> 
                        <span class='rednote'><?php  ?> <a href='game.php?fun=claninf&clan_id=5' onclick="window.open('/game.php?fun=claninf&clan_id=5', 'claninf', 'fullscreen=no,scrollbars=yes,width=600,height=530'); return false;"><img src='/img/clans/5.gif' width=10 height=11 border='0'></a>
                             <span class='rednote'><?php  ?>             <br><br>               <font color="<?=colorsUsers($ta['groups']);?>"></font><br><br>
                            <?php
                            }?> 
   <?php                         
                ?>        </p>

                        <?php 
                       } 
                    }
                    ?>
                </DIV>
            </body>
        </html>