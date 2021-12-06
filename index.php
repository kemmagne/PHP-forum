
<?php



include('header.php'); 

//include('filters/auth_filters.php');
include('addPost.php'); 
  
  include('includes/constants.php'); 



  if(!empty($_GET['id'])){
  
  

      $user = find_user_by_id($_GET['id']);


      if(!$user){

          redirect('index.php');
         
      } else {



                   //s    echo 'probleme de redirection';
      //  redirect('profile.php?id='.$_SESSION['user_id'])
      }
  }

?>
<html>
<header>

<h1 class="panel-title">Profil de <?= e($_SESSION['pseudo']) ?></h1>


<?php
   if(isset($_GET['categorie'])){//si on est dans une categorie
       $_GET['categorie'] = htmlspecialchars($_GET['categorie']);
  ?>
    <div class="categories">
             <h1> <?php echo ($_GET['categorie']) ?></h1>

    </div>

        

   <a href="addSujet.php?categorie=<?php echo $_GET['categorie']; ?>">Ajouter un sujet</a>

   <?php
    $requete = $connect->prepare('SELECT * FROM suject WHERE categorie = :categorie');

    $requete->execute(array('categorie'=>$_GET['categorie']));

   while($reponse = $requete->fetch()){
     ?>
               <div class="categories">
                 <a href="index.php?sujet=<?php echo $reponse['name'] ?>"><h1> <?php echo $reponse['name'] ?></h1></a>
             </div>
            

     <?php
   }
  ?>

  <?php
   }
   



  else if(isset($_GET['sujet'])){
      $_GET['sujet'] = htmlspecialchars($_GET['sujet']);
  ?>
    <div class="categories">
             <h1> <?php echo ($_GET['sujet']) ?></h1>

    </div>
  

<?php

       $requete = $connect->prepare('SELECT * FROM postSujet WHERE sujet = :sujet');
       $requete->execute(array('sujet'=>$_GET['sujet']));
       while($reponse = $requete->fetch()){
    ?>
   <div class="post">
     <?php

          $requete2 = $connect->prepare('SELECT * FROM user WHERE id = :id');
          $requete2->execute(array('id'=>$reponse['propri']));
          $membres = $requete2->fetch();

            echo $membres['pseudo'];   echo ': <br>';


              echo $reponse['contenu'];
     ?>
    
   </div>

    <?php
            
       }
?>
       <form method="post"  action="addPost.php">
        <textarea  name="sujet"  placeholder="votre message..." ></textarea>
        <input type="hidden" name="name" value="<?php echo $_GET['sujet']; ?>" />
        <input type="submit" name="submit"  value="Ajouter la conversation" />
  </form>

  <?php
   }
   
   
   
   
   
   
   
   
   
   
   
   else{
 $requete = $connect->query('SELECT * FROM categories');
  while($reponse = $requete->fetch()){

 ?>
<div class="categories">
    <a href="index.php?categorie=<?php echo $reponse['name'] ?>"><?php echo $reponse['name']; ?></a>
</div>
<?php
   }

  }
?>