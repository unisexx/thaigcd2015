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

<link href="themes/infographic/css/infographic.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="media/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="themes/thaigcd2015/js/domtab.js"></script>
	<script type="text/javascript">
		document.write('<style type="text/css">');
		document.write('div.domtab div{display:none;}<');
		document.write('/s'+'tyle>');
    </script>

<? include "change_font.php";?>
<? include "change_page.php";?>

<style>

    .pic_gallery {

		float:left;
		margin:3px 3px ;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        background-color:#555555;
        border:3px solid #fff;;
        -webkit-box-shadow: 0px 3px 4px 0px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 3px 4px 0px rgba(0,0,0,0.3);
        box-shadow: 0px 3px 4px 0px rgba(0,0,0,0.3);

    }
    .login_welcome{
        font-weight:bold;
        font-size:18px !important;
        color:#0084e1;
    }
    .login_text span{
        color:#0084e1;
    }
</style>
<?php echo $template['metadata']; ?>
</head>
<body>
	
<div id="wrap1">
	<? include "_header.php";?>

<div id="login" >




	<?php
		if($this->session->userdata('id')){
			$user = new User($this->session->userdata('id'));
			/*
            if(is_file('uploads/users/'.$user->image)){
              echo '<img style="float: left;border:3px solid #fff;;
        -webkit-box-shadow: 0px 3px 4px 0px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 3px 4px 0px rgba(0,0,0,0.3);
        box-shadow: 0px 3px 4px 0px rgba(0,0,0,0.3);" src="uploads/users/'.$user->image.'" width="45">';
            }else{
              echo '<img style="float: left;border:3px solid #fff;;
        -webkit-box-shadow: 0px 3px 4px 0px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 3px 4px 0px rgba(0,0,0,0.3);
        box-shadow: 0px 3px 4px 0px rgba(0,0,0,0.3);" src="themes/thaigcd2015/images/avatar.png" width="45">';
            }
            */
	?>
		  <div class="login_text" style="width:87%; margin:0 auto;margin-top:10px;margin-bottom:10px;">
    			<div style="padding:4px 4px 4px 4px;">
    			     <span class="login_welcome">ยินดีต้อนรับ</span><br>
    			     <span><strong>Login: </strong></span><?php echo $user->display;?>
    			     <br/>
    			     <div class="btn-signout" style="text-align:right;margin-top:5px;">
								 	 <?if($user->m_status == 'wait'):?>
									 		สถานะ : รอการตรวจสอบ
									 <?elseif($user->m_status == 'active'):?>
									 		<a href="admin/"><img src="media/images/icons/icon_admin.png" alt="Administrator" title="Administrator"></a>
									 <?endif;?>
    			         <a href="users/signout" onclick="confirm('ออกจากระบบ?');" class="btn btn-sm btn-default">Logout</a>
    			     </div>
    			</div>
			</div>
	<?php }else{ ?>

	<form class="form-login" action="users/signin" method="post" id="frmLogin">
      <input type="text" name="username" id="username" placeholder="Username or email" style="margin-bottom:-5px;">
      <input type="password" name="password" id="password" placeholder="Password" style="margin-bottom:8px;">
        <div style="width:87%; margin:0 auto;">
        	<div class="btn-regis"><a href="users/register">&nbsp;</a></div>
        	<div class="btn-login">
        	    <input type="submit" name="btn-login2" value="" class="btn-login">
        	</div>
        </div>
    </form>​​
    <div class="clearfix">&nbsp;</div>
    <?php } ?>

    <script type="text/javascript">

	$(document).ready(function(){


/*		$('#lobin_btn').click(function(){
			$('.login_fail').html('<img src="themes/msosocial/images/loading.gif">');
			$.post('org/ajax_login',{
				'username' : $('input[name=username]').val(),
				'password' : $('input[name=password]').val(),
				'status' : $('input[name=status]').val()
			},function(data){
				if(data == 'ล้อกอินสำเร็จ'){
					window.location.href = 'org/member';
				}else{
					$('.login_fail').html(data);
				}
			});
		});*/

		$('.btn-login2').click(function() {

		  	if ($("#username").val()=="") {

				alert("กรุณากรอก username !");
				$("#username").focus();
				return false;
			}

			if ($("#password").val()=="") {

				alert("กรุณากรอก password !");
				$("#password").focus();
				return false;
			}

			document.getElementById("frmLogin").submit();


		});

	});

	</script>


    <div class="line1">&nbsp;</div>



    <div style="width:87%; margin:0 auto;">

    	<a href="http://www.pinkforms.com/">
    	<img src="themes/thaigcd2015/images/pinkform.jpg" width="203" height="40" style="margin-top:6px;"></a>
        <a href="http://r36.ddc.moph.go.th/index.html">
        <img src="themes/thaigcd2015/images/banner-left-02.png" width="203" height="40" style="margin-top:6px;"></a>
        <a href="http://27.254.33.52/healthypreschool/home">
        <img src="themes/thaigcd2015/images/banner-left-03.png" width="203" height="40" style="margin-top:6px;"></a>
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
	<div class="title-km">
		ความรู้เรื่องโรคติดต่อ
		<form method="get" action="knowledges/17">
		<input id="filter-km" name="search" maxlength="50" placeholder="ค้นหาชื่อโรค...." type="text" style="font-family:THSARABAN-PSK;font-size:14px;">
		<button>
		<img src="themes/thaigcd2015/images/icon-search-index.png" width="29" height="26" />
		</button>
		</form>
	</div>
   	<div style="float: left;">
        <div class="index-km" >
            <ul id="dropdown-menu-freebie">
            	<li>
                    <ul class="dropdown-index">
                        <li><a href="#" onclick="return false;">&nbsp;</a>
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

