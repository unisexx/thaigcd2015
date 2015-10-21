<?php 

if(!function_exists('cycle'))
{
	function cycle()
	{
		static $i;	
		
		if (func_num_args() == 0)
		{
			$args = array('even','odd');
		}
		else
		{
			$args = func_get_args();
		}
		return 'class="'.$args[($i++ % count($args))].'"';
	}
}
if(!function_exists('menu_active'))
{
	function menu_active($module,$controller = FALSE,$class='active')
	{
		$CI =& get_instance();
		if($controller)
		{
			return ($CI->router->fetch_module() == $module && $CI->router->fetch_class() == $controller) ? 'class='.$class : '';	
		}
		else
		{
			return ($CI->router->fetch_module() == $module) ? 'class='.$class : '';	
		}
	}
}

if(!function_exists('get_option'))
{
	function get_option($value,$text,$table,$condition = NULL,$lang = NULL)
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from $table $condition");
		foreach($query->result() as $item) $option[$item->{$value}] = lang_decode($item->{$text},$lang);
		return $option;
	}
}

if(!function_exists('tag_decode'))
{
	function tag_decode($tags)
	{
		$CI =& get_instance();
		$tags = explode(",",$tags);
		$link = "";
		$comma = "";
		foreach($tags as $tag)
		{
			$link .= $comma.'<a href="'.$CI->router->fetch_module().'/tag/'.$tag.'">'.$tag.'</a>';
			$comma = ", ";
		}
		return $link;
	}
}

if(!function_exists('avatar'))
{
	function avatar($img=FALSE,$size = NULL)
	{
		return ($img)?'uploads/users/'.$size.$img:'themes/gcdnew/images/'.$size.'noavatar.gif';
	}
}

if(!function_exists('topic'))
{
	function topic($src)
	{
		$CI =& get_instance();
		if($CI->session->userdata('lang')=="th")
		{
			return "themes/gcdnew/images/".$src;
		}
		else
		{
			return "themes/gcdeng/images/".$src;
		}
	}
}

function sitemap($module,$id=NULL)
{
	$galleries = ($id)?"galleries/view/":"galleries";
	$webboard_quizs = ($id)?"webboards/category/":"webboards/";
	$mediapublics = ($id)?"mediapublics/index/0/":"mediapublics/";
	if(isset($$module))
	{
		return $$module.$id;
	}
	else
	{
		return ($id)?$module.'/index/'.$id:$module;
	}
}

function limit()
{
	$CI =& get_instance();
	$module = new Module;
	$module->get_by_module($CI->router->fetch_class());
	return ($module->listperpage)?$module->listperpage:20;
}

function webboard_group($post,$type){
	$CI =& get_instance();
	$webboard_post_level = new Webboard_post_level();
	$webboard_post_level->where('post <',$post)->order_by('post','desc')->limit(1)->get();
	if($webboard_post_level->exists())
	{
		if($type == "name")
		{
			return $webboard_post_level->name;
		}
		else
		{
			return $webboard_post_level->image;
		}
	}
	else
	{
		$webboard_post_level->get_by_name('Starter');
		if($type == "name")
		{
			return $webboard_post_level->name;
		}
		else
		{
			return $webboard_post_level->image;
		}
	}
	
}

function icon_new($orm)
{
	if(datediff($orm->start_date)>=(-5))
	{
	return '<img src="themes/gcdnew/images/new_icon.png" style="float:none; padding:0; border:none;" alt="บทความใหม่" />';
	}
}

function icon_file($file)
{
	if($file)
	{
	return '<img src="media/kcfinder/themes/oxygen/img/files/small/'.pathinfo($file, PATHINFO_EXTENSION).'.png"  style="float:none; padding:0; border:none;" alt="'.$file.'"  />';
	}
	else
	{
		return false;
	}
}

function owner_name($orm)
{
	return ($orm->user->profile->first_name)?'<p class="own"><strong>โดย: </strong> <span class="owner">'.$orm->user->profile->first_name.' '.$orm->user->profile->last_name.' @ '.lang_decode($orm->user->group->name,'th').'</span></p>':'';
}

function draft($module)
{
	$orm = new $module;
	if($module=="category"){$orm->where('module','galleries');}
	return '<span class="draft">'.auth_filter($orm)->where('status <>','approve')->count().'</span>';
}

function fix_file(&$files)
{
    $names = array( 'name' => 1, 'type' => 1, 'tmp_name' => 1, 'error' => 1, 'size' => 1);

    foreach ($files as $key => $part) {
        // only deal with valid keys and multiple files
        $key = (string) $key;
        if (isset($names[$key]) && is_array($part)) {
            foreach ($part as $position => $value) {
                $files[$position][$key] = $value;
            }
            // remove old key reference
            unset($files[$key]);
        }
    }
}

function thumb($imgUrl,$width,$height,$zoom_and_crop,$param = NULL){
	if(strpos($imgUrl, "http://") !== false){
		return "<img ".$param." src=".$imgUrl." width=".$width." height=".$height." alt='ภาพกิจกรรม'>";
	}else{
		return "<img ".$param." src=".site_url("media/timthumb/timthumb.php?src=".site_url($imgUrl)."&zc=".$zoom_and_crop."&w=".$width."&h=".$height)." width=".$width." height=".$height." alt='ภาพกิจกรรม'>";
	}
}

function youtube($youtubeurl,$width,$height){
    //parse_str( parse_url( $youtubeurl, PHP_URL_QUERY ), $my_array_of_vars );
    //preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=embed/)[^&\n]+|(?<=v=)[^&\‌​n]+|(?<=youtu.be/)[^&\n]+#", $youtubeurl, $matches);
    
    $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i';
  	preg_match($pattern, $youtubeurl, $matches);
  	return isset($matches[1]) ? '<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$matches[1].'" frameborder="0" allowfullscreen></iframe>' : false;
	
	//return '<iframe width="560" height="315" src="http://www.youtube.com/embed/'.$matches[0].'" frameborder="0" allowfullscreen></iframe>';
}

?>