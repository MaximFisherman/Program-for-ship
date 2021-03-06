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

    <!-- Morris chart -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

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
                <span class="sr-only">StopKorrozia</span>
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
                        <a href="#"><i class="fa fa-table fa-fw"></i>Прогнозирование состояния корабля<span class="fa arrow"></span></a>
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
                        <a href="Rezult_scaffoding.php?view=yes"><i class="fa fa-bar-chart-o fa-fw"></i> Cостояние корабля</a>
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
                <h1 class="page-header">Эффекты оказываемые на корабль <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Reference"><i class="glyphicon glyphicon-info-sign"></i></a></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Падение эффективности корабля <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Effective_ship"><i class="glyphicon glyphicon-info-sign"></i></a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="morris-donut-chart"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Диаграмма количества наростов по рейсам <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Narost_on_ship"><i class="glyphicon glyphicon-info-sign"></i></a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="morris-bar-chart"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>


            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Диаграмма затрата топлива по рейсам <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Coast_oil_ship"><i class="glyphicon glyphicon-info-sign"></i></a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="Line-chart"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Диаграмма пройденого пути по рейсам <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Km_way_ship"><i class="glyphicon glyphicon-info-sign"></i></a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="morris-bar-chart-km"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Диаграмма коррозийности по рейсам <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Down_effective"><i class="glyphicon glyphicon-info-sign"></i></a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="Line-chart-corrosion"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
<script>
</script>

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
                <h4 class="modal-title" id="myModalLabel">Справка по функции, "Статистика корабля"</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="../php/Add_new_resource.php" method="post" enctype="multipart/form-data" >
                    <fieldset>
                        <!-- Form Name -->
                        <p>
                            На этих диаграммах показаны все эффекты которые будут оказанны на корабль при прохождении заданых рейсов
                        </p>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

            <!-- Modal window add new resource -->
<div class="fade modal" id="Down_effective">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Справка по диаграмме "коррозия корабля"</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="../php/Add_new_resource.php" method="post" enctype="multipart/form-data" >
                                <fieldset>
                                    <!-- Form Name -->
                                    <p>
                                       Диаграмма которая показывает количество металла которое будет уничтожено за рейс на корабле, расчет ведется по стандартной формуле
                                        v=Δm / S•t, где <br>

                                        v — скорость коррозии, которую обычно выражают в таких единицах: г/(м2•ч) или мг/(см2•сут);<br>

                                        Δm — убыль (увеличение) массы;<br>

                                        S — площадь поверхности;<br>

                                        t — время.<br>
                                    </p>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
</div>


            <!-- Modal window add new resource -->
            <div class="fade modal" id="Km_way_ship">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Справка по диаграмме "пройденого пути по рейсам"</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="../php/Add_new_resource.php" method="post" enctype="multipart/form-data" >
                                <fieldset>
                                    <!-- Form Name -->
                                    <p>
                                        Диаграмма которая показывает количество пройденого пути в км. расспределенного по рейсам.
                                    </p>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal window add new resource -->
            <div class="fade modal" id="Coast_oil_ship">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Справка по диаграмме "Затраченое топливо"</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="../php/Add_new_resource.php" method="post" enctype="multipart/form-data" >
                                <fieldset>
                                    <!-- Form Name -->
                                    <p>
                                        Диаграмма которая показывает количество затреченного топлива, расспределеного по рейсам.
                                    </p>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal window add new resource -->
            <div class="fade modal" id="Narost_on_ship">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Справка по диаграмме "Количество наростов на корпусе"</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="../php/Add_new_resource.php" method="post" enctype="multipart/form-data" >
                                <fieldset>
                                    <!-- Form Name -->
                                    <p>
                                        Данная диаграмма показывает количество наростов на корпусе корабля.
                                    </p>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal window add new resource -->
            <div class="fade modal" id="Effective_ship">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Справка по диаграмме "Падение скорости"</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="../php/Add_new_resource.php" method="post" enctype="multipart/form-data" >
                                <fieldset>
                                    <!-- Form Name -->
                                    <p>
                                        Данная диаграмма показывает на сколько падает скорость корабля.<br>
                                        1 узел  = 1,852 км/ч (1 морская миля в час) или 0,514 м/с
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
echo("<script>                                     
</script>");
$logic = new Logic();

$_SESSION['kol_vx_add']+=1;

if($_SESSION['kol_vx_add']==1){
    $logic->calculation($_POST['rezult_val'],$_POST['mass_cargo']);
}

$logic->view_statistic();


$ship= new Ship();
$ship->View_ship_characteristics($_SESSION['Name_ship']);
?>