<div id="blog" >
	<img src="themes/gcdnew/images/topic_blog.jpg" style="margin: 0 0 10px 5px;" />
	<form method="post">
	<p class="box search">
		<label>ค้นหา : </label><?php echo form_input('search',(isset($_POST['search'])?$_POST['search']:'')).' '.form_submit('submit','ตกลง') ?>
	</p>
	</form>
	<?php echo $blogposts->pagination() ?>
	<div class="newblog_index">
		<h3>New Entry</h3>
		<ul>
			<?php foreach($blogposts as $blogpost): ?>
			<li <?php echo cycle() ?>>
				<a href="blogs/<?php echo $blogpost->blog->id ?>/<?php echo $blogpost->id ?>">
					<img class="avatar" src="<?php echo avatar($blogpost->blog->user->profile->avatar) ?>" />
					<div class="info">
						<p><?php echo $blogpost->title ?></p>
						<small><?php echo $blogpost->blog->title ?></small>
						<span class="counter"><?php echo $blogpost->blogcomment->count() ?> ความคิดเห็น  <img src="media/images/person.gif" /> <?php echo  $blogpost->counter ?> ผู้เข้าชม</span>
					</div>
				</a>
				<div class="clear"></div>
			</li>
			<?php endforeach; ?>
		</ul>
	
	</div>
	<?php echo $blogposts->pagination() ?>
	<div class="clear"></div>
</div>