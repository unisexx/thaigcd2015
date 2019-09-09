<?php
class Docs extends Question_Controller
{

	function __construct()
	{
		if (!is_publish('questionaire')) {
				//set_notify('error','คุณไม่มีสิทธิเข้าใช้งานในส่วนนี้ค่ะ');
			redirect('docs/publics');
		}
		parent::__construct();
	}

	function index()
	{
		$data['topics'] = new Topic();
		if (@$_GET['search']) $data['topics']->like('title', '%' . $_GET['search'] . '%');
		if ((isset($_GET['status'])) && ($_GET['status'] <> '')) $data['topics']->where('status', $_GET['status']);
		if (@$_GET['group_id']) $data['topics']->where_related('user', 'group_id', $_GET['group_id']);
		if (@$_GET['start']) $data['topics']->where('DATE(question_topics.created) >= DATE(\'' . Date2DB($_GET['start']) . '\')');
		if (@$_GET['end']) $data['topics']->where('DATE(question_topics.created) <= DATE(\'' . Date2DB($_GET['end']) . '\')');
		auth_filter($data['topics'])->order_by('id', 'desc')->get_page();
		$this->template->build('index', $data);
	}

	function form($id = null)
	{
		$data['topic'] = new Topic($id);
		$this->template->build('form', $data);
	}

	function save($id = null)
	{
		/*echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		exit();*/
		$topic = new Topic($id);
		$topic->title = $_POST['title'];
		$topic->detail = $_POST['detail'];
		$topic->status = $_POST['status'];
		if (!$id) $topic->user_id = $this->session->userdata('id');
		$topic->save();
		foreach ($_POST['question_id'] as $key => $value) {
			if (@$_POST['question'][$key]) {
				$question = new Questionaire($value);
				$question->question = $_POST['question'][$key];
				$question->type = $_POST['type'][$key];
				if (@$_POST['min'][$key]) $question->min = $_POST['min'][$key];
				if (@$_POST['max'][$key]) $question->max = $_POST['max'][$key];
				if (@$_POST['range'][$key]) $question->range = $_POST['range'][$key];
				if (@$_POST['other'][$key]) $question->other = $_POST['other'][$key];
				if (@$_POST['optional'][$key]) $question->optional = json_encode($_POST['optional'][$key]);
				$question->topic_id = $topic->id;
				$question->sequence = $key;
				$question->save();
			}
			if (@$_POST['choice'][$key]) {
				foreach ($_POST['choice'][$key] as $index => $data) {
					if ($data) {
						$choice = new Choice(@$_POST['choice_id'][$key][$index]);
						$choice->name = $data;
						$choice->questionaire_id = $question->id;
						$choice->save();
					}
				}
			}
		}
		set_notify('success', 'บันทึกข้อมูลเรียบร้อยแล้วค่ะ');
		redirect('docs/index');
	}

	function questionaire($id)
	{
		$data['topic'] = new Topic($id);
		$this->template->build('questionaire', $data);
	}

	function questionaire_save()
	{
		/*echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		exit();*/
		foreach ($_POST['question_id'] as $key => $value) {
			if (($_POST['type'][$key] == "text") || ($_POST['type'][$key] == "textarea") || ($_POST['type'][$key] == "radio") || ($_POST['type'][$key] == "scale")) {
				if (@$_POST['answer'][$value]) {
					$answer = new Answer;
					if (is_login()) {
						$answer->where('user_id', $this->session->userdata('id'));
						$answer->where('questionaire_id', $value)->get();
						$answer->user_id = $this->session->userdata('id');
					}
					$answer->questionaire_id = $value;
					$answer->answer = $_POST['answer'][$value];
					$answer->save();
				}
			} elseif ($_POST['type'][$key] == "radio") {
				if (@$_POST['answer'][$value]) {
					$answer = new Answer;
					if (is_login()) {
						$answer->where('user_id', $this->session->userdata('id'));
						$answer->where('questionaire_id', $value)->get();
						$answer->user_id = $this->session->userdata('id');
					}
					$answer->questionaire_id = $value;
					$answer->choice_id = $_POST['answer'][$value];
					$answer->save();
				}
			} elseif ($_POST['type'][$key] == "checkbox") {
				if (@$_POST['answer'][$value]) {
					$answer = new Answer;
					$answer->where('user_id', $this->session->userdata('id'));
					$answer->where('questionaire_id', $value)->get()->delete_all();
					foreach ($_POST['answer'][$value] as $key => $ans) {
						if (is_login()) {
							$answer = new Answer;
							$answer->user_id = $this->session->userdata('id');
						}
						$answer->questionaire_id = $value;
						$answer->choice_id = $ans;
						$answer->save();
					}
				}
			} elseif ($_POST['type'][$key] == "grid") {
				if (@$_POST['answer'][$value]) {
					foreach ($_POST['answer'][$value] as $key => $ans) {
						$answer = new Answer;
						if (is_login()) {
							$answer->where('user_id', $this->session->userdata('id'));
							$answer->where('choice_id', $key);
							$answer->where('questionaire_id', $value)->get();
							$answer->user_id = $this->session->userdata('id');
						}
						$answer->questionaire_id = $value;
						$answer->choice_id = $key;
						$answer->answer = $ans;
						$answer->save();
					}
				}
			}

		}
	}

