<?php
(defined('BASEPATH') || defined('SYSPATH')) or die('No direct access allowed.');

if(!defined('IP2PROXY_DATABASE')) {
	define('IP2PROXY_DATABASE', dirname(__FILE__) . '/ip2proxy/IP2PROXY-DB.BIN');
}

require_once('ip2proxy/IP2Proxy.php');

class IP2Proxy_lib {
	private $database;

	protected static $ip2proxy;

	public function __construct() {
		self::$ip2proxy = new \ip2proxy\Database(ip2proxy_DATABASE, \ip2proxy\Database::FILE_IO);
	}

	public function getCountryShort($ip=NULL) {
		return self::$ip2proxy->lookup(self::getIP($ip), \ip2proxy\Database::COUNTRY_CODE);
	}

	public function getCountryLong($ip=NULL) {
		return self::$ip2proxy->lookup(self::getIP($ip), \ip2proxy\Database::COUNTRY_NAME);
	}

	public function getRegion($ip=NULL) {
		return self::$ip2proxy->lookup(self::getIP($ip), \ip2proxy\Database::REGION_NAME);
	}

	public function getCity($ip=NULL) {
		return self::$ip2proxy->lookup(self::getIP($ip), \ip2proxy\Database::CITY_NAME);
	}

	public function getISP($ip=NULL) {
		return self::$ip2proxy->lookup(self::getIP($ip), \ip2proxy\Database::ISP);
	}

	public function getProxyType($ip=NULL) {
		return self::$ip2proxy->lookup(self::getIP($ip), \ip2proxy\Database::PROXY_TYPE);
	}

	public function isProxy($ip=NULL) {
		return self::$ip2proxy->lookup(self::getIP($ip), \ip2proxy\Database::IS_PROXY);
	}

	protected function getIP($ip=NULL) {
		return ($ip) ? $ip : $_SERVER['REMOTE_ADDR'];
	}
}
?>
