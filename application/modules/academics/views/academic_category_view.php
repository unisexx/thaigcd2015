<script type="text/javascript">
	$(function(){
		$("a[rel='ajax']").click(function(){
			$(this).parent().parent().find('.counter').text(parseInt($(this).parent().parent().find('.counter').text()) + 1);
		
		});
	});
</script>
<div class="corner" id="boxknowledge">
	<div class="topic"><img width="200" height="25" src="themes/gcdnew/images/topic_academic_center.png"></div>
	<div class="subtopic">ค้นหา 
		<form method="post">
			<input type="text" id="textfield" name="textsearch" value="<?php echo @$_POST['textsearch']?>">
			<input type="submit" class="btn_search2" value="Submit" id="button2" name="button2">
		</form>
	</div>
	<div id="data">
		<ul>
		<li>
			<?php echo $categories->academic->pagination() ?>
		<div class="groupname"><?php echo lang_decode($categories->name,'') ?></div>
			<div class="detail">
					<table class="tbmedia">
                    	<tbody>
							<?php foreach($categories->academic as $mediapublics):?>
							<tr>
		                      <td><img width="100" src="<?php echo $mediapublics->image?>"></td>
		                      <td valign="top" style="padding: 10px;"><h3><?php echo lang_decode($mediapublics->title)?></h3><p><?php echo lang_decode($mediapublics->detail)?></p>
		                      <a rel="ajax" href="mediapublics/download/<?php echo $mediapublics->id?>"><img width="80" height="24" style="margin-top: 5px;" title="ดาวน์โหลดไฟล์นี้" alt="ดาวน์โหลดไฟล์นี้" src="themes/gcdnew/images/btn_save.png"></a>
		                      <div style="text-align: right;"><span class="f11 TxtGray2">ดาวน์โหลดไป <span class="counter"><?php echo $mediapublics->counter?></span> ครั้ง</span></div></td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
			</div>
			<?php echo $categories->academic->pagination() ?>
		</li>

		</ul>
	</div><!--data-->
</div>