<div class="title-whatnew">เรื่องเด่นประเด็นร้อน</div>

<div id="news">

<?php echo modules::run('informations/news_index'); ?>

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
			 <td width="20%" align="center" valign="bottom"><a href="informations/index/2" class="img-height"><span class="img-icon2">&nbsp;</span></a></td>
             			 <td width="20%" align="center" valign="bottom"><a href="informations/index/372" class="img-height"><span class="img-icon4">&nbsp;</span></a></td>
			 <td width="20%" align="center" valign="bottom"><a href="informations/index/4" class="img-height"><span class="img-icon4">&nbsp;</span></a></td>
			 <td width="20%" align="center" valign="bottom"><a href="informations/index/109" class="img-height"><span class="img-icon6">&nbsp;</span></a></td>
			 <td width="20%" align="center" valign="bottom"><a href="informations/index/340" class="img-height"><span class="img-icon7">&nbsp;</span></a></td>
<!--            <td align="center" valign="bottom"><a href="informations/index/145" class="img-height"><span class="img-icon1">&nbsp;</span></a></td>-->
<!--            <td align="center" valign="bottom"><a href="informations/index/3" class="img-height"><span class="img-icon3">&nbsp;</span></a></td>-->
<!--            <td align="center" valign="bottom"><a href="informations/index/97" class="img-height"><span class="img-icon5">&nbsp;</span></a></td>-->
	 </tr>
		 <tr>
			 <td align="center" valign="top"><a href="informations/index/2"><span class="title-icon">เรื่องทั่วไป</span></a></td>
             <td align="center" valign="top"><a href="informations/index/372"><span class="title-icon">การฝีกอบรม</span></a></td>
			 <td align="center" valign="top"><a href="informations/index/4"><span class="title-icon">ประชุม/อบรม</span></a></td>
			 <td align="center" valign="top"><a href="informations/index/109"><span class="title-icon">โครงการ/โครงงาน</span></a></td>
			 <td align="center" valign="top"><a href="informations/index/340"><span class="title-icon">ประกาศกรมควบคุมโรค<br>เรื่องรับสมัครงาน</span></a></td>
