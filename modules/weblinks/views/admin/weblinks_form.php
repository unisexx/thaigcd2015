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
<h1>เว็บลิ้งค์</h1>
<form action="weblinks/admin/weblinks/save/<?php echo $weblinks->id ?>" method="post" enctype="multipart/form-data" id="weblink-form">
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<?php if(is_file('uploads/weblinks/'.$weblinks->image)): ?>
		<tr>
			<th></th>
			<td><img src="uploads/weblinks/<?php echo $weblinks->image?>" />
			</td>
		</tr>
	<?php endif; ?>
	<tr>
		<th>โลโก้เว็บ :</th>
		<td><input type="file" name="image"> (Image Size:98 x 90 px)</td>
	</tr>
	<tr>
		<th>ชื่อเว็บ :</th>
		<td>
			<input type="text" name="title[th]" rel="th" value="<?php echo lang_decode($weblinks->title,'th')?>" class="full" />
			<input type="text" name="title[en]" rel="en" value="<?php echo lang_decode($weblinks->title,'en')?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>URL :</th>
		<td><input type="text" name="url" value="<?php echo $weblinks->url?>"><i> *ตัวอย่าง : http://thaigcd.ddc.moph.go.th/</i></td>
	</tr>
	<tr>
		<th>รายละเอียด :</th>
		<td>
			<textarea rel="th" name="description[th]" class="full"><?php echo lang_decode($weblinks->description,'th')?></textarea>
			<textarea rel="en" name="description[en]" class="full"><?php echo lang_decode($weblinks->description,'en')?></textarea>
		</td>
	</tr>
	<tr>
		<th>แอคชั่น :</th>
		<td><?php echo form_dropdown('target', array('_blank'=>'เปิดลิ้งค์ในหน้าต่างใหม่', '_parent'=>'เปิดลิ้งค์ในหน้าต่างเดิม'),$weblinks->target, 'class="text select"'); ?></td>
	</tr>
	<tr>
		<th>หมวด :</th>
		<td><?php echo form_dropdown('category_id',$weblinks->category->get_option(),$weblinks->category_id,'');?></td></tr>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก"></td></tr>
</table>
</form>