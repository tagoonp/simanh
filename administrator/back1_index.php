<?php
session_start();

include "../database/connect.class.php";
$db = new database();
$db->connect();

require ("../configuration/config.class.php");
$conf = new Config();
$prefix = $conf->getPrefix();
$sessionName = $conf->getSessionname();
$title = $conf->getAdminTitle();

include "../system/check_session.php";
include "../system/check_authen.php";

include "function/function.inc.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      <?php print $title; ?>
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
          <a class="logo" href="index.php">SIMANH</a>
          <!-- <form class="navbar-form form-inline col-lg-2 hidden-xs">
            <input class="form-control" placeholder="Search" type="text">
          </form> -->
        </div>
        <div class="container-fluid main-nav clearfix">
          <div class="nav-collapse">
            <ul class="nav">
              <li>
                <a class="current" href="index.php"><span aria-hidden="true" class="se7en-home"></span>Dashboard</a>
              </li>

              <li class="dropdown"><a data-toggle="dropdown" href="#">
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
                        <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">
                          <div class="caret pull-right"></div>
                          <span>Institute / Hospital</span></a>
                      </div>
                    </div>
                    <div class="panel-collapse collapse in" id="collapseTwo">
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
                                // $arr = explode(' ',$value['hos_name_en']);
                                print $value['hos_name_en'];
                                // print $arr[0];
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
          <!-- End row -->
        </div>
        <div class="col-lg-9">
          <div class="container-fluid main-content">
            <!-- Statistics -->
            <div class="page-title">
              <h1>
                Table of summary
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
                            Indicator
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
                          <th style="width: 80px; text-align:center;">
                            Total
                          </th>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="text-align: left;">
                              1. Total admitted
                            </td>
                            <?php
                            $summ = 0;
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                   //adm($db, $value['hos_id']);
                                  // $summ += adm2($db, $value['hos_id']);
                                  print adm($db, $value['hos_id']);
                                  ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php
                              // countaTotal($db, 0,1);
                              //print $summ;
                              countaTotal($db, 0,1);
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left;">
                              2. Total delivery (case)
                            </td>
                            <?php
                            $summ = 0;
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                  del($db, $value['hos_id']);
                                  $summ += del2($db, $value['hos_id']);
                                  ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php
                                //countaTotal($db, 0,2);
                                print $summ;
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left;">
                              3. Total births
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php  birth($db, $value['hos_id']); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php countaTotal($db, 0,3); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left;">
                              4. Total livebirth
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php  lbirth($db, $value['hos_id']); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php countaTotal($db, 0, 4); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left;">
                              5. Refer in
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php  referin($db, $value['hos_id']); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php getRefer($db, 'in'); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left;">
                              6. Refer out
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php  referout($db, $value['hos_id']); ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php getRefer($db, 'out'); ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <p>

                    </p>
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
                          <th style="width: 80px; text-align:center;">
                            Total
                          </th>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="text-align: left;">
                              1. Severe Preeclampsia/Eclampsia
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                  countcase($db, $value['hos_id'], 1);
                                  ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php countaTotal($db, 1, 1); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left;">
                              2. Postpartum hemorrhage
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                  countcase($db, $value['hos_id'], 2);
                                  ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php countaTotal($db, 1, 2); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left;">
                              3. Sepsis
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                  countcase($db, $value['hos_id'], 3);
                                  ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php countaTotal($db, 1, 3); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left;">
                              4. Obstructed labor
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                  countcase($db, $value['hos_id'], 4);
                                  ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php countaTotal($db, 1, 4); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left;">
                              5. Cesarean delivery
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                  countcase($db, $value['hos_id'], 5);
                                  ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;" style="color: #06c;">
                              <?php countaTotal($db, 1, 5); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left;">
                              6. Maternal death
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                  countcase($db, $value['hos_id'], 6);
                                  ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php countaTotal($db, 1, 6); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left;">
                              7. Preterm birth
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                  countcase($db, $value['hos_id'], 7);
                                  ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php countaTotal($db, 1, 7); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left;">
                              8. Low birth weight
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                  countcase($db, $value['hos_id'], 8);
                                  ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php countaTotal($db, 1, 8); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left;">
                              9. Stillbirth
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                  countcase($db, $value['hos_id'], 9);
                                  ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php countaTotal($db, 1, 9); ?>
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align: left;">
                              10. Neonatal death
                            </td>
                            <?php
                            if($resultHospital){
                              foreach($resultHospital as $value){
                                ?>
                                <td>
                                  <?php
                                  countcase($db, $value['hos_id'], 10);
                                  ?>
                                </td>
                                <?php
                              }
                            }
                            ?>
                            <td style="color: #06c;">
                              <?php countaTotal($db, 1, 10); ?>
                            </td>
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
</html>
