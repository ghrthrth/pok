<?php 
if($user_id == 1570 or $user_id == 1573){
?>

<head>
    <title>AddPok Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable = no">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/css/world.css">
    <link href="/fontawesome/css/all.css" rel="stylesheet">
    <script src="/js/jquery.min.js" type="text/javascript"></script>
	<script src="pokeroute.ru/js/world.js" type="text/javascript"></script>
	<style>
	    body{
	        justify-content: center;
    display: flex;
	    }
	    .Content{
	        width: 600px;
    background: #fff;
    text-align: center;
	    }
	    .Content > .Dex-Inputs > div{
	        transition: all .1s ease-in-out;
    display: inline-block;
    width: 54px;
    text-align: center;
    padding: 5px;
    background: #6c99ca;
    color: #fff;
    border-radius: 3px;
    cursor: pointer;
    margin: 0px 20px;
    border: 1px solid #6c99ca;
	    }
	    .Content > .Dex-Inputs > input{
	        margin: 5px 0px;
    padding: 5px;
    border-radius: 3px;
    border: 1px solid #cecece;
    background: #f8f5f5;
    width: 378px;
	    }
	    
	    label{
	        display:inline-block;
	        width:130px;
	        text-align: center;
	        margin-right:10px;
	        font-size:11px;
	    }
	    td{
	        text-align:center;
	    }
	    input{
	       text-align: left;
	       height: 20px;
	    }
	    .min{
	        width: 50px;
	    }
	    textarea{
	        width: 500px;
    height: 95px;
	    }
	    .helpBlock{
	        position: absolute;
    top: 10px;
    left: 10px;
    width: 300px;
	    }
	    .helpBlockL{
	        position: absolute;
    top: 10px;
    right: 10px;
    
    width: 300px;
	    }
	    h4{
	        text-align: center;
	        color: green;
	    }
	</style>
</head>
<body>
    <div class="DivNotification"></div>
    <div class="Content">
        <div class="Dex-Inputs">    
            <input type="text" id="number" placeholder="Найти покемона..." onkeydown="if(event.keyCode == 13){addpok($(this).val());}">   
        </div>
        <table>
            <tr>
                <td><label>Имя покемона</label><input type="text" id="nameRU" onkeydown="if(event.keyCode == 13){redact('name',$(this).val());}"></td>
                <!-- <td><label>Имя покемонаENG</label><input type="text" id="nameENG" onkeydown="if(event.keyCode == 13){redact('name',$(this).val());}"></td> -->
            </tr>
            <tr>
                <td><label>ВЕС</label><input type="text" id="weight" onkeydown="if(event.keyCode == 13){redact('weight',$(this).val());}"></td>
                <td><label>РОСТ</label><input type="text" id="height" onkeydown="if(event.keyCode == 13){redact('height',$(this).val());}"></td>
            </tr>
            <tr>
                <td><label>ТИП-1</label><input type="text" id="type1" onkeydown="if(event.keyCode == 13){redact('type',$(this).val());}"></td>
                <!-- <datalist id = "typeSelect1">
				 <option value = "not" label = "not">
				 <option value = "dark" label = "dark">
				 <option value = "dragon" label = "dragon">
				 <option value = "electric" label = "electric">
				 <option value = "fairy" label = "fairy">
                 <option value = "fighting" label = "fighting">
				 <option value = "fire" label = "fire">
				 <option value = "fly" label = "fly">
				 <option value = "ghost" label = "ghost">
				 <option value = "grass" label = "grass">
                 <option value = "ground" label = "ground">
				 <option value = "ice" label = "ice">
				 <option value = "normal" label = "normal">
				 <option value = "poison" label = "poison">
				 <option value = "psychic" label = "psychic">
                 <option value = "rock" label = "rock">
				 <option value = "steel" label = "steel">
				 <option value = "water" label = "water">
				 <option value = "bug" label = "bug">
			</datalist>	 -->
                <td><label>ТИП-2</label><input type="text" id="type2" onkeydown="if(event.keyCode == 13){redact('type_two',$(this).val());}"></td>
                <!-- <datalist id = "typeSelect2">
				 <option value = "not" label = "not">
				 <option value = "dark" label = "dark">
				 <option value = "dragon" label = "dragon">
				 <option value = "electric" label = "electric">
				 <option value = "fairy" label = "fairy">
                 <option value = "fighting" label = "fighting">
				 <option value = "fire" label = "fire">
				 <option value = "fly" label = "fly">
				 <option value = "ghost" label = "ghost">
				 <option value = "grass" label = "grass">
                 <option value = "ground" label = "ground">
				 <option value = "ice" label = "ice">
				 <option value = "normal" label = "normal">
				 <option value = "poison" label = "poison">
				 <option value = "psychic" label = "psychic">
                 <option value = "rock" label = "rock">
				 <option value = "steel" label = "steel">
				 <option value = "water" label = "water">
				 <option value = "bug" label = "bug">
			</datalist>	 -->
            </tr>
            <tr>
                <td><label>Группа опыта</label><input type="text" id="exp_group" onkeydown="if(event.keyCode == 13){redact('exp_group',$(this).val());}"></td>
                <td><label>Категория силы</label><input type="text" id="power_category" onkeydown="if(event.keyCode == 13){redact('power_category',$(this).val());}"></td>
            </tr>
            <tr>
                <td><label>Пол м/ж</label><br><input class="min" type="text" id="sex_m" onkeydown="if(event.keyCode == 13){redact('sex_m',$(this).val());}"> <input  class="min"  type="text" id="sex_f" onkeydown="if(event.keyCode == 13){redact('sex_f',$(this).val());}"></td>
                <!-- <td><label>Частота поимки</label><input type="text" id="catch" onkeydown="if(event.keyCode == 13){redact('chanceCatch',$(this).val());}"></td> -->
            </tr>
            <tr>
                <td><label>HP</label><input class="min"  type="text" id="hp" onkeydown="if(event.keyCode == 13){redact('hp',$(this).val());}">
                <label>Атака</label><input class="min" type="text" id="atk" onkeydown="if(event.keyCode == 13){redact('atk',$(this).val());}">
                <label>Защита</label><input class="min" type="text" id="def" onkeydown="if(event.keyCode == 13){redact('def',$(this).val());}"></td>
                <td><label>Скорость</label><input class="min" type="text" id="spd" onkeydown="if(event.keyCode == 13){redact('spd',$(this).val());}">
                <label>Спец. Атака</label><input class="min" type="text" id="satk" onkeydown="if(event.keyCode == 13){redact('satk',$(this).val());}">
                <label>Спец. Защита</label><input class="min" type="text" id="sdef" onkeydown="if(event.keyCode == 13){redact('sdef',$(this).val());}"></td>
            </tr>
            <tr>
                <!-- <td><label>Lvl эволюции</label><input type="text" id="lvl" onkeydown="if(event.keyCode == 13){redact('evol_lvl',$(this).val());}"></td> -->
                <!-- <td><label>Номер эволюции</label><input type="text" id="nevol" onkeydown="if(event.keyCode == 13){redact('evol_basenum',$(this).val());}"></td> -->
            </tr>
            <tr>
                <!-- <td><label>Яйца</label><input type="text" id="egg" onkeydown="if(event.keyCode == 13){redact('eggBasenum',$(this).val());}"></td> -->
                <!-- <td><label>Тип эволюции</label><input type="text" id="type_evol" onkeydown="if(event.keyCode == 13){redact('evol_type',$(this).val());}"></td> -->
            </tr>
            <tr>
                <!-- <td><label>Способность</label><input type="text" id="ability" onkeydown="if(event.keyCode == 13){redact('slot1',$(this).val());}"></td> -->
                <!-- <td><label>Способность</label><input type="text" id="ability2" onkeydown="if(event.keyCode == 13){redact('slot2',$(this).val());}"></td> -->
            </tr>
            <tr>
                <!-- <td><label>Hidden</label><input type="text" id="ability3" onkeydown="if(event.keyCode == 13){redact('hidden',$(this).val());}"></td> -->
                <!-- <td><label>Класс</label><input type="text" id="class" onkeydown="if(event.keyCode == 13){redact('class',$(this).val());}"></td> -->
            </tr><tr>
                <!-- <td><label>Тип эволюции ит</label><input type="text" id="type_item" onkeydown="if(event.keyCode == 13){redact('evol_type_item',$(this).val());}"></td> -->
                <!-- <td><label>Предмет</label><input type="text" id="item" onkeydown="if(event.keyCode == 13){redact('evol_item',$(this).val());}"></td> -->            
            </tr>
            <tr>
                <td colspan="2">
                    <label>Описание</label><br><textarea id="about"   onkeydown="if(event.altKey && event.keyCode == 13){redact('about',$(this).val());}"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Эволюции</label><br><textarea id="evol"   onkeydown="if(event.altKey && event.keyCode == 13){redact('evolve',$(this).val());}"></textarea>
                </td>
            </tr>
        </table>
    </div>
    <div class="helpBlock">
        <h4>Типы</h4>
        <b>Насекомый</b> - bug<br>
        <b>Темный</b> - dark<br>
        <b>Дракон</b> - dragon<br>
        <b>Электрический</b> - electric<br>
        <b>Волшебный</b> - fairy<br>
        <b>Боевой</b> - fighting<br>
        <b>Огненный</b> - fire<br>
        <b>Летающий</b> - fly<br>
        <b>Призрачный</b> - ghost<br>
        <b>Травяной</b> - grass<br>
        <b>Земляной</b> - ground<br>
        <b>Ледяной</b> - ice<br>
        <b>Нормальный</b> - normal<br>
        <b>Ядовитый</b> - poison<br>
        <b>Псиический</b> - psychic<br>
        <b>Каменный</b> - rock<br>
        <b>Стальной</b> - steel<br>
        <b>Водный</b> - water<br>
        <b>Нет</b> - not<br>
        <!-- <h4>Тип эволюции</h4>
        <b>Спаривание</b> - sex<br>
        <b>Уровень</b> - lvl<br>
        <b>Итем/нету</b> - item<br> -->
        <!-- <h4>Роли</h4>
        1. Специальный атакер<br>
        2. Физический атакер<br>
        3. Универсальный атакер<br>
        4. Вредитель<br>
        5. Подрывник<br>
        6. Эстафетчик<br>
        7. Физическая стена<br>
        8. Специальная стена<br>
        9. Танк<br>
        10. Экранщик<br>
        11. Универсальный экранщик<br>
        12. Помощник<br>
        13. Целитель<br>
        14. Синоптик<br>
        15. Убийца<br> -->
        
    </div>
    <div class="helpBlockL">
        <!-- <h4>Эволюция</h4>
        <div class="itemIsset" onclick="issetAll(107,'item')" style="background-image: url(/img/world/items/little/107.png)"></div> - class <i>itemIsset</i>, func <i>issetAll(id,'item')</i>, style <i>background-image: url(/img/world/items/little/id.png)</i><br><br>
        <div class="itemIsset" onclick="issetAll(108,'item')" style="background-image: url(/img/world/items/little/108.png)"></div> + Топот - Покемон с атакой<br>
        <h4>Предметы эволюции</h4>
        80. Электрический камень<br>
        81. Водный камень<br>
        82. Лиственный камень<br>
        83. Огненный камень<br>
        84. Лунный камень<br>
        85. Солнечный камень<br>
        86. Сумрачный камень<br>
        87. Сияющий камень<br>
        88. Овальный камень<br>
        89. Рассвет камень<br>
        90. Ледяной камень<br>
        91. Глубоководный зуб<br>
        92. Глубоководная чешуя<br>
        93. Острый коготь<br>
        94. Острый клык<br>
        95. Кусок ткани<br>
        96. Духи<br>
        97. Пироженка<br>
        98. Протектор<br>
        99. Корона<br>
        100. Броня<br>
        101. Магмарайзер<br>
        102. Электрайзер<br>
        103. Перламутровая чешуя<br>
        104. Модернизатор<br>
        105. Улучшенный модернизатор<br>
        106. Чешуя дракона<br>
        107. Эволвер счастья<br>
        108. Эволвер знаний<br>
        109. Разбитый чайник<br>
        110. Треснувший чайник<br>
        111. Сладкое яблоко<br>
        112. Кислое яблоко<br>
        113-119. Посыпка<br> -->
    </div>
    <script src="/js/core.js" type="text/javascript"></script>
    <script>
    function addpok(info){
        
        $.ajax({
				url: "/game.php?fun=pokR",
				type: "POST",
				data: "id="+info,
				success: function (response){
				    response = JSON.parse(response);
				    
                    $('#nameRU').val(response['nameRU']);
                    // $('#nameENG').val(response['nameENG']);
                    $('#weight').val(response['weight']);
                    $('#height').val(response['height']);
                    $('#type1').val(response['type1']);
                    $('#type2').val(response['type2']);
                    $('#exp_group').val(response['exp_group']);
                    $('#power_category').val(response['power_category']);
                    $('#sex_m').val(response['sex_m']);
                    $('#sex_f').val(response['sex_f']);
                    //  $('#ability').val(response['ability']);
                    // $('#ability2').val(response['ability2']);
                    // $('#ability3').val(response['ability3']);
                    // $('#rol').val(response['rol']);
                    $('#evol').val(response['evol']);
                    // $('#catch').val(response['catch']);
                    $('#hp').val(response['hp']);
                    $('#atk').val(response['atk']);
                    $('#def').val(response['def']);
                    $('#spd').val(response['spd']);
                    $('#satk').val(response['satk']);
                    $('#sdef').val(response['sdef']);
                    $('#sdef').val(response['sdef']);
                    // $('#lvl').val(response['lvl']);
                    $('#about').val(response['about']);
                    
                    // $('#item').val(response['item']);
                    // $('#nevol').val(response['nevol']);
                    // $('#egg').val(response['egg']);
                    // $('#type_evol').val(response['type_evol']);
                    // $('#class').val(response['class']);
                    // $('#type_item').val(response['type_item']);
				}
			});
    }
        function redact(info,val){
            var id = $('#number').val();
            $.ajax({
				url: "/game.php?fun=pokR",
				type: "POST",
				data: "type="+info+"&val="+val+"&basenum="+id,
				success: function (response){
				    response = JSON.parse(response);
				    
				    Game.notifications.main(''+response['text']+'',''+response['error']+'');
				}
			});
}
    </script>
</body>

<?php 

} else{ 
	 echo "<SCRIPT>location.href='http://oldpokemon.ru';</SCRIPT>"; return;
	 }

?>