<script type="text/javascript">
	$(function(){
		$("a[rel='ajax']").click(function(){
			$(this).parent().parent().find('.counter').text(parseInt($(this).parent().parent().find('.counter').text()) + 1);
		
		});
	});
	
	$(function(){
		$(".detail").hide();
		$(".groupname").click(function(){
			$(this).parent().toggleClass('active').find(".detail").slideToggle();
		});
	})
</script>

<div class="corner" id="boxknowledge">
	<div class="topic"><img src="themes/gcdnew/images/topic_media.png"></div>
	<?php if(!isset($group->id)): ?>
	<div class="subtopic"> 
		<form method="get" action="mediapublics/search">
			<p class="search">
			หัวข้อ: <input type="text" name="search" value="<?php echo @$_GET['search'] ?>" size="30" />
			 กลุ่มงาน: <?php echo form_dropdown('groups',get_option('id','name','groups'),@$_GET['groups'],'class="group_ddl"','ทุกกลุ่มงาน');?>
			<input type="submit" class="btn_search2" value="ค้นหา" id="button2" name="button2">
			</p>
		</form>
	</div>	
	<?php endif;?>
	<div id="data">
		<div id="medialist">
		<ul>
			<?php ($group_id)?$mediapublics->where('group_id',$group_id):'';?>
			<?php foreach($mediapublics->order_by('id','desc')->limit(5)->get() as $mediapublic):?>
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
		<div class="groupname"><?php echo lang_decode($category->name,'') ?> (<?php echo ($group_id)?$category->mediapublic->where('group_id',$group_id)->where("status = 'approve'")->limit(5)->get()->result_count():$category->mediapublic->where("status = 'approve'")->limit(5)->get()->result_count();?>)<span class="toggle"></span></div>
			<div class="detail">
					<table class="tbmedia">
                    	<tbody>
							<?php ($group_id)?$category->mediapublic->where('group_id',$group_id):'';?>
							<?php foreach($category->mediapublic->where("status = 'approve'")->order_by('id','desc')->limit(5)->get() as $mediapublics):?>
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