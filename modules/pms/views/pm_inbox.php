<div id="inbox">
	<h1>กล่องข้อความ</h1>
	<?php foreach ($user->pm->order_by('id','desc')->get() as $row):?>
		<div class="blogrow" style="position:relative;">
			<?php $from_user = new user($row->from_user_id);?>
			<img class="avatar" src="<?php echo avatar($from_user->profile->avatar) ?>" width="48" height="48">
			<div class="create"><?php echo mysql_to_th($row->created,'S',TRUE)?></div>
			<?php if($row->status == 0):?>
					<img src="themes/gcdnew/images/notice_newpm.gif" style="position:absolute; top:12px; left:195px;" alt="ข้อความใหม่" title="ข้อความใหม่">
			<?php endif;?>
			<a href="users/profile/<?php echo $from_user->id?>"><?php echo $from_user->display?></a> ฝากข้อความถึงคุณ <a href="pms/view_message/<?php echo $row->id?>">อ่านข้อความ</a>
			<div style="position:absolute; top:13px; right:3px;"><a href="pms/delete/<?php echo $row->id?>"><img src="themes/gcdnew/images/ico_deletepost.gif" alt="ลบ" title="ลบ" onclick="return confirm('ยืนยันการลบข้อความส่วนตัว');"></a></div>
			<div class="clear"></div>
		</div>
	<?php endforeach;?>
</div>