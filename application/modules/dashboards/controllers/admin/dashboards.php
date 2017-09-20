<?php
class Dashboards extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('analytics');
	}

	public function index()
	{
		$start = empty($_GET['start']) ? date('Y-m-d', strtotime('-30 days')) : Date2DB($_GET['start']);
		$end = empty($_GET['end']) ? date('Y-m-d') : Date2DB($_GET['end']);

		$ga = new analytics();

		// chart
		$option = array(
			'start-date' => $start,
			'end-date' => $end,
			'metrics' => 'ga:sessions',
			'dimensions' => 'ga:date'
		);
		$data['report'] = $ga->query($option);

		// summary
		$data['today'] = $ga->getToday();
		$data['month'] = $ga->getMonth();
		$data['total'] = $ga->getTotal();
		$option = array(
			'start-date' => $start,
			'end-date' => $end,
			'metrics' => 'ga:sessions'
		);
		$data['totalSearch'] = $ga->query($option);

		// country
		$option = array(
			'start-date' => $start,
			'end-date' => $end,
			'metrics' => 'ga:users',
			'dimensions' => 'ga:country',
			'sort' => '-ga:users',
			'max-results' => 10
		);
		$data['country'] = $ga->query($option);

		// keyword
		$option = array(
			'start-date' => $start,
			'end-date' => $end,
			'metrics' => 'ga:users',
			'dimensions' => 'ga:keyword',
			'sort' => '-ga:users',
			'max-results' => 10
		);
		$data['keyword'] = $ga->query($option);

		// referrer
		$option = array(
			'start-date' => $start,
			'end-date' => $end,
			'metrics' => 'ga:users',
			'dimensions' => 'ga:fullReferrer',
			'sort' => '-ga:users',
			'max-results' => 10
		);
		$data['referrer'] = $ga->query($option);

		// page
		$option = array(
			'start-date' => $start,
			'end-date' => $end,
			'metrics' => 'ga:users',
			'dimensions' => 'ga:pagePath',
			'sort' => '-ga:users',
			'max-results' => 10
		);
		$data['page'] = $ga->query($option);

		// os
		$option = array(
			'start-date' => $start,
			'end-date' => $end,
			'metrics' => 'ga:users',
			'dimensions' => 'ga:operatingSystem',
			'sort' => '-ga:users',
			'max-results' => 10
		);
		$data['os'] = $ga->query($option);

		// browser
		$option = array(
			'start-date' => $start,
			'end-date' => $end,
			'metrics' => 'ga:users',
			'dimensions' => 'ga:browser',
			'sort' => '-ga:users',
			'max-results' => 10
		);
		$data['browser'] = $ga->query($option);

		$data['start'] = $start;
		$data['end'] = $end;
		$this->template->append_metadata(js_datepicker());
		$this->template->build("index", $data);
	}

	public function api($value='')
	{
		$ga = new analytics();

		$option = array(
			'start-date' => $start,
			'end-date' => $end,
			'metrics' => 'ga:sessions',
			'dimensions' => 'ga:country',
			'sort' => '-ga:sessions',
			'max-results' => 10
		);
		$url = $ga->query($option);
		$data = json_decode(file_get_contents($url));
		echo '<pre>';
		var_dump($data);
	}

    function indexbak()
	{
		//Addlog("read",'ดูรายการจำนวนคนเข้าเว็บไซต์');
		//$this->ga->authen('favouritedesign@gmail.com','F@vourite','ga:75710162');
		$ga = new analytics();
		if($_GET)
		{
			$now=Date2DB($_GET['date']);
		}
		else
		{
			$now=date("Y-m-d");
		}

		$lastmonth=date('Y-m-d', strtotime('-29 days',mysql_to_unix($now)));

		//Last 10 days visitors (for graph)
		//$data['visits']=$this->ga->getVisits($lastmonth,$now,30);
		$visits = $ga->getResultDate('visits', $lastmonth, $now);
		foreach ($visits as $key => $v) {
			$data['visits'][$key]['ga:date'] = $v['0'];
			$data['visits'][$key]['ga:visits'] = $v['1'];
		}


		//Summery: visitors, unique visit, pageview, time on site, new visits, bounce rates
		//$data['summery']=$this->ga->getSummery($lastmonth,$now);
		$data['summery']['ga:visits'] = $ga->getResult('visits', $lastmonth, $now);
		$data['summery']['ga:visitors'] = $ga->getResult('visitors', $lastmonth, $now);
		$data['summery']['ga:pageviews'] = $ga->getResult('pageviews', $lastmonth, $now);
		$data['summery']['ga:timeOnSite'] = $ga->getResult('timeOnSite', $lastmonth, $now);
		$data['summery']['ga:newVisits'] = $ga->getResult('newVisits', $lastmonth, $now);
		$data['summery']['ga:bounces'] = $ga->getResult('bounces', $lastmonth, $now);
		$data['summery']['ga:entrances'] = $ga->getResult('entrances', $lastmonth, $now);


		//All time summery: visitors, page views
		//$data['allTimeSummery']=$this->ga->getAllTimeSummery();
		$data['allTimeSummery']['ga:visits'] = $ga->getResult('visits', '2005-01-01', $now);
		$data['allTimeSummery']['ga:pageviews'] = $ga->getResult('pageviews', '2005-01-01', $now);

		//Top 10 visitor countries
		//$data['topCountries']=$this->ga->getTopCountry($lastmonth,$now,10);
		$topCountries = $ga->getResultDate('visits', $lastmonth, $now, 'country', '10', '-ga:visits');
		foreach ($topCountries as $key => $v) {
			$data['topCountries'][$key]['ga:country'] = $v['0'];
			$data['topCountries'][$key]['ga:visits'] = $v['1'];
		}


		//Top 10 search engine keywords
		//$data['topKeywords'] = $this->ga->getTopKeyword($lastmonth,$now,10);
		$topKeywords = $ga->getResultDate('visits', $lastmonth, $now, 'keyword', '10', '-ga:visits');
		foreach ($topKeywords as $key => $v) {
			$data['topKeywords'][$key]['ga:keyword'] = $v['0'];
			$data['topKeywords'][$key]['ga:visits'] = $v['1'];
		}

		//Top 10 referrer websites
		//$data['topReferrer']=$this->ga->getTopReferrer($lastmonth,$now,10);
		$topReferrer = $ga->getResultDate('visits', $lastmonth, $now, 'source', '10', '-ga:visits');
		foreach ($topReferrer as $key => $v) {
			$data['topReferrer'][$key]['ga:source'] = $v['0'];
			$data['topReferrer'][$key]['ga:visits'] = $v['1'];
		}

		//Top 10 page views
		//$data['topPages']=$this->ga->getTopPage($lastmonth,$now,10);
		$topPages = $ga->getResultDate('visits', $lastmonth, $now, 'pagePath', '10', '-ga:visits');
		foreach ($topPages as $key => $v) {
			$data['topPages'][$key]['ga:pagePath'] = $v['0'];
			$data['topPages'][$key]['ga:visits'] = $v['1'];
		}

		//Top 10 visitor operating systems
		//$data['topOs']=$this->ga->getTopOs($lastmonth,$now,10);
		$topOs = $ga->getResultDate('visits', $lastmonth, $now, 'operatingSystem', '10', '-ga:visits');
		foreach ($topOs as $key => $v) {
			$data['topOs'][$key]['ga:operatingSystem'] = $v['0'];
			$data['topOs'][$key]['ga:visits'] = $v['1'];
		}

		//Top 10 visitor browsers
		//$data['topBrowsers']=$this->ga->getTopBrowser($lastmonth,$now,10);
		$topBrowsers = $ga->getResultDate('visits', $lastmonth, $now, 'browser', '10', '-ga:visits');
		foreach ($topBrowsers as $key => $v) {
			$data['topBrowsers'][$key]['ga:browser'] = $v['0'];
			$data['topBrowsers'][$key]['ga:visits'] = $v['1'];
		}

		$this->template->append_metadata(js_datepicker());
		$this->template->build("index",$data);
	}

	function ajax_load()
	{
		$ga = new analytics();
		if($_GET)
		{
			$now=Date2DB($_GET['date']);
		}
		else
		{
			$now=date("Y-m-d");
		}

		$lastmonth=date('Y-m-d', strtotime('-29 days',mysql_to_unix($now)));

		//Last 10 days visitors (for graph)
		//$data['visits']=$this->ga->getVisits($lastmonth,$now,30);
		$visits = $ga->getResultDate('visits', $lastmonth, $now);
		foreach ($visits as $key => $v) {
			$data['visits'][$key]['ga:date'] = $v['0'];
			$data['visits'][$key]['ga:visits'] = $v['1'];
		}


		//Summery: visitors, unique visit, pageview, time on site, new visits, bounce rates
		//$data['summery']=$this->ga->getSummery($lastmonth,$now);
		$data['summery']['ga:visits'] = $ga->getResult('visits', $lastmonth, $now);
		$data['summery']['ga:visitors'] = $ga->getResult('visitors', $lastmonth, $now);
		$data['summery']['ga:pageviews'] = $ga->getResult('pageviews', $lastmonth, $now);
		$data['summery']['ga:timeOnSite'] = $ga->getResult('timeOnSite', $lastmonth, $now);
		$data['summery']['ga:newVisits'] = $ga->getResult('newVisits', $lastmonth, $now);
		$data['summery']['ga:bounces'] = $ga->getResult('bounces', $lastmonth, $now);
		$data['summery']['ga:entrances'] = $ga->getResult('entrances', $lastmonth, $now);


		//All time summery: visitors, page views
		//$data['allTimeSummery']=$this->ga->getAllTimeSummery();
		$data['allTimeSummery']['ga:visits'] = $ga->getResult('visits', '2005-01-01', $now);
		$data['allTimeSummery']['ga:pageviews'] = $ga->getResult('pageviews', '2005-01-01', $now);

		//Top 10 visitor countries
		//$data['topCountries']=$this->ga->getTopCountry($lastmonth,$now,10);
		$topCountries = $ga->getResultDate('visits', $lastmonth, $now, 'country', '10', '-ga:visits');
		foreach ($topCountries as $key => $v) {
			$data['topCountries'][$key]['ga:country'] = $v['0'];
			$data['topCountries'][$key]['ga:visits'] = $v['1'];
		}


		//Top 10 search engine keywords
		//$data['topKeywords'] = $this->ga->getTopKeyword($lastmonth,$now,10);
		$topKeywords = $ga->getResultDate('visits', $lastmonth, $now, 'keyword', '10', '-ga:visits');
		foreach ($topKeywords as $key => $v) {
			$data['topKeywords'][$key]['ga:keyword'] = $v['0'];
			$data['topKeywords'][$key]['ga:visits'] = $v['1'];
		}

		//Top 10 referrer websites
		//$data['topReferrer']=$this->ga->getTopReferrer($lastmonth,$now,10);
		$topReferrer = $ga->getResultDate('visits', $lastmonth, $now, 'source', '10', '-ga:visits');
		foreach ($topReferrer as $key => $v) {
			$data['topReferrer'][$key]['ga:source'] = $v['0'];
			$data['topReferrer'][$key]['ga:visits'] = $v['1'];
		}

		//Top 10 page views
		//$data['topPages']=$this->ga->getTopPage($lastmonth,$now,10);
		$topPages = $ga->getResultDate('visits', $lastmonth, $now, 'pagePath', '10', '-ga:visits');
		foreach ($topPages as $key => $v) {
			$data['topPages'][$key]['ga:pagePath'] = $v['0'];
			$data['topPages'][$key]['ga:visits'] = $v['1'];
		}

		//Top 10 visitor operating systems
		//$data['topOs']=$this->ga->getTopOs($lastmonth,$now,10);
		$topOs = $ga->getResultDate('visits', $lastmonth, $now, 'operatingSystem', '10', '-ga:visits');
		foreach ($topOs as $key => $v) {
			$data['topOs'][$key]['ga:operatingSystem'] = $v['0'];
			$data['topOs'][$key]['ga:visits'] = $v['1'];
		}

		//Top 10 visitor browsers
		//$data['topBrowsers']=$this->ga->getTopBrowser($lastmonth,$now,10);
		$topBrowsers = $ga->getResultDate('visits', $lastmonth, $now, 'browser', '10', '-ga:visits');
		foreach ($topBrowsers as $key => $v) {
			$data['topBrowsers'][$key]['ga:browser'] = $v['0'];
			$data['topBrowsers'][$key]['ga:visits'] = $v['1'];
		}
		$this->load->view("ajax_load",$data);
	}

	function ajax_load_bak()
	{

		$this->ga->authen(site()->google_user, site()->google_password,'ga:'.site()->google_analytics_id);
		$now=date("Y-m-d");
		$lastmonth=date('Y-m-d', strtotime('-30 days'));

		//Summery: visitors, unique visit, pageview, time on site, new visits, bounce rates
		$data['summery']=$this->ga->getSummery($lastmonth,$now);

		//All time summery: visitors, page views
		$data['allTimeSummery']=$this->ga->getAllTimeSummery();

		//Last 10 days visitors (for graph)
		$data['visits']=$this->ga->getVisits(date('Y-m-d', strtotime('-10 days')),$now,10);

		//Top 10 search engine keywords
		$data['topKeywords']=$this->ga->getTopKeyword($lastmonth,$now,10);

		//Top 10 visitor countries
		$data['topCountries']=$this->ga->getTopCountry($lastmonth,$now,10);

		//Top 10 page views
		$data['topPages']=$this->ga->getTopPage($lastmonth,$now,10);

		//Top 10 referrer websites
		$data['topReferrer']=$this->ga->getTopReferrer($lastmonth,$now,10);

		//Top 10 visitor browsers
		$data['topBrowsers']=$this->ga->getTopBrowser($lastmonth,$now,10);

		//Top 10 visitor operating systems
		$data['topOs']=$this->ga->getTopOs($lastmonth,$now,10);
		$this->load->view("ajax_load",$data);
	}



}
?>
