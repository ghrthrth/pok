<?php
error_reporting(0);
function numbPok($val)
{
  if ($val < 10) {
    $dpl = "00";
  } else
if ($val < 100 and $val >= 10) {
    $dpl = "0";
  } else {
    $dpl = "";
  }
  return $dpl . $val;
}

#Очищает текст от ненужных символов
function obTxt($text)
{
  global $mysqli;
  $text = trim($text);
  $text = stripslashes($text);
  $text = htmlspecialchars($text);
  $text = mysqli_real_escape_string($mysqli, $text);
  return $text;
}
#Очищает числа от ненужных символов
function obr_chis($chs)
{
  global $mysqli;
  $chs = ceil($chs);
  $chs = abs($chs);
  $chs = stripslashes($chs);
  $chs = htmlspecialchars($chs);
  $chs = trim($chs);
  $chs = mysqli_real_escape_string($mysqli, $chs);
  return $chs;
}
$switch1arp = 0;
if ($switch1arp == 0) {
  #Определяет статус игрока
  function textGroup($a)
  {
    switch ($a) {
      case 1:
        $txt = "Администрация Pokezone";
        break;
      case 2:
        $txt = "Полиция";
        break;
      case 2.1:
        $txt = "Старший должностной";
        break;
      case 2.5:
        $txt = "Куратор Турниров";
        break;
      case 3:
        $txt = "Модератор";
        break;
      case 3.1:
        $txt = "Стажер Модератора";
        break;
      case 4:
        $txt = "Наставник";
        break;
      case 5:
        $txt = "Гим-Лидер";
        break;
      case 5.1:
        $txt = "Гим-Лидер, Стадион Тьмы";
        break;
      case 5.2:
        $txt = "Гим-Лидер, Стадион Стали";
        break;
      case 5.3:
        $txt = "Гим-Лидер, Стадион Дождя";
        break;
      case 5.4:
        $txt = "Гим-Лидер, Стадион Ветра";
        break;
      case 5.5:
        $txt = "Гим-Лидер, Огненный Стадион";
        break;
      case 5.6:
        $txt = "Гим-Лидер, Стадион Иллюзий";
        break;
      case 5.7:
        $txt = "Редактор";
        break;
      case 5.8:
        $txt = "Гим-Лидер, Стадион Земли";
        break;
      case 6:
        $txt = "Пользователь";
        break;
      case 6.1:
        $txt = "Официальный контестный бот";
        break;
      case 7:
        $txt = "Заключенный";
        break;
      case 10:
        $txt = "Забаненный";
        break;
      case 8:
        $txt = "Тестовый аккаунт";
        break;
      case 99:
        $txt = "Система";
        break;
      default:
        $txt = "Пользователь";
        break;
    }

    return $txt;
  }
  #Определяет цвет игрока по группе
  function colorsUsers($group)
  {
    switch ($group) {
      case 1:
        $color_gr = "#056C00";
        break; //Админы
      case 2:
        $color_gr = "#970000";
        break; //Полиция
      case 2.1:
        $color_gr = "#19917d";
        break; //Полиция
      case 2.5:
        $color_gr = "#CC3E01";
        break; //Куратор турнира
      case 3:
        $color_gr = "#000080";
        break; //Мoдераторы
      case 3.1:
        $color_gr = "#4682B4";
        break; //Стажер Модератора
      case 4:
        $color_gr = "#881a98";
        break; //Наставники
      case 5:
        $color_gr = "#a38e14";
        break; //Гим-лидеры
      case 5.1:
        $color_gr = "#a38e14";
        break; //Гим-лидеры
      case 5.2:
        $color_gr = "#a38e14";
        break; //Гим-лидеры 
      case 5.3:
        $color_gr = "#a38e14";
        break; //Гим-лидеры 
      case 5.4:
        $color_gr = "#a38e14";
        break; //Гим-лидеры
      case 5.5:
        $color_gr = "#a38e14";
        break; //Гим-лидеры 
      case 5.6:
        $color_gr = "#a38e14";
        break; //Гим-лидеры 
      case 5.8:
        $color_gr = "#a38e14";
        break; //Гим-лидеры
      case 5.7:
        $color_gr = "#19917d";
        break; //Редакторы
      case 6:
        $color_gr = "#000000";
        break; //Пользователи
      case 6.1:
        $color_gr = "#000000";
        break; //Пользователи
      case 8:
        $color_gr = "#26c7b4";
        break; //Тестеры
      case 7:
        $color_gr = "#808080";
        break; //Заключенные
      case 10:
        $color_gr = "#7E7E7";
        break; //Забаненые
      case 99:
        $color_gr = "red";
        break; //Система
      default:
        $color_gr = "#1E3955";
        break; //Юзеры

    }
    return $color_gr;
  }
  #Определяет цвет текста в чате
  function setTextColor($value)
  {
    switch ($value) {
      case '1':
        $color = "000000";
        break; //Черный
      case '2':
        $color = "D20000";
        break; //Красный
      case '3':
        $color = "429146";
        break; //Зелёный
      case '4':
        $color = "747474";
        break; //Серый
      case '5':
        $color = "B47516";
        break; //Оранжевый
      case '6':
        $color = "131771";
        break; //Тёмно-синий
      case '7':
        $color = "E40797";
        break; //Розовый
      default:
        $color = "000000";
        break; //Чёрный
    }
    return $color;
  }
  #Функция определяет популярность игрока
  function reputation($winprc, $population)
  {
    if ($population < 100) {
      return;
    }
    if ($winprc >= 0 && $winprc <= 19 && $population < 4000) {
      $rang = "Ньюби";
    }
    if ($winprc >= 20 && $winprc <= 29 && $population < 4000) {
      $rang = "Ученик";
    }
    if ($winprc >= 30 && $winprc <= 59 && $population < 4000) {
      $rang = "Тренер";
    }
    if ($winprc >= 60 && $winprc <= 69 && $population < 4000) {
      $rang = "Покемастер";
    }
    if ($winprc >= 70 && $winprc <= 79 && $population < 4000) {
      $rang = "Покепрофи";
    }
    if ($winprc >= 80 && $winprc <= 89 && $population < 4000) {
      $rang = "Чемпион";
    }
    if ($winprc >= 90 && $winprc <= 99 && $population < 4000) {
      $rang = "Гуру";
    }
    if ($winprc == 100 && $population < 4000) {
      $rang = "и Непобедимый";
    }
    if ($winprc >= 0 && $winprc <= 49 && $population >= 4000) {
      $rang = "Отверженец";
    }
    if ($winprc >= 50 && $winprc <= 79 && $population >= 4000) {
      $rang = "Чемпион";
    }
    if ($winprc >= 80 && $winprc <= 89 && $population >= 4000) {
      $rang = "Гуру";
    }
    if ($winprc >= 90 && $winprc <= 99 && $population >= 4000) {
      $rang = "Мудрец";
    }
    if ($winprc == 100 && $population >= 4000) {
      $rang = "и Непобежденный";
    }
    return $rang;
  }
  function winpr($winpr)
  {
    $winprc = round($user['win'] / $user['btl_count'] * 100);
  }
  #Функция определяет популярность игрока
  function population($reputation, $population)
  {
    //$rang = "Новичок";
    $reputation = $population;
    if ($population >= 0 && $population < 100  && $reputation < 100) {
      $rang = "Новичок";
    }
    if ($population >= 100 && $population <= 250  && $reputation <= 250) {
      $rang = "Начинающий";
    }
    if ($population >= 251 && $population <= 400  && $reputation <= 400) {
      $rang = "Неизвестный";
    }
    if ($population >= 401 && $population <= 900  && $reputation <= 900) {
      $rang = "Узнаваемый";
    }
    if ($population >= 901 && $population <= 1600  && $reputation <= 1600) {
      $rang = "Известный";
    }
    if ($population >= 1601 && $population <= 2500 && $reputation <= 2500) {
      $rang = "Знаменитый";
    }
    if ($population >= 2501 && $population <= 5000  && $reputation <= 5000) {
      $rang = "Выдающийся";
    }
    if ($population >= 5001 && $population <= 10000  && $reputation <= 10000) {
      $rang = "Прославленный";
    }
    if ($population >= 10001 && $population <= 25000  && $reputation <= 25000) {
      $rang = "Величайший";
    }
    if ($population >= 25001 && $population <= 100000  && $reputation <= 100000) {
      $rang  = "Бессмертный";
    }
    if ($population > 100000 && $reputation > 100000) {
      $rang = "Легендарный";
    }
    return $rang;
  }
} //else{    //Hallowin start
//   #Определяет статус игрока
// function textGroup($a){
//       if($a == 1) $txt = "Пользователь";
//   elseif($a == 2) $txt = "Заключенный";
//   elseif($a == 2.1) $txt = "Старший должностной";
//   elseif($a == 2.5)$txt = "Куратор Турниров";
//   elseif($a == 3) $txt = "Администрация OldPokemon";
//   elseif($a == 3.1) $txt = "Стажер Модератора";
//   elseif($a == 4) $txt = "Полиция";
//   elseif($a == 5) $txt = "Гим-Лидер";
//   elseif($a == 5.1) $txt = "Гим-Лидер, Стадиона Ночника";
//   elseif($a == 5.2) $txt = "Гим-Лидер, Стадион Железки";
//   elseif($a == 5.3) $txt = "Гим-Лидер, Стадион Золотого Дождя";
//   elseif($a == 5.4) $txt = "Гим-Лидер, Стадион Шептуна";
//   elseif($a == 5.5) $txt = "Гим-Лидер, Стадион Зажигалки";
//   elseif($a == 5.6) $txt = "Гим-Лидер, Стадион LCD";
//   elseif($a == 5.7) $txt = "Редактор";
//   elseif($a == 5.8) $txt = "Гим-Лидер, Стадион Юпитера";
//   elseif($a == 6) $txt = "Модератор";
//     elseif($a == 6.1) $txt = "Официальный контестный бот";
//   elseif($a == 7) $txt = "Заключенный";
//   elseif($a == 10)$txt = "Забаненный";
//   elseif($a == 8) $txt = "Тестовый аккаунт";
//   elseif($a == 99)$txt = "Система";
//   else            $txt = "Пользователь";