<!--            <td align="center" valign="top"><a href="informations/index/145"><span class="title-icon">เรื่องเด่น<br>ประเด็นร้อน</span></a></td>-->
<!--            <td align="center" valign="top"><a href="informations/index/3"><span class="title-icon">วิชาการ</span></a></td>-->
<!--            <td align="center" valign="top"><a href="informations/index/97"><span class="title-icon">ศูนย์เด็กเล็กฯ</span></a></td>-->
<!--            <td align="center" valign="top"><a href="informations/index/174"><span class="title-icon">ข่่าวสารสำหรับประชาชน<br>เรื่องโรคติดต่อทั่วไป<br>และภัยสุขภาพ</span></a></td>-->

		 </tr>
	 </table>
      </div>
      <!------------------------------------------------------------END CONTENT TAB PR----------------------------------------------------------->
      <div>
	  <a name="procurement" id="procurement"><span style="display:none;">ข่าวจัดซื้อ-จัดจ้าง</span></a>
		<!-- <ul>
            <li><a href="#" class="img-height"><span >&nbsp;</span></a><br><a href="#"><span class="title-icon">ขออภัย! กำลังปรับปรุง</span></a></li>
        </ul> -->
				<?php echo modules::run('notices/inc_home'); ?>
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
	  <a name="event" id="event"><span style="display:none;">ภาพกิจกรรม</span></a>
<!--		<ul>
            <li><a href="#" class="img-height"><span >&nbsp;</span></a><br><a href="#"><span class="title-icon">ขออภัย! กำลังปรับปรุง</span></a></li>
        </ul>-->
        <table width="100%"><tr><td height="25"><?php echo modules::run('galleries/list_index'); ?></td></tr></table>




       </div>
	  <!------------------------------------------------------------END CONTENT TAB event-------------------------------------------------->

      <div class="inline-icon">
	  <a name="intranet" id="intranet"><span style="display:none;">Intranet</span></a>
		<ul>
        	<li style="width:15%;">
                <a href="informations/index/210" class="img-height">
                	<span class="img-icon8">&nbsp;</span>
                </a>
                <br>
                <a href="informations/index/210">
                	<span class="title-icon">งานบุคลากร</span>
                </a>
            </li>
            <li style="width:15%;"><a href="informations/index/282" class="img-height"><span class="img-icon9">&nbsp;</span></a><br><a href="informations/index/282"><span class="title-icon">งานการเงิน</span></a></li>
            <li style="width:15%;"><a href="pages/view/58" class="img-height"><span class="img-icon10">&nbsp;</span></a><br><a href="pages/view/58"><span class="title-icon">gcd_cars and drivers</span></a></li>
            <li style="width:15%;"><a href="pages/view/63" class="img-height"><span class="img-icon11">&nbsp;</span></a><br><a href="pages/view/63"><span class="title-icon">แบบฟอร์ม</span></a></li>
            <li style="width:15%;"><a href="informations/index/327" class="img-height"><span class="img-icon11">&nbsp;</span></a><br><a href="informations/index/327"><span class="title-icon">งานพัสดุฯ</span></a></li>
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
        	<li>

        	<a href="knowledges/17" class="img-height">
        	<span class="img-icon12">&nbsp;</span>
        	</a>
        	<br>
        	<a href="knowledges/17"><span class="title-icon">ความรู้<br>เรื่องโรคติดต่อ</span></a>

        	</li>
            <li>

            <a href="knowledges/16" class="img-height">

            <span class="img-icon13">&nbsp;</span>

            </a>

            <br>

            <a href="knowledges/16">

            <span class="title-icon">คู่มือ/แนวทาง/<br>มาตรฐาน/หลักเกณฑ์</span>

            </a>

            </li>

            <li>

            <a href="knowledges/15" class="img-height"><span class="img-icon14">&nbsp;</span></a><br><a href="knowledges/15"><span class="title-icon">ผลงานวิชาการ/ผลการวิจัย/<br>ผลการสำรวจ/ผลการประเมิน</span></a>

            </li>

            <li>

	            <a href="indicators/index" class="img-height">
	            <span class="img-icon15">&nbsp;</span>
	            </a>
            <br>
	            <a href="indicators/index">
	            <span class="title-icon">ตัวชี้วัด</span>
	            </a>

            </li>

	            <li>

		            <a href="pages/view/23" class="img-height">

		            <span class="img-icon13">&nbsp;</span>

		            </a>

	            <br>

		            <a href="pages/view/23">

		            <span class="title-icon">รายงานประจำปี</span>

		            </a>

	            </li>


            <li>

	            <a href="pages/view/6" class="img-height">

	            <span class="img-icon16">&nbsp;</span>

	            </a>

            <br>

	            <a href="pages/view/6">

	            <span class="title-icon">KM สำนัก</span>

	            </a>

            </li>
            <li>

            <a href="knowledges/110" class="img-height"><span class="img-icon17">&nbsp;</span></a>

            <br>

            <a href="knowledges/110">

            <span class="title-icon">นโยบาย/<br>แผนยุทธศาสตร์/<br>แผนปฏิบัติราชการ</span>

            </a>

            </li>

            <li>

            <a href="laws" class="img-height"><span class="img-icon18">&nbsp;</span></a>

            <br>

            <a href="laws"><span class="title-icon">พรบ. / กฏหมายที่เกี่ยวข้อง</span></a>

            </li>
        </ul>
      </div>
      <!------------------------------------------------------------END CONTENT TAB PR----------------------------------------------------------->

