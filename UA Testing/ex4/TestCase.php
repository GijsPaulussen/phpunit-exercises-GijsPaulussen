<?php

class TestCase extends PHPUnit_Extensions_SeleniumTestCase
{
    const USERNAME = 'dragonbe@gmail.com';
    const PASSWORD = 'test1234';
    const BASEURL = 'http://www.theialive.com';

    public static $browsers = array (
        array (
            'name' => 'Safari 7 on Mac OS X',
            'browser' => '*safari',
        ),
        array (
            'name' => 'Firefox on Mac OS X', 
            'browser' => '*firefox',
        ),
    );

    protected function setUp()
    {
        $this->setBrowserUrl(self::BASEURL);
    }
}