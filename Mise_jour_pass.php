<?php
include("par.php");
     ####################################################
session_start();
if (empty($_POST["old_pass"])||empty($_POST["new_pass"])) {
  # code...
   echo'<div style="float:left; margin-left:10%; margin-top:0%;" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Attention</strong> les champs sont vides !!.
</div>';
}
else{


$id_user=$_SESSION['id_user'];
$old=$_POST["old_pass"];
$new=$_POST["new_pass"];


  $recordss = $bdd->prepare('SELECT * FROM  user WHERE id_user = :id');
            $recordss->bindParam(':id',$_SESSION['id_user']);
            $recordss->execute();
            $resultss = $recordss->fetch(PDO::FETCH_ASSOC);
             $pass=$resultss['mot_passe'];
          if ($pass==$old) {
            # code...

         

       $sql="UPDATE user 
   SET mot_passe=:pass
 WHERE id_user = :id";

 $statement = $bdd->prepare($sql);
  $statement->bindValue(":pass", $new);
 $statement->bindValue(":id", $id_user);

 if($statement->execute()){
  echo'<div style="float:left; margin-left:0%; margin-top:0%;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>félécitation</strong> Votre mot passe est bien enregistré!!.
</div>';
 } 
else {
  echo "requete error !!!!";
}
 }
 else{
  echo'<div style="float:left; margin-left:2%; margin-top:0%;" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Attention  </strong> votre mot de passe est incorrecte !!.
</div>';
 }
##*/
}
$bdd=null;             
?>