</div>
<!------------------------------------------------------------END TAB TWO----------------------------------------------------------->

<!------------------------------------------------------------Begin Infographic----------------------------------------------------------->
<div class="clearfix">&nbsp;</div>

<!--<div class="domtab2">-->

	<ul class="domtabs">
		<li style="margin-left:20px;" class="active">
		<a href="#km">infographic</a>
		</li>
	</ul>
	<div style="margin-bottom:15px;"></div>

	<?php echo modules::run('modules_infograph/test_slide'); ?>

<!--</div>-->
<!------------------------------------------------------------END Infographic----------------------------------------------------------->



<!------------------------------------------------------------Begin vdo----------------------------------------------------------->
<div class="clearfix">&nbsp;</div>


	<ul class="domtabs">
		<li style="margin-left:5px;" class="active">

		<a href="#km">vdo/clip vdo</a>

		</li>
	</ul>
	<div style="margin-bottom:15px; margin-top:33px;"></div>

	<?php echo modules::run('executives/inc_home_video_all'); ?>

<!------------------------------------------------------------END vdo----------------------------------------------------------->


<div class="clearfix">&nbsp;</div>
<div id="about">
	<div id="title_about">เกี่ยวกับ <span style="color:#333333;">สำนักโรคติดต่อทั่วไป</span></div>
    <div id="about_col1">
    <span style="font-weight:bold; color:#0541ca;">นายแพทย์ โสภณ เอี่ยมศิริถาวร</span>
    <br>ผู้อำนวยการสำนักโรคติดต่อทั่วไป<br>
		<ul>
        	<li><a href="executives">ทำเนียบผู้บริหาร</a></li>
            <!-- <li><a href="#">ส่งสารถึงผู้อำนวยการ</a></li> -->
        </ul>
	  <div class="dr">
      <img src="themes/thaigcd2015/images/6724374827981.jpg" width="135" height="136" />
<!--      <br>
      <a href="https://www.facebook.com/tmanwg" class="link-facebook">&nbsp;</a>
      &nbsp;
      <a href="https://twitter.com/gcdmoph" class="link-twitter">&nbsp;</a>-->
      </div>
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
			<?php echo modules::run('polls/inc_left'); ?>
    	<?php //echo modules::run('executives/inc_home_video'); ?>
        <!-- <a href="executives/pole">
        	<img src="themes/thaigcd2015/images/poles.png" style="border:4px solid #fff;
        -webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.3);
        box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.3);" />
        </a> -->
    </div>
</div>
<!------------------------------------------------------------END ABOUT----------------------------------------------------------->
<div id="bannerSystem">

    <?php echo modules::run('banner/inc_home'); ?>

</div>
<!------------------------------------------------------------END BANNER SYSTEM------------------------------------------------------>
<div class="clearfix">&nbsp;</div>
<?php echo modules::run('weblinks/inc_home'); ?>
<!------------------------------------------------------------END WEBLINK------------------------------------------------------>

	<? //include "_footer.php";?>
    <?=modules::run('log/statvisits'); ?>
</div>
<!------------------------------------------------------------END Wrap1----------------------------------------------------------->
    <div class="clearfix">&nbsp;</div>




</body>
</html>
