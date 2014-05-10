<?php

class TestCase extends PHPUnit_Extensions_SeleniumTestCase
{   
    const USERNAME = 'dragonbe@gmail.com';
    const PASSWORD = 'test1234';
    const BASEURL = 'http://www.theialive.com';

    public static $browsers = array (
        array (
            'name' => 'Internet Explorer 8 on Windows 7', 
            'browser' => '*iexplore',
            'host' => '192.168.56.101',
            'port' => 13666,
        ),
        array (
            'name' => 'Firefox on Mac OS X', 
            'browser' => '*firefox',
            'host' => '192.168.56.1',
            'port' => 13666,
        ),
        array (
            'name' => 'Google Chrome on Linux', 
            'browser' => '*googlechrome',
            'host' => '192.168.56.102',
            'port' => 13666,
        ),
    );

    protected function setUp()
    {
        $this->setBrowserUrl(self::BASEURL);
    }
}