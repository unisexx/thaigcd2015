<style type="text/css">
#horri_menu{
	border-bottom:2px solid #0080C0;
}
#horri_menu ul li{
	float:left;
	padding:5px;
	background:#f4f4f4;
	border-right:1px solid #ddd;
}
#horri_menu ul li.active{
	background:#0080C0;
}
#horri_menu ul li.active a{
	color:#fff;
}
</style>
<div id="horri_menu">
    <ul>
    	<li <?php echo menu_active('executives','histories')?>><a href="executives/admin/histories">ประวัติผู้บริหาร</a></li>
		<li <?php echo menu_active('executives','executive_infos')?>><a href="executives/admin/executive_infos">ข่าวประชาสัมพันธ์</a></li>
        <li <?php echo menu_active('executives','executives')?>><a href="executives/admin/executives">ข่าวสารผู้บริหาร</a></li>
        <li <?php echo menu_active('executives','executive_its')?>><a href="executives/admin/executive_its">ผู้บริหารเทคโนโลยีสารสนเทศระดับสูง สำนักโรคติดต่อทั่วไป</a></li>
        <li <?php echo menu_active('executives','executive_videos')?>><a href="executives/admin/executive_videos">คลิปวิดีโอ</a></li>
    </ul>
	<br class="clear">
</div>