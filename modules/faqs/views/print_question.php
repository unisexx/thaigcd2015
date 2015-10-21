<style type="text/css">
body{
	font-size: 14px;
	line-height:22px;
}
.faq{
	margin:5px 0 0 0;
}
div.faq .question {
    color: #2763A5;
    padding-left: 15px;
}
.answer{
	padding-left:30px;
}
#confirmprint{
	margin:50px 0;
	cursor:pointer;
}
</style>

<body>
	<div class="topic"><img width="200" height="25" src="../../themes/gcdnew/images/topic_faq.png"></div>
	
	<div class="faq">
		<div class="question"><?php echo lang_decode($faqs->question,'') ?><br></div>
		<div class="answer"><?php echo lang_decode($faqs->answer,'') ?></div>
	</div>
	
	<div id="confirmprint"  align="center" onClick="window.print()"><img src="../../themes/gcdnew/images/printButton.png"></div>

</body>