	function status()
	{
		$topic = new Topic($_POST['id']);
		$topic->status = $_POST['status'];
		$topic->save();
	}

	function report($id)
	{
		$data['topic'] = new Topic($id);
		$this->template->build('report', $data);
	}

	function delete($id)
	{
		$topic = new Topic($id);
		$question = new Questionaire();
		$answer = new Answer;
		$answer->where_related('questionaire', 'topic_id', $id)->get()->delete_all();
		$choice = new Choice;
		$choice->where_related('questionaire', 'topic_id', $id)->get()->delete_all();
		$question->where('topic_id', $id)->get()->delete_all();
		$topic->delete();
		set_notify('success', 'ลบข้อมูลเรียบร้อยแล้วค่ะ');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function delete_question()
	{
		$question = new Questionaire($_POST['id']);
		$question->answer->delete_all();
		$question->choice->delete_all();
		$question->delete();
	}

	function delete_choice($id)
	{
		$choice = new Choice($id);
		$choice->answer->delete();
		$choice->delete();
	}

	function other($id)
	{

		$data['answers'] = new Answer;
		$data['answers']->where('questionaire_id', $id)
			->where('choice_id', 0)
			->get();
		$this->load->view('other', $data);
	}
	//311059
	function list_report($id)
	{
		$data['topic'] = new Topic($id);
		$this->template->build('list_report', $data);
	}
		//311059
	function xls($id)
	{
		$data['topic'] = new Topic($id);
		$this->load->view('xls', $data);
	}
		//311059
	function printpage($id)
	{
		$data['topic'] = new Topic($id);
		$this->load->view('printpage', $data);
	}

	//05012017 Auchz
	function answer_list($topic_id)
	{
		$data['topic_id'] = $topic_id;
		$data['topic'] = new Topic($topic_id);
		$data['answer_list'] = new Answer();
		$data['answer_list']->select('user_id,session,answer_date,ipaddress')->distinct()->where_related('questionaire', 'topic_id', $topic_id);
		if (@$_GET['start']) $data['answer_list']->where('DATE(answer_date) >= DATE(\'' . Date2DB($_GET['start']) . '\')');
		if (@$_GET['end']) $data['answer_list']->where('DATE(answer_date) <= DATE(\'' . Date2DB($_GET['end']) . '\')');
		$data['answer_list']->order_by('id', 'desc')->get_page();
		$this->template->append_metadata(js_datepicker());
		$this->template->build('answer_list', $data);
	}

	//05012017 Auchz
	function print_answer($topic_id)
	{
		$data['topic_id'] = $topic_id;
		$data['session'] = $_GET['session'];
		$data['user_id'] = $_GET['user_id'];
		$data['topic'] = new Topic($topic_id);
		$condition = '';
		$condition .= $_GET['session'] != '' ? " and qa.session ='" . $_GET['session'] . "'" : '';
		$condition .= $_GET['user_id'] != '' ? " and qa.user_id =" . $_GET['user_id'] : '';
		$sql = " SELECT
				qa.id,
				session,
				qa.user_id,
				topic_id,
				answer_date,
				ipaddress
			FROM
				question_answers qa
			left join question_choices qc on qa.choice_id = qc.id
			left join question_titles qt on qa.questionaire_id = qt.id
			where topic_id = " . $topic_id . " " . $condition . "
			group by session, user_id, topic_id
			order by qa.id asc ";
		$answer_list = $this->db->query($sql);

		// echo $sql;
		$data['answer_list'] = $answer_list->result();

		if (@$_GET['export_type'] == 'excel') {
			$filename = $data['session'] . ".xls";
			header("Content-Disposition: attachment; filename=" . $filename);
		}

		$this->load->view('answer_detail', $data);
	}
	function print_answer_all($topic_id)
	{
		$data['topic_id'] = $topic_id;
		$data['topic'] = new Topic($topic_id);
		$data['all_answer_list'] = new Answer();
		$data['all_answer_list']->select('user_id,session,answer_date,ipaddress')->distinct()->where_related('questionaire', 'topic_id', $topic_id);
		if (@$_GET['start']) $data['answer_list']->where('DATE(answer_date) >= DATE(\'' . Date2DB($_GET['start']) . '\')');
		if (@$_GET['end']) $data['answer_list']->where('DATE(answer_date) <= DATE(\'' . Date2DB($_GET['end']) . '\')');
		$data['all_answer_list']->order_by('id', 'desc')->get();

		if (@$_GET['export_type'] == 'excel') {
			$filename = "answer_all.xls";
			header("Content-Disposition: attachment; filename=" . $filename);
		}

		$this->load->view('answer_detail_all', $data);
	}
}
?>
