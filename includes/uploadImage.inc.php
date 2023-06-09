<?php

    function uploading($image){

        // should check if it's image or not         user saintizer

        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/images/";
        $target_file = $target_dir . basename($image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
         $check = getimagesize($image["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
        $uploadOk = 0;
        }

        // Check file size
        if ($image["size"] > 500000) {
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        // if everything is ok, try to upload file
            return null;

        } else {

            move_uploaded_file($image["tmp_name"], $target_file);

            return $target_file;

        }

    }

