<?php
class Blogs extends Public_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->template->set_layout('layout_blog');
	}
	
	function index($id=FALSE,$entry=FALSE)
	{
		if($id)
		{
			$data['blog'] = new blog($id);
			$data['next'] = new blog($id);
			$data['prev'] = new blog($id);
			$data['archives'] = new blog($id);
			$data['archives']->blogpost->select_func('count',array('@id'),'result');
			$data['archives']->blogpost->select_func('month',array('@created'),'month');
			$data['archives']->blogpost->select_func('year',array('@created'),'year');
			$data['archives']->blogpost->group_by('month(created),year(created)');
			$data['archives']->blogpost->order_by('year(created) asc,month(created) asc');
			$data['archives']->blogpost->get();
			if($entry)
			{
				$data['blog']->blogpost->get_by_id($entry);
			}
			else
			{
				$data['blog']->blogpost->select_max('id')->get();
				$id = $data['blog']->blogpost->id;
				$data['blog']->blogpost->get_by_id($id);
				if(!$data['blog']->blogpost->exists())
				{
					redirect('blogs/post');
				}
			}
			$data['blog']->blogpost->counter();
			$data['next']->blogpost->where('id > '.$data['blog']->blogpost->id)->order_by('id asc')->limit(1)->get();
			$data['prev']->blogpost->where('id < '.$data['blog']->blogpost->id)->order_by('id desc')->limit(1)->get();
			$this->template->build("blog_index_id",$data);
		}
		else
		{
			$data['blogs'] = new blog();
			$data['blogs']->order_by('id','desc')->limit(20)->get();
			$data['blogposts'] = new blogpost();
			$data['blogposts']->order_by('id','desc')->limit(20)->get();
			$this->template->set_layout('layout');
			$this->template->build('blog_index',$data);
		}
	}
	
	function inc_home()
	{
		$data['blogs'] = new blog();
		$data['blogs']->order_by('id','desc')->limit(7)->get();
		$data['blogposts'] = new blogpost();
		$data['blogposts']->order_by('id','desc')->limit(7)->get();
		$this->template->set_layout('layout');
		$this->load->view('inc_blog',$data);
	}
	
	function newblog()
	{
		$data['blogs'] = new blog();
		if(isset($_GET['search'])) $data['blogs']->where('title like','%'.$_GET['search'].'%');
		$data['blogs']->order_by('id','desc')->get_page();
		$this->template->set_layout('layout');
		$this->template->build('blog_newblog',$data);
	}
	
	function newentry()
	{
		$data['blogposts'] = new blogpost();
		if(isset($_GET['search'])) $data['blogposts']->where('title like','%'.$_GET['search'].'%');
		$data['blogposts']->order_by('id','desc')->get_page();
		$this->template->set_layout('layout');
		$this->template->build('blog_newentry',$data);
	}
	
	function post($id = FALSE)
	{
		if(!is_publish('blogs'))
		{
			set_notify('error','คุณไม่มีสิทธิเข้าใช้งานในส่วนนี้ค่ะ');
			redirect('home');
			exit();
		}
		if(is_login())
		{
			$data['blog'] = new blog();
			$data['blog']->where_related_user('id',$this->session->userdata('id'))->get();
			$data['blogpost'] = new blogpost($id);
			if($id&&($data['blog']->id<>$data['blogpost']->blog->id))
			{
				set_notify('success', 'คุณไม่สามารถเข้ามาใช้งานในส่วนนี้ได้ค่ะ');
				redirect('home');
			}
			if($_POST)
			{
				$data['blog']->where_related_user('id',$this->session->userdata('id'));
				$_POST['blog_id'] = $data['blog']->id;
				$_POST['start_date'] = Date2DB($_POST['start_date']);
				$data['blogpost']->from_array($_POST);
				$data['blogpost']->save();
				set_notify('success', 'บันทึกข้อมูลเรียบร้อยค่ะ');
				redirect('blogs/'.$data['blog']->id.'/'.$data['blogpost']->id);
			}
			$this->template->build("post",$data);
		}
		else
		{
			set_notify('error','กรุณาล็อคอินก่อนเข้าใช้งานในส่วนนี้ค่ะ');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	function post_index()
	{
		if(is_login())
		{
			$data['blog'] = new blog();
			$data['blog']->where_related_user('id',$this->session->userdata('id'))->get();
			$this->template->build('post_index',$data);
		}
		else
		{
			set_notify('error','กรุณาล็อคอินก่อนเข้าใช้งานในส่วนนี้ค่ะ');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	function setting()
	{
		if(!is_publish('blogs'))
		{
			set_notify('error','คุณไม่มีสิทธิเข้าใช้งานในส่วนนี้ค่ะ');
			redirect('home');
			exit();
		}
		if(is_login())
		{
			$data['blog'] = new blog();
			$data['blog']->where('user_id',$this->session->userdata('id'))->get();
			if($_POST)
			{
				if($_FILES['header']['name'])
				{
					if($data['blog']->id)$data['blog']->delete_file('uploads/users/blog/'.$this->session->userdata('id').'/','header');
					$_POST['header'] = $data['blog']->upload($_FILES['header'],'uploads/users/blog/'.$this->session->userdata('id').'/',646,100,'y');
				}
				$_POST['user_id'] = $this->session->userdata('id');
				$data['blog']->from_array($_POST);
				$data['blog']->save();
				//echo $data['blog']->check_last_query();
				set_notify('success', 'บันทึกข้อมูลเรียบร้อยค่ะ');
				redirect('blogs/setting');
			}
			$this->template->build("setting",$data);
		}
		else
		{
			set_notify('error','กรุณาล็อคอินก่อนเข้าใช้งานในส่วนนี้ค่ะ');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	function archive($id,$month,$year)
	{
		$data['month'] = $month;
		$data['year'] = $year;
		$data['blog'] = new blog($id);
		$data['blog']->blogpost->where("month(start_date) = $month and year(start_date) = $year and start_date <= date(sysdate())")->order_by('id asc')->get();
		$this->template->build("archive",$data);
	}
	
	function comment($id)
	{
		$captcha = $this->session->userdata('captcha');
		if(($_POST['captcha'] == $captcha) && !empty($captcha)){
			if($this->session->userdata('id'))
			{
				$_POST['user_id'] = $this->session->userdata('id');
			}
			$_POST['blogpost_id'] = $id;
			$comment = new blogcomment();
			$comment->from_array($_POST);
			$comment->save();
			set_notify('success','บันทึกข้อมูลเรียบร้อยค่ะ');
			redirect($_SERVER['HTTP_REFERER'].'#comment'.$comment->id);
		}
		else
		{
			set_notify('error','กรุณากรอกตัวเลขให้ตรงกับภาพค่ะ');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	function commentdel($id)
	{
		$comment = new blogcomment($id);
		if($comment->blogpost->blog->user->id == $this->session->userdata('id'))
		{
			$comment->delete();
			set_notify('success', 'ลบความคิดเห็นเรียบร้อยแล้วค่ะ');
		}
		else
		{
			set_notify('error', 'คุณไม่มีสิทธิลบความคิดเห็นนี้');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$blogpost = new blogpost($id);
			$blog_id = $blogpost->blog->id;
			$blogpost->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อยค่ะ');
		}
		redirect('blogs/'.$blog_id);
	}
	
	function sidebar($id)
	{
		$data['blog'] = new blog($id);

		$data['archives'] = new blog($id);
		$data['archives']->blogpost->select_func('count',array('@id'),'result');
		$data['archives']->blogpost->select_func('month',array('@start_date'),'month');
		$data['archives']->blogpost->select_func('year',array('@start_date'),'year');
		$data['archives']->blogpost->group_by('month(start_date),year(start_date)');
		$data['archives']->blogpost->order_by('year(start_date) asc,month(start_date) asc');
		$data['archives']->blogpost->where("start_date <= date(sysdate())")->get();
		$this->load->view("sidebar",$data);
	}
	
	function favourite($blog_id)
	{
		$favourite = new Blogfavourite();
		$favourite->where('user_id',$this->session->userdata('id'));
		$favourite->where('blog_id',$blog_id);
		$favourite->get();
		if(!$favourite->exists())
		{
			$favourite->user_id = $this->session->userdata('id');
			$favourite->blog_id = $blog_id;
			$favourite->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อยค่ะ');
		}
		else
		{
			set_notify('error', 'มีข้อมูลนี้ในระบบแล้วค่ะ');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function alert($id)
	{
		if($_POST)
		{
			$comment = new blogcomment_alert();
			$comment->from_array($_POST);
			$comment->save();
			set_notify('success', 'แจ้งลบความเห็นเรียบร้อย');
			echo '<script type="text/javascript">
					parent.location = unescape(parent.location.pathname);
					</script>
			';
		}
		else
		{
			$data['id'] =  $id;
			$this->template->set_layout('blank');
			$this->template->build('alert',$data);
		}
	}
	
	function tag($tag)
	{
		$data['blogposts'] = new blogpost();
		if(@$_GET['search'])$tag = $_GET['search'];
		$data['tag'] = $tag;
		$data['blogposts']->where('tag like','%'.$tag.'%');
		$data['blogposts']->order_by('id','desc')->get_page();
		$this->template->set_layout('layout');
		$this->template->build('blogtag',$data);
	}
}
?>