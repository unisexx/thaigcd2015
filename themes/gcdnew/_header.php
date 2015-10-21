<a target="_self" href="home" target="_self"><div id="url" class="TxtWhite">http://thaigcd.ddc.moph.go.th</div></a>
<div id="logo"><h3><span></span> Txt Logo</h3></div>


<div id="search">

<div style="padding:3px 5px; margin-right:8px; float:left; background: #BBE0F3; border-radius: 5px;">
<a class="fontSizeMinus" href="#"><img alt="ตัวอักษรขนาดเล็ก" src="themes/gcdnew/images/fontSize1.png" width="14" height="13" border="0"></a>&nbsp;
<a class="fontReset" href="#"><img alt="ตัวอักษรขนาดปกติ" src="themes/gcdnew/images/fontSize2.png" width="16" height="15" border="0"></a>&nbsp;
<a class="fontSizePlus" href="#"><img alt="ตัวอักษรขนาดใหญ่" src="themes/gcdnew/images/fontSize3.png" width="18" height="18" border="0"></a>&nbsp;
<a href="#"><img alt="line" src="themes/thaivbd/images/line1.gif" width="1" height="18" border="0"></a>&nbsp;
<span class="theme-switch">
<a href="#" rel="themes/gcdnew/css/style_white.css"><img alt="ธีมสีขาว" src="themes/gcdnew/images/c1.png" width="18" height="18" border="0"></a>&nbsp;
<a href="#" rel="themes/gcdnew/css/layout.css"><img alt="ธีมสีเขียว" src="themes/gcdnew/images/c2.png" width="18" height="18" border="0"></a>&nbsp;
<a href="#" rel="themes/gcdnew/css/style_yellow.css"><img alt="ธีมสีเหลือง" src="themes/gcdnew/images/c3.png" width="18" height="18" border="0"></a>
</span>
</div>


<fieldset>
  <legend style="display: none;">ค้นหา</legend>
	<form method="get" action="home/search" target="_top">
	<input type="hidden" name="domains" value="http://thaigcd.ddc.moph.go.th"></input>
	<label for="sbi" style="display: none;">ค้นหา</label>
	<input type="text" name="q" class="textbox" value="" id="sbi"></input>
	<input type="submit" name="sa" value="search" id="sbb" class="btn_search">
	</input>
	<div style="padding-top:5px;">
	  <a target="_self" href="home/sitemap" class="sitemap">Site map</a>
	  <input type="radio" name="sitesearch" value="" id="ss0"></input>
	  <label for="ss0" title="Search the Web" class="f11 txtGray"><?php echo lang('other_sites')?></label>
	 
	  <input type="radio" name="sitesearch" value="http://thaigcd.ddc.moph.go.th" checked id="ss1"></input>
	  <label for="ss1" title="Search ThaiGCD" class="f11 txtGray">ThaiGCD</label>
	  
	  </div>
	
	<input type="hidden" name="client" value="pub-6956175194622836"></input>
	<input type="hidden" name="forid" value="1"></input>
	<input type="hidden" name="ie" value="UTF-8"></input>
	<input type="hidden" name="oe" value="UTF-8"></input>
	<input type="hidden" name="cof" value="GALT:#008000;GL:1;DIV:#336699;VLC:663399;AH:center;BGC:FFFFFF;LBGC:336699;ALC:0000FF;LC:0000FF;T:333333;GFNT:0000FF;GIMP:0000FF;FORID:11"></input>
	<input type="hidden" name="hl" value="en"></input>
	</form>
</fieldset>

<br />
<div id="advs"><!--<a target="_self" href="av_search.php" class="TxtGray2 f10 link_advs">advanced search</a>--></div>
</div>

<div id="flag">
	<!-- <a target="_self" href="home/lang/th" class="thai">Thai Flag</a><a target="_self" href="home/lang/en" class="eng">Eng Flag</a> -->
	<a target="_self" href="home/lang/th" style="color:white;">THAI</a> | <a target="_self" href="http://thaigcd.ddc.moph.go.th/en/" style="color:white;">ENGLISH</a>
</div>


