<?php

	class User extends DatabaseConnection{ 

		protected function addNewUser($infoarray,$role){
						
			if($role == 'CUSTOMERS'){

				$sql = "INSERT INTO {$role} (FIRSTNAME,LASTNAME,EMAIL,PASSWORD) VALUES (?,?,?,?)";

			}elseif($role == 'TRADERS'){

				$sql = "INSERT INTO {$role} (TRADER_NAME,CONTACT_PERSON,EMAIL,PASSWORD) VALUES (?,?,?,?)";

			}else{

				die("something is wrong");

			}

			$stmt = $this->connect()->prepare($sql);
			$stmt->execute($infoarray);
			$stmt = null;
			
		}
		
		protected function editUser($id,$newinfo,$role){

			array_push($newinfo,$id);

			$sql = "UPDATE {$role} SET FIRSTNAME = ? ,LASTNAME = ?,EMAIL = ?,PASSWORD = ? WHERE ID = ? ";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute($newinfo);
			$stmt = null;
			
		}
		
		protected function updateUserProfile($id,$newinfo,$role){
			
			array_push($newinfo,$id);

			$sql = "UPDATE {$role} SET PHONENUMBER = ? ,BILLINGADDRESS = ?,SHIPPINGADDRESS = ? WHERE ID = ? ";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute($newinfo);
			$stmt = null;
			
		}
		
		protected function deleteUser($id,$role){
			
			$sql = "DELETE FROM {$role} WHERE ID = ? ";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$id]);
			$stmt = null;
			
		}
		
		protected function getInfo($key,$value,$role){
			
			$sql = "SELECT * FROM {$role} WHERE $key = ? ;";

			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$value]);
			$result = $stmt->fetch();
			$stmt = null;
			return $result;
			
		}

		protected function getEmailPwd($email,$password,$role){

			$sql = "SELECT * FROM {$role} WHERE EMAIL = ? AND PASSWORD = ?;";

			$stmt = $this->connect()->prepare($sql);

			$stmt->execute([$email,$password]);
			$result = $stmt->fetch();

			print_r($result);
			$stmt = null;
			return $result;
			
		}

		protected function getLastId(){

			return $this->connect()->lastInsertId();

		}

		protected function excuteQuery($sql){

			$stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();

            echo "<pre>";
                print_r($result);
            echo "</pre>";

        }
		
		
		
	};

