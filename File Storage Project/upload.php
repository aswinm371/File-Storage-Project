<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;

	$db = mysqli_connect("localhost", "root", "", "insta");

	// Get all the submitted data from the form
	$sql = "INSERT INTO image (filename) VALUES ('$filename')";

	// Execute query
	mysqli_query($db, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Image uploaded successfully!</h3>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css" />
<style>
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

#content{
	width: 50%;
	justify-content: center;
	align-items: center;
	margin: 20px auto;
	border: 1px solid #cbcbcb;
}
form{

	justify-content: center;
	align-items: center;
	width: 40%;
	margin: 100px auto;
}

#display-image{
	width: 100%;
	justify-content: center;
	padding: 5px;
	margin: 15px;
}
img{
	margin: 10px;
	width: 350px;
	height: 250px;
}
</style>
</head>

<body style="background-image: url('img.png');background-position:center;">
	<div id="content">
		<center>
		<form method="POST" action="" enctype="multipart/form-data">
			<h1 style="font-family:Agency FB";><big>UPLOADING FILES</big></h1>
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div></br>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
			</div>
		</form>
		</center>
	</div>
	<div id="display-image">
		<?php
		$query = " select * from image ";
		$result = mysqli_query($db, $query);

		while ($data = mysqli_fetch_assoc($result)) {
		?>
			<img src="./image/<?php echo $data['filename']; ?>"></br></br>

		<?php
		}
		?>
	</div>
</body>

</html>
