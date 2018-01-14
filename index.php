<?php

$con = mysqli_connect("localhost","root","","Multiple");

// Check connection

if (mysqli_connect_errno())

{
	
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	
}

if (isset($_POST['submit'])) 

{
	
    $name = $_POST['name'];
	
	$email = $_POST['email'];
	
	$gender =$_POST['gender'];
	
	$username = $_POST['username'];
	
	$password = $_POST['password'];
	
	$mobile = $_POST['mobile'];

	$qry = "insert into User (Full_Name,email,Gender,U_name,Password,Mobile) values ('".$name."','".$email."','".$gender."','".$username."','".$password."','".$mobile."')"; 
	
	$result = mysqli_query($con,$qry) or die(mysql_error());            ;
	
	$id = mysqli_insert_id($con);
	
	for ($i=0; $i<count($_FILES['file1']['name']); $i++) {
		 
		 $details = explode(".", $_FILES['file1']['name'][$i]); # extra () to prevent notice
         
		 $name = $details[0];
		
		 $ext = $details[1];
		 
		 $image = $name.$i.".".$ext;
		
		 $qry1 = "insert into Images (Image,Uid) values ('".$image."','".$id."')"; 
		
		 mysqli_query($con,$qry1)or die(mysql_error());
		 
		 move_uploaded_file($_FILES['file1']['tmp_name'][$i],'uploads/'.$image);
    
	}
    header('location:view.php');
}
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
  <script src="jquery-1.9.1.js"></script>
  
    <style type="text/css">
		
.btn, .fileupload-buttonbar .toggle {
margin-bottom: 5px;
}
.btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open .dropdown-toggle.btn-success {
/*color: #fff;
background-color: #47a447;
border-color: #398439;*/
}
.btn:hover, .btn:focus {
color: #333;
text-decoration: none;
}
.fileinput-button {
position: relative;
overflow: hidden;
}
.btn {
display: inline-block;
margin-bottom: 0;
font-weight: 400;
text-align: center;
vertical-align: middle;
cursor: pointer;
background-image: none;
border: 1px solid transparent;
white-space: nowrap;
padding: 6px 12px;
font-size: 14px;
line-height: 1.42857143;
border-radius: 4px;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
}
.btn-success {
color: #fff;
/*background-color: #5cb85c;
border-color: #4cae4c;*/
font-weight: bold;
text-align: center;
padding: 17px 85px;
margin: 10px 0px 0px 0px;
color: #555;
border: 2px dashed #555;
border-radius: 7px;
margin-bottom: 20px;
}

.fileinput-button input {
position: absolute;
top: 0;
right: 0;
margin: 0;
opacity: 0;
-ms-filter: 'alpha(opacity=0)';
font-size: 200px;
direction: ltr;
cursor: pointer;
}
#output{
	width:88%;
}
#output ul li{
    border: 1px solid #000000;
    border-radius: 10px;
    margin-bottom: 25px;
    padding: 5px;
    background-color: #fff;
}
input[type=file] {
display: block;
}

input[type="hidden"], input[type="image"], input[type="file"] {
-webkit-appearance: initial;
padding: initial;
background-color: initial;
border: initial;
}
input[type="password"], input[type="search"] {
-webkit-appearance: textfield;
padding: 1px;
background-color: white;
border: 2px inset;
border-image-source: initial;
border-image-slice: initial;
border-image-width: initial;
border-image-outset: initial;
border-image-repeat: initial;
-webkit-rtl-ordering: logical;
-webkit-user-select: text;
cursor: auto;
}
input, textarea, keygen, select, button {
margin: 0em;
font: -webkit-small-control;
color: initial;
letter-spacing: normal;
word-spacing: normal;
text-transform: none;
text-indent: 0px;
text-shadow: none;
display: inline-block;
text-align: start;
}
user agent stylesheetinput, textarea, keygen, select, button, meter, progress {
-webkit-writing-mode: horizontal-tb;
}


    </style>
</head>
<body>
<div class="container">
			<!-- freshdesignweb top bar -->
            <div class="freshdesignweb-top">
                <a href="#" target="_blank">Home</a>
                
                <div class="clr"></div>
            </div><!--/ freshdesignweb top bar -->
			<header>
				
            </header>       
      <div  class="form">
    		<form id="contactform" method="post" action="" enctype="multipart/form-data"> 
    			<p class="contact"><label for="name">Name</label></p> 
    			<input id="name" name="name" placeholder="First and last name" required="" tabindex="1" type="text" value="kiran"> 
    			 
    			<p class="contact"><label for="email">Email</label></p> 
    			<input id="email" name="email" value="example@domain.com" required="" type="email"> 
                
                <p class="contact"><label for="username">Create a username</label></p> 
    			<input id="username" name="username" placeholder="username" required="" tabindex="2" type="text"> 
    			 
                <p class="contact"><label for="password">Create a password</label></p> 
    			<input type="password" id="password" name="password" required=""> 
               
        
               
  
            <select class="select-style gender" name="gender">
            <option value="select">i am..</option>
            <option value="m">Male</option>
            <option value="f">Female</option>
            <option value="others">Other</option>
            </select><br><br>
            
            <p class="contact"><label for="phone">Mobile phone</label></p> 
            
            
            <input id="phone" name="mobile" placeholder="phone number" required="" type="text"  value="123456"> <br>
            


			
   		
            <span class="btn btn-success fileinput-button">
            <span>Click Here OR Drag and Drop Images...</span>
            <input type="file" id="file1" name="file1[]"  multiple="multiple" accept="image/*" capture="camera"/>
            </span>
            <div id="output"><ul></ul></div>

            <input class="buttom" name="submit" id="submit" tabindex="5" value="Submit" type="submit"> 	 
   </form> 
</div>      
</body>
 <script type="text/javascript">
   
   $("input#file1").change(function() {
	$("#output ul li").remove();   
    var ele = document.getElementById($(this).attr('id'));
    var result = ele.files;
    for(var x = 0;x< result.length;x++){
		var fle = result[x];
		var file_ext = fle.name.split('.').pop();
		///alert (file_ext);
		var basename = fle.name.split(".");
		//alert (basename[0])
        $("#output ul").append("<li>" + basename[0]+"("+x+")."+file_ext+"</li>"); 
			
    }
	  
});
   
</script>

</html>
