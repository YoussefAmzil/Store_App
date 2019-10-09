<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <title>Contactez nous</title>
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
      <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
      <![endif]-->
      <script type="text/javascript">
    $(document).ready(function(){
              
        $("#email").submit(function(){
            $.ajax({type:"POST", data: $(this).serialize(), url:"envo_email.php",
                success: function(data){
                    $("#email_response").html(data);
                      
                },
                            error: function(){
                        $("#email_response").html('Une erreur est survenue.');
                }
            });
            return false;
        });    
});
</script>
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
      <li><a href="qui_sommes_nous.php"  style="color: white;">Qui sommes-nous</a></li>
      <li class="active"><a href="Contact.php"  style="color: white;">Contact</a></li>
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
      <li><a href="qui_sommes_nous.php"  style="color: white;">Qui sommes-nous</a></li>
      <li class="active"><a href="Contact.php"  style="color: white;">Contact</a></li>
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
   <body class="size-1140">
      <!-- TOP NAV WITH LOGO -->  
      <header>

      </header>
      <section>
      
         <div id="content" class="left-align contact-page">
            <div class="line">
               <div class="margin">
                  <div class="s-12 l-6">
                     <h2>Adresse</h2>
                     <address>
                        <p><i class="glyphicon glyphicon-home"></i>N 3 Bis, Bloc 3, Cité Hassani 80020, Agadir. Maroc</p>
                        <p><i class="glyphicon glyphicon-globe"></i> Agadir - Maroc</p>
                        <p><i class="glyphicon glyphicon-envelope"></i> contact@souk-info.com</p>
                        <p><i class="glyphicon glyphicon-earphone"></i>+212 6 61 08 89 07/+212 6 61 08 89 07</p>
                        <p><i class=" glyphicon glyphicon-phone-alt"></i>+212 5 28 29 22 26</p>
                     </address>
                     <br />
                     <h2>Social</h2>
                     <p><i class="  fa fa-facebook"></i> <a href="https://fr-fr.facebook.com/soukinfo">Facebook</a></p>
                     <p><i class="fa fa-google-plus"></i> <a href="https://www.facebook.com/myresponsee">Google plus</a></p>
                     <p class="margin-bottom"><i class="fa fa-twitter"></i> <a href="https://twitter.com/MyResponsee">Twitter</a></p>
                  </div>
                  <div class="s-12 l-6">
                     <h2>Envoyez un email:</h2>
                     <form class="customform" action="" id="email" method="POST">
                     <?php  
                     if(isset($_SESSION['id_user'])){
                   echo '<div class="s-12 l-7"><input name="maill" placeholder="Your e-mail" title="Your e-mail" type="text" value= '.$email.' ></div>
                        <div class="s-12 l-7"><input name="nom" placeholder="Your name" title="Your name" type="text" value='.$nom.'></div>';
                     }
                     else{
                       echo '<div class="s-12 l-7"><input name="maill" placeholder="Your e-mail" title="Your e-mail" type="text"  /></div>
                        <div class="s-12 l-7"><input name="nom" placeholder="Your name" title="Your name" type="text"/></div>';
                     }
                     ?>

                        
                        <div class="s-12"><textarea placeholder="Your massage" name="msg" rows="5"></textarea></div>
                        <div class="s-12 m-6 l-4"><button type="submit">Envoyer</button></div>
                     </form>
                     
                  </div>
               </div><div id="email_response"></div>
            </div>
         </div>
         <!-- MAP -->	
         <div id="map-block">  	  
        <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3440.788571941011!2d-9.586902685380483!3d30.4137399817494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0xdb3b68d27d5f00b%3A0x5b6b1ba38e242278!2sSOUK+INFO+S.a.r.l.%2C+N%D8%8C+Oued+Ziz%2C+Agadir+80000%2C+Maroc!3m2!1d30.413739999999997!2d-9.584714!5e0!3m2!1sfr!2sfr!4v1494278098711" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
         </div>
 
      </section>
      <!-- FOOTER -->   

 
 <footer class="container-fluid">
<p style="color: white;"><strong><center> tous les droits sont réservés</center></strong></p>
    </footer>
   </body>
</html>