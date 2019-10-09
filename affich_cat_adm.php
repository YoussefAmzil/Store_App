<?php 
 session_start();
 $id=$_POST["id_cat"];
if(isset($_SESSION['id_admin'])){
include ("par.php");

            $records = $bdd->prepare('SELECT * FROM produit WHERE categor_pro LIKE (
    SELECT nom_cat FROM categorie WHERE id_categorie = :id
)');
            $records->bindParam(':id', $id);
           if( $records->execute()){

            while($results = $records->fetch(PDO::FETCH_ASSOC)){
                    echo '   <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="image/'.$results["image"].'"  style="width: 320px;height: 150px;">
                            <div class="caption">
                           <i class="glyphicon glyphicon-pencil btn" style="color:green;" onclick="test('.$results['id_prod'].');"></i><i class="glyphicon glyphicon-remove btn" style="margin-left:120px; color:red;" onclick="del_pro('.$results['id_prod'].');"></i>
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

        }
        else echo "error requete";
    }
    $bdd=null;
?>