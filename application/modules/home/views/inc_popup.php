<script type="text/javascript">
$(document).ready(function(){
	$.fn.colorbox({width:"780px",height:"600px", inline:true,href:"#popup",onClosed:function(){$('#popup').hide();}});	
	$('a[rel=popup]').click(function(){
		var i=parseInt($(this).next().text());
		var span=$(this);
		i=i+1;	
		$.ajax({			
			url:'<?php echo base_url(); ?>home/cntPopup',
			success: function(data)
			{					
				span.next().empty();
				span.next().text(i);					
			}
  						
		});
	});
	$('#bclose').click(function(){
		$.colorbox.close();
	}).mouseover(function(){		
		$(this).css('color','#5A5A5A');
	}).mouseleave(function(){
		$(this).css('color','#787878');
	});	
})	
</script>
<div id="popup" style="padding-left:27px;background:url(images/popup_download.jpg) no-repeat;width:700px;height:500px;">
<img src="media/images/popup_download.jpg" width="700px" height="500px" align="center">
<p style="margin:10px;"><a href="uploads/files/download_gcd.rar" rel="popup">ดาวน์โหลด</a><span style="margin:10px;"><?php echo $counter->counter; ?></span>ครั้ง
<span style="padding:3px 10px;margin-left:30px;display:inline-block;float:right;background-color:#D2D2D2;border:1px solid #B4B4B4;color:#787878;cursor:pointer;" id="bclose">ปิด</span></p>		

</div>
