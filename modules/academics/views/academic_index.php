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
	<div class="topic"><img width="200" height="25" src="themes/gcdnew/images/topic_academic_center.png"></div>	
	<div id="data">
		<ul>
		<?php foreach($categories as $category): ?>
		<li>
		<div class="groupname"><?php echo lang_decode($category->name,'') ?></div>
			<div class="detail">
					<table class="tbmedia">
                    	<tbody>
							<?php foreach($category->academic->where("status = 'approve'")->order_by('id','desc')->get(5) as $academics):?>
							<tr>
		                      <td><img width="100" src="<?php echo $academics->image?>"></td>
		                      <td valign="top" style="padding: 10px;"><h3><?php echo lang_decode($academics->title)?></h3><p><?php echo lang_decode($academics->detail)?></p>
		                      <a rel="ajax" href="academics/download/<?php echo $academics->id?>"><img width="80" height="24" style="margin-top: 5px;" title="ดาวน์โหลดไฟล์นี้" alt="ดาวน์โหลดไฟล์นี้" src="themes/gcdnew/images/btn_save.png"></a>
		                      <div style="text-align: right;"><span class="f11 TxtGray2">ดาวน์โหลดไป <span class="counter"><?php echo $academics->counter?></span> ครั้ง</span></div></td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
					<div align="right"><a href="academics/index/<?php echo $category->id?>">อ่านทั้งหมด</a></div>
			</div>
		</li>
		<?php endforeach; ?>
		</ul>
	</div><!--data-->
</div>