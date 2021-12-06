 <?php





session_start();  

//include('login.php');
 require('includes/functions.php');
include('filters/auth_filters.php');
 // include('database_connection.php'); 
     include('database.php'); 
  require("includes/init.php");
  require("bootstrap/locale.php");
  include('includes/constants.php');
  include('header.php'); 


  if(!empty($_GET['id'])){
  
  

      $user = find_user_by_id($_GET['id']);


      if(!$user){

          redirect('register.php');
         
      } else {



                   //s    echo 'probleme de redirection';
      //  redirect('profile.php?id='.$_SESSION['user_id']);







      }
  }





  
  if(isset($_POST['update'])) {
      

      $errors = [];

   if(not_empty(['username', 'city', 'country', 'sex', 'age', 'twitter', 'available_for_hiring', 'bio'])){

        extract($_POST);




        $q = $connect->prepare('UPDATE login SET username = :username, city = :city, country = :country,  sex = :sex, age = :age,  twitter = :twitter, available_for_hiring = :available_for_hiring,  bio = :bio WHERE user_id = :id');
                       $q->execute(array(

                      'username' => $username,
                       'city'     => $city,
                       'country'  => $country,
                       'sex'     => $sex,
                       'age'      => $age,
                       'twitter'  => $twitter,
                       'available_for_hiring' => !empty($available_for_hiring) ? '1' : '0',
                       'bio'      => $bio,
                      'id' =>  $_SESSION['user_id'] 
                      
                   ));
                






                   set_flash("Felicitation votre prophil a été mis a jour !");
        
         } else {
          
           
           save_input_data();
           $errors[] = "Veuillez remplir tous les champs marqués d'un (*)";
         }


     } else {

    clear_input_data();
}


































// session_start();  

// //include('login.php');
//  require('includes/functions.php');
// include('filters/auth_filters.php');
//   include('database_connection.php'); 
 
//   require("includes/init.php");
//   require("bootstrap/locale.php");
//   include('includes/constants.php');
//   include('header.php'); 


//   if(!empty($_GET['id'])){
  
  

//       $user = find_user_by_id($_GET['id']);


//       if(!$user){
//           header('Location: index.php');

//           exit();
//       } else {



//                    //s    echo 'probleme de redirection';
//           //   redirect('profile.php?id='.$_SESSION['user_id']);

    
//       }
//   }





  
//   if(isset($_POST['update'])) {

//       $errors = [];

//    if(not_empty(['username', 'city', 'country', 'sex', 'age', 'twitter', 'available_for_hiring', 'bio'])){

//         extract($_POST);





//        $q = $connect->prepare('UPDATE login
//                             SET username =: username, city = :city, country = :country,
//                             sex = :sex, age = :age, twitter = :twitter, available_for_hiring = :available_for_hiring,
//                             bio = :bio WHERE user_id = :id');

//          $q->execute(array(
//               'username' => $username,
//               'city'     => $city,
//               'country'  => $country,
//                 'sex'     => $sex,
//               'age'      => $age,
//               'twitter'  => $twitter,
//                'available_for_hiring' => !empty($available_for_hiring) ? '1' : '0',
//                'bio'      => $bio,
//                 'id' =>  $_SESSION['user_id']
//            ));

//                    set_flash("Felicitation votre prophil a été mis a jour !");
        
//          } else {
          
           
//            save_input_data();
//            $errors[] = "Veuillez remplir tous les champs marqués d'un (*)";
//          }


//      } else {

//     clear_input_data();
// }




// ?>