 <script language="javascript">
$(function(){
	$("input[name='pollBtn2']").click(function(){
		var p = $(this).parent().parent();
		if(p.find("input[name=poll]:checked").attr('checked')){
			$.get("polls/vote",{id:p.find("input[name=id]").val(),id_ans:p.find("input[name=poll]:checked").val()},function(data){
				p.parent().find('.poll-result').html(data).show();
				p.hide();							
				});
			}
		return false;
	});
	
	$("input[name='viewBtn2']").click(function(){
		var p = $(this).parent().parent();
			$.get("polls/view/" + p.find("input[name=id]").val(),function(data){
				p.parent().find('.poll-result').html(data).show();
				p.hide();
				});
		return false;
	});
});
</script>
<div id="data">
<div class="topic"><img width="200" height="25" alt="แบบสำรวจความคิดเห็น" src="themes/gcdnew/images/topic_poll.png"></div>
<div id="poll">
	<?php echo $polls->pagination() ?>
	<?php foreach($polls as $poll): ?>
	<div class="poll">
	<h3 class="B f14"><?php echo $poll->title ?></h3>
	<div id="listpoll">
		<?php foreach($poll->polldetail as $item): ?>
		<p><input type="radio" value="<?php echo $item->id ?>" name="poll"><label><?php echo $item->name ?></label></p>
		<?php endforeach ?>
		<p><input type="button" class="btn_pollview" name="viewBtn2"><input type="submit" class="btn_pollcomment" name="pollBtn2"></p>
		<input type="hidden" name="id" value="<?php echo $poll->id ?>" />
	</div>
	<div class="poll-result" style="display:none;"></div>
	<hr />
	</div>
	<?php endforeach; ?>
	<?php echo $polls->pagination() ?>
</div>
</div>
