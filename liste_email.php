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
  <title>liste-clients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<script type="text/javascript">
  function delet_email($id){
    var r=confirm("vous voulez supprimer client numéro  " +$id);
    if (r == true) {

      $.ajax
({
type: "POST",
url: "delet_email.php",
data: 'id_email='+$id,
success: function(server_response)
{
 
$("#delet").html(server_response)
}
})

} else {

} 
  }
  function update_etat($id){
$.ajax
({
type: "POST",
url: "update_email.php",
data: 'idd_email='+$id,
success: function(server_response)
{
 
$("#delet").html(server_response)
}
})
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
  <li class=""><a href="liste_client.php" >listes des clients</a></li>
   <li><a href="liste_commande.php">listes des commandes</a></li>

  <li class="active"><a href="liste_email.php" >Mes emails<span style="background-color:red;" class="badge"><?php echo email_lue();  ?></span></a></li>
</ul></div>


            <div class="tab-pro" style="margin-left:300px;">
            <div id="delet"></div>
           <table class="table table-bordered">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
       <th>Id message</th>
      <th>Nom emetteure</th>
      <th>@Email emeteure</th>
      <th>Text Email</th>
      <th>Date Email</th>
       <th>Client?</th>
        <th>Lue</th>
         <th>Supprimer</th>       
    </tr>

  </thead>
  <tbody>
    
    <?php 
    include("par.php");
    $records = $bdd->prepare('SELECT * FROM  email');
      if ($records->execute()) {
        $count=1;
        while($results = $records->fetch(PDO::FETCH_ASSOC)){
          $id=$results["id_email"];
          $nomm=$results["nom"];
          $emaiil=$results["email_user"];
          $txt=$results["message"];
        $date=$results["date_rec"];
        $etat=$results["etat_email"];
        $clnt=email_client($emaiil);
echo '<tr> <th scope="row">'.$count.'</th>
      <td>'.$id.'</td>
      <td>'.$nomm.'</td>
      <td>'.$emaiil.'</td>
       <td><textarea>'.$txt.'</textarea></td>
      <td>'.$date.'</td>';
if ($clnt==1) {
    echo '<td><strong>OUI</strong></td>';
}
else{
  echo '<td><strong>NON</strong></td>';
}
    
if ($etat==1) {
 echo ' <td><i class="glyphicon glyphicon-eye-open " style="color:orange;"></i></td>
      <td><i class="glyphicon glyphicon-remove btn" style="color:red;" onclick="delet_email('.$id.')"></i></td> </tr>';
}else{
  echo ' <td><a onclick="update_etat('.$id.');"><i class="glyphicon glyphicon-ok btn" style="color:green;"></i></a></td>
      <td><i class="glyphicon glyphicon-remove btn" style="color:red;" onclick="delet_email('.$id.')"></i></td> </tr>';
}
   
      $count++;
        }

      }
     ?>
     
    

  </tbody>
</table>
</div>
<?php  

function email_client($email){
 include("par.php");
   $records = $bdd->prepare('SELECT * FROM  user WHERE email=:ma ');
     $records->bindParam(':ma',$email);
     $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);
            if(count($results) > 0){
                return 1;
            }else {
              return 0;
            }
}
function email_lue(){
   include("par.php");
   $etat=0;
  $recordd = $bdd->prepare('SELECT count(id_email) FROM email WHERE etat_email=:nb');
   $recordd->bindParam(':nb', $etat);
            $recordd->execute();
            $rowCount = $recordd->fetchColumn(0);
            return $rowCount;
}
$bdd=null;
?>

</body>
</html>