<script type="text/javascript">
	$(function(){
		$("tr[rel]").click(function(){
			$('input[name=roommate_id]', top.document).val($(this).attr("rel"));
			$('.roommate_name', top.document).html($(this).find('td:eq(0)').html() + ' ' + $(this).find('td:eq(1)').html());
			window.parent.lightbox_close();
			return false;
		})
	})
</script>
<div id="content" style="border-top:1px solid #CACACA">
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
	<th width="20px"> </th><th>ชื่อ-สกุล </th><th>ระดับ</th><th>หน่วยงาน</th><th>ข้อมูลติดต่อ</th>
</tr>
<?php foreach($users as $user): ?>
<tr <?php echo cycle()?> rel="<?php echo $user->id ?>">
	<td><img src="themes/gcdnew/images/<?php echo ($user->profile->gender=="m")?'male':'female' ?>.jpg" width="16" height="16" /></td>
  <td><?php echo $user->profile->first_name.' '.$user->profile->last_name ?></td>
<td><?php echo $user->level->level ?></td>
  <td><?php echo $user->profile->agency->name ?></td>
  <td><span class="icon icon-telephone"></span> <strong>โทรศัพท์:</strong> <?php echo ($user->profile->phone)?$user->profile->phone:'-' ?> <strong>มือถือ:</strong> <?php echo ($user->profile->mobile)?$user->profile->mobile:'-' ?></td>
</tr>
<?php endforeach ?>

</table>
<?php echo $users->pagination()?>
</div>