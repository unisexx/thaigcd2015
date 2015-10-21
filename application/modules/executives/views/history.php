<div class="topic"><img class="topic_executives" src="<?php echo topic("topic_executives.png") ?>" height="25" width="200"></div>
<div id="data"> 
	<div class="box-executive"> 
		<img src="uploads/users/<?php echo $user->profile->avatar ?>" class="executivephoto" width="140">
		<div class="box_info">
			<h3><?php echo $user->profile->first_name.' '.$user->profile->last_name ?></h3>
			<span><?php echo $user->profile->position ?></span>
		 	<h4><img src="themes/gcdnew/images/ico_phone.gif" height="20" width="20"><?php echo $user->profile->phone ?></h4>
			<?php echo $user->email ?>
			<div class="paddtop20bot20"><input name="" class="btn_toboss" type="button" rel="lightbox" href="executives/contact/<?php echo $user->id ?>?iframe=true&width=455&height=450"></div>
			<br clear="all">
   		</div>   
	</div><!--box-->
	<div class="clear"></div>
	<div class="box-executive-news">
  		<h3>ประวัติ</h3>
		<?php echo lang_decode($user->profile->long_history) ?>
	</div>
</div><!--data-->
