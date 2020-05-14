<?php
// A class to help work with Sessions
// In our case, primarily to manage logging users in and out

// Keep in mind when working with sessions that it is generally
// inadvisable to store DB-related objects in sessions
	
class Session {
		private $logged_in = false;
		public $user_id;
		public $name;
		public $photo;
		public $group_id;
		public $message;
		public $position;
		
		function __construct() {
			session_start();	
			$this->check_login();
			$this->check_message();
			if($this->logged_in) {
				// actions to take right away if user is logged in	
			} else {
				// actions to take right away if user is not logged in
			}
		}
		
		/* ===============================================================
		 * This function checks weather the user is logged in or not
		 * and will return the Boolean result. */
		public function is_logged_in() {
				return $this->logged_in;	
		}
		
		/* ================================================================
		 * This function will do the login process and if the user exists
		 * in the database, if so it will return true. */
		public function login($user) {
			// database should find user based on username/password
			if($user) {
				$this->user_id = $_SESSION['user_id'] = $user->id;
				$this->name = $_SESSION['name'] = $user->name;
				//$this->photo = $_SESSION['photo'] = $user->photo;
				$this->group_id = $_SESSION['group'] = $user->group_id;
				$this->position = $_SESSION['position'] = $user->position;
				$this->logged_in = true;	
			}
		}
		
		/* =======================================================================
		 * This function handles the logout process which will unset the sessions
		 * and make the logged_in variable to false, so that the user can not login
		 * again until he enters his username and password. */
		public function logout() {
			unset($_SESSION['user_id']);
			unset($this->user_id);
			unset($this->group_id);
			unset($this->position);
			unset($_COOKKIE['login']);
			$this->logged_in = false;	
		}
		
		private function check_login() {
			if(isset($_SESSION['user_id'])) {
				$this->user_id = $_SESSION['user_id'];
				$this->logged_in = true;	
			} else {
				unset($this->user_id);
				$this->logged_in = false;	
			}
		}
		
		public function message($msg="") {
			if(!empty($msg)) {
				// then this is "set message"
				// make sure you understand why $this->message=$msg wouldn't work
				$_SESSION['message'] = $msg;	
			} else {
				// then this is "get message"
				return $this->message;
			}
		}
		
		private function check_message() {
			// Is there a message stored in the session?
			if(isset($_SESSION['message'])) {
				// Add it as an attribute and erase the stored version
				$this->message = $_SESSION['message'];
				unset($_SESSION['message']);	
			} else {
				$this->message = "";
			}
		}
}

$session = new Session();
$message = $session->message();
?>