      <?php  
      $user='root';
      $passw='';
      try {
 $bdd = new PDO('mysql:host=localhost;dbname=souk-info',$user,$passw); 
           }
       catch(Exception $e){
        echo $e->getMessage();
       }
      ?>