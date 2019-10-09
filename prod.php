<?php 
 $id_prod=$_GET["action"]; 

include("par.php");
    $records = $bdd->prepare('SELECT * FROM  produit where id_prod=:id');
            $records->bindParam(':id', $id_prod);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);

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
              
        $("#register").submit(function(){
            $.ajax({type:"POST", data: $(this).serialize(), url:"register_user.php",
                success: function(data){
                    $("#register_response").html(data);
                      
                },
                            error: function(){
                        $("#register_response").html('Une erreur est survenue.');
                }
            });
            return false;
        });    
});
    var count=0;
</script>
<script type="text/javascript">
  function test(){
    window.location="login_user.php";
   // alert("frfr");
  }
</script>


 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="homme.php"><strong style="color: yellow;">SOUK-INFO</strong></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="homme.php"  style="color: white;">Acceuill</a></li>
      <li><a href="#"  style="color: white;">Qui sommes-nous</a></li>
      <li><a href="Contact.php"  style="color: white;">Contact</a></li>
      <li><a href="#"  style="color: white;">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"  style="color: white;" data-toggle="modal" data-target="#sign"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login_user.php"  style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
  
    </ul>
    <form class="navbar-form navbar-left">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>
  </div>
</nav>

	<div class="container" style="margin-top: 6%;">
	<div class="row">
   <div class="col-xs-4 item-photo">
                    <img style="max-width: 100% height:8%; width: 70%;" src=<?php echo "image/".$results["image"]; ?> >
                </div>
                <div class="col-xs-5" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3><?php echo $results["nom_prod"]; ?></h3>    
                    
                    <!-- Precios -->
                    <h4 class="title-price"></small></h4><br>
                    <h3 style="margin-top:0px;"> <?php echo $results["prix"]; ?> $</h3>

                    <!-- Detalles especificos del producto -->
                    <form id="add_pro">
                     <h4 class="title-price">Qantité</small></h4><br>
                    <div class="section" style="padding-bottom:20px;">                                      
                        <div>
                           
                            <input value="1" />
                         
                        </div>
                    </div>                

                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                        <a  type="submit" class="btn btn-success" href="login_user.php"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true" ></span> Ajouter au liste des commandes</a>
                        
                    </div>                                        
                       </form>                     

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
<div class="modal fade" tabindex="-1" role="dialog" id="sign">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><center>
        <h4 class="modal-title"><i  class="glyphicon glyphicon-user prefix" aria-hidden="true"></i> CRÉEZ VOTRE COMPTE</h4></center>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" id="register">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nom:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Nom " style="width: 200px;height: 30px;" name="name" required="required">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Adresse:</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="inputEmail3" placeholder="Adresse" style="width: 200px;height: 30px;" name="adresse" required="required">
      </textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> téléphone:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="N° téléphone" style="width: 200px;height: 30px;" name="tele" required="required">
    </div>
  </div>
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" style="width: 200px;height: 30px;" name="email_sign" required="required">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Mot-passe</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputEmail3" placeholder="Mot-passe" style="width: 200px;height: 30px;" name="pass_sign" required="required">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">conf Mot-passe</label>
    <div class="col-sm-10" required="required">
      <input type="password" class="form-control" id="inputEmail3" placeholder="confirmation mot passe" style="width: 200px;height: 30px;" name="pass_sign2">
    </div>
  </div>
<div id="register_response"></div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Créez">
      </div>
      </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
  </body>
</html>
