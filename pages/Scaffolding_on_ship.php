<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Состояние судна<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="Corrosion_control.php">Контроль за коррозией</a>
                            </li>
                            <li>
                                <a href="Scaffolding_on_ship.php">Контроль нароста на корпусе</a>
                            </li>
                            <li>
                                <a href="Resource_of_exploitation.php">Ресурс эксплуатации</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
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
                <h1 class="page-header">Контроль нароста на корпусе <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Reference"><i class="glyphicon glyphicon-info-sign"></i></a></h1>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Средняя скорость корабля: <input name="speed_ship" type="text" class="form-horizontal">

                            <form class="form-horizontal" action="Select_map_scaffolding.php" method="post" enctype="multipart/form-data" >
                            <input type="submit" value="Принять" id="save_param_button" class="btn btn-primary" onclick="save_param();" disabled="disabled">
                                <input type="hidden" id="param_layer" name="name_layer">
                                <input type="hidden" id="param_speed_ship" name="speed_ship">
                            </form>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <img class="mapper" id="image" src="../File/vectorworldmap.jpg" usemap="#myMap" width="1000" height="683" />
                            <map name="myMap" id="myMap">
                                <area shape="poly" href="#<10 - 1"    id="cold_water_1" onclick="getid(this);"  class="border icolor007FFF" coords="455,206,315,186,291,154,289,132,297,114,283,98,278,76,257,57,248,47,249,34,250,22,251,13,258,4,266,6,300,31,334,143,352,143,356,130,366,118,386,101,404,87,408,65,418,37,420,23,421,8,444,7,477,3,502,2,511,19,521,18,530,14,537,10,541,6,558,7,583,6,633,9,656,8,721,7,753,4,793,5,828,6,884,6,940,7,989,8,991,49,991,84,951,78,921,74,892,70,881,62,858,61,832,63,825,52,806,52,790,45,787,36,784,26,769,18,758,8,742,20,709,38,685,54,654,58,647,80,624,89,602,92,582,97,569,93,563,88,551,78,534,80,516,89,484,138,484,156,488,173,485,181,477,192,475,187,472,183,471,179,462,160,454,160,450,168,447,176,440,186" class="{fill:true,fillColor:'00ff00',fillOpacity:0.4,stroke:true,strokeColor:'330066',strokeOpacity:0.8,strokeWidth:1}" />
                                <area shape="poly" href="#>10<18 - 2" id="warm_water_2" onclick="getid(this);"  class="border icolorbfff00" coords="316,188,459,210,460,225,446,226,443,233,441,241,442,247,451,250,455,253,465,253,472,244,474,236,483,230,491,225,500,231,509,241,519,240,507,222,514,229,525,243,534,253,537,242,541,238,550,230,553,222,555,218,558,217,571,218,585,235,564,234,548,234,547,251,561,254,557,266,535,265,522,267,516,266,472,253,462,258,448,260,305,218,297,218,289,214" class="{fill:true,fillColor:'00ff00',fillOpacity:0.4,stroke:true,strokeColor:'330066',strokeOpacity:0.8,strokeWidth:1}" />
                                <area shape="poly" href="#>18 - 3 "    id="hot_water_3" onclick="getid(this);"   class="border icolor8B0000" coords="292,221,244,269,251,286,243,288,232,278,210,278,202,286,205,306,219,310,228,312,238,324,249,336,262,330,278,329,296,329,311,342,326,351,336,361,351,366,372,376,366,392,362,403,353,420,341,429,333,435,333,445,355,453,393,460,461,462,518,459,514,443,504,423,500,410,506,395,501,376,488,361,488,352,479,345,465,347,444,346,422,324,422,307,422,296,446,263" class="{fill:true,fillColor:'00ff00',fillOpacity:0.4,stroke:true,strokeColor:'330066',strokeOpacity:0.8,strokeWidth:1}" />
                                <area shape="poly" href="#>18 - 4"    id="hot_water_4" onclick="getid(this);"   class="border icolor8B0000" coords="551,455,569,423,580,397,581,378,596,355,607,335,613,319,594,328,627,308,640,290,660,295,667,311,675,326,682,339,699,345,693,322,702,315,710,304,720,302,734,313,757,331,771,329,764,306,772,300,786,298,802,282,810,273,804,257,816,250,818,264,832,257,827,237,843,230,857,214,900,216,945,226,978,228,997,232,995,416,882,412,871,397,862,390,856,405,842,391,831,394,825,399,801,411,788,420,784,433,791,448,792,460" class="{fill:true,fillColor:'00ff00',fillOpacity:0.4,stroke:true,strokeColor:'330066',strokeOpacity:0.8,strokeWidth:1}" />
                                <area shape="poly" href="#>10<18 - 5" id="warm_water_5" onclick="getid(this);" class="border icolorbfff00"coords="884,416,994,422,991,545,902,533,856,520,814,522,757,526,697,522,636,522,574,525,514,535,456,531,383,537,340,542,302,541,286,532,287,520,290,498,304,485,330,456,414,463,448,464,486,467,544,464,555,457,610,462,788,463,811,461,827,454,842,459,853,469,866,482,887,478,889,461,896,442" class="{fill:true,fillColor:'00ff00',fillOpacity:0.4,stroke:true,strokeColor:'330066',strokeOpacity:0.8,strokeWidth:1}" />
                                <area shape="poly" href="#>10<18 -6" id="warm_water_6" onclick="getid(this);"  class="border icolorbfff00" coords="859,209,905,211,943,223,994,226,997,120,988,127,976,118,968,123,970,137,958,141,942,152,928,156,920,171,917,183,908,196,900,193,900,172,916,154,906,139,896,156,879,155,863,158,854,172,860,188" class="{fill:true,fillColor:'00ff00',fillOpacity:0.4,stroke:true,strokeColor:'330066',strokeOpacity:0.8,strokeWidth:1}" />
                                <area shape="poly" href="#>18 -7 "    id="hot_water_7" onclick="getid(this);"  class="border icolor8B0000" coords="143,269,9,268,4,272,3,281,3,337,4,385,6,466,5,489,31,486,55,478,99,475,132,474,170,473,227,477,264,478,272,413,253,398,243,379,252,341,237,336,220,326,185,312,154,274" class="{fill:true,fillColor:'00ff00',fillOpacity:0.4,stroke:true,strokeColor:'330066',strokeOpacity:0.8,strokeWidth:1}" />
                                <area shape="poly" href="#>10<18 -8" id="warm_water_8" onclick="getid(this);"  class="icolorbfff00" coords="258,515,262,482,57,481,38,488,20,491,4,492,3,514,6,537,255,525" class="{fill:true,fillColor:'00ff00',fillOpacity:0.4,stroke:true,strokeColor:'330066',strokeOpacity:0.8,strokeWidth:1}" />
                                <area shape="poly" href="#<10 -9 "    id="cold_water_9" onclick="getid(this);"  class="border icolor007FFF" coords="5,542,2,672,85,678,116,665,134,662,167,670,183,650,203,648,219,656,250,654,261,637,267,629,306,588,304,628,304,656,304,675,397,681,415,657,450,635,488,628,536,628,608,608,656,614,692,609,715,600,760,598,798,600,840,598,887,614,920,630,946,646,934,672,996,673,996,552,911,535,857,524,628,525,520,539,455,536,380,543,331,544,279,550,252,529" class="{fill:true,fillColor:'00ff00',fillOpacity:0.4,stroke:true,strokeColor:'330066',strokeOpacity:0.8,strokeWidth:1}" />
                                <area shape="poly" href="#>10<18 -10 " id="warm_water_10" onclick="getid(this);" class="icolorbfff00" coords="142,266,8,262,8,252,5,226,118,219,124,245" class="{fill:true,fillColor:'00ff00',fillOpacity:0.4,stroke:true,strokeColor:'330066',strokeOpacity:0.8,strokeWidth:1}" />
                                <area shape="poly" href="#<10 - 11"    id="cold_water_11" onclick="getid(this);"  class="border icolor007FFF" coords="120,214,5,223,4,5,186,1,231,3,249,20,248,35,247,46,259,66,272,76,279,99,291,113,283,135,282,152,256,134,254,163,248,183,213,158,221,132,238,111,241,94,232,88,210,91,177,96,150,96,129,83,108,83,92,87,64,80,39,77,10,94,17,111,19,126,29,145,39,161,60,151,82,159,100,173,126,207" class="{fill:true,fillColor:'00ff00',fillOpacity:0.4,stroke:true,strokeColor:'330066',strokeOpacity:0.8,strokeWidth:1}" />
                            </map>
                        </div>
                    </div>

                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div id="result"></div>
<script>
    var str = "";
    function getid(name){
        str+=name.id+"%";
        $('#save_param_button').removeAttr("disabled");
    }

    function save_param(){
        var speed_ship_name = $('input[name=speed_ship]').val();
        $('#param_layer').val(str);
        $('#param_speed_ship').val(speed_ship_name);
    }
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
                        Для прогнозирования количества наростов на корабле за периуд рейса, необходмо ввести данные в поле "ориентеровочное время рейса" время рейса (в часах),
                        на карте необходимо сделать пометку через какие зоны будет пролягать путь корабля
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
include("../Clasess/Class_ship.php");
$ship= new Ship();
//$ship->View_ship_characteristics($_SESSION['Name_ship']);
?>