<?php
session_start();


include('header.php'); 
include('database.php'); 

  
  include('includes/constants.php'); 


   if(isset($_POST['submit'])){

          $name = htmlspecialchars($_POST['name']);
         $sujet = htmlspecialchars($_POST['sujet']);
          $categorie = htmlspecialchars($_POST['categorie']);
//        echo 'bien jouer';
//    }else{
//            echo 'mal jouer';
//        }
       if(!empty($name) && !empty($sujet) && !empty($categorie)){
    
         //   echo "c'est pas vide";
                 if(strlen($name) <5 || strlen($sujet) < 5 || strlen($categorie)){

                    // if(strlen($sujet) > 3){
                         echo 'le champs ou le suject est petit';
                    }
                    if(strlen($name) > 5 && strlen($sujet) > 5 && strlen($categorie)){
                     // echo " c'est bon";
       $requete = $connect->prepare('INSERT INTO suject(name,categorie) VALUES(:name,:categorie)');

                  $requete->execute([
                      'name' => $name,
                      'categorie' => $categorie
                    ]);


          $requete2 = $connect->prepare('INSERT INTO postSujet(propri,contenu,date,sujet) VALUES (:propri,:contenu,now(),:sujet)');
                  $requete2->execute([
                      'propri' => $_SESSION['id'],
                      'contenu' => $sujet,
                      'sujet'  => $name
                    ]);
              header('Location: index.php?sujet='.$_POST['name']);
                 
        } 
           }else{
                    
             echo "c'est vide";

          }
   }   

    //  }else{



/*
                             $requete = $connect->prepare('INSERT INTO suject(name) VALUES (:name)');

                  $requete->execute([
                      'name' => $name
                    ]);


          $requete2 = $connect->prepare('INSERT INTO postSujet(propri,contenu,date) VALUES (:propri,:contenu, now())');
                  $requete2->execute([
                      'propri' => $_SESSION['id'],
                      'contunu' => $sujet
                    ]);*/

       
   

 
?>


<html>
 <head>
   <title> Mos super forum ! </title>
</head>

<h1>Ajouter un sujet</h1>
  <div id="cforum">

    
     <form method="post" action ="addSujet.php?categorie=<?php  echo $_GET['categorie']; ?>">
       <p>
           <br/><input type="text" name="name"  placeholder="Nom du sujet ..." /><br>
           <textarea  name="sujet"  placeholder="contenu du sujet ...."></textarea><br>
           <input type="hidden" value="<?php echo $_GET['categorie']; ?>"  name="categorie" />
          <input type="submit" name="submit" value=" sujet" />
         </p>

     </form>
   </div>
</body>
</html>
