<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Проект</title>

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
                    <a class="btn btn-primary" data-toggle="modal" data-target="#usuario"><i class="fa fa-fw -square -circle fa-plus-square"></i>Добавить корабль</a>
                </div>
            </div>
        </div>
    </div>

    <!-- search -->
    <div class="section">
        <div class="container">
            <div class="row" >
                <div class="col-md-13 well" >
                    <input id="search" name="search_naem" class="form-group" placeholder="Поиск" type="text" required="" >	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;
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
                                        <input id="prependedtext" name="Name_ship" class="form-control" placeholder="Имя корабля" type="text" required="">
                                    </div>
                                </div>
                            </div>
                            <!-- telephone text-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nombre">Высота корабля</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input id="nombre" name="Height_ship" class="form-control" placeholder="Высота корабля в метрах" type="text" required="">
                                    </div>
                                </div>
                            </div>
                            <!-- position -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nombre">Ширина корабля</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input id="position" name="Width_ship" class="form-control" placeholder="Ширина корабля в метрах" type="text" required="">
                                    </div>
                                </div>
                            </div>
                            <!-- Appended Input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for=''>Длина корабля</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input id="email_police" name="Length_ship" class="form-control" placeholder="Длина корабля в метрах" type="text" required="">
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

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="departamento">Тип корабля</label>
                                <div class="col-md-5">
                                    <select id="departamento" name="Type_ship" class="form-control">
                                        <option value="Сухогруз">Сухогруз</option>
                                        <option value="Танкер">Танкер</option>
                                        <option value="Балкер">Балкер</option>
                                        <option value="Транспортное судно">Транспортное судно</option>
                                        <option value="Контейнеровоз">Контейнеровоз</option>
                                    </select>
                                </div>
                            </div>
                            <!-- File Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for=""> Фото корабля:</label>
                                <div class="col-md-7">
                                     <input name="photo_new_ship" multiple type="file" />
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


    $.post("../php/View_ship.php", {}, function (str) {
        $('#table_ships').html(str);
    });
</script>
</body>
</html>