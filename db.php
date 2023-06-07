<?php
$conn = @mysqli_connect('localhost', 'root', '',billing);
	 if (!$conn)
    {
	 die('Could not connect: ' . mysqli_error());
	}
	mysqli_select_db("billing", $conn);

mysqli_query("ALTER TABLE `bill` CHANGE `price` `price` INT(20) NOT NULL DEFAULT '10';"); 	
?>
