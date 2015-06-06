<!--
Startpage, every other page gets loaded in.
-->

<?php
  session_start();
  // load files
  require_once(__DIR__.'/config.php');
  require_once(__DIR__.'/classes/database.php');
  require_once(__DIR__.'/functions/userFunction.php');	
  // set charset
  header("Content-Type: text/html; charset=utf-8");

  
  // Check if Session already exist

  
  // USER ERSTELLEN!
  /*
  var_dump(insert_user([
    'username' => 'finalgamer',
    'password' => 'mypw',
    'mail' => 'michele.dn@live.com',
    'gender' => 1,
    'birthday' => '',
    'phonenumber' => '',
  ]));
  */
  

/* LOGIN ÜBERPRÜFEN
  check_user('finalgamer', 'mypw');
  
*/

  // DATENBANK FEHLER ANZEIGEN
  //Database::error();

  /* Datenbank benutzen
  $result = Database::query($sql, []);
  if($result === false) {
    return false;
  }
  $result->fetch_assoc();


  //config benutzen
  confg()['wert']

*/

?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <?php require_once("resources/head.php"); ?>
  </head>
  <body>
    <div class="wrapper">
      <?php 
      		if (!empty($_GET['site']) && $_GET['site'] !== 'login' && $_GET['site'] !== 'register') {
      			require_once("resources/pageNavbar.php"); 
      		}else{
            require_once("resources/loginNavbar.php");
          }
      ?>

      <?php require_once("resources/pageHeader.php"); ?>

      <div class="container content">

    	<?php
    		// Get page folder and set default page
    		$pagefolder = 'sites/';
    		$defaultpage = 'login';

    		if (!empty($_GET['site'])) {	// Check if there is a site
    			$page = $_GET["site"];
    		} else {
    			$page = $defaultpage;
    		}

    		if (!file_exists($pagefolder . $page .".php")) {
                $page = $defaultpage.".php";
            }

            // Get content
            include $pagefolder . basename($page.".php");
      ?>

      </div>
      <?php require_once("resources/footer.php"); ?>
    </div>

  </body>
</html>