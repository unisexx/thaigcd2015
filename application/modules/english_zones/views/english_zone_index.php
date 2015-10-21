<script type="text/javascript">
	$(function(){
		$("a[rel='ajax']").click(function(){
			$(this).parent().parent().find('.counter').text(parseInt($(this).parent().parent().find('.counter').text()) + 1);
		
		});
	});
	
	
</script>

<div class="corner" id="boxknowledge">
	<div class="topic cufon"><span style="color:#8E4F3B;">English</span> Zone</div>
	<?php if(!isset($group->id)): ?>
	<div class="subtopic"> 
		<form method="get">
			<p class="search">
			หัวข้อ: <input type="text" name="search" value="<?php echo @$_GET['search'] ?>" size="30" />
			<input type="submit" class="btn_search2" value="ค้นหา" id="button2" name="button2">
			</p>
		</form>
	</div>	
	<?php endif;?>
	<div id="data">
		<div id="medialist">
		<ul>
			<?php foreach($english_zones as $english_zone):?>
				<li class="list">
					<a rel="ajax" href="english_zones/download/<?php echo $english_zone->id?>"><?php echo $english_zone->title?></a>
					<span class="date"><?php echo $english_zone->created?></span>
					 <span class="date">[ดาวน์โหลด <?php echo $english_zone->counter?> ครั้ง]</span>
				</li>
			<?php endforeach;?>
		</ul>
		<?php echo $english_zones->pagination() ?>
		</div>
	</div><!--data-->
</div>