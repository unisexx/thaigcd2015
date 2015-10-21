<?php
class Dashboards extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ga');
	}
	
	function index()
	{

		$this->ga->authen('ampzimeow@gmail.com','sikarinth13','ga:39373964');
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
		$this->template->build("index",$data);
	}
	
	
	
}
?>