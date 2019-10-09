<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <title>qui sommes nous</title>
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css">
       <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-social.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- CUSTOM STYLE -->  
      <link rel="stylesheet" href="css/template-style.css">
      <link rel="stylesheet" href="css/style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/responsee.js"></script>   
      <?php 
session_start();
if (isset($_SESSION['id_user'])) {
include("par.php");
  $recordss = $bdd->prepare('SELECT * FROM  user WHERE id_user = :id');
            $recordss->bindParam(':id',$_SESSION['id_user']);
            $recordss->execute();
            $resultss = $recordss->fetch(PDO::FETCH_ASSOC);
             $nom=$resultss['nom'];
             $email=$resultss['email'];
echo '<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="homme_user.php"><strong style="color: yellow;">SOUK-INFO</strong></a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="homme_user.php"  style="color: white;">Acceuill</a></li>
      <li class="active"><a href="qui_sommes_nous.php"  style="color: white;">Qui sommes-nous</a></li>
      <li ><a href="Contact.php"  style="color: white;">Contact</a></li>
      <li><a href="#"  style="color: white;">Page 2</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="homme_user.php"  style="color: white;" data-toggle="modal" data-target="#sign" ><span class="glyphicon glyphicon-user" style="color: yellow;"></span> <strong>'.$nom.'</strong></a></li>
    </ul>

  </div>
</nav>';
}
else{
echo '<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="homme.php"><strong style="color: yellow;">SOUK-INFO</strong></a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href=homme.php;  style="color: white;">Acceuill</a></li>
      <li class="active"><a href="qui_sommes_nous.php"  style="color: white;">Qui sommes-nous</a></li>
      <li ><a href="Contact.php"  style="color: white;">Contact</a></li>
      <li><a href="#"  style="color: white;">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login_user.php"  style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
  
    </ul>
   </div>
</nav>';
}
 ?>

</head>
<body>
<div style="margin-top: 80px;">
<div class="jumbotron" >
  <div class="container" style="display: inline;">
  <center>
   <h4>
     Société Commerciale au capital de 100 000 .00 dhs<br>
N° individuel d'identification fiscal : 40115794<br>
Patente : 48159780<br>
RC : 18001<br>
Date de création : 2009
   </h4>
   </center>
  </div>
  <div>
  <center>
    <p><u>Nos activités</u></p>
    </center>
  </div>
  <div>
   <ul style="margin-left: 43%;">
     <li>
       <h5>Réseaux informatiques</h5>
     </li>  
     <h5><li>Réseaux téléphoniques:Réseaux téléphoniques</li></h5>
      <li><h5>Maintenance et réparation</h5></li>
      <li><h5>VENTE</h5></li>
         </ul>

  </div>
    <div>
  <center>
    <p><u>Nos Adresses et Téléphones:</u></p>
    </center>
  </div>
  <ul style="margin-left: 43%;">
     <li>
       <h5>ADRESSE : N° 3 Bis, Bloc 3 Cité Hassani 80020 Agadir Maroc</h5>
     </li>  
     <h5><li>TEL/FAX: 0528292226/0528233335</li></h5>
      <li><h5>Adresse du courrier électronique : contact@souk-info.com</h5></li>
      
         </ul>
</div>
</div>
</body>
</html>