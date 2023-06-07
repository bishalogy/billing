<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-theme.min.css" />
</head>

<h4>Note: Bill Amount = Total Consumption * Price/hour<br />&copy; 2019</h4>
<?php
include 'db.php';
$id =$_REQUEST['id'];
$result = mysql_query("SELECT * FROM bill where owners_id='$id'");

echo "<table class=\"table table-striped table-hover table-bordered\">
<tr>
<th>Id</th>
<th>Previous Talktime</th>
<th>Present Talktime</th>
<th>Consumption</th>
<th>Price</th>
<th>Date</th>
<th>Bill Amount</th>
<th>Action</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
	  $prev=$row['prev'];
	  $pres=$row['pres'];
	  $price=$row['price'];
	  $totalcons=$pres;
	  $bill=$totalcons * $price;
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $prev . "</td>";
  echo "<td>" . $pres . "</td>";
  echo "<td>". $totalcons."</td>";
  echo "<td>" . $price . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $bill . "</td>";
 echo "<td><a rel='facebox' href='viewpayment.php?id=".$row['id']."'><span class=\"glyphicon glyphicon-eye-open\">View </a>| ";
 echo "<a rel='facebox' href='delbill.php?id=".$row['id']."'>Del</td>";
  echo "</tr>";
  }
echo "</table>";

?>


</html>
