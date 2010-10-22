<?php

class IndexControllerTest extends ControllerTestCase
{

    public function testIndexAction()
    {
        $this->dispatch("/index/index");
        $this->assertController("index");
        $this->assertAction("index");
        $this->assertResponseCode(200);
    }

}