//  return $txt;
// }
// #Определяет цвет игрока по группе
// function colorsUsers($group){
//         if ($group == 1 )  $color_gr = "#000000"; //Админы
//     elseif ($group == 2)  $color_gr = "#808080"; //Полиция
//     elseif ($group == 2.1)  $color_gr = "#19917d"; //Полиция
//     elseif ($group == 2.5) $color_gr = "#CC3E01"; //Куратор турнира
//     elseif ($group == 3)  $color_gr = "#056C00"; //Мoдераторы
//     elseif ($group == 3.1)  $color_gr = "#4682B4"; //Стажер Модератора
//     elseif ($group == 4)  $color_gr = "#970000"; //Наставники
//     elseif (($group == 5) or ($group == 5.1) or ($group == 5.2) or ($group == 5.3) or ($group == 5.4) or ($group == 5.5) or ($group == 5.6) or ($group == 5.8))  $color_gr = "red"; //Гим-лидеры
//     elseif ($group == 5.7)  $color_gr = "#19917d"; //Редакторы
//     elseif ($group == 6)  $color_gr = "#000080"; //Пользователи
//     elseif ($group == 6.1)  $color_gr = "#000000"; //Пользователи
//     elseif ($group == 8)  $color_gr = "#26c7b4"; //Тестеры
//     elseif ($group == 7)  $color_gr = "#808080"; //Заключенные
//     elseif ($group == 10) $color_gr = "#7E7E7"; //Забаненые
//     elseif ($group == 99) $color_gr = "red"; //Система
//     else                  $color_gr = "#1E3955"; //Юзеры
//  return $color_gr;
// }
// #Определяет цвет текста в чате
// function setTextColor($value){
//         if ($value == '1')  $color = "000000"; //Черный
//     elseif ($value == '2')  $color = "D20000"; //Красный
//     elseif ($value == '3')  $color = "429146"; //Зелёный
//     elseif ($value == '4')  $color = "747474"; //Серый
//     elseif ($value == '5')  $color = "B47516"; //Оранжевый
//     elseif ($value == '6')  $color = "131771"; //Тёмно-синий
//     elseif ($value == '7')  $color = "E40797"; //Розовый
//     else $color = "000000"; //Чёрный
//  return $color;
// }
// #Функция определяет популярность игрока
// function reputation($winprc, $population){
//   if($population < 100){return;}
//   if($winprc>= 0 && $winprc <= 19 && $population < 4000 ){$rang = "Черепок";}
//   if($winprc>= 20 && $winprc <= 29 && $population < 4000 ){$rang = "Мистер Майм";}
//   if($winprc>= 30 && $winprc <= 59 && $population < 4000 ){$rang = "Генадий";}
//   if($winprc>= 60 && $winprc <= 69 && $population < 4000 ){$rang = "Смехмастер";}
//   if($winprc>= 70 && $winprc <= 79 && $population < 4000 ){$rang = "Клоун";}
//   if($winprc>= 80 && $winprc <= 89 && $population < 4000 ){$rang = "Катерпи";}
//   if($winprc>= 90 && $winprc <= 99 && $population < 4000 ){$rang = "Котелок";}
//   if($winprc== 100 && $population < 4000 ){$rang = "и Непобедимый";}
//   if($winprc>= 0 && $winprc <= 49 && $population >= 4000 ){$rang = "Отверженец";}
//   if($winprc>= 50 && $winprc <= 79 && $population >= 4000 ){$rang = "Чемпион";}
//   if($winprc>= 80 && $winprc <= 89 && $population >= 4000  ){$rang = "Гуру";}
//   if($winprc>= 90 && $winprc <= 99 && $population >= 4000 ){$rang = "Мудрец";}
//   if($winprc== 100 && $population >= 4000 ){$rang = "и Непобежденный";}
//   return $rang;
// }
// function winpr ($winpr){
// $winprc = round($user['win']/$user['btl_count']*100);
// }
// #Функция определяет популярность игрока
// function population($reputation, $population){
//    //$rang = "Новичок";
//    $reputation=$population;
//    if($population >= 0 && $population < 100  && $reputation < 100){$rang = "Ламер";}
//    if($population >= 100 && $population <= 250  && $reputation <= 250){$rang = "Только начавший";}
//    if($population >= 251 && $population <= 400  && $reputation <= 400){$rang = "Какой - то";}
//    if($population >= 401 && $population <= 900  && $reputation <= 900){$rang = "Где - то увиданный";}
//    if($population >= 901 && $population <= 1600  && $reputation <= 1600){$rang = "Селебрити";}
//    if($population >= 1601 && $population <= 2500 && $reputation <= 2500){$rang = "Таких мало";}
//    if($population >= 2501 && $population <= 5000  && $reputation <= 5000){$rang = "Выдающийся";}
//    if($population >= 5001 && $population <= 10000  && $reputation <= 10000){$rang = "Прославленный";}
//    if($population >= 10001 && $population <= 25000  && $reputation <= 25000){$rang = "Величайший";}
//    if($population >= 25001 && $population <= 100000  && $reputation <= 100000){$rang  = "Бессмертный";}
//    if($population > 100000 && $reputation > 100000){$rang = "Легендарный";}
//    return $rang;
// }
// }
#Определяет количество опыта для поднятия уровня
function level_exp($lvl)
{
  return round((55 * exp(2 + $lvl / 11.4616806) - 50) / 2);
}
#Определяет ширину полосы опыта
function lvl_polos($lvl, $exp)
{
  $exp_my = $exp;
  $a = level_exp($lvl);
  if ($lvl == 1)  $b = 0;
  else $b = level_exp($lvl - 1);
  $c = $a - $b;
  $d = $a - $exp_my;
  $e = $c / 100;
  $f = $d / $e;
  return $exp_z = 100 - $f;
}
#функция лвла
function lvl_polostren($lvl, $exp)
{
  $exp_my = $exp;
  $a = level_exp($lvl);
  if ($lvl == 1)  $b = 0;
  else $b = level_exp($lvl - 1);
  $c = $a - $b;
  $d = $a - $exp_my;
  $e = $c / 100;
  $f = $d / $e;
  return $exp_z = 100 - $f;
}
#Определяет цвет полосы HP
function colorHPbar($hp)
{
  if ($hp <= 50 && $hp > 20) {
    $color = 'orange';
  } elseif ($hp <= 20) {
    $color = 'red';
  } else {
    $color = "green";
  }
  return $color;
}
#Определяет последнее посещение
function get_last_online($date)
{
  $date_time_array = getdate($date);
  $string = $date_time_array['year'] . '-' . $date_time_array['mon'] . '-' . $date_time_array['mday'] . ' ' . $date_time_array['hours'] . ':' . $date_time_array['minutes'] . ':' . $date_time_array['seconds'];
  return $string;
}

