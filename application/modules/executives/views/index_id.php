<div class="topic"><img class="topic_executives" src="<?php echo topic("topic_executives.png") ?>" height="25" width="200"></div>
<div id="data"> 
	<div class="box-executive"> 
		<img src="uploads/users/<?php echo $user->profile->avatar ?>" class="executivephoto" height="140" width="140">
		<div class="box_info">
			<h3><?php echo $user->profile->first_name.' '.$user->profile->last_name ?></h3>
			<span><?php echo $user->profile->position ?></span>
		 	<h4><img src="themes/gcdnew/images/ico_phone.gif" height="20" width="20"><?php echo $user->profile->phone ?></h4>
			<?php echo $user->email ?>
			<div class="paddtop20bot20"><input name="" class="btn_toboss" type="button"  rel="lightbox" href="executives/contact/13?iframe=true&width=455&height=450"></div>
   		</div>   
	</div><!--box-->
	<div class="clear"></div>
	<?php echo $user->executive->pagination() ?>
	<?php foreach($user->executive as $executive): ?>
	<div class="box-executive-list">
    	<span><?php echo mysql_to_th($executive->start_date) ?></span>
        <a href="executives/view/<?php echo $executive->id ?>"><h3><?php echo lang_decode($executive->title) ?></h3></a>
        <?php echo lang_decode($executive->intro) ?>
	</div>
	<?php endforeach; ?>
	<?php echo $user->executive->pagination() ?>
</div><!--data-->
