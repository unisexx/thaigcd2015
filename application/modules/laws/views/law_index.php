<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <?php foreach($categories as $key => $category): ?>
    <li role="presentation" class="<?if($key==0)echo"active";?>"><a href="#<?php echo lang_decode($category->name,'')?>" aria-controls="<?php echo lang_decode($category->name,'')?>" role="tab" data-toggle="tab"><?php echo lang_decode($category->name,'')?></a></li>
	<?php endforeach;?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <?php foreach($categories as $key => $category): ?>
	<div role="tabpanel" class="tab-pane <?if($key==0)echo"active";?>" id="<?php echo lang_decode($category->name,'')?>">
		<?php foreach($category->law->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'")->limit(($key==0)?2:20)->get() as $key => $law): ?>
		<?php if($law->category_id ==11): ?><h3><?php echo lang_decode($law->title) ?></h3>
		<?php echo lang_decode($law->detail) ?>
		<?php else: ?>
		<a href="laws/view/<?php echo $law->id ?>"><h3><?php echo lang_decode($law->title) ?></h3></a>
		<?php endif; ?>
		<div class="clear"></div>
		<?php endforeach;?>
	</div>
	<?php endforeach;?>
  </div>

</div>