	<?php 
	
	/*insertion des données */
	$nom=$_POST["name"];
	$adresse=$_POST["adresse"];
	$telephone=$_POST["tele"];
	$email=$_POST["email_sign"];
	$pas=$_POST["pass_sign"];
	$pas2=$_POST["pass_sign2"];

	$x=0;
	include("par.php");
	if ($pas==$pas2) {####
	$stmt = $bdd->query('SELECT * FROM user');
	while($message = $stmt->fetch())
	{
		// Utilisation des données.
		if($email== $message[4]){
			//echo "egale.<br>";
			$x=1;
			//
		}
	}
	if($x==0){
				$req = $bdd-> prepare ('INSERT INTO user (nom,adresse,telephone,email,mot_passe,date_re) VALUES(:nom,:adr, :tele,:email,:password,:dat )');
$dat=date("Y-m-d H:i:s");
	    $req ->bindParam (':nom',$nom );
		$req ->bindParam (':adr',$adresse );
		$req ->bindParam (':tele',$telephone);
		$req ->bindParam (':email',$email );
		$req ->bindParam (':password',$pas );
		$req ->bindParam (':dat',$dat);

		if($req->execute()) {
	#------------------------------------------------------------------------------#
		echo '<div style="float:left; margin-left:20px; margin-top:8px;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>filicitation!</strong> Votre compte est bien créer  !!.
</div>';
		}
	}
	else {
	//header("Location: Authentication.php");
	echo '<div style="float:left; margin-left:20px; margin-top:8px;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Attention!</strong> cet email existe déja !!.
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
	  }	else echo '<div style="float:left; margin-left:20px; margin-top:8px;" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Attention!</strong> Votre mot de passe est incorrect !!.
</div>';
	  $bdd=null;
	 ?>


