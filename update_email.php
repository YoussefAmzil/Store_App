<?php
include("par.php");
     ####################################################

$id=$_POST['idd_email'];
$etat=1;

       $sql="UPDATE email
   SET etat_email=:et
 WHERE id_email = :id";

 $statement = $bdd->prepare($sql);
  $statement->bindValue(":et",$etat);
 $statement->bindValue(":id", $id);

 if($statement->execute()){
  echo'<div style="float:left; margin-left:0%; margin-top:0%;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  les informations sont bien enregistrés!!
</div>';
 } 
else {
  echo "requete error !!!!";
}
$bdd=null;             
?>
