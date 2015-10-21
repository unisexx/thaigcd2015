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
    	<li <?php echo menu_active('chats','chats')?>><a href="chats/admin/chats">ตั้งค่าทั่วไป</a></li>
        <li <?php echo menu_active('chats','users')?>><a href="chats/admin/users">เจ้าหน้าที่</a></li>
    </ul>
	<br class="clear">
</div>