<?php
  /*
if(isset($_POST['submit'])){
     if(!empty($_POST['name']) && !empty($_POST['pseudo']) && !empty($_POST['meil'])&& !empty($_POST['password'])){
          
           $errors= [];

           extract($_POST);

           if(mb_strlen($username) < 3){
                $errors[] = "pseudo trop cours le speudo doit coontenir au moins 3 ";
           }
           if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
               $errors ="veuiller remplir tous les champs";
           }


      if(count($errors) == 0){
                            $q = $connect->prepare('INSERT INTO user(username, pseudo, email, password)
                             VALUES (:username, :pseudo, :email, :password)');

                  $q->execute([
                      'username' => $username,
                     'pseudo' => $pseudo,
                     'email' => $email,
                     'password' => $password


                    ]);

           //   header('Location: login.php');

             //exit();

      }
     }else{
         $errors[] = "Veuiller remplir tous les champs";
     }


}
 header('Location: register.php');

             exit();
*/