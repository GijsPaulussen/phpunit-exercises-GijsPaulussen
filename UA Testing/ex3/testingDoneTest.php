<?php
class testingDoneTest extends PHPUnit_Extensions_SeleniumTestCase
{
    protected function setUp()
    {
        $this->setBrowser("*firefox");
        $this->setBrowserUrl("http://www.theialive.com/");
    }

    public function testMarkingTaskAsDone()
    {
        $username = "dragonbe@gmail.com";
        $password = "test1234";
        $this->windowMaximize();
        $this->open("/");
        $this->click("link=login");
        $this->waitForPageToLoad("30000");
        $this->type("id=email", $username);
        $this->type("id=password", $password);
        $this->click("id=signin");
        $this->waitForPageToLoad("30000");
        $this->click("link=A test project");
        $this->waitForPageToLoad("30000");
        $this->assertEquals("Done", $this->getText("xpath=//th[5]"));
        $this->click("xpath=(//a[contains(text(),'[EDIT]')])[2]");
        $this->waitForPageToLoad("30000");
        $this->assertTrue($this->isElementPresent("id=done"));
        $this->click("link=sign off");
        $this->waitForPageToLoad("30000");
    }
}