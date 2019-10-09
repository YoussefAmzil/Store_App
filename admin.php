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
  <title>Admin-info</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<script type="text/javascript">
  function test($id){
alert($id);

  }
      function categor_affich($id){
var id_cat=$id;
alert(id_cat);

$.ajax
({
type: "POST",
url: "affich_cat_adm.php",
data: 'id_cat='+id_cat,
success: function(server_response)
{
 
$("#categorr").html(server_response)
}
})

  }

  function del_pro($id){
        var r=confirm("vous voulez supprimer le produit numéro  " +$id);
    if (r == true) {

      $.ajax
({
type: "POST",
url: "delet_prod.php",
data: 'id_prod='+$id,
success: function(server_response)
{
 
$("#delet").html(server_response)
}
})

} else {

} 
  }
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
              
        $("#add_cat").submit(function(){
            $.ajax({type:"POST", data: $(this).serialize(), url:"add_categorie.php",
                success: function(data){
                    $("#add_cat_response").html(data);
                      
                },
                            error: function(){
                        $("#add_cat_response").html('Une erreur est survenue.');
                }
            });
            return false;
        });    
});
</script>
  <script type="text/javascript">
    $(document).ready(function(){
              
        $("#add_prdod").submit(function(){
            $.ajax({type:"POST", data: $(this).serialize(), url:"add_prod.php",
                success: function(data){
                    $("#add_prod_response").html(data);
                      
                },
                            error: function(){
                        $("#add_prod_response").html('Une erreur est survenue.');
                }
            });
            return false;
        });    
});
</script>
<script type="text/javascript">
function envoi(){
$("#add_prod").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);

        $.ajax({  
             type: "POST",  
             url: "add_prod.php",  
             data: formData,
             async: false,
             cache: false,
             contentType: false,
             processData: false,
             success: function(data) {
                 $("#add_prod_response").html(data);
             }
        }); 
        return false;
})
}
function envoi_imgs(){
$("#upload_img").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);

        $.ajax({  
             type: "POST",  
             url: "upload_img.php",  
             data: formData,
             async: false,
             cache: false,
             contentType: false,
             processData: false,
             success: function(data) {
                 $("#imgs").html(data);
             }
        }); 
        return false;
})
}
</script>
   <!-- JQuery -->
   <div>
   <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin.php"><strong style="color: yellow;">SOUK-INFO</strong></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="admin.php"  style="color: white;" ><span class="glyphicon glyphicon-user" style="color: yellow;"></span>                          <strong><?php echo $nom;  ?></strong></a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-plus" style="color:white;"></i>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#" data-toggle="modal" data-target="#bs"><strong>Ajouter un catégorie</strong></a></li>
          <li><a href="#" data-toggle="modal" data-target="#bss"><strong>Ajouter un produit</strong></a></li>
          <li><a href="#" data-toggle="modal" data-target="#img"><strong>Modifier images pub</strong></a></li>
        </ul>
      </li>
      <li><a href="logout_ad.php"  style="color: white;" ><span class="glyphicon glyphicon-log-in"></span> Déconnexion</a></li>
 
    </ul>


</form>
  </div>
</nav>
<!-- Centered Tabs -->
</div>

<div class="" style="margin-top: 55px;">
<ul class="nav nav-pills nav-justified">
  <li class="active"><a href="admin.php">liste des produits</a></li>
  <li><a href="liste_client.php">listes des clients</a></li>
   <li><a href="liste_commande.php">listes des commandes</a></li>
  <li><a href="liste_email.php">Mes emails<span style="margin-top:'.$top.'px; background-color:red;" class="badge"><?php
  echo email_lue();  ?></span></a></li>

</ul></div>
<div id="delet"></div>
<div style="display: inline; float: right;margin-right: 20px; margin-top: 30px;" class="col-md-2"> 
<div class="alert alert-success" role="alert"> <center> Catégoris </center></div>
<?php  

  $recor = $bdd->prepare('SELECT * FROM  categorie ');
            $recor->execute();
            echo '<div class="list-group">';
           while( $resul = $recor->fetch(PDO::FETCH_ASSOC)){
            $nom=$resul['nom_cat'];
            $id_cat=$resul['id_categorie'];
            $n=cat_num($id_cat);

echo '
          
            <a class="list-group-item btn" onclick="categor_affich('.$id_cat.')"; id="col">'.$nom.'<span style="margin-top:-16px; background-color:green;" class="badge">'.$n.'</span></a>
          ';

           }
echo "</div>";
?>
</div>

<!-- tableau -->
<div class="col-md-9" style="width: 780px;height: 700px; display: inline; margin-top: 40px;">
                <div class="row" id="categorr">
