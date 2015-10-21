<div class="title">
	<h2><?php echo month_th($month).' '.year_th($year) ?></h2>
</div>
<div class="archive_list">
	<ul>
		<?php foreach($blog->blogpost as $blogpost): ?>
		<li><a href="blogs/<?php echo $blog->id.'/'.$blogpost->id ?>"><?php echo $blogpost->title ?> - <?php echo mysql_to_th($blogpost->created) ?></a></li>
		<?php endforeach; ?>
	</ul>
</div>

<ul>
			