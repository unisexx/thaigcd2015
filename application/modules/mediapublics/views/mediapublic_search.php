<script type="text/javascript">
	$(function(){
		$("a[rel='ajax']").click(function(){
			$(this).parent().parent().find('.counter').text(parseInt($(this).parent().parent().find('.counter').text()) + 1);
		
		});
	});
</script>
<div id="boxprnews">
	<div class="topic"><img src="themes/gcdnew/images/topic_media.png"></div>
	<div class="subtopic">
		<form method="get" action="mediapublics/search">
			<p class="search">
			หัวข้อ: <input type="text" name="search" value="<?php echo @$_GET['search'] ?>" size="30" />
			 กลุ่มงาน: <?php echo form_dropdown('groups',get_option('id','name','groups'),@$_GET['groups'],'class="group_ddl"','ทุกกลุ่มงาน');?>
			<input type="submit" class="btn_search2" value="ค้นหา" id="button2" name="button2">
			</p>
		</form>
	</div>
	<div id="data">
		<div class="groupname">ผลการค้นหา</div>
			<div class="detail">
					<table class="tbmedia">
                    	<tbody>
							<?php foreach($mediapublics as $mediapublic):?>
							<tr>
		                      <td><img width="100" src="<?php echo $mediapublic->image?>"></td>
		                      <td valign="top" style="padding: 10px;"><h3><?php echo lang_decode($mediapublic->title)?></h3><p><?php echo lang_decode($mediapublic->detail)?></p>
		                      <a rel="ajax" href="mediapublics/download/<?php echo $mediapublic->id?>"><img width="80" height="24" style="margin-top: 5px;" title="ดาวน์โหลดไฟล์นี้" alt="ดาวน์โหลดไฟล์นี้" src="themes/gcdnew/images/btn_save.png"></a>
		                      <div style="text-align: right;"><span class="f11 TxtGray2">ดาวน์โหลดไป <span class="counter"><?php echo $mediapublic->counter?></span> ครั้ง</span></div></td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
			</div>
		<?php echo $mediapublics->pagination()?>
	</div><!--data-->
</div>