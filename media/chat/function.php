<?php
	//เวลา ที่ทดแล้ว
	$logtime = mktime(date("H") + $hour);
	//ฟังก์ชั่นแปลงข้อความ จาก UTF-8 เป็นภาษาอื่น (TIS-620)
	function myconv($string) {
		global $charset;
		if ($charset == 'TIS-620') {
			$str = $string;
			$res = "";
			for ($i = 0; $i < strlen($str); $i++) {
				if (ord($str[$i]) == 224) {
					$unicode = ord($str[$i + 2]) & 0x3F;
					$unicode |= (ord($str[$i + 1]) & 0x3F) << 6;
					$unicode |= (ord($str[$i]) & 0x0F) << 12;
					$res .= chr($unicode - 0x0E00 + 0xA0);
					$i += 2;
				} else {
					$res .= $str[$i];
				}
			}
			return $res;
		} else {
			return $string;
		}
	}
	//ฟังก์ชั่นแปลง BBCode สามารถเพิ่มได้
	function BBCode($text) {
		//link (http, www, ftp, email, color, size, b, i, u)
		$patterns = array('#(^|[^\"\']\s)(www|WWW)\.([^\s<>\.]+)\.([^\"\'\s\n<>]+)#sm', '#(^|[^\"\'=]{1})(http|HTTP|ftp)(s|S)?://([^\s<>\.]+)\.([^\"\'\s\)<>]+)#sm', '/([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)/i', '/\[color=([a-z,A-Z,0-9,#]+)\]/i', '/\[size=(15|25|35)\]/', '/\[\/(color|size)\]/i', '/\[(b|i|u)\]/i', '/\[\/(b|i|u)\]/i');
		$replace = array('\\1<a href="http://\\2.\\3.\\4" target="_blank">\\2.\\3.\\4</a>', '\\1<a href="\\2\\3://\\4.\\5" target="_blank">\\2\\3://\\4.\\5</a>', '<a href=\"mailto:\\1@\\2\">\\1@\\2</a>', '<font style="color:\\1">', '<font style="font-size:\\1pt">', '</font>', '<\\1>', '</\\1>');
		return preg_replace($patterns, $replace, $text);
	}
	//สร้างรหัสผ่าน
	function getsessionid() {
		srand((double)microtime() * 10000000);
		$chars = "0123456789abcdefghijklmnopqrstuvwxyz";
		$ret_str = "";
		$num = strlen($chars);
		for ($i = 0; $i < 32; $i++) {
			$ret_str .= $chars[rand() % $num];
			$ret_str .= "";
		}
		return $ret_str;
	}
	//ฟังก์ชั่นสำหรับการบันทึกลง log ไฟล์
	function savelog($data) {
		global $logdate, $datadir;
		if ($logdate > 0) {
			$logfile = $datadir."log.php";
			if (file_exists($logfile)) {
				$f = fopen($logfile, 'ab');
				fputs($f, "\r\n$data");
			} else {
				$f = fopen($logfile, 'wb');
				fputs($f, "<?die(\"Error : file not found!.\")?>\r\n".$data);
			}
			fclose($f);
		}
	}
?>