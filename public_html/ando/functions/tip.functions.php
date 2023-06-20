<?php
function atktip($tipe_pok)
{
  if ($tipe_pok == "grass"    || $tipe_pok == "Grass")    $tips_return = "Травяной";
  if ($tipe_pok == "fire"     || $tipe_pok == "Fire")     $tips_return = "Огненный";
  if ($tipe_pok == "water"    || $tipe_pok == "Water")    $tips_return = "Водный";
  if ($tipe_pok == "bug"      || $tipe_pok == "Bug")      $tips_return = "Насекомое";
  if ($tipe_pok == "flying"   || $tipe_pok == "Flying")   $tips_return = "Летающий";
  if ($tipe_pok == "normal"   || $tipe_pok == "Normal")   $tips_return = "Нормальный";
  if ($tipe_pok == "poison"   || $tipe_pok == "Poison")   $tips_return = "Ядовитый";
  if ($tipe_pok == "electric" || $tipe_pok == "Electric") $tips_return = "Электрический";
  if ($tipe_pok == "ground"   || $tipe_pok == "Ground")   $tips_return = "Земляной";
  if ($tipe_pok == "fighting" || $tipe_pok == "Fighting") $tips_return = "Боевой";
  if ($tipe_pok == "psychic"  || $tipe_pok == "Psychic")  $tips_return = "Психический";
  if ($tipe_pok == "rock"     || $tipe_pok == "Rock")     $tips_return = "Каменый";
  if ($tipe_pok == "ice"      || $tipe_pok == "Ice")      $tips_return = "Ледяной";
  if ($tipe_pok == "dragon"   || $tipe_pok == "Dragon")   $tips_return = "Дракон";
  if ($tipe_pok == "steel"    || $tipe_pok == "Steel")    $tips_return = "Стальной";
  if ($tipe_pok == "dark"     || $tipe_pok == "Dark")     $tips_return = "Тёмный";
  if ($tipe_pok == "ghost"    || $tipe_pok == "Ghost")    $tips_return = "Призрак";
  if ($tipe_pok == "fairy"    || $tipe_pok == "Fairy")    $tips_return = "Волшебный";
  if ($tipe_pok == "Fighted"  || $tipe_pok == "Fighted")  $tips_return = "Боевой/Летающий";
  if ($tipe_pok == "Psihst" || $tipe_pok == "Psihsts")  $tips_return = "Психический";
  if ($tipe_pok == "Ghostst" || $tipe_pok == "Ghostst")  $tips_return = "Призрак";
  if ($tipe_pok == "Normst" || $tipe_pok == "Normst")  $tips_return = "Нормальный";
  if ($tipe_pok == "Freeze" || $tipe_pok == "Freeze")  $tips_return = "Ледяной";

  if (isset($tips_return)) {
    return $tips_return;
  } else {
    return '';
  }
}

