<?php
session_start();
if (isset($_SESSION['id_user'])) {

if ($_POST['search']) {
  $nom="%".$_POST['search']."%";
include("par.php");

 $records = $bdd->prepare('SELECT * FROM  produit WHERE nom_prod  LIKE :Nom');
          
            $records->bindParam(':Nom', $nom);
            
       if($records->execute()){
          echo'<div style "margin-top:1px; ">';
         while ($results = $records->fetch(PDO::FETCH_ASSOC)) {
              //= $results['ID_MBR'];
              $image=$results["image"];
              $nomm=$results["nom_prod"];
              echo'
              <a href="prod_user.php?action='.$results['id_prod'].'" class="list-group-item list-group-item-action">
              <img src="image/'.$image.'"  style="width="60" height="45""> '.$nomm.' </a>';

       } 
       echo' </div>';

 }

       
       # id doit etre recu par la session
      }else{} //echo "NOT Data found"; 
}

else{
if ($_POST['search']) {
  $nom="%".$_POST['search']."%";
include("par.php");

 $records = $bdd->prepare('SELECT * FROM  produit WHERE nom_prod  LIKE :Nom');
          
            $records->bindParam(':Nom', $nom);
            
       if($records->execute()){
          echo'<div style "margin-top:1px; ">';
         while ($results = $records->fetch(PDO::FETCH_ASSOC)) {
              //= $results['ID_MBR'];
              $image=$results["image"];
              $nomm=$results["nom_prod"];
              echo'
              <a href="prod.php?action='.$results['id_prod'].'" class="list-group-item list-group-item-action">
              <img src="image/'.$image.'"  style="width="60" height="45""> '.$nomm.' </a>';

       } 
       echo' </div>';

 }

       
       # id doit etre recu par la session
      }
}
    

$bdd=null;
  ?>
