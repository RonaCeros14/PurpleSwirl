<?php
	session_start();
	// incwluding the database connection file
	include_once("TVConnectionString.php");

	if(isset($_POST['btnUpdateItem']))
	{	
		$varcharItemID = mysqli_real_escape_string($connect, $itemID)
		$varcharItemName = mysqli_real_escape_string($connect, $_POST['txtbxItemName']);
		$varcharItemDescription= mysqli_real_escape_string($connect, $_POST['txtbxItemDescription']);
		$varcharItemMeasurement = mysqli_real_escape_string($connect, $_POST['txtbxMeasurement']);
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
$itemID = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM tbl_itemlist WHERE itemID = $itemID");

while($res = mysqli_fetch_array($result))
{
	$txtbxitemName = $res['itemName'];
	$txtbxItemDescription = $res['itemDescription'];
	$txtbxMeasurement = $res['measurement'];
	$doubleItemQuantity = $res['quantity'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Destinations</title>
        <link rel="shortcut icon" href = "images/tigerVisionIcon.ico">
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="admincss/TVAdminSideBar.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                     <img src="images/headerLogo.png"></img>
                </div>

                <ul class="list-unstyled components">
                    <p></p>
                    <li >
                        <a href="TVAdminDashboard.php">
                            <i class="glyphicon glyphicon-home"></i>
                            Dashboard
                        </a>
                        <!--<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Dashboard</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>-->
                    </li>
                    <li>
                        <a href="TVAdminReservations.php">
                        <i class="glyphicon glyphicon-calendar"></i>
                        Reservations</a>              
                    </li>
                    <li>
                      <a href="TVAdminPayments.php">
                      <i class="glyphicon glyphicon-usd"></i>
                      Payments</a>              
                    </li>
                    <li>
                        <a href="#Maintenance" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-wrench"></i>
                        Maintenance<span class="caret" ></span></a>

                        <ul class="collapse list-unstyled" id="Maintenance">
                            <li class="active"><a href="TVAdminDestinations.php">Destinations Offered</a></li>
                            <li><a href="TVAdminPackages.php">Packages</a></li>
                            <li><a href="TVAdminUsers.php">Users</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown" >
                                    <a style="height: 80px;   font-size:18px; font-family: Arial;" class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user" style="top:8px;"> ACCOUNT</span>
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li style="font-size: 20px"><a  href="TVAdminAccounts.php"> <span class="glyphicon glyphicon-user" style="margin-right: 10px; top:3px;"></span>View Account</a></li>
                                      <li style="font-size: 20px"><a href="TVAdminLogout.php"><span class="glyphicon glyphicon-off" style="margin-right: 10px; top:3px;"></span>Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

            <!-- Page Content Holder -->
            <div id="content" class="modal-body" style="padding:70px;">
				<form name="form1" method="post" enctype="multipart/form-data">
						<p style="font-size: 35px; color: #000;">
                            <strong>Edit Destinations</strong> 
                        </p>
						<table border="0">
						<div class="form-group">
							<tr> 
								<label>Destination Name</label>
								<input required
                                pattern="^([a-zA-Z0-9.]+\s)*[a-zA-Z0-9.]+$"
                                style="text-transform:capitalize;"
                                type="text"
                                name="txtbxDestinationName"
                                value="<?php echo $txtbxDestinationName;?>"
                                class="form-control">
							</tr>
						</div>
						<div class="form-group">
							<tr> 
								<label>Destination Address</label>
								<textarea placeholder="Unit Number, Building Name or Lot/Block Number, House Number, Street Name&#10;Village/Subdivision or Postal Code Name or Purok Name&#10;Baranggay Name, Postal Code&#10;City/Municipality Name&#10;Province, Philippines"
			                    required
			                    rows=5
			                    style="resize:none;text-transform:capitalize;"
			                    name="txtbxDestinationAddress" class="form-control"><?php echo $txtbxDestinationAddress;?></textarea>
							</tr>
						</div>
						<div class="form-group">
							<tr> 
								<label>Destination Email</label>
								<input pattern="^\S*$" type="email" name="txtbxDestinationEmail" value="<?php echo $txtbxDestinationEmail;?>" class="form-control">
							</tr>
						</div>
						<div class="form-group">
							<tr> 
								<label>Destination Contacts</label>
								<input type='tel'
			                    required
			                    pattern="[0-9]{2}-[0-9]{7,9}"
			                    name="txtbxDestinationContacts"
			                    class="form-control"
			                    placeholder="Telephone: 02-xxxxxxx/Mobile: 09-xxxxxxxxx"
								value="<?php echo $txtbxDestinationContacts;?>" class="form-control">
							</tr>
						</div>
						<div class="form-group">
							<tr> 
								<label>Destination Link</label>
								<input required pattern="^\S*$" type="url" name="txtbxDestinationLink" value="<?php echo $txtbxDestinationLink;?>" class="form-control">
							</tr>
						</div>
						<div class="form-group">
							<tr> 
								<label>Destination Description</label>
								<textarea required
			                    rows=5
			                    style="resize:none"
			                    id="text" 
			                    name="txtbxDestinationDescription"
			                    class="form-control"><?php echo $txtbxDestinationDescription;?></textarea>
							</tr>
						</div>
						<div class="form-group">
							<tr>
								<label>Image</label>
								<input type="file" name="imgDestinationImage" accept="image/x-png,image/gif,image/jpeg" class="form-control" required>
							</tr>
						</div>
						<div class="form-group">
							<tr> 
								<label>Destination Price(Php)</label>
								<input placeholder="0.00" type="number" required step="0.01" pattern="^\d+(?:\.\d{1,2})?$" name="txtbxDestinationPrice" value="<?php echo $txtbxDestinationPrice;?>" class="form-control">
							</tr>
						</div>
						<div class="form-group">
							<tr>
								<input type="hidden" name="DestinationID" value=<?php echo $_GET['id'];?>>
								<a href="TVAdminDestinations.php" type="btn" name="btnCancel" class="form-control pull-right btn-danger" style="width:25%; margin:5px";><center>Cancel</center></a>
								<input type="submit" name="btnUpdate" value="Update" class="form-control pull-right btn-success" style="width:25%; margin: 5px";>
							</tr>
						</div>
						</table>
				</form>
            </div>
        </div>

        <!-- jQuery CDN -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    </body>
</html>
