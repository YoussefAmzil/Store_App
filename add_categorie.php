	<?php 
	/*insertion des données */
	$nom=htmlentities($_POST["name_cat"]);
	if (empty($nom)) {
	echo '<div style="float:left; margin-left:20px; margin-top:8px;" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>attention!</strong> le champs est vide !!.
</div>';
	}
	else{
	include("par.php");

				$req = $bdd-> prepare ('INSERT INTO categorie (nom_cat) VALUES(:nom)');
	    $req ->bindParam (':nom',$nom );

		if($req->execute()) {
	#------------------------------------------------------------------------------#
		echo '<div style="float:left; margin-left:20px; margin-top:8px;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>filicitation!</strong> Votre categorie est bien ajouté  !!.
</div>';
		}
	
	else {
	//header("Location: Authentication.php");
	echo '<div style="float:left; margin-left:20px; margin-top:8px;" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Attention!</strong> errur requete !!.
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
		
	}*/ }
	  $bdd=null;
	 ?>


