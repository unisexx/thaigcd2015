<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="<?php echo base_url(); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $template['title'] ?></title>
	<? include "_script.php";?>
	<?php echo $template['metadata'] ?>
</head>

<body>
<div id="wrapper">
<div id="header">
<? include "_header.php";?>
</div><!--header-->

<div id="main">
	<div id="dvleft">
		<?php echo modules::run('blogs/sidebar',$blog->id) ?>
		<div class="paddtop20bot20"><span></span></div>
        
      	<?php echo modules::run('users/inc_left'); ?>
		<div class="paddtop20bot20"><span></span></div>
		<? //include "_left.php";?>
	</div><!--dvleft-->
    <div id="dvright" class="right">
    	<div id="page" class="corner" style="background:<?php echo $blog->background ?>">
    		<div id="blog">
	    		<div id="blog_header">
	    			<h1>
	    				<a href="blogs/<?php echo $blog->id ?>"><?php echo $blog->title ?></a>
	    			</h1>
					<h2><?php echo $blog->description ?></h2>
					<div id="blog_cover">
						<?php if(is_file('uploads/users/blog/'.$blog->user_id.'/'.$blog->header)): ?>
						<img src="uploads/users/blog/<?php echo $blog->user_id ?>/<?php echo $blog->header ?>" />
						<?php endif; ?>
					</div>
	    		</div>
				<div id="blog_menu">
					<ul>
						<li><a href="blogs">หน้าแรก</a></li>
						<?php if(is_login()): ?>
						<?php if($blog->user->id == $this->session->userdata('id')): ?>
						<?php if($blog->blogpost->count()>0): ?>
						<li><a href="blogs/<?php echo user()->$blog->id ?>">บล็อคของฉัน</a></li>
						<?php endif; ?>
						<li><a href="blogs/post_index">จัดการบล็อค</a></li>
						<li><a href="blogs/setting">ตั้งค่า</a></li>
						<?php endif; ?>
						<?php endif; ?>
					</ul>
				</div>
				<div id="blog_body">
	        	<?php echo $template["body"] ?>
				</div>
			</div>
		</div>
    </div><!--dvright-->
</div><!--main-->
<div class="clear"></div>
<div id="dvlink">
	<?php //echo modules::run('weblinks/inc_home'); ?>
</div><!--dvlink-->
</div><!--wrapper-->
<div id="dvfooter">
	<? include "_footer.php";?>
</div><!--dvfooter-->
</body>
</html>
