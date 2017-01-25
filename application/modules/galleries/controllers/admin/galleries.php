<?php

class Galleries extends Admin_Controller{
	
	function __construct(){
		parent::__construct();	
	}
	
	function index($id=FALSE)
	{
		$data['categories'] = new Category($id);
		$galleries = new Gallery();
		if(@$_POST['category_id'])$id=$_POST['category_id'];
		$data['galleries'] = $galleries->where('category_id',$id)->order_by('id','desc')->get_page(limit());
		$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/gallery_index',$data);
	}
	
	function form($cat_id,$id=FALSE)
	{
		$data['categories'] = new Category($cat_id);
		$data['galleries'] = new Gallery($id);
		
		$data['rs_img'] = new Gallery();
		$data['rs_img']->where('category_id = "'.$cat_id.'"')->order_by('id','desc')->get();
		
		$this->template->build('admin/gallery_form',$data);
	}
	
	function save($cat_id,$id=FALSE)
	{
		if($_POST)
		{
			
			if($id!=""){
				
				$gallery = new Gallery($id);
				if($_FILES['image']['name'])
				{
					if($gallery->id){
						$gallery->delete_file($gallery->id,'uploads/galleries/','image');
					}
					$_POST['image'] = $gallery->upload($_FILES['image'],'uploads/galleries/');
					$gallery->thumb('uploads/galleries/thumbs/',170,120);
				}
				$_POST['user_id'] = $this->session->userdata('id');
				$gallery->from_array($_POST);
				$gallery->save();
			
			}else{
			
			
						//+================+
				$cdate=date('Y-m-d H:i:s');
				
			
				for($i=1;$i<=$_POST["hdnLine"];$i++)
				{	
					
					if($_FILES['image'.$i]['name'] != "")
					{
						$filename = $_FILES['image'.$i]['name'];
						$slug="image";
						
						

						
						$tmp_name = $_FILES['image'.$i]["tmp_name"];
						$name = $_FILES['image'.$i]["name"];
						move_uploaded_file($tmp_name, "uploads/galleries/".$name);
						
						$titles = $_POST['title'.$i];
						if($titles==""){$titles=$name;}
						
		
						$str_sql = "INSERT INTO `c11thaigcd_th`.`galleries` (`id`, `category_id`, `slug`, `title`, `image`, `counter`, `created`, `updated`, `user_id`) VALUES (NULL, '".$cat_id."', '".$slug."', '".$titles."', '".$name."', '0', '".$cdate."', '".$cdate."', '".$this->session->userdata('id')."')";
											
						$query = $this->db->query($str_sql);			
					}
				}
			//=========================*******	
			
			}//endif
			
						//savelogs
/*			$remote=getenv("REMOTE_ADDR");
			$refer=@$_SERVER['HTTP_REFERER'];
			$d=date('Y-m-d H:i:s');
			
			
			$userslogin='G';
			$user = new User($this->session->userdata('id'));
			$userslogin=$user->display;
			
			$event='add';
			if($id)$event='edit';
			
			$ulog = new Userslog();
			$ulog->ip = $remote;
			$ulog->refer = $refer;
			$ulog->usersname = $userslogin;
			$ulog->updated = $d;
			$ulog->events = $event;
			$ulog->pages = 'galleries';
			
			
			$userslogin_id='0';
			$userslogin_id=$this->session->userdata('id');
			$ulog->users_id = $userslogin_id;
			
			$userslogin_name='G';
			$userslogin_name=$user->username;
			$ulog->username = $userslogin_name;
			
			$ulog->save();*/
			
			
			set_notify('success', lang('save_data_complete'));
			redirect('galleries/admin/galleries/index/'.$cat_id);
		}
		
	}
	function delete_imageupload($id=false)
	{
		if($id)
		{
			$rs = new Gallery($id);
			$rs->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}	
	function delete($cat_id,$id=FALSE)
	{
		if($id)
		{
			$gallery = new Gallery($id);
			$gallery->delete_file($gallery->id,'uploads/galleries/','image');
			$gallery->delete();
			
			
											//savelogs
			$remote=getenv("REMOTE_ADDR");
			$refer=@$_SERVER['HTTP_REFERER'];
			$d=date('Y-m-d H:i:s');
			
			
			$userslogin='G';
			$user = new User($this->session->userdata('id'));
			$userslogin=$user->display;
			
			$event='delete';
			
			$ulog = new Userslog();
			$ulog->ip = $remote;
			$ulog->refer = $refer;
			$ulog->usersname = $userslogin;
			$ulog->updated = $d;
			$ulog->events = $event;
			$ulog->pages = 'galleries';
			
						$userslogin_id='0';
			$userslogin_id=$this->session->userdata('id');
			$ulog->users_id = $userslogin_id;
			
			$userslogin_name='G';
			$userslogin_name=$user->username;
			$ulog->username = $userslogin_name;
			
			
			$ulog->save();
			
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('galleries/admin/galleries/index/'.$cat_id);
	}

}

?>