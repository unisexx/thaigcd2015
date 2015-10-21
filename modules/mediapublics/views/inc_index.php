<style type="text/css">
#boxnotice {
background-color:#FFFFFF;
border-color:#D6DCDF #D6DCDF -moz-use-text-color;
border-style:solid solid none;
border-width:1px 1px medium;
position:relative;
width:666px;
}
#boxnotice span.date {
color:#999999;
font-size:11px;
letter-spacing:1px;
padding-left:5px;
}
#boxnotice .list:link {
color:#666666;
text-decoration:none;
}
#boxnotice .list:visited {
color:#666666;
text-decoration:none;
}
#boxnotice .list:hover {
color:#333333;
text-decoration:none;
}
#boxnotice li {
background:url("../../gcdnew/themes/gcdnew/images/bull_arrow.png") no-repeat scroll left center transparent;
padding:3px 10px;
}
#boxnotice #medialist {
padding:0 10px 10px;
}
#boxnotice #mediaitem {
padding-top:10px;
}
#boxnotice #mediaitem .groupname {
background-color:#EDF7FE;
border:1px solid #CCCCCC;
font-size:15px;
font-weight:700;
margin-bottom:10px;
padding:5px;
}
</style>

<div class="corner left" id="boxnotice">
	<a class="moreright2" href="mediapublics/index/<?php echo $group_id?>">more</a>
	<div class="topic"><img width="194" height="22" src="themes/gcdnew/images/topic_media.png"></div>		
	<div id="medialist">
		<ul>
		<?php foreach($media as $mediapublic):?>
			<li>
				<a href="mediapublics/download/<?php echo $mediapublic->id?>"><?php echo lang_decode($mediapublic->title)?></a>
				<span class="date"><?php echo $mediapublic->created?></span>
			</li>
		<?php endforeach;?>
		</ul>
	</div>
	<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div><div class="shadow"></div></div>