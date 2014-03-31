<?php
	require_once 'ConfigFunctions.php';
	$delay_before_login = 15;
	

	/**
	* Call this function at the top of any page you wish to access a php session variable.
	* This function makes your login script a whole lot more secure.
	* 
	* @return [type] [description]
	*/
	function sec_session_start() {
	    $session_name = 'sec_session_id'; // Set a custom session name
	    $secure = false; // Set to true if using https.
	    $httponly = true; // This stops javascript being able to access the session id. 

	    ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies. 
	    $cookieParams = session_get_cookie_params(); // Gets current cookies params.
	    session_set_cookie_params(ConfigFunctions::getSessionLength(true), $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
	    session_name($session_name); // Sets the session name to the one set above.
	    session_start(); // Start the php session
	    session_regenerate_id(); // regenerated the session, delete the old one.  
	}
	

	/**
	* This function will check the email and password against the database, it will return true if there is a match.
	* @param  [type] $email    [description]
	* @param  [type] $password [description]
	* @param  [type] $mysqli   [description]
	* @return [type]           [description]
	*/
	function login($email, $password, $dbcon) {
		global $max_tolerate_attempts, $delay_before_login;
	   // Using prepared Statements means that SQL injection is not possible.
	   
	   if ($stmt = $dbcon->prepare("SELECT u_id, u_last_name, u_first_name, u_password, u_salt, u_profile_picture FROM app_user WHERE u_email = ? LIMIT 1")) { 
	      $stmt->bindParam(1, $email, PDO::PARAM_STR); // Bind "$email" to parameter.
	      $stmt->execute(); // Execute the prepared query.
	      $result = $stmt->fetch(PDO::FETCH_OBJ);
	      $user_id = $result->u_id;
	      $username = $result->u_last_name;
	      $db_password = $result->u_password;
	      $salt = $result->u_salt;
	      $password = hash('sha512', $password.$salt); // hash the password with the unique salt.
	      $now = time();
	 
	      if($stmt->rowCount() == 1) 
	      { // If the user exists
	         
	        
	        $statement = $dbcon->query("SELECT as_banned, as_delay_login FROM Account_State WHERE as_app_user_id =  $user_id");
			$result = $statement->fetch(PDO::FETCH_OBJ);;
			$isBanned = $result->as_banned;
			$loginDelay = $result->as_delay_login;

			if ($isBanned == true) //check if account banned
			{
				
				//write log	
				$dbcon->query("INSERT INTO Login_Attempt (la_app_user_id, la_time, la_success, la_desc) VALUES ($user_id, $now, 'false', 'banned user trying to log')");
	         	
	         	return false;
			}
			
			if($loginDelay > $now)//check if login delay is not respected
			{
				//write log	
	         	$dbcon->query("INSERT INTO Login_Attempt (la_app_user_id, la_time, la_success, la_desc) VALUES ($user_id, $now, 'false', 'user must wait delay before login')");
	         	header("Location: ./index.php?error=" . urlencode("User must wait $delay_before_login seconds before login."));
	         	exit();
			}
	         

	         // We check if this is a bruteforce attempt
	         if(checkbrute($user_id, $dbcon) == true) 
	         { 
	            
	            //add delay for the next attempt
	            $delay = $now + ($delay_before_login);
	            $dbcon->query("UPDATE Account_State SET as_delay_login = $delay WHERE as_app_user_id =  $user_id");
	            
	            //if brute force attempt was already tried, banned account
	            $statement = $dbcon->query("SELECT as_brute_force FROM Account_State WHERE as_app_user_id =  $user_id");
				$result = $statement->fetch(PDO::FETCH_OBJ);
				$bruteforceCount = $result->as_brute_force;
				$dbcon->query("UPDATE Account_State SET as_brute_force = $bruteforceCount+1 WHERE as_app_user_id =  $user_id");

				//we ban the user at 2 brute force and change the password
	            if ($bruteforceCount > 1) {
	            	$dbcon->query("UPDATE Account_State SET as_banned = 'true' WHERE as_app_user_id =  $user_id");
	            	//write log
	         		$dbcon->query("INSERT INTO Login_Attempt (la_app_user_id, la_time, la_success, la_desc) VALUES ($user_id, $now, 'false', '2 brute force : user is permanently banned')");


	         		//change the password
	         		$newPass = hash('sha512', 'banned');
	         		$newPass = hash('sha512', $newPass.$salt);
	       			$dbcon->query("UPDATE App_User SET u_password = '$newPass' WHERE u_id =  $user_id");
	       			
	       			//send email with new password
	       			$headers ='From: "GTI619"<test@example.com>'."\n";
				    $headers .='Content-Type: text/plain; charset="utf-8"'."\n";  
				    $message = "Une tentative de brute force à été faite sur votre compte, nous avons changé temporairement votre mot de passe. Nous vous suggérons fortement de changer votre mot de passe temporaire le plus tôt possible. Mot de passe temporaire :";
	       			mail('dannyboyer49@gmail.com', 'Changement de mot de passe', $message, $headers);
	         		header("Location: ./index.php?error=" . urlencode("Une tentative de brute force à été faite sur votre compte, nous avons changé temporairement votre mot de passe."));
	         		exit();
	            }
	            

	            //write log
	         	$dbcon->query("INSERT INTO Login_Attempt (la_app_user_id, la_time, la_success, la_desc) VALUES ($user_id, $now, 'false', 'brute force attempt')");

	            return false;
	         } 
	         else 
	         {
	         	if($db_password == $password) 
	         	{ // Check if the password in the database matches the password the user submitted. 
				// Password is correct!

				$user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.

				$user_id = preg_replace("/[^0-9]+/", "", $user_id); // XSS protection as we might print this value
				$_SESSION['user_id'] = $user_id; 
				$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // XSS protection as we might print this value
				$_SESSION['username'] = $username;
				$_SESSION['login_string'] = hash('sha512', $password.$user_browser);
				//write this in th Login Attemps
				$dbcon->query("INSERT INTO Login_Attempt (la_app_user_id, la_time, la_success) VALUES ($user_id, $now, 'true')");
				// Login successful.
				return true;    
				} 
				else 
				{
				// Password is not correct
				// We record this attempt in the database
				
				$dbcon->query("INSERT INTO Login_Attempt (la_app_user_id, la_time, la_success, la_desc) VALUES ($user_id, $now, 'false', 'incorect password')");
				return false;
				}

	      	}
	      } 
	      else 
	      {
	         // No user exists.
	         
	         return false;
	      }
	   }
	}


	/**
	* If a user account has a failed login more than 5 times their account is locked.
	* Prevent brute force attempt.
	* 
	* @param  [type] $user_id [description]
	* @param  [type] $mysqli  [description]
	* @return [type]          [description]
	*/
	function checkbrute($user_id, $pdo) {
		global $delay_before_login;
		// Get timestamp of current time
	   $now = time();
	   // All login attempts are counted from the past 15 minutes. 
	   
	   $valid_attempts = $now - ($delay_before_login);
		$max_tolerate_attempts = 5000;
		//count = total of brute force
		$statement = $pdo->query("SELECT count(*) from login_attempt where la_desc = 'brute force attempt'");
		$result = $statement->fetch(PDO::FETCH_OBJ);
		$count = $result->count;

		
      	if ($count >= 1) {
      		$max_tolerate_attempts = $count * $max_tolerate_attempts;
      	}
	 
	   if ($stmt = $pdo->prepare("SELECT la_time FROM Login_Attempt WHERE la_app_user_id = ? AND la_time > $valid_attempts AND la_success = false AND la_desc = 'incorect password'")) {
	      $stmt->bindParam(1, $user_id, PDO::PARAM_INT); 
	      // Execute the prepared query.
	      $stmt->execute();
	      // If there has been more than 5 failed logins
	      if($stmt->rowCount() >= $max_tolerate_attempts) {
	         return true;
	      } else {
	         return false;
	      }
	   }
	}


	/**
	 * Check logged in status.
	 * Prevent session hijacking.
	 * 
	 * @param  [type] $mysqli [description]
	 * @return [type]         [description]
	 */
	function login_check($pdo) {
	   // Check if all session variables are set
	   if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
	     $user_id = $_SESSION['user_id'];
	     $login_string = $_SESSION['login_string'];
	     $username = $_SESSION['username'];
	 
	     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
	 
	     if ($stmt = $pdo->prepare("SELECT u_password, u_role_id FROM App_User WHERE u_id = ? LIMIT 1")) { 
	        $stmt->bindParam(1, $user_id, PDO::PARAM_INT); // Bind "$user_id" to parameter.
	        $stmt->execute(); // Execute the prepared query.
	        //$stmt->store_result();
	 
	        if($stmt->rowCount() == 1) { // If the user exists
	            $result = $stmt->fetch(PDO::FETCH_OBJ);
	      		$password = $result->u_password;

	           // $stmt->bind_result($password); // get variables from result.
	           // $stmt->fetch();
	           $login_check = hash('sha512', $password.$user_browser);
	           if($login_check == $login_string) {
	              // Logged In!!!!
	              return true;
	           } else {
	              // Not logged in
	              return false;
	           }
	        } else {
	            // Not logged in
	            return false;
	        }
	     } else {
	        // Not logged in
	        return false;
	     }
	   } else {
	     // Not logged in
	     return false;
	   }
	}

	/**
	 * [getRole description]
	 * @param  [type] $pdo [description]
	 * @return [type]      [description]
	 */
	function getCurrentUser($pdo) 
	{
		if (isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			if ($stmt = $pdo->prepare("SELECT * FROM App_User WHERE u_id = ? LIMIT 1")) 
			{
				$stmt->bindParam(1, $user_id, PDO::PARAM_INT);
		        $stmt->execute();

		        if($stmt->rowCount() == 1) { // If the user exists
		            $result = $stmt->fetch(PDO::FETCH_OBJ);

		      		return $result;
		      	}
		      	else 
		      	{
		      		return false;
		      	}
			}
			else 
			{
				return false;
			}
		} else {
			return false;
		}

	}


?>