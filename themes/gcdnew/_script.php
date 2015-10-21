<link rel="stylesheet" type="text/css" href="media/css/btn.css"/>

<link rel="stylesheet" type="text/css" href="themes/gcdnew/css/template.css"/>
<link class="theme" rel="stylesheet" type="text/css" href="themes/gcdnew/css/layout.css"/>
<link rel="stylesheet" href="media/css/icons.css" type="text/css" media="screen" charset="utf-8" />
<link type="text/css" href="themes/gcdnew/css/ui-lightness/jquery.ui.all.css" rel="stylesheet" />
<link type="text/css" href="themes/gcdnew/css/ui-lightness/jquery.ui.tabs.css" rel="stylesheet" />
<link type="text/css" href="media/css/pagination.css" rel="stylesheet" />
<link href='media/js/star/jquery.rating.css' type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="themes/gcdnew/js/SWFSupport.js"></script>
<script type="text/javascript" src="themes/gcdnew/js/jquery.min.js" ></script>
<script type="text/javascript" src="themes/gcdnew/js/jquery-ui-1.8.6.custom.min.js"></script>
<script src="media/js/jquery-cookie/jquery.cookie.js"></script>
<script type="text/javascript" src="themes/gcdnew/js/easySlider1.5.js"></script>
<script type="text/javascript" src="themes/gcdnew/js/jquery.marquee.js"></script>
<script type="text/javascript" src="themes/gcdnew/js/jquery.slideheader.js"></script>
<script type="text/javascript" src="themes/gcdnew/js/jquery.tooltip.v.1.1.js"></script>
<script type="text/javascript" src="themes/gcdnew/js/jquery.faq.js"></script>
<script type="text/javascript" src="themes/gcdnew/js/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="themes/gcdnew/css/jScrollPane.css" />
<link rel="stylesheet" type="text/css" media="all" href="themes/gcdnew/css/colorbox.css" />
<script type="text/javascript" src="themes/gcdnew/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="themes/gcdnew/js/jScrollPane.js"></script>
<script src='media/js/star/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
<script src='media/js/star/jquery.rating.js' type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="media/js/cufon/cufon-yui.js"></script>
<script type="text/javascript" src="media/js/cufon/PSLxThaiCommon.font.js"></script>
<script type="text/javascript" src="media/js/jquery.reject.js"></script>
<script type="text/javascript" src="media/js/highchart/highcharts.js"></script>
<script type="text/javascript" src="media/js/highchart/modules/exporting.js"></script>
<script type="text/javascript">
$(function(){
	
		$(".corner").append('<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div><div class="shadow"></div>');
		//$(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' ,changeMonth: true,changeYear: true, yearRange: '1940:<?php echo date('Y') ?>'});

	var dateBefore=null;
	$(".datepicker").datepicker({
		dateFormat: 'dd/mm/yy',
		yearRange: '1940:<?php echo date('Y') ?>',
		dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'], 
		monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
		changeMonth: true,
		changeYear: true ,
		beforeShow:function(){
			if($(this).val()!=""){
				var arrayDate=$(this).val().split("/");		
				arrayDate[2]=parseInt(arrayDate[2])-543;
				$(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);
			}
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);

		},
		onChangeMonthYear: function(){
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});
			},50);
		},
		onClose:function(){
			if($(this).val()!="" && $(this).val()==dateBefore){			
				var arrayDate=dateBefore.split("/");
				arrayDate[2]=parseInt(arrayDate[2])+543;
				$(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);	
			}		
		},
		onSelect: function(dateText, inst){ 
			dateBefore=$(this).val();
			var arrayDate=dateText.split("/");
			arrayDate[2]=parseInt(arrayDate[2])+543;
			$(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);
		}

	});
		$("#tabs,#tabs2").tabs();
		$('#pane3').jScrollPane();
		$('#pane4').jScrollPane({scrollbarOnLeft:true});
		// $("#slider").easySlider();
		setInterval( "slideSwitch()", 4000 );
		$(".imgtooltip").simpletooltip()
		SSS_faq.init();
		$.post("dashboards/inc_index",function(data){
			$("#pageview img").remove();
			$("#pageview").append(data);
		})
			// Cufon.replace('#menu li a,.cufon', { hover: true });
			
			// $('#menu li').hover(function(){
				// $(this).stop().animate({
					// borderColor:'#5DD2FD',
					// lineHeight:'46px'
				// })
			// },function(data){
				// $(this).stop().animate({
					// borderColor:'#004566',
					// lineHeight:'36px'
				// })
			// })
			
		$('a[rel=external]').click(function(){
  			this.target = "_blank";
		});
		
		// Set Theme from cookie
		$("link.theme").attr("href",$.cookie('theme'));
		
		// jquery style
		switch($.cookie('theme')) {
	    case 'themes/gcdnew/css/style_white.css':
	        $('#webboardpage > div.topic > img').attr("src","themes/gcdnew/images/white/topic_board.png");
	        $('.topic_carendar').attr("src","themes/gcdnew/images/white/topic_calendar.png");
	        $('.topic_executives').attr("src","themes/gcdnew/images/white/topic_executives.png");
	        $('#boxphoto > div.topic > img').attr("src","themes/gcdnew/images/white/topic_gallery.png");
	        $('.topic_group').attr("src","themes/gcdnew/images/white/topic_group.png");
	        $('#boxknow > div.topic > img').attr("src","themes/gcdnew/images/white/topic_know.png");
	        $('#boxknowledge > div.topic > img').attr("src","themes/gcdnew/images/white/topic_knowledge.png");
	        $('.topic_executives').attr("src","themes/gcdnew/images/white/topic_executives.png");
	        $('#boxtopstory > div.topic > img').attr("src","themes/gcdnew/images/white/topic_topstory.png");
	        $('#boxprnews > div.topic > img').attr("src","themes/gcdnew/images/white/topic_prnews.png");
	        $('#boxlaw > div.topic > img').attr("src","themes/gcdnew/images/white/topic_media.png");
	        $('#boxnewsletter > div:nth-child(1) > img').attr("src","themes/gcdnew/images/white/topic_newsletter.png");
	        $('#boxnewsletter > div:nth-child(5) > img').attr("src","themes/gcdnew/images/white/topic_poll.png");
	        $('#boxlogin > div.topic > img').attr("src","themes/gcdnew/images/white/topic_member.png");
	        $('#boxnewsboss > div.topic > img').attr("src","themes/gcdnew/images/white/topic_newsboss.png");
	        $('.topic_notice').attr("src","themes/gcdnew/images/white/topic_notice.png");
	        $('.weblink_topic').attr("src","themes/gcdnew/images/white/topic_weblink.png");
	        break;
	    case 'themes/gcdnew/css/style_yellow.css':
	        $('#webboardpage > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_board.png");
	        $('.topic_carendar').attr("src","themes/gcdnew/images/yellow/topic_calendar.png");
	        $('.topic_executives').attr("src","themes/gcdnew/images/yellow/topic_executives.png");
	        $('#boxphoto > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_gallery.png");
	        $('.topic_group').attr("src","themes/gcdnew/images/yellow/topic_group.png");
	        $('#boxknow > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_know.png");
	        $('#boxknowledge > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_knowledge.png");
	        $('.topic_executives').attr("src","themes/gcdnew/images/yellow/topic_executives.png");
	        $('#boxtopstory > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_topstory.png");
	        $('#boxprnews > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_prnews.png");
	        $('#boxlaw > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_media.png");
	        $('#boxnewsletter > div:nth-child(1) > img').attr("src","themes/gcdnew/images/yellow/topic_newsletter.png");
	        $('#boxnewsletter > div:nth-child(5) > img').attr("src","themes/gcdnew/images/yellow/topic_poll.png");
	        $('#boxlogin > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_member.png");
	        $('#boxnewsboss > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_newsboss.png");
	        $('.topic_notice').attr("src","themes/gcdnew/images/yellow/topic_notice.png");
	        $('.weblink_topic').attr("src","themes/gcdnew/images/yellow/topic_weblink.png");
	        break;
	    default:
	        $('#webboardpage > div.topic > img').attr("src","themes/gcdnew/images/topic_board.png");
			$('.topic_carendar').attr("src","themes/thaigcd/images/topic_calendar.png");
			$('.topic_executives').attr("src","themes/gcdnew/images/topic_executives.png");
			$('#boxphoto > div.topic > img').attr("src","themes/gcdnew/images/topic_gallery.png");
			$('.topic_group').attr("src","themes/gcdnew/images/topic_group.png");
			$('#boxknow > div.topic > img').attr("src","themes/gcdnew/images/topic_know.png");
			$('#boxknowledge > div.topic > img').attr("src","themes/gcdnew/images/topic_knowledge.png");
			$('.topic_executives').attr("src","themes/gcdnew/images/topic_executives.png");
			$('#boxtopstory > div.topic > img').attr("src","themes/gcdnew/images/topic_topstory.png");
			$('#boxprnews > div.topic > img').attr("src","themes/gcdnew/images/topic_prnews.png");
			$('#boxlaw > div.topic > img').attr("src","themes/gcdnew/images/topic_media.png");
			$('#boxnewsletter > div:nth-child(1) > img').attr("src","themes/gcdnew/images/topic_newsletter.png");
			$('#boxnewsletter > div:nth-child(5) > img').attr("src","themes/gcdnew/images/topic_poll.png");
			$('#boxlogin > div.topic > img').attr("src","themes/gcdnew/images/themes/gcdnew/images/topic_member.png");
			$('#boxnewsboss > div.topic > img').attr("src","themes/gcdnew/images/topic_newsboss.png");
			$('.topic_notice').attr("src","themes/gcdnew/images/topic_notice.png");
			$('.weblink_topic').attr("src","themes/gcdnew/images/topic_weblink.png");
		}
			
		
		// Theme Switcher
		$(".theme-switch a").click(function() { 
			$("link.theme").attr("href",$(this).attr('rel'));
			
			// create cookie (30 วัน)
			$.cookie('theme', $(this).attr('rel'), { expires: 30 });
			
			switch($.cookie('theme')) {
		    case 'themes/gcdnew/css/style_white.css':
		        $('#webboardpage > div.topic > img').attr("src","themes/gcdnew/images/white/topic_board.png");
		        $('.topic_carendar').attr("src","themes/gcdnew/images/white/topic_calendar.png");
		        $('.topic_executives').attr("src","themes/gcdnew/images/white/topic_executives.png");
		        $('#boxphoto > div.topic > img').attr("src","themes/gcdnew/images/white/topic_gallery.png");
		        $('.topic_group').attr("src","themes/gcdnew/images/white/topic_group.png");
		        $('#boxknow > div.topic > img').attr("src","themes/gcdnew/images/white/topic_know.png");
		        $('#boxknowledge > div.topic > img').attr("src","themes/gcdnew/images/white/topic_knowledge.png");
		        $('.topic_executives').attr("src","themes/gcdnew/images/white/topic_executives.png");
		        $('#boxtopstory > div.topic > img').attr("src","themes/gcdnew/images/white/topic_topstory.png");
		        $('#boxprnews > div.topic > img').attr("src","themes/gcdnew/images/white/topic_prnews.png");
		        $('#boxlaw > div.topic > img').attr("src","themes/gcdnew/images/white/topic_media.png");
		        $('#boxnewsletter > div:nth-child(1) > img').attr("src","themes/gcdnew/images/white/topic_newsletter.png");
		        $('#boxnewsletter > div:nth-child(5) > img').attr("src","themes/gcdnew/images/white/topic_poll.png");
		        $('#boxlogin > div.topic > img').attr("src","themes/gcdnew/images/white/topic_member.png");
		        $('#boxnewsboss > div.topic > img').attr("src","themes/gcdnew/images/white/topic_newsboss.png");
		        $('.topic_notice').attr("src","themes/gcdnew/images/white/topic_notice.png");
		        $('.weblink_topic').attr("src","themes/gcdnew/images/white/topic_weblink.png");
		        break;
		    case 'themes/gcdnew/css/style_yellow.css':
		        $('#webboardpage > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_board.png");
		        $('.topic_carendar').attr("src","themes/gcdnew/images/yellow/topic_calendar.png");
		        $('.topic_executives').attr("src","themes/gcdnew/images/yellow/topic_executives.png");
		        $('#boxphoto > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_gallery.png");
		        $('.topic_group').attr("src","themes/gcdnew/images/yellow/topic_group.png");
		        $('#boxknow > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_know.png");
		        $('#boxknowledge > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_knowledge.png");
		        $('.topic_executives').attr("src","themes/gcdnew/images/yellow/topic_executives.png");
		        $('#boxtopstory > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_topstory.png");
		        $('#boxprnews > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_prnews.png");
		        $('#boxlaw > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_media.png");
		        $('#boxnewsletter > div:nth-child(1) > img').attr("src","themes/gcdnew/images/yellow/topic_newsletter.png");
		        $('#boxnewsletter > div:nth-child(5) > img').attr("src","themes/gcdnew/images/yellow/topic_poll.png");
		        $('#boxlogin > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_member.png");
		        $('#boxnewsboss > div.topic > img').attr("src","themes/gcdnew/images/yellow/topic_newsboss.png");
		        $('.topic_notice').attr("src","themes/gcdnew/images/yellow/topic_notice.png");
		        $('.weblink_topic').attr("src","themes/gcdnew/images/yellow/topic_weblink.png");
		        break;
		    default:
		        $('#webboardpage > div.topic > img').attr("src","themes/gcdnew/images/topic_board.png");
				$('.topic_carendar').attr("src","themes/thaigcd/images/topic_calendar.png");
				$('.topic_executives').attr("src","themes/gcdnew/images/topic_executives.png");
				$('#boxphoto > div.topic > img').attr("src","themes/gcdnew/images/topic_gallery.png");
				$('.topic_group').attr("src","themes/gcdnew/images/topic_group.png");
				$('#boxknow > div.topic > img').attr("src","themes/gcdnew/images/topic_know.png");
				$('#boxknowledge > div.topic > img').attr("src","themes/gcdnew/images/topic_knowledge.png");
				$('.topic_executives').attr("src","themes/gcdnew/images/topic_executives.png");
				$('#boxtopstory > div.topic > img').attr("src","themes/gcdnew/images/topic_topstory.png");
				$('#boxprnews > div.topic > img').attr("src","themes/gcdnew/images/topic_prnews.png");
				$('#boxlaw > div.topic > img').attr("src","themes/gcdnew/images/topic_media.png");
				$('#boxnewsletter > div:nth-child(1) > img').attr("src","themes/gcdnew/images/topic_newsletter.png");
				$('#boxnewsletter > div:nth-child(5) > img').attr("src","themes/gcdnew/images/topic_poll.png");
				$('#boxlogin > div.topic > img').attr("src","themes/gcdnew/images/themes/gcdnew/images/topic_member.png");
				$('#boxnewsboss > div.topic > img').attr("src","themes/gcdnew/images/topic_newsboss.png");
				$('.topic_notice').attr("src","themes/gcdnew/images/topic_notice.png");
				$('.weblink_topic').attr("src","themes/gcdnew/images/topic_weblink.png");
			}
			
			return false;
		});
		
		
		// ปรับขนาดตัวอักษร
		// declare a few constants:
		 var ELE = "body,body a,body table,#dvright #boxvdosound .box_info h3"; //action element
	     var SMALL = 9; //small font size in pixels
	     var LARGE = 16; //larger size in pixels
	     var RESET = 13; //reset size to default
	     var COOKIE_NAME = "fontsize"; //Maybe give this the name of your site.
	     //make it small by default
	     var fontsize = RESET;

	     // if cookie exists set font size to saved value, otherwise create cookie
	     if($.cookie(COOKIE_NAME)) {
		     fontsize = $.cookie(COOKIE_NAME);
		     //set initial font size for this page view:
		     $(ELE).css("font-size", fontsize + "px", "important");
		     //set up appropriate class on font resize link:
		     if(fontsize == SMALL) { $("#small").addClass("current"); }
		     else { $("#large").addClass("current"); }
	     } else {
		     $("#small").addClass("current");
		     $.cookie(COOKIE_NAME, fontsize);
	     }

	     // large font-size link:
	     $(".fontSizePlus").bind("click", function() {
	     if(fontsize == SMALL || fontsize == RESET) {
		     fontsize = LARGE;
			     $(ELE).css("font-size", fontsize + "px");
			     	$.cookie(COOKIE_NAME, fontsize);
			     }
		     return false;	
	     });
	     
	     // small font-size link:
	     $(".fontSizeMinus").bind("click", function() {
	     if(fontsize == LARGE || fontsize == RESET) {
		     fontsize = SMALL;
			     $(ELE).css("font-size", fontsize + "px");
			     	$.cookie(COOKIE_NAME, fontsize);
			     }
		     return false;	
	     });
			     
		// small font-size link:
	     $(".fontReset").bind("click", function() {
	     if(fontsize == SMALL || fontsize == LARGE) {
		     fontsize = RESET;
			     $(ELE).css("font-size", fontsize + "px");
			     	$.cookie(COOKIE_NAME, fontsize);
			     }
		     return false;	
	     });
	     
	    // scroll on top
		$(window).scroll(function() {
	    	if($(this).scrollTop() != 0) {
	            $('#footer-back-to-top').removeClass('offscreen');
	        } else {
	            $('#footer-back-to-top').addClass('offscreen');
	        }
	    });
	    
	    $('#footer-back-to-top').click(function() {
	        $('body,html').animate({scrollTop:0},800);
	    }); 
		
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16496558-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


