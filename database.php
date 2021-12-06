
 <?php
 
  define('DB_HOST', 'localhost');
  define('DB_NAME', 'forum1');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');

    try{

    	$connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);

    	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    	$connect->query('SELECT * FROM user');
    } catch(PDOException $e) {

    	die('Erreur: '.$e->getMessage());
    }


//sanitizer

    if(!function_exists('e')){
  	function e($string){

  		if($string){
  			return htmlspecialchars($string);

  		}
  	}
  }


// get a session value
    if(!function_exists('get_session')){
    function get_session($key){
          if($key){
             return !empty($_SESSION[$key])
             ? e($_SESSION[$key])
             : null; 
          }
    
    }
  }
/*
    // get a session value
    if(!function_exists('is_logged_in')){
    function is_logged_in(){
     
        return isset($_SESSION['user_id']) || isset($_SESSION['pseudo']);       
      }

    }  
*/


   if(!function_exists('get_avatar_url')){
    function get_avatar_url($email, $size = 25){
         
      return "http://gravatar.com/avatar/".md5(strtolower(trim(e($email))));  //."s=".$size; 
    }
  }
  
    //GET Avartar URL 




  // find_user_by_id
     if(!function_exists('find_user_by_id')){
    function find_user_by_id($id){
            global $connect;

          $q = $connect->prepare('SELECT username, pseudo, email FROM user WHERE id = ?');

          $q->execute([$id]);

          $data = $q->fetch(PDO::FETCH_OBJ);

          $q->closeCursor();

          return $data;
    
    }
  }



  if(!function_exists('not_empty')){
  	function not_empty($fields = []){

  		if(count($fields) != 0){
  			foreach($fields as $field){
  				if(empty($_POST[$field]) || trim($_POST[$field]) == ""){
  					return false;
  				}
  			}
  			return true ;

  		}
  	}
  }

  if(!function_exists('is_already_in_use')){

  	   function is_already_in_use($field, $value, $table){
       global $connect;

       $q = $connect->prepare("SELECT id FROM $table WHERE $field = ?");

       $q->execute([$value]);

       $count = $q ->rowCount();

       $q->closeCursor();

       return $count;

  	   }
  }


  
  if(!function_exists('set_flash')){

   	function set_flash($message, $type = 'info'){
   		$_SESSION['notification']['message'] = $message;
   		$_SESSION['notification']['type'] = $type;
   	}
   }


   if(!function_exists('redirect')){
   	  function  redirect($page){  //fin de l'episode 11;
   	  	header('Location: ' . $page);
   	  	exit();
   	  }
   }

 /*if(!function_exists('redirect')){
   	  function  redirect($page){  //fin de l'episode 11;
   	  	header('Location: ' . $page);
   	  	exit();
   	  }
   }*/


   if(!function_exists('save_input_data')){

   	  function save_input_data(){
   	  	foreach ($_POST as $key => $value) {
   	  		# code...
   	  		if(strpos($key, 'password') === false){
   	  		 $_SESSION['input'][$key] = $value;
   	  		}
   	  	}
   	  }
   }

  if(!function_exists('get_input')){

   	  function get_input($key){

   	  	if(!empty($_SESSION['input'][$key])){

             return e($_SESSION['input'][$key]);

   	  	}

   	  	 return null;
   	  	
   	  }
   }

    if(!function_exists('clear_input_data')){

   	  function clear_input_data(){

   	  	 if(isset($_SESSION['input'])){

   	  	 	$_SESSION['input'] = [];
   	  	 }


   	  }
   }

/*
  // gere l'etat active de nos different liens
    if(!function_exists('set_active')){
  	function set_active($file){

  		$page = array_pop(explode('/', $_SERVER['SCRIPT_NAME']));

  		if($page == $file.'.php'){
  			return "active";
  		} else {
  			return "";
  		}

  	}
  }
*/
  if(!function_exists('redirect_intent_or')){
    function redirect_intent_or($default_url){

      if($_SESSION['forwarding_url']){

      } else {
         $url = $default_url;
      }

       $_SESSION['forwarding_url'] = null;

       redirect($url);
    }
  }

  ?>

