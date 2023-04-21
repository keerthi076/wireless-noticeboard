<?php 

//$page = $_SERVER['PHP_SELF'];
//$sec = "10";

// Username is root 
$user = 'myprojec_allytec'; 
$password = 'allytech@2019'; 

// Database name is gfg 
$database = 'myprojec_webatm'; 

// Server is localhost with 
// port number 3308 
<?php 

//$page = $_SERVER['PHP_SELF'];
//$sec = "10";

// Username is root 
$user = 'myprojec_allytec'; 
$password = 'allytech@2019'; 

// Database name is gfg 
$database = 'myprojec_webatm'; 

// Server is localhost with 
// port number 3308 
$servername='localhost'; 
$mysqli = new mysqli($servername, $user, 
				$password, $database); 

// Checking for connections 
if ($mysqli->connect_error) { 
	die('Connect Error (' . 
	$mysqli->connect_errno . ') '. 
	$mysqli->connect_error); 
} 
if(isset($_POST["btn"]))
{
    $sql1 = "delete from noticeboard"; 
$mysqli->query($sql1); 
$mysqli->close(); 
//mysqli->query("delete from noticeboard ");

}
// SQL query to select data from database 
$sql = "SELECT * FROM noticeboard ORDER BY id DESC "; 
$result = $mysqli->query($sql); 
$mysqli->close(); 
?> 
<!DOCTYPE html> 
<html lang="en"> 

<head> 
 <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
	<meta charset="UTF-8"> 
	<title>NOTICE BOARD</title> 
<!-- CSS FOR STYLING THE PAGE --> 
	<style> 
		table { 
			margin: 0 auto; 
			font-size: large; 
			border: 1px solid black; 
		} 

		h1 { 
			text-align: center; 
			color: #006600; 
			font-size: xx-large; 
			font-family: 'Gill Sans', 'Gill Sans MT', 
			' Calibri', 'Trebuchet MS', 'sans-serif'; 
		} 
td { 
			background-color: #E4F5D4; 
			border: 1px solid black; 
		} 

		th, 
		td { 
			font-weight: bold; 
			border: 1px solid black; 
			padding: 10px; 
			text-align: center; 
				font-weight: Bold; 
			font-size:30px;
			text-transform:Uppercase;
		} 

		td { 
			font-weight: Bold; 
			font-size:30px;
			text-transform:Uppercase;
		} 
	</style> 
</head> 

<body> 
<form id="form1" name="form1" method="post" action="">
	<section> 
		<h1>NOTICE INFORMATION</h1> 
		<!-- TABLE CONSTRUCTION--> 
<table> 
			<tr> 
				<th>Id</th> 
				<th>Information</th> 
				<th>Date</th> 
			</tr> 
			<!-- PHP CODE TO FETCH DATA FROM ROWS--> 
			<?php // LOOP TILL END OF DATA 
				while($rows=$result->fetch_assoc()) 
				{ 
			?> 
			<tr> 
				<!--FETCHING DATA FROM EACH 
					ROW OF EVERY COLUMN--> 
				<td><?php echo $rows['id'];?></td> 
	
				<?php
			if($rows['ctype']=="TXT")
			{
			?>
				<td><?php echo $rows['uname'];?></td> 
				<?php
			}
			else
			{
			    
			
			?>
	<td> <img src="Upload/<?php echo $rows['uname']; ?>" width="800" height="600" alt=""></td> 
				<?php
			}
			?>
				
				<td><?php echo $rows['rdate'];?></td> 
			</tr> 
		
			<?php 
				} 
			?> 
				<tr><p align="center"><input type="submit" name="btn" id="btn" value="Delete All" /></td></tr>
		</table> 
	</section> 
</form>
</body> 