/* Функции связанные с айтемами */
#Определяет наличие предмета
function item_isset($item_id, $count, $users = false)
{
  global $mysqli;
  if (empty($users)) $users = $_SESSION['user_id'];
  $i = $mysqli->query('SELECT * FROM user_items WHERE user_id = ' . $users . ' AND item_id = ' . $item_id . ' AND count >= ' . $count);
  if ($i->num_rows > 0) {
    return true;
  } else {
    return false;
  }
}
#Отнимает предмет
function minus_item($count, $item_id, $user = false)
{
  global $mysqli;
  if ($user == false) $user = $_SESSION['user_id'];
  $item = $mysqli->query('SELECT * FROM user_items WHERE user_id = ' . $user . ' AND item_id = ' . $item_id . ' AND count >= ' . $count);
  if ($item->num_rows > 0) {
    $items = $item->fetch_assoc();
    if ($items['count'] > $count) {
      $x = $items['count'] - $count;
      $mysqli->query('UPDATE user_items SET count = "' . $x . '" WHERE item_id = ' . $item_id . ' AND user_id = ' . $user);
    } else {
      $mysqli->query('DELETE FROM user_items WHERE item_id = ' . $item_id . ' AND user_id = ' . $user);
    }
  } else {
    echo "<script>alert('Недостаточно предметов!');</script>";
    echo "<script>location.href='..';</script>";
  }
}
#Добавляет предмет
function plus_item($count, $item_id, $user = false)
{
  global $mysqli;
  if ($user == false) $user = $_SESSION['user_id'];
  $items = $mysqli->query('SELECT * FROM user_items WHERE user_id = ' . $user . ' AND item_id = ' . $item_id . ' AND count > 0 ')->fetch_assoc();
  if ($items) {
    $x = $items['count'] + $count;
    $mysqli->query('UPDATE user_items SET count = "' . $x . '" WHERE item_id = ' . $item_id . ' AND user_id = ' . $user);
  } else {
    $mysqli->query("INSERT INTO user_items (user_id , item_id , count) VALUES ('" . $user . "','" . $item_id . "','" . $count . "') ");
  }
}

function upt_item($kachestvo, $item_id, $user = false)
{
    global $mysqli;
    if ($user == false) $user = $_SESSION['user_id'];
//    $kach = $mysqli->query('SELECT * FROM user_items WHERE user_id = ' . $user . ' AND kachestvo = ' . $kachestvo )->fetch_assoc();
//    if ($kach['kachestvo'] != "") {
        //$mysqli->query('UPDATE user_items SET kachestvo = "' . $kachestvo . '" WHERE item_id = ' . $item_id . ' AND user_id = ' . $user);
        //$kach['kachestvo'] = $kachestvo;
        $mysqli->query('UPDATE user_items SET kachestvo = "' . $kachestvo . '" WHERE item_id = ' . $item_id . ' AND user_id = ' . $user);
//    } else {
//$mysqli->query("INSERT INTO user_items (user_id , item_id , kachestvo) VALUES ('" . $user . "','" . $item_id . "','" . $kachestvo . "') ");
 //   }
}

