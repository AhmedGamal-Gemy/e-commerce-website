<?php

    include 'autoLoader.inc.php';

    if(isset($_POST['register'])){

        $inputsArray = [ $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'] ];

        $customerController = new userContr('customer');
        $customerController->register($inputsArray);

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
    
    <h1>Register</h1>
    <form action="" method="post">

        <input type="text" name="firstname" id="firstnameInput" placeholder="firstname">
        <input type="text" name="lastname" id="lastnameInput" placeholder="lastname">
        <input type="email" name="email" id="emailInput" placeholder="email">
        <input type="password" name="password" id="passwordInput" placeholder="password">

        <button type="submit" name="register">Register</button>

    </form>


</body>
</html>