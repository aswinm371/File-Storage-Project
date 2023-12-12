<?php
$name=$_POST['name'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
if(!empty($name) || !empty($email) || !empty($username) || 
!empty($password))
{
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="insta";
	
	$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
	
	if(mysqli_connect_error())
	{
			die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else
	{
		$SELECT="SELECT name From original Where name=? Limit 1";
		$INSERT="INSERT Into original(name,email,username,password) values(?,?,?,?)";
		$stmt=$conn->prepare($SELECT);
		$stmt->bind_param("s",$name);
		$stmt->execute();
		$stmt->bind_result($name);
		$stmt->store_result();
		$rnum=$stmt->num_rows;
		
		if($rnum==0)
		{
			$stmt->close();
			$stmt=$conn->prepare($INSERT);
			$stmt->bind_param("ssss",$name,$email,$username,$password);
			$stmt->execute();
			echo "..........Sign up Registered Successfully............";
		}
		else
		{
			echo "Someone already registered";
		}
		$stmt->close();
		$conn->close();
	}
}
?>

<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
<title>Sign up M-BOX</title>
<style>
h1{font-family:Audiowide;}
h3{font-family:Sofia;}
body{border:50px solid cyan;font-family:Trirong;}
</style>
</head>
<body>
<center>
<h1>M-BOX</h1></br></br>
<img src="insta.jpg" height=200px,width=100px>
<h3><big>Sign up</big></h3></br></br>
<form action="instareg.php" method="POST">
<div class="div-1">
<label for="name">Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
<input type="text" name="name" required></br></br>

<label for="email">E-Mail id&nbsp&nbsp&nbsp</label>
<input type="email" name="email" required></br></br>

<label for="username">Username&nbsp</label>
<input type="text" name="username" required></br></br>

<label for="password">Password&nbsp</label>
<input type="password" name="password" required></br></br></br>
</div>

<div class="div-2">
<label for="submit"></label>
<input type="submit" value="Sign up" name="submit"
style="background-color: #008CBA; border-radius:12px; color:white; width:90px; font-size:16px; font-family:Audiowide;">
</div>
</br>
<div class="div-3">
<a href="insta.php" target="_blank">Already Registered, Login</a>
</div>
</form>
</center>
</body>		