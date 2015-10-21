<div class="corner" id="boxlogin-already">
	<div class="topic"><img width="200" height="25" alt="สมัครสมาชิก" src="themes/gcdnew/images/topic_member.png"></div>
	<div id="login">
		<div><span><a class="B" href="users/profile/<?php echo $user->id?>"><?php echo $user->profile->first_name.' '.$user->profile->last_name ?></a></span><a href="users/signout"><img width="63" height="16" style="margin-bottom: -3px; padding-left: 15px;" src="themes/gcdnew/images/btn_logoff.png"></a></div>
		
		<img src="themes/gcdnew/images/notice_newpm.gif" style="padding:5px 0 0 0;"> <a href="pms/inbox"><b>ข้อความส่วนตัว</b> (<?php echo $user->pm->where('status','0')->get()->result_count()?>)</a>
		
		<div class="f11 TxtGray">Login at : 8 ตุลาคม 2553 14.30 น.</div>
		<div id="icon"> 
			<a href="chats"><img width="32" height="32" class="imgtooltip" title="Chat Online" src="themes/gcdnew/images/icon_chat.png"></a>
			<a href="webboards"><img width="32" height="32" class="imgtooltip" title="Webboard" src="themes/gcdnew/images/icon_board.png"></a>
		<?php if(user()->profile->type<>"ประชาชนทั่วไป"): ?>
			<a href="blogs/setting"><img width="32" height="32" class="imgtooltip" title="Web Blog" src="themes/gcdnew/images/icon_blog.png"></a>
			<a href="#"><img width="32" height="32" class="imgtooltip" title="ระบบแบบสอบถาม" src="themes/gcdnew/images/icon_questionarie.png"></a>
			<a href="private_calendars"><img width="32" height="32" class="imgtooltip" title="ระบบปฎิทินกิจกรรม" src="themes/gcdnew/images/icon_calendar.png"></a>
			<a href="#"><img width="32" height="32" class="imgtooltip" title="ระบบการลงทะเบียนงานประชุม" src="themes/gcdnew/images/icon_meeting.png"></a>
			<a href="#"><img width="32" height="32" class="imgtooltip" title="ระบบบริหารทรัพยากรบุคคล" src="themes/gcdnew/images/icon_human.png"></a>
			<a href="#"><img width="32" height="32" class="imgtooltip" title="ระบบจัดเก็บเอกสาร" src="themes/gcdnew/images/icon_document.png"></a>
		<?php endif; ?>
		
		
		</div>
	</div>   
</div>