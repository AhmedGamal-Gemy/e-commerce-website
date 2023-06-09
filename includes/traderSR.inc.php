<?php

    include 'autoLoader.inc.php';
// this the page of the traders or the products providers 

    if( isset($_POST['register']) ){

        $array = [ $_POST['tradername'], $_POST['contactname'], $_POST['email'], $_POST['password'] ];

        $traderController = new UserContr('trader');
        $traderController->register($array);


    }

    if( isset($_POST['login']) ){

        $email = $_POST['emailLogin'];
        $password = $_POST['passwordLogin'];

        $traderController = new UserContr('trader');
        $traderController->login($email, $password);

    }

    if( isset($_POST['goback']) ){
        
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
    
    <form action="" method="post">

        <h1>Register as trader</h1>

        <input type="text" name="tradername" id="tradernameInput" placeholder="Trader name">
        <input type="text" name="contactname" id="contactnameInput" placeholder="Contact name">

        <input type="email" name="email" id="emailInput" placeholder="Email">
        <input type="password" name="password" id="passwordInput" placeholder="Password">

        <button type="submit" name="register">Register</button><br><br><br>


        <h1>Login as trader</h1>

        <input type="email" name="emailLogin" id="emailInput" placeholder="Email">
        <input type="password" name="passwordLogin" id="passwordInput" placeholder="Password">

        <button type="submit" name="login">Login</button><br><br><br>

        <button type="submit" name="goback">Go Back</button>




    </form>




</body>
</html>