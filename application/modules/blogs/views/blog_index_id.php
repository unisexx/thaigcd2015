<div class="title">
	<h2><?php echo htmlspecialchars($blog->blogpost->title) ?></h2>
	<span>
		เขียนเมื่อ <?php echo mysql_to_th($blog->blogpost->start_date,'S',FALSE)?> โดย <?php echo $blog->user->display ?> 
		<?php if($blog->user_id == $this->session->userdata('id')): ?>
		<a href="blogs/post/<?php echo $blog->blogpost->id ?>">แก้ไข |</a> 
		<a href="blogs/delete/<?php echo $blog->blogpost->id ?>"> ลบ</a>
		<?php endif; ?>
	</span>
</div>
<div class="post">
	<?php echo $blog->blogpost->detail; ?>
	<?php if($blog->blogpost->tag): ?>
	<p>Tags: <?php echo tag_decode($blog->blogpost->tag) ?></p>
	<?php endif; ?>
</div>
<div class="nav">
	<?php if($next->blogpost->id):?>
	<div class="next right">
		<a href="blogs/<?php echo $next->id ?>/<?php echo $next->blogpost->id ?>">ถัดไป</a>
	</div>	
	<?php endif; ?>
	<?php if($prev->blogpost->id):?>
	<div class="prev left">
		<a href="blogs/<?php echo $prev->id ?>/<?php echo $prev->blogpost->id ?>">ก่อนหน้า</a>
	</div>	
	<?php endif; ?>
	<div class="clear"></div>
</div>
<div id="commentform">
	<h3>ร่วมแสดงความคิดเห็น</h3>
	<form action="blogs/comment/<?php echo $blog->blogpost->id?>" method="POST">
		<table>
			<?php if($this->session->userdata('id')): ?>
			<tr><th style="width:150px;">ชื่อ : </th><td><?php echo login_data('display')?></td></tr>
			<?php else: ?>
			<tr><th style="width:150px;">ชื่อ : </th><td><input type="text" name="cn" class="textbox" value=""></td></tr>
			<?php endif; ?>
			<tr><th></th><td><img src="users/captcha" /></td></tr>
			<tr><th>Captcha : </th><td><input type="text" name="captcha" class="textbox"> </td></tr>
			<tr><th>ความคิดเห็น : </th><td><textarea name="comment" class="editor[mini]"></textarea></td></tr>
			<tr><th></th><td><input type="submit" value="ตกลง" /></td></tr>
		</table>
    </form>
</div>
<div id="comment">
	<ul>
	<?php foreach($blog->blogpost->blogcomment as $key => $blogcomment): ?>
	<li>
		<div class="info">
			<a id="comment<?php echo $blogcomment->id?>" name="comment<?php echo ($key + 1)?>"></a>
			<img class="avatar" src="<?php echo avatar($blogcomment->user->profile->avatar,'thumbs50x50/') ?>" />
			<p>#<?php echo ($key + 1)?> By <span class="display"><?php echo $blogcomment->user->display ?></span></p>
			<p>@<?php echo mysql_to_th($blogcomment->created)?></p>
		</div>
		<div class="comment">
			<p><?php echo $blogcomment->comment ?></p>
		</div>
		
		<div class="option">
			<?php if($blog->id == $this->session->userdata('id')): ?><a href="blogs/commentdel/<?php echo $blogcomment->id?>">ลบ</a> | <?php endif; ?><a class="comment_alert" href="blogs/alert/<?php echo $blogcomment->id ?>?iframe=true&amp;width=350&amp;height=200" rel="lightbox">แจ้งลบความคิดเห็นนี้</a>
		</div>
		
		<div class="clear"></div>
	<?php endforeach; ?>
	</ul>
</div>

			