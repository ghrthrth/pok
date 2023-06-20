<?php
$mysqli->query("DELETE FROM `chat` WHERE `time` < NOW() - INTERVAL 5 MINUTE");
if(isset($_GET['newmess'])){
    if(!$_SESSION['last']){
        $_SESSION['last'] = 0;
    }
    $cls = $mysqli->query("SELECT * FROM `chat` WHERE  id > ".$_SESSION['last']." AND ((private = 0 AND ".$user['location']."<>2) OR klan = 1 OR ((private > 0 OR ".$user['location']." = 2) AND (user = ".$_SESSION['user_id']." OR to_user = ".$_SESSION['user_id']."))) LIMIT 1");
    while($cl = $cls->fetch_assoc()){
        $_SESSION['last'] = $cl['id'];
        if($cl['klan'] > 0) {
            $type = "clan";
            //infUsr($cl['user'],"clan_id")    $user['clan_id']
            if(infUsr($cl['user'],"clan_id") != $user['clan_id']) {$cl['text'] = "";};
        }
        elseif($cl['private'] > 0){
            $type = "private";
        }elseif($user['location'] == 2){
            $type = "private";
        }
        else{
            $type = "usermsg";
        }
$big_smiles = $mysqli->query('SELECT * FROM users WHERE big_smiles = 1 and id = '.$_SESSION['user_id'])->fetch_assoc();

if($big_smiles['big_smiles'] == 1){
        $cl['text'] = preg_replace("/\[(KISSED)\s*\]/",    "<img src='/img/smiles/kissed.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(KISSING)\s*\]/",   "<img src='/img/smiles/kiss.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(SMILE)\s*\]/",     "<img src='/img/smiles/smile.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(SAD)\s*\]/",       "<img src='/img/smiles/sad.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(WINK)\s*\]/",      "<img src='/img/smiles/wink.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CRY)\s*\]/",       "<img src='/img/smiles/cray.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(SHOCK)\s*\]/",     "<img src='/img/smiles/shok.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(BLUM)\s*\]/",      "<img src='/img/smiles/blum.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(COOL)\s*\]/",      "<img src='/img/smiles/cool.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(BLUSH)\s*\]/",     "<img src='/img/smiles/blush.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(BIGGRIN)\s*\]/",   "<img src='/img/smiles/biggrin.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(KISSYOU)\s*\]/",   "<img src='/img/smiles/kissyou.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(HMM)\s*\]/",       "<img src='/img/smiles/hmm.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(BRAVO)\s*\]/",     "<img src='/img/smiles/bravo.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CRAZY)\s*\]/",     "<img src='/img/smiles/crazy.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(WACKO)\s*\]/",     "<img src='/img/smiles/wacko.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(BAD)\s*\]/",       "<img src='/img/smiles/bad.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(SECRET)\s*\]/",    "<img src='/img/smiles/secret.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(ROSE)\s*\]/",      "<img src='/img/smiles/rose.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(ACUTE)\s*\]/",     "<img src='/img/smiles/acute.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(JOKINGLY)\s*\]/",  "<img src='/img/smiles/mocking.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(IREFUL)\s*\]/",    "<img src='/img/smiles/ireful.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(IN_LOVE)\s*\]/",   "<img src='/img/smiles/kisscrazy.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(YES)\s*\]/",       "<img src='/img/smiles/yes.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(NO)\s*\]/",        "<img src='/img/smiles/nea.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(THUMBS_UP)\s*\]/", "<img src='/img/smiles/good.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(OK)\s*\]/",        "<img src='/img/smiles/ok.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(SCRATCH)\s*\]/",   "<img src='/img/smiles/scratch.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(DRINK)\s*\]/",     "<img src='/img/smiles/drinks.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CONGRAT)\s*\]/",   "<img src='/img/smiles/congrat.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(DANCE)\s*\]/",     "<img src='/img/smiles/dance.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(WALL)\s*\]/",      "<img src='/img/smiles/wall.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(AGRRS)\s*\]/",        "<img src='/img/smiles/aggress.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(ROFL)\s*\]/",      "<img src='/img/smiles/rofl.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(PBALL)\s*\]/",     "<img src='/img/smiles/pball.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(FLAG)\s*\]/",      "<img src='/img/smiles/flag.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(FACEPALM)\s*\]/",     "<img src='/img/smiles/facepalm.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(SOS)\s*\]/",     "<img src='/img/smiles/sos.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(HEART)\s*\]/",     "<img src='/img/smiles/heart.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(HI)\s*\]/",        "<img src='/img/smiles/hi.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(Хэллоувин)\s*\]/",        "<img src='/img/smiles/pumpkin.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(GAMERR)\s*\]/",        "<img src='/img/smiles/gamer.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(AGOGH)\s*\]/",        "<img src='/img/smiles/aggh.gif'>",$cl['text']);



         $cl['text'] = preg_replace("/\[(AGRRS)\s*\]/",               "<img src='/img/smiles/aggress.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(AHGGM)\s*\]/",               "<img src='/img/smiles/ahgm.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(AANG)\s*\]/",                "<img src='/img/smiles/angel.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(BOMMMMB)\s*\]/",                "<img src='/img/smiles/bomb.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(BORDING)\s*\]/",                "<img src='/img/smiles/boring.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(BOOLLY)\s*\]/",                "<img src='/img/smiles/bully.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(BYESO)\s*\]/",                "<img src='/img/smiles/bye.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(DANCEDE)\s*\]/",                "<img src='/img/smiles/dancee.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(DIABLIO)\s*\]/",                "<img src='/img/smiles/diablo.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(EMPAYTHY)\s*\]/",                "<img src='/img/smiles/empathy.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(FODOL)\s*\]/",                "<img src='/img/smiles/fool.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(HAHPlA)\s*\]/",                "<img src='/img/smiles/haha.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(HEBRE)\s*\]/",                "<img src='/img/smiles/here.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(HIDTE)\s*\]/",                "<img src='/img/smiles/hide.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(IAMSASO)\s*\]/",                "<img src='/img/smiles/iamso.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(LOIOL)\s*\]/",                "<img src='/img/smiles/lol.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(MADDD)\s*\]/",                "<img src='/img/smiles/mad.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(MALFIL)\s*\]/",               "<img src='/img/smiles/mail.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(MAKAMBA)\s*\]/",               "<img src='/img/smiles/mamba.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(MUISIC)\s*\]/",               "<img src='/img/smiles/music.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(newrOg)\s*\]/",               "<img src='/img/smiles/new_russ.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(nyaMMm)\s*\]/",               "<img src='/img/smiles/nyam.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(PARDORN)\s*\]/",               "<img src='/img/smiles/pardon.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(ROILL)\s*\]/",               "<img src='/img/smiles/roll.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(RUNNN)\s*\]/",               "<img src='/img/smiles/run.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(SCADRE)\s*\]/",               "<img src='/img/smiles/scare.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(SEAVARCH)\s*\]/",               "<img src='/img/smiles/search.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(SHOLIUT)\s*\]/",               "<img src='/img/smiles/shout.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(SORRPRY)\s*\]/",               "<img src='/img/smiles/sorry.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(SSTOOEP)\s*\]/",               "<img src='/img/smiles/stop.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(TADAMA)\s*\]/",               "<img src='/img/smiles/tada.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(TRPAP)\s*\]/",               "<img src='/img/smiles/tap.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(TWIDDLWLE)\s*\]/",               "<img src='/img/smiles/twiddle.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(UNKNWES)\s*\]/",               "<img src='/img/smiles/unknown.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(YAHOORSH)\s*\]/",             "<img src='/img/smiles/yahoo.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(CH01)\s*\]/",        "<img src='/img/smiles/christ_01.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH02)\s*\]/",        "<img src='/img/smiles/christ_02.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH03)\s*\]/",        "<img src='/img/smiles/christ_03.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH04)\s*\]/",        "<img src='/img/smiles/christ_04.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH05)\s*\]/",        "<img src='/img/smiles/christ_05.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH06)\s*\]/",        "<img src='/img/smiles/christ_06.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH07)\s*\]/",        "<img src='/img/smiles/christ_07.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH08)\s*\]/",        "<img src='/img/smiles/christ_08.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH09)\s*\]/",        "<img src='/img/smiles/christ_09.gif'>",$cl['text']);

        for($i = 1; $i <= 898; $i++){
            $cl['text'] = preg_replace("/#".numbPok($i)."/", '<a href="javascript:" onclick="win1=window.open(&quot;pokedex.php?sp_id='.$i.'&quot;,&quot;dex&quot;,&quot;width=600,height=600,scrollbars=yes&quot;);"><img src="/img/pkmna/'.numbPok($i).'.gif"></a>',$cl['text']);

            $cl['text'] = preg_replace("/@".numbPok($i)."/", '<a style="color:DarkGoldenrod;" href="javascript:" onclick="win1=window.open(&quot;pokedex.php?sp_id='.$i.'&shine&quot;,&quot;dex&quot;,&quot;width=600,height=600,scrollbars=yes&quot;);"><img width=30,height=30, src="/img/pkmna/shine/'.numbPok($i).'.gif">Shine</a>',$cl['text']);
        }

        $arr = array('umsg'=>$cl['text'],'udate'=>$cl['data'], 'uidp'=>$cl['user'],'usexp'=>infUsr($cl['user'],"sex"),'uidpt'=>$cl['to_user'],'tol'=>infUsr($cl['to_user'],"login"),'uname'=>infUsr($cl['user'],"login"),'unamec'=>colorsUsers(infUsr($cl['user'],"groups")),'toc'=>colorsUsers(infUsr($cl['to_user'],"groups")),'type'=>$type,'uclan'=>infUsr($cl['user'],"clan_id"),'ucolor'=>infUsr($cl['user'],"color") );
        echo json_encode($arr);
    }else{
        $cl['text'] = preg_replace("/\[(KISSED)\s*\]/",    "<img src='/img/smiles/kissed.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(KISSING)\s*\]/",   "<img src='/img/smiles/kiss.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(SMILE)\s*\]/",     "<img src='/img/smiles/smile.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(SAD)\s*\]/",       "<img src='/img/smiles/sad.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(WINK)\s*\]/",      "<img src='/img/smiles/wink.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CRY)\s*\]/",       "<img src='/img/smiles/cray.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(SHOCK)\s*\]/",     "<img src='/img/smiles/shok.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(BLUM)\s*\]/",      "<img src='/img/smiles/blum.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(COOL)\s*\]/",      "<img src='/img/smiles/cool.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(BLUSH)\s*\]/",     "<img src='/img/smiles/blush.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(BIGGRIN)\s*\]/",   "<img src='/img/smiles/biggrin.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(KISSYOU)\s*\]/",   "<img src='/img/smiles/kissyou.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(HMM)\s*\]/",       "<img src='/img/smiles/hmm.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(BRAVO)\s*\]/",     "<img src='/img/smiles/bravo.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CRAZY)\s*\]/",     "<img src='/img/smiles/crazy.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(WACKO)\s*\]/",     "<img src='/img/smiles/wacko.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(BAD)\s*\]/",       "<img src='/img/smiles/bad.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(SECRET)\s*\]/",    "<img src='/img/smiles/secret.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(ROSE)\s*\]/",      "<img src='/img/smiles/rose.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(ACUTE)\s*\]/",     "<img src='/img/smiles/acute.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(JOKINGLY)\s*\]/",  "<img src='/img/smiles/mocking.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(IREFUL)\s*\]/",    "<img src='/img/smiles/ireful.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(IN_LOVE)\s*\]/",   "<img src='/img/smiles/kisscrazy.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(YES)\s*\]/",       "<img src='/img/smiles/yes.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(NO)\s*\]/",        "<img src='/img/smiles/nea.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(THUMBS_UP)\s*\]/", "<img src='/img/smiles/good.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(OK)\s*\]/",        "<img src='/img/smiles/ok.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(SCRATCH)\s*\]/",   "<img src='/img/smiles/scratch.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(DRINK)\s*\]/",     "<img src='/img/smiles/drinks.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CONGRAT)\s*\]/",   "<img src='/img/smiles/congrat.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(DANCE)\s*\]/",     "<img src='/img/smiles/dance.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(WALL)\s*\]/",      "<img src='/img/smiles/wall.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(ROFL)\s*\]/",      "<img src='/img/smiles/rofl.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(PBALL)\s*\]/",     "<img src='/img/smiles/pball.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(FLAG)\s*\]/",      "<img src='/img/smiles/flag.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(FACEPALM)\s*\]/",     "<img src='/img/smiles/facepalm.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(SOS)\s*\]/",     "<img src='/img/smiles/sos.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(HEART)\s*\]/",     "<img src='/img/smiles/heart.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(HI)\s*\]/",        "<img src='/img/smiles/hi.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(Хэллоувин)\s*\]/",        "<img src='/img/smiles/pumpkin.gif'>",$cl['text']);

        // Christmass smiles by WTERH
        $cl['text'] = preg_replace("/\[(CH01)\s*\]/",        "<img src='/img/smiles/christ_01.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH02)\s*\]/",        "<img src='/img/smiles/christ_02.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH03)\s*\]/",        "<img src='/img/smiles/christ_03.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH04)\s*\]/",        "<img src='/img/smiles/christ_04.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH05)\s*\]/",        "<img src='/img/smiles/christ_05.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH06)\s*\]/",        "<img src='/img/smiles/christ_06.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH07)\s*\]/",        "<img src='/img/smiles/christ_07.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH08)\s*\]/",        "<img src='/img/smiles/christ_08.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(CH09)\s*\]/",        "<img src='/img/smiles/christ_09.gif'>",$cl['text']);

        $cl['text'] = preg_replace("/\[(GAMERR)\s*\]/",        "<img src='/img/smiles/gamer.gif'>",$cl['text']);
        $cl['text'] = preg_replace("/\[(AGRRS)\s*\]/",               "<img src='/img/smiles/aggress.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(AHGGM)\s*\]/",               "<img src='/img/smiles/ahgm.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(AANG)\s*\]/",                "<img src='/img/smiles/angel.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(BOMMMMB)\s*\]/",                "<img src='/img/smiles/bomb.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(BORDING)\s*\]/",                "<img src='/img/smiles/boring.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(BOOLLY)\s*\]/",                "<img src='/img/smiles/bully.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(BYESO)\s*\]/",                "<img src='/img/smiles/bye.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(DANCEDE)\s*\]/",                "<img src='/img/smiles/dancee.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(DIABLIO)\s*\]/",                "<img src='/img/smiles/diablo.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(EMPAYTHY)\s*\]/",                "<img src='/img/smiles/empathy.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(FODOL)\s*\]/",                "<img src='/img/smiles/fool.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(HAHPlA)\s*\]/",                "<img src='/img/smiles/haha.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(HEBRE)\s*\]/",                "<img src='/img/smiles/here.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(HIDTE)\s*\]/",                "<img src='/img/smiles/hide.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(IAMSASO)\s*\]/",                "<img src='/img/smiles/iamso.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(LOIOL)\s*\]/",                "<img src='/img/smiles/lol.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(MADDD)\s*\]/",                "<img src='/img/smiles/mad.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(MALFIL)\s*\]/",               "<img src='/img/smiles/mail.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(MAKAMBA)\s*\]/",               "<img src='/img/smiles/mamba.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(MUISIC)\s*\]/",               "<img src='/img/smiles/music.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(newrOg)\s*\]/",               "<img src='/img/smiles/new_russ.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(nyaMMm)\s*\]/",               "<img src='/img/smiles/nyam.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(PARDORN)\s*\]/",               "<img src='/img/smiles/pardon.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(ROILL)\s*\]/",               "<img src='/img/smiles/roll.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(RUNNN)\s*\]/",               "<img src='/img/smiles/run.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(SCADRE)\s*\]/",               "<img src='/img/smiles/scare.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(SEAVARCH)\s*\]/",               "<img src='/img/smiles/search.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(SHOLIUT)\s*\]/",               "<img src='/img/smiles/shout.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(SORRPRY)\s*\]/",               "<img src='/img/smiles/sorry.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(SSTOOEP)\s*\]/",               "<img src='/img/smiles/stop.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(TADAMA)\s*\]/",               "<img src='/img/smiles/tada.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(TRPAP)\s*\]/",               "<img src='/img/smiles/tap.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(TWIDDLWLE)\s*\]/",               "<img src='/img/smiles/twiddle.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(UNKNWES)\s*\]/",               "<img src='/img/smiles/unknown.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(AGOGH)\s*\]/",        "<img src='/img/smiles/aggh.gif'>",$cl['text']);
         $cl['text'] = preg_replace("/\[(YAHOORSH)\s*\]/",             "<img src='/img/smiles/yahoo.gif'>",$cl['text']);
        for ($i = 1; $i <= 898; $i++){
            $cl['text'] = preg_replace("/#".numbPok($i)."/", '<a href="javascript:" onclick="win1=window.open(&quot;pokedex.php?sp_id='.$i.'&quot;,&quot;dex&quot;,&quot;width=600,height=600,scrollbars=yes&quot;);"><img src="/img/pkmna/'.numbPok($i).'.gif"></a>',$cl['text']);
                    $cl['text'] = preg_replace("/@".numbPok($i)."/", '<a style="color:DarkGoldenrod;" href="javascript:" onclick="win1=window.open(&quot;pokedex.php?sp_id='.$i.'&shine&quot;,&quot;dex&quot;,&quot;width=600,height=600,scrollbars=yes&quot;);"><img width=30,height=30, src="/img/pkmna/shine/'.numbPok($i).'.gif">Shine</a>',$cl['text']);

        }
        $arr = array('umsg'=>$cl['text'],'udate'=>$cl['data'], 'uidp'=>$cl['user'], 'usexp'=>infUsr($cl['user'],"sex"),'tol'=>infUsr($cl['to_user'],"login"),'uname'=>infUsr($cl['user'],"login"),'unamec'=>colorsUsers(infUsr($cl['user'],"groups")),'toc'=>colorsUsers(infUsr($cl['to_user'],"groups")),'type'=>$type,'uclan'=>infUsr($cl['user'],"clan_id"),'ucolor'=>infUsr($cl['user'],"color") );
        echo json_encode($arr);
    }
}}
?>
