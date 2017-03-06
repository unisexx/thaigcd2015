 <script language="javascript">
$(function(){
	$("#poll input[name='pollBtn2']").click(function(){
		var p = $(this).parent().parent();
		if(p.find("input[name=poll]:checked")){
			$.get("polls/vote",{id:p.find("input[name=id]").val(),id_ans:p.find("input[name=poll]:checked").val()},function(data){
				p.parent().find('.poll-result').html(data).show();
				p.hide();
				});
		}
		else
		{
			alert('กรุณาเลือกคำตอบก่อนส่งความคิดเห็นค่ะ');
		}
		return false;
	});

	$("#poll input[name='viewBtn2']").click(function(){
		var p = $(this).parent().parent();
			$.get("polls/view/" + p.find("input[name=id]").val(),function(data){
				p.parent().find('.poll-result').html(data).show();
				p.hide();
				});
		return false;
	});
});
</script>
<div id="poll">
	<strong><?php echo $poll->title ?></strong>
	<div id="listpoll">
		<?php foreach($poll->polldetail as $key=>$item): ?>
		<p><input type="radio" value="<?php echo $item->id ?>" name="poll" <?=$key == 0 ? 'checked' : '' ;?> style="margin-top:0px; vertical-align:middle;"> <?php echo $item->name ?></p>
		<?php endforeach ?>
		<p><input type="submit" value="ส่งความคิดเห็น" class="btn_pollcomment" name="pollBtn2"> <input value="ดูผลสำรวจ" type="button" class="btn_pollview" name="viewBtn2"></p>
		<input type="hidden" name="id" value="<?php echo $poll->id ?>" />
	</div>
	<div class="poll-result" style="display:none;"></div>
</div>
