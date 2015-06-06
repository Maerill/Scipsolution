<div class="header">
	<div class="container">
		<h1 class="header-title">
			<?php 
				$title = "Scip - ";
				if (!isset($_GET["site"])) {
					$page = "index";
				}else{
					$page = $_GET["site"];
				}
				
				//file_put_contents('log.txt', print_r($_GET, true), FILE_APPEND);
				
				if(isset($_SESSION['user_name'])){
					switch ($page) {
						default:
							header("Location: ?site=overview");
							break;
						case "profil":
							$title .= "Profil";
							$para = "Here you can see and edit your account information as well as see every of your uploaded pics.";
							echo $title;
							break;
						case "overview":
							$title .= "Overview";
							$para = "Here you can see every picture, sort on uploading date.";
							echo $title;
							break;
						case "editprofil":
							$title .= "Profil editor";
							$para = "Edit your profil like you want.";
							echo $title;
							break;
						case "logout":
							session_destroy();
							header("Location: ?site=login");
							break;
					}
				} else {
					switch ($page) {
						default:
							header("Location: ?site=login");
							break;
						case "login":
							$title .= "Login";
							$para = "Welcome to Scip! <br> The free website to share your best pictures.";
							echo $title;
							break;
						case "register":
							$title .= "Registration";
							$para = "Welcome to Scip! <br> The free website to share your best pictures.";
							echo $title;
							break;
					}
				}
			?>
		</h1>
		<img class="header-pic" src="pics/logo.png">
		<p class="header-paragraph">
			<?php echo $para; ?>
		</p>
	</div>
</div>