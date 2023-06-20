<?php 
if($user_id == 1570 or $user_id == 1573){
?>
<head>
    <title>Old Pokemon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable = no">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/css/world.css">
    <link href="/fontawesome/css/all.css" rel="stylesheet">
    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <style>
        .lastatk {
            height: 100px;
            overflow: auto;
        }

        .list {
            width: 350px;
        }

        .check {
            position: absolute;
            top: 0;
            right: 50%;
            width: 250px;
        }

        #atklist {
            line-height: 16px;
        }


        .notyf {
            font-family: nunito;
            min-height: 50px;
            cursor: pointer;
            box-sizing: border-box;
            box-shadow: 1px 1px 2px #d4d6d8;
            border-radius: 30px 0 0 30px;
            width: 100%;
            margin-bottom: 2px;
            background: #ffffff;
            overflow: auto !important;
            padding: 5px;
            position: relative;
            margin: 5px 0;
            right: -6px;
        }

        .notyf>.icon {
            text-align: center;
            margin-top: -18px;
            left: 15px;
            top: 50%;
            width: 30px;
            font-size: 30px;
            position: absolute;
            color: #2196f3;
        }

        .notyf>.content {
            display: inline-block;
            float: right;
            width: 270px;
            padding: 11px 0;
        }

        .notyf>.content>.item {
            width: 35px;
            vertical-align: middle;
            height: 35px;
        }

        .notyf.success>.icon {
            color: #328d46;
        }

        .notyf.plus>.icon {
            color: #328d46;
        }

        .notyf.minus>.icon {
            color: #b34d4d;
        }

        .notyf.warning>.icon {
            color: #ff9800;
        }

        .notyf.error>.icon {
            color: #b34d4d;
        }

        .notyf.reits>.icon {}
    </style>
</head>

