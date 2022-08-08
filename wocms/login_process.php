<?php
	session_start();
	require_once 'dbconfig.php';

	if(isset($_POST['btn-login']))
	{
		function test_input($data){
		$data = trim($data);
		$data = addslashes($data);
		return $data;
	}
		
		//$user_name = $_POST['user_name'];
		$user_email = test_input($_POST['user_email']);
		$user_password = test_input($_POST['password']);
	
		
		
		
		
		
		$password = md5($user_password);
		
		try
		{	
		
			$stmt = $db_con->prepare("SELECT * FROM login_details WHERE user_name=:email");
			$stmt->execute(array(":email"=>$user_email));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();
			
			if($row['user_pass']==$password){
				
				echo "ok"; // log in
				$_SESSION['admin_id'] = $row['admin_id'];
			}
			else{
				
				echo "Email or password does not exist."; // wrong details 
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>