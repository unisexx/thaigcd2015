<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $template['title'] ?></title>
<link href="themes/thaigcd2015/css/template.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="themes/thaigcd2015/css/bootstrap.min.css">
<link rel="stylesheet" href="themes/thaigcd2015/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="themes/thaigcd2015/css/topmenu.css">
<link rel="stylesheet" href="themes/thaigcd2015/css/domtab.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="media/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="themes/thaigcd2015/js/domtab.js"></script>
	<script type="text/javascript">
		document.write('<style type="text/css">');    
		document.write('div.domtab div{display:none;}<');
		document.write('/s'+'tyle>');    
    </script>
<?php // echo $template['metadata'] ?>
</head>

<body>
<div id="wrap1">
	<? include "_header.php";?>
	
	<div id="login">
	<form class="form-login" action="users/signin" method="post">
      <input type="text" name="username" placeholder="Username or email" style="margin-bottom:-5px;">
      <input type="password" name="password" placeholder="Password" style="margin-bottom:8px;">
        <div style="width:87%; margin:0 auto;">
        	<div class="btn-regis"><a href="users/register">&nbsp;</a></div>
        	<div class="btn-login"><a href="#">&nbsp;</a></div>
        </div>
    </form>​​
    <div class="clearfix">&nbsp;</div>
    <div class="line1">&nbsp;</div>
    <div style="width:87%; margin:0 auto;">
    	<a href="http://www.pinkforms.com/"><img src="themes/thaigcd2015/images/banner-left-01.png" width="203" height="40" style="margin-top:6px;"></a>
        <a href="http://r36.ddc.moph.go.th/index.html"><img src="themes/thaigcd2015/images/banner-left-02.png" width="203" height="40" style="margin-top:6px;"></a>
        <a href="http://demo.favouritedesign.com/healthypreschool/home"><img src="themes/thaigcd2015/images/banner-left-03.png" width="203" height="40" style="margin-top:6px;"></a>
    </div>
</div>


<?php echo modules::run('hilights/inc_home'); ?>

<!------------------------------------------------------------END HighLight----------------------------------------------------------->
<script type="text/javascript">
	$(document).ready(function(){
		$('.index_label li a').each(function(){
			$(this).attr('href', 'knowledges/17?label='+$(this).text());
		});
	});
</script>
<div class="clearfix">&nbsp;</div>
<div id="km">
	<div class="title-km">ความรู้เรื่องโรคติดต่อ</div>
   	<div id="box-km">
    	<input id="filter-km" maxlength="50" placeholder="ค้นหาชื่อโรค...." type="text"><a href="#"><img src="themes/thaigcd2015/images/icon-search-index.png" width="29" height="26" /></a>
        <div class="index-km">
            <ul id="dropdown-menu-freebie">
            	<li>
                    <ul class="dropdown-index">
                        <li><a href="#">&nbsp;</a>
                            <ul class="index_label">
                                <li><a href="#">ก</a></li>
                                <li><a href="#">ข</a></li>
                                <li><a href="#">ฃ</a></li>
                                <li><a href="#">ค</a></li>
                                <li><a href="#">ฅ</a></li>
                                <li><a href="#">ฆ</a></li>
                                <li><a href="#">ง</a></li>
                                <li><a href="#">จ</a></li>
                                <li><a href="#">ฉ</a></li>
                                <li><a href="#">ช</a></li>
                                <li><a href="#">ซ</a></li>
                                <li><a href="#">ฌ</a></li>
                                <li><a href="#">ญ</a></li>
                                <li><a href="#">ฎ</a></li>
                                <li><a href="#">ฏ</a></li>
                                <li><a href="#">ฐ</a></li>
                                <li><a href="#">ฑ</a></li>
                                <li><a href="#">ฒ</a></li>
                                <li><a href="#">ณ</a></li>
                                <li><a href="#">ด</a></li>
                                <li><a href="#">ต</a></li>
                                <li><a href="#">ถ</a></li>
                                <li><a href="#">ท</a></li>
                                <li><a href="#">ธ</a></li>
                                <li><a href="#">น</a></li>
                                <li><a href="#">บ</a></li>
                                <li><a href="#">ป</a></li>
                                <li><a href="#">ผ</a></li>
                                <li><a href="#">ฝ</a></li>
                                <li><a href="#">พ</a></li>
                                <li><a href="#">ฟ</a></li>
                                <li><a href="#">ภ</a></li>
                                <li><a href="#">ม</a></li>
                                <li><a href="#">ย</a></li>
                                <li><a href="#">ร</a></li>
                                <li><a href="#">ล</a></li>
                                <li><a href="#">ว</a></li>
                                <li><a href="#">ศ</a></li>
                                <li><a href="#">ษ</a></li>
                                <li><a href="#">ส</a></li>
                                <li><a href="#">ห</a></li>
                                <li><a href="#">ฬ</a></li>
                                <li><a href="#">อ</a></li>
                                <li><a href="#">ฮ</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
    	</div>
    </div>
