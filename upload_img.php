<?php
include("par.php");
	$img1=$_FILES["img1"]["name"];	
	$img2=$_FILES["img2"]["name"];	
	$img3=$_FILES["img3"]["name"];	
	$dd=1;

if (!empty($img1)) {
$target="image/".basename($_FILES["img1"]["name"]);
      $sql="UPDATE images 
   SET image1 = :img
 WHERE id_image = :id";
$dd=1;
 $statement = $bdd->prepare($sql);
 $statement->bindValue(":img", $img1); $statement->bindValue(":id", $dd);

 if($statement->execute()){
 	if (move_uploaded_file($_FILES["img1"]["tmp_name"],$target)) {
  echo'<div style="float:left; margin-left:0%; margin-top:0%;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>félécitation</strong>  image1 est  bien enregistré!!.
</div>';
 } }
else {
  echo "requete error !!!!";
}
}
if (!empty($img2)) {
$target="image/".basename($_FILES["img2"]["name"]);
      $sql="UPDATE images 
   SET image2 = :img
 WHERE id_image = :id";
 $statemen = $bdd->prepare($sql);
 $statemen->bindValue(":img", $img2); $statemen->bindValue(":id", $dd);

 if($statemen->execute()){
 	 	if (move_uploaded_file($_FILES["img2"]["tmp_name"],$target)) {
  echo'<div style="float:left; margin-left:0%; margin-top:0%;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>félécitation</strong> image2 est  bien enregistré !!.
</div>';
 } }
else {
  echo "requete error !!!!";
}
}
if (!empty($img3)) {
$target="image/".basename($_FILES["img3"]["name"]);

      $sql="UPDATE images 
   SET image3 = :img
 WHERE id_image = :id";
 $statementt = $bdd->prepare($sql);
 $statementt->bindValue(":img", $img3); $statementt->bindValue(":id", $dd);

 if($statementt->execute()){
 	 	if (move_uploaded_file($_FILES["img3"]["tmp_name"],$target)) {
  echo'<div style="float:left; margin-left:0%; margin-top:0%;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>félécitation</strong>  image3 est  bien enregistré !!.
</div>';
 } }
else {
  echo "requete error !!!!";
}
}
$bdd=null;
?>