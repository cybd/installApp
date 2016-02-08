<?php

class SoftwareExtractor
{
    protected $webServerName;
    protected $webServerVersion;

    public function __construct()
    {
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
        if (extension_loaded('mysqli')) {

            $mysqli = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            return $mysqli->server_info;

        } else {
            throw new Exception('Cannot get version, mysqli is not loaded');
        }
    }

    /**
     * @return bool
     */
    public function isMySQLLoaded()
    {
        return extension_loaded('mysql');
    }

    /**
     * @return bool
     */
    public function isMySQLImprovedLoaded()
    {
        return extension_loaded('mysqli');
    }

    public function isPDOMySQLLoaded()
    {
        return extension_loaded('pdo_mysql');
    }

    /**
     * @return bool
     */
    public function isMongoDBLoaded()
    {
        return extension_loaded('mongodb');
    }

    /**
     * @return bool
     */
    public function isWebServerNameInstalled($name)
    {
        return (strpos($this->getWebServerName(), $name) !== false);
    }
}