/*function plus_item($count,$item_id,$user=false,$timedel){ // Функция с колокольчиками.
  global $mysqli;
  if($user == false) $user = $_SESSION['user_id'];
  $items = $mysqli->query('SELECT * FROM user_items WHERE user_id = '.$user.' AND item_id = '.$item_id.' AND count > 0 ')->fetch_assoc();
    if($items){
      $x = $items['count'] + $count;
      $mysqli->query('UPDATE user_items SET count = "'.$x.'" WHERE item_id = '.$item_id.' AND user_id = '.$user);
    }else{
       $mysqli->query("INSERT INTO user_items (user_id , item_id , count) VALUES ('".$user."','".$item_id."','".$count."') ");
    }
}*/
/*Функция работы с покемонами*/
#Добавления покемона @return _insert
function plus_pok($basenum, $user_id = false)
{
  global $mysqli;
  $mysqli->query('INSERT INTO `user_pokemons` ( user_id, basenum, numbpu, name, character, lvl, date_get, active, type, )');
}
#Формула статов
function stats($id, $tip, $user = false)
{
  global $mysqli;
  if ($user == false) $user = $_SESSION['user_id'];
  $pok = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = ' . $user . ' AND id = ' . $id)->fetch_assoc();
  $pok_base = $mysqli->query('SELECT * FROM base_pokemon WHERE id = "' . $pok['basenum'] . '"')->fetch_assoc();
  $har = $mysqli->query('SELECT * FROM har WHERE id_har = ' . $pok['character'])->fetch_assoc();

  if ($tip == 'hp') {
    $stat = (($pok_base['hp'] * 2) + $pok['hp_gen'] + ($pok['hp_ev'] / 2)) * ($pok['lvl'] / 100) + 10 + $pok['lvl'];
  } elseif ($tip == 'attack') {
    $stat = (($pok_base['atk'] * 2 + $pok['atc_gen'] + ($pok['atc_ev'] / 2)) * $pok['lvl'] / 100 + 5) * $har['atk'];
    if ($pok['trn_stat'] == 1) {
      switch ($pok['trn']) {
        case 1:
          $stat = ($stat / 100) * 110;
          break;
        case 2:
          $stat = ($stat / 100) * 118;
          break;
        case 3:
          $stat = ($stat / 100) * 125;
          break;
        case 4:
          $stat = ($stat / 100) * 131;
          break;
        case 5:
          $stat = ($stat / 100) * 136;
          break;
        case 6:
          $stat = ($stat / 100) * 140;
          break;
      }
    }
  } elseif ($tip == 'defense') {
    $stat = (($pok_base['def'] * 2 + $pok['def_gen'] + ($pok['def_ev'] / 2)) * $pok['lvl'] / 100 + 5) * $har['def'];
    if ($pok['trn_stat'] == 2) {
      switch ($pok['trn']) {
        case 1:
          $stat = ($stat / 100) * 110;
          break;
        case 2:
          $stat = ($stat / 100) * 118;
          break;
        case 3:
          $stat = ($stat / 100) * 125;
          break;
        case 4:
          $stat = ($stat / 100) * 131;
          break;
        case 5:
          $stat = ($stat / 100) * 136;
          break;
        case 6:
          $stat = ($stat / 100) * 140;
          break;
      }
    }
  } elseif ($tip == 'speed') {
    $stat = (($pok_base['spd'] * 2 + $pok['speed_gen'] + ($pok['speed_ev'] / 2)) * $pok['lvl'] / 100 + 5) * $har['speed'];
    if ($pok['trn_stat'] == 3) {
      switch ($pok['trn']) {
        case 1:
          $stat = ($stat / 100) * 110;
          break;
        case 2:
          $stat = ($stat / 100) * 118;
          break;
        case 3:
          $stat = ($stat / 100) * 125;
          break;
        case 4:
          $stat = ($stat / 100) * 131;
          break;
        case 5:
          $stat = ($stat / 100) * 136;
          break;
        case 6:
          $stat = ($stat / 100) * 140;
          break;
      }
    }
  } elseif ($tip == 'sp_attack') {
    $stat = (($pok_base['satk'] * 2 + $pok['spatc_gen'] + ($pok['spatc_ev'] / 2)) * $pok['lvl'] / 100 + 5) * $har['satk'];
    if ($pok['trn_stat'] == 4) {
      switch ($pok['trn']) {
        case 1:
          $stat = ($stat / 100) * 110;
          break;
        case 2:
          $stat = ($stat / 100) * 118;
          break;
        case 3:
          $stat = ($stat / 100) * 125;
          break;
        case 4:
          $stat = ($stat / 100) * 131;
          break;
        case 5:
          $stat = ($stat / 100) * 136;
          break;
        case 6:
          $stat = ($stat / 100) * 140;
          break;
      }
    }
  } elseif ($tip == 'sp_defense') {
    $stat = (($pok_base['sdef'] * 2 + $pok['spdef_gen'] + ($pok['spdef_ev'] / 2)) * $pok['lvl'] / 100 + 5) * $har['sdef'];
    if ($pok['trn_stat'] == 5) {
      switch ($pok['trn']) {
        case 1:
          $stat = ($stat / 100) * 110;
          break;
        case 2:
          $stat = ($stat / 100) * 118;
          break;
        case 3:
          $stat = ($stat / 100) * 125;
          break;
        case 4:
          $stat = ($stat / 100) * 131;
          break;
        case 5:
          $stat = ($stat / 100) * 136;
          break;
        case 6:
          $stat = ($stat / 100) * 140;
          break;
      }
    }
  }


  return round($stat);
}
#Функция обновления статов
function stat_updates($id = false)
{
  global $mysqli;
  $mysqli->query('UPDATE user_pokemons SET
        hp_max = ' . stats($id, 'hp') . ',
		attack = ' . stats($id, 'attack') . ',
		def = ' . stats($id, 'defense') . ',
		speed = ' . stats($id, 'speed') . ',
		sp_attack = ' . stats($id, 'sp_attack') . ',
		sp_def = ' . stats($id, 'sp_defense') . ' WHERE user_id = ' . $_SESSION['user_id'] . ' AND id = ' . $id);
}
#Функция распознования характера
function haracter_pokes($a)
{
  $harakter['1'] = "Веселый";
  $harakter['2'] = "Выносливый";
  $harakter['3'] = "Застенчивый";
  $harakter['4'] = "Кроткий";
  $harakter['5'] = "Мирный";
  $harakter['6'] = "Мягкий";
  $harakter['7'] = "Наглый";
  $harakter['8'] = "Наивный";
  $harakter['9'] = "Нахальный";
  $harakter['10'] = "Нежный";
  $harakter['11'] = "Непослушный";
  $harakter['12'] = "Непреклонный";
  $harakter['13'] = "Обычный";
  $harakter['14'] = "Одинокий";
  $harakter['15'] = "Озорной";
  $harakter['16'] = "Осторожный";
  $harakter['17'] = "Поспешный";
  $harakter['18'] = "Причудливый";
  $harakter['19'] = "Распущенный";
  $harakter['20'] = "Робкий";
  $harakter['21'] = "Серьезный";
  $harakter['22'] = "Скромный";
  $harakter['23'] = "Смелый";
  $harakter['24'] = "Спокойный";
  $harakter['25'] = "Стремительный";
  $harakter['26'] = "Тихий";
  $b = $harakter[$a];
  if (!$b) $b = 'UNDEFINED';
  return $b;
}
#Получаем информацию из поля user_pokemons
function infPok($id, $arg = false)
{
  global $mysqli;
  if ($arg == false) {
    $arg = '*';
  }
  $iu = $mysqli->query('SELECT ' . $arg . ' FROM user_pokemons WHERE id = ' . $id)->fetch_assoc();
  if ($arg == "*") {
    return $iu;
  } else {
    return $iu[$arg];
  }
}
#Получаем информацию из поля users
function infUsr($id, $arg = false)
{
  global $mysqli;
  if ($arg == false) {
    $arg = '*';
  }
  $iu = $mysqli->query('SELECT ' . $arg . ' FROM users WHERE id = ' . $id)->fetch_assoc();
  if ($arg == "*") {
    return $iu;
  } else {
    return $iu[$arg];
  }
}

/*Функции для работы с квестами*/
#Проверка на начало квеста
function quest_isset($id)
{
  global $mysqli;
  $quest = $mysqli->query('SELECT quest_id FROM user_quests WHERE user_id= ' . $_SESSION['user_id'] . ' AND quest_id=' . $id)->fetch_assoc();
  $a = ($quest['quest_id'] ? true : false);
  return $a;
}
#Обновление данных о квесте
function quest_update($id, $step, $end = false)
{
  global $mysqli;
  if ($end == false) {
    $end = '0';
  }
  if (quest_isset($id)) {
    $a = $mysqli->query('UPDATE user_quests SET step = ' . $step . ', end = ' . $end . ' WHERE user_id = ' . $_SESSION['user_id'] . ' AND quest_id = ' . $id);
  } else {
    $a = $mysqli->query("INSERT INTO `user_quests` (`quest_id`,`user_id`,`step`,`end`) VALUES('" . $id . "','" . $_SESSION['user_id'] . "','" . $step . "','" . $end . "') ");
  }
  return $a;
}
#Проверка на опрделенный шаг в квесте
function quest_step($id, $step)
{
  global $mysqli;
  if ($step == 0)  $a = true;
  else {
    $q = $mysqli->query('SELECT step FROM user_quests WHERE user_id = ' . $_SESSION['user_id'] . ' AND quest_id = ' . $id . ' AND end=0')->fetch_assoc();
    $a = ($q['step'] == $step ? true : false);
  }
  return $a;
}
#Данные из квеста
function info_quest($id, $tip)
{
  global $mysqli;
  $quest = $mysqli->query('SELECT ' . $tip . ' FROM user_quests WHERE user_id = ' . $_SESSION['user_id'] . ' AND quest_id = ' . $id)->fetch_assoc();
  $a = ($quest[$tip] ? $quest[$tip] : false);
  return $a;
}

#Функция смены погоды rand(1,5)
function changeWeather($region)
{
  global $mysqli;
  switch ($region) {
    case 1:
      if (rand(1, 100) <= 40) {

        $id = rand(1, 5);
      } else {
        $id = 1;
      }
      $time = time();
      $timeMin = $time + 600;
      $timeMax = $time + 7200;
      $time_rand = rand($timeMin, $timeMax);
      $mysqli->query('UPDATE base_region SET weather = "' . $id . '", weather_time = "' . $time_rand . '" WHERE id = ' . $region . ' AND weather_time < ' . $time);
      break;
    case 2:
      if (rand(1, 100) <= 40) {

        $id = rand(1, 5);
      } else {
        $id = 2;
      }
      $time = time();
      $timeMin = $time + 600;
      $timeMax = $time + 7200;
      $time_rand = rand($timeMin, $timeMax);
      $mysqli->query('UPDATE base_region SET weather = "' . $id . '", weather_time = "' . $time_rand . '" WHERE id = ' . $region . ' AND weather_time < ' . $time);
      break;
    case 3:
      if (rand(1, 100) <= 40) {

        $id = rand(1, 5);
      } else {
        $id = 3;
      }
      $time = time();
      $timeMin = $time + 600;
      $timeMax = $time + 7200;
      $time_rand = rand($timeMin, $timeMax);
      $mysqli->query('UPDATE base_region SET weather = "' . $id . '", weather_time = "' . $time_rand . '" WHERE id = ' . $region . ' AND weather_time < ' . $time);
      break;
    case 4:
      if (rand(1, 100) <= 40) {

        $id = rand(1, 5);
      } else {
        $id = 4;
      }
      $time = time();
      $timeMin = $time + 600;
      $timeMax = $time + 7200;
      $time_rand = rand($timeMin, $timeMax);
      $mysqli->query('UPDATE base_region SET weather = "' . $id . '", weather_time = "' . $time_rand . '" WHERE id = ' . $region . ' AND weather_time < ' . $time);
      break;
    case 10:
      if (rand(1, 100) <= 40) {

        $id = rand(1, 5);
      } else {
        $id = 5;
      }
      $time = time();
      $timeMin = $time + 600;
      $timeMax = $time + 7200;
      $time_rand = rand($timeMin, $timeMax);
      $mysqli->query('UPDATE base_region SET weather = "' . $id . '", weather_time = "' . $time_rand . '" WHERE id = ' . $region . ' AND weather_time < ' . $time);
      break;
    case 11:
      if (rand(1, 100) <= 40) {

        $id = rand(1, 5);
      } else {
        $id = 1;
      }
      $time = time();
      $timeMin = $time + 600;
      $timeMax = $time + 7200;
      $time_rand = rand($timeMin, $timeMax);
      $mysqli->query('UPDATE base_region SET weather = "' . $id . '", weather_time = "' . $time_rand . '" WHERE id = ' . $region . ' AND weather_time < ' . $time);
      break;
    case 12:
      if (rand(1, 100) <= 40) {

        $id = rand(1, 5);
      } else {
        $id = 1;
      }
      $time = time();
      $timeMin = $time + 600;
      $timeMax = $time + 7200;
      $time_rand = rand($timeMin, $timeMax);
      $mysqli->query('UPDATE base_region SET weather = "' . $id . '", weather_time = "' . $time_rand . '" WHERE id = ' . $region . ' AND weather_time < ' . $time);
      break;
    case 14:
      if (rand(1, 100) <= 40) {

        $id = rand(1, 5);
      } else {
        $id = 1;
      }
      $time = time();
      $timeMin = $time + 600;
      $timeMax = $time + 7200;
      $time_rand = rand($timeMin, $timeMax);
      $mysqli->query('UPDATE base_region SET weather = "' . $id . '", weather_time = "' . $time_rand . '" WHERE id = ' . $region . ' AND weather_time < ' . $time);
      break;
    case 7:
      $id = 6;
      $time = time();
      $timeMin = $time + 600;
      $timeMax = $time + 7200;
      $time_rand = rand($timeMin, $timeMax);
      $mysqli->query('UPDATE base_region SET weather = "' . $id . '", weather_time = "' . $time_rand . '" WHERE id = ' . $region . ' AND weather_time < ' . $time);
      break;
  }
}





function EXPinf($pok, $ml)
{
  global $mysqli;
  $exp_g = $mysqli->query('SELECT exp_group FROM base_pokemon WHERE id = ' . $pok['basenum'])->fetch_assoc();
  if ($ml > 0) {
    $myLvl = $ml;
  } else {
    $myLvl = $pok['lvl'] + 1;
  }
  if ($exp_g['exp_group'] == 1 or $exp_g['exp_group'] == 2) { // Быстрый
    $nexp_m = 4 * pow($myLvl, 3) / 5;
  }
  if ($exp_g['exp_group'] == 3 or $exp_g['exp_group'] == 4) { // Средний
    $nexp_m = pow($myLvl, 3);
  }
  if ($exp_g['exp_group'] == 5) { // Средний медленный
    $nexp_m = 1.2 * pow($myLvl, 3) - 15 * pow($myLvl, 2) + 100 * $myLvl - 140;
  }
  if ($exp_g['exp_group'] == 6 or $exp_g['exp_group'] == 0) { // Медленный
    $nexp_m = 5 * pow($myLvl, 3) / 4;
  }
  return $nexp_m;
}
function ReturnExp()
{
  global $mysqli;
  $PokMy = $mysqli->query("select * from user_pokemons WHERE `user_id`='" . $_SESSION['user_id'] . "' and active='1'");
  while ($pk = $PokMy->fetch_assoc()) {
    if ($pk['exp'] >= $pk['exp_max'] and $pk['lvl'] < 100) {

      $exp_b = $pk['exp'];
      $lvl = $pk['lvl'];
      $bas = $pk['exp_max'];
      $newExp = $exp_b;
      $x = $lvl;
      while ($x++ < 100) {
        $mL = $x;
        $expN = EXPinf($pk, $mL);
        if ($newExp >= $expN) {
          $newExp = round($newExp - $expN);
          $newLvl = $x;
        } else {
          break;
        }
      }
      if ($newLvl < 1) {
        $newLvl = $pk['lvl'];
      }
      $countLvl = $newLvl - $pk['lvl'];
      $nlvl = $newLvl;
      $nexp = $newExp;
      if ($nlvl > 100) {
        $nlvl = 100;
        $nexp = 0;
        $countLvl = 100 - $pk['lvl'];
      }
      $ev = 2;
      $pokInSk = $mysqli->query('SELECT id FROM user_pokemons WHERE user_id = ' . $_SESSION['user_id'] . ' AND active = 1 and item_id = 27')->fetch_assoc();
      $kach = $mysqli->query('SELECT kachestvo FROM user_box WHERE user_id = '. $_SESSION['user_id'] . ' AND item = 27')->fetch_assoc();
      $z = $kach['kachestvo'];
      if ($pk['item_id'] == 74 and $pokInSk['id'] > 0) {
        $ev = 3;
      }
      if ($pk['item_id'] == 42 or $pk['item_id'] == 1043) {
        $ev = 3;
      }
      if ($pk['start_pok_skob'] == 1) {
        $ev = 3;
      }
      if($pk['item_id'] == 27){
             switch ($z){
              case "Добротное":
                  $ev = 3.1;
                  //echo "<script>var x = '$z'; var p = '$ev'; console.log(x); console.log(p);</script>";
                  break;
              case "Идеально добротное":
                  $ev = 3.15;
                  break;
                  case "Крепкое":
                      $ev = 3.2;
                      break;
                      case "Идеальное крепкое":
                          $ev = 3.25;
                          break;
                          case "Яростное":
                              $ev = 3.3;
                              break;
                              case "Идеально яростное":
                                  $ev = 3.35;
                                  break;
                                  case "Жестокое":
                                      $ev = 3.4;
                                      break;
                                      case "Идеально Жестокое":
                                          $ev = 3.45;
                                          break;
                                          case "Эпическое":
                                              $ev = 3.5;
                                              break;
                                              case "Идеально Эпическое":
                                                  $ev = 3.55;
                                                  break;
                                                  case "Легендарное":
                                                      $ev = 3.6;
                                                      break;
          }
      }
     //echo "<script>var x = $z; console.log(x);</script>";
      if($pk['start_pok_skob'] == 1 ) {

      }
      $ev = $ev * $countLvl;
      // -- Формула EXP
      $myLvl = $nlvl + 1;
      $exp_g = $mysqli->query('SELECT exp_group FROM base_pokemon WHERE id = ' . $pk['basenum'])->fetch_assoc();
      switch ($exp_g['exp_group']) {
        case 1:
        case 2: // Быстрый
          $nexp_m = 4 * pow($myLvl, 3) / 5;
          break;

        case 3:
        case 4: // Средний
          $nexp_m = pow($myLvl, 3);
          break;

        case 5: // Средний медленный
          $nexp_m = 1.2 * pow($myLvl, 3) - 15 * pow($myLvl, 2) + 100 * $myLvl - 140;
          break;

        case 6:
        case 0: // Медленный
          $nexp_m = 5 * pow($myLvl, 3) / 4;
          break;
      }

      $newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='" . $pk['basenum'] . "' and (atc_lvl > '" . $pk['lvl'] . "' and  atc_lvl <= '" . $nlvl . "')");
      while ($an = $newAtc->fetch_assoc()) {
        $mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('" . $an['atac_id'] . "','" . $pk['id'] . "') ");
      }
      $goodupd = $mysqli->query("UPDATE user_pokemons SET `exp`='$nexp',`exp_max`='$nexp_m',`lvl`='$nlvl',`ev`=`ev`+'$ev' WHERE id='" . $pk['id'] . "'");
      if ($goodupd) {
        $pok = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = ' . $_SESSION['user_id'] . ' AND id = ' . $pk['id'])->fetch_assoc();
        include('evolution.php');
        Evolution($pok);
      }
    }
  }
}
function price($count)
{
  $price = number_format($count);
  $price = str_replace(",", ".", $price);
  return $price;
}
function formatnum($str)
{
  $s = $str . '';
  $str = $str;
  $retstr = '';
  $now = 0;
  for ($j = strlen($s) - 1; $j >= 0; $j--) {
    if ($now < 3) {
      $now++;
      $retstr = $s[$j] . $retstr;
    } else {
      $now = 1;
      $retstr = $s[$j] . '.' . $retstr;
    }
  }
  return $retstr;
}
function baseAttackPok($pid)
{
  global $mysqli;
  $pok = $mysqli->query("SELECT * FROM `user_pokemons` WHERE `id` = '" . $pid . "' ")->fetch_assoc();
  $ia_ = $mysqli->query("SELECT * FROM `attack_learn` WHERE `poke_base_id` = '" . $pok['basenum'] . "' and `atc_lvl` <= '" . $pok['lvl'] . "'");
  while ($ia = $ia_->fetch_assoc()) {
    $mysqli->query("INSERT INTO `mypok_learn` (`atk`,`pok`) VALUES ('" . $ia['atac_id'] . "','" . $pid . "') ");
  }
}
function EggBorn($pk)
{
  global $mysqli;
  $user_new = $pk['user_id'];
  $incpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='" . $user_new . "' and `active`='1'");
  $incpk_ = $incpk->num_rows;
  if ($incpk_ == 6) {
    $activ = 0;
  } else {
    $activ = 1;
  }
  if ($pk['zombie'] == 1) {
    $shin = "zombie";
  } elseif ($pk['shiny'] == 1) {
    $shin = "shine";
  } else {
    $shin = "normal";
  }
  //if($pk['shiny'] == 1){ $shin = "shine"; }else{ $shin = "normal"; }

  if ($pk['breed'] == 1) {
    $breed = "0";
  } else {
    $breed = "1";
  }
  //if($pk['born_trade'] == 1) {$born_trade = "1"; }else{ $born_trade = "0"; }

  $pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '" . $pk['pok'] . "' ")->fetch_assoc();
  if ($pok_base['sex_m'] == 0 and $pok_base['sex_f'] == 0) {
    $gn = "no";
  } else {
    if (round($pok_base['sex_m']) >= rand(1, 100)) {
      $gn = "male";
    } else {
      $gn = "female";
    }
  }
  $hr = mt_rand(1, 26);
  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '" . $hr . "' ")->fetch_assoc();
  $hg = $pk['hp'];
  $ag = $pk['atk'];
  $dg = $pk['def'];
  $sg = $pk['speed'];
  $sag = $pk['satk'];
  $sdg = $pk['sdef'];
  $s1 = round((($pok_base['hp'] * 2) + $hg) * (1 / 100) + 10 + 1);
  $s2 = round((($pok_base['atk'] * 2 + $ag) * 1 / 100 + 5) * $har['atk']);
  $s3 = round((($pok_base['def'] * 2 + $dg) * 1 / 100 + 5) * $har['def']);
  $s4 = round((($pok_base['spd'] * 2 + $sg) * 1 / 100 + 5) * $har['speed']);
  $s5 = round((($pok_base['satk'] * 2 + $sag) * 1 / 100 + 5) * $har['satk']);
  $s6 = round((($pok_base['sdef'] * 2 + $sdg) * 1 / 100 + 5) * $har['sdef']);

  $myLvl = 2;

  $exp_g = $mysqli->query('SELECT exp_group FROM base_pokemon WHERE id = ' . $pk['pok'])->fetch_assoc();
  if ($exp_g['exp_group'] == 1 or $exp_g['exp_group'] == 2) { // Быстрый
    $nexp_m = 4 * pow($myLvl, 3) / 5;
  }
  if ($exp_g['exp_group'] == 3 or $exp_g['exp_group'] == 4) { // Средний
    $nexp_m = pow($myLvl, 3);
  }
  if ($exp_g['exp_group'] == 5) { // Средний медленный
    $nexp_m = 1.2 * pow($myLvl, 3) - 15 * pow($myLvl, 2) + 100 * $myLvl - 140;
  }
  if ($exp_g['exp_group'] == 6 or $exp_g['exp_group'] == 0) { // Медленный
    $nexp_m = 5 * pow($myLvl, 3) / 4;
  }
  if (rand(1, 100) > 50) {
    $egg_rand_atk = $mysqli->query("SELECT * FROM base_egg_attack WHERE `pokemon_base_id` = '" . $pk['pok'] . "' ORDER BY RAND() LIMIT 1")->fetch_assoc();
    $egg_atk_name = $mysqli->query("SELECT * FROM base_attacks WHERE `atac_id` = " . $egg_rand_atk['attack_id'])->fetch_assoc();


    $mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,`spark`,`Weight`,`atk4`,`egg_attack`,`egg_attack_id`) VALUES ('" . $user_new . "','" . $pk['pok'] . "','" . $pk['pok'] . "','" . $pok_base['name'] . "','" . $hr . "','1','" . time() . "','" . $activ . "','" . $shin . "','" . $gn . "','" . $nexp_m . "','" . $s1 . "','" . $s1 . "','" . $s2 . "','" . $s3 . "','" . $s4 . "','" . $s5 . "','" . $s6 . "','" . $hg . "','" . $ag . "','" . $dg . "','" . $sg . "','" . $sag . "','" . $sdg . "','" . $user_new . "','" . $user_new . "','0','" . rand(1, 3) . "','" . $breed . "','" . $pok_base['weight'] . "','" . $egg_rand_atk['attack_id'] . "','" . $egg_atk_name['attac_name_eng'] . "','" . $egg_rand_atk['attack_id'] . "') ");
  } else {
    $mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,`spark`,`Weight`) VALUES ('" . $user_new . "','" . $pk['pok'] . "','" . $pk['pok'] . "','" . $pok_base['name'] . "','" . $hr . "','1','" . time() . "','" . $activ . "','" . $shin . "','" . $gn . "','" . $nexp_m . "','" . $s1 . "','" . $s1 . "','" . $s2 . "','" . $s3 . "','" . $s4 . "','" . $s5 . "','" . $s6 . "','" . $hg . "','" . $ag . "','" . $dg . "','" . $sg . "','" . $sag . "','" . $sdg . "','" . $user_new . "','" . $user_new . "','0','" . rand(1, 3) . "','" . $breed . "','" . $pok_base['weight'] . "') ");
  }
  $pID = $mysqli->insert_id;
  baseAttackPok($pID);
}
function newPokemon($pok, $user_new)
{
  global $mysqli;
  $pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '" . $pok . "'")->fetch_assoc();
  $incpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='" . $user_new . "' and `active`='1'");
  $incpk_ = $incpk->num_rows;
  if ($incpk_ == 6) {
    $activ = 0;
  } else {
    $activ = 1;
  }
  $shin = "normal";
  if ($pok_base['sex_m'] == 0 and $pok_base['sex_f'] == 0) {
    $gn = "no";
  } else {
    if (round($pok_base['sex_m']) >= rand(1, 100)) {
      $gn = "male";
    } else {
      $gn = "female";
    }
  }
  $hr = mt_rand(1, 26);
  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '" . $hr . "' ")->fetch_assoc();
  $hg = rand(24, 27);
  $ag = rand(24, 27);
  $dg = rand(24, 27);
  $sg = rand(24, 27);
  $sag = rand(24, 27);
  $sdg = rand(24, 27);
  $s1 = round((($pok_base['hp'] * 2) + $hg) * (1 / 100) + 10 + 1);
  $s2 = round((($pok_base['atk'] * 2 + $ag) * 1 / 100 + 5) * $har['atk']);
  $s3 = round((($pok_base['def'] * 2 + $dg) * 1 / 100 + 5) * $har['def']);
  $s4 = round((($pok_base['spd'] * 2 + $sg) * 1 / 100 + 5) * $har['speed']);
  $s5 = round((($pok_base['satk'] * 2 + $sag) * 1 / 100 + 5) * $har['satk']);
  $s6 = round((($pok_base['sdef'] * 2 + $sdg) * 1 / 100 + 5) * $har['sdef']);

  $myLvl = 2;

  $exp_g = $mysqli->query('SELECT exp_group FROM base_pokemon WHERE id = ' . $pok)->fetch_assoc();
  if ($exp_g['exp_group'] == 1 or $exp_g['exp_group'] == 2) { // Быстрый
    $nexp_m = 4 * pow($myLvl, 3) / 5;
  }
  if ($exp_g['exp_group'] == 3 or $exp_g['exp_group'] == 4) { // Средний
    $nexp_m = pow($myLvl, 3);
  }
  if ($exp_g['exp_group'] == 5) { // Средний медленный
    $nexp_m = 1.2 * pow($myLvl, 3) - 15 * pow($myLvl, 2) + 100 * $myLvl - 140;
  }
  if ($exp_g['exp_group'] == 6 or $exp_g['exp_group'] == 0) { // Медленный
    $nexp_m = 5 * pow($myLvl, 3) / 4;
  }

  $mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,spark,Weight) VALUES ('" . $user_new . "','" . $pok_base['id'] . "','" . $pok_base['numbp'] . "','" . $pok_base['name'] . "','" . $hr . "','1','" . time() . "','" . $activ . "','" . $shin . "','" . $gn . "','200','" . $s1 . "','" . $s1 . "','" . $s2 . "','" . $s3 . "','" . $s4 . "','" . $s5 . "','" . $s6 . "','" . $hg . "','" . $ag . "','" . $dg . "','" . $sg . "','" . $sag . "','" . $sdg . "','" . $user_new . "','" . $user_new . "','0','" . rand(1, 3) . "','1','" . $pok_base['weight'] . "') ");
  $pID = $mysqli->insert_id;
  baseAttackPok($pID);
}
function newPokemonBox($pok, $user_new)
{
  global $mysqli;
  $pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '" . $pok . "'")->fetch_assoc();
  $incpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='" . $user_new . "' and `active`='1'");
  $incpk_ = $incpk->num_rows;
  if ($incpk_ == 6) {
    $activ = 0;
  } else {
    $activ = 1;
  }
  $shin = "normal";
  if ($pok_base['sex_m'] == 0 and $pok_base['sex_f'] == 0) {
    $gn = "no";
  } else {
    if (round($pok_base['sex_m']) >= rand(1, 100)) {
      $gn = "male";
    } else {
      $gn = "female";
    }
  }
  $hr = mt_rand(1, 26);
  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '" . $hr . "' ")->fetch_assoc();
  $hg = rand(28, 33);
  $ag = rand(28, 33);
  $dg = rand(28, 33);
  $sg = rand(28, 33);
  $sag = rand(28, 33);
  $sdg = rand(28, 33);
  $s1 = round((($pok_base['hp'] * 2) + $hg) * (1 / 100) + 10 + 1);
  $s2 = round((($pok_base['atk'] * 2 + $ag) * 1 / 100 + 5) * $har['atk']);
  $s3 = round((($pok_base['def'] * 2 + $dg) * 1 / 100 + 5) * $har['def']);
  $s4 = round((($pok_base['spd'] * 2 + $sg) * 1 / 100 + 5) * $har['speed']);
  $s5 = round((($pok_base['satk'] * 2 + $sag) * 1 / 100 + 5) * $har['satk']);
  $s6 = round((($pok_base['sdef'] * 2 + $sdg) * 1 / 100 + 5) * $har['sdef']);

  $myLvl = 2;

  $exp_g = $mysqli->query('SELECT exp_group FROM base_pokemon WHERE id = ' . $pok)->fetch_assoc();
  if ($exp_g['exp_group'] == 1 or $exp_g['exp_group'] == 2) { // Быстрый
    $nexp_m = 4 * pow($myLvl, 3) / 5;
  }
  if ($exp_g['exp_group'] == 3 or $exp_g['exp_group'] == 4) { // Средний
    $nexp_m = pow($myLvl, 3);
  }
  if ($exp_g['exp_group'] == 5) { // Средний медленный
    $nexp_m = 1.2 * pow($myLvl, 3) - 15 * pow($myLvl, 2) + 100 * $myLvl - 140;
  }
  if ($exp_g['exp_group'] == 6 or $exp_g['exp_group'] == 0) { // Медленный
    $nexp_m = 5 * pow($myLvl, 3) / 4;
  }

  $egg_rand_atk_box = $mysqli->query("SELECT * FROM base_egg_attack WHERE `pokemon_base_id` = '" . $pok . "' ORDER BY RAND() LIMIT 1")->fetch_assoc();

  $mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,trade,spark,Weight) VALUES ('" . $user_new . "','" . $pok_base['id'] . "','" . $pok_base['id'] . "','" . $pok_base['name'] . "','" . $hr . "','1','" . time() . "','" . $activ . "','" . $shin . "','" . $gn . "','200','" . $s1 . "','" . $s1 . "','" . $s2 . "','" . $s3 . "','" . $s4 . "','" . $s5 . "','" . $s6 . "','" . $hg . "','" . $ag . "','" . $dg . "','" . $sg . "','" . $sag . "','" . $sdg . "','" . $user_new . "','" . $user_new . "','0','" . rand(1, 3) . "','0','1','" . $pok_base['weight'] . "') ");
  $pID = $mysqli->insert_id;
  baseAttackPok($pID);
}

