<?php
if (isset($_POST['add']))
	{	   
	$conn = mysql_connect('localhost', 'root', '');
	 if (!$conn)
    {
	 die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("billing", $conn);
			 		
					$lname= $_POST['lname'] ;					
					$fname=$_POST['fname'] ;
				
					$address=$_POST['address'] ;
					$contact=$_POST['contact'] ;
					$meterReader = $_POST['meterReader'];
					
		 mysql_query("INSERT INTO  owners (lname,fname,address,contact) 
		 VALUES ('$lname','$fname','$address','$contact')"); 
		 mysql_query("INSERT INTO  tempo_bill (Client,Prev)
		 VALUES ('$fname','$meterReader')");
				
				header("Location: clients.php");
				
				
	        }
	
?>