</div>
<!------------------------------------------------------------END INDEX----------------------------------------------------------->
<div class="clearfix">&nbsp;</div>

<div class="title-whatnew">What's New</div>

<div id="news">
	<ul>
    	<li>
        	<img src="themes/thaigcd2015/images/news_pic01.jpg" width="251" height="150" />
            <div class="title-news"><a href="#">ไข้หวัดใหญ่</a></div>
        	<div class="line-news">&nbsp;</div>
            <p><a href="#">สถานการณ์การระบาดของโรคไข้หวัดใหญ่ล่าสุดจากข้อมูลเฝ้าระวังโรคจากทุกจังหวัดในประเทศไทยของสำนักระบาดวิทยา ตั้งแต่ 1 ม.คถึง 9 ส.ค 2558 พบผู้ป่วย 38,489 ราย...</a></p>
        	<span class="dtae-news">26 ก.ค. 2558</span>
        </li>
    	<li>
        	<img src="themes/thaigcd2015/images/news_pic02.jpg" width="251" height="150" />
            <div class="title-news"><a href="#">ระวัง ! แมงกะพรุนปล่อง</a></div>
        	<div class="line-news">&nbsp;</div>
            <p><a href="#">เมื่อโดนพิษ ห้ามขัดถูบริเวณที่ถูกพิษ และให้รีบราดด้วยน้ําส้มสายชู นักวิชาการประมง เตือนนักท่องเที่ยวระวัง แมงกะพรุนกล่องระบาดในทะเลอ่าวไทย พิษร้ายแรงกว่างูเห่า...</a></p>
        	<span class="dtae-news">26 ก.ค. 2558</span>
        </li>
    	<li class="last-news">
        	<img src="themes/thaigcd2015/images/news_pic03.jpg" width="251" height="150" />
            <div class="title-news"><a href="#">ไข้หวัดใหญ่</a></div>
        	<div class="line-news">&nbsp;</div>
            <p><a href="#">สถานการณ์การระบาดของโรคไข้หวัดใหญ่ล่าสุดจากข้อมูลเฝ้าระวังโรคจากทุกจังหวัดในประเทศไทยของสำนักระบาดวิทยา ตั้งแต่ 1 ม.คถึง 9 ส.ค 2558 พบผู้ป่วย 38,489 ราย...</a></p>
        	<span class="dtae-news">26 ก.ค. 2558</span>
        </li>
    </ul>
