<ul id="breadcrumb">
	<li><a href="#" >ระบบลงทะเบียนการประชุม</a></li>
	<li><a href="officer" >รายชื่อผู้อบรม</a></li>
</ul>
<div id="content">
<div class="search">
<form method="get">
	<label>ชื่อ: </label>
	<input type="text" size="30" name="first_name" value="<?php echo (isset($_GET['first_name']))?$_GET['first_name']:'' ?>" />
	<label> นามสกุล: </label>
	<input type="text" size="30" name="last_name" value="<?php echo (isset($_GET['last_name']))?$_GET['last_name']:'' ?>" />
	<input type="submit" value="ค้นหา" />
</form>
</div>
<?php echo $users->pagination()?>
<table class="list">
<tr>
	<th width="20px"> </th><th>ชื่อ-สกุล </th><th>หน่วยงาน</th><th>ข้อมูลติดต่อ</th><th width="90"></th>
</tr>
<?php foreach($users as $user): ?>
<tr <?php echo cycle()?>>
	<td><img src="themes/gcdnew/images/<?php echo ($user->profile->gender=="m")?'male':'female' ?>.jpg" width="16" height="16" /></td>
  <td><?php echo $user->profile->first_name.' '.$user->profile->last_name ?></td>
  <td><?php echo $user->profile->agency->name ?></td>
  <td><?php echo ($user->profile->phone)?'<span class="icon icon-telephone"></span> <strong>โทรศัพท์:</strong> '.$user->profile->phone:'' ?> <?php echo ($user->profile->mobile)?'<span class="icon icon-phone"></span> <strong>มือถือ:</strong> '.$user->profile->mobile:'' ?></td>
  <td>
		<a href="officer/form/<?php echo $user->id?>" class="btn">แก้ไข</a>
		<a href="officer/delete/<?php echo $user->id?>" class="btn" onclick="return confirm('<?php echo lang('notice_confirm_delete')?>')">ลบ</a>
  </td>
</tr>
<?php endforeach ?>

</table>
<?php echo $users->pagination()?>
</div>