<style type="text/css">
	#container h1 {
	background:none repeat scroll 0 0 #0080C0;
	color:#FFFFFF;
	font-size:16px;
	padding:10px;
	}
	.btn, a.btn:link, a.btn:visited {
	background-image:url("images/btn_bg.gif");
	background-repeat:repeat-x;
	border:1px solid #ACACAC;
	color:#252525;
	cursor:pointer;
	font-size:12px;
	font-weight:normal;
	outline:medium none;
	padding:1px 8px;
	text-decoration:none;
	}
	.btn:hover, a.btn:hover {
	border:1px solid black;
	color:#000000;
	outline:medium none;
	text-decoration:none;
	}
	table.form td {
	padding:5px;
	}
	table.form th {
	padding:5px;
	text-align:right;
	vertical-align:middle;
	font-size:14px;
	}
	table.form th.top {
	vertical-align:top;
	}
	table.form input[type="text"], table.form input[type="password"] {
	width:250px;
	}
	table.form select {
	width:250px;
	}
	table.form textarea {
	height:100px;
	width:250px;
	}
	table.form input.full[type="text"] {
	width:500px;
	}
	table.form textarea.full {
	width:675px;
	}
	table.form .img {
	border:1px solid #CCCCCC;
	}
	table.form td .cirkuitSkin td.mceToolbar {
	padding:1px 0 2px;
	}
	table.form h2 {
	border-bottom:2px solid #0080C0;
	font-size:16px;
	padding:5px 10px;
	text-align:left;
	}
</style>

<div id="container">
<h1>บอกต่อเพื่อน</h1>
<form action="faqs/sendmail/<?php echo $faqs->id?>" method="post" enctype="multipart/form-data">
	<table class="form">
		<tr>
			<th class="top">หัวข้อ :</th>
			<td>
				<input type="text" name="subject" value="สำนักโรคติดต่อทั่วไป - คำถามที่ถามบ่อย" >
			</td>
		</tr>
		<tr>
			<th class="top">อีเมล์ผู้รับ :</th>
			<td>
				<input type="text" name="to" value="" >
			</td>
		</tr>
		<tr>
			<th class="top">ชื่อผู้ส่ง :</th>
			<td>
				<input type="text" name="from" value="" >
			</td>
		</tr>
		<tr>
			<th class="top">อีเมล์ผู้ส่ง :</th>
			<td>
				<input type="text" name="formemail" value="" >
			</td>
		</tr>
		<tr><th></th><td><input class="btn" type="submit" value="ส่ง"></td></tr>
	</table>
</form>
</div>