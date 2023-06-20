<?php
function atktip($tipe_pok)
{
    if ($tipe_pok == "grass" || $tipe_pok == "Grass")     $tips_return = "Травяной";
    if ($tipe_pok == "fire" || $tipe_pok == "Fire")      $tips_return = "Огненный";
    if ($tipe_pok == "water" || $tipe_pok == "Water")     $tips_return = "Водный";
    if ($tipe_pok == "bug" || $tipe_pok == "Bug")       $tips_return = "Насекомое";
    if ($tipe_pok == "flying" || $tipe_pok == "Flying")    $tips_return = "Летающий";
    if ($tipe_pok == "normal" || $tipe_pok == "Normal")    $tips_return = "Нормальный";
    if ($tipe_pok == "poison" || $tipe_pok == "Poison")    $tips_return = "Ядовитый";
    if ($tipe_pok == "electric" || $tipe_pok == "Electric")  $tips_return = "Электрический";
    if ($tipe_pok == "ground" || $tipe_pok == "Ground")    $tips_return = "Земляной";
    if ($tipe_pok == "fighting" || $tipe_pok == "Fighting")  $tips_return = "Боевой";
    if ($tipe_pok == "psychic" || $tipe_pok == "Psychic")   $tips_return = "Психический";
    if ($tipe_pok == "rock" || $tipe_pok == "Rock")      $tips_return = "Каменый";
    if ($tipe_pok == "ice" || $tipe_pok == "Ice")       $tips_return = "Ледяной";
    if ($tipe_pok == "dragon" || $tipe_pok == "Dragon")    $tips_return = "Дракон";
    if ($tipe_pok == "steel" || $tipe_pok == "Steel")     $tips_return = "Стальной";
    if ($tipe_pok == "dark" || $tipe_pok == "Dark")      $tips_return = "Тёмный";
    if ($tipe_pok == "ghost" || $tipe_pok == "Ghost")     $tips_return = "Призрак";
    if ($tipe_pok == "fairy" || $tipe_pok == "Fairy")     $tips_return = "Волшебный";
    if ($tipe_pok == "fighted" || $tipe_pok == "Fighted")  $tips_return = "Боевой/Летающий";
    if ($tipe_pok == "psihst" || $tipe_pok == "Psihst")     $tips_return = "Психический";
    if ($tipe_pok == "ghostst" || $tipe_pok == "Ghostst")     $tips_return = "Призрак";
    if ($tipe_pok == "normst" || $tipe_pok == "Normst")     $tips_return = "Нормальный";
    if ($tipe_pok == "freeze" || $tipe_pok == "Freeze")     $tips_return = "Ледяной";
    return $tips_return;
}

function tip($atk_tip, $def_tip, $weather)
{


    if ($def_tip == "" or $def_tip == "not") {
        $x = 1;
    } else {
        $atk_tip = ucfirst($atk_tip);
        $def_tip = ucfirst($def_tip);
        if ($atk_tip == "Grass")     $atk_tip = 5;
        if ($atk_tip == "Fire")      $atk_tip = 2;
        if ($atk_tip == "Water")     $atk_tip = 3;
        if ($atk_tip == "Bug")       $atk_tip = 12;
        if ($atk_tip == "Flying")    $atk_tip = 10;
        if ($atk_tip == "Normal")    $atk_tip = 1;
        if ($atk_tip == "Poison")    $atk_tip = 8;
        if ($atk_tip == "Electric")  $atk_tip = 4;
        if ($atk_tip == "Ground")    $atk_tip = 9;
        if ($atk_tip == "Fighting")  $atk_tip = 7;
        if ($atk_tip == "Fighted")   $atk_tip = 19;
        if ($atk_tip == "Psychic")   $atk_tip = 11;
        if ($atk_tip == "Rock")      $atk_tip = 13;
        if ($atk_tip == "Ice")       $atk_tip = 6;
        if ($atk_tip == "Dragon")    $atk_tip = 15;
        if ($atk_tip == "Steel")     $atk_tip = 17;
        if ($atk_tip == "Dark")      $atk_tip = 16;
        if ($atk_tip == "Ghost")     $atk_tip = 14;
        if ($atk_tip == "Fairy")     $atk_tip = 18;
        if ($atk_tip == "Psihst")     $atk_tip = 20;
        if ($atk_tip == "Ghostst")     $atk_tip = 21;
        if ($atk_tip == "Normst")     $atk_tip = 22;
        if ($atk_tip == "Freeze")     $atk_tip = 23;

        if ($def_tip == "Grass")    $def_tip = 5;
        if ($def_tip == "Fire")     $def_tip = 2;
        if ($def_tip == "Water")    $def_tip = 3;
        if ($def_tip == "Bug")      $def_tip = 12;
        if ($def_tip == "Flying")   $def_tip = 10;
        if ($def_tip == "Normal")   $def_tip = 1;
        if ($def_tip == "Poison")   $def_tip = 8;
        if ($def_tip == "Electric") $def_tip = 4;
        if ($def_tip == "Ground")   $def_tip = 9;
        if ($def_tip == "Fighting") $def_tip = 7;
        if ($def_tip == "Fighted")  $def_tip = 19;
        if ($def_tip == "Psychic")  $def_tip = 11;
        if ($def_tip == "Rock")     $def_tip = 13;
        if ($def_tip == "Ice")      $def_tip = 6;
        if ($def_tip == "Dragon")   $def_tip = 15;
        if ($def_tip == "Steel")    $def_tip = 17;
        if ($def_tip == "Dark")     $def_tip = 16;
        if ($def_tip == "Ghost")    $def_tip = 14;
        if ($def_tip == "Fairy")    $def_tip = 18;
        if ($def_tip == "Psihst")     $atk_tip = 20;
        if ($def_tip == "Ghostst")     $atk_tip = 21;
        if ($def_tip == "Normst")     $atk_tip = 22;
        if ($def_tip == "Freeze")     $atk_tip = 22;
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
        if ($atk_tip == 1 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 1 and $def_tip == 20) $x = 1; // боев/лет
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
        if ($atk_tip == 2 and $def_tip == 19)  $x = 1; // боев/лет
        if ($atk_tip == 2 and $def_tip == 20) $x = 1; // боев/лет
        /* Водный */
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
        if ($atk_tip == 3 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 3 and $def_tip == 20) $x = 1; // боев/лет
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
        if ($atk_tip == 4 and $def_tip == 19) $x = 2; // боев/лет
        if ($atk_tip == 4 and $def_tip == 20) $x = 1; // боев/лет
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
        if ($atk_tip == 5 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 5 and $def_tip == 20) $x = 1; // боев/лет
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
        if ($atk_tip == 6 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 6 and $def_tip == 20) $x = 1; // боев/лет
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
        if ($atk_tip == 7 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 7 and $def_tip == 20) $x = 1; // боев/лет
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
        if ($atk_tip == 8 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 8 and $def_tip == 20) $x = 1; // боев/лет
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
        if ($atk_tip == 9 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 9 and $def_tip == 20) $x = 1; // боев/лет
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
        if ($atk_tip == 10 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 10 and $def_tip == 20) $x = 1; // боев/лет
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
        if ($atk_tip == 11 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 11 and $def_tip == 20) $x = 1; // псих стаусны
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
        if ($atk_tip == 12 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 12 and $def_tip == 20) $x = 1; // псих стаусны
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
        if ($atk_tip == 13 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 13 and $def_tip == 20) $x = 1; // псих стаусны
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
        if ($atk_tip == 14 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 14 and $def_tip == 20) $x = 1; // псих стаусны
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
        if ($atk_tip == 15 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 15 and $def_tip == 20) $x = 1; // псих стаусны
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
        if ($atk_tip == 16 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 16 and $def_tip == 20) $x = 1; // боев/лет
        if ($atk_tip == 16 and $def_tip == 20) $x = 1; // боев/лет
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
        if ($atk_tip == 17 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 17 and $def_tip == 20) $x = 1; // псих стаусны
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
        if ($atk_tip == 18 and $def_tip == 19) $x = 1; // боев/лет
        if ($atk_tip == 18 and $def_tip == 20) $x = 1; // псих стаусны
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
        if ($atk_tip == 19 and $def_tip == 19) $x = 1; // смешанный
        if ($atk_tip == 19 and $def_tip == 20) $x = 1; // псих стаусны
        /* псих */  /* ст */
        if ($atk_tip == 20 and $def_tip == 1)  $x = 1; //  normal
        if ($atk_tip == 20 and $def_tip == 2)  $x = 1;  //  fire
        if ($atk_tip == 20 and $def_tip == 3)  $x = 1;  //  water
        if ($atk_tip == 20 and $def_tip == 4)  $x = 1;  // electra
        if ($atk_tip == 20 and $def_tip == 5)  $x = 2;  //  grass
        if ($atk_tip == 20 and $def_tip == 6)  $x = 2;  //  ice
        if ($atk_tip == 20 and $def_tip == 7)  $x = 2;  //  fight
        if ($atk_tip == 20 and $def_tip == 8)  $x = 1;  //  poison
        if ($atk_tip == 20 and $def_tip == 9)  $x = 1;  //  ground
        if ($atk_tip == 20 and $def_tip == 10) $x = 1;  //  flying
        if ($atk_tip == 20 and $def_tip == 11) $x = 1;  //  psych
        if ($atk_tip == 20 and $def_tip == 12) $x = 1;  //  bug
        if ($atk_tip == 20 and $def_tip == 13) $x = 1;  //  rock
        if ($atk_tip == 20 and $def_tip == 14) $x = 1;  // ghost
        if ($atk_tip == 20 and $def_tip == 15) $x = 1;  // dragon
        if ($atk_tip == 20 and $def_tip == 16) $x = 2;  // dark
        if ($atk_tip == 20 and $def_tip == 17) $x = 1;  // steal
        if ($atk_tip == 20 and $def_tip == 18) $x = 1; // Волшеб
        if ($atk_tip == 20 and $def_tip == 19) $x = 1; // смешанный
        if ($atk_tip == 20 and $def_tip == 20) $x = 1; // псих стаусны
        /* призрак */  /* ст */
        if ($atk_tip == 21 and $def_tip == 1)  $x = 1; //  normal
        if ($atk_tip == 21 and $def_tip == 2)  $x = 1;  //  fire
        if ($atk_tip == 21 and $def_tip == 3)  $x = 1;  //  water
        if ($atk_tip == 21 and $def_tip == 4)  $x = 1;  // electra
        if ($atk_tip == 21 and $def_tip == 5)  $x = 2;  //  grass
        if ($atk_tip == 21 and $def_tip == 6)  $x = 2;  //  ice
        if ($atk_tip == 21 and $def_tip == 7)  $x = 2;  //  fight
        if ($atk_tip == 21 and $def_tip == 8)  $x = 1;  //  poison
        if ($atk_tip == 21 and $def_tip == 9)  $x = 1;  //  ground
        if ($atk_tip == 21 and $def_tip == 10) $x = 1;  //  flying
        if ($atk_tip == 21 and $def_tip == 11) $x = 1;  //  psych
        if ($atk_tip == 21 and $def_tip == 12) $x = 1;  //  bug
        if ($atk_tip == 21 and $def_tip == 13) $x = 1;  //  rock
        if ($atk_tip == 21 and $def_tip == 14) $x = 1;  // ghost
        if ($atk_tip == 21 and $def_tip == 15) $x = 1;  // dragon
        if ($atk_tip == 21 and $def_tip == 16) $x = 2;  // dark
        if ($atk_tip == 21 and $def_tip == 17) $x = 1;  // steal
        if ($atk_tip == 21 and $def_tip == 18) $x = 1; // Волшеб
        if ($atk_tip == 21 and $def_tip == 19) $x = 1; // смешанный
        if ($atk_tip == 21 and $def_tip == 21) $x = 1; // псих стаусны
        if ($atk_tip == 21 and $def_tip == 22) $x = 1; // псих стаусны

        /* нормальный */  /* ст */
        if ($atk_tip == 22 and $def_tip == 1)  $x = 1; //  normal
        if ($atk_tip == 22 and $def_tip == 2)  $x = 1;  //  fire
        if ($atk_tip == 22 and $def_tip == 3)  $x = 1;  //  water
        if ($atk_tip == 22 and $def_tip == 4)  $x = 1;  // electra
        if ($atk_tip == 22 and $def_tip == 5)  $x = 2;  //  grass
        if ($atk_tip == 22 and $def_tip == 6)  $x = 2;  //  ice
        if ($atk_tip == 22 and $def_tip == 7)  $x = 2;  //  fight
        if ($atk_tip == 22 and $def_tip == 8)  $x = 1;  //  poison
        if ($atk_tip == 22 and $def_tip == 9)  $x = 1;  //  ground
        if ($atk_tip == 22 and $def_tip == 10) $x = 1;  //  flying
        if ($atk_tip == 22 and $def_tip == 11) $x = 1;  //  psych
        if ($atk_tip == 22 and $def_tip == 12) $x = 1;  //  bug
        if ($atk_tip == 22 and $def_tip == 13) $x = 1;  //  rock
        if ($atk_tip == 22 and $def_tip == 14) $x = 1;  // ghost
        if ($atk_tip == 22 and $def_tip == 15) $x = 1;  // dragon
        if ($atk_tip == 22 and $def_tip == 16) $x = 2;  // dark
        if ($atk_tip == 22 and $def_tip == 17) $x = 1;  // steal
        if ($atk_tip == 22 and $def_tip == 18) $x = 1; // Волшеб
        if ($atk_tip == 22 and $def_tip == 19) $x = 1; // смешанный
        if ($atk_tip == 22 and $def_tip == 20) $x = 1; // псих стаусны
        if ($atk_tip == 22 and $def_tip == 21) $x = 1; // псих стаусны
        if ($atk_tip == 22 and $def_tip == 22) $x = 1; // псих стаусны

        /* сухой лед */  /* ст */
        if ($atk_tip == 23 and $def_tip == 1)  $x = 1; //  normal
        if ($atk_tip == 23 and $def_tip == 2)  $x = 0.5;  //  fire
        if ($atk_tip == 23 and $def_tip == 3)  $x = 4;  //  water
        if ($atk_tip == 23 and $def_tip == 4)  $x = 1;  // electra
        if ($atk_tip == 23 and $def_tip == 5)  $x = 2;  //  grass
        if ($atk_tip == 23 and $def_tip == 6)  $x = 0.5;  //  ice
        if ($atk_tip == 23 and $def_tip == 7)  $x = 1;  //  fight
        if ($atk_tip == 23 and $def_tip == 8)  $x = 1;  //  poison
        if ($atk_tip == 23 and $def_tip == 9)  $x = 2;  //  ground
        if ($atk_tip == 23 and $def_tip == 10) $x = 2;  //  flying
        if ($atk_tip == 23 and $def_tip == 11) $x = 1;  //  psych
        if ($atk_tip == 23 and $def_tip == 12) $x = 1;  //  bug
        if ($atk_tip == 23 and $def_tip == 13) $x = 1;  //  rock
        if ($atk_tip == 23 and $def_tip == 14) $x = 1;  // ghost
        if ($atk_tip == 23 and $def_tip == 15) $x = 2;  // dragon
        if ($atk_tip == 23 and $def_tip == 16) $x = 1;  // dark
        if ($atk_tip == 23 and $def_tip == 17) $x = 0.5;  // steal
        if ($atk_tip == 23 and $def_tip == 18) $x = 1; // Волшеб
        if ($atk_tip == 23 and $def_tip == 19) $x = 1; // смешанный
        if ($atk_tip == 23 and $def_tip == 20) $x = 1; // псих стаусны
        if ($atk_tip == 23 and $def_tip == 21) $x = 1; // псих стаусны
        if ($atk_tip == 23 and $def_tip == 22) $x = 1; // псих стаусны
        if ($atk_tip == 23 and $def_tip == 23) $x = 1; // псих стаусны

    }
    return $x;
}
$stat_upd = $mysqli->query('SELECT id FROM user_pokemons WHERE user_id = ' . $_SESSION['user_id'] . ' AND active = 1');
while ($stat_update = $stat_upd->fetch_assoc()) {
    stat_updates($stat_update['id']);
}

function plusStatus($bid, $pok, $st, $end, $rest = 0, $aroma = 0, $rft = 0, $lsc = 0)
{
    global $mysqli;
    $btl = $mysqli->query("SELECT turn FROM battle WHERE `id` = '" . $bid . "' ")->fetch_assoc();
    $sts = $mysqli->query("SELECT id,status FROM status WHERE `pok` = '" . $pok . "' and status <= '8' ")->fetch_assoc();
    $double = $mysqli->query("SELECT id,status FROM status WHERE `pok` = '" . $pok . "' and status = '" . $st . "' ")->fetch_assoc();
    $doubledis = $mysqli->query("SELECT id,status FROM status WHERE `pok` = '" . $pok . "' and status = '21' ")->fetch_assoc();


    if ($rest == 1) {
        $mysqli->query('DELETE FROM status WHERE pok = ' . $pok);
        $count = $btl['turn'] + $end + 1;
        return "INSERT INTO `status` (bid,pok,status,endr) VALUES('$bid','$pok','$st','$count')";
    }
    if ($aroma == 1) {
        $checkuser_pok = $mysqli->query("SELECT user_id FROM user_pokemons WHERE `id` = " . $pok)->fetch_assoc();
        $idpoksW = $mysqli->query("SELECT id FROM user_pokemons WHERE `user_id` = '" . $checkuser_pok['user_id'] . "' and `active` = '1'");
        while ($idpoks = $idpoksW->fetch_assoc()) {
            $mysqli->query('DELETE FROM status WHERE pok = ' . $idpoks['id']);
        }
    }
    if ($rft == 1) {
        $checkuser_pok_rft = $mysqli->query("SELECT user_id FROM user_pokemons WHERE `id` = " . $pok)->fetch_assoc();
        $idpoksW_rft = $mysqli->query("SELECT id FROM user_pokemons WHERE `user_id` = '" . $checkuser_pok_rft['user_id'] . "' and `active` = '1'");
        $count = $btl['turn'] + $end + 1;
        while ($idpoks_rft = $idpoksW_rft->fetch_assoc()) {
            $mysqli->query("INSERT INTO `status` (bid,pok,status,endr) VALUES ('$bid','" . $idpoks_rft['id'] . "','$st','$count')");
        }
    }
    if ($lsc == 1) {
        $checkuser_pok_lsc = $mysqli->query("SELECT user_id FROM user_pokemons WHERE `id` = " . $pok)->fetch_assoc();
        $idpoksW_lsc = $mysqli->query("SELECT id FROM user_pokemons WHERE `user_id` = '" . $checkuser_pok_lsc['user_id'] . "' and `active` = '1'");
        $count = $btl['turn'] + $end + 1;
        while ($idpoks_lsc = $idpoksW_lsc->fetch_assoc()) {
            $mysqli->query("INSERT INTO `status` (bid,pok,status,endr) VALUES ('$bid','" . $idpoks_lsc['id'] . "','$st','$count')");
        }
    }
    if ($st == 21) {
        if ($doubledis) {
            return "fall";
        }
        $count = $btl['turn'] + $end + 1;
        if ($battle['user1'] == $_SESSION['user_id']) {
            $slctatk = $mysqli->query("SELECT atk2 FROM battle WHERE id = " . $bid)->fetch_assoc();
            return "INSERT INTO `status` (bid,pok,status,endr,disable) VALUES('$bid','$pok','$st','$count','" . $slctatk['atk2'] . "')";
        } else {
            $slctatk = $mysqli->query("SELECT atk1 FROM battle WHERE id = " . $bid)->fetch_assoc();
            return "INSERT INTO `status` (bid,pok,status,endr,disable) VALUES('$bid','$pok','$st','$count','" . $slctatk['atk1'] . "')";
        }
    }
    if (($sts['id'] > 0 and $st <= 8) or $double['id'] > 0) {
        return "fall";
    } else {
        $count = $btl['turn'] + $end + 1;
        return "INSERT INTO `status` (bid,pok,status,endr) VALUES('$bid','$pok','$st','$count')";
    }
}

