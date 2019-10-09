<?php  
$id_cl=$_POST["id_cli"];
$id_prod=$_POST["id_prod"];
$quan=$_POST["quant"];
test_comm($id_cl,$id_prod,$quan);
function test_comm($id_cl,$id_prod,$quan){
	include("par.php");
	 $recordss = $bdd->prepare('SELECT * FROM  commande WHERE id_client = :id AND id_prod = :id2');
            $recordss->bindParam(':id',$id_cl);
            $recordss->bindParam(':id2',$id_prod);
            $recordss->execute();
            if($resultss = $recordss->fetch(PDO::FETCH_ASSOC)>0){
            	echo'<div style="float:left; margin-left:20px; margin-top:8px;" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>attention!</strong> cette commande est deja existe  !!.
</div>';
            }
            else {
            	   $records = $bdd->prepare('SELECT * FROM  produit where id_prod=:idd');
            $records->bindParam(':idd', $id_prod);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);
            $nomm=$results["nom_prod"];
            ajouter_comm($id_prod,$id_cl,$nomm,$quan);
            }
      
}

function ajouter_comm($id_prod,$id_cl,$nom,$Quant){
include("par.php");
$req = $bdd-> prepare ('INSERT INTO commande (id_prod,id_client,nom_prod,quantite,date_comm,etat_comm) VALUES(:prod,:client, :nom,:quant,:dat,:etat)');
$etat=0;
$dat=date("Y-m-d H:i:s");
	    $req ->bindParam (':prod',$id_prod);
		$req ->bindParam (':client',$id_cl);
		$req ->bindParam (':nom',$nom);
		$req ->bindParam (':quant',$Quant);
		$req ->bindParam (':etat',$etat);
		$req ->bindParam (':dat',$dat);

		if($req->execute()) {
			echo '<div style="float:left; margin-left:20px; margin-top:8px;" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>felicitation!</strong> votre commande est bien faite  !!.
</div>';
		}
		else{
			echo "requete error!!";
		}

}
?>