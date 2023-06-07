<style>
@import url('https://fonts.googleapis.com/css?family=Bungee+Outline|Kumar+One+Outline&display=swap');
</style>

<?php session_start();
if(!isset($_SESSION['id'])){
	echo '<script>windows: location="index.php"</script>';

	
	}
		
?>
<?php
$session=$_SESSION['id'];
include 'db.php';
$result = mysql_query("SELECT * FROM user where id= '$session'");
while($row = mysql_fetch_array($result))
  {
  $sessionname=$row['name'];

  }
  
?>
<?php
include 'db.php';
  $results = mysql_query("SELECT * FROM user");
  $users = mysql_num_rows($results);
?>
<?php
include 'db.php';
  $results = mysql_query("SELECT * FROM bill");
  $bill = mysql_num_rows($results);
?>
<?php
include 'db.php';
  $jibu = mysql_query("SELECT * FROM owners");
  $client = mysql_num_rows($jibu);
?>

<?php
if (isset($_POST['add']))
	{	   
	include 'db.php';
			 		$id=$_POST['id'] ;
					$lname= $_POST['lname'] ;					
					$fname=$_POST['fname'] ;
					
					$address=$_POST['address'] ;
					$contact=$_POST['contact'] ;
					
		 mysql_query("INSERT INTO  owners (id,lname,fname,address,contact) 
		 VALUES ('$id','$lname','$fname','$address','$contact')"); 
				
				echo '<script>alert("success")</script>';
				
				
	        }
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css"  href="css/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
<script type="text/javascript">
function addCommas(nStr){
 nStr += '';
 var x = nStr.split('.');
 var x1 = x[0];
 var x2 = x.length > 1 ? '.' + x[1] : '';
 var rgx = /(\d+)(\d{3})/;
 while (rgx.test(x1)) {
  x1 = x1.replace(rgx, '$1' + ',' + '$2');
 }
 return x1 + x2;
}

</script>
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script src="css/bootstrap/dist/js/jquery.js"></script>
<script src="css/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Telephone Billing System</title>
<style type="text/css">
#wrapper{
 width:100%;
 margin:0 auto;
 border:3px solid rgba(0,0,0,0);
-webkit-border-radius:5px;
-moz-border-radius:5px;
 border-radius:5px;
-webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
-moz-box-shadow:0 0 18px rgba(0,0,0,0.4);
 box-shadow:0 0 18px rgba(0,0,0,0.4);
 margin-top:2%;
 padding:10px;
 height:550px;
}
#header { width:900px; height:100px;}
table th {background:#999;}
#form {
width:400px;
float:left;
 border:3px solid rgba(0,0,0,0);
-webkit-border-radius:5px;
-moz-border-radius:5px;
 border-radius:5px;
-webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
-moz-box-shadow:0 0 18px rgba(0,0,0,0.4);
 box-shadow:0 0 18px rgba(0,0,0,0.4);
 margin-top:5%;
	
}
#ryt {
float:right;
 border:3px solid rgba(0,0,0,0);
-webkit-border-radius:5px;
-moz-border-radius:5px;
 border-radius:5px;
-webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
-moz-box-shadow:0 0 18px rgba(0,0,0,0.4);
 box-shadow:0 0 18px rgba(0,0,0,0.4);
 margin-top:5%;
}
#header ul li{
	list-style:none;
	float:left; margin-top:30px; margin-left:10px;}
</style>
</head>
<body>
<div class="container">
<div id="wrapper">
  <h1><center><b style="font-family: 'Kumar One Outline', cursive;
font-family: 'Bungee Outline', cursive; font-size:40pt;">TELEPHONE BILLING SYSTEM</b></center></h1>
  <div  class=" glyphicon glyphicon-user"style="color:green; font-size:14pt; margin-left:990px;"> 
  <b><?php echo $sessionname;?></b><a href="/billing/logout.php">   <span class="btn btn-danger  glyphicon glyphicon-log-out">&nbsp; &nbsp;Logout</span></a>
  </div>
  <ul class="nav nav-pills">
    <li class="btn btn-default btn-xs"><a href="/billing/billing.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
    <li><a href="/billing/bill.php"><span class="glyphicon glyphicon-usd"></span>&nbsp;Billing</a></li>
    <li><a href="/billing/user.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Admins</a></li>
    <li><a href="/billing/clients.php"><span class="glyphicon glyphicon-list"></span>&nbsp;Customers</a></li>
  </ul>
<hr color="#999999" />
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <!-------- home panel ----------------------------->
      <h4>Welcome Dear, <?php echo $sessionname; ?></4>
      <hr color="#000000" />
      <div class="col-md-4">
         <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title"><h5 style="font-size:24px; font-weight:bold;">Customers</h5></div>
            </div>
              <div class="panel-body">
               <h1 align="center" style="font:Verdana, Geneva, sans-serif; font-weight:bolder;"><?php echo $client; ?></h1>
              </div>
              <a href="/billing/clients.php"><div class="panel-footer"><span class="alert-link glyphicon glyphicon-circle-arrow-right"></span>View</div></a>
         </div>
      </div>
    </div>
   <!-----  ######################################### -->
    <div class="col-md-4">
         <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title"><h5 style="font-size:24px; font-weight:bold;">Admins</h5></div>
            </div>
              <div class="panel-body">
               <h1 align="center" style="font:Verdana, Geneva, sans-serif; font-weight:bolder;"><?php echo $users; ?></h1>
              </div>
              <a href="/billing/user.php"><div class="panel-footer"><span class="alert-link glyphicon glyphicon-circle-arrow-right"></span>View</div></a>
         </div>
      </div>
    </div>
  <!-----  ######################################### -->
    <div class="col-md-4">
         <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title"><h5 style="font-size:24px; font-weight:bold;">Bills and Invoice</h5></div>
            </div>
              <div class="panel-body">
              <h1 align="center" style="font:Verdana, Geneva, sans-serif; font-weight:bolder;"><?php echo $bill; ?>
              <?php
              include "db.php";
			  $add=mysql_query("Select SUM(price) from Bill");
              while($row1=mysql_fetch_array($add))
               {
                 $total=$row1['SUM(price)'];
                  }
			  ?>
              </h1>
              </div>
             <a href="/billing/bill.php"> <div class="panel-footer"><span class="alert-link glyphicon glyphicon-circle-arrow-right"></span>View</div></a>
         </div>
      </div>
    </div>
   <!--------- ########################################### ------>
    <!-------------------------------- home ends ------------------------------>
</div>
</body>
</html>
 <script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "delete.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
<footer><center><p></p><p></p><p style="font-size: 20px">Created By: Bishal & Abishek</p></center></footer>
