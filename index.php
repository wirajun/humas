<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Humas BPS | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <script src="https://code.highcharts.com/highcharts.js"></script>
    </head>
	
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                HUMAS BPS
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Wira Junardi <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar5.png" class="img-circle" alt="User Image" />
                                    <p>
                                       Wira Junardi - 23219054
                                        <small>Layanan Teknologi Indormasi - ITB</small>
                                    </p>
                                </li>
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar5.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Wira - 23219054</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/widgets.html">
                                <i class="fa fa-fw fa-info-circle"></i> <span>Tentang</span>
                            </a>
                        </li>                      
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					<?php 
					$url = 'https://andalancahayasejahtera.com/berita/v1/all_news.php?token=83b5e86a3695cc30202ee2566d9e7adb';
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					$output = curl_exec($ch);
					$data_array = json_decode($output,true);
                    curl_close($ch);

                    //hitug berita
                    foreach($data_array as $i=>$ii){
                        $a[$i]=$ii['sumber'];  
                    }
                    $counted = array_count_values($a);
                    arsort($counted);
                    $most_frequent = key($counted);
                    $occurences = reset($counted);                   
                    //var_dump ($counted);
                    //$popular = array_slice(array_keys($counted), 0, 5, true);                    
                    //$new_arr = array_keys($counted);
                    //echo $new_arr[1];

                    //tgl berita
                    foreach($data_array as $i=>$ii){
                        $b[$i]=$ii['tanggal'];  
                    }
                    $tanggal = array_count_values($b);
                    asort($tanggal);
                    //print_r($tanggal); 
                    //echo json_encode($tanggal);

					?>
	
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <sup style="font-size: 20px">Total Berita</sup>
                                    </h3>
                                    <p>
                                       <b><?php echo count($data_array); ?></b> postingan
                                    </p>
                                </div> 
								<div class="icon">
                                    <i class="ion ion-speedometer"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <sup style="font-size: 20px">Berita Terupdate</sup>
                                    </h3>
                                    <p >
                                        <?php $text = substr($data_array[0]['header'], 0, 31 ); 
                                                echo $text;?>...
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-social-twitter"></i>
                                </div>
                                <a href="<?php echo $data_array[0]['link']?>
                                    " target="_blank" class="small-box-footer"> selengkapnya
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <sup style="font-size: 20px">Top Kontributor</sup>
                                    </h3>
                                    <p>
                                        <?php echo $most_frequent; ?> - 
                                        <b><?php echo $occurences; ?></b> Berita
                                    </p>
                                </div>
								<div class="icon">
                                    <i class="ion ion-star"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                     <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <sup style="font-size: 20px">Sumber Berita</sup>
                                    </h3>
                                    <p>
                                        <b><?php echo count($counted)-1; ?></b> Situs Berita
                                    </p>
                                </div>
								<div class="icon">
                                    <i class="ion-ios7-world"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-12 connectedSortable">
                            
                        </div><!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-6 connectedSortable"> 
                            <!-- Box (with bar chart) -->
                            <div class="box box-danger" id="loading-example">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>                                       
                                    </div><!-- /. tools -->
                                    <i class="fa fa-bar-chart-o"></i>

                                    <h3 class="box-title">Grafik Berita</h3>
                                </div><!-- /.box-header -->
                                
                                <div id="container" class="box-footer" style="height: 370px; width: 90%;">
                                    <script>
                                    Highcharts.setOptions({
                                        global: {
                                            useUTC: false
                                        }
                                    });
                                    var chart = Highcharts.chart('container', {
                                        title: {
                                            text: 'Jumlah Berita per Tanggal'
                                        },
                                        xAxis: {
                                            type: 'date',
                                            title: {
                                                text: 'Tanggal'
                                            },
                                            categories: [
                                                <?php foreach($tanggal as $key => $value) {  
                                                    echo '"'.$key.'",';
                                                } ?>
                                            ]
                                        },
                                        yAxis: {
                                            title: {
                                                text: 'Jumlah Berita'
                                            },
                                            maxZoom: 1
                                        },
                                        plotOptions: {
                                            series: {
                                                allowPointSelect: true
                                            }
                                        },
                                        series: [{
                                            data: [
                                                <?php echo implode (", ", $tanggal); ?>
                                            ]
                                        }]
                                    });
                                    </script>
                                </div><!-- /.box-footer -->
                            </div><!-- /.box -->        

                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-6 connectedSortable">
                            <!-- Map box -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">                                                                                
                                        <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                                    </div><!-- /. tools -->
                                    <i class="fa fa-laptop"></i>
                                    <h3 class="box-title">
                                        Kontributor
                                    </h3>
                                </div>
                                <div class="box-body no-padding">                                   
                                    <div class="table-responsive">
                                        <!-- .table - Uses sparkline charts-->
                                        <table class="table table-striped">                                        
                                            <tr>
                                                <th>Situs</th>                                               
                                                <th>Jumlah Postingan</th>
                                            </tr>                                                                                      
                                            <?php
                                            $rows = 0;
                                            foreach ($counted as $situs => $jlh){
                                                //echo $situs.$jlh;
                                                if($rows >= 9) break;?>
                                                <tr>
                                                <td><?php echo $situs; ?></td>
                                                <td><?php echo $jlh; ?></td>
                                                </tr>
                                                <?php
                                                $rows++;
                                            }
                                            ?>                                           
                                        </table><!-- /.table -->
                                    </div>
                                </div><!-- /.box-body-->                               
                            </div>                                                                                                   
                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->
                </section><!-- /.content -->
				
				<section class="content">
					<!-- Berita -->
                            <div class="box box-warning">
                                <div class="box-header">
									<i class="fa fa-fw fa-list-alt"></i>
                                    <h3 class="box-title">
                                        Daftar Berita
                                    </h3>								
                                </div>                               
                                    <div class="box-body table-responsive">
                                        <!-- .table - Uses sparkline charts-->
                                        <table id="table_id" class="table table-bordered table-striped">
                                            <thead>                                        
                                            <tr>
                                                <th>No</th> 
                                                <th>Judul</th>                                               
                                                <th>Sumber</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>                                    
                                            <?php 
                                            $counter = 1;     
                                            foreach ($data_array as $row) { ?> 
                                                <tbody>                                     
                                                <tr>
                                                    <td width="5%"><?php echo $counter; ?></td>
                                                    <td width="65%"><?php echo $row['header']; ?></td>
                                                    <td width="10%"><?php echo $row['sumber']; ?></td>
                                                    <td width="10%"><?php echo $row['tanggal']; ?></td>
                                                    <td width="10%"><a href="<?php echo $row['link'];?>
                                                        "target="_blank" class="small-box-footer">link</a></td>
                                                </tr> 
                                                </tbody>                                      
                                            <?php 
                                                $counter++;
                                            }  ?>
                                        </table>
                                    </div>                                
                            </div><!-- /.box -->
				</section>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
                               
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <!-- page script -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css"> 
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

        <script type="text/javascript">
            $(document).ready( function () {
                $('#table_id').DataTable();
            } );
        </script>
    </body>
</html>