</html>
Index
<?php
session_start();
include("dbconnect.php");
extract($_POST);
$msg="";
if(isset($btn))
{
//$qry=mysql_query("select * from admin where  password='$pass' && (username='$uname' || userid='$uname')");
$qry=mysql_query("select * from admin where username='$uname' && password='$pass'");
$num=mysql_num_rows($qry);
	if($num==1)
	{
		$row=mysql_fetch_array($qry);
		$un=$row['username'];
	$_SESSION['uname']=$un;
	$_SESSION['lat']=$lat;
			$_SESSION['lon']=$lon;
			//mysql_query("update blackbox_user set latitude='$lat',longitude='$lon' where bcode='$uname'");
	header("location:display.php");
	}
	else
	{
	$msg="Invalid User!";
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("title.php"); ?></title>

<link href="style.css" rel="stylesheet" type="text/css" />
<script>
var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    //x.innerHTML = "Latitude: " + position.coords.latitude + 
    //"<br>Longitude: " + position.coords.longitude;	
	document.form1.lat.value=position.coords.latitude;
	document.form1.lon.value=position.coords.longitude;
	
}
</script>
</head>

<body onLoad="getLocation()" style="background-image: url(images/bg2.jpg);">
<form id="form1" name="form1" method="post" action="" >
  <div align="center" class="hd"><?php include("title.php"); ?></div>
  <div class="sd"><!--<a href="index.php">Home</a>-->
  </div>
  <p>&nbsp;</p>
  <table width="340" height="183" border="0" align="center" cellpadding="5" cellspacing="0" class="border">
    <tr>
      <th class="bg2" scope="col">Login</th>
    </tr>

    <tr>
      <td align="center" class="bg2"><input name="uname" type="text" class="inp" placeholder="Username" /></td>
    </tr>
    <tr>
      <td align="center" class="bg2"><input name="pass" type="password" class="inp" placeholder="Password" /></td>
    </tr>
    <tr>
      <td align="center" class="bg2"><input type="hidden" name="lat">
		<input type="hidden" name="lon">
		<input name="btn" type="submit" class="inp" value="Submit" /></td>
    </tr>
    <tr>
      <td align="center" class="bg2"><span class="style1"><?php echo $msg; ?></span></td>
    </tr>
  </table>
  <p align="center"><a href="regform.php"></a></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p align="center" class="sd"><?php include("title.php"); ?></p>
</form>
</body>
</html>
Display

<?php 

$page = $_SERVER['PHP_SELF'];
$sec = "10";

include("dbconnect.php");

if(isset($btn))
{
 
mysql_query("delete from noticeboard");

header("location:display.php");
}
// SQL query to select data from database 
$qry=mysql_query("select * from noticeboard order by id desc");
//$sql = "SELECT * FROM noticeboard ORDER BY id DESC "; 
//$result = $mysqli->query($sql); 
//$mysqli->close(); 

if($_REQUEST['act']=="delall")
{
    $ii= $_REQUEST['did'];
    $ed= $_REQUEST['act'];
    $mq=mysql_query("delete from noticeboard");
    
     if($mq)
	{

	?>
	<script language="javascript">
	window.location.href="display.php";
	</script>
	<?php
	}
}
?> 
<!DOCTYPE html> 
<html lang="en"> 

<head> 
<script language="javascript">
function del()
{
	if(!confirm("Are you sure want to delete?"))
	{
	return false;
	}
	return true;
}
</script>
 <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
	<meta charset="UTF-8"> 
	<title>NOTICE BOARD</title> 
	<!-- CSS FOR STYLING THE PAGE --> 
	<style> 
		table { 
			margin: 0 auto; 
			font-size: large; 
			border: 1px solid black; 
		} 

		h1 { 
	text-align: center; 
			color: #006600; 
			font-size: xx-large; 
			font-family: 'Gill Sans', 'Gill Sans MT', 
			' Calibri', 'Trebuchet MS', 'sans-serif'; 
		} 

		td { 
			background-color: #E4F5D4; 
			border: 1px solid black; 
		} 

		th, 
		td { 
			font-weight: bold; 
			border: 1px solid black; 
			padding: 10px; 
			text-align: center; 
				font-weight: Bold; 
			font-size:30px;
			text-transform:Uppercase;
		} 

		td { 
			font-weight: Bold; 
			font-size:30px;
			text-transform:Uppercase;
		} 
	</style> 
</head> 
<body> 
<form id="form1" name="form1" method="post" action="">
	<section> 
		<h1>NOTICE INFORMATION</h1> 
		<!-- TABLE CONSTRUCTION--> 
		<table> 
			<tr> 
				<th>Id</th> 
				<th>Information</th> 
				<th>Date</th> 
			</tr> 
			<!-- PHP CODE TO FETCH DATA FROM ROWS--> 
			<?php // LOOP TILL END OF DATA 
				while($rows=mysql_fetch_array($qry)) 
				{ 
			?> 
			<tr> 
				<!--FETCHING DATA FROM EACH 
					ROW OF EVERY COLUMN--> 
				<td><?php echo $rows['id'];?></td> 
				
				
				<td>
				    <?php 
				    if( $rows['ctype']=='TXT')
				    {
				    
				    echo $rows['uname'];
				    }
else
				    {
				     $ff="Upload/".$rows['uname'];
				  //  echo $ff;
				        echo '<img src="'.$ff.'" width="400px" alt="My image" /> ';
				    }
				    
				    
				    ?>
				    
				    </td> 
				<td><?php echo $rows['rdate'];?></td> 
			</tr> 
		
			<?php 
				} 
			?> 
				<tr> <p align="center">  <a href="display.php?act=delall&did=<?php echo $rrow['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> DELETE ALL</a></p></tr>
		</table> 
	</section> 
	</form>
</body> 

</html>
<?php
//$connect=mysql_connect("localhost","root","");
//mysql_select_db("train",$connect);

$connect=mysql_connect("localhost","myprojec_allytec","allytech@2019");
mysql_select_db("myprojec_webatm",$connect);

//$connect=mysql_connect("localhost","projemxh_puser","Project236one");
//mysql_select_db("projemxh_db9",$connect);
?>
<?php
session_start();
session_destroy();
header("location:index.php");
?>
