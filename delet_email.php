<?php 
$id=$_POST["id_email"];
include("par.php");

 $recordss = $bdd->prepare('DELETE FROM  email WHERE id_email = :id');
 $recordss->bindValue(":id", $id);
 if ($recordss->execute()) {

echo '<div style="float:left; margin-left:37%; margin-top:0%;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>félicitation</strong> cet email  est bien supprimé !!.
</div>';
 }
 else echo "error requete";
$bdd=null;
  ?>