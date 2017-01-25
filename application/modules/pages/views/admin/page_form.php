<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js?v=1"></script>
<script type="text/javascript">
	tiny('detail[th],detail[en]');
	$(function(){
			$("[rel=en]").hide();
			$(".lang a").click(function(){
				$("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
				$(this).addClass('active').siblings().removeClass('active');
				return false;
			})
	})
</script>
<h1><?php echo lang_decode($page->title,'th') ?></h1>

<form action="pages/admin/pages/save/<?php echo $page->id ?>" method="post" >
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title[th]" rel="th" value="<?php echo lang_decode($page->title,'th')?>" class="full" />
			<input type="text" name="title[en]" rel="en" value="<?php echo lang_decode($page->title,'en')?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>รายละเอียด :</th>
		<td>
			<div rel="th"><textarea name="detail[th]" class="full tinymce"><?php echo lang_decode($page->detail,'th')?></textarea></div>
			<div rel="en"><textarea name="detail[en]" class="full tinymce"><?php echo lang_decode($page->detail,'en')?></textarea></div>
            
<!--            <script type="text/javascript" src="media/ckeditor/ckeditor.js"></script>
            <script type="text/javascript" src="media/cke_config.js"></script>		
            <script type="text/javascript">
			
            var editorObj1=CKEDITOR.replace( 'detail[th]',cke_config); 
			var editorObj2=CKEDITOR.replace( 'detail[en]',cke_config); 
		
            </script>-->
            
            
		</td>
	</tr>
	<tr>
    <th></th>
    <td>
        <input type="submit" value="บันทึก" />
        <input type="button" name="back" value="ย้อนกลับ" onclick="window.location = 'pages/admin/pages'" />
    </td>
    </tr>
</table>
</form>