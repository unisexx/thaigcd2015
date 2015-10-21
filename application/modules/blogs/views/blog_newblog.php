<div id="blog" >
	<img src="themes/gcdnew/images/topic_blog.jpg" style="margin: 0 0 10px 5px;" />
	<form method="get">
	<p class="box search">
		<label>ค้นหา : </label><?php echo form_input('search',(isset($_GET['search'])?$_GET['search']:'')).' '.form_submit('submit','ตกลง') ?>
	</p>
	</form>
	<?php echo $blogs->pagination() ?>
	<div class="newblog_index ">
		<h3>บล็อคมาใหม่</h3>
		<ul>
			<?php foreach($blogs as $blog): ?>
			<?php if($blog->blogpost->order_by('id','desc')->get()->title): ?>
			<li <?php echo cycle() ?>>
				<a href="blogs/<?php echo $blog->id ?>/<?php echo $blog->blogpost->id ?>">
				<img class="avatar" src="uploads/users/thumbs50x50/<?php echo $blog->user->profile->avatar ?>" />
				<div class="info">
					<p><?php echo $blog->blogpost->title ?></p>
					<small><?php echo $blog->title ?></small>
					<span class="counter"><?php echo $blog->blogpost->blogcomment->count() ?> ความคิดเห็น  <img src="media/images/person.gif" /> <?php echo  $blog->blogpost->counter ?> ผู้เข้าชม</p>
				</div>
				</a>
				<div class="clear"></div>
			</li>
			<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php echo $blogs->pagination() ?>
</div>