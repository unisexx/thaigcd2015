<h1>แชตออนไลน์</h1>
<?php include "_menu.php"?><br>
<form action="chats/admin/chats/save/<?php echo $chats->id ?> " name="chat_confiq" method="post">
	<table class="form">
		<tr>
			<th>ระบบสมาชิก :</th>
			<td><?php echo form_dropdown('member_chat', array('0'=>'เฉพาะ guest เท่านั้น', '1'=>'เฉพาะ member เท่านั้น', '2'=>'เข้าได้ทั้ง member และ guest'),$chats->member_chat, 'class="text select"'); ?></td>
		</tr>
		<tr>
			<th>ชื่อสงวน :</th>
			<td><?php echo form_input('forbidden', $chats->forbidden, 'class=full');?> ใช้เครื่องหมาย ลูกน้ำ (,) คั่นระหว่างคำ</td>
		</tr>
		<tr>
			<th>ชื่อห้อง :</th>
			<td><?php echo form_input('rooms', $chats->rooms, 'class=full');?> ใช้เครื่องหมาย ลูกน้ำ (,) คั่นระหว่างห้อง</td>
		</tr>
		<tr>
			<th>จำนวนที่ต้องการแสดง :</th>
			<td><?php echo form_dropdown('linecount', array('10'=>'10', '15'=>'15', '20'=>'20', '25'=>'25', '30'=>'30', '35'=>'35', '40'=>'40'),$chats->linecount, 'class="text select"'); ?> บรรทัด</td>
		</tr>
		<tr>
			<th>เก็บประวัติการสนทนา :</th>
			<td><?php echo form_input('logdate', $chats->logdate);?> วัน | <a href="#" onClick="javascript:window.open('chats/admin/chats/form','','location=0,status=0,scrollbars=1,width=700,height=500'); return false;">ดูประวัติการสนทนา</a></td>
		</tr>
		<tr>
			<th>แสดงข้อมูลเก่า :</th>
			<td><?php echo form_dropdown('showlastmsg', array('0'=>'ไม่เสดง', '1'=>'เสดง'),$chats->showlastmsg, 'class="text select"'); ?></td>
		</tr>
		<tr><th></th><td><input type="submit" value="บันทึก"></td></tr>
	</table>
</form>
