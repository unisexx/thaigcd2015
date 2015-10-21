<link rel="stylesheet" type="text/css" href="themes/gcdeng/css/template.css"/>
<link type="text/css" href="themes/gcdeng/css/ui-lightness/jquery.ui.all.css" rel="stylesheet" />
<link type="text/css" href="themes/gcdeng/css/ui-lightness/jquery.ui.tabs.css" rel="stylesheet" />
<link type="text/css" href="media/css/pagination.css" rel="stylesheet" />
<script type="text/javascript" src="themes/gcdeng/js/SWFSupport.js"></script>
<script type="text/javascript" src="themes/gcdeng/js/jquery.min.js" ></script>
<script type="text/javascript" src="themes/gcdeng/js/jquery-ui-1.8.6.custom.min.js"></script>
<script type="text/javascript" src="themes/gcdeng/js/easySlider1.5.js"></script>
<script type="text/javascript" src="themes/gcdeng/js/jquery.marquee.js"></script>
<script type="text/javascript" src="themes/gcdeng/js/jquery.slideheader.js"></script>
<script type="text/javascript" src="themes/gcdeng/js/jquery.tooltip.v.1.1.js"></script>
<script type="text/javascript" src="themes/gcdeng/js/jquery.faq.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="themes/gcdeng/css/jScrollPane.css" />
		<script type="text/javascript" src="themes/gcdeng/js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="themes/gcdeng/js/jScrollPane.js"></script>

<script type="text/javascript">
	$(function(){
		$(".corner").append('<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div><div class="shadow"></div>');
		$(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' ,changeMonth: true,changeYear: true});

		$("#tabs,#tabs2").tabs();
		$('#pane3').jScrollPane();
		$('#pane4').jScrollPane({scrollbarOnLeft:true});
		$("#slider").easySlider();
		setInterval( "slideSwitch()", 4000 );
		$(".imgtooltip").simpletooltip()
		SSS_faq.init();
		
	});
</script>