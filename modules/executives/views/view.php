<div class="topic"><img src="<?php echo topic("topic_executives.png") ?>" height="25" width="200"></div>
<div id="data"> 
	<div class="box-executive"> 
		<img src="uploads/users/<?php echo $executive->user->profile->avatar ?>" class="executivephoto" height="140" width="140">
		<div class="box_info">
			<h3><?php echo $executive->user->profile->first_name.' '.$executive->user->profile->last_name ?></h3>
			<span><?php echo $executive->user->profile->position ?></span>
		 	<h4><img src="themes/gcdnew/images/ico_phone.gif" height="20" width="20"><?php echo $executive->user->profile->phone ?></h4>
			<?php echo $executive->user->email ?>
			<div class="paddtop20bot20"><input name="" class="btn_toboss" type="button" rel="lightbox" href="executives/contact/<?php echo $executive->user->id ?>?iframe=true&width=455&height=450"></div>
   		</div>   
	</div><!--box-->
	<div class="clear"></div>
	<div class="box-executive-news">
  		<h3><?php echo lang_decode($executive->title) ?></h3>
		<?php echo lang_decode($executive->detail) ?>
	</div>
</div><!--data-->
