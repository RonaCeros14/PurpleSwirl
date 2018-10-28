<?php

	include_once ("connectionString.php");
 	session_start();

  	/*
  	if($_SESSION['sessionUsername'] == null)
  	{
    	header('location:login.php');
  	}
  	*/

  	//getting id of the data from url
		$id = $_GET['id'];

		//deleting the row from table
		$queryDeleteItem ="DELETE FROM tbl_itemlist WHERE itemID = $id";
		if(mysqli_query($connect, $queryDeleteItem))
		{
			//redirectig to the display page. 
			$message = "Delete Successful!"
			echo "<script type='text/javascript'>location.href = 'itemStocks.php';</script>";
		}
		else
		{
			$message = "Unsucessful!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
?>