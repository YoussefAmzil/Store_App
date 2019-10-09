<?php
  session_start();
if (!isset($_SESSION['id_user'])) {
 header('location:login_user.php');
}

 $id_prod=$_GET["action"]; 

include("par.php");
    $records = $bdd->prepare('SELECT * FROM  produit where id_prod=:id');
            $records->bindParam(':id', $id_prod);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);
           


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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Détail du produit</title>
   <link href="prod.css" rel="stylesheet">
   <script src="prod.js"></script>
   <link href="css/bootstrap.min.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <body>
    <meta charset="utf-8">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
      <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
          <script type="text/javascript" src="js/jquery.min.js"></script>

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
  function test(){
   // window.location="login_user.php";
    alert("frfr");
  }
</script>

<script type="text/javascript">

function add_prod($id_cl,$id_pr) {
var id_client=$id_cl;
var id_produit = $id_pr;
var quantit = $("#produitt").val();

console.log(quantit);
$.ajax
({
type: "POST",
url: "commander.php",
data: 'id_cli='+id_client+'&id_prod='+id_produit+'&quant='+quantit,
success: function(server_response)
{
 
$("#affich").html(server_response)
}
})
}

</script>
<script type="text/javascript">
  function testt($t,$u){
  
  }
</script>

   <nav  class="navbar navbar-inverse navbar-fixed-top">
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

	<div class="container" style="margin-top: 6%;">
	<div class="row">
   <div class="col-xs-4 item-photo">
                    <img style="max-width: 100% height:8%; width: 70%;" src=<?php echo "image/".$results["image"]; ?> >
                </div>
                <div class="col-xs-5" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3><?php echo  $nomme=$results["nom_prod"]; ?></h3>    

                    <!-- Precios -->
                    <h4 class="title-price"></small></h4><br>
                    <h3 style="margin-top:0px;"> <?php echo $results["prix"]; ?> $</h3>

                    <!-- Detalles especificos del producto -->
                     <h4 class="title-price">Qantité</small></h4><br>
                    <div class="section" style="padding-bottom:20px;">                                      
                        <div>
                           
                            <input value="1" id="produitt" />
                         
                        </div>
                    </div>                

                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                        <button type="button" class="btn btn-success" onclick="add_prod(<?php echo $_SESSION["id_user"];?>,<?php echo  $id_prod;?>);"> <span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true" ></span> Ajouter au liste des commandes </button>
                        
                    </div>     
                    <div id="affich">fjrhgjkrbjkgrbjg</div>                                   
                </div>                              

                <div class="col-xs-9">
                    <ul class="menu-items">
                        <li class="active"><h3>Détails dur le produit</h3> </li>                   
                    </ul>
                    <div style="width:100%;border-top:1px solid silver">
                     
                        <h5>
                        <ul >
                           <?php echo $results["description"]; ?>

                        </ul>  
                        </h5>
                    </div>
                </div>		
	</div>
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
