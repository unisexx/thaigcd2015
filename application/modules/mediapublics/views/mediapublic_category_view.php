<script type="text/javascript">
	$(function(){
		$("a[rel='ajax']").click(function(){
			$(this).parent().parent().find('.counter').text(parseInt($(this).parent().parent().find('.counter').text()) + 1);
		
		});
	});
</script>
<div class="corner" id="boxknowledge">
	<div class="topic"><img src="themes/gcdnew/images/topic_media.png"></div>
	<?php if(!isset($group->id)): ?>
	<div class="subtopic"> 
		<form method="get">
			<p class="search">
			หัวข้อ: 
			<input type="text" id="textsearch" name="textsearch">
			กลุ่มงาน: 
			<?php echo form_dropdown('groups',get_option('id','name','groups'),@$_GET['groups'],'class="group_ddl"','ทุกกลุ่มงาน');?>
			<input type="submit" class="btn_search2" value="ค้นหา" id="button2" name="button2">
			</p>
		</form>
	</div>
	<?php endif;?>
	<div id="data">
		<ul>
		<li>
		<div class="groupname"><?php echo lang_decode($categories->name,'') ?></div>
			<div class="detail">
					<table class="tbmedia">
                    	<tbody>
							<?php ($group_id)?$categories->mediapublic->where_related_user('group_id',$group_id):'';?>
							<?php (@$_POST['textsearch'])?$categories->mediapublic->like('title',$_POST['textsearch']):'';?>
							<?php (@$_POST['groups'])?$categories->mediapublic->where_related_user('group_id',$_POST['groups']):'';?>
							<?php foreach($categories->mediapublic->where("status = 'approve'")->order_by('id','desc')->get_page(limit()) as $mediapublics):?>
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
		</li>
		</ul>
		<?php echo $categories->mediapublic->pagination()?>
	</div><!--data-->
</div>