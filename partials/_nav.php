

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle" data-toggle="collapse"
 data-target=".navbar-collapse">
 <span class="sr-only"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 <a class="navbar-brand"href="index.php"> <?= WEBSITE_NAME ?> <!-- /*WEBSITE_NAME ; --></a>
</div>
<div class="collapse navbar-collapse">
 
   <ul class="nav navbar-nav">
     
  <li><a href="list_users.php">Liste des utilisateurs</a></li>

 </ul>

 <ul class="nav navbar-nav navbar-right">
 <!-- <li><a href="index.php"  href="index.php"><h4 style="color: white;">Boom Social Network</h4></a></li> -->
 <!-- <li class="<?= set_active('index') ?>"><a href="index.php"><?= $menu['accueil'][$_SESSION['locale']] ?></a></li> -->



        <?php if( is_logged_in() ): ?>
          <li class="dropdown"> 
               <a href="#"   class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <img src="<?= get_avatar_url(get_session('email')) ?>" alt="Image de profil de <?=get_session('pseudo') ?>" class="img-circle"><span class="caret"></span></a>
               <ul class="dropdown-menu"  role="menu">

                   <li class="<?= set_active('edit_user') ?>">
               <a href="edit_user.php?id=<?= get_session('user_id') ?>"><?= $menu['editer_profil'][$_SESSION['locale']] ?></a></li>


                 <li class="<?= set_active('profile') ?>">
               <a href="profile.php?id=<?= get_session('user_id') ?>"><?= $menu['mon_profil'][$_SESSION['locale']] ?></a></li>



                 <li class="<?= set_active('change_password') ?>">
               <a href="change_password.php"><?= $menu['hange_password'][$_SESSION['locale']] ?></a></li>


                  <li class="<?= set_active('share_code') ?>"><a href="share_code.php"><?= $menu['share_code'][$_SESSION['locale']] ?></a></li>
               <li class="divider"></li>   
                 <li><a href="logout.php"><?= $menu['deconnexion'][$_SESSION['locale']] ?></a></li>
                  </ul>
           </li> 
        


        	
                 
        <?php else: ?>

  <li class="<?= set_active('login') ?>"><a href="login.php"><?= $menu['connexion'][$_SESSION['locale']] ?></a></li>
   <li class="<?= set_active('register') ?>"> <a href="register.php"><?= $menu['inscription'][$_SESSION['locale']] ?></a></li> 
      <?php endif; ?>
  </ul>
</div>
</div>
</div>
