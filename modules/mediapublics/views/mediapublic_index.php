<script type="text/javascript">
	$(function(){
		$("a[rel='ajax']").click(function(){
			$(this).parent().parent().find('.counter').text(parseInt($(this).parent().parent().find('.counter').text()) + 1);
		
		});
	});
	
	$(function(){
		$(".detail").hide();
		$(".groupname").click(function(){
			$(this).parent().find(".detail").slideToggle();
		});
	})
</script>

<div class="corner" id="boxknowledge">
	<div class="topic"><img width="200" height="25" src="themes/gcdnew/images/topic_media.png"></div>	
	<div id="data">
		<div id="medialist">
		<ul>
			<?php ($group_id)?$mediapublics->where_related_user('group_id',$group_id):'';?>
			<?php foreach($mediapublics->get(5) as $mediapublic):?>
				<li class="list">
					<a rel="ajax" href="mediapublics/download/<?php echo $mediapublic->id?>"><?php echo lang_decode($mediapublic->title)?></a>
					<span class="date"><?php echo $mediapublic->created?></span>
				</li>
			<?php endforeach;?>
		</ul>
		</div>
		<ul>
		<?php foreach($categories as $category): ?>
		<li>
		<div class="groupname"><?php echo lang_decode($category->name,'') ?></div>
			<div class="detail">
					<table class="tbmedia">
                    	<tbody>
							<?php ($group_id)?$category->mediapublic->where_related_user('group_id',$group_id):'';?>
							<?php foreach($category->mediapublic->where("status = 'approve'")->order_by('id','desc')->get(5) as $mediapublics):?>
							<tr>
		                      <td><img width="100" src="<?php echo $mediapublics->image?>"></td>
		                      <td valign="top" style="padding: 10px;"><h3><?php echo lang_decode($mediapublics->title)?></h3><p><?php echo lang_decode($mediapublics->detail)?></p>
		                      <a rel="ajax" href="mediapublics/download/<?php echo $mediapublics->id?>"><img width="80" height="24" style="margin-top: 5px;" title="ดาวน์โหลดไฟล์นี้" alt="ดาวน์โหลดไฟล์นี้" src="themes/gcdnew/images/btn_save.png"></a>
		                      <div style="text-align: right;"><span class="f11 TxtGray2">ดาวน์โหลดไป <span class="counter"><?php echo $mediapublics->counter?></span> ครั้ง</span></div></td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
					<?php (!$group_id)?$group_id=0:'';?>
					<div align="right"><a href="mediapublics/index/<?php echo $group_id?>/<?php echo $category->id?>">อ่านทั้งหมด</a></div>
			</div>
		</li>
		<?php endforeach; ?>
		</ul>
	</div><!--data-->
</div>