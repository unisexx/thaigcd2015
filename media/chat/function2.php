<?php
	//IP ของเรา
	function myIP() {
		if (!ini_get('register_globals')) {
			$reg_globals = array($_POST, $_GET, $_FILES, $_ENV, $_SERVER, $_COOKIE);
			if (isset($_SESSION)) {
				array_unshift($reg_globals, $_SESSION);
			}
			foreach ($reg_globals as $reg_global) {
				extract($reg_global, EXTR_SKIP);
			}
		}
		if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
			return getenv("HTTP_CLIENT_IP");
		} elseif (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
			return getenv("HTTP_X_FORWARDED_FOR");
		} elseif (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
			return getenv("REMOTE_ADDR");
		} elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
			return $_SERVER['REMOTE_ADDR'];
		} else {
			return "unknown";
		}
	}
?>