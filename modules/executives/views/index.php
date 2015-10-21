<div class="topic"><img src="<?php echo topic("topic_executives.png") ?>" height="25" width="200"></div>
<div id="data"> 
	<div style="text-align: center;"><img width="590" height="270" src="themes/gcdnew/photo/executive_team.gif"></div>
	<?php echo $users->pagination() ?>
	<?php foreach($users as $user): ?>
	<div class="box-executive"> 
		<img src="uploads/users/<?php echo $user->profile->avatar ?>" class="executivephoto" height="140" width="140">
		<div class="box_info">
			<h3><?php echo $user->profile->first_name.' '.$user->profile->last_name ?></h3>
			<span><?php echo $user->profile->position ?></span>
		 	<h4><img src="themes/gcdnew/images/ico_phone.gif" height="20" width="20"><?php echo $user->profile->phone ?></h4>
			<?php echo $user->email ?>
			<div class="paddtop20bot20"><input type="submit" class="btn_toboss" name="" rel="lightbox" href="executives/contact/<?php echo $user->id ?>?iframe=true&width=455&height=450"><input type="button" onclick="window.location='executives/<?php echo $user->id ?>'" class="btn_notify" name=""></div>
   		</div>   
	</div><!--box-->
	<div class="clear"></div>
	<?php endforeach; ?>
	<?php echo $users->pagination() ?>
</div><!--data-->
