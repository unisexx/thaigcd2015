<?php 
class Authentication
{
	private $_loginpage; // set login page
	private $_useracls; //array("admin","author","editor","worker","manager");
	
	function  __construct() 
	{
		session_start();
	}

	function setLoginPage($loginpage)
	{
		$this->_loginpage = $loginpage;
	}
 
	function getLoginPage()
	{
		return $this->_loginpage;
	}
 
	function setUserACLs($a)
	{
		$this->_useracls = $a;
	}
 
	function requireACL($req_roles)
	{
		if(!$this->_requireACL($req_roles))
		{
			$this->destroyUserInfo();
			redirect($this->_loginpage);
		}
	}
 
 	private function _requireACL($req_roles)
 	{
 		foreach($req_roles as $req_role)
		{
	 		if($this->checkACL($req_role))
			{
	 			return true;
	 		}
 		}
 		return false;
	}
 
	function checkACL($role)
	{
 		$roles = $this->getUserACLs();
 		if($roles!=false)
		{
 			foreach($roles as $r)
			{
	 			if($r == $role)
				{
	 				return true;
	 			}
	 		}
 		}
 		return false;
 	}
 
 	function getUserACLs()
 	{
 		if(isset($_SESSION["roles"]))
		{
 			return $_SESSION["roles"];
 		}
		else
		{
 			return false;
 		}
 	}
	
	function setUserToken($token)
	{
		if(is_array($this->_useracls))
		{
 			$_SESSION["token"]=$token;
 			$_SESSION["roles"]= $this->_useracls;
 		}
		else
		{
 			$_SESSION["token"]=$token;
		}
	}
	
	function getUserToken()
	{
		if(isset($_SESSION["token"]))
		{
			return $_SESSION["token"];
		}
		else
		{
			return false;
		}
 	}
	
	function getSessionId()
	{
 		return session_id();
	}
	
	function requireLoggedIn()
	{
		if($this->checkLoggedIn()==false)
		{
			redirect($this->_loginpage);
		}
	}
	
	function checkLoggedIn()
	{
		if($this->getUserToken()==false)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	function destroyUserInfo()
	{
		session_destroy();
	}
}﻿
