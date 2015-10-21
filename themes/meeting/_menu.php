<div class="bghead"><img src="themes/meeting/images/head.gif" width="719" height="130"></div>

<div style="clear:both;"></div>
<ul id="saturday">
	<li <?php echo menu_active('questions')?>><a href="questions" >รายการที่ลงทะเบียนแล้ว</a></li>
	<?php if(is_publish('admin_meetings')): ?>
    <li <?php echo menu_active('officer')?>><a href="officer" >รายชื่อผู้มีสิทธิ์อบรม</a></li>
	<?php endif; ?>
	<li <?php echo menu_active('meetings')?>><a href="meetings">รายการการประชุมทั้งหมด</a></li>
	<?php if(is_publish('admin_meetings')): ?>
	<li <?php echo menu_active('camps')?>><a href="camps">ข้อมูลที่พัก</a></li>		
	<li <?php echo menu_active('hosts')?>><a href="hosts">ผู้จัด</a></li>
	<?php endif; ?>
</ul>
        
        
        

