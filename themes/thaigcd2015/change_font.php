
<script language="javascript" src="themes/thaigcd2015/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
$(function(){
	var minFont=9; // กำหนดขนาดตัวอักษรต่ำสุด
	var maxFont=16; //  กำหนดขนาดตัวอักษรสูงสุด
	var nowFont=13; // กำหนดขนาดตัวอักษรเริมต้น
	var objSet="h1, h2, h3, h4, p, span"; // แท็กที่ต้องการกำหนดขนาดตัวอักษร อาจใช้เป็น * หรือ a หรือ a.menu เป็นต้น
	
	//$(objSet).css("font-size",nowFont);
	
	$(".mFont button").click(function(){
		
			var inCase=$(this).text();
			
			if(inCase=="A +"){
/*				if(nowFont<maxFont){
					nowFont++;
				}else{
					nowFont=maxFont;
				}*/
				
				nowFont=16;
				$(objSet).css("font-size",nowFont);
			}
			if(inCase=="A"){
				
				nowFont=13;
				
				$(objSet).css("font-size",nowFont);
			}
			if(inCase=="A -"){
/*				if(nowFont>minFont){
					nowFont--;
				}else{
					nowFont=minFont;
				}*/
				nowFont=9;
				
				$(objSet).css("font-size",nowFont);
			}
	});
	
	$('.fontSizeMinus').click(function() {
			 

		nowFont=9;
		$(objSet).css("font-size",nowFont);	
		return false;
	});
	
	$('.fontReset').click(function() {
			 

		nowFont=13;
		$(objSet).css("font-size",nowFont);	
        return false;
	});
	
	$('.fontSizePlus').click(function() {
			 

		nowFont=16;
		$(objSet).css("font-size",nowFont);	
        return false;
	});
	
});
</script>