<div id="weblink">
    <div class="tabs">
           <div class="titleweblink">เว็บไซต์ที่เกี่ยวข้อง :</div>
           <div class="tab">
               <input type="radio" id="tab-1" name="tab-group-1" checked>
               <label for="tab-1">หน่วยงานราชการ</label>
               
               <div class="content">
                   <ul>
                   		<li><img src="themes/thaigcd2015/images/logo-weblink01.jpg" width="98" height="90" /></li>
                        <li><img src="themes/thaigcd2015/images/logo-weblink02.jpg" width="98" height="90" /></li>
                        <li><img src="themes/thaigcd2015/images/logo-weblink03.jpg" width="98" height="90" /></li>
                        <li><img src="themes/thaigcd2015/images/logo-weblink04.jpg" width="98" height="90" /></li>
                        <li><img src="themes/thaigcd2015/images/logo-weblink05.jpg" width="98" height="90" /></li>
                        <li><img src="themes/thaigcd2015/images/logo-weblink06.jpg" width="98" height="90" /></li>
                        <li><img src="themes/thaigcd2015/images/logo-weblink07.jpg" width="98" height="90" /></li>
                        <li><img src="themes/thaigcd2015/images/logo-weblink08.jpg" width="98" height="90" /></li>
                   </ul>
               </div> 
           </div>
            
           <div class="tab">
               <input type="radio" id="tab-2" name="tab-group-1">
               <label for="tab-2">สถาบันการแพทย์</label>
               
               <div class="content">
                   <ul>
                   		<li><img src="themes/thaigcd2015/images/logo-weblink09.jpg" width="98" height="90" /></li>
                        <li><img src="themes/thaigcd2015/images/logo-weblink10.jpg" width="98" height="90" /></li>
                        <li><img src="themes/thaigcd2015/images/logo-weblink11.jpg" width="98" height="90" /></li>
                        <li><img src="themes/thaigcd2015/images/logo-weblink12.jpg" width="98" height="90" /></li>
                        <li><img src="themes/thaigcd2015/images/logo-weblink13.jpg" width="98" height="90" /></li>
                        <li><img src="themes/thaigcd2015/images/logo-weblink14.jpg" width="98" height="90" /></li>
                        <li><img src="themes/thaigcd2015/images/logo-weblink15.jpg" width="98" height="90" /></li>
                        <li><img src="themes/thaigcd2015/images/logo-weblink16.jpg" width="98" height="90" /></li>
                   </ul>
               </div> 
           </div>
            
            <div class="tab">
               <input type="radio" id="tab-3" name="tab-group-1">
               <label for="tab-3">สุขภาพและอนามัย</label>
             
               <div class="content">
                   <p>ขออภัย! กำลังปรับปรุง</p>
               </div> 
           </div>
           
           <div class="tab">
               <input type="radio" id="tab-4" name="tab-group-1">
               <label for="tab-4">ข่าวสารและสื่อทั่วไป</label>
             
               <div class="content">
                   <p>ขออภัย! กำลังปรับปรุง</p>
               </div> 
           </div>
           
           <div class="tab">
               <input type="radio" id="tab-5" name="tab-group-1">
               <label for="tab-5">นิตยสารวารสาร</label>
             
               <div class="content">
                   <p>ขออภัย! กำลังปรับปรุง</p>
               </div> 
           </div>
           
           <div class="tab">
               <input type="radio" id="tab-6" name="tab-group-1">
               <label for="tab-6">อื่นๆ</label>
             
               <div class="content">
                   <p>ขออภัย! กำลังปรับปรุง</p>
               </div> 
           </div>
            
    </div>
</div>









<style type="text/css">
.clear{
clear:both;
}

.tab{;
margin:0 auto;
}

.tab div div{
display:none;
padding:10px; height:95px;
}

.tab ul li{
display:inline;
cursor:pointer;
color:#095CA7;
padding:2px 10px;
float:left;
margin:3px 0 0 3px;
}

.tab ul li.active{
color:#5895CB;
}

#linkgroup img{
	border: 1px solid #cccccc;
}

#tab_1{
	display:block;	
}
</style>

<script language="javascript">
$(function(){
	$(".tab ul li:first").addClass('active');
	
	$(".tab ul li").click(function(){
		$(this).addClass("active").siblings().removeClass("active").end().parent() .parent().find("div > div:eq(" + $(this).parent().find('li').index($(this)) + ")").show().siblings().hide();
	});
});
</script>


<img class="weblink_topic" src="<?php echo topic("topic_weblink.png") ?>" width="130" height="18" style="float:left;" alt="เว็บไซต์ที่เกี่ยวข้อง" />
<div id="linkgroup" class="tab B">
    <ul>
    	<?php foreach($categories as $category):?>
			<li><?php echo lang_decode($category->name,'')?></li>
		<?php endforeach;?>
    </ul>
	<br class="clear">
	
    <div>
		<?php foreach($categories as $key => $category):?>
			<div id="tab_<?php echo $key + 1?>" style="height:85px; overflow:hidden;">
				<!-- <MARQUEE width="930" scrollamount='1.5' scrolldelay='1' onmouseover='this.stop();' onmouseout='this.start();'> -->
				<?php foreach($category->weblink as $weblink):?>
					<a href="<?php echo $weblink->url?>" target="<?php echo $weblink->target?>"><img src="uploads/weblinks/<?php echo $weblink->image?>" alt="<?php echo lang_decode($weblink->title)?>" title="<?php echo lang_decode($weblink->title)?>" width="98" height="90" /></a>
				<?php endforeach;?>
				<!-- </MARQUEE> -->
			</div>
		<?php endforeach;?>
    </div>
</div>