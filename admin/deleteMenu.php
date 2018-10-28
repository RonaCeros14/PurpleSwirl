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
		$queryDeleteMenu ="DELETE FROM tbl_menu WHERE productID = $id";
		if(mysqli_query($connect, $queryDeleteMenu))
		{
			//redirectig to the display page. 
			$message = "Delete Successful!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "<script type='text/javascript'>location.href = 'menuList.php';</script>";
		}
		else
		{
			$message = "Unsucessful!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
?>