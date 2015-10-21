<? include "include/config.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="<?php echo base_url(); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=$title; ?></title>
	<link rel="stylesheet" type="text/css" href="themes/thaigcd/css/template.css"/>
	<link type="text/css" href="themes/thaigcd/css/ui-lightness/jquery.ui.all.css" rel="stylesheet" />
	<link type="text/css" href="themes/thaigcd/css/ui-lightness/jquery.ui.tabs.css" rel="stylesheet" />
	<script type="text/javascript" src="themes/thaigcd/js/SWFSupport.js"></script>
	<script type="text/javascript" src="themes/thaigcd/js/jquery.min.js" ></script>
	<script type="text/javascript" src="themes/thaigcd/js/jquery.ui.core.js"></script>
	<script type="text/javascript" src="themes/thaigcd/js/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="themes/thaigcd/js/jquery.ui.tabs.js"></script>
	<script type="text/javascript" src="themes/thaigcd/js/easySlider1.5.js"></script>
	<script type="text/javascript" src="themes/thaigcd/js/jquery.marquee.js"></script>
	<script type="text/javascript" src="themes/thaigcd/js/jquery.slideheader.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="themes/thaigcd/css/jScrollPane.css" />
	<script type="text/javascript" src="themes/thaigcd/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="themes/thaigcd/js/jScrollPane.js"></script>

<script type="text/javascript">
	$(function(){
		$(".corner").append('<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div><div class="shadow"></div>');
		$("#tabs,#tabs2").tabs();
		$('#pane3').jScrollPane();
		$('#pane4').jScrollPane({scrollbarOnLeft:true});
		$("#slider").easySlider();
		setInterval( "slideSwitch()", 4000 );
	});
</script>

</head>

<body>
<div id="wrapper">
<div id="header">
<? include "_header.php";?>
</div><!--header-->

