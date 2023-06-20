<?
if(!empty($_POST['id'])){
    $id = $_POST['id'];
    $pok = $mysqli->query('SELECT * FROM `base_pokemon` WHERE `id` = '.$id)->fetch_assoc();
    // $poka = $mysqli->query('SELECT * FROM `base_ability_pokemon` WHERE `id` = '.$id)->fetch_assoc();
    $response['nameRU'] = $pok['name'];
    // $response['nameENG'] = $pok['name'];
    $response['weight'] = $pok['weight'];
    $response['height'] = $pok['height'];
    $response['type1'] = $pok['type'];
    $response['type2'] = $pok['type_two'];
    $response['exp_group'] = $pok['exp_group'];
    $response['power_category'] = $pok['power_category'];
    // $response['catch'] = $pok['chanceCatch'];
    $response['sex_m'] = $pok['sex_m'];
    $response['sex_f'] = $pok['sex_f'];
    $response['hp'] = $pok['hp'];
    $response['atk'] = $pok['atk'];
    $response['def'] = $pok['def'];
    $response['spd'] = $pok['spd'];
    $response['satk'] = $pok['satk'];
    $response['sdef'] = $pok['sdef'];
    // $response['ability'] = ability_name_eng($poka['slot1']);
    // $response['ability2'] = ability_name_eng($poka['slot2']);
    // $response['ability3'] = ability_name_eng($poka['hidden']);
    // $response['type_item'] = $pok['evol_type_item'];
    // $response['item'] = $pok['evol_item'];
    // $response['effort'] = $pok['effort'];
    // $response['rol'] = $pok['v_rol'];
    $response['evol'] = htmlspecialchars_decode($pok['evolve']);
    
    $response['about'] = $pok['about'];
    $response['class'] = $pok['class'];
    
    // $response['lvl'] = $pok['evol_lvl'];
    // $response['nevol'] = $pok['evol_basenum'];
    // $response['egg'] = $pok['eggBasenum'];
    // $response['type_evol'] = $pok['evol_type'];
}
if(!empty($_POST['type'])){
    $info = $_POST['type'];
    $value = $_POST['val'];
    if($type = 'evolve'){
        $value = htmlspecialchars($_POST['val']);
    }
    $bas = $_POST['basenum'];
    $pok = $mysqli->query('SELECT * FROM `base_pokemon` WHERE `id` = '.$bas)->fetch_assoc();
    if($pok){
            $mysqli->query('UPDATE `base_pokemon` SET `'.$info.'` = "'.$value.'" WHERE `id` = '.$bas);
            //$mysqli->query("INSERT INTO `toast` (`user`,`type`,`head`,`text`,`load`) VALUES ('".$_SESSION['user_id']."','info','PanelPok','Изменен покемон № '".$pok['name']."'','false') ");
            $response['text'] = "Покемон найден!";
            $response['error'] = "error";
    }else{
        // $response['text'] = "Покемон не найден!";
        // $response['error'] = "error";
    }
}


// if(!empty($_POST['typ'])){
//     $pokemon = $_POST['pokemon'];
//     $type = $_POST['typ'];
//     $atk = $_POST['name'];
//     if($pokemon and $type){
//         if($pokemon <= 898 and $pokemon > 0){
//                 if($type == "tm" or $type == "tr"){
//                         if($type == "tm"){
//                             $tm = $atk;
//                         }else{
//                             $tm = 2000+$atk;
//                         }
//                                 $mysqli->query("INSERT INTO `attac_poke_tm` (`poke_base_id`,`tm_id`) VALUES('".$pokemon."','".$tm."') ");
//                         $response['text'] = "Удачно!";
//                         $response['error'] = "success";
//                 }else{
//                     $response['text'] = "Тип атаки не подходит!";
//                     $response['error'] = "error";
//                 }
            
//         }else{
//             $response['text'] = "Покемон не найден!";
//             $response['error'] = "error";
//         }
//     }else{
//         $response['text'] = "Одно из полей отсутствует!";
//         $response['error'] = "error";
//     }
// }

