IP2Proxy CodeIgniter Library
===============================

This module enables users to retrieve below geolocation information from an IP address. It supports both the IPv4 and IPv6 address.

* Country
* Region
* City
* ISP
* Proxy Type

  
Installation
------------
Upload `controllers` and `libraries` to CondeIngniter `application` folder.

IP2Proxy BIN Database
------------------------
This module requires IP2Proxy BIN database to function. An outdated BIN database was provided in this release for your testing, but it's recommended to download the latest BIN database at the below link
* IP2Location LITE BIN Database (free): http://lite.ip2location.com
* IP2Location BIN Database (commercial version with high accuracy): http://www.ip2location.com
  
For the BIN database update, you can just rename the downloaded BIN database to *IP2PROXY-DB.BIN* and replace the copy in *application/libraries/ip2proxy/* (if you didn't change the default IP2PROXY_DATABASE constant as described in the below section).
  
Usage
-----
Use following codes in your application for get geolocation information.

    // Define IP2Proxy database path (optional). By default, the IP2PROXY_DATABASE is pointed to *application/libraries/ip2proxy/IP2PROXY-DB.BIN* if you choose not to change the original settings.
    define('IP2PROXY_DATABASE', '/path/to/ip2proxy/database');

	// Load the IP2Proxy library and perform the country code lookup
    $this->load->library('ip2proxy_lib');
    $countryCode = $this->ip2proxy_lib->getCountryCode('8.8.8.8');

Sample Code
-----------
Sample codes are given in this project, under **controllers** folder. You may run the sample code by using <your_domain>/index.php/ip2proxy_test.

Methods
-------
Below are the methods supported.

    $countryCode = $this->ip2ip2proxy_lib->getCountryShort($ip);
    $countryName = $this->ip2ip2proxy_lib->getCountryLong($ip);
    $regionName = $this->ip2ip2proxy_lib->getRegion($ip);
    $cityName = $this->ip2ip2proxy_lib->getCity($ip);
    $isp = $this->ip2proxy_lib->getISP($ip);
    $proxyType = $this->ip2proxy_lib->getProxyType($ip);
    $isProxy = $this->ip2proxy_lib->isProxy($ip);
    
