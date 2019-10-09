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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
      <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
          <script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
  function test(){
alert("test");

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
    <input type="text" class="form-control"  id="search">
    <div class="input-group-btn">
      <button class="btn btn-default disable" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>
  </div>
</nav>
 <div id="result_search" style="margin-left: 30%;margin-right: 30%;"></div>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
<div style="display: inline; float: right;margin-right: 20px;" class="col-md-2"> 
<div class="alert alert-success" role="alert"> <center> Catégoris </center></div>
<?php  
include("par.php");
  $recor = $bdd->prepare('SELECT * FROM  categorie ');
            $recor->execute();
            echo '<div class="list-group">';
           while( $resul = $recor->fetch(PDO::FETCH_ASSOC)){
            $nom=$resul['nom_cat'];
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
          
            <a class="list-group-item btn" onclick="categor_affich('.$id_cat.')"; id="col">'.$nom.'<span style="margin-top:'.$top.'px; background-color:green;" class="badge">'.$num.'</span></a>
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
                            <h4><a href="prod.php?action='.$results['id_prod'].'">'.$results['nom_prod'].'</a>
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
                    </div>
                 

                </div>

            </div>

        </div>
        </div>
        <!-- Large modal login -->


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
</div><!-- /.modal -->
<!-- fin Large modal register -->
<div class="modal fade" tabindex="-1" role="dialog" id="test">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><center>
        <h4 class="modal-title"><i  class="glyphicon glyphicon-user prefix" aria-hidden="true"></i> Récuperez mot de passe!</h4></center>
      </div>
      <div class="modal-body">
 <form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" style="width: 200px;height: 30px;">
    </div>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Récuperer</button>
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
$bdd=null;
 ?>

</html>
