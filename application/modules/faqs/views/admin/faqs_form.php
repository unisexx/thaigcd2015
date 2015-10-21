<script type="text/javascript">
	$(function(){
			$("[rel=en]").hide();
			$(".lang a").click(function(){
				$("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
				$(this).addClass('active').siblings().removeClass('active');
				return false;
			})
	})
</script>
<h1>คำถามที่ถามบ่อย</h1>
<form action="faqs/admin/faqs/save/0/<?php echo $faqs->id ?>" method="post">
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<tr>
		<th>คำถาม :</th>
		<td>
			<?php echo form_input('question[th]',lang_decode($faqs->question,'th').$quiz->title,'class=full rel=th');?>
			<?php echo form_input('question[en]',lang_decode($faqs->question,'en'),'class=full rel=en');?>
		</td>
	</tr>
	<tr>
		<th>คำตอบ :</th>
		<td>
			<?php echo form_textarea('answer[th]',lang_decode($faqs->answer,'th'),'class=full rel=th');?>
			<?php echo form_textarea('answer[en]',lang_decode($faqs->answer,'en'),'class=full rel=en');?>
		</td>
	</tr>
	<tr>
		<th>หมวด :</th>
		<td><?php echo form_dropdown('category_id',$faqs->category->get_option(),$faqs->category_id,'');?></td>
	</tr>
	<tr>
		<th>คำถามเด่น :</th>
		<td><?php echo form_dropdown('hot', array('0' => 'ไม่ใช่','1' => 'ใช่'), $faqs->hot);?></td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก"><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>