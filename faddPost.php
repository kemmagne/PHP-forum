<?php

 session_start();


$erreur = [];

   if(isset($_POST['submit'])){
       if(!empty($_POST['name']) && !empty($_POST['sujet'])){
          
         // $name = htmlspecialchars($_POST['name']);
          //$sujet = htmlspecialchars($_POST['sujet']);
          /*

          if(strlen($name) > 5 AND strlen($sujet) < 20){

                    if(strlen($sujet) > 3){
                         $erreur = 'ok';
                    } 
           }else{
 
              $erreur = ' le nom du sujet dois contenir entre 5 et 20 charactere';

          }

       }else{*/



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

                     $error = toto;
       }else{
       echo 'vieller remplir tous les champs';

       }
   }

 





 header('Location: addPost.php');

             exit();











// include('header.php'); 
// include('database.php'); 

  
//   include('includes/constants.php'); 



//  session_start();

// include('header.php'); 
// include('database.php'); 

  
//   include('includes/constants.php'); 


//      if(isset($_POST['submit'])) {

//      	if(not_empty(['name', 'sujet'])){
  
//                              $errors = [];

//                             extract($_POST);

//                   if(mb_strlen($name) < 3){

//            	                $errors[] = "Pseudo trop court (Minimum 3 caractères)";
//                     }



//                   if(mb_strlen($sujet) < 6){
//            	           $errors[] = "Mot de passe trop court (Minimum 3 caractères)";
                 
//              }
   

//                    if(count($errors) == 0){
            
//                        $error = 'ciest bon';
             

    
//             //       $q = $connect->prepare('INSERT INTO user(username, pseudo, email, password)
//             //                  VALUES (:username, :pseudo, :email, :password)');

//             //       $q->execute([
//             //           'username' => $username,
//             //          'pseudo' => $pseudo,
//             //          'email' => $email,
//             //          'password' => $password


//             //         ]);

//             //   header('Location: login.php');

//             //  exit();

//            } else {

//             save_input_data();
//            }

//            } else {

//               $errors[] = "veuillez SVP remplir tous les champs!";
//               save_input_data();
//        }
      
//            } else {
//      clear_input_data();
//    }

?>






 