<?php
include("par.php");
     ####################################################
session_start();

$id_user=$_SESSION['id_user'];
$nom=$_POST["name"];
$adresse=$_POST["adresse"];
$telephone=$_POST["tele"];
$email=$_POST["email"];

       $sql="UPDATE user 
   SET nom = :nom,  
       adresse = :adresse,
       telephone = :telephone,
       email=:email
 WHERE id_user = :id";

 $statement = $bdd->prepare($sql);
 $statement->bindValue(":nom", $nom); $statement->bindValue(":adresse", $adresse);
 $statement->bindValue(":telephone", $telephone);

  $statement->bindValue(":email", $email);
 $statement->bindValue(":id", $id_user);

 if($statement->execute()){
  echo'<div style="float:left; margin-left:0%; margin-top:0%;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>félécitation</strong> Votre informations sont bien enregistré !!.
</div>';
 } 
else {
  echo "requete error !!!!";
}
##*/
$bdd=null;             
?>
