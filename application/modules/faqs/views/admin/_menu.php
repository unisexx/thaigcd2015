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
    	<li <?php echo menu_active('faqs','faqs')?>><a href="faqs/admin/faqs">รายการคำถาม</a></li>
        <li <?php echo menu_active('faqs','webboard_quizs')?>><a href="faqs/admin/webboard_quizs">คำถามจากเว็บบอร์ด</a></li>
    </ul>
	<br class="clear">
</div>