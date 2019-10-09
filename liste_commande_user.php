 <?php session_start();
if (!isset($_SESSION['id_user'])) {
 header('location:login_user.php');
}
 ?>
<?php 
include("par.php");
  $recordss = $bdd->prepare('SELECT * FROM  user WHERE id_user = :id');
            $recordss->bindParam(':id',$_SESSION['id_user']);
            $recordss->execute();
            $resultss = $recordss->fetch(PDO::FETCH_ASSOC);
             $nom=$resultss['nom'];
             $adresse=$resultss['adresse'];
             $telephone=$resultss['telephone'];
             $email=$resultss['email'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body style="">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
  function test($id){
alert($id);
  var quant_val = $("#quantval2").val();
  alert(quant_val);
  }
</script>
<script type="text/javascript">
    $(document).ready(function(){
              
        $("#update").submit(function(){
            $.ajax({type:"POST", data: $(this).serialize(), url:"Mise_jour.php",
                success: function(data){
                    $("#update_response").html(data);
                      
                },
                            error: function(){
                        $("#update_response").html('Une erreur est survenue.');
                }
            });
            return false;
        });    
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
              
        $("#update_password").submit(function(){
            $.ajax({type:"POST", data: $(this).serialize(), url:"Mise_jour_pass.php",
                success: function(data){
                    $("#update2_response").html(data);
                      
                },
                            error: function(){
                        $("#update2_response").html('Une erreur est survenue.');
                }
            });
            return false;
        });    
});
</script>

<script type="text/javascript">
  function commander($id){
var id_com=$id;
$.ajax
({
type: "POST",
url: "commander_prod.php",
data: 'id_comm='+id_com,
success: function(server_response)
{
 
$("#affich").html(server_response)
}
})
  }
    function delett($id){
      var id_com=$id;
      var r=confirm("vous voulez suuprimer cet commande ?!");
      if (r==true) {

$.ajax
({
type: "POST",
url: "delet_prod_user.php",
data: 'id_comm='+id_com,
success: function(server_response)
{
 
$("#affich").html(server_response)
}
})
      }

  }
    function decommander($id){
var id_com=$id;
$.ajax
({
type: "POST",
url: "decommander_user.php",
data: 'id_comm='+id_com,
success: function(server_response)
{
 
$("#affich").html(server_response)
}
})
  }
function update_quant($id){
  var id_comm=$id;
 /// alert(id_comm);
  var quant_val = $("#quantval2").val();
  console.log(id_comm);
  alert(quant_val);
  $.ajax
({
type: "POST",
url: "Mise_jour_quantite.php",
data: 'id_commande='+id_comm+'&quant='+quant_val,
success: function(server_response)
{
 
$("#update_response3").html(server_response)
}
})
}
  
</script>
    <!-- Navigation -->
   <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="homme_user.php"><strong style="color: yellow;">SOUK-INFO</strong></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="homme_user.php"  style="color: white;">Acceuill</a></li>
      <li><a href="#"  style="color: white;">Qui sommes-nous</a></li>
      <li><a href="Contact.php"  style="color: white;">Contact</a></li>
      <li><a href="#"  style="color: white;">Page 2</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"  style="color: white;" data-toggle="modal" data-target="#sign" ><span class="glyphicon glyphicon-user" style="color: yellow;"></span> <strong><?php echo $nom; ?></strong></a></li>
      <li>
        <div class="dropdown">
  <i class="btn  dropdown-toggle glyphicon glyphicon-cog"  data-toggle="dropdown" style="color: white; margin-top: 7px;">
  <span class="caret" style="margin-top: 0px; margin-left: 0px;"></span></i>
  <ul class="dropdown-menu">
    <li><a href="#" data-toggle="modal" data-target="#info"><strong> Mes informations</strong></a></li>
    <li><a href="" data-toggle="modal" data-target="#commande" ><strong>Mes commandes</strong></a></li>
    <li><a href="" data-toggle="modal" data-target="#pass"><strong>changer mot de passe</strong></a></li>
    <li><a href="logout.php"><strong style="color: green;">Déconnexion</strong></a></li>
   <li><a href="" data-toggle="modal" data-target="#test"><strong>test</strong></a></li>
  </ul>
</div>
      </li>
    </ul>
  </div>
</nav>
<div>
  <center><h4>Mes commandes</h4></center>
  <div id="affich"></div>
  <div id="update_response3"></div>
           <table class="table table-bordered">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
      <th>nom produit</th>
      <th>quantité</th>
      <th>date commande</th>
       <th>commander</th>
       <th>modifier quantité</th>
        <th>suprimer</th>
    </tr>
  </thead>
  <?php 
  $count=1;
   $recordss = $bdd->prepare('SELECT * FROM  commande WHERE id_client = :id');
            $recordss->bindParam(':id',$_SESSION['id_user']);
            $recordss->execute();
          while($resultss = $recordss->fetch(PDO::FETCH_ASSOC)){
             $id_commande=$resultss['id_comm'];
             $nomm=$resultss['nom_prod'];
             $quantit=$resultss['quantite'];
             $date=$resultss['date_comm'];
             $etat=$resultss['etat_comm'];

echo '<tbody>
    
      <th scope="row">'.$count.'</th>
      <td>'.$nomm.'</td>  
     <td> <textarea id="quantval2">'.$quantit.'</textarea></td>
      <td>'.$date.'</td>
      
    
';
if ($etat==0) {
echo ' <td><a onclick="commander('.$id_commande.');"><i class="btn glyphicon glyphicon-plus"></i></a></td>
      <td><a style="color: green;" onclick="update_quant('.$id_commande.')"><i class="btn glyphicon glyphicon-pencil"></i></a></td>
      <td><a style="color: red;" onclick="delett('.$id_commande.')"><i class="btn glyphicon glyphicon-remove"></i></a></td>
  </tbody>

  ';
}
else{
  echo ' <td><a onclick="decommander('.$id_commande.')"><i class="btn glyphicon glyphicon-minus"></i></a></td>
      <td><a style="color: green;" onclick="update_quant('.$id_commande.')"><i class="btn glyphicon glyphicon-pencil"></i></a></td>
      <td><a style="color: red;" onclick="delett('.$id_commande.')" ><i class="btn glyphicon glyphicon-remove"></i></a></td>
  </tbody> 

  ';
}
$count++;
echo ' 
';
     }
     ?>


</table>


</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="info">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Mes Informations</h4>
      </div>
      <div class="modal-body">
   <form class="form-horizontal" method="POST" id="update" action="">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nom:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Nom " style="width: 200px;height: 30px;" name="name" required="required" value=<?php echo $nom; ?>>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Adresse:</label>
    <div class="col-sm-10">
      <input class="form-control" id="inputEmail3" placeholder="Adresse" style="width: 300px;height: 30px;" name="adresse" required="required" value=<?php echo $adresse; ?> >
      
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> téléphone:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="N° téléphone" style="width: 200px;height: 30px;" name="tele" required="required" value=<?php echo $telephone; ?>>
    </div>
  </div>
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" style="width: 200px;height: 30px;" name="email" required="required" value=<?php echo $email; ?>>
    </div>
  </div>
<div id="update_response"></div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Mise à jour">
      </div>
      </form>
      </div>
     
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->

<!-- Large modal register commandes-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="pass">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><center></center> Changer mot de passe!</h4>
      </div>
      <div class="modal-body">
    <form class="form-horizontal" method="POST" id="update_password" action="">
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Ancien mot de passe:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputEmail3" placeholder="old password" style="width: 200px;height: 30px;" name="old_pass"  value="">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nouveau mot de passe:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputEmail3" placeholder="new password" style="  width: 200px;height: 30px;" name="new_pass"  value="">
    </div>
  </div>
     <div id="update2_response"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Changer">
      </div></form>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>



</body>
</html>
