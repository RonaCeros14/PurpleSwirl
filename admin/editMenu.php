<?php

include("connectionString.php");
session_start();

$menuProductId = $_GET['id'];

/*if($_SESSION['sessionUsername'] == null)
{
  header('location:login.php');
}*/
//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM tbl_menu WHERE productID = $menuProductId");

while($res = mysqli_fetch_array($result))
{
  $varcharProductName = $res['productName'];
  $varcharProductDescription = $res['productDescription'];
  $doubleUnitPrice = $res['unitPrice'];
  $varcharProductImage = $res['productImage'];
}
if(isset($_POST['btnUpdateProduct']))
{
  $varcharProductName = mysqli_real_escape_string($connect, $_POST['txtbxProductName']);
  $varcharProductDescription = mysqli_real_escape_string($connect, $_POST['txtbxProductDescription']);
  $doubleUnitPrice = mysqli_real_escape_string($connect, $_POST['txtbxUnitPrice']);
  $varcharProductImage = addslashes(file_get_contents($_FILES["imgProductImage"]["tmp_name"]));
  $check = getimagesize($_FILES["imgProductImage"]["tmp_name"]);
  $uploadOk = 0;
  if($check !== false)
  {
    $uploadOk = 1;
  }
  else
  {
    $uploadOk = 0;
  }
  	///checking for empty fields
  if(empty($varcharProductName))
  {
    $message = "Name field is empty!";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  else if(empty($doubleUnitPrice))
  {
    $message - "Price field is empty";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  else
  {
	// if all the fields are filled (not empty) 
	//insert data to database	
    $queryUpdateProduct ="UPDATE tbl_menu SET productName = '$varcharProductName', productDescription = '$varcharProductDescription', productImage = '$varcharProductImage' WHERE productID = '$menuProductId'";
    //echo $queryUpdateProduct;
    if(mysqli_query($connect, $queryUpdateProduct))
    {
      $message = "Item added successfully!";
      echo "<script type='text/javascript'>alert('$message');</script>";
      echo "<script type='text/javascript'>window.location.href='menuList.php';</script>";
    }
    else
    {
      echo mysqli_error($connect);
    }
  }
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

  <title>Purple Swirl | Edit Product</title>

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
                <p class="blue">You have 1 new notifications</p>
              </li>
              <li>
                <a href="#">
                  <span class="label label-primary"><i class="icon_profile"></i></span>
                  Order ID : 5
                  <span class="small italic pull-right">5 mins</span>
                </a>
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
                <a href="profile.php"><i class="icon_profile"></i> My Profile</a>
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
            <h3 class="page-header"><i class="fa fa-files-o"></i> Menu List</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="menuList.php">Menu</a></li>
              <li><i class="icon_document_alt"></i>Add Products</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Existing Product Information
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" enctype="multipart/form-data">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Product Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="productName" name="txtbxProductName" minlength="5" type="text" value="<?php echo $varcharProductName; ?>" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">Description <span class="required"></span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="productDescription" type="text" name="txtbxProductDescription" value="<?php echo $varcharProductDescription; ?>" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="curl" class="control-label col-lg-2">Unit Price <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="unitPrice" type="text" name="txtbxUnitPrice" value="<?php echo $doubleUnitPrice; ?>" />
                      </div>
                    </div>
                    <!--image upload -->
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Image <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" type="file" name="imgProductImage" accept="image/x-png,image/gif,image/jpeg,image/jpg" value="HAHA" required />
                      </div>
                    </div>
                    <!--end of image upload-->
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="btnUpdateProduct" >Save</button>
                        <a class="btn btn-default" href="menuList.php" type="submit" name="btnCancel">Cancel</a>
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





