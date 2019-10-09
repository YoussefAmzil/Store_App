<?php  
include("par.php");
$id=$_POST["id_commande"];
$quant=$_POST["quant"];
 $sql="UPDATE commande 
   SET quantite=:qant
 WHERE id_comm = :id";

 $statement = $bdd->prepare($sql);
  $statement->bindValue(":qant", $quant);
 $statement->bindValue(":id", $id);

 if($statement->execute()){
  echo'<div style="float:left; margin-left:0%; margin-top:1%;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>félécitation</strong> Votre commande est bien enregistré !!.
</div>';
 } 
 else echo "error requete";
$bdd=null;
 ?>