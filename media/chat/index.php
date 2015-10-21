<?php
	ob_start();
	session_start();
	if(!isset($_GET['lang'])||!isset($_COOKIE['chatlang']))$lang = 'th';
	//$lang = (isset($_GET[lang])) ? $_GET[lang] : $_COOKIE[chatlang];
	//echo $lang;
	if(isset($_SESSION['chatuser']))$user = $_SESSION['chatuser'];
	if(isset($_SESSION['chatpasswd']))$passwd = $_SESSION['chatpasswd'];
	include ("config.php"); //ค่ากำหนด
	include ("function.php"); //ฟังก์ชั่นต่างๆ
	//มี log ถ้า $logdate มากกว่า 0
	if ($logdate > 0) {
		$logfile = $datadir."log.php";
		if (file_exists($logfile)) {
			$validdate = $logtime - (86400 * $logdate);
			$fr = file($logfile);
			$nfr = array();
			for ($i = 1; $i < count($fr); $i++) {
				$n = (int)$fr[$i];
				if (($n > 0) && ($n >= $validdate)) {
					$nfr[] = $fr[$i];
				}
			}
			$f = fopen($logfile, "wb");
			$data = trim(implode("", $nfr));
			if ($data != "") {
				$data = "\r\n$data";
			}
			fputs($f, "<?die(\"Error : file not found!.\")?>$data");
			fclose($f);
		}
	}
	//ตรวจสอบภาษา
	if (!file_exists("language/$lang.lng") || preg_match('/:\/\//i', $lang)) {
		$languages = each($language);
		$lang = $languages[0];
	}
	//อ่านภาษา
	include ("language/$lang.lng");
	//บันทึกการเลือกภาษาลง cookie
	setCookie("chatlang", $lang, time() + 3600 * 24 * 365);
	$cookie = $_COOKIE['ci_session'];
	$cookie = unserialize(stripslashes($cookie));
	$ci_user_id = $cookie['id'];
	if($ci_user_id)
	{
		$sql = "SELECT * FROM users WHERE id = $ci_user_id";
		$query = mysql_query($sql); 
		$listmember = mysql_fetch_array($query);
		$_POST['submit'] = TRUE;
		$_POST['user'] = $listmember['username'];
		$_POST['passwd'] = $listmember['password'];
	}
	//echo $ci_user_id;
	if (isset($_POST['submit'])) { //มาจากฟอร์ม login
		$user = stripslashes(htmlspecialchars($_POST[user]));
		$passwd = stripslashes(htmlspecialchars($_POST[passwd]));
		$usericon = $_POST[usericon];
		$usercolor = $_POST[usercolor];
		$userdata = "skin/img/u$usericon.gif"; //รูปรวมพาธ ไอคอนของ user ที่เลือก
		$displayname = $user; //ชื่อเล่นที่แสดงบน chat
		$admin = false; //บอกว่าไม่ใช่ admin ไว้ก่อน
		$useronline = true; //บอกว่ามี user นี้แล้วไว้ก่อน
		$memberid = 0; //บอกว่าไม่ใช่ member ไว้ก่อน
		if ($user_chat > 0) {
			//เป็นสมาชิกได้ ให้ไปตรวจกับฐานข้อมูล
			//เขียนโค้ดเพื่อตรวจสอบสมาชิกกับฐานข้อมูลที่นี่
			//ค่ากำหนดของฐานข้อมูล
			include "inc/connect.php";
			$db_user = 'users'; //ชื่อตารางสมาชิก
			$field_user = 'username'; //ชื่อฟิลด์ username
			$field_password = 'password'; //ชื่อฟิลด์ รหัสผ่าน
			$filed_userid = 'id'; //ชื่อฟิลด์ id สมาชิก
			$field_displaname = 'display'; //ชื่อฟิลด์ชื่อเรียก ถ้าไม่มีให้กำหนดให้เหมือนกับ field_user
			$field_usericon = 'avatar'; //ชื่อฟิลด์รูปประจำตัวสมาชิก ไม่มีปล่อยว่างไว้
			$usericon_path = '../../uploads/users/'; //path ที่เก็บ user icon ถ้าใน db ระบุครบอยู่แล้วให้ปล่อยว่าง
			//$sql = "SELECT * FROM `$db_user` WHERE `$field_user` = '$user' LIMIT 1";
			$sql = "SELECT users.*,profiles.* FROM users 
					LEFT JOIN profiles ON users.id = profiles.user_id 
					WHERE users.username = '$user'";
			$query = mysql_query($sql); //query
			if ($query) {
				$listmember = mysql_fetch_array($query); //อ่านข้อมูล
			}
			if ($passwd == "" && $user_chat != 1) {
				//ไม่ได้กรอกรหัสผ่านมา login ในฐานะบุคคลทั่วไป ไม่ให้ใช้ชื่อของสมาชิก และชื่อสงวน และชื่อคนที่ online อยู่แล้ว
				if (stristr(",$forbidden,", ",$user,") === FALSE && !$listmember) {
					$useronline = userexists($user);
				}
			} elseif ($listmember[$field_password] == $passwd && $listmember[$field_user] == $user) //ตรวจสอบความถูกต้องของชื่อและรหัสผ่านที่กรอก
			{
				$useronline = false; //user ถูกต้องเรียบร้อย
				$memberid = $listmember[$filed_userid]; //เก็บค่า id ของสมาชิก
				//ชื่อที่ใช้แสดงบน chat
				if ($field_displaname != '') {
					if($listmember[chat_operator] == "approve"){
						$displayname = "<font color=red>".$listmember[$field_displaname]."</font>";
					}else{
						$displayname = $listmember[$field_displaname];
					}
				}
				//รูปรวมพาธ ไอคอนของสมาชิก
				if ($field_usericon != '' && $listmember[$field_usericon] != '') {
					//รูปรวมพาธ ไอคอนของสมาชิก ถ้าไม่มีให้ลบออก
					$membericon = $usericon_path.$listmember[$field_usericon];
					//$membericon = "http://localhost/gcdnew/uploads/users/4cca6f7f26c04.jpg";
					//if (file_exists($membericon)) {
						$userdata = $membericon; //รูปรวมพาธ ไอคอนของสมาชิก
					//}
				}
			}
			@mysql_close($dbconnection); //ยกเลิกการติดต่อกับฐานข้อมูล
		} elseif (stristr(",$forbidden,", ",$user,") === FALSE) { //ตรวจสอบชื่อสงวน ไม่ให้ใช้ชื่อสงวน และชื่อคนที่ online อยู่แล้ว
			$useronline = userexists($user);
		}
		if (!$useronline) { //login สำเร็จ
			//บันทึกลง session สำหรับ sticker
			$_SESSION[sticker_user] = $user;
			$_SESSION[sticker_password] = $passwd;
			//บันทึกลง cookie
			setCookie("chatuser", $user, time() + 3600 * 24 * 365);
			setCookie("chatpasswd", $passwd, time() + 3600 * 24 * 365);
			setCookie("chaticon", $usericon, time() + 3600 * 24 * 365);
			setCookie("chatcolor", $usercolor, time() + 3600 * 24 * 365);
			//บันทึกลง session id|username|userdata|usercolor|displayname|userid
			$_SESSION[chatuserdata] = session_id()."|$user|$userdata|$usercolor|$displayname|$memberid";
			//บันทึกลง session = ชื่อห้อง
			$_SESSION[chatroom] = urlencode($rooms[0]); //login ครั้งแรก ให้เป็นห้องแรก (เข้ารหัส)
			//เรียก chat
			include ("chat.php");
		} else { //login ไม่สำเร็จ
			unset($user);
			unset($passwd);
			$status = $login_header_error;
			include ("login.php");
		}
	} else {
		if (empty($passwd)) {
			//login ครั้งแรก
			$user = $_COOKIE['chatuser'];
			$passwd = $_COOKIE['chatpasswd'];
			$status = $login_header;
		} else { //ไม่สามารถ login ได้ เคลียร์ค่าต่างๆ
			$user = "";
			$passwd = "";
			$status = $login_header_error;
		}
		include ("login.php");
	}
	//ฟังก์ชั่นตรวจสอบว่ามีชื่อนี้ online อยู่แล้วหรือไม่
	function userexists($name) {
		global $datadir;
		$id = session_id();
		$useronline = $datadir."useronline"; //ไฟล์บันทึกรายชื่อ user ในห้อง sessionid|room|id|name|data|color|displayname|time
		if (file_exists($useronline)) {
			$fr = file($useronline);
			for ($i = 0; $i < count($fr); $i++) {
				$ds = explode("|", $fr[$i]);
				if ($ds[0] != $id && $name == $ds[3]) {
					return true;
				}
			}
		}
		return false;
	}
?>