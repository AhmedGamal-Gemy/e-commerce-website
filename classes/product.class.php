<?php

    class Product extends DatabaseConnection{


        protected function getLastId(){

            echo $this->connect()->lastInsertId();
			return $this->connect()->lastInsertId();

		}
        protected function addProduct($dataArray){

            $sql = "INSERT INTO PRODUCTS (NAME,DESCRIPTION,PRICE,IMAGEDIR,CATEGORY,BRAND,WEIGHT) 
            VALUES (?,?,?,?,?,?,?);";

            $stmt = $this->connect()->prepare($sql);
            
            $stmt->execute($dataArray);

            $productId = $this->getLastId();

            $stmt = null;
        }

        protected function addProductToTrader($productId){

            $traderId = $_COOKIE['user']['id'];

            $sql = "INSERT INTO TRADERS_PRODUCTS (TRADER_ID, PRODUCT_ID) VALUES (?,?)";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute( [ $traderId, $productId ] );

            $stmt = null;

        }


    }


