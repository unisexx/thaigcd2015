<script type="text/javascript">
	$(function(){
		$(".question").click(function(){
			var link = $(this).attr('href');
			//alert(link);
			$.get(link);
			return false;
		});
	});
</script>

<div id="boxmedia-page" class="corner">
<div class="topic"><img src="themes/gcdnew/images/topic_faq.png" height="25" width="200"></div>
	<div style="position:absolute; right:10px; top:15px; cursor:pointer; color:#aaa;" onClick="window.print()">พิมพ์หน้านี้</div>
	<div id="data">
		<form action="faqs/search" method="post">
			<span class="TxtGray4 B" style="padding: 0 10pt;">ค้นหา :</span>
			<input type="text" name="textsearch" value="<?php echo @$_POST['textsearch']?>">
			<input type="submit" class="btn_search2" value="Submit" id="button2" name="button2">
		</form>
		
		<div id="mediaitem">
			<div class="groupname">ผลการค้นหา</div>
			<?php foreach($faqs as $faq):?>
				<div class="faq">
					<div class="question" rel="ajax" href="faqs/counter/<?php echo $faq->id?>"><?php echo lang_decode($faq->question)?></div>
					<div class="answer">
						<p><?php echo lang_decode($faq->answer)?></p>
						<p><a rel="lightbox" href="faqs/tell_a_friend/<?php echo $faq->id?>?iframe=true&width=370&height=210"><img src="themes/gcdnew/images/emailButton.png"></a> 
				<span style="display:inline; cursor:pointer;" onClick="javascript:window.open('faqs/print_question/<?php echo $faq->id?>' , '','nenuber=no,toorlbar=no,location=no,scrollbars=no, status=no,resizable=no,width=600,height=300,top=250,left=350 ' )";><img src="themes/gcdnew/images/printButton.png"></span>
						</p>
					</div>
				</div>
			<?php endforeach;?>
		</div>
		<?php echo $faqs->pagination()?>
		
    </div><!--data-->
</div>