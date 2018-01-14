<?php
$con = mysqli_connect('localhost','root','','Multiple');

//check connection

if (mysqli_connect_errno()){
	
	echo "Failed to connect MySql: " .mysqli_connect_error();
	
}

$qry = mysqli_query($con,"select * from User") or die(mysql_error());

?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
<style type="text/css">
img.image {
    width: 70px;
    height: 70px;
    margin: 10px;
}
th {padding-right:40px;}
td {padding-right:40px;}
</style>
 
 
</head>
<body>
<div class="container">
<table>
<tr><th>Full name</th><th>Email</th><th>Gender</th><th>Phone number</th><th>image</th></tr>
<?php
while($row=mysqli_fetch_array($qry)){
$qry1 = mysqli_query($con,"select * from Images Where Uid='".$row['ID']."'") or die(mysql_error());
?>

<tr>
<td><?php echo $row['Full_Name'] ;?></td><td><?php echo $row['email'] ;?></td><td><?php echo $row['Gender'] ;?></td><td><?php echo $row['U_name'] ;?></td><td><?php echo $row['Mobile'] ;?></td><td><?php while($rows=mysqli_fetch_array($qry1)){ echo "<img class='image' src='uploads/".$rows['Image']."' width=70 >"; } ?> </td></tr>
	
<?php
}
?>

</table>
<button><a href="index.php">Home</a></button>
</div>
</body>
</html>

