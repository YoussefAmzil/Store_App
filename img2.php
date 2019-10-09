<?php 
if (isset($_POST["upload"])) {
	# code...
	$target="image/".basename($_FILES["image"]["name"]);
	$image=$_FILES["image"]["name"];
include("par.php");

$req = $bdd-> prepare ('INSERT INTO image (image) VALUES(:img)');
  $req ->bindParam (':img',$image);
if($req->execute()) {
	echo "b1";
	if (move_uploaded_file($_FILES["image"]["tmp_name"],$target)) {
		# code...
		echo $msg="b1 inserer";
	}else{
		echo $msg="pas inserer";
	}
}
}
 ?>