<?php
/*
 * Author: iyottt@gmail.com
 * ver: 2.0.0
 *
 * ตัวอย่างการใช้งาน
 * $ga = new Analytics();
	echo '<div id="stat">
        <span id="today"></span> วันนี้ '.number_format($ga->getToday()).' คน &nbsp;
        <span id="month"></span> เดือนนี้ '.number_format($ga->getMonth()).' คน &nbsp;
        <span id="all"></span> ทั้งหมด '.number_format($ga->getTotal()).' คน
    </div>';
 *
 */

require_once APPPATH.'libraries/Analytics/src/Google/autoload.php';

class Analytics {

	protected $email = '686001543852-vojqggg9v1hchrm48hfabko938d4e8fr@developer.gserviceaccount.com';

	protected $ga = 'ga:59010489';

	public $analytic;

	public $client;

	public $token;

	protected $apiUrl = 'https://www.googleapis.com/analytics/v3/data/ga?';

	public function __construct()
	{
		$this->client = new Google_Client();
		$this->client->setApplicationName("Analytics");

		$this->analytic = new Google_Service_Analytics($this->client);
		$cred = new Google_Auth_AssertionCredentials($this->email, array(Google_Service_Analytics::ANALYTICS_READONLY), file_get_contents(__DIR__.'/Analytics/client_secrets.p12'));

		$this->client->setAssertionCredentials($cred);
		if($this->client->getAuth()->isAccessTokenExpired() && $_SERVER['HTTP_HOST'] <> 'localhost') {
		   $this->client->getAuth()->refreshTokenWithAssertion($cred);
		}

		$this->token = $this->client->getAccessToken();
	}

	public function getToken()
	{
		$token = json_decode($this->token);
		return $token->access_token;
	}

	public function query($option)
	{
		$params = array(
			'ids' => $this->ga,
			'access_token' => $this->getToken()
		);
		$query = array_merge($option, $params);
		return $this->apiUrl.http_build_query($query);
	}

	public function getToday($metrics = 'ga:sessions')
	{
		$option = array(
			'start-date' => 'today',
			'end-date' => 'today',
			'metrics' => $metrics
		);
		return $this->query($option);
	}

	public function getMonth($metrics = 'ga:sessions')
	{
		$option = array(
			'start-date' => date('Y-m-01'),
			'end-date' => date('Y-m-t'),
			'metrics' => $metrics
		);
		return $this->query($option);
	}

	public function getTotal($metrics = 'ga:sessions')
	{
		$option = array(
			'start-date' => '2005-01-01',
			'end-date' => 'today',
			'metrics' => $metrics
		);
		return $this->query($option);
	}

	public function getResult($name, $startDate, $endDate = 'today')
	{
		$result = $this->analytic->data_ga->get($this->ga, $startDate, $endDate, 'ga:'.$name);
		return $result->totalsForAllResults['ga:'.$name];
	}

	public function getResultDate($name, $startDate, $endDate = 'today', $ga_type = "date", $ga_max = null, $ga_sort = null)
	{
		$optParams = array('dimensions' => 'ga:'.$ga_type);
		if ($ga_max) {
			$optParams['max-results'] = $ga_max;
		}
		if ($ga_sort) {
			$optParams['sort'] = $ga_sort;
		}

		$result = $this->analytic->data_ga->get($this->ga, $startDate, $endDate, 'ga:'.$name, $optParams);
		return $result->getrows();
	}

}