function AttackPole($bid, $pok, $type, $end)
{
    global $mysqli;


    $btl = $mysqli->query("SELECT pok1,pok2,spikes1,spikes2,tspikes1,tspikes2,spide1,spide2,rock1,rock2,lig1,lig2 FROM battle WHERE `id` = '" . $bid . "' ")->fetch_assoc();
    if ($btl['pok1'] == $pok) {
        $ind = 1;
        $indm = 2;
    } else {
        $ind = 2;
        $indm = 1;
    }
    switch ($type) {
        case 1:  //  spikes
            $spk = "spikes" . $ind;
            if ($btl[$spk] == 3) {
                return "fall";
            } else {
                return "UPDATE battle SET $spk = $spk+1 WHERE id='" . $bid . "'";
            }
            break;
        case 2: //  toxic spikes
            $spk = "tspikes" . $ind;
            if ($btl[$spk] == 2) {
                return "fall";
            } else {
                return "UPDATE battle SET $spk = $spk+1 WHERE id='" . $bid . "'";
            }
            break;

        case 3: //  Rapid Spin
            $spk = "spikes" . $indm;
            $tspk = "tspikes" . $indm;
            $spd = "spide" . $indm;
            $spr = "rock" . $indm;

            return "UPDATE battle SET $spk = 0, $tspk = 0, $spd = 0, $spr = 0 WHERE id='" . $bid . "'";
            break;

        case 4: //  Sticky Web
            $spk = " spide" . $ind;
            if ($btl[$spk] == 1) {
                return "fall";
            } else {
                return "UPDATE battle SET $spk = 1 WHERE id='" . $bid . "'";
            }
            break;

        case 5: //  Stealth Rock
            $spr = "rock" . $ind;
            if ($btl[$spk] == 1) {
                return "fall";
            } else {
                return "UPDATE battle SET $spr = 1 WHERE id='" . $bid . "'";
            }
            break;

        case 6: //  Stealth Rock
            $lsk = "lig" . $ind;
            if ($btl[$spk] == 1) {
                return "fall";
            } else {
                return "UPцDATE battle SET $lsk = 1 WHERE id='" . $bid . "'";
            }
            break;
    }
}
function plusChanges($bid, $pok, $type, $count, $stat)
{
    global $mysqli;
    $ch = $mysqli->query("SELECT * FROM `changes` WHERE `bid` = '" . $bid . "' and $stat > '0' and `pok`= '" . $pok . "' ")->fetch_assoc();
    if ($ch) {
        if ($type == $ch['type']) {
            if ($ch[$stat] == 6) {
                return "fall";
            } else {
                $newcount = $ch[$stat] + $count;
                if ($newcount > 6) {
                    $newcount = 6;
                }
                return "UPDATE changes SET $stat ='" . $newcount . "' WHERE id='" . $ch['id'] . "'";
            }
        } else {
            $ntype = $ch['type'];
            $newcount = $ch[$stat] - $count;
            if ($newcount < 0) {
                $newcount = $newcount * -1;
                if ($ch['type'] == 1) {
                    $ntype = 2;
                } else {
                    $ntype = 1;
                }
            }
            if ($newcount > 6) {
                $newcount = 6;
            }
            if ($newcount == 0) {
                return  "DELETE FROM `changes` WHERE `id` = '" . $ch['id'] . "'";
            } else {
                return  "UPDATE `changes` SET $stat ='" . $newcount . "', type='" . $ntype . "' WHERE id='" . $ch['id'] . "'";
            }
        }
    } else {
        return  "INSERT INTO `changes` (bid,pok,type,$stat) VALUES('$bid','$pok','$type','$count')";
    }
}
function plusStatusInv($bid, $pok, $type, $count, $stat)
{
    global $mysqli;
    $ch = $mysqli->query("SELECT * FROM `status` WHERE `bid` = '" . $bid . "' and `pok`= '" . $pok . "' ")->fetch_assoc();
    $btl = $mysqli->query("SELECT turn FROM battle WHERE `id` = '" . $bid . "' ")->fetch_assoc();
    $sts = $mysqli->query("SELECT id FROM status WHERE `pok` = '" . $pok . "' and status <= '19' ")->fetch_assoc();
    $double = $mysqli->query("SELECT id FROM status WHERE `pok` = '" . $pok . "' and status = '" . $st . "' ")->fetch_assoc();
    $count = $btl['turn'] + 5;
    if ($ch) {
        if ($type == $ch['type']) {
            if ($ch[$stat] == 6) {
                return "fall";
            } else {
                $newcount = $ch[$stat] + $count;
                if ($newcount > 6) {
                    $newcount = 6;
                }
                return "INSERT INTO `status` (bid,pok,status,endr) VALUES('$bid','$pok','19','$count')";
            }
        } else {
            $ntype = $ch['type'];
            $newcount = $ch[$stat] - $count;
            if ($newcount < 0) {
                $newcount = $newcount * -1;
                if ($ch['type'] == 1) {
                    $ntype = 2;
                } else {
                    $ntype = 1;
                }
            }
            if ($newcount > 6) {
                $newcount = 6;
            }
            if ($newcount == 0) {
                return  "INSERT INTO `status` (bid,pok,status,endr) VALUES('$bid','$pok','19','$count')";
            } else {
                return  "INSERT INTO `status` (bid,pok,status,endr) VALUES('$bid','$pok','19','$count')";
            }
        }
    } else {
        return  "INSERT INTO `status` (bid,pok,status,endr) VALUES('$bid','$pok','19','$count')";
    }
}
function clearChanges($bid, $pok, $type, $count, $stat)
{
    global $mysqli;
    $ch = $mysqli->query("SELECT * FROM `changes` WHERE `bid` = '" . $bid . "' and $stat > '0' and `pok`= '" . $pok . "' ")->fetch_assoc();
    if ($ch) {
        if ($type == $ch['type']) {
            if ($ch[$stat] == 6) {
                return "fall";
            } else {
                $newcount = $ch[$stat] + $count;
                if ($newcount > 6) {
                    $newcount = 6;
                }
                return "DELETE FROM `changes` WHERE `id` = '" . $ch['id'] . "'";
            }
        } else {
            $ntype = $ch['type'];
            $newcount = $ch[$stat] - $count;
            if ($newcount < 0) {
                $newcount = $newcount * -1;
                if ($ch['type'] == 1) {
                    $ntype = 2;
                } else {
                    $ntype = 1;
                }
            }
            if ($newcount > 6) {
                $newcount = 6;
            }
            if ($newcount == 0) {
                return  "DELETE FROM `changes` WHERE `id` = '" . $ch['id'] . "'";
            } else {
                return  "DELETE FROM `changes` WHERE `id` = '" . $ch['id'] . "'";
            }
        }
    } else {
        return  "DELETE FROM `changes` WHERE `id` = '" . $ch['id'] . "'";
    }
}
function plusDikPok($pid, $user_new, $it)
{
    global $mysqli;
    $pk = $mysqli->query("SELECT * FROM pokem_vs WHERE `id` = '" . $pid . "' ")->fetch_assoc();
    $pk12 = $mysqli->query('SELECT * FROM base_pokemon WHERE id = ' . $pk['basenum'])->fetch_assoc();

    $pg = 0;
    switch ($it) {
        case 60:
            $ball = "покебол";
            break;
        case 61:
            $ball = "гритбол";
            break;
        case 63:
            $ball = "ультрабол";
            break;
        case 64:
            $ball = "дайвбол";
            break;
        case 65:
            $ball = "фастбол";
            break;
        case 66:
            $ball = "френдбол";
            $character = 5;
            break;
        case 67:
            $ball = "левелбол";
            break;
        case 68:
            $ball = "лавбол";
            break;
        case 72:
            $ball = "даркбол";
            $pg = 5;
            break;
        case 62:
            $ball = "мастербол";
            break;
    }

    $myLvl = $pk['lvl'] + 1;
    $exp_g = $mysqli->query('SELECT exp_group FROM base_pokemon WHERE id = ' . $pk['basenum'])->fetch_assoc();
    if ($exp_g['exp_group'] == 1 or $exp_g['exp_group'] == 2) { // Быстрый
        $exp_max = 4 * pow($myLvl, 3) / 5;
    }
    if ($exp_g['exp_group'] == 3 or $exp_g['exp_group'] == 4) { // Средний
        $exp_max = pow($myLvl, 3);
    }
    if ($exp_g['exp_group'] == 5) { // Средний медленный
        $exp_max = 1.2 * pow($myLvl, 3) - 15 * pow($myLvl, 2) + 100 * $myLvl - 140;
    }
    if ($exp_g['exp_group'] == 6 or $exp_g['exp_group'] == 0) { // Медленный
        $exp_max = 5 * pow($myLvl, 3) / 4;
    }

    $incpk =  $mysqli->query("SELECT id FROM `user_pokemons` WHERE `user_id`='" . $user_new . "' and `active`='1'");
    $incpk_ = $incpk->num_rows;
    if ($incpk_ == 6) {
        $activ = 0;
    } else {
        $activ = 1;
    }
    if ($pk['gender'] == 1) {
        $gn = "male";
    } else {
        $gn = "female";
    }
    if ($pk['gender'] == 0) {
        $gn = "no";
    }
    $pok_base = $mysqli->query("SELECT hp,atk,def,spd,satk,sdef FROM base_pokemon WHERE `id` = '" . $pk['basenum'] . "' ")->fetch_assoc();
    $har = $mysqli->query("SELECT atk,def,speed,satk,sdef FROM har WHERE `id_har` = '" . $pk['har'] . "' ")->fetch_assoc();
    $Weight = $mysqli->query("SELECT weight FROM base_pokemon WHERE `id` = '" . $pk['basenum'] . "' ")->fetch_assoc();
    if ($pk['type'] == "normal") {
        $dgn = 0;
    } else {
        $dgn = 5;
    }
    $hg = rand(5, 29) + $dgn + $pg;
    $ag = rand(5, 29) + $dgn + $pg;
    $dg = rand(5, 29) + $dgn + $pg;
    $sg = rand(5, 29) + $dgn + $pg;
    $sag = rand(5, 29) + $dgn + $pg;
    $sdg = rand(5, 29) + $dgn + $pg;
    $s1 = round((($pok_base['hp'] * 2) + $hg) * ($pk['lvl'] / 100) + 10 + $pk['lvl']);
    $s2 = round((($pok_base['atk'] * 2 + $ag) * $pk['lvl'] / 100 + 5) * $har['atk']);
    $s3 = round((($pok_base['def'] * 2 + $dg) * $pk['lvl'] / 100 + 5) * $har['def']);
    $s4 = round((($pok_base['spd'] * 2 + $sg) * $pk['lvl'] / 100 + 5) * $har['speed']);
    $s5 = round((($pok_base['satk'] * 2 + $sag) * $pk['lvl'] / 100 + 5) * $har['satk']);
    $s6 = round((($pok_base['sdef'] * 2 + $sdg) * $pk['lvl'] / 100 + 5) * $har['sdef']);

    $mysqli->query("INSERT INTO `user_pokemons` (`Weight`,`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,spark,atk1,atk2,pp1,pp2) VALUES ('" . $pk12['weight'] . "','" . $user_new . "','" . $pk['basenum'] . "','" . $pk['basenum'] . "','" . $pk['name'] . "','" . $pk['har'] . "','" . $pk['lvl'] . "','" . time() . "','" . $activ . "','" . $pk['type'] . "','" . $gn . "','" . $exp_max . "','" . $pk['hp'] . "','" . $s1 . "','" . $s2 . "','" . $s3 . "','" . $s4 . "','" . $s5 . "','" . $s6 . "','" . $hg . "','" . $ag . "','" . $dg . "','" . $sg . "','" . $sag . "','" . $sdg . "','" . $user_new . "','" . $user_new . "','0','" . rand(1, 3) . "','1','" . $pk['atk1'] . "','" . $pk['atk2'] . "','5','5') ");

    $pID = $mysqli->insert_id;

    $lg =  "<b>" . infUsr($user_new, "login") . ":</b> бросает " . $ball . "... Покемон пойман!";
    return $lg;
}

