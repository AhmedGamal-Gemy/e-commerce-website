<?php

	include 'includes/autoLoader.inc.php';

	if(isset($_POST['traderSR'])){

		header("Location: includes/traderSR.inc.php");
		exit();
		
	}

	if(isset($_POST['register'])){

		header("Location: includes/register.inc.php");
		exit();

	}

	if(isset($_POST['login'])){

		header("Location: includes/login.inc.php");
		exit();

	}

	if(isset($_POST['logout'])){

		setcookie('user[id]', $_COOKIE['user']['id'], time(), '/');
		setcookie('user[name]', $_COOKIE['user']['name'] , time(), '/');

		header("Location: /index.php");
        exit();

	}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Hello World in PHP</title>
	</head>
	<body>
	
		<?php 
			if( !isset( $_COOKIE['user']["id"] ) ) { ?>

			<form action="" method="post">

				<button type="submit" name = "login">Login</button>
				<button type="submit" name = "register">Register</button>

				<button type="submit" name = "traderSR">Join us</button>



			</form>

		<?php }else{

			echo "hello " . $_COOKIE['user']['name'];
		?>
		
		<form action="" method="post">

			<button type="submit" name="logout">Logout</button>

		</form>
		
		<?php } ?>
	
	
    
	</body>
</html>