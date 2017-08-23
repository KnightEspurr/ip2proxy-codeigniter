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
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
	}

	public function getCountryShort($ip=NULL) {
		return self::$ip2proxy->getCountryShort(self::getIP($ip));
	}

	public function getCountryLong($ip=NULL) {
		return self::$ip2proxy->getCountryLong(self::getIP($ip));
	}

	public function getRegion($ip=NULL) {
		return self::$ip2proxy->getRegion(self::getIP($ip));
	}

	public function getCity($ip=NULL) {
		return self::$ip2proxy->getCity(self::getIP($ip));
	}

	public function getISP($ip=NULL) {
		return self::$ip2proxy->getISP(self::getIP($ip));
	}

	public function getProxyType($ip=NULL) {
		return self::$ip2proxy->getProxyType(self::getIP($ip));
	}

	public function isProxy($ip=NULL) {
		return self::$ip2proxy->isProxy(self::getIP($ip));
	}

	protected function getIP($ip=NULL) {
		return ($ip) ? $ip : $_SERVER['REMOTE_ADDR'];
	}
}
?>