function useITEM($battle, $ind)
{
    global $mysqli;
    $arg = "item" . $ind;
    if ($ind == 1) {
        $arg_m = "pok1";
        $arg_v = "pok2";
    } else {
        $arg_m = "pok2";
        $arg_v = "pok1";
    }
    if ($battle[$arg] > 0) {
        switch ($battle[$arg]) {
            case 60: // Pokeball

                $pk1 = $mysqli->query("SELECT * FROM pokem_vs WHERE `id` = '" . $battle[$arg_v] . "'")->fetch_assoc();
                //  $hp_prc = round($pk1['hp']/$pk1['hp_max']*100);
                $hp_prc = round($pk1['hp'] / $pk1['hp_max']);
                //   if($hp_prc >= mt_rand(1,100)){


                if ($pk1['basenum'] == 492) {
                    $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                    return array("log" => $log_p);
                } else {
                    if ($pk1['lvl'] >= 80) {
                        $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Даного покемона нельзя поймать!";
                        return array("log" => $log_p);
                    } else {
                        minus_item(1, 60);
                        if ($hp_prc >= 0.6) {
                            if (rand(1, 100) < 90) {

                                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> бросает покебол... Покемон вырвался!";
                                return array("log" => $log_p);
                            } else {
                                $log_p = plusDikPok($battle['pok2'], $battle['user1'], 60);
                                return array("log" => $log_p, "dmg" => 9999999);
                            }
                        } elseif ($hp_prc >= 0.2 and $hp_prc < 0.6) {
                            if (rand(1, 4) > 2) {
                                $log_p = plusDikPok($battle['pok2'], $battle['user1'], 60);
                                return array("log" => $log_p, "dmg" => 9999999);
                            } else {
                                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> бросает покебол... Покемон вырвался!";
                                return array("log" => $log_p);
                            }
                        } else {
                            $log_p = plusDikPok($battle['pok2'], $battle['user1'], 60);
                            return array("log" => $log_p, "dmg" => 9999999);
                        }
                    }
                }
                break;
            case 72: // DarkBall
                $pk1 = $mysqli->query("SELECT * FROM pokem_vs WHERE `id` = '" . $battle[$arg_v] . "'")->fetch_assoc();
                $hp_prc = round($pk1['hp'] / $pk1['hp_max']);
                if ($pk1['basenum'] == 492) {
                    $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                    return array("log" => $log_p);
                } else {
                    if ($pk1['lvl'] >= 80) {
                        $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Даного покемона нельзя поймать!";
                        return array("log" => $log_p);
                    } else {
                        minus_item(1, 72);
                        if ($hp_prc >= 0.6) {
                            if (rand(1, 100) < 70) {

                                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> бросает Даркбол... Покемон вырвался!";
                                return array("log" => $log_p);
                            } else {
                                $log_p = plusDikPok($battle['pok2'], $battle['user1'], 72);
                                return array("log" => $log_p, "dmg" => 9999999);
                            }
                        } elseif ($hp_prc >= 0.2 and $hp_prc < 0.6) {
                            if (rand(1, 8) > 2) {
                                $log_p = plusDikPok($battle['pok2'], $battle['user1'], 72);
                                return array("log" => $log_p, "dmg" => 9999999);
                            } else {
                                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> бросает Даркбол... Покемон вырвался!";
                                return array("log" => $log_p);
                            }
                        } else {
                            $log_p = plusDikPok($battle['pok2'], $battle['user1'], 72);
                            return array("log" => $log_p, "dmg" => 9999999);
                        }
                    }
                }
                break;
            case 61: //GreatBall
                $pk1 = $mysqli->query("SELECT * FROM pokem_vs WHERE `id` = '" . $battle[$arg_v] . "'")->fetch_assoc();
                $hp_prc = round($pk1['hp'] / $pk1['hp_max']);
                if ($pk1['basenum'] == 492) {
                    $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                    return array("log" => $log_p);
                } else {
                    if ($pk1['lvl'] >= 80) {
                        $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Даного покемона нельзя поймать!";
                        return array("log" => $log_p);
                    } else {
                        minus_item(1, 61);
                        if ($hp_prc >= 0.6) {
                            if (rand(1, 100) < 70) {
                                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> бросает гритбол... Покемон вырвался!";
                                return array("log" => $log_p);
                            } else {
                                $log_p = plusDikPok($battle['pok2'], $battle['user1'], 61);
                                return array("log" => $log_p, "dmg" => 9999999);
                            }
                        } elseif ($hp_prc >= 0.2 and $hp_prc < 0.6) {
                            if (rand(1, 8) > 2) {
                                $log_p = plusDikPok($battle['pok2'], $battle['user1'], 61);
                                return array("log" => $log_p, "dmg" => 9999999);
                            } else {
                                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> бросает гритбол... Покемон вырвался!";
                                return array("log" => $log_p);
                            }
                        } else {
                            $log_p = plusDikPok($battle['pok2'], $battle['user1'], 61);
                            return array("log" => $log_p, "dmg" => 9999999);
                        }
                    }
                }
                break;

            case 63: //UltraBall
                $pk1 = $mysqli->query("SELECT * FROM pokem_vs WHERE `id` = '" . $battle[$arg_v] . "'")->fetch_assoc();
                $hp_prc = round($pk1['hp'] / $pk1['hp_max']);
                if ($pk1['basenum'] == 492) {
                    $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                    return array("log" => $log_p);
                } else {
                    if ($pk1['lvl'] >= 80) {
                        $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Даного покемона нельзя поймать!";
                        return array("log" => $log_p);
                    } else {
                        minus_item(1, 63);
                        if ($hp_prc >= 0.6) {
                            if (rand(1, 100) < 60) {
                                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> бросает ультрабол... Покемон вырвался!";
                                return array("log" => $log_p);
                            } else {
                                $log_p = plusDikPok($battle['pok2'], $battle['user1'], 63);
                                return array("log" => $log_p, "dmg" => 9999999);
                            }
                        } elseif ($hp_prc >= 0.2 and $hp_prc < 0.6) {
                            if (rand(1, 16) > 2) {
                                $log_p = plusDikPok($battle['pok2'], $battle['user1'], 63);
                                return array("log" => $log_p, "dmg" => 9999999);
                            } else {
                                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> бросает ультрабол... Покемон вырвался!";
                                return array("log" => $log_p);
                            }
                        } else {
                            $log_p = plusDikPok($battle['pok2'], $battle['user1'], 63);
                            return array("log" => $log_p, "dmg" => 9999999);
                        }
                    }
                }
                break;
            case 64: //Дайвбол

                $pk1 = $mysqli->query("SELECT * FROM pokem_vs WHERE `id` = '" . $battle[$arg_v] . "'")->fetch_assoc();
                $tp = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "'")->fetch_assoc();
                $plu = 1;

                if ($pk1['basenum'] == 492) {
                    $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                    return array("log" => $log_p);
                } else {

                    if ($pk1['lvl'] >= 80) {
                        $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                        return array("log" => $log_p);
                    } else {
                        minus_item(1, 64);

                        if ($tp['type'] == "water" or $tp['type_two'] == "water") {
                            $plu = 30;
                        }
                        $hp_prc = round($pk1['hp'] / $pk1['hp_max'] * 100) - $plu;
                        if ($hp_prc >= mt_rand(1, 100)) {
                            $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> бросает дайвбол... Покемон вырвался!";
                            return array("log" => $log_p);
                        } else {
                            $log_p = plusDikPok($battle['pok2'], $battle['user1'], 64);
                            return array("log" => $log_p, "dmg" => 9999999);
                        }
                    }
                }
                break;
            case 65: //Фастбол


                $pk1 = $mysqli->query("SELECT * FROM pokem_vs WHERE `id` = '" . $battle[$arg_v] . "'")->fetch_assoc();
                $tp = $mysqli->query("SELECT spd FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "'")->fetch_assoc();
                $plu = 1;
                if ($pk1['basenum'] == 492) {
                    $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                    return array("log" => $log_p);
                } else {
                    if ($pk1['lvl'] >= 80) {
                        $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                        return array("log" => $log_p);
                    } else {
                        minus_item(1, 65);
                        if ($tp['spd'] > 70) {
                            $plu = 30;
                        }
                        $hp_prc = round($pk1['hp'] / $pk1['hp_max'] * 100) - $plu;
                        if ($hp_prc >= mt_rand(1, 100)) {
                            $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> бросает фастбол... Покемон вырвался!";
                            return array("log" => $log_p);
                        } else {
                            $log_p = plusDikPok($battle['pok2'], $battle['user1'], 65);
                            return array("log" => $log_p, "dmg" => 9999999);
                        }
                    }
                }
                break;
            case 62:

                //Мастербол    
                $pk1 = $mysqli->query("SELECT * FROM pokem_vs WHERE `id` = '" . $battle[$arg_v] . "'")->fetch_assoc();
                $tp = $mysqli->query("SELECT spd FROM base_pokemon WHERE `id` = '" . $pk1['basenum'] . "'")->fetch_assoc();
                if ($pk1['basenum'] == 492) {
                    $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                    return array("log" => $log_p);
                } else {
                    if ($pk1['lvl'] >= 80) {
                        $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                        return array("log" => $log_p);
                    } else {
                        minus_item(1, 62);
                        $plu = 100;
                        $hp_prc = round($pk1['hp'] / $pk1['hp_max'] * 100) - $plu;
                        if (($hp_prc >= mt_rand(1, 100))) {

                            $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> бросает мастербол... Покемон вырвался!";
                            return array("log" => $log_p);
                        } else {
                            $log_p = plusDikPok($battle['pok2'], $battle['user1'], 62);
                            return array("log" => $log_p, "dmg" => 9999999);
                        }
                    }
                }
                break;
            case 66: //Френдбол


                $pk1 = $mysqli->query("SELECT * FROM pokem_vs WHERE `id` = '" . $battle[$arg_v] . "'")->fetch_assoc();
                if ($pk1['basenum'] == 492) {
                    $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                    return array("log" => $log_p);
                } else {
                    if ($pk1['lvl'] >= 80) {
                        $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                        return array("log" => $log_p);
                    } else {
                        minus_item(1, 66);
                        $plu = 100;
                        $plu = 1;
                        $hp_prc = round($pk1['hp'] / $pk1['hp_max'] * 100) - $plu;
                        if ($hp_prc >= mt_rand(1, 100)) {
                            $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> бросает френдбол... Покемон вырвался!";
                            return array("log" => $log_p);
                        } else {
                            $log_p = plusDikPok($battle['pok2'], $battle['user1'], 66);
                            return array("log" => $log_p, "dmg" => 9999999);
                        }
                    }
                }
                break;
            case 67: //Левелбол


                $pk1 = $mysqli->query("SELECT * FROM pokem_vs WHERE `id` = '" . $battle[$arg_v] . "'")->fetch_assoc();
                $pk2 = $mysqli->query("SELECT lvl FROM user_pokemons WHERE `id` = '" . $battle[$arg_m] . "'")->fetch_assoc();
                $pk3 = $mysqli->query("SELECT speed FROM user_pokemons WHERE `id` = '" . $battle[$arg_m] . "'")->fetch_assoc();
                if ($pk1['basenum'] == 492) {
                    $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                    return array("log" => $log_p);
                } else {
                    if ($pk1['lvl'] >= 80) {
                        $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                        return array("log" => $log_p);
                    } else {
                        minus_item(1, 67);
                        $plu = 1;
                        if ($pk2['lvl'] > $pk1['lvl']) {
                            $plu = 30;
                        }
                        $hp_prc = round($pk1['hp'] / $pk1['hp_max'] * 100) - $plu;
                        if ($hp_prc >= mt_rand(1, 100)) {
                            $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> бросает левелбол... Покемон вырвался!";
                            return array("log" => $log_p);
                        } else {
                            $log_p = plusDikPok($battle['pok2'], $battle['user1'], 67);
                            return array("log" => $log_p, "dmg" => 9999999);
                        }
                    }
                }
                break;
            case 68: //Лавбол


                $pk1 = $mysqli->query("SELECT * FROM pokem_vs WHERE `id` = '" . $battle[$arg_v] . "'")->fetch_assoc();
                $pk2 = $mysqli->query("SELECT gender FROM user_pokemons WHERE `id` = '" . $battle[$arg_m] . "'")->fetch_assoc();
                $plu = 1;
                if ($pk1['basenum'] == 492) {
                    $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                    return array("log" => $log_p);
                } else {
                    if ($pk1['lvl'] >= 80) {
                        $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> Покемона нельзя поймать!";
                        return array("log" => $log_p);
                    } else {
                        minus_item(1, 68);
                        if ($pk2['gender'] !== $pk1['gender']) {
                            $plu = 30;
                        }
                        $hp_prc = round($pk1['hp'] / $pk1['hp_max'] * 100) - $plu;
                        if ($hp_prc >= mt_rand(1, 100)) {
                            $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> бросает лавбол... Покемон вырвался!";
                            return array("log" => $log_p);
                        } else {
                            $log_p = plusDikPok($battle['pok2'], $battle['user1'], 68);
                            return array("log" => $log_p, "dmg" => 9999999);
                        }
                    }
                }
                break;

            case 15:   //Слабый эликсир
                $pk = $mysqli->query("SELECT atk1,atk2,atk3,atk4,pp1,pp2,pp3,pp4 FROM user_pokemons WHERE `id` = '" . $battle[$arg_m] . "'")->fetch_assoc();
                minus_item(1, 15, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Слабый Эликсир.";
                $plPP = 5;
                $pp1 = $pk['pp1'] + $plPP;
                $pp2 = $pk['pp2'] + $plPP;
                $pp3 = $pk['pp3'] + $plPP;
                $pp4 = $pk['pp4'] + $plPP;
                $ai1 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $pk['atk1'] . "'")->fetch_assoc();
                $ai2 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $pk['atk2'] . "'")->fetch_assoc();
                $ai3 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $pk['atk3'] . "'")->fetch_assoc();
                $ai4 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $pk['atk4'] . "'")->fetch_assoc();
                if ($pp1 > $ai1['atac_pp']) {
                    $pp1 = $ai1['atac_pp'];
                }
                if ($pp2 > $ai2['atac_pp']) {
                    $pp2 = $ai2['atac_pp'];
                }
                if ($pp3 > $ai3['atac_pp']) {
                    $pp3 = $ai3['atac_pp'];
                }
                if ($pp4 > $ai4['atac_pp']) {
                    $pp4 = $ai4['atac_pp'];
                }
                $mysqli->query("UPDATE user_pokemons SET `pp1`='$pp1',`pp2`='$pp2',`pp3`='$pp3',`pp4`='$pp4' WHERE id='" . $battle[$arg_m] . "'");
                return array("log" => $log_p);
                break;
                //$pok_my = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1 ORDER BY start_pok DESC limit 6');
                /*if($battle[$arg] == 1046){ //Камень мегаэволюции
    $checkmega = $mysqli->query("SELECT megause FROM users WHERE id = '".$_SESSION['user_id']."'")->fetch_assoc();
    $pk = $mysqli->query("SELECT basenum FROM user_pokemons WHERE `id` = '".$battle[$arg_m]."'")->fetch_assoc();
    minus_item(1,1046,$battle['user'.$ind]);
    $mega3 = 3; $mega6 = 6; $mega9 = 9; $mega15 = 15; $mega18 = 18; $mega65 = 65; $mega80 = 80; $mega94 = 94; $mega115 = 115; $mega127 = 127; $mega130 = 130; $mega142 = 142; $mega181 = 181; $mega208 = 208; $mega212 = 212; $mega214 = 214; $mega229 = 229; $mega248 = 248; $mega254 = 254; $mega257 = 257; $mega260 = 260; $mega282 = 282; $mega302 = 302; $mega303 = 303; $mega306 = 306; $mega308 = 308; $mega310 = 310; $mega319 = 319; $mega323 = 323; $mega334 = 334; $mega354 = 354; $mega359 = 359; $mega362 = 362; $mega373 = 373; $mega376 = 376; $mega380 = 380; $mega381 = 381; $mega384 = 384; $mega428 = 428; $mega445 = 445; $mega448 = 448; $mega460 = 460; $mega475 = 475; $mega531 = 531; $mega719 = 719;
    $log_p = "<b>".infUsr($battle['user'.$ind],"login").":</b> использует Камень Мега-Эволюции.";
  if($checkmega['megause'] == 0){
    if($pk['basenum'] == $mega6){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3006' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega65){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3065' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega3){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3003' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega9){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3009' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega15){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3015' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
   //  $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega18){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3018' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
   //  $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega80){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3080' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
   //  $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega94){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3094' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
   //  $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega115){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3115' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
   //  $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega127){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3127' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega130){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3130' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega142){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3142' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega208){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3208' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega212){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3212' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega214){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3214' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
   //  $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega229){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3229' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
   //  $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega248){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3248' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega254){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3254' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega257){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3257' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
   //  $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega260){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3260' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega181){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3181' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega319){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3319' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega282){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3282' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega302){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3302' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
   //  $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega303){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3303' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega306){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3306' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega308){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3308' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega310){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3310' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega323){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3323' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega334){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3334' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega354){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3354' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega359){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3359' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega362){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3362' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega373){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3373' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega376){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3376' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
     //$log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega380){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3380' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega381){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3381' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega384){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3384' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
   //  $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega428){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3428' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega445){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3445' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega448){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3448' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega460){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3460' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega475){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3475' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
    // $log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega531){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3531' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
     //$log_p = $log_p." Провал!";
     }
     if($pk['basenum'] == $mega719){
    $mysqli->query("UPDATE user_pokemons SET `basenum` = '3719' WHERE id='".$battle[$arg_m]."'");
    $mysqli->query("UPDATE users SET `megause` = '1' WHERE id = '".$battle['user'.$ind]."'");
    return array("log"=>$log_p);
    $log_p = $log_p." Успешно!";
     }else{
     //$log_p = $log_p." Провал!";
     }
    }else{return;}
   }*/

            case 16: //эликсир
                $pk = $mysqli->query("SELECT atk1,atk2,atk3,atk4,pp1,pp2,pp3,pp4 FROM user_pokemons WHERE `id` = '" . $battle[$arg_m] . "'")->fetch_assoc();
                minus_item(1, 16, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Эликсир.";
                $plPP = 10;
                $pp1 = $pk['pp1'] + $plPP;
                $pp2 = $pk['pp2'] + $plPP;
                $pp3 = $pk['pp3'] + $plPP;
                $pp4 = $pk['pp4'] + $plPP;
                $ai1 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $pk['atk1'] . "'")->fetch_assoc();
                $ai2 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $pk['atk2'] . "'")->fetch_assoc();
                $ai3 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $pk['atk3'] . "'")->fetch_assoc();
                $ai4 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $pk['atk4'] . "'")->fetch_assoc();
                if ($pp1 > $ai1['atac_pp']) {
                    $pp1 = $ai1['atac_pp'];
                }
                if ($pp2 > $ai2['atac_pp']) {
                    $pp2 = $ai2['atac_pp'];
                }
                if ($pp3 > $ai3['atac_pp']) {
                    $pp3 = $ai3['atac_pp'];
                }
                if ($pp4 > $ai4['atac_pp']) {
                    $pp4 = $ai4['atac_pp'];
                }
                $mysqli->query("UPDATE user_pokemons SET `pp1`='$pp1',`pp2`='$pp2',`pp3`='$pp3',`pp4`='$pp4' WHERE id='" . $battle[$arg_m] . "'");
                return array("log" => $log_p);
                break;
            case 17: //Мощный эликсир
                $pk = $mysqli->query("SELECT atk1,atk2,atk3,atk4,pp1,pp2,pp3,pp4 FROM user_pokemons WHERE `id` = '" . $battle[$arg_m] . "'")->fetch_assoc();
                minus_item(1, 17, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Мощный Эликсир.";
                $plPP = 20;
                $pp1 = $pk['pp1'] + $plPP;
                $pp2 = $pk['pp2'] + $plPP;
                $pp3 = $pk['pp3'] + $plPP;
                $pp4 = $pk['pp4'] + $plPP;
                $ai1 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $pk['atk1'] . "'")->fetch_assoc();
                $ai2 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $pk['atk2'] . "'")->fetch_assoc();
                $ai3 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $pk['atk3'] . "'")->fetch_assoc();
                $ai4 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $pk['atk4'] . "'")->fetch_assoc();
                if ($pp1 > $ai1['atac_pp']) {
                    $pp1 = $ai1['atac_pp'];
                }
                if ($pp2 > $ai2['atac_pp']) {
                    $pp2 = $ai2['atac_pp'];
                }
                if ($pp3 > $ai3['atac_pp']) {
                    $pp3 = $ai3['atac_pp'];
                }
                if ($pp4 > $ai4['atac_pp']) {
                    $pp4 = $ai4['atac_pp'];
                }
                $mysqli->query("UPDATE user_pokemons SET `pp1`='$pp1',`pp2`='$pp2',`pp3`='$pp3',`pp4`='$pp4' WHERE id='" . $battle[$arg_m] . "'");
                return array("log" => $log_p);
                break;


            case 3: //Антидот
                minus_item(1, 3, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Антидот.";
                $stat = $mysqli->query("SELECT * FROM status WHERE `status` > '0' and `pok` = '" . $battle[$arg_m] . "'")->fetch_assoc();
                if ((rand(1, 100) < 76) and ($stat['status'] == 1 or $stat['status'] == 8)) {
                    $mysqli->query("DELETE FROM `status` WHERE `status` = '1' OR '8' and `pok` = '" . $battle[$arg_m] . "'");
                    $log_p = $log_p . " Успешно!";
                } else {
                    $log_p = $log_p . " Провал!";
                }
                return array("log" => $log_p);
                break;
            case 4: //Энергетик
                minus_item(1, 4, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Энергетик.";
                $stat = $mysqli->query("SELECT id FROM status WHERE `status` = '2' and `pok` = '" . $battle[$arg_m] . "'")->fetch_assoc();
                if (rand(1, 100) <= 75 and $stat['id'] > 0) {
                    $mysqli->query("DELETE FROM `status` WHERE `id` = '" . $stat['id'] . "'");
                    $log_p = $log_p . " Успешно!";
                } else {
                    $log_p = $log_p . " Провал!";
                }
                return array("log" => $log_p);
                break;
            case 286: //Кофе
                minus_item(1, 286, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Кофе.";
                if (rand(1, 100) <= 100) {
                    $quer = plusStatusInv($battle['id'], $battle[$arg_m], 19, 19, 19);
                    if ($quer == "fall") {
                        $log_p = $log_p . " Провал";
                    } else {
                        $mysqli->query($quer);
                        $log_p = $log_p . " Успешно!";
                    }
                } else {
                    $log_p = $log_p . " Но не вышло!";
                }
                return array("log" => $log_p);
                break;

                /*if($battle[$arg] == 1046){ // Мегаэволь Чарика
    minus_item(1,1046);
    $log_p = "<b>".infUsr($battle['user'.$ind],"login").":</b> использует Энергетик.";
    $stat = $mysqli->query("SELECT * FROM user_pokemons WHERE `basenum` = '6' and `user_id` = '".$_SESSION['user_id']"'")->fetch_assoc();
    if(rand(1,100) <= 100){
     $mysqli->query("UPDATE user_pokemons SET `basenum` = '3006' WHERE id ='".$pok['id']."'");
     $log_p = $log_p." Успешно!";
     }else{
     $log_p = $log_p." Провал!";
     }
     return array("log"=>$log_p);
  }*/
            case 9: //Огнетушитеь
                minus_item(1, 9, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Огнетушитель.";
                $stat = $mysqli->query("SELECT id FROM status WHERE `status` = '3' and `pok` = '" . $battle[$arg_m] . "'")->fetch_assoc();
                if (rand(1, 100) <= 75 and $stat['id'] > 0) {
                    $mysqli->query("DELETE FROM `status` WHERE `id` = '" . $stat['id'] . "'");
                    $log_p = $log_p . " Успешно!";
                } else {
                    $log_p = $log_p . " Провал!";
                }
                return array("log" => $log_p);
                break;
            case 13: //Антифриз
                minus_item(1, 13, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Антифриз.";
                $stat = $mysqli->query("SELECT id FROM status WHERE `status` = '5' and `pok` = '" . $battle[$arg_m] . "'")->fetch_assoc();
                if (rand(1, 100) <= 75 and $stat['id'] > 0) {
                    $mysqli->query("DELETE FROM `status` WHERE `id` = '" . $stat['id'] . "'");
                    $log_p = $log_p . " Успешно!";
                } else {
                    $log_p = $log_p . " Провал!";
                }
                return array("log" => $log_p);
                break;
            case 36: //Антипарализ
                minus_item(1, 36, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Антипарализ.";
                $stat = $mysqli->query("SELECT id FROM status WHERE `status` = '4' and `pok` = '" . $battle[$arg_m] . "'")->fetch_assoc();
                if (rand(1, 100) <= 75 and $stat['id'] > 0) {
                    $mysqli->query("DELETE FROM `status` WHERE `id` = '" . $stat['id'] . "'");
                    $log_p = $log_p . " Успешно!";
                } else {
                    $log_p = $log_p . " Провал!";
                }
                return array("log" => $log_p);
                break;
            case 21: //Зелье исцеления
                minus_item(1, 21, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Зелье исцеления.";
                $stat = $mysqli->query("SELECT id FROM status WHERE `pok` = '" . $battle[$arg_m] . "'")->fetch_assoc();
                if ($stat['id'] > 0) {
                    $mysqli->query("DELETE FROM `status` WHERE `id` = '" . $stat['id'] . "'");
                    $log_p = $log_p . " Успешно!";
                } else {
                    $log_p = $log_p . " Провал!";
                }
                return array("log" => $log_p);
                break;


            case 53: //X Точность
                minus_item(1, 53, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует X Точность.";
                if (rand(1, 100) <= 60) {
                    $quer = plusChanges($battle['id'], $battle[$arg_m], 1, 1, "accuracy");
                    if ($quer == "fall") {
                        $log_p = $log_p . " Провал";
                    } else {
                        $mysqli->query($quer);
                        $log_p = $log_p . " Успешно!";
                    }
                } else {
                    $log_p = $log_p . " Но не вышло!";
                }
                return array("log" => $log_p);
                break;
            case 54: //X Атака
                minus_item(1, 54, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует X Атака.";
                if (rand(1, 100) <= 60) {
                    $quer = plusChanges($battle['id'], $battle[$arg_m], 1, 1, "atk");
                    if ($quer == "fall") {
                        $log_p = $log_p . " Провал";
                    } else {
                        $mysqli->query($quer);
                        $log_p = $log_p . " Успешно!";
                    }
                } else {
                    $log_p = $log_p . " Но не вышло!";
                }
                return array("log" => $log_p);
                break;
            case 55: //X Защита
                minus_item(1, 55, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует X Защита.";
                if (rand(1, 100) <= 60) {
                    $quer = plusChanges($battle['id'], $battle[$arg_m], 1, 1, "def");
                    if ($quer == "fall") {
                        $log_p = $log_p . " Провал";
                    } else {
                        $mysqli->query($quer);
                        $log_p = $log_p . " Успешно!";
                    }
                } else {
                    $log_p = $log_p . " Но не вышло!";
                }
                return array("log" => $log_p);
                break;
            case 56: //X Спец.Защита
                minus_item(1, 56, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует X Спец.Защита.";
                if (rand(1, 100) <= 60) {
                    $quer = plusChanges($battle['id'], $battle[$arg_m], 1, 1, "sdef");
                    if ($quer == "fall") {
                        $log_p = $log_p . " Провал";
                    } else {
                        $mysqli->query($quer);
                        $log_p = $log_p . " Успешно!";
                    }
                } else {
                    $log_p = $log_p . " Но не вышло!";
                }
                return array("log" => $log_p);
                break;
            case 57: //X Спец.Атака
                minus_item(1, 57, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует X Спец.Атака.";
                if (rand(1, 100) <= 60) {
                    $quer = plusChanges($battle['id'], $battle[$arg_m], 1, 1, "satk");
                    if ($quer == "fall") {
                        $log_p = $log_p . " Провал";
                    } else {
                        $mysqli->query($quer);
                        $log_p = $log_p . " Успешно!";
                    }
                } else {
                    $log_p = $log_p . " Но не вышло!";
                }
                return array("log" => $log_p);
                break;
            case 58: //X Спец.Атака
                minus_item(1, 58, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует X Скорость.";
                if (rand(1, 100) <= 60) {
                    $quer = plusChanges($battle['id'], $battle[$arg_m], 1, 1, "speed");
                    if ($quer == "fall") {
                        $log_p = $log_p . " Провал";
                    } else {
                        $mysqli->query($quer);
                        $log_p = $log_p . " Успешно!";
                    }
                } else {
                    $log_p = $log_p . " Но не вышло!";
                }
                return array("log" => $log_p);
                break;

            case 29: //Стимпак
                minus_item(1, 29, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Cтимпак!";
                return array("log" => $log_p, "plus_hp" => 500);
                break;


                /*if($battle[$arg] == 1046){ //Камень
    minus_item(1,1046);
     $log_p = "<b>".infUsr($battle['user'.$ind],"login").":</b> использует МегаКамень";
       return array("log"=>$log_p,"plus_hp"=>500);
  } */

            case 38: //Стимулятор
                minus_item(1, 38, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Стимулятор!";
                return array("log" => $log_p, "plus_hp" => 10);
                break;
            case 50: //Улучшенный стимулятор
                minus_item(1, 50, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Улучшенный стимулятор!";
                return array("log" => $log_p, "plus_hp" => 50);
                break;
            case 51: //Суперстимулятор
                minus_item(1, 51, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Суперстимулятор!";
                return array("log" => $log_p, "plus_hp" => 100);
                break;
            case 173: //Лечебная трава
                minus_item(1, 173, $battle['user' . $ind]);
                $log_p = "<b>" . infUsr($battle['user' . $ind], "login") . ":</b> использует Лечебную траву!";
                return array("log" => $log_p, "plus_hp" => 5);
                break;
        }
    } else {
        return false;
    }
}
function DopAtk($atk, $chanc, $damager, $opponent, $bid)
{
    global  $mysqli;
    $dex2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $opponent['basenum'] . "'")->fetch_assoc();
    $type = tip($aInf['atac_tip'], $dex2['type']) * tip($aInf['atac_tip'], $dex2['type_two']);
    $sleepprotect = $mysqli->query("SELECT status FROM status WHERE `pok` = '" . $opponent['id'] . "' AND `bid` = '" . $bid . "'")->fetch_assoc();
    $rt = array();
    switch ($atk) {
        case 549: // - Glaciate
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "speed");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Скопость противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 1059: // - Glaciate
            if ($pk1['hp'] > $pk2['hp']) {
                $plus = plusChanges($bid, $damager['id'], 1, 6, "atk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Атака +6";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = "";
                }
            }
            break;

        case 132: // - Constrict
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "speed");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Скорость противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 556: // - Icicle Crash
            $plus = plusStatus($bid, $opponent['id'], 13, 2);
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Противник напуган";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 405: // - Bug Buzz
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "sdef");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Cпец. Защита противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 211: // - Steel Wing
            $plus = plusChanges($bid, $damager['id'], 1, 1, "def");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Защита пользователя +1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 232: // - Metal Claw
            $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Атака пользователя +1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 309: // - Meteor Mash
            $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Атака пользователя +1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 488:  // --- Flame Charge
            $plus = plusChanges($bid, $damager['id'], 1, 1, "speed");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Скорость +1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 53: // - Flamethrower
            $plus = plusStatus($bid, $opponent['id'], 3, 9999);
            if ($plus !== "fall") {
                if ($dex2['type'] == "fire" or $dex2['type_two'] == "fire") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Не удалось поджечь противника";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник подожжен";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 247: // - Shadow Ball
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "sdef");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = "Спец. защита противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 192: // - Zap Cannon
            $plus = plusStatus($bid, $opponent['id'], 4, 9999);
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Противник парализован";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 395: // - Force Palm
            $plus = plusStatus($bid, $opponent['id'], 4, 9999);
            if ($plus !== "fall") {
                if (
                    $dex2['type'] == "ground" or $dex2['type_two'] == "ground" or
                    $dex2['type'] == "electric" or $dex2['type_two'] == "electric"
                ) {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Не удалось парализовать противника";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник парализован";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 430: // - Flash Cannon
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "sdef");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = "Спец. защита противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 85: // - Thunderbolt
            $plus = plusStatus($bid, $opponent['id'], 4, 9999);
            if ($plus !== "fall") {
                if (
                    $dex2['type'] == "ground" or $dex2['type_two'] == "ground" or
                    $dex2['type'] == "electric" or $dex2['type_two'] == "electric"
                ) {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Не удалось парализовать противника";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник парализован";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 189:  // --- Mud-Slap
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "accuracy");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Точность противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 534:  // --- Shell Razer
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "def");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = "Защита противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 561:  // --- Fire Lash
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "def");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = "Защита противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 330:  // --- Muddy Water
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "accuracy");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Точность противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 40: // - Poison Sting
            $plus = plusStatus($bid, $opponent['id'], 1, 9999);
            if ($plus !== "fall") {
                if ($dex2['type'] == "poison" or $dex2['type_two'] == "poison" or $dex2['type'] == "steel" or $dex2['type_two'] == "steel") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к яду";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник отравлен";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 41: // - Twineedle
            $plus = plusStatus($bid, $opponent['id'], 1, 9999);
            if ($plus !== "fall") {
                if ($dex2['type'] == "poison" or $dex2['type_two'] == "poison" or $dex2['type'] == "steel" or $dex2['type_two'] == "steel") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к яду";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник отравлен";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 440: // - Cross Poison
            $plus = plusStatus($bid, $opponent['id'], 1, 9999);
            if ($plus !== "fall") {
                if ($dex2['type'] == "poison" or $dex2['type_two'] == "poison" or $dex2['type'] == "steel" or $dex2['type_two'] == "steel") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к яду";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник отравлен";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 196:  // --- Icy Wind
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "speed");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Скорость противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 523:  // --- Bulldoze
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "speed");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Скорость противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 341:  // --- Mud Shot
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "speed");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Скорость противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 491:  // --- Acid spray
            $plus = plusChanges($bid, $opponent['id'], 2, 2, "sdef");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Спец. Защита противника -2";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 317:  // --- Rock Tomb
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "speed");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Cкорость противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 295:  // --- Rock Tomb
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "sdef");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = "Спец. защита противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 315:  // --- Rock Tomb
            $plus = plusChanges($bid, $damager['id'], 2, 2, "satk");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Терпит отдачу от перегрева, Спец. Атака - 2";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 437:  // --- Rock Tomb
            $plus = plusChanges($bid, $damager['id'], 2, 2, "satk");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Терпит отдачу от шторма, Спец. Атака - 2";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 1001:  // --- Moonblast
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "satk");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = "Спец. Атака противника понизилась на - 1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 100039:  // --- Rock Tomb
            $plus = plusChanges($bid, $damager['id'], 1, 1, "def");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Покемон укрепляет свое тело Защита +1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 122: // - Lick
            $plus = plusStatus($bid, $opponent['id'], 4, 9999);
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Противник парализован";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 398: // - Poison jab
            $plus = plusStatus($bid, $opponent['id'], 1, 9999);
            if ($plus !== "fall") {
                if ($dex2['type'] == "poison" or $dex2['type_two'] == "poison" or $dex2['type'] == "steel" or $dex2['type_two'] == "steel") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к яду";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник отравлен";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 188: // - Sludge Bomb
            $plus = plusStatus($bid, $opponent['id'], 1, 9999);
            if ($plus !== "fall") {
                if ($dex2['type'] == "poison" or $dex2['type_two'] == "poison" or $dex2['type'] == "steel" or $dex2['type_two'] == "steel") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к яду";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник отравлен";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 482: // - Sludge Wave
            $plus = plusStatus($bid, $opponent['id'], 1, 9999);
            if ($plus !== "fall") {
                if ($dex2['type'] == "poison" or $dex2['type_two'] == "poison" or $dex2['type'] == "steel" or $dex2['type_two'] == "steel") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к яду";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник отравлен";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 100037: // - Sludge Wave
            $plus = plusStatus($bid, $opponent['id'], 7, 9999);
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Противник проклят";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 422: // - Thunder Fang
            $plus = plusStatus($bid, $opponent['id'], 4, 9999);
            if ($plus !== "fall") {
                if (
                    $dex2['type'] == "ground" or $dex2['type_two'] == "ground" or
                    $dex2['type'] == "electric" or $dex2['type_two'] == "electric"
                ) {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Не удалось парализовать противника";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник парализован";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 1021: // - Nuzzle
            $plus = plusStatus($bid, $opponent['id'], 4, 9999);
            if ($plus !== "fall") {
                if (
                    $dex2['type'] == "ground" or $dex2['type_two'] == "ground" or
                    $dex2['type'] == "electric" or $dex2['type_two'] == "electric"
                ) {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Не удалось парализовать противника";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник парализован";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 423: // - Ice Fang
            $plus = plusStatus($bid, $opponent['id'], 5, rand(3, 5));
            if ($plus !== "fall") {
                if ($dex2['type'] == "ice" or $dex2['type_two'] == "ice") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к заморозке";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник заморожен";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 34: // - Body Slam
            $plus = plusStatus($bid, $opponent['id'], 4, 9999);
            if ($plus !== "fall") {
                if ($dex2['type'] == "ghost" or $dex2['type_two'] == "ghost" or $dex2['type'] == "ground" or $dex2['type_two'] == "ground" or $dex2['type'] == "electric" or $dex2['type_two'] == "electric") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет иммунитет к парализу";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник парализован";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 359: // - Hammer Arm
            $plus = plusChanges($bid, $damager['id'], 2, 1, "speed");
            if ($plus !== "fall") {
                $rt['mos'] = 1;
                $rt['mysql'][1] = $plus;
                $rt['log'] = " Скорость -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 451:  // --- Muddy Water
            $plus = plusChanges($bid, $damager['id'], 1, 1, "satk");
            if ($plus !== "fall") {
                $rt['mos'] = 1;
                $rt['mysql'][1] = $plus;
                $rt['log'] = " Спец. Атака +1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 242:  // --- Muddy Water
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "def");
            if ($plus !== "fall") {
                $rt['mos'] = 1;
                $rt['mysql'][1] = $plus;
                $rt['log'] = "Защита противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 370:  // --- Close Combat
            $plus = plusChanges($bid, $damager['id'], 2, 1, "def");
            $plus2 = plusChanges($bid, $damager['id'], 2, 1, "sdef");
            if ($plus !== "fall") {
                $rt['mos'] = 2;
                $rt['mysql'][1] = $plus;
                $rt['mysql'][2] = $plus2;
                $rt['log'] = "Защита и Спец.Защита пользователя -1. ";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 305: // - Pioson Fang
            $plus = plusStatus($bid, $opponent['id'], 1, 99999);
            if ($plus !== "fall") {
                if ($dex2['type'] == "poison" or $dex2['type_two'] == "poison" or $dex2['type'] == "steel" or $dex2['type_two'] == "steel") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к яду";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник отравлен ядом";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 221: // - Sacred Fire
            $plus = plusStatus($bid, $opponent['id'], 3, 99999);
            if ($plus !== "fall") {
                if ($dex2['type'] == "fire" or $dex2['type_two'] == "fire") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к огню";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник поддожен";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 87: // - Thunder
            $plus = plusStatus($bid, $opponent['id'], 4, 9999);
            if ($plus !== "fall") {
                if (
                    $dex2['type'] == "ground" or $dex2['type_two'] == "ground" or
                    $dex2['type'] == "electric" or $dex2['type_two'] == "electric"
                ) {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Не удалось парализовать противника";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник парализован";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 276: // --- Growth
            $plus = plusChanges($bid, $damager['id'], 2, 1, "atk");
            $plus2 = plusChanges($bid, $damager['id'], 2, 1, "def");
            if ($plus !== "fall") {
                $rt['mos'] = 2;
                $rt['mysql'][1] = $plus;
                $rt['mysql'][2] = $plus2;
                $rt['log'] = " Атака -1 Защита -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 1113:  // --- Growth
            $plus = plusChanges($bid, $damager['id'], 2, 1, "def");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Защита Пользователя -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
            }
            break;

        case 246: // - AncientPower
            $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
            $plus4 = plusChanges($bid, $damager['id'], 1, 1, "satk");
            $plus2 = plusChanges($bid, $damager['id'], 1, 1, "def");
            $plus5 = plusChanges($bid, $damager['id'], 1, 1, "sdef");
            $plus3 = plusChanges($bid, $damager['id'], 1, 1, "speed");
            if ($plus !== "fall") {
                $rt['mos'] = 5;
                $rt['mysql'][1] = $plus;
                $rt['mysql'][2] = $plus2;
                $rt['mysql'][3] = $plus3;
                $rt['mysql'][4] = $plus4;
                $rt['mysql'][5] = $plus5;
                $rt['log'] = " Атака +1 Спец.атака +1 Спец.защита +1 Защита +1 Скорость +1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 552: // - AncientPower
            $plus = (plusChanges($bid, $damager['id'], 1, 1, "satk"));

            if ($plus !== "fall") {
                $rt['mos'] = 1;
                $rt['mysql'][1] = $plus;
                $rt['log'] = "Спец.атака +1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;



        case 424: // - Fire Fang
            $plus = plusStatus($bid, $opponent['id'], 3, 9999);
            if ($plus !== "fall") {
                if ($dex2['type'] == "fire" or $dex2['type_two'] == "fire") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к огню";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник подожжен";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 394: // - Flare Blitz
            $plus = plusStatus($bid, $opponent['id'], 3, 9999);
            if ($plus !== "fall") {
                if ($dex2['type'] == "fire" or $dex2['type_two'] == "fire") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к огню";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник в огне";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 503: // - Scald
            $plus = plusStatus($bid, $opponent['id'], 3, 9999);
            if ($plus !== "fall") {
                if ($dex2['type'] == "fire" or $dex2['type_two'] == "fire") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к огню";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник в огне";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 58: // - ice beam
            $plus = plusStatus($bid, $opponent['id'], 5, rand(3, 5));
            if ($plus !== "fall") {
                if ($dex2['type'] == "ice" or $dex2['type_two'] == "ice") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к заморозке";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник заморожен";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 59: // - Ice Fang
            $plus = plusStatus($bid, $opponent['id'], 5, rand(3, 5));
            if ($plus !== "fall") {
                if ($dex2['type'] == "ice" or $dex2['type_two'] == "ice") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к заморозке";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник заморожен";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 181: // - Ice Fang
            $plus = plusStatus($bid, $opponent['id'], 5, rand(3, 5));
            if ($plus !== "fall") {
                if ($dex2['type'] == "ice" or $dex2['type_two'] == "ice") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к заморозке";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник заморожен";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 1019: // - Ice Fang
            $plus = plusStatus($bid, $opponent['id'], 5, rand(3, 5));
            if ($plus !== "fall") {
                if ($dex2['type'] == "ice" or $dex2['type_two'] == "ice") {
                    $rt['mysql'] = "fall";
                    $rt['log'] = " Противник имеет имунитет к заморозке";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник заморожен";
                }
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " Провал изменения состояния";
            }
            break;

        case 100031:
            if ($pk2['status'] == 5) { // - Flare Blitz
                $plus = plusStatus($bid, $opponent['id'], 0, 0);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Покемон отогрелся";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = "";
                }
            }

            if ($pk1['status'] == 5) { // - Flare Blitz
                $plus = plusStatus($bid, $damager['id'], 0, 0);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Покемон отогрелся";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = "";
                }
            }
            break;

        case 93: // - Confusion
            $plus = plusStatus($bid, $opponent['id'], 6, rand(2, 4));
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Противник спутан";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 186: // - Confusion
            $plus = plusStatus($bid, $opponent['id'], 6, rand(2, 5));
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Противник спутан";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 352: // - Wather Pulse
            $plus = plusStatus($bid, $opponent['id'], 6, rand(1, 4));
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Противник спутан";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 10008: // - Wather Pulse
            $plus = plusStatus($bid, $damager['id'], 6, rand(1, 4));
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Покемон впадает в ярость...";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 100038: // - Wather Pulse
            $plus = plusStatus($bid, $damager['id'], 6, rand(1, 4));
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Покемон впадает в ярость...";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 10007: // - Wather Pulse
            $plus = plusStatus($bid, $damager['id'], 6, rand(1, 4));
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Покемон впадает в ярость...";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 428: // - Zen Heabbut
            $plus = plusStatus($bid, $opponent['id'], 13, 2);
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Противник напуган";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 157: // - Rock Slide
            $plus = plusStatus($bid, $opponent['id'], 13, 2);
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Противник напуган";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 399: // - Dark Pulse
            $plus = plusStatus($bid, $opponent['id'], 13, 2);
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Противник напуган";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 127: // - Waterfall
            $plus = plusStatus($bid, $opponent['id'], 13, 2);
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Противник напуган";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 326: // - Extrasensory
            $plus = plusStatus($bid, $opponent['id'], 13, 2);
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Противник напуган";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 403: // - Air Slash
            $plus = plusStatus($bid, $opponent['id'], 13, 2);
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Противник напуган";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = "";
            }
            break;

        case 94: // - Psychic
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "sdef");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Спец. Защита противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " ";
            }
            break;

        case 412: // - Energy Ball
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "sdef");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Спец. Защита противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " ";
            }
            break;

        case 1101: // - Liquidation
            $plus = plusChanges($bid, $opponent['id'], 2, 1, "def");
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Защита противника -1";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " ";
            }
            break;

        case 229: // - Rapid Spin
            $plus = AttackPole($bid, $opponent['id'], 3, 99999);
            if ($plus !== "fall") {
                $rt['mysql'] = $plus;
                $rt['log'] = " Покемон убрал с поля все ловушки";
            } else {
                $rt['mysql'] = $plus;
                $rt['log'] = " ";
            }
            break;
    }
    return $rt;
}
function OsobCategory($atk, $damager, $opponent, $bid)
{
    global $mysqli;
    $aInf = $mysqli->query("SELECT atac_tip,atac_accuracy,atac_goal FROM base_attacks WHERE `atac_id` = '" . $atk . "'")->fetch_assoc();
    $dex2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $opponent['basenum'] . "'")->fetch_assoc();
    $type = tip($aInf['atac_tip'], $dex2['type']) * tip($aInf['atac_tip'], $dex2['type_two']);
    $status = $mysqli->query("SELECT status FROM status WHERE `bid` = '" . $bid . "' and `pok` = '" . $damager['id'] . "' ")->fetch_assoc();
    $nasm = $mysqli->query("SELECT id FROM status WHERE `bid` = '" . $bid . "' and `pok` = '" . $damager['id'] . "' and `status` = '10' ")->fetch_assoc();

    $dex = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $damager['basenum'] . "'")->fetch_assoc();
    // modificators
    $lup = 0;
    if ($damager['item_id'] == 293) {
        $lup = 0.8;
    }



    $blest = 0;
    if ($opponent['item_id'] == 8) {
        $blest = 0.8;
    }
    // -----
    $accuracy = $aInf['atac_accuracy'] * ((round(4 + $modInfMyPl['accuracy'] + $modInfVsMn['agillity'] + $lup)) / (round(4 + $modInfMyMn['accuracy'] + $modInfVsPl['agillity'] + $blest)));
    if ($aInf['atac_accuracy'] == 0) {
        $accuracy = 100;
    } elseif ($aInf['atac_accuracy'] == 60) {
        $accuracy = 50;
    }

    if (rand(1, 100) <= $accuracy) {
        $miss = 0;
    } else {
        $miss = 1;
    }
    $rt = array();
    if ($nasm) {
        $rt['mysql'] = "fall";
        $rt['log'] = " ПРОВАЛ";
        return $rt;
    }
    if ($nasm) {
        $rt['mysql'] = "fall";
        $rt['log'] = " ПРОВАЛ";
        return $rt;
    }
    if ($status['status'] == 2) {
        $rt['mysql'] = "fall";
        $rt['log'] = " Покемон спит";
        return $rt;
    }
    if ($status['status'] == 13) {
        $rt['mysql'] = "fall";
        $rt['log'] = " Покемон напуган";
        return $rt;
    }
    if ($status['status'] == 5) {
        $rt['mysql'] = "fall";
        $rt['log'] = " Покемон заморожен";
        return $rt;
    }
    if ($status['status'] == 4 and rand(1, 100) <= 25) {
        $rt['mysql'] = "fall";
        $rt['log'] = " Покемон парализован";
        return $rt;
    }
    if ($type == 0) {
        if ($aInf['atac_goal'] == 1) {
            $aInf['chans_dop'] = 0;
            $rt['mysql'] = "fall";
            $rt['log'] = " Нет эффекта!";
            return $rt;
        }
    }

    if ($miss == 0) {
        switch ($atk) {
            case 14: // --- Sword Dance
                $plus = plusChanges($bid, $damager['id'], 1, 2, "atk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Атака +2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 187:  // ---  Belly Drum
                $plus = plusChanges($bid, $damager['id'], 1, 6, "atk");
                $rec = $damager['hp_max'];
                $nhp = $damager['hp'] / 2;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $rt['mos'] = 2;
                $rt['mysql'][1] = "plus_hp";
                $rt['mysql'][2] = $plus;
                $rt['hp_p'][1] = $nhp;
                $rt['log'] = "Покемон начинает яростно колотить свой живот имитируя звуки набата!! Атака + 6";
                break;

            case 1114:  // ---  Звенящяя душа
                $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
                $plus2 = plusChanges($bid, $damager['id'], 1, 1, "def");
                $plus3 = plusChanges($bid, $damager['id'], 1, 1, "speed");
                $plus4 = plusChanges($bid, $damager['id'], 1, 1, "satk");
                $plus5 = plusChanges($bid, $damager['id'], 1, 1, "sdef");
                $rec = $damager['hp_max'];
                $nhp = $damager['hp'] / 3;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $rt['mos'] = 6;
                $rt['mysql'][1] = "plus_hp";
                $rt['mysql'][2] = $plus;
                $rt['mysql'][3] = $plus2;
                $rt['mysql'][4] = $plus3;
                $rt['mysql'][5] = $plus4;
                $rt['mysql'][6] = $plus5;
                $rt['hp_p'][1] = $nhp;
                $rt['log'] = "Покемон разбивает душу на части и повышает все свои характеристики на +1. Жизненные силы отняты на треть.";
                break;

            case 162:  // --- Super Fang
                $rec = $opponent['hp_max'];
                $nhp = $opponent['hp'] / 2;
                if ($nhp > $opponent['hp_max']) {
                    $nhp = $opponent['hp_max'];
                }
                $rt['mos'] = 2;
                $rt['mysql'][1] = "plus_hp";
                $rt['hp_p'][2] = $nhp;
                break;

            case 1115:  // --- Super Fang
                $rec = $opponent['hp_max'];
                $nhp = $opponent['hp'] / 2;
                if ($nhp > $opponent['hp_max']) {
                    $nhp = $opponent['hp_max'];
                }
                $rt['mos'] = 2;
                $rt['mysql'][1] = "plus_hp";
                $rt['hp_p'][2] = $nhp;
                break;

            case 174:  // --- Curse
                $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
                $plus2 = plusChanges($bid, $damager['id'], 1, 1, "def");
                $plus3 = plusChanges($bid, $damager['id'], 2, 1, "speed");
                if ($plus !== "fall") {
                    $rt['mos'] = 3;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['mysql'][3] = $plus3;
                    $rt['log'] = " Атака +1 Защита +1 Скорость -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 370:  // --- Rock Tomb
                $plus = plusChanges($bid, $damager['id'], 2, 1, "def");
                $plus2 = plusChanges($bid, $damager['id'], 2, 1, "sdef");
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Спец. Защита - 1,Защита - 1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 417: // --- Nasty Plot
                $plus = plusChanges($bid, $damager['id'], 1, 2, "satk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Спец. Атака +2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 106:  // --- Harden
                $plus = plusChanges($bid, $damager['id'], 1, 1, "def");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Защита +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 110:  // --- Withdraw
                $plus = plusChanges($bid, $damager['id'], 1, 1, "def");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Защита +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 133:  // --- Amnesia
                $plus = plusChanges($bid, $damager['id'], 1, 2, "sdef");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Спец. Защита +2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 112:  // --- Barrier
                $plus = plusChanges($bid, $damager['id'], 1, 2, "def");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Защита +2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 107:  // --- Mimizme
                $plus = plusChanges($bid, $damager['id'], 1, 1, "agillity");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Ловкость +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 104:  // ---  double team
                $plus = plusChanges($bid, $damager['id'], 1, 1, "agillity");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Ловкость +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 111:  // --- Defense Curl
                $plus = plusChanges($bid, $damager['id'], 1, 1, "def");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Защита +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 334:  // --- Инфо Iron Defense
                $plus = plusChanges($bid, $damager['id'], 1, 2, "def");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Защита +2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 108:  // --- SmokeScreen
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "accuracy");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Точность противника -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 43:  // --- Leer
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "def");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Защита противника -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 191: // --- Spikes
                $plus = AttackPole($bid, $opponent['id'], 1, 99999);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Покемон раскидывает шипы";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 1073:  // ---Sticky Web $damager['item_id'] == 293
                $plus = AttackPole($bid, $opponent['id'], 4, 99999);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Покемон сплел паутину";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 114: // - AncientPower
                $statusfaild = $mysqli->query("SELECT status FROM status WHERE `bid` = '" . $bid . "' and `pok` = '" . $damager['id'] . "' and `status` > '0' ")->fetch_assoc();
                $plus1 = clearChanges($bid, $opponent['id'], 0, 0, "atk");
                $plus2 = clearChanges($bid, $opponent['id'], 0, 0, "satk");
                $plus3 = clearChanges($bid, $opponent['id'], 0, 0, "def");
                $plus4 = clearChanges($bid, $opponent['id'], 0, 0, "sdef");
                $plus5 = clearChanges($bid, $opponent['id'], 0, 0, "speed");
                $plus6 = clearChanges($bid, $opponent['id'], 0, 0, "agillity");
                $plus7 = clearChanges($bid, $opponent['id'], 0, 0, "accuracy");
                $plus8 = clearChanges($bid, $damager['id'], 0, 0, "atk");
                $plus9 = clearChanges($bid, $damager['id'], 0, 0, "satk");
                $plus10 = clearChanges($bid, $damager['id'], 0, 0, "def");
                $plus11 = clearChanges($bid, $damager['id'], 0, 0, "sdef");
                $plus12 = clearChanges($bid, $damager['id'], 0, 0, "speed");
                $plus13 = clearChanges($bid, $damager['id'], 0, 0, "agillity");
                $plus14 = clearChanges($bid, $damager['id'], 0, 0, "accuracy");
                if ($plus !== "fall") {
                    if ($statusfaild['status'] == "2" or $statusfaild['status'] == "5" or $statusfaild['status'] == "8" or $statusfaild['status'] == "10") {
                        $rt['mysql'] = "fall";
                        $rt['log'] = "Провал сброса статов противника.";
                    } else {
                        $rt['mos'] = 14;
                        $rt['mysql'][1] = $plus1;
                        $rt['mysql'][2] = $plus2;
                        $rt['mysql'][3] = $plus3;
                        $rt['mysql'][4] = $plus4;
                        $rt['mysql'][5] = $plus5;
                        $rt['mysql'][6] = $plus6;
                        $rt['mysql'][7] = $plus7;
                        $rt['mysql'][8] = $plus8;
                        $rt['mysql'][9] = $plus9;
                        $rt['mysql'][10] = $plus10;
                        $rt['mysql'][11] = $plus11;
                        $rt['mysql'][12] = $plus12;
                        $rt['mysql'][13] = $plus13;
                        $rt['mysql'][14] = $plus14;
                        $rt['log'] = "Статы покемонов обнулились...";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = "";
                }
                break;

            case 215:
                $informid = $mysqli->query("SELECT id FROM user_pokemons WHERE `id` = '" . $damager['id'] . "' and `user_id` = '" . $damager['user_id'] . "' and `hp` > '0' and `active` = '1' ")->fetch_assoc();
                $mysqli->query("DELETE FROM `status` WHERE `pok` = '" . $informid['id'] . "'");
                $rt['log'] = "Исцеляющий колокольчик снял все статусы с команды тренера";
                break;

            case 109: // - Confuse Ray
                $plus = plusStatus($bid, $opponent['id'], 6, rand(1, 4));
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник спутан";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 169: // - Spider Web
                $plus = plusStatus($bid, $opponent['id'], 20, 9999);
                if ($plus !== "fall") {
                    if ($dex2['type'] == "ghost" or $dex2['type_two'] == "ghost") {
                        $rt['mysql'] = "fall";
                        $rt['log'] = " Противник избежал спутывания.";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник связан";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 35: // - Wrap
                $plus = plusStatus($bid, $opponent['id'], 20, rand(4, 5));
                if ($plus !== "fall") {
                    if ($dex2['type'] == "ghost" or $dex2['type_two'] == "ghost") {
                        $rt['mysql'] = "fall";
                        $rt['log'] = " Противник избежал спутывания.";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник связан";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 269: // - Taunt
                $plus = plusStatus($bid, $opponent['id'], 10, 3);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Надсмехается над противником";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 446:  // -- Stealth Rock
                $plus = AttackPole($bid, $opponent['id'], 5, 99999);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Покемон поставил каменную ловушку";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 113:  // -- Stealth Rock
                $plus = plusStatus($bid, $damager['id'], 12, 5, 0, 0, 0, 1);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Покемон установил экран света";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 115:  // -- Reflect
                $plus = plusStatus($bid, $damager['id'], 11, 5, 0, 0, 1);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Покемон установил защитный экран";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 390:  // --- Toxic Spikes
                $plus = AttackPole($bid, $opponent['id'], 2, 99999);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Покемон раскидывает отравленные шипы";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 28:  // --- Sand Attack
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "accuracy");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Точность противника -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 81:  // --- String Shot
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "speed");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Скорость противника -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 45:  // --- Growl
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "atk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Атака противника -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 103:  // --- Screech
                $plus = plusChanges($bid, $opponent['id'], 2, 2, "def");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Защита противника -2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 184:  // --- Scary Face
                $plus = plusChanges($bid, $opponent['id'], 2, 2, "speed");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Скорость противника -2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 97: // --- Agillity
                $plus = plusChanges($bid, $damager['id'], 1, 2, "speed");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Скорость +2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 538: // --- Cotton Guard
                $plus = plusChanges($bid, $damager['id'], 1, 3, "def");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Защита +3";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 336:  // --- Howl
                $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Атака +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 148:  // --- Flash
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "accuracy");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Точность противника -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 39:  // --- Tail Whip
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "def");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Защита противника -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 1012:  // --- Play Nice
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "atk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Атака противника -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 356:  // --- Gravity
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "agillity");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Ловкость противника -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 159:  // --- Sharpen
                $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Атака +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 96:  // --- Meditate
                $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Атака +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 1006:  // --- King's Shield
                $plus = plusChanges($bid, $opponent['id'], 2, 2, "atk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Атака противника -2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 445: // --- Captivate
                $plus = plusChanges($bid, $opponent['id'], 2, 2, "satk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Спец. Атака противника -2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 367:  // --- Acupressure
                $stT = array();
                $stT[1] = "atk";
                $stT[2] = "def";
                $stT[3] = "satk";
                $stT[4] = "sdef";
                $stT[5] = "speed";
                $stT[6] = "accuracy";
                $stT[7] = "agillity";
                $stTi = array();
                $stTi[1] = "Атака";
                $stTi[2] = "Защита";
                $stTi[3] = "Спец. Атака";
                $stTi[4] = "Спец. Защита";
                $stTi[5] = "Скорость";
                $stTi[6] = "Точность";
                $stTi[7] = "Ловкость";
                $rnST = rand(1, 7);
                $plus = plusChanges($bid, $damager['id'], 1, 2, $stT[$rnST]);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " " . $stTi[$rnST] . " +2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 1005: // --- Baby-Doll Eyes
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "atk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Атака противника -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 300:  // --- Mud Sport
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "speed");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Скорость противника -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 1055:  // --- Confide
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "satk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Спец. Атака противника -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 134:  // --- Kinesis
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "accuracy");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Точность противника -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 319:  // --- Metal Sound
                $plus = plusChanges($bid, $opponent['id'], 2, 2, "sdef");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Спец. Защита противника -2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 230:  // --- Sweet Scent
                $plus = plusChanges($bid, $opponent['id'], 2, 2, "agillity");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Ловкость противника -2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 107:  // --- Minimize
                $plus = plusChanges($bid, $damager['id'], 1, 1, "agillity");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Ловкость +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 297:  // --- Feather Dance
                $plus = plusChanges($bid, $opponent['id'], 2, 2, "atk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Атака противника -2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 313: // --- Fake Tears
                $plus = plusChanges($bid, $opponent['id'], 2, 2, "sdef");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Спец. Защита противника -2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 178:  // --- Cotton Spore
                $plus = plusChanges($bid, $opponent['id'], 2, 2, "speed");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Скорость противника -2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 1018:  // --- Eerie Impulse
                $plus = plusChanges($bid, $opponent['id'], 2, 2, "satk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Спец. Атака противника -2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 204:  // --- Charm
                $plus = plusChanges($bid, $opponent['id'], 2, 2, "atk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Атака противника -2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 397:  // --- Rock Polish
                $plus = plusChanges($bid, $damager['id'], 1, 2, "speed");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Скорость +2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 294:  // --- Tail Glow
                $plus = plusChanges($bid, $damager['id'], 1, 3, "satk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Спец. Атака +3";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 475:  // --- Autotomize
                $plus = plusChanges($bid, $damager['id'], 1, 2, "speed");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Скорость +2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 1003:  // --- Flower Shield
                $plus = plusChanges($bid, $damager['id'], 1, 1, "def");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Защита +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 151:  // --- Acid Armor
                $plus = plusChanges($bid, $damager['id'], 1, 2, "def");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Защита +2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 432:  // --- Defog
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "agillity");
                $plus2 = AttackPole($bid, $opponent['id'], 3, 99999);
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Ловкость соперника -1 | С поля боя убраны все ловушки";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 1068: // --- Parting Shot
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "atk");
                $plus2 = plusChanges($bid, $opponent['id'], 2, 1, "satk");
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Атака противника -1 Спец. Атака -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 321:  // --- Tickle
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "atk");
                $plus2 = plusChanges($bid, $opponent['id'], 2, 1, "def");
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Атака противника -1 Защита -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 1067:  // --- Noble Roar
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "atk");
                $plus2 = plusChanges($bid, $opponent['id'], 2, 1, "satk");
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Атака противника -1 Спец. Атака -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 508:  // --- Shift Gear
                $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
                $plus2 = plusChanges($bid, $damager['id'], 1, 2, "speed");
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Атака +1 Скорость +2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 455:  // --- Defend Order
                $plus = plusChanges($bid, $damager['id'], 1, 1, "def");
                $plus2 = plusChanges($bid, $damager['id'], 1, 1, "sdef");
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Защита +1 Спец. Защита +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 262:  // --- Memento
                $plus = plusChanges($bid, $opponent['id'], 2, 2, "atk");
                $plus2 = plusChanges($bid, $opponent['id'], 2, 2, "satk");
                $rec = $damager['hp_max'];
                $nhp = $damager['hp'] / 100;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                if ($plus !== "fall") {
                    $rt['mos'] = 3;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['mysql'][3] = "plus_hp";
                    $rt['hp_p'][1] = $nhp;
                    $rt['log'] = " Атака противника -2 Спец. Атака -2 | Покемон падает в обморок";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 1027: // --- Geomancy
                $plus = plusChanges($bid, $damager['id'], 1, 2, "speed");
                $plus2 = plusChanges($bid, $damager['id'], 1, 2, "satk");
                $plus3 = plusChanges($bid, $damager['id'], 1, 2, "sdef");
                if ($plus !== "fall") {
                    $rt['mos'] = 3;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['mysql'][3] = $plus3;
                    $rt['log'] = " Скорость +2 Спец. Атака +2 Спец. Защита +2";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 1015:  // --- Venom Drench
                $status2 = $mysqli->query("SELECT status FROM status WHERE `bid` = '" . $bid . "' and `pok` = '" . $opponent['id'] . "' and `status` > '0' ")->fetch_assoc();
                if ($status2['status'] == 8 or $status2['status'] == 1) {
                    $plus = plusChanges($bid, $opponent['id'], 2, 1, "speed");
                    $plus2 = plusChanges($bid, $opponent['id'], 2, 1, "satk");
                    $plus3 = plusChanges($bid, $opponent['id'], 2, 1, "atk");
                    if ($plus !== "fall") {
                        $rt['mos'] = 3;
                        $rt['mysql'][1] = $plus;
                        $rt['mysql'][2] = $plus2;
                        $rt['mysql'][3] = $plus3;
                        $rt['log'] = " Атака противника -1 Спец. Атака -1 Скорость -1";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал.";
                }
                break;

            case 156:  // --- Rest
                $plus = plusStatus($bid, $damager['id'], 2, 3, 1);
                $rec = $damager['hp_max'];
                $nhp = $damager['hp'] + $rec;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $rt['mos'] = 2;
                $rt['mysql'][1] = "plus_hp";
                $rt['mysql'][2] = $plus;
                $rt['hp_p'][1] = $nhp;
                $rt['log'] = " Покемон восстанавливает свои HP";
                break;

            case 312:  // --- Aroma
                $plus = plusStatus($bid, $damager['id'], 0, 0, 0, 1);
                $rt['mysql'] = $plus;
                $rt['log'] = "Покемон испускает приятный аромат. Все покемоны команды тренера исцелены от статусов.";
                break;

            case 215:  // --- Aroma
                $plus = plusStatus($bid, $damager['id'], 0, 0, 0, 1);
                $rt['mysql'] = $plus;
                $rt['log'] = "Покемон звенит в исцеляющий колокольчик. Все покемоны команды тренера исцелены от статусов.";
                break;

            case 366:  // --- Tailwind
                $plus = plusStatus($bid, $damager['id'], 15, 4);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Покемон ускоряется ветром";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = "Провал.";
                }
                break;

            case 392:  // --- Aqua Ring
                $plus = plusStatus($bid, $damager['id'], 17, 9999);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Покемон покрывает себя исцеляющей водяной оболочкой";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = "Провал.";
                }
                break;

            case 105: // --- Recover
                $rec = $damager['hp_max'] / 2;
                $nhp = $damager['hp'] + $rec;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $damager['speed'] = $damager['speed'];
                $rt['mysql'] = "plus_hp";
                $rt['hp_p'] = $nhp;
                $rt['log'] = " Покемон восстанавливает свои HP";
                break;

            case 256: // --- Swallow
                $rec = $damager['hp_max'] / 2;
                $nhp = $damager['hp'] + $rec;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $damager['speed'] = $damager['speed'];
                $rt['mysql'] = "plus_hp";
                $rt['hp_p'] = $nhp;
                $rt['log'] = " Покемон восстанавливает свои HP";
                break;

            case 273: // --- Wish
                $rec = $damager['hp_max'] / 2;
                $nhp = $damager['hp'] + $rec;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $damager['speed'] = $damager['speed'];
                $rt['mysql'] = "plus_hp";
                $rt['hp_p'] = $nhp;
                $rt['log'] = " Покемон восстанавливает свои HP";
                break;

            case 1100:  // --- Strenght Sap
                $plus = plusChanges($bid, $opponent['id'], 2, 1, "atk");
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Атака противника -1. Покемон восстанавливает свои HP.";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 236:  // --- Moonlight 
                $rec = $damager['hp_max'] / 2;
                $nhp = $damager['hp'] + $rec;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $rt['mysql'] = "plus_hp";
                $rt['hp_p'] = $nhp;
                $rt['log'] = " Покемон восстанавливает свои HP";
                break;

            case 456:  // --- Heal Order 
                $rec = $damager['hp_max'] / 2;
                $nhp = $damager['hp'] + $rec;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $rt['mysql'] = "plus_hp";
                $rt['hp_p'] = $nhp;
                $rt['log'] = " Покемон восстанавливает свои HP";
                break;

            case 135:  // --- Softboiled
                $rec = $damager['hp_max'] / 2;
                $nhp = $damager['hp'] + $rec;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $rt['mysql'] = "plus_hp";
                $rt['hp_p'] = $nhp;
                $rt['log'] = " Покемон восстанавливает свои HP";
                break;

            case 505:  // --- Heal Pulse
                $rec = $damager['hp_max'] / 2;
                $nhp = $damager['hp'] + $rec;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $rt['mysql'] = "plus_hp";
                $rt['hp_p'] = $nhp;
                $rt['log'] = " Покемон восстанавливает свои HP";
                break;

            case 9999:  // --- Giga Drain (временный)
                if ($pls1 = $dm1['dm'] / 8) {
                    $pk1['hp'] = $pk1['hp'] + $pls1;
                }
                if ($pk1['hp'] > $pk1['hp_max']) {
                    $pk1['hp'] = $pk1['hp_max'];
                }
                break;

            case 202:
                $pk2['hp'] = $pk2['hp'] + ($dm2['dm'] / 2);
                if ($pk2['hp'] > $pk2['hp_max']) {
                    $pk2['hp'] = $pk2['hp_max'];
                }
                break;

                /*case 71: // Absorb 2
         $pk2['hp'] = $pk2['hp']+($dm1['dm']/2);
        if($pk2['hp'] > $pk2['hp_max']){
            $pk2['hp'] = $pk2['hp_max'];
}
break;*/

            case 72: // Mega Drain
                $pk2['hp'] = $pk2['hp'] + ($dm1['dm'] / 2);
                if ($pk2['hp'] > $pk2['hp_max']) {
                    $pk2['hp'] = $pk2['hp_max'];
                }
                break;

                /*case 38: // Double - Edge
         $pk2['hp'] = $pk2['hp']-($dm1['dm']/4);
        if($pk2['hp'] > $pk2['hp_max']){
            $pk2['hp'] = $pk2['hp_max'];
}
break;*/

            case 409: // Drain Punch 2
                $pk2['hp'] = $pk2['hp'] + ($dm1['dm'] / 2);
                if ($pk2['hp'] > $pk2['hp_max']) {
                    $pk2['hp'] = $pk2['hp_max'];
                }
                break;

            case 283:
                if ($pk2['hp'] > $pk1['hp']) {
                    $dm1['dm'] = $pk2['hp'] - $pk1['hp'];
                } else {
                    $dm1['dm'] = 0;
                }
                if ($pk1['hp'] > $pk2['hp']) {
                    $dm2['dm'] = $pk1['hp'] - $pk2['hp'];
                } else {
                    $dm2['dm'] = 0;
                }
                break;

            case 532:
                $pk2['hp'] = $pk2['hp'] + ($dm1['dm'] / 2);
                if ($pk2['hp'] > $pk2['hp_max']) {
                    $pk2['hp'] = $pk2['hp_max'];
                }
                break;

                if ($dm1['dm'] > 0) {
                    $log1 = $log1 . " Колокольчик восстанавливает жизненные силы покемона.<br>";
                }

            case 208:  // --- Milk Drink
                $rec = $damager['hp_max'] / 2;
                $nhp = $damager['hp'] + $rec;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $rt['mysql'] = "plus_hp";
                $rt['hp_p'] = $nhp;
                $rt['log'] = " Покемон восстанавливает свои HP";
                break;

            case 355:  // --- Roost
                //$plus = plusStatus($bid, $damager['id'],16,1);
                $rec = $damager['hp_max'] / 2;
                $nhp = $damager['hp'] + $rec;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $rt['mysql']/*[1]*/ = "plus_hp"; //$rt['mysql'][2] = $plus;
                $rt['hp_p']/*[1]*/ = $nhp;
                $rt['log'] = " Покемон восстанавливает свои HP и становится уязвимым к Земляным атакам.";
                break;

            case 234:  // --- Morning Sun
                $rec = $damager['hp_max'] / 2;
                $nhp = $damager['hp'] + $rec;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $rt['mysql'] = "plus_hp";
                $rt['hp_p'] = $nhp;
                $rt['log'] = " Покемон восстанавливает свои HP";
                break;

            case 235:  // --- Sintesis
                $rec = $damager['hp_max'] / 2;
                $nhp = $damager['hp'] + $rec;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $rt['mysql'] = "plus_hp";
                $rt['hp_p'] = $nhp;
                $rt['log'] = " Покемон восстанавливает свои HP";
                break;

            case 303:  // --- Slack Off
                $rec = $damager['hp_max'] / 2;
                $nhp = $damager['hp'] + $rec;
                if ($nhp > $damager['hp_max']) {
                    $nhp = $damager['hp_max'];
                }
                $rt['mysql'] = "plus_hp";
                $rt['hp_p'] = $nhp;
                $rt['log'] = " Покемон восстанавливает свои HP";
                break;

            case 349:  // --- Dragon Dance
                $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
                $plus2 = plusChanges($bid, $damager['id'], 1, 1, "speed");
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Атака +1 Скорость +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

                case 1126:  // --- Gear Up
                    $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
                    $plus2 = plusChanges($bid, $damager['id'], 1, 1, "satk");
                    if ($plus !== "fall") {
                        $rt['mos'] = 2;
                        $rt['mysql'][1] = $plus;
                        $rt['mysql'][2] = $plus2;
                        $rt['log'] = " Атака +1 Спец. Атака +1";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Но ничего не вышло";
                    }
                    break;

            case 526:  // --- Dragon Dance
                $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
                $plus2 = plusChanges($bid, $damager['id'], 1, 1, "satk");
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Атака +1 Спец. Атака +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 349: // --- Dragon Dance
                $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
                $plus2 = plusChanges($bid, $damager['id'], 1, 1, "speed");
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Атака +1 Скорость +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 74:  // --- Growth
                $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
                $plus2 = plusChanges($bid, $damager['id'], 1, 1, "satk");
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Атака +1 Спец. Атака +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

                /*if($atk == 270){  // --- Helping Hand старый вариант
            $infC = $mysqli->query("SELECT id FROM user_pokemons WHERE `id` != '".$damager['id']."' and `user_id` = '".$damager['user_id']."' and `hp` > '0' and `active` = '1' ");
            $cmp_ = $infC->num_rows;
            $plus = plusChanges($bid, $damager['id'],2,$cmp_,"def");
            $p = 1;
            if($plus !== "fall") {
                $iPh = $mysqli->query("SELECT id FROM user_pokemons WHERE `id` != '".$damager['id']."' and `user_id` = '".$damager['user_id']."' and `hp` > '0' and `active` = '1' ");
                while($Ip = $iPh->fetch_assoc()){
                    $p = $p+1;
                    $rt['mysql'][$p] =  plusChanges($bid, $Ip['id'],1,1,"atk");
                }
                $rt['mysql'][1] = $plus; 
                $rt['mos'] = $p;
                $rt['log'] = "Покемон дает руку помощи. Защита -".$p;
            }
            else{
                $rt['mysql'] = $plus;
                $rt['log'] = " Но ничего не вышло";
}

}*/
            case 270:  // --- Helping Hand
                $infC = $mysqli->query("SELECT id FROM user_pokemons WHERE `id` != '" . $damager['id'] . "' and `user_id` = '" . $damager['user_id'] . "' and `hp` > '0' and `active` = '1' ");
                $cmp_ = $infC->num_rows;
                $plus = plusChanges($bid, $damager['id'], 2, 1, "def");
                $p = 1;
                $randselect = rand(1, $cmp_);
                if ($plus !== "fall") {
                    $iPh = $mysqli->query("SELECT id FROM user_pokemons WHERE `id` != '" . $damager['id'] . "' and `user_id` = '" . $damager['user_id'] . "' and `hp` > '0' and `active` = '1' ORDER BY RAND() LIMIT 1");
                    while ($Ip = $iPh->fetch_assoc()) {
                        $p = $p + 1;
                        $rt['mysql'][$p] =  plusChanges($bid, $Ip['id'], 1, 1, "atk");
                    }
                    $rt['mysql'][1] = $plus;
                    $rt['mos'] = $p;
                    $rt['log'] = "Покемон дает руку помощи. Защита -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 347:  // --- Calm Mind
                $plus = plusChanges($bid, $damager['id'], 1, 1, "satk");
                $plus2 = plusChanges($bid, $damager['id'], 1, 1, "sdef");
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Спец. Атака +1 Спец. Защита +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 339:  // --- Bulk Up
                $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
                $plus2 = plusChanges($bid, $damager['id'], 1, 1, "def");
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Атака +1 Защита +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 483:  // --- Quiver Dance
                $plus = plusChanges($bid, $damager['id'], 1, 1, "satk");
                $plus2 = plusChanges($bid, $damager['id'], 1, 1, "sdef");
                $plus3 = plusChanges($bid, $damager['id'], 1, 1, "speed");
                if ($plus !== "fall") {
                    $rt['mos'] = 3;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['mysql'][3] = $plus3;
                    $rt['log'] = " Спец. Атака +1 Спец. Защита +1 Скорость +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 489:  // --- Coil
                $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
                $plus2 = plusChanges($bid, $damager['id'], 1, 1, "def");
                $plus3 = plusChanges($bid, $damager['id'], 1, 1, "accuracy");
                if ($plus !== "fall") {
                    $rt['mos'] = 3;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['mysql'][3] = $plus3;
                    $rt['log'] = " Атака +1 Защита +1 Точность +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 468:  // --- Hone Claws
                $plus = plusChanges($bid, $damager['id'], 1, 1, "atk");
                $plus2 = plusChanges($bid, $damager['id'], 1, 1, "accuracy");
                if ($plus !== "fall") {
                    $rt['mos'] = 3;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Атака +1 Точность +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 322:  // --- Cosmic Power
                $plus = plusChanges($bid, $damager['id'], 1, 1, "def");
                $plus2 = plusChanges($bid, $damager['id'], 1, 1, "sdef");
                if ($plus !== "fall") {
                    $rt['mos'] = 3;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = " Защита +1 Спец. Защита +1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 504: // --- Shell Smash
                $plus = plusChanges($bid, $damager['id'], 1, 2, "atk");
                $plus2 = plusChanges($bid, $damager['id'], 1, 2, "satk");
                $plus3 = plusChanges($bid, $damager['id'], 1, 2, "speed");
                $plus4 = plusChanges($bid, $damager['id'], 2, 1, "def");
                $plus5 = plusChanges($bid, $damager['id'], 2, 1, "sdef");
                if ($plus !== "fall") {
                    $rt['mos'] = 5;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['mysql'][3] = $plus3;
                    $rt['mysql'][4] = $plus4;
                    $rt['mysql'][5] = $plus5;
                    $rt['log'] = " Атака +2 Спец. Атака +2 Скорость +2 Защита -1 Спец. Защита -1";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Но ничего не вышло";
                }
                break;

            case 139:  // --- Poison Gas
                $plus = plusStatus($bid, $opponent['id'], 1, 9999);
                if ($plus !== "fall") {
                    if ($dex2['type'] == "poison" or $dex2['type_two'] == "poison" or $dex2['type'] == "steel" or $dex2['type_two'] == "steel") {
                        $rt['mysql'] = "fall";
                        $rt['log'] = " Противник имеет имунитет к яду";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник отравлен";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 48:  // --- Supersonic
                $plus = plusStatus($bid, $opponent['id'], 6, rand(1, 4));
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник спутан";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 77:  // --- Poison Power
                $plus = plusStatus($bid, $opponent['id'], 1, 9999);
                if ($plus !== "fall") {
                    if ($dex2['type'] == "poison" or $dex2['type_two'] == "poison" or $dex2['type'] == "steel" or $dex2['type_two'] == "steel") {
                        $rt['mysql'] = "fall";
                        $rt['log'] = " Противник имеет имунитет к яду";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник отравлен";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 50: // - Disable
                $plus = plusStatus($bid, $opponent['id'], 21, 4);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник забыл используемую атаку.";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = "";
                }
                break;


            case 92:  // --- Toxic
                $plus = plusStatus($bid, $opponent['id'], 8, 9999);
                if ($plus !== "fall") {
                    if ($dex2['type'] == "poison" or $dex2['type_two'] == "poison" or $dex2['type'] == "steel" or $dex2['type_two'] == "steel") {
                        $rt['mysql'] = "fall";
                        $rt['log'] = " Противник имеет имунитет к яду";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник отравлен ядом";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 100037:  // --- Toxic
                $plus = plusStatus($bid, $opponent['id'], 7, 9999);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник проклят";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 171:  // --- Nightmare
                $plus = plusStatus($bid, $opponent['id'], 18, 5);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " На противника насланы кошмары";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 260:  // --- Flatter
                $plus = plusStatus($bid, $opponent['id'], 6, rand(1, 4));
                $plus2 = plusChanges($bid, $opponent['id'], 1, 2, "satk");
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;

                    $rt['log'] = " Противник спутан";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 207:  // --- Flatter
                $plus = plusStatus($bid, $opponent['id'], 6, rand(1, 4));
                $plus2 = plusChanges($bid, $opponent['id'], 1, 2, "atk");
                if ($plus !== "fall") {
                    $rt['mos'] = 2;
                    $rt['mysql'][1] = $plus;
                    $rt['mysql'][2] = $plus2;
                    $rt['log'] = "Покемон провоцирует противника! Атака + 2! Противник спутан";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 79:  // --- Sleep Powder
                $sleepprotect = $mysqli->query("SELECT status FROM status WHERE `pok` = '" . $opponent['id'] . "' AND `bid` = '" . $bid . "'")->fetch_assoc();
                $plus = plusStatus($bid, $opponent['id'], 2, rand(1, 4));
                if ($plus !== "fall") {
                    if ($dex2['type'] == "grass" or $dex2['type_two'] == "grass") {
                        $rt['mysql'] = "fall";
                        $rt['log'] = "Противнику понравился запах пыльцы";
                    } elseif ($sleepprotect['status'] == 19) {
                        $rt['mysql'] = "fall";
                        $rt['log'] = "Противник бодр от кофе";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник уснул";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 47:  // --- Sing 
                $sleepprotect = $mysqli->query("SELECT status FROM status WHERE `pok` = '" . $opponent['id'] . "' AND `bid` = '" . $bid . "'")->fetch_assoc();
                $plus = plusStatus($bid, $opponent['id'], 2, rand(1, 4));
                if ($plus !== "fall") {
                    if ($sleepprotect['status'] == 19) {
                        $rt['mysql'] = "fall";
                        $rt['log'] = "Противник бодр от кофе";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник усыплен";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 95:  // --- Hypnosis
                $sleepprotect = $mysqli->query("SELECT status FROM status WHERE `pok` = '" . $opponent['id'] . "' AND `bid` = '" . $bid . "'")->fetch_assoc();
                $plus = plusStatus($bid, $opponent['id'], 2, rand(2, 4));
                if ($plus !== "fall") {
                    if ($sleepprotect['status'] == 19) {
                        $rt['mysql'] = "fall";
                        $rt['log'] = "Противник бодр от кофе";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник усыплен";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 142:  // --- Hypnosis
                $sleepprotect = $mysqli->query("SELECT status FROM status WHERE `pok` = '" . $opponent['id'] . "' AND `bid` = '" . $bid . "'")->fetch_assoc();
                $plus = plusStatus($bid, $opponent['id'], 2, rand(1, 4));
                if ($plus !== "fall") {
                    if ($sleepprotect['status'] == 19) {
                        $rt['mysql'] = "fall";
                        $rt['log'] = "Противник бодр от кофе";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник усыплен";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 464:  // --- Hypnosis
                $sleepprotect = $mysqli->query("SELECT status FROM status WHERE `pok` = '" . $opponent['id'] . "' AND `bid` = '" . $bid . "'")->fetch_assoc();
                $plus = plusStatus($bid, $opponent['id'], 2, rand(1, 4));
                if ($plus !== "fall") {
                    if ($sleepprotect['status'] == 19) {
                        $rt['mysql'] = "fall";
                        $rt['log'] = "Противник бодр от кофе";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник усыплен";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 147:  // --- Spore
                $sleepprotect = $mysqli->query("SELECT status FROM status WHERE `pok` = '" . $opponent['id'] . "' AND `bid` = '" . $bid . "'")->fetch_assoc();
                $plus = plusStatus($bid, $opponent['id'], 2, rand(1, 4));
                if ($plus !== "fall") {
                    if ($sleepprotect['status'] == 19) {
                        $rt['mysql'] = "fall";
                        $rt['log'] = "Противник бодр от кофе";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник усыплен";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 281: // --- Yawn
                $sleepprotect = $mysqli->query("SELECT status FROM status WHERE `pok` = '" . $opponent['id'] . "' AND `bid` = '" . $bid . "'")->fetch_assoc();
                $plus = plusStatus($bid, $opponent['id'], 2, rand(1, 4));
                if ($plus !== "fall") {
                    if ($sleepprotect['status'] == 19) {
                        $rt['mysql'] = "fall";
                        $rt['log'] = "Противник бодр от кофе";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник усыплен";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 516:  // --- Bestow
                $plus = plusStatus($bid, $opponent['id'], 3, 9999);
                if ($plus !== "fall") {
                    if ($dex2['type'] == "fire" or $dex2['type_two'] == "fire") {
                        $rt['mysql'] = "fall";
                        $rt['log'] = " Противник имеет имунитет к огню";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник подожжен";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 86:  // --- Thunder Wave
                $plus = plusStatus($bid, $opponent['id'], 4, 9999);
                if ($plus !== "fall") {
                    if (
                        $dex2['type'] == "ground" or $dex2['type_two'] == "ground" or
                        $dex2['type'] == "electric" or $dex2['type_two'] == "electric"
                    ) {
                        $rt['mysql'] = "fall";
                        $rt['log'] = " Не удалось парализовать противника";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник парализован";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 78:  // --- Stun Spore
                $plus = plusStatus($bid, $opponent['id'], 4, 9999);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник парализован";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 261:          // --- Will-O-Wisp 
                $plus = plusStatus($bid, $opponent['id'], 3, 9999);
                if ($plus !== "fall") {
                    if ($dex2['type'] == "fire" or $dex2['type_two'] == "fire") {
                        $rt['mysql'] = "fall";
                        $rt['log'] = " Противник имеет имунитет к огню";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник подожжен";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;


            case 99999999999999:           // --- Will-O-Wisp 
                $plus = plusStatus($bid, $opponent['id'], 3, 9999);
                if ($plus !== "fall") {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Противник подожжен";
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;

            case 73:  // --- Leech Seed
                $plus = plusStatus($bid, $opponent['id'], 9, 9999);
                if ($plus !== "fall") {
                    if ($dex2['type'] == "grass" or $dex2['type_two'] == "grass") {
                        $rt['mysql'] = "fall";
                        $rt['log'] = " Семена не действуют на противника";
                    } else {
                        $rt['mysql'] = $plus;
                        $rt['log'] = " Противник паразитирован";
                    }
                } else {
                    $rt['mysql'] = $plus;
                    $rt['log'] = " Провал изменения состояния";
                }
                break;
        }
    } else {
        $rt['mysql'] = "fall";
        $rt['log'] = " ПРОМАХ";
    }


    return $rt;
}

function Damage($atk, $damager, $opponent, $bid, $rt, $weather)
{
    global $mysqli;
    $aInf = $mysqli->query("SELECT * FROM base_attacks WHERE `atac_id` = '" . $atk . "'")->fetch_assoc();
    $dex = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $damager['basenum'] . "'")->fetch_assoc();
    $dex2 = $mysqli->query("SELECT type,type_two FROM base_pokemon WHERE `id` = '" . $opponent['basenum'] . "'")->fetch_assoc();

    // ----- усиления ---------



    $modInfMyPl_M = $mysqli->query("SELECT * FROM changes WHERE `bid` = '" . $bid . "' and `pok` = '" . $damager['id'] . "' and `type` = '1'");
    while ($modInfMyPl_ = $modInfMyPl_M->fetch_assoc()) {
        if ($modInfMyPl['atk'] == 0) {
            if ($modInfMyPl_['atk'] > 0) {
                $modInfMyPl['atk'] = $modInfMyPl_['atk'];
            } else {
                $modInfMyPl['atk'] = 0;
            }
        }
        if ($modInfMyPl['def'] == 0) {
            if ($modInfMyPl_['def'] > 0) {
                $modInfMyPl['def'] = $modInfMyPl_['def'];
            } else {
                $modInfMyPl['def'] = 0;
            }
        }
        if ($modInfMyPl['speed'] == 0) {
            if ($modInfMyPl_['speed'] > 0) {
                $modInfMyPl['speed'] = $modInfMyPl_['speed'];
            } else {
                $modInfMyPl['speed'] = 0;
            }
        }
        if ($modInfMyPl['satk'] == 0) {
            if ($modInfMyPl_['satk'] > 0) {
                $modInfMyPl['satk'] = $modInfMyPl_['satk'];
            } else {
                $modInfMyPl['satk'] = 0;
            }
        }
        if ($modInfMyPl['sdef'] == 0) {
            if ($modInfMyPl_['sdef'] > 0) {
                $modInfMyPl['sdef'] = $modInfMyPl_['sdef'];
            } else {
                $modInfMyPl['sdef'] = 0;
            }
        }
        if ($modInfMyPl['accuracy'] == 0) {
            if ($modInfMyPl_['accuracy'] > 0) {
                $modInfMyPl['accuracy'] = $modInfMyPl_['accuracy'];
            } else {
                $modInfMyPl['accuracy'] = 0;
            }
        }
        if ($modInfMyPl['agillity'] == 0) {
            if ($modInfMyPl_['agillity'] > 0) {
                $modInfMyPl['agillity'] = $modInfMyPl_['agillity'];
            } else {
                $modInfMyPl['agillity'] = 0;
            }
        }
    }
    $modInfMyMn_M = $mysqli->query("SELECT * FROM changes WHERE `bid` = '" . $bid . "' and `pok` = '" . $damager['id'] . "' and `type` = '2'");
    while ($modInfMyMn_ = $modInfMyMn_M->fetch_assoc()) {
        if ($modInfMyMn['atk'] == 0) {
            if ($modInfMyMn_['atk'] > 0) {
                $modInfMyMn['atk'] = $modInfMyMn_['atk'];
            } else {
                $modInfMyMn['atk'] = 0;
            }
        }
        if ($modInfMyMn['def'] == 0) {
            if ($modInfMyMn_['def'] > 0) {
                $modInfMyMn['def'] = $modInfMyMn_['def'];
            } else {
                $modInfMyMn['def'] = 0;
            }
        }
        if ($modInfMyMn['speed'] == 0) {
            if ($modInfMyMn_['speed'] > 0) {
                $modInfMyMn['speed'] = $modInfMyMn_['speed'];
            } else {
                $modInfMyMn['speed'] = 0;
            }
        }
        if ($modInfMyMn['satk'] == 0) {
            if ($modInfMyMn_['satk'] > 0) {
                $modInfMyMn['satk'] = $modInfMyMn_['satk'];
            } else {
                $modInfMyMn['satk'] = 0;
            }
        }
        if ($modInfMyMn['sdef'] == 0) {
            if ($modInfMyMn_['sdef'] > 0) {
                $modInfMyMn['sdef'] = $modInfMyMn_['sdef'];
            } else {
                $modInfMyMn['sdef'] = 0;
            }
        }
        if ($modInfMyMn['accuracy'] == 0) {
            if ($modInfMyMn_['accuracy'] > 0) {
                $modInfMyMn['accuracy'] = $modInfMyMn_['accuracy'];
            } else {
                $modInfMyMn['accuracy'] = 0;
            }
        }
        if ($modInfMyMn['agillity'] == 0) {
            if ($modInfMyMn_['agillity'] > 0) {
                $modInfMyMn['agillity'] = $modInfMyMn_['agillity'];
            } else {
                $modInfMyMn['agillity'] = 0;
            }
        }
    }
    $modInfVsPl_M = $mysqli->query("SELECT * FROM changes WHERE `bid` = '" . $bid . "' and `pok` = '" . $damager['id'] . "' and `type` = '1'");
    while ($modInfVsPl_ = $modInfVsPl_M->fetch_assoc()) {
        if ($modInfMyMn['atk'] == 0) {
            if ($modInfMyMn_['atk'] > 0) {
                $modInfMyMn['atk'] = $modInfMyMn_['atk'];
            } else {
                $modInfMyMn['atk'] = 0;
            }
        }
        if ($modInfMyMn['def'] == 0) {
            if ($modInfMyMn_['def'] > 0) {
                $modInfMyMn['def'] = $modInfMyMn_['def'];
            } else {
                $modInfMyMn['def'] = 0;
            }
        }
        if ($modInfMyMn['speed'] == 0) {
            if ($modInfMyMn_['speed'] > 0) {
                $modInfMyMn['speed'] = $modInfMyMn_['speed'];
            } else {
                $modInfMyMn['speed'] = 0;
            }
        }
        if ($modInfMyMn['satk'] == 0) {
            if ($modInfMyMn_['satk'] > 0) {
                $modInfMyMn['satk'] = $modInfMyMn_['satk'];
            } else {
                $modInfMyMn['satk'] = 0;
            }
        }
        if ($modInfMyMn['sdef'] == 0) {
            if ($modInfMyMn_['sdef'] > 0) {
                $modInfMyMn['sdef'] = $modInfMyMn_['sdef'];
            } else {
                $modInfMyMn['sdef'] = 0;
            }
        }
        if ($modInfMyMn['accuracy'] == 0) {
            if ($modInfMyMn_['accuracy'] > 0) {
                $modInfMyMn['accuracy'] = $modInfMyMn_['accuracy'];
            } else {
                $modInfMyMn['accuracy'] = 0;
            }
        }
        if ($modInfMyMn['agillity'] == 0) {
            if ($modInfMyMn_['agillity'] > 0) {
                $modInfMyMn['agillity'] = $modInfMyMn_['agillity'];
            } else {
                $modInfMyMn['agillity'] = 0;
            }
        }
    }
    $modInfVsPl_M = $mysqli->query("SELECT * FROM changes WHERE `bid` = '" . $bid . "' and `pok` = '" . $opponent['id'] . "' and `type` = '1'");
    while ($modInfVsPl_ = $modInfVsPl_M->fetch_assoc()) {
        if ($modInfVsPl['atk'] == 0) {
            if ($modInfVsPl_['atk'] > 0) {
                $modInfVsPl['atk'] = $modInfVsPl_['atk'];
            } else {
                $modInfVsPl['atk'] = 0;
            }
        }
        if ($modInfVsPl['def'] == 0) {
            if ($modInfVsPl_['def'] > 0) {
                $modInfVsPl['def'] = $modInfVsPl_['def'];
            } else {
                $modInfVsPl['def'] = 0;
            }
        }
        if ($modInfVsPl['speed'] == 0) {
            if ($modInfVsPl_['speed'] > 0) {
                $modInfVsPl['speed'] = $modInfVsPl_['speed'];
            } else {
                $modInfVsPl['speed'] = 0;
            }
        }
        if ($modInfVsPl['satk'] == 0) {
            if ($modInfVsPl_['satk'] > 0) {
                $modInfVsPl['satk'] = $modInfVsPl_['satk'];
            } else {
                $modInfVsPl['satk'] = 0;
            }
        }
        if ($modInfVsPl['sdef'] == 0) {
            if ($modInfVsPl_['sdef'] > 0) {
                $modInfVsPl['sdef'] = $modInfVsPl_['sdef'];
            } else {
                $modInfVsPl['sdef'] = 0;
            }
        }
        if ($modInfVsPl['accuracy'] == 0) {
            if ($modInfVsPl_['accuracy'] > 0) {
                $modInfVsPl['accuracy'] = $modInfVsPl_['accuracy'];
            } else {
                $modInfVsPl['accuracy'] = 0;
            }
        }
        if (tmodInfVsPl['agillity'] == 0) {
            if ($modInfVsPl_['agillity'] > 0) {
                $modInfVsPl['agillity'] = $modInfVsPl_['agillity'];
            } else {
                $modInfVsPl['agillity'] = 0;
            }
        }
    }
    $modInfVsMn_M = $mysqli->query("SELECT * FROM changes WHERE `bid` = '" . $bid . "' and `pok` = '" . $opponent['id'] . "' and `type` = '2'");
    while ($modInfVsMn_ = $modInfVsMn_M->fetch_assoc()) {
        if ($modInfVsMn['atk'] == 0) {
            if ($modInfVsMn_['atk'] > 0) {
                $modInfVsMn['atk'] = $modInfVsMn_['atk'];
            } else {
                $modInfVsMn['atk'] = 0;
            }
        }
        if ($modInfVsMn['def'] == 0) {
            if ($modInfVsMn_['def'] > 0) {
                $modInfVsMn['def'] = $modInfVsMn_['def'];
            } else {
                $modInfVsMn['def'] = 0;
            }
        }
        if ($modInfVsMn['speed'] == 0) {
            if ($modInfVsMn_['speed'] > 0) {
                $modInfVsMn['speed'] = $modInfVsMn_['speed'];
            } else {
                $modInfVsMn['speed'] = 0;
            }
        }
        if ($modInfVsMn['satk'] == 0) {
            if ($modInfVsMn_['satk'] > 0) {
                $modInfVsMn['satk'] = $modInfVsMn_['satk'];
            } else {
                $modInfVsMn['satk'] = 0;
            }
        }
        if ($modInfVsMn['sdef'] == 0) {
            if ($modInfVsMn_['sdef'] > 0) {
                $modInfVsMn['sdef'] = $modInfVsMn_['sdef'];
            } else {
                $modInfVsMn['sdef'] = 0;
            }
        }
        if ($modInfVsMn['accuracy'] == 0) {
            if ($modInfVsMn_['accuracy'] > 0) {
                $modInfVsMn['accuracy'] = $modInfVsMn_['accuracy'];
            } else {
                $modInfVsMn['accuracy'] = 0;
            }
        }
        if ($modInfVsMn['agillity'] == 0) {
            if ($modInfVsMn_['agillity'] > 0) {
                $modInfVsMn['agillity'] = $modInfVsMn_['agillity'];
            } else {
                $modInfVsMn['agillity'] = 0;
            }
        }
    }
    // --- - - --  -- - - --  - --  --- 
    // --- sttus ----
    $status =  $mysqli->query("SELECT status FROM status WHERE `bid` = '" . $bid . "' and `pok` = '" . $damager['id'] . "' ")->fetch_assoc();
    $status2 = $mysqli->query("SELECT status FROM status WHERE `bid` = '" . $bid . "' and `pok` = '" . $opponent['id'] . "' and `status` <= '13' ")->fetch_assoc();
    // ------------------
    // modificators
    $lup = 0;
    if ($damager['item_id'] == 293) {
        $lup = 0.5;
    }
    $blest = 0;
    if ($opponent['item_id'] == 8) {
        $blest = 0.5;
    }
    $accuracy = $aInf['atac_accuracy'] * ((4 + $modInfMyPl['accuracy'] + $modInfVsMn['agillity'] + $lup) / (4 + $modInfMyMn['accuracy'] + $modInfVsPl['agillity'] + $blest));
    if ($aInf['atac_accuracy'] == 0) {
        $accuracy = 100;
    }
    if (rand(1, 100) <= $accuracy) {
        $miss = 0;
    } else {
        $miss = 1;
    }
    // -----

    if ($status['status'] == 6 and rand(1, 2) == 2) {
        $dmg = array("dm" => 0, "cri" => " Покемон спутан! Бьёт себя от потери ума.", "att_you" => rand(8, 15));
        return $dmg;
    }
    if ($status['status'] == 2) {
        $dmg = array("dm" => 0, "cri" => " Покемон спит");
        return $dmg;
    }
    if ($status['status'] == 13) {
        $dmg = array("dm" => 0, "cri" => " Покемон напуган");
        return $dmg;
    }
    if ($status['status'] == 5) {
        $dmg = array("dm" => 0, "cri" => " Покемон заморожен");
        return $dmg;
    }
    if ($status['status'] == 4 and rand(1, 100) <= 25) {
        $dmg = array("dm" => 0, "cri" => " Покемон парализован");
        return $dmg;
    }
    switch ($atk) {
        case 387: // Last Resort

            if ($damager['atk1'] !== 387) {
                $a_pp1 = $damager['pp1'];
            }
            if ($damager['atk2'] !== 387) {
                $a_pp2 = $damager['pp2'];
            }
            if ($damager['atk3'] !== 387) {
                $a_pp3 = $damager['pp3'];
            }
            if ($damager['atk4'] !== 387) {
                $a_pp4 = $damager['pp4'];
            }
            $sum_pp = $a_pp1 + $a_pp2 + $a_pp3 + $a_pp4;

            if ($sum_pp = 0) {
                $dmg = array("dm" => "dm");
                return $dmg;
            } else {
                $dmg = array("dm" => "0", "cri" => " ПРОВАЛ");
            }
            break;

        case 512:
            if ($damager['item_id'] == 0) {
                $aInf['atac_power'] = 110;
                $dopLog = "<br>Покемону ничего не мешает выполнить сложный акробатический трюк...";
            } // acrobatic
            break;

        case 149:
            $aInf['atac_power'] = rand(1, 180);
            $dopLog = "<br>Случайная мощность!";
            break; // acrobatic

        case 222:
            $magnit_power = rand(1, 7);
            switch ($magnit_power) {
                case 1:
                    $aInf['atac_power'] = 10;
                    $dopLog = "<br>Сила толчка E.";
                    break;
                case 2:
                    $aInf['atac_power'] = 30;
                    $dopLog = "<br>Сила толчка D.";
                    break;
                case 3:
                    $aInf['atac_power'] = 40;
                    $dopLog = "<br>Сила толчка C.";
                    break;
                case 4:
                    $aInf['atac_power'] = 60;
                    $dopLog = "<br>Сила толчка B.";
                    break;
                case 5:
                    $aInf['atac_power'] = 80;
                    $dopLog = "<br>Сила толчка A.";
                    break;
                case 6:
                    $aInf['atac_power'] = 100;
                    $dopLog = "<br>Сила толчка A+!";
                    break;
                default:
                    $aInf['atac_power'] = 120;
                    $dopLog = "<br>Сила толчка A++!!!";
                    break;
            }
            break;

        case 179:
            $checkhp = $mysqli->query('SELECT hp,hp_max FROM user_pokemons WHERE id = ' . $damager['id'])->fetch_assoc();
            if ($checkhp['hp'] <= $checkhp['hp_max'] / 10) {
                $aInf['atac_power'] = 200;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 7) {
                $aInf['atac_power'] = 180;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 4) {
                $aInf['atac_power'] = 150;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 2) {
                $aInf['atac_power'] = 130;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 1.8) {
                $aInf['atac_power'] = 110;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 1.6) {
                $aInf['atac_power'] = 90;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 1.5) {
                $aInf['atac_power'] = 70;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 1.4) {
                $aInf['atac_power'] = 50;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 1.2) {
                $aInf['atac_power'] = 30;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 1) {
                $aInf['atac_power'] = 20;
            }
            break;

        case 175:
            $checkhp = $mysqli->query('SELECT hp,hp_max FROM user_pokemons WHERE id = ' . $damager['id'])->fetch_assoc();
            if ($checkhp['hp'] <= $checkhp['hp_max'] / 10) {
                $aInf['atac_power'] = 200;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 7) {
                $aInf['atac_power'] = 180;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 4) {
                $aInf['atac_power'] = 150;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 2) {
                $aInf['atac_power'] = 130;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 1.8) {
                $aInf['atac_power'] = 110;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 1.6) {
                $aInf['atac_power'] = 90;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 1.5) {
                $aInf['atac_power'] = 70;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 1.4) {
                $aInf['atac_power'] = 50;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 1.2) {
                $aInf['atac_power'] = 30;
            } elseif ($checkhp['hp'] <= $checkhp['hp_max'] / 1) {
                $aInf['atac_power'] = 20;
            }
            break;

        case 217:
            $randomatk = mt_rand(1, 2);
            if ($randomatk == 2) {
                $atkpower = mt_rand(1, 3);
                if ($atkpower == 1) {
                    $aInf['atac_power'] = 40;
                    $dopLog = "1 бомба ";
                }
                if ($atkpower == 2) {
                    $aInf['atac_power'] = 80;
                    $dopLog = "2 бомба ";
                }
                if ($atkpower == 3) {
                    $aInf['atac_power'] = 120;
                    $dopLog = "3 бомба";
                }
            } else {
                $log1 = $log1 . " Соперник открыл подарок, и там была целебная мазь!<br>";
                $pk2['hp'] = $pk2['hp'] + ($pk1['hp_max'] / 4);
                if ($pk2['hp'] > $pk2['hp_max']) {
                    $pk2['hp'] = $pk2['hp_max'];
                }
            }
            break;

        case 286:
            // $opponent = array(1 => 'atk1', 'atk2', 'atk3', 'atk4');
            // $damager = array(1 => 'atk1', 'atk2', 'atk3', 'atk4');
            // $move = '$damager[1]' . '$damager[2]';
            $dopLog = print_r($damager['atk1'] . ',' . $damager['atk3']);
            break;

        case 458:
            $aInf['atac_power'] = $aInf['atac_power'] * 2;
            break; // Double Hit

        case 506:
            if ($status2['status'] > 0 and $status2['status'] < 8) {
                $aInf['atac_power'] = $aInf['atac_power'] * 2;
                $dopLog = "<br>Покемон атакует с двойной силой...";
            } // Hex
            break;

        case 263:
            if ($status['status'] > 0) {
                $aInf['atac_power'] = 140;
                $dopLog = "<br>Покемон атакует с двойной силой...";
            } // Facade
            break;
            /*if($atk == 473 and $status2['status'] == 1) { $aInf['atac_power'] = $aInf['atac_power']*2; $dopLog = "<br>Покемон атакует с двойной силой...";} // Psyshock*/
        case 282:
            if ($opponent['item_id'] > 1) {
                plus_item(1, $opponent['item_id'], $opponent['user_id']);
                $mysqli->query("UPDATE user_pokemons SET item_id = '0' WHERE id = " . $opponent['id']);
                $aInf['atac_power'] = 97;
            } else {
                $aInf['atac_power'] = 65;
            }
            break;
    }
    if ($aInf['atac_accuracy'] == 0) {
        $accuracy = 100;
    } else {
        $accuracy = $aInf['atac_accuracy'] * ((4 + $modInfMyPl['accuracy'] + $modInfVsMn['agillity'] + $lup) / (4 + $modInfMyMn['accuracy'] + $modInfVsPl['agillity'] + $blest));
    }
    if (mt_rand(1, 100) <= $accuracy) {
        if ($aInf['atac_categori'] == 1) {
            $DmAtk = $damager['attack'] * ((2 + $modInfMyPl['atk']) / (2 + $modInfMyMn['atk']));
            $OpDef = $opponent['def'] * ((2 + $modInfVsPl['def']) / (2 + $modInfVsMn['def']));
        } else {
            if ($atk == 397) {
                $DmAtk = $damager['attack'] * ((2 + $modInfMyPl['atk']) / (2 + $modInfMyMn['atk']));
            } else {
                $DmAtk = $damager['sp_attack'] * ((2 + $modInfMyPl['satk']) / (2 + $modInfMyMn['satk']));
            }
            $OpDef = $opponent['sp_def'] * ((2 + $modInfVsPl['sdef']) / (2 + $modInfVsMn['sdef']));
        }
        if ($atk == 533) {
            $OpDef = $opponent['def'] * ((2 + 0) / (2 + 0));
        }
        if ($atk == 560) {
            $DmAtk = $damager['sp_attack'] * ((2 + $modInfMyPl['satk']) / (2 + $modInfMyMn['satk']));
            $OpDef = $opponent['def'] * ((2 + $modInfVsPl['def']) / (2 + $modInfVsMn['def']));
        }
        if ($atk == 473) {
            $DmAtk = $damager['sp_attack'] * ((2 + $modInfMyPl['satk']) / (2 + $modInfMyMn['satk']));
            $OpDef = $opponent['def'] * ((2 + $modInfVsPl['def']) / (2 + $modInfVsMn['def']));
        }
        if (ucfirst($aInf['atac_tip']) == ucfirst($dex['type']) or ucfirst($aInf['atac_tip']) == ucfirst($dex['type_two'])) {
            $stab = 1.5;
        } else {
            $stab = 1;
        }
        $type = tip($aInf['atac_tip'], $dex2['type']) * tip($aInf['atac_tip'], $dex2['type_two']);

        if ($type == 1) {
            $effect = "";
        } else
             if ($type == 2) {
            $effect = "Эффективная атака!";
        } else
             if ($type == 4) {
            $effect = "Супер эффективная атака!";
        } else
             if ($type == 0.5) {
            $effect = "Малоэффективня атака";
        } else
             if ($type == 0.25) {
            $effect = "Очень малоэффективня атака";
        } else
             if ($type == 0) {
            $effect = "Нет эффекта";
            $aInf['chans_dop'] = 0;
        }

        if ($damager['item_id'] == 43) {
            if (rand(1, 25) <= 4) {
                $crit = 1.5;
            } else {
                $crit = 1;
            }
        } else {
            if (rand(1, 25) <= 2) {
                $crit = 1.5;
            } else {
                $crit = 1;
            }
        }
        $other = 1;
        $itemtypepower = 1;
        $powerglow = 1;
        if ($damager['item_id'] == 5 and $aInf['atac_tip'] == 'Fighting') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 6 and $aInf['atac_tip'] == 'Dark') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 33 and $aInf['atac_tip'] == 'Grass') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 34 and $aInf['atac_tip'] == 'Water') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 44 and $aInf['atac_tip'] == 'Flying') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 49 and $aInf['atac_tip'] == 'Ghost') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 52 and $aInf['atac_tip'] == 'Psychic') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 355 and $aInf['atac_tip'] == 'Rock') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 356 and $aInf['atac_tip'] == 'Ice') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 357 and $aInf['atac_tip'] == 'Normal') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 358 and $aInf['atac_tip'] == 'Poison') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 359 and $aInf['atac_tip'] == 'Bug') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 360 and $aInf['atac_tip'] == 'Ground') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 361 and $aInf['atac_tip'] == 'Dragon') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 362 and $aInf['atac_tip'] == 'Fire') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 366 and $aInf['atac_tip'] == 'Electric') {
            $itemtypepower = 1.5;
        }
        if ($damager['item_id'] == 75 and $aInf['atac_categori'] == 1) {
            $powerglow = 1.1;
        }
        $mod = $stab * $type * $crit * $itemtypepower * $powerglow * $other * (rand(85, 100) / 100);
        if ($damager['item_id'] == 232) {
            $pow = 1.25;
        } else {
            $pow = 1;
        }
        $damage = round((((2 * $damager['lvl'] + 10) / 250) * ($DmAtk / $OpDef) * $aInf['atac_power']) * $mod * $pow); //Убрали цифру 2
        if ($status['status'] == 3 and $aInf['atac_categori'] == 1) {
            $damage = round($damage / 2);
        }
        if ($status2['status'] == 11 and $aInf['atac_categori'] == 1) {
            $damage = round($damage / 2);
        }
        if ($status2['status'] == 12 and $aInf['atac_categori'] == 2) {
            $damage = round($damage / 2);
        }

        if ($atk == 389) {

            if ($damager['speed'] > $opponent['speed']) {
                $damage = $damage;
                $dopLog = " <i>Покемон опережает атаку противника! </i><br>";
            } else {
                $damage = 0;
                $dopLog = " <i>Не удалось! </i><br>";
            }
        }


        if ($atk == 162) {
            $damage = round($opponent['hp'] / 2);
        }


        if ($atk == 492) {
            $other = 1;
            $mod = $stab * $type * $crit * $other * (rand(85, 100) / 100);
            $OpAtk = $opponent['attack'] * ((2 + $modInfVsPl['atk']) / (2 + $modInfVsMn['atk']));
            $damage = round((((2 * $damager['lvl'] + 10) / 250) * ($OpAtk / $OpDef) * $aInf['atac_power'] + 2) * $mod);
        }
        if ($atk == 179) {
            $checkhp = $mysqli->query('SELECT hp,hp_max FROM user_pokemons WHERE id = ' . $damager['id'])->fetch_assoc();
            if ($checkhp['hp'] >= $checkhp['hp_max'] / 1) {
                $damage = round((((2 * $damager['lvl'] + 10) / 250) * ($OpAtk / $OpDef) * $aInf['atac_power'] + 2) * $mod);
            }
        }


        if ($atk == 162) {
            $damage = round($opponent['hp'] / 2);
        }
        if ($atk == 371) {
            if ($damager['speed'] < $opponent['speed']) {
                $damage = $damage * 2;
                $dopLog = " <i>Покемон наносит двойной урон! </i><br>";
            } else {
                $damage = $damage;
            }
        }

        if ($atk == 362) {

            if ($opponent['hp'] <= $opponent['hp_max'] / 2) {
                $damage = $damage * 2;
                $dopLog = " <i>Покемон наносит двойной урон! </i><br>";
            } else {
                $damage = $damage;
            }
        }

        //атаки связанные с хп






        $lig =  $mysqli->query("SELECT lig1 FROM battle WHERE `id` = '" . $id . "'")->fetch_assoc();
        if ($battle['lig1'] > 0) {
            $damager['dm'] = 0;
        }
        if ($atk == 333 and rand(1, 100) <= 10) {
            $damage = round($damage);
            $dopLog = "<br>1 осколок попал в цель...";
        } elseif ($atk == 333 and (rand(1, 100) > 10) and (rand(1, 100) <= 20)) {
            $damage = round($damage * 2);
            $dopLog = "<br>2 осколка попало в цель...";
        } elseif ($atk == 333 and (rand(1, 100) > 20) and (rand(1, 100) <= 55)) {
            $damage = round($damage * 3);
            $dopLog = "<br>3 осколка попало в цель...";
        } elseif ($atk == 333 and (rand(1, 100) > 55) and (rand(1, 100) <= 80)) {
            $damage = round($damage * 4);
            $dopLog = "<br>4 осколка попало в цель...";
        } elseif ($atk == 333 and (rand(1, 100) <= 100)) {
            $damage = round($damage * 5);
            $dopLog = "<br>5 осколков попало в цель...";
        }
        if ($atk == 331 and rand(1, 100) <= 20) {
            $damage = round($damage);
            $dopLog = "<br>1 Семено попало в цель...";
        } elseif ($atk == 331 and (rand(1, 100) > 20) and (rand(1, 100) <= 40)) {
            $damage = round($damage * 2);
            $dopLog = "<br>2 Семена попало в цель...";
        } elseif ($atk == 331 and (rand(1, 100) > 40) and (rand(1, 100) <= 60)) {
            $damage = round($damage * 3);
            $dopLog = "<br>3 Семена попало в цель...";
        } elseif ($atk == 331 and (rand(1, 100) > 60) and (rand(1, 100) <= 80)) {
            $damage = round($damage * 4);
            $dopLog = "<br>4 Семена попало в цель...";
        } elseif ($atk == 331 and (rand(1, 100) <= 100)) {
            $damage = round($damage * 5);
            $dopLog = "<br>5 Семян попало в цель...";
        }

        if ($atk == 350 and (rand(1, 100) > 1) and (rand(1, 100) <= 40)) {
            $damage = round($damage * 2);
            $dopLog = "<br>2 Камня попало в цель...";
        } elseif ($atk == 350 and (rand(1, 100) > 40) and (rand(1, 100) <= 70)) {
            $damage = round($damage * 3);
            $dopLog = "<br>3 Камня попало в цель...";
        } elseif ($atk == 350 and (rand(1, 100) > 70) and (rand(1, 100) <= 90)) {
            $damage = round($damage * 4);
            $dopLog = "<br>4 Камня попало в цель...";
        } elseif ($atk == 350 and (rand(1, 100) <= 100)) {
            $damage = round($damage * 5);
            $dopLog = "<br>5 Камней попало в цель...";
        }
        if ($atk == 42 and rand(1, 100) <= 20) {
            $damage = round($damage);
            $dopLog = "<br>1 Игла попала в цель...";
        } elseif ($atk == 42 and (rand(1, 100) > 20) and (rand(1, 100) <= 40)) {
            $damage = round($damage * 2);
            $dopLog = "<br>2 Иглы попали в цель...";
        } elseif ($atk == 42 and (rand(1, 100) > 40) and (rand(1, 100) <= 60)) {
            $damage = round($damage * 3);
            $dopLog = "<br>3 Иглы попали в цель...";
        } elseif ($atk == 42 and (rand(1, 100) > 60) and (rand(1, 100) <= 80)) {
            $damage = round($damage * 4);
            $dopLog = "<br>4 Иглы попали в цель...";
        } elseif ($atk == 42 and (rand(1, 100) <= 100)) {
            $damage = round($damage * 5);
            $dopLog = "<br>5 Иголок попало в цель...";
        }
        if ($atk == 131 and rand(1, 100) <= 20) {
            $damage = round($damage);
            $dopLog = "<br>2 Шипа попали в цель...";
        } elseif ($atk == 131 and (rand(1, 100) > 20) and (rand(1, 100) <= 40)) {
            $damage = round($damage * 2);
            $dopLog = "<br>3 Шипа попали в цель...";
        } elseif ($atk == 131 and (rand(1, 100) > 40) and (rand(1, 100) <= 60)) {
            $damage = round($damage * 3);
            $dopLog = "<br>4 Шипа попали в цель...";
        } elseif ($atk == 131 and (rand(1, 100) > 60) and (rand(1, 100) <= 80)) {
            $damage = round($damage * 4);
            $dopLog = "<br>5 Шипа попали в цель...";
        } elseif ($atk == 131 and (rand(1, 100) <= 100)) {
            $damage = round($damage * 5);
            $dopLog = "<br>6 Шипа попало в цель...";
        }
        if ($atk == 541 and (rand(1, 100) > 0) and (rand(1, 100) <= 40)) {
            $damage = round($damage * 2);
            $dopLog = "<br>Смог ударить 2 раза";
        } elseif ($atk == 541 and (rand(1, 100) > 40) and (rand(1, 100) <= 60)) {
            $damage = round($damage * 3);
            $dopLog = "<br>Смог ударить 3 раза...";
        } elseif ($atk == 541 and (rand(1, 100) > 60) and (rand(1, 100) <= 80)) {
            $damage = round($damage * 4);
            $dopLog = "<br>Смог ударить 4 раза...";
        } elseif ($atk == 541 and (rand(1, 100) <= 100)) {
            $damage = round($damage * 5);
            $dopLog = "<br>Смог ударить 5 раз...";
        }
        if ($atk == 31 and rand(1, 100) <= 20) {
            $damage = round($damage);
            $dopLog = "<br>Усиление атки не удалось...";
        } elseif ($atk == 31 and (rand(1, 100) > 20) and (rand(1, 100) <= 40)) {
            $damage = round($damage * 2);
            $dopLog = "<br>Попал по противнику 2 раза...";
        } elseif ($atk == 31 and (rand(1, 100) > 40) and (rand(1, 100) <= 60)) {
            $damage = round($damage * 3);
            $dopLog = "<br>Попал по противнику 3 раза...";
        } elseif ($atk == 31 and (rand(1, 100) > 60) and (rand(1, 100) <= 80)) {
            $damage = round($damage * 4);
            $dopLog = "<br>Попал по противнику 4 раза...";
        } elseif ($atk == 31 and (rand(1, 100) <= 100)) {
            $damage = round($damage * 5);
            $dopLog = "<br>Попал по противнику 5 раз...";
        }
        if ($atk == 154 and rand(1, 100) <= 20) {
            $damage = round($damage);
            $dopLog = "<br>Усиление атки не удалось...";
        } elseif ($atk == 154 and (rand(1, 100) > 20) and (rand(1, 100) <= 40)) {
            $damage = round($damage * 2);
            $dopLog = "<br>Попал по противнику 2 раза...";
        } elseif ($atk == 154 and (rand(1, 100) > 40) and (rand(1, 100) <= 60)) {
            $damage = round($damage * 3);
            $dopLog = "<br>Попал по противнику 3 раза...";
        } elseif ($atk == 154 and (rand(1, 100) > 60) and (rand(1, 100) <= 80)) {
            $damage = round($damage * 4);
            $dopLog = "<br>Попал по противнику 4 раза...";
        } elseif ($atk == 154 and (rand(1, 100) <= 100)) {
            $damage = round($damage * 5);
            $dopLog = "<br>Попал по противнику 5 раз...";
        }
        if ($atk == 3 and rand(1, 100) <= 20) {
            $damage = round($damage);
            $dopLog = "<br>Попал по противнику только 1 раз...";
        } elseif ($atk == 3 and (rand(1, 100) > 20) and (rand(1, 100) <= 40)) {
            $damage = round($damage * 2);
            $dopLog = "<br>Попал по противнику 2 раза...";
        } elseif ($atk == 3 and (rand(1, 100) > 40) and (rand(1, 100) <= 60)) {
            $damage = round($damage * 3);
            $dopLog = "<br>Попал по противнику 3 раза...";
        } elseif ($atk == 3 and (rand(1, 100) > 60) and (rand(1, 100) <= 80)) {
            $damage = round($damage * 4);
            $dopLog = "<br>Попал по противнику 4 раза...";
        } elseif ($atk == 3 and (rand(1, 100) <= 100)) {
            $damage = round($damage * 5);
            $dopLog = "<br>Попал по противнику 5 раз...";
        }
        if ($atk == 292) {
            $damage = round($damage * 2);
            $dopLog = "<br>Покемон начинает молотить противнка тайной техникой Быстрой Ладони...";
        }
        if ($atk == 292 and rand(1, 100) <= 20) {
            $damage = round($damage);
            $dopLog = "<br>Попал по противнику только 1 раз...";
        } elseif ($atk == 292 and (rand(1, 100) > 20) and (rand(1, 100) <= 40)) {
            $damage = round($damage * 2);
            $dopLog = "<br>Попал по противнику 2 раза...";
        } elseif ($atk == 292 and (rand(1, 100) > 40) and (rand(1, 100) <= 60)) {
            $damage = round($damage * 3);
            $dopLog = "<br>Попал по противнику 3 раза...";
        } elseif ($atk == 292 and (rand(1, 100) > 60) and (rand(1, 100) <= 80)) {
            $damage = round($damage * 4);
            $dopLog = "<br>Попал по противнику 4 раза...";
        } elseif ($atk == 292 and (rand(1, 100) <= 100)) {
            $damage = round($damage * 5);
            $dopLog = "<br>Попал по противнику 5 раз...";
        }
        if ($atk == 140) {
            $damage = round($damage * 2);
            $dopLog = "<br>Покемон разбрасывает взрывающиеся семена по полю битвы...";
        }
        if ($atk == 140 and (rand(1, 100) <= 20) and (rand(1, 100) <= 30)) {
            $damage = round($damage * 2);
            $dopLog = "<br>Попал по противнику 2 раза...";
        } elseif ($atk == 140 and (rand(1, 100) > 30) and (rand(1, 100) <= 55)) {
            $damage = round($damage * 3);
            $dopLog = "<br>Попал по противнику 3 раза...";
        } elseif ($atk == 140 and (rand(1, 100) > 55) and (rand(1, 100) <= 78)) {
            $damage = round($damage * 4);
            $dopLog = "<br>Попал по противнику 4 раза...";
        } elseif ($atk == 140 and (rand(1, 100) <= 100)) {
            $damage = round($damage * 5);
            $dopLog = "<br>Попал по противнику 5 раз...";
        }
        if ($atk == 198) {
            $damage = round($damage * 2);
            $dopLog = "<br>Покемон подбирает палку и начинает ею молотить противника...";
        }
        if ($atk == 198 and (rand(1, 100) <= 20) and (rand(1, 100) <= 30)) {
            $damage = round($damage * 2);
            $dopLog = "<br>Попал по противнику 2 раза...";
        } elseif ($atk == 198 and (rand(1, 100) > 30) and (rand(1, 100) <= 55)) {
            $damage = round($damage * 3);
            $dopLog = "<br>Попал по противнику 3 раза...";
        } elseif ($atk == 198 and (rand(1, 100) > 55) and (rand(1, 100) <= 78)) {
            $damage = round($damage * 4);
            $dopLog = "<br>Попал по противнику 4 раза...";
        } elseif ($atk == 198 and (rand(1, 100) <= 100)) {
            $damage = round($damage * 5);
            $dopLog = "<br>Попал по противнику 5 раз...";
        }
        if ($atk == 155) {
            $damage = round($damage * 2);
            $dopLog = "<br>Бумеранг попадает по противнику ,делает разворот и попадает снова....";
        }
        if ($atk == 4 and rand(1, 100) <= 20) {
            $damage = round($damage);
            $dopLog = "<br>Попал по противнику только 1 раз...";
        } elseif ($atk == 4 and (rand(1, 100) > 20) and (rand(1, 100) <= 40)) {
            $damage = round($damage * 2);
            $dopLog = "<br>Попал по противнику 2 раза...";
        } elseif ($atk == 4 and (rand(1, 100) > 40) and (rand(1, 100) <= 60)) {
            $damage = round($damage * 3);
            $dopLog = "<br>Попал по противнику 3 раза...";
        } elseif ($atk == 4 and (rand(1, 100) > 60) and (rand(1, 100) <= 80)) {
            $damage = round($damage * 4);
            $dopLog = "<br>Попал по противнику 4 раза...";
        } elseif ($atk == 4 and (rand(1, 100) <= 100)) {
            $damage = round($damage * 5);
            $dopLog = "<br>Попал по противнику 5 раз...";
        }
        if ($atk == 1107 and rand(1, 100) <= 40) {
            $damage = round($damage * 4);
            $dopLog = "<br>4 осколка попал в цель...";
        } elseif ($atk == 1107 and (rand(1, 100) > 40) and (rand(1, 100) <= 65)) {
            $damage = round($damage * 2);
            $dopLog = "<br>2 осколка попало в цель...";
        } elseif ($atk == 1107 and (rand(1, 100) > 65) and (rand(1, 100) <= 80)) {
            $damage = round($damage * 3);
            $dopLog = "<br>3 осколка попало в цель...";
        } elseif ($atk == 1107 and (rand(1, 100) > 80) and (rand(1, 100) <= 92)) {
            $damage = round($damage * 4);
            $dopLog = "<br>4 осколка попало в цель...";
        } elseif ($atk == 1107 and (rand(1, 100) <= 100)) {
            $damage = round($damage * 5);
            $dopLog = "<br>5 осколков попало в цель...";
        }
        if ($atk == 283 and $damager['hp'] < $opponent['hp']) {
            return $hp;
            $damage = $opponent['hp'] - $damager['hp'];
            $dopLog = "<br>Успешно";
        }

        if ($atk == 484) {
            $u_weight = $damager['Weight'];
            $t_weight = $opponent['Weight'];
            if (((100 / $u_weight) * $t_weight) > 50) {
                $damage = $damage * 40;
                $dopLog = "<br>1";
            } elseif (((100 / $u_weight) * $t_weight) > 33.3 and ((100 / $u_weight) * $t_weight) <= 50) {
                $damage = $damage * 60;
                $dopLog = "<br>2";
            } elseif (((100 / $u_weight) * $t_weight) > 25 and ((100 / $u_weight) * $t_weight) <= 33.3) {
                $damage = $damage * 80;
                $dopLog = "<br>3";
            } elseif (((100 / $u_weight) * $t_weight) > 20 and ((100 / $u_weight) * $t_weight) <= 25) {
                $damage = $damage * 100;
                $dopLog = "<br>4";
            } elseif (((100 / $u_weight) * $t_weight) <= 20) {
                $damage = $damage * 120;
                $dopLog = "<br>5";
            } else {
                $damage = 0;
            }
        }




        if ($atk == 1019) { // - Ice Fang
            if (($dex2['type'] == "water" or $dex2['type_two'] == "water") and (($dex2['type'] == "grass" or $dex2['type_two'] == "grass") or ($dex2['type'] == "flying" or $dex2['type_two'] == "flying") or ($dex2['type'] == "ground" or $dex2['type_two'] == "ground") or ($dex2['type'] == "dragon" or $dex2['type_two'] == "dragon"))) {
                $damage = $damage * 4;
                $dopLog  = "Супер эфективная атака";
            } elseif ($dex2['type'] == "water" or $dex2['type_two'] == "water") {
                $damage = $damage * 2;
                $dopLog  = "Эфективная атака";
            } else {
                $damage = $damage;
            }
        }
        if ($atk == 101) {
            if (($dex2['type'] == "normal" or $dex2['type_two'] == "normal")) {
                $damage = 0;
            } else {
                $damage = $damager['lvl'];
            }
        }
        if ($atk == 82) {
            $damage = 40;
        }


        $reg13 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 1 and location <= 68  and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
        if ($reg13 and ($atk == 7  or $atk == 52  or $atk == 53  or $atk == 83  or $atk == 126 or $atk == 172  or $atk == 221 or $atk == 241 or $atk == 257 or $atk == 261 or $atk == 284 or $atk == 299 or $atk == 307 or $atk == 315 or $atk == 394 or $atk == 424 or $atk == 436 or $atk == 463 or $atk == 481 or $atk == 488 or $atk == 510 or $atk == 517 or $atk == 519 or $atk == 535 or $atk == 545 or $atk == 551 or $atk == 552 or $atk == 558 or $atk == 557 or $atk == 1034 or $atk == 1046 or $atk == 1066 or $atk == 100021 or $atk == 100031)) {

            $weather131 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 3 and id = 1')->fetch_assoc();
            if ($weather131) {
                $damage = round($damage * 1.5);
                $dopLog = "<br>Солнечная погода усиливает атаку покемона";
            }
        }

        $reg23 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 69 and location < 135 and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
        if ($reg23 and ($atk == 7  or $atk == 52  or $atk == 53  or $atk == 83  or $atk == 126 or $atk == 172  or $atk == 221 or $atk == 241 or $atk == 257 or $atk == 261 or $atk == 284 or $atk == 299 or $atk == 307 or $atk == 315 or $atk == 394 or $atk == 424 or $atk == 436 or $atk == 463 or $atk == 481 or $atk == 488 or $atk == 510 or $atk == 517 or $atk == 519 or $atk == 535 or $atk == 545 or $atk == 551 or $atk == 552 or $atk == 558 or $atk == 557 or $atk == 1034 or $atk == 1046 or $atk == 1066 or $atk == 100021 or $atk == 100031)) {

            $weather231 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 3 and id = 2')->fetch_assoc();
            if ($weather231) {
                $damage = round($damage * 1.5);
                $dopLog = "<br>Солнечная погода усиливает атаку покемона";
            }
        }

        $reg33 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 200 and location < 266 and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
        if ($reg33 and ($atk == 7  or $atk == 52  or $atk == 53  or $atk == 83  or $atk == 126 or $atk == 172  or $atk == 221 or $atk == 241 or $atk == 257 or $atk == 261 or $atk == 284 or $atk == 299 or $atk == 307 or $atk == 315 or $atk == 394 or $atk == 424 or $atk == 436 or $atk == 463 or $atk == 481 or $atk == 488 or $atk == 510 or $atk == 517 or $atk == 519 or $atk == 535 or $atk == 545 or $atk == 551 or $atk == 552 or $atk == 558 or $atk == 557 or $atk == 1034 or $atk == 1046 or $atk == 1066 or $atk == 100021 or $atk == 100031)) {

            $weather331 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 3 and id = 3')->fetch_assoc();
            if ($weather331) {
                $damage = round($damage * 1.5);
                $dopLog = "<br>Солнечная погода усиливает атаку покемона";
            }
        }





        $reg12 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 1 and location <= 68  and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
        if ($reg12 and ($atk == 7  or $atk == 52  or $atk == 53  or $atk == 83  or $atk == 126 or $atk == 172  or $atk == 221 or $atk == 241 or $atk == 257 or $atk == 261 or $atk == 284 or $atk == 299 or $atk == 307 or $atk == 315 or $atk == 394 or $atk == 424 or $atk == 436 or $atk == 463 or $atk == 481 or $atk == 488 or $atk == 510 or $atk == 517 or $atk == 519 or $atk == 535 or $atk == 545 or $atk == 551 or $atk == 552 or $atk == 558 or $atk == 557 or $atk == 1034 or $atk == 1046 or $atk == 1066 or $atk == 100021 or $atk == 100031)) {

            $weather121 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 2 and id = 1')->fetch_assoc();
            if ($weather121) {
                $damage = round($damage * 0.5);
                $dopLog = "<br>Дождь ослабляет атаку покемона";
            }
        }

        $reg22 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 69 and location < 135 and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
        if ($reg22 and ($atk == 7  or $atk == 52 or $atk == 53  or $atk == 83  or $atk == 126 or $atk == 172  or $atk == 221 or $atk == 241 or $atk == 257 or $atk == 261 or $atk == 284 or $atk == 299 or $atk == 307 or $atk == 315 or $atk == 394 or $atk == 424 or $atk == 436 or $atk == 463 or $atk == 481 or $atk == 488 or $atk == 510 or $atk == 517 or $atk == 519 or $atk == 535 or $atk == 545 or $atk == 551 or $atk == 552 or $atk == 558 or $atk == 557 or $atk == 1034 or $atk == 1046 or $atk == 1066 or $atk == 100021 or $atk == 100031)) {

            $weather221 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 2 and id = 2')->fetch_assoc();
            if ($weather221) {
                $damage = round($damage * 0.5);
                $dopLog = "<br>Дождь ослабляет атаку покемона";
            }
        }

        $reg32 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 200 and location < 266 and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
        if ($reg32 and ($atk == 7  or $atk == 52 or $atk == 53  or $atk == 83  or $atk == 126 or $atk == 172  or $atk == 221 or $atk == 241 or $atk == 257 or $atk == 261 or $atk == 284 or $atk == 299 or $atk == 307 or $atk == 315 or $atk == 394 or $atk == 424 or $atk == 436 or $atk == 463 or $atk == 481 or $atk == 488 or $atk == 510 or $atk == 517 or $atk == 519 or $atk == 535 or $atk == 545 or $atk == 551 or $atk == 552 or $atk == 558 or $atk == 557 or $atk == 1034 or $atk == 1046 or $atk == 1066 or $atk == 100021 or $atk == 100031)) {

            $weather321 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 2 and id = 3')->fetch_assoc();
            if ($weather321) {
                $damage = round($damage * 0.5);
                $dopLog = "<br>Дождь ослабляет атаку покемона";
            }
        }


        $reg121 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 0 and location < 68 and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
        if ($reg121 and ($atk == 55 or $atk == 56    or $atk == 57  or $atk == 61  or $atk == 110 or $atk == 127  or $atk == 128 or $atk == 145 or $atk == 152 or $atk == 190 or $atk == 240 or $atk == 291 or $atk == 308 or $atk == 323 or $atk == 330 or $atk == 346 or $atk == 352 or $atk == 362 or $atk == 392 or $atk == 401 or $atk == 453 or $atk == 487 or $atk == 503 or $atk == 518 or $atk == 534 or $atk == 1032 or $atk == 1033 or $atk == 1047 or $atk == 1074 or $atk == 100026)) {

            $weather1211 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 2 and id = 1')->fetch_assoc();
            if ($weather1211) {
                $damage = round($damage * 1.5);
                $dopLog = "<br>Дождь усиливает атаку покемона";
            }
        }

        $reg221 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 69 and location < 135 and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
        if ($reg221 and ($atk == 55  or $atk == 56  or $atk == 57  or $atk == 61  or $atk == 110 or $atk == 127  or $atk == 128 or $atk == 145 or $atk == 152 or $atk == 190 or $atk == 240 or $atk == 291 or $atk == 308 or $atk == 323 or $atk == 330 or $atk == 346 or $atk == 352 or $atk == 362 or $atk == 392 or $atk == 401 or $atk == 453 or $atk == 487 or $atk == 503 or $atk == 518 or $atk == 534 or $atk == 1032 or $atk == 1033 or $atk == 1047 or $atk == 1074 or $atk == 100026)) {

            $weather2211 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 2 and id = 2')->fetch_assoc();
            if ($weather2211) {
                $damage = round($damage * 1.5);
                $dopLog = "<br>Дождь усиливает атаку покемона";
            }
        }

        $reg321 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 200 and location < 266 and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
        if ($reg321 and ($atk == 55  or $atk == 56  or $atk == 57  or $atk == 61  or $atk == 110 or $atk == 127  or $atk == 128 or $atk == 145 or $atk == 152 or $atk == 190 or $atk == 240 or $atk == 291 or $atk == 308 or $atk == 323 or $atk == 330 or $atk == 346 or $atk == 352 or $atk == 362 or $atk == 392 or $atk == 401 or $atk == 453 or $atk == 487 or $atk == 503 or $atk == 518 or $atk == 534 or $atk == 1032 or $atk == 1033 or $atk == 1047 or $atk == 1074 or $atk == 100026)) {

            $weather3211 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 2 and id = 3')->fetch_assoc();
            if ($weather3211) {
                $damage = round($damage * 1.5);
                $dopLog = "<br>Дождь усиливает атаку покемона";
            }
        }

        $reg132 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 1 and location <= 68  and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
        if ($reg132 and ($atk == 55  or $atk == 56  or $atk == 57  or $atk == 61  or $atk == 110 or $atk == 127  or $atk == 128 or $atk == 145 or $atk == 152 or $atk == 190 or $atk == 240 or $atk == 291 or $atk == 308 or $atk == 323 or $atk == 330 or $atk == 346 or $atk == 352 or $atk == 362 or $atk == 392 or $atk == 401 or $atk == 453 or $atk == 487 or $atk == 503 or $atk == 518 or $atk == 534 or $atk == 1032 or $atk == 1033 or $atk == 1047 or $atk == 1074 or $atk == 100026)) {

            $weather1321 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 3 and id = 1')->fetch_assoc();
            if ($weather1321) {
                $damage = round($damage * 0.5);
                $dopLog = "<br>Солнце ослабляет атаку покемона";
            }
        }

        $reg232 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 69 and location < 135 and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
        if ($reg232 and ($atk == 55  or $atk == 56  or $atk == 57  or $atk == 61  or $atk == 110 or $atk == 127  or $atk == 128 or $atk == 145 or $atk == 152 or $atk == 190 or $atk == 240 or $atk == 291 or $atk == 308 or $atk == 323 or $atk == 330 or $atk == 346 or $atk == 352 or $atk == 362 or $atk == 392 or $atk == 401 or $atk == 453 or $atk == 487 or $atk == 503 or $atk == 518 or $atk == 534 or $atk == 1032 or $atk == 1033 or $atk == 1047 or $atk == 1074 or $atk == 100026)) {

            $weather2321 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 3 and id = 2')->fetch_assoc();
            if ($weather2321) {
                $damage = round($damage * 0.5);
                $dopLog = "<br>Солнце ослабляет атаку покемона";
            }
        }

        $reg332 = $mysqli->query("SELECT * FROM `users` WHERE  location >= 200 and location < 266 and id = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
        if ($reg332 and ($atk == 55 or $atk == 56    or $atk == 57  or $atk == 61  or $atk == 110 or $atk == 127  or $atk == 128 or $atk == 145 or $atk == 152 or $atk == 190 or $atk == 240 or $atk == 291 or $atk == 308 or $atk == 323 or $atk == 330 or $atk == 346 or $atk == 352 or $atk == 362 or $atk == 392 or $atk == 401 or $atk == 453 or $atk == 487 or $atk == 503 or $atk == 518 or $atk == 534 or $atk == 1032 or $atk == 1033 or $atk == 1047 or $atk == 1074 or $atk == 100026)) {

            $reg3321 = $mysqli->query('SELECT * FROM `base_region` WHERE  weather = 3 and id = 3')->fetch_assoc();
            if ($weather3321) {
                $damage = round($damage * 0.5);
                $dopLog = "<br>Солнце ослабляет атаку покемона";
            }
        }



        if ($atk == 69) {
            $damage = $damager['lvl'];
        }
        if ($damager['item_id'] == 25) {
            if ($atk == 310 or $atk == 403 or $atk == 44 or $atk == 125 or $atk == 399 or $atk == 237 or $atk == 407 or $atk == 326 or $atk == 60 or $atk == 252 or $atk == 424 or $atk == 423 or $atk == 422 or $atk == 252 or $atk == 29 or $atk == 531 or $atk == 158 or $atk == 442 or $atk == 302 or $atk == 157 or $atk == 143 or $atk == 173 or $atk == 537 or $atk == 23 or $atk == 239 or $atk == 127 or $atk == 428) {
                $aInf['chans_dop'] = $aInf['chans_dop'] + 15;
            } else {
                if (rand(1, 100) <= 15) {
                    $plus = plusStatus($bid, $opponent['id'], 13, 2);
                    if ($plus == "fall") {
                    } else {
                        $dopLog = "<br>Противник напуган";
                        $mysqli->query($plus);
                    }
                }
            }
        }
        if ($damager['item_id'] == 1063 and $aInf['chans_dop'] == 0) {
            if (rand(1, 100) <= 12) {
                $rndeffect = rand(1, 8);
                if ($rndeffect == 1) {
                    $plus = plusStatus($bid, $opponent['id'], 1, 9999);
                    if ($plus == "fall") {
                    } else {
                        $dopLog = "<br>Сработал эффект Шара. Противник отравлен!";
                        $mysqli->query($plus);
                    }
                }
                if ($rndeffect == 2) {
                    $plus = plusStatus($bid, $opponent['id'], 2, rand(2, 5));
                    if ($plus == "fall") {
                    } else {
                        $dopLog = "<br>Сработал эффект Шара. Противник уснул!";
                        $mysqli->query($plus);
                    }
                }
                if ($rndeffect == 3) {
                    $plus = plusStatus($bid, $opponent['id'], 3, 9999);
                    if ($plus == "fall") {
                    } else {
                        $dopLog = "<br>Сработал эффект Шара. Противник подожжен!";
                        $mysqli->query($plus);
                    }
                }
                if ($rndeffect == 4) {
                    $plus = plusStatus($bid, $opponent['id'], 4, 9999);
                    if ($plus == "fall") {
                    } else {
                        $dopLog = "<br>Сработал эффект Шара. Противник парализован!";
                        $mysqli->query($plus);
                    }
                }
                if ($rndeffect == 5) {
                    $plus = plusStatus($bid, $opponent['id'], 5, rand(2, 5));
                    if ($plus == "fall") {
                    } else {
                        $dopLog = "<br>Сработал эффект Шара. Противник заморожен!";
                        $mysqli->query($plus);
                    }
                }
                if ($rndeffect == 6) {
                    $plus = plusStatus($bid, $opponent['id'], 6, rand(2, 8));
                    if ($plus == "fall") {
                    } else {
                        $dopLog = "<br>Сработал эффект Шара. Противник спутан!";
                        $mysqli->query($plus);
                    }
                }
                if ($rndeffect == 7) {
                    $plus = plusStatus($bid, $opponent['id'], 13, rand(2, 3));
                    if ($plus == "fall") {
                    } else {
                        $dopLog = "<br>Сработал эффект Шара. Противник напуган!";
                        $mysqli->query($plus);
                    }
                }
                if ($rndeffect == 8) {
                    $plus = plusStatus($bid, $opponent['id'], 10, rand(2, 5));
                    if ($plus == "fall") {
                    } else {
                        $dopLog = "<br>Сработал эффект Шара. Противник отравлен!";
                        $mysqli->query($plus);
                    }
                }
            }
        }

        if ($aInf['chans_dop'] > 0) {
            if (rand(1, 100) <= $aInf['chans_dop']) {
                $infDOP = DopAtk($aInf['atac_id'], $aInf['chans_dop'], $damager, $opponent, $bid);
                $dopLog = isset($infDOP['log']) ? "<br>" . $infDOP['log'] : '';
                if ($infDOP['mos'] > 0) {
                    for ($i = 1; $i <= $infDOP['mos']; $i++) {
                        if ($infDOP['mysql'][$i] !== "fall") {
                            $mysqli->query($infDOP['mysql'][$i]);
                        }
                    }
                } else {
                    $mysqli->query($infDOP['mysql']);
                }
            }
        }
        if ($crit == 1.5) {
            $cri = "<br>" . $effect . " <font color=red>КРИТИЧЕСКИЙ УДАР</font>" . $dopLog;
        } else {
            $cri = "<br>" . $effect . $dopLog;
        }
        $dmg = array("dm" => $damage, "cri" => $cri);
        return $dmg;
    } else {
        if ($atk == 136 or $atk == 26) {
            $dmg = array("dm" => 0, "cri" => "Покемон промахнулся! Атака причиняет мощные провреждения пользователю.", "att_you" => 50);
            return $dmg;
        }
        $dmg = array("dm" => 0, "cri" => " ПРОМАХ" . $dopLog);
        return $dmg;
    }
}


require('ando/functions/startround.php');
