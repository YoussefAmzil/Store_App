<?php
include("par.php");
     ####################################################
$id= $_GET["id"];
$nom=$_POST["nom_prod"];
$prix=$_POST["prix"];
$stock=$_POST["stock"];
$desc=$_POST["description"];
$cat=$_POST["cat_prod"];

if (!empty($_FILES["photo"]["name"])) {
  # code...
    $target="image/".basename($_FILES["photo"]["name"]);
  $image=$_FILES["photo"]["name"];

  $sql="UPDATE produit 
   SET    nom_prod = :nom,  
       categor_pro  = :cat,
       nbr_stock  = :nbr,
       description =:descr,
          prix=:prix,
          image=:img
 WHERE id_prod = :id";
 $statement = $bdd->prepare($sql);
 $statement->bindValue(":nom", $nom);
 $statement->bindValue(":cat", $cat);
  $statement->bindValue(":nbr", $stock);
 $statement->bindValue(":descr", $desc);
   $statement->bindValue(":prix", $prix);
   $statement->bindValue(":img", $image);
     $statement->bindValue(":id", $id);

      if($statement->execute()){
          if (move_uploaded_file($_FILES["photo"]["tmp_name"],$target)) {
  echo'<div style="float:left; margin-left:0%; margin-top:0%;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>félécitation</strong> Votre produit est bien enregistré !!.
</div>';
   
  }else{
    echo $msg="pas inserer";
  }

 } 
else {
  echo "requete error !!!!";
}
#######################################################################################
      
}
else{
 $sql="UPDATE produit 
   SET    nom_prod = :nom,  
       categor_pro  = :cat,
       nbr_stock  = :nbr,
       description =:descr,
          prix=:prix
 WHERE id_prod = :id";
 $statement = $bdd->prepare($sql);
 $statement->bindValue(":nom", $nom);
 $statement->bindValue(":cat", $cat);
  $statement->bindValue(":nbr", $stock);
 $statement->bindValue(":descr", $desc);
   $statement->bindValue(":prix", $prix);
     $statement->bindValue(":id", $id);

      if($statement->execute()){
  echo'<div style="float:left; margin-left:0%; margin-top:0%;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>félécitation</strong> Votre produit est bien enregistré !!.
</div>';
 } 
else {
  echo "requete error !!!!";
}
}




##*/
$bdd=null;
?>