function newPokemonPaskhaEgg($pok, $user_new)
{
  global $mysqli;
  $pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '" . $pok . "'")->fetch_assoc();
  $incpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='" . $user_new . "' and `active`='1'");
  $incpk_ = $incpk->num_rows;
  if ($incpk_ == 6) {
    $activ = 0;
  } else {
    $activ = 1;
  }
  $shin = "shine";
  if ($pok_base['sex_m'] == 0 and $pok_base['sex_f'] == 0) {
    $gn = "no";
  } else {
    if (round($pok_base['sex_m']) >= rand(1, 100)) {
      $gn = "male";
    } else {
      $gn = "female";
    }
  }
  $hr = mt_rand(1, 26);
  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '" . $hr . "' ")->fetch_assoc();
  $hg = rand(28, 33);
  $ag = rand(28, 33);
  $dg = rand(28, 33);
  $sg = rand(28, 33);
  $sag = rand(28, 33);
  $sdg = rand(28, 33);
  $s1 = round((($pok_base['hp'] * 2) + $hg) * (1 / 100) + 10 + 1);
  $s2 = round((($pok_base['atk'] * 2 + $ag) * 1 / 100 + 5) * $har['atk']);
  $s3 = round((($pok_base['def'] * 2 + $dg) * 1 / 100 + 5) * $har['def']);
  $s4 = round((($pok_base['spd'] * 2 + $sg) * 1 / 100 + 5) * $har['speed']);
  $s5 = round((($pok_base['satk'] * 2 + $sag) * 1 / 100 + 5) * $har['satk']);
  $s6 = round((($pok_base['sdef'] * 2 + $sdg) * 1 / 100 + 5) * $har['sdef']);

  $myLvl = 2;

  $exp_g = $mysqli->query('SELECT exp_group FROM base_pokemon WHERE id = ' . $pok)->fetch_assoc();
  if ($exp_g['exp_group'] == 1 or $exp_g['exp_group'] == 2) { // Быстрый
    $nexp_m = 4 * pow($myLvl, 3) / 5;
  }
  if ($exp_g['exp_group'] == 3 or $exp_g['exp_group'] == 4) { // Средний
    $nexp_m = pow($myLvl, 3);
  }
  if ($exp_g['exp_group'] == 5) { // Средний медленный
    $nexp_m = 1.2 * pow($myLvl, 3) - 15 * pow($myLvl, 2) + 100 * $myLvl - 140;
  }
  if ($exp_g['exp_group'] == 6 or $exp_g['exp_group'] == 0) { // Медленный
    $nexp_m = 5 * pow($myLvl, 3) / 4;
  }

  $egg_rand_atk_box = $mysqli->query("SELECT * FROM base_egg_attack WHERE `pokemon_base_id` = '" . $pok . "' ORDER BY RAND() LIMIT 1")->fetch_assoc();

  $mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,trade,spark,Weight) VALUES ('" . $user_new . "','" . $pok_base['id'] . "','" . $pok_base['id'] . "','" . $pok_base['name'] . "','" . $hr . "','1','" . time() . "','" . $activ . "','" . $shin . "','" . $gn . "','200','" . $s1 . "','" . $s1 . "','" . $s2 . "','" . $s3 . "','" . $s4 . "','" . $s5 . "','" . $s6 . "','" . $hg . "','" . $ag . "','" . $dg . "','" . $sg . "','" . $sag . "','" . $sdg . "','" . $user_new . "','" . $user_new . "','0','" . rand(1, 3) . "','0','0','" . $pok_base['weight'] . "') ");
  $pID = $mysqli->insert_id;
  baseAttackPok($pID);
}

