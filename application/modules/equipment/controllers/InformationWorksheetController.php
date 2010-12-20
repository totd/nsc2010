<?php

/**
 * @author Andryi Ilnytskiy 04.11.2010
 *
 * Handle of the equipment creation.
 */
class Equipment_InformationWorksheetController extends Zend_Controller_Action
{
    const uploadPath = "upload/";

    public function preDispatch()
    {
        $this->_helper->layout->setLayout('equipmentLayout');
    }

    public function init()
    {
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    public function indexAction($EIN = null)
    {
        $this->view->breadcrumbs = "<a href='/equipment/index'>Equipment Management</a>&nbsp;&gt;&nbsp;<a href='/equipment/list#'>Equipment List</a>&nbsp;&gt;&nbsp;<a href='/equipment/list#'>Equipment Search</a>&nbsp;&gt;&nbsp;Equipment VIM";

        if (is_null($EIN)) {
            $EIN = $this->_request->getParam('EIN');
            if (is_null($EIN)) {
                $this->_redirect('/equipment/search');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentRow = $equipmentModel->findEquipmentByVIN($EIN);

        if (is_null($equipmentRow)) {
            $this->_redirect('equipment/list');
        }

        $equipmentSession = new Zend_Session_Namespace('Equipment');
        if ($equipmentSession->__isset('VIW')) {
            // Clean session
            $equipmentSession->__unset('VIW');
        }
        $equipmentSession->VIW = array();
        $equipmentSession->VIW['e_id'] = $equipmentRow['e_id'];
        $equipmentSession->VIW['e_Number'] = $equipmentRow['e_Number'];



        if (!empty($equipmentRow['e_License_Expiration_Date']) && $equipmentRow['e_License_Expiration_Date'] != '0000-00-00') {
            $myDate = new Zend_Date($equipmentRow['e_License_Expiration_Date'], "YYYY-MM-dd");
            $equipmentRow['e_License_Expiration_Date'] = $myDate->toString("MM/dd/YYYY");
        } else {
            $equipmentRow['e_License_Expiration_Date'] = '';
        }

        $equipmentAssignmentModel = new EquipmentAssignment_Model_EquipmentAssignment();
        $equipmentAssigmentRow = $equipmentAssignmentModel->getAssignment($equipmentRow['e_id']);

        if (!is_null($equipmentAssigmentRow) && !empty($equipmentAssigmentRow)) {
            $this->view->equipmentAssignmentRow = $equipmentAssigmentRow;
        }

        if (isset($equipmentRow['enes_type']) && $equipmentRow['enes_type'] == 'Completed') {
            $this->view->equipmentStatus = (isset($equipmentRow['eas_type'])) ? $equipmentRow['eas_type'] : '';
        } else {
            $this->view->equipmentStatus = (isset($equipmentRow['enes_type'])) ? $equipmentRow['enes_type'] : '';
        }

        $this->view->equipmentRow = $equipmentRow;
        $this->view->uploadPath = self::uploadPath;
        $this->view->action = '/equipment/update-status/';
        $this->view->pageTitle = 'EQUIPMENT INFORMATION WORKSHEET';
        $this->view->headLink()->appendStylesheet('/css/main.css');
        $this->view->headScript()->appendFile('/js/imgpreview.min.0.22.jquery.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/equipment/index.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/ajaxfileupload/ajaxfileupload.js', 'text/javascript');


        // update VIW data
        // create state select.
        $stateModel = new State_Model_State();
        $states = $stateModel->getList();

        $selectStateArray = array('' => array('text' => '-'));
        foreach ($states as $state) {
            if (is_object($state)) {
                $selectStateArray[$state->s_id] = array('text' => $state->s_name);
            } else {
                $selectStateArray[$state['s_id']] = array('text' => $state['s_name']);
            }
        }

        if (isset($equipmentRow['e_Registration_State']) && !is_null($equipmentRow['e_Registration_State'])) {
            foreach ($selectStateArray as $key => &$value) {
                if ($equipmentRow['e_Registration_State'] == $key) {
                    $value['selected'] = true;
                    break;
                }
            }
        } else {
            $selectStateArray['']['selected'] = true;
        }
        $this->view->states = $selectStateArray;

        // create equipment type select.
        $equipmentTypeModel = new EquipmentType_Model_EquipmentType();
        $equipmentTypes = $equipmentTypeModel->getList();

        $selectEquipmentTypeArray = array('' => array('text' => '-'));
        foreach ($equipmentTypes as $equipmentType) {
            $selectEquipmentTypeArray[$equipmentType->et_id] = array('text' => $equipmentType->et_type);
        }

        if (isset($equipmentRow['e_type_id']) && !is_null($equipmentRow['e_type_id'])) {
            foreach ($selectEquipmentTypeArray as $key => &$value) {
                if ($equipmentRow['e_type_id'] == $key) {
                    $value['selected'] = true;
                    break;
                }
            }
        } else {
            $selectEquipmentTypeArray['']['selected'] = true;
        }
        $this->view->equipmentTypes = $selectEquipmentTypeArray;

        $this->addAssignment($equipmentRow['e_id'], $equipmentRow['e_Number']);
    }

    public function createNewAction($EIN = null)
    {
        if (is_null($EIN)) {
            $EIN = $this->_request->getParam('EIN');
            if (is_null($EIN)) {
                $this->_redirect('/equipment/search');
            }
        }

        if (is_null($EIN)) {
            $this->_redirect('/equipment/list');
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentRow = $equipmentModel->findEquipmentByVIN($EIN);


        if (is_null($equipmentRow)) {
            $equipmentRow = array(
                'e_Number' => $EIN,
            );
            // Create equipment only with EIN value
            $equipmentRow = $equipmentModel->createEquipment($equipmentRow);
        }

        $this->_redirect("/equipment/information-worksheet/index/EIN/{$equipmentRow['e_Number']}");
    }

    /**
     * @author Andryi Ilnytskiy 04.11.2010
     *
     * Save imformation worksheet of a new equipment.
     *
     * @param string $EIN
     *
     * @return mixed
     */
    public function updateAction($EIN = null)
    {
        if (is_null($EIN)) {
            $EIN = $this->_request->getParam('EIN');
            if (is_null($EIN)) {
                $this->_redirect('/equipment/search');
            }
        }

        $this->view->breadcrumbs = '<a href="/equipment/index">Equipment Management</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/list">Equipment List</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/search">Equipment Search</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/information-worksheet/index/EIN/' . $EIN . '">Equipment VIM</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;VIM Update';

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentRow = $equipmentModel->findEquipmentByVIN($EIN);


        if (is_null($equipmentRow)) {
            $equipmentRow = array(
                'e_Number' => $EIN,
            );
            // Create equipment only with EIN value
            $equipmentRow = $equipmentModel->createEquipment($equipmentRow);
        } else {
            // message about an existen equipment.
            //$this->_redirect('/equipment/search/index/EIN/' . $EIN);
        }

        // create state select.
        $stateModel = new State_Model_State();
        $states = $stateModel->getList();

        $selectStateArray = array('' => array('text' => '-'));
        foreach ($states as $state) {
            if (is_object($state)) {
                $selectStateArray[$state->s_id] = array('text' => $state->s_name);
            } else {
                $selectStateArray[$state['s_id']] = array('text' => $state['s_name']);
            }
        }

        if (isset($equipmentRow['e_Registration_State']) && !is_null($equipmentRow['e_Registration_State'])) {
            foreach ($selectStateArray as $key => &$value) {
                if ($equipmentRow['e_Registration_State'] == $key) {
                    $value['selected'] = true;
                    break;
                }
            }
        } else {
            $selectStateArray['']['selected'] = true;
        }
        $this->view->states = $selectStateArray;

        // create equipment type select.
        $equipmentTypeModel = new EquipmentType_Model_EquipmentType();
        $equipmentTypes = $equipmentTypeModel->getList();

        $selectEquipmentTypeArray = array('' => array('text' => '-'));
        foreach ($equipmentTypes as $equipmentType) {
            $selectEquipmentTypeArray[$equipmentType->et_id] = array('text' => $equipmentType->et_type);
        }

        if (isset($equipmentRow['e_type_id']) && !is_null($equipmentRow['e_type_id'])) {
            foreach ($selectEquipmentTypeArray as $key => &$value) {
                if ($equipmentRow['e_type_id'] == $key) {
                    $value['selected'] = true;
                    break;
                }
            }
        } else {
            $selectEquipmentTypeArray['']['selected'] = true;
        }
        $this->view->equipmentTypes = $selectEquipmentTypeArray;


        if (!empty($equipmentRow['e_License_Expiration_Date']) && $equipmentRow['e_License_Expiration_Date'] != '0000-00-00') {
            $myDate = new Zend_Date($equipmentRow['e_License_Expiration_Date']);
            $equipmentRow['e_License_Expiration_Date'] = $myDate->toString("MM/dd/YYYY");
        } else {
            $equipmentRow['e_License_Expiration_Date'] = '';
        }

        $this->view->equipmentRow = $equipmentRow;
        $this->view->pageTitle = 'UPDATE EQUIPMENT INFORMATION WORKSHEET';
        $this->view->headScript()->appendFile('/js/equipment/update.js', 'text/javascript');
        $this->view->headLink()->appendStylesheet('/css/main.css');
    }

    public function validateCompletedAction($id = null)
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
            if (is_null($id)) {
                $this->_redirect('/equipment/list');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentRow = $equipmentModel->getRow($id);
        if (is_null($equipmentRow)) {
            $this->_redirect('/equipment/list');
        }

        $this->view->breadcrumbs = '<a href="/equipment/index">Equipment Management</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/list">Equipment List</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/search">Equipment Search</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/information-worksheet/index/EIN/' . $equipmentRow->e_Number . '">Equipment VIM</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;Validate Complete Action';


        $this->view->pageTitle = 'COMPLETE EQUIPMENT APPLICATION';
        $EIN = $equipmentRow->e_Number;
        $this->view->EIN = $equipmentRow->e_Number;
        $this->view->UnitNumber = $equipmentRow->e_Unit_Number;
        $this->view->ID = $equipmentRow->e_id;


        $warningFields = $equipmentModel->checkCompletedFields($id);

        $inspectionModel = new Inspection_Model_Inspection();
        $hasInspection = $inspectionModel->equipmentIsInspected($equipmentRow->e_id);
        $this->view->hasInspection = $hasInspection;

        if (is_null($warningFields) && $hasInspection) {
            $this->render('completed_no_errors');
        } else {
            if ($warningFields) {
                $this->view->warningArray = $warningFields;
            }
            $this->render('completed_errors');
        }
    }

    public function declinedAction()
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
            if (is_null($id)) {
                $this->_redirect('/equipment/list');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentModel->changeNewEquipmentStatus('Declined', $id);
        return $this->_redirect('equipment/list');
    }

    public function reactivatedAction()
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
            if (is_null($id)) {
                $this->_redirect('/equipment/list');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentModel->changeNewEquipmentStatus('Pending', $id);
        return $this->_redirect('equipment/list');
    }

    /**
     * @author Andryi Ilnytskyi 16.11.2010
     *
     * Updated VIM
     * 
     * @return mixed 
     */
    public function saveVimAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        if ($this->_request->isXmlHttpRequest()) {
            $equipmentModel = new Equipment_Model_Equipment();

            $data = array();
            // TODO implement filling manual all table fields with validating.
            $data = $this->_request->getQuery();
            foreach ($data as $key => &$value) {
                if ($key == 'e_License_Expiration_Date'/* || $key == 'e_Entry_Date'*/) {
                    try {
                        $myDate = new Zend_Date($value, "MM/dd/YYYY");
                        $data[$key] = $myDate->toString("YYYY-MM-dd");
                    } catch (Exception $e) {

                    }
                } else if (!is_null($value) && !empty($value)) {
                    $data[$key] = $value;
                }
            }

            $where = $equipmentModel->getAdapter()->quoteInto('e_id = ?', $this->_request->getParam('e_id'));

            $equipmentModel->update($data, $where);

            //return $this->_redirect('equipment/list');
            //return $this->_redirect($_SERVER['HTTP_REFERER']);
            echo 1;
        }
    }

    public function uploadPictureAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        if ($this->_request->isPost()) {
            if (isset($_FILES['uploadPicture'])) {
                $equipmentSession = new Zend_Session_Namespace('Equipment');
                $equipmentVIW = $equipmentSession->VIW;
                $fileName = $this->saveUploadData('uploadPicture');
                if (!is_null($fileName)) {
                    $equipmentVIW['e_Picture'] = $fileName;
                    $equipmentSession->VIW = $equipmentVIW;

                    //echo $fileName;
                    echo "{";
                    echo				"error: '" . '' . "',\n";
                    echo				"fileName: '" . $fileName . "'\n";
                    echo "}";
                }
            }
        }
    }

    private function saveUploadData($fieldName)
    {
        if ((($_FILES[$fieldName]["type"] == "image/tiff")
                || ($_FILES[$fieldName]["type"] == "image/jpeg"))
                && ($_FILES[$fieldName]["size"] < 2097152)) {
            if ($_FILES[$fieldName]["error"] > 0) {
//                throw new Exception("Return Code: " . $_FILES[$fieldName]["error"] . "<br />");
                return null;
            } else {
                $extension = end(explode(".", $_FILES[$fieldName]['name']));

                $userId = '';
                $auth = Zend_Auth::getInstance();
                if ($auth->hasIdentity()) {
                    $identity = $auth->getIdentity();
                    $userId = $identity->vau_username;
                }

                $currentDate = new Zend_Date();
                $strDate = $currentDate->toString("dd") . "_" .
                        $currentDate->toString("MM") . "_" .
                        $currentDate->toString("YYYY") . "_" .
                        $currentDate->toString("HH") . "_" .
                        $currentDate->toString("mm") . "_" .
                        $currentDate->toString("ss");
                $randomVal = rand(0, 9999);
                $storeName = $userId . "_" . $strDate . "_" . $randomVal;
                if (!empty($extension)) {
                    $storeName .= ".$extension";
                }

                if (file_exists(self::uploadPath . $storeName)) {
//                    throw new Exception("$storeName already exists. ");
                    return null;
                } else {
                    $result = move_uploaded_file($_FILES[$fieldName]["tmp_name"],
                                    self::uploadPath . $storeName);
                    if ($result) {
                        return $storeName;
                    } else {
                        return null;
                    }
                }
            }
        } else {
            return null;
        }
    }

    public function saveAssignmentAction()
    {
        if ($this->_request->isXmlHttpRequest()) {
            $equipmentAssignmentModel = new EquipmentAssignment_Model_EquipmentAssignment();
            $cols = $equipmentAssignmentModel->info(Zend_Db_Table_Abstract::COLS);

            $data = array();
            // TODO implement filling manual all table fields with validating.
            foreach ($this->_request->getQuery() as $key => $value) {
                if (in_array($key, $cols)) {

                    if ($key == 'ea_driver_id' || $key == 'ea_depot_id') {
                        $data[$key] = null;
                    }

                    if (empty($value) || is_null($value)) {
                        continue;
                    } elseif ($key == 'ea_start_date' || $key == 'ea_end_date') {
                        try {
                            $myDate = new Zend_Date($value, "MM/dd/YYYY");
                            $data[$key] = $myDate->toString("YYYY-MM-dd");
                        } catch (Exception $e) {

                        }
                    } else {
                        $data[$key] = $value;
                    }
                }
            }

            if (!array_key_exists('ea_depot_id', $this->_request->getQuery())) {
                $data['ea_depot_id'] = null;
            }

            if (!array_key_exists('ea_driver_id', $this->_request->getQuery())) {
                $data['ea_driver_id'] = null;
            }

            $equipmentAssignmentModel->saveAssignment($data);

            $this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);

            echo 1;
        }
    }

    public function getViwAction($EIN = null)
    {
        if (is_null($EIN)) {
            if ($this->_request->isXmlHttpRequest()) {
                $EIN = $this->_request->getParam('EIN');

                $layout = new Zend_Layout();
                $layout->setLayoutPath(APPLICATION_PATH . '/modules/equipment/views/scripts/information-worksheet');
                $layout->setLayout('viw');

                $equipmentModel = new Equipment_Model_Equipment();
                $equipmentRow = $equipmentModel->findEquipmentByVIN($EIN);

                if (!empty($equipmentRow['e_License_Expiration_Date']) && $equipmentRow['e_License_Expiration_Date'] != '0000-00-00') {
                    $myDate = new Zend_Date($equipmentRow['e_License_Expiration_Date'], "YYYY-MM-dd");
                    $equipmentRow['e_License_Expiration_Date'] = $myDate->toString("MM/dd/YYYY");
                } else {
                    $equipmentRow['e_License_Expiration_Date'] = '';
                }

                $equipmentAssignmentModel = new EquipmentAssignment_Model_EquipmentAssignment();
                $equipmentAssigmentRow = $equipmentAssignmentModel->getAssignment($equipmentRow['e_id']);

                if (!is_null($equipmentAssigmentRow) && !empty($equipmentAssigmentRow)) {
                    $layout->equipmentAssignmentRow = $equipmentAssigmentRow;
                }

                if (isset($equipmentRow['enes_type']) && $equipmentRow['enes_type'] == 'Completed') {
                    $layout->equipmentStatus = (isset($equipmentRow['eas_type'])) ? $equipmentRow['eas_type'] : '';
                } else {
                    $layout->equipmentStatus = (isset($equipmentRow['enes_type'])) ? $equipmentRow['enes_type'] : '';
                }

                $layout->equipmentRow = $equipmentRow;
                $layout->uploadPath = self::uploadPath;

                $this->_helper->layout->disableLayout();
                $this->_helper->viewRenderer->setNoRender(true);

                echo $layout->render();
            }
        }
    }

    public function getAssignmentAction($equipmentId = null)
    {
        if (is_null($equipmentId)) {
            if ($this->_request->isXmlHttpRequest()) {
                $equipmentId = $this->_request->getParam('equipmentId');

                $layout = new Zend_Layout();
                $layout->setLayoutPath(APPLICATION_PATH . '/modules/equipment/views/scripts/information-worksheet');
                $layout->setLayout('assignment');
                

                $equipmentModel = new Equipment_Model_Equipment();
                $layout->EIN = $equipmentModel->getVIN($equipmentId);

                $equipmentAssignmentModel = new EquipmentAssignment_Model_EquipmentAssignment();
                $equipmentAssigmentRow = $equipmentAssignmentModel->getAssignment($equipmentId);

                if (is_null($equipmentAssigmentRow) || empty($equipmentAssigmentRow)) {
                    $equipmentAssigmentRow['e_id'] = $equipmentId;
                    $equipmentAssigmentRow['ea_equipment_id'] = $equipmentId;

                    $layout->equipmentAssignmentRow = $equipmentAssigmentRow;
                } elseif (is_array($equipmentAssigmentRow) && count($equipmentAssigmentRow)) {
                    if (!empty($equipmentAssigmentRow['ea_start_date']) && $equipmentAssigmentRow['ea_start_date'] != '0000-00-00') {
                        $dateObj = new Zend_Date($equipmentAssigmentRow['ea_start_date'], "YYYY-MM-dd");
                        $equipmentAssigmentRow['ea_start_date'] = $dateObj->toString("MM/dd/YYYY");
                    } else {
                        $equipmentAssigmentRow['ea_start_date'] = '';
                    }

                    if (!empty($equipmentAssigmentRow['ea_end_date']) && $equipmentAssigmentRow['ea_end_date'] != '0000-00-00') {
                        $dateObj = new Zend_Date($equipmentAssigmentRow['ea_end_date']);
                        $equipmentAssigmentRow['ea_end_date'] = $dateObj->toString("MM/dd/YYYY", "YYYY-MM-dd");
                    } else {
                        $equipmentAssigmentRow['ea_end_date'] = '';
                    }


                    $layout->equipmentAssignmentRow = $equipmentAssigmentRow;
                }

                // Prepearing data for the form
                // Homebases
                $layout->homebases = $this->getSelectList('homebase', 'h_id', 'h_Name',
                                (isset($equipmentAssigmentRow['ea_homebase_id']) ? $equipmentAssigmentRow['ea_homebase_id'] : null)
                );

                // Depots
                $depotModel = new Depot_Model_Depot();
                $homebaseId = (isset($equipmentAssigmentRow['ea_homebase_id'])) ? $equipmentAssigmentRow['ea_homebase_id'] : null;
                $depotList = $depotModel->getDepotList($homebaseId);

                $selectArray = array('' => array('text' => '-'));
                if (!is_null($depotList)) {
                    foreach ($depotList as $depot) {
                        $selectArray[$depot['dp_id']] = array('text' => $depot['dp_Name']);
                    }

                    if (isset($equipmentAssigmentRow['ea_depot_id']) && !is_null($equipmentAssigmentRow['ea_depot_id'])) {
                        foreach ($selectArray as $key => &$value) {
                            if ($equipmentAssigmentRow['ea_depot_id'] == $key) {
                                $value['selected'] = true;
                                break;
                            }
                        }
                    } else {
                        $selectArray['']['selected'] = true;
                    }
                }

                $layout->depots = $selectArray;

                // Owners
                $layout->owners = $this->getSelectList('equipmentOwner', 'eo_id', 'eo_name',
                                (isset($equipmentAssigmentRow['ea_owner_id']) ? $equipmentAssigmentRow['ea_owner_id'] : null)
                );

                // Drivers
                $layout->drivers = $this->getSelectList('driver', 'd_ID', array('d_Driver_SSN', 'd_Last_Name'),
                                (isset($equipmentAssigmentRow['ea_driver_id']) ? $equipmentAssigmentRow['ea_driver_id'] : null)
                );

                // Service providers
                $layout->serviceProviders = $this->getSelectList('serviceProvider', 'sp_ID', 'sp_Name',
                                (isset($equipmentAssigmentRow['spea_Service_Provider_ID']) ? $equipmentAssigmentRow['spea_Service_Provider_ID'] : null)
                );

                // Incidents
                $layout->incidents = $this->getSelectList('incident', 'i_ID', 'i_Violation_ID',
                                (isset($equipmentAssigmentRow['spea_Service_Provider_ID']) ? $equipmentAssigmentRow['spea_Service_Provider_ID'] : null)
                );

                $this->_helper->layout->disableLayout();
                $this->_helper->viewRenderer->setNoRender(true);

                echo $layout->render();
            }
        }
    }

    public function getAssignmentDriverAction($equipmentId = null)
    {
        if (is_null($equipmentId)) {
            if ($this->_request->isXmlHttpRequest()) {
                $equipmentId = $this->_request->getParam('equipmentId');

                $layout = new Zend_Layout();
                $layout->setLayoutPath(APPLICATION_PATH . '/modules/equipment/views/scripts/information-worksheet');
                $layout->setLayout('assignment-driver');


                $equipmentAssignmentModel = new EquipmentAssignment_Model_EquipmentAssignment();
                $equipmentAssigmentRow = $equipmentAssignmentModel->getAssignment($equipmentId);
                if (is_array($equipmentAssigmentRow) && count($equipmentAssigmentRow)) {
                    $layout->equipmentAssignmentRow = $equipmentAssigmentRow;
                }

                $this->_helper->layout->disableLayout();
                $this->_helper->viewRenderer->setNoRender(true);

                echo $layout->render();
            }
        }
    }

    private function addAssignment($equipmentId = null, $EIN = null)
    {
        if (is_null($equipmentId)) {
            $equipmentId = $this->_request->getParam('equipmentId');
            $EIN = $this->_request->getParam('EIN');
        }

        if (is_null($equipmentId)) {
            $this->view->errorMessage = "Equipment is undefined";
        } else {
            $equipmentModel = new Equipment_Model_Equipment();
            $this->view->EIN = $equipmentModel->getVIN($equipmentId);

            $equipmentAssignmentModel = new EquipmentAssignment_Model_EquipmentAssignment();
            $equipmentAssigmentRow = $equipmentAssignmentModel->getAssignment($equipmentId);

            if (is_null($equipmentAssigmentRow) || empty($equipmentAssigmentRow)) {
                $equipmentAssigmentRow['e_id'] = $equipmentId;
                $equipmentAssigmentRow['ea_equipment_id'] = $equipmentId;

                $this->view->equipmentAssignmentRow = $equipmentAssigmentRow;
            } elseif (is_array($equipmentAssigmentRow) && count($equipmentAssigmentRow)) {
                if (!empty($equipmentAssigmentRow['ea_start_date']) && $equipmentAssigmentRow['ea_start_date'] != '0000-00-00') {
                    $dateObj = new Zend_Date($equipmentAssigmentRow['ea_start_date'], "YYYY-MM-dd");
                    $equipmentAssigmentRow['ea_start_date'] = $dateObj->toString("MM/dd/YYYY");
                } else {
                    $equipmentAssigmentRow['ea_start_date'] = '';
                }

                if (!empty($equipmentAssigmentRow['ea_end_date']) && $equipmentAssigmentRow['ea_end_date'] != '0000-00-00') {
                    $dateObj = new Zend_Date($equipmentAssigmentRow['ea_end_date']);
                    $equipmentAssigmentRow['ea_end_date'] = $dateObj->toString("MM/dd/YYYY", "YYYY-MM-dd");
                } else {
                    $equipmentAssigmentRow['ea_end_date'] = '';
                }


                $this->view->equipmentAssignmentRow = $equipmentAssigmentRow;
            }

            // Prepearing data for the form
            // Homebases
            $this->view->homebases = $this->getSelectList('homebase', 'h_id', 'h_Name',
                            (isset($equipmentAssigmentRow['ea_homebase_id']) ? $equipmentAssigmentRow['ea_homebase_id'] : null)
            );

            // Depots
            $depotModel = new Depot_Model_Depot();
            $homebaseId = (isset($equipmentAssigmentRow['ea_homebase_id'])) ? $equipmentAssigmentRow['ea_homebase_id'] : null;
            $depotList = $depotModel->getDepotList($homebaseId);

            $selectArray = array('' => array('text' => '-'));
            if (!is_null($depotList)) {
                foreach ($depotList as $depot) {
                    $selectArray[$depot['dp_id']] = array('text' => $depot['dp_Name']);
                }

                if (isset($equipmentAssigmentRow['ea_depot_id']) && !is_null($equipmentAssigmentRow['ea_depot_id'])) {
                    foreach ($selectArray as $key => &$value) {
                        if ($equipmentAssigmentRow['ea_depot_id'] == $key) {
                            $value['selected'] = true;
                            break;
                        }
                    }
                } else {
                    $selectArray['']['selected'] = true;
                }
            }

            $this->view->depots = $selectArray;

            // Owners
            $this->view->owners = $this->getSelectList('equipmentOwner', 'eo_id', 'eo_name',
                            (isset($equipmentAssigmentRow['ea_owner_id']) ? $equipmentAssigmentRow['ea_owner_id'] : null)
            );

            // Drivers
//            $this->view->drivers = $this->getSelectList('driver', 'd_ID', array('d_Driver_SSN', 'd_Last_Name'),
//                            (isset($equipmentAssigmentRow['ea_driver_id']) ? $equipmentAssigmentRow['ea_driver_id'] : null)
//            );

                
            // Service providers
            $this->view->serviceProviders = $this->getSelectList('serviceProvider', 'sp_ID', 'sp_Name',
                            (isset($equipmentAssigmentRow['spea_Service_Provider_ID']) ? $equipmentAssigmentRow['spea_Service_Provider_ID'] : null)
            );

            // Incidents
            $this->view->incidents = $this->getSelectList('incident', 'i_ID', 'i_Violation_ID',
                            (isset($equipmentAssigmentRow['spea_Service_Provider_ID']) ? $equipmentAssigmentRow['spea_Service_Provider_ID'] : null)
            );
        }

        $this->view->headScript()->appendFile('/js/equipment/assignment.js', 'text/javascript');
        $this->view->headLink()->appendStylesheet('/css/main.css');
    }

    private function getSelectList($entity, $valueField, $textField, $selectedValue = null, $methodName = 'getList')
    {
        $modelName = ucfirst($entity) . '_Model_' . ucfirst($entity);

        $entityModel = new $modelName();
        $entities = $entityModel->$methodName();

        $selectArray = array('' => array('text' => '-'));
        foreach ($entities as $row) {
            if (is_object($row)) {
                if (is_array($textField)) {
                    $value = '';
                    foreach ($textField as $field) {
                        $value .= $row->$field . ' ';
                    }
                    $selectArray[$row->$valueField] = array('text' => $value);
                } else {
                    $selectArray[$row->$valueField] = array('text' => $row->$textField);
                }
            } elseif (is_array($row)) {
                if (is_array($textField)) {
                    $value = '';
                    foreach ($textField as $field) {
                        $value .= $row->$field . ' ';
                    }
                    $selectArray[$row[$valueField]] = array('text' => $value);
                } else {
                    $selectArray[$row[$valueField]] = array('text' => $row[$textField]);
                }
            }
        }

        if (!is_null($selectedValue)) {
            foreach ($selectArray as $key => &$value) {
                if ($selectedValue == $key) {
                    $value['selected'] = true;
                    break;
                }
            }
        } else {
            $selectArray['']['selected'] = true;
        }

        return $selectArray;
    }

    public function showCompleteFormAction($id = null)
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
        }

