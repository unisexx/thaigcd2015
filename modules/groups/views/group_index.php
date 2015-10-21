<div class="topic"><img src="themes/gcdnew/images/topic_group.png" height="25" width="200"></div>
<div id="data">
	<?php foreach($groups as $group): ?>
	<div class="box-group"> 
		<div class="box_info">
			<h3><?php echo $group->id.'. '.lang_decode($group->name)?></h3>
			<span><?php echo lang_decode($group->detail) ?></span>
			<h4>
				<?php if($group->phone): ?>
				<img src="themes/gcdnew/images/ico_phone.gif" alt="Phone" height="20" width="20"> <?php echo $group->phone ?> 
				<?php endif; ?>
				<?php if($group->fax): ?>
				<img src="themes/gcdnew/images/ico_fax.gif" alt="Fax" style="padding-left: 10px;" height="20" width="20"> <?php echo $group->fax ?>
				<?php endif; ?>
				<?php if($group->email): ?>
				<img src="themes/gcdnew/images/ico_mail.gif" alt="Email" style="padding-left: 10px;" height="20" width="20"> 
				<a href="mailto:tmanwg@yahoo.com" class="f11 link_web"><?php echo $group->email ?></a>
				<?php endif; ?>
			</h4>
			<div>ดูรายละเอียด : <a href="groups/index/<?php echo $group->id ?>" class="link_url">thaigcd.moph.go.th/group/<?php echo $group->id ?></a></div>
		</div>   
	</div><!--box-group-->
	<div class="clear"></div>
	<?php endforeach; ?>
</div>
