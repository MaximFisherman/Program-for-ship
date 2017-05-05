<?php
include("../Clasess/Class_ship.php");
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

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../vendor/font-awesome/scss/_icons.scss">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
    img {
    display: block;
    height: auto;
    max-width: 100%;
    }
</style>
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
                <a class="navbar-brand name_ship" id="Id_ship_name" href="index.html">Name ship</a>
            </div>
            <!-- /.navbar-header -->
            <div class="nav navbar-top-links navbar-right">
                <form class="form-horizontal" action="../php/Exit_php.php" method="post" enctype="multipart/form-data" >
                    <!--<input type="submit" class="btn btn-warning" value="Выйти из меню корабля">-->
                    <button type="submit">
                        <img src="../Style/logout.png">
                    </button>
                </form>
            </div>

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
                            <a href="Rezult_scaffoding.php?view=yes"><i class="fa fa-bar-chart-o fa-fw"></i> Cостояние судна</a>
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
                    <h1 class="page-header">Технические данные судна</h1>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img src="../Style/sea-ship-with-containers.png">
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge length_ship"></div>
                                            <div>Длина судна</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-arrows-h fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge width_ship"></div>
                                            <div>Ширина судна</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-arrows-v fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge height_ship"></div>
                                        <div>Высота судна</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img src="../Style/Ship.png">
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge max_draft_ship"></div>
                                            <div>Осадка судна</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img src="../Style/seventeen.png">
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge year_build_ship"></div>
                                            <div>Год постройки</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="panel  panel-warning">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img src="../Style/carts.png">
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge curb_weight_ship"></div>
                                            <div>Снаряженный вес</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img src="../Style/weight.png">
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge max_cargo_ship"></div>
                                            <div>Грузоподьемность</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img src="../Style/browser.png">
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge type_ship"></div>
                                            <div>Тип судна</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="panel panel-primary" align="justify" >
                                <center>
                                <div>
                                    <h1 class="name_ship"></h1>
                                </div>
                                </center>
                                <div class="" style="margin: 10px;">
                                    Описание корабля
                                </div>
                            </div>
                        </div>

                        <!-- image ship -->
                        <div class="col-lg-6 col-md-6">
                            <div class="" align="justify">
                                <img src="../Style/Ship/Ship_ccv-175.jpg" class="photo_ship img-rounded img-responsive" height="500" width="800">
                            </div>
                        </div>

                    </div>



                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
    </div>

<!-- Аякс передача параметров -->
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>
<?php
$ship= new Ship();
if (isset($_GET['name_ship']))
    $_SESSION['Name_ship']=$_GET['name_ship'];

$ship->View_ship_characteristics($_SESSION['Name_ship']);


?>