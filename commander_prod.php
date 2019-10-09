<?php 
$id=$_POST["id_comm"];
$etat=1;
include("par.php");

       $sql="UPDATE commande 
   SET etat_comm=:etat
 WHERE id_comm = :id";

 $statement = $bdd->prepare($sql);
  $statement->bindValue(":etat", $etat);
 $statement->bindValue(":id", $id);
 if ($statement->execute()) {
echo '<div style="float:left; margin-left:37%; margin-top:0%;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>félicitation</strong> Votre commande est bien enregistrer !!.
</div>';
 }
$bdd=null;
  ?>