 <?php session_start();
if (!isset($_SESSION['id_admin'])) {
 header('location:login_admin.php');
}
 ?>
 <?php 
include("par.php");
  $recordss = $bdd->prepare('SELECT * FROM  admin WHERE id_admin = :id');
            $recordss->bindParam(':id',$_SESSION['id_admin']);
            $recordss->execute();
            $resultss = $recordss->fetch(PDO::FETCH_ASSOC);
             $nom=$resultss['nom_admin'];
                       
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>liste-commandes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<script type="text/javascript">
  function delet_comm($id){
    var r=confirm("vous voulez supprimer la commande numéro  " +$id);
    if (r == true) {

      $.ajax
({
type: "POST",
url: "delet_comm.php",
data: 'id_comm='+$id,
success: function(server_response)
{
 
$("#delet").html(server_response)
}
})

} else {

} 
  }
</script>

   <!-- JQuery -->
   <div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">souk-info</a>
    </div>
     <ul class="nav navbar-nav navbar-right">
   <li><a href="admin.php"  style="color: white;" ><span class="glyphicon glyphicon-user" style="color: yellow;"></span>                          <strong><?php echo $nom;  ?></strong></a></li>
      <li><a href="logout_ad.php"  style="color: white;" ><span class="glyphicon glyphicon-log-in"></span> Déconnexion</a></li>
   </ul>
  </div>
</nav>
<!-- Centered Tabs -->
</div>

<div class="" style="margin-top: -16px;">
<ul class="nav nav-pills nav-justified">
  <li class=""><a href="admin.php">liste des produits</a></li>
  <li ><a href="liste_client.php" >listes des clients</a></li>
   <li class="active"><a href="liste_commande.php">listes des commandes</a></li>
  <li><a href="liste_email.php">Mes emails<span style="margin-top:'.$top.'px; background-color:red;" class="badge"><?php
  echo email_lue();  ?></span></a></li>

</ul></div>
<div id="delet"></div>

            <div class="tab-pro" style="margin-left:220px;">
           <table class="table table-bordered">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
       <th>Id commande</th>
      <th>nom produit</th>
      <th>nom_client</th>
      <th>email_client</th>
       <th>quantité</th>
        <th>date de commande </th>
         <th>etat_commande</th>
          <th>supprimer</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include("par.php");
    $records = $bdd->prepare('SELECT * FROM  commande');
      if ($records->execute()) {
        $count=1;
        while($results = $records->fetch(PDO::FETCH_ASSOC)){
          $id=$results["id_comm"];
          $nomm=$results["nom_prod"];
          $quan=$results["quantite"];
          $dat=$results["date_comm"];
        $etat=$results["etat_comm"];
$record = $bdd->prepare('SELECT * FROM  user WHERE id_user=:id');
 $record->bindParam(':id',$results["id_client"]);
 if ($record->execute()) {
 $result = $record->fetch(PDO::FETCH_ASSOC);
 $nom_cl=$result["nom"];
 $email=$result["email"];
 }
echo '<tr> <th scope="row">'.$count.'</th>
      <td>'.$id.'</td>
      <td>'.$nomm.'</td>
       <td>'.$nom_cl.'</td>
      <td>'.$email.'</td>
       <td>'.$quan.'</td>
      <td>'.$dat.'</td>
      <td>'.$etat.'</td>
      <td><i class="glyphicon glyphicon-remove btn" style="color:red;" onclick="delet_comm('.$id.');"></i></td> </tr>';
      $count++;
        }

      }
     ?>
  </tbody>
</table>
</div>
</body>
<?php 
function email_lue(){
   include("par.php");
   $etat=0;
  $recordd = $bdd->prepare('SELECT count(id_email) FROM email WHERE etat_email=:nb');
   $recordd->bindParam(':nb', $etat);
            $recordd->execute();
            $rowCount = $recordd->fetchColumn(0);
            return $rowCount;
}
 ?>
</html>