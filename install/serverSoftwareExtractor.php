<?php

class ServerSoftwareExtractor
{
    protected $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function convertVersion($string)
    {
        if (strpos($string, '.') !== false) {
            $part = explode('.', $string);

            return $part[0] * 10000 + $part[1] * 100 + $part[2];
        }
    }

    public function greaterOrEqual($version1, $version2)
    {
        $cv1 = $this->convertVersion($version1);
        $cv2 = $this->convertVersion($version2);

        return $cv1 >= $cv2;
    }
}