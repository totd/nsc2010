<?php
/**
 * @author Andryi Ilnytskiy 04.11.2010
 *
 * Default controller of the equipment module.
 */
class Equipment_IndexController extends Zend_Controller_Action
{
    public function preDispatch(){
        $this->_helper->layout->setLayout('equipmentLayout');
    }

    public function init()
    {
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    /**
     * @author Andryi Ilnytskiy 04.11.2010
     *
     * Deafault action.
     */
    public function indexAction()
    {
        // Fetch the current instance of Zend_Auth
        $auth = Zend_Auth::getInstance();

        // Check whether an identity is set.
        if (!$auth->hasIdentity()) {
            // TODO Implement a forwarding or redirecting to the needed action.
            return $this->_forward('index', 'index', 'user');
            //return $this->_redirect('user/index');
        } else {
            return $this->_redirect('/equipment/list/index');
        }
    }

    public function getEquipmentInformationAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        if ($this->_request->isXmlHttpRequest()) {
            $equipmentId = $this->_request->getParam('equipmentId');
            if (empty($equipmentId)) {
                $result = array('empty' => true);
            } else {
                $equipmentModel = new Equipment_Model_Equipment();
                $equipmentRow = $equipmentModel->getEquipmentInformation($equipmentId);
                if (is_null($equipmentRow)) {
                    $result = array('error' => "Equiment doesn't exists");
                } else {
                    $result = $equipmentRow;
                }
            }

            print json_encode($result);
        }

    }
}

