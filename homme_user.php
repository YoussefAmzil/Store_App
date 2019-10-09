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
  }
      function categor_affich($id){
var id_cat=$id;
alert(id_cat);

$.ajax
({
type: "POST",
url: "affich_cat.php",
data: 'id_cat='+id_cat,
success: function(server_response)
{
 
$("#categorr").html(server_response)
}
})

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
    $(document).ready(function(){
    $('#search').keyup(function()
{
    var txt=$(this).val();
if(txt!=''){

$.ajax({
          url:"fetch.php",
          method:"POST",
          data:{search:txt},
          dataType:"text",
          success:function(data){
            $('#result_search').html(data);}
    });
}
else
{

    $('#result').html('');
    $.ajax({
          url:"fetch.php",
          method:"POST",
          data:{search:txt},
          dataType:"text",
          success:function(data){
            $('#result_search').html(data);}
    });
    
}
});
    });
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
    <li><a href="liste_commande_user.php"><strong>Mes commandes</strong></a></li>
    <li><a href="" data-toggle="modal" data-target="#pass"><strong>changer mot de passe</strong></a></li>
    <li><a href="logout.php"><strong style="color: green;">Déconnexion</strong></a></li>
   <li><a href="" data-toggle="modal" data-target="#test"><strong>test</strong></a></li>
  </ul>
</div>
      </li>
    </ul>
    <form class="navbar-form navbar-left">
  <div class="input-group">
    <input type="text" class="form-control"  id="search">
    <div class="input-group-btn">
      <button class="btn btn-default disabled" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>

  </div>
</nav>
 <div id="result_search" style="margin-left: 30%;margin-right: 30%;">

</div>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
<div style="display: inline; float: right;margin-right: 20px;" class="col-md-2"> 
<div class="alert alert-success" role="alert"> <center> Catégoris </center></div>
<?php  

  $recor = $bdd->prepare('SELECT * FROM  categorie ');
            $recor->execute();
            echo '<div class="list-group">';
           while( $resul = $recor->fetch(PDO::FETCH_ASSOC)){
            $nom_cat=$resul['nom_cat'];
            $id_cat=$resul['id_categorie'];
            $num=cat_num($id_cat);
                        if(preg_match('/Firefox/i',$_SERVER['HTTP_USER_AGENT'])){
   // action conditionnelle à Firefox
$top=-16;
}
else{
  $top=0;
}

echo '
          
            <a class="list-group-item btn" onclick="categor_affich('.$id_cat.')"; id="col">'.$nom_cat.'<span style="margin-top:'.$top.'px; background-color:green;" class="badge">'.$num.'</span></a>
          ';

           }
echo "</div>";
?>
</div>
     

            <div class="col-md-9">

                <div class="row carousel-holder" >

                    <div class="col-md-12">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
<?php  
include("par.php");
  $recordds = $bdd->prepare('SELECT * FROM  images ');
            $recordds->execute();
    $resultt = $recordds->fetch(PDO::FETCH_ASSOC);
 $img1=$resultt["image1"];
 $img2=$resultt["image2"];
 $img3=$resultt["image3"];  ?>

    <div class="item active">
      <img src=<?php echo "image/".$img1 ?> src="image/'.$img3.'"  style="width: 800px;height: 300px">
    </div>

    <div class="item ">
      <img src=<?php echo "image/".$img2 ?> src="image/'.$img3.'"  style="width: 800px;height: 300px">
    </div>

   <div class="item ">
      <img src=<?php echo "image/".$img3 ?> src="image/'.$img3.'"  style="width: 800px;height: 300px">
    </div>
  
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                    </div>

                </div>

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
                            <h4><a href="prod_user.php?action='.$results['id_prod'].'">'.$results['nom_prod'].'</a>
                                </h4>
                                <h4 class="pull-right">$ '.$results['prix'].'</h4>
                                
                                <p>'.$results['description'].'</p>
                            </div>
                            <div class="ratings"> stock:
                                '.$results['nbr_stock'].'
                            </div>
                        </div>
                    </div> ';
            }

 ?>


                </div>


  <!-- Large modal register -->
<!-- Large modal -->
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

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="" data-target=".bs-example-modal-lg">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><center></center> Mes commandes</h4>
      </div>
      <div class="modal-body">
            <div class="tab-pro" style="margin-left: -15px;">
           <table class="table table-bordered">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
       <th>Id produit</th>
      <th>nom produit</th>
      <th>marque produit</th>
      <th>réference produit</th>
       <th>commander</th>
        <th>suprimer</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Ottoklrgjrthjtihjtilhtlkhjtklhntlhtyklhntyklhtkl</td>
      <td>@mdo</td>
      <td>Mark</td>
     

    </tr>
      <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
    </tr>
  </tbody>
</table>
</div>
    </div><!-- /.modal-content -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Mise à jour">
      </div>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="test">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      ...

    </div>
  </div>
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
 ?>
</html>
