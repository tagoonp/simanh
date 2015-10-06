<?php
session_start();

include "../database/connect.class.php";
$db = new database();
$db->connect();

include "../system/check_session.php";
include "../system/check_authen.php";

include "function/function.inc.php";

$comp_id = 0;
$start = '2013-07-01';
$end = '2013-09-30';

if(isset($_GET['complication_id'])){
  if((intval($_GET['complication_id'])<1) && (intval($_GET['complication_id'])>10)){
    header('Location : 404-page.html');
    exit();
  }else{
    $comp_id = $_GET['complication_id'];
  }
}

if(isset($_GET['start'])){ $start = $_GET['start']; }
if(isset($_GET['end'])){ $end = $_GET['end']; }

$comArr = array('Severe Preeclampsia/Eclampsia','Postpartum hemorrhage','Sepsis','Obstructed labor','Cesarean delivery','Maternal death','Preterm birth','Low birth weight','Stillbirth','Neonatal death');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      SIMANH Thailand: Administrator
    </title>
    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/se7en-font.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/isotope.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/jquery.fancybox.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/fullcalendar.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/wizard.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/select2.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/morris.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/datatables.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/datepicker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/timepicker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/colorpicker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/bootstrap-switch.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/bootstrap-editable.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/daterange-picker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/typeahead.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/summernote.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/ladda-themeless.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/social-buttons.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/pygments.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/color/green.css" media="all" rel="alternate stylesheet" title="green-theme" type="text/css" />
    <link href="../stylesheets/color/orange.css" media="all" rel="alternate stylesheet" title="orange-theme" type="text/css" />
    <link href="../stylesheets/color/magenta.css" media="all" rel="alternate stylesheet" title="magenta-theme" type="text/css" />
    <link href="../stylesheets/color/gray.css" media="all" rel="alternate stylesheet" title="gray-theme" type="text/css" />
    <link href="../stylesheets/jquery.fileupload-ui.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/dropzone.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="../jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="../jquery/jquery-ui.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="../javascripts/raphael.min.js" type="text/javascript"></script>
    <script src="../javascripts/selectivizr-min.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="../javascripts/fullcalendar.min.js" type="text/javascript"></script>
    <script src="../javascripts/gcal.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../javascripts/datatable-editable.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.easy-pie-chart.js" type="text/javascript"></script>
    <script src="../javascripts/excanvas.min.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.isotope.min.js" type="text/javascript"></script>
    <script src="../javascripts/isotope_extras.js" type="text/javascript"></script>
    <script src="../javascripts/modernizr.custom.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="../javascripts/select2.js" type="text/javascript"></script>
    <script src="../javascripts/styleswitcher.js" type="text/javascript"></script>
    <script src="../javascripts/wysiwyg.js" type="text/javascript"></script>
    <script src="../javascripts/typeahead.js" type="text/javascript"></script>
    <script src="../javascripts/summernote.min.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.inputmask.min.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.validate.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap-fileupload.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap-timepicker.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap-colorpicker.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="../javascripts/typeahead.js" type="text/javascript"></script>
    <!-- <script src="../javascripts/spin.min.js" type="text/javascript"></script> -->
    <script src="../javascripts/ladda.min.js" type="text/javascript"></script>
    <script src="../javascripts/moment.js" type="text/javascript"></script>
    <script src="../javascripts/mockjax.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap-editable.min.js" type="text/javascript"></script>
    <script src="../javascripts/xeditable-demo-mock.js" type="text/javascript"></script>
    <script src="../javascripts/xeditable-demo.js" type="text/javascript"></script>
    <script src="../javascripts/daterange-picker.js" type="text/javascript"></script>
    <script src="../javascripts/date.js" type="text/javascript"></script>
    <script src="../javascripts/fitvids.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="../javascripts/dropzone.js" type="text/javascript"></script>
    <script src="../javascripts/main.js" type="text/javascript"></script>
    <script src="../javascripts/respond.js" type="text/javascript"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  </head>
  <body class="page-header-fixed bg-1">
    <div class="modal-shiftfix">
      <!-- Navigation -->
      <div class="navbar navbar-fixed-top scroll-hide">
        <div class="container-fluid top-bar">
          <div class="pull-right">
            <ul class="nav navbar-nav pull-right">
              <li class="dropdown user hidden-xs">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-user fa-2x"></i>&nbsp;&nbsp;&nbsp;John Smith<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="profile.php">
                    <i class="fa fa-user"></i>My Account</a>
                  </li>
                  <li><a href="change_password.php">
                    <i class="fa fa-gear"></i>Change password</a>
                  </li>
                  <li><a href="../signout.php">
                    <i class="fa fa-sign-out"></i>Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <button class="navbar-toggle"><span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.php">
            <div style="padding-top: 10px; font-size: 1.3em; text-align:center; color: #06c; padding-left: 120px;">
            <strong>SIMANH </strong>  <font color="#888" style="font-size: 1.0em; font-weight: light;">Thailand</font>
            </div>
          </a>
          <!-- <form class="navbar-form form-inline col-lg-2 hidden-xs">
            <input class="form-control" placeholder="Search" type="text">
          </form> -->
        </div>
        <div class="container-fluid main-nav clearfix">
          <div class="nav-collapse">
            <ul class="nav">
              <li>
                <a class="" href="index.php"><span aria-hidden="true" class="se7en-home"></span>Dashboard</a>
              </li>

              <li class="dropdown"><a data-toggle="dropdown" href="#" class="current">
                <span aria-hidden="true" class="se7en-tables"></span>Tables<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="complication.php">Complication statistics</a>
                  </li>
                  <li>
                    <a href="management.php">Management statistics</a>
                  </li>
                  <li>
                    <a href="anc.php">ANC statistics</a>
                  </li>
                </ul>
              </li>

              <li class="dropdown"><a data-toggle="dropdown" href="#">
                <span aria-hidden="true" class="se7en-charts"></span>Charts<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="graph_simple.php">Simple graph</a>
                  </li>
                  <li>
                    <a href="graph_advance.php">Advance graph</a>
                  </li>
                  </li>
                </ul>
              </li>
              <li>
                <a href="map.php"><span aria-hidden="true" class="se7en-flag"></span>Map</a>
              </li>
              <li>
                <a href="export.php"><span aria-hidden="true" class="se7en-pages"></span>Export</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="col-lg-3">
          <div class="page-title">
            <h1>
              Filter
            </h1>
          </div>
          <div class="row">
            <div class="widget-container fluid-height">
              <div class="widget-content">
                <div class="panel-group" id="accordion">
                  <div class="panel">
                    <div class="panel-heading">
                      <div class="panel-title">
                        <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse1">
                          <div class="caret pull-right"></div>
                          <span>Institute / Hospital</span></a>
                      </div>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse1">
                      <div class="panel-body">
                        <?php
                        $strSQL = "SELECT * FROM tb_hospital WHERE status = 1";
                        $resultHospital = $db->select($strSQL,false,true);
                        if($resultHospital){
                          foreach($resultHospital as $value){
                            ?>
                            <label class="checkbox">
                              <input type="checkbox" value="<?php print $value['hos_id']; ?>" class="hos_checkbox" checked="">
                              <span>
                                <?php
                                print $value['hos_name_en'];
                                ?></span>
                            </label>
                            <?php
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <p>
            &nbsp;
          </p>

                <div class="page-title">
                  <h1>
                    Report generater
                  </h1>
                </div>
                <div class="row">
                  <div class="widget-container fluid-height">
                    <div class="widget-content">
                      <div class="panel-group" id="accordion">
                        <div class="panel">
                          <div class="panel-heading">
                            <div class="panel-title">
                              <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse2">
                                <div class="caret pull-right"></div>
                                <span>Date period</span></a>
                            </div>
                          </div>
                          <div class="panel-collapse collapse in" id="collapse2">
                            <div class="panel-body">
                              <form action="#" class="form-horizontal">
                                <div class="form-group">
                                  <label class="control-label col-md-2">From</label>
                                  <div class="col-md-10">
                                    <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd">
                                      <input id="dateFrom" class="form-control" type="text" value="<?php print $start;?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span></input>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-2">To</label>
                                  <div class="col-md-10">
                                    <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd" >
                                      <input id="dateTo" class="form-control" type="text" value="<?php print $end;?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span></input>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="panel-group" id="accordion">
                        <div class="panel">
                          <div class="panel-heading">
                            <div class="panel-title">
                              <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse3">
                                <div class="caret pull-right"></div>
                                <span>Complications</span></a>
                            </div>
                          </div>
                          <div class="panel-collapse collapse in" id="collapse3">
                            <div class="panel-body">
                              <form action="#" class="form-horizontal">
                                <div class="form-group">
                                  <div class="col-md-12">
                                    <select class="select2able" id="complication">
                                      <option value="1" selected="selected">Severe Preeclampsia/Eclampsia </option>
                                      <option value="2" <?php if($comp_id==2){ print "selected"; } ?> >Postpartum hemorrhage</option>
                                      <option value="3" <?php if($comp_id==3){ print "selected"; } ?>  >Sepsis</option>
                                      <option value="4" <?php if($comp_id==4){ print "selected"; } ?>  >Obstructed labor</option>
                                      <option value="5" <?php if($comp_id==5){ print "selected"; } ?>  >Cesarean delivery</option>
                                      <option value="6" <?php if($comp_id==6){ print "selected"; } ?>  >Maternal death</option>
                                      <option value="7" <?php if($comp_id==7){ print "selected"; } ?>  >Preterm birth</option>
                                      <option value="8" <?php if($comp_id==8){ print "selected"; } ?>  >Low birth weight</option>
                                      <option value="9" <?php if($comp_id==9){ print "selected"; } ?>  >Stillbirth</option>
                                      <option value="10" <?php if($comp_id==10){ print "selected"; } ?>  >Neonatal death</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="widget-content padded">
                                  <button id="brnGenreport" class="btn btn-lg btn-block btn-primary"><i class="fa fa-table"></i>Generate report</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End -->
                    </div>
                  </div>
                </div>

              </div>
        <div class="col-lg-9">
          <div class="container-fluid main-content">
            <!-- Statistics -->
            <div class="page-title">
              <h1>
                Table of complication statistics
              </h1>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container stats-container  fluid-height clearfix">
                  <div class="widget-content padded clearfix">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <th style="width: 250px;">
                            Complication
                          </th>
                          <?php
                          $strSQL = "SELECT * FROM tb_hospital WHERE status = 1";
                          $resultHospital = $db->select($strSQL,false,true);
                          if($resultHospital){
                            foreach($resultHospital as $value){
                                  $arr = explode(' ',$value['hos_name_en']);
                                  print "<th style=text-align:center;>".$arr[0]."</th>";

                            }
                          }
                          ?>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="text-align: left;" colspan="<?php print sizeof($resultHospital);?>">
                              <strong>1. Severe Preeclampsia/Eclampsia</strong>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of complication
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php countcase($db, $value['hos_id'], 1); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of delivery
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php print del($db, $value['hos_id']); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right; vertical-align: text-top;" valign="top">
                              Percentage (%)
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                    $a = countcase2($db, $value['hos_id'], 1);
                                    $b = del($db, $value['hos_id']);
		                                calcaseComplication(intval($a),intval($b));?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: left;" colspan="<?php print sizeof($resultHospital);?>">
                              <strong>2. Postpartum hemorrhage</strong>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of complication
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php countcase($db, $value['hos_id'], 2); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of delivery
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php print del($db, $value['hos_id']); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right; vertical-align: text-top;" valign="top">
                              Percentage (%)
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                    $a = countcase2($db, $value['hos_id'], 2);
                                    $b = del($db, $value['hos_id']);
		                                calcaseComplication(intval($a),intval($b));?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: left;" colspan="<?php print sizeof($resultHospital);?>">
                              <strong>3. Sepsis</strong>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of complication
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php countcase($db, $value['hos_id'], 3); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of delivery
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php print del($db, $value['hos_id']); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right; vertical-align: text-top;" valign="top">
                              Percentage (%)
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                    $a = countcase2($db, $value['hos_id'], 3);
                                    $b = del($db, $value['hos_id']);
		                                calcaseComplication(intval($a),intval($b));?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: left;" colspan="<?php print sizeof($resultHospital);?>">
                              <strong>4. Obstructed labor</strong>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of complication
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php countcase($db, $value['hos_id'], 4); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of delivery
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php print del($db, $value['hos_id']); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right; vertical-align: text-top;" valign="top">
                              Percentage (%)
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                    $a = countcase2($db, $value['hos_id'], 4);
                                    $b = del($db, $value['hos_id']);
		                                calcaseComplication(intval($a),intval($b));?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: left;" colspan="<?php print sizeof($resultHospital);?>">
                              <strong>5. Cesarean delivery</strong>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of complication
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php countcase($db, $value['hos_id'], 5); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of delivery
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php print del($db, $value['hos_id']); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right; vertical-align: text-top;" valign="top">
                              Percentage (%)
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                    $a = countcase2($db, $value['hos_id'], 5);
                                    $b = del($db, $value['hos_id']);
		                                calcaseComplication(intval($a),intval($b));?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: left;" colspan="<?php print sizeof($resultHospital);?>">
                              <strong>6. Maternal death</strong>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of complication
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php countcase($db, $value['hos_id'], 6); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of livebirth
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php print lbirth($db, $value['hos_id']); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right; vertical-align: text-top;" valign="top">
                              Percentage (%)
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                    $a = countcase2($db, $value['hos_id'], 6);
                                    $b = lbirth($db, $value['hos_id']);
		                                calcaseComplication2(intval($a),intval($b));?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: left;" colspan="<?php print sizeof($resultHospital);?>">
                              <strong>7. Preterm birth</strong>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of complication
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php countcase($db, $value['hos_id'], 7); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of birth
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php print birth($db, $value['hos_id']); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right; vertical-align: text-top;" valign="top">
                              Percentage (%)
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                    $a = countcase2($db, $value['hos_id'], 7);
                                    $b = birth($db, $value['hos_id']);
		                                calcaseComplication(intval($a),intval($b));?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: left;" colspan="<?php print sizeof($resultHospital);?>">
                              <strong>8. Low birth weight</strong>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of complication
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php countcase($db, $value['hos_id'], 8); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of livebirth
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php print lbirth($db, $value['hos_id']); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right; vertical-align: text-top;" valign="top">
                              Percentage (%)
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                    $a = countcase2($db, $value['hos_id'], 8);
                                    $b = lbirth($db, $value['hos_id']);
		                                calcaseComplication(intval($a),intval($b));?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: left;" colspan="<?php print sizeof($resultHospital);?>">
                              <strong>9. Stillbirth</strong>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of complication
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php countcase($db, $value['hos_id'], 9); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of birth
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php print birth($db, $value['hos_id']); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right; vertical-align: text-top;" valign="top">
                              Percentage (%)
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                    $a = countcase2($db, $value['hos_id'], 9);
                                    $b = birth($db, $value['hos_id']);
		                                calcaseComplication3(intval($a),intval($b));?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: left;" colspan="<?php print sizeof($resultHospital);?>">
                              <strong>10. Neonatal death</strong>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of complication
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php countcase($db, $value['hos_id'], 10); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right;">
                              n of livebirth
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php print lbirth($db, $value['hos_id']); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                          <tr>
                            <td style="text-align: right; vertical-align: text-top;" valign="top">
                              Percentage (%)
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                    $a = countcase2($db, $value['hos_id'], 10);
                                    $b = lbirth($db, $value['hos_id']);
		                                calcaseComplication3(intval($a),intval($b));?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Statistics -->
          </div>
        </div>
        <!-- Statistics -->


      </div>


    </div>
    <div class="style-selector">
      <div class="style-selector-container">
        <h2>
          Layout Style
        </h2>
        <select name="layout"><option value="fluid">Fluid</option><option value="boxed">Boxed</option></select>
        <h2>
          Navigation Style
        </h2>
        <select name="nav"><option value="top">Top</option><option value="left">Left</option></select>
        <h2>
          Color Options
        </h2>
        <ul class="color-options clearfix">
          <li>
            <a class="blue" href="javascript:chooseStyle('none', 30)"></a>
          </li>
          <li>
            <a class="green" href="javascript:chooseStyle('green-theme', 30)"></a>
          </li>
          <li>
            <a class="orange" href="javascript:chooseStyle('orange-theme', 30)"></a>
          </li>
          <li>
            <a class="magenta" href="javascript:chooseStyle('magenta-theme', 30)"></a>
          </li>
          <li>
            <a class="gray" href="javascript:chooseStyle('gray-theme', 30)"></a>
          </li>
        </ul>
        <h2>
          Background Patterns
        </h2>
        <ul class="pattern-options clearfix">
          <li>
            <a class="active" href="#" id="bg-1"></a>
          </li>
          <li>
            <a href="#" id="bg-2"></a>
          </li>
          <li>
            <a href="#" id="bg-3"></a>
          </li>
          <li>
            <a href="#" id="bg-4"></a>
          </li>
          <li>
            <a href="#" id="bg-5"></a>
          </li>
        </ul>
        <div class="style-toggle closed">
          <span aria-hidden="true" class="se7en-gear"></span>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">
    $(function(){
      $('#brnGenreport').click(function(){

        var check = 0;
        $('.input-group').removeClass('has-error');

        if(($('#dateFrom').val()=='') || ($('#dateFrom').val()=='0000-00-00')){
          $('#dateFrom').addClass('has-error');
          check++;
        }else{
          $('#dateFrom').removeClass('has-error');
        }

        if(($('#dateTo').val()=='') || ($('#dateTo').val()=='0000-00-00')){
          $('#dateTo').addClass('has-error');
          check++;
        }else{
          $('#dateTo').removeClass('has-error');
        }

        var start = $('#dateFrom').val().split("-");
        var end = $('#dateTo').val().split("-");

        var startDate = new Date(start[0], start[1], start[2]);
        var endDate = new Date(end[0], end[1], end[2]);

        if (startDate > endDate) {
        	$('.input-group').addClass('has-error');
          check++;
        }

        if(check==0){
          window.location = 'complication_report.php?complication_id=' + $('#complication').val() + '&start=' + $('#dateFrom').val() + '&end=' + $('#dateTo').val();
        }
        return false;
      });
    });
  </script>
</html>
