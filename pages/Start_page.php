<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>StopKorrozia</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery-3.1.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>

<div class="container">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Список кораблей</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-15 well">
                    <a class="btn btn-primary" onclick="Del_edit_param();" data-toggle="modal" data-target="#usuario"><i class="fa fa-fw -square -circle fa-plus-square"></i>Добавить корабль</a>
                </div>
            </div>
        </div>
    </div>

    <!-- search -->
    <div class="section">
        <div class="container">
            <div class="row" >
                <div class="col-md-13 well" >
                    <!--<input id="search" name="search_naem" class="form-group" placeholder="Поиск" type="text" required="" >	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;-->
                </div>
            </div>
        </div>
    </div>


    <div id="table_ships" >
        <!--Список кораблей -->
    </div>


    <div class="fade modal" id="usuario">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h2 class="modal-title" id="myModalLabel">Новый корабль</h2>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="../php/Add_new_ship.php" method="post" enctype="multipart/form-data" >
                        <fieldset>
                            <!-- Form Name -->
                            <!-- Prepended text-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="prependedtext">Имя корабля</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input id="id_Name_ship" name="Name_ship" class="form-control" placeholder="Имя корабля" type="text" required="">
                                    </div>
                                </div>
                            </div>
                            <!-- telephone text-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nombre">Высота корабля</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input id="id_Height_ship" name="Height_ship" class="form-control" placeholder="Высота корабля в метрах" type="text" required="">
                                    </div>
                                </div>
                            </div>
                            <!-- position -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nombre">Ширина корабля</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input id="id_Width_ship" name="Width_ship" class="form-control" placeholder="Ширина корабля в метрах" type="text" required="">
                                    </div>
                                </div>
                            </div>
                            <!-- Appended Input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for=''>Длина корабля</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input id="id_Length_ship" name="Length_ship" class="form-control" placeholder="Длина корабля в метрах" type="text" required="">
                                    </div>
                                </div>
                            </div>

                            <!-- Appended Input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="">Год постройки</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input id="id_year_start_ship" name="Year_start_ship" class="form-control" placeholder="" type="text" required="">
                                    </div>
                                </div>
                            </div>

                            <!-- Appended Input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="">Снареженный вес</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input id="id_Curb_weight" name="Curb_weight" class="form-control" placeholder="тонны" type="text" required="">
                                    </div>
                                </div>
                            </div>

                            <!-- Appended Input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Maximum draft">Грузоподьемность</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input id="id_Lifting_capacity" name="Lifting_capacity" class="form-control" placeholder="тонны" type="text" required="">
                                    </div>
                                </div>
                            </div>

                            <!-- Appended Input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Maximum draft">Максимальная осадка</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input id="id_maximum_draft" name="maximum_draft" class="form-control" placeholder="В метрах" type="text" required="">
                                    </div>
                                </div>
                            </div>


                            <!-- Appended Input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Maximum draft">Под каким флагом ходит корабль</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input id="id_flag_ship" name="Flag_ship" class="form-control" placeholder="Страна" type="text" required="">
                                    </div>
                                </div>
                            </div>

                            <!-- Appended Input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Maximum draft">Средняя скорость корабля</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input id="id_Speed_ship" name="Speed_ship" class="form-control" placeholder="В узлах" type="text" required="">
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Количество двигателей</label>
                                <div class="col-sm-10">
                                    <input id="ship_engine_count" type="number" name="count_ship_engine" min="1" max="10" value=""  class="form-control"  required>
                                    <input type='hidden' id='length_count_ship_engine' name="length_count_ship_engine_php">
                                    <div id="div_engine_ship_count"></div>
                                </div>
                            </div>
                            <input type="hidden" id="edit_ship" name="name_edit_ship" value="">

                            <script>

                                $( "#ship_engine_count" ).change(function() {
                                    var value = $(this).val();
                                    $("#div_engine_ship_count").empty();
                                    for(var i=1;i<=value;i++)
                                        $('#div_engine_ship_count').append('<div class="delete_input">Номер двигателя '+i+': <input type="text" class="form-control" placeholder="Мощность двигателя" id="id_Engine_number_'+i+'" name="Engine_number_'+i+'" required> <br> </div>');
                                    $('#length_count_ship_engine').val(value);
                                });
                            </script>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="departamento">Тип корабля</label>
                                <div class="col-md-5">
                                    <select id="id_Type_ship" name="Type_ship" class="form-control">
                                        <option value="Сухогруз">Сухогруз</option>
                                        <option value="Танкер">Танкер</option>
                                        <option value="Балкер">Балкер</option>
                                        <option value="Транспортное судно">Транспортное судно</option>
                                        <option value="Контейнеровоз">Контейнеровоз</option>
                                    </select>
                                </div>
                            </div>
                            <!-- File Button -->
                            <div class="form-group del_div">
                                <label class="col-md-4 control-label" for=""> Фото корабля:</label>
                                <div class="col-md-7">
                                     <input name="photo_new_ship" id="id_photo_new_ship" type="file" value="../File/Ship/591418670a4c4.jpg" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for=""> </label>
                                <div class="col-md-7">
                                    <input type="submit" value="save" class="btn btn-primary">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //ОТлов имени и пердача его на сторону сервера
function Delete_ship(name) {
    $.post("../php/Delete_ship_record.php", {id_ship: name.id}, function () {
    });
}

function Del_edit_param(){
    $('#id_Name_ship').val('');
    //Close input
    $('#id_Name_ship').prop('disabled', false);

    $('#id_Height_ship').val('');
    $('#id_Width_ship').val('');
    $('#id_Length_ship').val('');
    $('#id_year_start_ship').val('');
    $('#id_Lifting_capacity').val('');
    $('#id_Curb_weight').val('');
    $('#id_maximum_draft').val('');
    $('#id_Speed_ship').val('');
    $('#id_flag_ship').val('');
    $(".delete_input").remove();
    //Secret input
    $('#edit_ship').val('');

    //Select type ship
    $('#id_Type_ship').val('');

    //count ship engine
    $('#ship_engine_count').val('');
    $('#edit_ship').val('');
}

function Edit_ship(name){
    //alert("I'm work !!! "+name.id);
    $.post("../php/Edit_ship_record.php", {id_ship: name.id}, function (str) {
        $('#table_ships').html(str);
    });
}

    $.post("../php/View_ship.php", {}, function (str) {
        $('#table_ships').html(str);
    });
</script>
</body>
</html>