<?php

    class UserContr extends User{

        protected $role;        

		private $roleSql;

        public function __construct($role){

            $this->role = $role;

			if($this->role == 'customer'){

				$this->roleSql = 'CUSTOMERS';

			}elseif($this->role == 'trader'){

				$this->roleSql = 'TRADERS';

			}

        }

        private function setCookie ($id,$name){

            setcookie('user[id]', $id, strtotime("+1 month") ,'/' );
            setcookie('user[name]', $name, strtotime("+1 month") ,'/' );
            setcookie('user[role]', $this->role, strtotime("+1 month") ,'/' );

            if($this->roleSql == 'CUSTOMERS'){

                header("Location: /index.php");
                exit();

            }else{

                header("Location: /includes/tradersPage.inc.php");
                exit();

            }

        }

        public function login($email, $password){

            $data = $this->getEmailPwd($email,$password, $this->roleSql);

            if($data == null){

                echo "Something isn't right";

            }else{

               echo "hello " . $data['trader_name'];
               $this->setCookie( $data['trader_id'], $data["trader_name"] );
            }
           
          

            $data = null;
        
        }

        public function register($array){

            // should check the inputs from the user but later


            // check if the email is already exist

            if( $this->getInfo( "EMAIL", $array[2] , $this->roleSql) == null ){

                $this->addNewUser($array, $this->roleSql);
                $this->setCookie($this->getLastId(),$array[0] );

            }else{

                echo "the account is already exist";

            }

        }

        


    }