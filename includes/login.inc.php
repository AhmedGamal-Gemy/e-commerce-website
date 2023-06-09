<?php

    include_once("autoLoader.inc.php");

    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['pwd'];

        $customerController = new userContr('customer');
        $customerController->login($email, $password);

       

    }

    if(isset($_POST['goback'])){

        header("Location: /index.php");
        exit();

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login page </h1>
    <form action="" method="post">

        <input type="email" name="email" id="emailInput" placeholder="Email">
        <input type="password" name="pwd" id="passwordInput" placeholder="Password">

        <button type="submit" name = "login">Login</button><br><br>

        <button type="submit" name = "goback">GoBack</button>
    
    </form>

</body>
</html>