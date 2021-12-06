<?php

 session_start();

include('header.php'); 
include('database.php'); 

  
  include('includes/constants.php'); 


     if(isset($_POST['register'])) {

     	if(not_empty(['username', 'pseudo', 'email', 'password', 'confirm_password'])){
  
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

           	     if($password != $confirm_password){
           	        	 $errors[] = "les deux mots de passe ne concordent pas !";
           	     }
             }
   


              if(is_already_in_use('pseudo', $pseudo, 'user')){
       	             $errors[] = "Pseudo déja utilisé !";

                   }
               if(is_already_in_use('email', $email, 'user')){

                  	$errors[] = "Adresse E-mail déjà utilisé";
                 }

              if(count($errors) == 0){
   
       // Envoi d'un mail d'activation 
             
                    $to = $email;
                    $subject = WEBSITE_NAME. " - ACTIVATION DE COMPTE";

                    $password = sha1($password);

                    $token = sha1($pseudo.$email.$password);

        // Informer l'utilisateur pour qu'il verifie sa boite de reception 
       //      ob_start();
         //    require('templates/emails/activation.tmpl.php');
        //     $content = ob_get_clean();

        //      $headers = 'MIME-Version: 1.0' . "\r\n";
        //      $headers .= 'content-type: text/html; charset=iso-8859-1' . "\r\n";

        //      mail($to, $subject, $content, $headers);

 
        //     //   echo "Mail d'activation envoyer";
        //    set_flash("Mail d'activation envoyer !", 'success');

         //redirect('login.php'); 
                  $q = $connect->prepare('INSERT INTO user(username, pseudo, email, password)
                             VALUES (:username, :pseudo, :email, :password)');

                  $q->execute([
                      'username' => $username,
                     'pseudo' => $pseudo,
                     'email' => $email,
                     'password' => $password


                    ]);

              header('Location: login.php');

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



<html>  
    <head>  
        <title>Chat Application using PHP Ajax Jquery</title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">

   <h3 align="center"><h1 class="lead">Devenez dès à présent membre!</h1></a></h3><br />

     <?php

          include('partials/_errors.php');
   ?>



   <div class="col-md-6">
   <div class="panel panel-default">
      <div class="panel-heading">Chat Application Register</div>
    <div class="panel-body">
     <form method="post"  data-parsley-validate>
   
      <span class="text-danger"><?php /*echo $message; */?></span>
      <div class="form-group">
       <label>Enter Username</label>
       <input type="text" name="username" id="username"    class="form-control" required="required"/>
      </div>


      <div class="form-group">
       <label>Enter pseudo</label>
       <input type="text" name="pseudo" id="pseudo"  class="form-control" />
      </div>  


      <div class="form-group">
       <label>email address</label>
       <input type="text" name="email" id="email"  class="form-control" />
      </div>  




      <div class="form-group">
       <label>Enter Password</label>
       <input type="password" name="password" id="password"  class="form-control" />
      </div>


      <div class="form-group">
       <label>Re-enter Password</label>
       <input type="password" name="confirm_password" id="confirm_password"  class="form-control" />
      </div>



      <div class="form-group">
       <input type="submit" name="register" class="btn btn-info" value="Register" />
      </div>


      <div align="center">
       <a href="login.php">Login</a>
      </div>
     </form>
    </div>
   </div>
  </div>
  </div>
    </body>  
</html>


  <?php include('partials/_footer.php'); ?>