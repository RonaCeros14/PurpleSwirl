<?php
	session_start();
	// incwluding the database connection file
	include_once("connectionString.php");


	if(isset($_POST['btnUpdateItem']))
	{	
		$varcharItemID = mysqli_real_escape_string($connect, $_POST['id']);
		$varcharItemName = mysqli_real_escape_string($connect, $_POST['txtbxItemName']);
		$varcharItemDescription= mysqli_real_escape_string($connect, $_POST['txtbxItemDescription']);
		$varcharItemMeasurement = mysqli_real_escape_string($connect, $_POST['txtbxItemMeasurement']);
		$doubleItemQuantity = mysqli_real_escape_string($connect, $_POST['txtbxItemQuantity']);
	
		// checking empty fields
		if(empty($varcharItemName))
		{
			$message = "Name field is empty!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
		else if(empty($varcharItemMeasurement))
		{
			$message = "Measurement field is empty!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else if(empty($varcharItemQuantity))
		{
			$message = "Quantity field is empty!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else 
		{	
			//updating the table
			$queryEditItem = "UPDATE tbl_itemlist SET itemName='$varcharItemName',itemDescription='$varcharItemDescription', measurement='$varcharItemMeasurement',quantity='$doubleItemQuantity' WHERE itemID = $varcharItemID";
			if(mysqli_query($connect, $queryEditItem))
			{
				$message = "Item updated successfully!";
            	echo "<script type='text/javascript'>alert('$message');</script>";
            	//redirectig to the display page. In our case, it is index.php
				echo "<script type='text/javascript'>location.href = 'itemStock.php';</script>";
			}
		}
	}
?>
<?php
//getting id from url
$id = $_GET['id'];
//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM tbl_itemlist WHERE itemID = $id");

while($res = mysqli_fetch_array($result))
{
	$txtbxItemName = $res['itemName'];
	$txtbxItemDescription = $res['itemDescription'];
	$txtbxItemMeasurement = $res['measurement'];
	$doubleItemQuantity = $res['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Purple Swirl</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">The Purple <span class="lite">Swirl</span></a>
      <!--logo end-->

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          <!-- alert notification start-->
          <li id="alert_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important">7</span>
                        </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have 4 new notifications</p>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-primary"><i class="icon_profile"></i></span>
                                    Friend Request
                                    <span class="small italic pull-right">5 mins</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-warning"><i class="icon_pin"></i></span>
                                    John location.
                                    <span class="small italic pull-right">50 mins</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-danger"><i class="icon_book_alt"></i></span>
                                    Project 3 Completed.
                                    <span class="small italic pull-right">1 hr</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-success"><i class="icon_like"></i></span>
                                    Mick appreciated your work.
                                    <span class="small italic pull-right"> Today</span>
                                </a>
              </li>
              <li>
                <a href="#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username">Rona May de Juan</span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="login.html"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="sub-menu">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li>
            <a class="" href="manageOrders.php">
                  <i class="icon_genius"></i>
                  <span>Orders</span>
            </a>
          </li>
           <li>
            <a class="" href="itemStocks.php">
                  <i class="icon_genius"></i>
                  <span>Items and Stock</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Maintenance</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="menuList.php">Menu List</a></li>
              <li><a class="" href="toppings.php">Toppings</a></li>
              <li><a class="" href="accounts.php">Manage Account</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

     <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Items and Stock</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="itemStocks.php">Items</a></li>
              <li><i class="icon_document_alt"></i>Edit Items</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Update Item Information
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="">
                  	<input type="hidden" name="id" value=<?php echo $id ?>>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Item Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="itemName" name="txtbxItemName" minlength="5" type="text" value="<?php echo $txtbxItemName;?>" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">Description <span class=""></span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="itemDescription" type="text" name="txtbxItemDescription" value="<?php echo $txtbxItemDescription;?>"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="curl" class="control-label col-lg-2">Measurement<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="itemMeasurement" type="text" name="txtbxItemMeasurement" value="<?php echo $txtbxItemMeasurement;?>"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Quantity <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="itemQuanity" name="txtbxItemQuantity" minlength="0" type="number" value="<?php echo $txtbxItemQuantity;?>" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="btnUpdateItem" value="Update">Update</button>
                        <a class="btn btn-default" href="itemStocks.php" type="button" name>Cancel</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->





    <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>
</body>
</html>