<?php

class Membre {

   private $id_prod;
   private $nom_prod;
   private $categor_pro;
   private $refe_prod;
   private $nbr_stock;
   private $description;
   private $image;
   private $prix;

        public function __construct(){
        	switch(func_num_args()){
			    case 6:
			      $this->Construteur_insc(func_get_arg(0), func_get_arg(1),func_get_arg(2),func_get_arg(3),func_get_arg(4),func_get_arg(5));
			    break;
			    case 4:
			      $this->Constructeur_update(func_get_arg(0), func_get_arg(1),func_get_arg(2),func_get_arg(3),func_get_arg(4));
			    break;
			    case 1:
			      $this->Constructeur_con(func_get_arg(0));
			    break;
			  }
        }
		public function Construteur_insc($id,$nom,$mail,$pasw,$naiss,$sexe){
				$this->ID_mbr=$id;
				$this->prenom=$nom;
				$this->email=$mail;
				$this->mot_passe=$pasw;
				$this->naissance=$naiss;
				$this->sexe=$sexe;

			}

        public function Constructeur_update($id,$prenom,$telephone,$adresse,$search){

				$this->telephone=$telephone;
				$this->adresse=$adresse;
				$this->search=$search;
				$this->prenom=$prenom;
				$this->ID_mbr=$id;


			}

		 public function Constructeur_con($etat){

				$this->etat=$etat;
			}





		public function setid_prod($id){
		$this->$id_prod=$id;
		}
		public function getID_mbr(){
			return $this->ID_mbr;
		}

		public function setPrenom($prenom){
		$this->prenom=$prenom;
		}
		public function getPrenom(){
			return $this->prenom;
		}

		public function setEmail($mail){
		$this->email=$mail;
		}
		public function getEmail(){
			return $this->email;
		}

		public function setMot_passe($pasw){
		$this->mot_passe=$pasw;
		}
		public function getMot_passe(){
			return $this->mot_passe;
		}

		public function setNaissance($date){
		$this->naissance=$date;
		}
		public function getNaissance(){
			return $this->naissance;
		}

		public function setSexe($sexe){
		$this->sexe=$sexe;
		}
		public function getSexe(){
			return $this->sexe;
		}

		public function settelephone($mobile){
		$this->telephone=$mobile;
		}
		public function gettelephone(){
			return $this->telephone;
		}

		public function setAdresse($adr){
		$this->adresse=$adr;
		}
		public function getAdresse(){
			return $this->adresse;
		}

		public function setSearch($src){
		$this->search=$src;
		}
		public function getSearch(){
			return $this->search;
		}

		public function setImg_pro($pro){
		$this->img_pro=$pro;
		}
		public function getImg_pro(){
			return $this->img_pro;
		}

		public function setImg_cov($cov){
		$this->img_cov=$cov;
		}
		public function getImg_cov(){
			return $this->img_cov;
		}

		public function setEtat($etat){
		$this->etat=$etat;
		}
		public function getEtat(){
			return $this->etat;
		}
		public function affich_test(){
			echo $this->etat;
		}
#####################################################################
		
	    public function test_inscr(){
	    	$x=0;
         include('param-bd.php');
         $stmt = $bdd->query('SELECT *FROM membre');

          	while($result = $stmt->fetch()){
		// Utilisation des données.
		if($this->email== $result[2]){
			//echo "egale.<br>";
			$x=1;
		}
	}
	    if($x==0){
				$req = $bdd-> prepare ('INSERT INTO membre (Prenom,Email,Mot_passe,Naissance,Sexe) VALUES(:Prenom, :Email, :Mot_passe,:datee,:sex )');
	    $req ->bindParam (':Prenom', mysql_real_escape_string($this->prenom));
		$req ->bindParam (':Email',mysql_real_escape_string($this->email));
		$req ->bindParam (':Mot_passe',mysql_real_escape_string($this->mot_passe));
		$req ->bindParam (':datee',$this->naissance);
		$req ->bindParam (':sex',mysql_real_escape_string($this->sexe));

		if($req->execute()){
			return $success='b1 inscrit';
			//header(location);
		}


	    }
	    else{
	    	return $failed='ce email existe deja ';
	    }
	     include('param-bd-off.php');
	}
######################################################################

	public function update_info($id,$nom,$telephone,$adresse,$search){
     include('param-bd.php');
     $sql="UPDATE membre
   SET Prenom = :prenom,
       Telephone = :telephone,
       Adresse = :adresse,
       search = :search

 WHERE ID_MBR = :id";
 $statement = $bdd->prepare($sql);
 $statement->bindValue(":prenom", $nom);
 $statement->bindValue(":telephone", $telephone);
 $statement->bindValue(":adresse", $adresse);
 $statement->bindValue(":search", $search);
 $statement->bindValue(":id", $id);
 if($statement->execute()){
 	return $success='bien update !!';
 }
     include('param-bd-off.php');
 }
######################################################################
 public function envoyer_invit(){

 }
#####################################################################
 function invitation($ID_MBR,$ID_AMIS){
include('param-bd.php');
//echo "debut d invitation<br>";

 $DATE_INV =date("Y-m-d H:i:s");
 $etat=0;
      $req = $bdd-> prepare ('INSERT INTO invitation (ID_MBR_ENV,ID_MBR_REC,DATE_INV,etat) VALUES(:ID_MBR_ENV,:ID_MBR_REC,:DATE_INV,:etat)');
      $req ->bindParam (':ID_MBR_ENV',$ID_MBR );
    $req ->bindParam (':ID_MBR_REC',$ID_AMIS);
    $req ->bindParam (':DATE_INV',$DATE_INV );
    $req ->bindParam (':etat',$etat);

    if($req->execute()) {
  #------------------------------------------------------------------------------#
  return $success='invitation est b1 envoyé !!!';    
    }
  else {
  return  $failed='erreur! a lenvoi';
  }

  include('param-bd-off.php');
 }
 ################################################################


}

	//$ms = new Membre();
	//echo $ms->invitation('4','4');

 ?>
