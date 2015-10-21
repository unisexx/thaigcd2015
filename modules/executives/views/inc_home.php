<div id="boxnewsboss" class="corner">
	<a href="executives" class="moreleft">more</a>
	<div class="topic"><img src="<?php echo topic("topic_newsboss.png") ?>" width="200" height="22" alt="Director of ThaiGCD" /></div>
	<div id="boss"></div>
	<div class="holder bossBar" style="width:260px;">
		<div id="pane4" class="scroll-pane" style="padding-left: 15px; ">
			<div class="info">
				
				<?php foreach($executives as $executive): ?>
				<div class="paddbot10">
					<span class="TxtGray f11"><?php echo mysql_to_th($executive->start_date) ?></span> : 
					<a href="executives/view/<?php echo $executive->id ?>"><?php echo lang_decode($executive->title) ?></a>
				</div>
				<?php endforeach; ?>
				
		    </div>
	    </div>
	    <div style="padding:10px 0 0 110px;"><a rel="lightbox" href="executives/contact/612?iframe=true&width=455&height=450"><img src="themes/gcdnew/images/btn_toboss_1st.png" width="146" height="17" /></a></div>
  	</div>
</div><!--boxnewsboss-->