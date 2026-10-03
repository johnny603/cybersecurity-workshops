<?php
	$page = $_GET['page'] ?? header("Location: /?page=home.php"); // i know its a strange way to load files
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My website</title>
</head>
<body>

	<h1>Welcome to My Website</h1>
	<p>I just learned how to make a website with PHP!.</p>
	<div class="content">
	<?php
	//include("./".$page);
	
	if (@(include("./".$page)) === false) // this is the vulnerability
	{
		readfile($page);
	}
	?>
	</div>

</body>
<style>
	body{
		background: url('/flower.jpg');
		background-repeat: repeat;
		text-align: center;
		font-size: 1.5rem;
	}
	h1, p, div, a{
		background-color: rgba(255, 255, 255);
	}
	img {
		width: 300px;	
	}
</style>
</html>
