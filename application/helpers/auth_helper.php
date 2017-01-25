<?php

function login($username,$password)
{
	$CI =& get_instance();
	$user = new User();
	$user->where(array('username'=>$username,'password'=>$password))->get();
	if($user->exists())
	{
		if($user->level->id == "5")
		{
			$timediff = timeDiff($user->last_login,date("Y-m-d H:i:s",now()));
			$webboard_status_config = new Webboard_status_config(1);
			if($timediff > $webboard_status_config->memlock)
			{
				$user->m_status = "ban";
			}
			else
			{
				$user->m_status = "active";
			}
		}
		$user->last_login = date("Y-m-d H:i:s",now());
		$user->save();
		if($user->m_status == "ban")
		{
			return FALSE;
		}
		$_SESSION['id'] = $user->id;  
		$CI->session->set_userdata('id',$user->id);
		$_SESSION['level'] = $user->level_id;  
		$CI->session->set_userdata('level',$user->level_id);
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function email_login($email,$password)
{
	$CI =& get_instance();
	$user = new User();
	$user->where(array('email'=>$email,'password'=>$password))->get();
	if($user->exists())
	{
		if($user->profile->type == "ประชาชนทั่วไป"){
			$timediff = timeDiff($user->last_login,date("Y-m-d H:i:s",now()));
			$webboard_status_config = new Webboard_status_config(1);
			if($timediff > $webboard_status_config->memlock){
				$user->m_status = "ban";
				$user->last_login = $user->last_login;
			}else{
				$user->m_status = "active";
				$user->last_login = date("Y-m-d H:i:s",now());
			}
		}
		$user->save();
		if($user->m_status == "ban"){
			return FALSE;
		}
		$_SESSION['id'] = $user->id; // $CI->session->set_userdata('id',$user->id);
		$_SESSION['level'] = $user->level_id; // $CI->session->set_userdata('level',$user->level_id);
		//$log = fopen("log.txt", "a");
		//fwrite($log, ' '.$user->last_login.' - '.$user->email.' เข้าสู่ระบบ'.'\r\n');
		//fclose($log);
		file_put_contents('log.txt', $user->last_login.' - '.$user->email.' เข้าสู่ระบบ' . "\n", FILE_APPEND);

		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function is_login($level_name = FALSE)
{
	$CI =& get_instance();
	$user = new User($_SESSION['id']); //$user = new User($CI->session->userdata('id'));
	if($level_name)
	{
		if($user->level->is_admin)
		{
			$id = ($user->level->is_admin == "1")? true : false ;
		}
		else
		{
			$id = false;
		}
	}
	else
	{
		$id = $user->id;
	}
	return ($id) ? true : false;
}

function login_data($field)
{
	$CI =& get_instance();
	$user = new User($_SESSION['id']); // $user = new User($CI->session->userdata('id'));
	return $user->{$field};
}

function user($id=FALSE)
{
	$CI =& get_instance();
	$id = ($id)?$id: $_SESSION['id']; //$CI->session->userdata('id');
	$user = new User($id);
	return $user;
}

function user_data($field,$id)
{
	$CI =& get_instance();
	$user = new User($id);
	return $user->{$field};
}

function logout()
{
	$CI =& get_instance();
	unset($_SESSION['id']); // 
	$CI->session->unset_userdata('id');
	unset($_SESSION['level']); // 
	$CI->session->unset_userdata('level');
}

function is_auth()
{
	$CI =& get_instance();
	$user = new User($_SESSION['id']); // $user = new User($CI->session->userdata('id'));
	$user->level->auth = json_decode($user->level->auth);
	$method = $CI->router->fetch_method();
	$class = $CI->router->fetch_class();
	if((($method=="form")||($method=="save"))&&($CI->uri->total_segments()>=5))
	{
		$method = "edit";
	}
	if((($method=="stick_thread")||($method=="unstick_thread")))
	{
		$method = "edit";
	}
	if((($method=="comment_index")||($method=="comment_view")))
	{
		$method = "index";
	}
	if($method=="comment_delete")
	{
		$method = "delete";
	}
	if($method=="document_delete")
	{
		$method = "delete";
	}
	if($method=="download")
	{
		$method = "index";
	}
	if((($method=="form")||($method=="save"))&&($CI->uri->total_segments()==4))
	{
		$method = "add";
	}
	if(preg_match('/^delete/', $method))
	{
		$method = "delete";
	}
	if(!isset($_POST['status']))
	{
		$_POST['status'] = (@$user->level->approve=="1")?"approve":"draft";
	}
	if(($method == "approve") && ($user->level->approve=="1"))
	{
		return true;
	}
	if($method == "approve2")
	{
		return true;
	}
	if((@$user->level->auth->{$class}->{$method}=="1")||($class=="profiles")||($class=="categories")||($class=="calendars")||($class=="overview")||($class=="dashboards")||($class=="logs"))
	{
		return true;
	}
	else
	{
		return false;
	}
}
	
function is_publish($class)
{
	$CI =& get_instance();
	$user = new User($_SESSION['id']); // $user = new User($CI->session->userdata('id'));
	$user->level->auth = json_decode($user->level->auth);
	$method = "index";
	return (@$user->level->auth->{$class}->{$method}=="1")?TRUE:FALSE;
}

function is_authen($class,$method = "index")
{
	$CI =& get_instance();
	$user = new User($_SESSION['id']); // $user = new User($CI->session->userdata('id'));
	$user->level->auth = json_decode($user->level->auth);
	return (@$user->level->auth->{$class}->{$method}=="1")?TRUE:FALSE;
}

function auth_filter($orm)
{
	$CI =& get_instance();
	$user = new User($_SESSION['id']); // $user = new User($CI->session->userdata('id'));
	if($user->level->view == 1)
	{
		return $orm;
	}
	elseif($user->level->view == 2)
	{
		return $orm->where_related('user','group_id',$user->group_id);
	}
	elseif($user->level->view == 3)
	{
		return $orm->where("user_id = $user->id OR approve_id = $user->id");
	}
}

function is_superadmin($orm)
{
	$CI =& get_instance();
	$user = new User($_SESSION['id']); // $user = new User($CI->session->userdata('id'));
	if($user->level->view == 1)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}


function is_owner($id)
{
	$CI =& get_instance();
	if($id == $_SESSION['id']) //if($id == $CI->session->userdata('id'))
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function is_approver($id = FALSE)
{
	$CI =& get_instance();
	if(!$id)$id = $_SESSION['id']; // $CI->session->userdata('id');
	$user = new User($id);
	if($user->level->approve == "1")
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function group_dropdown($orm)
{
	 if(user()->level->view == 1)
	 {
		return '<tr><th>กลุ่มงาน :</th><td>'.form_dropdown('group_id',get_option('id','name','groups','','th'),($orm->group_id)?$orm->group_id:user()->group_id,'','กรุณาเลือกกลุ่มงาน').'</td></tr>';
	 }
	 else
	 {
		return ($orm->group_id)?'<tr><th>กลุ่มงาน :</th><td>'.lang_decode($orm->group->name,'th').form_hidden('group_id',$orm->group_id).'</td></tr>':'<tr><th>กลุ่มงาน :</th><td>'.lang_decode(user()->group->name,'th').form_hidden('group_id',user()->group_id).'</td></tr>';
	 }
}

function approver_dropdown($orm)
{
	 if(!is_approver())
	 {
	 	$CI =& get_instance();
		$user = new User($_SESSION['id']); // $user = new User($CI->session->userdata('id'));
		$users = new User();
		$query = "SELECT users.id,concat(profiles.first_name,' ',profiles.last_name) name
						FROM users left join profiles on
						profiles.user_id = users.id
						left join levels on
						levels.id = users.level_id
						where levels.approve = 1
						and users.group_id = ".$user->group_id."
						ORDER BY users.id asc";
		return '<tr><th>ผู้อนุมัติ :</th><td>'.form_dropdown('approve_id',$users->query($query)->all_to_assoc('id','name'),$orm->approve_id,'','ทุกคน').'</td></tr>';

	 }
}

function approver_form($orm)
{
	$group = group_dropdown($orm);
	$CI =& get_instance();
	if($orm->approve_id==$_SESSION['id']) // if($orm->approve_id==$CI->session->userdata('id'))
	{
		return $group.'<tr><th>สถานะ :</th><td>'.form_dropdown('status',array('approve'=>'Approve','draft'=>'Draft'),$orm->status).'</td></tr><tr><th>ความคิดเห็น :</th><td><textarea name="comment">'.$orm->comment.'</textarea></td></tr>';
	}
	elseif(is_approver($_SESSION['id'])) // elseif(is_approver($CI->session->userdata('id')))
	{
		return $group.'<tr><th>สถานะ :</th><td>'.form_dropdown('status',array('approve'=>'Approve','draft'=>'Draft'),$orm->status).'</td></tr><tr><th>ความคิดเห็น :</th><td><textarea name="comment">'.$orm->comment.'</textarea><input type="hidden" name="approve_id" value="'.$_SESSION['id'].'" /></td></tr>';
	}
	else
	{
		return $group;
	}
}

function approve_comment($orm)
{
	if($orm->approve_id)
	{
		$user = new User($orm->approve_id);
		$fullname = $user->profile->first_name.' '.$user->profile->last_name;
		$fullname = ($user->profile->first_name)?$fullname:$user->display;

		$comment = ($orm->comment)?'<div class="comment">ความคิดเห็น : '.$orm->comment.'</div>':'';
		if($orm->status=="draft")
		{
			return '<div class="caution error"><div class="box">'.$fullname.'<br />'.mysql_to_th($orm->approve_date,'S',TRUE).' '.$comment.'</div></div>';
		}
		elseif($orm->status=="approve")
		{
			return '<div class="caution success"><div class="box">'.$fullname.'<br />'.mysql_to_th($orm->approve_date,'S',TRUE).' '.$comment.'</div></div>';
		}
	}
}

function auth_access($category_type,$category_id){
     $sent_to_home = FALSE;
     switch($category_type){
         case 'informations':
             $array = array(210,282,327);
             if(in_array($category_id,$array))
                 if(!is_login())$sent_to_home = TRUE;             
         break;
         case 'pages':
             $array = array(58,63);
             if(in_array($category_id,$array))
                 if(!is_login())$sent_to_home = TRUE;
         break;
         default:
             break;
     }
     
     if($sent_to_home == TRUE){set_notify('error', 'กรุณาล้อกอินก่อนเข้าใช้งาน');redirect('home/index');}
         
}
?>