<body>
    <div class="DivNotification"></div>
    <br><br>
    <input type="text" class="type" placeholder="Тип атаки lvl,egg,tm"></input><br><br>
    <select name='pok' class="pokemon">
        <?php
        $awrd = $mysqli->query("SELECT * FROM `base_pokemon` ");
        while ($awr = $awrd->fetch_assoc()) {
        ?>
            <option value="<?= $awr['id']; ?>"><?= $awr['id']; ?> <?= $awr['name']; ?></option>
        <?php } ?>
    </select><br>
    <br>
    <input type="text" class="form" placeholder="Форма"></input><br><br>
    <input type="text" class="lvl" placeholder="Уровень"></input><br><br>
    
    <select name='pok' class="name">
        <?php
        $awrd1 = $mysqli->query("SELECT * FROM `base_attacks` WHERE `attac_name_eng` != '' ORDER BY `attac_name_eng` ASC");
        while ($awr1 = $awrd1->fetch_assoc()) {
        ?>
            <option value="<?= $awr1['attac_name_eng']; ?>"> <?= $awr1['attac_name_eng']; ?></option>
        <?php } ?>
    </select><br>
    <br>
    <button onclick="addatk()">Поставить</button>

    <div class="list">
        <h2>Последние атаки:</h2>
        <ol class="lastatk"></ol>
    </div>


    <!--<h2>Копирование яйцевых атак</h2>-->
    <!--<input type="text" class="eggcop" placeholder="У кого взять"></input><br><br>-->
    <!--<input type="text" class="eggvst" placeholder="Кому поставить"></input><br><br>-->
    <!--<button onclick="copatk()">Поставить</button>-->


    <h2>Создание атаки</h2>
    <input type="text" class="nameAtk" placeholder="Название атаки"></input><br><br>
    <input type="text" class="typeAtk" placeholder="Типа атаки с заглавной буквы"></input><br><br>
    <input type="text" class="catAtk" placeholder="Категория атаки 1(физ),2(спец) или 3(особенная)"></input><br><br>
    <input type="text" class="ppAtk" placeholder="PP Атаки"></input><br><br>
    <input type="text" class="powerAtk" placeholder="Мощность атаки"></input><br><br>
    <input type="text" class="accuAtk" placeholder="Точность атаки"></input><br><br>
    <input type="text" class="aboutAtk" placeholder="Описание атаки"></input><br><br>
    <button onclick="insertAtk()">Создать</button>


    <h2>Очищение атак</h2>
    <input type="text" class="delatk" placeholder="У кого удалить"></input><br>
    <input type="text" class="delatktmtr" placeholder="tm или tr"></input><br>
    <input type="text" class="delatknumb" placeholder="номер"></input><br><br>
    <button onclick="delatk()">Удалить</button>
    <br>
    <br>

    


    <!--<div class="check">-->
    <!--    <h2>Проверка атак</h2>-->
    <!--    <input type="text" id="ability3" placeholder="Номер покемона" onkeydown="if(event.keyCode == 13){check($(this).val());}"><br>-->
    <!--    <div id="atklist"></div>-->
    <!--</div>-->
    <script>
        function check(val) {
            $.ajax({
                url: "/game.php?fun=pokR",
                type: "POST",
                data: "check=" + val,
                success: function(response) {
                    response = JSON.parse(response);
                    $('#atklist').html(response['atklist']);

                }
            });
        }

        function delatk() {
            var del = $('.delatk').val();
            var deltm = $('.delatktmtr').val();
            var delnumb = $('.delatknumb').val();
            $.ajax({
                url: "/game.php?fun=pokR",
                type: "POST",
                data: "del=" + del + "&tmtr=" + deltm + "&delnumb=" + delnumb,
                success: function(response) {
                    response = JSON.parse(response);

                    $('.delatk').val("");
                    $('.delatktmtr').val("");
                    $('.delatknumb').val("");
                    Game.notifications.main('' + response['text'] + '', '' + response['error'] + '');

                }
            });
        }

        function copatk() {
            var cop = $('.eggcop').val();
            var vst = $('.eggvst').val();
            $.ajax({
                url: "/game.php?fun=pokR",
                type: "POST",
                data: "vst=" + vst + "&cop=" + cop,
                success: function(response) {
                    response = JSON.parse(response);

                    $('.eggcop').val("");
                    $('.eggvst').val("");
                    Game.notifications.main('' + response['text'] + '', '' + response['error'] + '');

                }
            });
        }

        function addatk() {
            var pokemon = $('.pokemon').val();
            var name = $('.name').val();
            var type = $('.type').val();
            var lvl = $('.lvl').val();
            var form = $('.form').val();
            $.ajax({
                url: "/game.php?fun=pokR",
                type: "POST",
                data: "typ=" + type + "&pokemon=" + pokemon + "&name=" + name + "&lvl=" + lvl + "&form=" + form,
                success: function(response) {
                    response = JSON.parse(response);

                    $('.lvl').val("");
                    $('.lvl').focus();
                    if (response['error'] == "success") {
                        $('<li />', {
                            'html': response['text']
                            // 'html': 'Атака ' + name + ' у #' + pokemon + ' '
                        }).prependTo('.lastatk');
                    }
                }
            });
        }

        function insertAtk() {
            var nameEng = $('.nameAtk').val();
            var type = $('.typeAtk').val();
            var cat = $('.catAtk').val();
            var pp = $('.ppAtk').val();
            var power = $('.powerAtk').val();
            var accu = $('.accuAtk').val();
            var about = $('.aboutAtk').val();
            $.ajax({
                url: "/game.php?fun=pokR",
                type: "POST",
                data: "typ=" + type + "&nameEng=" + nameEng + "&cat=" + cat + "&pp=" + pp + "&power=" + power + "&accu" + accu + "&about" + about,
                success: function(response) {
                    response = JSON.parse(response);

                    // $('.lvl').val("");
                    // $('.lvl').focus();
                    // if (response['error'] == "success") {
                    //     $('<li />', {
                    //         'html': response['text']
                    //         // 'html': 'Атака ' + name + ' у #' + pokemon + ' '
                    //     }).prependTo('.lastatk');
                    // }
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