</div>
<!------------------------------------------------------------END NEWS----------------------------------------------------------->
<div class="clearfix">&nbsp;</div>
<div class="domtab">
	<ul class="domtabs">
		<li style="margin-left:20px;"><a href="#pr">ข่าวประชาสัมพันธ์</a></li>
		<li><a href="#procurement">ข่าวจัดซื้อ-จัดจ้าง</a></li>
		<li><a href="#media">สื่อเผยแพร่ สำนักฯ</a></li>
		<li><a href="#event">ภาพกิจกรรม</a></li>
		<li><a href="#intranet">Intranet</a></li>
	</ul>
	<div class="inline-icon">
	  <a name="pr" id="pr"><span style="display:none;">ข่าวประชาสัมพันธ์</span></a>
         <table width="95%" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;">
          <tr>
            <td align="center" valign="bottom"><a href="informations/index/145" class="img-height"><span class="img-icon1">&nbsp;</span></a></td>
            <td align="center" valign="bottom"><a href="informations/index/2" class="img-height"><span class="img-icon2">&nbsp;</span></a></td>
            <td align="center" valign="bottom"><a href="informations/index/3" class="img-height"><span class="img-icon3">&nbsp;</span></a></td>
            <td align="center" valign="bottom"><a href="informations/index/4" class="img-height"><span class="img-icon4">&nbsp;</span></a></td>
            <td align="center" valign="bottom"><a href="informations/index/97" class="img-height"><span class="img-icon5">&nbsp;</span></a></td>
            <td align="center" valign="bottom"><a href="informations/index/109" class="img-height"><span class="img-icon6">&nbsp;</span></a></td>
            <td align="center" valign="bottom"><a href="informations/index/174" class="img-height"><span class="img-icon7">&nbsp;</span></a></td>
            <td align="center" valign="bottom"><a href="informations/index/210" class="img-height"><span class="img-icon8">&nbsp;</span></a></td>
   		  </tr>
          <tr>
            <td align="center" valign="top"><a href="informations/index/145"><span class="title-icon">เรื่องเด่น<br>ประเด็นร้อน</span></a></td>
            <td align="center" valign="top"><a href="informations/index/2"><span class="title-icon">เรื่องทั่วไป</span></a></td>
            <td align="center" valign="top"><a href="informations/index/3"><span class="title-icon">วิชาการ</span></a></td>
            <td align="center" valign="top"><a href="informations/index/4"><span class="title-icon">ประชุม/อบรม</span></a></td>
            <td align="center" valign="top"><a href="informations/index/97"><span class="title-icon">ศูนย์เด็กเล็กฯ</span></a></td>
            <td align="center" valign="top"><a href="informations/index/109"><span class="title-icon">โครงการ/โครงงาน</span></a></td>
            <td align="center" valign="top"><a href="informations/index/174"><span class="title-icon">ข่่าวสารสำหรับประชาชน<br>เรื่องโรคติดต่อทั่วไป<br>และภัยสุขภาพ</span></a></td>
            <td align="center" valign="top"><a href="informations/index/210"><span class="title-icon">งานบุคลากร</span></a></td>
          </tr>
	</table>
      </div>
      <!------------------------------------------------------------END CONTENT TAB PR----------------------------------------------------------->
      <div class="inline-icon">
	  <a name="procurement" id="procurement"><span style="display:none;">ข่าวจัดซื้อ-จัดจ้าง</span></a>
		<ul>
            <li><a href="#" class="img-height"><span >&nbsp;</span></a><br><a href="#"><span class="title-icon">ขออภัย! กำลังปรับปรุง</span></a></li>
        </ul>
       </div>
	  <!------------------------------------------------------------END CONTENT TAB procurement-------------------------------------------------->
      
      <div>
	  <a name="media" id="media"><span style="display:none;">สื่อเผยแพร่ สำนัก</span></a>
		<!-- <ul>
            <li><a href="#" class="img-height"><span >&nbsp;</span></a><br><a href="#"><span class="title-icon">ขออภัย! กำลังปรับปรุง</span></a></li>
        </ul> -->
        <?php echo modules::run('mediapublics/inc_home'); ?>
      </div>
	  <!------------------------------------------------------------END CONTENT TAB media-------------------------------------------------->
      
      <div class="inline-icon">
	  <a name="event" id="event"><span style="display:none;">ข่าวจัดซื้อ-จัดจ้าง</span></a>
		<ul>
            <li><a href="#" class="img-height"><span >&nbsp;</span></a><br><a href="#"><span class="title-icon">ขออภัย! กำลังปรับปรุง</span></a></li>
        </ul>
       </div>
	  <!------------------------------------------------------------END CONTENT TAB event-------------------------------------------------->
      
      <div class="inline-icon">
	  <a name="intranet" id="intranet"><span style="display:none;">ข่าวจัดซื้อ-จัดจ้าง</span></a>
		<ul>
        	<li><a href="#" class="img-height"><span class="img-icon8">&nbsp;</span></a><br><a href="#"><span class="title-icon">งานบุคลากร</span></a></li>
            <li><a href="#" class="img-height"><span class="img-icon9">&nbsp;</span></a><br><a href="#"><span class="title-icon">งานการเงิน</span></a></li>
            <li><a href="#" class="img-height"><span class="img-icon10">&nbsp;</span></a><br><a href="#"><span class="title-icon">gcd_cars and drivers</span></a></li>
            <li><a href="#" class="img-height"><span class="img-icon11">&nbsp;</span></a><br><a href="#"><span class="title-icon">แบบฟอร์มงานการเจ้าหน้าที่</span></a></li>
        </ul>
       </div>
	  <!------------------------------------------------------------END CONTENT TAB intranet-------------------------------------------------->
    
