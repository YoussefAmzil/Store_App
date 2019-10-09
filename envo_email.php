	<?php 
	if (empty($_POST["nom"])||empty($_POST["maill"])||empty($_POST["msg"])) {
		echo '<div style="float:left; margin-left:10px; margin-top:0px;" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>attention!</strong> un ou plusieurs champs sont vide !!.
</div>';
	}
	else{
	/*insertion des données */
	$nom=htmlentities($_POST["nom"]);
	$emaill=htmlentities($_POST["maill"]);
$message=htmlentities($_POST["msg"]);

	include("par.php");
$x=0;
$req = $bdd-> prepare ('INSERT INTO email (nom,message,date_rec,etat_email,email_user) VALUES(:nom,:msg, :dat,:etat,:tmail)');

$dat=date("Y-m-d H:i:s");
	    $req ->bindParam (':nom',$nom );
		$req ->bindParam (':msg',$message );
		$req ->bindParam (':dat',$dat);
		$req ->bindParam (':tmail',$emaill);
		$req ->bindParam (':etat',$x);
		if($req->execute()) {
	#------------------------------------------------------------------------------#
		echo '<div style="float:left; margin-left:10px; margin-top:0px;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>filicitation!</strong> Votre email est bien envoyé  !!.
</div>';
		}
	
	else {
	//header("Location: Authentication.php");
	echo '<div style="float:left; margin-left:10px; margin-top:0px;" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Attention!</strong> votre email n est pas envoyé essayez!!.
</div>';
	}
	###############################################################






			/*$req = $conx-> prepare ('INSERT INTO membre (Prenom,Email,Mot_passe) VALUES(:Prenom, :Email, :Mot_passe )');
	    $req ->bindParam (':Prenom',$nom );
		$req ->bindParam (':Email',$email );
		$req ->bindParam (':Mot_passe',$pas );

		if($req->execute()) {
	#------------------------------------------------------------------------------#
			sleep(2);
			header("Location: Authentication.php");
		
	}*/ 
	
	####
}
	  $bdd=null;
	 ?>


