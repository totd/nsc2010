<?php
/**
 * @author Andriy Ilnytskyi 23-10-2010
 *
 * Class to check IndexController.
 */
class IndexControllerTest extends ControllerTestCase
{

    /**
     * @author Andriy Ilnytskyi 27-10-2010
     * 
     * Test redirecting to the user index page without authorization.
     */
    public function testIndexAction()
    {
        $this->dispatch('/index');
        $this->assertModule('user');
        $this->assertController('login');
        $this->assertAction('index');
        $this->assertResponseCode(200);
    }

}
