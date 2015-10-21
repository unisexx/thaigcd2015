<div id="page" class="corner">
<div id="blog" >
	<div class="newentry ">
		<h3>บทความล่าสุด</h3>
		<ul>
			<?php foreach($blogposts as $blogpost): ?>
			<li <?php echo cycle() ?>>
				<a href="blogs/<?php echo $blogpost->blog->id ?>/<?php echo $blogpost->id ?>">
					<img class="avatar" src="<?php echo avatar($blogpost->blog->user->profile->avatar) ?>" />
					<div class="info">
						<p><?php echo htmlspecialchars($blogpost->title) ?></p>
						<small><?php echo htmlspecialchars($blogpost->blog->title) ?></small>
						<span class="counter"><?php echo $blogpost->blogcomment->count() ?> ความคิดเห็น <img src="media/images/person.gif" /> <?php echo  $blogpost->counter ?> ผู้เข้าชม</span>
					</div>
				</a>
				<div class="clear"></div>
			</li>
			<?php endforeach; ?>
		</ul>
		<a href="blogs/newentry" class="more-rb">more</a>
	</div>
	<div class="newblog ">
		<h3>บล็อคมาใหม่</h3>
		<ul>
			<?php foreach($blogs as $blog): ?>
			<?php if($blog->blogpost->order_by('id','desc')->get()->title): ?>
			<li <?php echo cycle() ?>>
				<a href="blogs/<?php echo $blog->id ?>/<?php echo $blog->blogpost->id ?>">
				<img class="avatar" src="<?php echo avatar($blog->user->profile->avatar) ?>" />
				<div class="info">
					<p><?php echo htmlspecialchars($blog->blogpost->title) ?></p>
					<small><?php echo htmlspecialchars($blog->title) ?></small>
					<span class="counter"><?php echo $blog->blogpost->blogcomment->count() ?> ความคิดเห็น <img src="media/images/person.gif" /> <?php echo  $blog->blogpost->counter ?> ผู้เข้าชม</span>
				</div>
				</a>
				<div class="clear"></div>
			</li>
			<?php endif; ?>
			<?php endforeach; ?>
		</ul>
		<a href="blogs/newblog" class="more-rb">more</a>
	</div>
	<div class="clear"></div>
</div>
</div>