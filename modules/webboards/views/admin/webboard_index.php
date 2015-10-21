<h1>เว็บบอร์ด</h1>
<?php include "_menu.php";?>
<br>
<form action="webboards/admin/webboard_quizs" name="topic_sort" method="post">ค้นหาตามหมวดหมู่ : <?php echo form_dropdown('category_id',$webboard_quizs->category->get_option(),@$_POST['category_id'],'','ทั้งหมด');?><input type="submit" value="ค้นหา"></form>
			<?php echo $webboard_quizs->pagination()?>
			<table class="list" id="weblinks-list">
				<tr>
					<th>หัวข้อ</th>
					<th>เข้าชม</th>
					<th>ตอบ</th>
					<th>โดย</th>
					<th>หมวดหมู่</th>
					<th width="95"><a class="btn" href="webboards/admin/webboard_quizs/form">ตั้งกระทู้ใหม่</a></th>
				</tr>
				
				<?php foreach ($webboard_quizs as $webboard_quiz):?>
				<tr <?php echo cycle()?>>
					<td><?php echo $webboard_quiz->title ?></td>
					<td><?php echo $webboard_quiz->counter ?></td>
					<td><?php echo $webboard_quiz->webboard_answer->result_count() ?></td>
					<td><?php echo $webboard_quiz->user->display ?></td>
					<td><?php echo lang_decode($webboard_quiz->category->name,'th') ?></td>
					<td>
						<a class="btn" href="webboards/admin/webboard_quizs/form/<?php echo $webboard_quiz->id?>" >แก้ไข</a> 
						<a class="btn" href="webboards/admin/webboard_quizs/delete/<?php echo $webboard_quiz->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a></td>
				</tr>
				<?php endforeach; ?>
			</table>
			<?php echo $webboard_quizs->pagination()?>