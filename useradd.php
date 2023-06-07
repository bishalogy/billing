<?php
include 'db.php';
			 	
					$username= $_POST['username'] ;					
					$password=$_POST['password'] ;
					$name=$_POST['name'] ;
					
					
		 mysql_query("INSERT INTO  user (username,password,name) 
		 VALUES ('$username','$password','$name')"); 
				
			
				echo '<script>windows: location="user.php"</script>';
				
				