        if (!is_null($id) && !empty($id)) {
            $equipmentModel = new Equipment_Model_Equipment();
            $equipmentRow = $equipmentModel->getRow($id);

            if (!$equipmentRow) {
                $this->view->errorMessage = "Equipment doesn't exist.";
                $this->_redirect("/equipment/list");
            }

            $this->view->breadcrumbs = '<a href="/equipment/index">Equipment Management</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/list">Equipment List</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/search">Equipment Search</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/information-worksheet/index/EIN/' . $equipmentRow->e_Number . '">Equipment VIM</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/information-worksheet/validate-completed/id/' . $id . '">Validate Complete Action</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;Validate Complete Action';

            $inspectionModel = new Inspection_Model_Inspection();
            $hasInspection = $inspectionModel->equipmentIsInspected($id);
            if (!$hasInspection) {
                $this->_redirect("/equipment/information-worksheet/validate-completed/id/{$equipmentRow->e_id}");
            }

            $auth = Zend_Auth::getInstance();

            // Check whether an identity is set.
            if ($auth->hasIdentity()) {
                $identity = $auth->getIdentity();

                $this->view->person = "{$identity->vau_First_Name} {$identity->vau_Last_Name}";
            }

            $date = new Zend_Date();
            $this->view->currentDate = $date->toString("MM/dd/YYYY");
            $this->view->equipmentRow = $equipmentRow;
            $this->view->pageTitle = 'COMPLETE EQUIPMENT APPLICATION';
            $this->view->headScript()->appendFile('/js/equipment/show-complete-form.js', 'text/javascript');
            $this->view->headLink()->appendStylesheet('/css/main.css');
        }
    }

    public function completedAction()
    {
        $equipmentModel = new Equipment_Model_Equipment();

        if ($this->_request->isPost()) {
            $data = $this->_request->getPost();
            if (isset($data['e_id'])) {
                $row['e_id'] = $data['e_id'];
            }

            if (isset($data['e_activation_date'])) {
                try {
                    $myDate = new Zend_Date($data['e_activation_date'], "MM/dd/YYYY");
                    $row['e_activation_date'] = $myDate->toString("YYYY-MM-dd");
                } catch (Exception $e) {

                }
            }

            if (isset($data['e_activation_comment'])) {
                $row['e_activation_comment'] = $data['e_activation_comment'];
            }

            $equipmentActiveStatus = new ActiveStatus_Model_ActiveStatus();
            $activeStatusRecord = $equipmentActiveStatus->getRowByStatus('In Service');
            if ($activeStatusRecord) {
                $row['e_Active_Status'] = $activeStatusRecord->eas_id;
            }

            $equipmentModel->completeEquipment($row);

            $this->_redirect("/equipment/list");
        }
    }

    public function getAutocompleteDriversAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        if (isset($_GET['term'])) {
            $driverModel = new Driver_Model_Driver();
            $fields = array('d_First_Name', 'd_Last_Name', 'd_Driver_SSN');
            $result = $driverModel->getDriversByFieldsValues($fields, trim($_GET['term']));
            foreach($result as $k => $v){
                $arrayPart = array();
                $arrayPart['label'] = "{$v['d_First_Name']} {$v['d_Last_Name']} {$v['d_Driver_SSN']}";
                $arrayPart['id'] = $v['d_ID'];
                $result2[] = $arrayPart;
            }
            
            // TODO Hide next strings for users which hasn't permission to create driver
            $arrayPart = array();
            $arrayPart['label'] = 'CREATE NEW DRIVER';
            $arrayPart['id'] = 'new';
            $result2[] = $arrayPart;

            print json_encode($result2);

        }
    }
}
