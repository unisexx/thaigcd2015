<script type="text/javascript">
	$(function(){
		$("a[rel='ajax']").click(function(){
			$(this).parent().parent().find('.counter').text(parseInt($(this).parent().parent().find('.counter').text()) + 1);
		
		});
	});
</script>
<div class="corner" id="boxknowledge">
	<div class="topic"><img width="200" height="25" src="themes/gcdnew/images/topic_academic_center.png"></div>
	<div class="subtopic"> 
		<form method="get" action="academics/search">
			<p class="search">
			หัวข้อ: 
			<input type="text" id="textfield" name="textsearch" value="<?php echo @$_GET['textsearch']?>">
			<input type="submit" value="ค้นหา" />
			</p>
		</form>
	</div>
	<div id="data">

	<?php echo $academics->pagination() ?>
		<div class="groupname">ผลการค้นหา</div>
			<div class="detail">
					<table class="tbmedia">
                    	<tbody>
							<?php foreach($academics as $academic):?>
							<tr>
		                      <td><img width="100" src="<?php echo $academic->image?>"></td>
		                      <td valign="top" style="padding: 10px;"><h3><?php echo lang_decode($academic->title)?></h3><p><?php echo lang_decode($academic->detail)?></p>
		                      <a rel="ajax" href="mediapublics/download/<?php echo $academic->id?>"><img width="80" height="24" style="margin-top: 5px;" title="ดาวน์โหลดไฟล์นี้" alt="ดาวน์โหลดไฟล์นี้" src="themes/gcdnew/images/btn_save.png"></a>
		                      <div style="text-align: right;"><span class="f11 TxtGray2">ดาวน์โหลดไป <span class="counter"><?php echo $academic->counter?></span> ครั้ง</span></div></td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
			</div>
			<?php echo $academics->pagination() ?>
		
	</div><!--data-->
</div>