if(!empty($_POST['typ'])){
    $pokemon = $_POST['pokemon'];
    $lvl = $_POST['lvl'];
    $type = $_POST['typ'];
    $atk = $_POST['name'];
    $form = $_POST['form'];
    $batk = $mysqli->query('SELECT * FROM `base_attacks` WHERE `attac_name_eng` = "'.$atk.'" ')->fetch_assoc();
    if($pokemon and $lvl and $type and $atk){
        if($pokemon <= 10000 and $pokemon > 0){
            if($lvl >= 1 and $lvl < 100){
                if($type == "lvl" or $type == "sex"){
                    if($batk){
                        $batk_p = $mysqli->query('SELECT * FROM `base_pokemon_form` WHERE `pok` = "'.$pokemon.'" AND `form` = "'.$form.'" AND `type` = "'.$type.'" ')->fetch_assoc();
                        if($batk_p){
                            if($batk_p['atks'] != ""){$atk_list = $batk_p['atks'].",".$batk['atac_id'];}else{$atk_list = $batk['atac_id'];}
                            if($batk_p['lvl'] != ""){$lvl_list = $batk_p['lvl'].",".$lvl;}else{$lvl_list = $lvl;}
                        //     if($type == "sex"){
                        //         $mysqli->query('UPDATE `base_attacks_pokemons` SET `attacks` = "'.$atk_list.'" WHERE `type` = "sex" AND `pok` = '.$pokemon);
                        //     }else{
                                $mysqli->query('UPDATE `base_pokemon_form` SET `atks` = "'.$atk_list.'",`lvl` = "'.$lvl_list.'" WHERE `id` = '.$batk_p['id'].' ');
                        //     }
                        $response['text'] = "Удачно установлена атака <b>".$batk['attac_name_eng']."</b> по типу ".$type." !";
                        }else{
                        //     if($type == "sex"){
                        //         $a = $mysqli->query("INSERT INTO `base_pokemon_form` (`pok`,`attacks`,`form`) VALUES('".$pokemon."','".$batk['id']."','".$form."') ");
                        //     }else{
                                $a = $mysqli->query("INSERT INTO `base_pokemon_form` (`pok`,`atks`,`lvl`,`form`,`type`) VALUES('".$pokemon."','".$batk['atac_id']."','".$lvl."','".$form."','".$type."') ");
                        //     }
                        $response['text'] = "Удачно установлена атака <b>".$batk['attac_name_eng']."</b> по типу ".$type." !";
                        }
                        
                        $response['error'] = "success";
                    }else{
                        $response['text'] = "Атака не найдена!";
                    $response['error'] = "error";
                    }
                }else{
                    $response['text'] = "Тип атаки не подходит!";
                    $response['error'] = "error";
                }
            }else{
                $response['text'] = "Уровень не может быть ниже 1 и выше 100!";
                $response['error'] = "error";
            }
        }else{
            $response['text'] = "Покемон не найден!";
            $response['error'] = "error";
        }
    }else{
        $response['text'] = "Одно из полей отсутствует!";
        $response['error'] = "error";
    }
}

if(!empty($_POST['vst'])){
    $vst = $_POST['vst'];
    $cop = $_POST['cop'];
    $batk = $mysqli->query('SELECT * FROM `base_attacks_pokemons` WHERE `pok` = "'.$cop.'" AND `type` = "sex" ')->fetch_assoc();
    if($batk){
        $batk2 = $mysqli->query('SELECT * FROM `base_attacks_pokemons` WHERE `pok` = "'.$vst.'" AND `type` = "sex" ')->fetch_assoc();
        if($batk2){
            $mysqli->query('UPDATE `base_attacks_pokemons` SET `attacks` = "'.$batk['attacks'].'" WHERE `type` = "sex" AND `pok` = '.$vst);
        }else{
            $a = $mysqli->query("INSERT INTO `base_attacks_pokemons` (`pok`,`attacks`,`type`) VALUES('".$vst."','".$batk['attacks']."','sex') ");
        }
        $response['text'] = "Атаки успешно скопированы!";
        $response['error'] = "success";
    }else{
        $response['text'] = "У этого покемона нет яйцевых атак!";
        $response['error'] = "error";
    }
}

if(!empty($_POST['del'])){
    $del = $_POST['del'];
    $tmtr = $_POST['tmtr'];
    $numb = $_POST['delnumb'];
    if($tmtr == "tm"){ $tm = $numb;}else{ $tm = 2000+$numb;}
    $mysqli->query('DELETE FROM `attac_poke_tm` WHERE `poke_base_id` = "'.$del.'" AND `tm_id` = "'.$tm.'" ');
    $response['text'] = "Атака успешно удалена!";
        $response['error'] = "success";
}


if(!empty($_POST['check'])){
    $id = $_POST['check'];
    $batk = $mysqli->query('SELECT * FROM `base_attacks_pokemons` WHERE `pok` = "'.$id.'" AND `type` = "lvl" ')->fetch_assoc();
    $batk2 = $mysqli->query('SELECT * FROM `base_attacks_pokemons` WHERE `pok` = "'.$id.'" AND `type` = "sex" ')->fetch_assoc();
    $atkLvl = explode(',',$batk['lvl']);
    $atkList = explode(',',$batk['attacks']);
    $a .= '<b>Атаки по уровню:</b><br>';
    if($batk){
    //   for($i=0;$i<count($atkLvl);$i++){
    // 		$info = Work::$sql->query('SELECT
    // 										`id`,
    //                                         `name`,
    //                                         `title`,
    //                                         `type`,
    //                                         `category`,
    //                                         `priority`,
    //                                         `power`,
    //                                         `accuracy`,
    //                                         `pp`
    //                                     FROM `base_atk`
    // 									WHERE `id` = '.$atkList[$i]
    //                                 )->fetch_assoc();
    //     $a .= $atkLvl[$i].'lvl - '.$info['name'].' <br>';
    // 	}
    	}else{
    	    $a .= '<div class="titl noatk">Покемон не изучает атак по уровню!</div>';
    	}
    	$a .= '<br><b>Атаки по разведению:</b><br>';
    	if($batk2){
    $atkList = explode(',',$batk2['attacks']);
    // for($i=0;$i<count($atkList);$i++){
    //   $info = Work::$sql->query('SELECT
    //                   `id`,
    //                                       `name`,
    //                                       `title`,
    //                                       `type`,
    //                                       `category`,
    //                                       `priority`,
    //                                       `power`,
    //                                       `accuracy`,
    //                                       `pp`
    //                                   FROM `base_atk`
    //                 WHERE `id` = '.$atkList[$i]
    //                               )->fetch_assoc();
    //   $a .= $info['name'].' <br>';
    // }
    }else{
        $a .= '<div class="titl noatk">Покемон не изучает атак по разведению!</div>';
    }
      $response['atklist'] = $a;
    
    
    
    
    
    
    
    
    
    
}
echo json_encode($response);