<div id="main">
	<div id="dvleft">
	  <? include "_left.php";?>
	</div><!--dvleft-->
    
    <div id="dvright" class="right">
        <div id="boxheadpic" class="corner">
            <div id="slideshow">
                <img src="themes/thaigcd/photo/head1.jpg" width="656" height="253" class="active" />
                <img src="themes/thaigcd/photo/head2.jpg" width="656" height="253" />
                <img src="themes/thaigcd/photo/head3.jpg" width="656" height="253" />
                <img src="themes/thaigcd/photo/head4.jpg" width="656" height="253" />
            </div>
        </div><!--boxheadpic-->
        <div class="paddtop20bot20"><span></span></div>
        
        <?php echo modules::run('informations/inc_index'); ?> 
        <div class="paddtop20bot20"><span></span></div>
        
        <div id="boxnotice" class="corner">
        	<a href="#" class="moreright2">more</a>
            <div class="topic"><img src="themes/thaigcd/images/topic_notice.png" width="200" height="25" /></div>
             <div class="box"> 
                    <a href="#" class="thumb"><img src="themes/thaigcd/photo/thumb1.jpg" width="77" height="64" /></a>
                    <div class="box_info">
                    <span>02/06/2553</span>
                    <a href="#"><h3>สอบราคาจ้างผลิต และเผยแพร่สปอตโฆษณา ทางสถานีโทรทัศน์เคเบิลทีวี และทีวีดาวเทียม</h3></a>
                    </div>   
             </div>
             <div class="clear"></div>
             
  <div class="box alt"> 
                    <a href="#" class="thumb"><img src="themes/thaigcd/photo/thumb1.jpg" width="77" height="64" /></a>
                    <div class="box_info">
                    <span>02/06/2553</span>
                    <a href="#"><h3>เรียนเชิญสาธารณชน เสนอแนะ และวิจารณ์หรือมีความคิดเห็นการ เปิดซองสอบราคาจ้าง</h3></a>
                    </div>   
          </div>
             <div class="clear"></div>
             
             <div class="box"> 
                    <a href="#" class="thumb"><img src="themes/thaigcd/photo/thumb1.jpg" width="77" height="64" /></a>
                    <div class="box_info">
                    <span>02/06/2553</span>
                    <a href="#"><h3>สอบราคาจ้างผลิต และเผยแพร่สปอตโฆษณา ทางสถานีโทรทัศน์เคเบิลทีวี และทีวีดาวเทียม</h3></a>
                    </div>   
             </div>
             <div class="clear"></div>
             
             <div class="box alt"> 
                    <a href="#" class="thumb"><img src="themes/thaigcd/photo/thumb1.jpg" width="77" height="64" /></a>
                    <div class="box_info">
                    <span>02/06/2553</span>
                    <a href="#"><h3>สอบราคาจ้างผลิต และเผยแพร่สปอตโฆษณา ทางสถานีโทรทัศน์เคเบิลทีวี และทีวีดาวเทียม</h3></a>
                    </div>   
             </div>
             <div class="clear"></div>
             
             <div class="box"> 
                    <a href="#" class="thumb"><img src="themes/thaigcd/photo/thumb1.jpg" width="77" height="64" /></a>
                    <div class="box_info">
                    <span>02/06/2553</span>
                    <a href="#"><h3>สอบราคาจ้างผลิต และเผยแพร่สปอตโฆษณา ทางสถานีโทรทัศน์เคเบิลทีวี และทีวีดาวเทียม</h3></a>
                    </div>   
             </div>
             <div class="clear"></div>
      </div><!--boxnotice-->
        
        <div id="boxvdosound" class="corner">
            <div id="player"><img src="themes/thaigcd/images/vdo.gif" width="300" height="245" ></div>
             <div> 
             	<div class="holder" style="width:310px;">
                <div id="pane3" class="scroll-pane">
                    <div class="box">
                        <div class="box_info">
                        <span>10:50 minutes</span>
                        <img src="themes/thaigcd/images/ico_vdo.png" width="14" height="11" /><a href="#"><h3>เทปการบรรยาย การประชุมวิชาการโรคติดต่อระหว่างสัตว์ และคนรับภาวะโลกร้อน</h3></a>
                      </div>  
                    </div>
            <div class="alt box">
                        <div class="box_info">
                        <span>15:08 minutes</span>
                        <img src="themes/thaigcd/images/ico_vdo.png" width="14" height="11" /><a href="#"><h3>อภิปราย &quot;Emerging/Re-emerging zoonoses&quot;</h3></a>
                        </div>  
                    </div>
                    <div class="box">
                        <div class="box_info">
                        <span>31:22 minutes</span>
                        <img src="themes/thaigcd/images/ico_mp3.png" width="20" height="10" /><a href="#"><h3>เทปบันทึกภาพการบรรยายเรื่องสอบประเมินความรู้ ทักษะ ความสามารถ ไหวพริบ อารมณ์ ข้าราชการสาธารณสุข</h3></a>
                      </div>  
                    </div>
                     <div class="alt box">
                        <div class="box_info">
                        <span>15:38 minutes</span>
                        <img src="themes/thaigcd/images/ico_vdo.png" width="14" height="11" /><a href="#"><h3>อภิปราย &quot;ลดโลกร้อน ต้องทำเดี๋ยวนี้&quot;</h3></a>
                       </div>  
                    </div>
                </div>
                </div><!--holder-->
                <a href="vdo.php" class="moreright2">more</a>
             </div>
      </div><!--boxmedia-->
        
        <div class="clear"></div>
        <div class="paddtop20bot20"><span></span></div>
        
        <div id="boxphoto" class="corner">
            <a href="#" class="moreright">more</a>
            <div class="topic"><img src="themes/thaigcd/images/topic_gallery.png" width="200" height="25" /></div>
            <div class="box">
            	<div id="slider">
                	<ul>
                        <li><div class="boximg"><a href="#"><img src="themes/thaigcd/photo/gallery1.jpg" width="83" height="71" /></a><span>1</span></div>
                        <div class="boximg"><a href="#"><img src="themes/thaigcd/photo/gallery1.jpg" width="83" height="71" /></a><span>2</span></div>
                        <div class="boximg"><a href="#"><img src="themes/thaigcd/photo/gallery1.jpg" width="83" height="71" /></a><span>3</span></div>
                        <div class="boximg"><a href="#"><img src="themes/thaigcd/photo/gallery1.jpg" width="83" height="71" /></a><span>4</span></div>
                        <div class="boximg"><a href="#"><img src="themes/thaigcd/photo/gallery1.jpg" width="83" height="71" /></a><span>5</span></div></li>
                        <li><div class="boximg"><a href="#"><img src="themes/thaigcd/photo/gallery1.jpg" width="83" height="71" /></a><span>6</span></div>
                        <div class="boximg"><a href="#"><img src="themes/thaigcd/photo/gallery1.jpg" width="83" height="71" /></a><span>7</span></div>
                        <div class="boximg"><a href="#"><img src="themes/thaigcd/photo/gallery1.jpg" width="83" height="71" /></a><span>8</span></div>
                        <div class="boximg"><a href="#"><img src="themes/thaigcd/photo/gallery1.jpg" width="83" height="71" /></a><span>9</span></div>
                        <div class="boximg"><a href="#"><img src="themes/thaigcd/photo/gallery1.jpg" width="83" height="71" /></a><span>10</span></div></li>
                        <li><div class="boximg"><a href="#"><img src="themes/thaigcd/photo/gallery1.jpg" width="83" height="71" /></a><span>11</span></div></li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div><!--boxphoto-->
        <div class="paddtop20bot20"><span></span></div>
        
      <div id="boxwebboard" class="corner">
        <a href="#" class="moreright">more</a>
      	<div class="topic"><img src="themes/thaigcd/images/topic_webboard.png" width="200" height="25" /></div>
        <div class="box">
            <ul>
                <li><a href="#">มาเที่ยวเมืองไทยกันดีกว่า</a> <span class="TxtGray2 f11">โดย <a href="#">Depp08</a> [34/140] </span></li>
                <li>กองเชีียร์์สุุดจ๊๊าบ..ฟุุตบอลโลก2010 โดย OhmOnline [34/140]</li>
                <li>@@@@@ บ้านธรรมชาติในหัวใจ @@@@@@ โดย TTANKAN [34/140]</li>
                <li>สุดยอดโปรแกรม ฝึกพิมพ์ดีดของ BBC ช่วยทำให้พิมพ์เร็วขึ้น โดย toooog [34/140] </li>
                <li><a href="#">มาเที่ยวเมืองไทยกันดีกว่า</a> <span class="TxtGray2 f11">โดย <a href="#">Depp08</a> [34/140] </span></li>
                <li>กองเชีียร์์สุุดจ๊๊าบ..ฟุุตบอลโลก2010 โดย OhmOnline [34/140]</li>
                <li>@@@@@ บ้านธรรมชาติในหัวใจ @@@@@@ โดย TTANKAN [34/140]</li>
                <li>สุดยอดโปรแกรม ฝึกพิมพ์ดีดของ BBC ช่วยทำให้พิมพ์เร็วขึ้น โดย toooog [34/140] </li>
            </ul>    
        </div>
      </div><!--boxwebboard-->
        <div class="paddtop20bot20"><span></span></div>
        
      <div id="boxlaw" class="corner">
         <a href="#" class="moreright">more</a>
            <div class="topic"><img src="themes/thaigcd/images/topic_law.png" width="200" height="25" /></div>
            <div id="tabs2">
                <ul>
                    <li><a href="#tabs2-1">กฎหมายทั่วไป</a></li>
                    <li><a href="#tabs2-2">กฎกระทรวงสาธารณสุข</a></li>
                    <li><a href="#tabs2-3">ประกาศกระทรวงสาธารณสุข</a></li>
                </ul>
                <div id="tabs2-1">
                    <p>law 1</p>
                </div>
                <div id="tabs2-2">
                    <p>law 2</p>
                </div>
                <div id="tabs2-3">
                    <p>law 3</p>
                </div>
        	</div>
      </div><!--boxlaw-->
        
    </div><!--dvright-->
</div><!--main-->
<div class="clear"></div>
<div id="dvlink">
	<? include "_link.php";?>
</div><!--dvlink-->
</div><!--wrapper-->
<div id="dvfooter">
	<? include "_footer.php";?>
</div><!--dvfooter-->
</body>
</html>
