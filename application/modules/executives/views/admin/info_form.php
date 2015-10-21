<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
	tiny('detail');
</script>

<h1>ข่าวประชาสัมพันธ์ผู้บริหาร</h1>
<?php include('_menu.php');?>
<br>
<form id="frmMain" action="executives/admin/executive_infos/save/<?php echo $info->id?>" method="post" >
<table class="form">
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title" value="<?php echo $info->title?>">
		</td>
	</tr>
	<tr>
		<th>รายละเอียด :</th>
		<td>
			<textarea name="detail" class="full" ><?php echo $info->detail?></textarea>
		</td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /></td></tr>
</table>
</form>

<table class="list">
	<tr>
		<th>หัวข้อ</th>
		<th></th>
	</tr>
	<?php foreach($infos as $info): ?>
	<tr>
		<td><?php echo $info->title?></td>
		<td>
			<a class="btn" href="executives/admin/executive_infos/index/<?php echo $info->id?>" rel="<?php echo $info->id?>" >แก้ไข</a> 
			<a class="btn" href="executives/admin/executive_infos/delete/<?php echo $info->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach;?>
</table>