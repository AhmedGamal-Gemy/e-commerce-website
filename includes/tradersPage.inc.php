<?php

    include "uploadImage.inc.php";
    include 'autoLoader.inc.php';


    if( isset( $_POST['addProduct'] ) ){

        $imageFile = $_FILES['image'];

        if( isset($imageFile) ){

            $imgDir = uploading($imageFile);

        }else{

            $imgDir = null;

        }

        $dataArray = [ 
                        $_POST['name'], $_POST['description'],$_POST['price'], $imgDir, $_POST['category'],
                        $_POST['brand'], $_POST['weight'] 
                    ];

        $productController = new ProductContr;

        $productController->add($dataArray);

    }

    if( isset( $_POST['goback'] ) ){

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
    
    <form action="" method="post"  enctype="multipart/form-data">

        <h1>Add Product</h1>

        <input type="text" name="name" id="nameInput" placeholder="Product Name" required><br>
        <input type="text" name="description" id="descriptionInput" placeholder="Product description"><br>
        <input type="number" name="price" id="priceInput" placeholder="Product price" required><br>

        <input type="number" name="weight" id="priceInput" placeholder="Product weight" ><br>

        <input type="text" name="category" id="categoryInput" placeholder="Product category"><br>
        <input type="text" name="brand" id="brandInput" placeholder="Product brand" ><br>

        <input type="file" name="image" accept="image/*" id="imageInput"><br><br>

        <button type="submit" name="addProduct">Add Product</button>

    </form>

    <form action="" method="post">

        <button type="submit" name="goback">Go Back</button>

    </form>

</body>
</html>