function neweventPokemon($pok, $user_new)
{
  global $mysqli;
  $pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '" . $pok . "'")->fetch_assoc();
  $incpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='" . $user_new . "' and `active`='1'");
  $incpk_ = $incpk->num_rows;
  if ($incpk_ == 6) {
    $activ = 0;
  } else {
    $activ = 1;
  }
  $shin = "normal";
  if ($pok_base['sex_m'] == 0 and $pok_base['sex_f'] == 0) {
    $gn = "no";
  } else {
    if (round($pok_base['sex_m']) >= rand(1, 100)) {
      $gn = "male";
    } else {
      $gn = "female";
    }
  }
  $hr = mt_rand(1, 26);
  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '" . $hr . "' ")->fetch_assoc();
  $hg = rand(30, 32);
  $ag = rand(30, 32);
  $dg = rand(30, 32);
  $sg = rand(30, 32);
  $sag = rand(30, 32);
  $sdg = rand(30, 32);
  $s1 = round((($pok_base['hp'] * 2) + $hg) * (1 / 100) + 10 + 1);
  $s2 = round((($pok_base['atk'] * 2 + $ag) * 1 / 100 + 5) * $har['atk']);
  $s3 = round((($pok_base['def'] * 2 + $dg) * 1 / 100 + 5) * $har['def']);
  $s4 = round((($pok_base['spd'] * 2 + $sg) * 1 / 100 + 5) * $har['speed']);
  $s5 = round((($pok_base['satk'] * 2 + $sag) * 1 / 100 + 5) * $har['satk']);
  $s6 = round((($pok_base['sdef'] * 2 + $sdg) * 1 / 100 + 5) * $har['sdef']);

  $myLvl = 2;

  $exp_g = $mysqli->query('SELECT exp_group FROM base_pokemon WHERE id = ' . $pok)->fetch_assoc();
  if ($exp_g['exp_group'] == 1 or $exp_g['exp_group'] == 2) { // Быстрый
    $nexp_m = 4 * pow($myLvl, 3) / 5;
  }
  if ($exp_g['exp_group'] == 3 or $exp_g['exp_group'] == 4) { // Средний
    $nexp_m = pow($myLvl, 3);
  }
  if ($exp_g['exp_group'] == 5) { // Средний медленный
    $nexp_m = 1.2 * pow($myLvl, 3) - 15 * pow($myLvl, 2) + 100 * $myLvl - 140;
  }
  if ($exp_g['exp_group'] == 6 or $exp_g['exp_group'] == 0) { // Медленный
    $nexp_m = 5 * pow($myLvl, 3) / 4;
  }

  $mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,spark,Weight) VALUES ('" . $user_new . "','" . $pok_base['id'] . "','" . $pok_base['id'] . "','" . $pok_base['name'] . "','" . $hr . "','1','" . time() . "','" . $activ . "','" . $shin . "','" . $gn . "','200','" . $s1 . "','" . $s1 . "','" . $s2 . "','" . $s3 . "','" . $s4 . "','" . $s5 . "','" . $s6 . "','" . $hg . "','" . $ag . "','" . $dg . "','" . $sg . "','" . $sag . "','" . $sdg . "','" . $user_new . "','" . $user_new . "','0','" . rand(1, 3) . "','0','" . $pok_base['weight'] . "') ");
  $pID = $mysqli->insert_id;
  baseAttackPok($pID);
}

