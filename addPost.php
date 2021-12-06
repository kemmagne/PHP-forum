<?php
  session_start();
   include('database.php'); 

   if(isset($_POST['submit'])){

          $name = htmlspecialchars($_POST['name']);
         $sujet = htmlspecialchars($_POST['sujet']);
//        echo 'bien jouer';
//    }else{
//            echo 'mal jouer';
//        }
       if(!empty($name) && !empty($sujet)){
    
         //   echo "c'est pas vide";
                 if(strlen($name) <5 || strlen($sujet) < 5){

                    // if(strlen($sujet) > 3){
                         echo 'le champs ou le suject est petit';
                    }
                    if(strlen($name) > 5 && strlen($sujet) > 5){
                     // echo " c'est bon";

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