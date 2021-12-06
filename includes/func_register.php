<?php
  session_start();

   require("bootstrap/locale.php");
  //include('filters/guest_filters.php');
  include('includes/functions.php');
  include('database_connection.php');
  include('includes/constants.php'); 
   require("includes/init.php");
  
     if(isset($_POST['register'])) {

     	if(not_empty(['username', 'pseudo', 'email', 'password', 'password_confirm'])){
  
                             $errors = [];

                            extract($_POST);

                  if(mb_strlen($pseudo) < 3){

           	                $errors[] = "Pseudo trop court (Minimum 3 caractères)";
                    }

                  if(! filter_var($email, FILTER_VALIDATE_EMAIL)){

                           	$errors[]  = "Addresse email invalide !";
                    }

                  if(mb_strlen($password) < 6){
           	           $errors[] = "Mot de passe trop court (Minimum 3 caractères)";
                 }else {

           	     if($password != $password_confirm){
           	        	 $errors[] = "les deux mots de passe ne concordent pas !";
           	     }
             }
   


               if(is_already_in_use('pseudo', $pseudo, 'users')){
       	             $errors[] = "Pseudo déja utilisé !";

                   }
               if(is_already_in_use('email', '$email', 'users')){

                  	$errors[] = "Adresse E-mail déjà utilisé";
                 }

              if(count($errors) == 0){
   
       // Envoi d'un mail d'activation 
             
                    $to = $email;
                    $subject = WEBSITE_NAME. " - ACTIVATION DE COMPTE";

                    $password = sha1($password);

                    $token = sha1($pseudo.$email.$password);

        // Informer l'utilisateur pour qu'il verifie sa boite de reception 
             ob_start();
             require('templates/emails/activation.tmpl.php');
            $content = ob_get_clean();

             $headers = 'MIME-Version: 1.0' . "\r\n";
             $headers .= 'content-type: text/html; charset=iso-8859-1' . "\r\n";

             mail($to, $subject, $content, $headers);


             set_flash("Mail d'activation envoyer !", 'success');

        //redirect('index.php');
                  $q = $db->prepare('INSERT INTO login(username, pseudo, email, password)
                             VALUES (:username, :pseudo, :email, :password)');

                  $q->execute([
                      'username' => $username,
                     'pseudo' => $pseudo,
                     'email' => $email,
                     'password' => sha1($password)


                    ]);


              header('Location: index.php');

             exit();

           } else {

            save_input_data();
           }

           } else {

              $errors[] = "veuillez SVP remplir tous les champs!";
              save_input_data();
       }
      
           } else {
     clear_input_data();
   }

?>