function newStart($pok, $user_new)
{
  global $mysqli;
  $pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '" . $pok . "'")->fetch_assoc();
  $incpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='" . $user_new . "' and `active`='1'");
  $incpk_ = $incpk->num_rows;
  if ($incpk_ == 6) {
    $activ = 0;
  } else {
    $activ = 1;
  }
  $shin = "normal";
  if ($pok_base['sex_m'] == 0 and $pok_base['sex_f'] == 0) {
    $gn = "no";
  } else {
    if (round($pok_base['sex_m']) >= rand(1, 100)) {
      $gn = "male";
    } else {
      $gn = "female";
    }
  }
  $hr = mt_rand(1, 26);
  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '" . $hr . "' ")->fetch_assoc();
  $hg = rand(25, 30);
  $ag = rand(25, 30);
  $dg = rand(25, 30);
  $sg = rand(25, 30);
  $sag = rand(25, 30);
  $sdg = rand(25, 30);
  $s1 = round((($pok_base['hp'] * 2) + $hg) * (1 / 100) + 10 + 1);
  $s2 = round((($pok_base['atk'] * 2 + $ag) * 1 / 100 + 5) * $har['atk']);
  $s3 = round((($pok_base['def'] * 2 + $dg) * 1 / 100 + 5) * $har['def']);
  $s4 = round((($pok_base['spd'] * 2 + $sg) * 1 / 100 + 5) * $har['speed']);
  $s5 = round((($pok_base['satk'] * 2 + $sag) * 1 / 100 + 5) * $har['satk']);
  $s6 = round((($pok_base['sdef'] * 2 + $sdg) * 1 / 100 + 5) * $har['sdef']);

  $myLvl = 2;

  $exp_g = $mysqli->query('SELECT exp_group FROM base_pokemon WHERE id = ' . $pok)->fetch_assoc();
  if ($exp_g['exp_group'] == 1 or $exp_g['exp_group'] == 2) { // Быстрый
    $nexp_m = 4 * pow($myLvl, 3) / 5;
  }
  if ($exp_g['exp_group'] == 3 or $exp_g['exp_group'] == 4) { // Средний
    $nexp_m = pow($myLvl, 3);
  }
  if ($exp_g['exp_group'] == 5) { // Средний медленный
    $nexp_m = 1.2 * pow($myLvl, 3) - 15 * pow($myLvl, 2) + 100 * $myLvl - 140;
  }
  if ($exp_g['exp_group'] == 6 or $exp_g['exp_group'] == 0) { // Медленный
    $nexp_m = 5 * pow($myLvl, 3) / 4;
  }

  $mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,spark,Weight,trade) VALUES ('" . $user_new . "','" . $pok_base['id'] . "','" . $pok_base['numbp'] . "','" . $pok_base['name'] . "','" . $hr . "','1','" . time() . "','" . $activ . "','" . $shin . "','" . $gn . "','200','" . $s1 . "','" . $s1 . "','" . $s2 . "','" . $s3 . "','" . $s4 . "','" . $s5 . "','" . $s6 . "','" . $hg . "','" . $ag . "','" . $dg . "','" . $sg . "','" . $sag . "','" . $sdg . "','" . $user_new . "','" . $user_new . "','0','" . rand(1, 3) . "','1','" . $pok_base['weight'] . "',1) ");
  $pID = $mysqli->insert_id;
  baseAttackPok($pID);
}

