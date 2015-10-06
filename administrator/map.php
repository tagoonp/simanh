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

// include "function/function.inc.php";

$graph_stage = 0;
$complication = 0;
$start = '2013-07-01';
$end = date('Y-m-d');
$hos = '';

if((isset($_GET['complication_id'])) && (isset($_GET['start'])) && (isset($_GET['end']))){
  $complication = $_GET['complication_id'];
  $start = $_GET['start'];
  $end =  $_GET['end'];
}else{
  if($graph_stage!=0){
    header('Location: 500-page.php?prev=graph_simple.php');
    exit();
  }
}

if(isset($_GET['complication_id'])){
  if((intval($_GET['complication_id'])<1) && (intval($_GET['complication_id'])>15)){
    header('Location: 404-page.html');
    exit();
  }
}


if(isset($_GET['graph'])){
  $graph_stage = $_GET['graph'];
}



?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      <?php print $title; ?>
    </title>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-SZAM-RXhUZwzGuo2dX15s8UYZX-kUtw&sensor=true"></script>
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
    <link href="../libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <script type="text/javascript" src="../libraries/fusioncharts/js/fusioncharts.js"></script>
    <script type="text/javascript" src="../libraries/fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>
    <script src="../libraries/map/markerclusterer.js" language="javascript"></script>
    <script type="text/javascript">
    var HttPRequest = false;
    var atmittedArr = [];
    var deliveryArr = [];
    var birthArr = [];
    var livebirthArr = [];
    var bounds = bounds = new google.maps.LatLngBounds();
    var markers = [];
    var beachMarker;
    var redpin = 'img/r_marker.png';
    var yellowpin = 'img/y_marker.png';
    var greenpin = 'img/g_marker.png';
    var GGM;
    var infowindow=[];
    var infowindowTmp;
    var s;
    var a;
    var centerBase = new google.maps.LatLng(7.013838,100.465679);
    var markersArray1 = [];
    var markersArray2 = [];
    var markersArray3 = [];
    var next;
    var count = 0;
    var first;
    var rounds = 0;
    var marker;
    var toggle = 0;
    </script>

    <!--  -->
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
        </div>
        <div class="container-fluid main-nav clearfix">
          <div class="nav-collapse">
            <ul class="nav">
              <li>
                <a class="" href="index.php"><span aria-hidden="true" class="se7en-home"></span>Dashboard</a>
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
                <a href="map.php" class="current"><span aria-hidden="true" class="se7en-flag"></span>Map</a>
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
          <!-- <p style="padding-top: 9px;">
          </p> -->

                <div class="page-title">
                  <h1>
                    Map generater
                  </h1>
                </div>
                <div class="row">
                  <div class="widget-container fluid-height">
                    <div class="panel-group" id="accordion">
                      <div class="panel">
                        <div class="panel-heading">
                          <div class="panel-title">
                            <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse3">
                              <div class="caret pull-right"></div>
                              <span>Filters</span></a>
                          </div>
                        </div>
                        <div class="panel-collapse collapse in" id="collapse3">
                          <div class="panel-body">
                            <form action="#" class="form-horizontal">
                              <div class="form-group">
                                <div class="col-md-12">
                                  Indicators
                                </div>
                                <div class="col-md-12">
                                  <select class="select2able" id="complication">
                                    <optgroup label="Common indicator">
                                      <option value="0" select >Admitted</option>
                                      <option value="1" <?php if($complication==1){ print "selected"; } ?>>Delivery</option>
                                      <option value="2" <?php if($complication==2){ print "selected"; } ?>>Birth</option>
                                      <option value="3" <?php if($complication==3){ print "selected"; } ?>>Livebirth</option>
                                    </optgroup>
                                    <optgroup label="Complication">
                                      <option value="4" <?php if($complication==4){ print "selected"; } ?>>Severe Preeclampsia/Eclampsia </option>
                                      <option value="5" <?php if($complication==5){ print "selected"; } ?>>Postpartum hemorrhage</option>
                                      <option value="6" <?php if($complication==6){ print "selected"; } ?>>Sepsis</option>
                                      <option value="7" <?php if($complication==7){ print "selected"; } ?>>Obstructed labor</option>
                                      <option value="8" <?php if($complication==8){ print "selected"; } ?>>Cesarean delivery</option>
                                      <option value="9" <?php if($complication==9){ print "selected"; } ?>>Maternal death</option>
                                      <option value="10" <?php if($complication==10){ print "selected"; } ?>>Preterm birth</option>
                                      <option value="11" <?php if($complication==11){ print "selected"; } ?>>Low birth weight</option>
                                      <option value="12" <?php if($complication==10){ print "selected"; } ?>>Stillbirth</option>
                                      <option value="13" <?php if($complication==13){ print "selected"; } ?>>Neonatal death</option>
                                    </optgroup>
                                  </select>
                                </div>

                              </div>
                              <div class="form-group" id="req2">
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
                              <div class="widget-content padded">
                                <button id="brnGenreport" class="btn btn-lg btn-block btn-primary"><i class="fa fa-table"></i>Generate graph</button>
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

              <!-- </div>
            </div> -->
          <!-- </div> -->
          <!-- End row -->
        <!-- </div> -->
        <div class="col-lg-9">

          <div class="container-fluid main-content">
            <!-- Statistics -->
            <div class="page-title">
              <h1>
                <?php LabelOverlay($complication); ?> overlay
              </h1>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container stats-container  fluid-height clearfix">
                  <div class="widget-content padded clearfix">
                    <div class="" id="map-canvas" style="text-align:center; color: #ccc; height: 500px;;">
                      <i class="fa fa-bar-chart fa-5x" ></i>
                      <br>
                      <span style="font-size: 30px;">No graph result</span>
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

  </body>
  <script>
    var initialLocation;
    var map ;
    function initialize() {
        var myLatlng = new google.maps.LatLng(7.001741,100.480903);
      	var myOptions = {
        	zoom: 9,
    		center: myLatlng,
    		mapTypeControl: false,
        	mapTypeId: google.maps.MapTypeId.ROADMAP
      	};

    	window.map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
      callCoordination(<?php print $complication;?>);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
  <script type="text/javascript">
  function callCoordination(con){
      var coor = "";
      $.post("php/callCoordination.php",{condition:con},function(data){
          for(var i=0;i<data.length;i++){
            var latLng = new google.maps.LatLng(data[i].loc_lat,data[i].loc_lng);
            var marker = new google.maps.Marker({
                position: latLng,
              map: window.map,
                icon: coor
              });
            atmittedArr.push(marker);
          }
          atmittedCluster = new MarkerClusterer(map, atmittedArr);
      },'json');
  }
  </script>
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
          window.location = 'map.php?complication_id=' + $('#complication').val() + '&start=' + $('#dateFrom').val() + '&end=' + $('#dateTo').val();
        }
        return false;
      });


    });

  </script>
</html>
<?php
function LabelOverlay($complication){
  $comArr = array('Admitted', 'Delivery', 'Birth', 'Livebirth','Severe Preeclampsia/Eclampsia','Postpartum hemorrhage', 'Sepsis', 'Obstructed labor', 'Cesarean delivery', 'Maternal death', 'Preterm birth', 'Low birth weight', 'Stillbirth', 'Neonatal death');
  print $comArr[$complication];
}
?>