</div>
<!------------------------------------------------------------END TAB ONE-----------------------------------------------------------> 

<div class="clearfix">&nbsp;</div>
<div class="domtab2">
	<ul class="domtabs">
		<li style="margin-left:20px;" class="active"><a href="#km">คลังความรู้</a></li>
	</ul>
	<div class="inline-icon">
	  <a name="km" id="km"><span style="display:none;">คลังความรู้</span></a>
		<ul>
        	<li><a href="knowledges/17" class="img-height"><span class="img-icon12">&nbsp;</span></a><br><a href="#"><span class="title-icon">ความรู้<br>เรื่องโรคติดต่อ</span></a></li>
            <li><a href="knowledges/16" class="img-height"><span class="img-icon13">&nbsp;</span></a><br><a href="#"><span class="title-icon">คู่มือ/แนวทาง/<br>มาตรฐาน/หลักเกณฑ์</span></a></li>
            <li><a href="knowledges/15" class="img-height"><span class="img-icon14">&nbsp;</span></a><br><a href="#"><span class="title-icon">ผลงานวิชาการ/ผลการวิจัย/<br>ผลการสำรวจ/ผลการประเมิน</span></a></li>
            <li><a href="knowledges/112" class="img-height"><span class="img-icon15">&nbsp;</span></a><br><a href="#"><span class="title-icon">เอกสาร/<br>รายงานการประชุม</span></a></li>
            <li><a href="knowledges/111" class="img-height"><span class="img-icon16">&nbsp;</span></a><br><a href="#"><span class="title-icon">สื่อประกอบ<br>การบรรยาย</span></a></li>
            <li><a href="knowledges/110" class="img-height"><span class="img-icon17">&nbsp;</span></a><br><a href="#"><span class="title-icon">นโยบาย/<br>แผนยุทธศาสตร์/<br>แผนปฏิบัติราชการ</span></a></li>
            <li><a href="laws" class="img-height"><span class="img-icon18">&nbsp;</span></a><br><a href="#"><span class="title-icon">กฏหมาย<br>ที่เกี่ยวข้อง</span></a></li>
        </ul>
      </div>
      <!------------------------------------------------------------END CONTENT TAB PR----------------------------------------------------------->
    