function newPokemontest($pok, $user_new)
{
  global $mysqli;
  $pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '" . $pok . "'")->fetch_assoc();
  $incpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='" . $user_new . "' and `active`='1'");
  $incpk_ = $incpk->num_rows;
  if ($incpk_ == 6) {
    $activ = 0;
  } else {
    $activ = 1;
  }
  $shin = "normal";
  if ($pok_base['sex_m'] == 0 and $pok_base['sex_f'] == 0) {
    $gn = "no";
  } else {
    if (round($pok_base['sex_m']) >= rand(1, 100)) {
      $gn = "male";
    } else {
      $gn = "female";
    }
  }
  $hr = mt_rand(1, 26);
  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '" . $hr . "' ")->fetch_assoc();
  $hg = rand(25, 30);
  $ag = rand(25, 30);
  $dg = rand(25, 30);
  $sg = rand(25, 30);
  $sag = rand(25, 30);
  $sdg = rand(25, 30);
  $s1 = round((($pok_base['hp'] * 2) + $hg) * (1 / 100) + 10 + 1);
  $s2 = round((($pok_base['atk'] * 2 + $ag) * 1 / 100 + 5) * $har['atk']);
  $s3 = round((($pok_base['def'] * 2 + $dg) * 1 / 100 + 5) * $har['def']);
  $s4 = round((($pok_base['spd'] * 2 + $sg) * 1 / 100 + 5) * $har['speed']);
  $s5 = round((($pok_base['satk'] * 2 + $sag) * 1 / 100 + 5) * $har['satk']);
  $s6 = round((($pok_base['sdef'] * 2 + $sdg) * 1 / 100 + 5) * $har['sdef']);

  $myLvl = 2;

  $exp_g = $mysqli->query('SELECT exp_group FROM base_pokemon WHERE id = ' . $pok)->fetch_assoc();
  if ($exp_g['exp_group'] == 1 or $exp_g['exp_group'] == 2) { // Быстрый
    $nexp_m = 4 * pow($myLvl, 3) / 5;
  }
  if ($exp_g['exp_group'] == 3 or $exp_g['exp_group'] == 4) { // Средний
    $nexp_m = pow($myLvl, 3);
  }
  if ($exp_g['exp_group'] == 5) { // Средний медленный
    $nexp_m = 1.2 * pow($myLvl, 3) - 15 * pow($myLvl, 2) + 100 * $myLvl - 140;
  }
  if ($exp_g['exp_group'] == 6 or $exp_g['exp_group'] == 0) { // Медленный
    $nexp_m = 5 * pow($myLvl, 3) / 4;
  }

  $mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,spark,Weight,`trade`) VALUES ('" . $user_new . "','" . $pok_base['id'] . "','" . $pok_base['id'] . "','" . $pok_base['name'] . "','" . $hr . "','100','" . time() . "','" . $activ . "','" . $shin . "','" . $gn . "','200','" . $s1 . "','" . $s1 . "','" . $s2 . "','" . $s3 . "','" . $s4 . "','" . $s5 . "','" . $s6 . "','" . $hg . "','" . $ag . "','" . $dg . "','" . $sg . "','" . $sag . "','" . $sdg . "','" . $user_new . "','" . $user_new . "','0','" . rand(1, 3) . "','0','" . $pok_base['weight'] . "',1) ");
  $pID = $mysqli->insert_id;
  baseAttackPok($pID);
}
function Notice($user_to, $title, $msg, $type = 'info', $load = false){
  global $mysqli;
  $mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$user_to."','".$type."','".$title."','".$msg."','".$load."') ");
}
