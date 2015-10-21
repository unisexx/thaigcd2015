<div id="blog-side" class="corner" style="background:<?php echo $blog->background ?>">
	<div class="info">
		<img src="<?php echo avatar($blog->user->profile->avatar) ?>" />
		<p><label></label><?php echo $blog->user->display ?></p>
		<?php if(($this->session->userdata('id')<>$blog->user_id)&&(is_login())): ?>
		<p><a href="blogs/favourite/<?php echo $blog->id ?>">Add Favourite</a></p>
		<?php endif; ?>
	</div>
	<div class="lastest">
		<h3>โพสต์ล่าสุด</h3>
		<ul>
			<?php foreach ($blog->blogpost->where("start_date <= date(sysdate())")->order_by('id','desc')->get() as $blogpost): ?>
			<li><a href="blogs/<?php echo $blog->id?>/<?php echo $blogpost->id ?>"><?php echo $blogpost->title ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="archives">
		<h3>Archives</h3>
		<ul>
			<?php foreach($archives->blogpost as $archive): ?>
			<li><a href="blogs/archive/<?php echo "$blog->id/$archive->month/$archive->year"?>"><?php echo month_th($archive->month).' '.year_th($archive->year).' ('.$archive->result.')' ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="archives">
		<h3>Favourite</h3>
		<ul>
			<?php foreach($blog->user->blogfavourite as $favourite): ?>
			<li><a href="blogs/<?php echo $favourite->blog_id?>"><?php echo $favourite->blog->title?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>	