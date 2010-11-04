<?php
class ErrorControllerTest extends ControllerTestCase
{
    // Test error handling of nonexisting controller
    public function testErrorURL()
    {
        $this->dispatch('foo');
        $this->assertModule('default');
        $this->assertController('error');
        $this->assertAction('error');
    }
}
    