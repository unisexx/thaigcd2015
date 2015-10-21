
	<div class="topic"><img src="<?php echo topic("topic_prnews.png") ?>" width="200" height="25" /></div>
	<div id="data">
		<h2><?php echo lang_decode($information->title)?> <span class="f10 TxtGray2"><?php echo mysql_to_th($information->start_date) ?> - <?php echo $information->counter ?> ครั้ง</span> </h2>
		<?php echo lang_decode($information->detail) ?>
		<div class="ref"><strong>Credit by </strong> <span><?php echo ($information->user->profile->first_name=="")?'Thaigcd.ddc.moph.go.th':$information->user->profile->first_name.' '.$information->user->profile->last_name.' '.$information->user->profile->position?></span></div>  
		<div class="ref"><strong>Group </strong> <span><?php echo ($information->group_id)?lang_decode($information->group->name):lang_decode($information->user->group->name) ?></span></div>        
		<?php if($information->tag): ?><div class="tag"><strong>TAG :</strong> <span><?php echo tag_decode($information->tag) ?></span></div><?php endif; ?>
		<div class="ref"><strong style="float:left; margin:0 5px 0 0;">Rating </strong>
			<input name="rating" value="1" type="radio" class="star" disabled="disabled" <?php echo ($information->rating==1)?'checked="checked"':'' ?> />
			<input name="rating" value="2" type="radio" class="star" disabled="disabled" <?php echo ($information->rating==2)?'checked="checked"':'' ?> />
			<input name="rating" value="3" type="radio" class="star" disabled="disabled" <?php echo ($information->rating==3)?'checked="checked"':'' ?> />
			<input name="rating" value="4" type="radio" class="star" disabled="disabled" <?php echo ($information->rating==4)?'checked="checked"':'' ?> />
			<input name="rating" value="5" type="radio" class="star" disabled="disabled" <?php echo ($information->rating==5)?'checked="checked"':'' ?> />
				<div class="clear"></div>
		</div>
	
		<div class="ref"><form action="informations/vote/<?php echo $information->id?>" method="post">
					<input name="rating" value="1" type="radio" class="star"/>
					<input name="rating" value="2" type="radio" class="star"/>
					<input name="rating" value="3" type="radio" class="star"/>
					<input name="rating" value="4" type="radio" class="star"/>
					<input name="rating" value="5" type="radio" class="star"/>
					<input type="hidden" name="id" value="$data['id']" /> 
					<input type="submit" value="โหวต" /></div>
		</form>
    </div><!--data-->
<div style="padding:0 10px 10px;">
	<div id="commentform">
	<h3>ร่วมแสดงความคิดเห็น</h3>
	<form action="informations/comment/<?php echo $information->id?>" method="POST">
		<table>
			<?php if($this->session->userdata('id')): ?>
			<tr><th style="width:150px;">name : </th><td><?php echo login_data('display')?></td></tr>
			<?php else: ?>
			<tr><th style="width:150px;">name : </th><td><input type="text" name="name" class="textbox" value=""></td></tr>
			<?php endif; ?>
			<tr><th></th><td><img src="users/captcha" /></td></tr>
			<tr><th>Captcha : </th><td><input type="text" name="captcha" class="textbox"> </td></tr>
			<tr><th>Comment : </th><td><textarea name="comment" class="editor[mini]"></textarea></td></tr>
			<tr><th></th><td><input type="submit" value="ตกลง" /></td></tr>
		</table>
    </form>
</div>
<div id="comment">
	<ul>
	<?php foreach($information->information_comment as $key => $comment): ?>
	<li>
		<div class="info">
			<a id="comment<?php echo $comment->id?>" name="comment<?php echo ($key + 1)?>"></a>
			<?php if($comment->user_id): ?>
			<img src="uploads/users/thumbs50x50/<?php echo $comment->user->profile->avatar ?>" />
			<?php endif; ?>
			<p>#<?php echo ($key + 1)?> By <span class="display"><?php echo ($comment->user_id)?$comment->user->display:$comment->name.'[Guest]' ?></span></p>
			<p>@<?php echo mysql_to_th($comment->created)?></p>
		</div>
		<div class="comment">
			<p><?php echo $comment->comment ?></p>
		</div>
		<?php if($information->id == $this->session->userdata('id')): ?>
		<div class="option">
			<a href="information/commentdel/<?php echo $comment->id?>">ลบ</a>
		</div>
		<?php endif; ?>
		<div class="clear"></div>
	</li>
	<?php endforeach; ?>
	</ul>
</div>
</div>