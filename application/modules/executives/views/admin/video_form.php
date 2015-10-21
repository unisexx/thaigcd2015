<h1>คลิปวิดีโอ</h1>
<?php include('_menu.php');?>
<br>
<form id="frmMain" action="executives/admin/executive_videos/save/<?php echo $video->id?>" method="post" >
<table class="form">
	<tr>
		<th>ชื่อคลิป :</th>
		<td>
			<input type="text" name="title" value="<?php echo $video->title?>">
		</td>
	</tr>
	<tr>
		<th>youtube_url :</th>
		<td>
			<div><input type="text" name="url" value="<?php echo $video->url?>"></div>
		</td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /></td></tr>
</table>
</form>

<table class="list">
	<tr>
		<th>ชื่อคลิป</th>
		<th>youtube</th>
		<th></th>
	</tr>
	<?php foreach($videos as $video): ?>
	<tr>
		<td><?php echo $video->title?></td>
		<td><?php echo youtube($video->url,200,120)?></td>
		<td>
			<a class="btn" href="executives/admin/executive_videos/index/<?php echo $video->id?>" rel="<?php echo $video->id?>" >แก้ไข</a> 
			<a class="btn" href="executives/admin/executive_videos/delete/<?php echo $video->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach;?>
</table>