function tip($atk_tip, $def_tip)
{
  if ((!$def_tip) or ($def_tip == "None")) {
    $x = 1;
  } else {
    switch ($atk_tip) {
      case "Grass":
        $atk_tip = 5;
        break;
      case "Fire":
        $atk_tip = 2;
        break;
      case "Water":
        $atk_tip = 3;
        break;
      case "Bug":
        $atk_tip = 12;
        break;
      case "Flying":
        $atk_tip = 10;
        break;
      case "Normal":
        $atk_tip = 1;
        break;
      case "Poison":
        $atk_tip = 8;
        break;
      case "Electric":
        $atk_tip = 4;
        break;
      case "Ground":
        $atk_tip = 9;
        break;
      case "Fighting":
        $atk_tip = 7;
        break;
      case "Psychic":
        $atk_tip = 11;
        break;
      case "Rock":
        $atk_tip = 13;
        break;
      case "Ice":
        $atk_tip = 6;
        break;
      case "Dragon":
        $atk_tip = 15;
        break;
      case "Steel":
        $atk_tip = 17;
        break;
      case "Dark":
        $atk_tip = 16;
        break;
      case "Ghost":
        $atk_tip = 14;
        break;
      case "Fairy":
        $atk_tip = 18;
        break;
      case "Fighted":
        $atk_tip = 19;
        break;
      case "Psihst":
        $atk_tip = 20;
        break;
      case "Ghostst":
        $atk_tip = 21;
        break;
      case "Normst":
        $atk_tip = 22;
        break;
      case "Freeze":
        $atk_tip = 23;
        break;
    }

    switch ($def_tip) {
      case "Grass":
        $def_tip = 5;
        break;
      case "Fire":
        $def_tip = 2;
        break;
      case "Water":
        $def_tip = 3;
        break;
      case "Bug":
        $def_tip = 12;
        break;
      case "Flying":
        $def_tip = 10;
        break;
      case "Normal":
        $def_tip = 1;
        break;
      case "Poison":
        $def_tip = 8;
        break;
      case "Electric":
        $def_tip = 4;
        break;
      case "Ground":
        $def_tip = 9;
        break;
      case "Fighting":
        $def_tip = 7;
        break;
      case "Psychic":
        $def_tip = 11;
        break;
      case "Rock":
        $def_tip = 13;
        break;
      case "Ice":
        $def_tip = 6;
        break;
      case "Dragon":
        $def_tip = 15;
        break;
      case "Steel":
        $def_tip = 17;
        break;
      case "Dark":
        $def_tip = 16;
        break;
      case "Ghost":
        $def_tip = 14;
        break;
      case "Fairy":
        $def_tip = 18;
        break;
      case "Fighted":
        $def_tip = 19;
        break;
      case "Psihst":
        $def_tip = 20;
        break;
      case "Ghostst":
        $def_tip = 21;
        break;
      case "Normst":
        $def_tip = 22;
        break;
      case "Freeze":
        $def_tip = 23;
        break;
    }

    /* Нормальный */
    if ($atk_tip == 1 and $def_tip == 1)  $x = 1;  //  Нормальный
    if ($atk_tip == 1 and $def_tip == 2)  $x = 1;  //  Огненный
    if ($atk_tip == 1 and $def_tip == 3)  $x = 1;  //  Водный
    if ($atk_tip == 1 and $def_tip == 4)  $x = 1;  //  Електрический
    if ($atk_tip == 1 and $def_tip == 5)  $x = 1;  //  Травянной
    if ($atk_tip == 1 and $def_tip == 6)  $x = 1;  //  Ледяной
    if ($atk_tip == 1 and $def_tip == 7)  $x = 1;  //  Боевой
    if ($atk_tip == 1 and $def_tip == 8)  $x = 1;  //  Ядовитый
    if ($atk_tip == 1 and $def_tip == 9)  $x = 1;  //  Землянной
    if ($atk_tip == 1 and $def_tip == 10) $x = 1;  //  Летающий
    if ($atk_tip == 1 and $def_tip == 11) $x = 1;  //  Психический
    if ($atk_tip == 1 and $def_tip == 12) $x = 1;  //  Насекомое
    if ($atk_tip == 1 and $def_tip == 13) $x = 0.5; //  Каменый
    if ($atk_tip == 1 and $def_tip == 14) $x = 0;  // Призрак
    if ($atk_tip == 1 and $def_tip == 15) $x = 1;  // Дракон
    if ($atk_tip == 1 and $def_tip == 16) $x = 1;  // Темный
    if ($atk_tip == 1 and $def_tip == 17) $x = 0.5; // Сталь
    if ($atk_tip == 1 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 1 and $def_tip == 21) $x = 1; // псих стаусны
    /* Огненный */
    if ($atk_tip == 2 and $def_tip == 1)  $x = 1;  // normal
    if ($atk_tip == 2 and $def_tip == 2)  $x = 0.5;  // fire
    if ($atk_tip == 2 and $def_tip == 3)  $x = 0.5;  // water
    if ($atk_tip == 2 and $def_tip == 4)  $x = 1;  // electra
    if ($atk_tip == 2 and $def_tip == 5)  $x = 2;  // grass
    if ($atk_tip == 2 and $def_tip == 6)  $x = 2;  // ice
    if ($atk_tip == 2 and $def_tip == 7)  $x = 1;  // fight
    if ($atk_tip == 2 and $def_tip == 8)  $x = 1;  // poison
    if ($atk_tip == 2 and $def_tip == 9)  $x = 1;  // ground
    if ($atk_tip == 2 and $def_tip == 10) $x = 1;  // flying
    if ($atk_tip == 2 and $def_tip == 11) $x = 1;  // psych
    if ($atk_tip == 2 and $def_tip == 12) $x = 2;  // bug
    if ($atk_tip == 2 and $def_tip == 13) $x = 0.5;  // rock
    if ($atk_tip == 2 and $def_tip == 14) $x = 1;  // ghost
    if ($atk_tip == 2 and $def_tip == 15) $x = 0.5;  // dragon
    if ($atk_tip == 2 and $def_tip == 16) $x = 1;  // dark
    if ($atk_tip == 2 and $def_tip == 17) $x = 2;  // steal
    if ($atk_tip == 2 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 2 and $def_tip == 21) $x = 1; // псих стаусны
    /* Водный */
    /*водный*/
    if ($atk_tip == 3 and $def_tip == 1)  $x = 1;  //  normal
    if ($atk_tip == 3 and $def_tip == 2)  $x = 2;  //  fire
    if ($atk_tip == 3 and $def_tip == 3)  $x = 0.5;  //  water
    if ($atk_tip == 3 and $def_tip == 4)  $x = 1;  // electra
    if ($atk_tip == 3 and $def_tip == 5)  $x = 0.5;  //  grass
    if ($atk_tip == 3 and $def_tip == 6)  $x = 1;  //  ice
    if ($atk_tip == 3 and $def_tip == 7)  $x = 1;  //  fight
    if ($atk_tip == 3 and $def_tip == 8)  $x = 1;  //  poison
    if ($atk_tip == 3 and $def_tip == 9)  $x = 2;  //  ground
    if ($atk_tip == 3 and $def_tip == 10) $x = 1;  //  flying
    if ($atk_tip == 3 and $def_tip == 11) $x = 1;  //  psych
    if ($atk_tip == 3 and $def_tip == 12) $x = 1;  //  bug
    if ($atk_tip == 3 and $def_tip == 13) $x = 2;  //  rock
    if ($atk_tip == 3 and $def_tip == 14) $x = 1;  // ghost
    if ($atk_tip == 3 and $def_tip == 15) $x = 0.5;  // dragon
    if ($atk_tip == 3 and $def_tip == 16) $x = 1;  // dark
    if ($atk_tip == 3 and $def_tip == 17) $x = 1;  // steal
    if ($atk_tip == 3 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 3 and $def_tip == 21) $x = 1; // псих стаусны
    /* Електрческий */
    if ($atk_tip == 4 and $def_tip == 1)  $x = 1;  //  normal
    if ($atk_tip == 4 and $def_tip == 2)  $x = 1;  //  fire
    if ($atk_tip == 4 and $def_tip == 3)  $x = 2;  //  water
    if ($atk_tip == 4 and $def_tip == 4)  $x = 0.5;  // electra
    if ($atk_tip == 4 and $def_tip == 5)  $x = 0.5;  //  grass
    if ($atk_tip == 4 and $def_tip == 6)  $x = 1;  //  ice
    if ($atk_tip == 4 and $def_tip == 7)  $x = 1;  //  fight
    if ($atk_tip == 4 and $def_tip == 8)  $x = 1;  //  poison
    if ($atk_tip == 4 and $def_tip == 9)  $x = 0;  //  ground
    if ($atk_tip == 4 and $def_tip == 10) $x = 2;  //  flying
    if ($atk_tip == 4 and $def_tip == 11) $x = 1;  //  psych
    if ($atk_tip == 4 and $def_tip == 12) $x = 1;  //  bug
    if ($atk_tip == 4 and $def_tip == 13) $x = 1;  //  rock
    if ($atk_tip == 4 and $def_tip == 14) $x = 1;  // ghost
    if ($atk_tip == 4 and $def_tip == 15) $x = 0.5;  // dragon
    if ($atk_tip == 4 and $def_tip == 16) $x = 1;  // dark
    if ($atk_tip == 4 and $def_tip == 17) $x = 1;  // steal
    if ($atk_tip == 4 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 4 and $def_tip == 21) $x = 1; // псих стаусны
    /* Травянной */
    if ($atk_tip == 5 and $def_tip == 1)  $x = 1;  //  normal
    if ($atk_tip == 5 and $def_tip == 2)  $x = 0.5;  //  fire
    if ($atk_tip == 5 and $def_tip == 3)  $x = 2;  //  water
    if ($atk_tip == 5 and $def_tip == 4)  $x = 1;  // electra
    if ($atk_tip == 5 and $def_tip == 5)  $x = 0.5;  //  grass
    if ($atk_tip == 5 and $def_tip == 6)  $x = 1;  //  ice
    if ($atk_tip == 5 and $def_tip == 7)  $x = 1;  //  fight
    if ($atk_tip == 5 and $def_tip == 8)  $x = 0.5;  //  poison
    if ($atk_tip == 5 and $def_tip == 9)  $x = 2;  //  ground
    if ($atk_tip == 5 and $def_tip == 10) $x = 0.5;  //  flying
    if ($atk_tip == 5 and $def_tip == 11) $x = 1;  //  psych
    if ($atk_tip == 5 and $def_tip == 12) $x = 0.5;  //  bug
    if ($atk_tip == 5 and $def_tip == 13) $x = 2;  //  rock
    if ($atk_tip == 5 and $def_tip == 14) $x = 1;  // ghost
    if ($atk_tip == 5 and $def_tip == 15) $x = 0.5; // dragon
    if ($atk_tip == 5 and $def_tip == 16) $x = 1;  // dark
    if ($atk_tip == 5 and $def_tip == 17) $x = 0.5;  // steal
    if ($atk_tip == 5 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 5 and $def_tip == 21) $x = 1; // псих стаусны
    /* Ледяной */
    if ($atk_tip == 6 and $def_tip == 1)  $x = 1;  //  normal
    if ($atk_tip == 6 and $def_tip == 2)  $x = 0.5; //  fire
    if ($atk_tip == 6 and $def_tip == 3)  $x = 0.5; //  water
    if ($atk_tip == 6 and $def_tip == 4)  $x = 1;  // electra
    if ($atk_tip == 6 and $def_tip == 5)  $x = 2;  //  grass
    if ($atk_tip == 6 and $def_tip == 6)  $x = 0.5; //  ice
    if ($atk_tip == 6 and $def_tip == 7)  $x = 1;  //  fight
    if ($atk_tip == 6 and $def_tip == 8)  $x = 1;  //  poison
    if ($atk_tip == 6 and $def_tip == 9)  $x = 2;  //  ground
    if ($atk_tip == 6 and $def_tip == 10) $x = 2;  //  flying
    if ($atk_tip == 6 and $def_tip == 11) $x = 1;  //  psych
    if ($atk_tip == 6 and $def_tip == 12) $x = 1;  //  bug
    if ($atk_tip == 6 and $def_tip == 13) $x = 1;  //  rock
    if ($atk_tip == 6 and $def_tip == 14) $x = 1;  // ghost
    if ($atk_tip == 6 and $def_tip == 15) $x = 2;  // dragon
    if ($atk_tip == 6 and $def_tip == 16) $x = 1;  // dark
    if ($atk_tip == 6 and $def_tip == 17) $x = 0.5; // steal
    if ($atk_tip == 6 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 6 and $def_tip == 21) $x = 1; // псих стаусны
    /* Боевой */
    if ($atk_tip == 7 and $def_tip == 1)  $x = 2;  //  normal
    if ($atk_tip == 7 and $def_tip == 2)  $x = 1;  //  fire
    if ($atk_tip == 7 and $def_tip == 3)  $x = 1;  //  water
    if ($atk_tip == 7 and $def_tip == 4)  $x = 1;  // electra
    if ($atk_tip == 7 and $def_tip == 5)  $x = 1;  //  grass
    if ($atk_tip == 7 and $def_tip == 6)  $x = 2;  //  ice
    if ($atk_tip == 7 and $def_tip == 7)  $x = 1;  //  fight
    if ($atk_tip == 7 and $def_tip == 8)  $x = 0.5;  //  poison
    if ($atk_tip == 7 and $def_tip == 9)  $x = 1;  //  ground
    if ($atk_tip == 7 and $def_tip == 10) $x = 0.5;  //  flying
    if ($atk_tip == 7 and $def_tip == 11) $x = 0.5;  //  psych
    if ($atk_tip == 7 and $def_tip == 12) $x = 0.5;  //  bug
    if ($atk_tip == 7 and $def_tip == 13) $x = 2;  //  rock
    if ($atk_tip == 7 and $def_tip == 14) $x = 0;  // ghost
    if ($atk_tip == 7 and $def_tip == 15) $x = 1;  // dragon
    if ($atk_tip == 7 and $def_tip == 16) $x = 2;  // dark
    if ($atk_tip == 7 and $def_tip == 17) $x = 2;  // steal
    if ($atk_tip == 7 and $def_tip == 18) $x = 0.5; // Волшеб
    if ($atk_tip == 7 and $def_tip == 21) $x = 1; // псих стаусны
    /* Ядовитый */
    if ($atk_tip == 8 and $def_tip == 1)  $x = 1;  //  normal
    if ($atk_tip == 8 and $def_tip == 2)  $x = 1;  //  fire
    if ($atk_tip == 8 and $def_tip == 3)  $x = 1;  //  water
    if ($atk_tip == 8 and $def_tip == 4)  $x = 1;  // electra
    if ($atk_tip == 8 and $def_tip == 5)  $x = 2;  //  grass
    if ($atk_tip == 8 and $def_tip == 6)  $x = 1;  //  ice
    if ($atk_tip == 8 and $def_tip == 7)  $x = 1;  //  fight
    if ($atk_tip == 8 and $def_tip == 8)  $x = 0.5;  //  poison
    if ($atk_tip == 8 and $def_tip == 9)  $x = 0.5;  //  ground
    if ($atk_tip == 8 and $def_tip == 10) $x = 1;  //  flying
    if ($atk_tip == 8 and $def_tip == 11) $x = 1;  //  psych
    if ($atk_tip == 8 and $def_tip == 12) $x = 1;  //  bug
    if ($atk_tip == 8 and $def_tip == 13) $x = 0.5;  //  rock
    if ($atk_tip == 8 and $def_tip == 14) $x = 0.5;  // ghost
    if ($atk_tip == 8 and $def_tip == 15) $x = 1;  // dragon
    if ($atk_tip == 8 and $def_tip == 16) $x = 1;  // dark
    if ($atk_tip == 8 and $def_tip == 17) $x = 0;  // steal
    if ($atk_tip == 8 and $def_tip == 18) $x = 2; // Волшеб
    if ($atk_tip == 7 and $def_tip == 21) $x = 1; // псих стаусны
    /* Земляной */
    if ($atk_tip == 9 and $def_tip == 1)  $x = 1;  //  normal
    if ($atk_tip == 9 and $def_tip == 2)  $x = 2;  //  fire
    if ($atk_tip == 9 and $def_tip == 3)  $x = 1;  //  water
    if ($atk_tip == 9 and $def_tip == 4)  $x = 2;  // electra
    if ($atk_tip == 9 and $def_tip == 5)  $x = 0.5;  //  grass
    if ($atk_tip == 9 and $def_tip == 6)  $x = 1;  //  ice
    if ($atk_tip == 9 and $def_tip == 7)  $x = 1;  //  fight
    if ($atk_tip == 9 and $def_tip == 8)  $x = 2;  //  poison
    if ($atk_tip == 9 and $def_tip == 9)  $x = 1;  //  ground
    if ($atk_tip == 9 and $def_tip == 10) $x = 0;  //  flying
    if ($atk_tip == 9 and $def_tip == 11) $x = 1;  //  psych
    if ($atk_tip == 9 and $def_tip == 12) $x = 0.5;  //  bug
    if ($atk_tip == 9 and $def_tip == 13) $x = 2;  //  rock
    if ($atk_tip == 9 and $def_tip == 14) $x = 1;  // ghost
    if ($atk_tip == 9 and $def_tip == 15) $x = 1;  // dragon
    if ($atk_tip == 9 and $def_tip == 16) $x = 1;  // dark
    if ($atk_tip == 9 and $def_tip == 17) $x = 2;  // steal
    if ($atk_tip == 9 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 9 and $def_tip == 21) $x = 1; // псих стаусны
    /* Летающий */
    if ($atk_tip == 10 and $def_tip == 1)  $x = 1; //  normal
    if ($atk_tip == 10 and $def_tip == 2)  $x = 1;  //  fire
    if ($atk_tip == 10 and $def_tip == 3)  $x = 1;  //  water
    if ($atk_tip == 10 and $def_tip == 4)  $x = 0.5;  // electra
    if ($atk_tip == 10 and $def_tip == 5)  $x = 2;  //  grass
    if ($atk_tip == 10 and $def_tip == 6)  $x = 1;  //  ice
    if ($atk_tip == 10 and $def_tip == 7)  $x = 2;  //  fight
    if ($atk_tip == 10 and $def_tip == 8)  $x = 1;  //  poison
    if ($atk_tip == 10 and $def_tip == 9)  $x = 1;  //  ground
    if ($atk_tip == 10 and $def_tip == 10) $x = 1;  //  flying
    if ($atk_tip == 10 and $def_tip == 11) $x = 1;  //  psych
    if ($atk_tip == 10 and $def_tip == 12) $x = 2;  //  bug
    if ($atk_tip == 10 and $def_tip == 13) $x = 0.5;  //  rock
    if ($atk_tip == 10 and $def_tip == 14) $x = 1;  // ghost
    if ($atk_tip == 10 and $def_tip == 15) $x = 1;  // dragon
    if ($atk_tip == 10 and $def_tip == 16) $x = 1;  // dark
    if ($atk_tip == 10 and $def_tip == 17) $x = 0.5;  // steal
    if ($atk_tip == 10 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 10 and $def_tip == 21) $x = 1; // псих стаусны
    /* Психический */
    if ($atk_tip == 11 and $def_tip == 1)  $x = 1;  //  normal
    if ($atk_tip == 11 and $def_tip == 2)  $x = 1;  //  fire
    if ($atk_tip == 11 and $def_tip == 3)  $x = 1;  //  water
    if ($atk_tip == 11 and $def_tip == 4)  $x = 1;  // electra
    if ($atk_tip == 11 and $def_tip == 5)  $x = 1;  //  grass
    if ($atk_tip == 11 and $def_tip == 6)  $x = 1;  //  ice
    if ($atk_tip == 11 and $def_tip == 7)  $x = 2;  //  fight
    if ($atk_tip == 11 and $def_tip == 8)  $x = 2;  //  poison
    if ($atk_tip == 11 and $def_tip == 9)  $x = 1;  //  ground
    if ($atk_tip == 11 and $def_tip == 10) $x = 1;  //  flying
    if ($atk_tip == 11 and $def_tip == 11) $x = 0.5;  //  psych
    if ($atk_tip == 11 and $def_tip == 12) $x = 1;  //  bug
    if ($atk_tip == 11 and $def_tip == 13) $x = 1;  //  rock
    if ($atk_tip == 11 and $def_tip == 14) $x = 1;  // ghost
    if ($atk_tip == 11 and $def_tip == 15) $x = 1;  // dragon
    if ($atk_tip == 11 and $def_tip == 16) $x = 0;  // dark
    if ($atk_tip == 11 and $def_tip == 17) $x = 0.5;  // steal
    if ($atk_tip == 11 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 11 and $def_tip == 21) $x = 1; // псих стаусны
    /* Насекомое */
    if ($atk_tip == 12 and $def_tip == 1)  $x = 1;  //  normal
    if ($atk_tip == 12 and $def_tip == 2)  $x = 0.5;  //  fire
    if ($atk_tip == 12 and $def_tip == 3)  $x = 1;  //  water
    if ($atk_tip == 12 and $def_tip == 4)  $x = 1;  // electra
    if ($atk_tip == 12 and $def_tip == 5)  $x = 2;  //  grass
    if ($atk_tip == 12 and $def_tip == 6)  $x = 1;  //  ice
    if ($atk_tip == 12 and $def_tip == 7)  $x = 0.5;  //  fight
    if ($atk_tip == 12 and $def_tip == 8)  $x = 0.5;  //  poison
    if ($atk_tip == 12 and $def_tip == 9)  $x = 1;  //  ground
    if ($atk_tip == 12 and $def_tip == 10) $x = 0.5;  //  flying
    if ($atk_tip == 12 and $def_tip == 11) $x = 2;  //  psych
    if ($atk_tip == 12 and $def_tip == 12) $x = 1;  //  bug
    if ($atk_tip == 12 and $def_tip == 13) $x = 1;  //  rock
    if ($atk_tip == 12 and $def_tip == 14) $x = 0.5;  // ghost
    if ($atk_tip == 12 and $def_tip == 15) $x = 1;  // dragon
    if ($atk_tip == 12 and $def_tip == 16) $x = 2;  // dark
    if ($atk_tip == 12 and $def_tip == 17) $x = 0.5;  // steal
    if ($atk_tip == 12 and $def_tip == 18) $x = 0.5; // Волшеб
    if ($atk_tip == 12 and $def_tip == 21) $x = 1; // псих стаусны
    /* Каменный */
    if ($atk_tip == 13 and $def_tip == 1)  $x = 1;  //  normal
    if ($atk_tip == 13 and $def_tip == 2)  $x = 2;  //  fire
    if ($atk_tip == 13 and $def_tip == 3)  $x = 1;  //  water
    if ($atk_tip == 13 and $def_tip == 4)  $x = 1;  // electra
    if ($atk_tip == 13 and $def_tip == 5)  $x = 1;  //  grass
    if ($atk_tip == 13 and $def_tip == 6)  $x = 2;  //  ice
    if ($atk_tip == 13 and $def_tip == 7)  $x = 0.5;  //  fight
    if ($atk_tip == 13 and $def_tip == 8)  $x = 1;  //  poison
    if ($atk_tip == 13 and $def_tip == 9)  $x = 0.5;  //  ground
    if ($atk_tip == 13 and $def_tip == 10) $x = 2;  //  flying
    if ($atk_tip == 13 and $def_tip == 11) $x = 1;  //  psych
    if ($atk_tip == 13 and $def_tip == 12) $x = 2;  //  bug
    if ($atk_tip == 13 and $def_tip == 13) $x = 1;  //  rock
    if ($atk_tip == 13 and $def_tip == 14) $x = 1;  // ghost
    if ($atk_tip == 13 and $def_tip == 15) $x = 1;  // dragon
    if ($atk_tip == 13 and $def_tip == 16) $x = 1;  // dark
    if ($atk_tip == 13 and $def_tip == 17) $x = 0.5; // steal
    if ($atk_tip == 13 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 13 and $def_tip == 21) $x = 1; // псих стаусны
    /* Призрак */
    if ($atk_tip == 14 and $def_tip == 1)  $x = 0;  //  normal
    if ($atk_tip == 14 and $def_tip == 2)  $x = 1;  //  fire
    if ($atk_tip == 14 and $def_tip == 3)  $x = 1;  //  water
    if ($atk_tip == 14 and $def_tip == 4)  $x = 1;  // electra
    if ($atk_tip == 14 and $def_tip == 5)  $x = 1;  //  grass
    if ($atk_tip == 14 and $def_tip == 6)  $x = 1;  //  ice
    if ($atk_tip == 14 and $def_tip == 7)  $x = 1;  //  fight
    if ($atk_tip == 14 and $def_tip == 8)  $x = 1;  //  poison
    if ($atk_tip == 14 and $def_tip == 9)  $x = 1;  //  ground
    if ($atk_tip == 14 and $def_tip == 10) $x = 1;  //  flying
    if ($atk_tip == 14 and $def_tip == 11) $x = 2;  //  psych
    if ($atk_tip == 14 and $def_tip == 12) $x = 1;  //  bug
    if ($atk_tip == 14 and $def_tip == 13) $x = 1;  //  rock
    if ($atk_tip == 14 and $def_tip == 14) $x = 2;  // ghost
    if ($atk_tip == 14 and $def_tip == 15) $x = 1;  // dragon
    if ($atk_tip == 14 and $def_tip == 16) $x = 0.5;  // dark
    if ($atk_tip == 14 and $def_tip == 17) $x = 1;  // steal
    if ($atk_tip == 14 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 14 and $def_tip == 21) $x = 1; // псих стаусны
    /* Дракон */
    if ($atk_tip == 15 and $def_tip == 1)  $x = 1;  //  normal
    if ($atk_tip == 15 and $def_tip == 2)  $x = 1;  //  fire
    if ($atk_tip == 15 and $def_tip == 3)  $x = 1;  //  water
    if ($atk_tip == 15 and $def_tip == 4)  $x = 1;  // electra
    if ($atk_tip == 15 and $def_tip == 5)  $x = 1;  //  grass
    if ($atk_tip == 15 and $def_tip == 6)  $x = 1;  //  ice
    if ($atk_tip == 15 and $def_tip == 7)  $x = 1;  //  fight
    if ($atk_tip == 15 and $def_tip == 8)  $x = 1;  //  poison
    if ($atk_tip == 15 and $def_tip == 9)  $x = 1;  //  ground
    if ($atk_tip == 15 and $def_tip == 10) $x = 1;  //  flying
    if ($atk_tip == 15 and $def_tip == 11) $x = 1;  //  psych
    if ($atk_tip == 15 and $def_tip == 12) $x = 1;  //  bug
    if ($atk_tip == 15 and $def_tip == 13) $x = 1;  //  rock
    if ($atk_tip == 15 and $def_tip == 14) $x = 1;  // ghost
    if ($atk_tip == 15 and $def_tip == 15) $x = 2;  // dragon
    if ($atk_tip == 15 and $def_tip == 16) $x = 1;  // dark
    if ($atk_tip == 15 and $def_tip == 17) $x = 0.5;  // steal
    if ($atk_tip == 15 and $def_tip == 18) $x = 0; // Волшеб
    if ($atk_tip == 15 and $def_tip == 21) $x = 1; // псих стаусны
    /* Темный */
    if ($atk_tip == 16 and $def_tip == 1)  $x = 1;  //  normal
    if ($atk_tip == 16 and $def_tip == 2)  $x = 1;  //  fire
    if ($atk_tip == 16 and $def_tip == 3)  $x = 1;  //  water
    if ($atk_tip == 16 and $def_tip == 4)  $x = 1;  // electra
    if ($atk_tip == 16 and $def_tip == 5)  $x = 1;  //  grass
    if ($atk_tip == 16 and $def_tip == 6)  $x = 1;  //  ice
    if ($atk_tip == 16 and $def_tip == 7)  $x = 0.5;  //  fight
    if ($atk_tip == 16 and $def_tip == 8)  $x = 1;  //  poison
    if ($atk_tip == 16 and $def_tip == 9)  $x = 1;  //  ground
    if ($atk_tip == 16 and $def_tip == 10) $x = 1;  //  flying
    if ($atk_tip == 16 and $def_tip == 11) $x = 2;  //  psych
    if ($atk_tip == 16 and $def_tip == 12) $x = 1;  //  bug
    if ($atk_tip == 16 and $def_tip == 13) $x = 1;  //  rock
    if ($atk_tip == 16 and $def_tip == 14) $x = 2;  // ghost
    if ($atk_tip == 16 and $def_tip == 15) $x = 1;  // dragon
    if ($atk_tip == 16 and $def_tip == 16) $x = 0.5;  // dark
    if ($atk_tip == 16 and $def_tip == 17) $x = 1;  // steal
    if ($atk_tip == 16 and $def_tip == 18) $x = 0.5; // Волшеб
    if ($atk_tip == 16 and $def_tip == 20) $x = 1; // боев/лет
    if ($atk_tip == 16 and $def_tip == 21) $x = 1; // боев/лет
    if ($atk_tip == 16 and $def_tip == 21) $x = 1; // псих стаусны
    /* Стальной */
    if ($atk_tip == 17 and $def_tip == 1)  $x = 1;  //  normal
    if ($atk_tip == 17 and $def_tip == 2)  $x = 0.5;  //  fire
    if ($atk_tip == 17 and $def_tip == 3)  $x = 0.5;  //  water
    if ($atk_tip == 17 and $def_tip == 4)  $x = 0.5;  // electra
    if ($atk_tip == 17 and $def_tip == 5)  $x = 1;  //  grass
    if ($atk_tip == 17 and $def_tip == 6)  $x = 2;  //  ice
    if ($atk_tip == 17 and $def_tip == 7)  $x = 1;  //  fight
    if ($atk_tip == 17 and $def_tip == 8)  $x = 1;  //  poison
    if ($atk_tip == 17 and $def_tip == 9)  $x = 1;  //  ground
    if ($atk_tip == 17 and $def_tip == 10) $x = 1;  //  flying
    if ($atk_tip == 17 and $def_tip == 11) $x = 1;  //  psych
    if ($atk_tip == 17 and $def_tip == 12) $x = 1;  //  bug
    if ($atk_tip == 17 and $def_tip == 13) $x = 2;  //  rock
    if ($atk_tip == 17 and $def_tip == 14) $x = 1;  // ghost
    if ($atk_tip == 17 and $def_tip == 15) $x = 1;  // dragon
    if ($atk_tip == 17 and $def_tip == 16) $x = 1;  // dark
    if ($atk_tip == 17 and $def_tip == 17) $x = 0.5;  // steal
    if ($atk_tip == 17 and $def_tip == 18) $x = 2; // Волшеб
    if ($atk_tip == 17 and $def_tip == 21) $x = 1; // псих стаусны
    /* Волшебный */
    if ($atk_tip == 18 and $def_tip == 1)  $x = 1;  //  normal
    if ($atk_tip == 18 and $def_tip == 2)  $x = 0.5;  //  fire
    if ($atk_tip == 18 and $def_tip == 3)  $x = 1;  //  water
    if ($atk_tip == 18 and $def_tip == 4)  $x = 1;  // electra
    if ($atk_tip == 18 and $def_tip == 5)  $x = 1;  //  grass
    if ($atk_tip == 18 and $def_tip == 6)  $x = 1;  //  ice
    if ($atk_tip == 18 and $def_tip == 7)  $x = 2;  //  fight
    if ($atk_tip == 18 and $def_tip == 8)  $x = 0.5;  //  poison
    if ($atk_tip == 18 and $def_tip == 9)  $x = 1;  //  ground
    if ($atk_tip == 18 and $def_tip == 10) $x = 1;  //  flying
    if ($atk_tip == 18 and $def_tip == 11) $x = 1;  //  psych
    if ($atk_tip == 18 and $def_tip == 12) $x = 1;  //  bug
    if ($atk_tip == 18 and $def_tip == 13) $x = 1;  //  rock
    if ($atk_tip == 18 and $def_tip == 14) $x = 1;  // ghost
    if ($atk_tip == 18 and $def_tip == 15) $x = 2;  // dragon
    if ($atk_tip == 18 and $def_tip == 16) $x = 2;  // dark
    if ($atk_tip == 18 and $def_tip == 17) $x = 0.5;  // steal
    if ($atk_tip == 18 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 18 and $def_tip == 21) $x = 1; // псих стаусны
    //*смешаный*//
    /* Летающий */  /* Боевой */
    if ($atk_tip == 19 and $def_tip == 1)  $x = 2; //  normal
    if ($atk_tip == 19 and $def_tip == 2)  $x = 1;  //  fire
    if ($atk_tip == 19 and $def_tip == 3)  $x = 1;  //  water
    if ($atk_tip == 19 and $def_tip == 4)  $x = 0.5;  // electra
    if ($atk_tip == 19 and $def_tip == 5)  $x = 2;  //  grass
    if ($atk_tip == 19 and $def_tip == 6)  $x = 2;  //  ice
    if ($atk_tip == 19 and $def_tip == 7)  $x = 2;  //  fight
    if ($atk_tip == 19 and $def_tip == 8)  $x = 0.5;  //  poison
    if ($atk_tip == 19 and $def_tip == 9)  $x = 1;  //  ground
    if ($atk_tip == 19 and $def_tip == 10) $x = 0.5;  //  flying
    if ($atk_tip == 19 and $def_tip == 11) $x = 0.5;  //  psych
    if ($atk_tip == 19 and $def_tip == 12) $x = 1;  //  bug
    if ($atk_tip == 19 and $def_tip == 13) $x = 1;  //  rock
    if ($atk_tip == 19 and $def_tip == 14) $x = 1;  // ghost
    if ($atk_tip == 19 and $def_tip == 15) $x = 1;  // dragon
    if ($atk_tip == 19 and $def_tip == 16) $x = 2;  // dark
    if ($atk_tip == 19 and $def_tip == 17) $x = 1;  // steal
    if ($atk_tip == 19 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 19 and $def_tip == 21) $x = 1; // псих стаусны
    /* Нормальный СТАТУСНЫЙ */
    if ($atk_tip == 20 and $def_tip == 1)  $x = 1;  //  Нормальный
    if ($atk_tip == 20 and $def_tip == 2)  $x = 1;  //  Огненный
    if ($atk_tip == 20 and $def_tip == 3)  $x = 1;  //  Водный
    if ($atk_tip == 20 and $def_tip == 4)  $x = 1;  //  Електрический
    if ($atk_tip == 20 and $def_tip == 5)  $x = 1;  //  Травянной
    if ($atk_tip == 20 and $def_tip == 6)  $x = 1;  //  Ледяной
    if ($atk_tip == 20 and $def_tip == 7)  $x = 1;  //  Боевой
    if ($atk_tip == 20 and $def_tip == 8)  $x = 1;  //  Ядовитый
    if ($atk_tip == 20 and $def_tip == 9)  $x = 1;  //  Землянной
    if ($atk_tip == 20 and $def_tip == 10) $x = 1;  //  Летающий
    if ($atk_tip == 20 and $def_tip == 11) $x = 1;  //  Психический
    if ($atk_tip == 20 and $def_tip == 12) $x = 1;  //  Насекомое
    if ($atk_tip == 20 and $def_tip == 13) $x = 1; //  Каменый
    if ($atk_tip == 20 and $def_tip == 14) $x = 1;  // Призрак
    if ($atk_tip == 20 and $def_tip == 15) $x = 1;  // Дракон
    if ($atk_tip == 20 and $def_tip == 16) $x = 1;  // Темный
    if ($atk_tip == 20 and $def_tip == 17) $x = 1; // Сталь
    if ($atk_tip == 20 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 20 and $def_tip == 19) $x = 1; // боев/лет
    if ($atk_tip == 20 and $def_tip == 20) $x = 1; // норм статусный
    if ($atk_tip == 20 and $def_tip == 21) $x = 1; // псих стаусны
    if ($atk_tip == 20 and $def_tip == 21) $x = 1; // псих стаусны
    /* Психический СТАУСНЫЙ */
    if ($atk_tip == 21 and $def_tip == 1)  $x = 1;  //  Нормальный
    if ($atk_tip == 21 and $def_tip == 2)  $x = 1;  //  Огненный
    if ($atk_tip == 21 and $def_tip == 3)  $x = 1;  //  Водный
    if ($atk_tip == 21 and $def_tip == 4)  $x = 1;  //  Електрический
    if ($atk_tip == 21 and $def_tip == 5)  $x = 1;  //  Травянной
    if ($atk_tip == 21 and $def_tip == 6)  $x = 1;  //  Ледяной
    if ($atk_tip == 21 and $def_tip == 7)  $x = 1;  //  Боевой
    if ($atk_tip == 21 and $def_tip == 8)  $x = 1;  //  Ядовитый
    if ($atk_tip == 21 and $def_tip == 9)  $x = 1;  //  Землянной
    if ($atk_tip == 21 and $def_tip == 10) $x = 1;  //  Летающий
    if ($atk_tip == 21 and $def_tip == 11) $x = 1;  //  Психический
    if ($atk_tip == 21 and $def_tip == 12) $x = 1;  //  Насекомое
    if ($atk_tip == 21 and $def_tip == 13) $x = 1; //  Каменый
    if ($atk_tip == 21 and $def_tip == 14) $x = 1;  // Призрак
    if ($atk_tip == 21 and $def_tip == 15) $x = 1;  // Дракон
    if ($atk_tip == 21 and $def_tip == 16) $x = 1;  // Темный
    if ($atk_tip == 21 and $def_tip == 17) $x = 1; // Сталь
    if ($atk_tip == 21 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 21 and $def_tip == 19) $x = 1; // боев/лет
    if ($atk_tip == 21 and $def_tip == 20) $x = 1; // норм статусный
    if ($atk_tip == 21 and $def_tip == 21) $x = 1; // псих стаусны
    /* Нормальный СТАУСНЫЙ */
    if ($atk_tip == 22 and $def_tip == 1)  $x = 1;  //  Нормальный
    if ($atk_tip == 22 and $def_tip == 2)  $x = 1;  //  Огненный
    if ($atk_tip == 22 and $def_tip == 3)  $x = 1;  //  Водный
    if ($atk_tip == 22 and $def_tip == 4)  $x = 1;  //  Електрический
    if ($atk_tip == 22 and $def_tip == 5)  $x = 1;  //  Травянной
    if ($atk_tip == 22 and $def_tip == 6)  $x = 1;  //  Ледяной
    if ($atk_tip == 22 and $def_tip == 7)  $x = 1;  //  Боевой
    if ($atk_tip == 22 and $def_tip == 8)  $x = 1;  //  Ядовитый
    if ($atk_tip == 22 and $def_tip == 9)  $x = 1;  //  Землянной
    if ($atk_tip == 22 and $def_tip == 10) $x = 1;  //  Летающий
    if ($atk_tip == 22 and $def_tip == 11) $x = 1;  //  Психический
    if ($atk_tip == 22 and $def_tip == 12) $x = 1;  //  Насекомое
    if ($atk_tip == 22 and $def_tip == 13) $x = 1; //  Каменый
    if ($atk_tip == 22 and $def_tip == 14) $x = 1;  // Призрак
    if ($atk_tip == 22 and $def_tip == 15) $x = 1;  // Дракон
    if ($atk_tip == 22 and $def_tip == 16) $x = 1;  // Темный
    if ($atk_tip == 22 and $def_tip == 17) $x = 1; // Сталь
    if ($atk_tip == 22 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 22 and $def_tip == 19) $x = 1; // боев/лет
    if ($atk_tip == 22 and $def_tip == 20) $x = 1; // норм статусный
    if ($atk_tip == 22 and $def_tip == 21) $x = 1; // псих стаусны

    if ($atk_tip == 23 and $def_tip == 1)  $x = 1;  //  Нормальный
    if ($atk_tip == 23 and $def_tip == 2)  $x = 1;  //  Огненный
    if ($atk_tip == 23 and $def_tip == 3)  $x = 1;  //  Водный
    if ($atk_tip == 23 and $def_tip == 4)  $x = 1;  //  Електрический
    if ($atk_tip == 23 and $def_tip == 5)  $x = 1;  //  Травянной
    if ($atk_tip == 23 and $def_tip == 6)  $x = 1;  //  Ледяной
    if ($atk_tip == 23 and $def_tip == 7)  $x = 1;  //  Боевой
    if ($atk_tip == 23 and $def_tip == 8)  $x = 1;  //  Ядовитый
    if ($atk_tip == 23 and $def_tip == 9)  $x = 1;  //  Землянной
    if ($atk_tip == 23 and $def_tip == 10) $x = 1;  //  Летающий
    if ($atk_tip == 23 and $def_tip == 11) $x = 1;  //  Психический
    if ($atk_tip == 23 and $def_tip == 12) $x = 1;  //  Насекомое
    if ($atk_tip == 23 and $def_tip == 13) $x = 1; //  Каменый
    if ($atk_tip == 23 and $def_tip == 14) $x = 1;  // Призрак
    if ($atk_tip == 23 and $def_tip == 15) $x = 1;  // Дракон
    if ($atk_tip == 23 and $def_tip == 16) $x = 1;  // Темный
    if ($atk_tip == 23 and $def_tip == 17) $x = 1; // Сталь
    if ($atk_tip == 23 and $def_tip == 18) $x = 1; // Волшеб
    if ($atk_tip == 23 and $def_tip == 19) $x = 1; // боев/лет
    if ($atk_tip == 23 and $def_tip == 20) $x = 1; // норм статусный
    if ($atk_tip == 23 and $def_tip == 21) $x = 1; // псих стаусны
  }
  return $x;
}
