<div id="data">
	<div class="box-executive">
		<div class="box_info" style="text-align:center;">
			<center><img src="uploads/users/<?php echo $user->profile->avatar ?>" class="executivephoto" width="140"></center>
			<h3><?php echo $user->profile->first_name.' '.$user->profile->last_name ?></h3>
			<span><?php echo $user->profile->position ?></span>
		 	<h4>โทรศัพท์ <?php echo $user->profile->phone ?></h4>
			<?php echo $user->email ?>
			<!--<div class="paddtop20bot20"><input name="" class="btn_toboss" type="button" rel="lightbox" href="executives/contact/<?php echo $user->id ?>?iframe=true&width=455&height=450"></div>-->
			<br clear="all">
   		</div>
	</div><!--box-->
	<div class="clear"></div>
	<div class="box-executive-news">
  		<h3>ประวัติ</h3>
		<?php echo lang_decode($user->profile->long_history) ?>
	</div>
</div><!--data-->
