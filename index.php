<?php
require 'app/config.php';

if (extension_loaded('mysqli')) {

    $mysqli = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    echo $mysqli->server_info . "\n";

}

// phpinfo();

die();
include_once 'install/SoftwareExtractor.php';

$o = new SoftwareExtractor();
var_dump(
    $o->getPHPversion(),
    $o->getWebServerVersion(),
    $o->getWebServerName(),
    $o->isWebServerNameInstalled('iis'),
    $o->isWebServerNameInstalled('apache'),
    $o->isWebServerNameInstalled('nginx')
);

die();

/*$serverSoftwareValues = [
  'Apache/2.2.15 (Win32) JRun/4.0 PHP/5.2.1',
  'Apache/2.2.22 (Win64) PHP/5.3.13',
  'nginx/1.8.0',
  'IIS/7',
  // 'somestring',
];

foreach ($serverSoftwareValues as $value) {
  print getServerSoftware($value);
}
*/
