<?php

	class UserView extends User{

		// here you show the user some information from the database like profile, his name, id ,etc

		public function viewCustomer($id){
			// test
			$data = $this->getInfo('ID',$id,'customer');

			echo "<pre>";
				print_r($data);
			echo "</pre>";

		}
		
		
		
	}





