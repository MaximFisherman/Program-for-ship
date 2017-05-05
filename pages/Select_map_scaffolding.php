<?php
require_once "../Clasess/Class_logic.php";
require_once "../Clasess/Class_ship.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>StopKorrozia</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">


    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../vendor/font-awesome/scss/_icons.scss">



    <!-- map on the desk -->
    <script type="text/javascript" src="../Library/mapper/cvi_map_lib.js"></script>
    <script type="text/javascript" src="../Library/mapper/mapper.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand name_ship" id="Id_ship_name" href="index.php"></a>
        </div>
        <div class="nav navbar-top-links navbar-right">
            <form class="form-horizontal" action="../php/Exit_php.php" method="post" enctype="multipart/form-data" >
                <!--<input type="submit" class="btn btn-warning" value="Выйти из меню корабля">-->
                <button type="submit">
                    <img src="../Style/logout.png">
                </button>
            </form>
        </div>
        <!-- /.navbar-header -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Технические данные судна</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Прогнозирование состояния судна<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="Scaffolding_on_ship.php">Добавить рейс</a>
                            </li>
                            <li>
                                <a href="Resource_of_exploitation.php">Ресурс эксплуатации</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="Rezult_scaffoding.php?view=yes"><i class="fa fa-bar-chart-o fa-fw"></i>Cостояние судна</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->

        </div>
        <!-- /.navbar-static-side -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form"> Меню
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- jQuery -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Отметка на карте <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Reference"><i class="glyphicon glyphicon-info-sign"></i></a></h1>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <form class="form-horizontal" action="Rezult_scaffoding.php?add_param=1" method="post" enctype="multipart/form-data" >
                                <input type="submit" onclick="add_param();" class="btn btn-primary" value="Потвердить" id="result" disabled="disabled">
                                <input type="hidden" id="Rezult_page" name="rezult_val" value="">
                                <input type="hidden" id="Speed_page" name="speed_val" value="">
                                <input type="hidden" id="id_mass_cargo" name="mass_cargo" value="">
                            </form>
                        </div>
                        <div class="panel-heading">
                            <div id="1_del">
                            <canvas id='1' class="del" width="1600" height="500"></canvas><br><input type="button" class="btn btn-primary clearClass" value="Очистить" id="1_clear" disabled="disabled"> <br><br>
                            </div>
                            <div id="2_del">
                            <canvas id='2' width="1600" height="100">Обновите браузер</canvas><br><input type="button" class="btn btn-primary clearClass" value="Очистить" id="2_clear" disabled="disabled"> <br><br><br>
                            </div>
                            <div id="3_del">
                            <canvas id='3' width="750" height="200">Обновите браузер</canvas><br><input type="button" class="btn btn-primary clearClass" value="Очистить" id="3_clear" disabled="disabled"> <br><br>
                            </div>
                            <div id="4_del">
                            <canvas id='4' width="1600" height="500">Обновите браузер</canvas><br><input type="button" class="btn btn-primary clearClass" value="Очистить" id="4_clear" disabled="disabled"> <br><br>
                            </div>
                            <div id="5_del">
                            <canvas id='5' width="1600" height="250">Обновите браузер</canvas><br><input type="button" class="btn btn-primary clearClass" value="Очистить" id="5_clear" disabled="disabled"> <br><br>
                            </div>
                            <div id="6_del">
                            <canvas id='6' width="1600" height="200">Обновите браузер</canvas><br><input type="button" class="btn btn-primary clearClass" value="Очистить" id="6_clear" disabled="disabled"> <br><br>
                            </div>
                            <div id="7_del">
                                <canvas id='7' width="1600" height="350">Обновите браузер</canvas><br><input type="button" class="btn btn-primary clearClass" value="Очистить" id="7_clear" disabled="disabled"> <br><br>
                            </div>
                            <div id="8_del">
                            <canvas id='8' width="500" height="100">Обновите браузер</canvas><br><input type="button" class="btn btn-primary clearClass" value="Очистить" id="8_clear" disabled="disabled"> <br><br>
                            </div>
                            <div id="9_del">
                            <canvas id='9' width="1600" height="200">Обновите браузер</canvas><br><input type="button" class="btn btn-primary clearClass" value="Очистить" id="9_clear" disabled="disabled"> <br><br>
                            </div>
                            <div id="10_del">
                            <canvas id='10' width="1600" height="150">Обновите браузер</canvas><br><input type="button" class="btn btn-primary clearClass" value="Очистить" id="10_clear" disabled="disabled"> <br><br>
                            </div>
                            <div id="11_del">
                            <canvas id='11' width="1600" height="500">Обновите браузер</canvas><br><input type="button" class="btn btn-primary clearClass" value="Очистить" id="11_clear" disabled="disabled"> <br><br>
                            </div>
                            <script>

                                var check = 0;

                                var str_rezult="";
                                var kol1="1";
                                var canvas1=document.getElementById('1');
                                var ctx1 = canvas1.getContext('2d');
                                //ctx.moveTo(0,0);
                                 // толщина линии
                                ctx1.lineWidth = 3;
                                canvas1.onclick = function () {
                                    kol1+="2";
                                    if(kol1.length==2){
                                        ctx1.moveTo(event.offsetX,event.offsetY);
                                        getCoordinate(event.offsetX,event.offsetY);

                                        ctx1.arc(event.offsetX, event.offsetY, 4, 0, Math.PI*2, false);
                                        ctx1.fillStyle = 'red';
                                        ctx1.fill();
                                        ctx1.stroke();
                                    }else {
                                        var x = event.offsetX;
                                        var y = event.offsetY;
                                        ctx1.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx1.lineTo(x, y); //рисуем линию
                                        ctx1.stroke();
                                        check+=1;
                                            $('#1_clear').removeAttr("disabled");
                                            $('#result').removeAttr("disabled");
                                        getCoordinate(event.offsetX,event.offsetY);
                                    }
                                };

                                var kol2="1";
                                var canvas2=document.getElementById('2');
                                var ctx2 = canvas2.getContext('2d');
                                //ctx.moveTo(0,0);
                                ctx2.lineWidth = 3; // толщина линии

                                canvas2.onclick = function () {
                                    kol2+="2";
                                    if(kol2.length==2){
                                        ctx2.moveTo(event.offsetX,event.offsetY);
                                        getCoordinate_2(event.offsetX,event.offsetY);
                                        ctx2.arc(event.offsetX, event.offsetY, 5, 0, Math.PI*2, false);
                                        ctx2.fillStyle = 'red';
                                        ctx2.fill();
                                        ctx2.stroke();
                                    }else {
                                        var x = event.offsetX;
                                        var y = event.offsetY;
                                        ctx2.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx2.lineTo(x, y); //рисуем линию
                                        ctx2.stroke();
                                        check+=1;
                                            $('#2_clear').removeAttr("disabled");
                                            $('#result').removeAttr("disabled");
                                        getCoordinate_2(event.offsetX,event.offsetY);
                                    }
                                };

                                var kol3="1";
                                var canvas3=document.getElementById('3');
                                var ctx3 = canvas2.getContext('2d');
                                //ctx.moveTo(0,0);
                                ctx3.lineWidth = 3; // толщина линии

                                canvas3.onclick = function () {
                                    kol3+="2";
                                    if(kol3.length==2){
                                        ctx3.moveTo(event.offsetX,event.offsetY);
                                        getCoordinate_3(event.offsetX,event.offsetY);
                                        ctx3.arc(event.offsetX, event.offsetY, 5, 0, Math.PI*2, false);
                                        ctx3.fillStyle = 'red';
                                        ctx3.fill();
                                        ctx3.stroke();
                                    }else {
                                        var x = event.offsetX;
                                        var y = event.offsetY;
                                        ctx3.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx3.lineTo(x, y); //рисуем линию
                                        ctx3.stroke();
                                        check += 1;
                                        $('#3_clear').removeAttr("disabled");
                                        $('#result').removeAttr("disabled");
                                        getCoordinate_3(event.offsetX,event.offsetY);
                                    }
                                };


                                var kol4="1";
                                var canvas4=document.getElementById('4');
                                var ctx4 = canvas4.getContext('2d');
                                //ctx.moveTo(0,0);
                                ctx4.lineWidth = 3; // толщина линии

                                canvas4.onclick = function () {
                                    kol4+="2";
                                    if(kol4.length==2){
                                        ctx4.moveTo(event.offsetX,event.offsetY);
                                        getCoordinate_4(event.offsetX,event.offsetY);
                                        ctx4.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx4.arc(event.offsetX, event.offsetY, 5, 0, Math.PI*2, false);
                                        ctx4.fillStyle = 'red';
                                        ctx4.fill();
                                        ctx4.stroke();
                                    }else {
                                        var x = event.offsetX;
                                        var y = event.offsetY;
                                        ctx4.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx4.lineTo(x, y); //рисуем линию
                                        ctx4.stroke();
                                        check+=1;
                                            $('#4_clear').removeAttr("disabled");
                                            $('#result').removeAttr("disabled");
                                        getCoordinate_4(event.offsetX,event.offsetY);
                                    }
                                };

                                var kol5="1";
                                var canvas5=document.getElementById('5');
                                var ctx5 = canvas5.getContext('2d');
                                //ctx.moveTo(0,0);
                                ctx5.lineWidth = 3; // толщина линии

                                canvas5.onclick = function () {
                                    kol5+="2";
                                    if(kol5.length==2){
                                        ctx5.moveTo(event.offsetX,event.offsetY);
                                        getCoordinate_5(event.offsetX,event.offsetY);
                                        ctx5.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx5.arc(event.offsetX, event.offsetY, 5, 0, Math.PI*2, false);
                                        ctx5.fillStyle = 'red';
                                        ctx5.fill();
                                        ctx5.stroke();
                                    }else {
                                        var x = event.offsetX;
                                        var y = event.offsetY;
                                        ctx5.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx5.lineTo(x, y); //рисуем линию
                                        ctx5.stroke();
                                        check+=1;
                                            $('#5_clear').removeAttr("disabled");
                                            $('#result').removeAttr("disabled");
                                        getCoordinate_5(event.offsetX,event.offsetY);
                                    }
                                };

                                var kol6="1";
                                var canvas6=document.getElementById('6');
                                var ctx6 = canvas6.getContext('2d');
                                //ctx.moveTo(0,0);
                                ctx6.lineWidth = 3; // толщина линии

                                canvas6.onclick = function () {
                                    kol6+="2";
                                    if(kol6.length==2){
                                        ctx6.moveTo(event.offsetX,event.offsetY);
                                        getCoordinate_6(event.offsetX,event.offsetY);
                                        ctx6.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx6.fillStyle = 'red';
                                        ctx6.fill();
                                        ctx6.stroke();
                                    }else {
                                        var x = event.offsetX;
                                        var y = event.offsetY;
                                        ctx6.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx6.lineTo(x, y); //рисуем линию
                                        ctx6.stroke();
                                        check+=1;
                                        $('#6_clear').removeAttr("disabled");
                                        $('#result').removeAttr("disabled")
                                        getCoordinate_6(event.offsetX,event.offsetY);
                                    }
                                };

                                var kol7="1";
                                var canvas7=document.getElementById('7');
                                var ctx7 = canvas7.getContext('2d');
                                //ctx.moveTo(0,0);
                                ctx7.lineWidth = 3; // толщина линии

                                canvas7.onclick = function () {
                                    kol7+="2";
                                    if(kol7.length==2){
                                        ctx7.moveTo(event.offsetX,event.offsetY);
                                        getCoordinate_7(event.offsetX,event.offsetY);
                                        ctx7.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx7.arc(event.offsetX, event.offsetY, 5, 0, Math.PI*2, false);
                                        ctx7.fillStyle = 'red';
                                        ctx7.fill();
                                        ctx7.stroke();
                                    }else {
                                        var x = event.offsetX;
                                        var y = event.offsetY;
                                        ctx7.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx7.lineTo(x, y); //рисуем линию
                                        ctx7.stroke();
                                        check+=1;
                                            $('#7_clear').removeAttr("disabled");
                                            $('#result').removeAttr("disabled");
                                        getCoordinate_7(event.offsetX,event.offsetY);
                                    }
                                };


                                var kol8="1";
                                var canvas8=document.getElementById('8');
                                var ctx8 = canvas8.getContext('2d');
                                //ctx.moveTo(0,0);
                                ctx8.lineWidth = 3; // толщина линии

                                canvas8.onclick = function () {
                                    kol8+="2";
                                    if(kol8.length==2){
                                        ctx8.moveTo(event.offsetX,event.offsetY);
                                        getCoordinate_8(event.offsetX,event.offsetY);
                                        ctx8.arc(event.offsetX, event.offsetY, 5, 0, Math.PI*2, false);
                                        ctx8.fillStyle = 'red';
                                        ctx8.fill();
                                        ctx8.stroke();
                                    }else {
                                        var x = event.offsetX;
                                        var y = event.offsetY;
                                        ctx8.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx8.lineTo(x, y); //рисуем линию
                                        ctx8.stroke();
                                        check+=1;
                                            $('#8_clear').removeAttr("disabled");
                                            $('#result').removeAttr("disabled");
                                        getCoordinate_8(event.offsetX,event.offsetY);
                                    }
                                };

                                var kol9="1";
                                var canvas9=document.getElementById('9');
                                var ctx9 = canvas9.getContext('2d');
                                //ctx.moveTo(0,0);
                                ctx9.lineWidth = 3; // толщина линии

                                canvas9.onclick = function () {
                                    kol9+="2";
                                    if(kol9.length==2){
                                        ctx9.moveTo(event.offsetX,event.offsetY);
                                        getCoordinate_9(event.offsetX,event.offsetY);
                                        ctx9.arc(event.offsetX, event.offsetY, 5, 0, Math.PI*2, false);
                                        ctx9.fillStyle = 'red';
                                        ctx9.fill();
                                        ctx9.stroke();
                                    }else {
                                        var x = event.offsetX;
                                        var y = event.offsetY;
                                        ctx9.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx9.lineTo(x, y); //рисуем линию
                                        ctx9.stroke();
                                        check+=1;
                                            $('#9_clear').removeAttr("disabled");
                                            $('#result').removeAttr("disabled");
                                        getCoordinate_9(event.offsetX,event.offsetY);
                                    }
                                };

                                var kol10="1";
                                var canvas10=document.getElementById('10');
                                var ctx10 = canvas10.getContext('2d');
                                //ctx.moveTo(0,0);
                                ctx10.lineWidth = 3; // толщина линии

                                canvas10.onclick = function () {
                                    kol10+="2";
                                    if(kol10.length==2){
                                        ctx10.moveTo(event.offsetX,event.offsetY);
                                        getCoordinate_10(event.offsetX,event.offsetY);
                                        ctx10.arc(event.offsetX, event.offsetY, 5, 0, Math.PI*2, false);
                                        ctx10.fillStyle = 'red';
                                        ctx10.fill();
                                        ctx10.stroke();
                                    }else {
                                        var x = event.offsetX;
                                        var y = event.offsetY;
                                        ctx10.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx10.lineTo(x, y); //рисуем линию
                                        ctx10.stroke();
                                        check+=1;
                                            $('#10_clear').removeAttr("disabled");
                                            $('#result').removeAttr("disabled");
                                        getCoordinate_10(event.offsetX,event.offsetY);
                                    }
                                };

                                var kol11="1";
                                var canvas11=document.getElementById('11');
                                var ctx11 = canvas11.getContext('2d');
                                //ctx.moveTo(0,0);
                                ctx11.lineWidth = 3; // толщина линии

                                canvas11.onclick = function () {
                                    kol11+="2";
                                    if(kol11.length==2){
                                        ctx11.moveTo(event.offsetX,event.offsetY);
                                        getCoordinate_11(event.offsetX,event.offsetY);
                                        ctx11.arc(event.offsetX, event.offsetY, 5, 0, Math.PI*2, false);
                                        ctx11.fillStyle = 'red';
                                        ctx11.fill();
                                        ctx11.stroke();
                                    }else {
                                        var x = event.offsetX;
                                        var y = event.offsetY;
                                        ctx11.arc(event.offsetX, event.offsetY, 2, 0, Math.PI*2, false);
                                        ctx11.lineTo(x, y); //рисуем линию
                                        ctx11.stroke();
                                        check+=1;
                                            $('#11_clear').removeAttr("disabled");
                                            $('#result').removeAttr("disabled");
                                        getCoordinate_11(event.offsetX,event.offsetY);
                                    }
                                };
                            </script>

                            <script>
                                var mas_x_1=[];
                                var mas_y_1=[];
                                var str_rezult_1="";
                                var str_rezult_2="";
                                var str_rezult_3="";
                                var str_rezult_4="";
                                var str_rezult_5="";
                                var str_rezult_6="";
                                var str_rezult_7="";
                                var str_rezult_8="";
                                var str_rezult_9="";
                                var str_rezult_10="";
                                var str_rezult_11="";

                                var count =0;
                                function getCoordinate(x,y){
                                    mas_x_1.push(x);
                                    mas_y_1.push(y);
                                    if(count>=1) {
                                        var x1 = mas_x_1.pop();
                                        var x2 = mas_x_1.pop();//Меняем местами так как х1 до х2 в стеке
                                        var save_last_x = x2;
                                        var a = x1;
                                        x1 = x2;
                                        x2 = a;
                                        mas_x_1.push(save_last_x);


                                        var y1 = mas_y_1.pop();
                                        var y2 = mas_y_1.pop();//Меняем местами так как y1 до y2 в стеке
                                        var save_last_y = y2;
                                        var a1 = y1;
                                        y1 = y2;
                                        y2 = a1;
                                        mas_y_1.push(save_last_y);

                                        //Корень х
                                        var sqrt_x = Math.pow((x2 - x1), 2);
                                        var sqrt_y = Math.pow((y2 - y1), 2);
                                        var length = Math.sqrt(sqrt_x + sqrt_y);
                                        var res = length * 0.02636;
                                        res= res / 3;
                                        res = res * 2000;
                                        str_rezult_1="1%"+res+"|";
                                    }
                                    count +=1;
                                }


                                var mas_x_2=[];
                                var mas_y_2=[];
                                var count_2 =0;
                                function getCoordinate_2(x,y){
                                    mas_x_2.push(x);
                                    mas_y_2.push(y);
                                    if(count_2>=1) {
                                        var x1 = mas_x_2.pop();
                                        var x2 = mas_x_2.pop();//Меняем местами так как х1 до х2 в стеке
                                        var save_last_x = x2;
                                        var a = x1;
                                        x1 = x2;
                                        x2 = a;
                                        mas_x_2.push(save_last_x);


                                        var y1 = mas_y_2.pop();
                                        var y2 = mas_y_2.pop();//Меняем местами так как y1 до y2 в стеке
                                        var save_last_y = y2;
                                        var a1 = y1;
                                        y1 = y2;
                                        y2 = a1;
                                        mas_y_2.push(save_last_y);

                                        //Корень х
                                        var sqrt_x = Math.pow((x2 - x1), 2);
                                        var sqrt_y = Math.pow((y2 - y1), 2);
                                        var length = Math.sqrt(sqrt_x + sqrt_y);
                                        var res = length * 0.02636;
                                        res= res / 3;
                                        res = (res * 2000)-80;
                                        str_rezult_2="2%"+res+"|";
                                    }
                                    count_2 +=1;
                                }


                                var mas_x_3=[];
                                var mas_y_3=[];
                                var count_3 =0;
                                function getCoordinate_3(x,y){
                                    mas_x_3.push(x);
                                    mas_y_3.push(y);
                                    if(count_3>=1) {
                                        var x1 = mas_x_3.pop();
                                        var x2 = mas_x_3.pop();//Меняем местами так как х1 до х2 в стеке
                                        var save_last_x = x2;
                                        var a = x1;
                                        x1 = x2;
                                        x2 = a;
                                        mas_x_3.push(save_last_x);


                                        var y1 = mas_y_3.pop();
                                        var y2 = mas_y_3.pop();//Меняем местами так как y1 до y2 в стеке
                                        var save_last_y = y2;
                                        var a1 = y1;
                                        y1 = y2;
                                        y2 = a1;
                                        mas_y_3.push(save_last_y);

                                        //Корень х
                                        var sqrt_x = Math.pow((x2 - x1), 2);
                                        var sqrt_y = Math.pow((y2 - y1), 2);
                                        var length = Math.sqrt(sqrt_x + sqrt_y);
                                        var res = length * 0.02636;
                                        res= res / 3;
                                        res = (res * 2000)-80;
                                        str_rezult_3="3%"+res+"|";
                                    }
                                    count_3 +=1;
                                }

                                var mas_x_4=[];
                                var mas_y_4=[];
                                var count_4 =0;
                                function getCoordinate_4(x,y){
                                    mas_x_4.push(x);
                                    mas_y_4.push(y);
                                    if(count_4>=1) {
                                        var x1 = mas_x_4.pop();
                                        var x2 = mas_x_4.pop();//Меняем местами так как х1 до х2 в стеке
                                        var save_last_x = x2;
                                        var a = x1;
                                        x1 = x2;
                                        x2 = a;
                                        mas_x_4.push(save_last_x);


                                        var y1 = mas_y_4.pop();
                                        var y2 = mas_y_4.pop();//Меняем местами так как y1 до y2 в стеке
                                        var save_last_y = y2;
                                        var a1 = y1;
                                        y1 = y2;
                                        y2 = a1;
                                        mas_y_4.push(save_last_y);

                                        //Корень х
                                        var sqrt_x = Math.pow((x2 - x1), 2);
                                        var sqrt_y = Math.pow((y2 - y1), 2);
                                        var length = Math.sqrt(sqrt_x + sqrt_y);
                                        var res = length * 0.02636;
                                        res= res / 3;
                                        res = (res * 2000)+200;
                                        str_rezult_4="4%"+res+"|";
                                    }
                                    count_4 +=1;
                                }

                                var mas_x_5=[];
                                var mas_y_5=[];
                                var count_5 =0;
                                function getCoordinate_5(x,y){
                                    mas_x_5.push(x);
                                    mas_y_5.push(y);
                                    if(count_5>=1) {
                                        var x1 = mas_x_5.pop();
                                        var x2 = mas_x_5.pop();//Меняем местами так как х1 до х2 в стеке
                                        var save_last_x = x2;
                                        var a = x1;
                                        x1 = x2;
                                        x2 = a;
                                        mas_x_5.push(save_last_x);


                                        var y1 = mas_y_5.pop();
                                        var y2 = mas_y_5.pop();//Меняем местами так как y1 до y2 в стеке
                                        var save_last_y = y2;
                                        var a1 = y1;
                                        y1 = y2;
                                        y2 = a1;
                                        mas_y_5.push(save_last_y);

                                        //Корень х
                                        var sqrt_x = Math.pow((x2 - x1), 2);
                                        var sqrt_y = Math.pow((y2 - y1), 2);
                                        var length = Math.sqrt(sqrt_x + sqrt_y);
                                        var res = length * 0.02636;
                                        res= res / 3;
                                        res = (res * 2000)-80;
                                        str_rezult_5="5%"+res+"|";
                                    }
                                    count_5 +=1;
                                }

                                var mas_x_6=[];
                                var mas_y_6=[];
                                var count_6 =0;
                                function getCoordinate_6(x,y){
                                    mas_x_6.push(x);
                                    mas_y_6.push(y);
                                    if(count_6>=1) {
                                        var x1 = mas_x_6.pop();
                                        var x2 = mas_x_6.pop();//Меняем местами так как х1 до х2 в стеке
                                        var save_last_x = x2;
                                        var a = x1;
                                        x1 = x2;
                                        x2 = a;
                                        mas_x_6.push(save_last_x);


                                        var y1 = mas_y_6.pop();
                                        var y2 = mas_y_6.pop();//Меняем местами так как y1 до y2 в стеке
                                        var save_last_y = y2;
                                        var a1 = y1;
                                        y1 = y2;
                                        y2 = a1;
                                        mas_y_6.push(save_last_y);

                                        //Корень х
                                        var sqrt_x = Math.pow((x2 - x1), 2);
                                        var sqrt_y = Math.pow((y2 - y1), 2);
                                        var length = Math.sqrt(sqrt_x + sqrt_y);
                                        var res = length * 0.02636;
                                        res= res / 3;
                                        res = (res * 2000)-700;
                                        str_rezult_6="6%"+res+"|";
                                    }
                                    count_6 +=1;
                                }

                                var mas_x_7=[];
                                var mas_y_7=[];
                                var count_7 =0;
                                function getCoordinate_7(x,y){
                                    mas_x_7.push(x);
                                    mas_y_7.push(y);
                                    if(count_7>=1) {
                                        var x1 = mas_x_7.pop();
                                        var x2 = mas_x_7.pop();//Меняем местами так как х1 до х2 в стеке
                                        var save_last_x = x2;
                                        var a = x1;
                                        x1 = x2;
                                        x2 = a;
                                        mas_x_7.push(save_last_x);


                                        var y1 = mas_y_7.pop();
                                        var y2 = mas_y_7.pop();//Меняем местами так как y1 до y2 в стеке
                                        var save_last_y = y2;
                                        var a1 = y1;
                                        y1 = y2;
                                        y2 = a1;
                                        mas_y_7.push(save_last_y);

                                        //Корень х
                                        var sqrt_x = Math.pow((x2 - x1), 2);
                                        var sqrt_y = Math.pow((y2 - y1), 2);
                                        var length = Math.sqrt(sqrt_x + sqrt_y);
                                        var res = length * 0.02636;
                                        res= res / 3;
                                        res = (res * 2000)+200;
                                        str_rezult_7="7%"+res+"|";
                                    }
                                    count_7 +=1;
                                }

                                var mas_x_8=[];
                                var mas_y_8=[];
                                var count_8 =0;
                                function getCoordinate_8(x,y){
                                    mas_x_8.push(x);
                                    mas_y_8.push(y);
                                    if(count_8>=1) {
                                        var x1 = mas_x_8.pop();
                                        var x2 = mas_x_8.pop();//Меняем местами так как х1 до х2 в стеке
                                        var save_last_x = x2;
                                        var a = x1;
                                        x1 = x2;
                                        x2 = a;
                                        mas_x_8.push(save_last_x);


                                        var y1 = mas_y_8.pop();
                                        var y2 = mas_y_8.pop();//Меняем местами так как y1 до y2 в стеке
                                        var save_last_y = y2;
                                        var a1 = y1;
                                        y1 = y2;
                                        y2 = a1;
                                        mas_y_8.push(save_last_y);

                                        //Корень х
                                        var sqrt_x = Math.pow((x2 - x1), 2);
                                        var sqrt_y = Math.pow((y2 - y1), 2);
                                        var length = Math.sqrt(sqrt_x + sqrt_y);
                                        var res = length * 0.02636;
                                        res= res / 3;
                                        res = (res * 2000)-80;
                                        str_rezult_8="8%"+res+"|";
                                    }
                                    count_8 +=1;
                                }

                                var mas_x_9=[];
                                var mas_y_9=[];
                                var count_9 =0;
                                function getCoordinate_9(x,y){
                                    mas_x_9.push(x);
                                    mas_y_9.push(y);
                                    if(count_9>=1) {
                                        var x1 = mas_x_9.pop();
                                        var x2 = mas_x_9.pop();//Меняем местами так как х1 до х2 в стеке
                                        var save_last_x = x2;
                                        var a = x1;
                                        x1 = x2;
                                        x2 = a;
                                        mas_x_9.push(save_last_x);


                                        var y1 = mas_y_9.pop();
                                        var y2 = mas_y_9.pop();//Меняем местами так как y1 до y2 в стеке
                                        var save_last_y = y2;
                                        var a1 = y1;
                                        y1 = y2;
                                        y2 = a1;
                                        mas_y_9.push(save_last_y);

                                        //Корень х
                                        var sqrt_x = Math.pow((x2 - x1), 2);
                                        var sqrt_y = Math.pow((y2 - y1), 2);
                                        var length = Math.sqrt(sqrt_x + sqrt_y);
                                        var res = length * 0.02636;
                                        res= res / 3;
                                        res = (res * 2000)-80;
                                        str_rezult_9="9%"+res+"|";
                                    }
                                    count_9 +=1;
                                }

                                var mas_x_10=[];
                                var mas_y_10=[];
                                var count_10 =0;
                                function getCoordinate_10(x,y){
                                    mas_x_10.push(x);
                                    mas_y_10.push(y);
                                    if(count_10>=1) {
                                        var x1 = mas_x_10.pop();
                                        var x2 = mas_x_10.pop();//Меняем местами так как х1 до х2 в стеке
                                        var save_last_x = x2;
                                        var a = x1;
                                        x1 = x2;
                                        x2 = a;
                                        mas_x_10.push(save_last_x);


                                        var y1 = mas_y_10.pop();
                                        var y2 = mas_y_10.pop();//Меняем местами так как y1 до y2 в стеке
                                        var save_last_y = y2;
                                        var a1 = y1;
                                        y1 = y2;
                                        y2 = a1;
                                        mas_y_10.push(save_last_y);

                                        //Корень х
                                        var sqrt_x = Math.pow((x2 - x1), 2);
                                        var sqrt_y = Math.pow((y2 - y1), 2);
                                        var length = Math.sqrt(sqrt_x + sqrt_y);
                                        var res = length * 0.02636;
                                        res= res / 3;
                                        res = (res * 2000)-80;
                                        str_rezult_10="10%"+res+"|";
                                    }
                                    count_10 +=1;
                                }

                                var mas_x_11=[];
                                var mas_y_11=[];
                                var count_11 =0;
                                function getCoordinate_11(x,y){
                                    mas_x_11.push(x);
                                    mas_y_11.push(y);
                                    if(count_11>=1) {
                                        var x1 = mas_x_11.pop();
                                        var x2 = mas_x_11.pop();//Меняем местами так как х1 до х2 в стеке
                                        var save_last_x = x2;
                                        var a = x1;
                                        x1 = x2;
                                        x2 = a;
                                        mas_x_11.push(save_last_x);


                                        var y1 = mas_y_11.pop();
                                        var y2 = mas_y_11.pop();//Меняем местами так как y1 до y2 в стеке
                                        var save_last_y = y2;
                                        var a1 = y1;
                                        y1 = y2;
                                        y2 = a1;
                                        mas_y_11.push(save_last_y);

                                        //Корень х
                                        var sqrt_x = Math.pow((x2 - x1), 2);
                                        var sqrt_y = Math.pow((y2 - y1), 2);
                                        var length = Math.sqrt(sqrt_x + sqrt_y);
                                        var res = length * 0.02636;
                                        res= res / 3;
                                        res = (res * 2000)-2000;
                                        str_rezult_11="11%"+res+"|";
                                    }
                                    count_11 +=1;
                                }

                                function add_param(){
                                    str_rezult+=str_rezult_1+str_rezult_2+str_rezult_3+str_rezult_4+str_rezult_5+str_rezult_6+str_rezult_7+str_rezult_8+str_rezult_9+str_rezult_10+str_rezult_11;
                                    $('#Rezult_page').val(str_rezult);
                                }

                            </script>
                        </div>
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div id="result"></div>
<script>

</script>




<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>



<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>






<!-- Modal window add new resource -->
<div class="fade modal" id="Reference">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Справка по функции, "прогнозирование количества наростов"</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="../php/Add_new_resource.php" method="post" enctype="multipart/form-data" >
                    <fieldset>
                        <!-- Form Name -->
                        <p>
                           На картах отметьте приблизительную траекторию движения корабля
                        </p>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
echo("
<script>           
            $('#Speed_page').val('".$_POST['speed_ship']."');
             $('#id_mass_cargo').val('".$_POST['mass_cargo']."');
</script>
");
$logic = new Logic();
$logic->View_peace_map($_POST['name_layer']);
$logic->Clear_map_slice();

$_SESSION['kol_vx_add']=0;//Счетчик количества вхождений для сстраницы результата
$ship= new Ship();
$ship->View_ship_characteristics($_SESSION['Name_ship']);
?>