<?php 
session_start();
if (!isset($_SESSION['id_admin'])) {
 header('location:login_admin.php');
}
 $id_prod=$_GET["action"]; 
 ?>
 <?php 
include("par.php");
  $recordss = $bdd->prepare('SELECT * FROM  admin WHERE id_admin = :id');
            $recordss->bindParam(':id',$_SESSION['id_admin']);
            $recordss->execute();
            $resultss = $recordss->fetch(PDO::FETCH_ASSOC);
             $nom=$resultss['nom_admin'];
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
function envoi_form($id){
  alert("ff");
  var id=$id;
$("#update_pro").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({  
             type: "POST",  
             url: "update_prod_final.php?id="+id,  
             data: formData,
             async: false,
             cache: false,
             contentType: false,
             processData: false,
             success: function(data) {
                 $("#prod").html(data);
             }
        }); 
        return false;
})}
function envoi_id($id){

  var id=$id;
$.ajax
({
type: "POST",
url: "update_prod_final.php",
data: 'id_prod='+id,
success: function(server_response)
{
$("prod").html(server_response)
}
})
}
</script>
<script type="text/javascript">
  function test(){
    window.location="login_user.php";
   // alert("frfr");
  }
</script>
   <div>
   <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin.php">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="admin.php"  style="color: white;margin-left: 400px;" ><span class="glyphicon glyphicon-user" style="color: yellow;"></span>                          <strong><?php echo $nom;  ?></strong></a></li>
      <li><a href="logout_ad.php"  style="color: white;" ><span class="glyphicon glyphicon-log-in"></span> Déconnexion</a></li>
 
    </ul>


</form>
  </div>
</nav>
<!-- Centered Tabs -->
</div>
<form method="POST" id="update_pro" enctype="multipart/form-data">
 <input type="hidden" name="MAX_FILE_SIZE" value="12340000005" >
	<div class="container" style="margin-top: 6%;">
	<div class="row">
   <div class="col-xs-4 item-photo">
                    <img style="max-width: 100% height:8%; width: 70%;" src=<?php echo "image/".$results["image"]; ?> >
                    <input type="file" name="photo" title="selectionez une image">
                </div>

                <div class="col-xs-5" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
<h4 style="margin-top:0px;"> nom de produit</h4>
                    <textarea name="nom_prod" style="width: 300px;"><?php echo $results["nom_prod"]; ?></textarea>
                    <!-- Precios -->
                    <h4 class="title-price"></small></h4>
                    <h4 style="margin-top:0px;"> prix</h4>
                    <input type="text" name="prix" value=<?php echo $results["prix"]; ?>> $
                    <h4>catégorie</h4>
      <select class="form-control" style="width: 200px;" name="cat_prod" >
<?php  

  $recor = $bdd->prepare('SELECT * FROM  categorie ');
            $recor->execute();
            echo '<div class="list-group">';
           while( $resul = $recor->fetch(PDO::FETCH_ASSOC)){
            $nom_cat=$resul['nom_cat'];
            $id_cat=$resul['id_categorie'];
            echo '  <option>'.$nom_cat.'</option>';
}
?>


</select>
                    <!-- Detalles especificos del producto -->
                    
                     <h4 class="title-price">stock</small></h4><br>
                    <div class="section" style="padding-bottom:20px;">                                      
                        <div>
                           
                            <input name="stock" value=<?php echo $results["nbr_stock"]; ?> >
                         
                        </div>
                    </div>                

                    <!-- Botones de compra -->
                    <?php 
                    echo '<div class="section" style="padding-bottom:20px;">
                        <input type="submit" class="btn btn-success" value="Modifier le produit" onclick = "envoi_form('.$results["id_prod"].');">
                        
                    </div>';
                    ?>
                    <div id="prod"></div>                                        
                                    

                <div class="col-xs-9">
                    <ul class="menu-items">
                        <li class="active"><h3>Description de produit</h3> </li>                   
                    </ul>
                    <div style="width:100%;border-top:1px solid silver; margin-left: -50px;">
                     
                        <h5>
                        <ul >
                        <textarea name="description" style="width: 300px;height: 150px;">   <?php echo $results["description"]; ?></textarea>
              
                        </ul>  
                        </h5>
                    </div>
                </div>		
	</div>
</div>
</div>

</form>

  </body>
</html>
