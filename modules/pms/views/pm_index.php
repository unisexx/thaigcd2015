<style type="text/css">
table.form td {
padding:5px;
}
table.form th {
padding:5px;
text-align:right;
vertical-align:middle;
}
table.form th.top {
vertical-align:top;
}
#navi h1 {
background:none repeat scroll 0 0 #E6E6E6;
font-weight:bold;
height:31px;
line-height:31px;
padding:0 10px;
margin:0 0 5px 0;
}
</style>
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/tinymce.js"></script>
<div id="navi"><h1>ส่งข้อความส่วนตัวถึง <?php echo $user->display?></h1></div>
	<div id="data">
		<form action="pms/save/<?php echo $user->id?>" method="post">
			<div>
				<label for="subject">หัวข้อ :</label>
				<input id="subject" type="text" name="subject" value="" style="width:450px">
			</div>
			<div>
				<label for="message">เนื้อหา :</label>
				<textarea id="message" name="message" class="editor[pm]"></textarea>
			</div>
			<div>
				<input type="hidden" name="user_id" value="<?php echo $user->id?>">
				<input type="submit" value="ส่งข้อความ">
			</div>
		</form>
	</div>