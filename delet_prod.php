<?php 
$id=$_POST["id_prod"];
include("par.php");

 $recordss = $bdd->prepare('DELETE FROM  produit WHERE id_prod = :id');
 $recordss->bindValue(":id", $id);
 if ($recordss->execute()) {
 	 $records = $bdd->prepare('DELETE FROM  commande WHERE id_prod = :id');
 $records->bindValue(":id", $id);
  if ($records->execute()) {
echo '<div style="float:left; margin-left:37%; margin-top:0%;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>félicitation</strong> ce produit  est bien supprimé !!.
</div>';
 }
}
 else echo "error requete";
$bdd=null;
  ?>