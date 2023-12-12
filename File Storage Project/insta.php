<?php
$connect=mysqli_connect("localhost","root","","insta") or die("Connection Failed");	
if(!empty($_POST['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from original where username='$username' and password='$password' ";
	$result=mysqli_query($connect,$query);
	$count=mysqli_num_rows($result);
	if($count>0)
	{
		header("Location: upload.php");
		exit;
	}
	else
	{
		echo "Invalid Username or Password";
	}
}
?>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
<title>Login M-BOX</title>
<style>
h1{padding:20px;font-family:Trirong;}
body{background-color:white;background-image: url('bg.png'); background-repeat:no-repeat;background-width:100%;}
div{font-family:Trirong;}
p{text-align:right}
a.settings{float:right; color:black}
a.about{float:right;color:black}
</style>
</head>
<body> 
<a class="settings" href="https://help.instagram.com/131112217071354" target="_blank"><b>Settings</b> </a> </br>
<a class="about" href="https://about.instagram.com/about-us" target="_blank"><b>About</b></a>
<center>
<h1><big>M-BOX</big></h1>
<img src=instas.png height=200px,width=100px></br></br></br></br></br></br>

<form action="insta.php" method="POST">
<div class="div-1">

<label for="name">Username&nbsp&nbsp&nbsp</label>
<input type="text" name="username" required style="border:none; border-bottom:1.5px solid grey;"></br></br>

<label for="password">Password&nbsp&nbsp&nbsp&nbsp</label>
<input type="password" name="password"  required style="border:none; border-bottom:1.5px solid grey;"></br></br>
</div>

<div class="div-2">
<label for="login"></label>
<input type="submit" value="Login" name="login" style="background-color: #008CBA; border-radius:12px; color:white; width:90px; font-size:16px; font-family:Arial;">
</div>
</br></br>
<div calss="div-3">
<a href="instareg.php">Create a new account</a>
</div>
</form>
</center>
</body>