<?php
require_once 'TestCase.php';

class testingDoneTest extends TestCase
{
    public function testMarkingTaskAsDone()
    {
        $this->windowMaximize();
        $this->open("/");
        $this->click("link=login");
        $this->waitForPageToLoad("30000");
        $this->type("id=email", TestCase::USERNAME);
        $this->type("id=password", TestCase::PASSWORD);
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
