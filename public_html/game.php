<?php
session_start();
header("Cache-control: public");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 60 * 60 * 24) . " GMT");
header('Content-Type: text/html; charset=utf-8');
include('ando/bsqldate/dbconsql.php');

if (isset($_GET['fun']) && (preg_match("|^[a-z_-]+$|i", $_GET['fun']))) {
    $go = escapeMe($_GET['fun']);
    #Проверка на активность сессии
    if (empty($_SESSION['user_id'])) {
        echo "<script>location.href='..';</script>";
        return;
    }
    include('ando/functions/game.functions.php');

    #Выход
    switch ($go) {
        case 'logout':
            echo '<title>Pokezone > Выход</title>';
            $mysqli->query("UPDATE users SET online = 0 WHERE id = " . escapeMe($_SESSION['user_id']));
            unset($_SESSION['user_id']);
            echo "<script>location.href='..';</script>";
            break;
        case 'police':
            $title = 'Pokezone > Полицейский участок';
            error_reporting(-1);
            include __DIR__ . "/ando/tpl/shapka.php";
            include "ando/tpl/police.php";
            break;
        case 'start':
            $title = 'Pokezone > Приветствие';
            include "ando/tpl/shapka.php";
            include "ando/tpl/start.php";
            break;
        case 'map':
            include "ando/tpl/map.php";
            break;
        case 'sex':
            include "ando/tpl/pok_locations.php";
            break;
        case 'm_online':
            include "ando/tpl/online.php";
            break;
        case 'm_location':
            if ($user['status'] == 'talking') {
                $mysqli->query("UPDATE users SET status='free' WHERE id = " . $user['id']);
            }
            include "ando/tpl/loc.php";
            break;
        case 'chat':
            include "ando/tpl/chat.php";
            break;
        case 'onl_log':
            include "ando/tpl/onllog.php";
            break;
        case 'chat_log':
            include "ando/tpl/chatlog.php";
            break;
        case 'm_input':
            include "ando/tpl/input.php";
            break;
        case 'm_npc':
            $npcid = trim(htmlspecialchars($_GET['npc_id']));
            if ($npcid == 8) {
                if ($user['status'] == 'free') {
                    $mysqli->query("UPDATE users SET status='talking' WHERE id = " . $user['id']);
                }
                include "ando/tpl/npc.php";
            } else {
                $iNPC = $mysqli->query("SELECT * FROM base_npc WHERE `id` = '" . $npcid . "'")->fetch_assoc();
                if ($user['location'] == $iNPC['location']) {
                    if ($user['status'] == 'free') {
                        $mysqli->query("UPDATE users SET status='talking' WHERE id = " . $user['id']);
                    }
                    include "ando/tpl/npc.php";
                } else {
                    echo "<script>location.href='..';</script>";
                    return;
                }
            }
            break;
        case 'pokemons':
            $count_pok = $mysqli->query('SELECT  COUNT(DISTINCT basenum) as counts FROM user_pokemons WHERE user_id = ' . escapeMe($_SESSION['user_id']))->fetch_assoc();
            $mysqli->query('UPDATE users SET count_pok = ' . $count_pok['counts'] . ' WHERE id = ' . escapeMe($_SESSION['user_id']));
            $count_shine_pok = $mysqli->query('SELECT  COUNT(DISTINCT basenum) as counts FROM user_pokemons WHERE type="shine" AND user_id = ' . escapeMe($_SESSION['user_id']))->fetch_assoc();
            $mysqli->query('UPDATE users SET count_shine_pok = ' . $count_shine_pok['counts'] . ' WHERE id = ' . escapeMe($_SESSION['user_id']));
            $title = 'Pokezone > Покемоны';
            include "ando/tpl/shapka.php";
            include "ando/tpl/pokemons.php";
            break;
        case 'p_base':
            include "ando/tpl/p_base.php";
            break;
        case 'p_aa':
            include "ando/tpl/p_aa.php";
            break;
        case 'items':
            include "ando/tpl/items.php";
            break;
        case 'use_item':
            include "ando/functions/items.functions.php";
            break;
        case 'tren':
            $title = 'Pokezone > Тренеры';
            include "ando/tpl/shapka.php";
            include "ando/tpl/treners.php";
            break;
        case 'lotery':
            $title = 'Pokezone > Лотерея';
            include "ando/tpl/shapka.php";
            include "ando/tpl/lotery.php";
            break;
        case 'treninf':
            include "ando/tpl/tren_card.php";
            break;
        case 'fight':
            // http://Pokezone.ru/game.php?fun=fight&type=atk&atnum=1
            include "ando/tpl/battle.php";
            break;
        case 'view_fight':
            include "ando/tpl/viewfight.php";
            break;
        case 'profile':
            $title = 'Pokezone > Профиль';
            include "ando/tpl/shapka.php";
            include "ando/tpl/profile.php";
            break;
        case 'daily':
            $title = 'Pokezone > Бонус';
            include "ando/tpl/shapka.php";
            include "ando/tpl/daily.php";
            break;
        case 'pokRedact':
            $title = 'AddPokemon Panel';
            include "ando/tpl/admin/pokemonredact.php";
            break;
        case 'anus':
            include "ando/tpl/anus.php";
            break;
        case 'pokR':
            $title = 'AddPokemon Panel';
            include "ando/tpl/admin/pokemonr.php";
            break;
        case 'pokAtk':
            include "ando/tpl/admin/pokemonatk.php";
            break;
        case 'pearljam':
            $title = 'Pokezone > Жемчужный магазин';
            include "ando/tpl/shapka.php";
            include "ando/tpl/pearljam.php";
            break;
        case 'clans':
            $title = 'Pokezone > Кланы';
            include "ando/tpl/shapka.php";
            include "ando/tpl/clans.php";
            break;
        case 'auk':
            $title = 'Pokezone > Аукцион';
            include "ando/tpl/shapka.php";
            include "ando/tpl/auk.php";
            break;
        case 'journal':
            $title = 'Pokezone > Дневник';
            include "ando/tpl/shapka.php";
            include "ando/tpl/journal.php";
            break;
        case 'claninf':
            include "ando/tpl/clan_card.php";
            break;
        case 'pokloc':
            include "ando/tpl/pokloc.php";
            break;
        case 'poklocation':
            include "ando/tpl/poklocation.php";
            break;
        case 'm_trade_work':
            include "ando/tpl/trade.php";
            break;
        case 'm_trade_log':
            include "ando/tpl/trade_log.php";
            break;
        case 'm_breed':
            include "ando/tpl/breed.php";
            break;
            //    }else
            //        if($go == 'bonus'){
            //      $title = 'Pokezone > Черный рынок'; 
            //    include "ando/tpl/shapka.php";
            //  include "ando/tpl/bonus.php";
        case 'buy':
            $title = 'Pokezone > Покупка жемчуга';
            include "ando/tpl/shapka.php";
            include "ando/tpl/buy.php";
            break;
        case 'pokeinf':
            include "ando/tpl/pok_inf.php";
            break;
        case 'dexform':
            include "ando/tpl/dexform.php";
            break;
        case 'eggaform':
            include "ando/tpl/eggaform.php";
            break;
        case 'panelpok':
            include "ando/tpl/admin/pokpanel.php";
            break;
        case 'addpok':
            include 'ando/tpl/admin/addpok.php';
            break;
        case 'insertpok':
            include 'ando/tpl/admin/insertpok.php';
            break;
        case 'locform':
            include "ando/tpl/locform.php";
            break;
        case 'atkform':
            include "ando/tpl/atkform.php";
            break;
        case 'zp':
            include "ando/tpl/zp.php";
            break;
        case 'kp_form':
            include "ando/tpl/kp_form";
            break;
        case 'messages':
            $title = 'Pokezone > Почта';
            include "ando/tpl/shapka.php";
            include "ando/tpl/sends.php";
            break;
        case 'transfer':
            $title = 'Pokezone > Перенос';
            include "ando/tpl/shapka.php";
            include "ando/tpl/transfer.php";
            break;
        case 'admin':
            include "admin/index.php";
            break;
        case 'clan_order':
            if (isset($_SESSION['clan_order'])) {
                $title = 'Pokezone > Создание клана';
                include "ando/tpl/clan_order.php";
            } else {
                echo "<script>alert('Ошибка при создании клана. Обратитесь к Администрации!')</script>";
                echo "<script>window.location.href='..';</script>";
                exit;
            }
            break;

        default:
            echo "<script>location.href='..';</script>";
            break;
    }
} else {
    echo "<script>location.href='..';</script>";
}
