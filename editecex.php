<?php
include 'db.php';
$owner_id =$_REQUEST['id'];
	$id = $_POST['id'];
	$lname = $_POST['lname'];
	$fname = $_POST['fname'];
	$address=$_POST['address'] ;
	$contact=$_POST['contact'] ;

	mysql_query("UPDATE owners SET id ='$id', lname ='$lname',
		 fname ='$fname', address='$address', contact='$contact' WHERE id = '$owner_id'");
			

		 echo "<script>windows: location='billing.php'</script>";				
			