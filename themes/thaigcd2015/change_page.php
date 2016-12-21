
<script type="text/javascript">
$(function(){
	
	var bg1="#000000"; // 
	var font1="#ffffff";
	var bg2="#ffffff"; //  
	var font2="#000000";
	var bg3="#000000"; //
	var font3="#fff04e"; 
	var nowFont=13; // กำหนดขนาดตัวอักษรเริมต้น
	
	var objSet="h1, h2, h3, h4, p, span"; // แท็กที่ต้องการกำหนดขนาดตัวอักษร อาจใช้เป็น * หรือ a หรือ a.menu เป็นต้น
	
	$(objSet).css("font-size",nowFont);
	
	
	$('.cbw').click(function() {
			 

				nowFont=13;
				$(objSet).css("font-size",nowFont);
				$(objSet).css("color",font1);
				$(objSet).css("background-color",bg1);
                return false;
	});
	
	$('.cnormal').click(function() {
			 

				nowFont=13;
				$(objSet).css("font-size",nowFont);
				$(objSet).css("color",font2);
				$(objSet).css("background-color",bg2);
                return false;
	});
	
	$('.cby').click(function() {
			 

				nowFont=13;
				$(objSet).css("font-size",nowFont);
				$(objSet).css("color",font3);
				$(objSet).css("background-color",bg3);
                return false;
	});
	

	
});
</script>