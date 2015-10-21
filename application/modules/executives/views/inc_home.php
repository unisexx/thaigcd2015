<style>
	#pane5{background-image: linear-gradient(bottom, rgb(208,223,204) 14%, rgb(117,186,201) 60%, rgb(3,142,201) 100%);
background-image: -o-linear-gradient(bottom, rgb(208,223,204) 14%, rgb(117,186,201) 60%, rgb(3,142,201) 100%);
background-image: -moz-linear-gradient(bottom, rgb(208,223,204) 14%, rgb(117,186,201) 60%, rgb(3,142,201) 100%);
background-image: -webkit-linear-gradient(bottom, rgb(208,223,204) 14%, rgb(117,186,201) 60%, rgb(3,142,201) 100%);
background-image: -ms-linear-gradient(bottom, rgb(208,223,204) 14%, rgb(117,186,201) 60%, rgb(3,142,201) 100%);

background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0.14, rgb(208,223,204)),
	color-stop(0.6, rgb(117,186,201)),
	color-stop(1, rgb(3,142,201))
); border-radius:10px;
width: 240px;
margin-left: 8px;}
.xxx li{list-style-image:url('themes/gcdnew/images/bull_arrow.png');color:black;line-height:16px;margin-left:20px !important;}
</style>
<div id="boxnewsboss" class="corner">
	<a href="executives" class="moreleft" target="_self">more</a>
	<div class="topic"><img src="<?php echo topic("topic_newsboss.png") ?>" width="200" height="22" alt="Director of ThaiGCD" /></div>
	<div id="boss"></div>
	<div class="holder bossBar" style="width:260px;">
		<div id="pane5" style="padding-left: 15px; padding-top:10px;">
			<div class="info">
				
				<!-- <?php foreach($executives as $executive): ?>
				<div class="paddbot10">
					<span class="TxtGray f11"><?php echo mysql_to_th($executive->start_date) ?></span> : 
					<a href="executives/view/<?php echo $executive->id ?>"><?php echo lang_decode($executive->title) ?></a>
				</div>
				<?php endforeach; ?> -->
				
				<div style="border:1px solid white; float: left; width:70px;">
					<img src="uploads/users/<?php echo $user->profile->avatar_index ?>" width="70" height="100" alt="<?php echo $user->profile->first_name ?> <?php echo $user->profile->last_name ?>">
				</div>
				<div style="float:right; width:150px; font-size: 11px;">
					<div style="font-size: 12px;font-weight: bold;"><?php echo $user->profile->first_name ?> <?php echo $user->profile->last_name ?></div>
					<div style="">ผู้อำนวยการสำนักโรคติดต่อทั่วไป</div>
					<ul class="xxx">
						<!-- <li><a href="executives/view/<?php echo $executives->id?>" target="_self">ข่าวสารจากผู้อำนวยการ</a></li> -->
						<li><a href="executives/<?php echo $user->id?>" target="_self">ทำเนียบผู้บริหาร</a></li>
						<li><a rel="lightbox" href="executives/contact/<?php echo $user->id ?>?iframe=true&width=455&height=450" target="_self">ส่งสารถึงผู้อำนวยการ</a></li>
					</ul>
					<div id="icon" style="text-align: center;">
						<a href="https://www.facebook.com/tmanwg" target="_blank"><img src="themes/gcdnew/images/facebook.png" alt="go to facebook" width="24" height="24" /></a>
						<a href="https://twitter.com/gcdmoph" target="_blank"><img src="themes/gcdnew/images/twitter.png" alt="go to twitter" width="24" height="24" /></a>
					</div>
				</div>
		    </div>
		    <br clear="all">
	    </div>
	    <!-- <div style="float:right;"><a rel="lightbox" href="executives/contact/13?iframe=true&width=455&height=450"><img src="<?php echo topic("btn_toboss_1st.png") ?>" /></a></div> -->
  	</div>
</div><!--boxnewsboss-->