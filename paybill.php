<?php session_start(); ?>
<?php
  include 'db.php';
$owner_id =$_REQUEST['id'];

$result = mysql_query("SELECT * FROM owners WHERE id  = '$owner_id'");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['id'] ;
				$lname= $test['lname'] ;					
				$fname=$test['fname'] ;
				$address=$test['address'] ;
				$contact=$test['contact'] ;

$q = mysql_query("select Prev from tempo_bill where Client = '$fname'");
$results = mysql_fetch_array($q);
$previous = $results['Prev'];
?>

<p><h1>Customer Bill</h1></p>
 <h1>Name: <?php echo $lname.'&nbsp;' .$fname.'&nbsp;';?></h1>
<p><?php $date=date('y/m/d h:e:s a');
 echo $date;?></p>
 <form method="post" action="addbill.php">
 <table width="346" border="1">
  <tr>
  <input type="hidden" name="owners_id" value="<?php echo $id; ?>" />
  <input type="hidden" name="date" value="<?php echo $date; ?>" />
    <td width="118">Previous Talktime:</td>
    <td width="66"><input type="text" name="prev"  value="<?php echo $previous; ?>" /></td>
    <td>hour</td>
  </tr>
  <tr>
    <td>Present Talktime:</td>
    <td><input type="text" name="pres"  /></td>
    <td>hour</td>
  </tr>
  <tr>
    <td>Price/hour</td>
    <td><input type="text" name="price" value="10"  disabled /></td>
    <td>Rupee</td>
  </tr>
   <tr>
    <td><input type="submit" name="total" value="Add"  /></td>
  </tr>
</table>
</form>