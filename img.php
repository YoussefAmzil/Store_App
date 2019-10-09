<!DOCTYPE html>
<html>

<head>
	<title>upload</title>
</head>
<body>
<div id="content">
	<form method="POST" action="img2.php" enctype="multipart/form-data">
		<input type="hidden" name="size" value="10000000">
		<div>
			<input type="file" name="image">

		</div>
		<div>
			<input type="submit" name="upload" value="upload image">
		</div>
	</form>
</div>
<div>

	<?php 
	include("par.php");
$records = $bdd->prepare('SELECT * FROM  image ');$records->execute();

while($results = $records->fetch(PDO::FETCH_ASSOC)){
	echo '<img src="image/'.$results["image"].'" style="height: 30%;width: 30%">' ;
}
	 ?>
</div>
</body>
</html>