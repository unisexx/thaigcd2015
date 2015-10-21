<div class="topic"><img src="<?php echo topic("topic_sitemap.png") ?>" width="200" height="25" alt="ข่าวประชาสัมพันธ์ ThaiGCD"/></div>
<div id="data" class="sitemap">
<?php foreach($categories as $key =>$category): ?>
	<?php if($key==0): ?>
	<div style="float:left; width: 50%;">
	<ul>
	<?php endif; ?>
	<li><a href="<?php echo sitemap($category->module) ?>"><?php echo lang_decode($category->name)?></a>
		<ul>
			<?php foreach($childs->where('parents = '.$category->id)->get() as $child): ?>
				<li><a href="<?php echo sitemap($child->module,$child->id)?>"><?php echo lang_decode($child->name) ?></a></li>
			<?php endforeach; ?>
		</ul>
	</li>
	<?php if($key==$num-1): ?>
		</ul>
	</div>
	<div style="float:left; width: 50%;">
		<ul>
	<?php endif; ?>
<?php endforeach; ?>
			<li><a href="executives">ผู้บริหารสำนักโรคติดต่อทั่วไป</a></li>
			<li><a href="pages/aboutus">เกี่ยวกับสำนัก</a></li>
			<li><a href="groups">กลุ่มงาน</a></li>
			<li><a href="pages/contactus">ติดต่อสอบถาม</a></li>
		</ul>
	</div>
	<div class="clear"></div>
</div>