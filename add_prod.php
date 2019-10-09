	<?php 

	$nom=$_POST["nom_prod"];
	$cat=$_POST["cat_prod"];
	$reference=$_POST["reference"];
$stock=$_POST["nbr_stock"];
   	 $desc=$_POST["description"];
 $prix=$_POST["prix"];
$target="image/".basename($_FILES["images"]["name"]);
	$image=$_FILES["images"]["name"];	

if (move_uploaded_file($_FILES["images"]["tmp_name"],$target)) {
echo '<img src="image/'.$image.'"  style="width: 100px;height: 150px;">';

include("par.php");

				$req = $bdd-> prepare ('INSERT INTO produit (nom_prod,categor_pro,refe_prod,nbr_stock,description,image, 	prix) VALUES (:nom,:cat, :ref,:nbr,:descr,:image,:prix )');
	    $req ->bindParam (':nom',$nom );
		$req ->bindParam (':cat',$cat );
		$req ->bindParam (':ref',$reference);
		$req ->bindParam (':nbr',$stock);
		$req ->bindParam (':descr',$desc );
		$req ->bindParam (':image',$image);
 		$req ->bindParam (':prix',$prix);
		if($req->execute()) {
	#------------------------------------------------------------------------------#
		

		echo '<div style="float:left; margin-left:20px; margin-top:8px;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>filicitation!</strong> Votre produit est bien ajouté !!.
</div>';

		}
	
	else {
	//header("Location: Authentication.php");
	echo '<div style="float:left; margin-left:20px; margin-top:8px;" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Attention!</strong> error requete !!.
</div>';
	}



	}else{
		echo $msg="pas inserer";
	}

	

 $bdd=null;
	 ?>


