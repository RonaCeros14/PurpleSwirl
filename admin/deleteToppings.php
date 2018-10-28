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
		$queryDeleteToppings ="DELETE FROM tbl_toppings WHERE toppingsID = $id";
		if(mysqli_query($connect, $queryDeleteToppings))
		{
			//redirectig to the display page. 
			$message = "Delete Successful!";
			echo "<script type='text/javascript'>location.href = 'toppings.php';</script>";
		}
		else
		{
			$message = "Unsucessful!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
?>