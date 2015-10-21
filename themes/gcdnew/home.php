<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="th" lang="th" dir="ltr">
<head>
	<base href="<?php echo base_url(); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $template['title'] ?></title>
	<? include "_script.php";?>
	<?php echo $template['metadata'] ?>
</head>

<div id="wrapper">
<div id="header">
<? include "_header.php";?>
</div><!--header-->

<div id="main">
	<div id="dvleft">
	  <? include "_left.php";?>
	</div><!--dvleft-->
    <div id="dvright" class="right">
        <?php echo modules::run('hilights/inc_home'); ?>
        
        <div class="txtslide">
        <?php echo modules::run('pages/txtslide'); ?>
        </div>
        
       	<?php echo modules::run('informations/inc_home'); ?> 
        <div class="paddtop20bot20"><span></span></div>
        
        <?php echo modules::run('mediapublics/inc_home'); ?>
        <div class="paddtop20bot20"><span></span></div>
        
        <?php echo modules::run('notices/inc_home'); ?>
        
		<?php echo modules::run('mediafiles/inc_home'); ?> 
        
        <div class="clear"></div>
        <div class="paddtop20bot20"><span></span></div>
		
		<?php echo modules::run('galleries/inc_home'); ?>
        <!--boxphoto-->
        <div class="paddtop20bot20"><span></span></div>

		<?php //echo modules::run('webboards/close/inc_home'); ?>
      	<!--boxwebboard-->
        <!-- <div class="paddtop20bot20"><span></span></div> -->
        
		<?php // echo modules::run('blogs/inc_home'); ?>
      	
      	<style>
      		.inline-banner{padding:10px;}
      		.inline-banner li{float: left; margin:5px 7px;}
      		.inline-banner li img{width:200px !important;}
      	</style>
      	<div class="corner" id="boxlaw">
        <ul class="inline-banner">
        	<li><a href="http://r36.ddc.moph.go.th/index.html" target="_blank"><img src="themes/gcdnew/photo/bann_r362.jpg" width="248" height="69" alt="โปรแกรมผู้สัมผัสพิษสุนัขบ้า"/></a></li>
        	<li><a href="http://thaileptoclub.org/index.php"><img src="themes/gcdnew/images/lebto.jpg" width="248" height="69" alt="Lepto"/></a></li>
            <li><a href="blogs"><img src="themes/gcdnew/photo/bann_blog.jpg" width="248" height="69" alt="เว็บบล็อก weblog"/></a></li>
            <li><a href="webboards"><img src="themes/gcdnew/photo/bann_webboard.jpg" width="248" height="69" alt="เว็บบอร์ด"/></a></li>
            <li><a href="chats"><img src="themes/gcdnew/photo/bann_chat.jpg" width="248" height="69" alt="ระบบสนทนาออนไลน์"/></a></li>
            <li><a href="faqs"><img src="themes/gcdnew/photo/bann_faq.jpg" width="248" height="69" alt="คำถามที่ถามบ่อย"/></a></li>
            <li><a href="http://www.riclib.nrct.go.th/download541/homepage.htm" target="_blank"><img src="themes/gcdnew/photo/bann_bibliography.jpg" width="248" height="69" alt="บรรณานุกรมรายงานวิจัยและวิทยานิพนธ์ 2554"/></a></li>
            <li style="padding-bottom:0px;"><a href="http://www.riclib.nrct.go.th/download543/homepage.htm" target="_blank"><img src="themes/gcdnew/photo/bann_research.jpg" width="248" height="69" alt="ทำเนียบการวิจัย  2554 สภาวิจัยแห่งชาติ"/></a></li>
            
            <li><a href="http://www.ddc.moph.go.th/complaint/index.php" target="_blank"><img src="themes/gcdnew/photo/banner-complaint.jpg" width="248" height="69" alt="ศูนย์รับเรื่องร้องเรียนกรมควบคุมโรค"/></a></li>
            <li><a href="https://www.facebook.com/tmanwg" target="_blank" title="facebook"><img src="themes/gcdnew/photo/banner_fb.jpg" width="248" height="69" alt="facebook"/></a></li>
            <li><a href="https://twitter.com/gcdmoph" target="_blank"><img src="themes/gcdnew/photo/banner_tw.jpg" width="248" height="69" alt="twitter"/></a></li>
        </ul>
        <br clear="all">
        </div>
        
    </div><!--dvright-->
</div><!--main-->
<div class="clear"></div>
<div id="dvlink">
	<?php echo modules::run('weblinks/inc_home'); ?>
</div><!--dvlink-->
</div><!--wrapper-->
<div id="dvfooter">
	<? include "_footer.php";?>
	<br clear="all">
</div><!--dvfooter-->

<!-- <script>
  $(function() {
    $( "#dialog" ).dialog({
        modal: true,
        width:'auto'
	});
  });
</script>
<div id="dialog" title="ประกาศ">
  <img src="http://image.free.in.th/v/2013/ie/131105011314.jpg">
  <br><div>ขอถวายความอาลัยแด่ สมเด็จพระญาณสังวร สมเด็จพระสังฆราช สกลมหาสังฆปรินายก</div>
</div> -->
</body>
</html>
