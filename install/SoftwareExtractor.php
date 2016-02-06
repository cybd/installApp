<?php

class SoftwareExtractor
{
  protected $webServerName;
  protected $webServerVersion;

  public function __construct() {
    $this->extractServerSoftwareInfo();
  }

  protected function extractServerSoftwareInfo()
  {
    if (empty($_SERVER['SERVER_SOFTWARE'])) {
      throw new Exception ('Cannot get info from _SERVER[SERVER_SOFTWARE]');
    }

    $ssInfo = $_SERVER['SERVER_SOFTWARE'];

    $chunks = explode(' ', $ssInfo);

    $serverInfo = strtolower($chunks[0]);

    if (strpos($serverInfo, '/') === false) {
      throw new Exception('Cannot get name and version _SERVER[SERVER_SOFTWARE]');
    }

    list($this->webServerName, $this->webServerVersion) = explode('/', $serverInfo);
  }

  /**
   * @return string
   */
  public function getPHPversion()
  {
    $phpVersion = '';
    if (!defined('PHP_VERSION_ID')) {
        $version = explode('.', PHP_VERSION);

        $phpVersion = $version[0] * 10000 + $version[1] * 100 + $version[2];
    }

    return $phpVersion ?: PHP_VERSION_ID;
  }

  /**
   * @return string
   */
  public function getWebServerName()
  {
    return $this->webServerName;
  }

  /**
   * @return string
   */
  public function getWebServerVersion()
  {
    return $this->webServerVersion;
  }

  /**
   * @return string
   */
  public function getMySQLVersion()
  {
    # code...
  }

  /**
   * @return bool
   */
  public function isMySQLInstalled()
  {
    # code...
  }

  /**
   * @return bool
   */
  public function isMySQLImprovedInstalled()
  {
    # code...
  }

  /**
   * @return bool
   */
  public function isMongoDBInstalled()
  {
    # code...
  }

  /**
   * @return bool
   */
  public function isWebServerNameInstalled($name)
  {
    return (strpos($this->getWebServerName(), $name) !== false);
  }
}