<?php 
include("par.php");
    $records = $bdd->prepare('SELECT * FROM  produit');
            $records->bindParam(':email', $email);
            $records->execute();
            while($results = $records->fetch(PDO::FETCH_ASSOC)){
              echo '   <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="image/'.$results["image"].'"  style="width: 320px;height: 150px;">
                            <div class="caption">
                           <a href="update_prod.php?action='.$results['id_prod'].'"><i class="glyphicon glyphicon-pencil btn" style="color:green;" data-toggle="modal" data-target="#uplad"></i></a><i class="glyphicon glyphicon-remove btn" style="margin-left:120px; color:red;" onclick="del_pro('.$results['id_prod'].');"></i>
                            <h4><a href="">'.$results['nom_prod'].'</a>
                                </h4> <h4 class="pull-right" style="">$ '.$results['prix'].'</h4>
                               
                                
                                <p>'.$results['description'].'</p>
                            </div>
                            <div class="ratings"> stock:
                                '.$results['nbr_stock'].'
                            </div>
                        </div>
                    </div> ';
            }

 ?>


                </div></div>
<!-- fin tableau -->
<!-- Large modal categories-->
<div>
<div class="modal fade" tabindex="-1" role="dialog" id="bs">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><center> Ajouter un categorie</center></h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" id="add_cat" method="POST">
  <div class="form-group" style="">
    
    <div class="col-sm-10">
    <label for="inputEmail3" class="col-sm-4 control-label">Nom de catégorie</label>
      <input type="text" class="form-control" id="inputEmail3" placeholder="catégorie" style="width: 200px;height: 30px;" name="name_cat">
    </div>
    <div id="add_cat_response"></div>
  </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" style="color:blue;" data-dismiss="modal">Close</button>
         <input type="submit" class="btn btn-default " value="Ajouter">
      </div>
      </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

</div>
<!--fin Large modal -->
<!-- Large modal produit-->
<div>
<div class="modal fade" tabindex="-1" role="dialog" id="bss">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><center>Ajouter un produit</center></h4>
      </div>
      <div class="modal-body">
 <form class="form-horizontal" id="add_prod" enctype="multipart/form-data" method="POST" >
 <input type="hidden" name="MAX_FILE_SIZE" value="12340000005" >
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Nom de produit</label>
      <input type="text" class="form-control" id="inputEmail3" placeholder="Nom de produit" style="width: 200px;height: 30px;" name="nom_prod">
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">catégorie produit</label>
      <select class="form-control" style="width: 200px;" name="cat_prod">
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
    
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">réference produit</label><input type="text" class="form-control" id="inputEmail3" placeholder="réference produit" style="width: 200px;height: 30px;" name="reference">
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Nombre stock</label><input type="text" class="form-control" id="inputEmail3" placeholder="Nombre stock" style="width: 200px;height: 30px;" name="nbr_stock">
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">description</label><textarea name="description" style="width: 200px;height: 50px;"></textarea>
  </div>
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Prix</label><input type="text" class="form-control" id="inputEmail3" placeholder="Prix" style="width: 200px;height: 30px;" name="prix">
  </div>

  <div class="form-group">
  <label for="inputEmail3" class="col-sm-4 control-label">Image de produit</label>
<input type="file" name="images" class="glyphicon glyphicon-step-backward">                 
  </div>

<div id="add_prod_response">ezez</div>
  <div class="form-group">
     <div class="modal-footer">
        <button type="button" class="btn btn-default" style="color:blue;" data-dismiss="modal">Close</button>
      
         <button type="submit" class="btn btn-default" onclick="envoi();">Ajouter</button>
      </div>
  </div>
</form>

      </div>
    </div><!-- /.modal-content -->
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="img">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><center> Modifer images publication</center></h4>
      </div>
      <div class="modal-body">
      <form method="POST" id="upload_img" enctype="multipart/form-data">
       <input type="hidden" name="MAX_FILE_SIZE" value="12340000005" >
          <?php  
include("par.php");
  $recordd = $bdd->prepare('SELECT * FROM  images ');
            $recordd->execute();
    $resultt = $recordd->fetch(PDO::FETCH_ASSOC);
 $id_img=$resultt["id_image"];
 $img1=$resultt["image1"];
 $img2=$resultt["image2"];
  $img3=$resultt["image3"];
echo '<p>image1</p> <img src="image/'.$img1.'"  style="width: 200px;height: 100px;"><input type="file" name="img1"> <br>';
echo '<p>image2</p> <img src="image/'.$img2.'"  style="width: 200px;height: 100px;"><input type="file" name="img2"> <br>';
echo '<p>image3</p> <img src="image/'.$img3.'"  style="width: 200px;height: 100px;"><input type="file" name="img3"> <br>';
?>
<div id="imgs"></div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" style="color:blue;" data-dismiss="modal">Close</button>
         <input type="submit" class="btn btn-default " value="Update" onclick="envoi_imgs();">
      </div>
</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


</body>
<?php
function cat_num($id){
  include("par.php");
  $recordd = $bdd->prepare('SELECT count(id_prod) FROM produit WHERE categor_pro LIKE (
    SELECT nom_cat FROM categorie WHERE id_categorie = :id)');
   $recordd->bindParam(':id', $id);
            $recordd->execute();
            $rowCount = $recordd->fetchColumn(0);
            return $rowCount;
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
 ?>
</html>