</div>
<!------------------------------------------------------------END TAB TWO-----------------------------------------------------------> 
<div class="clearfix">&nbsp;</div>
<div id="about">
	<div id="title_about">เกี่ยวกับ <span style="color:#333333;">สำนักโรคติดต่อทั่วไป</span></div>
    <div id="about_col1">
    <span style="font-weight:bold; color:#0541ca;">นายแพทย์รุ่งเรือง กิจผาติ</span><br>ผู้อำนวยการสำนักโรคติดต่อทั่วไป<br>
		<ul>
        	<li><a href="executives">ทำเนียบผู้บริหาร</a></li>
            <li><a href="#">ส่งสารถึงผู้อำนวยการ</a></li>
        </ul>    
	  <div class="dr">
      <img src="themes/thaigcd2015/images/dr.png" width="135" height="136" /><br><a href="https://www.facebook.com/tmanwg" class="link-facebook">&nbsp;</a>&nbsp;<a href="https://twitter.com/gcdmoph" class="link-twitter">&nbsp;</a></div>
    </div>

	<div id="about_col2">
      <ul>
        <strong>เกี่ยวกับสำนัก</strong>
            <li><a href="pages/department_history">ประวัติองค์กร</a></li>
            <li><a href="pages/department_vision">วิสัยทัศน์ / พันธกิจ</a></li>
            <li><a href="pages/department_structure">โครงสร้างหน่วยงาน</a></li>
            <li><a href="pages/department_location">ที่ตั้งหน่วยงาน</a></li>
            <li><a href="pages/department_plan">แผนปฏิบัติราชการ</a></li>
            <!-- <li><a href="#">ผลการดำเนินงาน</a></li> -->
      </ul>
    </div>
    <div id="about_col3">
    	<?php echo modules::run('executives/inc_home_video'); ?>
    </div>
</div>
<!------------------------------------------------------------END ABOUT-----------------------------------------------------------> 
<div id="bannerSystem">
    <ul>
        <li><a href="http://support.ddc.moph.go.th/dT_Report"><img src="themes/thaigcd2015/images/bannerSystem-01.png" width="178" height="65" /></a></li>
        <li><a href="http://support.ddc.moph.go.th/gcd_vaccine_report"><img src="themes/thaigcd2015/images/bannerSystem-02.png" width="178" height="65" /></a></li>
        <li><a href="http://dpis.ddc.moph.go.th:8080/admin/index.html"><img src="themes/thaigcd2015/images/bannerSystem-03.png" width="178" height="65" /></a></li>
        <li><a href="http://www.sasuk12.com/umrak/"><img src="themes/thaigcd2015/images/bannerSystem-04.png" width="178" height="65" /></a></li>
        <li style="padding-right:0 !important;"><a href="http://thaigcd.ddc.moph.go.th/asset_gcd/user/admin/user/index"><img src="themes/thaigcd2015/images/bannerSystem-05.png" width="178" height="65" /></a></li>
        <li><a href="http://thaigcd.ddc.moph.go.th/human_new/index.php"><img src="themes/thaigcd2015/images/bannerSystem-06.png" width="178" height="65" /></a></li>
        <li><a href="http://thaigcd.ddc.moph.go.th/meetings"><img src="themes/thaigcd2015/images/bannerSystem-07.png" width="178" height="65" /></a></li>
        <li><a href="http://thaigcd.ddc.moph.go.th/docs"><img src="themes/thaigcd2015/images/bannerSystem-08.png" width="178" height="65" /></a></li>
        <li><a href="http://thaigcd.ddc.moph.go.th/documents"><img src="themes/thaigcd2015/images/bannerSystem-09.png" width="178" height="65" /></a></li>
        <li style="padding-right:0 !important;"><a href="http://thaigcd.ddc.moph.go.th/calendars"><img src="themes/thaigcd2015/images/bannerSystem-10.png" width="178" height="65" /></a></li>
    </ul>
</div>
<!------------------------------------------------------------END BANNER SYSTEM------------------------------------------------------>
<div class="clearfix">&nbsp;</div>
<?php echo modules::run('weblinks/inc_home'); ?>
<!------------------------------------------------------------END WEBLINK------------------------------------------------------>

	<? include "_footer.php";?>
</div>
<!------------------------------------------------------------END Wrap1-----------------------------------------------------------> 
    <div class="clearfix">&nbsp;</div>




</body>
</html>
