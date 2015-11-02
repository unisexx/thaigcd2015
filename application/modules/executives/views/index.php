<div id="page">
	<div id="breadcrumb"><a href="home">หน้าแรก</a> > ผู้บริหาร</div>
    <div id="page-content">
    <div class="title-page">ผู้บริหาร</div>





<style>
	.more a{float:right; font-size:10px;color:purple;font-weight;bold;}
	h3{font-size:16px; color:brown;}
</style>

<div id="data" class="dexclutive">
	<!-- <?php foreach($users as $user): ?>
	<div class="box-executive"> 
		<img src="uploads/users/<?php echo $user->profile->avatar ?>" class="executivephoto" height="140" width="140">
		<div class="box_info">
			<h3><?php echo $user->profile->first_name.' '.$user->profile->last_name ?></h3>
			<span><?php echo $user->profile->position ?></span>
		 	<h4><img src="themes/gcdnew/images/ico_phone.gif" height="20" width="20"><?php echo $user->profile->phone ?></h4>
			<?php echo $user->email ?>
			<div>
				<input type="submit" class="btn_toboss" name="" rel="lightbox" href="executives/contact/<?php echo $user->id ?>?iframe=true&width=455&height=450">
				<input type="button" onclick="window.location='executives/<?php echo $user->id ?>'" class="btn_notify" name="">
			</div>
   		</div>
	<div class="clear"></div>
	<?php endforeach; ?> -->
	

<!-- <div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_pinterest_pinit"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-522ea3b9086ce9ee"></script> -->

<br clear="all">
	<h1 style="color:green;font-size:20px;"><?php echo lang_decode($users->profile->first_name)?> <?php echo lang_decode($users->profile->last_name)?></h1><br clear="all">
	<div style="width:250px;float:left;">
		<img src="uploads/users/<?php echo $users->profile->avatar ?>" class="executivephoto" width="300">
		<div>
			<?php echo lang_decode($users->profile->short_history)?>
			<div class="more"><a href="executives/history/<?php echo $users->id?>">อ่านต่อ</a></div>
		</div>
	</div>
	<div style="width:350px;float:right;">
		<!-- <div class="infos">
			<h3>ข่าวประชาสัมพันธ์</h3>
			<ul>
				<?php foreach($executive_infos as $info):?>
					<li>- <a href="executives/info_view/<?php echo $info->id?>"><?php echo $info->title?></a></li>
				<?php endforeach;?>
			</ul>
			<div class="more"><a href="executives/info_view/<?php echo $info->id?>">อ่านต่อ</a></div>
		</div> -->
		<div class="executive" style="margin-top:10px;">
			<h3>ผู้บริหารเทคโนโลยีสารสนเทศระดับสูง สำนักโรคติดต่อทั่วไป</h3>
			<ul>
				<?php foreach($executive_its as $it):?>
					<li style="list-style-type: disc !important;"><a href="executives/it_view/<?php echo $it->id?>"><?php echo lang_decode($it->title)?></a></li>
				<?php endforeach;?>
			</ul>
			<div class="more"><a href="executives/it_more">อ่านต่อ</a></div>
		</div>	
		<div class="executive" style="margin-top:10px;">
			<h3>ข่าวสารผู้บริหาร</h3>
			<ul>
				<?php foreach($executives as $executive):?>
					<li style="list-style-type: disc !important;"><a href="executives/view/<?php echo $executive->id?>"><?php echo lang_decode($executive->title)?></a></li>
				<?php endforeach;?>
			</ul>
			<div class="more"><a href="executives/exe_more">อ่านต่อ</a></div>
			<br>
		</div>
					
	</div>
	<br clear="all">
	<div style="margin-top:10px;">
			<h3>ผู้บริหารสำนักโรคติดต่อทั่วไป</h3>
			<?php 
				$excutive_list = new Page(84);
				echo lang_decode($excutive_list->detail);
			?>
	</div>
	<div style="margin-top:5px;">
		<div style="text-align: center;margin:5px 0;"><?php echo $videos->title?></div>
		<?php echo youtube($videos->url,'635','390');?><br><br>
		<h3>คลิปวิดีโอ</h3>
		<ul>
			<?php foreach($videos as $video):?>
				<li style="list-style-type: disc !important;"><a href="executives/video_view/<?php echo $video->id?>"><?php echo $video->title?></a></li>
			<?php endforeach;?>
		</ul>
		<div class="more"><a href="executives/video_view/<?php echo $video->id?>">อ่านต่อ</a></div>
	</div>
	<br clear="all">
</div><!--data-->





	</div>
</div>