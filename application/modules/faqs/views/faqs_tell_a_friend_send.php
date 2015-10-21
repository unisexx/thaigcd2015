<html>
<head>
<title>PHP Sending Email</title>
</head>
<body>
<?
	$strTo = $_POST["to"];
	$strSubject = $_POST["subject"];
	$strHeader = "Content-type: text/html; charset=UTF-8\n"; // or UTF-8 //
	$strHeader .= "From: ".$_POST["from"]."<".$_POST["formemail"].">\nReply-To: ".$_POST["formemail"]."";
	$strMessage = nl2br("เพื่อนของคุณได้ส่งคำถามที่น่าสนใจตามลิ้งดังกล่าว\n");
	$strMessage .= "<a href=http://thaigcd.ddc.moph.go.th/faqs/share/".$faqs->id.">http://thaigcd.ddc.moph.go.th/faqs/share/".$faqs->id."</a>";
	
	$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
	if($flgSend)
	{
		//echo "<div align='center' style='color:red; margin:40px 0; line-height:40px;'>ส่งคำถามเรียบร้อยแล้ว<br>ปิดหน้าต่างนี้</div>";
		set_notify('success', 'ส่งคำถามถึงเพื่อนเรียบร้อย');
			echo '<script type="text/javascript">
					parent.location = unescape(parent.location.pathname);
					</script>
			';
	}
	else
	{
		//echo "<div align='center' style='color:red; margin:40px 0; line-height:40px;'>Email Can Not Send.<br>ปิดหน้าต่างนี้</div>";
		set_notify('error', 'ไม่สามารุถส่งคำถามได้');
			echo '<script type="text/javascript">
					parent.location = unescape(parent.location.pathname);
					</script>
			';
	}
?>
</body>
</html>