<?php if(@$this->session->userdata('lang') == "th"):?>
<div id="menu">
	<!-- <ul>
		<li><a target="_self" href="home"><?php echo lang('home')?></a></li>
		<li><a target="_self" href="pages/aboutus"><?php echo lang('about')?></a></li>
		<li><a target="_self" href="executives"><?php echo lang('executives')?></a></li>
		<li><a target="_self" href="groups"><?php echo lang('structures')?></a></li>
		<li><a target="_self" href="pages/contactus"><?php echo lang('contact')?></a></li>
		<div class="clear"></div>
	</ul> -->
	<ul id="drop-nav">
	  <li><a target="_self" href="home"><?php echo lang('home')?></a></li>
	  <li><a target="_self" href="pages/aboutus"><?php echo lang('about')?></a>
	    <ul>
	      <li><a href="pages/department_history">ประวัติสำนัก</a></li>
	      <li><a href="pages/department_vision">วิสัยทัศน์/พันธกิจ</a></li>
	      <li><a href="pages/department_structure">โครงสร้างหน่วยงาน</a></li>
	      <li><a href="pages/department_location">ที่ตั้งหน่วยงาน</a></li>
	      <li><a href="pages/department_plan">แผนปฏิบัติราชการ</a></li>
	    </ul>
	  </li>
	  <li><a target="_self" href="executives"><?php echo lang('executives')?></a></li>
	  <li><a target="_self" href="groups"><?php echo lang('structures')?></a>
	    <ul>
	      <li><a href="groups/view/1">กลุ่มบริหารทั่วไป</a></li>
	      <li><a href="groups/view/2">กลุ่มโรคติดต่อทางอาหารและน้ำ</a></li>
	      <li><a href="groups/view/3">กลุ่มโรคติดต่อที่ป้องกันได้ด้วยวัคซีน</a></li>
	      <li><a href="groups/view/4">กลุ่มโรคติดต่อระหว่างสัตว์และคน</a></li>
	      <li><a href="groups/view/7">กลุ่มยุทธศาสตร์และพัฒนาองค์กร</a></li>
	      <li><a href="groups/view/6">กลุ่มสื่อสารสาธารณะและภาคีเครือข่าย</a></li>
	      <li><a href="groups/view/8">กลุ่มบริหารเวชภัณฑ์</a></li>
	      <li><a href="groups/view/5">กลุ่มโรคติดต่อระหว่างประเทศ</a></li>
	      <li><a href="groups/view/10">ด่านควบคุมโรคติดต่อระหว่างประเทศ ท่าเรือกรุงเทพฯ</a></li>
	      <li><a href="groups/view/9">ด่านควบคุมโรคติดต่อระหว่างประเทศ ท่าอากาศยานสุวรรณภูมิ</a></li>
	      <li><a href="groups/view/16">ด่านควบคุมโรคติดต่อระหว่างประเทศ ท่าอากาศยานดอนเมือง</a></li>
	      <li><a href="groups/view/13">ที่ทำการแพทย์ตรวจคนเข้าเมืองแจ้งวัฒนะ</a></li>
	      <li><a href="groups/view/14">ที่ทำการแพทย์ตรวจคนเข้าเมืองสวนพลู</a></li>
	      <li><a href="groups/view/12">ศูนย์ประสานงานโครงการกวาดล้างโปลิโอและโรคหัดตามพันธะสัญญานานาชาติ</a></li>
	      <li><a href="groups/view/11">กลุ่มปฏิบัติการเตรียมพร้อมตอบโต้ภาวะฉุกเฉินด้านการควบคุมโรคและภัยสุขภาพ</a></li>
	      <li><a href="groups/view/17">กลุ่มศูนย์เด็กเล็กและโรคติดต่อในเด็ก</a></li>
	      <li><a href="groups/view/15">โครงการตามพระราชดำริฯ ควบคุมโรคหนอนพยาธิ</a></li>
	      <!-- <li><a href="groups/view/18">ศูนย์ช่วยอำนวยการ</a></li> -->
	    </ul>
	  </li>
	  <li><a target="_self" href="pages/contactus"><?php echo lang('contact')?></a></li>
	  <li><a target="_self" href="knowledges/17">ความรู้เรื่องโรคติดต่อ</a></li>
	</ul>
</div>
<?php else:?>
<!-- <div id="menu" style="left: 205px;">
	<ul style="width: 770px;">
		<li><a target="_self" href="home"><?php echo lang('home')?></a></li>
		<li><a target="_self" href="pages/aboutus"><?php echo lang('about')?></a></li>
		<li><a target="_self" href="executives"><?php echo lang('executives')?></a></li>
		<li><a target="_self" href="groups"><?php echo lang('structures')?></a></li>
		<li><a target="_self" href="pages/contactus"><?php echo lang('contact')?></a></li>
		<div class="clear"></div>
	</ul>
</div> -->
<?php endif;?>