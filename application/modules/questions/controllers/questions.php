<?php
class Questions extends Meeting_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['questions'] = new Question;
		if(@$_GET['search'])$data['questions']->like_related_meeting('name','%'.$_GET['search'].'%');
		$data['questions']->where('user_id',$this->session->userdata('id'));
		$data['questions']->or_where('(r_id ='.$this->session->userdata('id')." and (r_status is null or r_status = ''))");
		$data['questions']->get_page(10);
		$this->template->build('index',$data);
	}
	
	function form($meeting_id,$id = NULL)
	{
		$data['question'] = new Question($id);
		if(!$id)
		{
			$data['question']->where('meeting_id',$meeting_id);
			$data['question']->where('user_id',$this->session->userdata('id'));
			$data['question']->get();
		}
		$data['meeting'] = new Meeting($meeting_id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('form',$data);
	}
	
	function view($id)
	{
		
		$data['question'] = new Question($id);
		$data['meeting'] = new Meeting($data['question']->meeting_id);
		$data['room_type'] = array(1=>'ห้องพักเดี่ยวระดับ 9 และระดับ 8 ผู้อำนวยการเท่านั้น',
		2=>'ต้องการพักห้องเดี่ยว กรณีไม่มีสิทธิพักเดี่ยวต้องเสียส่วนเกินเอง คืนละ '.$data['meeting']->money.' บาท',
		3=>'ต้องการพักห้องคู่ โดย พักคู่กับ  '.$data['question']->r->profile->first_name.' '.$data['question']->r->profile->last_name,
		4=>'ต้องการพักห้องคู่ กรณีมีผู้ติดตาม '.$question->roommate,
		5=>'ให้คณะผู้ดำเนินการจัดให้'
		);
		$data['meal_type'] = array(1=>'ตามที่คณะคำเนินการจัดให้',
		2=>'อิสลาม',
		3=>'มังสะวิรัต'
		);

		
		$this->template->append_metadata(js_datepicker());
		$this->template->build('view',$data);
	}
	
	function save($meeting_id,$id=NULL)
	{
		if($_POST)
		{
			$question = new Question($id);
			if(!$id)$question->user_id = $this->session->userdata('id');
			$question->meeting_id = $meeting_id;
			$question->overnight = $_POST['overnight'];
			if($_POST['overnight']==1)
			{
				$question->check_in = Date2DB($_POST['check_in']);
				$question->check_out = Date2DB($_POST['check_out']);
				$question->room_type = $_POST['room_type'];
				if($_POST['room_type']==3)
				{
					$question->r_id = $_POST['roommate_id'];
					$question->roommate = '';
					$question->relation = '';
				}
				elseif($_POST['room_type']==4)
				{
					$question->r_id = '';
					$question->roommate = $_POST['roommate'];
					$question->relation = $_POST['relation'];
				}
				else
				{
					$question->r_id ='';
					$question->roommate = '';
					$question->relation = '';
				}
			}
			$question->meal_type = $_POST['meal_type'];
			$question->save();
			if(!$id)
			{
				$question->no = date('Ymd').substr('000'.$question->id,-3);
				$question->save();
			}
			set_notify('success', lang('save_data_complete'));
		}
		redirect('questions');
	}
	
	function delete($id=NULL)
	{
		if($id)
		{
			$question = new Question($id);
			$question->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('questions');
	}
	
	function cancel($id)
	{
		$question = new Question($id);
		$question->room_type = 5;
		$question->r_id ='';
		$question->roommate = '';
		$question->relation = '';
		$question->r_status = '';
		$question->save();
		redirect('questions');
	}
	
	function confirm($id)
	{
		$question = new Question($id);
		$question->r_status = 'confirm';
		$question->save();
		$question2 = new Question();
		$question2->from_array($question->to_array());
		$question2->r_id = $question->user_id;
		$question2->user_id = $question->r_id;
		$question2->id = '';
		$question2->save();
		redirect('questions');
	}
	
	

}
?>