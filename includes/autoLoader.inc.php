<?php
    spl_autoload_register('myAutoLoader');

    function myAutoLoader($className){
        $root = $_SERVER['DOCUMENT_ROOT'];
        $path = $root . "/classes/";
        $extension = ".class.php";
        $fullPath = $path . $className . $extension;

        if(file_exists($fullPath)){

            include_once $fullPath;

        }

    }

    function test($subject){
        
        echo "<pre>";
            print_r($subject);
        echo "</pre>"; 

    }




