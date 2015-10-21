<div class="topic"><img src="<?php echo topic("topic_knowledge.png") ?>" height="25" width="200"></div>
<div id="data">
	<h2><?php echo lang_decode($knowledge->title) ?><span class="f10 TxtGray2"> <?php echo mysql_to_th($knowledge->start_date) ?> - <?php echo $knowledge->counter ?> ครั้ง</span></h2>
             <?php echo lang_decode($knowledge->detail) ?>
		
	


    <div class="ref"><strong>Credit by </strong> <span>คุณ <?php echo $knowledge->user->profile->first_name.' '.$knowledge->user->profile->last_name.' '.$knowledge->user->profile->position ?> </span></div>     
<div class="tag"><strong>TAG :</strong> <span><?php echo tag_decode($knowledge->tag) ?></span></div>
           
		</div><!--data-->
